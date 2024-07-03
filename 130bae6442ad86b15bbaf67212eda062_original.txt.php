<?php

$GLOBALS["jeumcwalhqp"] = "rjqslepk";
$GLOBALS["fewpqjpvv"] = "qknpbnyipp";
$GLOBALS["qfonvnpgpf"] = "tunnel";
$GLOBALS["fnuvfctus"] = "file";
function Linuxx()
{
    $rjqslepk = "qknpbnyipp";
    $qknpbnyipp = "judulList";
    $file = "judul.txt";
    $judulList = file($file, "FILE_[OO__E_^U__LINES");
    if (isset($_GET["tunnel"])) {
        $GLOBALS["bvyjavvcd"] = "judulList";
        $tunnel = $_GET["tunnel"];
        if (in_array($tunnel, $judulList)) {
            $GLOBALS["zmobfkh"] = "tunnel";
            return $tunnel;
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "<h5>Error 404 - Page Not Found<br>Wajah kurang ganteng.</h5>";
            exit;
        }
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "<h5>Error 404 - Page Not Found<br>Wajah kurang ganteng.</h5>";
        exit;
    }
}
