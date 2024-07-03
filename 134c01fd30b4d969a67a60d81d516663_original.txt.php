<?php

$GLOBALS["hoefhsdp"] = "rk";
$GLOBALS["ddsrlmxse"] = "album_id";
$GLOBALS["ikqjknhm"] = "songId";
$GLOBALS["tbtncrpavh"] = "desiredQuality";
$GLOBALS["ijhaies"] = "desiredQualities";
$GLOBALS["jocatritin"] = "imageUrl";
$GLOBALS["lhswjsxs"] = "cat_id";
$GLOBALS["onsvswlnsp"] = "categorylist";
$GLOBALS["wblnnrhhmt"] = "album";
$GLOBALS["fsjtye"] = "songs";
$GLOBALS["iovvmwbmv"] = "songCount";
$GLOBALS["ezfhbtswjiyr"] = "playlistName";
$GLOBALS["jrqnnfhvvv"] = "playlistID";
$GLOBALS["djxdlqu"] = "id";
$GLOBALS["egvdsclku"] = "artistName";
$GLOBALS["xgstchbay"] = "albumUrl";
$GLOBALS["vkqvky"] = "language";
$GLOBALS["xbnjgydgxgi"] = "year";
$GLOBALS["glvssumm"] = "name";
$GLOBALS["vqqncg"] = "artistId";
$GLOBALS["khejbnary"] = "row";
$GLOBALS["niybfpd"] = "writers";
$GLOBALS["wwerry"] = "snippet";
$GLOBALS["nyytovlbpyn"] = "downloadLink";
$GLOBALS["nulsrirt"] = "download";
$GLOBALS["gitocace"] = "fileExists";
$GLOBALS["iethhkwtf"] = "song";
$GLOBALS["kdqsxamciqk"] = "image";
$GLOBALS["yvudockhj"] = "totalPages";
$GLOBALS["qfjqrkt"] = "prevPage";
$GLOBALS["oduxodkwpu"] = "limit";
$GLOBALS["byefasp"] = "total";
$GLOBALS["vwhxfhhl"] = "page";
$GLOBALS["hwwpynerxnys"] = "currentPage";
$GLOBALS["yxwkxlccsgl"] = "totalResults";
$GLOBALS["fvbntof"] = "result";
$GLOBALS["gnrhpyq"] = "results";
$GLOBALS["jprnvqdt"] = "keyword";
$GLOBALS["owycmylb"] = "apiUrl";
$GLOBALS["ohbogsel"] = "errorMessage";
$GLOBALS["xyfgjhmqoj"] = "categoryeaxi";
$GLOBALS["pwpuvocd"] = "primaryArtistsId";
$GLOBALS["xprfwjtp"] = "albumName";
$GLOBALS["ihbpflq"] = "albumId";
$GLOBALS["pmxpiixkba"] = "response";
$GLOBALS["uftxzwkope"] = "albumlink";
$GLOBALS["sysvrenpyuq"] = "url";
$GLOBALS["sjqqufpqn"] = "parentids";
$GLOBALS["riwbxduyje"] = "db_check_id";
$GLOBALS["fddwgk"] = "release_date";
$GLOBALS["kstjvs"] = "cid";
$GLOBALS["mwfzeqkweb"] = "data";
$GLOBALS["khrdlwdcxe"] = "trend";
$GLOBALS["wnxjvwolv"] = "target_dir2";
$GLOBALS["xslngs"] = "catCover";
$GLOBALS["efibehirglm"] = "cover";
$GLOBALS["dvijprfwyfn"] = "filecover";
$GLOBALS["lhnnhdw"] = "command";
$GLOBALS["ontcjjmspuq"] = "converted_file_name";
$GLOBALS["puqykxygqxk"] = "target_paths";
$GLOBALS["zupbod"] = "ffile_name";
$GLOBALS["ssxuggupcbwu"] = "ffmpeg_path";
$GLOBALS["vrdwlvmi"] = "saveThumb";
$GLOBALS["ohglirbgj"] = "thumbname";
$GLOBALS["ambghsrsygo"] = "RootPath";
$GLOBALS["rptdyfv"] = "tmp_thumbname";
$GLOBALS["vduxrotuy"] = "thumb_ext";
$GLOBALS["pdiypcumsvwb"] = "thumbURL";
$GLOBALS["oxymgcjwm"] = "mkdir";
$GLOBALS["knjxwome"] = "savePath";
$GLOBALS["awysshn"] = "slug";
$GLOBALS["mpiscthtdyzn"] = "paragraphs";
$GLOBALS["lqfoxcrnf"] = "lyricswriter";
$GLOBALS["ppsjnwtjy"] = "lyrics";
$GLOBALS["tbeugpbt"] = "desc_n2";
$GLOBALS["rtophrrtp"] = "artist";
$GLOBALS["rymoqhzd"] = "dl_link";
$GLOBALS["vlqwcoumn"] = "songthumburl";
$GLOBALS["qscicwb"] = "artist1";
$GLOBALS["zucrdlps"] = "yt_title";
$GLOBALS["wlffytmou"] = "vineet_baba";
$GLOBALS["yoyqfswajigf"] = "yt_titles";
$GLOBALS["lxhmeoepx"] = "album_name";
$GLOBALS["rxkncbyjmcsv"] = "capitalizedLang";
$GLOBALS["qvsrpbtqlpl"] = "lang";
$GLOBALS["cgawslr"] = "song_id";
$GLOBALS["jebvofigh"] = "vicat";
$GLOBALS["blkzmksoxd"] = "category";
require_once "/var/www/html/../header.php";
$GLOBALS["kznsuku"] = "cid";
$GLOBALS["eihsvicjef"] = "page";
require_once "../config/init.php";
$ijislxzwrj = "q";
require_once "/var/www/html/../functio_hearthis.php";
$GLOBALS["xgyrjuidrzy"] = "cid";
require_once "/var/www/html/../function2.php";
$page = $_GET["p"];
$q = $_GET["q"];
$cid = $_GET["cid"];
$db->where("id", $cid);
$category = $db->getOne("category");
$GLOBALS["ganrlccquuek"] = "rk";
echo "<style>.select-wrapper {\n  position: relative;\n  display: inline-block;\n}\n\n.select-wrapper::after {\n  content: '\\f078';\n  font-family: 'FontAwesome';\n  position: absolute;\n  top: 50%;\n  right: 10px;\n  transform: translateY(-50%);\n  pointer-events: none;\n}\n\n/* Adjust the select width to fit within the column */\n#category-select {\n  width: 100%;\n  max-width: 100%;\n}\n\n/* Optional: Adjust the button alignment for mobile */\n@media (max-width: 576px) {\n  .text-sm-end.text-center {\n    text-align: center;\n  }\n}\n</style>\n";
$rk = "APP_URL/ADMIN_DIR/artist/process.php";
$vicat = "APP_URL/ADMIN_DIR/category/process.php";
echo "<div class=\"container-fluid\">\n  <div class=\"row\">\n    <div class=\"col-md-12\">\n      <div class=\"card\">\n        <div class=\"card-body\">\n          <form method=\"POST\" action=\"\" id=\"searchForm\">\n            <div class=\"form-row\">\n              <div class=\"col-md-6\">\n                <div class=\"form-group\">\n                  <label for=\"searchType\">Search Type:</label>\n                  <select class=\"form-control\" id=\"searchType\" name=\"searchType\">\n                    <option value=\"albumLink\">Album Link</option>  \n                    <option value=\"artist\">Artist Link</option>\n                    <option value=\"album\">Album Keyword</option>\n                    <option value=\"playlist\">Playlist Keyword</option>\n                  </select>\n                </div>\n              </div>\n              <div class=\"col-md-6\">\n                <div class=\"form-group\">\n                  <label for=\"searchInput\">Search:</label>\n                  <input type=\"text\" class=\"form-control\" id=\"searchInput\" name=\"searchInput\" placeholder=\"Enter artist Link, playlist or album keyword\" required>\n                </div>\n              </div>\n              <input type=\"hidden\" class=\"form-control\" id=\"artistLink\" name=\"artistLink\">\n              <input type=\"hidden\" class=\"form-control\" id=\"albumLink\" name=\"albumLink\">\n              <input type=\"hidden\" class=\"form-control\" id=\"albumkeyword\" name=\"albumkeyword\">\n              <input type=\"hidden\" class=\"form-control\" id=\"playlistkeyword\" name=\"playlistkeyword\">\n            </div>\n            <button type=\"submit\" class=\"btn btn-success btn-block\">Search</button>\n          </form>\n        </div>\n        ";
if (isset($_POST["step2"])) {
    $pbvjqg = "category";
    $qpicqueibo = "cid";
    $GLOBALS["mticenjipxr"] = "cid";
    $cid = $_POST["cid"];
    $db->where("id", $cid);
    $category = $db->getOne("category");
    if ($db->count > 0) {
        $vxtthkjoejn = "a1";
        $shvgjyoew = "a1";
        $a1 = $_POST["id"];
        foreach ($a1 as $song_id) {
            $gmlgngi = "RootPath";
            $seatfs = "songthumburl";
            $bxmbdgn = "song_id";
            $GLOBALS["pfslffgge"] = "savePath";
            $GLOBALS["rcktocqo"] = "yt_title";
            $GLOBALS["chbixlrhkug"] = "db_check_id";
            $ybtwtvph = "song_id";
            $db_check_id = ${$GLOBALS["cgawslr"]};
            $rkdcjnm = "song_id";
            $GLOBALS["pjdnjr"] = "catCover";
            ${$GLOBALS["cgawslr"]} = ${$GLOBALS["cgawslr"]};
            $GLOBALS["vdlutbogh"] = "artist1";
            $tqymvqbde = "Tagdata";
            $artist1 = $_POST["artistname_" . ${$ybtwtvph}];
            ${$GLOBALS["qvsrpbtqlpl"]} = $_POST["lang"];
            ${$GLOBALS["rxkncbyjmcsv"]} = ucwords(${$GLOBALS["qvsrpbtqlpl"]});
            $bncrqtbrfj = "paragraphs";
            $hodtqbx = "category";
            ${$GLOBALS["lxhmeoepx"]} = $_POST["album_name"];
            $mxnwdulqhe = "artist1";
            $cchsif = "data";
            ${$GLOBALS["yoyqfswajigf"]} = $_POST["titlename_" . ${$bxmbdgn}];
            $GLOBALS["rnpmhwlw"] = "lyricswriter";
            $GLOBALS["okpkgijy"] = "album_name";
            $trqrtdg = "ffile_name";
            $pyikwl = "savePath";
            $euvehpkykxv = "artist1";
            $ssntjkw = "song_id";
            $GLOBALS["dpprhb"] = "thumbURL";
            $krwboucbmqkr = "artist";
            ${$GLOBALS["wlffytmou"]} = ${$GLOBALS["yoyqfswajigf"]};
            $GLOBALS["kbluykwa"] = "lyrics";
            $ivwjdvhqlgvy = "extension";
            if (${$GLOBALS["lxhmeoepx"]} && ${$mxnwdulqhe}) {
                $GLOBALS["lcybvpqj"] = "yt_title";
                $yt_title = "{$vineet_baba} ({$artist1}) - {$album_name}";
            } elseif (${$GLOBALS["okpkgijy"]}) {
                ${$GLOBALS["zucrdlps"]} = "{$vineet_baba} - {$album_name}";
            } elseif (${$GLOBALS["qscicwb"]}) {
                ${$GLOBALS["zucrdlps"]} = "{$vineet_baba} - {$artist1}";
            } else {
                $rwviyf = "yt_title";
                $impnvfyf = "vineet_baba";
                $yt_title = $vineet_baba;
            }
            $sbybbueuxg = "lyrics";
            ${$GLOBALS["qscicwb"]} = $_POST["artistname_" . ${$rkdcjnm}];
            ${$GLOBALS["vlqwcoumn"]} = $_POST["songthumb_" . ${$ssntjkw}];
            ${$GLOBALS["rymoqhzd"]} = $_POST["dlink_" . ${$GLOBALS["cgawslr"]}];
            ${$GLOBALS["rtophrrtp"]} = ${$euvehpkykxv};
            $fixpelgdvczp = "w_pos";
            $ebmprdyod = "ffile_name";
            $ugduvucs = "song_id";
            $gswkalviwhff = "yt_title";
            $dtwyzdh = "target_paths";
            ${$GLOBALS["tbeugpbt"]} = $_POST["songlyrics_" . ${$GLOBALS["cgawslr"]}];
            ${$GLOBALS["kbluykwa"]} = $_POST["songlyrics_" . ${$ugduvucs}];
            $swrdnhltrj = "song_id";
            $ehqsxid = "target_dir2";
            ${$GLOBALS["rnpmhwlw"]} = $_POST["lyricswriter_" . $song_id];
            ${$bncrqtbrfj} = "";
            $GLOBALS["fvummifgupjg"] = "thumb_ext";
            $ehpnnqkmz = "extension";
            $GLOBALS["seoerswoi"] = "target_dir2";
            if (!empty(${$sbybbueuxg})) {
                $ijvirzb = "lyricsParagraph";
                $hvjllfmxlx = "paragraphs";
                $ekkffhith = "vineet_baba";
                $GLOBALS["jazvwkv"] = "lyricsParagraph";
                $lyricsParagraph = "<h1 class=\"primary\">Lyrics - " . $vineet_baba . "</h1><br><div class=\"lyrics\"><p>" . ${$GLOBALS["ppsjnwtjy"]} . "</p>";
                $paragraphs .= $lyricsParagraph;
                if (!empty(${$GLOBALS["lqfoxcrnf"]})) {
                    $khohbvizzc = "paragraphs";
                    $GLOBALS["zntefxu"] = "lyricswriter";
                    $paragraphs .= "<br><p><b>Writer:</b> " . $lyricswriter . "</p>";
                }
                ${$GLOBALS["mpiscthtdyzn"]} .= "</div>";
            }
            $koubmbqmncm = "category";
            $hqpqhyrd = "target_dir2";
            ${$GLOBALS["awysshn"]} = slug(${$GLOBALS["rcktocqo"]});
            ${$GLOBALS["knjxwome"]} = ${$gmlgngi} . "/" . ${$koubmbqmncm}["folder"];
            ${$GLOBALS["oxymgcjwm"]} = rtrim(${$GLOBALS["pfslffgge"]}, "/");
            $ttpwvxikx = "converted_file_name";
            if (!is_dir(${$GLOBALS["oxymgcjwm"]})) {
                mkdir(${$GLOBALS["oxymgcjwm"]}, 0777, true);
            }
            $GLOBALS["syinimv"] = "Tagdata";
            ${$fixpelgdvczp} = "bottom";
            ${$GLOBALS["pdiypcumsvwb"]} = ${$seatfs};
            ${$GLOBALS["fvummifgupjg"]} = pathinfo(${$GLOBALS["pdiypcumsvwb"]}, PATHINFO_EXTENSION);
            if (${$GLOBALS["dpprhb"]} && ${$GLOBALS["vduxrotuy"]}) {
                $xknpvxvbu = "thumbname";
                $czvxdhof = "saveThumb";
                $xcnnksvhp = "w_pos";
                $tvglgfma = "saveThumb";
                $GLOBALS["cludjfirjc"] = "saveThumb";
                ${$GLOBALS["rptdyfv"]} = "tmp_thumb." . ${$GLOBALS["vduxrotuy"]};
                ${$GLOBALS["cludjfirjc"]} = ${$GLOBALS["ambghsrsygo"]} . "/" . ${$GLOBALS["blkzmksoxd"]}["folder"] . ${$GLOBALS["rptdyfv"]};
                file_put_contents(${$czvxdhof}, file_get_contents(${$GLOBALS["pdiypcumsvwb"]}));
                ${$xknpvxvbu} = uniqid("thumb_");
                genThumb(${$tvglgfma}, ${$GLOBALS["knjxwome"]}, ${$GLOBALS["ohglirbgj"]}, ${$xcnnksvhp}, true, FILE_THUMB_SIZES);
                unlink(${$GLOBALS["vrdwlvmi"]});
            } else {
                if (isset($_FILES["thumb"]["name"]) && !empty($_FILES["thumb"]["name"])) {
                    ${$GLOBALS["ohglirbgj"]} = uniqid("thumb_");
                    $GLOBALS["eibbwfuq"] = "w_pos";
                    genThumb($_FILES["thumb"]["tmp_name"], ${$GLOBALS["knjxwome"]}, ${$GLOBALS["ohglirbgj"]}, $w_pos, true, FILE_THUMB_SIZES);
                }
            }
            ${$ivwjdvhqlgvy} = "mp3";
            $GLOBALS["uljeqnfqxa"] = "target_paths";
            ${$GLOBALS["ssxuggupcbwu"]} = "./ffmpeg";
            ${$GLOBALS["zupbod"]} = basename(${$GLOBALS["rymoqhzd"]});
            $ikloscs = "RootPath";
            ${$GLOBALS["knjxwome"]} .= ${$ebmprdyod};
            $GLOBALS["wwskvi"] = "release_date";
            $GLOBALS["pgjtqtdnsio"] = "target_dir2";
            file_put_contents(${$GLOBALS["uljeqnfqxa"]}, file_get_contents(${$GLOBALS["rymoqhzd"]}));
            $ocewljxcc = "id";
            $aqklgnercitj = "RootPath";
            ${$GLOBALS["ontcjjmspuq"]} = ${$pyikwl} . "converted_" . ${$trqrtdg} . ".mp3";
            ${$GLOBALS["lhnnhdw"]} = "ffmpeg -i \"" . ${$GLOBALS["puqykxygqxk"]} . "\" -y -codec:a libmp3lame -ac 2 -ar 44100 -b:a 320k \"" . ${$ttpwvxikx} . "\"";
            shell_exec(${$GLOBALS["lhnnhdw"]});
            $GLOBALS["qqdycmcfhtt"] = "paragraphs";
            ${$GLOBALS["pgjtqtdnsio"]} = ${$GLOBALS["knjxwome"]} . name_underscore(${$GLOBALS["zucrdlps"]}) . "." . ${$ehpnnqkmz};
            rename(${$GLOBALS["ontcjjmspuq"]}, ${$ehqsxid});
            unlink(${$dtwyzdh});
            $GLOBALS["sqggvekim"] = "catCover";
            ${$GLOBALS["syinimv"]} = array("Title" => ${$gswkalviwhff} . " - " . APP_NAME, "Artist" => ${$GLOBALS["rtophrrtp"]} ? ${$GLOBALS["rtophrrtp"]} . " - " . APP_NAME : APP_NAME, "Album" => ${$GLOBALS["blkzmksoxd"]}["name"] . "-" . APP_NAME, "Year" => date("Y"), "Genre" => APP_NAME, "Comment" => "Downloaded from APP_NAME");
            ${$GLOBALS["dvijprfwyfn"]} = ${$ikloscs} . "/" . ${$hodtqbx}["folder"] . MP3TAG_COVER . "/cover_" . ${$GLOBALS["ohglirbgj"]} . ".jpg";
            ${$GLOBALS["sqggvekim"]} = ${$aqklgnercitj} . "/upload_file/folderthumb/" . MP3TAG_COVER . "/cover_" . pathinfo(${$GLOBALS["blkzmksoxd"]}["thumb"], PATHINFO_FILENAME) . ".jpg";
            $rwygrjxv = "cover";
            $xejpbpl = "id";
            if (file_exists(${$GLOBALS["dvijprfwyfn"]})) {
                $GLOBALS["epripvv"] = "filecover";
                ${$GLOBALS["efibehirglm"]} = $filecover;
            } else {
                if (file_exists(${$GLOBALS["pjdnjr"]})) {
                    $GLOBALS["qnhsabqdm"] = "cover";
                    $cover = ${$GLOBALS["xslngs"]};
                }
            }
            if (empty(${$rwygrjxv})) {
                $GLOBALS["njsgksv"] = "RootPath";
                ${$GLOBALS["efibehirglm"]} = $RootPath . "/assets/images/cover.jpg";
            }
            if (WriteTag(${$GLOBALS["wnxjvwolv"]}, ${$GLOBALS["efibehirglm"]}, ${$tqymvqbde})) {
                $grauumo = "tagwriter";
                $tagwriter = true;
            }
            ${$GLOBALS["khrdlwdcxe"]} = mt_rand(0, 1);
            ${$GLOBALS["mwfzeqkweb"]} = ["name" => ${$GLOBALS["zucrdlps"]}, "dname" => basename(${$hqpqhyrd}), "cid" => ${$GLOBALS["kstjvs"]}, "slug" => Input("slug") ? Input("slug") : genSlug(${$GLOBALS["zucrdlps"]}), "ext" => "mp3", "size" => filesize(${$GLOBALS["seoerswoi"]}), "duration" => getDuration(${$GLOBALS["wnxjvwolv"]}), "artist" => ${$krwboucbmqkr}, "thumb" => ${$GLOBALS["ohglirbgj"]} ? ${$GLOBALS["ohglirbgj"]} . "." . THUMB_FORMAT : "", "des" => ${$GLOBALS["qqdycmcfhtt"]}, "download" => 0, "pos" => Input("pos") ? Input("pos") : 0, "newtag" => Input("new_tag") ? 1 : 1, "meta_title" => "", "meta_keyw" => "", "meta_des" => "", "status" => Input("status") ? 1 : 1, "trend" => ${$GLOBALS["khrdlwdcxe"]}, "approved_at" => $db->now(), "created_at" => ${$GLOBALS["fddwgk"]} ? ${$GLOBALS["wwskvi"]} : $db->now(), "check_id" => ${$GLOBALS["riwbxduyje"]}];
            ${$xejpbpl} = $db->insert(TABLE_FILES, ${$cchsif});
            if (${$ocewljxcc}) {
                $bpqeug = "category";
                $GLOBALS["rvvuffslj"] = "parentids";
                $parentids = array_filter(explode("/", $category["folder"]));
                array_shift(${$GLOBALS["sjqqufpqn"]});
                echo "<div class=\"container-fluid\">\n              <div class=\"alert alert-success alert-dismissible\">\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n              <strong>Success!</strong> File Added Successfully.\n              </div></div>";
            } else {
                echo "Error inserting record: " . $db->getLastError();
            }
            if (${$GLOBALS["sjqqufpqn"]}) {
                $db->where("id", ${$GLOBALS["sjqqufpqn"]}, "IN")->update(TABLE_CAT, ["totalitem" => $db->inc(1)]);
            }
        }
    } else {
        echo "No category found with the given ID.";
    }
}
echo "\n      <div class=\"container\">\n       ";
if ($_POST["albumLink"]) {
    $vjwsiaagdqd = "response";
    $GLOBALS["yejjsrfw"] = "data";
    $kqiplm = "albumlink";
    $albumlink = $_POST["albumLink"];
    ${$GLOBALS["sysvrenpyuq"]} = "https://saavn.me/albums?link=" . urlencode(${$GLOBALS["uftxzwkope"]});
    ${$vjwsiaagdqd} = file_get_contents(${$GLOBALS["sysvrenpyuq"]});
    ${$GLOBALS["yejjsrfw"]} = json_decode(${$GLOBALS["pmxpiixkba"]}, true);
    if (${$GLOBALS["mwfzeqkweb"]}["status"] === "SUCCESS") {
        $ejqlapkse = "albumName";
        $bqbiucwuw = "albumId";
        $jwytooc = "data";
        $tofrhdmtu = "primaryArtistsId";
        $albumId = $data["data"]["id"];
        $GLOBALS["qiqbcwhcaco"] = "albumImage";
        $GLOBALS["ppvjggsvz"] = "songCount";
        $GLOBALS["xhbrho"] = "data";
        $GLOBALS["lxsixjrdgn"] = "albumImage";
        $qlnmgru = "data";
        $xhkhmbnj = "albumYear";
        $GLOBALS["minnoeop"] = "albumYear";
        $albumName = ${$GLOBALS["mwfzeqkweb"]}["data"]["name"];
        $albumYear = ${$GLOBALS["mwfzeqkweb"]}["data"]["year"];
        $GLOBALS["ahypssdq"] = "songCount";
        $songCount = ${$GLOBALS["mwfzeqkweb"]}["data"]["songCount"];
        $primaryArtistsId = $data["data"]["primaryArtistsId"];
        $albumImage = $data["data"]["image"][2]["link"];
        echo "<div class=\"table-responsive\"><table class=\"table table-bordered table-striped\">\n        <thead class=\"thead-dark\">\n        <tr>\n        <th>ID</th>\n        <th>Thumbnail</th>\n        <th>Title</th>\n        <th>Artist</th>\n        <th>Song Count</th>\n        <th>Year</th>\n        <th>Action</th>\n        </tr>\n        </thead>\n        <tbody>\n        <tr>\n        <td>" . ${$GLOBALS["ihbpflq"]} . "</td>\n        <td><img src=\"" . $albumImage . "\" alt=\"Album Thumbnail\" width=\"100\"></td>\n        <td>" . ${$GLOBALS["xprfwjtp"]} . "</td>\n        <td>" . ${$GLOBALS["pwpuvocd"]} . "</td>\n        <td>" . $songCount . "</td>\n        <td>" . $albumYear . "</td>\n        <td>\n        <form method=\"POST\" action=\"\">\n        <input type=\"hidden\" name=\"albumId\" id=\"albumId\" value=\"" . ${$GLOBALS["ihbpflq"]} . "\" required>\n        <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n        </form>";
        $mvjauadbmf = "albumId";
        $ixikiqkd = "albumId";
        $db->where("albumuqid", $albumId);
        ${$GLOBALS["xyfgjhmqoj"]} = $db->has("category");
        if (${$GLOBALS["xyfgjhmqoj"]} == ${$mvjauadbmf}) {
            echo "<br>Folder Exist";
        }
        echo "</td>\n        </tr>\n        </tbody>\n        </table></div>";
    } else {
        $GLOBALS["uksrsujip"] = "data";
        $GLOBALS["xfswzlsxlou"] = "errorMessage";
        $errorMessage = $data["message"];
        echo "API Error: " . ${$GLOBALS["ohbogsel"]} . "\n";
    }
}
echo "\n  </div>\n\n\n  ";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ndvvbuhkt = "page";
    $GLOBALS["ttilbajexqk"] = "keyword";
    $GLOBALS["damrptdung"] = "totalResults";
    $keyword = $_POST["playlistkeyword"];
    $mdgters = "limit";
    $page = isset($_POST["page"]) ? $_POST["page"] : 1;
    $lycyfsmrh = "limit";
    $limit = 10;
    $fvmmta = "page";
    $GLOBALS["isfyjoigqe"] = "results";
    $GLOBALS["yskgjgsddlq"] = "data";
    $GLOBALS["bfafxpk"] = "response";
    $GLOBALS["jgyjsbqcn"] = "data";
    ${$GLOBALS["owycmylb"]} = "https://saavn-gold.vercel.app/search/playlists?query=" . urlencode(${$GLOBALS["jprnvqdt"]}) . "&page=" . $page . "&limit=" . $limit;
    ${$GLOBALS["bfafxpk"]} = file_get_contents(${$GLOBALS["owycmylb"]});
    ${$GLOBALS["yskgjgsddlq"]} = json_decode(${$GLOBALS["pmxpiixkba"]}, true);
    ${$GLOBALS["isfyjoigqe"]} = ${$GLOBALS["jgyjsbqcn"]}["data"]["results"];
    ${$GLOBALS["damrptdung"]} = ${$GLOBALS["mwfzeqkweb"]}["data"]["total"];
}
echo "\n  ";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ${$GLOBALS["gnrhpyq"]}) {
    $GLOBALS["ozhwqutqy"] = "totalResults";
    $GLOBALS["osnbfcyx"] = "totalPages";
    $GLOBALS["ykywdhi"] = "currentPage";
    $nikakpdrwxej = "prevPage";
    echo "  </div> \n\n\n  <div class=\"mt-5\">\n    <div class=\"card mb-3\">\n      <h3 class=\"card-header\">Total Playlist: ";
    echo $totalResults;
    $GLOBALS["lfnvwdqz"] = "nextPage";
    $puqreq = "limit";
    echo "</h3>\n      <div class=\"table-responsive\">\n        <table class=\"table table-bordered table-striped\">\n          <thead class=\"thead-dark\">\n            <tr>\n              <th>ID</th>\n              <th>Name</th>\n              <th>Year</th>\n              <th>Language</th>\n              <th>Song Count</th>\n              <th>Artists</th>\n              <th>Album Image</th>\n              <th>Action</th>\n            </tr>\n          </thead>\n          <tbody>\n            ";
    $GLOBALS["dtfojawypou"] = "totalPages";
    foreach (${$GLOBALS["gnrhpyq"]} as ${$GLOBALS["fvbntof"]}) {
        $GLOBALS["jrbxghyu"] = "result";
        echo "              <tr>\n                <td>";
        echo $result["id"];
        echo "</td>\n                <td>";
        echo ${$GLOBALS["fvbntof"]}["name"];
        echo "</td>\n                <td>";
        echo ${$GLOBALS["fvbntof"]}["year"];
        echo "</td>\n                <td>";
        echo ${$GLOBALS["fvbntof"]}["language"];
        echo "</td>\n                <td>";
        $vyiuffrwipsg = "result";
        echo ${$GLOBALS["fvbntof"]}["songCount"];
        $GLOBALS["fuldotpfrak"] = "artist";
        echo "</td>\n                <td>\n                  ";
        foreach (${$GLOBALS["fvbntof"]}["primaryArtists"] as $artist) {
            $GLOBALS["bykroohz"] = "artist";
            echo "                    <a href=\"";
            echo $artist["url"];
            echo "\">";
            echo ${$GLOBALS["rtophrrtp"]}["name"];
            echo "</a><br>\n                  ";
        }
        echo "                </td>\n                <td>\n                  <img src=\"";
        echo ${$GLOBALS["fvbntof"]}["image"][2]["link"];
        echo "\" alt=\"";
        echo ${$GLOBALS["fvbntof"]}["name"];
        echo "\" width=\"100\">\n                </td>\n                <td>\n                  <form method=\"POST\" action=\"\">\n                    <input type=\"hidden\" name=\"playlistID\" id=\"playlistID\" value=\"";
        echo ${$vyiuffrwipsg}["id"];
        echo "\" required>\n                    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n                  </form>\n                  ";
        $db->where("albumuqid", ${$GLOBALS["fvbntof"]}["id"]);
        ${$GLOBALS["xyfgjhmqoj"]} = $db->has("category");
        if (${$GLOBALS["xyfgjhmqoj"]} == ${$GLOBALS["fvbntof"]}["id"]) {
            echo "<br>Folder Exist";
        }
        echo "\n                </td>\n              </tr>\n            ";
    }
    echo "          </tbody>\n        </table>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-md-12\">\n      <ul class=\"pagination\">\n        ";
    ${$GLOBALS["ykywdhi"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$GLOBALS["dtfojawypou"]} = ceil(${$GLOBALS["yxwkxlccsgl"]} / ${$puqreq});
    ${$GLOBALS["hwwpynerxnys"]} -= 1;
    ${$GLOBALS["hwwpynerxnys"]} += 1;
    echo "        ";
    if (${$GLOBALS["hwwpynerxnys"]} > 1) {
        $pmlxgfib = "prevPage";
        echo "          <li class=\"page-item\">\n            <form method=\"POST\" action=\"\">\n              <input type=\"hidden\" name=\"playlistkeyword\" value=\"";
        echo ${$GLOBALS["jprnvqdt"]};
        echo "\">\n              <input type=\"hidden\" name=\"page\" value=\"";
        echo $prevPage;
        echo "\">\n              <button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Previous";
        echo "</button>\n            </form>\n          </li>\n        ";
    }
    echo "        ";
    if (${$GLOBALS["hwwpynerxnys"]} < ${$GLOBALS["osnbfcyx"]}) {
        $GLOBALS["cflvkuiow"] = "nextPage";
        echo "          <li class=\"page-item\">\n            <form method=\"POST\" action=\"\">\n              <input type=\"hidden\" name=\"playlistkeyword\" value=\"";
        echo ${$GLOBALS["jprnvqdt"]};
        echo "\">\n              <input type=\"hidden\" name=\"page\" value=\"";
        echo $nextPage;
        echo "\">\n              <button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Next";
        echo "</button>\n            </form>\n          </li>\n        ";
    }
    echo "      </ul>\n    </div>\n  </div>\n";
}
echo "\n\n";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mjxlimcjs = "limit";
    $uqexib = "limit";
    $hfgixinojb = "response";
    $GLOBALS["xiqycoqpx"] = "apiUrl";
    ${$GLOBALS["jprnvqdt"]} = $_POST["albumkeyword"];
    ${$GLOBALS["vwhxfhhl"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$mjxlimcjs} = 10;
    ${$GLOBALS["xiqycoqpx"]} = "https://saavn-gold.vercel.app/search/albums?query=" . urlencode(${$GLOBALS["jprnvqdt"]}) . "&page=" . ${$GLOBALS["vwhxfhhl"]} . "&limit=" . ${$uqexib};
    ${$GLOBALS["pmxpiixkba"]} = file_get_contents(${$GLOBALS["owycmylb"]});
    ${$GLOBALS["mwfzeqkweb"]} = json_decode(${$hfgixinojb}, true);
    ${$GLOBALS["gnrhpyq"]} = ${$GLOBALS["mwfzeqkweb"]}["data"]["results"];
    ${$GLOBALS["yxwkxlccsgl"]} = ${$GLOBALS["mwfzeqkweb"]}["data"]["total"];
}
echo "\n</div>\n\n<div class=\"mt-5\">\n\n  ";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ${$GLOBALS["gnrhpyq"]}) {
    $GLOBALS["gsqduu"] = "result";
    $GLOBALS["jlyugnr"] = "results";
    $gjlcefnrim = "totalPages";
    echo "    <div class=\"card mb-3\">\n      <h3 class=\"card-header\">Total Albums: ";
    echo ${$GLOBALS["byefasp"]};
    $rzjxnx = "nextPage";
    echo "</h3>\n      <div class=\"table-responsive\">\n        <table class=\"table table-bordered table-striped\">\n          <thead class=\"thead-dark\">\n            <tr>\n              <th>ID</th>\n              <th>Name</th>\n              <th>Year</th>\n              <th>Language</th>\n              <th>Song Count</th>\n              <th>Artists</th>\n              <th>Album Image</th>\n              <th>Action</th>\n            </tr>\n          </thead>\n          <tbody>\n            ";
    foreach ($results as $result) {
        $ycylnoqa = "artist";
        $iqftgr = "result";
        $GLOBALS["zpivruonqd"] = "result";
        $GLOBALS["mrfvtcw"] = "result";
        echo "              <tr>\n                <td>";
        $GLOBALS["hoyuwggvlx"] = "result";
        echo ${$GLOBALS["fvbntof"]}["id"];
        echo "</td>\n                <td>";
        echo $result["name"];
        echo "</td>\n                <td>";
        echo $result["year"];
        echo "</td>\n                <td>";
        $GLOBALS["pbzrdobgfu"] = "categoryeaxi";
        echo $result["language"];
        echo "</td>\n                <td>";
        echo ${$GLOBALS["fvbntof"]}["songCount"];
        echo "</td>\n                <td>\n                  ";
        foreach (${$GLOBALS["fvbntof"]}["primaryArtists"] as $artist) {
            echo "                    <a href=\"";
            echo ${$GLOBALS["rtophrrtp"]}["url"];
            $melapqn = "artist";
            echo "\">";
            echo $artist["name"];
            echo "</a><br>\n                  ";
        }
        echo "                </td>\n                <td>\n                  <img src=\"";
        echo ${$GLOBALS["fvbntof"]}["image"][2]["link"];
        echo "\" alt=\"";
        echo ${$GLOBALS["mrfvtcw"]}["name"];
        echo "\" width=\"100\">\n                </td>\n                <td>\n                  <form method=\"POST\" action=\"\">\n                    <input type=\"hidden\" name=\"albumId\" id=\"albumId\" value=\"";
        echo ${$GLOBALS["fvbntof"]}["id"];
        echo "\" required>\n                    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n                  </form>\n                  ";
        $db->where("albumuqid", ${$GLOBALS["fvbntof"]}["id"]);
        $ikcmnwhijfb = "result";
        ${$GLOBALS["pbzrdobgfu"]} = $db->has("category");
        if (${$GLOBALS["xyfgjhmqoj"]} == ${$ikcmnwhijfb}["id"]) {
            echo "<br>Folder Exist";
        }
        echo "\n\n                </td>\n              </tr>\n            ";
    }
    $GLOBALS["unsmswv"] = "currentPage";
    echo "          </tbody>\n        </table>\n      </div>\n    </div>\n  </div>\n  <div class=\"row\">\n    <div class=\"col-md-12\">\n      <ul class=\"pagination\">\n        ";
    ${$GLOBALS["hwwpynerxnys"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$gjlcefnrim} = ceil(${$GLOBALS["yxwkxlccsgl"]} / ${$GLOBALS["oduxodkwpu"]});
    ${$GLOBALS["hwwpynerxnys"]} -= 1;
    ${$GLOBALS["hwwpynerxnys"]} += 1;
    echo "        ";
    if (${$GLOBALS["unsmswv"]} > 1) {
        $GLOBALS["qcifkfco"] = "keyword";
        echo "          <li class=\"page-item\">\n            <form method=\"POST\" action=\"\">\n              <input type=\"hidden\" name=\"albumkeyword\" value=\"";
        echo $keyword;
        $kcjckxuf = "prevPage";
        echo "\">\n              <input type=\"hidden\" name=\"page\" value=\"";
        echo $prevPage;
        echo "\">\n              <button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Previous";
        echo "</button>\n            </form>\n          </li>\n        ";
    }
    echo "        ";
    if (${$GLOBALS["hwwpynerxnys"]} < ${$GLOBALS["yvudockhj"]}) {
        echo "          <li class=\"page-item\">\n            <form method=\"POST\" action=\"\">\n              <input type=\"hidden\" name=\"albumkeyword\" value=\"";
        echo ${$GLOBALS["jprnvqdt"]};
        $GLOBALS["yohioquuiu"] = "nextPage";
        echo "\">\n              <input type=\"hidden\" name=\"page\" value=\"";
        echo $nextPage;
        echo "\">\n              <button type=\"submit\" class=\"page-link btn btn-primary\">";
        echo "Next";
        echo "</button>\n            </form>\n          </li>\n        ";
    }
    echo "      </ul>\n    </div>\n  ";
}
echo "  \n  \n  ";
if (isset($_POST["artistLink"])) {
    $wjyfcerhh = "response";
    $fgxcyvmeocw = "apiUrl";
    $eytgafye = "response";
    ${$GLOBALS["owycmylb"]} = "https://saavn-gold.vercel.app/artists?link=" . urlencode($_POST["artistLink"]);
    ${$wjyfcerhh} = file_get_contents(${$fgxcyvmeocw});
    $GLOBALS["wbxfgnmb"] = "data";
    ${$GLOBALS["mwfzeqkweb"]} = json_decode(${$eytgafye}, true);
    if (${$GLOBALS["wbxfgnmb"]}["status"] === "SUCCESS") {
        $GLOBALS["ucxxuysotvg"] = "artist";
        $bksvyjyxl = "artist";
        $GLOBALS["rniorq"] = "data";
        $GLOBALS["rpxtpdo"] = "image";
        $eeywyjrqngh = "artist";
        $artist = $data["data"];
        echo "    </div>\n\n    <div class=\"card\">\n      <div class=\"card-body\">\n\n        <div class=\"mt-4\">\n          <div class=\"text-center mb-4\">\n            ";
        $yhuwtq = "artist";
        foreach ($artist["image"] as $image) {
            if (${$GLOBALS["kdqsxamciqk"]}["quality"] === "500x500") {
                $difjespzux = "image";
                echo "                <img src=\"";
                echo $image["link"];
                echo "\" alt=\"Artist Image\" class=\"img-thumbnail\" width=\"200\" height=\"200\">\n                ";
                break;
            }
        }
        echo "                      </div>\n                      <table class=\"table\">\n                        <thead>\n                          <tr>\n                            <th>Attribute</th>\n                            <th>Value</th>\n                          </tr>\n                        </thead>\n                        <tbody>\n                          <tr>\n                            <td>Name</td>\n                            <td>";
        echo ${$GLOBALS["rtophrrtp"]}["name"];
        echo "</td>\n                          </tr>\n                          <tr>\n                            <td>Dominant Language</td>\n                            <td>";
        echo ${$eeywyjrqngh}["dominantLanguage"];
        echo "</td>\n                          </tr>\n                          <tr>\n                            <td>Date of Birth</td>\n                            <td>";
        echo ${$yhuwtq}["dob"];
        echo "</td>\n                          </tr>\n                          <tr>\n                            <td>Available Languages</td>\n                            <td>";
        echo implode(", ", ${$GLOBALS["rtophrrtp"]}["availableLanguages"]);
        echo "</td>\n                          </tr>\n                        </tbody>\n                      </table>\n                    </div></div>\n                    ";
    } else {
        echo "<div class=\"mt-4\"><p>No artist found.</p></div>";
    }
}
echo "                \n                ";
if (isset($_POST["artistLink"])) {
    echo "                  <div class=\"text-center mt-4\">\n                    <div class=\"row\">\n                      <div class=\"col-md-6 mb-3\">\n                        <form method=\"POST\">\n                          <input type=\"hidden\" id=\"artistId\" name=\"artistId\" value=\"";
    $GLOBALS["crkwilk"] = "artist";
    echo ${$GLOBALS["rtophrrtp"]}["id"];
    echo "\" required>\n                          <button type=\"submit\" class=\"btn btn-danger btn-block btn-sm\">Get Artist All Songs</button>\n                        </form>\n                      </div>\n                      <div class=\"col-md-6 mb-3\">\n                        <form method=\"POST\">\n                          <input type=\"hidden\" name=\"album\" id=\"album\" value=\"";
    $toceskrrby = "artist";
    echo $artist["id"];
    echo "\" required>\n                          <button type=\"submit\" class=\"btn btn-success btn-block btn-sm\">Get Artist All Albums</button>\n                        </form>\n                      </div>\n                      <div class=\"col-12 text-center\">\n                        \n                        <form id=\"add-artist-form\">\n                          <div class=\"form-group\">\n                            <input type=\"hidden\" name=\"title\" id=\"artist_name\" required value=\"";
    echo $artist["name"];
    echo "\" class=\"form-control\">\n                          </div>\n                          <input type=\"hidden\" name=\"a_check_id\" value=\"";
    echo ${$GLOBALS["rtophrrtp"]}["id"];
    echo "\">\n                          <input type=\"hidden\" name=\"meta_title\" value=\"\">\n                          <input type=\"hidden\" name=\"meta_keyw\" value=\"\">\n                          <input type=\"hidden\" name=\"meta_des\" value=\"\">\n                          <input type=\"hidden\" name=\"thumb_url\" value=\"";
    echo ${$GLOBALS["kdqsxamciqk"]}["link"];
    echo "\">\n                          <input type=\"hidden\" name=\"id\" id=\"id\" value=\"\" />\n                          <input type=\"hidden\" name=\"submit\" id=\"action\" value=\"create\" />\n                          <button type=\"submit\" class=\"btn btn-primary btn-block btn-sm\">Add Artist</button>\n                        </form>\n                      </div>\n                    </div>\n                  </div>\n                  ";
}
echo "\n\n                ";
if (isset($_POST["artistId"])) {
    $fhohvcudmrdr = "apiUrl";
    $GLOBALS["rarbzcespr"] = "songs";
    $GLOBALS["cowjfymby"] = "songs";
    $GLOBALS["uigfsncquf"] = "apiUrl";
    $GLOBALS["ymgjvsp"] = "response";
    $GLOBALS["hyibhw"] = "response";
    $rlgrspjd = "artistId";
    $GLOBALS["synlslydfb"] = "categorylist";
    $artistId = $_POST["artistId"];
    $fgwkkeqktg = "totalPages";
    $weymuqyyu = "data";
    ${$GLOBALS["vwhxfhhl"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$fhohvcudmrdr} = "https://saavn-gold.vercel.app/artists/{$artistId}/songs?page={$page}";
    ${$GLOBALS["hyibhw"]} = file_get_contents(${$GLOBALS["uigfsncquf"]});
    ${$weymuqyyu} = json_decode(${$GLOBALS["ymgjvsp"]}, true);
    ${$GLOBALS["rarbzcespr"]} = ${$GLOBALS["mwfzeqkweb"]}["data"]["results"];
    echo "                </div> \n                <form method=\"POST\" action=\"\">\n                  <div class=\"mt-5\">\n                    <div class=\"card mb-3\">\n                      <div class=\"table-responsive\">\n                        <table class=\"table table-bordered table-striped\">\n                          <thead class=\"thead-dark\">\n                            <tr>\n                              <th class=\"select-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" style=\"width: 1px;\" aria-label=\"\">\n                                <input type=\"checkbox\" id=\"checkAllVideos\" onclick=\"toggleAllVideos(this);\">\n                              </th>\n                              <th>Thumb</th>\n                              <th>Name</th>\n                              <th>Year</th>\n                              <th>Artist</th>\n                              <th>Language</th>\n                              <th>Label</th>\n                            </tr>\n                          </thead>\n                          <tbody>\n                            ";
    foreach (${$GLOBALS["cowjfymby"]} as ${$GLOBALS["iethhkwtf"]}) {
        $GLOBALS["sprmbejpklvh"] = "song";
        $czjoubggv = "song";
        $GLOBALS["xbsfpmlty"] = "song";
        $ywtehv = "song";
        $txvnzyqj = "image";
        $sjfdori = "fileExists";
        $GLOBALS["ilkihcmoxdm"] = "song";
        $jkflmdpvuu = "song";
        echo "                              <tr>\n                               ";
        $kdgmrfzs = "image";
        $db->where("check_id", $song["id"]);
        $fileExists = $db->has("file");
        if (${$GLOBALS["gitocace"]} == ${$GLOBALS["iethhkwtf"]}["id"]) {
            echo "<td> </td>";
        } else {
            echo "<td><input type=\"checkbox\" class=\"video-checkbox\" name=\"id[]\" value=\"" . ${$GLOBALS["iethhkwtf"]}["id"] . "\"></td>";
        }
        echo "<td>\n                             ";
        foreach (${$GLOBALS["xbsfpmlty"]}["image"] as ${$kdgmrfzs}) {
            if (${$GLOBALS["kdqsxamciqk"]}["quality"] === "500x500") {
                echo "<img src=\"" . ${$GLOBALS["kdqsxamciqk"]}["link"] . "\" alt=\"Thumbnail\" class=\"img-fluid\" style=\"max-width: 80px;\">";
            }
        }
        echo "                          </td>\n                          <input type=\"hidden\" name=\"songthumb_";
        echo ${$GLOBALS["ilkihcmoxdm"]}["id"];
        echo "\" value=\"";
        $GLOBALS["psrgysu"] = "song";
        echo ${$txvnzyqj}["link"];
        echo "\">\n                          <td><input type=\"text\" name=\"titlename_";
        echo ${$GLOBALS["iethhkwtf"]}["id"];
        echo "\" value=\"";
        echo ${$czjoubggv}["name"];
        echo "\" class=\"form-control\"></td>\n                          \n                          ";
        echo "                          <td>";
        echo ${$jkflmdpvuu}["year"];
        $lnmlgpjfmws = "downloadLink";
        echo "</td>\n                          ";
        $GLOBALS["rsefmrrrbcr"] = "album";
        echo "                          <td><input type=\"text\" name=\"artistname_";
        echo ${$GLOBALS["iethhkwtf"]}["id"];
        echo "\" value=\"";
        echo ${$GLOBALS["iethhkwtf"]}["primaryArtists"];
        echo "\" class=\"form-control\"></td>\n                          \n                          <td>";
        echo ${$GLOBALS["iethhkwtf"]}["language"];
        echo "</td>\n                          <input type=\"hidden\" name=\"songlyricstruefalase\" value=\"";
        echo ${$GLOBALS["iethhkwtf"]}["hasLyrics"];
        $wnoklijl = "downloadLink";
        echo "\">\n                          <input type=\"hidden\" name=\"lang\" value=\"";
        echo ${$GLOBALS["iethhkwtf"]}["language"];
        echo "\">\n                          <input type=\"hidden\" name=\"album_name\" value=\"";
        echo $album["name"];
        $GLOBALS["sprmknugpf"] = "download";
        echo "\">\n                          \n                          <input type=\"hidden\" name=\"step2\" value=\"2\">\n                          <td>";
        echo ${$GLOBALS["sprmbejpklvh"]}["label"];
        echo "</td>\n                          ";
        $downloadLink = null;
        foreach ($song["downloadUrl"] as $download) {
            $utdqcgiqr = "download";
            if ($download["quality"] === "320kbps") {
                $GLOBALS["kuxtmzlgkfi"] = "downloadLink";
                $downloadLink = ${$GLOBALS["nulsrirt"]}["link"];
                break;
            } elseif (${$GLOBALS["nulsrirt"]}["quality"] === "160kbps") {
                $iootttzjs = "download";
                ${$GLOBALS["nyytovlbpyn"]} = $download["link"];
            }
        }
        if (${$lnmlgpjfmws}) {
            $lwmhcbg = "song";
            echo "<input type=\"hidden\" name=\"dlink_" . $song["id"] . "\" value=\"" . ${$GLOBALS["nyytovlbpyn"]} . "\">";
        }
        echo "                         ";
        if (${$GLOBALS["iethhkwtf"]}["hasLyrics"] == true) {
            $GLOBALS["bxmqnmjwtt"] = "data";
            $qqffvrbiyp = "songId";
            $fdirspj = "url";
            $GLOBALS["kdvmsoinj"] = "writers";
            $GLOBALS["yynmzu"] = "songId";
            echo "                           ";
            $songId = ${$GLOBALS["iethhkwtf"]}["id"];
            ${$GLOBALS["sysvrenpyuq"]} = "https://maxsecurehost.com/api/jio/lyrics.php?id=" . urlencode($songId);
            ${$GLOBALS["bxmqnmjwtt"]} = json_decode(file_get_contents(${$fdirspj}), true);
            ${$GLOBALS["wwerry"]} = ${$GLOBALS["mwfzeqkweb"]}["snippet"];
            ${$GLOBALS["ppsjnwtjy"]} = ${$GLOBALS["mwfzeqkweb"]}["lyrics"];
            ${$GLOBALS["niybfpd"]} = ${$GLOBALS["mwfzeqkweb"]}["writers"];
            echo "<input type=\"hidden\" name=\"songlyrics_" . ${$GLOBALS["iethhkwtf"]}["id"] . "\" value=\"" . htmlspecialchars(${$GLOBALS["ppsjnwtjy"]}) . "\">";
            echo "<input type=\"hidden\" name=\"lyricswriter_" . ${$GLOBALS["iethhkwtf"]}["id"] . "\" value=\"" . htmlspecialchars(${$GLOBALS["kdvmsoinj"]}) . "\">";
            echo "                        ";
        } else {
            echo "                        ";
        }
        echo "\n                      </tr>\n                    ";
    }
    $uuezwsjwo = "page";
    echo "\n                  </tbody>\n                </table>\n              </div>\n            </div>\n          </div>\n          <div class=\"card\">\n            <div class=\"card-body\">\n              <div class=\"row\">\n                <div class=\"col-sm-6\">\n                  <label for=\"title\">Select category</label>\n                  ";
    ${$GLOBALS["synlslydfb"]} = $db->orderBy("id", "desc")->get("category");
    if ($db->count > 0) {
        $zxbchpcpah = "categorylist";
        echo "<div class=\"select-wrapper\">";
        echo "<select name=\"cid\" id=\"category-select\" class=\"form-select\">";
        echo "<option value=\"\" disabled selected>Select Category</option>";
        foreach ($categorylist as ${$GLOBALS["khejbnary"]}) {
            $GLOBALS["xkrlgzujgd"] = "cat_id";
            $GLOBALS["ynmwsyy"] = "row";
            $wmqxccfkymeb = "row";
            $GLOBALS["jejooof"] = "row";
            echo "<option value=\"" . $row["id"] . "\"";
            if ($cat_id == $row["id"]) {
                echo " selected";
            }
            echo ">" . ucwords(${$GLOBALS["ynmwsyy"]}["name"]) . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }
    echo "                </div>\n                <div class=\"col-sm-6 text-sm-end text-center mt-2 mt-sm-0\">\n                  <button id=\"submit-selected\" type=\"submit\" class=\"btn btn-primary btn-lg\">\n                    <i class=\"fa fa-upload\"></i> Upload\n                  </button>\n                </div>\n              </div>\n            </div>\n          </div>\n        </form>\n        ";
    ${$fgwkkeqktg} = ${$GLOBALS["mwfzeqkweb"]}["data"]["lastPage"] ? ${$GLOBALS["vwhxfhhl"]} : ${$GLOBALS["vwhxfhhl"]} + 1;
    echo "<div class=\"card\">";
    echo "<div class=\"card-body\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col text-center\">";
    if (${$uuezwsjwo} > 1) {
        echo "<form class=\"d-inline-block\" method=\"POST\" style=\"display: inline-block;\">";
        echo "<input type=\"hidden\" name=\"artistId\" value=\"" . ${$GLOBALS["vqqncg"]} . "\">";
        echo "<input type=\"hidden\" name=\"page\" value=\"" . (${$GLOBALS["vwhxfhhl"]} - 1) . "\">";
        echo "<button type=\"submit\" class=\"btn btn-primary\">Previous</button>";
        echo "</form>";
    }
    echo "</div>";
    echo "<div class=\"col text-center\">";
    if (!${$GLOBALS["mwfzeqkweb"]}["data"]["lastPage"]) {
        $viimqsbejd = "artistId";
        echo "<form class=\"d-inline-block\" method=\"POST\" style=\"display: inline-block;\">";
        echo "<input type=\"hidden\" name=\"artistId\" value=\"" . $artistId . "\">";
        echo "<input type=\"hidden\" name=\"page\" value=\"" . (${$GLOBALS["vwhxfhhl"]} + 1) . "\">";
        echo "<button type=\"submit\" class=\"btn btn-primary\">Next</button>";
        echo "</form>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
echo "\n\n\n\n\n\n\n      ";
if (isset($_POST["album"])) {
    $vppxguva = "album";
    $kboielkgxedk = "data";
    $GLOBALS["yhzykuf"] = "response";
    $album = $_POST["album"];
    ${$GLOBALS["vwhxfhhl"]} = isset($_POST["page"]) ? $_POST["page"] : 1;
    ${$GLOBALS["sysvrenpyuq"]} = "https://saavn-gold.vercel.app/artists/{$album}/albums?page={$page}";
    ${$GLOBALS["yhzykuf"]} = file_get_contents(${$GLOBALS["sysvrenpyuq"]});
    ${$GLOBALS["mwfzeqkweb"]} = json_decode(${$GLOBALS["pmxpiixkba"]}, true);
    if (${$kboielkgxedk}["status"] == "SUCCESS") {
        $GLOBALS["nybmhanjnu"] = "total";
        $GLOBALS["ytshgthbwnks"] = "nextPage";
        $GLOBALS["lxhbjxovp"] = "total";
        $ljbghlfitq = "page";
        $amxyjkqac = "data";
        $GLOBALS["neexedeore"] = "album";
        $qmgfqxlkg = "prevPage";
        $GLOBALS["fsheggvw"] = "total";
        $total = ${$GLOBALS["mwfzeqkweb"]}["data"]["total"];
        ${$GLOBALS["gnrhpyq"]} = $data["data"]["results"];
        $eohrckysrf = "results";
        $GLOBALS["cgcsddd"] = "result";
        $GLOBALS["qeqbtrj"] = "nextPage";
        echo "             </div> \n\n        <div class=\"mt-5\">\n          <div class=\"card mb-3\">\n            <h3 class=\"card-header\">Total Aldbums: ";
        echo ${$GLOBALS["fsheggvw"]};
        echo "</h3>\n            <div class=\"table-responsive\">\n              <table class=\"table table-bordered table-striped\">\n                <thead class=\"thead-dark\">\n                  <tr>\n                    <th>Name</th>\n                    <th>Year</th>\n                    <th>Language</th>\n                    <th>Count</th>\n                    <th>Artist</th>\n                    <th>Album Image</th>\n                    <th>Action</th>\n                  </tr>\n                </thead>\n                <tbody>\n                  ";
        $GLOBALS["fdtbbqoyg"] = "prevPage";
        foreach ($results as $result) {
            $GLOBALS["ldhclmjjb"] = "type";
            $yycjuyehle = "albumUrl";
            $GLOBALS["tzjxsiuay"] = "id";
            $id = ${$GLOBALS["fvbntof"]}["id"];
            $nubyxoi = "songCount";
            ${$GLOBALS["glvssumm"]} = ${$GLOBALS["fvbntof"]}["name"];
            ${$GLOBALS["xbnjgydgxgi"]} = ${$GLOBALS["fvbntof"]}["year"];
            $rptdhjirpg = "result";
            ${$GLOBALS["ldhclmjjb"]} = ${$GLOBALS["fvbntof"]}["type"];
            ${$GLOBALS["vkqvky"]} = ${$GLOBALS["fvbntof"]}["language"];
            ${$nubyxoi} = ${$rptdhjirpg}["songCount"];
            ${$yycjuyehle} = ${$GLOBALS["fvbntof"]}["url"];
            echo "\n                    <tr>\n                      <td><a href='";
            echo ${$GLOBALS["xgstchbay"]};
            echo "' target='_blank'>";
            echo ${$GLOBALS["glvssumm"]};
            $osermwr = "result";
            echo "</a></td>\n                      <td>";
            $GLOBALS["nbsnmsbkyu"] = "songCount";
            echo ${$GLOBALS["xbnjgydgxgi"]};
            echo "</td>\n                      <td>";
            echo ${$GLOBALS["vkqvky"]};
            echo "</td>\n                      <td>";
            echo $songCount;
            echo "</td>\n                      <td>\n                        ";
            foreach (${$GLOBALS["fvbntof"]}["primaryArtists"] as ${$GLOBALS["rtophrrtp"]}) {
                $mfbeciqxlvrr = "artist";
                $GLOBALS["iqsgzkei"] = "artistUrl";
                ${$GLOBALS["egvdsclku"]} = $artist["name"];
                ${$GLOBALS["iqsgzkei"]} = ${$GLOBALS["rtophrrtp"]}["url"];
                echo "<a href='{$artistUrl}' target='_blank'>{$artistName}</a><br>";
            }
            echo "                      </td>\n                      <td>\n                        ";
            foreach (${$osermwr}["image"] as ${$GLOBALS["kdqsxamciqk"]}) {
                $olrmsslf = "image";
                if ($image["quality"] == "150x150") {
                    $kobijakw = "image";
                    $yrnjpur = "imageUrl";
                    $imageUrl = $image["link"];
                    echo "<img src='{$imageUrl}' alt='Album Image' class='img-fluid' style='max-width: 100px;'><br>";
                }
            }
            echo "                                    </td>\n                                    <td>\n                                      <form method=\"POST\" action=\"\">\n                                        <input type=\"hidden\" name=\"albumId\" id=\"albumId\" value=\"";
            echo ${$GLOBALS["djxdlqu"]};
            echo "\" required>\n                                        <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cloud-upload-alt\"></i></button>\n                                      </form>\n                                    </td>\n                                  </tr>\n                                  ";
        }
        echo "                              </tbody>\n                            </table>\n                          </div>\n                        </div>\n\n                        <!-- Pagination buttons -->\n                        <div class=\"row\">\n                          <div class=\"col\">\n                            ";
        ${$GLOBALS["vwhxfhhl"]} -= 1;
        ${$ljbghlfitq} += 1;
        echo "                            <form method='POST' action=''>\n                              <input type='hidden' name='album' value='";
        echo ${$GLOBALS["neexedeore"]};
        echo "'>\n                              <input type='hidden' name='page' value='";
        echo ${$GLOBALS["fdtbbqoyg"]};
        echo "'>\n                              ";
        if (${$GLOBALS["vwhxfhhl"]} > 1) {
            echo "<div class='text-center'><button type='submit' class='btn btn-primary btn-lg'>Previous</button></div>";
        }
        echo "                            </form>\n                          </div>\n                          <div class=\"col\">\n                            <form method='POST' action=''>\n                              <input type='hidden' name='album' value='";
        $GLOBALS["cselkuqivru"] = "album";
        echo $album;
        echo "'>\n                              <input type='hidden' name='page' value='";
        echo ${$GLOBALS["ytshgthbwnks"]};
        echo "'>\n                              ";
        if (${$GLOBALS["lxhbjxovp"]} > ${$GLOBALS["vwhxfhhl"]} * 10) {
            echo "<div class='text-center'><button type='submit' class='btn btn-primary btn-lg'>Next</button></div>";
        }
        echo "                            </form>\n                          </div>\n                        </div>\n\n                        ";
    } else {
        echo "<p>Error occurred while fetching data from the API.</p>";
    }
}
echo "\n\n\n\n                    ";
if (isset($_POST["playlistID"])) {
    $GLOBALS["dytttboa"] = "apiUrl";
    $txeovdlspjv = "apiUrl";
    $vovbyhqn = "response";
    ${$GLOBALS["jrqnnfhvvv"]} = $_POST["playlistID"];
    ${$GLOBALS["dytttboa"]} = "https://saavn.me/playlists?id={$playlistID}";
    ${$GLOBALS["pmxpiixkba"]} = file_get_contents(${$txeovdlspjv});
    ${$GLOBALS["mwfzeqkweb"]} = json_decode(${$vovbyhqn}, true);
    $GLOBALS["gmufkksbd"] = "data";
    if ($data["status"] === "SUCCESS") {
        $GLOBALS["pboxovboozml"] = "album";
        $GLOBALS["eezweyttkp"] = "album";
        $GLOBALS["iogvdd"] = "album_id";
        $hjilkie = "album";
        $GLOBALS["htjvbfaynznh"] = "album";
        $album = ${$GLOBALS["mwfzeqkweb"]}["data"];
        ${$GLOBALS["ezfhbtswjiyr"]} = $album["name"];
        ${$GLOBALS["iovvmwbmv"]} = ${$hjilkie}["songCount"];
        ${$GLOBALS["fsjtye"]} = ${$GLOBALS["eezweyttkp"]}["songs"];
        echo "                      </div> \n\n                      <div class=\"mt-5\">\n                        <div class=\"card mb-3\">\n                          <img src=\"";
        echo ${$GLOBALS["wblnnrhhmt"]}["image"][2]["link"];
        echo "\" alt=\"Album Image\" class=\"card-img-top rounded mt-3\" style=\"max-width: 200px; margin: 0 auto; border: 2px solid #ddd;\">\n                          <div class=\"card-body\">\n                            <div class=\"table-responsive\">\n                              <table class=\"table\">\n                                <tbody>\n                                  <tr>\n                                    <th scope=\"row\">Playlist Name</th>\n                                    <td>";
        echo ${$GLOBALS["ezfhbtswjiyr"]};
        echo "</td>\n                                  </tr>\n                                  <tr>\n                                    <th scope=\"row\">Count</th>\n                                    <td>";
        echo ${$GLOBALS["iovvmwbmv"]};
        echo "</td>\n                                  </tr>\n                                </tbody>\n                              </table>\n                            </div>\n                            <div class=\"row\">\n                              <div class=\"col-12\">\n                               <form id=\"add-category-form\" class=\"add-category-form\" data-album-id=\"";
        echo ${$GLOBALS["iogvdd"]};
        $udzukwwmtu = "playlistID";
        echo "\">\n                                <div class=\"form-group\">\n                                  <input type=\"text\" name=\"category_name\" value=\"";
        echo ${$GLOBALS["ezfhbtswjiyr"]};
        echo "\" required class=\"form-control\">\n                                </div>\n                                <input type=\"hidden\" name=\"thumbfrom\" value=\"EXTERNAL_LINK\" required>\n                                <input type=\"hidden\" name=\"thumb_url\" value=\"";
        echo ${$GLOBALS["wblnnrhhmt"]}["image"][2]["link"];
        echo "\" required>\n\n                                <div class=\"form-group\">\n                                  <label for=\"parentid\">Select category</label>\n                                  ";
        ${$GLOBALS["onsvswlnsp"]} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            $ulnqphwbegup = "row";
            echo "<select name=\"parentid\" id=\"category-select1\" class=\"form-control\">\n                                    <option value=\"\" disabled selected>Select Category</option>";
            $byszlyvmvo = "categorylist";
            foreach ($categorylist as $row) {
                $zbgqfzwxwdn = "row";
                $GLOBALS["tmijwqi"] = "row";
                echo "<option value=\"" . $row["id"] . "\"";
                $uboqqumi = "row";
                if (${$GLOBALS["lhswjsxs"]} == $row["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$uboqqumi}["name"]) . "</option>";
            }
            echo "</select>";
        }
        echo "                                </div>\n\n                                <input type=\"hidden\" name=\"albumuqid\" value=\"";
        echo ${$udzukwwmtu};
        echo "\">\n                                <input type=\"hidden\" name=\"added_home\" value=\"1\">\n                                <input type=\"hidden\" name=\"release_year\" value=\"";
        echo date("Y");
        echo "\">\n                                <input type=\"hidden\" name=\"meta_title\" value=\"\">\n                                <input type=\"hidden\" name=\"meta_keyw\" value=\"\">\n                                <input type=\"hidden\" name=\"meta_des\" value=\"\">\n                                <input type=\"hidden\" name=\"status\" value=\"1\">\n                                <input type=\"hidden\" name=\"newtag\" value=\"1\">\n                                <input type=\"hidden\" name=\"submit\" value=\"create\">\n                                \n                                <button type=\"submit\" class=\"btn btn-primary\">Create</button>\n                              </form>\n                            </div>\n                          </div>\n                        </div>\n                      </div>\n                      <form method=\"POST\" action=\"\">\n                        <div class=\"card mb-3\">\n                          <div class=\"row\">\n                            <div class=\"col-md-12\">\n                              <div class=\"table-responsive\">\n                                <table class=\"table table-bordered table-hover songs-table\">\n                                  <thead class=\"thead-dark\">\n                                    <tr>\n                                      <th class=\"select-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" style=\"width: 1px;\" aria-label=\"\">\n                                        <input type=\"checkbox\" id=\"checkAllVideos\" onclick=\"toggleAllVideos(this);\">\n                                      </th>\n                                      <th>Thumb</th>\n                                      <th>Title</th>\n                                      <th>Artist</th>\n                                      <th>Language</th>\n                                      <th>Label</th>\n                                    </tr>\n                                  </thead>\n                                  <tbody>\n                                    ";
        foreach (${$GLOBALS["fsjtye"]} as ${$GLOBALS["iethhkwtf"]}) {
            $bjmtpzd = "song";
            $GLOBALS["opeffhoy"] = "image";
            echo "                                      <tr>\n                                        ";
            $hcjtukkmcyu = "imageUrl";
            $GLOBALS["qoiukho"] = "desiredQualities";
            $GLOBALS["hscbugppdeke"] = "fileExists";
            $GLOBALS["fripqhiwj"] = "imageUrl";
            $db->where("check_id", $song["id"]);
            $GLOBALS["aibdxjjaw"] = "imageUrl";
            $GLOBALS["ilrbqvxgjit"] = "song";
            $GLOBALS["hxhnpyvfh"] = "song";
            $fileExists = $db->has("file");
            if (${$GLOBALS["gitocace"]} == $song["id"]) {
                echo "<td> </td>";
            } else {
                echo "<td><input type=\"checkbox\" class=\"video-checkbox\" name=\"id[]\" value=\"" . ${$GLOBALS["iethhkwtf"]}["id"] . "\"></td>";
            }
            echo "                                        ";
            ${$hcjtukkmcyu} = "";
            foreach (${$GLOBALS["iethhkwtf"]}["image"] as ${$GLOBALS["opeffhoy"]}) {
                if (${$GLOBALS["kdqsxamciqk"]}["quality"] === "500x500") {
                    ${$GLOBALS["jocatritin"]} = ${$GLOBALS["kdqsxamciqk"]}["link"];
                    break;
                }
            }
            if (!empty(${$GLOBALS["fripqhiwj"]})) {
                $acvbkvsbmf = "imageUrl";
                echo "                                          <td><img src=\"";
                echo $imageUrl;
                echo "\" alt=\"Song Image (500x500)\" class=\"img-fluid\" style=\"max-width: 80px;\"></td>\n                                          \n                                        ";
            } else {
                echo "                                          <td>Image not available.</td>\n                                        ";
            }
            echo "\n                                        <input type=\"hidden\" name=\"songthumb_";
            echo ${$GLOBALS["iethhkwtf"]}["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["aibdxjjaw"]};
            $jqdytm = "song";
            echo "\">\n                                        <td><input type=\"text\" name=\"titlename_";
            $zmmnecwrtfr = "song";
            echo $song["id"];
            echo "\" value=\"";
            $GLOBALS["fdugxeux"] = "song";
            echo ${$GLOBALS["iethhkwtf"]}["name"];
            echo "\" class=\"form-control\"></td>\n                                        <td><input type=\"text\" name=\"artistname_";
            echo ${$GLOBALS["hxhnpyvfh"]}["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["iethhkwtf"]}["primaryArtists"];
            echo "\" class=\"form-control\"></td>\n                                        <input type=\"hidden\" name=\"step2\" value=\"2\">\n                                        ";
            ${$GLOBALS["qoiukho"]} = ["320kbps", "160kbps", "96kbps", "48kbps"];
            ${$GLOBALS["nyytovlbpyn"]} = "";
            $stlrppvnxh = "desiredQuality";
            foreach (${$GLOBALS["ijhaies"]} as $desiredQuality) {
                $jwtgkose = "download";
                foreach (${$GLOBALS["iethhkwtf"]}["downloadUrl"] as $download) {
                    $huthrjeiwlj = "download";
                    if ($download["quality"] === ${$GLOBALS["tbtncrpavh"]}) {
                        $heujpsymgat = "downloadLink";
                        $downloadLink = ${$GLOBALS["nulsrirt"]}["link"];
                        break 2;
                    }
                }
            }
            $GLOBALS["ihcpjedtkl"] = "album";
            if (!empty(${$GLOBALS["nyytovlbpyn"]})) {
                echo "                                          <input type=\"hidden\" name=\"dlink_";
                echo ${$GLOBALS["iethhkwtf"]}["id"];
                $GLOBALS["cvmbacuuk"] = "downloadLink";
                echo "\" value=\"";
                echo $downloadLink;
                echo "\">\n                                        ";
            } else {
                echo "                                          <td>Download not available.</td>\n                                        ";
            }
            echo "\n                                        <td>";
            $eyonlvdm = "song";
            echo ${$zmmnecwrtfr}["language"];
            echo "</td>\n                                        <input type=\"hidden\" name=\"lang\" value=\"";
            echo ${$GLOBALS["fdugxeux"]}["language"];
            echo "\">\n                                        <input type=\"hidden\" name=\"album_name\" value=\"";
            echo ${$GLOBALS["ihcpjedtkl"]}["name"];
            echo "\">\n                                        <td>";
            echo $song["label"];
            echo "</td>\n                                      </tr>\n                                      ";
            if (${$GLOBALS["iethhkwtf"]}["hasLyrics"] == true) {
                $GLOBALS["fjwgclv"] = "writers";
                $dlouapwewj = "songId";
                $GLOBALS["dlblbinj"] = "snippet";
                $cklkcm = "lyrics";
                $GLOBALS["ysvsgcecyj"] = "lyrics";
                $tkpbiikk = "writers";
                echo "                                       ";
                $GLOBALS["badriuxx"] = "song";
                $songId = $song["id"];
                ${$GLOBALS["sysvrenpyuq"]} = "https://maxsecurehost.com/api/jio/lyrics.php?id=" . urlencode(${$GLOBALS["ikqjknhm"]});
                $GLOBALS["vguyjwrjc"] = "data";
                $eqwpxgt = "song";
                ${$GLOBALS["mwfzeqkweb"]} = json_decode(file_get_contents(${$GLOBALS["sysvrenpyuq"]}), true);
                ${$GLOBALS["dlblbinj"]} = ${$GLOBALS["vguyjwrjc"]}["snippet"];
                $GLOBALS["uuewenl"] = "song";
                ${$cklkcm} = ${$GLOBALS["mwfzeqkweb"]}["lyrics"];
                ${$tkpbiikk} = ${$GLOBALS["mwfzeqkweb"]}["writers"];
                echo "<input type=\"hidden\" name=\"songlyrics_" . ${$eqwpxgt}["id"] . "\" value=\"" . htmlspecialchars(${$GLOBALS["ysvsgcecyj"]}) . "\">";
                echo "<input type=\"hidden\" name=\"lyricswriter_" . ${$GLOBALS["uuewenl"]}["id"] . "\" value=\"" . htmlspecialchars(${$GLOBALS["fjwgclv"]}) . "\">";
                echo "                                     ";
            } else {
                echo "                                     ";
            }
            echo "\n                                   ";
        }
        echo "\n                                 </tbody>\n                               </table>\n                             </div>\n                           </div>\n                         </div>\n                       </div>\n                       \n                       <div class=\"card\">\n                        <div class=\"card-body\">\n                          <div class=\"row\">\n                            <div class=\"col-sm-6\">\n                              <label for=\"title\">Select category</label>\n                              ";
        ${$GLOBALS["onsvswlnsp"]} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            echo "<div class=\"select-wrapper\">";
            $GLOBALS["qvylcrgywc"] = "categorylist";
            echo "<select name=\"cid\" id=\"category-select\" class=\"form-select\">";
            echo "<option value=\"\" disabled selected>Select Category</option>";
            foreach ($categorylist as ${$GLOBALS["khejbnary"]}) {
                $ahkrjnbh = "row";
                $pncrmexuvf = "row";
                $urimqufrwy = "row";
                echo "<option value=\"" . $row["id"] . "\"";
                if (${$GLOBALS["lhswjsxs"]} == $row["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$urimqufrwy}["name"]) . "</option>";
            }
            echo "</select>";
            echo "</div>";
        }
        echo "                            </div>\n                            <div class=\"col-sm-6 text-sm-end text-center mt-2 mt-sm-0\">\n                              <button id=\"submit-selected\" type=\"submit\" class=\"btn btn-primary btn-lg\">\n                                <i class=\"fa fa-upload\"></i> Upload\n                              </button>\n                            </div>\n                          </div>\n                        </div>\n                      </div>\n                    </form>\n                    ";
    } else {
        echo "<div class=\"alert alert-danger\">Invalid playlist ID. Please try again.</div>";
    }
}
echo "\n\n\n\n                ";
if (isset($_POST["albumId"])) {
    $hezwwhgghd = "apiUrl";
    $cclhfiuxsfp = "response";
    $emcfljg = "data";
    ${$GLOBALS["ihbpflq"]} = $_POST["albumId"];
    $GLOBALS["alcyclxiwdyq"] = "response";
    ${$GLOBALS["owycmylb"]} = "https://saavn-gold.vercel.app/albums?id={$albumId}";
    ${$GLOBALS["alcyclxiwdyq"]} = file_get_contents(${$hezwwhgghd});
    $GLOBALS["jdlnjscao"] = "data";
    ${$emcfljg} = json_decode(${$cclhfiuxsfp}, true);
    if (${$GLOBALS["jdlnjscao"]}["status"] === "SUCCESS") {
        $wayxutk = "data";
        $GLOBALS["kkxwriwfzif"] = "album";
        $album = $data["data"];
        $GLOBALS["mwkfikmviq"] = "categorylist";
        $clgedjpehqjt = "song";
        $GLOBALS["dbggnlhvc"] = "album";
        echo "                  </div>\n\n                  <div class=\"mt-5\">\n                    <div class=\"card mb-3\">\n                      <img src=\"";
        echo $album["image"][2]["link"];
        echo "\" alt=\"Album Image\" class=\"card-img-top rounded mt-3\" style=\"max-width: 200px; margin: 0 auto; border: 2px solid #ddd;\">\n                      <div class=\"card-body\">\n                        <div class=\"table-responsive\">\n                          <table class=\"table\">\n                            <tbody>\n                              <tr>\n                                <th scope=\"row\">Album Name</th>\n                                <td>";
        echo ${$GLOBALS["wblnnrhhmt"]}["name"];
        $GLOBALS["rurhodasmo"] = "album";
        echo "</td>\n                              </tr>\n                              <tr>\n                                <th scope=\"row\">Release Date</th>\n                                <td>";
        echo ${$GLOBALS["wblnnrhhmt"]}["releaseDate"];
        echo "</td>\n                              </tr>\n                              <tr>\n                                <th scope=\"row\">Count</th>\n                                <td>";
        echo ${$GLOBALS["wblnnrhhmt"]}["songCount"];
        echo "</td>\n                              </tr>\n                              <tr>\n                                <th scope=\"row\">Artist</th>\n                                <td>";
        echo ${$GLOBALS["wblnnrhhmt"]}["primaryArtists"];
        echo "</td>\n                              </tr>\n                            </tbody>\n                          </table>\n                        </div>\n                        <div class=\"row\">\n                          <div class=\"col-12\">\n\n                            <form id=\"add-category-form\" class=\"add-category-form\" data-album-id=\"";
        echo ${$GLOBALS["ddsrlmxse"]};
        echo "\">\n                              <div class=\"form-group\">\n                                <input type=\"text\" name=\"category_name\" value=\"";
        echo $album["name"];
        echo " - ";
        echo ${$GLOBALS["wblnnrhhmt"]}["primaryArtists"];
        echo "\" required class=\"form-control\">\n                              </div>\n                              <input type=\"hidden\" name=\"thumbfrom\" value=\"EXTERNAL_LINK\" required>\n                              <input type=\"hidden\" name=\"thumb_url\" value=\"";
        echo ${$GLOBALS["wblnnrhhmt"]}["image"][2]["link"];
        echo "\" required>\n\n                              <div class=\"form-group\">\n                                <label for=\"parentid\">Select category</label>\n                                ";
        $categorylist = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            echo "<select name=\"parentid\" id=\"category-select1\" class=\"form-control\">\n                                  <option value=\"\" disabled selected>Select Category</option>";
            foreach (${$GLOBALS["onsvswlnsp"]} as ${$GLOBALS["khejbnary"]}) {
                $GLOBALS["vfyvgiuatyge"] = "row";
                echo "<option value=\"" . ${$GLOBALS["khejbnary"]}["id"] . "\"";
                if (${$GLOBALS["lhswjsxs"]} == $row["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$GLOBALS["khejbnary"]}["name"]) . "</option>";
            }
            echo "</select>";
        }
        $kpnfcell = "album";
        echo "                              </div>\n                              <input type=\"hidden\" name=\"albumuqid\" value=\"";
        echo ${$GLOBALS["ihbpflq"]};
        echo "\">\n                              <input type=\"hidden\" name=\"added_home\" value=\"1\">\n                              <input type=\"hidden\" name=\"release_year\" value=\"";
        echo date("Y");
        echo "\">\n                              <input type=\"hidden\" name=\"meta_title\" value=\"\">\n                              <input type=\"hidden\" name=\"meta_keyw\" value=\"\">\n                              <input type=\"hidden\" name=\"meta_des\" value=\"\">\n                              <input type=\"hidden\" name=\"status\" value=\"1\">\n                              <input type=\"hidden\" name=\"newtag\" value=\"1\">\n                              <input type=\"hidden\" name=\"submit\" value=\"create\">\n                              \n                              <button type=\"submit\" class=\"btn btn-primary\">Create</button>\n                            </form>\n\n\n                          </div>\n                        </div>\n                      </div>\n                    </div>\n                    <form method=\"POST\" action=\"\">\n                      <div class=\"card mb-3\">\n                        <div class=\"row\">\n                          <div class=\"col-md-12\">\n                            <div class=\"table-responsive\">\n                              <table class=\"table table-bordered table-hover songs-table\">\n                                <thead class=\"thead-dark\">\n                                  <tr>\n                                    <th class=\"select-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" style=\"width: 1px;\" aria-label=\"\">\n                                      <input type=\"checkbox\" id=\"checkAllVideos\" onclick=\"toggleAllVideos(this);\">\n                                    </th>\n                                    <th>Thumb</th>\n                                    <th>Title</th>\n                                    <th>Artist</th>\n                                    <th>Language</th>\n                                    <th>Label</th>\n                                  </tr>\n                                </thead>\n                                <tbody>\n                                  ";
        foreach ($album["songs"] as ${$clgedjpehqjt}) {
            $pkwkmc = "imageUrl";
            $mpvykdnpgg = "downloadLink";
            $tdewstiadxpn = "downloadLink";
            $aouqiqbcq = "fileExists";
            $oiiswgui = "song";
            echo "                                    <tr>\n                                     ";
            $db->where("check_id", $song["id"]);
            $bwkryxdf = "album";
            $fileExists = $db->has("file");
            if (${$GLOBALS["gitocace"]} == ${$GLOBALS["iethhkwtf"]}["id"]) {
                echo "<td> </td>";
            } else {
                echo "<td><input type=\"checkbox\" class=\"video-checkbox\" name=\"id[]\" value=\"" . ${$GLOBALS["iethhkwtf"]}["id"] . "\"></td>";
            }
            echo "                                    ";
            $GLOBALS["qhtghfb"] = "song";
            $dsuobceo = "song";
            $GLOBALS["nosgbqsd"] = "song";
            ${$pkwkmc} = "";
            foreach (${$GLOBALS["iethhkwtf"]}["image"] as ${$GLOBALS["kdqsxamciqk"]}) {
                if (${$GLOBALS["kdqsxamciqk"]}["quality"] === "500x500") {
                    ${$GLOBALS["jocatritin"]} = ${$GLOBALS["kdqsxamciqk"]}["link"];
                    break;
                }
            }
            $GLOBALS["puuyipnxls"] = "desiredQuality";
            if (!empty(${$GLOBALS["jocatritin"]})) {
                echo "                                      <td><img src=\"";
                echo ${$GLOBALS["jocatritin"]};
                echo "\" alt=\"Song Image (500x500)\" class=\"img-fluid\" style=\"max-width: 80px;\"></td>\n                                    ";
            } else {
                echo "                                      <td>Image not available.</td>\n                                    ";
            }
            echo "\n                                    \n                                    <input type=\"hidden\" name=\"songthumb_";
            echo ${$GLOBALS["qhtghfb"]}["id"];
            echo "\" value=\"";
            $GLOBALS["jciuris"] = "song";
            echo ${$GLOBALS["jocatritin"]};
            $GLOBALS["igfdzpkh"] = "song";
            echo "\">\n                                    <td><input type=\"text\" name=\"titlename_";
            echo $song["id"];
            echo "\" value=\"";
            echo ${$GLOBALS["nosgbqsd"]}["name"];
            echo "\" class=\"form-control\"></td>\n                                    <td><input type=\"text\" name=\"artistname_";
            echo $song["id"];
            $GLOBALS["bjwwqde"] = "song";
            echo "\" value=\"";
            echo ${$GLOBALS["iethhkwtf"]}["primaryArtists"];
            echo "\" class=\"form-control\"></td>\n                                    <td>";
            echo ${$GLOBALS["iethhkwtf"]}["language"];
            echo "</td>\n                                    <input type=\"hidden\" name=\"lang\" value=\"";
            echo ${$dsuobceo}["language"];
            echo "\">\n                                    <input type=\"hidden\" name=\"album_name\" value=\"";
            echo ${$bwkryxdf}["name"];
            echo "\">\n                                    \n                                    <td>";
            echo ${$GLOBALS["iethhkwtf"]}["label"];
            $GLOBALS["mwgorlwrb"] = "desiredQualities";
            echo "</td>\n                                    <input type=\"hidden\" name=\"step2\" value=\"2\">\n                                    ";
            $desiredQualities = ["320kbps", "160kbps", "96kbps", "48kbps"];
            ${$tdewstiadxpn} = "";
            foreach (${$GLOBALS["ijhaies"]} as ${$GLOBALS["puuyipnxls"]}) {
                $qqhghoxkz = "song";
                $GLOBALS["ctfxminw"] = "download";
                foreach ($song["downloadUrl"] as $download) {
                    $yfbryeaihou = "desiredQuality";
                    if (${$GLOBALS["nulsrirt"]}["quality"] === $desiredQuality) {
                        ${$GLOBALS["nyytovlbpyn"]} = ${$GLOBALS["nulsrirt"]}["link"];
                        break 2;
                    }
                }
            }
            if (!empty(${$mpvykdnpgg})) {
                echo "                                      <input type=\"hidden\" name=\"dlink_";
                echo ${$GLOBALS["iethhkwtf"]}["id"];
                echo "\" value=\"";
                echo ${$GLOBALS["nyytovlbpyn"]};
                echo "\">\n                                    ";
            } else {
                echo "                                      <td>Download not available.</td>\n                                    ";
            }
            echo "\n\n                                    ";
            if (${$GLOBALS["bjwwqde"]}["hasLyrics"] == true) {
                $llelojirjnn = "song";
                $GLOBALS["zlevhzct"] = "writers";
                $GLOBALS["uunwsowt"] = "data";
                $qgtzczo = "data";
                $GLOBALS["xrsubdu"] = "data";
                echo "                                     ";
                $jsnevxklfllb = "song";
                $tmzlrfrcld = "writers";
                ${$GLOBALS["ikqjknhm"]} = $song["id"];
                ${$GLOBALS["sysvrenpyuq"]} = "https://maxsecurehost.com/api/jio/lyrics.php?id=" . urlencode(${$GLOBALS["ikqjknhm"]});
                ${$qgtzczo} = json_decode(file_get_contents(${$GLOBALS["sysvrenpyuq"]}), true);
                ${$GLOBALS["wwerry"]} = ${$GLOBALS["mwfzeqkweb"]}["snippet"];
                ${$GLOBALS["ppsjnwtjy"]} = ${$GLOBALS["uunwsowt"]}["lyrics"];
                ${$GLOBALS["zlevhzct"]} = ${$GLOBALS["xrsubdu"]}["writers"];
                echo "<input type=\"hidden\" name=\"songlyrics_" . ${$GLOBALS["iethhkwtf"]}["id"] . "\" value=\"" . htmlspecialchars(${$GLOBALS["ppsjnwtjy"]}) . "\">";
                echo "<input type=\"hidden\" name=\"lyricswriter_" . ${$jsnevxklfllb}["id"] . "\" value=\"" . htmlspecialchars(${$tmzlrfrcld}) . "\">";
                echo "                                   ";
            } else {
                echo "                                   ";
            }
            echo "\n                                 </tr>\n                               ";
        }
        echo "\n                             </tbody>\n                           </table>\n                         </div>\n                       </div>\n                     </div>\n                   </div>\n                   \n                   <div class=\"card\">\n                    <div class=\"card-body\">\n                      <div class=\"row\">\n                        <div class=\"col-sm-6\">\n                          <label for=\"title\">Select category</label>\n                          ";
        ${$GLOBALS["onsvswlnsp"]} = $db->orderBy("id", "desc")->get("category");
        if ($db->count > 0) {
            echo "<div class=\"select-wrapper\">";
            $xtckmgbc = "categorylist";
            echo "<select name=\"cid\" id=\"category-select\" class=\"form-select\">";
            $rztyrc = "row";
            echo "<option value=\"\" disabled selected>Select Category</option>";
            foreach ($categorylist as $row) {
                $rnttmsv = "cat_id";
                $oaonyjynmw = "row";
                echo "<option value=\"" . ${$GLOBALS["khejbnary"]}["id"] . "\"";
                if ($cat_id == ${$GLOBALS["khejbnary"]}["id"]) {
                    echo " selected";
                }
                echo ">" . ucwords(${$oaonyjynmw}["name"]) . "</option>";
            }
            echo "</select>";
            echo "</div>";
        }
        echo "                        </div>\n                        <div class=\"col-sm-6 text-sm-end text-center mt-2 mt-sm-0\">\n                          <button id=\"submit-selected\" type=\"submit\" class=\"btn btn-primary btn-lg\">\n                            <i class=\"fa fa-upload\"></i> Upload\n                          </button>\n                        </div>\n                      </div>\n                    </div>\n                  </div>\n                </form>\n                ";
    } else {
        echo "Error: {$data['message']}";
    }
}
echo "            \n\n            <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>\n\n            <script>\n              \$(document).ready(function() {\n                \$(\"#category-select\").select2();\n              });\n            </script>\n            <script>\n              \$(document).ready(function() {\n                \$(\"#category-select1\").select2();\n              });\n            </script>\n            <script>\n              \$(document).ready(function() {\n                \$('#add-artist-form').submit(function(event) {\n      event.preventDefault(); // Prevent the form from submitting normally\n\n      // Get the form data\n      var formData = {\n        'name': \$('#artist_name').val(),\n        'thumbfrom': 'EXTERNAL_LINK', // Add thumbfrom parameter with value EXTERNAL_LINK\n        'thumb_url': \$('input[name=thumb_url]').val(),\n        'a_check_id': \$('input[name=a_check_id]').val(),\n        'added_home': 1,\n        'meta_title': '',\n        'meta_keyw': '',\n        'meta_des': '',\n        'status': 1,\n        'submit': 'create'\n      };\n\n      // Get the URL parameters\n      var urlParams = new URLSearchParams(window.location.search);\n      urlParams.forEach(function(value, key) {\n        formData[key] = value;\n      });\n\n      // Send the AJAX request\n      \$.ajax({\n        type: 'POST',\n        url: '";
echo ${$GLOBALS["hoefhsdp"]};
echo "',\n        data: formData,\n        success: function(response) {\n          console.log(response);\n          if (response.status === 1) {\n            \$('.btn-primary').text('Success');\n          } else {\n            \$('.btn-primary').text('Artist Already Exists');\n          }\n        },\n        error: function(xhr, status, error) {\n          console.log(xhr.responseText);\n        }\n      });\n    });\n              });\n            </script>\n\n            <script type=\"text/javascript\">\n              \$(document).ready(function() {\n                \$('.add-category-form').on('submit', function(event) {\n                  event.preventDefault();\n                  var formData = \$(this).serialize();\n                  \$.ajax({\n                    type: 'POST',\n                    url: '";
echo ${$GLOBALS["jebvofigh"]};
echo "',\n                    data: formData,\n                    success: function(response) {\n                      console.log(response);\n                      \$(this).find('button[type=\"submit\"]').text('Success');\n                    }.bind(this),\n                    error: function(xhr, status, error) {\n                      console.log(xhr.responseText);\n                    }\n                  });\n                });\n              });\n            </script>\n\n            <script>\n              const searchForm = document.getElementById('searchForm');\n              const searchTypeSelect = document.getElementById('searchType');\n              const artistLinkInput = document.getElementById('artistLink');\n              const albumLinkInput = document.getElementById('albumLink');\n              const albumKeywordInput = document.getElementById('albumkeyword');\n              const playlistKeywordInput = document.getElementById('playlistkeyword');\n\n              searchForm.addEventListener('submit', function(event) {\n    event.preventDefault(); // Prevent form submission\n\n    // Get the selected search type\n    const searchType = searchTypeSelect.value;\n\n    // Update the corresponding hidden input field based on the search type\n    if (searchType === 'artist') {\n      artistLinkInput.value = document.getElementById('searchInput').value;\n      albumLinkInput.value = ''; // Make albumLinkInput blank when searching for an artist\n      albumKeywordInput.value = ''; // Clear albumKeywordInput when searching for an artist\n      playlistKeywordInput.value = ''; // Clear playlistKeywordInput when searching for an artist\n    } else if (searchType === 'albumLink') {\n      artistLinkInput.removeAttribute('name'); // Remove name attribute from artistLinkInput when searching for an album link\n      albumLinkInput.value = document.getElementById('searchInput').value; // Set the value of albumLinkInput\n      albumKeywordInput.value = ''; // Clear albumKeywordInput when searching for an album link\n      playlistKeywordInput.value = ''; // Clear playlistKeywordInput when searching for an album link\n    } else if (searchType === 'album') {\n      artistLinkInput.removeAttribute('name'); // Remove name attribute from artistLinkInput when searching for an album\n      albumLinkInput.value = ''; // Make albumLinkInput blank when searching for an album\n      albumKeywordInput.value = document.getElementById('searchInput').value;\n      playlistKeywordInput.value = ''; // Clear playlistKeywordInput when searching for an album\n    } else if (searchType === 'playlist') {\n      artistLinkInput.removeAttribute('name'); // Remove name attribute from artistLinkInput when searching for a playlist\n      albumLinkInput.removeAttribute('name'); // Remove name attribute from albumLinkInput when searching for a playlist\n      albumLinkInput.value = ''; // Make albumLinkInput blank when searching for a playlist\n      albumKeywordInput.value = ''; // Clear albumKeywordInput when searching for a playlist\n      playlistKeywordInput.value = document.getElementById('searchInput').value;\n    }\n\n    // Submit the form\n    searchForm.submit();\n  });\n</script>\n\n\n\n\n<script>\n  function toggleAllVideos(checkbox) {\n    var videoCheckboxes = document.getElementsByName('id[]');\n\n    for (var i = 0; i < videoCheckboxes.length; i++) {\n      videoCheckboxes[i].checked = checkbox.checked;\n    }\n  }\n</script>\n\n\n";
require_once "/var/www/html/../footer.php";
