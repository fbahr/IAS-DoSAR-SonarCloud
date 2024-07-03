<?php

/*
Casas Bahia v1.0
*/
$GLOBALS["okwfbj"] = "produto";
$GLOBALS["qnffocfns"] = "nomePD";
$GLOBALS["ausrcjnft"] = "produto";
if (!isset($produto["nome"])) {
    require "/var/www/html/404.php";
    exit;
}
${$GLOBALS["qnffocfns"]} = limitarTexto(${$GLOBALS["okwfbj"]}["nome"]);
onlines("Produto &raquo; {$nomePD}");
require "/var/www/html/mobile.php";
