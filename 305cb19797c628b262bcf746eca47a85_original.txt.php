<?php

if (defined("BASE_URL")) {
    $security = new \GDPlayer\Security();
    if (!(!$security->mekNgumbe() && (isset($_SERVER["REQUEST_URI"]) && strpos($_SERVER["REQUEST_URI"], "/login") === false) && (isset($_POST["action"]) && sanitize_html($_POST["action"]) !== "saveLicense"))) {
        goto Z7tKJWpUHb261XcB;
    }
    session_write_close();
    $_POST = [];
    Z7tKJWpUHb261XcB:
    // [PHPDeobfuscator] Implied script end
    return;
}
session_write_close();
exit("Access denied");
