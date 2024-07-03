<?php

namespace MoSharePointObjectSync\API;

use MoSharePointObjectSync\Wrappers\pluginConstants;
use MoSharePointObjectSync\Wrappers\sharepointWrapper;
use MoSharePointObjectSync\Wrappers\wpWrapper;
class Azure
{
    private static $obj;
    private $endpoints;
    private $config;
    private $scope = "https://graph.microsoft.com/.default";
    private $access_token;
    private $handler;
    private $all_documents = ["files" => [], "folders" => []];
    private function __construct($u8)
    {
        $this->config = $u8;
        $this->handler = Authorization::getController();
    }
    public static function getClient($u8)
    {
        if (isset(self::$obj)) {
            goto SS;
        }
        self::$obj = new Azure($u8);
        self::$obj->setEndpoints();
        SS:
        return self::$obj;
    }
    public function mo_sps_sync_azure_users()
    {
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_grpah_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        if ($this->access_token) {
            goto il;
        }
        wp_die(esc_html("Access token is missing from the response. Please try again later."));
        il:
        $this->fetch_users_using_access_token();
    }
    private function setEndpoints()
    {
        $this->endpoints["token"] = "https://accounts.accesscontrol.windows.net/" . $this->config["tenant_id"] . "/tokens/OAuth/2";
        $this->endpoints["graph_token"] = "https://login.microsoftonline.com/" . $this->config["tenant_id"] . "/oauth2/v2.0/token";
        $this->endpoints["graph_users"] = "https://graph.microsoft.com/beta/users/?\$select=userPrincipalName,id";
    }
    private function fetch_users_using_access_token()
    {
        $i9 = ["Authorization" => "Bearer " . $this->access_token];
        $gs = $this->handler->mo_sps_get_request($this->endpoints["graph_users"], $i9);
        if (!(!is_array($gs) || count($gs) <= 0)) {
            goto bk;
        }
        wp_die(esc_html("Unknown error occurred. Please try again later."));
        bk:
        foreach ($gs["value"] as $user) {
            if (empty($user)) {
                goto kh;
            }
            $MP = sanitize_user($user["id"]);
            $iu = sanitize_email($user["userPrincipalName"]);
            $g5 = username_exists($MP);
            if ($g5) {
                goto oA;
            }
            $g5 = email_exists($iu);
            oA:
            if (!$g5) {
                $mU = wp_generate_password("12", false);
                $g5 = wp_create_user($MP, $mU, $iu);
                // [PHPDeobfuscator] Implied goto
                goto eY;
            }
            wp_update_user(["user_email" => $iu]);
            eY:
            kh:
        }
    }
    public function mo_sps_process_files_and_folders($jI, $K2)
    {
        $xS = [];
        $CS = [];
        $ia = [];
        if (!isset($jI["Folders"]["results"])) {
            goto Qa;
        }
        foreach ($jI["Folders"]["results"] as $zS) {
            if (!($zS["__metadata"]["type"] == "SP.Folder" && $zS["Name"] != "Forms")) {
                goto sl;
            }
            array_push($CS, ["id" => $zS["UniqueId"], "parent_folder_id" => $K2, "name" => $zS["Name"], "slug" => $zS["UniqueId"], "path" => $zS["ServerRelativeUrl"], "children_count" => $zS["ItemCount"], "time_created" => $zS["TimeCreated"], "time_last_modified" => $zS["TimeLastModified"]]);
            sl:
        }
        Qa:
        foreach ($CS as $zS) {
            if (!($zS["children_count"] !== 0)) {
                goto lX;
            }
            $pY = "https://" . wpWrapper::mo_sps_get_domain_from_url($this->config["sps_relative_uri"]) . "/_api/web/GetFolderByServerRelativeUrl('" . $zS["path"] . "')/?\$expand=Folders,Files";
            $this->mo_sps_sync_sharepoint_documents($pY, $zS["id"]);
            lX:
        }
        if (!isset($jI["Files"]["results"])) {
            goto Pe;
        }
        foreach ($jI["Files"]["results"] as $Vj) {
            if (!($Vj["__metadata"]["type"] == "SP.File")) {
                goto oM;
            }
            array_push($ia, ["id" => $Vj["UniqueId"], "LinkingUri" => $Vj["LinkingUri"], "parent_folder_id" => $K2, "name" => $Vj["Name"], "slug" => $Vj["UniqueId"], "path" => $Vj["ServerRelativeUrl"], "size" => $Vj["Length"], "time_created" => $Vj["TimeCreated"], "time_last_modified" => $Vj["TimeLastModified"]]);
            oM:
        }
        Pe:
        $xS = ["folders" => $CS, "files" => $ia];
        return $xS;
    }
    public function mo_sps_sync_sharepoint_documents($pY, $K2 = 0)
    {
        $Dj = wpWrapper::mo_sps_get_option(pluginConstants::SHAREPOINT_ROOT_FOLDER);
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        $i9 = ["Authorization" => "Bearer " . $this->access_token, "Accept" => "application/json; odata=verbose"];
        $dw = $this->handler->mo_sps_get_request($pY, $i9);
        if (isset($dw["d"])) {
            $pb = $dw["d"];
            $xS = $this->mo_sps_process_files_and_folders($pb, $K2);
            $this->all_documents["files"] = array_merge($this->all_documents["files"], $xS["files"]);
            $this->all_documents["folders"] = array_merge($this->all_documents["folders"], $xS["folders"]);
            // [PHPDeobfuscator] Implied return
            return;
        }
        return;
    }
    public function mo_sps_send_access_token()
    {
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        if (!$this->access_token) {
            // [PHPDeobfuscator] Implied return
            return;
        }
        return $this->access_token;
    }
    public function mo_sps_download_file_from_sharepoint($Tu)
    {
        $cA = "https://" . wpWrapper::mo_sps_get_domain_from_url($this->config["sps_relative_uri"]) . "/_api/web/" . $Tu . "\$value";
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        $i9 = ["Authorization" => "Bearer " . $this->access_token, "Accept-Encoding" => "gzip, compress, deflate, br"];
        $Vj = $this->handler->mo_sps_get_media_request($cA, $i9);
        return $Vj;
    }
    public function mo_sps_sync_all_documents_from_sharepoint()
    {
        set_time_limit(0);
        $ri = wpWrapper::mo_sps_get_option(pluginConstants::SHAREPOINT_ROOT_DOC_LIB);
        if (!empty($ri)) {
            goto pW;
        }
        $ri = "/Shared Documents";
        pW:
        $pY = "https://" . wpWrapper::mo_sps_get_domain_from_url($this->config["sps_relative_uri"]) . "/_api/web/GetFolderByServerRelativeUrl('" . $ri . "/')/?\$expand=Folders,Files";
        $this->mo_sps_sync_sharepoint_documents($pY);
        if (!function_exists("wp_generate_attachment_metadata")) {
            include "ABSPATHwp-admin/includes/image.php";
        }
        $CS = $this->all_documents["folders"];
        $a5 = sizeof($CS);
        $lq = wpWrapper::mo_sps_get_option(pluginConstants::SHAREPOINT_ROOT_FOLDER);
        $pu = sharepointWrapper::mo_sps_get_folder_map_array();
        $pu["0"] = $lq;
        $TL = $pu;
        $K2 = $a5 - 1;
        Cc:
        if (!($K2 >= 0)) {
            foreach ($TL as $K2 => $To) {
                if (!($K2 === 0)) {
                    unset($pu[$K2]);
                    sharepointWrapper::mo_sps_delete_folder_id($zS["id"]);
                    wp_delete_term($To, "wpmf-category");
                    // [PHPDeobfuscator] Implied goto
                    goto Ip;
                }
                Ip:
            }
            $ia = $this->all_documents["files"];
            $cq = sizeof($ia);
            $cR = pluginConstants::MIME_TYPES;
            $Qw = wp_upload_dir();
            $Kw = $Qw["path"];
            $rm = $Qw["url"];
            $Ak = sharepointWrapper::mo_sps_get_file_map_array();
            $lW = $Ak;
            $vd = [];
            $bH = $cq - 1;
            ca:
            if (!($bH >= 0)) {
                foreach ($lW as $bH => $qO) {
                    unset($Ak[$bH]);
                    sharepointWrapper::mo_sps_delete_file_id($Ak[$bH]);
                    wp_delete_post($qO, true);
                }
                foreach ($vd as $n1) {
                    $rk = wp_generate_attachment_metadata($n1["id"], $n1["file_url"]);
                    wp_update_attachment_metadata($n1["id"], $rk);
                }
                set_time_limit(120);
                error_log("end....");
                // [PHPDeobfuscator] Implied return
                return;
            }
            $Vj = $ia[$bH];
            $Cg = pathinfo($Vj["name"], PATHINFO_EXTENSION);
            $Jf = basename($Vj["name"], "." . $Cg);
            $mg = $pu[$Vj["parent_folder_id"]];
            if (!($mg == 0)) {
                goto tf;
            }
            $mg = $lq;
            tf:
            unset($lW[$Vj["id"]]);
            $Iu = $Vj["size"];
            $Ya = $Vj["name"];
            $Vo = $Kw . "/" . $Ya;
            if (is_admin()) {
                goto SL;
            }
            require_once "ABSPATHwp-admin/includes/post.php";
            SL:
            if (isset($Ak[$Vj["id"]])) {
                $qO = $Ak[$Vj["id"]];
                $rv = admin_url("admin-ajax.php") . "?action=mo_sps_sync_file&file_id=" . $Vj["id"] . "&download=0";
                wp_update_post(array("ID" => $qO, "post_title" => $Jf, "post_mime_type" => $cR[strtolower($Cg)]));
                wp_set_object_terms((int) $qO, (int) $mg, "wpmf-category", true);
                update_post_meta($qO, "_wp_attached_file", $Ya);
                update_post_meta($qO, "wpmf_size", $Iu);
                update_post_meta($qO, "mo_sps_relative_path", $Vj["path"]);
                update_post_meta($qO, "mo_sps_file_url", $rv);
                update_post_meta($qO, "mo_sps_file_edit_url", $Vj["LinkingUri"]);
                // [PHPDeobfuscator] Implied goto
                goto U_;
            }
            $rv = admin_url("admin-ajax.php") . "?action=mo_sps_sync_file&file_id=" . $Vj["id"] . "&download=0";
            $qO = wp_insert_attachment(array("guid" => $rm . "/" . $Ya, "post_title" => $Jf, "post_status" => "inherit", "post_mime_type" => $cR[strtolower($Cg)], "meta_input" => array("mo_sps_file_url" => $rv)), $Vo);
            wp_set_object_terms((int) $qO, (int) $mg, "wpmf-category", true);
            update_post_meta($qO, "wpmf_size", $Iu);
            update_post_meta($qO, "wpmf_type", strtolower($Cg));
            update_post_meta($qO, "_wp_attached_file", $Ya);
            update_post_meta($qO, "mo_sps_relative_path", $Vj["path"]);
            update_post_meta($qO, "mo_sps_file_edit_url", $Vj["LinkingUri"]);
            if (!(strpos($cR[strtolower($Cg)], "image") !== false)) {
                goto Rp;
            }
            array_push($vd, ["id" => $qO, "file_url" => $rv]);
            Rp:
            U_:
            $Ak[$Vj["id"]] = $qO;
            sharepointWrapper::mo_sps_update_file_map($Vj["id"], $qO);
            $bH--;
            goto ca;
        }
        $zS = $CS[$K2];
        unset($TL[$zS["id"]]);
        if (term_exists($zS["slug"])) {
            $Sp = wp_update_term(term_exists($zS["slug"]), "wpmf-category", ["name" => $zS["name"], "parent" => $pu[$zS["parent_folder_id"]]]);
            // [PHPDeobfuscator] Implied goto
            goto AO;
        }
        $Sp = wp_insert_term($zS["name"], "wpmf-category", ["slug" => $zS["slug"], "parent" => $pu[$zS["parent_folder_id"]]]);
        AO:
        if (!is_wp_error($Sp)) {
            if (!isset($Sp["term_id"])) {
                goto lA;
            }
            $To = $Sp["term_id"];
            $pu[$zS["id"]] = $To;
            sharepointWrapper::mo_sps_update_folder_map($zS["id"], $To);
            lA:
            $K2--;
            goto Cc;
        }
        return;
    }
    public function mo_sps_get_all_site_news()
    {
        $ri = explode($this->config["admin_uri"], $this->config["sps_relative_uri"]);
        if (empty($ri) || empty($ri[1])) {
            $ri = '';
            // [PHPDeobfuscator] Implied goto
            goto WU;
        }
        $ri = trailingslashit($ri[1] . '');
        WU:
        $YO = "https://" . wpWrapper::mo_sps_get_domain_from_url($this->config["sps_relative_uri"]) . "/_api/web/lists/getByTitle('Site Pages')/items/";
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        $i9 = ["Authorization" => "Bearer " . $this->access_token, "Accept" => "application/json; odata=verbose"];
        $Xj = $this->handler->mo_sps_get_request($YO, $i9);
        return $Xj;
    }
    public function mo_sps_get_all_site_events()
    {
        $ri = explode($this->config["admin_uri"], $this->config["sps_relative_uri"]);
        if (empty($ri) || empty($ri[1])) {
            $ri = '';
            // [PHPDeobfuscator] Implied goto
            goto OM;
        }
        $ri = trailingslashit($ri[1] . '');
        OM:
        $yJ = "https://" . wpWrapper::mo_sps_get_domain_from_url($this->config["sps_relative_uri"]) . "/_api/web/lists/getByTitle('Events')/items";
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        $i9 = ["Authorization" => "Bearer " . $this->access_token, "Accept" => "application/json; odata=verbose"];
        $Xj = $this->handler->mo_sps_get_request($yJ, $i9);
        return $Xj;
    }
    public function mo_sps_get_banerurl_for_an_artcile($DD)
    {
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        $i9 = ["Authorization" => "Bearer " . $this->access_token];
        $Xj = $this->handler->mo_sps_get_media_request($DD, $i9);
        return $Xj;
    }
    public function mo_sps_get_specific_user_detail()
    {
        $ri = explode($this->config["admin_uri"], $this->config["sps_relative_uri"]);
        if (empty($ri) || empty($ri[1])) {
            $ri = '';
            // [PHPDeobfuscator] Implied goto
            goto b4;
        }
        $ri = trailingslashit($ri[1] . '');
        b4:
        $Fe = "https://" . wpWrapper::mo_sps_get_domain_from_url($this->config["sps_relative_uri"]) . "/_api/web/GetFolderByServerRelativeUrl('/" . $ri . "')/?\$expand=Folders,Files";
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        $i9 = ["Authorization" => "Bearer " . $this->access_token, "Accept" => "application/json; odata=verbose"];
        $Xj = $this->handler->mo_sps_get_request($Fe, $i9);
        return $Xj;
    }
    public function mo_sps_sync_doc_media_lib()
    {
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_grpah_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        if (!(!$this->access_token || isset($this->access_token["error"]))) {
            $ll = wpWrapper::mo_sps_get_option("mo_sps_selected_site");
            $UM = wpWrapper::mo_sps_get_option("mo_sps_selected_drive");
            $o7 = "https://graph.microsoft.com/v1.0/sites/" . $ll["site_id"] . "/drives/" . $UM["drive_id"] . "/root/children";
            $i9 = ["Authorization" => "Bearer " . $this->access_token, "Content-type" => "application/json"];
            $dw = $this->handler->mo_sps_get_media_request($o7, $i9);
            $dw = json_decode($dw["data"], true);
            $St = $dw["value"];
            foreach ($St as $R4) {
                if (isset($R4["folder"])) {
                    wp_schedule_single_event(time(), "mo_sps_folder_sync_action", ["folder_id" => $R4["id"]]);
                    goto p4;
                }
                if (isset($R4["file"])) {
                    $Qw = wp_upload_dir();
                    $Kw = $Qw["path"];
                    $rm = $Qw["url"];
                    $Ya = $R4["name"];
                    $Cg = pathinfo($R4["name"], PATHINFO_EXTENSION);
                    $Jf = basename($R4["name"], "." . $Cg);
                    $cR = pluginConstants::MIME_TYPES;
                    $rv = admin_url("admin-ajax.php") . "?action=mo_sps_generate_url&file_id=" . $R4["id"] . "&drive_id=" . $R4["parentReference"]["driveId"];
                    $Vo = $Kw . "/" . $Ya;
                    $Ep = $this->mo_sps_post_exists_already($R4["id"]);
                    if ($Ep) {
                        $qO = get_post_thumbnail_id($Ep);
                        $jj = array("post_title" => $Jf, "post_status" => "inherit", "post_mime_type" => $cR[strtolower($Cg)], "meta_input" => array("mo_sps_file_url" => $rv, "mo_sps_file_id" => $R4["id"]));
                        wp_update_attachment_metadata($qO, $jj);
                        // [PHPDeobfuscator] Implied goto
                        goto Kz;
                    }
                    $this->mp_sps_insert_in_media_library($rm, $Ya, $Jf, $cR, $Cg, $rv, $Vo, $R4["id"]);
                    goto Kz;
                }
                Kz:
                p4:
            }
            // [PHPDeobfuscator] Implied return
            return;
        }
        return;
    }
    public function mo_sps_sync_folder_files_in_media($K2)
    {
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_grpah_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        if (!(!$this->access_token || isset($this->access_token["error"]))) {
            $UM = wpWrapper::mo_sps_get_option("mo_sps_selected_drive");
            $o7 = "https://graph.microsoft.com/v1.0/drives/" . $UM["drive_id"] . "/items/" . $K2 . "/children";
            $i9 = ["Authorization" => "Bearer " . $this->access_token, "Content-type" => "application/json"];
            $dw = $this->handler->mo_sps_get_media_request($o7, $i9);
            $dw = json_decode($dw["data"], true);
            $St = $dw["value"];
            foreach ($St as $R4) {
                if (!empty($R4["folder"]) && $R4["folder"]["childCount"]) {
                    wp_schedule_single_event(time(), "mo_sps_folder_sync_action", ["folder_id" => $R4["id"]]);
                    goto eD;
                }
                if (isset($R4["file"])) {
                    $Qw = wp_upload_dir();
                    $Kw = $Qw["path"];
                    $rm = $Qw["url"];
                    $Ya = $R4["name"];
                    $Cg = pathinfo($R4["name"], PATHINFO_EXTENSION);
                    $Jf = basename($R4["name"], "." . $Cg);
                    $cR = pluginConstants::MIME_TYPES;
                    $rv = admin_url("admin-ajax.php") . "?action=mo_sps_generate_url&file_id=" . $R4["id"] . "&drive_id=" . $R4["parentReference"]["driveId"];
                    $Vo = $Kw . "/" . $Ya;
                    $Ep = $this->mo_sps_post_exists_already($R4["id"]);
                    if ($Ep) {
                        $qO = get_post_thumbnail_id($Ep);
                        $jj = array("post_title" => $Jf, "post_status" => "inherit", "post_mime_type" => $cR[strtolower($Cg)], "meta_input" => array("mo_sps_file_url" => $rv, "mo_sps_file_id" => $R4["id"]));
                        wp_update_attachment_metadata($qO, $jj);
                        // [PHPDeobfuscator] Implied goto
                        goto IP;
                    }
                    $this->mp_sps_insert_in_media_library($rm, $Ya, $Jf, $cR, $Cg, $rv, $Vo, $R4["id"]);
                    goto IP;
                }
                IP:
                eD:
            }
            // [PHPDeobfuscator] Implied return
            return;
        }
        return;
    }
    public function mp_sps_insert_in_media_library($rm, $Ya, $Jf, $cR, $Cg, $rv, $Vo, $bH)
    {
        $qO = wp_insert_attachment(array("guid" => $rm . "/" . $Ya, "post_title" => $Jf, "post_status" => "inherit", "post_mime_type" => $cR[strtolower($Cg)], "meta_input" => array("mo_sps_file_url" => $rv, "mo_sps_file_id" => $bH)), $Vo);
        update_post_meta($qO, "_wp_attachment_file_urls", $rv);
        return $qO;
    }
    public function mo_sps_post_exists_already($Vh)
    {
        $Rr = "mo_sps_file_id";
        $i9 = array("post_type" => "attachment", "meta_key" => $Rr, "meta_value" => $Vh, "posts_per_page" => 1);
        $ug = get_posts($i9);
        if (!empty($ug)) {
            $Ep = $ug[0]->ID;
            return $Ep;
        }
        return false;
    }
    public function mo_sps_get_file_download_url($bH, $xc)
    {
        $this->access_token = sanitize_text_field($this->handler->mo_sps_get_grpah_access_token_using_client_credentials($this->endpoints, $this->config, $this->scope));
        if (!(!$this->access_token || isset($this->access_token["error"]))) {
            $o7 = "https://graph.microsoft.com/v1.0/drives/" . $xc . "/items/" . $bH;
            $i9 = ["Authorization" => "Bearer " . $this->access_token, "Content-type" => "application/json"];
            $dw = $this->handler->mo_sps_get_media_request($o7, $i9);
            $dw = json_decode($dw["data"], true);
            $o2["download_url"] = $dw["@microsoft.graph.downloadUrl"];
            $o2["file_type"] = $dw["file"]["mimeType"];
            return $o2;
        }
        return;
    }
}
