<?php

function do_post_request($url, $data, $optional_headers = null)
{
    $params = array("http" => array("method" => "POST", "content" => $data));
    if (!($optional_headers !== null)) {
        goto da5375b3f77d3b40570419180dae5e77;
    }
    $params["http"]["header"] = $optional_headers;
    da5375b3f77d3b40570419180dae5e77:
    $ctx = stream_context_create($params);
    $fp_lc = @fopen($url, "rb", false, $ctx);
    $response = @stream_get_contents($fp_lc);
    return $response;
}
$erer = shell_exec("hostname");
$hostname = trim($erer);
$timezone = "Asia/Manila";
date_default_timezone_set($timezone);
$getsdcard = shell_exec("cat /proc/cpuinfo | grep Serial | cut -d ' ' -f 2");
$xd = trim($getsdcard);
$sec = date("YmdHi");
$sitehash = "http://lpbpisowifi.alltools.online/genhash.php";
$params = "hash=" . $xd . "&";
$params .= "zxc=" . $sec . '';
$genhash = do_post_request($sitehash, $params);
$gencard = htmlspecialchars(trim(strip_tags($genhash)));
echo "\t";
