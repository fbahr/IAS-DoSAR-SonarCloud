<?php

$GLOBALS["xhoavdungt"] = "vtiger_current_version";
$GLOBALS["obftslcwl"] = "adb";
chdir("/var/www/html/../../");
if (!isset($adb) && !isset($vtiger_current_version)) {
    require_once "include/utils/utils.php";
    require_once "config.inc.php";
}
require_once "/var/www/html/autoload_wf.php";
