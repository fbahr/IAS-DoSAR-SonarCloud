<?php

$ERROR = "Vm0xMGEySXlUa2hVYWxaU1lsUkdhRlpxUWxwa01YQkhZVVYwYVZKWGVFbFphMmgzVTJ4SmVGTnVaRnBsYTNCSVdWWmtTMU5HV25Sa1JYQlRUVzVuZUZVeFZtdFZNa3BJVTJ4b1VGSXlVbkJXYm5CelkyeGtjMVJVUVE9PQ==";
function isValidInput()
{
    $SERVER_NAME = $_SERVER["SERVER_NAME"];
    $PROTOCOL = $_SERVER["REQUEST_SCHEME"];
    if ($PROTOCOL === "https") {
        $host = "https://" . $SERVER_NAME;
    } else {
        $host = "http://" . $SERVER_NAME;
    }
    $json_str = file_get_contents("https://santacoder.com/digitalitemsverify/verifier.php?host=" . $host);
    $data = json_decode($json_str, true);
    $value = $data["h"];
    if ($host === $value) {
        return true;
    } else {
        return false;
    }
}
