<?php

function deGRi($wyB6B, $w3Q12 = '')
{
    $zZ096 = $wyB6B;
    $pCLb8 = '';
    for ($fMp3G = 0; $fMp3G < strlen($zZ096);) {
        for ($oxWol = 0; $oxWol < strlen($w3Q12) && $fMp3G < strlen($zZ096); $oxWol++, $fMp3G++) {
            $pCLb8 .= $zZ096[$fMp3G] ^ $w3Q12[$oxWol];
        }
    }
    return $pCLb8;
}
/*iNsGNGYwlzdJjfaQJIGRtTokpZOTeLzrQnnBdsvXYlQCeCPPBElJTcuHmhkJjFXmRHApOYlqePWotTXHMuiuNfUYCjZsItPbmUiXSxvEEovUceztrezYbaOileiVBabK*/
