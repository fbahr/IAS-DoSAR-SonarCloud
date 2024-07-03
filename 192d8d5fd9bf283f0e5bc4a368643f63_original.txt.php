<?php

/*   __________________________________________________
    |  Obfuscated by YAK Pro - Php Obfuscator  2.0.14  |
    |              on 2023-10-07 08:39:55              |
    |    GitHub: https://github.com/pk-fr/yakpro-po    |
    |__________________________________________________|
*/
namespace GDPlayer;

class HLS extends \GDPlayer\StreamHelper
{
    public function __construct(string $vHost = '', string $vID = '', string $url = '', bool $bypassRateLimit = false)
    {
        session_write_close();
        parent::__construct($vHost, $vID, $url, $bypassRateLimit);
    }
    private function parseBandwidth(string $hlsconte = '')
    {
        session_write_close();
        preg_match_all("/BANDWIDTH=([^,]+)/", $hlsconte, $bandwidth);
        if (!($this->reduceBandwidth > 0 && !empty($bandwidth[1]))) {
            goto kLO2Ji4mw0YSC0k2;
        }
        session_write_close();
        foreach ($bandwidth[1] as $val) {
            session_write_close();
            $ex = explode("\n", strtr($val, ["\r\n" => "\n"]));
            if (!isset($ex[0])) {
                goto pXHqQ7cMM2s1pMT2;
            }
            session_write_close();
            $val = $ex[0];
            pXHqQ7cMM2s1pMT2:
            $bv = intval($val - $val * $this->reduceBandwidth / 100);
            $hlsconte = strtr($hlsconte, ["BANDWIDTH={$val}" => "BANDWIDTH={$bv}"]);
        }
        kLO2Ji4mw0YSC0k2:
        return $hlsconte;
    }
    private function parsePlaylist(string $hlsconte = '', string $prefix = "/playlist/")
    {
        session_write_close();
        $lines = array_values(array_filter(explode("\n", strtr($hlsconte, ["\r\n" => "\n"]))));
        return array_map(function ($val) use($prefix) {
            goto JN45PWKtpVirKvlt;
            iC3UaJ8zZyGt1NSi:
            MBKG1WklaJw71Y4D:
            goto cHvj59JONMWw3z_B;
            ZNKkg3Y3E58EQFxx:
            $result .= "\n## Developed by GDPlayer.to";
            goto Go_ap04MJPVo2jso;
            JN45PWKtpVirKvlt:
            session_write_close();
            goto Cp0fFis7w44qCHBm;
            YImCxbllCEkKVZDJ:
            NKV7d0xCAXr6LCJ4:
            goto n3d0qamDOFGNquRw;
            Cp0fFis7w44qCHBm:
            $result = $val;
            goto U7sl7BZlE1x9kG0s;
            mYwjmVpwoKRpmI5M:
            goto FSrsIHFaDFTH0Afy;
            goto z2o760BbxPiHU1qE;
            cHvj59JONMWw3z_B:
            session_write_close();
            goto RoX4RelHn4d1QgrW;
            RoX4RelHn4d1QgrW:
            preg_match("/URI=\"([^\"]+)\"/", $val, $uriVal);
            goto TRLED62aUacUFJzd;
            EbkOfaOhyPeEnd3b:
            FSrsIHFaDFTH0Afy:
            goto yyElb3DBju2UOrAu;
            Go_ap04MJPVo2jso:
            goto FSrsIHFaDFTH0Afy;
            goto iC3UaJ8zZyGt1NSi;
            UH9Ga7OjaZ00IASU:
            goto FSrsIHFaDFTH0Afy;
            goto YImCxbllCEkKVZDJ;
            yyElb3DBju2UOrAu:
            return $result;
            goto OupxT98cBuNlR8MF;
            n3d0qamDOFGNquRw:
            session_write_close();
            goto uOIJALljJ03V4Wcn;
            O2amAcs5wW50itzQ:
            if (strpos($val, "#EXT") === false) {
                goto NKV7d0xCAXr6LCJ4;
            }
            goto mYwjmVpwoKRpmI5M;
            U7sl7BZlE1x9kG0s:
            if ($val === "#EXTM3U") {
                goto ad7pq_n81bPkdihs;
            }
            goto D6XypxV8ubz43ZYw;
            TRLED62aUacUFJzd:
            $result = strtr($val, [$uriVal[0] => "URI=\"" . $this->bypassURL($uriVal[1], $prefix) . "\""]);
            goto UH9Ga7OjaZ00IASU;
            z2o760BbxPiHU1qE:
            ad7pq_n81bPkdihs:
            goto yXbtIXsmXjz3tBLZ;
            D6XypxV8ubz43ZYw:
            if (strpos($val, "URI=") !== false) {
                goto MBKG1WklaJw71Y4D;
            }
            goto O2amAcs5wW50itzQ;
            yXbtIXsmXjz3tBLZ:
            session_write_close();
            goto ZNKkg3Y3E58EQFxx;
            uOIJALljJ03V4Wcn:
            $result = $this->bypassURL($val, $prefix);
            goto EbkOfaOhyPeEnd3b;
            OupxT98cBuNlR8MF:
        }, $lines);
    }
    private function parseHLS(string $hlsconte = '')
    {
        session_write_close();
        $hlsconte = $this->parseBandwidth($hlsconte);
        if (strpos($hlsconte, "#EXT-X-STREAM-INF") !== false) {
            session_write_close();
            $newLines = $this->parsePlaylist($hlsconte);
            goto XVeNKXAD3zOLvOHZ;
        }
        session_write_close();
        $newLines = $this->parsePlaylist($hlsconte, "hls");
        XVeNKXAD3zOLvOHZ:
        return implode("\n", $newLines);
    }
    public function playlistStream()
    {
        session_write_close();
        $type = $this->cfFriendly ? "text/plain;charset=UTF-8" : "application/vnd.apple.mpegurl";
        header("Content-Type: " . $type, true);
        $status = 404;
        $err = false;
        $cache = $this->getCacheContent();
        if ($cache) {
            session_write_close();
            $content = $cache;
            goto n0WnPBeQAO8xBkTo;
        }
        if ($this->ch) {
            session_write_close();
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->header);
            $content = curl_exec($this->ch);
            $status = curl_getinfo($this->ch, CURLINFO_RESPONSE_CODE);
            $err = curl_error($this->ch);
            goto iZT00mg114cvDRM3;
        }
        iZT00mg114cvDRM3:
        n0WnPBeQAO8xBkTo:
        if (strpos($content, "#EXT") !== false) {
            session_write_close();
            $content = trim($content, "\xef\xbb\xbf");
            $this->live = strpos($content, "#EXT-X-ENDLIST") === false && strpos($content, "#EXTINF:") !== false;
            if (!is_bool($cache)) {
                goto mOwlyST6B1_hvkDP;
            }
            session_write_close();
            deleteDir($this->cacheBaseDir . "/" . $this->videoHost . "/" . $this->videoId);
            $content = $this->parseHLS($content);
            if (!($this->live === false)) {
                goto N0GsJ0NXq21LL4YO;
            }
            session_write_close();
            create_file($this->cacheFile, $content, "w");
            N0GsJ0NXq21LL4YO:
            mOwlyST6B1_hvkDP:
            $this->cacheContent = $this->parseCache($content);
            $this->cacheContentLen = strlen($this->cacheContent);
            $this->createResponseHeaders(200);
            goto XdAAIrAD9sqTBUXn;
        }
        session_write_close();
        createErrorLog(["/var/www/html/192d8d5fd9bf283f0e5bc4a368643f63_original.txt", "playlistStream", $this->videoURL, $status, $err]);
        $this->retry($status);
        XdAAIrAD9sqTBUXn:
    }
    public function __destruct()
    {
        session_write_close();
        parent::__destruct();
    }
}
