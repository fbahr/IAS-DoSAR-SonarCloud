<?php

/* #1: PHPDeobfuscator eval output */ 
    function e7061($e)
    {
        $ed = base64_decode($e);
        $n = openssl_decrypt("{$ed}", "AES-256-CBC", "1122334455114545", 0, "1122334455114545");
        return $n;
    }
    echo "";
/* END:#1 */
