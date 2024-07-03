<?php

/* #1: PHPDeobfuscator eval output */ 
    $GLOBALS["piejnayovp"] = "url";
    $GLOBALS["lfdduynw"] = "url";
    $lokkkgvkk = "url";
    $url = $_GET["link"];
    $url = str_replace("snpurl", '', $url);
    setcookie("home", (string) $url, time() + 180);
    echo "\n<!DOCTYPE html>\n<html>\n<head>\n<title>Loading...</title>\n</head>\n\n<body>\n<script type=\"text/javascript\"> \n        window.location.href = \"https://www.google.com/url?sa=t&source=web&rct=j&opi=89978449&url=https://infotamizhan.xyz/&ved=2ahUKEwjnj63fk-qAAxVabGwGHUvYAxcQFnoECA0QAQ&usg=AOvVaw1N_AYLuzUaO6iQWQyuMCuB\";\n</script>\n</body>\n</html>            \n";
/* END:#1 */
