<?php

defined("BASEPATH") or exit("No direct script access allowed");
if (class_exists("L1c3n5380x4P1")) {
    $cMoMZzNq = new L1c3n5380x4P1();
    $kSX94OvV = $cMoMZzNq->v3r1phy_l1c3n53(true);
    if ($kSX94OvV["status"] != true) {
        $hook["post_controller_constructor"][] = array("function" => "force_ssl", "filename" => "init.php", "filepath" => "hooks");
    }
} else {
    require_once "APPPATHcore/core_init.php";
}
if (!(headers_sent() === false)) {
    die("Invalid license, please contact support.");
}
$hook["post_controller_constructor"][] = array("function" => "load_init_configs", "filename" => "init.php", "filepath" => "hooks");
$hook["display_overrride"][] = array("function" => "compress_output", "filename" => "compress.php", "filepath" => "hooks");
