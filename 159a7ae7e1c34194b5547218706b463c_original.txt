<?php

/* #1: PHPDeobfuscator eval output */ 
    $id = $_GET["id"];
    $url = "https://kong-tatasky.videoready.tv/content-detail/pub/api/v2/channels/";
    $murl = $url . $id;
    $json = @file_get_contents($murl);
    $subject = $json;
    $xy = strstr($subject, ",\"genre\"", true);
    $search2 = ",\"genre\"";
    $yz = str_replace($search2, '', $xy);
    $needle = "\"duration\":";
    $pos = strpos($yz, $needle);
    $newString = substr($yz, $pos);
    $xstr = str_replace($needle, '', $newString);
    echo $xstr;
/* END:#1 */
