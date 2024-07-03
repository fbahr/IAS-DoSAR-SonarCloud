<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
require_once "init.php";
if (!($F2d4d8f7981ac574["enable_cache"] && !file_exists("CACHE_TMP_PATHcache_complete") or empty($F2d4d8f7981ac574["live_streaming_pass"]))) {
    goto e209f8df561963e1;
}
generateError("CACHE_INCOMPLETE");
e209f8df561963e1:
$D78b6d56a11571aa = false;
$Aeadc6eca40ba3fd = null;
if (!(isset($_GET["token"]) && !ctype_xdigit($_GET["token"]))) {
    goto F8b7965a6a173898;
}
$a27e64cc6ce01033 = explode("/", Xui\Functions::decrypt($_GET["token"], $F2d4d8f7981ac574["live_streaming_pass"], OPENSSL_EXTRA));
$_GET["type"] = $a27e64cc6ce01033[0];
$E77573c0f7f19bf9 = explode("::", $_GET["type"]);
if (!(count($E77573c0f7f19bf9) == 2)) {
    goto d26e381c86264092;
}
$_GET["type"] = $E77573c0f7f19bf9[1];
$D78b6d56a11571aa = true;
d26e381c86264092:
if ($_GET["type"] == "timeshift") {
    $_GET["username"] = $a27e64cc6ce01033[1];
    $_GET["password"] = $a27e64cc6ce01033[2];
    $_GET["duration"] = $a27e64cc6ce01033[3];
    $_GET["start"] = $a27e64cc6ce01033[4];
    $_GET["stream"] = $a27e64cc6ce01033[5];
    if (!$D78b6d56a11571aa) {
        goto c4a91e6a2e0ac630;
    }
    $Aeadc6eca40ba3fd = $a27e64cc6ce01033[6];
    c4a91e6a2e0ac630:
    $_GET["extension"] = "ts";
    // [PHPDeobfuscator] Implied goto
    goto Fdaf552e8fff3833;
}
$_GET["username"] = $a27e64cc6ce01033[1];
$_GET["password"] = $a27e64cc6ce01033[2];
$_GET["stream"] = $a27e64cc6ce01033[3];
if (!(count($a27e64cc6ce01033) >= 5)) {
    goto cfa7ab0db4a66af0;
}
$_GET["extension"] = $a27e64cc6ce01033[4];
cfa7ab0db4a66af0:
if (!(count($a27e64cc6ce01033) == 6)) {
    goto ab67837befcdb747;
}
if ($D78b6d56a11571aa) {
    $Aeadc6eca40ba3fd = $a27e64cc6ce01033[5];
    // [PHPDeobfuscator] Implied goto
    goto C83a4a0648c3d4e0;
}
$F029d0a6c29fd5a2 = $a27e64cc6ce01033[5];
C83a4a0648c3d4e0:
ab67837befcdb747:
if (isset($_GET["extension"])) {
    goto B291b8bfad69fffc;
}
$_GET["extension"] = "ts";
B291b8bfad69fffc:
Fdaf552e8fff3833:
unset($_GET["token"]);
unset($a27e64cc6ce01033);
F8b7965a6a173898:
if (!isset($_GET["utc"])) {
    goto B01aa01202c36f5a;
}
$_GET["type"] = "timeshift";
$_GET["start"] = $_GET["utc"];
$_GET["duration"] = 21600;
unset($_GET["utc"]);
B01aa01202c36f5a:
$E379394c7b1a273f = $_GET["type"] ?? "live";
$F26087d31c2bbe4d = intval($_GET["stream"]);
$F9452a7efafa1aba = isset($_GET["extension"]) ? strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', trim($_GET["extension"]))) : null;
if (!(!$F9452a7efafa1aba && in_array($E379394c7b1a273f, array("movie", "series", "subtitle")))) {
    goto d338dc1974680c24;
}
$f523e362fb81d6c8 = pathinfo($_GET["stream"]);
$F26087d31c2bbe4d = intval($f523e362fb81d6c8["filename"]);
$F9452a7efafa1aba = strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', trim($f523e362fb81d6c8["extension"])));
d338dc1974680c24:
if ($F9452a7efafa1aba) {
    goto ce855362b50cca10;
}
switch ($E379394c7b1a273f) {
    case "timeshift":
    case "live":
        $F9452a7efafa1aba = "ts";
        goto b5ed8686d13bb0ef;
    case "series":
    case "movie":
        $F9452a7efafa1aba = "mp4";
        goto b5ed8686d13bb0ef;
}
b5ed8686d13bb0ef:
ce855362b50cca10:
if (!(!$F26087d31c2bbe4d or $F2d4d8f7981ac574["enable_cache"] && !file_exists("STREAMS_TMP_PATHstream_" . $F26087d31c2bbe4d))) {
    goto b1d08ffc0566bea0;
}
generateError("INVALID_STREAM_ID");
b1d08ffc0566bea0:
if (!($F2d4d8f7981ac574["ignore_invalid_users"] && $F2d4d8f7981ac574["enable_cache"])) {
    goto Bfdb14db84d9a270;
}
if (isset($_GET["token"])) {
    if (file_exists("LINES_TMP_PATHline_t_" . $_GET["token"])) {
        goto C77b4bc3ad0b44ee;
    }
    generateError("INVALID_CREDENTIALS");
    // [PHPDeobfuscator] Implied goto
    goto C77b4bc3ad0b44ee;
}
if (!(isset($_GET["username"]) && isset($_GET["password"]))) {
    goto e9efb19058da30e3;
}
if ($F2d4d8f7981ac574["case_sensitive_line"]) {
    $Bc16cc77a681d1ed = "LINES_TMP_PATHline_c_" . $_GET["username"] . "_" . $_GET["password"];
    // [PHPDeobfuscator] Implied goto
    goto A60ae6f36a8611fe;
}
$Bc16cc77a681d1ed = "LINES_TMP_PATHline_c_" . strtolower($_GET["username"]) . "_" . strtolower($_GET["password"]);
A60ae6f36a8611fe:
if (file_exists($Bc16cc77a681d1ed)) {
    goto cdb597d0fc887028;
}
generateError("INVALID_CREDENTIALS");
cdb597d0fc887028:
e9efb19058da30e3:
C77b4bc3ad0b44ee:
Bfdb14db84d9a270:
if (!($F2d4d8f7981ac574["enable_cache"] && !$F2d4d8f7981ac574["show_not_on_air_video"] && file_exists("CACHE_TMP_PATHservers"))) {
    goto Ffd7b4cd35c3ce7b;
}
$a8bb73cba48fb7f6 = igbinary_unserialize(file_get_contents("CACHE_TMP_PATHservers"));
$f523e362fb81d6c8 = igbinary_unserialize(file_get_contents("STREAMS_TMP_PATHstream_" . $F26087d31c2bbe4d)) ?: null;
$c43b488500f8fab7 = array();
if ($E379394c7b1a273f == "archive") {
    if (!($f523e362fb81d6c8["info"]["tv_archive_duration"] > 0 && $f523e362fb81d6c8["info"]["tv_archive_server_id"] > 0 && array_key_exists($f523e362fb81d6c8["info"]["tv_archive_server_id"], $a8bb73cba48fb7f6) && $a8bb73cba48fb7f6[rStream["info"]["tv_archive_server_id"]]["server_online"])) {
        goto c2ba9e826abff63f;
    }
    $c43b488500f8fab7[] = array($f523e362fb81d6c8["info"]["tv_archive_server_id"]);
    c2ba9e826abff63f:
    goto db842abc3da59d73;
}
if (!($f523e362fb81d6c8["info"]["direct_source"] == 1 && $f523e362fb81d6c8["info"]["direct_proxy"] == 0)) {
    goto b6438e7c7e0d8d29;
}
$c43b488500f8fab7[] = $d58b4f8653a391d8;
b6438e7c7e0d8d29:
foreach ($a8bb73cba48fb7f6 as $d58b4f8653a391d8 => $cc5f26dd881329b7) {
    if (!(!array_key_exists($d58b4f8653a391d8, $f523e362fb81d6c8["servers"]) || !$cc5f26dd881329b7["server_online"] || $cc5f26dd881329b7["server_type"] != 0)) {
        if (!isset($f523e362fb81d6c8["servers"][$d58b4f8653a391d8])) {
            goto F47bde4d652c09d3;
        }
        if ($E379394c7b1a273f == "movie") {
            if (!((!empty($f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["pid"]) && $f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["to_analyze"] == 0 && $f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["stream_status"] == 0 or $f523e362fb81d6c8["info"]["direct_source"] == 1 && $f523e362fb81d6c8["info"]["direct_proxy"] == 1) && ($f523e362fb81d6c8["info"]["target_container"] == $F9452a7efafa1aba or $F9452a7efafa1aba = "srt") && $cc5f26dd881329b7["timeshift_only"] == 0)) {
                goto a3b9edffbc56001e;
            }
            $c43b488500f8fab7[] = $d58b4f8653a391d8;
            // [PHPDeobfuscator] Implied goto
            goto a3b9edffbc56001e;
        }
        if (!(($f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["on_demand"] == 1 && $f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["stream_status"] != 1 || $f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["pid"] > 0 && $f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["stream_status"] == 0) && $f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["to_analyze"] == 0 && time() >= (int) $f523e362fb81d6c8["servers"][$d58b4f8653a391d8]["delay_available_at"] && $cc5f26dd881329b7["timeshift_only"] == 0 or $f523e362fb81d6c8["info"]["direct_source"] == 1 && $f523e362fb81d6c8["info"]["direct_proxy"] == 1)) {
            goto Aaf7ef49021cc1e5;
        }
        $c43b488500f8fab7[] = $d58b4f8653a391d8;
        Aaf7ef49021cc1e5:
        a3b9edffbc56001e:
        F47bde4d652c09d3:
        goto D2128fb4bb1caf99;
    }
    D2128fb4bb1caf99:
}
db842abc3da59d73:
if (!(count($c43b488500f8fab7) == 0)) {
    goto b05992a860d434ac;
}
XUI::AD5765c0Fd1abb43("show_not_on_air_video", "not_on_air_video_path", $F9452a7efafa1aba, $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
b05992a860d434ac:
Ffd7b4cd35c3ce7b:
require_once "INCLUDES_PATHstreaming.php";
XUI::$rAccess = "auth";
XUI::$rSettings = $F2d4d8f7981ac574;
XUI::init(false);
if (XUI::$rCached) {
    goto ddeeb89f06e98905;
}
XUI::Ad0A56bE17e95e81();
$Fee0d5a474c96306 =& XUI::$db;
ddeeb89f06e98905:
header("Access-Control-Allow-Origin: *");
register_shutdown_function("shutdown");
$eea4d80c225a9119 = false;
$e1034511e63f0e9e = isset(XUI::$rRequest["prebuffer"]);
foreach (getallheaders() as $D3fa098be3f297cd => $b6842cb20051e925) {
    if (strtoupper($D3fa098be3f297cd) == "X-XUI-DETECT") {
        $eea4d80c225a9119 = true;
        // [PHPDeobfuscator] Implied goto
        goto Ec8b04fb911e7636;
    }
    if (!(strtoupper($D3fa098be3f297cd) == "X-XUI-PREBUFFER")) {
        goto dcd31415175bda2e;
    }
    $e1034511e63f0e9e = true;
    dcd31415175bda2e:
    Ec8b04fb911e7636:
}
$B662f9c27b24b5de = false;
$D4253f9520627819 = null;
$B08e7d3cd339391a = null;
$E18c40e895ee55c2 = '';
$f9b07d216a168dcc = getmypid();
$B08b62d9f7870287 = md5(uniqid());
$c59ec257c284c894 = XUI::A9bC416fa6fa55C3();
$efc0f8f3059e4104 = XUI::b74F652c92cEc688($c59ec257c284c894)["country"]["iso_code"];
$b3374866087774a1 = empty($_SERVER["HTTP_USER_AGENT"]) ? '' : htmlentities(trim($_SERVER["HTTP_USER_AGENT"]));
$Dab081f66facd7a3 = true;
$d080620e03289080 = null;
$ffc0436d3fdc5100 = time();
if (isset($F029d0a6c29fd5a2)) {
    goto d5858e25d63ac524;
}
$F029d0a6c29fd5a2 = null;
d5858e25d63ac524:
if (isset(XUI::$rRequest["token"])) {
    $F2eeef4457c0cddc = XUI::$rRequest["token"];
    $D4253f9520627819 = XUI::D7Ca435ac70E9a78(null, $F2eeef4457c0cddc, null, false, false, $c59ec257c284c894);
    // [PHPDeobfuscator] Implied goto
    goto Fa86191d63c274f8;
}
if (isset(XUI::$rRequest["hmac"])) {
    if (in_array($E379394c7b1a273f, array("live", "movie", "series"))) {
        goto Fd66b612c461bcc9;
    }
    $Dab081f66facd7a3 = false;
    generateError("INVALID_TYPE_TOKEN");
    Fd66b612c461bcc9:
    $E18c40e895ee55c2 = empty(XUI::$rRequest["identifier"]) ? '' : XUI::$rRequest["identifier"];
    $B0b073b942c74b98 = empty(XUI::$rRequest["ip"]) ? '' : XUI::$rRequest["ip"];
    $B68ac2238b156add = isset(XUI::$rRequest["max"]) ? intval(XUI::$rRequest["max"]) : 0;
    $F029d0a6c29fd5a2 = isset(XUI::$rRequest["expiry"]) ? XUI::$rRequest["expiry"] : null;
    if (!($F029d0a6c29fd5a2 && time() > $F029d0a6c29fd5a2)) {
        goto df8efafd07db6d40;
    }
    $Dab081f66facd7a3 = false;
    generateError("TOKEN_EXPIRED");
    df8efafd07db6d40:
    $B08e7d3cd339391a = XUI::a7BE375C7e1508D7(XUI::$rRequest["hmac"], $F029d0a6c29fd5a2, $F26087d31c2bbe4d, $F9452a7efafa1aba, $c59ec257c284c894, $B0b073b942c74b98, $E18c40e895ee55c2, $B68ac2238b156add);
    if (!$B08e7d3cd339391a) {
        goto Bd4b6729697e8503;
    }
    $D4253f9520627819 = array("id" => null, "is_restreamer" => 0, "force_server_id" => 0, "con_isp_name" => null, "max_connections" => $B68ac2238b156add);
    if (!XUI::$rSettings["show_isps"]) {
        goto Bbc2d8983466340d;
    }
    $da7f3c43bffc92dd = XUI::eE2d851924a79E53($c59ec257c284c894);
    if (!is_array($da7f3c43bffc92dd)) {
        goto abb8763b607dbd2b;
    }
    $D4253f9520627819["con_isp_name"] = $da7f3c43bffc92dd["isp"];
    goto b6f459501da0963e;
}
$a71afc14d6cd090d = XUI::$rRequest["username"];
$d5249dad8e8411b7 = XUI::$rRequest["password"];
$D4253f9520627819 = XUI::d7Ca435ac70e9A78(null, $a71afc14d6cd090d, $d5249dad8e8411b7, false, false, $c59ec257c284c894);
b6f459501da0963e:
abb8763b607dbd2b:
Bbc2d8983466340d:
Bd4b6729697e8503:
Fa86191d63c274f8:
if ($D4253f9520627819 or $B08e7d3cd339391a) {
    $Dab081f66facd7a3 = false;
    XUI::d3E665b5427479FE($D4253f9520627819, $c59ec257c284c894);
    if (!(XUI::$rServers[SERVER_ID]["enable_proxy"] && !XUI::Bb41388445081a3d($_SERVER["HTTP_X_IP"]) && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["restreamer_bypass_proxy"]))) {
        goto a32990e76ed5fa38;
    }
    generateError("PROXY_ACCESS_DENIED");
    a32990e76ed5fa38:
    if (!$D4253f9520627819["is_e2"]) {
        goto Ab8c99c1e1662a04;
    }
    $B662f9c27b24b5de = true;
    Ab8c99c1e1662a04:
    if (!isset($F2eeef4457c0cddc)) {
        goto Bb4f200b69eb9e44;
    }
    $a71afc14d6cd090d = $D4253f9520627819["username"];
    $d5249dad8e8411b7 = $D4253f9520627819["password"];
    Bb4f200b69eb9e44:
    if ($B08e7d3cd339391a) {
        goto F7fd0732ec609b1a;
    }
    if (!(!is_null($D4253f9520627819["exp_date"]) && time() >= $D4253f9520627819["exp_date"])) {
        goto E7f50de2b0c2fe13;
    }
    XUI::ea6c9a31F15A7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "USER_EXPIRED", $c59ec257c284c894);
    if (in_array($E379394c7b1a273f, array("live", "timeshift"))) {
        XUI::AD5765C0fd1ABb43("show_expired_video", "expired_video_path", $F9452a7efafa1aba, $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        goto Ca528646bfab3320;
    }
    if (in_array($E379394c7b1a273f, array("movie", "series"))) {
        XUI::ad5765C0fd1abb43("show_expired_video", "expired_video_path", "ts", $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        // [PHPDeobfuscator] Implied goto
        goto fbc229d2a0df8c2c;
    }
    generateError("EXPIRED");
    fbc229d2a0df8c2c:
    Ca528646bfab3320:
    E7f50de2b0c2fe13:
    if (!($D4253f9520627819["admin_enabled"] == 0)) {
        goto d5a1052166d30609;
    }
    XUI::EA6C9A31F15A7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "USER_BAN", $c59ec257c284c894);
    if (in_array($E379394c7b1a273f, array("live", "timeshift"))) {
        XUI::aD5765c0FD1Abb43("show_banned_video", "banned_video_path", $F9452a7efafa1aba, $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        // [PHPDeobfuscator] Implied goto
        goto d4990a780f0a2a24;
    }
    if (in_array($E379394c7b1a273f, array("movie", "series"))) {
        XUI::aD5765C0FD1ABb43("show_banned_video", "banned_video_path", "ts", $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        goto D16eddc01870c909;
    }
    generateError("BANNED");
    D16eddc01870c909:
    d4990a780f0a2a24:
    d5a1052166d30609:
    if (!($D4253f9520627819["enabled"] == 0)) {
        goto f618c5dba6f84576;
    }
    XUI::EA6c9A31f15a7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "USER_DISABLED", $c59ec257c284c894);
    if (in_array($E379394c7b1a273f, array("live", "timeshift"))) {
        XUI::aD5765c0Fd1AbB43("show_banned_video", "banned_video_path", $F9452a7efafa1aba, $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        // [PHPDeobfuscator] Implied goto
        goto Dea15b5ac424d14e;
    }
    if (in_array($E379394c7b1a273f, array("movie", "series"))) {
        XUI::Ad5765C0fD1ABB43("show_banned_video", "banned_video_path", "ts", $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        // [PHPDeobfuscator] Implied goto
        goto E6b537807a9d02ea;
    }
    generateError("DISABLED");
    E6b537807a9d02ea:
    Dea15b5ac424d14e:
    f618c5dba6f84576:
    if (!($E379394c7b1a273f != "subtitle")) {
        goto Deebb087167cf9fe;
    }
    if (!($D4253f9520627819["bypass_ua"] == 0)) {
        goto A97db59be1fbaa0b;
    }
    if (!XUI::e416910CA4da4695($b3374866087774a1)) {
        goto Efea678b45284a8a;
    }
    generateError("BLOCKED_USER_AGENT");
    Efea678b45284a8a:
    A97db59be1fbaa0b:
    if (!(empty($b3374866087774a1) && XUI::$rSettings["disallow_empty_user_agents"])) {
        goto e8f5de20ee3cdf62;
    }
    XUI::eA6c9a31F15A7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "EMPTY_UA", $c59ec257c284c894);
    generateError("EMPTY_USER_AGENT");
    e8f5de20ee3cdf62:
    if (!(!empty($D4253f9520627819["allowed_ips"]) && !in_array($c59ec257c284c894, array_map("gethostbyname", $D4253f9520627819["allowed_ips"])))) {
        goto A022bd25a9b3dde0;
    }
    XUI::EA6C9a31F15a7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "IP_BAN", $c59ec257c284c894);
    generateError("NOT_IN_ALLOWED_IPS");
    A022bd25a9b3dde0:
    if (empty($efc0f8f3059e4104)) {
        goto a9a57e063e275466;
    }
    $ac720430e021c8c0 = !empty($D4253f9520627819["forced_country"]);
    if (!($ac720430e021c8c0 && $D4253f9520627819["forced_country"] != "ALL" && $efc0f8f3059e4104 != $D4253f9520627819["forced_country"])) {
        goto d57b61a9306a9b97;
    }
    XUI::EA6C9A31F15A7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "COUNTRY_DISALLOW", $c59ec257c284c894);
    generateError("FORCED_COUNTRY_INVALID");
    d57b61a9306a9b97:
    if (!(!$ac720430e021c8c0 && !in_array("ALL", XUI::$rSettings["allow_countries"]) && !in_array($efc0f8f3059e4104, XUI::$rSettings["allow_countries"]))) {
        goto Ecfe5de36cee4867;
    }
    XUI::Ea6C9a31f15A7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "COUNTRY_DISALLOW", $c59ec257c284c894);
    generateError("NOT_IN_ALLOWED_COUNTRY");
    Ecfe5de36cee4867:
    a9a57e063e275466:
    if (!(!empty($D4253f9520627819["allowed_ua"]) && !in_array($b3374866087774a1, $D4253f9520627819["allowed_ua"]))) {
        goto D573b5b85c9d8068;
    }
    XUI::eA6C9a31f15A7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "USER_AGENT_BAN", $c59ec257c284c894);
    generateError("NOT_IN_ALLOWED_UAS");
    D573b5b85c9d8068:
    if (!$D4253f9520627819["isp_violate"]) {
        goto fb91ec2d4dccae0e;
    }
    XUI::ea6C9a31f15a7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "ISP_LOCK_FAILED", $c59ec257c284c894, json_encode(array("old" => $D4253f9520627819["isp_desc"], "new" => $D4253f9520627819["con_isp_name"])));
    generateError("ISP_BLOCKED");
    fb91ec2d4dccae0e:
    if (!($D4253f9520627819["isp_is_server"] && !$D4253f9520627819["is_restreamer"])) {
        goto Fa2ee60921471e72;
    }
    XUI::ea6C9a31f15a7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "BLOCKED_ASN", $c59ec257c284c894, json_encode(array("user_agent" => $b3374866087774a1, "isp" => $D4253f9520627819["con_isp_name"], "asn" => $D4253f9520627819["isp_asn"])), true);
    generateError("ASN_BLOCKED");
    Fa2ee60921471e72:
    if ($D4253f9520627819["is_mag"] && !$D78b6d56a11571aa) {
        generateError("DEVICE_NOT_ALLOWED");
        goto b1be1fcedde4b4f6;
    }
    if ($D78b6d56a11571aa && !XUI::$rSettings["disable_mag_token"] && (!$Aeadc6eca40ba3fd or $Aeadc6eca40ba3fd != $D4253f9520627819["mag_token"])) {
        generateError("TOKEN_EXPIRED");
        // [PHPDeobfuscator] Implied goto
        goto B1cff791196aaf60;
    }
    if (!($F029d0a6c29fd5a2 && time() > $F029d0a6c29fd5a2)) {
        goto E7d6c4535cd881e4;
    }
    XUI::EA6C9a31f15a7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "TOKEN_EXPIRED", $c59ec257c284c894);
    generateError("TOKEN_EXPIRED");
    E7d6c4535cd881e4:
    B1cff791196aaf60:
    b1be1fcedde4b4f6:
    Deebb087167cf9fe:
    if (!($D4253f9520627819["is_stalker"] && in_array($E379394c7b1a273f, array("live", "movie", "series", "timeshift")))) {
        goto A9bb1f6c363e993a;
    }
    if (!(empty(XUI::$rRequest["stalker_key"]) || $F9452a7efafa1aba != "ts")) {
        goto Fbc810fa6c8fea48;
    }
    generateError("STALKER_INVALID_KEY");
    Fbc810fa6c8fea48:
    $Bce177641b9f99f3 = base64_decode(urldecode(XUI::$rRequest["stalker_key"]));
    if ($e1a3c6332faa66a6 = XUI::BA0A47b17B7e0f65($Bce177641b9f99f3, md5(XUI::$rSettings["live_streaming_pass"]))) {
        $C762aad9b830fb1b = explode("=", $e1a3c6332faa66a6);
        if (!($C762aad9b830fb1b[2] != $F26087d31c2bbe4d)) {
            goto A1ff3295942a9c80;
        }
        XUI::EA6C9A31f15A7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "STALKER_CHANNEL_MISMATCH", $c59ec257c284c894);
        generateError("STALKER_CHANNEL_MISMATCH");
        A1ff3295942a9c80:
        $ee7553b0caebc8c4 = XUI::$rSettings["ip_subnet_match"] ? implode(".", array_slice(explode(".", $C762aad9b830fb1b[1]), 0, -1)) == implode(".", array_slice(explode(".", $c59ec257c284c894), 0, -1)) : $C762aad9b830fb1b[1] == $c59ec257c284c894;
        if (!(!$ee7553b0caebc8c4 && XUI::$rSettings["restrict_same_ip"])) {
            goto e711644c6411f42d;
        }
        XUI::ea6C9a31F15A7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "STALKER_IP_MISMATCH", $c59ec257c284c894);
        generateError("STALKER_IP_MISMATCH");
        e711644c6411f42d:
        $D7102b1e2b296e66 = XUI::$rSettings["create_expiration"] ?: 5;
        if (!(time() - $D7102b1e2b296e66 > $C762aad9b830fb1b[3])) {
            goto d9eaedbdcb5481fb;
        }
        XUI::eA6c9A31F15A7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "STALKER_KEY_EXPIRED", $c59ec257c284c894);
        generateError("STALKER_KEY_EXPIRED");
        d9eaedbdcb5481fb:
        $d080620e03289080 = $C762aad9b830fb1b[0];
        // [PHPDeobfuscator] Implied goto
        goto f22438901f358fea;
    }
    XUI::EA6c9A31f15A7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "STALKER_DECRYPT_FAILED", $c59ec257c284c894);
    generateError("STALKER_DECRYPT_FAILED");
    f22438901f358fea:
    A9bb1f6c363e993a:
    if (in_array($E379394c7b1a273f, array("thumb", "subtitle"))) {
        goto f7a37f07a3daacfd;
    }
    if (!(!$D4253f9520627819["is_restreamer"] && !in_array($c59ec257c284c894, XUI::$rAllowedIPs))) {
        goto ec00ba08a69ca94e;
    }
    if (!(XUI::$rSettings["block_streaming_servers"] or XUI::$rSettings["block_proxies"])) {
        goto ef7ec69e6e19908d;
    }
    $Da967f0a787f6b51 = XUI::a54586EADEA94EE6($D4253f9520627819["isp_asn"], $c59ec257c284c894);
    if (!$Da967f0a787f6b51) {
        goto Cf44d96bdc9b04f8;
    }
    if (!(XUI::$rSettings["block_streaming_servers"] && $Da967f0a787f6b51[3] && !$Da967f0a787f6b51[4])) {
        goto c9d5bc39af0640ff;
    }
    XUI::ea6C9A31f15A7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "HOSTING_DETECT", $c59ec257c284c894, json_encode(array("user_agent" => $b3374866087774a1, "isp" => $D4253f9520627819["con_isp_name"], "asn" => $D4253f9520627819["isp_asn"])), true);
    generateError("HOSTING_DETECT");
    c9d5bc39af0640ff:
    if (!(XUI::$rSettings["block_proxies"] && $Da967f0a787f6b51[4])) {
        goto Fc3b8ed45b20f4e1;
    }
    XUI::Ea6C9A31f15a7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "PROXY_DETECT", $c59ec257c284c894, json_encode(array("user_agent" => $b3374866087774a1, "isp" => $D4253f9520627819["con_isp_name"], "asn" => $D4253f9520627819["isp_asn"])), true);
    generateError("PROXY_DETECT");
    Fc3b8ed45b20f4e1:
    Cf44d96bdc9b04f8:
    ef7ec69e6e19908d:
    if (!$eea4d80c225a9119) {
        goto A7debbdc3637820b;
    }
    if (!XUI::$rSettings["detect_restream_block_user"]) {
        goto d2cd23822c498e88;
    }
    if (XUI::$rCached) {
        XUI::Cf592c234DcD0b19("restream_block_user/" . $D4253f9520627819["id"] . "/" . $F26087d31c2bbe4d . "/" . $c59ec257c284c894, 1);
        // [PHPDeobfuscator] Implied goto
        goto C007f3c0f037916a;
    }
    $Fee0d5a474c96306->query("UPDATE `lines` SET `admin_enabled` = 0 WHERE `id` = ?;", $D4253f9520627819["id"]);
    C007f3c0f037916a:
    d2cd23822c498e88:
    if (!(XUI::$rSettings["restream_deny_unauthorised"] or XUI::$rSettings["detect_restream_block_user"])) {
        goto C5da80190d883b16;
    }
    XUI::Ea6C9A31F15a7b61($F26087d31c2bbe4d, $D4253f9520627819["id"], "RESTREAM_DETECT", $c59ec257c284c894, json_encode(array("user_agent" => $b3374866087774a1, "isp" => $D4253f9520627819["con_isp_name"], "asn" => $D4253f9520627819["isp_asn"])), true);
    generateError("RESTREAM_DETECT");
    C5da80190d883b16:
    A7debbdc3637820b:
    ec00ba08a69ca94e:
    f7a37f07a3daacfd:
    if (!($E379394c7b1a273f == "live")) {
        goto Efde64cd31d9eba9;
    }
    if (in_array($F9452a7efafa1aba, $D4253f9520627819["output_formats"])) {
        goto d36cc2e7923951de;
    }
    XUI::EA6C9A31f15a7B61($F26087d31c2bbe4d, $D4253f9520627819["id"], "USER_DISALLOW_EXT", $c59ec257c284c894);
    generateError("USER_DISALLOW_EXT");
    d36cc2e7923951de:
    Efde64cd31d9eba9:
    if (!($E379394c7b1a273f == "live" && XUI::$rSettings["show_expiring_video"] && !$D4253f9520627819["is_trial"] && (!is_null($D4253f9520627819["exp_date"]) && time() >= $D4253f9520627819["exp_date"] - 604800) && (time() - $D4253f9520627819["last_expiration_video"] >= 86400 or !$D4253f9520627819["last_expiration_video"]))) {
        goto C3062f5e3533ef01;
    }
    if (XUI::$rCached) {
        XUI::Cf592c234DcD0b19("expiring/" . $D4253f9520627819["id"], time());
        // [PHPDeobfuscator] Implied goto
        goto B2ff4d69381db547;
    }
    $Fee0d5a474c96306->query("UPDATE `lines` SET `last_expiration_video` = ? WHERE `id` = ?;", time(), $D4253f9520627819["id"]);
    B2ff4d69381db547:
    XUI::aD5765C0FD1Abb43("show_expiring_video", "expiring_video_path", $F9452a7efafa1aba, $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
    goto F26daa2bed39b117;
}
XUI::b6f740FABc7265bf($c59ec257c284c894, null, $a71afc14d6cd090d);
XUI::EA6C9a31F15A7b61($F26087d31c2bbe4d, 0, "AUTH_FAILED", $c59ec257c284c894);
generateError("INVALID_CREDENTIALS");
F26daa2bed39b117:
C3062f5e3533ef01:
F7fd0732ec609b1a:
if ($D78b6d56a11571aa) {
    $Acfdd9e81f0cf9d5 = XUI::$rSettings["mag_disable_ssl"];
    // [PHPDeobfuscator] Implied goto
    goto e83385b830c03177;
}
if ($B662f9c27b24b5de) {
    $Acfdd9e81f0cf9d5 = true;
    // [PHPDeobfuscator] Implied goto
    goto Ae34a987c4d6e797;
}
$Acfdd9e81f0cf9d5 = false;
Ae34a987c4d6e797:
e83385b830c03177:
switch ($E379394c7b1a273f) {
    case "live":
        $fca7edf85daa1695 = XUI::b3ED925E7969f61A($F26087d31c2bbe4d, $F9452a7efafa1aba, $D4253f9520627819, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], "live");
        if (is_array($fca7edf85daa1695)) {
            if (!(count(array_keys($fca7edf85daa1695)) == 0)) {
                goto a5e46dc6b803a546;
            }
            generateError("NO_SERVERS_AVAILABLE");
            a5e46dc6b803a546:
            if (!empty(array_intersect($D4253f9520627819["bouquet"], $fca7edf85daa1695["bouquets"]))) {
                goto B58f7394cad8d5c0;
            }
            generateError("NOT_IN_BOUQUET");
            B58f7394cad8d5c0:
            if (!(XUI::isProxied($fca7edf85daa1695["redirect_id"]) && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["restreamer_bypass_proxy"]))) {
                goto d3ea054b603e6ef1;
            }
            $c08f7f5177a44d91 = XUI::getProxies($fca7edf85daa1695["redirect_id"]);
            $b2a9243e8304033d = XUI::availableProxy(array_keys($c08f7f5177a44d91), $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"]);
            if ($b2a9243e8304033d) {
                goto B7707385c7d0d806;
            }
            generateError("NO_SERVERS_AVAILABLE");
            B7707385c7d0d806:
            $fca7edf85daa1695["originator_id"] = $fca7edf85daa1695["redirect_id"];
            $fca7edf85daa1695["redirect_id"] = $b2a9243e8304033d;
            d3ea054b603e6ef1:
            $C700a2b357e5ed65 = XUI::getStreamingURL($fca7edf85daa1695["redirect_id"], $fca7edf85daa1695["originator_id"] ?: null, $Acfdd9e81f0cf9d5);
            $bb0071da5a239b0c = json_decode($fca7edf85daa1695["stream_info"], True);
            $F2735dad02d30e84 = $bb0071da5a239b0c["codecs"]["video"]["codec_name"] ?: "h264";
            switch ($F9452a7efafa1aba) {
                case "m3u8":
                    if (!(XUI::$rSettings["disable_hls"] && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["disable_hls_allow_restream"]))) {
                        goto Cfcea0e23f3e8d76;
                    }
                    generateError("HLS_DISABLED");
                    Cfcea0e23f3e8d76:
                    if (!$fca7edf85daa1695["direct_proxy"]) {
                        goto A98859be7158d9ed;
                    }
                    generateError("HLS_DISABLED");
                    A98859be7158d9ed:
                    $d5b3c619fc252d2e = json_decode($fca7edf85daa1695["adaptive_link"], True);
                    if (!$B08e7d3cd339391a && is_array($d5b3c619fc252d2e) && count($d5b3c619fc252d2e) > 0) {
                        $Bab76ac20d8e4000 = array();
                        foreach (array_merge(array($F26087d31c2bbe4d), $d5b3c619fc252d2e) as $ba78a3ba07e942ec) {
                            if ($ba78a3ba07e942ec != $F26087d31c2bbe4d) {
                                $C437018de91c0402 = XUI::B3eD925e7969f61a($ba78a3ba07e942ec, $F9452a7efafa1aba, $D4253f9520627819, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], "live");
                                if (!(XUI::isProxied($C437018de91c0402["redirect_id"]) && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["restreamer_bypass_proxy"]))) {
                                    goto B7cdda299e801989;
                                }
                                $c08f7f5177a44d91 = XUI::getProxies($C437018de91c0402["redirect_id"]);
                                $b2a9243e8304033d = XUI::availableProxy(array_keys($c08f7f5177a44d91), $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"]);
                                if ($b2a9243e8304033d) {
                                    goto b3c19247b841ff56;
                                }
                                generateError("NO_SERVERS_AVAILABLE");
                                b3c19247b841ff56:
                                $C437018de91c0402["originator_id"] = $C437018de91c0402["redirect_id"];
                                $C437018de91c0402["redirect_id"] = $b2a9243e8304033d;
                                B7cdda299e801989:
                                $C700a2b357e5ed65 = XUI::getStreamingURL($C437018de91c0402["redirect_id"], $C437018de91c0402["originator_id"] ?: null, $Acfdd9e81f0cf9d5);
                                goto ca6158e04294da50;
                            }
                            $C437018de91c0402 = $fca7edf85daa1695;
                            ca6158e04294da50:
                            $bb0071da5a239b0c = json_decode($C437018de91c0402["stream_info"], True);
                            $aa2e54fde620d6b3 = $bb0071da5a239b0c["bitrate"] ?: 0;
                            $c29dfa683545802c = $bb0071da5a239b0c["codecs"]["video"]["width"] ?: 0;
                            $d30b6b589a9a7ff6 = $bb0071da5a239b0c["codecs"]["video"]["height"] ?: 0;
                            if (!($aa2e54fde620d6b3 > 0 && $d30b6b589a9a7ff6 > 0 && $c29dfa683545802c > 0)) {
                                goto B007c9f020b06ba1;
                            }
                            $F64d974c429d80be = array("stream_id" => $ba78a3ba07e942ec, "username" => $D4253f9520627819["username"], "password" => $D4253f9520627819["password"], "extension" => $F9452a7efafa1aba, "pid" => $f9b07d216a168dcc, "channel_info" => array("redirect_id" => $C437018de91c0402["redirect_id"], "originator_id" => $C437018de91c0402["originator_id"] ?: null, "pid" => $C437018de91c0402["pid"], "on_demand" => $C437018de91c0402["on_demand"], "monitor_pid" => $C437018de91c0402["monitor_pid"]), "user_info" => array("id" => $D4253f9520627819["id"], "max_connections" => $D4253f9520627819["max_connections"], "pair_id" => $D4253f9520627819["pair_id"], "con_isp_name" => $D4253f9520627819["con_isp_name"], "is_restreamer" => $D4253f9520627819["is_restreamer"]), "external_device" => $d080620e03289080, "activity_start" => $ffc0436d3fdc5100, "country_code" => $efc0f8f3059e4104, "video_codec" => $bb0071da5a239b0c["codecs"]["video"]["codec_name"] ?: "h264", "uuid" => $B08b62d9f7870287, "adaptive" => array($fca7edf85daa1695["redirect_id"], $F26087d31c2bbe4d));
                            $Eb6eccfbed89f039 = "{$C700a2b357e5ed65}/auth/" . Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
                            $Bab76ac20d8e4000[$aa2e54fde620d6b3] = "#EXT-X-STREAM-INF:BANDWIDTH={$aa2e54fde620d6b3},RESOLUTION={$c29dfa683545802c}x{$d30b6b589a9a7ff6}\n{$Eb6eccfbed89f039}";
                            B007c9f020b06ba1:
                        }
                        if (count($Bab76ac20d8e4000) > 0) {
                            krsort($Bab76ac20d8e4000);
                            $dc05e2bb97d4635d = "#EXTM3U\n" . implode("\n", array_values($Bab76ac20d8e4000));
                            ob_end_clean();
                            header("Content-Type: application/x-mpegurl");
                            header("Content-Length: " . strlen($dc05e2bb97d4635d));
                            echo $dc05e2bb97d4635d;
                            exit;
                        }
                        XUI::ad5765C0fD1ABB43("show_not_on_air_video", "not_on_air_video_path", "ts", $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], $fca7edf85daa1695["originator_id"] ?: $fca7edf85daa1695["redirect_id"], $fca7edf85daa1695["originator_id"] ? $fca7edf85daa1695["redirect_id"] : null);
                        E9de275bfd68ca8e:
                        exit;
                    }
                    if (!$B08e7d3cd339391a) {
                        $F64d974c429d80be = array("stream_id" => $F26087d31c2bbe4d, "username" => $D4253f9520627819["username"], "password" => $D4253f9520627819["password"], "extension" => $F9452a7efafa1aba, "pid" => $f9b07d216a168dcc, "channel_info" => array("redirect_id" => $fca7edf85daa1695["redirect_id"], "originator_id" => $fca7edf85daa1695["originator_id"] ?: null, "pid" => $fca7edf85daa1695["pid"], "on_demand" => $fca7edf85daa1695["on_demand"], "llod" => $fca7edf85daa1695["llod"], "monitor_pid" => $fca7edf85daa1695["monitor_pid"]), "user_info" => array("id" => $D4253f9520627819["id"], "max_connections" => $D4253f9520627819["max_connections"], "pair_id" => $D4253f9520627819["pair_id"], "con_isp_name" => $D4253f9520627819["con_isp_name"], "is_restreamer" => $D4253f9520627819["is_restreamer"]), "external_device" => $d080620e03289080, "activity_start" => $ffc0436d3fdc5100, "country_code" => $efc0f8f3059e4104, "video_codec" => $F2735dad02d30e84, "uuid" => $B08b62d9f7870287);
                        // [PHPDeobfuscator] Implied goto
                        goto B1261904bfed0f22;
                    }
                    $F64d974c429d80be = array("stream_id" => $F26087d31c2bbe4d, "hmac_hash" => XUI::$rRequest["hmac"], "hmac_id" => $B08e7d3cd339391a, "identifier" => $E18c40e895ee55c2, "extension" => $F9452a7efafa1aba, "channel_info" => array("redirect_id" => $fca7edf85daa1695["redirect_id"], "originator_id" => $fca7edf85daa1695["originator_id"] ?: null, "pid" => $fca7edf85daa1695["pid"], "on_demand" => $fca7edf85daa1695["on_demand"], "llod" => $fca7edf85daa1695["llod"], "monitor_pid" => $fca7edf85daa1695["monitor_pid"]), "user_info" => $D4253f9520627819, "pid" => $f9b07d216a168dcc, "external_device" => $d080620e03289080, "activity_start" => $ffc0436d3fdc5100, "country_code" => $efc0f8f3059e4104, "video_codec" => $F2735dad02d30e84, "uuid" => $B08b62d9f7870287);
                    B1261904bfed0f22:
                    $ea5296071288c730 = Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
                    if (XUI::$rSettings["allow_cdn_access"]) {
                        header("Location: {$C700a2b357e5ed65}/auth/{$F26087d31c2bbe4d}.m3u8?token={$ea5296071288c730}");
                        exit;
                    }
                    header("Location: {$C700a2b357e5ed65}/auth/{$ea5296071288c730}");
                    exit;
                case "ts":
                    if (!(XUI::$rSettings["disable_ts"] && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["disable_ts_allow_restream"]))) {
                        goto Aa7e36ef61b366c5;
                    }
                    generateError("TS_DISABLED");
                    Aa7e36ef61b366c5:
                    if (!$B08e7d3cd339391a) {
                        $F64d974c429d80be = array("stream_id" => $F26087d31c2bbe4d, "username" => $D4253f9520627819["username"], "password" => $D4253f9520627819["password"], "extension" => $F9452a7efafa1aba, "channel_info" => array("stream_id" => $fca7edf85daa1695["stream_id"], "redirect_id" => $fca7edf85daa1695["redirect_id"] ?: null, "originator_id" => $fca7edf85daa1695["originator_id"] ?: null, "pid" => $fca7edf85daa1695["pid"], "on_demand" => $fca7edf85daa1695["on_demand"], "llod" => $fca7edf85daa1695["llod"], "monitor_pid" => $fca7edf85daa1695["monitor_pid"], "proxy" => $fca7edf85daa1695["direct_proxy"]), "user_info" => array("id" => $D4253f9520627819["id"], "max_connections" => $D4253f9520627819["max_connections"], "pair_id" => $D4253f9520627819["pair_id"], "con_isp_name" => $D4253f9520627819["con_isp_name"], "is_restreamer" => $D4253f9520627819["is_restreamer"]), "pid" => $f9b07d216a168dcc, "prebuffer" => $e1034511e63f0e9e, "country_code" => $efc0f8f3059e4104, "activity_start" => $ffc0436d3fdc5100, "external_device" => $d080620e03289080, "video_codec" => $F2735dad02d30e84, "uuid" => $B08b62d9f7870287);
                        // [PHPDeobfuscator] Implied goto
                        goto a97cc00157c769fe;
                    }
                    $F64d974c429d80be = array("stream_id" => $F26087d31c2bbe4d, "hmac_hash" => XUI::$rRequest["hmac"], "hmac_id" => $B08e7d3cd339391a, "identifier" => $E18c40e895ee55c2, "extension" => $F9452a7efafa1aba, "channel_info" => array("stream_id" => $fca7edf85daa1695["stream_id"], "redirect_id" => $fca7edf85daa1695["redirect_id"] ?: null, "originator_id" => $fca7edf85daa1695["originator_id"] ?: null, "pid" => $fca7edf85daa1695["pid"], "on_demand" => $fca7edf85daa1695["on_demand"], "llod" => $fca7edf85daa1695["llod"], "monitor_pid" => $fca7edf85daa1695["monitor_pid"], "proxy" => $fca7edf85daa1695["direct_proxy"]), "user_info" => $D4253f9520627819, "pid" => $f9b07d216a168dcc, "prebuffer" => $e1034511e63f0e9e, "country_code" => $efc0f8f3059e4104, "activity_start" => $ffc0436d3fdc5100, "external_device" => $d080620e03289080, "video_codec" => $F2735dad02d30e84, "uuid" => $B08b62d9f7870287);
                    a97cc00157c769fe:
                    $ea5296071288c730 = Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
                    if (XUI::$rSettings["allow_cdn_access"]) {
                        header("Location: {$C700a2b357e5ed65}/auth/{$F26087d31c2bbe4d}.ts?token={$ea5296071288c730}");
                        exit;
                    }
                    header("Location: {$C700a2b357e5ed65}/auth/{$ea5296071288c730}");
                    exit;
            }
            goto E93b44f8ea0b521a;
        }
        XUI::aD5765C0Fd1Abb43("show_not_on_air_video", "not_on_air_video_path", $F9452a7efafa1aba, $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        E93b44f8ea0b521a:
        goto eb187df8ba67b0a5;
    case "movie":
    case "series":
        $fca7edf85daa1695 = XUI::b3ed925e7969f61A($F26087d31c2bbe4d, $F9452a7efafa1aba, $D4253f9520627819, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], "movie");
        if ($fca7edf85daa1695) {
            if (!(XUI::isProxied($fca7edf85daa1695["redirect_id"]) && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["restreamer_bypass_proxy"]))) {
                goto b97f43bdc3dad827;
            }
            $c08f7f5177a44d91 = XUI::getProxies($fca7edf85daa1695["redirect_id"]);
            $b2a9243e8304033d = XUI::availableProxy(array_keys($c08f7f5177a44d91), $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"]);
            if ($b2a9243e8304033d) {
                goto B5c018720c410696;
            }
            generateError("NO_SERVERS_AVAILABLE");
            B5c018720c410696:
            $fca7edf85daa1695["originator_id"] = $fca7edf85daa1695["redirect_id"];
            $fca7edf85daa1695["redirect_id"] = $b2a9243e8304033d;
            b97f43bdc3dad827:
            $C700a2b357e5ed65 = XUI::getStreamingURL($fca7edf85daa1695["redirect_id"], $fca7edf85daa1695["originator_id"] ?: null, $Acfdd9e81f0cf9d5);
            if (!$fca7edf85daa1695["direct_proxy"]) {
                goto b657029c002781c6;
            }
            $fca7edf85daa1695["bitrate"] = json_decode($fca7edf85daa1695["movie_properties"], True)["duration_secs"] ?: 0;
            b657029c002781c6:
            if (!$B08e7d3cd339391a) {
                $F64d974c429d80be = array("stream_id" => $F26087d31c2bbe4d, "username" => $D4253f9520627819["username"], "password" => $D4253f9520627819["password"], "extension" => $F9452a7efafa1aba, "type" => $E379394c7b1a273f, "pid" => $f9b07d216a168dcc, "channel_info" => array("stream_id" => $fca7edf85daa1695["stream_id"], "bitrate" => $fca7edf85daa1695["bitrate"], "target_container" => $fca7edf85daa1695["target_container"], "redirect_id" => $fca7edf85daa1695["redirect_id"], "originator_id" => $fca7edf85daa1695["originator_id"] ?: null, "pid" => $fca7edf85daa1695["pid"], "proxy" => $fca7edf85daa1695["direct_proxy"] ? json_decode($fca7edf85daa1695["stream_source"], true)[0] : null), "user_info" => array("id" => $D4253f9520627819["id"], "max_connections" => $D4253f9520627819["max_connections"], "pair_id" => $D4253f9520627819["pair_id"], "con_isp_name" => $D4253f9520627819["con_isp_name"], "is_restreamer" => $D4253f9520627819["is_restreamer"]), "country_code" => $efc0f8f3059e4104, "activity_start" => $ffc0436d3fdc5100, "is_mag" => $D78b6d56a11571aa, "uuid" => $B08b62d9f7870287, "http_range" => isset($_SERVER["HTTP_RANGE"]) ? $_SERVER["HTTP_RANGE"] : null);
                // [PHPDeobfuscator] Implied goto
                goto B98c32d102e29bfe;
            }
            $F64d974c429d80be = array("stream_id" => $F26087d31c2bbe4d, "hmac_hash" => XUI::$rRequest["hmac"], "hmac_id" => $B08e7d3cd339391a, "identifier" => $E18c40e895ee55c2, "extension" => $F9452a7efafa1aba, "type" => $E379394c7b1a273f, "pid" => $f9b07d216a168dcc, "channel_info" => array("stream_id" => $fca7edf85daa1695["stream_id"], "bitrate" => $fca7edf85daa1695["bitrate"], "target_container" => $fca7edf85daa1695["target_container"], "redirect_id" => $fca7edf85daa1695["redirect_id"], "originator_id" => $fca7edf85daa1695["originator_id"] ?: null, "pid" => $fca7edf85daa1695["pid"], "proxy_source" => $fca7edf85daa1695["direct_proxy"] ? json_decode($fca7edf85daa1695["stream_source"], true)[0] : null), "user_info" => $D4253f9520627819, "country_code" => $efc0f8f3059e4104, "activity_start" => $ffc0436d3fdc5100, "is_mag" => $D78b6d56a11571aa, "uuid" => $B08b62d9f7870287, "http_range" => isset($_SERVER["HTTP_RANGE"]) ? $_SERVER["HTTP_RANGE"] : null);
            B98c32d102e29bfe:
            $ea5296071288c730 = Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
            if (XUI::$rSettings["allow_cdn_access"]) {
                header("Location: {$C700a2b357e5ed65}/vauth/{$F26087d31c2bbe4d}.{$F9452a7efafa1aba}?token={$ea5296071288c730}");
                exit;
            }
            header("Location: {$C700a2b357e5ed65}/vauth/{$ea5296071288c730}");
            exit;
        }
        XUI::AD5765c0fD1ABB43("show_not_on_air_video", "not_on_air_video_path", "ts", $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        goto eb187df8ba67b0a5;
    case "timeshift":
        $a70eaa0ab42179dd = null;
        $B5f1fb70f197b910 = XUI::b3Ed925E7969f61A($F26087d31c2bbe4d, $F9452a7efafa1aba, $D4253f9520627819, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], "archive");
        if ($B5f1fb70f197b910) {
            if (!(XUI::isProxied($fca7edf85daa1695["redirect_id"]) && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["restreamer_bypass_proxy"]))) {
                goto cc03938ddaf88503;
            }
            $c08f7f5177a44d91 = XUI::getProxies($fca7edf85daa1695["redirect_id"]);
            $b2a9243e8304033d = XUI::availableProxy(array_keys($c08f7f5177a44d91), $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"]);
            if ($b2a9243e8304033d) {
                goto Cd9d37fc4a56e0ce;
            }
            generateError("NO_SERVERS_AVAILABLE");
            Cd9d37fc4a56e0ce:
            $a70eaa0ab42179dd = $fca7edf85daa1695["redirect_id"];
            $B5f1fb70f197b910 = $b2a9243e8304033d;
            cc03938ddaf88503:
            $C700a2b357e5ed65 = XUI::getStreamingURL($B5f1fb70f197b910, $a70eaa0ab42179dd ?: null, $Acfdd9e81f0cf9d5);
            $a63ba41c5c63ce14 = XUI::$rRequest["start"];
            $C5034884ed44603a = intval(XUI::$rRequest["duration"]);
            switch ($F9452a7efafa1aba) {
                case "m3u8":
                    if (!(XUI::$rSettings["disable_hls"] && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["disable_hls_allow_restream"]))) {
                        goto C100efda40a1c03e;
                    }
                    generateError("HLS_DISABLED");
                    C100efda40a1c03e:
                    $F64d974c429d80be = array("stream" => $F26087d31c2bbe4d, "username" => $D4253f9520627819["username"], "password" => $D4253f9520627819["password"], "extension" => $F9452a7efafa1aba, "pid" => $f9b07d216a168dcc, "start" => $a63ba41c5c63ce14, "duration" => $C5034884ed44603a, "redirect_id" => $B5f1fb70f197b910, "originator_id" => $a70eaa0ab42179dd, "user_info" => array("id" => $D4253f9520627819["id"], "max_connections" => $D4253f9520627819["max_connections"], "pair_line_info" => $D4253f9520627819["pair_line_info"], "pair_id" => $D4253f9520627819["pair_id"], "active_cons" => $D4253f9520627819["active_cons"], "con_isp_name" => $D4253f9520627819["con_isp_name"], "is_restreamer" => $D4253f9520627819["is_restreamer"]), "country_code" => $efc0f8f3059e4104, "activity_start" => $ffc0436d3fdc5100, "uuid" => $B08b62d9f7870287, "http_range" => isset($_SERVER["HTTP_RANGE"]) ? $_SERVER["HTTP_RANGE"] : null);
                    $ea5296071288c730 = Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
                    if (XUI::$rSettings["allow_cdn_access"]) {
                        header("Location: {$C700a2b357e5ed65}/tsauth/{$F26087d31c2bbe4d}_{$a63ba41c5c63ce14}_{$C5034884ed44603a}.m3u8?token={$ea5296071288c730}");
                        exit;
                    }
                    header("Location: {$C700a2b357e5ed65}/tsauth/{$ea5296071288c730}");
                    exit;
                default:
                    if (!(XUI::$rSettings["disable_ts"] && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["disable_ts_allow_restream"]))) {
                        goto a48d4e82b210e85e;
                    }
                    generateError("TS_DISABLED");
                    a48d4e82b210e85e:
                    $ffc0436d3fdc5100 = time();
                    $F64d974c429d80be = array("stream" => $F26087d31c2bbe4d, "username" => $D4253f9520627819["username"], "password" => $D4253f9520627819["password"], "extension" => $F9452a7efafa1aba, "pid" => $f9b07d216a168dcc, "start" => $a63ba41c5c63ce14, "duration" => $C5034884ed44603a, "redirect_id" => $B5f1fb70f197b910, "originator_id" => $a70eaa0ab42179dd, "user_info" => array("id" => $D4253f9520627819["id"], "max_connections" => $D4253f9520627819["max_connections"], "pair_line_info" => $D4253f9520627819["pair_line_info"], "pair_id" => $D4253f9520627819["pair_id"], "active_cons" => $D4253f9520627819["active_cons"], "con_isp_name" => $D4253f9520627819["con_isp_name"], "is_restreamer" => $D4253f9520627819["is_restreamer"]), "country_code" => $efc0f8f3059e4104, "activity_start" => $ffc0436d3fdc5100, "uuid" => $B08b62d9f7870287, "http_range" => isset($_SERVER["HTTP_RANGE"]) ? $_SERVER["HTTP_RANGE"] : null);
                    $ea5296071288c730 = Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
                    if (XUI::$rSettings["allow_cdn_access"]) {
                        header("Location: {$C700a2b357e5ed65}/tsauth/{$F26087d31c2bbe4d}_{$a63ba41c5c63ce14}_{$C5034884ed44603a}.ts?token={$ea5296071288c730}");
                        exit;
                    }
                    header("Location: {$C700a2b357e5ed65}/tsauth/{$ea5296071288c730}");
                    exit;
            }
            goto Bd89aa78e11f1769;
        }
        XUI::aD5765C0Fd1AbB43("show_not_on_air_video", "not_on_air_video_path", $F9452a7efafa1aba, $D4253f9520627819, $c59ec257c284c894, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], SERVER_ID);
        Bd89aa78e11f1769:
        goto eb187df8ba67b0a5;
    case "thumb":
        $bb0071da5a239b0c = null;
        if (XUI::$rCached) {
            $bb0071da5a239b0c = igbinary_unserialize(file_get_contents("STREAMS_TMP_PATHstream_" . $F26087d31c2bbe4d));
            // [PHPDeobfuscator] Implied goto
            goto b486a05edfee84fb;
        }
        $Fee0d5a474c96306->query("SELECT * FROM `streams` t1 INNER JOIN `streams_types` t2 ON t2.type_id = t1.type AND t2.live = 1 LEFT JOIN `profiles` t4 ON t1.transcode_profile_id = t4.profile_id WHERE t1.direct_source = 0 AND t1.id = ?", $F26087d31c2bbe4d);
        if (!($Fee0d5a474c96306->num_rows() > 0)) {
            goto f64a66f7eff7687c;
        }
        $bb0071da5a239b0c = array("info" => $Fee0d5a474c96306->get_row());
        f64a66f7eff7687c:
        b486a05edfee84fb:
        if ($bb0071da5a239b0c) {
            goto Ead5353749af0a61;
        }
        generateError("INVALID_STREAM_ID");
        Ead5353749af0a61:
        if (!($bb0071da5a239b0c["info"]["vframes_server_id"] == 0)) {
            goto f371e6caf3bf43ea;
        }
        generateError("THUMBNAILS_NOT_ENABLED");
        f371e6caf3bf43ea:
        $F64d974c429d80be = array("stream" => $F26087d31c2bbe4d, "expires" => time() + 5);
        $a70eaa0ab42179dd = null;
        if (!(XUI::isProxied($bb0071da5a239b0c["info"]["vframes_server_id"]) && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["restreamer_bypass_proxy"]))) {
            goto Ce674eac20e585a0;
        }
        $c08f7f5177a44d91 = XUI::getProxies($bb0071da5a239b0c["info"]["vframes_server_id"]);
        $b2a9243e8304033d = XUI::availableProxy(array_keys($c08f7f5177a44d91), $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"]);
        if ($b2a9243e8304033d) {
            goto a7aac811a54aa2a5;
        }
        generateError("THUMBNAILS_NOT_ENABLED");
        a7aac811a54aa2a5:
        $a70eaa0ab42179dd = $bb0071da5a239b0c["info"]["vframes_server_id"];
        $bb0071da5a239b0c["info"]["vframes_server_id"] = $b2a9243e8304033d;
        Ce674eac20e585a0:
        $C700a2b357e5ed65 = XUI::getStreamingURL($bb0071da5a239b0c["info"]["vframes_server_id"], $a70eaa0ab42179dd, $Acfdd9e81f0cf9d5);
        $ea5296071288c730 = Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
        header("Location: {$C700a2b357e5ed65}/thauth/{$ea5296071288c730}");
        exit;
    case "subtitle":
        $fca7edf85daa1695 = XUI::B3Ed925E7969f61A($F26087d31c2bbe4d, "srt", $D4253f9520627819, $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"], "movie");
        if ($fca7edf85daa1695) {
            if (!(XUI::isProxied($fca7edf85daa1695["redirect_id"]) && (!$D4253f9520627819["is_restreamer"] or !XUI::$rSettings["restreamer_bypass_proxy"]))) {
                goto fca171ba51b9bf78;
            }
            $c08f7f5177a44d91 = XUI::getProxies($fca7edf85daa1695["redirect_id"]);
            $b2a9243e8304033d = XUI::availableProxy(array_keys($c08f7f5177a44d91), $efc0f8f3059e4104, $D4253f9520627819["con_isp_name"]);
            if ($b2a9243e8304033d) {
                goto Dbe021080ac6e51e;
            }
            generateError("NO_SERVERS_AVAILABLE");
            Dbe021080ac6e51e:
            $fca7edf85daa1695["originator_id"] = $fca7edf85daa1695["redirect_id"];
            $fca7edf85daa1695["redirect_id"] = $b2a9243e8304033d;
            fca171ba51b9bf78:
            $C700a2b357e5ed65 = XUI::getStreamingURL($fca7edf85daa1695["redirect_id"], $fca7edf85daa1695["originator_id"] ?: null, $Acfdd9e81f0cf9d5);
            $F64d974c429d80be = array("stream_id" => $F26087d31c2bbe4d, "sub_id" => intval(XUI::$rRequest["sid"]) ?: 0, "webvtt" => intval(XUI::$rRequest["webvtt"]) ?: 0, "expires" => time() + 5);
            $ea5296071288c730 = Xui\Functions::encrypt(json_encode($F64d974c429d80be), XUI::$rSettings["live_streaming_pass"], OPENSSL_EXTRA);
            header("Location: {$C700a2b357e5ed65}/subauth/{$ea5296071288c730}");
            exit;
        }
        generateError("INVALID_STREAM_ID");
        goto eb187df8ba67b0a5;
}
eb187df8ba67b0a5:
function shutdown()
{
    global $Dab081f66facd7a3, $Fee0d5a474c96306;
    if (!$Dab081f66facd7a3) {
        goto Ca2377bd167119a0;
    }
    XUI::fC8474658Ec80360();
    Ca2377bd167119a0:
    if (!is_object($Fee0d5a474c96306)) {
        goto a42aa6cfd3a54113;
    }
    $Fee0d5a474c96306->close_mysql();
    a42aa6cfd3a54113:
}
