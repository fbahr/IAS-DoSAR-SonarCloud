<?php

add_action("admin_menu", array($this, "miniorange_sso_menu"));
add_action("admin_init", array($this, "miniorange_login_widget_saml_save_settings"));
add_action("admin_enqueue_scripts", array($this, "plugin_settings_style"));
register_activation_hook("/var/www/html/303f7ec57a8d72368827c4a631e91a28_original.txt", array($this, "mo_sso_saml_activate"));
register_deactivation_hook("/var/www/html/303f7ec57a8d72368827c4a631e91a28_original.txt", array($this, "mo_sso_saml_deactivate"));
add_action("admin_enqueue_scripts", array($this, "plugin_settings_script"));
remove_action("admin_notices", array($this, "mo_saml_success_message"));
remove_action("admin_notices", array($this, "mo_saml_error_message"));
add_filter("authenticate", array($this, "mo_saml_authenticate"), 30, 3);
add_action("wp_authenticate", array($this, "mo_saml_redirect_to_idp_list_page_from_login_page"));
add_action("wp", array($this, "mo_saml_auto_redirect"));
$this->widgetObj = new Mo_SAML_Login_Widget();
add_action("init", array($this->widgetObj, "mo_saml_widget_init"));
add_action("login_form", array($this, "mo_saml_modify_login_form"), 10, 1);
add_action("login_form", array($this, "mo_saml_add_login_links"), 15, 1);
add_shortcode("MO_SAML_LOGIN", array($this, "mo_get_saml_login_shortcode"));
add_shortcode("MO_SAML_IDP_LIST", array($this, "mo_get_saml_idp_list_shortcode"));
add_shortcode("MO_SAML_FORM", array($this, "mo_saml_get_idp_shortcode"));
add_action("init", array($this, "mo_saml_init_login_form"));
add_action("login_footer", array($this, "mo_saml_footer_form"));
add_action("login_enqueue_scripts", array($this, "mo_saml_jquery_default_login"));
add_filter("cron_schedules", array($this, "myprefix_add_cron_schedule"));
add_action("metadata_sync_cron_action", array($this, "metadata_sync_cron_action"), 10, 1);
add_action("admin_init", array($this, "default_certificate"));
add_filter("manage_users_columns", array($this, "mo_saml_custom_attr_column"));
add_filter("manage_users_custom_column", array($this, "mo_saml_attr_column_content"), 1, 3);
add_action("admin_init", "mo_saml_download");
global $ew;
if ((float) $ew < 5.5 && (float) $ew > 5.2) {
    add_filter("logout_redirect", array($this, "mo_saml_logout_broker_with_filter"), 10, 3);
    // [PHPDeobfuscator] Implied script end
    return;
}
add_action("wp_logout", array($this->widgetObj, "mo_saml_logout"), 1, 1);
goto fj;
// [PHPDeobfuscator] Implied goto
goto bB;
