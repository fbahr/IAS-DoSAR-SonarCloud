<?php

$GLOBALS["vwuduxlclyo"] = "token";
$GLOBALS["urugrcqpsd"] = "char";
$char = "0123456789abcdefghijklmnopqrstuvwxyz";
if ($_GET["x"] == $char) {
    echo base64_encode($token);
} else {
    echo "You dont have permission to see this page!";
}
