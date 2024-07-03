<?php

ini_set("display_errors", "0");
ini_set("display_startup_errors", "0");
error_reporting(0);
$o2d816da6 = "localhost";
$zbe3269d8 = "ilbenessere_cpcapriascadb";
$jf85e0677 = "ilbenessere_cpcapriascauser";
$j35c246d5 = "~=NVvCG#G[b[";
$b1a28019a = mysqli_connect($o2d816da6, $jf85e0677, $j35c246d5, $zbe3269d8) or die("Connection failed: " . mysqli_connect_error());
if (isset($_GET["Entity"])) {
    if ($_GET["Entity"] == "Fire") {
        $zdbd66adf = " SELECT * FROM firefighters WHERE DELETED = 0 order by firefighter_name";
    }
    if ($_GET["Entity"] == "Vehi") {
        $zdbd66adf = " SELECT * FROM vehicles WHERE DELETED = 0  order by vehicle_brand";
    }
    if ($_GET["Entity"] == "Trip") {
        $zdbd66adf = " SELECT * FROM trips WHERE DELETED = 0";
    }
    $g24bdb5eb = mysqli_query($b1a28019a, $zdbd66adf) or die("error: sql=" . $zdbd66adf);
    $ue94505aa = mysqli_num_rows($g24bdb5eb);
    $c1fae76e9 = array();
    if ($ue94505aa > 0) {
        while ($a8430f6db = mysqli_fetch_array($g24bdb5eb)) {
            $r18a63630 = array();
            if ($_GET["Entity"] == "Fire") {
                $r18a63630[] = $a8430f6db["id_firefigther"];
                $r18a63630[] = utf8_encode($a8430f6db["firefighter_name"]);
                $r18a63630[] = $a8430f6db["firefigther_active"];
                $r18a63630[] = $a8430f6db["DELETED"];
            }
            if ($_GET["Entity"] == "Vehi") {
                $r18a63630[] = $a8430f6db["id_vehicle"];
                $r18a63630[] = utf8_encode($a8430f6db["vehicle_brand"]);
                $r18a63630[] = utf8_encode($a8430f6db["vehicle_model"]);
                $r18a63630[] = $a8430f6db["vehicle_plate"];
                $r18a63630[] = $a8430f6db["vehicle_current_km"];
                $r18a63630[] = $a8430f6db["vehicle_active"];
                $r18a63630[] = $a8430f6db["DELETED"];
            }
            if ($_GET["Entity"] == "Trip") {
            }
            $c1fae76e9[] = $r18a63630;
        }
    }
    echo json_encode($c1fae76e9);
}
