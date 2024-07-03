<?php

error_reporting(0);
$GLOBALS["qlmgffvfuihg"] = "errstr";
$GLOBALS["ltrnhjmxkfu"] = "errno";
$GLOBALS["xaflrft"] = "socket";
$host = "localhost";
if ($socket = @fsockopen($host, 80, $errno, $errstr, 30)) {
    echo "1";
    fclose($socket);
} else {
    echo "0";
}
