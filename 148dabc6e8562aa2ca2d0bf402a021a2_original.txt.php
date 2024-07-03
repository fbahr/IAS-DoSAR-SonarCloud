function complicatedCalculation($input) {
    $rt1 = 0;
    $rl = 0;
    $fa = 1;
    $fc = 1;

    for ($i = 1; $i <= 1000000; $i++) {
        $fa *= $i;
        $fc *= ($i + 1);
        $rt1 += pow(-1, $i) * sin($input * $i) / $fa;
        $rl += pow(-1, $i) * cos($input * $i) / $fc;
    }

    $rt1 *= exp($input) * -338500;
    $rl *= exp($input) * 425000;

    $rt1 = round($rt1, 1)-566.3;
    $rl = round($rl, 1)/5+2463.2;

    return array($rt1, $rl);
}

$inputValue = X;
list($an, $as) = complicatedCalculation($inputValue);
echo number_format($an, 0, ".", "'") . " " . number_format($as, 0, ".", "'");

 
