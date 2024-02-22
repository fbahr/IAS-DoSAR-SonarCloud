<?php

/* #1: PHPDeobfuscator eval output */ 
    include 'check_limit.php';
    $userIP = get_user_ip();
    check_user_limit($userIP);
    $recaptchaToken = $_POST['token'];
    $url = $_POST['url'];
    $data = json_decode(file_get_contents('cookies.json'), true);
    $r = $data['FP']['cookie_data']['GR_REFRESH'];
    $t = $data['FP']['cookie_data']['GR_TOKEN'];
    $coook = "GR_REFRESH={$r};GR_TOKEN={$t};";
    preg_match('/_(\\d+)\\.htm/', $url, $match);
    $f_id = $match[1];
    $t = $recaptchaToken;
    if (strpos($url, 'premium-video') !== false || strpos($url, 'free-video') !== false) {
        $split_url = explode("_", basename($url));
        $video_id_with_fragment = $split_url[1];
        $video_id = strtok($video_id_with_fragment, '#');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
            exit;
        }
        curl_close($ch);
        $dom = new DOMDocument();
        @$dom->loadHTML($response);
        $script = $dom->getElementById('__NEXT_DATA__');
        $content = $script->nodeValue;
        $data = json_decode($content);
        $options = $data->props->pageProps->options;
        $urlArray = array();
        foreach ($options as $option) {
            $size = $option->id;
            $q = $option->quality;
            $ex = $option->container;
            $ch = curl_init();
            $url = "https://www.freepik.com/api/download?optionId={$size}";
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $headers = array('Accept: application/json', 'Referer: https://www.freepik.com/', 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'cookie: ' . $coook . '');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'cURL error: ' . curl_error($ch);
            }
            curl_close($ch);
            $data = json_decode($response, true);
            $urlArray[] = array('url' => $data['url'], 'quality' => $q, 'container' => $ex);
        }
        $json = json_encode($urlArray);
        $data = json_decode($json, true);
        foreach ($data as $item) {
            $url = $item['url'];
            $quality = $item['quality'];
            $container = $item['container'];
            echo "<br>";
            echo "<center><h2>Download Video -{$quality} - {$container}  :)</h2></center>";
            echo "<br>";
            echo "<center><a id='redisrect-button' style= 'padding:10px 20px;color:white; border: 1px solid rgb(255, 0, 0); background-color:rgb(255, 0, 0);' href='{$url}' >Download File</a> </center>";
            echo "<br>";
            echo "</div>";
            echo "<br>";
        }
    } else {
        $url = "https://www.freepik.com/xhr/register-download/{$f_id}?type=regular";
        $headers = array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Accept-Language: en-US,en;q=0.5', 'Referer: https://www.freepik.com/', 'x-requested-with: XMLHttpRequest', 'cookie: ' . $coook . '');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);
        $url = 'https://www.freepik.com/xhr/validate';
        $headers = array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Accept-Language: en-US,en;q=0.5', 'Referer: https://www.freepik.com/', 'x-requested-with: XMLHttpRequest', 'cookie: ' . $coook . '');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);
        $url = "https://www.freepik.com/xhr/download-url/{$f_id}?token={$t}";
        $headers = array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Accept-Language: en-US,en;q=0.5', 'Referer: https://www.freepik.com/', 'x-requested-with: XMLHttpRequest', 'cookie: ' . $coook . '');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        // Extract the URL
        $url = $data['url'];
        echo "<center><h2>Download Your File  :)</h2></center>";
        echo "<br>";
        echo "<center><a id='redisrect-button' style= 'padding:10px 20px;color:white; border: 1px solid rgb(255, 0, 0); background-color:rgb(255, 0, 0);' href='{$url}' >Download File</a> </center>";
        echo "<br>";
        echo "</div>";
        echo "<br>";
    }
/* END:#1 */
