<?php

/* ### OBF ### */
include_once "/var/www/html/../include/check.php";
set_time_limit(300);
$tool = "/usr/bin/mod_stb.sh";
switch ($ARGUMENTS[0]) {
    case "apply":
    case "restore":
    case "factory":
        echo exec("{$tool} 2>&1 1>/dev/null");
        goto zNXhZ;
    default:
        echo "unknown command";
        goto zNXhZ;
}
zNXhZ:
$processed = true;
