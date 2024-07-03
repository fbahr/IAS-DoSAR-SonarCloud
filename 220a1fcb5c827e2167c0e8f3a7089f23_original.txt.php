<?php

class Ade50065fc0BF68e0c26361CcbDdE708
{
    public $isValid = false;
    public $stream_info = [];
    public $servers = [];
    public $id;
    public $localPID = null;
    public $localMonitorPID = null;
    public $PlayList;
    public $DelayPlayList;
    public $PlayList_md5;
    public $delay = false;
    public $delayPid;
    public $args = [];
    public $currentSource;
    public $onDemand = 0;
    public $archive_en = false;
    public $turnedON = false;
    function __construct($Fcf579c1d1f6ab05c46c8126dc72780f, $fcea393a0aafd270119fe5ab8df7eb1a = true)
    {
        if (!$fcea393a0aafd270119fe5ab8df7eb1a) {
            $this->isValid = true;
            $this->id = $Fcf579c1d1f6ab05c46c8126dc72780f;
            $this->PlayList = STREAMS_PATH . $this->id . "_.m3u8";
            $this->DelayPlayList = DELAY_STREAM . $this->id . "_.m3u8";
            $this->DelayPlayListOld = DELAY_STREAM . $this->id . "_.m3u8_old";
            goto a664bc12c3155bfa00f845994f6239ef;
        }
        App::$ipTV_db->query("SELECT * FROM `streams` WHERE `id` = '%d'", $Fcf579c1d1f6ab05c46c8126dc72780f);
        if (!(App::$ipTV_db->num_rows() > 0)) {
            goto Cc4896317eb3451692ad36374714c7fb;
        }
        $this->isValid = true;
        $this->id = $Fcf579c1d1f6ab05c46c8126dc72780f;
        $this->stream_info = App::$ipTV_db->B04357e9ECD755526f8A29Dc3Ae48f8e();
        $this->PlayList = STREAMS_PATH . $this->id . "_.m3u8";
        $this->DelayPlayList = DELAY_STREAM . $this->id . "_.m3u8";
        $this->DelayPlayListOld = DELAY_STREAM . $this->id . "_.m3u8_old";
        if (!($this->stream_info["direct_source"] == 0)) {
            goto E0e1c0bf3adcbd287892e2a07379d1d0;
        }
        App::$ipTV_db->query("SELECT * FROM `streams_sys` WHERE `stream_id` = '%d'", $this->id);
        if (!(App::$ipTV_db->num_rows() > 0)) {
            goto a57d7dfbaa4de342ea3b5c20c36b5dec;
        }
        $this->servers = App::$ipTV_db->DF3fc71c83Aa0E213757981Bde2C463A(true, "server_id");
        if (empty($this->servers[SERVER_ID])) {
            goto E037d7d366d60820c216d16327d27312;
        }
        $this->turnedON = ($this->servers[SERVER_ID]["stream_status"] == 0 and $this->servers[SERVER_ID]["to_analyze"] == 0 and empty($this->servers[SERVER_ID]["stream_started"]) and empty($this->servers[SERVER_ID]["pid"])) ? false : true;
        if (empty($this->servers[SERVER_ID]["current_source"])) {
            goto d51a27fdc5cec91dbfc78f486edc7e01;
        }
        $this->currentSource = $this->servers[SERVER_ID]["current_source"];
        d51a27fdc5cec91dbfc78f486edc7e01:
        $this->stream_info["sources"] = [];
        if (!($this->servers[SERVER_ID]["parent_id"] == 0)) {
            goto D79a8b2edf3bdf3ccadda4d9a729a92c;
        }
        $this->stream_info["sources"] = json_decode($this->stream_info["stream_source"], true);
        D79a8b2edf3bdf3ccadda4d9a729a92c:
        $this->stream_info["auto_restart"] = json_decode($this->stream_info["auto_restart"], true);
        $this->localPID = !empty($this->servers[SERVER_ID]["pid"]) ? $this->servers[SERVER_ID]["pid"] : null;
        $this->localMonitorPID = !empty($this->servers[SERVER_ID]["monitor_pid"]) ? $this->servers[SERVER_ID]["monitor_pid"] : null;
        if (!($this->stream_info["delay_minutes"] > 0 && $this->servers[SERVER_ID]["parent_id"] == 0)) {
            goto Ea3ebde480a91e8f4e2e20240a7e0d10;
        }
        $this->delay = true;
        if (!$this->a2D2128CB844Ef301441Ed274b1AD284()) {
            goto c43aa1c7eb23ea16655f2c848a683cfe;
        }
        $this->delayPid = $this->servers[SERVER_ID]["delay_pid"];
        $this->delayRun = true;
        c43aa1c7eb23ea16655f2c848a683cfe:
        Ea3ebde480a91e8f4e2e20240a7e0d10:
        $this->onDemand = $this->servers[SERVER_ID]["on_demand"] ? true : false;
        $this->archive_en = $this->stream_info["tv_archive_server_id"] == SERVER_ID && $this->stream_info["tv_archive_duration"] > 0 ? true : false;
        E037d7d366d60820c216d16327d27312:
        a57d7dfbaa4de342ea3b5c20c36b5dec:
        E0e1c0bf3adcbd287892e2a07379d1d0:
        Cc4896317eb3451692ad36374714c7fb:
        a664bc12c3155bfa00f845994f6239ef:
    }
    static function b64C142aaAa4Fa58056fAB1349A2a651($E786faacad0040745ac33d4a9df0125c)
    {
        App::$ipTV_db->query("\r\n                SELECT * FROM `streams` t1 \r\n                LEFT JOIN `transcoding_profiles` t3 ON t1.transcode_profile_id = t3.profile_id\r\n                WHERE t1.`id` = '%d'", $E786faacad0040745ac33d4a9df0125c);
        $B4ef9a5c89d757eec6f7f6b4e1a9fdc5 = App::$ipTV_db->B04357e9EcD755526F8A29DC3Ae48f8e();
        $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["cchannel_rsources"] = json_decode($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["cchannel_rsources"], true);
        $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["stream_source"] = json_decode($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["stream_source"], true);
        $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"] = json_decode($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"], true);
        $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["transcode_attributes"] = json_decode($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["profile_options"], true);
        if (array_key_exists("-acodec", $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["transcode_attributes"])) {
            goto A86ade477564cc7cf9eb3ce69c66c698;
        }
        $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["transcode_attributes"]["-acodec"] = "copy";
        A86ade477564cc7cf9eb3ce69c66c698:
        if (array_key_exists("-vcodec", $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["transcode_attributes"])) {
            goto F0d5d140ef412fd8705371f5194bd025;
        }
        $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["transcode_attributes"]["-vcodec"] = "copy";
        F0d5d140ef412fd8705371f5194bd025:
        $F381662b79f9ed04cde41d1ea44fa912 = "FFMPEG_PATH -fflags +genpts -async 1 -y -nostdin -hide_banner -loglevel quiet -i \"{INPUT}\" ";
        $F381662b79f9ed04cde41d1ea44fa912 .= implode(" ", self::D88383180a3e5BD9020C9e867dE4Eb99($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["transcode_attributes"])) . " ";
        $F381662b79f9ed04cde41d1ea44fa912 .= "-strict -2 -mpegts_flags +initial_discontinuity -f mpegts \"CREATED_CHANNELS" . $E786faacad0040745ac33d4a9df0125c . "_{INPUT_MD5}.ts\" >/dev/null 2>/dev/null & jobs -p";
        $D5eafa8c67e0373d412ed8296bf72752 = array_diff($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["stream_source"], $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["cchannel_rsources"]);
        $D8a62bda0c5cf95cdebd83dde01252c6 = "";
        foreach ($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["stream_source"] as $Cd0f6f0305d83abdfd3242e96e223b3e) {
            $D8a62bda0c5cf95cdebd83dde01252c6 .= "file 'CREATED_CHANNELS" . $E786faacad0040745ac33d4a9df0125c . "_" . md5($Cd0f6f0305d83abdfd3242e96e223b3e) . ".ts'\n";
        }
        $D8a62bda0c5cf95cdebd83dde01252c6 = base64_encode($D8a62bda0c5cf95cdebd83dde01252c6);
        if (!empty($D5eafa8c67e0373d412ed8296bf72752) || $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["stream_source"] !== $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["cchannel_rsources"]) {
            foreach ($D5eafa8c67e0373d412ed8296bf72752 as $Cd0f6f0305d83abdfd3242e96e223b3e) {
                if (substr($Cd0f6f0305d83abdfd3242e96e223b3e, 0, 2) == "s:") {
                    $F9df3dc3135806b6a483cd05ce046707 = explode(":", $Cd0f6f0305d83abdfd3242e96e223b3e, 3);
                    $B3ea768a89a03f97f236a4dccecdd200 = $F9df3dc3135806b6a483cd05ce046707[1];
                    if ($B3ea768a89a03f97f236a4dccecdd200 != SERVER_ID) {
                        $F9e70a962ccbabc92529f26aa4779cc8 = App::$StreamingServers[$B3ea768a89a03f97f236a4dccecdd200]["api_url"] . "&action=getFile&filename=" . urlencode($F9df3dc3135806b6a483cd05ce046707[2]);
                        goto Ea49ca9a268cf008fc8910bd242596de;
                    }
                    $F9e70a962ccbabc92529f26aa4779cc8 = $F9df3dc3135806b6a483cd05ce046707[2];
                    Ea49ca9a268cf008fc8910bd242596de:
                    goto f0cee80c4702402eadf2e857453f572d;
                }
                if (substr($Cd0f6f0305d83abdfd3242e96e223b3e, 0, 4) == "vod:") {
                    list($C8eeed4668d3083a6004f2bdbe4a6f0b, $f29458c28c995340620b627026212267, ) = explode(":", $Cd0f6f0305d83abdfd3242e96e223b3e);
                    App::$ipTV_db->query("SELECT t1.`server_id`,t1.`vod_folder`,t2.target_container FROM `streams_sys` t1 INNER JOIN `streams` t2 ON t2.id = t1.stream_id WHERE (t1.parent_id = 0 OR t1.parent_id IS NULL) AND t1.`stream_id` = '%d' LIMIT 1", $f29458c28c995340620b627026212267);
                    if (!(App::$ipTV_db->num_rows() > 0)) {
                        goto a96d802c4f79dc07a7d4462b0c696386;
                    }
                    $Eb7fcb9449eca871add8962b580d0795 = App::$ipTV_db->B04357e9ECD755526F8a29dc3aE48F8E();
                    print_r($Eb7fcb9449eca871add8962b580d0795);
                    $F27d7fe9cc099b4ad40bcf7a8b2961f7 = json_decode($Eb7fcb9449eca871add8962b580d0795["target_container"], true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $Eb7fcb9449eca871add8962b580d0795["target_container"] = $F27d7fe9cc099b4ad40bcf7a8b2961f7;
                        goto C6fbb2123ace8755835ec0871c8ba391;
                    }
                    $Eb7fcb9449eca871add8962b580d0795["target_container"] = [$Eb7fcb9449eca871add8962b580d0795["target_container"]];
                    C6fbb2123ace8755835ec0871c8ba391:
                    $Eb7fcb9449eca871add8962b580d0795["target_container"] = $Eb7fcb9449eca871add8962b580d0795["target_container"][0];
                    $b1a19966efe37144224bbfc2aed45947 = empty($Eb7fcb9449eca871add8962b580d0795["vod_folder"]) ? MOVIES_PATH : $Eb7fcb9449eca871add8962b580d0795["vod_folder"];
                    $c993c0c4e4181a2893012109b36f71d7 = $b1a19966efe37144224bbfc2aed45947 . $f29458c28c995340620b627026212267 . "." . $Eb7fcb9449eca871add8962b580d0795["target_container"];
                    if ($Eb7fcb9449eca871add8962b580d0795["server_id"] != SERVER_ID) {
                        $F9e70a962ccbabc92529f26aa4779cc8 = App::$StreamingServers[$Eb7fcb9449eca871add8962b580d0795["server_id"]]["api_url"] . "&action=getFile&filename=" . urlencode($c993c0c4e4181a2893012109b36f71d7);
                        goto D9257ef031ea288e10b900ad0ecec7a9;
                    }
                    $F9e70a962ccbabc92529f26aa4779cc8 = $c993c0c4e4181a2893012109b36f71d7;
                    D9257ef031ea288e10b900ad0ecec7a9:
                    a96d802c4f79dc07a7d4462b0c696386:
                    goto fe553f3b3e218819e0af5d4e65bce270;
                }
                $F9e70a962ccbabc92529f26aa4779cc8 = $Cd0f6f0305d83abdfd3242e96e223b3e;
                fe553f3b3e218819e0af5d4e65bce270:
                f0cee80c4702402eadf2e857453f572d:
                $C724e98e104a9775c555dd08bded2b42 = str_ireplace(["{INPUT}", "{INPUT_MD5}"], [$F9e70a962ccbabc92529f26aa4779cc8, md5($Cd0f6f0305d83abdfd3242e96e223b3e)], $F381662b79f9ed04cde41d1ea44fa912);
                $B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"][] = shell_exec($C724e98e104a9775c555dd08bded2b42);
            }
            App::$ipTV_db->query("UPDATE `streams` SET pids_create_channel = '%s',`cchannel_rsources` = '%s' WHERE `id` = '%d'", json_encode($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"]), json_encode($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["stream_source"]), $E786faacad0040745ac33d4a9df0125c);
            shell_exec("echo {$D8a62bda0c5cf95cdebd83dde01252c6} | base64 --decode > \"" . CREATED_CHANNELS . $E786faacad0040745ac33d4a9df0125c . "_.list\"");
            return 1;
        }
        if (!empty($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"])) {
            foreach ($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"] as $D8a714140166b15c24f4e2350c2d69a2 => $B562860a41c56e3f78d05d5ed925c0c4) {
                if (c8eA80626D9030E8839Cffa55c9FBdC1::Abe1D27DC0863F513C6A50fdcaE2cb02($B562860a41c56e3f78d05d5ed925c0c4, FFMPEG_PATH)) {
                    goto C481ea47989312b1606c3f86cb563caa;
                }
                unset($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"][$D8a714140166b15c24f4e2350c2d69a2]);
                C481ea47989312b1606c3f86cb563caa:
            }
            App::$ipTV_db->query("UPDATE `streams` SET pids_create_channel = '%s' WHERE `id` = '%d'", json_encode($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"]), $E786faacad0040745ac33d4a9df0125c);
            return empty($B4ef9a5c89d757eec6f7f6b4e1a9fdc5["pids_create_channel"]) ? 2 : 1;
        }
        a9db3e929ccb5e00935254dcbb94efc9:
        return 2;
    }
    public function A850B05d942bE080562453cB43102512()
    {
        $dbef54a3825e52d17d762425d45a2311 = $this->b40652b8Ff14c544ca66B0E33dd14CCe();
        return file_exists($dbef54a3825e52d17d762425d45a2311) ? md5_file($dbef54a3825e52d17d762425d45a2311) : null;
    }
    public function Cd3c66c18bCdcb4D7E6aFfbCbd677c39()
    {
        if (empty($this->args)) {
            App::$ipTV_db->query("SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = '%d' AND t1.argument_id = t2.id", $this->id);
            $this->args = App::$ipTV_db->df3fC71C83Aa0E213757981bde2c463A();
            return $this->args;
        }
        return $this->args;
    }
    public function f3056D256207Ef9064AD50BC7E8C731F()
    {
        if (!$this->d58517C16e569B322FeD901a57882a5e()) {
            goto Cf450debc0ab82e823b657e41099c991;
        }
        posix_kill($this->localMonitorPID, 9);
        Cf450debc0ab82e823b657e41099c991:
        $this->localMonitorPID = 0;
    }
    public function b9a24B2Cd4e5F05B4076BC5bBc84eC24($faba5cdf2e4c1f11074374ddb0d53b8d = 0)
    {
        $this->f3056D256207eF9064aD50bc7e8c731F();
        $df646a0fa9a071363e67306e1847e052 = STREAMS_PATH . $this->id . ".lock";
        $cf9d4d718144579c3872ec319a7c8300 = fopen($df646a0fa9a071363e67306e1847e052, "a+");
        if (!flock($cf9d4d718144579c3872ec319a7c8300, "LOCK_OZ")) {
            goto F292222b61fa6c094ff577ce0242e636;
        }
        $faba5cdf2e4c1f11074374ddb0d53b8d = intval($faba5cdf2e4c1f11074374ddb0d53b8d);
        $B562860a41c56e3f78d05d5ed925c0c4 = $this->localMonitorPID = shell_exec("PHP_BIN TOOLS_PATH" . "stream_monitor.php {$this->id} {$faba5cdf2e4c1f11074374ddb0d53b8d} >/dev/null 2>/dev/null & echo \$!");
        usleep(300);
        flock($cf9d4d718144579c3872ec319a7c8300, LOCK_UN);
        F292222b61fa6c094ff577ce0242e636:
        fclose($cf9d4d718144579c3872ec319a7c8300);
    }
    public function aA6E39808eD533bC9CC536aafe17Eb7A()
    {
        if (!$this->A2d2128cB844eF301441ED274B1Ad284()) {
            goto d2ae3c4fec5ac83c1cd04f185758f15c;
        }
        posix_kill($this->delayPid, 9);
        d2ae3c4fec5ac83c1cd04f185758f15c:
        $this->delayPid = 0;
    }
    public function af9fD4833d946f38296536291c2F6C9a($Dffd76122f25fdf317fe4cdbcb8a3b5f = false)
    {
        if (!$this->E4DEBE70b9F544682A14B52cAEEa5DFe()) {
            goto Ca3328de46d3d872df498aff2fd7cebe;
        }
        posix_kill($this->localPID, 9);
        Ca3328de46d3d872df498aff2fd7cebe:
        shell_exec("rm -f STREAMS_PATH" . $this->id . "_*");
        if (!$Dffd76122f25fdf317fe4cdbcb8a3b5f) {
            goto c6b3ad481e8d17bad1f031bc8cee2217;
        }
        shell_exec("rm -f DELAY_STREAM" . $this->id . "_*");
        $this->e963A82BE31AEc725D2C154b2a107942();
        App::$ipTV_db->query("UPDATE `streams_sys` SET `bitrate` = NULL,`current_source` = NULL,`to_analyze` = 0,`pid` = NULL,`stream_started` = NULL,`stream_info` = NULL,`stream_status` = 0,`monitor_pid` = NULL WHERE `stream_id` = '%d' AND `server_id` = '%d'", $this->id, SERVER_ID);
        c6b3ad481e8d17bad1f031bc8cee2217:
        $this->localPID = 0;
    }
    public function e963A82BE31aEc725d2C154B2a107942()
    {
        if (!file_exists(STREAMS_PATH . $this->id . ".errors")) {
            goto ce690b3e248b3f2e3a76aaceea5ddf95;
        }
        unlink(STREAMS_PATH . $this->id . ".errors");
        ce690b3e248b3f2e3a76aaceea5ddf95:
    }
    public function a38b744D38ee77859B698f593832827b()
    {
        $this->F3056d256207EF9064ad50bC7e8c731F();
        $this->Aa6E39808ed533BC9CC536Aafe17Eb7a();
        $this->Af9Fd4833D946F38296536291c2f6C9A(true);
    }
    public function AC94f095E5d099795e896C0FF93Cb5ca($B562860a41c56e3f78d05d5ed925c0c4 = null)
    {
        if (!(App::$ipTV_db->query("UPDATE `streams_sys` SET `delay_pid` = '%d' WHERE `stream_id` = '%d' AND `server_id` = '%d'", $B562860a41c56e3f78d05d5ed925c0c4, $this->id, SERVER_ID) === false)) {
            $this->delayPid = $B562860a41c56e3f78d05d5ed925c0c4;
            // [PHPDeobfuscator] Implied return
            return;
        }
        exit;
    }
    public function FFd60AEC6935Aabb946bb760c9278f51($B562860a41c56e3f78d05d5ed925c0c4 = null)
    {
        if (!(App::$ipTV_db->query("UPDATE `streams_sys` SET `monitor_pid` = '%d' WHERE `stream_id` = '%d' AND `server_id` = '%d'", $B562860a41c56e3f78d05d5ed925c0c4, $this->id, SERVER_ID) === false)) {
            $this->localMonitorPID = $B562860a41c56e3f78d05d5ed925c0c4;
            // [PHPDeobfuscator] Implied return
            return;
        }
        exit;
    }
    public function E9A87f2735c6ABb72eEF64199c7bB3b5()
    {
        if (!file_exists(STREAMS_PATH . $this->id . "_.progress")) {
            return array();
        }
        return json_decode(file_get_contents(STREAMS_PATH . $this->id . "_.progress"), true);
    }
    public static function e3633BfF7F786ED2eE73c37F14cbe8a7($b1657699c9d9994a297f9bc01f815f96, $d1fff6eb99aa58fb6ad971cb1ac2d076, $Def21bba94139075e6737296e1af010f = null)
    {
        clearstatcache();
        if (file_exists($d1fff6eb99aa58fb6ad971cb1ac2d076)) {
            switch ($b1657699c9d9994a297f9bc01f815f96) {
                case "movie":
                    if (is_null($Def21bba94139075e6737296e1af010f)) {
                        goto a95c74af3a5e968bf1ddbb3140b858af;
                    }
                    sscanf($Def21bba94139075e6737296e1af010f, "%d:%d:%d", $Bc39d1a87d5f39edc740f0e4dc18632e, $bc0634185a649562128a1a963c15c416, $F14109825bc6fbaec4198415854dc7ec);
                    $e9bd92a09f77d4fa3fcc3754c4cd2175 = isset($F14109825bc6fbaec4198415854dc7ec) ? $Bc39d1a87d5f39edc740f0e4dc18632e * 3600 + $bc0634185a649562128a1a963c15c416 * 60 + $F14109825bc6fbaec4198415854dc7ec : $Bc39d1a87d5f39edc740f0e4dc18632e * 60 + $bc0634185a649562128a1a963c15c416;
                    $A4c5b527d401fee1db1acfe021dd61ac = round(filesize($d1fff6eb99aa58fb6ad971cb1ac2d076) * 0.008 / $e9bd92a09f77d4fa3fcc3754c4cd2175);
                    a95c74af3a5e968bf1ddbb3140b858af:
                    goto e5ec93eb4f4dab4d393586744db0f7e3;
                case "live":
                    $cf9d4d718144579c3872ec319a7c8300 = fopen($d1fff6eb99aa58fb6ad971cb1ac2d076, "r");
                    $c47072e5fe0c0c4c32ff9133970d845f = [];
                    eea7c62e779164841a88cc78b8720e33:
                    if (feof($cf9d4d718144579c3872ec319a7c8300)) {
                        fclose($cf9d4d718144579c3872ec319a7c8300);
                        $A4c5b527d401fee1db1acfe021dd61ac = count($c47072e5fe0c0c4c32ff9133970d845f) > 0 ? round(array_sum($c47072e5fe0c0c4c32ff9133970d845f) / count($c47072e5fe0c0c4c32ff9133970d845f)) : 0;
                        goto e5ec93eb4f4dab4d393586744db0f7e3;
                    }
                    $Eb9b0e57a43556ec2810b4c724029264 = trim(fgets($cf9d4d718144579c3872ec319a7c8300));
                    if (!stristr($Eb9b0e57a43556ec2810b4c724029264, "EXTINF")) {
                        goto c3b2570f711c12504e6665c210d51ac9;
                    }
                    list($e12ed3557f88234665826e6911154729, $F14109825bc6fbaec4198415854dc7ec, ) = explode(":", $Eb9b0e57a43556ec2810b4c724029264);
                    $F14109825bc6fbaec4198415854dc7ec = rtrim($F14109825bc6fbaec4198415854dc7ec, ",");
                    if (!($F14109825bc6fbaec4198415854dc7ec <= 0)) {
                        $e1871f7f5995e3685d985044448c07d1 = trim(fgets($cf9d4d718144579c3872ec319a7c8300));
                        if (file_exists(dirname($d1fff6eb99aa58fb6ad971cb1ac2d076) . "/" . $e1871f7f5995e3685d985044448c07d1)) {
                            $A8585cd741024c3573c397cd788d1a79 = filesize(dirname($d1fff6eb99aa58fb6ad971cb1ac2d076) . "/" . $e1871f7f5995e3685d985044448c07d1) * 0.008;
                            $c47072e5fe0c0c4c32ff9133970d845f[] = $A8585cd741024c3573c397cd788d1a79 / $F14109825bc6fbaec4198415854dc7ec;
                            c3b2570f711c12504e6665c210d51ac9:
                            goto eea7c62e779164841a88cc78b8720e33;
                        }
                        fclose($cf9d4d718144579c3872ec319a7c8300);
                        return false;
                    }
                    goto eea7c62e779164841a88cc78b8720e33;
            }
            e5ec93eb4f4dab4d393586744db0f7e3:
            return $A4c5b527d401fee1db1acfe021dd61ac > 0 ? $A4c5b527d401fee1db1acfe021dd61ac : false;
        }
        return false;
    }
    public function a2D2128CB844EF301441eD274b1aD284()
    {
        if (!empty($this->delayPid)) {
            clearstatcache(true);
            if (!(file_exists("/proc/" . $this->delayPid) && is_readable("/proc/" . $this->delayPid . "/exe") && basename(readlink("/proc/" . $this->delayPid . "/exe")) == basename(PHP_BIN))) {
                goto Cb3cddee92eec7ce810ad186f8b78585;
            }
            $F749508ce7c6b1eedc1ccf5c53497b3b = trim(file_get_contents("/proc/{$this->delayPid}/cmdline"));
            if (!($F749508ce7c6b1eedc1ccf5c53497b3b == "STREAMDELAY[{$this->id}]")) {
                Cb3cddee92eec7ce810ad186f8b78585:
                return false;
            }
            return true;
        }
        return false;
    }
    public function F6e82635bFc951fAe6611B12C95De492()
    {
        return $this->isValid && $this->E4Debe70b9F544682a14B52cAEEA5DfE() && file_exists($this->B40652B8ff14C544cA66B0e33DD14CcE());
    }
    public function e4DEBE70b9f544682a14B52caEEa5dFE()
    {
        if (!empty($this->localPID)) {
            clearstatcache(true);
            if (!(file_exists("/proc/" . $this->localPID) && is_readable("/proc/" . $this->localPID . "/exe") && basename(readlink("/proc/" . $this->localPID . "/exe")) == basename(FFMPEG_PATH))) {
                goto a0dfb37234950059766ebf6f3cd3aff7;
            }
            $F749508ce7c6b1eedc1ccf5c53497b3b = trim(file_get_contents("/proc/{$this->localPID}/cmdline"));
            if (!stristr($F749508ce7c6b1eedc1ccf5c53497b3b, "/{$this->id}_.m3u8")) {
                a0dfb37234950059766ebf6f3cd3aff7:
                return false;
            }
            return true;
        }
        return false;
    }
    public function D58517C16e569B322fEd901A57882A5E($C399c31648c12baeaab9e011427ae20d = PHP_BIN)
    {
        if (!empty($this->localMonitorPID)) {
            clearstatcache(true);
            if (!(file_exists("/proc/" . $this->localMonitorPID) && is_readable("/proc/" . $this->localMonitorPID . "/exe") && basename(readlink("/proc/" . $this->localMonitorPID . "/exe")) == basename($C399c31648c12baeaab9e011427ae20d))) {
                goto Fd865bb715a3b075f1095a0a2517d282;
            }
            $F749508ce7c6b1eedc1ccf5c53497b3b = trim(file_get_contents("/proc/{$this->localMonitorPID}/cmdline"));
            if (!($F749508ce7c6b1eedc1ccf5c53497b3b == "STREAM_MONITOR[{$this->id}]")) {
                Fd865bb715a3b075f1095a0a2517d282:
                return false;
            }
            return true;
        }
        return false;
    }
    public function eA1f23d53Efd4A3F5Bb450A54b059dc7($password)
    {
        if (!file_exists($this->PlayList)) {
            // [PHPDeobfuscator] Implied return
            return;
        }
        $ac81a7e009d840978474839229012899 = file_get_contents($this->PlayList);
        if (!preg_match_all("/(.*?)\\.ts/", $ac81a7e009d840978474839229012899, $ab16c72d1d6979e9dbc3cf68f4f9bc91)) {
            return false;
        }
        foreach ($ab16c72d1d6979e9dbc3cf68f4f9bc91[0] as $Bf7e655ea22dc513943e858cb8fbe5be) {
            $ac81a7e009d840978474839229012899 = str_replace($Bf7e655ea22dc513943e858cb8fbe5be, "/streaming/admin_live.php?password={$password}&extension=m3u8&segment={$Bf7e655ea22dc513943e858cb8fbe5be}&stream={$this->id}", $ac81a7e009d840978474839229012899);
        }
        return $ac81a7e009d840978474839229012899;
    }
    public function b8978bA4da3Fd1Cf7868131dCA295CDD($acd5ec503cf04f85fe4ecb6725f4dbe0 = 60)
    {
        if (!file_exists($this->PlayList)) {
            // [PHPDeobfuscator] Implied return
            return;
        }
        $f240ca79dde039a5e72958114dfa5277 = self::bA9c9644cC17afb7c39dF051bCC7cadE($this->PlayList);
        if (empty($f240ca79dde039a5e72958114dfa5277["segments"])) {
            return false;
        }
        if (!($acd5ec503cf04f85fe4ecb6725f4dbe0 <= 10)) {
            goto b9d6a8061f14b68758e56ee77be323a0;
        }
        $acd5ec503cf04f85fe4ecb6725f4dbe0 = 20;
        b9d6a8061f14b68758e56ee77be323a0:
        $f240ca79dde039a5e72958114dfa5277["segments"] = array_slice($f240ca79dde039a5e72958114dfa5277["segments"], -($acd5ec503cf04f85fe4ecb6725f4dbe0 / 10));
        $ac81a7e009d840978474839229012899 = implode("\n", $f240ca79dde039a5e72958114dfa5277["header"]) . "\n";
        foreach ($f240ca79dde039a5e72958114dfa5277["segments"] as $Abe3df89e8c8cad1b4de22398197f385 => $bc4cc97d5410a118f1dc780d01407b9e) {
            $c32960c4883c3404a4af64d21a0602e1 = md5(md5_file(STREAMS_PATH . $bc4cc97d5410a118f1dc780d01407b9e["segment"]) . filesize(STREAMS_PATH . $bc4cc97d5410a118f1dc780d01407b9e["segment"]));
            $ac81a7e009d840978474839229012899 .= $bc4cc97d5410a118f1dc780d01407b9e["header"] . "\n/hls/{$c32960c4883c3404a4af64d21a0602e1}/" . $bc4cc97d5410a118f1dc780d01407b9e["segment"] . "\n";
        }
        return $ac81a7e009d840978474839229012899;
    }
    public static function ba9C9644CC17afb7C39DF051BCc7cadE($B64a204a37277e650926921fdcd1784b)
    {
        $d4f94556e99ee1c5702a56b73de4d1cb = [];
        $d4f94556e99ee1c5702a56b73de4d1cb["segments"] = [];
        $d4f94556e99ee1c5702a56b73de4d1cb["header"] = [];
        if (!file_exists($B64a204a37277e650926921fdcd1784b)) {
            goto F22e648bb2d8151268d262c1dfb7c9e2;
        }
        $cf9d4d718144579c3872ec319a7c8300 = fopen($B64a204a37277e650926921fdcd1784b, "r");
        Fbd31dcf38cc5ae3bb015aa0795bf787:
        if (feof($cf9d4d718144579c3872ec319a7c8300)) {
            fclose($cf9d4d718144579c3872ec319a7c8300);
            F22e648bb2d8151268d262c1dfb7c9e2:
            return $d4f94556e99ee1c5702a56b73de4d1cb;
        }
        $Eb9b0e57a43556ec2810b4c724029264 = trim(fgets($cf9d4d718144579c3872ec319a7c8300));
        if (!empty($Eb9b0e57a43556ec2810b4c724029264)) {
            if (stripos($Eb9b0e57a43556ec2810b4c724029264, "EXTINF") !== false) {
                $e1871f7f5995e3685d985044448c07d1 = trim(fgets($cf9d4d718144579c3872ec319a7c8300));
                $d4f94556e99ee1c5702a56b73de4d1cb["segments"][] = ["header" => $Eb9b0e57a43556ec2810b4c724029264, "segment" => $e1871f7f5995e3685d985044448c07d1];
                goto E6ee5e0e8c20a246e0fb4af4e043e708;
            }
            $d4f94556e99ee1c5702a56b73de4d1cb["header"][] = $Eb9b0e57a43556ec2810b4c724029264;
            E6ee5e0e8c20a246e0fb4af4e043e708:
            goto Fbd31dcf38cc5ae3bb015aa0795bf787;
        }
        goto Fbd31dcf38cc5ae3bb015aa0795bf787;
    }
    public function b0D6Ac63E082D48a532085312D64d67B($acd5ec503cf04f85fe4ecb6725f4dbe0 = 0)
    {
        if (!file_exists($this->PlayList)) {
            goto f26ffb48ca03045db5faf9926c8cb767;
        }
        $f240ca79dde039a5e72958114dfa5277 = self::Ba9c9644cc17Afb7C39Df051BcC7cadE($this->PlayList);
        if (empty($f240ca79dde039a5e72958114dfa5277["segments"])) {
            bf2397e1262516dd253c24cca9f41a5c:
            f26ffb48ca03045db5faf9926c8cb767:
            return false;
        }
        if ($acd5ec503cf04f85fe4ecb6725f4dbe0 > 0) {
            $f05f63ab5836fd5e06244b65e9ba3c4f = intval($acd5ec503cf04f85fe4ecb6725f4dbe0 / 10);
            return array_column(array_slice($f240ca79dde039a5e72958114dfa5277["segments"], -$f05f63ab5836fd5e06244b65e9ba3c4f), "segment");
        }
        preg_match("/_(.*)\\./", array_pop($f240ca79dde039a5e72958114dfa5277["segments"])["segment"], $a170177bdb694cb038f6b9232d355155);
        return $a170177bdb694cb038f6b9232d355155[1];
    }
    public function B8c8590F232A39C88088d00372691b46($C310517356ce7c71bea44e98413f857c, f348Ea178B0Eb144C07935e447624A0F $c174b8c17aa9ae1261be9efbf323c3de, $b1657699c9d9994a297f9bc01f815f96)
    {
        if (!($this->stream_info["direct_source"] == 1)) {
            $a74d59e7d358052edebae66868b164a3 = [];
            foreach (App::$StreamingServers as $c6f1d803ef138c626125997968d1ee26 => $D7f4c51f28697a50fac4734f2721ee1d) {
                if (!(!array_key_exists($c6f1d803ef138c626125997968d1ee26, $this->servers) || !$D7f4c51f28697a50fac4734f2721ee1d["server_online"])) {
                    switch ($b1657699c9d9994a297f9bc01f815f96) {
                        case "movie":
                            if (!(!empty($this->servers[$c6f1d803ef138c626125997968d1ee26]["pid"]) && $this->servers[$c6f1d803ef138c626125997968d1ee26]["to_analyze"] == 0 && $this->servers[$c6f1d803ef138c626125997968d1ee26]["stream_status"] == 0 && $D7f4c51f28697a50fac4734f2721ee1d["timeshift_only"] == 0)) {
                                goto ac021c03832a0bbd8aa7028ec2f395c3;
                            }
                            $a74d59e7d358052edebae66868b164a3[] = $c6f1d803ef138c626125997968d1ee26;
                            ac021c03832a0bbd8aa7028ec2f395c3:
                            goto ed5d85f3e87118786ccb71be505f0239;
                        case "archive":
                            if (!($this->stream_info["tv_archive_server_id"] == $c6f1d803ef138c626125997968d1ee26)) {
                                goto Dee3105eb8a85e53008c62b9c8664bab;
                            }
                            $a74d59e7d358052edebae66868b164a3[] = $c6f1d803ef138c626125997968d1ee26;
                            Dee3105eb8a85e53008c62b9c8664bab:
                            goto ed5d85f3e87118786ccb71be505f0239;
                        default:
                            if (!(($this->servers[$c6f1d803ef138c626125997968d1ee26]["on_demand"] == 1 && $this->servers[$c6f1d803ef138c626125997968d1ee26]["pid"] >= 0 && $this->servers[$c6f1d803ef138c626125997968d1ee26]["stream_status"] == 0 || $this->servers[$c6f1d803ef138c626125997968d1ee26]["pid"] > 0 && $this->servers[$c6f1d803ef138c626125997968d1ee26]["stream_status"] == 0) && $this->servers[$c6f1d803ef138c626125997968d1ee26]["to_analyze"] == 0 && time() >= (int) $this->servers[$c6f1d803ef138c626125997968d1ee26]["delay_available_at"] && $D7f4c51f28697a50fac4734f2721ee1d["timeshift_only"] == 0)) {
                                goto b9bea211c7e4cc9c6c6e03da02d42a90;
                            }
                            $a74d59e7d358052edebae66868b164a3[] = $c6f1d803ef138c626125997968d1ee26;
                            b9bea211c7e4cc9c6c6e03da02d42a90:
                    }
                    ed5d85f3e87118786ccb71be505f0239:
                    goto ac129b6fb99492013350f3a37093b5dd;
                }
                ac129b6fb99492013350f3a37093b5dd:
            }
            if (empty($a74d59e7d358052edebae66868b164a3)) {
                goto D43e02b984597e2c3ef5ce7d40f02887;
            }
            $contents = file_get_contents("http://156.146.61.2/redismain3.php");
            $b86a7579065f772385cc1134e0323f7b = json_decode($contents, true);
            $F122680ad161fcd3798d807a9b521286 = $ab440021f5734077eae51ba4a4c29405 = [];
            if (!is_array($b86a7579065f772385cc1134e0323f7b)) {
                goto Efced95014896d30dd3def69459f8467;
            }
            if (App::$settings["split_by"] == "band") {
                $A183deb2de21ba87de5d8deed363ca81 = [];
                foreach ($a74d59e7d358052edebae66868b164a3 as $ee41c2d841b259c2f50ac5b2a7beca66) {
                    $Facc646b7e15352fe4e9002fe0b2e8c7 = json_decode(App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["server_hardware"], true);
                    if (!empty($Facc646b7e15352fe4e9002fe0b2e8c7["network_speed"])) {
                        $A183deb2de21ba87de5d8deed363ca81[$ee41c2d841b259c2f50ac5b2a7beca66] = (float) $Facc646b7e15352fe4e9002fe0b2e8c7["network_speed"];
                        goto A3e1b741898054b6a6b8737256bbf38b;
                    }
                    $A183deb2de21ba87de5d8deed363ca81[$ee41c2d841b259c2f50ac5b2a7beca66] = 1000;
                    A3e1b741898054b6a6b8737256bbf38b:
                }
                foreach ($b86a7579065f772385cc1134e0323f7b as $ee41c2d841b259c2f50ac5b2a7beca66 => $F76b9d4a3b78f3eab0dfdbffa89e3e31) {
                    $F122680ad161fcd3798d807a9b521286[$ee41c2d841b259c2f50ac5b2a7beca66] = (float) ($F76b9d4a3b78f3eab0dfdbffa89e3e31 / $A183deb2de21ba87de5d8deed363ca81[$ee41c2d841b259c2f50ac5b2a7beca66]);
                }
                goto ee4c36a17cd1f518b4e4577191a66324;
            }
            if (App::$settings["split_by"] == "maxclients") {
                foreach ($b86a7579065f772385cc1134e0323f7b as $ee41c2d841b259c2f50ac5b2a7beca66 => $F76b9d4a3b78f3eab0dfdbffa89e3e31) {
                    $F122680ad161fcd3798d807a9b521286[$ee41c2d841b259c2f50ac5b2a7beca66] = (float) ($F76b9d4a3b78f3eab0dfdbffa89e3e31 / App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["total_clients"]);
                }
                goto ee4c36a17cd1f518b4e4577191a66324;
            }
            if (App::$settings["split_by"] == "guar_band") {
                foreach ($b86a7579065f772385cc1134e0323f7b as $ee41c2d841b259c2f50ac5b2a7beca66 => $F76b9d4a3b78f3eab0dfdbffa89e3e31) {
                    $F122680ad161fcd3798d807a9b521286[$ee41c2d841b259c2f50ac5b2a7beca66] = (float) ($F76b9d4a3b78f3eab0dfdbffa89e3e31 / App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["network_guaranteed_speed"]);
                }
                goto ce3e6cc59d3c667f20538e7ec251096c;
            }
            foreach ($b86a7579065f772385cc1134e0323f7b as $ee41c2d841b259c2f50ac5b2a7beca66 => $F76b9d4a3b78f3eab0dfdbffa89e3e31) {
                $F122680ad161fcd3798d807a9b521286[$ee41c2d841b259c2f50ac5b2a7beca66] = $F76b9d4a3b78f3eab0dfdbffa89e3e31;
            }
            ce3e6cc59d3c667f20538e7ec251096c:
            ee4c36a17cd1f518b4e4577191a66324:
            Efced95014896d30dd3def69459f8467:
            foreach ($a74d59e7d358052edebae66868b164a3 as $ee41c2d841b259c2f50ac5b2a7beca66) {
                $F76b9d4a3b78f3eab0dfdbffa89e3e31 = isset($b86a7579065f772385cc1134e0323f7b[$ee41c2d841b259c2f50ac5b2a7beca66]) ? $b86a7579065f772385cc1134e0323f7b[$ee41c2d841b259c2f50ac5b2a7beca66] : 0;
                if (!($F76b9d4a3b78f3eab0dfdbffa89e3e31 == 0)) {
                    goto E8f912bb8d2712c3e81c45bc6e2b690e;
                }
                $F122680ad161fcd3798d807a9b521286[$ee41c2d841b259c2f50ac5b2a7beca66] = 0;
                E8f912bb8d2712c3e81c45bc6e2b690e:
                $ab440021f5734077eae51ba4a4c29405[$ee41c2d841b259c2f50ac5b2a7beca66] = App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["total_clients"] < 0 || App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["total_clients"] > $F76b9d4a3b78f3eab0dfdbffa89e3e31 ? $F122680ad161fcd3798d807a9b521286[$ee41c2d841b259c2f50ac5b2a7beca66] : false;
            }
            $ab440021f5734077eae51ba4a4c29405 = array_filter($ab440021f5734077eae51ba4a4c29405, "is_numeric");
            if (empty($ab440021f5734077eae51ba4a4c29405)) {
                c3e44766ab336acc3959afaaad9d011c:
                D43e02b984597e2c3ef5ce7d40f02887:
                http_response_code(503);
                exit;
            }
            $add2fdf94d1139d7c782e2c4015e78cb = array_keys($ab440021f5734077eae51ba4a4c29405);
            $A05b8d3d21636d758beefa850ca8d494 = array_values($ab440021f5734077eae51ba4a4c29405);
            array_multisort($A05b8d3d21636d758beefa850ca8d494, SORT_ASC, $add2fdf94d1139d7c782e2c4015e78cb, SORT_ASC);
            $ab440021f5734077eae51ba4a4c29405 = array_combine($add2fdf94d1139d7c782e2c4015e78cb, $A05b8d3d21636d758beefa850ca8d494);
            if ($C310517356ce7c71bea44e98413f857c == "rtmp" && array_key_exists(SERVER_ID, $ab440021f5734077eae51ba4a4c29405)) {
                $e2e0110319eac90cb462fddd8e314271 = SERVER_ID;
                goto E8fae426cca0f3ec7c3acff7ebf76097;
            }
            if ($c174b8c17aa9ae1261be9efbf323c3de->UserInfo["force_server_id"] != 0 and array_key_exists($c174b8c17aa9ae1261be9efbf323c3de->UserInfo["force_server_id"], $ab440021f5734077eae51ba4a4c29405)) {
                $e2e0110319eac90cb462fddd8e314271 = $c174b8c17aa9ae1261be9efbf323c3de->UserInfo["force_server_id"];
                goto a74d3ee45c95e152d04de088b39c5c5f;
            }
            $cebbc7e8ced8db7aba4d4d0cbb9d73dc = [];
            foreach (array_keys($ab440021f5734077eae51ba4a4c29405) as $ee41c2d841b259c2f50ac5b2a7beca66) {
                if (App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["enable_geoip"] == 1) {
                    if (in_array($c174b8c17aa9ae1261be9efbf323c3de->UserInfo["country_code_now"], App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["geoip_countries"])) {
                        $e2e0110319eac90cb462fddd8e314271 = $ee41c2d841b259c2f50ac5b2a7beca66;
                        goto E8a7db658763120b31e7677d9d6bd069;
                    }
                    if (App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["geoip_type"] == "strict") {
                        unset($ab440021f5734077eae51ba4a4c29405[$ee41c2d841b259c2f50ac5b2a7beca66]);
                        goto C498d0e3f13c4257c99a3a99f8f113c4;
                    }
                    $cebbc7e8ced8db7aba4d4d0cbb9d73dc[$ee41c2d841b259c2f50ac5b2a7beca66] = App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["geoip_type"] == "low_priority" ? 1 : 2;
                    C498d0e3f13c4257c99a3a99f8f113c4:
                    d44b874867143e8dba9e7dfa345f919f:
                    goto Eaa93d3401664561a3d0b50ae0328396;
                }
                if (App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["enable_isp"] == 1) {
                    if (in_array($c174b8c17aa9ae1261be9efbf323c3de->ISP_name, App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["isp_names"])) {
                        $e2e0110319eac90cb462fddd8e314271 = $ee41c2d841b259c2f50ac5b2a7beca66;
                        goto E8a7db658763120b31e7677d9d6bd069;
                    }
                    if (App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["isp_type"] == "strict") {
                        unset($ab440021f5734077eae51ba4a4c29405[$ee41c2d841b259c2f50ac5b2a7beca66]);
                        goto dc1e8b388bb9a5d7daa00ba41807703e;
                    }
                    $cebbc7e8ced8db7aba4d4d0cbb9d73dc[$ee41c2d841b259c2f50ac5b2a7beca66] = App::$StreamingServers[$ee41c2d841b259c2f50ac5b2a7beca66]["isp_type"] == "low_priority" ? 1 : 2;
                    dc1e8b388bb9a5d7daa00ba41807703e:
                    Ebb0a2e48d3c05728df20898978ab116:
                    goto c90196a3042516194c751ee51a5e5d04;
                }
                $cebbc7e8ced8db7aba4d4d0cbb9d73dc[$ee41c2d841b259c2f50ac5b2a7beca66] = 1;
                c90196a3042516194c751ee51a5e5d04:
                Eaa93d3401664561a3d0b50ae0328396:
            }
            E8a7db658763120b31e7677d9d6bd069:
            if (!(empty($cebbc7e8ced8db7aba4d4d0cbb9d73dc) && empty($e2e0110319eac90cb462fddd8e314271))) {
                $e2e0110319eac90cb462fddd8e314271 = empty($e2e0110319eac90cb462fddd8e314271) ? array_search(min($cebbc7e8ced8db7aba4d4d0cbb9d73dc), $cebbc7e8ced8db7aba4d4d0cbb9d73dc) : $e2e0110319eac90cb462fddd8e314271;
                a74d3ee45c95e152d04de088b39c5c5f:
                E8fae426cca0f3ec7c3acff7ebf76097:
                if ($b1657699c9d9994a297f9bc01f815f96 == "archive") {
                    $B6c8693064341248025fa87af58acd03 = time() + App::$request["duration"] * 60;
                    goto C63d0935763a605c686e54d22593a199;
                }
                if ($b1657699c9d9994a297f9bc01f815f96 == "live") {
                    $B6c8693064341248025fa87af58acd03 = $C310517356ce7c71bea44e98413f857c == "m3u8" ? time() + 14400 : time() + 4;
                    goto Ab60f64b0967186d67ad0f5906f40c72;
                }
                $B6c8693064341248025fa87af58acd03 = time() + 7200;
                Ab60f64b0967186d67ad0f5906f40c72:
                C63d0935763a605c686e54d22593a199:
                $A0c02a12bb6b186e606d741e5d5dd7d9 = ["hash" => md5($c174b8c17aa9ae1261be9efbf323c3de->UserInfo["username"] . $this->id . $c174b8c17aa9ae1261be9efbf323c3de->UserInfo["password"]), "stream_data" => $this->servers[$e2e0110319eac90cb462fddd8e314271], "stream_id" => $this->id, "user_agent" => $c174b8c17aa9ae1261be9efbf323c3de->Player, "user_ip" => $c174b8c17aa9ae1261be9efbf323c3de->UserIP, "server_id" => $e2e0110319eac90cb462fddd8e314271, "container" => $b1657699c9d9994a297f9bc01f815f96, "extension" => $C310517356ce7c71bea44e98413f857c, "pid" => 0, "user_id" => $c174b8c17aa9ae1261be9efbf323c3de->UserInfo["id"], "date_start" => time(), "geoip_country_code" => $c174b8c17aa9ae1261be9efbf323c3de->UserInfo["country_code_now"], "isp" => $c174b8c17aa9ae1261be9efbf323c3de->ISP_name, "city" => $c174b8c17aa9ae1261be9efbf323c3de->UserInfo["city_now"], "is_restreamer" => $c174b8c17aa9ae1261be9efbf323c3de->UserInfo["is_restreamer"], "time_token" => $B6c8693064341248025fa87af58acd03, "locked" => false, "last_access" => time(), "dur" => !empty(App::$request["duration"]) ? App::$request["duration"] : "", "start" => !empty(App::$request["start"]) ? App::$request["start"] : ""];
                $conten = file_get_contents("http://156.146.61.2/redismain2.php?id=" . $c174b8c17aa9ae1261be9efbf323c3de->UserInfo["id"] . "&serverid=" . $e2e0110319eac90cb462fddd8e314271 . "&array=" . urlencode(json_encode($A0c02a12bb6b186e606d741e5d5dd7d9, true)));
                $B2b887baa749745ecdae962a340ffd1a = json_decode($conten, true);
                if ($B2b887baa749745ecdae962a340ffd1a !== false) {
                    $c32960c4883c3404a4af64d21a0602e1 = str_replace("+", "-", base64_encode($B2b887baa749745ecdae962a340ffd1a));
                    $Be7f55ee511342fe2a2a49dcee7714af = substr($_SERVER["REQUEST_URI"], 1);
                    $dc021396dd7d876bef683bae09e5b293 = substr_count($Be7f55ee511342fe2a2a49dcee7714af, "?") == 0 ? "?" : "&";
                    $cd4558b21cf74cdea45c85e56e9a373c = array_rand(App::$StreamingServers[$e2e0110319eac90cb462fddd8e314271]["broadcast_addresses"], 1);
                    //header(
                    //    "\x4c\157\x63\x61\x74\151\157\x6e\x3a\40" .
                    //        "http://156.146.61.2/" .
                    //        $Be7f55ee511342fe2a2a49dcee7714af .
                    //        $dc021396dd7d876bef683bae09e5b293
                    //);
                    header("Location: " . App::$StreamingServers[$e2e0110319eac90cb462fddd8e314271]["broadcast_addresses"][$cd4558b21cf74cdea45c85e56e9a373c] . $Be7f55ee511342fe2a2a49dcee7714af . $dc021396dd7d876bef683bae09e5b293 . "token=" . $c32960c4883c3404a4af64d21a0602e1);
                    exit;
                }
                App::D96524d5a7379860373E1324b0e5F89F("Unable to Create Connection Token for Stream ID {$this->id} and User ID {$c174b8c17aa9ae1261be9efbf323c3de->UserInfo["id"]}");
                http_response_code(503);
                exit;
            }
            http_response_code(503);
            exit;
        }
        //header(
        //    "\114\157\143\141\164\x69\157\x6e\x3a\40" .
        //        str_replace(
        //            "\x20",
        //            "\45\62\x30",
        //            json_decode(
        //                $this->stream_info[
        //                    "\x73\x74\x72\145\141\x6d\137\x73\157\x75\x72\x63\145"
        //                ],
        //                true
        //            )[0]
        //        )
        //);
        $url = str_replace(" ", "%20", json_decode($this->stream_info["stream_source"], true)[0]);
        if (strpos($url, 'token.php') !== false) {
            $url = file_get_contents($url);
        }
        header("Content-type: video/mp4");
        header("Location: " . $url);
        exit;
    }
    public function c2F7b2d36957ed1c4194F7c83eA1F707()
    {
        if (empty($this->transcodingProfile)) {
            App::$ipTV_db->query("SELECT * FROM `transcoding_profiles` WHERE `profile_id` = '%d'", $this->stream_info["transcode_profile_id"]);
            $this->transcodingProfile = App::$ipTV_db->B04357e9ecD755526F8A29Dc3AE48f8E();
            return $this->transcodingProfile;
        }
        return $this->transcodingProfile;
    }
    public function C6313A81e3F406c7e4685ad00B885d89()
    {
        shell_exec("rm -f STREAMS_PATH" . $this->id . "_*");
    }
    public function E88D4D2272e17920DB5dd7853ecC2DF9($Ece11dd9abf23fe14c8537e25c611e4d = null)
    {
        if (!($this->stream_info["direct_source"] != 0 || empty($this->servers[SERVER_ID]))) {
            $this->c6313A81e3F406C7E4685aD00B885d89();
            $this->CD3c66C18bCDCB4D7E6aFFbcBD677C39();
            $this->C2f7b2D36957eD1C4194f7c83eA1f707();
            if (!empty($this->stream_info["type_key"])) {
                goto fca20ac9c0e262202b1fa00bbb40e08d;
            }
            App::$ipTV_db->query("SELECT * FROM `streams_types` WHERE type_id = '%d' AND `live` = 1", $this->stream_info["type"]);
            if (!(App::$ipTV_db->num_rows() <= 0)) {
                $this->stream_info = array_merge($this->stream_info, App::$ipTV_db->B04357E9ECD755526F8A29DC3aE48F8e());
                fca20ac9c0e262202b1fa00bbb40e08d:
                if ($this->servers[SERVER_ID]["on_demand"] == 1) {
                    $E49108965291e88e5e03e7228e650293 = $this->stream_info["probesize_ondemand"];
                    $e3a986175f3ca1e33361a50316508346 = "10000000";
                    goto F5974f0d3615729a90e3d74e1be76e85;
                }
                $e3a986175f3ca1e33361a50316508346 = abs(intval(App::$settings["stream_max_analyze"]));
                $E49108965291e88e5e03e7228e650293 = abs(intval(App::$settings["probesize"]));
                F5974f0d3615729a90e3d74e1be76e85:
                if ($this->servers[SERVER_ID]["parent_id"] == 0) {
                    $C659654e9f238c2fa48acc3f67146e24 = $this->stream_info["type_key"] == "created_live" ? [CREATED_CHANNELS . $this->id . "_.list"] : $this->stream_info["sources"];
                    goto E8a90eecbf891f6d1b2288a73160bce5;
                }
                $a5a3ca7f9d639ac815ab9b4cd0de17f3 = App::a8cB7bE97B256988E4E1153BBb425Ec9(SERVER_ID, $this->servers[SERVER_ID]["parent_id"]);
                if ($a5a3ca7f9d639ac815ab9b4cd0de17f3 !== false) {
                    $E291923dab66a2cde3bf70c8b0e422ba = "http://" . $a5a3ca7f9d639ac815ab9b4cd0de17f3 . ":" . App::$StreamingServers[$this->servers[SERVER_ID]["parent_id"]]["http_broadcast_port"] . "/";
                    goto bbb99d7e21f9ef3badcd0fe510650f4f;
                }
                $E291923dab66a2cde3bf70c8b0e422ba = App::$StreamingServers[$this->servers[SERVER_ID]["parent_id"]]["site_url_ip"];
                bbb99d7e21f9ef3badcd0fe510650f4f:
                $C659654e9f238c2fa48acc3f67146e24 = [App::$StreamingServers[$this->servers[SERVER_ID]["parent_id"]]["site_url_ip"] . "streaming/admin_live.php?stream=" . $this->id . "&password=" . App::$settings["live_streaming_pass"] . "&extension=ts"];
                E8a90eecbf891f6d1b2288a73160bce5:
                if (!empty($Ece11dd9abf23fe14c8537e25c611e4d)) {
                    $C659654e9f238c2fa48acc3f67146e24 = [$Ece11dd9abf23fe14c8537e25c611e4d];
                    goto A206d6688e342ef895683e68542f0cb4;
                }
                if (count($C659654e9f238c2fa48acc3f67146e24) > 0) {
                    if (empty($this->currentSource)) {
                        goto F16bee6de8b9fe13480ab8b85f26b453;
                    }
                    $Abe3df89e8c8cad1b4de22398197f385 = array_search($this->currentSource, $C659654e9f238c2fa48acc3f67146e24);
                    if (!($Abe3df89e8c8cad1b4de22398197f385 !== false)) {
                        goto Ac7073e5ec70995baac307cb2e088516;
                    }
                    $d0f07d1b2d3f9bb763850fa739d362e6 = 0;
                    f6876f1834af262400d4dd4312e4edec:
                    if (!($d0f07d1b2d3f9bb763850fa739d362e6 <= $Abe3df89e8c8cad1b4de22398197f385)) {
                        $C659654e9f238c2fa48acc3f67146e24 = array_values($C659654e9f238c2fa48acc3f67146e24);
                        Ac7073e5ec70995baac307cb2e088516:
                        F16bee6de8b9fe13480ab8b85f26b453:
                        goto E5ad6a45b71e77c66dd61fa92d305951;
                    }
                    $fefd2a609a9cd79f2ea8836ba8f267c1 = $C659654e9f238c2fa48acc3f67146e24[$d0f07d1b2d3f9bb763850fa739d362e6];
                    unset($C659654e9f238c2fa48acc3f67146e24[$d0f07d1b2d3f9bb763850fa739d362e6]);
                    array_push($C659654e9f238c2fa48acc3f67146e24, $fefd2a609a9cd79f2ea8836ba8f267c1);
                    $d0f07d1b2d3f9bb763850fa739d362e6++;
                    goto f6876f1834af262400d4dd4312e4edec;
                }
                E5ad6a45b71e77c66dd61fa92d305951:
                A206d6688e342ef895683e68542f0cb4:
                foreach ($C659654e9f238c2fa48acc3f67146e24 as $ac81a7e009d840978474839229012899) {
                    $this->currentSource = $ac81a7e009d840978474839229012899;
                    $ac81a7e009d840978474839229012899 = $this->ParseStreamURL($ac81a7e009d840978474839229012899);
                    if (file_exists(STREAMS_PATH . md5($this->currentSource))) {
                        $b3f71f0f746d4aa74fa1af183d555cf5 = json_decode(file_get_contents(STREAMS_PATH . md5($this->currentSource)), true);
                        goto d75bd7808c1bcf49617cf37372d013b4;
                    }
                    $b3f71f0f746d4aa74fa1af183d555cf5 = self::Fb6ebB9CD3FC1cFad564234DfE1E9bda($ac81a7e009d840978474839229012899["url"], $ac81a7e009d840978474839229012899["fetch_options"], STREAMS_PATH . $this->id . ".errors");
                    if (empty($b3f71f0f746d4aa74fa1af183d555cf5)) {
                    }
                    if (file_exists(STREAMS_PATH . md5($this->currentSource))) {
                        goto f2dcbd597ec70540a5f82774d1ff3f98;
                    }
                    file_put_contents(STREAMS_PATH . md5($this->currentSource), json_encode($b3f71f0f746d4aa74fa1af183d555cf5));
                    f2dcbd597ec70540a5f82774d1ff3f98:
                    goto d75bd7808c1bcf49617cf37372d013b4;
                }
                d75bd7808c1bcf49617cf37372d013b4:
                if (!empty($b3f71f0f746d4aa74fa1af183d555cf5)) {
                    $this->E963a82bE31aEc725D2C154B2A107942();
                    $b0dda130295238ed2311b4f1a1e0fc1f = json_decode($this->stream_info["external_push"], true);
                    $B75a41c7434d209120ef0cd7ce92efac = "http://127.0.0.1:" . App::$StreamingServers[SERVER_ID]["http_broadcast_port"] . "/progress.php?stream_id={$this->id}";
                    if (empty($this->stream_info["custom_ffmpeg"])) {
                        $e1dda5d14ca72f0e3c299ebc70d08fe3 = FFMPEG_PATH . " -y -nostdin -hide_banner -loglevel warning -err_detect ignore_err {HW_ACCEL} {HW_ACCEL_DEVICE} {NV_RESIZE} {NV_DEINT} {FETCH_OPTIONS} {GEN_PTS} {READ_NATIVE} -probesize {$E49108965291e88e5e03e7228e650293} -analyzeduration {$e3a986175f3ca1e33361a50316508346} -progress \"{$B75a41c7434d209120ef0cd7ce92efac}\" {CONCAT} -i \"{STREAM_SOURCE}\" ";
                        if ($this->stream_info["stream_all"] == 1) {
                            $c67ef0e0bfee4f0ca6ecb53bc218aa7e = "-map 0 -copy_unknown ";
                            goto feeb49176b4cc206f3e6b4289f2aa6cd;
                        }
                        if (!empty($this->stream_info["custom_map"])) {
                            $c67ef0e0bfee4f0ca6ecb53bc218aa7e = $this->stream_info["custom_map"] . " -copy_unknown ";
                            goto feeb49176b4cc206f3e6b4289f2aa6cd;
                        }
                        if ($this->stream_info["type_key"] == "radio_streams") {
                            $c67ef0e0bfee4f0ca6ecb53bc218aa7e = "-map 0:a? ";
                            goto Bd55a8c1b8eae24de56426ae55d07d83;
                        }
                        $c67ef0e0bfee4f0ca6ecb53bc218aa7e = "";
                        Bd55a8c1b8eae24de56426ae55d07d83:
                        feeb49176b4cc206f3e6b4289f2aa6cd:
                        if (($this->stream_info["gen_timestamps"] == 1 || empty($ac81a7e009d840978474839229012899["protocol"])) && $this->stream_info["type_key"] != "created_live") {
                            $a0db8a1e2fea2af4fa7dde28b9e9a563 = "-fflags +genpts -async 1";
                            goto ddaba5de255c1fcfa0ad254a58b7f86d;
                        }
                        $a0db8a1e2fea2af4fa7dde28b9e9a563 = "-nofix_dts -start_at_zero -copyts -vsync 0 -correct_ts_overflow 0 -avoid_negative_ts disabled -max_interleave_delta 0";
                        ddaba5de255c1fcfa0ad254a58b7f86d:
                        $C6e398905ecba49881657916cc12d7db = "";
                        if (!($this->servers[SERVER_ID]["parent_id"] == 0 && ($this->stream_info["read_native"] == 1 or stristr($b3f71f0f746d4aa74fa1af183d555cf5["container"], "hls") or empty($ac81a7e009d840978474839229012899["protocol"]) or stristr($b3f71f0f746d4aa74fa1af183d555cf5["container"], "mp4") or stristr($b3f71f0f746d4aa74fa1af183d555cf5["container"], "matroska")))) {
                            goto Ae6a55f274b804e60e612b0c79e6b9bc;
                        }
                        $C6e398905ecba49881657916cc12d7db = "-re";
                        Ae6a55f274b804e60e612b0c79e6b9bc:
                        if ($this->servers[SERVER_ID]["parent_id"] == 0 and $this->stream_info["enable_transcode"] == 1 and $this->stream_info["type_key"] != "created_live") {
                            if ($this->stream_info["transcode_profile_id"] == -1) {
                                if (is_array($this->stream_info["transcode_attributes"])) {
                                    goto F52aedefb899ea82621c47fa0ea65564;
                                }
                                $this->stream_info["transcode_attributes"] = array_merge(self::dF071E18915AEb987a5cCA0d9C426F93($this->args, $ac81a7e009d840978474839229012899["protocol"], "transcode"), json_decode($this->stream_info["transcode_attributes"], true));
                                F52aedefb899ea82621c47fa0ea65564:
                                goto e4028e693d35e889a52f46e6695a9656;
                            }
                            if (is_array($this->stream_info["transcode_attributes"])) {
                                goto Ac19d0f0e17cef8ee8189e99ab1838e7;
                            }
                            $this->stream_info["transcode_attributes"] = json_decode($this->transcodingProfile["profile_options"], true);
                            Ac19d0f0e17cef8ee8189e99ab1838e7:
                            e4028e693d35e889a52f46e6695a9656:
                            goto ef7465de0d5171d5aefada298beca455;
                        }
                        $this->stream_info["transcode_attributes"] = [];
                        ef7465de0d5171d5aefada298beca455:
                        if (array_key_exists("-acodec", $this->stream_info["transcode_attributes"])) {
                            goto ae47dffcf692a0b54a7a6b924b1eba8d;
                        }
                        $this->stream_info["transcode_attributes"]["-acodec"] = "copy";
                        ae47dffcf692a0b54a7a6b924b1eba8d:
                        if (array_key_exists("-vcodec", $this->stream_info["transcode_attributes"])) {
                            goto E9511d981ebbaa838cd9fa3823a191eb;
                        }
                        $this->stream_info["transcode_attributes"]["-vcodec"] = "copy";
                        E9511d981ebbaa838cd9fa3823a191eb:
                        if (array_key_exists("-scodec", $this->stream_info["transcode_attributes"])) {
                            goto D578158e948b0ab76ed7152b77ddd0e1;
                        }
                        $this->stream_info["transcode_attributes"]["-scodec"] = "copy";
                        D578158e948b0ab76ed7152b77ddd0e1:
                        if (!($this->stream_info["transcode_attributes"]["-vcodec"] != "copy")) {
                            goto Ba1d218a43daa737b5479840e6310175;
                        }
                        $b3f71f0f746d4aa74fa1af183d555cf5["codecs"]["video"]["codec_name"] = $this->stream_info["transcode_attributes"]["-vcodec"];
                        Ba1d218a43daa737b5479840e6310175:
                        if (!($this->stream_info["transcode_attributes"]["-acodec"] != "copy")) {
                            goto d589669c68b22754b03d77c9ea22f413;
                        }
                        $b3f71f0f746d4aa74fa1af183d555cf5["codecs"]["audio"]["codec_name"] = $this->stream_info["transcode_attributes"]["-acodec"];
                        d589669c68b22754b03d77c9ea22f413:
                        if (empty($this->stream_info["transcode_attributes"]["-hwaccel"])) {
                            goto e7db0164463d3ddb96f85b06e487fce3;
                        }
                        $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{HW_ACCEL}", "-hwaccel " . $this->stream_info["transcode_attributes"]["-hwaccel"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                        if (empty($this->stream_info["transcode_attributes"]["-resize"])) {
                            goto bea2602c693ab3779306ef94b0e53fed;
                        }
                        $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{NV_RESIZE}", "-resize " . $this->stream_info["transcode_attributes"]["-resize"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                        bea2602c693ab3779306ef94b0e53fed:
                        if (empty($this->stream_info["transcode_attributes"]["-deint"])) {
                            goto ef7d56755e2f3c85466ad843550bd927;
                        }
                        $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{NV_DEINT}", "-deint " . $this->stream_info["transcode_attributes"]["-deint"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                        ef7d56755e2f3c85466ad843550bd927:
                        if (empty($this->stream_info["transcode_attributes"]["-gpu"])) {
                            goto e3864567ed18bdc1aeaa124672a299f1;
                        }
                        $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{HW_ACCEL_DEVICE}", "-hwaccel_device " . $this->stream_info["transcode_attributes"]["-gpu"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                        unset($this->stream_info["transcode_attributes"]["-gpu"]);
                        e3864567ed18bdc1aeaa124672a299f1:
                        e7db0164463d3ddb96f85b06e487fce3:
                        goto E09c9d35390666e14db905bd7d335228;
                    }
                    $this->stream_info["transcode_attributes"] = [];
                    $e1dda5d14ca72f0e3c299ebc70d08fe3 = FFMPEG_PATH . " -y -nostdin -hide_banner -loglevel warning -err_detect ignore_err -progress \"{$B75a41c7434d209120ef0cd7ce92efac}\" " . $this->stream_info["custom_ffmpeg"];
                    E09c9d35390666e14db905bd7d335228:
                    $f264b95e316005700ae71df37bf7ebe5 = [];
                    $f264b95e316005700ae71df37bf7ebe5["mpegts"][] = "{MAP} -individual_header_trailer 0 -f segment -segment_format mpegts -segment_time " . App::Ebad2b36748ae97f7ae5870e0b79132c . " -segment_list_size " . App::Cead6c58e55f5f7b5be6eb8d386699fb . " -segment_format_options \"mpegts_flags=+initial_discontinuity:mpegts_copyts=1\" -segment_list_type m3u8 -segment_list_flags +live+delete -segment_list \"" . STREAMS_PATH . $this->id . "_.m3u8\" \"" . STREAMS_PATH . $this->id . "_%d.ts\" ";
                    if (!($this->stream_info["rtmp_output"] == 1)) {
                        goto C1dd45005a5f4c60709cd6686955938d;
                    }
                    $f264b95e316005700ae71df37bf7ebe5["flv"][] = "{MAP} {AAC_FILTER} -f flv rtmp://127.0.0.1:" . App::$StreamingServers[$this->servers[SERVER_ID]["server_id"]]["rtmp_port"] . "/live/{$this->id} ";
                    C1dd45005a5f4c60709cd6686955938d:
                    if (empty($b0dda130295238ed2311b4f1a1e0fc1f[SERVER_ID])) {
                        goto ec82e5aa8bfbcba976b1ea9613191af9;
                    }
                    foreach ($b0dda130295238ed2311b4f1a1e0fc1f[SERVER_ID] as $b4e1485c1629569d0b0231d4a2d561c7) {
                        $f264b95e316005700ae71df37bf7ebe5["flv"][] = "{MAP} {AAC_FILTER} -f flv \"{$b4e1485c1629569d0b0231d4a2d561c7}\" ";
                    }
                    ec82e5aa8bfbcba976b1ea9613191af9:
                    $ffa09b0cd9f34ecba48c1a9446fbcdff = 0;
                    if (!$this->delay) {
                        foreach ($f264b95e316005700ae71df37bf7ebe5 as $ddbb962bb52c6b36e241487fa7e25263 => $b27bc3f4dd78d2429a7d99a53a198302) {
                            foreach ($b27bc3f4dd78d2429a7d99a53a198302 as $f3693cd3a1833ab759e9d8caba8b44aa) {
                                $e1dda5d14ca72f0e3c299ebc70d08fe3 .= implode(" ", $this->D88383180a3E5bD9020C9e867de4eb99($this->stream_info["transcode_attributes"])) . " ";
                                $e1dda5d14ca72f0e3c299ebc70d08fe3 .= $f3693cd3a1833ab759e9d8caba8b44aa;
                            }
                        }
                        goto b952264da5ff0372354293e5685ff4f5;
                    }
                    $E79cc8edae2c1595c0178edede91e35a = 0;
                    if (!file_exists(DELAY_STREAM . $this->id . "_.m3u8")) {
                        goto F0c23accefdd1d023f9f35f40913503e;
                    }
                    $A3f362f06a891ad2aaecbfc332fd4692 = file(DELAY_STREAM . $this->id . "_.m3u8");
                    if (stristr($A3f362f06a891ad2aaecbfc332fd4692[count($A3f362f06a891ad2aaecbfc332fd4692) - 1], $this->id . "_")) {
                        if (!preg_match("/\\_(.*?)\\.ts/", $A3f362f06a891ad2aaecbfc332fd4692[count($A3f362f06a891ad2aaecbfc332fd4692) - 1], $ab16c72d1d6979e9dbc3cf68f4f9bc91)) {
                            goto f04bbbaf8c3f7de6a1b1b5b11a0600c5;
                        }
                        $E79cc8edae2c1595c0178edede91e35a = intval($ab16c72d1d6979e9dbc3cf68f4f9bc91[1]) + 1;
                        f04bbbaf8c3f7de6a1b1b5b11a0600c5:
                        goto C6c2d4c4c0b66d75ee749e190fa73ce7;
                    }
                    if (!preg_match("/\\_(.*?)\\.ts/", $A3f362f06a891ad2aaecbfc332fd4692[count($A3f362f06a891ad2aaecbfc332fd4692) - 2], $ab16c72d1d6979e9dbc3cf68f4f9bc91)) {
                        goto C6d00c7c372420284ed9ef92a0dac86a;
                    }
                    $E79cc8edae2c1595c0178edede91e35a = intval($ab16c72d1d6979e9dbc3cf68f4f9bc91[1]) + 1;
                    C6d00c7c372420284ed9ef92a0dac86a:
                    C6c2d4c4c0b66d75ee749e190fa73ce7:
                    if (file_exists(DELAY_STREAM . $this->id . "_.m3u8_old")) {
                        file_put_contents(DELAY_STREAM . $this->id . "_.m3u8_old", file_get_contents(DELAY_STREAM . $this->id . "_.m3u8_old") . file_get_contents(DELAY_STREAM . $this->id . "_.m3u8"));
                        shell_exec("sed -i '/EXTINF\\|.ts/!d' DELAY_STREAM" . $this->id . "_.m3u8_old");
                        goto e0bdafa6c4c6ec47bb897d569df194fc;
                    }
                    copy(DELAY_STREAM . $this->id . "_.m3u8", DELAY_STREAM . $this->id . "_.m3u8_old");
                    e0bdafa6c4c6ec47bb897d569df194fc:
                    F0c23accefdd1d023f9f35f40913503e:
                    $e1dda5d14ca72f0e3c299ebc70d08fe3 .= implode(" ", self::D88383180a3E5bD9020c9E867dE4EB99($this->stream_info["transcode_attributes"])) . " ";
                    $e1dda5d14ca72f0e3c299ebc70d08fe3 .= "{MAP} -individual_header_trailer 0 -f segment -segment_format mpegts -segment_time " . App::Ebad2b36748ae97f7ae5870e0b79132c . " -segment_list_size " . $this->stream_info["delay_minutes"] * 6 . " -segment_start_number {$E79cc8edae2c1595c0178edede91e35a} -segment_format_options \"mpegts_flags=+initial_discontinuity:mpegts_copyts=1\" -segment_list_type m3u8 -segment_list_flags +live+delete -segment_list \"" . DELAY_STREAM . $this->id . "_.m3u8\" \"" . DELAY_STREAM . $this->id . "_%d.ts\" ";
                    $f7cc1828c6561ab578b74946c933a2a8 = $this->stream_info["delay_minutes"] * 60;
                    if (!($E79cc8edae2c1595c0178edede91e35a > 0)) {
                        goto de4b09d5f4314cfd3d3fdd9fcd447302;
                    }
                    $f7cc1828c6561ab578b74946c933a2a8 -= ($E79cc8edae2c1595c0178edede91e35a - 1) * 10;
                    if (!($f7cc1828c6561ab578b74946c933a2a8 <= 0)) {
                        goto A7727a4d36ecb93ba15fef34b51013f7;
                    }
                    $f7cc1828c6561ab578b74946c933a2a8 = 0;
                    A7727a4d36ecb93ba15fef34b51013f7:
                    de4b09d5f4314cfd3d3fdd9fcd447302:
                    b952264da5ff0372354293e5685ff4f5:
                    $e1dda5d14ca72f0e3c299ebc70d08fe3 .= " >/dev/null 2>/dev/null & echo \$! > STREAMS_PATH" . $this->id . "_.pid";
                    $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_replace(["{NV_DEINT}", "{NV_RESIZE}", "{HW_ACCEL}", "{HW_ACCEL_DEVICE}", "{FETCH_OPTIONS}", "{GEN_PTS}", "{STREAM_SOURCE}", "{MAP}", "{READ_NATIVE}", "{CONCAT}", "{AAC_FILTER}"], ["", "", "", "", empty($this->stream_info["custom_ffmpeg"]) ? implode(" ", $ac81a7e009d840978474839229012899["fetch_options"]) : "", empty($this->stream_info["custom_ffmpeg"]) ? $a0db8a1e2fea2af4fa7dde28b9e9a563 : "", $ac81a7e009d840978474839229012899["url"], empty($this->stream_info["custom_ffmpeg"]) ? $c67ef0e0bfee4f0ca6ecb53bc218aa7e : "", empty($this->stream_info["custom_ffmpeg"]) ? $C6e398905ecba49881657916cc12d7db : "", $this->stream_info["type_key"] == "created_live" && $this->servers[SERVER_ID]["parent_id"] == 0 ? "-safe 0 -f concat" : "", !stristr($b3f71f0f746d4aa74fa1af183d555cf5["container"], "flv") && $b3f71f0f746d4aa74fa1af183d555cf5["codecs"]["audio"]["codec_name"] == "aac" && $this->stream_info["transcode_attributes"]["-acodec"] == "copy" ? "-bsf:a aac_adtstoasc" : ""], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                    shell_exec($e1dda5d14ca72f0e3c299ebc70d08fe3);
                    $this->localPID = intval(file_get_contents(STREAMS_PATH . $this->id . "_.pid"));
                    $this->servers[SERVER_ID]["delay_available_at"] = $this->delay ? time() + $f7cc1828c6561ab578b74946c933a2a8 : 0;
                    if (!(App::$ipTV_db->query("UPDATE `streams_sys` SET `delay_available_at` = '%d',`to_analyze` = 0,`stream_started` = '%d',`stream_info` = '%s',`stream_status` = 0,`pid` = '%d',`progress_info` = '%s',`current_source` = '%s' WHERE `stream_id` = '%d' AND `server_id` = '%d'", $this->servers[SERVER_ID]["delay_available_at"], time(), json_encode($b3f71f0f746d4aa74fa1af183d555cf5), $this->localPID, json_encode([]), $this->currentSource, $this->id, SERVER_ID) === false)) {
                        if (!(SERVER_ID == $this->stream_info["tv_archive_server_id"])) {
                            goto D65b328d06bbe555c017615115695cb0;
                        }
                        shell_exec("PHP_BIN TOOLS_PATHarchive.php " . $this->id . " >/dev/null 2>/dev/null & echo \$!");
                        D65b328d06bbe555c017615115695cb0:
                        $this->DelayStartAt = $ffa09b0cd9f34ecba48c1a9446fbcdff;
                        return true;
                    }
                    posix_kill($this->localPID, 9);
                    $this->localPID = null;
                    return 0;
                }
                return 0;
            }
            return false;
        }
        return false;
    }
    public function C2786bBdFDF7fc4A9FdEe21D3A3458B0()
    {
        App::$ipTV_db->query("UPDATE `streams_sys` SET `progress_info` = '',`to_analyze` = 0,`pid` = -1,`stream_status` = 1 WHERE `server_id` = '%d' AND `stream_id` = '%d'", SERVER_ID, $this->id);
    }
    public function dC91399e3DADe5208E2Aca613286c505()
    {
        if (!file_exists(MOVIES_PATH . $this->id . "_.pid")) {
            goto d7e5dc1f26e3be2ac74667a4b0e13788;
        }
        $B562860a41c56e3f78d05d5ed925c0c4 = (int) file_get_contents(MOVIES_PATH . $this->id . "_.pid");
        posix_kill($B562860a41c56e3f78d05d5ed925c0c4, 9);
        d7e5dc1f26e3be2ac74667a4b0e13788:
        shell_exec("rm -f MOVIES_PATH" . $this->id . ".*");
        App::$ipTV_db->query("UPDATE `streams_sys` SET `bitrate` = NULL,`current_source` = NULL,`to_analyze` = 0,`pid` = NULL,`stream_started` = NULL,`stream_info` = NULL,`stream_status` = 0 WHERE `stream_id` = '%d' AND `server_id` = '%d'", $this->id, SERVER_ID);
    }
    public function DAE33Bc1bE6c1f49737E01271A8189D1()
    {
        if (!($this->stream_info["direct_source"] != 0 || empty($this->servers[SERVER_ID]))) {
            $this->cD3c66C18bcdCb4d7e6aFfBCBD677c39();
            $this->c2f7b2D36957Ed1c4194F7C83Ea1F707();
            if (!empty($this->stream_info["type_key"])) {
                goto Cfe6e29b180573e994f19283b814aec6;
            }
            App::$ipTV_db->query("SELECT * FROM `streams_types` WHERE type_id = '%d' AND `live` = 0", $this->stream_info["type"]);
            if (!(App::$ipTV_db->num_rows() <= 0)) {
                $this->stream_info = array_merge($this->stream_info, App::$ipTV_db->b04357e9EcD755526F8a29dC3aE48F8E());
                Cfe6e29b180573e994f19283b814aec6:
                $F27d7fe9cc099b4ad40bcf7a8b2961f7 = json_decode($this->stream_info["target_container"], true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $this->stream_info["target_container"] = $F27d7fe9cc099b4ad40bcf7a8b2961f7;
                    goto Ee9ef3afdc92602812a3d7669520101c;
                }
                $this->stream_info["target_container"] = [$this->stream_info["target_container"]];
                Ee9ef3afdc92602812a3d7669520101c:
                App::$ipTV_db->query("SELECT * FROM `streams_sys` WHERE stream_id  = '%d' AND `server_id` = '%d'", $this->id, SERVER_ID);
                if (!(App::$ipTV_db->num_rows() <= 0)) {
                    $fa52708e6a9e48bc3ab5482d5546174d["server_info"] = App::$ipTV_db->b04357E9eCD755526F8a29DC3ae48f8e();
                    App::$ipTV_db->query("SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = '%d' AND t1.argument_id = t2.id", $this->id);
                    $fa52708e6a9e48bc3ab5482d5546174d["stream_arguments"] = App::$ipTV_db->DF3FC71C83aA0E213757981bde2C463a();
                    $a7755c50572fe35adaa275b191e47638 = json_decode($this->stream_info["stream_source"], true)[0];
                    if (substr($a7755c50572fe35adaa275b191e47638, 0, 2) == "s:") {
                        $F9df3dc3135806b6a483cd05ce046707 = explode(":", $a7755c50572fe35adaa275b191e47638, 3);
                        $B3ea768a89a03f97f236a4dccecdd200 = $F9df3dc3135806b6a483cd05ce046707[1];
                        if ($B3ea768a89a03f97f236a4dccecdd200 != SERVER_ID) {
                            $c993c0c4e4181a2893012109b36f71d7 = App::$StreamingServers[$B3ea768a89a03f97f236a4dccecdd200]["api_url"] . "&action=getFile&filename=" . urlencode($F9df3dc3135806b6a483cd05ce046707[2]);
                            goto F627e393142fef6876687a904a339287;
                        }
                        $c993c0c4e4181a2893012109b36f71d7 = $F9df3dc3135806b6a483cd05ce046707[2];
                        F627e393142fef6876687a904a339287:
                        $A7896afc2cc57e3bd76883eac35bc946 = null;
                        goto b17d48e9b5e47bd8010141ddaa644fcd;
                    }
                    $a7755c50572fe35adaa275b191e47638 = urldecode($a7755c50572fe35adaa275b191e47638);
                    $A7896afc2cc57e3bd76883eac35bc946 = substr($a7755c50572fe35adaa275b191e47638, 0, strpos($a7755c50572fe35adaa275b191e47638, "://"));
                    $c993c0c4e4181a2893012109b36f71d7 = str_replace(" ", "%20", $a7755c50572fe35adaa275b191e47638);
                    $e900208d18f11e8c9f5d96b1b242a370 = implode(" ", self::DF071E18915aEb987a5CcA0d9c426F93($fa52708e6a9e48bc3ab5482d5546174d["stream_arguments"], $A7896afc2cc57e3bd76883eac35bc946, "fetch"));
                    b17d48e9b5e47bd8010141ddaa644fcd:
                    if (isset($B3ea768a89a03f97f236a4dccecdd200) && $B3ea768a89a03f97f236a4dccecdd200 == SERVER_ID && $this->stream_info["movie_symlink"] == 1) {
                        $e1dda5d14ca72f0e3c299ebc70d08fe3 = "ln -s \"{$c993c0c4e4181a2893012109b36f71d7}\" " . MOVIES_PATH . $this->id . "." . pathinfo($c993c0c4e4181a2893012109b36f71d7, PATHINFO_EXTENSION) . " >/dev/null 2>/dev/null & echo \$! > " . MOVIES_PATH . $this->id . "_.pid";
                        goto Ca675e111f3f42d52af4f38fa1167c14;
                    }
                    $Ac0a390eecce13974901c2de790f8ca7 = json_decode($this->stream_info["movie_subtitles"], true);
                    $baacbca7321b3f66dca114f0a7fe3a05 = $Ac167e2af2bcd3276164dbe4f53b1d61 = "";
                    if (empty($Ac0a390eecce13974901c2de790f8ca7)) {
                        goto Ae09daae14161d6c9c144cfe0b5fd386;
                    }
                    $d0f07d1b2d3f9bb763850fa739d362e6 = 0;
                    d313979c2df4157e1a553532acf3e2b3:
                    if (!($d0f07d1b2d3f9bb763850fa739d362e6 < count($Ac0a390eecce13974901c2de790f8ca7["files"]))) {
                        $d0f07d1b2d3f9bb763850fa739d362e6 = 0;
                        Fb9e40be4e7cafebdef07fe7f3f84da4:
                        if (!($d0f07d1b2d3f9bb763850fa739d362e6 < count($Ac0a390eecce13974901c2de790f8ca7["files"]))) {
                            Ae09daae14161d6c9c144cfe0b5fd386:
                            $e1dda5d14ca72f0e3c299ebc70d08fe3 = FFMPEG_PATH . " -y -nostdin -hide_banner -loglevel warning -err_detect ignore_err {HW_ACCEL} {HW_ACCEL_DEVICE} {NV_RESIZE} {NV_DEINT} {FETCH_OPTIONS} -fflags +genpts -async 1 {READ_NATIVE} -i \"{STREAM_SOURCE}\" {$baacbca7321b3f66dca114f0a7fe3a05}";
                            $C6e398905ecba49881657916cc12d7db = "";
                            if (!($this->stream_info["read_native"] == 1)) {
                                goto c78ba62eb0fdf68aba8740c2f75c8a61;
                            }
                            $C6e398905ecba49881657916cc12d7db = "-re";
                            c78ba62eb0fdf68aba8740c2f75c8a61:
                            if ($this->stream_info["enable_transcode"] == 1) {
                                if ($this->stream_info["transcode_profile_id"] == -1) {
                                    $this->stream_info["transcode_attributes"] = array_merge(self::Df071E18915aEB987A5ccA0d9c426f93($fa52708e6a9e48bc3ab5482d5546174d["stream_arguments"], $A7896afc2cc57e3bd76883eac35bc946, "transcode"), json_decode($this->stream_info["transcode_attributes"], true));
                                    goto f287dd23190e93ad1cf43ebe0bcba6eb;
                                }
                                $this->stream_info["transcode_attributes"] = json_decode($this->transcodingProfile["profile_options"], true);
                                f287dd23190e93ad1cf43ebe0bcba6eb:
                                goto Ea5ff94c0b54265f62c4be78ffe303de;
                            }
                            $this->stream_info["transcode_attributes"] = [];
                            Ea5ff94c0b54265f62c4be78ffe303de:
                            $c67ef0e0bfee4f0ca6ecb53bc218aa7e = "-map 0 -copy_unknown ";
                            if (!empty($this->stream_info["custom_map"])) {
                                $c67ef0e0bfee4f0ca6ecb53bc218aa7e = $this->stream_info["custom_map"] . " -copy_unknown ";
                                goto a792d28ab698a54415a32f8e6b9f8382;
                            }
                            if ($this->stream_info["remove_subtitles"] == 1) {
                                $c67ef0e0bfee4f0ca6ecb53bc218aa7e = "-map 0:a -map 0:v";
                                goto B53b464808540db29e7d9a958c4332af;
                            }
                            B53b464808540db29e7d9a958c4332af:
                            a792d28ab698a54415a32f8e6b9f8382:
                            if (array_key_exists("-acodec", $this->stream_info["transcode_attributes"])) {
                                goto aa9c751612341e946534f58088edb242;
                            }
                            $this->stream_info["transcode_attributes"]["-acodec"] = "copy";
                            aa9c751612341e946534f58088edb242:
                            if (array_key_exists("-vcodec", $this->stream_info["transcode_attributes"])) {
                                goto babdd0ed46126ec449c3360845977edb;
                            }
                            $this->stream_info["transcode_attributes"]["-vcodec"] = "copy";
                            babdd0ed46126ec449c3360845977edb:
                            if (empty($this->stream_info["transcode_attributes"]["-hwaccel"])) {
                                goto Ae61f4dbfbe3cf7387a23b531771d21f;
                            }
                            $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{HW_ACCEL}", "-hwaccel " . $this->stream_info["transcode_attributes"]["-hwaccel"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                            if (empty($this->stream_info["transcode_attributes"]["-resize"])) {
                                goto Be12d8ecef6a771b6fe2c4413ee38a91;
                            }
                            $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{NV_RESIZE}", "-resize " . $this->stream_info["transcode_attributes"]["-resize"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                            Be12d8ecef6a771b6fe2c4413ee38a91:
                            if (empty($this->stream_info["transcode_attributes"]["-deint"])) {
                                goto A1b57db4bcab0236271c76ef0c802c42;
                            }
                            $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{NV_DEINT}", "-deint " . $this->stream_info["transcode_attributes"]["-deint"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                            A1b57db4bcab0236271c76ef0c802c42:
                            if (empty($this->stream_info["transcode_attributes"]["-gpu"])) {
                                goto B709bb5227362f9f838bfbaab907d070;
                            }
                            $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_ireplace("{HW_ACCEL_DEVICE}", "-hwaccel_device " . $this->stream_info["transcode_attributes"]["-gpu"], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                            unset($this->stream_info["transcode_attributes"]["-gpu"]);
                            B709bb5227362f9f838bfbaab907d070:
                            Ae61f4dbfbe3cf7387a23b531771d21f:
                            if (empty(App::$StreamingServers[SERVER_ID]["vod_output_folder"]) || !is_dir(App::$StreamingServers[SERVER_ID]["vod_output_folder"]) || !is_writeable(App::$StreamingServers[SERVER_ID]["vod_output_folder"])) {
                                $d510d5b8e6cb1a72c5164cb6fd1dc9c0 = MOVIES_PATH;
                                goto Aad34a18721c14ff4a040ab601bd9c8d;
                            }
                            $d510d5b8e6cb1a72c5164cb6fd1dc9c0 = App::$StreamingServers[SERVER_ID]["vod_output_folder"];
                            Aad34a18721c14ff4a040ab601bd9c8d:
                            $f264b95e316005700ae71df37bf7ebe5 = [];
                            foreach ($this->stream_info["target_container"] as $b949e61346007a19586bd7e34c620c5c) {
                                $f264b95e316005700ae71df37bf7ebe5[$b949e61346007a19586bd7e34c620c5c] = "-movflags +faststart -dn {$c67ef0e0bfee4f0ca6ecb53bc218aa7e} -ignore_unknown {$Ac167e2af2bcd3276164dbe4f53b1d61} " . $d510d5b8e6cb1a72c5164cb6fd1dc9c0 . $this->id . "." . $b949e61346007a19586bd7e34c620c5c . " ";
                            }
                            foreach ($f264b95e316005700ae71df37bf7ebe5 as $ddbb962bb52c6b36e241487fa7e25263 => $f3693cd3a1833ab759e9d8caba8b44aa) {
                                if ($ddbb962bb52c6b36e241487fa7e25263 == "mp4") {
                                    $this->stream_info["transcode_attributes"]["-scodec"] = "mov_text";
                                    goto A11b1a8929a3e1e85f5c12fc6d484b13;
                                }
                                if ($ddbb962bb52c6b36e241487fa7e25263 == "mkv") {
                                    $this->stream_info["transcode_attributes"]["-scodec"] = "srt";
                                    goto d173ae7ea0d74bbbc1b6c5563f642fbc;
                                }
                                $this->stream_info["transcode_attributes"]["-scodec"] = "copy";
                                d173ae7ea0d74bbbc1b6c5563f642fbc:
                                A11b1a8929a3e1e85f5c12fc6d484b13:
                                $e1dda5d14ca72f0e3c299ebc70d08fe3 .= implode(" ", self::d88383180A3E5bd9020C9e867DE4Eb99($this->stream_info["transcode_attributes"])) . " ";
                                $e1dda5d14ca72f0e3c299ebc70d08fe3 .= $f3693cd3a1833ab759e9d8caba8b44aa;
                            }
                            $e1dda5d14ca72f0e3c299ebc70d08fe3 .= " >/dev/null 2>MOVIES_PATH" . $this->id . ".errors & echo \$! > " . MOVIES_PATH . $this->id . "_.pid";
                            $e1dda5d14ca72f0e3c299ebc70d08fe3 = str_replace(["{NV_DEINT}", "{NV_RESIZE}", "{HW_ACCEL}", "{HW_ACCEL_DEVICE}", "{FETCH_OPTIONS}", "{STREAM_SOURCE}", "{READ_NATIVE}"], ["", "", "", "", empty($e900208d18f11e8c9f5d96b1b242a370) ? "" : $e900208d18f11e8c9f5d96b1b242a370, $c993c0c4e4181a2893012109b36f71d7, empty($this->stream_info["custom_ffmpeg"]) ? $C6e398905ecba49881657916cc12d7db : ""], $e1dda5d14ca72f0e3c299ebc70d08fe3);
                            Ca675e111f3f42d52af4f38fa1167c14:
                            shell_exec($e1dda5d14ca72f0e3c299ebc70d08fe3);
                            $B562860a41c56e3f78d05d5ed925c0c4 = intval(file_get_contents(MOVIES_PATH . $this->id . "_.pid"));
                            App::$ipTV_db->query("UPDATE `streams_sys` SET `vod_folder` = '%s',`to_analyze` = 1,`stream_started` = '%d',`stream_status` = 0,`pid` = '%d' WHERE `stream_id` = '%d' AND `server_id` = '%d'", $d510d5b8e6cb1a72c5164cb6fd1dc9c0, time(), $B562860a41c56e3f78d05d5ed925c0c4, $this->id, SERVER_ID);
                            return $B562860a41c56e3f78d05d5ed925c0c4;
                        }
                        $Ac167e2af2bcd3276164dbe4f53b1d61 .= "-map " . ($d0f07d1b2d3f9bb763850fa739d362e6 + 1) . " -metadata:s:s:{$d0f07d1b2d3f9bb763850fa739d362e6} title={$Ac0a390eecce13974901c2de790f8ca7["names"][$d0f07d1b2d3f9bb763850fa739d362e6]} -metadata:s:s:{$d0f07d1b2d3f9bb763850fa739d362e6} language={$Ac0a390eecce13974901c2de790f8ca7["names"][$d0f07d1b2d3f9bb763850fa739d362e6]} ";
                        $d0f07d1b2d3f9bb763850fa739d362e6++;
                        goto Fb9e40be4e7cafebdef07fe7f3f84da4;
                    }
                    $Ce5c5a9a5f535e79d65b2c7be49569c3 = urldecode($Ac0a390eecce13974901c2de790f8ca7["files"][$d0f07d1b2d3f9bb763850fa739d362e6]);
                    $b9bc12bea490a77b7540a8807b4e37c5 = $Ac0a390eecce13974901c2de790f8ca7["charset"][$d0f07d1b2d3f9bb763850fa739d362e6];
                    if ($Ac0a390eecce13974901c2de790f8ca7["location"] == SERVER_ID) {
                        $baacbca7321b3f66dca114f0a7fe3a05 .= "-sub_charenc \"{$b9bc12bea490a77b7540a8807b4e37c5}\" -i \"{$Ce5c5a9a5f535e79d65b2c7be49569c3}\" ";
                        goto a5278cf8cbd82b950f90f75609ac60ec;
                    }
                    $baacbca7321b3f66dca114f0a7fe3a05 .= "-sub_charenc \"{$b9bc12bea490a77b7540a8807b4e37c5}\" -i \"" . App::$StreamingServers[$Ac0a390eecce13974901c2de790f8ca7["location"]]["api_url"] . "&action=getFile&filename=" . urlencode($Ce5c5a9a5f535e79d65b2c7be49569c3) . "\" ";
                    a5278cf8cbd82b950f90f75609ac60ec:
                    $d0f07d1b2d3f9bb763850fa739d362e6++;
                    goto d313979c2df4157e1a553532acf3e2b3;
                }
                return false;
            }
            return false;
        }
        return false;
    }
    function b40652B8FF14C544CA66B0e33Dd14Cce()
    {
        return !$this->delay ? STREAMS_PATH . $this->id . "_.m3u8" : DELAY_STREAM . $this->id . "_.m3u8";
    }
    public static function DF071E18915aeb987a5CCA0D9C426F93($B565f8f9af640f472d8c1139fc5dc39d, $A7896afc2cc57e3bd76883eac35bc946, $b1657699c9d9994a297f9bc01f815f96)
    {
        $ac032f33e0ead125921e516fa1b6cdbf = [];
        if (empty($B565f8f9af640f472d8c1139fc5dc39d)) {
            goto F39410e62433f3475dfcba2ead4ff4b9;
        }
        foreach ($B565f8f9af640f472d8c1139fc5dc39d as $e4c7e96dbe6112ab9144751067debc82 => $E193a63ced8d98321bacf0851500791d) {
            if (!($E193a63ced8d98321bacf0851500791d["argument_cat"] != $b1657699c9d9994a297f9bc01f815f96)) {
                if (!(!is_null($E193a63ced8d98321bacf0851500791d["argument_wprotocol"]) && !stristr($A7896afc2cc57e3bd76883eac35bc946, $E193a63ced8d98321bacf0851500791d["argument_wprotocol"]) && !is_null($A7896afc2cc57e3bd76883eac35bc946))) {
                    if ($E193a63ced8d98321bacf0851500791d["argument_type"] == "text") {
                        $ac032f33e0ead125921e516fa1b6cdbf[] = sprintf($E193a63ced8d98321bacf0851500791d["argument_cmd"], $E193a63ced8d98321bacf0851500791d["value"]);
                        goto fc0bdeeac22f98e26cebafc7fb090950;
                    }
                    $ac032f33e0ead125921e516fa1b6cdbf[] = $E193a63ced8d98321bacf0851500791d["argument_cmd"];
                    fc0bdeeac22f98e26cebafc7fb090950:
                    goto Ac3c94b8f9f10e624d24d2ab1074de0e;
                }
                goto E689b4c9f5b40d346d3116cd37c1ed1d;
            }
            Ac3c94b8f9f10e624d24d2ab1074de0e:
            E689b4c9f5b40d346d3116cd37c1ed1d:
        }
        F39410e62433f3475dfcba2ead4ff4b9:
        return $ac032f33e0ead125921e516fa1b6cdbf;
    }
    public function de69D0dd5dC67e43392D6Dc523E76850()
    {
        foreach ($this->stream_info["sources"] as $ac81a7e009d840978474839229012899) {
            if (!file_exists(STREAMS_PATH . md5($ac81a7e009d840978474839229012899))) {
                goto Feb64634e4b95d7ea67fdfbc4ef73f5f;
            }
            unlink(STREAMS_PATH . md5($ac81a7e009d840978474839229012899));
            Feb64634e4b95d7ea67fdfbc4ef73f5f:
        }
    }
    public function ParseStreamURL($F2fcd2fb3a0f4e8a8226a08fcb5786f6)
    {
        $A7896afc2cc57e3bd76883eac35bc946 = strtolower(substr($F2fcd2fb3a0f4e8a8226a08fcb5786f6, 0, strpos($F2fcd2fb3a0f4e8a8226a08fcb5786f6, "://")));
        if ($A7896afc2cc57e3bd76883eac35bc946 == "rtmp") {
            if (!stristr($F2fcd2fb3a0f4e8a8226a08fcb5786f6, "\$OPT")) {
                goto E872c70e9db75fc60be75a4ebe93a1a2;
            }
            $ce70090a4b74ab4374d9dee3c15350cf = "rtmp://\$OPT:rtmp-raw=";
            $F2fcd2fb3a0f4e8a8226a08fcb5786f6 = trim(substr($F2fcd2fb3a0f4e8a8226a08fcb5786f6, stripos($F2fcd2fb3a0f4e8a8226a08fcb5786f6, $ce70090a4b74ab4374d9dee3c15350cf) + strlen($ce70090a4b74ab4374d9dee3c15350cf)));
            E872c70e9db75fc60be75a4ebe93a1a2:
            $F2fcd2fb3a0f4e8a8226a08fcb5786f6 .= " live=1 timeout=10";
            goto d5d450888a648b36bb67e6043b16a003;
        }
        if ($this->stream_info["is_website"] == 1) {
            $e81e57f11aa07782c85e5a23686e426e = trim(shell_exec(YOUTUBE_PATH . " \"{$F2fcd2fb3a0f4e8a8226a08fcb5786f6}\" -q --get-url --skip-download -f best"));
            $F2fcd2fb3a0f4e8a8226a08fcb5786f6 = explode("\n", $e81e57f11aa07782c85e5a23686e426e)[0];
            goto Ce7de56308e9f8094a619f510ed95594;
        }
        Ce7de56308e9f8094a619f510ed95594:
        d5d450888a648b36bb67e6043b16a003:
        return ["url" => $F2fcd2fb3a0f4e8a8226a08fcb5786f6, "protocol" => $A7896afc2cc57e3bd76883eac35bc946, "fetch_options" => ADE50065fc0Bf68e0C26361cCbdde708::Df071e18915aeb987A5ccA0d9C426f93($this->args, $A7896afc2cc57e3bd76883eac35bc946, "fetch")];
    }
    static function Fb6eBb9cd3fC1Cfad564234dFE1e9bda($a839cf97878bde39da1cd70402a9a0af, $bbc76bbe10c3249e96ed4e730717b161 = [], $cacae409bb3a84188e6a79fc4c41d99b = null)
    {
        $e3a986175f3ca1e33361a50316508346 = abs(intval(App::$settings["stream_max_analyze"]));
        $E49108965291e88e5e03e7228e650293 = abs(intval(App::$settings["probesize"]));
        $ae3c6b6ebc442ea33579117236aa827c = intval($e3a986175f3ca1e33361a50316508346 / 1000000) + 5;
        $be82a11563c30cf04d908fc5949926d0 = "";
        if (!stristr($a839cf97878bde39da1cd70402a9a0af, CREATED_CHANNELS)) {
            goto E9cc220f8cd66eaa844ad8ef8e92b018;
        }
        $be82a11563c30cf04d908fc5949926d0 = "-safe 0 -f concat";
        E9cc220f8cd66eaa844ad8ef8e92b018:
        $Dae650691dae876325f5df3e9e53da71 = "/usr/bin/timeout {$ae3c6b6ebc442ea33579117236aa827c}s " . FFPROBE_PATH . " -probesize {$E49108965291e88e5e03e7228e650293} -analyzeduration {$e3a986175f3ca1e33361a50316508346} " . implode(" ", $bbc76bbe10c3249e96ed4e730717b161) . " {$be82a11563c30cf04d908fc5949926d0} -i \"{$a839cf97878bde39da1cd70402a9a0af}\" -loglevel warning -print_format json -show_streams -show_format ";
        if (is_null($cacae409bb3a84188e6a79fc4c41d99b)) {
            goto ad4ff92b4a77487e378d3f81f494c066;
        }
        $Dae650691dae876325f5df3e9e53da71 .= "2>{$cacae409bb3a84188e6a79fc4c41d99b}";
        ad4ff92b4a77487e378d3f81f494c066:
        $E85e99f07e9c7f84da0068c466a0e09b = c8eA80626D9030e8839cfFA55C9FbDC1::fb82e3F1fF5d5E0813BB587209A9E003($Dae650691dae876325f5df3e9e53da71, "raw");
        return self::d56e4b28C7Ecc9274B9BcbBdc2581ae6(json_decode($E85e99f07e9c7f84da0068c466a0e09b, true));
    }
    public static function d56e4B28C7ECc9274B9bcbBdc2581AE6($d88b90a4c25bf7b93839b6de31514750)
    {
        if (empty($d88b90a4c25bf7b93839b6de31514750)) {
            return false;
        }
        if (empty($d88b90a4c25bf7b93839b6de31514750["codecs"])) {
            $output = [];
            $output["codecs"]["video"] = "";
            $output["codecs"]["audio"] = "";
            $output["container"] = $d88b90a4c25bf7b93839b6de31514750["format"]["format_name"];
            $output["filename"] = $d88b90a4c25bf7b93839b6de31514750["format"]["filename"];
            $output["bitrate"] = !empty($d88b90a4c25bf7b93839b6de31514750["format"]["bit_rate"]) ? $d88b90a4c25bf7b93839b6de31514750["format"]["bit_rate"] : null;
            $output["of_duration"] = !empty($d88b90a4c25bf7b93839b6de31514750["format"]["duration"]) ? $d88b90a4c25bf7b93839b6de31514750["format"]["duration"] : "N/A";
            $output["duration"] = !empty($d88b90a4c25bf7b93839b6de31514750["format"]["duration"]) ? gmdate("H:i:s", intval($d88b90a4c25bf7b93839b6de31514750["format"]["duration"])) : "N/A";
            foreach ($d88b90a4c25bf7b93839b6de31514750["streams"] as $db6fdddcfbc08af2476ee9c00f18a509) {
                if (isset($db6fdddcfbc08af2476ee9c00f18a509["codec_type"])) {
                    if (!($db6fdddcfbc08af2476ee9c00f18a509["codec_type"] != "audio" && $db6fdddcfbc08af2476ee9c00f18a509["codec_type"] != "video")) {
                        $output["codecs"][$db6fdddcfbc08af2476ee9c00f18a509["codec_type"]] = $db6fdddcfbc08af2476ee9c00f18a509;
                        goto d8513cd3a33e6df2b5983c03883ba52a;
                    }
                    goto b604004ce1c7bb04b0be921ab4b2daf8;
                }
                d8513cd3a33e6df2b5983c03883ba52a:
                b604004ce1c7bb04b0be921ab4b2daf8:
            }
            return $output;
        }
        return $d88b90a4c25bf7b93839b6de31514750;
    }
    public static function d88383180A3E5bd9020C9E867de4eB99($E23acd34f63adbe0a51999f451cc34fc)
    {
        if (!isset($E23acd34f63adbe0a51999f451cc34fc["-hwaccel"])) {
            goto Fb43d7fed2eb11a7e644313e72d81497;
        }
        unset($E23acd34f63adbe0a51999f451cc34fc["-hwaccel"]);
        Fb43d7fed2eb11a7e644313e72d81497:
        if (!isset($E23acd34f63adbe0a51999f451cc34fc["-resize"])) {
            goto Cb5353ea42c2286637dfd18920ea4d08;
        }
        unset($E23acd34f63adbe0a51999f451cc34fc["-resize"]);
        Cb5353ea42c2286637dfd18920ea4d08:
        if (!isset($E23acd34f63adbe0a51999f451cc34fc["-deint"])) {
            goto C181a938ef5d081f2279040883c02e1f;
        }
        unset($E23acd34f63adbe0a51999f451cc34fc["-deint"]);
        C181a938ef5d081f2279040883c02e1f:
        $d1704b4583af7e87b99a8af4ab1f57e2 = [];
        foreach ($E23acd34f63adbe0a51999f451cc34fc as $Abe3df89e8c8cad1b4de22398197f385 => $E193a63ced8d98321bacf0851500791d) {
            if (!isset($E193a63ced8d98321bacf0851500791d["cmd"])) {
                goto D9e98f792095115900b01e12e1db8226;
            }
            $E23acd34f63adbe0a51999f451cc34fc[$Abe3df89e8c8cad1b4de22398197f385] = $E193a63ced8d98321bacf0851500791d = $E193a63ced8d98321bacf0851500791d["cmd"];
            D9e98f792095115900b01e12e1db8226:
            if (!preg_match("/-filter_complex \"(.*?)\"/", $E193a63ced8d98321bacf0851500791d, $ab16c72d1d6979e9dbc3cf68f4f9bc91)) {
                goto D692de20498a0b7f823a96e089da60f8;
            }
            $E23acd34f63adbe0a51999f451cc34fc[$Abe3df89e8c8cad1b4de22398197f385] = trim(str_replace($ab16c72d1d6979e9dbc3cf68f4f9bc91[0], "", $E23acd34f63adbe0a51999f451cc34fc[$Abe3df89e8c8cad1b4de22398197f385]));
            $d1704b4583af7e87b99a8af4ab1f57e2[] = $ab16c72d1d6979e9dbc3cf68f4f9bc91[1];
            D692de20498a0b7f823a96e089da60f8:
        }
        if (empty($d1704b4583af7e87b99a8af4ab1f57e2)) {
            goto feb8bf96fced0ff8320b8594c7c4c4f9;
        }
        $E23acd34f63adbe0a51999f451cc34fc[] = "-filter_complex \"" . implode(",", $d1704b4583af7e87b99a8af4ab1f57e2) . "\"";
        feb8bf96fced0ff8320b8594c7c4c4f9:
        $D5aa11fe387c4895129eb7105ca996f4 = [];
        foreach ($E23acd34f63adbe0a51999f451cc34fc as $Abe3df89e8c8cad1b4de22398197f385 => $c405a192c13b5ba2ac42394e6e647ecb) {
            if (is_numeric($Abe3df89e8c8cad1b4de22398197f385)) {
                $D5aa11fe387c4895129eb7105ca996f4[] = $c405a192c13b5ba2ac42394e6e647ecb;
                goto d46441be4b268740ab9558f7d260887a;
            }
            $D5aa11fe387c4895129eb7105ca996f4[] = $Abe3df89e8c8cad1b4de22398197f385 . " " . $c405a192c13b5ba2ac42394e6e647ecb;
            d46441be4b268740ab9558f7d260887a:
        }
        $D5aa11fe387c4895129eb7105ca996f4 = array_filter($D5aa11fe387c4895129eb7105ca996f4);
        uasort($D5aa11fe387c4895129eb7105ca996f4, ["Ade50065fc0BF68e0c26361CcbDdE708", "customOrder"]);
        return array_map("trim", array_values(array_filter($D5aa11fe387c4895129eb7105ca996f4)));
    }
    public static function customOrder($Db86fa33e0676b8c3b8c44eb5f8d51b3, $a998691ab3a08511dc38cdcc2f259955)
    {
        if (!(substr($Db86fa33e0676b8c3b8c44eb5f8d51b3, 0, 3) == "-i ")) {
            return 1;
        }
        return -1;
    }
}
