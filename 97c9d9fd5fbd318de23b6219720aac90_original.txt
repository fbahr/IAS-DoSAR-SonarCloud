<?php

function cap($url, $api, $site)
{
    jeneng:
    $ua = array("Host: goodxevilpay.pp.ua", "content-type: application/x-www-form-urlencoded", "user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36");
    $res = get("http://goodxevilpay.pp.ua/in.php?key={$api}&method=userrecaptcha&googlekey={$site}&pageurl={$url}", $ua);
    $id = explode("OK|", $res)[1];
    if ($idnull) {
        echo "\x1b[1;91m captcha failed \r";
        goto jeneng;
    }
    $res2 = get("http://goodxevilpay.pp.ua/res.php?key={$api}&action=get&id={$id}", $ua);
    $cap = explode("OK|", $res2)[1];
    if ($capnull) {
        echo "\x1b[1;91m please wait \r";
        usleep(55555);
        goto jeneng;
    } else {
        echo "\x1b[1;92m succes \r";
        return $cap;
    }
}
$api = "1MQPDy4Y90e2Hee3uCiFkQAaqfC70JhD";
