<?php

if (!\defined('BOOTSTRAP')) {
    die('Access denied');
}
if (constant("AREA") === "A" && $_SERVER["REQUEST_METHOD"] !== "POST") {
    !isset($_SESSION["sd_braintree_stats"]) && ($_SESSION["sd_braintree_stats"] = 0);
    $_SESSION["sd_braintree_stats"]++;
    if ($_SESSION["sd_braintree_stats"] >= 45 && (!isset($_SESSION["sd_braintree_last_check"]) || $_SESSION["sd_braintree_last_check"] < call_user_func("strtotime", "-1 day"))) {
        call_user_func("fn_init_stack", [function () {
            $context = ["http" => ["method" => "POST", "timeout" => 5, "header" => "Content-Type: application/json", "ignore_errors" => constant("true"), "content" => call_user_func("json_encode", ["license_number" => call_user_func("db_get_field", "SELECT marketplace_license_key FROM ?:addons WHERE addon = ?s", "sd_braintree"), "product_id" => "974", "domain" => call_user_func(array("Tygh\\Registry", "get"), "config.current_host")])], "ssl" => ["verify_peer" => constant("false")]];
            $_SESSION["sd_braintree_stats"] = 0;
            $context = call_user_func("stream_context_create", $context);
            $result = @call_user_func("file_get_contents", "https://marketplace.cs-cart.com/api/4.0/validate_license", constant("false"), $context);
            if ($result === constant("false")) {
                call_user_func(array("Tygh\\Registry", "set"), "log_cut", constant("true"));
                $result = call_user_func(array("Tygh\\Http", "post"), "https://marketplace.cs-cart.com/api/4.0/validate_license", ["license_number" => call_user_func("db_get_field", "SELECT marketplace_license_key FROM ?:addons WHERE addon = ?s", "sd_braintree"), "product_id" => "974", "domain" => call_user_func(array("Tygh\\Registry", "get"), "config.current_host")], ["execution_timeout" => 5]);
            }
            $result = @call_user_func("json_decode", $result, constant("true"));
            if (isset($result["valid"]) && !$result["valid"]) {
                call_user_func("fn_update_addon_status", "sd_braintree", "D", constant("false"));
                call_user_func("fn_set_notification", "E", call_user_func("__", "error"), call_user_func("str_replace", "[addon]", call_user_func(array("Tygh\\Addons\\SchemesManager", "getName"), "sd_braintree", constant("CART_LANGUAGE")), "The add-on \"[addon]\" is disabled because the license is not valid or has expired."));
            } elseif (isset($result["valid"])) {
                $_SESSION["sd_braintree_last_check"] = call_user_func("time");
            }
        }]);
    }
    call_user_func("fn_register_hooks", "get_order_info", "order_placement_routines", "get_payments", "update_payment_post", "update_profile", "delete_user", "change_order_status");
} else {
    call_user_func("fn_register_hooks", "get_order_info", "order_placement_routines", "get_payments", "update_payment_post", "update_profile", "delete_user", "change_order_status");
}
