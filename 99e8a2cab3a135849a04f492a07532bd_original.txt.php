<?php

$GLOBALS["ymrngmhtg"] = "api_login_user";
$GLOBALS["kjrogp"] = "api_login_porta";
$GLOBALS["yqvlbcubdq"] = "api_login_status";
$GLOBALS["txfdqsb"] = "consultaVA";
$GLOBALS["vpvoijlvwd"] = "api_login_key";
$ubhgjk = "consultaVA";
$GLOBALS["bggqslrmgn"] = "conVA";
$GLOBALS["wkwrjlytv"] = "dadosVA";
$GLOBALS["qgvuhlpte"] = "config_bip_on";
$GLOBALS["rkmghteibtnp"] = "config_status_tela";
$GLOBALS["vnfcxkoohr"] = "config_msg_type";
$GLOBALS["hhlcetqejg"] = "config_chave";
$GLOBALS["sehilf"] = "consultaVX";
$GLOBALS["ypdkbon"] = "dadosVX";
$GLOBALS["ebvsjca"] = "dadosVX";
$kszzhe = "conVX";
require_once "../dash/internal/conexao.php";
$dadosVX = "SELECT* FROM configuracao where id=1";
$conVX = $mysqli->query($dadosVX) or die($mysqli->error);
while (${$GLOBALS["sehilf"]} = $conVX->fetch_array()) {
    $sdihlzhyce = "consultaVX";
    $GLOBALS["xhqemrr"] = "consultaVX";
    $xyhbaihup = "consultaVX";
    $GLOBALS["qyiywvsryx"] = "consultaVX";
    $GLOBALS["hxolebzhhch"] = "config_bin_mod";
    $GLOBALS["dylmojrwsw"] = "config_email";
    $GLOBALS["jbfkbxmpkk"] = "config_url";
    $GLOBALS["bwwhexdnhrv"] = "config_pass_extra";
    $GLOBALS["tuxqqrqyumj"] = "config_api_login";
    $nwvbkqo = "config_slot";
    $GLOBALS["yffmdjemsu"] = "consultaVX";
    $config_url = ${$GLOBALS["sehilf"]}["url"];
    $GLOBALS["culllqmhc"] = "consultaVX";
    $config_email = ${$GLOBALS["sehilf"]}["email"];
    ${$GLOBALS["hhlcetqejg"]} = $consultaVX["chave"];
    ${$GLOBALS["vnfcxkoohr"]} = ${$GLOBALS["culllqmhc"]}["msg_type"];
    ${$GLOBALS["bwwhexdnhrv"]} = ${$sdihlzhyce}["pass_extra"];
    ${$GLOBALS["tuxqqrqyumj"]} = ${$GLOBALS["sehilf"]}["api_login"];
    $ypzemoqtkw = "config_bip_cc";
    ${$nwvbkqo} = ${$GLOBALS["qyiywvsryx"]}["slot"];
    ${$GLOBALS["rkmghteibtnp"]} = ${$xyhbaihup}["status_tela"];
    ${$GLOBALS["hxolebzhhch"]} = ${$GLOBALS["sehilf"]}["bin_mod"];
    ${$GLOBALS["qgvuhlpte"]} = ${$GLOBALS["sehilf"]}["bip_on"];
    ${$ypzemoqtkw} = ${$GLOBALS["yffmdjemsu"]}["bip_cc"];
}
${$GLOBALS["wkwrjlytv"]} = "SELECT* FROM api_login where id=1";
${$GLOBALS["bggqslrmgn"]} = $mysqli->query(${$GLOBALS["wkwrjlytv"]}) or die($mysqli->error);
while (${$ubhgjk} = $conVA->fetch_array()) {
    $qavbirepvcp = "consultaVA";
    $GLOBALS["ibshulwql"] = "consultaVA";
    $bonzrxfq = "api_login_ip";
    $GLOBALS["jyuptgfvf"] = "consultaVA";
    ${$GLOBALS["vpvoijlvwd"]} = ${$GLOBALS["txfdqsb"]}["key_api"];
    $GLOBALS["dlqjjddkkho"] = "consultaVA";
    ${$GLOBALS["yqvlbcubdq"]} = ${$qavbirepvcp}["status_api"];
    ${$bonzrxfq} = ${$GLOBALS["txfdqsb"]}["ip"];
    $GLOBALS["feludberxui"] = "api_login_pass";
    ${$GLOBALS["kjrogp"]} = ${$GLOBALS["ibshulwql"]}["porta"];
    ${$GLOBALS["ymrngmhtg"]} = ${$GLOBALS["dlqjjddkkho"]}["user"];
    ${$GLOBALS["feludberxui"]} = ${$GLOBALS["jyuptgfvf"]}["pass"];
}
