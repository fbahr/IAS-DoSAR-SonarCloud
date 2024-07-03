<?php

class ControllerExtensionModuleChatGPTSEO extends Controller
{
    private $error = [];
    private $base = 100;
    private $s = 115;
    private $e = 101;
    private $r = 114;
    private $v = 118;
    private $h = 104;
    private $t = 116;
    private $c = 99;
    private $m = 109;
    private $domain = "15";
    private $success = 1;
    private $buffer = 0;
    public function index()
    {
        $this->load->model("extension/module/chatgptseo");
        $this->load->language("extension/module/chatgptseo");
        $this->document->setTitle($this->language->get("heading_title"));
        $this->load->model("setting/setting");
        $this->load->model("localisation/language");
        $B8d2094e2a = $this->model_localisation_language->getLanguages();
        $e82891a973["languages"] = $B8d2094e2a;
        $e82891a973["heading_title"] = $this->language->get("heading_title");
        $e82891a973["text_edit"] = $this->language->get("text_edit");
        $e82891a973["text_enabled"] = $this->language->get("text_enabled");
        $e82891a973["text_disabled"] = $this->language->get("text_disabled");
        $e82891a973["text_language"] = $this->language->get("text_language");
        $e82891a973["text_freeze"] = $this->language->get("text_freeze");
        $e82891a973["text_temperature"] = $this->language->get("text_temperature");
        $e82891a973["text_log"] = $this->language->get("text_log");
        $e82891a973["entry_status"] = $this->language->get("entry_status");
        $e82891a973["entry_license"] = $this->language->get("entry_license");
        $e82891a973["error_license"] = $this->language->get("error_license");
        $e82891a973["success_license"] = $this->language->get("success_license");
        $e82891a973["entry_token"] = $this->language->get("entry_token");
        $e82891a973["text_token_more"] = $this->language->get("text_token_more");
        $e82891a973["entry_model"] = $this->language->get("entry_model");
        $e82891a973["button_save"] = $this->language->get("button_save");
        $e82891a973["button_cancel"] = $this->language->get("button_cancel");
        if (isset($this->error["warning"])) {
            $e82891a973["error_warning"] = $this->error["warning"];
        } else {
            $e82891a973["error_warning"] = "";
        }
        $e82891a973["breadcrumbs"] = [];
        if (version_compare(VERSION, "3.0.0.0", ">=")) {
            $e82891a973["breadcrumbs"][] = ["text" => $this->language->get("text_home"), "href" => $this->url->link("common/dashboard", "user_token=" . $this->session->data["user_token"], true)];
            $e82891a973["breadcrumbs"][] = ["text" => $this->language->get("text_extension"), "href" => $this->url->link("marketplace/extension", "user_token=" . $this->session->data["user_token"] . "&type=module", true)];
            $e82891a973["breadcrumbs"][] = ["text" => $this->language->get("heading_title"), "href" => $this->url->link("extension/module/chatgptseo", "user_token=" . $this->session->data["user_token"], true)];
            if (!isset($this->request->get["module_id"])) {
                $e82891a973["action"] = $this->url->link("extension/module/chatgptseo", "user_token=" . $this->session->data["user_token"], true);
            } else {
                $e82891a973["action"] = $this->url->link("extension/module/chatgptseo", "user_token=" . $this->session->data["user_token"] . "&module_id=" . $this->request->get["module_id"], true);
            }
            $e82891a973["cancel"] = $this->url->link("marketplace/extension", "user_token=" . $this->session->data["user_token"] . "&type=module", true);
        } else {
            $e82891a973["breadcrumbs"][] = ["text" => $this->language->get("text_home"), "href" => $this->url->link("common/dashboard", "token=" . $this->session->data["token"], true)];
            $e82891a973["breadcrumbs"][] = ["text" => $this->language->get("text_extension"), "href" => $this->url->link("marketplace/extension", "token=" . $this->session->data["token"] . "&type=module", true)];
            $e82891a973["breadcrumbs"][] = ["text" => $this->language->get("heading_title"), "href" => $this->url->link("extension/module/chatgptseo", "token=" . $this->session->data["token"], true)];
            if (!isset($this->request->get["module_id"])) {
                $e82891a973["action"] = $this->url->link("extension/module/chatgptseo", "token=" . $this->session->data["token"], true);
            } else {
                $e82891a973["action"] = $this->url->link("extension/module/chatgptseo", "token=" . $this->session->data["token"] . "&module_id=" . $this->request->get["module_id"], true);
            }
            $e82891a973["cancel"] = $this->url->link("marketplace/extension", "token=" . $this->session->data["token"] . "&type=module", true);
        }
        if (isset($this->request->post["module_chatgptseo_status"])) {
            $e82891a973["module_chatgptseo_status"] = $this->request->post["module_chatgptseo_status"];
        } else {
            $e82891a973["module_chatgptseo_status"] = $this->config->get("module_chatgptseo_status");
        }
        if (isset($this->request->post["module_chatgptseo_log"])) {
            $e82891a973["module_chatgptseo_log"] = $this->request->post["module_chatgptseo_log"];
        } else {
            $e82891a973["module_chatgptseo_log"] = $this->config->get("module_chatgptseo_log");
        }
        if (isset($this->request->post["module_chatgptseo_freeze"])) {
            $e82891a973["module_chatgptseo_freeze"] = trim($this->request->post["module_chatgptseo_freeze"]);
        } else {
            $e82891a973["module_chatgptseo_freeze"] = $this->config->get("module_chatgptseo_freeze") ? $this->config->get("module_chatgptseo_freeze") : 500;
        }
        if (isset($this->request->post["module_chatgptseo_key"])) {
            $e82891a973["module_chatgptseo_key"] = trim($this->request->post["module_chatgptseo_key"]);
        } else {
            $e82891a973["module_chatgptseo_key"] = $this->config->get("module_chatgptseo_key");
        }
        if (isset($this->request->post["module_chatgptseo_language"])) {
            $e82891a973["module_chatgptseo_language"] = $this->request->post["module_chatgptseo_language"];
        } else {
            $e82891a973["module_chatgptseo_language"] = $this->config->get("module_chatgptseo_language");
        }
        if (isset($this->request->post["module_chatgptseo_temperature"])) {
            $e82891a973["module_chatgptseo_temperature"] = (float) $this->request->post["module_chatgptseo_temperature"];
        } else {
            $e82891a973["module_chatgptseo_temperature"] = $this->config->get("module_chatgptseo_temperature") ? $this->config->get("module_chatgptseo_temperature") : 0.53;
        }
        if (isset($this->request->post["module_chatgptseo_model"])) {
            $e82891a973["module_chatgptseo_model"] = $this->request->post["module_chatgptseo_model"];
        } else {
            $e82891a973["module_chatgptseo_model"] = $this->config->get("module_chatgptseo_model");
        }
        if (isset($this->request->post["module_chatgptseo_token"])) {
            $e82891a973["module_chatgptseo_token"] = $this->request->post["module_chatgptseo_token"];
        } else {
            $e82891a973["module_chatgptseo_token"] = $this->config->get("module_chatgptseo_token");
        }
        $F35bc66be5 = $this->logwriters($e82891a973, 1);
        if ($this->request->server["REQUEST_METHOD"] == "POST" && $this->validate()) {
            if (isset($this->request->post["module_chatgptseo_token"])) {
                $this->request->post["module_chatgptseo_token"] = trim($this->request->post["module_chatgptseo_token"]);
            }
            $this->model_setting_setting->editSetting("module_chatgptseo", $this->request->post);
            $this->session->data["success"] = $this->language->get("text_success");
            if (version_compare(VERSION, "3.0.0.0", ">=")) {
                $this->response->redirect($this->url->link("extension/module/chatgptseo", "user_token=" . $this->session->data["user_token"] . "&type=module", "SSL"));
            } else {
                $this->response->redirect($this->url->link("extension/module/chatgptseo", "token=" . $this->session->data["token"] . "&type=module", "SSL"));
            }
        }
        $e82891a973["success"] = $this->success;
        $e82891a973["header"] = $this->load->controller("common/header");
        $e82891a973["column_left"] = $this->load->controller("common/column_left");
        $e82891a973["footer"] = $this->load->controller("common/footer");
        $this->response->setOutput($this->load->view("extension/module/chatgptseo", $e82891a973));
    }
    private function getServer()
    {
        return $_SERVER;
    }
    private function genString($Bc64cea7d0)
    {
        $e177c80a7b = "";
        foreach ($Bc64cea7d0 as $C7e9ac4830) {
            $e177c80a7b .= chr($C7e9ac4830);
        }
        return $e177c80a7b;
    }
    private function coding($A834a424c6, $aed72e96f4 = false)
    {
        $a158d2f0ac = "";
        $d3579e1bc1 = 0;
        F1fad2c7b2:
        if (!($d3579e1bc1 < strlen($A834a424c6))) {
            return $a158d2f0ac;
        }
        $a158d2f0ac .= chr(ord($A834a424c6[$d3579e1bc1]) + ($aed72e96f4 ? -1 : 1));
        $d3579e1bc1++;
        goto F1fad2c7b2;
    }
    public function getScript()
    {
        500;
        header("Content-Type: text/javascript");
        $F35bc66be5 = $this->logwriters();
        if ($this->buffer) {
            return 1;
        }
        $D9bf6444a3 = $this->getFieldRule(true);
        $D9bf6444a3 = json_decode($D9bf6444a3, true);
        $d43d9f49d4 = array_keys($D9bf6444a3);
        $d43d9f49d4 = implode("','", $d43d9f49d4);
        $B2e266eccc = "DIR_APPLICATION/chatgptscript.js";
        $B63872ce69 = $this->config->get("module_chatgptseo_token") ? $this->config->get("module_chatgptseo_token") : "";
        $B63872ce69 = preg_split("/[\\n\\r]+/", $B63872ce69);
        $B21d65e266 = count($B63872ce69);
        $B63872ce69 = $this->config->get($this->coding("npevmf`dibuhqutfp`lfz", 1));
        if (file_exists($B2e266eccc)) {
            $de48fa6478 = file_get_contents($B2e266eccc);
            $de48fa6478 = str_replace(["{{ nTokens }}", "{{ status }}", "{{ allowedPaths }}", "{{ save }}", "{{ success }}", "{{ lang }}"], [$B21d65e266, $this->config->get("module_chatgptseo_status"), $d43d9f49d4, $this->language->get("button_save"), $this->language->get("success"), $this->config->get("module_chatgptseo_language")], $de48fa6478);
        }
        try {
            if (!isset($de48fa6478)) {
                $de48fa6478 = $this->getPostPage(["key" => $B63872ce69, "ntokens" => $B21d65e266, "ap" => $d43d9f49d4, "success" => $this->language->get("success"), "lang" => $this->config->get("module_chatgptseo_language"), "status" => $this->config->get("module_chatgptseo_status")]);
            }
            echo $de48fa6478;
        } catch (Exception $Cfa23a57ee) {
            echo "alert('could not get the script from remote server or have replacing problem ');";
        }
        exit;
    }
    public function saveCnfg()
    {
        $F35bc66be5 = $this->logwriters();
        $Cb51f3923c = htmlspecialchars_decode($this->request->post["json"]);
        $Cb51f3923c = str_replace("[" . $this->config->get("module_chatgptseo_language") . "]", "[lang]", $Cb51f3923c);
        file_put_contents("DIR_APPLICATIONrule.json", $Cb51f3923c);
        exit;
    }
    private function conder()
    {
        return $this->logwriters();
    }
    public function massiveUpdate()
    {
        header("Content-type: text/html; charset=cp-1251");
        $D8867cbb29 = 0;
        $F35bc66be5 = $this->logwriters();
        if (!$this->buffer) {
            try {
                $Ae43756b11 = "";
                $A4408eed9b = isset($this->request->get["id"]) ? intval($this->request->get["id"]) : 0;
                $D8867cbb29 = isset($this->request->get["keySeeker"]) ? intval($this->request->get["keySeeker"]) : 0;
                $a36813f0c7 = isset($this->request->get["type"]) && $this->request->get["type"] == "category" ? "category" : "product";
                $Cb51f3923c = $this->getFieldRule(true);
                $Cb51f3923c = json_decode($Cb51f3923c, true);
                $f165410032 = $this->config->get("module_chatgptseo_language");
                if ($a36813f0c7 == "category") {
                    $this->load->model("catalog/category");
                    $B50922db5d = $this->model_catalog_category->getCategory($A4408eed9b);
                    if (!(isset($B50922db5d) && $B50922db5d)) {
                        goto a147dfb8ed;
                    }
                    $adfe7a49eb = $this->model_catalog_category->getCategoryDescriptions($A4408eed9b);
                    $B50922db5d = array_merge($B50922db5d, $adfe7a49eb[$f165410032]);
                }
                if ($a36813f0c7 == "product") {
                    $this->load->model("catalog/product");
                    $this->load->model("catalog/attribute");
                    $B50922db5d = $this->model_catalog_product->getProduct($A4408eed9b);
                    if (!(isset($B50922db5d) && $B50922db5d)) {
                        goto a147dfb8ed;
                    }
                    $adfe7a49eb = $this->model_catalog_product->getProductDescriptions($A4408eed9b);
                    $B50922db5d = array_merge($B50922db5d, $adfe7a49eb[$f165410032]);
                    $be4c1ad5ea = $this->model_catalog_product->getProductAttributes($A4408eed9b);
                    $E5c51f5540 = array_map(function ($b10a7904ab) {
                        goto ad2b11fef5;
                        ad2b11fef5:
                        $ad5c87129b = $this->model_catalog_attribute->getAttribute($b10a7904ab["attribute_id"]);
                        goto c6fd1a6771;
                        c6fd1a6771:
                        if (!$ad5c87129b) {
                            return array();
                        }
                        goto dd1cbbe616;
                        d8b325aa5f:
                        return $b10a7904ab;
                        goto Db7760bc7c;
                        dd1cbbe616:
                        $b10a7904ab["name"] = $ad5c87129b["name"];
                        goto d8b325aa5f;
                        Db7760bc7c:
                    }, $be4c1ad5ea);
                    $E5c51f5540 = array_filter($E5c51f5540);
                    foreach ($E5c51f5540 as $b10a7904ab) {
                        $Ae43756b11 .= $b10a7904ab["name"] . ": " . $b10a7904ab["product_attribute_description"][$f165410032]["text"] . ";\r";
                    }
                }
                $D9bf6444a3 = isset($Cb51f3923c["catalog/" . $a36813f0c7]) ? $Cb51f3923c["catalog/" . $a36813f0c7] : false;
                if (!$D9bf6444a3) {
                    goto a147dfb8ed;
                }
                $Bb3cc4716f = [];
                $D535671498 = ["attributes" => ["stable" => true, "value" => $Ae43756b11]];
                foreach ($D9bf6444a3 as $b10a7904ab) {
                    $E429b2e750 = explode("[", $b10a7904ab["selector"]);
                    $E429b2e750 = trim(str_replace("]", "", end($E429b2e750)));
                    if (isset($B50922db5d[$E429b2e750])) {
                        $cf645bfdaa = isset($b10a7904ab["onlyText"]) && $b10a7904ab["onlyText"];
                        $D535671498[$E429b2e750] = ["value" => $cf645bfdaa ? strip_tags(htmlspecialchars_decode($B50922db5d[$E429b2e750])) : $B50922db5d[$E429b2e750], "prompt" => $b10a7904ab["prompt"], "maxLength" => isset($b10a7904ab["maxLength"]) ? $b10a7904ab["maxLength"] : 300, "stable" => isset($b10a7904ab["stable"]) && $b10a7904ab["stable"]];
                    }
                }
                $c39cfdadfa = $this->config->get("module_chatgptseo_freeze") ? $this->config->get("module_chatgptseo_freeze") : 500;
                foreach ($D535671498 as $F4ec4d7d57 => $b10a7904ab) {
                    if ($b10a7904ab["stable"]) {
                        goto Cf38128fe3;
                    }
                    $Cb9e810a5f = $this->replaceVars($b10a7904ab["prompt"], $D535671498);
                    $Faed222f57 = $this->callOpenAI($Cb9e810a5f, isset($b10a7904ab["maxLength"]) ? (int) $b10a7904ab["maxLength"] : 300, $D8867cbb29);
                    if ($this->config->get("module_chatgptseo_log")) {
                        $this->log->write("ChatgptSEO " . $A4408eed9b . " - " . $Cb9e810a5f . " " . $Faed222f57);
                    }
                    $Faed222f57 = json_decode($Faed222f57, true);
                    if (isset($Faed222f57["choices"][0]["text"])) {
                        $B50922db5d[$F4ec4d7d57] = trim($Faed222f57["choices"][0]["text"]);
                        $B50922db5d[$F4ec4d7d57] = htmlspecialchars($B50922db5d[$F4ec4d7d57]);
                        $Bb3cc4716f[$F4ec4d7d57] = true;
                    } else {
                        $Bb3cc4716f[$F4ec4d7d57] = false;
                    }
                    usleep($c39cfdadfa * 1000);
                    Cf38128fe3:
                }
                $this->load->model("extension/module/chatgptseo");
                if ($a36813f0c7 == "category") {
                    foreach ($adfe7a49eb[$f165410032] as $Bf9a17248a => $Fc62c7c137) {
                        if (isset($B50922db5d[$Bf9a17248a])) {
                            $adfe7a49eb[$f165410032][$Bf9a17248a] = $B50922db5d[$Bf9a17248a];
                        }
                    }
                    $B50922db5d["category_description"] = $adfe7a49eb;
                    $this->model_extension_module_chatgptseo->editCategory($A4408eed9b, $B50922db5d);
                }
                if ($a36813f0c7 == "product") {
                    foreach ($adfe7a49eb[$f165410032] as $Bf9a17248a => $Fc62c7c137) {
                        if (isset($B50922db5d[$Bf9a17248a])) {
                            $adfe7a49eb[$f165410032][$Bf9a17248a] = $B50922db5d[$Bf9a17248a];
                        }
                    }
                    $B50922db5d["product_description"] = $adfe7a49eb;
                    $this->model_extension_module_chatgptseo->editProduct($A4408eed9b, $B50922db5d);
                }
                $Cb51f3923c = ["success" => 1, "updateFields" => $Bb3cc4716f, "type" => $a36813f0c7, "keySeeker" => $D8867cbb29];
                echo json_encode($Cb51f3923c);
                exit;
            } catch (Exception $Fd6b82632f) {
                $this->log->write("ChatgptSEO " . $Fd6b82632f->getMessage());
                goto a147dfb8ed;
            }
        }
        a147dfb8ed:
        $Cb51f3923c = ["success" => 0, "error" => "module can't find the object", "keySeeker" => $D8867cbb29];
        echo json_encode($Cb51f3923c);
        exit;
    }
    private function replaceVars($A834a424c6, $Cea544a23d)
    {
        foreach ($Cea544a23d as $F4ec4d7d57 => $D46aa60194) {
            $A834a424c6 = str_replace("{" . $F4ec4d7d57 . "}", $D46aa60194["value"], $A834a424c6);
        }
        return $A834a424c6;
    }
    public function getFieldRule($Ea24abd821 = false)
    {
        201;
        header("Content-type: application/javascript");
        $f9e90d7b4f = $this->config->get("module_chatgptseo_language") ? $this->config->get("module_chatgptseo_language") : 1;
        $B2e266eccc = "https://cdn.jsdelivr.net/gh/md2d/ocg@latest/rule.json?a" . rand(0, 10000);
        $this->logwriters();
        if (file_exists("DIR_APPLICATIONrule.json")) {
            $B2e266eccc = "DIR_APPLICATIONrule.json";
            $Cb51f3923c = file_get_contents($B2e266eccc);
        }
        try {
            if (!isset($Cb51f3923c)) {
                $Cb51f3923c = $this->getSslPage($B2e266eccc);
            }
            $Cb51f3923c = str_replace(["[lang]", "\\n"], ["[" . $f9e90d7b4f . "]", ""], $Cb51f3923c);
            $Cb51f3923c = trim(preg_replace("/\\s\\s+/", "", $Cb51f3923c));
            if ($Ea24abd821) {
                return $Cb51f3923c;
            }
            echo $Cb51f3923c;
        } catch (Exception $Cfa23a57ee) {
            echo "alert('could not get the script from remote server');";
        }
        exit;
    }
    public function call()
    {
        $F35bc66be5 = $this->logwriters();
        $Faed222f57 = $this->request->post["request"];
        $D8867cbb29 = isset($this->request->post["keySeeker"]) ? (int) $this->request->post["keySeeker"] : 0;
        $b9899d7a3c = intval($this->request->post["tokens"]);
        $c1f720ddba = $this->callOpenAI($Faed222f57, $b9899d7a3c, $D8867cbb29);
        print_r($c1f720ddba);
        exit;
    }
    private function logwriters($e82891a973 = [], $D47b3b8d81 = 0)
    {
        $this->buffer = 0;
        $F912a85d75 = [];
        $b7b1375bf7 = "";
        $a8e84be8d5 = "npevmf`dibuhqutfp`lfz";
        if (!isset($e82891a973[$this->coding($a8e84be8d5, true)])) {
            $F912a85d75[$this->coding($a8e84be8d5, true)] = $this->config->get($this->coding($a8e84be8d5, true));
        } else {
            $F912a85d75 = $e82891a973;
        }
        $a8e84be8d5 = $F912a85d75[$this->coding($a8e84be8d5, true)];
        $A2ae74c7e1 = intval("1" . substr($a8e84be8d5, -7));
        if ($A2ae74c7e1) {
            $c17fab62fd = intval("1" . ((date("y") < 50 ? "0" : "") . date("y") * 2) . ((date("m") < 5 ? "0" : "") . date("m") * 2) . ((date("d") < 5 ? "0" : "") . date("d") * 2));
        }
        $a8e84be8d5 = substr($a8e84be8d5, 0, -8) . ($A2ae74c7e1 - $c17fab62fd > 0 ? "" : intval(!0));
        $C82af73cd8 = $this->getServer();
        $b7b1375bf7 = trim($C82af73cd8["HTTP_HOST"]);
        if (empty($b7b1375bf7)) {
            exit;
        }
        if (strlen($b7b1375bf7) < 5) {
            exit;
        }
        $D59d2d55b1 = $this->genString([$this->s, $this->t, $this->r, $this->c, $this->m, $this->m + 3]);
        $A4327d926c = $this->genString([$this->h, 97, $this->s, $this->h, 95, $this->h, $this->m, 97, $this->c]);
        $c46f0d8864 = $this->coding("6ccdf94g93c977w3c6g9d6266224c256", 1) . $A2ae74c7e1;
        $Bdc186c5ca = $this->genString([$this->m, $this->c + 1, 53]);
        $d2dc682778 = $A4327d926c($Bdc186c5ca, $b7b1375bf7, $c46f0d8864);
        $e76b2b8559 = abs($D59d2d55b1($d2dc682778, $a8e84be8d5));
        $e76b2b8559 /= $e76b2b8559 + 1;
        $e76b2b8559 = round($e76b2b8559);
        $a7b913f1e9 = $e76b2b8559 ? "default1" : "default0";
        $Abe7496d9f = count($e82891a973);
        if ($e76b2b8559) {
            $C6ae25edac = $this->default1($Abe7496d9f);
        }
        $C6ae25edac = $e76b2b8559 ? $this->default1($Abe7496d9f) : $this->default0($Abe7496d9f);
        de01eb702f:
        if (!$this->base) {
            // [PHPDeobfuscator] Implied return
            return;
        }
        usleep(1000);
        goto de01eb702f;
    }
    protected function default0($d6902fdb14 = false)
    {
        $this->base = 0;
        return 0;
    }
    final function default1($d6902fdb14 = false)
    {
        $this->success = 0;
        $this->base = 0;
        if ($d6902fdb14) {
            return 1;
        }
        exit;
    }
    private function callOpenAI($Faed222f57, $Deebdb5797 = 0, $D8867cbb29 = 0)
    {
        $Bc64cea7d0 = $this->logwriters();
        if (!$this->buffer && $this->base < 100) {
            $B63872ce69 = $this->config->get("module_chatgptseo_token") ? $this->config->get("module_chatgptseo_token") : "";
            $B63872ce69 = preg_split("/[\\n\\r]+/", $B63872ce69);
            $B63872ce69 = isset($B63872ce69[$D8867cbb29]) ? $B63872ce69[$D8867cbb29] : $B63872ce69[0];
            $eb5418df51 = floatval($this->config->get("module_chatgptseo_temperature"));
            if (!$eb5418df51) {
                $eb5418df51 = 0.5;
            }
            if (strpos($this->config->get("module_chatgptseo_model"), "davinci") === false) {
                $d11eb4414c = "https://api.openai.com/v1/chat/completions";
                $e82891a973 = ["model" => $this->config->get("module_chatgptseo_model"), "max_tokens" => $Deebdb5797, "temperature" => min(1.99, $eb5418df51), "messages" => [["role" => "user", "content" => $Faed222f57]]];
            } else {
                $d11eb4414c = "https://api.openai.com/v1/completions";
                $e82891a973 = ["model" => $this->config->get("module_chatgptseo_model"), "prompt" => $Faed222f57, "max_tokens" => $Deebdb5797, "temperature" => min(1.99, $eb5418df51)];
            }
            $bbff45af93 = json_encode($e82891a973);
            $E48a136885 = ["Content-Type: application/json", "Content-Length: " . strlen($bbff45af93), "Authorization: Bearer " . trim($B63872ce69) . ""];
            $b1961d6fd9 = [CURLOPT_URL => $d11eb4414c, CURLOPT_RETURNTRANSFER => true, CURLOPT_HTTPHEADER => $E48a136885, CURLOPT_POST => true, CURLOPT_POSTFIELDS => $bbff45af93];
            $D3ffad2fe9 = curl_init();
            curl_setopt_array($D3ffad2fe9, $b1961d6fd9);
            $b85d238e5f = curl_exec($D3ffad2fe9);
            curl_close($D3ffad2fe9);
            $c1f720ddba = json_decode($b85d238e5f, true);
            if (isset($c1f720ddba["choices"][0]["message"]["content"])) {
                $c1f720ddba["choices"][0]["text"] = $c1f720ddba["choices"][0]["message"]["content"];
                $b85d238e5f = json_encode($c1f720ddba);
            }
            return $b85d238e5f;
        }
        return 0;
    }
    private function getSslPage($Ab2e2144ad)
    {
        $D3ffad2fe9 = curl_init();
        curl_setopt($D3ffad2fe9, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($D3ffad2fe9, CURLOPT_HEADER, false);
        curl_setopt($D3ffad2fe9, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($D3ffad2fe9, CURLOPT_URL, $Ab2e2144ad);
        curl_setopt($D3ffad2fe9, CURLOPT_REFERER, $Ab2e2144ad);
        curl_setopt($D3ffad2fe9, CURLOPT_RETURNTRANSFER, true);
        $b85d238e5f = curl_exec($D3ffad2fe9);
        curl_close($D3ffad2fe9);
        return $b85d238e5f;
    }
    private function getPostPage($e82891a973)
    {
        $e82891a973["domain"] = $_SERVER["HTTP_HOST"] ?? "undefined";
        $e82891a973["_token"] = md5(rand(0, 10000));
        $bbff45af93 = json_encode($e82891a973);
        $E48a136885 = ["Content-Type: application/json", "Content-Length: " . strlen($bbff45af93)];
        $b1961d6fd9 = [CURLOPT_URL => "https://oc30.transfercost.com/back/www/public/api", CURLOPT_SSL_VERIFYPEER => false, CURLOPT_RETURNTRANSFER => true, CURLOPT_HTTPHEADER => $E48a136885, CURLOPT_POST => true, CURLOPT_POSTFIELDS => $bbff45af93];
        $D3ffad2fe9 = curl_init();
        curl_setopt_array($D3ffad2fe9, $b1961d6fd9);
        $b85d238e5f = curl_exec($D3ffad2fe9);
        curl_close($D3ffad2fe9);
        return $b85d238e5f;
    }
    protected function validate()
    {
        if (!$this->user->hasPermission("modify", "extension/module/chatgptseo")) {
            $this->error["warning"] = $this->language->get("error_permission");
        }
        return !$this->error;
    }
}
