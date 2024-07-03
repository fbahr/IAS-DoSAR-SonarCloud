<?php

include_once "init.php";
$modleName = "cpanel_extended";
$secret = "659c08a59bbb484f3b40591";
$keyName = "cpanel_extended_licensekey";
$dir = "/var/www/html";
$sellKey = "ModulesGarden_CPanelEX_54M02934WH301844E_RicRey";
$license_file = "/var/www/html/modules/servers/cpanelExtended/license.php";
$content = '';
if (file_exists($license_file)) {
    $content = file_get_contents($license_file);
} else {
    echo "Please Upload \"license.php\" File Inside: /var/www/html/modules/servers/cpanelExtended/";
}
preg_match("/cpanel_extended_licensekey\\s?=\\s?\"([A-Za-z0-9_]+)\"/", $content, $matches);
$key_data = WHMCS\Database\Capsule::table("tblconfiguration")->where("setting", "cpanel_extended_localkey")->first();
if (!$key_data) {
    WHMCS\Database\Capsule::table("tblconfiguration")->insert(array("setting" => "cpanel_extended_localkey", "value" => ''));
}
$key = $matches[1];
if ($key != $sellKey) {
    die("Invalid \"license.php\" file!");
}
function getWhmcsDomain()
{
    if (!empty($_SERVER["SERVER_NAME"])) {
        return $_SERVER["SERVER_NAME"];
    }
}
function getIp()
{
    return isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : $_SERVER["LOCAL_ADDR"];
}
$license = array("licensekey" => $key, "validdomain" => getWhmcsDomain(), "validip" => getIp(), "validdirectory" => $dir . "/modules/servers/cpanelExtended," . $dir . "/modules/addons," . $dir . "/modules/addons/CpanelExtended," . $dir . "/modules/servers/cpanelExtended," . $dir . "/modules/servers," . $dir . "," . $dir . "/modules");
$checkToken = time() . md5(rand(1000000000, 0) . $key);
$license["checkdate"] = date("Ymd");
$license["checktoken"] = $checkToken;
$license["status"] = "Active";
$encoded = serialize($license);
$encoded = base64_encode($encoded);
$encoded = md5($license["checkdate"] . $secret) . $encoded;
$encoded = strrev($encoded);
$encoded .= md5($encoded . $secret);
$encoded = wordwrap($encoded, 80, "\n", true);
try {
    WHMCS\Database\Capsule::table("tblconfiguration")->where("setting", "cpanel_extended_localkey")->update(array("value" => $encoded));
    echo "Done!";
} catch (\Throwable $e) {
    echo "There is an issue, contact 'Lalbilla' on Babiato.co.";
}
