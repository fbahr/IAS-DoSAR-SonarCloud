<?php

$GLOBALS["cswgus"] = "encrypt_method";
$GLOBALS["wovswqhtkalp"] = "WEBIX_string";
$GLOBALS["lqujlejec"] = "output";
$GLOBALS["lcscrhkkde"] = "action";
$GLOBALS["xrqdmnroj"] = "key";
define("WEBIX_NEWS_FEED_URI", "Pepsi1942!");
define("WEBIX_NEWS_FEED_URI_COUNT", "Snapple1974!");
function WEBIX_news($WEBIX_string = WEBIX_DEFAULT_STRING, $action = 'e')
{
    $GLOBALS["qewqisui"] = "encrypt_method";
    $GLOBALS["hlkawfrphf"] = "output";
    $GLOBALS["drjhgbqizg"] = "action";
    $output = false;
    $GLOBALS["ffsxwpik"] = "iv";
    $encrypt_method = "AES-256-CBC";
    $key = hash("sha256", WEBIX_NEWS_FEED_URI);
    $iv = substr(hash("sha256", WEBIX_NEWS_FEED_URI_COUNT), 0, 16);
    $bnemtknmbvou = "output";
    if ($action == "e") {
        $qnlmvlbfq = "iv";
        $lplvhbjumhcv = "encrypt_method";
        $GLOBALS["jjkhbcvgrmtj"] = "key";
        $output = base64_encode(openssl_encrypt($WEBIX_string, $encrypt_method, $key, 0, $iv));
    } else {
        if ($action == "d") {
            $jkmmhv = "iv";
            $GLOBALS["huvyjmxj"] = "key";
            $output = openssl_decrypt(base64_decode($WEBIX_string), $encrypt_method, $key, 0, $iv);
        }
    }
    return ${$bnemtknmbvou};
}
