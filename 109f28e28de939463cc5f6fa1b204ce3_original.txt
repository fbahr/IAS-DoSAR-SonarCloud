<?php

namespace OTP\Handler\Forms;

if (defined("ABSPATH")) {
    use OTP\Helper\FormSessionVars;
    use OTP\Helper\MoConstants;
    use OTP\Helper\MoMessages;
    use OTP\Helper\MoFormDocs;
    use OTP\Helper\MoPHPSessions;
    use OTP\Helper\MoUtility;
    use OTP\Helper\SessionUtils;
    use OTP\Objects\BaseMessages;
    use OTP\Objects\FormHandler;
    use OTP\Objects\IFormHandler;
    use OTP\Objects\VerificationType;
    use OTP\Traits\Instance;
    use ReflectionException;
    use WC_Checkout;
    use WP_Error;
    if (class_exists("WooCommerceCheckOutForm")) {
        goto DMv;
    }
    class WooCommerceCheckOutForm extends FormHandler implements IFormHandler
    {
        use Instance;
        private $guest_check_out_only;
        private $show_button;
        private $popup_enabled;
        private $payment_methods;
        private $selective_payment;
        private $disable_auto_login;
        private $mo_special_category_list;
        protected function __construct()
        {
            $this->is_login_or_social_form = false;
            $this->is_ajax_form = true;
            $this->form_session_var = FormSessionVars::WC_CHECKOUT;
            $this->type_phone_tag = "mo_wc_phone_enable";
            $this->type_email_tag = "mo_wc_email_enable";
            $this->phone_form_id = "input[name=billing_phone]";
            $this->form_key = "WC_CHECKOUT_FORM";
            $this->form_name = mo_("Woocommerce Checkout Form");
            $this->is_form_enabled = get_mo_option("wc_checkout_enable");
            $this->button_text = get_mo_option("wc_checkout_button_link_text");
            $this->button_text = !MoUtility::is_blank($this->button_text) ? $this->button_text : (!$this->popup_enabled ? mo_("Verify Your Purchase") : mo_("Place Order"));
            $this->form_documents = MoFormDocs::WC_CHECKOUT_LINK;
            parent::__construct();
        }
        public function handle_form()
        {
            if (!function_exists("is_plugin_active")) {
                include_once "ABSPATHwp-admin/includes/plugin.php";
            }
            if (is_plugin_active("woocommerce/woocommerce.php")) {
                if (!file_exists("MOV_DIRaddons/wcselectedcategory")) {
                    goto PiI;
                }
                add_action("woocommerce_checkout_before_customer_details", array($this, "webroom_check_if_product_category_in_cart"));
                PiI:
                $this->disable_auto_login = get_mo_option("wc_checkout_disable_auto_login");
                $this->payment_methods = maybe_unserialize(get_mo_option("wc_checkout_payment_type"));
                $this->payment_methods = $this->payment_methods ? $this->payment_methods : WC()->payment_gateways->payment_gateways();
                $this->popup_enabled = get_mo_option("wc_checkout_popup");
                $this->guest_check_out_only = get_mo_option("wc_checkout_guest");
                $this->show_button = get_mo_option("wc_checkout_button");
                $this->otp_type = get_mo_option("wc_checkout_type");
                $this->selective_payment = get_mo_option("wc_checkout_selective_payment");
                $this->restrict_duplicates = get_mo_option("wc_checkout_restrict_duplicates");
                if ($this->popup_enabled) {
                    add_action("woocommerce_after_checkout_billing_form", array($this, "add_custom_popup"), 99);
                    add_action("woocommerce_review_order_after_submit", array($this, "add_custom_button"), 1, 1);
                    // [PHPDeobfuscator] Implied goto
                    goto IrA;
                }
                add_action("woocommerce_after_checkout_billing_form", array($this, "my_custom_checkout_field"), 99);
                IrA:
                if (!$this->disable_auto_login) {
                    goto iha;
                }
                add_action("woocommerce_thankyou", array($this, "disable_auto_login_after_checkout"), 1, 1);
                iha:
                add_filter("woocommerce_checkout_posted_data", array($this, "billing_phone_process"), 99, 1);
                add_action("wp_enqueue_scripts", array($this, "enqueue_script_on_page"));
                add_action("woocommerce_after_checkout_validation", array($this, "my_custom_checkout_field_process"), 99, 2);
                $this->routeData();
                // [PHPDeobfuscator] Implied return
                return;
            }
            return;
        }
        public function webroom_check_if_product_category_in_cart()
        {
            MoPHPSessions::add_session_var("specialproductexist", "false");
            $this->mo_special_category_list = get_option("mo_wcsc_sms_wc_selected_category");
            foreach (WC()->cart->get_cart() as $or => $Lh) {
                $mT = $Lh["product_id"];
                $ba = wp_get_post_terms($mT, "product_cat");
                $ba = json_decode(wp_json_encode($ba), true);
                $ba = $ba[0]["name"];
                if (!in_array($ba, $this->mo_special_category_list, true)) {
                }
                MoPHPSessions::add_session_var("specialproductexist", "true");
                goto NgL;
            }
            NgL:
        }
        public function billing_phone_process($GX)
        {
            if (!(file_exists("MOV_DIRaddons/wcselectedcategory") && MoPHPSessions::get_session_var("specialproductexist") !== "true")) {
                $GX["billing_phone"] = MoUtility::process_phone_number($GX["billing_phone"]);
                return $GX;
            }
            return $GX;
        }
        public function disable_auto_login_after_checkout($DW)
        {
            MoPHPSessions::add_session_var("specialproductexist", "false");
            if (!is_user_logged_in()) {
                // [PHPDeobfuscator] Implied return
                return;
            }
            wp_logout();
            $ZX = isset($_SERVER["REQUEST_URI"]) ? esc_url_raw(wp_unslash($_SERVER["REQUEST_URI"])) : '';
            wp_safe_redirect($ZX);
            exit;
        }
        private function routeData()
        {
            if (array_key_exists("option", $_GET)) {
                if (!(strcasecmp(trim(sanitize_text_field(wp_unslash($_GET["option"]))), "miniorange-woocommerce-checkout") === 0)) {
                    goto mne;
                }
                $this->handle_woocommerce_checkout_form($_POST);
                mne:
                // [PHPDeobfuscator] Implied return
                return;
            }
            return;
        }
        private function handle_woocommerce_checkout_form($Jz)
        {
            MoUtility::initialize_transaction($this->form_session_var);
            if (strcasecmp($this->otp_type, $this->type_phone_tag) === 0) {
                $this->checkPhoneValidity($Jz);
                $this->send_challenge("test", sanitize_email($Jz["user_email"]), null, sanitize_text_field(trim($Jz["user_phone"])), VerificationType::PHONE);
                // [PHPDeobfuscator] Implied goto
                goto grM;
            }
            $this->send_challenge("test", sanitize_email($Jz["user_email"]), null, null, VerificationType::EMAIL);
            grM:
        }
        private function checkPhoneValidity($Jz)
        {
            if (!($this->isPhoneNumberAlreadyInUse(sanitize_text_field($Jz["user_phone"])) && $this->restrict_duplicates)) {
                // [PHPDeobfuscator] Implied return
                return;
            }
            wp_send_json(MoUtility::create_json(MoMessages::showMessage(MoMessages::PHONE_EXISTS), MoConstants::ERROR_JSON_TYPE));
            exit;
        }
        private function isPhoneNumberAlreadyInUse($M9)
        {
            global $wpdb;
            $M9 = MoUtility::process_phone_number($M9);
            $a6 = "billing_phone";
            $R2 = wp_get_current_user()->ID;
            $lR = $wpdb->get_row($wpdb->prepare("SELECT `user_id` FROM `{$wpdb->prefix}usermeta` WHERE `meta_key` = %s AND `meta_value` =  %s", array($a6, $M9)));
            return MoUtility::is_blank($lR) ? false : $lR->user_id !== $R2;
        }
        private function checkIfVerificationNotStarted()
        {
            if (SessionUtils::is_otp_initialized($this->form_session_var)) {
                return false;
            }
            wc_add_notice(MoMessages::showMessage(MoMessages::ENTER_VERIFY_CODE), MoConstants::ERROR_JSON_TYPE);
            return true;
        }
        private function checkIfVerificationCodeNotEntered()
        {
            if (!(array_key_exists("order_verify", $_POST) && !MoUtility::is_blank(sanitize_text_field(wp_unslash($_POST["order_verify"]))))) {
                if (strcasecmp($this->otp_type, $this->type_phone_tag) === 0) {
                    wc_add_notice(MoMessages::showMessage(MoMessages::ENTER_PHONE_CODE), MoConstants::ERROR_JSON_TYPE);
                    // [PHPDeobfuscator] Implied goto
                    goto fc5;
                }
                wc_add_notice(MoMessages::showMessage(MoMessages::ENTER_EMAIL_CODE), MoConstants::ERROR_JSON_TYPE);
                fc5:
                return true;
            }
            return false;
        }
        public function add_custom_button($W3)
        {
            if (!(file_exists("MOV_DIRaddons/wcselectedcategory") && MoPHPSessions::get_session_var("specialproductexist") !== "true")) {
                if (!($this->guest_check_out_only && is_user_logged_in())) {
                    $this->show_validation_button_or_text();
                    $this->common_button_or_link_enable_disable_script();
                    echo ",\$mo(\"#miniorange_otp_token_submit\").click(function(o){\r\n                    if(\$mo(\"#mo_message\").length == 0)\r\n                    {\r\n                    \$mo(\"<div id=\\\"mo_message\\\"></div>\").insertBefore(\"#mo_validate_field\");\r\n                    }\r\n                    var requiredFields = areAllMandotryFieldsFilled(),\r\n                    e=\$mo(\"input[name=billing_email]\").val(),\r\n                    m=\$mo(\"#billing_phone\").val(),\r\n                    a=\$mo(\"div.woocommerce\");\r\n                    if(requiredFields==\"\")\r\n                    {\r\n                        a.addClass(\"processing\").block({message:null,overlayCSS:{background:\"#fff\",opacity:.6}});\r\n                        \$mo.ajax({\r\n                            url:\"" . esc_url(site_url()) . "/?option=miniorange-woocommerce-checkout\",type:\"POST\",\r\n                            data:{user_email:e,user_phone:m},crossDomain:!0,dataType:\"json\",\r\n                            success:function(o){\r\n                                \"success\"==o.result?(\r\n                                    \$mo(\".blockUI\").hide(),\$mo(\"#mo_message\").empty(),\r\n                                    \$mo(\"#mo_message\").append(o.message).show(),\r\n                                    \$mo(\"#mo_message\").addClass(\"woocommerce-message\").removeClass(\"woocommerce-error\"),\r\n                                    //\$mo(\"#myModal .modal-content\").append(popupTemplate),\r\n                                    \$mo(\"#myModal\").show(),\$mo(\"#mo_validate_field\").show()):(\$mo(\".blockUI\").hide(),\$mo(\"#mo_message\").empty(),\r\n                                    \$mo(\"#mo_message\").append(o.message),\$mo(\"#mo_message\").addClass(\"woocommerce-error\"),\r\n                                    \$mo(\"#mo_validate_field\").hide(),\$mo(\"#myModal\").show()\r\n                                )\r\n                            },\r\n                            error:function(o,e,m){}\r\n                        });\r\n                    }else{\r\n                        \$mo(\".woocommerce-NoticeGroup-checkout\").empty();\r\n                        \$mo(\"form.woocommerce-checkout\").prepend(requiredFields);\r\n                        \$mo(\"html, body\").animate({scrollTop: \$mo(\".woocommerce-error\").offset().top}, 2000);\r\n                    }\r\n                    o.preventDefault()});\r\n                    \$mo(\"#miniorange_otp_validate_submit\").click(function(o){\$mo(\"#myModal\").hide(),\$mo('form[name=\"checkout\"]').submit()}),\r\n                    \$mo(\".close\").click(function(){\$mo(\".modal\").hide();});});";
                    echo "function areAllMandotryFieldsFilled(){\r\n                var err = '<div class=\"woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout\">'+\r\n                                '<ul class=\"woocommerce-error\" role=\"alert\">{{errors}}</ul>'+\r\n                         '</div>';\r\n                var errors = \"\";\r\n                \$mo(\".validate-required\").each(function(){\r\n                    var id = \$mo(this).attr(\"id\");\r\n                    if(id!=undefined){\r\n                        var n = id.replace(\"_field\",\"\");\r\n                        if(n!=\"\") {\r\n                            var val = \$mo(\"#\"+n).val();\r\n                            if((val==\"\" || val==\"select\") && checkOptionalMandatoryFields(n) ) {\r\n                                \$mo(\"#\"+n).addClass(\"woocommerce-invalid woocommerce-invalid-required-field\");\r\n                                errors  += \"<li><strong>\"+\r\n                                                \$mo(\"#\"+n+\"_field\").children(\"label\").text().replace(\"*\",\"\")+\r\n                                                \"</strong> is a required field.\"+\r\n                                            \"</li>\";\r\n                            }\r\n                        }\r\n                    }\r\n                });\r\n                return errors != \"\" ? err.replace(\"{{errors}}\",errors) : 0;\r\n            }\r\n            function checkOptionalMandatoryFields(n){\r\n                var optional = { \"shipping\": { \"fields\": [ \"shipping_first_name\",\"shipping_last_name\",\"shipping_postcode\",\"shipping_address_1\",\"shipping_address_2\",\"shipping_city\",\"shipping_state\"],\"checkbox\": \"ship-to-different-address-checkbox\"},\"account\": {\"fields\": [\"account_password\",\"account_username\"],\"checkbox\": \"createaccount\"}};\r\n                if(n.indexOf(\"shipping\") != -1){\r\n                   return check_fields(n,optional[\"shipping\"]);\r\n                }else if(n.indexOf(\"account\") != -1){\r\n                   return check_fields(n,optional[\"account\"]);\r\n                }\r\n                return true;\r\n            }\r\n            function check_fields(n,data){\r\n                if(\$mo.inArray(n,data[\"fields\"]) == -1 || (\$mo.inArray(n,data[\"fields\"]) > -1 &&\r\n                        \$mo(\"#\"+data['checkbox']+\":checked\").length > 0)) {\r\n                    return true;\r\n                }\r\n                return false;\r\n            }</script>";
                    // [PHPDeobfuscator] Implied return
                    return;
                }
                return;
            }
            return;
        }
        public function add_custom_popup()
        {
            if (!(file_exists("MOV_DIRaddons/wcselectedcategory") && MoPHPSessions::get_session_var("specialproductexist") !== "true")) {
                if (!($this->guest_check_out_only && is_user_logged_in())) {
                    echo "<style>@media only screen and (max-width: 800px) {.modal-content {width: 90% !important;}.modal-header .close{margin-left: 80% !important;}}.modal{display:none;position:fixed;z-index:1;padding-top:100px;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgb(0,0,0);background-color:rgba(0,0,0,0.4);}.modal-content{position:relative;background-color:#fefefe;margin:auto;padding:0;border:1px solid #888;width:40%;box-shadow:04px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);-webkit-animation-name:animatetop;-webkit-animation-duration:0.4s;animation-name:animatetop;animation-duration:0.4s}@-webkit-keyframes animatetop{from{top:-300px;opacity:0}to{top:0;opacity:1}}@keyframes animatetop{from{top:-300px;opacity:0}to{top:0;opacity:1}}.close{color:white;font-weight:bold;}.close:hover,.close:focus{color:#000;text-decoration:none;cursor:pointer;}.modal-header{background-color:#5cb85c;color:white;}.modal-footer{background-color:#5cb85c;color:white;</style>";
                    echo "<script>\r\n                var e = '<div id=\"myModal\" class=\"modal\"><div class=\"modal-content\"><div class=\"modal-header\"> <i><span style=\"margin-left:90%;\" class=\"close\" id=\"close\"> close </span></i> </div><div class=\"modal-body\"><div id=\"mo_message\"></div><div id=\"mo_validate_field\" style=\"margin:1em\"><input type=\"text\" name=\"order_verify\" autofocus=\"true\" placeholder=\"\" id=\"mo_otp_token\" required=\"true\" style=\"color: #000;font-family: Helvetica,sans-serif;padding: 7px;text-shadow: 1px 1px 0 #fff;width: 100%;border-radius: 2px;\" class=\"mo_customer_validation-textbox\" autofocus=\"true\"/><input type=\"button\" name=\"miniorange_otp_validate_submit\"  style=\"margin-top:1%;width:100%\" id=\"miniorange_otp_validate_submit\" class=\"miniorange_otp_token_submit\"  value=\"" . esc_attr(mo_("Validate OTP")) . "\" /></div></div></div></div>';\r\n                jQuery('form[name=\"checkout\"]').append(e);\r\n             </script>";
                    // [PHPDeobfuscator] Implied return
                    return;
                }
                return;
            }
            return;
        }
        public function my_custom_checkout_field($j_)
        {
            if (!(file_exists("MOV_DIRaddons/wcselectedcategory") && MoPHPSessions::get_session_var("specialproductexist") !== "true")) {
                if (!($this->guest_check_out_only && is_user_logged_in())) {
                    echo "<div id=\"mo_validation_wrapper\">";
                    $this->show_validation_button_or_text();
                    echo "<div id=\"mo_message\" hidden></div>";
                    woocommerce_form_field("order_verify", array("type" => "text", "class" => array("form-row-wide"), "label" => mo_("Verify Code"), "required" => true, "placeholder" => mo_("Enter Verification Code")), $j_->get_value("order_verify"));
                    $this->place_after_validating_field();
                    $this->common_button_or_link_enable_disable_script();
                    echo ",\$mo(\"#miniorange_otp_token_submit\").click(function(o){\r\n            if(\$mo(\"#mo_message\").length==0)\r\n            {\r\n                \$mo(\"<div id=\\\"mo_message\\\"></div>\").insertBefore(\"#order_verify_field\");\r\n            }\r\n        })";
                    echo ",\$mo(\".woocommerce-error\").length>0&&\$mo(\"html, body\").animate({scrollTop:\$mo(\"div.woocommerce\").offset().top-50},1e3),\$mo(\"#miniorange_otp_token_submit\").click(function(o){var e=\$mo(\"input[name=billing_email]\").val(),n=\$mo(\"#billing_phone\").val(),a=\$mo(\"div.woocommerce\");a.addClass(\"processing\").block({message:null,overlayCSS:{background:\"#fff\",opacity:.6}}),\$mo.ajax({url:\"" . esc_url(site_url()) . "/?option=miniorange-woocommerce-checkout\",type:\"POST\",data:{user_email:e, user_phone:n},crossDomain:!0,dataType:\"json\",success:function(o){ if(o.result==\"success\"){\$mo(\".blockUI\").hide(),\$mo(\"#mo_message\").empty(),\$mo(\"#mo_message\").append(o.message),\$mo(\"#mo_message\").addClass(\"woocommerce-message\").removeClass(\"woocommerce-error\"),\$mo(\"#mo_message\").show()}else{\$mo(\".blockUI\").hide(),\$mo(\"#mo_message\").empty(),\$mo(\"#mo_message\").append(o.message),\$mo(\"#mo_message\").addClass(\"woocommerce-error\"),\$mo(\"#mo_message\").show();} ;},error:function(o,e,n){}}),o.preventDefault()});});</script></div>";
                    // [PHPDeobfuscator] Implied return
                    return;
                }
                return;
            }
            return;
        }
        private function show_validation_button_or_text()
        {
            if ($this->show_button) {
                goto xAI;
            }
            $this->showTextLinkOnPage();
            xAI:
            if (!$this->show_button) {
                goto RTP;
            }
            $this->mo_showButtonOnPage();
            RTP:
        }
        private function showTextLinkOnPage()
        {
            if (strcasecmp($this->otp_type, $this->type_phone_tag) === 0) {
                echo "<div style = \"margin-bottom: 15px;\" title=\"" . esc_attr(mo_("Please Enter a Phone Number to enable this link")) . "\">\r\n                        <a  href=\"#\" style=\"text-align:center;color:grey;pointer-events:initial;display:none;\" \r\n                            id=\"miniorange_otp_token_submit\" \r\n                            class=\"\" >" . esc_html(mo_($this->button_text)) . "\r\n                        </a>\r\n                   </div>";
                // [PHPDeobfuscator] Implied goto
                goto tzn;
            }
            echo "<div style = \"margin-bottom: 15px;\" title=\"" . esc_attr(mo_("Please Enter an Email Address to enable this link")) . "\">\r\n                        <a  href=\"#\" \r\n                            style=\"text-align:center;color:grey;pointer-events:initial;display:none;\" \r\n                            id=\"miniorange_otp_token_submit\" \r\n                            class=\"\" >" . esc_html(mo_($this->button_text)) . "\r\n                        </a>\r\n                   </div>";
            tzn:
        }
        private function mo_showButtonOnPage()
        {
            if (strcasecmp($this->otp_type, $this->type_phone_tag) === 0) {
                echo "<input type=\"button\" class=\"button alt\" style=\"" . ($this->popup_enabled ? "float: right;line-height: 1;margin-right: 2em;padding: 1em 2em; display:none;" : "display:none;width:100%;margin-bottom: 15px;") . "\" id=\"miniorange_otp_token_submit\" title=\"" . esc_attr(mo_("Please Enter a Phone Number to enable this.")) . "\" value=\"";
                // [PHPDeobfuscator] Implied goto
                goto neN;
            }
            echo "<input type=\"button\" class=\"button alt\" style=\"" . ($this->popup_enabled ? "float: right;line-height: 1;margin-right: 2em;padding: 1em 2em; display:none;" : "display:none;width:100%;margin-bottom: 15px;") . "\" id=\"miniorange_otp_token_submit\" title=\"" . esc_attr(mo_("Please Enter an Email Address to enable this.")) . "\" value=\"";
            neN:
            echo esc_attr(mo_($this->button_text)) . "\"></input>";
        }
        private function common_button_or_link_enable_disable_script()
        {
            echo "<script>jQuery(document).ready(function() { \$mo = jQuery,";
            echo "\$mo(\".woocommerce-message\").length>0&&(\$mo(\"#mo_message\").addClass(\"woocommerce-message\"),\$mo(\"#mo_message\").show())";
        }
        private function place_after_validating_field()
        {
            echo "<script>jQuery(document).ready(function(){\r\n                    setTimeout(function(){\r\n                        jQuery(\"#mo_validation_wrapper\").insertAfter(\"#billing_" . (strcasecmp($this->otp_type, $this->type_phone_tag) === 0 ? "phone" : "email") . "_field\");\r\n                    },200);\r\n        });</script>";
        }
        public function my_custom_checkout_field_process($GX, $errors)
        {
            if (!(file_exists("MOV_DIRaddons/wcselectedcategory") && MoPHPSessions::get_session_var("specialproductexist") !== "true")) {
                if (MoUtility::is_blank($errors->get_error_messages())) {
                    if (!($this->guest_check_out_only && is_user_logged_in())) {
                        if ($this->isPaymentVerificationNeeded()) {
                            if (!$this->checkIfVerificationNotStarted()) {
                                if (!$this->checkIfVerificationCodeNotEntered()) {
                                    $this->handle_otp_token_submitted();
                                    // [PHPDeobfuscator] Implied return
                                    return;
                                }
                                return;
                            }
                            return;
                        }
                        return;
                    }
                    return;
                }
                return;
            }
            return;
        }
        private function handle_otp_token_submitted()
        {
            if (strcasecmp($this->otp_type, $this->type_phone_tag) === 0) {
                $kS = $this->process_phone_number();
                // [PHPDeobfuscator] Implied goto
                goto EPw;
            }
            $kS = $this->processEmail();
            EPw:
            if ($kS) {
                goto QaI;
            }
            $this->validate_challenge($this->get_verification_type(), "order_verify");
            QaI:
        }
        private function isPaymentVerificationNeeded()
        {
            $Uy = isset($_POST["payment_method"]) ? sanitize_text_field(wp_unslash($_POST["payment_method"])) : '';
            return $this->selective_payment ? array_key_exists($Uy, $this->payment_methods) : true;
        }
        private function process_phone_number()
        {
            $M9 = isset($_POST["billing_phone"]) ? MoUtility::process_phone_number(sanitize_text_field(wp_unslash($_POST["billing_phone"]))) : '';
            if (!(strcasecmp(MoPHPSessions::get_session_var("phone_number_mo"), $M9) !== 0)) {
                return false;
            }
            wc_add_notice(MoMessages::showMessage(MoMessages::PHONE_MISMATCH), MoConstants::ERROR_JSON_TYPE);
            return true;
        }
        private function processEmail()
        {
            $ed = isset($_POST["billing_email"]) ? sanitize_email(wp_unslash($_POST["billing_email"])) : '';
            if (!(strcasecmp(MoPHPSessions::get_session_var("user_email"), $ed) !== 0)) {
                return false;
            }
            wc_add_notice(MoMessages::showMessage(MoMessages::EMAIL_MISMATCH), MoConstants::ERROR_JSON_TYPE);
            return true;
        }
        public function handle_failed_verification($kD, $Wb, $bV, $I2)
        {
            wc_add_notice(MoUtility::get_invalid_otp_method(), MoConstants::ERROR_JSON_TYPE);
        }
        public function handle_post_verification($Ug, $kD, $Wb, $L8, $bV, $ia, $I2)
        {
            $this->unset_otp_session_variables();
            MoPHPSessions::unset_session("specialproductexist");
        }
        public function enqueue_script_on_page()
        {
            if (!(file_exists("MOV_DIRaddons/wcselectedcategory") && MoPHPSessions::get_session_var("specialproductexist") !== "true")) {
                $pO = "MOV_URLincludes/js/wccheckout.min.js?version=MOV_VERSION";
                wp_register_script("wccheckout", $pO, array("jquery"), MOV_VERSION, true);
                wp_localize_script("wccheckout", "mowccheckout", array("paymentMethods" => $this->payment_methods, "selectivePaymentEnabled" => $this->selective_payment, "popupEnabled" => $this->popup_enabled, "isLoggedIn" => $this->guest_check_out_only && is_user_logged_in(), "otpType" => strcasecmp($this->otp_type, $this->type_phone_tag) === 0 ? "phone" : "email"));
                wp_enqueue_script("wccheckout");
                // [PHPDeobfuscator] Implied return
                return;
            }
            return;
        }
        public function unset_otp_session_variables()
        {
            SessionUtils::unset_session(array($this->tx_session_id, $this->form_session_var));
        }
        public function get_phone_number_selector($MI)
        {
            if (!($this->is_form_enabled() && $this->otp_type === $this->type_phone_tag)) {
                goto Fne;
            }
            array_push($MI, $this->phone_form_id);
            Fne:
            return $MI;
        }
        public function handle_form_options()
        {
            if (!(!MoUtility::are_form_options_being_saved($this->get_form_option()) || !current_user_can("manage_options") || !check_admin_referer($this->admin_nonce))) {
                if (!function_exists("is_plugin_active")) {
                    include_once "ABSPATHwp-admin/includes/plugin.php";
                }
                if (is_plugin_active("woocommerce/woocommerce.php")) {
                    $GX = MoUtility::mo_sanitize_array($_POST);
                    $zu = array();
                    if (!array_key_exists("wc_payment", $GX)) {
                        goto sH_;
                    }
                    foreach ($GX["wc_payment"] as $PE) {
                        $zu[$PE] = $PE;
                    }
                    sH_:
                    $this->is_form_enabled = $this->sanitize_form_post("wc_checkout_enable");
                    $this->otp_type = $this->sanitize_form_post("wc_checkout_type");
                    $this->guest_check_out_only = $this->sanitize_form_post("wc_checkout_guest");
                    $this->show_button = $this->sanitize_form_post("wc_checkout_button");
                    $this->popup_enabled = $this->sanitize_form_post("wc_checkout_popup");
                    $this->selective_payment = $this->sanitize_form_post("wc_checkout_selective_payment");
                    $this->button_text = $this->sanitize_form_post("wc_checkout_button_link_text");
                    $this->payment_methods = $zu;
                    $this->disable_auto_login = $this->sanitize_form_post("wc_checkout_disable_auto_login");
                    $this->restrict_duplicates = $this->sanitize_form_post("wc_checkout_restrict_duplicates");
                    if (!$this->basic_validation_check(BaseMessages::WC_CHECKOUT_CHOOSE)) {
                        goto AXI;
                    }
                    update_mo_option("wc_checkout_restrict_duplicates", $this->restrict_duplicates);
                    update_mo_option("wc_checkout_disable_auto_login", $this->disable_auto_login);
                    update_mo_option("wc_checkout_enable", $this->is_form_enabled);
                    update_mo_option("wc_checkout_type", $this->otp_type);
                    update_mo_option("wc_checkout_guest", $this->guest_check_out_only);
                    update_mo_option("wc_checkout_button", $this->show_button);
                    update_mo_option("wc_checkout_popup", $this->popup_enabled);
                    update_mo_option("wc_checkout_selective_payment", $this->selective_payment);
                    update_mo_option("wc_checkout_button_link_text", $this->button_text);
                    update_mo_option("wc_checkout_payment_type", maybe_serialize($zu));
                    AXI:
                    // [PHPDeobfuscator] Implied return
                    return;
                }
                return;
            }
            return;
        }
        public function isGuestCheckoutOnlyEnabled()
        {
            return $this->guest_check_out_only;
        }
        public function showButtonInstead()
        {
            return $this->show_button;
        }
        public function isPopUpEnabled()
        {
            return $this->popup_enabled;
        }
        public function getPaymentMethods()
        {
            return $this->payment_methods;
        }
        public function isSelectivePaymentEnabled()
        {
            return $this->selective_payment;
        }
        public function isAutoLoginDisabled()
        {
            return $this->disable_auto_login;
        }
    }
    DMv:
}
exit;
