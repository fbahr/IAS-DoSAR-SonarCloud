<?php

$GLOBALS["rrxchvduvg"] = "vicat";
$GLOBALS["ktdxdrx"] = "cat_id";
$GLOBALS["qgsohofpfh"] = "desiredQualities";
$GLOBALS["eghylhedqgw"] = "SongKey";
$GLOBALS["hiyiexyexu"] = "desiredQuality";
$GLOBALS["jiaqqowon"] = "categorylist";
$GLOBALS["onurzcm"] = "album_id";
$GLOBALS["utbbnfkiok"] = "playlistName";
$GLOBALS["iwjgila"] = "playlistID";
$GLOBALS["kzrosgsj"] = "artistName";
$GLOBALS["irmbrhkfyeee"] = "albumUrl";
$GLOBALS["fkfqzyw"] = "songCount";
$GLOBALS["srwssskaqfjo"] = "name";
$GLOBALS["lgywpehchwg"] = "artistId";
$GLOBALS["mchliudnuxl"] = "row";
$GLOBALS["tgrplugwtyn"] = "downloadLink";
$GLOBALS["awdlhndooka"] = "download";
$vfzdhfampy = "currentPage";
$GLOBALS["odhsndlj"] = "album";
$GLOBALS["letyat"] = "totalPages";
$GLOBALS["yxniutccjgv"] = "today";
$GLOBALS["hhqatntd"] = "completeDate";
$GLOBALS["vyollye"] = "year";
$GLOBALS["uhifovjwj"] = "writers";
$GLOBALS["qpuqllwtz"] = "snippet";
$GLOBALS["psqcbnocvl"] = "songId";
$GLOBALS["frckydhgok"] = "imageUr";
$GLOBALS["nfuvapdlb"] = "imageUrl";
$GLOBALS["ldqhhh"] = "song";
$GLOBALS["bnqfwfgix"] = "fileExists";
$GLOBALS["unbhiiwgi"] = "songs";
$GLOBALS["kuojbcf"] = "image";
$GLOBALS["kaevhxdsnyi"] = "nextPage";
$GLOBALS["ijvrlt"] = "total";
$GLOBALS["shmxaf"] = "prevPage";
$GLOBALS["pxyhcibcds"] = "currentPage";
$GLOBALS["eallrktjnuw"] = "limit";
$GLOBALS["gcutjhgted"] = "totalPages";
$GLOBALS["xmduhjly"] = "categoryeaxi";
$GLOBALS["flygigqdrsml"] = "img";
$GLOBALS["mjxckqjwxze"] = "nextPage";
$GLOBALS["lyumomtr"] = "result";
$GLOBALS["hytswowbool"] = "totalResults";
$GLOBALS["vxfmjih"] = "response";
$GLOBALS["nekfclogla"] = "apiUrl";
$GLOBALS["jdyvhfbmdv"] = "keyword";
$GLOBALS["bloxefxtxh"] = "errorMessage";
$GLOBALS["rpdixmsic"] = "albumYear";
$GLOBALS["zbfaeompgu"] = "albumName";
$GLOBALS["suldwvrc"] = "albumImage";
$GLOBALS["joetkkgcoy"] = "primaryArtistsId";
$GLOBALS["yremrhxbb"] = "albumId";
$GLOBALS["xcjtjyu"] = "url";
$GLOBALS["sdiuqbturnq"] = "albumlink";
$GLOBALS["mfuraiqxu"] = "parentids";
$GLOBALS["egyflml"] = "id";
$GLOBALS["irxubmmarr"] = "data";
$GLOBALS["xxrvgixdd"] = "db_check_id";
$GLOBALS["efxnuwuomj"] = "release_date";
$GLOBALS["hxewpvyn"] = "songlabel";
$GLOBALS["ofnevlmshu"] = "cPath";
$GLOBALS["buuhycvj"] = "target_dir2";
$GLOBALS["oborpxfnjht"] = "bitrate128";
$GLOBALS["bcnhicijkjq"] = "AudioBitrates";
$GLOBALS["rchotixrp"] = "bitrate64";
$GLOBALS["xgzrgwu"] = "cover";
$GLOBALS["eegryskpdbi"] = "filecover";
$GLOBALS["cgqoqmrmk"] = "catCover";
$GLOBALS["qsfrwnqub"] = "thumbname";
$GLOBALS["wopzqqywqb"] = "RootPath";
$GLOBALS["oecfejltul"] = "Tagdata";
$GLOBALS["gbijuxycn"] = "command";
$GLOBALS["vdvsndii"] = "converted_file_name";
$noypjwswfp = "currentPage";
$GLOBALS["dvwnhe"] = "target_paths";
$GLOBALS["olbjxvic"] = "dl_link";
$GLOBALS["hshmjt"] = "ffile_name";
$GLOBALS["zfzxih"] = "saveThumb";
$GLOBALS["rhcwhyvy"] = "tmp_thumbname";
$GLOBALS["nozmqsijtmnj"] = "thumb_ext";
$GLOBALS["vtmmetqxn"] = "savePath";
$GLOBALS["aytthyqrhnl"] = "mkdir";
$GLOBALS["whagprtv"] = "yt_title";
$GLOBALS["rchgglbhetpq"] = "lyricsParagraph";
$GLOBALS["byyxbdmsf"] = "totalResults";
$GLOBALS["tysvnndrgdw"] = "lyrics";
$GLOBALS["voxxryt"] = "paragraphs";
$GLOBALS["zhnwstpb"] = "lyricswriter";
$GLOBALS["kfqphwwvf"] = "artist";
$GLOBALS["ahhxvhhwicb"] = "song_music";
$GLOBALS["rxwetrjqvjwr"] = "artist1";
$GLOBALS["dokkhpxeq"] = "yt_titles";
$GLOBALS["hvgvwxdendgu"] = "vineet_baba";
$GLOBALS["xnsfinzglbf"] = "currentPage";
$GLOBALS["pqekiocdn"] = "prevPage";
$GLOBALS["rrhkbitritc"] = "bitrate320";
$GLOBALS["gscobthsy"] = "bitrate192";
$GLOBALS["igfumri"] = "song_id";
$GLOBALS["lccitldv"] = "category";
$GLOBALS["qtebuwbzml"] = "cid";
$ljueklq = "results";
$jjmnduij = "q";
$GLOBALS["rybcvbrkruo"] = "cid";
$GLOBALS["sofsggtkji"] = "page";
require_once "/var/www/html/../header.php";
require_once "../config/init.php";
require_once "/var/www/html/../functio_hearthis.php";
require_once "/var/www/html/../function2.php";
$page = $_GET["p"];
$q = $_GET["q"];
$GLOBALS["epwssjnq"] = "currentPage";
$GLOBALS["flnetsfv"] = "vicat";
$cid = $_GET["cid"];
$GLOBALS["eihusfzqq"] = "rk";
$db->where("id", $cid);
$category = $db->getOne("category");
echo "\n<style>\n/* Default styles for the table */\ntable {\n  width: 100%;\n  font-size: 14px; /* Default font size */\n  border-spacing: 0; /* Remove cell spacing */\n}\n\nth, td {\n  padding: 8px;\n  border: 1px solid #ddd;\n  white-space: nowrap; /* Prevent text from wrapping */\n}\n\n.form-control {\n    width: 100% !important;\n    max-width: 100% !important;\n}\n* {\n    margin: 0;\n    padding: 0;\n    box-sizing: border-box;\n}\n@media (max-width: 768px) {\n    .form-control {\n        width: 100%; /* Set the width to 100% on mobile devices */\n        max-width: 100%; /* Ensure the width does not exceed the screen width */\n    }\n}\n@media (max-width: 768px) {\n    .mobile-input {\n        width: 100%; /* Set the width to 100% to make it expand to the container width */\n    }\n}\n.smaller-checkbox {\nwidth: 20px;\nheight: 20px;\n}\n.select-wrapper {\nposition: relative;\ndisplay: inline-block;\n}\n.select-wrapper::after {\ncontent: '\\f078';\nfont-family: 'FontAwesome';\nposition: absolute;\ntop: 50%;\nright: 10px;\ntransform: translateY(-50%);\npointer-events: none;\n}\n#category-select {\nwidth: 100%;\nmax-width: 100%;\n}\n@media (max-width: 576px) {\n.text-sm-end.text-center {\ntext-align: center;\n}\n}\n</style>\n";
$rk = "APP_URL/ADMIN_DIR/artist/process.php";
$vicat = "APP_URL/ADMIN_DIR/category/process.php";
echo "<div class=\"container-fluid\">\n<div class=\"row\">\n<div class=\"col-md-12\">\n<div class=\"card\">\n<div class=\"card-body\">\n<form method=\"POST\" action=\"\" id=\"searchForm\">\n<div class=\"form-row\">\n<div class=\"col-md-6\">\n<div class=\"form-group\">\n<label for=\"searchType\">Search Type:</label>\n<select class=\"form-control mobile-input\" id=\"searchType\" name=\"searchType\">\n<option value=\"albumLink\">Album Link</option>  \n<option value=\"artist\">Artist Link</option>\n<option value=\"Songkey\">Song Keyword</option> \n<option value=\"album\">Album Keyword</option>\n<option value=\"playlist\">Playlist Keyword</option>\n</select>\n</div>\n</div>\n<div class=\"col-md-6\">\n<div class=\"form-group\">\n<label for=\"searchInput\">Search:</label>\n<input type=\"text\" class=\"form-control mobile-input\" id=\"searchInput\" name=\"searchInput\" placeholder=\"Enter artist Link, playlist or album keyword\" required>\n</div>\n</div>\n<input type=\"hidden\" class=\"form-control mobile-input\" id=\"artistLink\" name=\"artistLink\">\n<input type=\"hidden\" class=\"form-control mobile-input\" id=\"Songkey\" name=\"Songkey\">\n<input type=\"hidden\" class=\"form-control mobile-input\" id=\"albumLink\" name=\"albumLink\">\n<input type=\"hidden\" class=\"form-control mobile-input\" id=\"albumkeyword\" name=\"albumkeyword\">\n<input type=\"hidden\" class=\"form-control mobile-input\" id=\"playlistkeyword\" name=\"playlistkeyword\">\n</div>\n<button type=\"submit\" class=\"btn btn-success btn-block\">Search</button>\n</form>\n</div>\n";
if (isset($_POST["step2"])) {
    $cid = $_POST["cid"];
    $db->where("id", $cid);
    $category = $db->getOne("category");
    if ($db->count > 0) {
        $rknrsqy = "song_id";
        $GLOBALS["szvuunvhdn"] = "a1";
        $a1 = $_POST["id"];
        $GLOBALS["fugltnr"] = "a1";
        foreach ($a1 as $song_id) {
            $GLOBALS["ukdfseit"] = "db_check_id";
            $GLOBALS["onpjswwyur"] = "ffile_name";
            $GLOBALS["oeohwf"] = "yt_title";
            $hnlxdtgabzum = "yt_title_dname";
            $xfwmhzyk = "song_lyrics_writer";
            $jvbhakpoq = "RootPath";
            $vezovdwxqeg = "song_id";
            $GLOBALS["bsqnjmejj"] = "song_lyrics_writer";
            $GLOBALS["cdoeqf"] = "capitalizedLang";
            $evausk = "thumbname";
            $tcqxaxher = "extension";
            $GLOBALS["lkpoyk"] = "lang";
            $uuixokps = "yt_title_dname";
            $qywfdyug = "target_dir2";
            $db_check_id = $song_id;
            $oistlgmqrdts = "bitrate64";
            $GLOBALS["lgeepvcu"] = "category";
            $noddwmv = "extension";
            $ifnggpo = "release_date";
            $hhcfihmeksuh = "yt_titles";
            $GLOBALS["ijkblcksstc"] = "AudioBitrates";
            $dqsfmfd = "song_id";
            $GLOBALS["qurretbizhdt"] = "artist1";
            $zhjfrjtlfowo = "Tagdata";
            ${$GLOBALS["igfumri"]} = $song_id;
            $bbpliw = "bitrate128";
            $hrrmcccymgy = "song_id";
            $GLOBALS["ijqjxmtxot"] = "album_name";
            $xchiqu = "song_id";
            $ocpthopa = "lyrics";
            ${$oistlgmqrdts} = $_POST["bitrate_64_" . ${$GLOBALS["igfumri"]}];
            $GLOBALS["kzgaljfy"] = "songthumburl";
            $eistdiqtcl = "thumb_ext";
            $guwrjivh = "vineet_baba";
            $rwlrpujrtdfd = "target_paths";
            ${$bbpliw} = $_POST["bitrate_128_" . ${$GLOBALS["igfumri"]}];
            $byurnnsx = "dl_link";
            $GLOBALS["ixektjly"] = "parentids";
            $ylbpqsplgh = "thumbURL";
            $djkdghg = "lang";
            ${$GLOBALS["gscobthsy"]} = $_POST["bitrate_192_" . ${$xchiqu}];
            $sslsfoei = "cPath";
            $GLOBALS["kosrnopcycfy"] = "w_pos";
            $GLOBALS["dgmbiie"] = "yt_title";
            ${$GLOBALS["rrhkbitritc"]} = $_POST["bitrate_320_" . ${$GLOBALS["igfumri"]}];
            $GLOBALS["pqstjtnwyu"] = "target_dir2";
            $breovvbh = "desc_n2";
            $GLOBALS["uxjilikw"] = "id";
            $GLOBALS["unqfku"] = "ffile_name";
            ${$GLOBALS["qurretbizhdt"]} = $_POST["artistname_" . ${$GLOBALS["igfumri"]}];
            $GLOBALS["selvsetwui"] = "converted_file_name";
            $equjkq = "thumb_ext";
            $GLOBALS["qxstyku"] = "target_dir2";
            $GLOBALS["dseepawmsn"] = "thumbname";
            $ouoyrguyoe = "song_id";
            ${$djkdghg} = $_POST["lang"];
            $ugpltege = "trend";
            ${$GLOBALS["cdoeqf"]} = ucwords(${$GLOBALS["lkpoyk"]});
            ${$GLOBALS["ijqjxmtxot"]} = $_POST["album_name"];
            $njefedq = "category";
            $GLOBALS["fnbqbze"] = "cid";
            $GLOBALS["pvwkdsz"] = "data";
            $GLOBALS["wxoyyogij"] = "category";
            ${$hhcfihmeksuh} = $_POST["titlename_" . ${$GLOBALS["igfumri"]}];
            $GLOBALS["hecdcwfbtl"] = "artist";
            ${$GLOBALS["hvgvwxdendgu"]} = ${$GLOBALS["dokkhpxeq"]};
            $GLOBALS["ompewzeywjf"] = "catCover";
            ${$GLOBALS["dgmbiie"]} = ${$guwrjivh};
            $wdjiuaa = "songlabel";
            ${$hnlxdtgabzum} = "{$vineet_baba} {$artist1} mp3 song download";
            $GLOBALS["cvpqdctt"] = "savePath";
            $hxfiwyri = "song_music";
            $GLOBALS["jxtqjjsdl"] = "filecover";
            ${$GLOBALS["rxwetrjqvjwr"]} = $_POST["artistname_" . ${$GLOBALS["igfumri"]}];
            ${$wdjiuaa} = $_POST["label_" . ${$GLOBALS["igfumri"]}];
            ${$ifnggpo} = $_POST["release_date_" . ${$ouoyrguyoe}];
            $GLOBALS["hgylpmskwny"] = "savePath";
            $GLOBALS["zntvybkha"] = "song_id";
            $pojwuuqhge = "artist";
            $GLOBALS["swxcnyir"] = "trend";
            $nndpidnyrzu = "songthumburl";
            ${$GLOBALS["ahhxvhhwicb"]} = $_POST["music_" . ${$hrrmcccymgy}];
            $GLOBALS["fwlrmdbtmj"] = "savePath";
            ${$GLOBALS["bsqnjmejj"]} = $_POST["lyricswriter_" . ${$GLOBALS["igfumri"]}];
            $khxdwvovuvw = "thumbURL";
            $GLOBALS["quxcqdg"] = "slug";
            ${$GLOBALS["kzgaljfy"]} = $_POST["songthumb_" . ${$GLOBALS["igfumri"]}];
            ${$byurnnsx} = $_POST["dlink_" . ${$GLOBALS["igfumri"]}];
            ${$GLOBALS["kfqphwwvf"]} = ${$GLOBALS["rxwetrjqvjwr"]};
            $GLOBALS["yqqjlpvwk"] = "thumbURL";
            ${$breovvbh} = $_POST["songlyrics_" . ${$GLOBALS["igfumri"]}];
            ${$ocpthopa} = $_POST["songlyrics_" . ${$GLOBALS["zntvybkha"]}];
            ${$GLOBALS["zhnwstpb"]} = $_POST["lyricswriter_" . ${$GLOBALS["igfumri"]}];
            $GLOBALS["bbwrpph"] = "ffmpeg_path";
            $cbqqlhbziw = "cover";
            $GLOBALS["qrhflorby"] = "target_dir2";
            ${$GLOBALS["voxxryt"]} = "";
            if (!empty(${$GLOBALS["tysvnndrgdw"]})) {
                $GLOBALS["nwkddqpfux"] = "lyricsParagraph";
                $GLOBALS["fykqpodbyyu"] = "lyrics";
                $GLOBALS["lflgkztcclt"] = "lyricswriter";
                $lyricsParagraph = "<h1 class=\"primary\">Lyrics - " . ${$GLOBALS["hvgvwxdendgu"]} . "</h1><br><div class=\"lyrics\"><p>" . $lyrics . "</p>";
                $GLOBALS["gpdghfycjw"] = "paragraphs";
                $paragraphs .= ${$GLOBALS["rchgglbhetpq"]};
                if (!empty($lyricswriter)) {
                    $gvfjpgypx = "lyricswriter";
                    $acsejggirpb = "paragraphs";
                    $paragraphs .= "<br><p><b>Writer:</b> " . $lyricswriter . "</p>";
                }
                ${$GLOBALS["voxxryt"]} .= "</div>";
            }
            ${$GLOBALS["quxcqdg"]} = slug(${$GLOBALS["whagprtv"]});
            ${$GLOBALS["fwlrmdbtmj"]} = ${$jvbhakpoq} . "/" . ${$GLOBALS["wxoyyogij"]}["folder"];
            ${$GLOBALS["aytthyqrhnl"]} = rtrim(${$GLOBALS["vtmmetqxn"]}, "/");
            if (!is_dir(${$GLOBALS["aytthyqrhnl"]})) {
                $tmouxgwdej = "mkdir";
                mkdir($mkdir, 0777, true);
            }
            ${$GLOBALS["kosrnopcycfy"]} = "bottom";
            ${$khxdwvovuvw} = ${$nndpidnyrzu};
            $GLOBALS["ofopgt"] = "converted_file_name";
            $ypucwoxq = "command";
            ${$eistdiqtcl} = pathinfo(${$GLOBALS["yqqjlpvwk"]}, PATHINFO_EXTENSION);
            if (${$ylbpqsplgh} && ${$equjkq}) {
                $GLOBALS["tgdnbhcs"] = "w_pos";
                $GLOBALS["enkykqnvjhp"] = "thumbname";
                $GLOBALS["hylirgklchkr"] = "tmp_thumbname";
                $GLOBALS["uuoghuyew"] = "category";
                $GLOBALS["bpvmgocns"] = "saveThumb";
                $sfctmz = "thumbURL";
                $GLOBALS["jehuluci"] = "RootPath";
                $vwtvdgm = "saveThumb";
                $tmp_thumbname = "tmp_thumb." . ${$GLOBALS["nozmqsijtmnj"]};
                $saveThumb = $RootPath . "/" . $category["folder"] . ${$GLOBALS["rhcwhyvy"]};
                file_put_contents(${$GLOBALS["zfzxih"]}, file_get_contents($thumbURL));
                $GLOBALS["fzvyghruz"] = "thumbname";
                $thumbname = uniqid("thumb_");
                genThumb(${$GLOBALS["zfzxih"]}, ${$GLOBALS["vtmmetqxn"]}, $thumbname, $w_pos, true, FILE_THUMB_SIZES);
                unlink($saveThumb);
            } else {
                if (isset($_FILES["thumb"]["name"]) && !empty($_FILES["thumb"]["name"])) {
                    $GLOBALS["gkqefigd"] = "thumbname";
                    $GLOBALS["uxqvuinpn"] = "w_pos";
                    $tunjuoedf = "thumbname";
                    $thumbname = uniqid("thumb_");
                    genThumb($_FILES["thumb"]["tmp_name"], ${$GLOBALS["vtmmetqxn"]}, $thumbname, $w_pos, true, FILE_THUMB_SIZES);
                }
            }
            ${$noddwmv} = "mp3";
            ${$GLOBALS["bbwrpph"]} = "./ffmpeg";
            ${$GLOBALS["hshmjt"]} = basename(${$GLOBALS["olbjxvic"]});
            ${$GLOBALS["vtmmetqxn"]} .= ${$GLOBALS["onpjswwyur"]};
            $rmflvkoo = "target_dir2";
            $wndtvngfd = "dl_link";
            file_put_contents(${$GLOBALS["dvwnhe"]}, file_get_contents($dl_link));
            ${$GLOBALS["vdvsndii"]} = ${$GLOBALS["cvpqdctt"]} . "converted_" . ${$GLOBALS["unqfku"]} . ".mp3";
            ${$GLOBALS["gbijuxycn"]} = "ffmpeg -i \"" . ${$rwlrpujrtdfd} . "\" -y -codec:a libmp3lame -ac 2 -ar 44100 -b:a 128k \"" . ${$GLOBALS["selvsetwui"]} . "\"";
            shell_exec(${$ypucwoxq});
            ${$qywfdyug} = ${$GLOBALS["hgylpmskwny"]} . name_underscore(${$GLOBALS["whagprtv"]} . " - " . ${$GLOBALS["hecdcwfbtl"]}) . "." . ${$tcqxaxher};
            rename(${$GLOBALS["ofopgt"]}, ${$GLOBALS["qrhflorby"]});
            unlink(${$GLOBALS["dvwnhe"]});
            ${$GLOBALS["oecfejltul"]} = array("Title" => ${$GLOBALS["whagprtv"]} . " - " . APP_NAME, "Artist" => ${$GLOBALS["kfqphwwvf"]} ? ${$pojwuuqhge} . " - " . APP_NAME : APP_NAME, "Album" => ${$GLOBALS["lgeepvcu"]}["name"] . "-" . APP_NAME, "Year" => date("Y"), "Genre" => APP_NAME, "Comment" => "Downloaded from APP_NAME");
            ${$GLOBALS["jxtqjjsdl"]} = ${$GLOBALS["wopzqqywqb"]} . "/" . ${$njefedq}["folder"] . MP3TAG_COVER . "/cover_" . ${$GLOBALS["qsfrwnqub"]} . ".jpg";
            ${$GLOBALS["cgqoqmrmk"]} = ${$GLOBALS["wopzqqywqb"]} . "/upload_file/folderthumb/" . MP3TAG_COVER . "/cover_" . pathinfo(${$GLOBALS["lccitldv"]}["thumb"], PATHINFO_FILENAME) . ".jpg";
            $GLOBALS["adxhhewmh"] = "AudioBitrates";
            if (file_exists(${$GLOBALS["eegryskpdbi"]})) {
                ${$GLOBALS["xgzrgwu"]} = ${$GLOBALS["eegryskpdbi"]};
            } else {
                if (file_exists(${$GLOBALS["ompewzeywjf"]})) {
                    ${$GLOBALS["xgzrgwu"]} = ${$GLOBALS["cgqoqmrmk"]};
                }
            }
            if (empty(${$GLOBALS["xgzrgwu"]})) {
                ${$GLOBALS["wopzqqywqb"]} .= "/assets/images/cover.jpg";
            }
            ${$GLOBALS["ijkblcksstc"]} = array();
            if (${$GLOBALS["rchotixrp"]} == 64) {
                $GLOBALS["wrphypi"] = "target_dir2";
                ${$GLOBALS["bcnhicijkjq"]}[] = audioBitrateConvert($target_dir2, 64);
            }
            if (${$GLOBALS["oborpxfnjht"]} == 128) {
                $ooyksoo = "AudioBitrates";
                $AudioBitrates[] = audioBitrateConvert(${$GLOBALS["buuhycvj"]}, 128);
            }
            if (${$GLOBALS["gscobthsy"]} == 192) {
                $subgipkthgd = "target_dir2";
                ${$GLOBALS["bcnhicijkjq"]}[] = audioBitrateConvert($target_dir2, 192);
            }
            if (${$GLOBALS["rrhkbitritc"]} == 320) {
                $mekeplqnb = "AudioBitrates";
                $AudioBitrates[] = audioBitrateConvert(${$GLOBALS["buuhycvj"]}, 320);
            }
            foreach (${$GLOBALS["adxhhewmh"]} as ${$sslsfoei}) {
                $aqkwjmtgt = "Tagdata";
                @WriteTag(${$GLOBALS["ofnevlmshu"]}, ${$GLOBALS["xgzrgwu"]}, $Tagdata);
            }
            if (WriteTag(${$rmflvkoo}, ${$cbqqlhbziw}, ${$zhjfrjtlfowo})) {
                $GLOBALS["yqgnuvorb"] = "tagwriter";
                $tagwriter = true;
            }
            ${$GLOBALS["swxcnyir"]} = mt_rand(0, 1);
            ${$GLOBALS["pvwkdsz"]} = ["name" => ${$GLOBALS["oeohwf"]}, "dname" => basename(${$GLOBALS["pqstjtnwyu"]}), "cid" => ${$GLOBALS["fnbqbze"]}, "slug" => Input("slug") ? Input("slug") : genSlug(${$uuixokps}), "ext" => "mp3", "size" => filesize(${$GLOBALS["qxstyku"]}), "duration" => getDuration(${$GLOBALS["buuhycvj"]}), "artist" => ${$GLOBALS["kfqphwwvf"]}, "lyric" => ${$xfwmhzyk}, "music" => ${$hxfiwyri}, "label" => ${$GLOBALS["hxewpvyn"]}, "thumb" => ${$evausk} ? ${$GLOBALS["dseepawmsn"]} . "." . THUMB_FORMAT : "", "des" => ${$GLOBALS["voxxryt"]}, "download" => 0, "pos" => Input("pos") ? Input("pos") : 0, "newtag" => Input("new_tag") ? 1 : 1, "meta_title" => "", "meta_keyw" => "", "meta_des" => "", "status" => Input("status") ? 1 : 1, "trend" => ${$ugpltege}, "approved_at" => $db->now(), "created_at" => ${$GLOBALS["efxnuwuomj"]} ? ${$GLOBALS["efxnuwuomj"]} : $db->now(), "check_id" => ${$GLOBALS["xxrvgixdd"]}];
            ${$GLOBALS["uxjilikw"]} = $db->insert(TABLE_FILES, ${$GLOBALS["irxubmmarr"]});
            if (${$GLOBALS["egyflml"]}) {
                $xipyknwn = "artist";
                $GLOBALS["veoknbipqgd"] = "parentids";
                genArtist($artist);
                $GLOBALS["yvmibpdnm"] = "parentids";
                $parentids = array_filter(explode("/", ${$GLOBALS["lccitldv"]}["folder"]));
                array_shift($parentids);
                echo "<div class=\"container-fluid\">\n<div class=\"alert alert-success alert-dismissible\">\n<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n<strong>Success!</strong> File Added Successfully.\n</div></div>";
            } else {
                echo "Error inserting record: " . $db->getLastError();
            }
            if (${$GLOBALS["ixektjly"]}) {
                $db->where("id", ${$GLOBALS["mfuraiqxu"]}, "IN")->update(TABLE_CAT, ["totalitem" => $db->inc(1)]);
            }
        }
    } else {
        echo "No category found with the given ID.";
    }
}
echo "<div class=\"container\">\n";
if ($_POST["albumLink"]) {
    $quypplw = "albumlink";
    $GLOBALS["cwvzfgv"] = "url";
    $albumlink = $_POST["albumLink"];
    $url = "https://vineetdev-saavn.vercel.app/albums?link=" . urlencode(${$GLOBALS["sdiuqbturnq"]});
    $GLOBALS["flqsuat"] = "response";
    $response = file_get_contents(${$GLOBALS["xcjtjyu"]});
    $GLOBALS["uwalojyvx"] = "response";
    ${$GLOBALS["irxubmmarr"]} = json_decode($response, true);
    $qanncdexu = "data";
    if ($data["status"] === "SUCCESS") {
        $yvkubxcao = "data";
        $GLOBALS["uurdvqhae"] = "albumYear";
        $wwsrdnrjehb = "songCount";
        $zldpjiqi = "categoryeaxi";
        $cthwqkx = "songCount";
        $GLOBALS["tjrxxrjwpfid"] = "albumName";
        $kvwlgihe = "data";
        $fzieukpbny = "albumId";
        ${$GLOBALS["yremrhxbb"]} = $data["data"]["id"];
        ${$GLOBALS["tjrxxrjwpfid"]} = ${$kvwlgihe}["data"]["name"];
        $mgvijbht = "data";
        $GLOBALS["vywnvvyojwvn"] = "albumId";
        ${$GLOBALS["uurdvqhae"]} = ${$GLOBALS["irxubmmarr"]}["data"]["year"];
        $GLOBALS["ueqpvbkby"] = "categoryeaxi";
        $GLOBALS["fchepvisf"] = "albumImage";
        ${$wwsrdnrjehb} = ${$GLOBALS["irxubmmarr"]}["data"]["songCount"];
        $qrtbklsuhy = "albumImage";
        ${$GLOBALS["joetkkgcoy"]} = ${$GLOBALS["irxubmmarr"]}["data"]["primaryArtistsId"];
        ${$GLOBALS["suldwvrc"]} = ${$mgvijbht}["data"]["image"][2]["link"];
        $GLOBALS["mzblgkuofls"] = "primaryArtistsId";
        ${$qrtbklsuhy} = str_replace("http://", "https://", ${$GLOBALS["fchepvisf"]});
        echo "<div class=\"table-responsive\"><table class=\"table table-bordered table-striped\">\n<thead class=\"thead-dark\">\n<tr>\n<th>ID</th>\n<th>Thumbnail</th>\n<th>Title</th>\n<th>Artist</th>\n<th>Song Count</th>\n<th>Year</th>\n<th>Action</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td>" . ${$GLOBALS["yremrhxbb"]} . "</td>\n<td><img src=\"" . ${$GLOBALS["suldwvrc"]} . "\" alt=\"Album Thumbnail\" width=\"100\"></td>\n<td>" . ${$GLOBALS["zbfaeompgu"]} . "</td>\n<td>" . ${$GLOBALS["mzblgkuofls"]} . "</td>\n<td>" . ${$cthwqkx} . "</td>\n<td>" . ${$GLOBALS["rpdixmsic"]} . "</td>\n<td>\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"albumId\" id=\"albumId\" value=\"" . ${$fzieukpbny} . "\" required>\n<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n</form>";
        $db->where("albumuqid", ${$GLOBALS["vywnvvyojwvn"]});
        ${$zldpjiqi} = $db->has("category");
        if (${$GLOBALS["ueqpvbkby"]} == ${$GLOBALS["yremrhxbb"]}) {
            echo "<br>Folder Exist";
        }
        echo "</td>\n</tr>\n</tbody>\n</table></div>";
    } else {
        $GLOBALS["igvyblgune"] = "data";
        $exdcrxgo = "errorMessage";
        ${$GLOBALS["bloxefxtxh"]} = $data["message"];
        echo "API Error: " . ${$exdcrxgo} . "\n";
    }
}
echo "</div>\n";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $wqjnwvpyrxit = "limit";
    ${$GLOBALS["jdyvhfbmdv"]} = $_POST["playlistkeyword"];
    $hdscodlvwec = "limit";
    $GLOBALS["dwltmvjj"] = "results";
    $bgcyrhba = "apiUrl";
    $GLOBALS["gwtpquxnop"] = "response";
    ${$GLOBALS["sofsggtkji"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    $GLOBALS["ajqmbfszw"] = "page";
    $GLOBALS["wwfqwvog"] = "data";
    ${$wqjnwvpyrxit} = 10;
    ${$bgcyrhba} = "https://vineetdev-saavn.vercel.app/search/playlists?query=" . urlencode(${$GLOBALS["jdyvhfbmdv"]}) . "&page=" . ${$GLOBALS["ajqmbfszw"]} . "&limit=" . ${$hdscodlvwec};
    ${$GLOBALS["gwtpquxnop"]} = file_get_contents(${$GLOBALS["nekfclogla"]});
    ${$GLOBALS["irxubmmarr"]} = json_decode(${$GLOBALS["vxfmjih"]}, true);
    ${$GLOBALS["dwltmvjj"]} = ${$GLOBALS["irxubmmarr"]}["data"]["results"];
    $GLOBALS["xqxjsfu"] = "totalResults";
    $totalResults = ${$GLOBALS["wwfqwvog"]}["data"]["total"];
}
$hnwxoryxb = "rk";
$GLOBALS["unpnkudp"] = "results";
if ($_SERVER["REQUEST_METHOD"] === "POST" && $results) {
    echo "</div> \n<div class=\"mt-5\">\n<div class=\"card mb-3\">\n<h3 class=\"card-header\">Total Playlist: ";
    $GLOBALS["dggpzv"] = "currentPage";
    $GLOBALS["hfjahoafamax"] = "result";
    $GLOBALS["breldoaro"] = "currentPage";
    $nefuirmagi = "prevPage";
    $GLOBALS["ndiotpvw"] = "results";
    echo ${$GLOBALS["hytswowbool"]};
    echo "</h3>\n<div class=\"table-responsive\">\n<table class=\"table table-bordered table-striped\">\n<thead class=\"thead-dark\">\n<tr>\n<th>ID</th>\n<th>Name</th>\n<th>Year</th>\n<th>Language</th>\n<th>Song Count</th>\n<th>Artists</th>\n<th>Album Image</th>\n<th>Action</th>\n</tr>\n</thead>\n<tbody>\n";
    $GLOBALS["kuxxbouwnrlq"] = "totalResults";
    foreach ($results as $result) {
        $frtyhxhgfwr = "result";
        $zdeoldih = "result";
        $GLOBALS["xcrqprg"] = "result";
        $GLOBALS["msmlmrk"] = "result";
        $GLOBALS["qxbqmdbk"] = "result";
        echo "<tr>\n<td>";
        $GLOBALS["nvateyewesio"] = "result";
        $fzhcpburdigq = "result";
        echo $result["id"];
        echo "</td>\n<td>";
        $rhhpvwcjwg = "result";
        echo $result["name"];
        echo "</td>\n<td>";
        echo $result["year"];
        echo "</td>\n<td>";
        echo $result["language"];
        echo "</td>\n<td>";
        echo ${$GLOBALS["lyumomtr"]}["songCount"];
        echo "</td>\n<td>\n";
        foreach ($result["primaryArtists"] as ${$GLOBALS["kfqphwwvf"]}) {
            echo "<a href=\"";
            $qsalseod = "artist";
            echo $artist["url"];
            echo "\">";
            echo ${$GLOBALS["kfqphwwvf"]}["name"];
            echo "</a><br>\n";
        }
        echo "</td>\n<td>\n<img src=\"";
        ${$GLOBALS["flygigqdrsml"]} = ${$zdeoldih}["image"][2]["link"];
        echo ${$GLOBALS["flygigqdrsml"]} = str_replace("http://", "https://", ${$GLOBALS["flygigqdrsml"]});
        echo "\" alt=\"";
        echo ${$GLOBALS["xcrqprg"]}["name"];
        echo "\" width=\"100\">\n</td>\n<td>\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"playlistID\" id=\"playlistID\" value=\"";
        echo ${$GLOBALS["lyumomtr"]}["id"];
        $lwkdgpn = "categoryeaxi";
        echo "\" required>\n<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n</form>\n";
        $db->where("albumuqid", ${$GLOBALS["lyumomtr"]}["id"]);
        $categoryeaxi = $db->has("category");
        if (${$GLOBALS["xmduhjly"]} == ${$GLOBALS["qxbqmdbk"]}["id"]) {
            echo "<br>Folder Exist";
        }
        echo "</td>\n</tr>\n";
    }
    $GLOBALS["hkeswjdmkv"] = "currentPage";
    echo "</tbody>\n</table>\n</div>\n</div>\n</div>\n<div class=\"row\">\n<div class=\"col-md-12\">\n<ul class=\"pagination\">\n";
    ${$GLOBALS["breldoaro"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$GLOBALS["gcutjhgted"]} = ceil(${$GLOBALS["kuxxbouwnrlq"]} / ${$GLOBALS["eallrktjnuw"]});
    $GLOBALS["eqlvjjidbdf"] = "nextPage";
    ${$GLOBALS["pxyhcibcds"]} -= 1;
    ${$GLOBALS["pxyhcibcds"]} += 1;
    $GLOBALS["rjuhwevb"] = "totalPages";
    if (${$GLOBALS["hkeswjdmkv"]} > 1) {
        $aqnhco = "keyword";
        echo "<li class=\"page-item\">\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"playlistkeyword\" value=\"";
        echo $keyword;
        echo "\">\n<input type=\"hidden\" name=\"page\" value=\"";
        echo ${$GLOBALS["shmxaf"]};
        echo "\">\n<button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Previous";
        echo "</button>\n</form>\n</li>\n";
    }
    if (${$GLOBALS["dggpzv"]} < ${$GLOBALS["rjuhwevb"]}) {
        echo "<li class=\"page-item\">\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"playlistkeyword\" value=\"";
        $GLOBALS["okqxfsacbl"] = "nextPage";
        echo ${$GLOBALS["jdyvhfbmdv"]};
        echo "\">\n<input type=\"hidden\" name=\"page\" value=\"";
        echo $nextPage;
        echo "\">\n<button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Next";
        echo "</button>\n</form>\n</li>\n";
    }
    echo "</ul>\n</div>\n</div>\n";
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vnneybvnsicx = "apiUrl";
    $gyxxicnrbvr = "page";
    $GLOBALS["sqzvdewhxrym"] = "limit";
    ${$GLOBALS["jdyvhfbmdv"]} = $_POST["albumkeyword"];
    $iounxaqqc = "data";
    $vqtktr = "keyword";
    $thrnajpk = "limit";
    $GLOBALS["dlbelxidvaj"] = "page";
    $page = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$GLOBALS["sqzvdewhxrym"]} = 10;
    ${$vnneybvnsicx} = "https://vineetdev-saavn.vercel.app/search/albums?query=" . urlencode(${$vqtktr}) . "&page=" . ${$gyxxicnrbvr} . "&limit=" . ${$thrnajpk};
    $GLOBALS["apfrcdqdqscc"] = "results";
    ${$GLOBALS["vxfmjih"]} = file_get_contents(${$GLOBALS["nekfclogla"]});
    ${$iounxaqqc} = json_decode(${$GLOBALS["vxfmjih"]}, true);
    ${$GLOBALS["apfrcdqdqscc"]} = ${$GLOBALS["irxubmmarr"]}["data"]["results"];
    ${$GLOBALS["hytswowbool"]} = ${$GLOBALS["irxubmmarr"]}["data"]["total"];
}
echo "\n</div>\n\n<div class=\"mt-5\">\n\n";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ${$ljueklq}) {
    $GLOBALS["tmkumfzxaf"] = "limit";
    $nwqxgditt = "totalPages";
    $yyxtibpjff = "currentPage";
    echo "<div class=\"card mb-3\">\n<h3 class=\"card-header\">Total Albums: ";
    echo ${$GLOBALS["ijvrlt"]};
    $GLOBALS["ehlfrnpyr"] = "results";
    echo "</h3>\n<div class=\"table-responsive\">\n<table class=\"table table-bordered table-striped\">\n<thead class=\"thead-dark\">\n<tr>\n<th>ID</th>\n<th>Name</th>\n<th>Year</th>\n<th>Language</th>\n<th>Song Count</th>\n<th>Artists</th>\n<th>Album Image</th>\n<th>Action</th>\n</tr>\n</thead>\n<tbody>\n";
    foreach ($results as ${$GLOBALS["lyumomtr"]}) {
        $GLOBALS["rlmhuvy"] = "result";
        echo "<tr>\n<td>";
        echo ${$GLOBALS["lyumomtr"]}["id"];
        echo "</td>\n<td>";
        $GLOBALS["ijvyqw"] = "categoryeaxi";
        echo ${$GLOBALS["lyumomtr"]}["name"];
        $fpfhyq = "result";
        $GLOBALS["tmytssz"] = "result";
        echo "</td>\n<td>";
        echo $result["year"];
        echo "</td>\n<td>";
        echo $result["language"];
        echo "</td>\n<td>";
        $vdgsnbwn = "img";
        echo $result["songCount"];
        echo "</td>\n<td>\n";
        $GLOBALS["tjkrejty"] = "result";
        foreach (${$GLOBALS["lyumomtr"]}["primaryArtists"] as ${$GLOBALS["kfqphwwvf"]}) {
            $GLOBALS["qkzxzacw"] = "artist";
            echo "<a href=\"";
            echo $artist["url"];
            echo "\">";
            $GLOBALS["ecckbcs"] = "artist";
            echo $artist["name"];
            echo "</a><br>\n";
        }
        echo "</td>\n<td>\n<img src=\"";
        ${$GLOBALS["flygigqdrsml"]} = ${$GLOBALS["lyumomtr"]}["image"][2]["link"];
        $jxljrqgmlmv = "img";
        echo ${$vdgsnbwn} = str_replace("http://", "https://", $img);
        echo "\" alt=\"";
        $GLOBALS["yjtvtihx"] = "result";
        echo $result["name"];
        echo "\" width=\"100\">\n</td>\n<td>\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"albumId\" id=\"albumId\" value=\"";
        echo ${$GLOBALS["lyumomtr"]}["id"];
        $GLOBALS["fappvsthu"] = "result";
        echo "\" required>\n<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n</form>\n";
        $db->where("albumuqid", ${$GLOBALS["tjkrejty"]}["id"]);
        ${$GLOBALS["ijvyqw"]} = $db->has("category");
        if (${$GLOBALS["xmduhjly"]} == ${$GLOBALS["fappvsthu"]}["id"]) {
            echo "<br>Folder Exist";
        }
        echo "\n\n</td>\n</tr>\n";
    }
    echo "</tbody>\n</table>\n</div>\n</div>\n</div>\n<div class=\"row\">\n<div class=\"col-md-12\">\n<ul class=\"pagination\">\n";
    ${$GLOBALS["pxyhcibcds"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$GLOBALS["gcutjhgted"]} = ceil(${$GLOBALS["hytswowbool"]} / ${$GLOBALS["tmkumfzxaf"]});
    ${$GLOBALS["pxyhcibcds"]} -= 1;
    ${$GLOBALS["pxyhcibcds"]} += 1;
    if (${$yyxtibpjff} > 1) {
        echo "<li class=\"page-item\">\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"albumkeyword\" value=\"";
        echo ${$GLOBALS["jdyvhfbmdv"]};
        $sywswtl = "prevPage";
        echo "\">\n<input type=\"hidden\" name=\"page\" value=\"";
        echo $prevPage;
        echo "\">\n<button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Previous";
        echo "</button>\n</form>\n</li>\n";
    }
    if (${$GLOBALS["pxyhcibcds"]} < ${$nwqxgditt}) {
        echo "<li class=\"page-item\">\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"albumkeyword\" value=\"";
        echo ${$GLOBALS["jdyvhfbmdv"]};
        echo "\">\n<input type=\"hidden\" name=\"page\" value=\"";
        echo ${$GLOBALS["kaevhxdsnyi"]};
        echo "\">\n<button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Next";
        echo "</button>\n</form>\n</li>\n";
    }
    echo "</ul>\n</div>\n";
}
echo "\n\n";
if (isset($_POST["artistLink"])) {
    ${$GLOBALS["nekfclogla"]} = "https://vineetdev-saavn.vercel.app/artists?link=" . urlencode($_POST["artistLink"]);
    $GLOBALS["dknpffu"] = "response";
    $rzmimbc = "data";
    $gqpjropku = "apiUrl";
    ${$GLOBALS["vxfmjih"]} = file_get_contents($apiUrl);
    ${$rzmimbc} = json_decode(${$GLOBALS["dknpffu"]}, true);
    if (${$GLOBALS["irxubmmarr"]}["status"] === "SUCCESS") {
        $GLOBALS["aqrioplfiel"] = "artist";
        $GLOBALS["wgimwlym"] = "artist";
        $GLOBALS["hjvnobwwem"] = "artist";
        $GLOBALS["bfcohqes"] = "image";
        $artist = ${$GLOBALS["irxubmmarr"]}["data"];
        echo "</div>\n\n<div class=\"card\">\n<div class=\"card-body\">\n\n<div class=\"mt-4\">\n<div class=\"text-center mb-4\">\n";
        $GLOBALS["svcazfsnrq"] = "artist";
        foreach ($artist["image"] as $image) {
            if (${$GLOBALS["kuojbcf"]}["quality"] === "500x500") {
                echo "<img src=\"";
                echo ${$GLOBALS["kuojbcf"]}["link"];
                echo "\" alt=\"Artist Image\" class=\"img-thumbnail\" width=\"200\" height=\"200\">\n";
                break;
            }
        }
        echo "</div>\n<table class=\"table\">\n<thead>\n<tr>\n<th>Attribute</th>\n<th>Value</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td>Name</td>\n<td>";
        echo ${$GLOBALS["kfqphwwvf"]}["name"];
        echo "</td>\n</tr>\n<tr>\n<td>Dominant Language</td>\n<td>";
        echo ${$GLOBALS["svcazfsnrq"]}["dominantLanguage"];
        echo "</td>\n</tr>\n<tr>\n<td>Date of Birth</td>\n<td>";
        echo ${$GLOBALS["kfqphwwvf"]}["dob"];
        echo "</td>\n</tr>\n<tr>\n<td>Available Languages</td>\n<td>";
        echo implode(", ", ${$GLOBALS["wgimwlym"]}["availableLanguages"]);
        echo "</td>\n</tr>\n</tbody>\n</table>\n</div></div>\n";
    } else {
        echo "<div class=\"mt-4\"><p>No artist found.</p></div>";
    }
}
echo "\n";
if (isset($_POST["artistLink"])) {
    $mwmunzc = "artist";
    echo "<div class=\"text-center mt-4\">\n<div class=\"row\">\n<div class=\"col-md-6 mb-3\">\n<form method=\"POST\">\n<input type=\"hidden\" id=\"artistId\" name=\"artistId\" value=\"";
    echo ${$GLOBALS["kfqphwwvf"]}["id"];
    $vwvucdde = "artist";
    echo "\" required>\n<button type=\"submit\" class=\"btn btn-danger btn-block btn-sm\">Get Artist All Songs</button>\n</form>\n</div>\n<div class=\"col-md-6 mb-3\">\n<form method=\"POST\">\n<input type=\"hidden\" name=\"album\" id=\"album\" value=\"";
    echo $artist["id"];
    echo "\" required>\n<button type=\"submit\" class=\"btn btn-success btn-block btn-sm\">Get Artist All Albums</button>\n</form>\n</div>\n<div class=\"col-12 text-center\">\n\n<form id=\"add-artist-form\">\n<div class=\"form-group\">\n<input type=\"hidden\" name=\"title\" id=\"artist_name\" required value=\"";
    echo $artist["name"];
    echo "\" class=\"form-control mobile-input\">\n</div>\n<input type=\"hidden\" name=\"a_check_id\" value=\"";
    echo ${$GLOBALS["kfqphwwvf"]}["id"];
    echo "\">\n<input type=\"hidden\" name=\"meta_title\" value=\"\">\n<input type=\"hidden\" name=\"meta_keyw\" value=\"\">\n<input type=\"hidden\" name=\"meta_des\" value=\"\">\n<input type=\"hidden\" name=\"thumb_url\" value=\"";
    echo ${$GLOBALS["kuojbcf"]}["link"];
    echo "\">\n<input type=\"hidden\" name=\"id\" id=\"id\" value=\"\" />\n<input type=\"hidden\" name=\"submit\" id=\"action\" value=\"create\" />\n<button type=\"submit\" class=\"btn btn-primary btn-block btn-sm\">Add Artist</button>\n</form>\n</div>\n</div>\n</div>\n";
}
$zbueocq = "limit";
echo "\n\n";
if (isset($_POST["artistId"])) {
    $GLOBALS["utvdthitc"] = "artistId";
    $qhkitfhmsvmd = "data";
    $GLOBALS["hbycoudxoh"] = "songs";
    $mpvwfgt = "page";
    $hjqlghdgrwcc = "response";
    $artistId = $_POST["artistId"];
    $hrhqstdhwfk = "apiUrl";
    $page = isset($_POST["page"]) ? $_POST["page"] : 1;
    $GLOBALS["mqpknrp"] = "data";
    $dypreo = "totalPages";
    $apiUrl = "https://vineetdev-saavn.vercel.app/artists/{$artistId}/songs?page={$page}";
    $response = file_get_contents(${$GLOBALS["nekfclogla"]});
    $data = json_decode(${$GLOBALS["vxfmjih"]}, true);
    $GLOBALS["krbamnl"] = "song";
    ${$GLOBALS["unbhiiwgi"]} = $data["data"]["results"];
    $fvhwsgsutvc = "data";
    $GLOBALS["fhmhnsbkus"] = "categorylist";
    echo "</div> \n<form method=\"POST\" action=\"\">\n<div class=\"mt-5\">\n<div class=\"card mb-3\">\n<div class=\"table-responsive\">\n<table class=\"table table-bordered table-striped\">\n<thead class=\"thead-dark\">\n<tr>\n<th class=\"select-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" style=\"width: 1px;\" aria-label=\"\">\n<input type=\"checkbox\" id=\"checkAllVideos\" onclick=\"toggleAllVideos(this);\">\n</th>\n<th>Bitrate</th>\n<th>Thumb</th>\n<th>Song Title, Song Artist, Song Music</th>\n<th>Song Label, Song lyrics, Song Date</th>\n</tr>\n</thead>\n<tbody>\n";
    foreach (${$GLOBALS["hbycoudxoh"]} as ${$GLOBALS["krbamnl"]}) {
        $GLOBALS["jzccuubwqs"] = "song";
        $hqdluxgc = "song";
        echo "<tr>\n";
        $db->where("check_id", $song["id"]);
        ${$GLOBALS["bnqfwfgix"]} = $db->has("file");
        $cfruznmv = "song";
        $wphwhqwyubw = "song";
        $GLOBALS["fsdrrvtkufv"] = "song";
        if (${$GLOBALS["bnqfwfgix"]} == ${$GLOBALS["ldqhhh"]}["id"]) {
            echo "<td> </td>";
        } else {
            echo "<td><input type=\"checkbox\" class=\"video-checkbox\" name=\"id[]\" value=\"" . ${$GLOBALS["ldqhhh"]}["id"] . "\"></td>";
        }
        $GLOBALS["ycucvu"] = "song";
        $GLOBALS["woqeppotj"] = "song";
        $lmdjkihto = "song";
        $oqxyvepn = "song";
        echo "<td>\n  <div class=\"container\">\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_64_";
        echo ${$cfruznmv}["id"];
        echo "\" id=\"bitrate_64\" value=\"64\">\n          <label class=\"form-check-label\" for=\"bitrate_64\">64</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_128_";
        $qevwcgnog = "data";
        echo $song["id"];
        echo "\" id=\"bitrate_128\" value=\"128\">\n          <label class=\"form-check-label\" for=\"bitrate_128\">128</label>\n        </div>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_192_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        $lemofwzok = "today";
        echo "\" id=\"bitrate_192\" value=\"192\">\n          <label class=\"form-check-label\" for=\"bitrate_192\">192</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_320_";
        echo $song["id"];
        echo "\" id=\"bitrate_320\" value=\"320\">\n          <label class=\"form-check-label\" for=\"bitrate_320\">320</label>\n        </div>\n      </div>\n    </div>\n  </div>\n</td>\n\n";
        ${$GLOBALS["nfuvapdlb"]} = "";
        foreach (${$GLOBALS["ldqhhh"]}["image"] as ${$GLOBALS["kuojbcf"]}) {
            $dpfduofh = "image";
            if ($image["quality"] === "500x500") {
                $GLOBALS["nkbbjse"] = "image";
                ${$GLOBALS["frckydhgok"]} = str_replace("http://", "https://", $image["link"]);
                $dmmbzoapftb = "imageUrl";
                $imageUrl = ${$GLOBALS["frckydhgok"]};
                break;
            }
        }
        if (!empty(${$GLOBALS["nfuvapdlb"]})) {
            echo "<td><img src=\"";
            echo ${$GLOBALS["nfuvapdlb"]};
            echo "\" alt=\"Song Image (500x500)\" class=\"img-fluid\" style=\"max-width: 80px;\"></td>\n";
        } else {
            echo "<td>Image not available.</td>\n";
        }
        echo "\n\n\n<input type=\"hidden\" name=\"songthumb_";
        $ckmckkuep = "song";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        $nvizspp = "writers";
        echo "\" value=\"";
        $GLOBALS["fibixkdt"] = "song";
        $GLOBALS["fzhxtlqiqj"] = "songId";
        echo ${$GLOBALS["kuojbcf"]}["link"];
        echo "\">\n\n<td>\n  <div class=\"form-group\">\n    <label for=\"titlename_";
        echo ${$lmdjkihto}["id"];
        $pcacgfyqxf = "data";
        echo "\">Song Name</label>\n    <input type=\"text\" name=\"titlename_";
        echo $song["id"];
        echo "\" value=\"";
        $GLOBALS["tbkiisvkmd"] = "url";
        echo ${$GLOBALS["ldqhhh"]}["name"];
        echo "\" class=\"form-control mobile-input\" style=\"max-width: 80px;\">\n  </div>\n  <div class=\"form-group\">\n    <label for=\"artistname_";
        echo ${$oqxyvepn}["id"];
        echo "\">Song Artist</label>\n    <input type=\"text\" name=\"artistname_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        $tkpxxhqtqdv = "song";
        echo "\" value=\"";
        echo ${$GLOBALS["ldqhhh"]}["primaryArtists"];
        echo "\" class=\"form-control mobile-input\" placeholder=\"Artist\">\n  </div>\n  \n    ";
        ${$GLOBALS["psqcbnocvl"]} = ${$GLOBALS["jzccuubwqs"]}["id"];
        ${$GLOBALS["xcjtjyu"]} = "http://maxsecurehost.in/apiv2/jio/lyrics.php?id=" . urlencode(${$GLOBALS["fzhxtlqiqj"]});
        ${$pcacgfyqxf} = json_decode(file_get_contents(${$GLOBALS["tbkiisvkmd"]}), true);
        $GLOBALS["jdahqgej"] = "song";
        ${$GLOBALS["qpuqllwtz"]} = ${$qevwcgnog}["snippet"];
        $GLOBALS["vpuqvwi"] = "data";
        ${$GLOBALS["tysvnndrgdw"]} = $data["lyrics"];
        ${$nvizspp} = ${$GLOBALS["irxubmmarr"]}["writers"];
        $GLOBALS["zejuobspjw"] = "song";
        $GLOBALS["qjbkqbm"] = "album";
        echo "  <div class=\"form-group\">\n    <label for=\"lyricswriter_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        echo "\">Song Writer</label>\n    <input type=\"text\" class=\"form-control mobile-input\" name=\"lyricswriter_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        echo "\" value=\"";
        echo htmlspecialchars(${$GLOBALS["uhifovjwj"]});
        echo "\" placeholder=\"Lyrics\">\n  </div>\n\n</td>\n\n";
        echo "<input type=\"hidden\" name=\"lang\" value=\"";
        echo ${$tkpxxhqtqdv}["language"];
        echo "\">\n<input type=\"hidden\" name=\"album_name\" value=\"";
        echo $album["name"];
        echo "\">\n\n\n<td>\n      <div class=\"form-group\">\n    <label for=\"music_";
        echo ${$ckmckkuep}["id"];
        echo "\">Song Music</label>\n    <input type=\"text\" name=\"music_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        echo "\" class=\"form-control mobile-input\" placeholder=\"Music\">\n  </div>\n  \n  \n  <div class=\"form-group\">\n    <label for=\"label_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        echo "\">Song Label</label>\n    <input type=\"text\" name=\"label_";
        echo ${$wphwhqwyubw}["id"];
        echo "\" value=\"";
        echo $song["label"];
        echo "\" class=\"form-control mobile-input\" placeholder=\"Label\">\n  </div>\n\n\n\n\n  ";
        ${$GLOBALS["vyollye"]} = ${$GLOBALS["ldqhhh"]}["year"];
        ${$lemofwzok} = date("Y-m-d");
        ${$GLOBALS["hhqatntd"]} = date("{$year}-m-d", strtotime(${$GLOBALS["yxniutccjgv"]}));
        echo "  <div class=\"form-group\">\n    <label for=\"release_date_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        echo "\">Release Date</label>\n    <input type=\"date\" value=\"";
        echo ${$GLOBALS["hhqatntd"]};
        echo "\" class=\"form-control mobile-input\" name=\"release_date_";
        echo ${$GLOBALS["ldqhhh"]}["id"];
        echo "\" id=\"release_date\">\n  </div>\n</td>\n\n";
        echo "\n<input type=\"hidden\" name=\"songlyricstruefalase\" value=\"";
        echo ${$GLOBALS["fsdrrvtkufv"]}["hasLyrics"];
        echo "\">\n<input type=\"hidden\" name=\"lang\" value=\"";
        $wgxxoitv = "downloadLink";
        echo ${$GLOBALS["ldqhhh"]}["language"];
        echo "\">\n<input type=\"hidden\" name=\"album_name\" value=\"";
        echo ${$GLOBALS["odhsndlj"]}["name"];
        echo "\">\n\n<input type=\"hidden\" name=\"step2\" value=\"2\">\n";
        $downloadLink = null;
        foreach (${$GLOBALS["ldqhhh"]}["downloadUrl"] as ${$GLOBALS["awdlhndooka"]}) {
            $GLOBALS["bnuwhdcku"] = "download";
            $lpgfxpv = "download";
            if ($download["quality"] === "320kbps") {
                $GLOBALS["fdkuivegv"] = "downloadLink";
                $downloadLink = ${$GLOBALS["awdlhndooka"]}["link"];
                break;
            } elseif ($download["quality"] === "160kbps") {
                $GLOBALS["tycexofwdw"] = "download";
                ${$GLOBALS["tgrplugwtyn"]} = $download["link"];
            }
        }
        if (${$GLOBALS["tgrplugwtyn"]}) {
            $GLOBALS["yeotknexq"] = "downloadLink";
            echo "<input type=\"hidden\" name=\"dlink_" . ${$GLOBALS["ldqhhh"]}["id"] . "\" value=\"" . $downloadLink . "\">";
        }
        if (${$GLOBALS["jdahqgej"]}["hasLyrics"] == true) {
        } else {
        }
        echo "\n</tr>\n";
    }
    echo "\n</tbody>\n</table>\n</div>\n</div>\n</div>\n<div class=\"card\">\n<div class=\"card-body\">\n<div class=\"row\">\n<div class=\"col-sm-6\">\n<label for=\"title\">Select category</label>\n";
    ${$GLOBALS["fhmhnsbkus"]} = $db->orderBy("id", "desc")->get("category");
    $jgvvbvue = "page";
    if ($db->count > 0) {
        $GLOBALS["vwpkcbllir"] = "categorylist";
        echo "<div class=\"select-wrapper\">";
        echo "<select name=\"cid\" id=\"category-select\" class=\"form-select\">";
        echo "<option value=\"\" disabled selected>Select Category</option>";
        foreach ($categorylist as ${$GLOBALS["mchliudnuxl"]}) {
            $xhnishei = "row";
            echo "<option value=\"" . ${$GLOBALS["mchliudnuxl"]}["id"] . "\"";
            $qujbwwx = "cat_id";
            if ($cat_id == ${$GLOBALS["mchliudnuxl"]}["id"]) {
                echo " selected";
            }
            echo ">" . ucwords(${$xhnishei}["name"]) . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }
    echo "</div>\n<div class=\"col-sm-6 text-sm-end text-center mt-2 mt-sm-0\">\n<button id=\"submit-selected\" type=\"submit\" class=\"btn btn-primary btn-lg\">\n<i class=\"fa fa-upload\"></i> Upload\n</button>\n</div>\n</div>\n</div>\n</div>\n</form>\n";
    ${$dypreo} = ${$fvhwsgsutvc}["data"]["lastPage"] ? ${$GLOBALS["sofsggtkji"]} : ${$jgvvbvue} + 1;
    echo "<div class=\"card\">";
    echo "<div class=\"card-body\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col text-center\">";
    if (${$GLOBALS["sofsggtkji"]} > 1) {
        $GLOBALS["orutncbbc"] = "page";
        $GLOBALS["hwnhpnnwo"] = "artistId";
        echo "<form class=\"d-inline-block\" method=\"POST\" style=\"display: inline-block;\">";
        echo "<input type=\"hidden\" name=\"artistId\" value=\"" . $artistId . "\">";
        echo "<input type=\"hidden\" name=\"page\" value=\"" . ($page - 1) . "\">";
        echo "<button type=\"submit\" class=\"btn btn-primary\">Previous</button>";
        echo "</form>";
    }
    echo "</div>";
    echo "<div class=\"col text-center\">";
    if (!${$GLOBALS["irxubmmarr"]}["data"]["lastPage"]) {
        echo "<form class=\"d-inline-block\" method=\"POST\" style=\"display: inline-block;\">";
        echo "<input type=\"hidden\" name=\"artistId\" value=\"" . ${$GLOBALS["lgywpehchwg"]} . "\">";
        echo "<input type=\"hidden\" name=\"page\" value=\"" . (${$GLOBALS["sofsggtkji"]} + 1) . "\">";
        echo "<button type=\"submit\" class=\"btn btn-primary\">Next</button>";
        echo "</form>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
echo "\n";
if (isset($_POST["album"])) {
    $GLOBALS["wdezoalufw"] = "album";
    $album = $_POST["album"];
    $hghpoixwbey = "page";
    $GLOBALS["oetdnrvrbwlo"] = "response";
    $page = isset($_POST["page"]) ? $_POST["page"] : 1;
    $GLOBALS["eyrqqffvtgch"] = "url";
    $GLOBALS["jfcxbw"] = "data";
    ${$GLOBALS["xcjtjyu"]} = "https://vineetdev-saavn.vercel.app/artists/{$album}/albums?page={$page}";
    ${$GLOBALS["vxfmjih"]} = file_get_contents(${$GLOBALS["eyrqqffvtgch"]});
    ${$GLOBALS["irxubmmarr"]} = json_decode(${$GLOBALS["oetdnrvrbwlo"]}, true);
    if (${$GLOBALS["jfcxbw"]}["status"] == "SUCCESS") {
        $GLOBALS["oqyqvbqiqg"] = "result";
        $GLOBALS["cphuuxqp"] = "results";
        ${$GLOBALS["ijvrlt"]} = ${$GLOBALS["irxubmmarr"]}["data"]["total"];
        $GLOBALS["vnflfxp"] = "album";
        $thkjvhcbt = "data";
        ${$GLOBALS["cphuuxqp"]} = $data["data"]["results"];
        echo "             </div> \n\n<div class=\"mt-5\">\n<div class=\"card mb-3\">\n<h3 class=\"card-header\">Total Aldbums: ";
        $GLOBALS["vzrjddxob"] = "page";
        $ecycoumpsuw = "album";
        echo ${$GLOBALS["ijvrlt"]};
        $gevwtvdwmxse = "page";
        echo "</h3>\n<div class=\"table-responsive\">\n<table class=\"table table-bordered table-striped\">\n<thead class=\"thead-dark\">\n<tr>\n<th>Name</th>\n<th>Year</th>\n<th>Language</th>\n<th>Count</th>\n<th>Artist</th>\n<th>Album Image</th>\n<th>Action</th>\n</tr>\n</thead>\n<tbody>\n";
        $GLOBALS["vlndtlh"] = "page";
        $GLOBALS["qefxwhpsaqoj"] = "results";
        foreach ($results as ${$GLOBALS["oqyqvbqiqg"]}) {
            $GLOBALS["qoiwmx"] = "result";
            $GLOBALS["odmeiowqgz"] = "language";
            $fdjlxtwybk = "result";
            $jzxzue = "result";
            $GLOBALS["vdrjfjv"] = "type";
            $GLOBALS["vmkmlzfg"] = "year";
            $ieslwnb = "language";
            $gwvjgof = "id";
            $GLOBALS["tuvhplnvido"] = "albumUrl";
            $kiosxhvj = "year";
            $id = $result["id"];
            ${$GLOBALS["srwssskaqfjo"]} = $result["name"];
            ${$kiosxhvj} = ${$GLOBALS["lyumomtr"]}["year"];
            ${$GLOBALS["vdrjfjv"]} = ${$jzxzue}["type"];
            $GLOBALS["qxxwyeis"] = "result";
            ${$GLOBALS["odmeiowqgz"]} = $result["language"];
            ${$GLOBALS["fkfqzyw"]} = ${$GLOBALS["lyumomtr"]}["songCount"];
            ${$GLOBALS["tuvhplnvido"]} = ${$GLOBALS["lyumomtr"]}["url"];
            echo "\n<tr>\n<td><a href='";
            echo ${$GLOBALS["irmbrhkfyeee"]};
            echo "' target='_blank'>";
            echo ${$GLOBALS["srwssskaqfjo"]};
            echo "</a></td>\n<td>";
            echo ${$GLOBALS["vmkmlzfg"]};
            echo "</td>\n<td>";
            $GLOBALS["gyhkmiuwbo"] = "id";
            echo ${$ieslwnb};
            echo "</td>\n<td>";
            echo ${$GLOBALS["fkfqzyw"]};
            echo "</td>\n<td>\n";
            foreach (${$GLOBALS["lyumomtr"]}["primaryArtists"] as ${$GLOBALS["kfqphwwvf"]}) {
                ${$GLOBALS["kzrosgsj"]} = ${$GLOBALS["kfqphwwvf"]}["name"];
                $dxetcqwco = "artistUrl";
                $artistUrl = ${$GLOBALS["kfqphwwvf"]}["url"];
                echo "<a href='{$artistUrl}' target='_blank'>{$artistName}</a><br>";
            }
            echo "</td>\n<td>\n";
            foreach (${$GLOBALS["lyumomtr"]}["image"] as ${$GLOBALS["kuojbcf"]}) {
                $GLOBALS["hheqtvycv"] = "image";
                if ($image["quality"] == "150x150") {
                    $GLOBALS["trfevirim"] = "imageUrl";
                    $lnsceder = "imageUrl";
                    $qdmerpxhfm = "imageUrl";
                    $wisultfg = "image";
                    $imageUrl = $image["link"];
                    $imageUrl = str_replace("http://", "https://", $imageUrl);
                    echo "<img src='{$imageUrl}' alt='Album Image' class='img-fluid' style='max-width: 100px;'><br>";
                }
            }
            echo "</td>\n<td>\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"albumId\" id=\"albumId\" value=\"";
            echo ${$GLOBALS["gyhkmiuwbo"]};
            echo "\" required>\n<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n</form>\n</td>\n</tr>\n";
        }
        $mymxnubst = "prevPage";
        echo "</tbody>\n</table>\n</div>\n</div>\n<div class=\"row\">\n<div class=\"col\">\n";
        $prevPage = ${$GLOBALS["sofsggtkji"]} - 1;
        ${$GLOBALS["vlndtlh"]} += 1;
        echo "<form method='POST' action=''>\n<input type='hidden' name='album' value='";
        echo ${$ecycoumpsuw};
        echo "'>\n<input type='hidden' name='page' value='";
        echo ${$GLOBALS["shmxaf"]};
        echo "'>\n";
        if (${$gevwtvdwmxse} > 1) {
            echo "<div class='text-center'><button type='submit' class='btn btn-primary btn-lg'>Previous</button></div>";
        }
        echo "</form>\n</div>\n<div class=\"col\">\n<form method='POST' action=''>\n<input type='hidden' name='album' value='";
        $GLOBALS["xqugoxbslpfu"] = "nextPage";
        echo ${$GLOBALS["vnflfxp"]};
        echo "'>\n<input type='hidden' name='page' value='";
        echo $nextPage;
        echo "'>\n";
        if (${$GLOBALS["ijvrlt"]} > ${$GLOBALS["vzrjddxob"]} * 10) {
            echo "<div class='text-center'><button type='submit' class='btn btn-primary btn-lg'>Next</button></div>";
        }
        echo "</form>\n</div>\n</div>\n";
    } else {
        echo "<p>Error occurred while fetching data from the API.</p>";
    }
}
echo "\n";
if (isset($_POST["playlistID"])) {
    $xctijmrkh = "apiUrl";
    ${$GLOBALS["iwjgila"]} = $_POST["playlistID"];
    $iwrbhxtspmv = "response";
    ${$xctijmrkh} = "https://vineetdev-saavn.vercel.app/playlists?id={$playlistID}";
    ${$iwrbhxtspmv} = file_get_contents(${$GLOBALS["nekfclogla"]});
    ${$GLOBALS["irxubmmarr"]} = json_decode(${$GLOBALS["vxfmjih"]}, true);
    if (${$GLOBALS["irxubmmarr"]}["status"] === "SUCCESS") {
        $GLOBALS["lfdlapdpwlmf"] = "categorylist";
        $jrgomu = "album";
        $GLOBALS["fvuqyjlpyl"] = "songCount";
        $GLOBALS["ecemort"] = "playlistName";
        ${$GLOBALS["odhsndlj"]} = ${$GLOBALS["irxubmmarr"]}["data"];
        ${$GLOBALS["ecemort"]} = ${$jrgomu}["name"];
        $qcvsfq = "img";
        $xesdrn = "album";
        ${$GLOBALS["fvuqyjlpyl"]} = ${$GLOBALS["odhsndlj"]}["songCount"];
        ${$GLOBALS["unbhiiwgi"]} = ${$GLOBALS["odhsndlj"]}["songs"];
        echo "</div> \n\n<div class=\"mt-5\">\n<div class=\"card mb-3\">\n<img src=\"";
        ${$qcvsfq} = ${$xesdrn}["image"][2]["link"];
        echo ${$GLOBALS["flygigqdrsml"]} = str_replace("http://", "https://", ${$GLOBALS["flygigqdrsml"]});
        echo "\" alt=\"Album Image\" class=\"card-img-top rounded mt-3\" style=\"max-width: 200px; margin: 0 auto; border: 2px solid #ddd;\">\n<div class=\"card-body\">\n<div class=\"table-responsive\">\n<table class=\"table\">\n<tbody>\n<tr>\n<th scope=\"row\">Playlist Name</th>\n<td>";
        echo ${$GLOBALS["utbbnfkiok"]};
        $lkdncwpjvu = "img";
        echo "</td>\n</tr>\n<tr>\n<th scope=\"row\">Count</th>\n<td>";
        echo ${$GLOBALS["fkfqzyw"]};
        $GLOBALS["sfhhvzhth"] = "playlistID";
        echo "</td>\n</tr>\n</tbody>\n</table>\n</div>\n<div class=\"row\">\n<div class=\"col-12\">\n<form id=\"add-category-form\" class=\"add-category-form\" data-album-id=\"";
        echo ${$GLOBALS["onurzcm"]};
        $ptrdqybezmvc = "categorylist";
        echo "\">\n<div class=\"form-group\">\n<input type=\"text\" name=\"category_name\" value=\"";
        echo ${$GLOBALS["utbbnfkiok"]};
        echo "\" required class=\"form-control mobile-input\">\n<input type=\"text\" name=\"meta_title\" id=\"meta_title\" placeholder=\"Category Meta Title\" class=\"form-control mobile-input\">\n</div>\n<input type=\"hidden\" name=\"thumbfrom\" value=\"EXTERNAL_LINK\" required>\n<input type=\"hidden\" name=\"thumb_url\" value=\"";
        ${$GLOBALS["flygigqdrsml"]} = ${$GLOBALS["odhsndlj"]}["image"][2]["link"];
        echo ${$GLOBALS["flygigqdrsml"]} = str_replace("http://", "https://", ${$lkdncwpjvu});
        echo "\" required>\n\n<div class=\"form-group\">\n<label for=\"parentid\">Select category</label>\n";
        ${$ptrdqybezmvc} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            echo "<select name=\"parentid\" id=\"category-select1\" class=\"form-control mobile-input\">\n<option value=\"\" disabled selected>Select Category</option>";
            foreach (${$GLOBALS["jiaqqowon"]} as ${$GLOBALS["mchliudnuxl"]}) {
                $srexrykz = "row";
                $ehmivirie = "cat_id";
                $zmwujkkn = "row";
                echo "<option value=\"" . $row["id"] . "\"";
                $GLOBALS["clivmbqjfq"] = "row";
                if ($cat_id == $row["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$GLOBALS["clivmbqjfq"]}["name"]) . "</option>";
            }
            echo "</select>";
        }
        echo "</div>\n<input type=\"hidden\" name=\"albumuqid\" value=\"";
        echo ${$GLOBALS["sfhhvzhth"]};
        echo "\">\n<input type=\"hidden\" name=\"added_home\" value=\"1\">\n<input type=\"hidden\" name=\"release_year\" value=\"";
        $GLOBALS["dpnhfwgurgg"] = "songs";
        echo "\">\n<input type=\"hidden\" name=\"meta_title\" value=\"\">\n<input type=\"hidden\" name=\"meta_keyw\" value=\"\">\n<input type=\"hidden\" name=\"meta_des\" value=\"\">\n<input type=\"hidden\" name=\"status\" value=\"1\">\n<input type=\"hidden\" name=\"newtag\" value=\"1\">\n<input type=\"hidden\" name=\"submit\" value=\"create\">\n<button type=\"submit\" class=\"btn btn-primary\">Create</button>\n</form>\n</div>\n</div>\n</div>\n</div>\n<form method=\"POST\" action=\"\">\n<div class=\"card mb-3\">\n<div class=\"row\">\n<div class=\"col-md-12\">\n<div class=\"table-responsive\">\n<table class=\"table table-bordered table-hover songs-table\">\n<thead class=\"thead-dark\">\n<tr>\n<th class=\"select-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" style=\"width: 1px;\" aria-label=\"\">\n<input type=\"checkbox\" id=\"checkAllVideos\" onclick=\"toggleAllVideos(this);\">\n</th>\n<th>Bitrate</th>\n<th>Thumb</th>\n<th>Song Title, Song Artist, Song Music</th>\n<th>Song Label, Song lyrics, Song Date</th>\n</tr>\n</thead>\n<tbody>\n";
        foreach ($songs as ${$GLOBALS["ldqhhh"]}) {
            $tudzfslzm = "fileExists";
            echo "<tr>\n";
            $GLOBALS["elvnjnguk"] = "fileExists";
            $GLOBALS["tizrkcx"] = "song";
            $konfdcptjwht = "song";
            $emcjvuogco = "imageUrl";
            $GLOBALS["wbwbtizln"] = "song";
            $GLOBALS["efrfxufvc"] = "song";
            $db->where("check_id", ${$GLOBALS["ldqhhh"]}["id"]);
            $fileExists = $db->has("file");
            if ($fileExists == ${$GLOBALS["ldqhhh"]}["id"]) {
                echo "<td> </td>";
            } else {
                $obkkxhhty = "song";
                echo "<td><input type=\"checkbox\" class=\"video-checkbox\" name=\"id[]\" value=\"" . $song["id"] . "\"></td>";
            }
            $GLOBALS["dwowcbwnlyl"] = "song";
            $eepernsp = "song";
            $GLOBALS["qqhyvu"] = "song";
            echo "\n\n<td>\n  <div class=\"container\">\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_64_";
            echo ${$GLOBALS["efrfxufvc"]}["id"];
            $GLOBALS["emqflqfw"] = "song";
            echo "\" id=\"bitrate_64\" value=\"64\">\n          <label class=\"form-check-label\" for=\"bitrate_64\">64</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_128_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            $gufleipobswe = "song";
            echo "\" id=\"bitrate_128\" value=\"128\">\n          <label class=\"form-check-label\" for=\"bitrate_128\">128</label>\n        </div>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_192_";
            $jmshbuhdj = "writers";
            echo $song["id"];
            echo "\" id=\"bitrate_192\" value=\"192\">\n          <label class=\"form-check-label\" for=\"bitrate_192\">192</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_320_";
            echo $song["id"];
            $GLOBALS["vymsqmmasi"] = "snippet";
            echo "\" id=\"bitrate_320\" value=\"320\">\n          <label class=\"form-check-label\" for=\"bitrate_320\">320</label>\n        </div>\n      </div>\n    </div>\n  </div>\n</td>\n\n";
            $ootmlfzhc = "song";
            ${$GLOBALS["nfuvapdlb"]} = "";
            foreach (${$GLOBALS["ldqhhh"]}["image"] as ${$GLOBALS["kuojbcf"]}) {
                $GLOBALS["mhjowhkusj"] = "image";
                if ($image["quality"] === "500x500") {
                    $GLOBALS["dwgudepnyfc"] = "imageUrl";
                    $GLOBALS["koyyfsddlc"] = "imageUrl";
                    $GLOBALS["ukhculuyhu"] = "image";
                    ${$GLOBALS["nfuvapdlb"]} = $image["link"];
                    ${$GLOBALS["dwgudepnyfc"]} = str_replace("http://", "https://", ${$GLOBALS["koyyfsddlc"]});
                    break;
                }
            }
            $xcvnerhobwe = "song";
            if (!empty(${$emcjvuogco})) {
                echo "<td><img src=\"";
                echo ${$GLOBALS["nfuvapdlb"]};
                echo "\" alt=\"Song Image (500x500)\" class=\"img-fluid\" style=\"max-width: 80px;\"></td>\n";
            } else {
                echo "<td>Image not available.</td>\n";
            }
            echo "\n\n<input type=\"hidden\" name=\"songthumb_";
            $GLOBALS["qetjbyb"] = "desiredQuality";
            $uouenfnfyv = "desiredQualities";
            echo ${$GLOBALS["qqhyvu"]}["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["nfuvapdlb"]};
            $GLOBALS["ymeqtin"] = "song";
            echo "\">\n\n<td>\n  <div class=\"form-group\">\n    <label for=\"titlename_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\">Song Name</label>\n    <input type=\"text\" name=\"titlename_";
            echo ${$GLOBALS["dwowcbwnlyl"]}["id"];
            $GLOBALS["fffhtuhv"] = "song";
            $mwoolmf = "data";
            $gkgarrooh = "data";
            echo "\" value=\"";
            echo ${$GLOBALS["ldqhhh"]}["name"];
            echo "\" class=\"form-control mobile-input\" style=\"max-width: 80px;\">\n  </div>\n  <div class=\"form-group\">\n    <label for=\"artistname_";
            echo $song["id"];
            echo "\">Song Artist</label>\n    <input type=\"text\" name=\"artistname_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" value=\"";
            $GLOBALS["bbxuyoxlt"] = "album";
            echo ${$GLOBALS["wbwbtizln"]}["primaryArtists"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Artist\">\n  </div>\n  \n    ";
            ${$GLOBALS["psqcbnocvl"]} = ${$GLOBALS["ldqhhh"]}["id"];
            $GLOBALS["ikjgwmbltb"] = "song";
            $irgodrlesjlh = "desiredQualities";
            $ktlrkei = "song";
            ${$GLOBALS["xcjtjyu"]} = "http://maxsecurehost.in/apiv2/jio/lyrics.php?id=" . urlencode(${$GLOBALS["psqcbnocvl"]});
            ${$GLOBALS["irxubmmarr"]} = json_decode(file_get_contents(${$GLOBALS["xcjtjyu"]}), true);
            $yspmkxgjopr = "lyrics";
            ${$GLOBALS["vymsqmmasi"]} = ${$mwoolmf}["snippet"];
            ${$yspmkxgjopr} = ${$GLOBALS["irxubmmarr"]}["lyrics"];
            ${$jmshbuhdj} = ${$gkgarrooh}["writers"];
            echo "  <div class=\"form-group\">\n    <label for=\"lyricswriter_";
            echo ${$ootmlfzhc}["id"];
            echo "\">Song Writer</label>\n    <input type=\"text\" class=\"form-control mobile-input\" name=\"lyricswriter_";
            echo ${$xcvnerhobwe}["id"];
            echo "\" value=\"";
            echo htmlspecialchars(${$GLOBALS["uhifovjwj"]});
            echo "\" placeholder=\"Lyrics\">\n  </div>\n\n</td>\n\n\n";
            echo "<input type=\"hidden\" name=\"lang\" value=\"";
            echo ${$GLOBALS["ldqhhh"]}["language"];
            echo "\">\n<input type=\"hidden\" name=\"album_name\" value=\"";
            $cqgjulibh = "song";
            echo ${$GLOBALS["bbxuyoxlt"]}["name"];
            echo "\">\n\n\n<td>\n      <div class=\"form-group\">\n    <label for=\"music_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\">Song Music</label>\n    <input type=\"text\" name=\"music_";
            echo ${$GLOBALS["ikjgwmbltb"]}["id"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Music\">\n  </div>\n  \n  \n  <div class=\"form-group\">\n    <label for=\"label_";
            echo ${$GLOBALS["tizrkcx"]}["id"];
            echo "\">Song Label</label>\n    <input type=\"text\" name=\"label_";
            echo ${$GLOBALS["emqflqfw"]}["id"];
            echo "\" value=\"";
            echo ${$ktlrkei}["label"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Label\">\n  </div>\n\n\n  <div class=\"form-group\">\n    <label for=\"release_date_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\">Release Date</label>\n    <input type=\"date\" value=\"";
            echo date("Y-m-d", strtotime(${$konfdcptjwht}["releaseDate"]));
            echo "\" class=\"form-control mobile-input\" name=\"release_date_";
            $GLOBALS["wkvpoicvo"] = "song";
            echo $song["id"];
            echo "\" id=\"release_date\">\n  </div>\n</td>\n\n\n<input type=\"hidden\" name=\"step2\" value=\"2\">\n";
            ${$irgodrlesjlh} = ["320kbps", "160kbps", "96kbps", "48kbps"];
            ${$GLOBALS["tgrplugwtyn"]} = "";
            foreach (${$uouenfnfyv} as ${$GLOBALS["qetjbyb"]}) {
                $pmuqitt = "download";
                foreach (${$GLOBALS["ldqhhh"]}["downloadUrl"] as $download) {
                    $ytvqecf = "download";
                    $tskfbflmlne = "desiredQuality";
                    if ($download["quality"] === $desiredQuality) {
                        $GLOBALS["ujpsszovig"] = "download";
                        ${$GLOBALS["tgrplugwtyn"]} = $download["link"];
                        break 2;
                    }
                }
            }
            if (!empty(${$GLOBALS["tgrplugwtyn"]})) {
                echo "<input type=\"hidden\" name=\"dlink_";
                echo ${$GLOBALS["ldqhhh"]}["id"];
                echo "\" value=\"";
                echo ${$GLOBALS["tgrplugwtyn"]};
                echo "\">\n";
            } else {
                echo "<td>Download not available.</td>\n";
            }
            echo "\n";
            $uyvzjdl = "album";
            echo "<input type=\"hidden\" name=\"lang\" value=\"";
            echo ${$GLOBALS["wkvpoicvo"]}["language"];
            echo "\">\n<input type=\"hidden\" name=\"album_name\" value=\"";
            echo $album["name"];
            echo "\">\n</tr>\n";
            if (${$GLOBALS["ymeqtin"]}["hasLyrics"] == true) {
            } else {
            }
            echo "\n";
        }
        echo "\n</tbody>\n</table>\n</div>\n</div>\n</div>\n</div>\n<div class=\"card\">\n<div class=\"card-body\">\n<div class=\"row\">\n<div class=\"col-sm-6\">\n<label for=\"title\">Select category</label>\n";
        ${$GLOBALS["lfdlapdpwlmf"]} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            $kygxovhgow = "row";
            echo "<div class=\"select-wrapper\">";
            echo "<select name=\"cid\" id=\"category-select\" class=\"form-select\">";
            echo "<option value=\"\" disabled selected>Select Category</option>";
            foreach (${$GLOBALS["jiaqqowon"]} as $row) {
                $GLOBALS["srkxwcmccq"] = "row";
                echo "<option value=\"" . $row["id"] . "\"";
                $GLOBALS["unufoemwey"] = "cat_id";
                if ($cat_id == ${$GLOBALS["mchliudnuxl"]}["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$GLOBALS["mchliudnuxl"]}["name"]) . "</option>";
            }
            echo "</select>";
            echo "</div>";
        }
        echo "</div>\n<div class=\"col-sm-6 text-sm-end text-center mt-2 mt-sm-0\">\n<button id=\"submit-selected\" type=\"submit\" class=\"btn btn-primary btn-lg\">\n<i class=\"fa fa-upload\"></i> Upload\n</button>\n</div>\n</div>\n</div>\n</div>\n</form>\n";
    } else {
        echo "<div class=\"alert alert-danger\">Invalid playlist ID. Please try again.</div>";
    }
}
if (isset($_POST["albumId"])) {
    $qdouupaztl = "data";
    $hpowajwjm = "apiUrl";
    $mwzmwm = "data";
    $grapxlqdn = "apiUrl";
    $wnehjzov = "response";
    ${$GLOBALS["yremrhxbb"]} = $_POST["albumId"];
    ${$hpowajwjm} = "https://vineetdev-saavn.vercel.app/albums?id={$albumId}";
    $GLOBALS["uehijwqaqo"] = "response";
    $response = file_get_contents(${$grapxlqdn});
    ${$mwzmwm} = json_decode(${$wnehjzov}, true);
    if (${$qdouupaztl}["status"] === "SUCCESS") {
        $GLOBALS["nxtbwrtwheq"] = "albumId";
        $mpivyiy = "album";
        $lbyiiopkevaq = "img";
        $smoviqewb = "album";
        $vvrwovhzhe = "album_id";
        $GLOBALS["inxreck"] = "album";
        $emcvndktc = "album";
        $album = ${$GLOBALS["irxubmmarr"]}["data"];
        $GLOBALS["jtsleye"] = "album";
        $GLOBALS["qtoxfoimhtlj"] = "img";
        $vkodsdbctuex = "img";
        echo "</div>\n<div class=\"mt-5\">\n<div class=\"card mb-3\">\n<img src=\"";
        $img = $album["image"][2]["link"];
        $GLOBALS["ijviiw"] = "categorylist";
        $GLOBALS["nwpctrrnu"] = "img";
        echo $img = str_replace("http://", "https://", ${$GLOBALS["flygigqdrsml"]});
        $xlilyg = "album";
        echo "\" alt=\"Album Image\" class=\"card-img-top rounded mt-3\" style=\"max-width: 200px; margin: 0 auto; border: 2px solid #ddd;\">\n<div class=\"card-body\">\n<div class=\"table-responsive\">\n<table class=\"table\">\n<tbody>\n<tr>\n<th scope=\"row\">Album Name</th>\n<td>";
        echo $album["name"];
        echo "</td>\n</tr>\n<tr>\n<th scope=\"row\">Release Date</th>\n<td>";
        echo $album["releaseDate"];
        echo "</td>\n</tr>\n<tr>\n<th scope=\"row\">Count</th>\n<td>";
        echo $album["songCount"];
        echo "</td>\n</tr>\n</tbody>\n</table>\n</div>\n<div class=\"row\">\n<div class=\"col-12\">\n<form id=\"add-category-form\" class=\"add-category-form\" data-album-id=\"";
        echo $album_id;
        echo "\">\n<div class=\"form-group\">\n  <div class=\"row\">\n    <div class=\"col-md-6\">\n      <label for=\"category_name\">Category Title</label>\n      <input type=\"text\" id=\"category_name\" name=\"category_name\" value=\"";
        echo ${$GLOBALS["odhsndlj"]}["name"];
        echo " - ";
        echo ${$GLOBALS["odhsndlj"]}["primaryArtists"];
        echo "\" required class=\"form-control mobile-input\">\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-md-6\">\n      <label for=\"artist\">Artist</label>\n      <input type=\"text\" id=\"artist\" name=\"artist\" value=\"";
        echo $album["primaryArtists"];
        echo "\" class=\"form-control mobile-input\">\n    </div>\n    <div class=\"col-md-6\">\n      <label for=\"lyric\">Lyric</label>\n      <input type=\"text\" id=\"lyric\" name=\"lyric\" class=\"form-control mobile-input\">\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-md-6\">\n      <label for=\"music\">Music</label>\n      <input type=\"text\" id=\"music\" name=\"music\" class=\"form-control mobile-input\">\n    </div>\n    <div class=\"col-md-6\">\n      <label for=\"label\">Label</label>\n      <input type=\"text\" id=\"label\" name=\"label\" class=\"form-control mobile-input\">\n    </div>\n  </div>\n  <div class=\"row\">\n      <div class=\"col-md-6\">\n      <label for=\"meta_title\">Category Meta Title</label>\n      <input type=\"text\" id=\"meta_title\" name=\"meta_title\" value=\"";
        echo ${$GLOBALS["odhsndlj"]}["name"];
        echo " - ";
        echo ${$GLOBALS["odhsndlj"]}["primaryArtists"];
        echo "\" class=\"form-control mobile-input\">\n    </div>\n  </div>\n</div>\n<input type=\"hidden\" name=\"thumbfrom\" value=\"EXTERNAL_LINK\" required>\n<input type=\"hidden\" name=\"thumb_url\" value=\"";
        $img = ${$GLOBALS["odhsndlj"]}["image"][2]["link"];
        $sgrxep = "categorylist";
        echo ${$GLOBALS["flygigqdrsml"]} = str_replace("http://", "https://", $img);
        echo "\" required>\n\n<div class=\"form-group\">\n<label for=\"parentid\">Select category</label>\n";
        ${$sgrxep} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            $GLOBALS["ekisidiexhu"] = "row";
            echo "<select name=\"parentid\" id=\"category-select1\" class=\"form-control mobile-input\">\n<option value=\"\" disabled selected>Select Category</option>";
            foreach (${$GLOBALS["jiaqqowon"]} as $row) {
                $GLOBALS["ajurfnmcdv"] = "row";
                $hyrefylixsuw = "row";
                $pummhwvxgyy = "row";
                $dyfhjrrkb = "cat_id";
                echo "<option value=\"" . $row["id"] . "\"";
                if ($cat_id == $row["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$GLOBALS["ajurfnmcdv"]}["name"]) . "</option>";
            }
            echo "</select>";
        }
        echo "</div>\n<input type=\"hidden\" name=\"albumuqid\" value=\"";
        echo ${$GLOBALS["nxtbwrtwheq"]};
        echo "\">\n<input type=\"hidden\" name=\"added_home\" value=\"1\">\n<input type=\"hidden\" name=\"release_year\" value=\"";
        $GLOBALS["suygpclctx"] = "song";
        echo "\">\n<input type=\"hidden\" name=\"meta_keyw\" value=\"\">\n<input type=\"hidden\" name=\"meta_des\" value=\"\">\n<input type=\"hidden\" name=\"status\" value=\"1\">\n<input type=\"hidden\" name=\"newtag\" value=\"1\">\n<input type=\"hidden\" name=\"submit\" value=\"create\">\n\n<button type=\"submit\" class=\"btn btn-primary\">Create</button>\n</form>\n</div>\n</div>\n</div>\n</div>\n<form method=\"POST\" action=\"\">\n<div class=\"card mb-3\">\n<div class=\"row\">\n<div class=\"col-md-12\">\n<div class=\"table-responsive\">\n<table class=\"table table-bordered table-hover songs-table\">\n<thead class=\"thead-dark\">\n<tr>\n<th class=\"select-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" style=\"width: 1px;\" aria-label=\"\">\n<input type=\"checkbox\" id=\"checkAllVideos\" onclick=\"toggleAllVideos(this);\">\n</th>\n<th>Bitrate</th>\n<th>Thumb</th>\n<th>Song Title, Song Artist, Song Music</th>\n<th>Song Label, Song lyrics, Song Date</th>\n</tr>\n</thead>\n<tbody>\n";
        foreach (${$GLOBALS["odhsndlj"]}["songs"] as $song) {
            $irxuwdu = "song";
            $klqiujggxcy = "lyrics";
            echo "<tr>\n";
            $vrxidytni = "song";
            $GLOBALS["gqcfwacsd"] = "song";
            $GLOBALS["nbakeecd"] = "desiredQualities";
            $oaoowjcb = "song";
            $GLOBALS["qrzsmsbk"] = "song";
            $papeopq = "song";
            $rwueiddep = "fileExists";
            $db->where("check_id", $song["id"]);
            $nlunbuci = "song";
            ${$GLOBALS["bnqfwfgix"]} = $db->has("file");
            if (${$rwueiddep} == ${$papeopq}["id"]) {
                echo "<td> </td>";
            } else {
                $ybyjmoefgsb = "song";
                echo "<td><input type=\"checkbox\" class=\"video-checkbox\" name=\"id[]\" value=\"" . $song["id"] . "\"></td>";
            }
            echo "<td>\n  <div class=\"container\">\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_64_";
            $GLOBALS["rzlxmiwft"] = "image";
            echo ${$GLOBALS["gqcfwacsd"]}["id"];
            $GLOBALS["fnlwrio"] = "song";
            echo "\" id=\"bitrate_64\" value=\"64\">\n          <label class=\"form-check-label\" for=\"bitrate_64\">64</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_128_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" id=\"bitrate_128\" value=\"128\">\n          <label class=\"form-check-label\" for=\"bitrate_128\">128</label>\n        </div>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_192_";
            echo ${$oaoowjcb}["id"];
            $cqrubhomdh = "url";
            echo "\" id=\"bitrate_192\" value=\"192\">\n          <label class=\"form-check-label\" for=\"bitrate_192\">192</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_320_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            $GLOBALS["xtkgusfa"] = "song";
            $GLOBALS["xtvjlzfs"] = "songId";
            $GLOBALS["nonkhi"] = "imageUrl";
            $GLOBALS["cwaluowm"] = "url";
            $dmbvvbowjzp = "song";
            echo "\" id=\"bitrate_320\" value=\"320\">\n          <label class=\"form-check-label\" for=\"bitrate_320\">320</label>\n        </div>\n      </div>\n    </div>\n  </div>\n</td>\n";
            $GLOBALS["uvrxjzxkjui"] = "album";
            $GLOBALS["dixgrg"] = "writers";
            $imageUrl = "";
            foreach (${$GLOBALS["ldqhhh"]}["image"] as $image) {
                if (${$GLOBALS["kuojbcf"]}["quality"] === "500x500") {
                    $kmfgdq = "imageUrl";
                    $imageUrl = ${$GLOBALS["kuojbcf"]}["link"];
                    ${$GLOBALS["nfuvapdlb"]} = str_replace("http://", "https://", ${$GLOBALS["nfuvapdlb"]});
                    break;
                }
            }
            $GLOBALS["rjfnkgfc"] = "imageUrl";
            $fbvtsmmy = "song";
            if (!empty(${$GLOBALS["nfuvapdlb"]})) {
                $judhdf = "imageUrl";
                echo "<td><img src=\"";
                echo $imageUrl;
                echo "\" alt=\"Song Image (500x500)\" class=\"img-fluid\" style=\"max-width: 80px;\"></td>\n";
            } else {
                echo "<td>Image not available.</td>\n";
            }
            $uscvzbcw = "data";
            $cvjfnuji = "songId";
            $GLOBALS["qjoghowqdxby"] = "data";
            echo "\n\n<input type=\"hidden\" name=\"songthumb_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["rjfnkgfc"]};
            echo "\">\n\n<td>\n  <div class=\"form-group\">\n    <label for=\"titlename_";
            echo ${$vrxidytni}["id"];
            $GLOBALS["sqrfgqdyjmkk"] = "writers";
            echo "\">Song Name</label>\n    <input type=\"text\" name=\"titlename_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["ldqhhh"]}["name"];
            echo "\" class=\"form-control mobile-input\" style=\"max-width: 80px;\">\n  </div>\n  <div class=\"form-group\">\n    <label for=\"artistname_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\">Song Artist</label>\n    <input type=\"text\" name=\"artistname_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["fnlwrio"]}["primaryArtists"];
            $GLOBALS["rvaqpkrhuc"] = "downloadLink";
            echo "\" class=\"form-control mobile-input\" placeholder=\"Artist\">\n  </div>\n  \n    ";
            $songId = ${$nlunbuci}["id"];
            ${$GLOBALS["cwaluowm"]} = "http://maxsecurehost.in/apiv2/jio/lyrics.php?id=" . urlencode(${$GLOBALS["xtvjlzfs"]});
            ${$GLOBALS["qjoghowqdxby"]} = json_decode(file_get_contents(${$cqrubhomdh}), true);
            ${$GLOBALS["qpuqllwtz"]} = ${$GLOBALS["irxubmmarr"]}["snippet"];
            ${$klqiujggxcy} = ${$uscvzbcw}["lyrics"];
            ${$GLOBALS["dixgrg"]} = ${$GLOBALS["irxubmmarr"]}["writers"];
            echo "  <div class=\"form-group\">\n    <label for=\"lyricswriter_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\">Song Writer</label>\n    <input type=\"text\" class=\"form-control mobile-input\" name=\"lyricswriter_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" value=\"";
            echo htmlspecialchars(${$GLOBALS["sqrfgqdyjmkk"]});
            echo "\" placeholder=\"Lyrics\">\n  </div>\n\n</td>\n\n\n";
            echo "<input type=\"hidden\" name=\"lang\" value=\"";
            echo ${$GLOBALS["ldqhhh"]}["language"];
            echo "\">\n<input type=\"hidden\" name=\"album_name\" value=\"";
            echo ${$GLOBALS["uvrxjzxkjui"]}["name"];
            $GLOBALS["jemilklqxqn"] = "song";
            $gljgsy = "song";
            echo "\">\n\n\n<td>\n      <div class=\"form-group\">\n    <label for=\"music_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            $murbycm = "downloadLink";
            $GLOBALS["xkmilxyxzn"] = "desiredQualities";
            echo "\">Song Music</label>\n    <input type=\"text\" name=\"music_";
            echo ${$fbvtsmmy}["id"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Music\">\n  </div>\n  \n  \n  <div class=\"form-group\">\n    <label for=\"label_";
            echo $song["id"];
            echo "\">Song Label</label>\n    <input type=\"text\" name=\"label_";
            echo ${$GLOBALS["qrzsmsbk"]}["id"];
            echo "\" value=\"";
            echo $song["label"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Label\">\n  </div>\n\n\n  <div class=\"form-group\">\n    <label for=\"release_date_";
            echo ${$dmbvvbowjzp}["id"];
            echo "\">Release Date</label>\n    <input type=\"date\" value=\"";
            echo date("Y-m-d", strtotime(${$GLOBALS["xtkgusfa"]}["releaseDate"]));
            echo "\" class=\"form-control mobile-input\" name=\"release_date_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" id=\"release_date\">\n  </div>\n</td>\n\n\n<input type=\"hidden\" name=\"step2\" value=\"2\">\n";
            ${$GLOBALS["nbakeecd"]} = ["320kbps", "160kbps", "96kbps", "48kbps"];
            ${$murbycm} = "";
            foreach (${$GLOBALS["xkmilxyxzn"]} as ${$GLOBALS["hiyiexyexu"]}) {
                $GLOBALS["ymcunikou"] = "song";
                foreach ($song["downloadUrl"] as ${$GLOBALS["awdlhndooka"]}) {
                    $hroqohrtq = "download";
                    if ($download["quality"] === ${$GLOBALS["hiyiexyexu"]}) {
                        $zmuxuwixmvp = "downloadLink";
                        $downloadLink = ${$GLOBALS["awdlhndooka"]}["link"];
                        break 2;
                    }
                }
            }
            if (!empty(${$GLOBALS["rvaqpkrhuc"]})) {
                $GLOBALS["tcdkmdfzqi"] = "song";
                echo "<input type=\"hidden\" name=\"dlink_";
                echo $song["id"];
                echo "\" value=\"";
                echo ${$GLOBALS["tgrplugwtyn"]};
                echo "\">\n";
            } else {
                echo "<td>Download not available.</td>\n";
            }
            echo "\n\n";
            if (${$GLOBALS["ldqhhh"]}["hasLyrics"] == true) {
            } else {
            }
            echo "\n</tr>\n";
        }
        echo "\n</tbody>\n</table>\n</div>\n</div>\n</div>\n</div>\n<div class=\"card\">\n<div class=\"card-body\">\n<div class=\"row\">\n<div class=\"col-sm-6\">\n<label for=\"title\">Select category</label>\n";
        ${$GLOBALS["ijviiw"]} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            echo "<div class=\"select-wrapper\">";
            $GLOBALS["xsebjkv"] = "row";
            echo "<select name=\"cid\" id=\"category-select\" class=\"form-select\">";
            echo "<option value=\"\" disabled selected>Select Category</option>";
            foreach (${$GLOBALS["jiaqqowon"]} as $row) {
                $GLOBALS["rjcfkk"] = "cat_id";
                echo "<option value=\"" . ${$GLOBALS["mchliudnuxl"]}["id"] . "\"";
                $fnjfkpdvxcq = "row";
                if ($cat_id == ${$GLOBALS["mchliudnuxl"]}["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$fnjfkpdvxcq}["name"]) . "</option>";
            }
            echo "</select>";
            echo "</div>";
        }
        echo "</div>\n<div class=\"col-sm-6 text-sm-end text-center mt-2 mt-sm-0\">\n<button id=\"submit-selected\" type=\"submit\" class=\"btn btn-primary btn-lg\">\n<i class=\"fa fa-upload\"></i> Upload\n</button>\n</div>\n</div>\n</div>\n</div>\n</form>\n";
    } else {
        echo "Error: {$data['message']}";
    }
}
$GLOBALS["tttyoo"] = "currentPage";
echo "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
if (isset($_POST["Songkey"])) {
    $GLOBALS["gsyxnkxhr"] = "response";
    $ugwwlf = "apiUrl";
    $kpjhpfqhqkgi = "SongKey";
    $SongKey = $_POST["Songkey"];
    $ppkddtock = "SongKey";
    $yeplonkp = "response";
    $GLOBALS["dsyhvrkb"] = "apiUrl";
    $SongKey = str_replace(" ", "+", ${$GLOBALS["eghylhedqgw"]});
    $GLOBALS["xtteqho"] = "page";
    $tbydmbclkdk = "data";
    ${$GLOBALS["sofsggtkji"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$GLOBALS["eallrktjnuw"]} = 10;
    ${$ugwwlf} = "https://vineetdev-saavn.vercel.app/search/songs?query=" . ${$GLOBALS["eghylhedqgw"]} . "&page=" . ${$GLOBALS["xtteqho"]} . "&limit=" . ${$GLOBALS["eallrktjnuw"]};
    ${$yeplonkp} = file_get_contents(${$GLOBALS["dsyhvrkb"]});
    ${$GLOBALS["irxubmmarr"]} = json_decode(${$GLOBALS["gsyxnkxhr"]}, true);
    if (${$tbydmbclkdk}["status"] === "SUCCESS") {
        $exogyxxernp = "total";
        $vxipmiwkvewv = "results";
        $bwslvlcxra = "totalResults";
        $GLOBALS["kqopbdbjudid"] = "results";
        $hgkymbgikw = "data";
        $GLOBALS["dxlqhwhkrvfq"] = "data";
        $GLOBALS["vkizxrinft"] = "total";
        $total = $data["data"]["total"];
        $jjmyokxfxyr = "song";
        $results = $data["data"]["results"];
        $totalResults = $total;
        echo "\n<form method=\"POST\" action=\"\">\n<div class=\"card mb-3\">\n<div class=\"row\">\n<div class=\"col-md-12\">\n<div class=\"table-responsive\">\n<table class=\"table table-bordered table-hover songs-table\">\n<thead class=\"thead-dark\">\n<tr>\n<th class=\"select-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" style=\"width: 1px;\" aria-label=\"\">\n<input type=\"checkbox\" id=\"checkAllVideos\" onclick=\"toggleAllVideos(this);\">\n</th>\n<th>Bitrate</th>\n<th>Thumb</th>\n<th>Song Title, Song Artist, Song Music</th>\n<th>Song Label, Song lyrics, Song Date</th>\n</tr>\n</thead>\n<tbody>\n";
        foreach ($results as $song) {
            $igfokjlg = "completeDate";
            $GLOBALS["eechivnkrb"] = "data";
            $GLOBALS["fxjwupkfqjkg"] = "song";
            $GLOBALS["encpdcnlfqr"] = "song";
            echo "<tr>\n";
            $dwksfppu = "song";
            $db->where("check_id", $song["id"]);
            $GLOBALS["mhslnutcc"] = "song";
            $exkwgnvckruj = "data";
            $dgedksvthfje = "fileExists";
            ${$GLOBALS["bnqfwfgix"]} = $db->has("file");
            $GLOBALS["bofwwsj"] = "song";
            $lrjftmp = "song";
            $gyibgomwsbm = "song";
            $GLOBALS["upqpctkilgi"] = "song";
            $ibcukhkr = "song";
            $GLOBALS["isgunufpxgju"] = "imageUrl";
            $uafjjscca = "song";
            if (${$dgedksvthfje} == $song["id"]) {
                echo "<td> </td>";
            } else {
                echo "<td><input type=\"checkbox\" class=\"video-checkbox\" name=\"id[]\" value=\"" . ${$GLOBALS["ldqhhh"]}["id"] . "\"></td>";
            }
            $GLOBALS["qmgsmtbot"] = "writers";
            $GLOBALS["vmhrtk"] = "songId";
            echo "<td>\n  <div class=\"container\">\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_64_";
            echo ${$GLOBALS["fxjwupkfqjkg"]}["id"];
            echo "\" id=\"bitrate_64\" value=\"64\">\n          <label class=\"form-check-label\" for=\"bitrate_64\">64</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_128_";
            echo ${$ibcukhkr}["id"];
            echo "\" id=\"bitrate_128\" value=\"128\">\n          <label class=\"form-check-label\" for=\"bitrate_128\">128</label>\n        </div>\n      </div>\n    </div>\n    <div class=\"row\">\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_192_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" id=\"bitrate_192\" value=\"192\">\n          <label class=\"form-check-label\" for=\"bitrate_192\">192</label>\n        </div>\n      </div>\n      <div class=\"col-md-6\">\n        <div class=\"form-check\">\n          <input type=\"checkbox\" class=\"form-check-input\" name=\"bitrate_320_";
            echo ${$gyibgomwsbm}["id"];
            $eixmxbxui = "data";
            $GLOBALS["pdnwtkku"] = "url";
            echo "\" id=\"bitrate_320\" value=\"320\">\n          <label class=\"form-check-label\" for=\"bitrate_320\">320</label>\n        </div>\n      </div>\n    </div>\n  </div>\n</td>\n";
            $GLOBALS["dqvvlklkmbk"] = "today";
            $beykxdsuj = "image";
            $GLOBALS["msxqcffdp"] = "song";
            $efutniqhn = "song";
            ${$GLOBALS["isgunufpxgju"]} = "";
            foreach (${$GLOBALS["ldqhhh"]}["image"] as ${$beykxdsuj}) {
                if (${$GLOBALS["kuojbcf"]}["quality"] === "500x500") {
                    $GLOBALS["hjrurwmuu"] = "imageUrl";
                    $imageUrl = ${$GLOBALS["kuojbcf"]}["link"];
                    ${$GLOBALS["nfuvapdlb"]} = str_replace("http://", "https://", ${$GLOBALS["nfuvapdlb"]});
                    break;
                }
            }
            $eiczxnyhgm = "lyrics";
            if (!empty(${$GLOBALS["nfuvapdlb"]})) {
                $GLOBALS["ysfyywvfub"] = "imageUrl";
                echo "<td><img src=\"";
                echo $imageUrl;
                echo "\" alt=\"Song Image (500x500)\" class=\"img-fluid\" style=\"max-width: 80px;\"></td>\n";
            } else {
                echo "<td>Image not available.</td>\n";
            }
            $wumjpjwghol = "data";
            echo "\n\n<input type=\"hidden\" name=\"songthumb_";
            $GLOBALS["niresijp"] = "today";
            echo ${$GLOBALS["encpdcnlfqr"]}["id"];
            echo "\" value=\"";
            $GLOBALS["raevjqfl"] = "song";
            $irhfioeq = "song";
            $sdepeci = "song";
            echo ${$GLOBALS["nfuvapdlb"]};
            $jvqedxlu = "song";
            echo "\">\n\n<td>\n  <div class=\"form-group\">\n    <label for=\"titlename_";
            echo $song["id"];
            echo "\">Song Name</label>\n    <input type=\"text\" name=\"titlename_";
            echo $song["id"];
            echo "\" value=\"";
            $lblxicq = "song";
            echo ${$GLOBALS["mhslnutcc"]}["name"];
            echo "\" class=\"form-control mobile-input\" style=\"max-width: 80px;\">\n  </div>\n  <div class=\"form-group\">\n    <label for=\"artistname_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\">Song Artist</label>\n    <input type=\"text\" name=\"artistname_";
            $lyrpfsbp = "song";
            echo ${$efutniqhn}["id"];
            echo "\" value=\"";
            echo $song["primaryArtists"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Artist\">\n  </div>\n  \n    ";
            $GLOBALS["bgayfflpyw"] = "lyrics";
            ${$GLOBALS["vmhrtk"]} = ${$GLOBALS["ldqhhh"]}["id"];
            ${$GLOBALS["pdnwtkku"]} = "http://maxsecurehost.in/apiv2/jio/lyrics.php?id=" . urlencode(${$GLOBALS["psqcbnocvl"]});
            ${$exkwgnvckruj} = json_decode(file_get_contents(${$GLOBALS["xcjtjyu"]}), true);
            ${$GLOBALS["qpuqllwtz"]} = ${$GLOBALS["eechivnkrb"]}["snippet"];
            ${$eiczxnyhgm} = ${$wumjpjwghol}["lyrics"];
            ${$GLOBALS["qmgsmtbot"]} = ${$eixmxbxui}["writers"];
            echo "<input type=\"hidden\" name=\"songlyrics_" . ${$lblxicq}["id"] . "\" value=\"" . htmlspecialchars(${$GLOBALS["bgayfflpyw"]}) . "\">";
            echo "  <div class=\"form-group\">\n    <label for=\"lyricswriter_";
            echo ${$lrjftmp}["id"];
            echo "\">Song Writer</label>\n    <input type=\"text\" class=\"form-control mobile-input\" name=\"lyricswriter_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" value=\"";
            echo htmlspecialchars(${$GLOBALS["uhifovjwj"]});
            echo "\" placeholder=\"Lyrics\">\n  </div>\n\n</td>\n\n\n";
            echo "<input type=\"hidden\" name=\"lang\" value=\"";
            echo ${$GLOBALS["ldqhhh"]}["language"];
            echo "\">\n<input type=\"hidden\" name=\"album_name\" value=\"";
            echo ${$GLOBALS["odhsndlj"]}["name"];
            echo "\">\n\n\n<td>\n      <div class=\"form-group\">\n    <label for=\"music_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\">Song Music</label>\n    <input type=\"text\" name=\"music_";
            echo ${$GLOBALS["ldqhhh"]}["id"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Music\">\n  </div>\n  \n  \n  <div class=\"form-group\">\n    <label for=\"label_";
            echo ${$irhfioeq}["id"];
            echo "\">Song Label</label>\n    <input type=\"text\" name=\"label_";
            echo ${$uafjjscca}["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["raevjqfl"]}["label"];
            echo "\" class=\"form-control mobile-input\" placeholder=\"Label\">\n  </div>\n\n\n  ";
            ${$GLOBALS["vyollye"]} = ${$GLOBALS["ldqhhh"]}["year"];
            ${$GLOBALS["niresijp"]} = date("Y-m-d");
            ${$igfokjlg} = date("{$year}-m-d", strtotime(${$GLOBALS["dqvvlklkmbk"]}));
            echo "  <div class=\"form-group\">\n    <label for=\"release_date_";
            echo ${$GLOBALS["bofwwsj"]}["id"];
            echo "\">Release Date</label>\n    <input type=\"date\" value=\"";
            echo ${$GLOBALS["hhqatntd"]};
            echo "\" class=\"form-control mobile-input\" name=\"release_date_";
            echo ${$GLOBALS["msxqcffdp"]}["id"];
            echo "\" id=\"release_date\">\n  </div>\n</td>\n\n\n<input type=\"hidden\" name=\"step2\" value=\"2\">\n";
            ${$GLOBALS["qgsohofpfh"]} = ["320kbps", "160kbps", "96kbps", "48kbps"];
            ${$GLOBALS["tgrplugwtyn"]} = "";
            foreach (${$GLOBALS["qgsohofpfh"]} as ${$GLOBALS["hiyiexyexu"]}) {
                $GLOBALS["qffyosk"] = "download";
                $ducsyg = "song";
                foreach ($song["downloadUrl"] as $download) {
                    $rajcdlucv = "download";
                    $xntgkznjphbl = "desiredQuality";
                    if ($download["quality"] === $desiredQuality) {
                        $qdhsaelhtgt = "downloadLink";
                        $downloadLink = ${$GLOBALS["awdlhndooka"]}["link"];
                        break 2;
                    }
                }
            }
            if (!empty(${$GLOBALS["tgrplugwtyn"]})) {
                echo "<input type=\"hidden\" name=\"dlink_";
                $sfncckfyde = "song";
                $krqyufob = "downloadLink";
                echo $song["id"];
                echo "\" value=\"";
                echo $downloadLink;
                echo "\">\n";
            } else {
                echo "<td>Download not available.</td>\n";
            }
            echo "\n\n";
            if (${$GLOBALS["ldqhhh"]}["hasLyrics"] == true) {
            } else {
            }
            echo "\n</tr>\n";
        }
        echo "\n</tbody>\n</table>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"card\">\n<div class=\"card-body\">\n<div class=\"row\">\n<div class=\"col-sm-6\">\n<label for=\"title\">Select category</label>\n";
        ${$GLOBALS["jiaqqowon"]} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            echo "<div class=\"select-wrapper\">";
            echo "<select name=\"cid\" id=\"category-select\" class=\"form-select\">";
            $wnoqmpszqmu = "categorylist";
            echo "<option value=\"\" disabled selected>Select Category</option>";
            foreach ($categorylist as ${$GLOBALS["mchliudnuxl"]}) {
                echo "<option value=\"" . ${$GLOBALS["mchliudnuxl"]}["id"] . "\"";
                if (${$GLOBALS["ktdxdrx"]} == ${$GLOBALS["mchliudnuxl"]}["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$GLOBALS["mchliudnuxl"]}["name"]) . "</option>";
            }
            echo "</select>";
            echo "</div>";
        }
        echo "</div>\n<div class=\"col-sm-6 text-sm-end text-center mt-2 mt-sm-0\">\n<button id=\"submit-selected\" type=\"submit\" class=\"btn btn-primary btn-lg\">\n<i class=\"fa fa-upload\"></i> Upload\n</button>\n</div>\n</div>\n</div>\n</div>\n</form>\n";
    } else {
        echo "Error: {$data['message']}";
    }
}
echo "\n<div class=\"row\">\n<div class=\"col-md-12\">\n<ul class=\"pagination\">\n";
${$vfzdhfampy} = isset($_POST["page"]) ? $_POST["page"] : 1;
${$GLOBALS["letyat"]} = ceil(${$GLOBALS["byyxbdmsf"]} / ${$zbueocq});
${$GLOBALS["xnsfinzglbf"]} -= 1;
${$GLOBALS["tttyoo"]} += 1;
if (${$GLOBALS["epwssjnq"]} > 1) {
    $GLOBALS["ixteovgdks"] = "SongKey";
    echo "<li class=\"page-item\">\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"Songkey\" value=\"";
    echo $SongKey;
    echo "\">\n<input type=\"hidden\" name=\"page\" value=\"";
    echo ${$GLOBALS["shmxaf"]};
    echo "\">\n<button type=\"submit\" class=\"page-link btn btn-primary\">";
    echo "Previous";
    echo "</button>\n</form>\n</li>\n";
}
if (${$noypjwswfp} < ${$GLOBALS["gcutjhgted"]}) {
    $GLOBALS["hmfjtbt"] = "nextPage";
    $GLOBALS["rwuclrx"] = "SongKey";
    echo "<li class=\"page-item\">\n<form method=\"POST\" action=\"\">\n<input type=\"hidden\" name=\"Songkey\" value=\"";
    echo $SongKey;
    echo "\">\n<input type=\"hidden\" name=\"page\" value=\"";
    echo $nextPage;
    echo "\">\n<button type=\"submit\" class=\"page-link btn btn-primary\">";
    echo "Next";
    echo "</button>\n</form>\n</li>\n";
}
echo "</ul>\n</div>\n</div>\n\n\n\n\n<script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>\n<script>\n\$(document).ready(function() {\n\$(\"#category-select\").select2();\n});\n</script>\n<script>\n\$(document).ready(function() {\n\$(\"#category-select1\").select2();\n});\n</script>\n<script>\n\$(document).ready(function() {\n\$('#add-artist-form').submit(function(event) {\nevent.preventDefault(); // Prevent the form from submitting normally\n\n// Get the form data\nvar formData = {\n'name': \$('#artist_name').val(),\n'thumbfrom': 'EXTERNAL_LINK', // Add thumbfrom parameter with value EXTERNAL_LINK\n'thumb_url': \$('input[name=thumb_url]').val(),\n'a_check_id': \$('input[name=a_check_id]').val(),\n'added_home': 1,\n'meta_title': '',\n'meta_keyw': '',\n'meta_des': '',\n'status': 1,\n'submit': 'create'\n};\n// Get the URL parameters\nvar urlParams = new URLSearchParams(window.location.search);\nurlParams.forEach(function(value, key) {\nformData[key] = value;\n});\n// Send the AJAX request\n\$.ajax({\ntype: 'POST',\nurl: '";
echo ${$hnwxoryxb};
echo "',\ndata: formData,\nsuccess: function(response) {\nconsole.log(response);\nif (response.status === 1) {\n\$('.btn-primary').text('Success');\n} else {\n\$('.btn-primary').text('Artist Already Exists');\n}\n},\nerror: function(xhr, status, error) {\nconsole.log(xhr.responseText);\n}\n});\n});\n});\n</script>\n<script type=\"text/javascript\">\n\$(document).ready(function() {\n\$('.add-category-form').on('submit', function(event) {\nevent.preventDefault();\nvar formData = \$(this).serialize();\nvar \$submitButton = \$(this).find('button[type=\"submit\"]'); // Cache the submit button\n\n\$.ajax({\ntype: 'POST',\nurl: '";
echo ${$GLOBALS["rrxchvduvg"]};
echo "',\ndata: formData,\nsuccess: function(response) {\nconsole.log(response);\n\$submitButton.text('Success');\n// Reload the page without losing POST data\nwindow.location.reload(false); // Pass 'false' to reload from cache\n\n// If you want to reload the page without cache, use the following line:\n// window.location.reload(true);\n},\nerror: function(xhr, status, error) {\nconsole.log(xhr.responseText);\n}\n});\n});\n});\n</script>\n<script>\nconst searchForm = document.getElementById('searchForm');\nconst searchTypeSelect = document.getElementById('searchType');\nconst artistLinkInput = document.getElementById('artistLink');\nconst albumLinkInput = document.getElementById('albumLink');\nconst SongkeyInput = document.getElementById('Songkey');\nconst albumKeywordInput = document.getElementById('albumkeyword');\nconst playlistKeywordInput = document.getElementById('playlistkeyword');\n\nsearchForm.addEventListener('submit', function(event) {\nevent.preventDefault(); // Prevent form submission\n// Get the selected search type\nconst searchType = searchTypeSelect.value;\n// Update the corresponding hidden input field based on the search type\nif (searchType === 'artist') {\nartistLinkInput.value = document.getElementById('searchInput').value;\nalbumLinkInput.value = ''; // Make albumLinkInput blank when searching for an artist\nSongkeyInput.value = '';\nalbumKeywordInput.value = ''; // Clear albumKeywordInput when searching for an artist\nplaylistKeywordInput.value = ''; // Clear playlistKeywordInput when searching for an artist\n} else if (searchType === 'albumLink') {\nartistLinkInput.removeAttribute('name'); // Remove name attribute from artistLinkInput when searching for an album link\nalbumLinkInput.value = document.getElementById('searchInput').value; // Set the value of albumLinkInput\nSongkeyInput.value = '';\nalbumKeywordInput.value = ''; // Clear albumKeywordInput when searching for an album link\nplaylistKeywordInput.value = ''; // Clear playlistKeywordInput when searching for an album link\n} \nelse if (searchType === 'Songkey') {\nartistLinkInput.removeAttribute('name'); // Remove name attribute from artistLinkInput when searching for an album link\nSongkeyInput.value = document.getElementById('searchInput').value; // Set the value of albumLinkInput\nalbumLinkInput.value = '';\nalbumKeywordInput.value = ''; // Clear albumKeywordInput when searching for an album link\nplaylistKeywordInput.value = ''; // Clear playlistKeywordInput when searching for an album link\n}\nelse if (searchType === 'album') {\nartistLinkInput.removeAttribute('name'); // Remove name attribute from artistLinkInput when searching for an album\nalbumLinkInput.value = ''; // Make albumLinkInput blank when searching for an album\nSongkeyInput.value = '';\nalbumKeywordInput.value = document.getElementById('searchInput').value;\nplaylistKeywordInput.value = ''; // Clear playlistKeywordInput when searching for an album\n} else if (searchType === 'playlist') {\nartistLinkInput.removeAttribute('name'); // Remove name attribute from artistLinkInput when searching for a playlist\nalbumLinkInput.removeAttribute('name'); // Remove name attribute from albumLinkInput when searching for a playlist\nalbumLinkInput.value = ''; // Make albumLinkInput blank when searching for a playlist\nSongkeyInput.value = '';\nalbumKeywordInput.value = ''; // Clear albumKeywordInput when searching for a playlist\nplaylistKeywordInput.value = document.getElementById('searchInput').value;\n}\n// Submit the form\nsearchForm.submit();\n});\n</script>\n<script>\nfunction toggleAllVideos(checkbox) {\nvar videoCheckboxes = document.getElementsByName('id[]');\nfor (var i = 0; i < videoCheckboxes.length; i++) {\nvideoCheckboxes[i].checked = checkbox.checked;\n}\n}\n</script>\n";
require_once "/var/www/html/../footer.php";
