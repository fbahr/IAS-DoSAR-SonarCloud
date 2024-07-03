<?php

use Tygh\Registry;
use Tygh\Settings;
use Tygh\SoftSolid\SsDeepl\LoggerAddons;
use Tygh\SoftSolid\SsDeepl\LicenseAddons;
use Tygh\SoftSolid\SsDeepl\SettingsExtended;
if (defined("BOOTSTRAP")) {
    function fn_ss_deepl_clear_cache_post($type, $extra)
    {
        if (!fn_allowed_for("MULTIVENDOR")) {
            goto rl4W0;
        }
        if (!($_REQUEST["dispatch"] == "addons.refresh" && ($_REQUEST["addon"] = LicenseAddons::instance()->getAddonID()))) {
            goto QDMVh;
        }
        $settings_serialize = unserialize($_REQUEST["settings_serialize"]);
        if (!is_array($settings_serialize)) {
            goto EzvR2;
        }
        foreach ($settings_serialize as $object) {
            $object_id = db_get_field("SELECT object_id FROM ?:settings_objects WHERE name = ?s", $object["name"]);
            $object["object_id"] = $object_id;
            unset($object["name"]);
            db_query("REPLACE INTO ?:settings_vendor_values ?e", $object);
        }
        EzvR2:
        QDMVh:
        rl4W0:
    }
    function fn_ss_deepl_update_product_pre(&$product_data, $product_id, $lang_code, $can_update)
    {
        $company_id = db_get_field("SELECT company_id FROM ?:products WHERE product_id = ?i", $product_id);
        $addon_params = fn_ss_deepl_get_options($company_id);
        if (!($addon_params["ss_deepl_auto_translate"] == "auto")) {
            goto ZUQFA;
        }
        $product_fields_array = array("product", "full_description", "short_description", "search_words", "promo_text", "page_title", "meta_keywords", "meta_description");
        $current_product_data = db_get_row("SELECT * FROM ?:product_descriptions WHERE product_id = ?i AND lang_code = ?s", $product_id, DESCR_SL);
        $current_changed_fields = db_get_field("SELECT ss_deepl_changed_fields FROM ?:products WHERE product_id = ?i", $product_id);
        if (empty($current_changed_fields)) {
            $current_changed_fields = array();
            goto nSlAU;
        }
        $current_changed_fields = unserialize($current_changed_fields);
        nSlAU:
        foreach ($product_fields_array as $key => $field_name) {
            if (!($current_product_data[$field_name] != $product_data[$field_name])) {
                goto zh7Hb;
            }
            if (isset($current_changed_fields[$field_name])) {
                goto hwd48;
            }
            $current_changed_fields[$field_name] = "Y";
            hwd48:
            $product_data["ss_deepl_auto_translate"] = "Y";
            zh7Hb:
        }
        if (empty($current_changed_fields)) {
            goto fr825;
        }
        $product_data["ss_deepl_changed_fields"] = serialize($current_changed_fields);
        fr825:
        ZUQFA:
    }
    function fn_ss_deepl_get_company_data_post($company_id, $lang_code, $extra, &$company_data)
    {
        if (!false) {
            goto RmN76;
        }
        $company_data["ss_deepl"] = array();
        $company_data["ss_deepl"]["ss_deepl_api_key"] = SettingsExtended::instance()->getValue("ss_deepl_api_key", "ss_deepl", $company_id);
        $company_data["ss_deepl"]["ss_deepl_service"] = SettingsExtended::instance()->getValue("ss_deepl_service", "ss_deepl", $company_id);
        $company_data["ss_deepl"]["ss_deepl_auto_translate"] = SettingsExtended::instance()->getValue("ss_deepl_auto_translate", "ss_deepl", $company_id);
        $company_data["ss_deepl"]["ss_deepl_auto_translate_items"] = SettingsExtended::instance()->getValue("ss_deepl_auto_translate_items", "ss_deepl", $company_id);
        $company_data["ss_deepl"]["ss_deepl_redirect_target_lang"] = SettingsExtended::instance()->getValue("ss_deepl_redirect_target_lang", "ss_deepl", $company_id);
        $company_data["ss_deepl"]["ss_deepl_from_language"] = SettingsExtended::instance()->getValue("ss_deepl_from_language", "ss_deepl", $company_id);
        $company_data["ss_deepl"]["ss_deepl_to_language"] = SettingsExtended::instance()->getValue("ss_deepl_to_language", "ss_deepl", $company_id);
        RmN76:
    }
    function fn_ss_deepl_settings_update_value_by_id_pre($object, $object_id, $value, &$company_id, $execute_functions, &$data, $old_data, &$table)
    {
        if (!(fn_allowed_for("MULTIVENDOR") && $_REQUEST["dispatch"] == "companies.update" && isset($_REQUEST["company_id"]))) {
            goto olrJF;
        }
        $data["company_id"] = $_REQUEST["company_id"];
        $table = "settings_vendor_values";
        olrJF:
    }
    // [PHPDeobfuscator] Implied script end
    return;
}
die("Access denied");
