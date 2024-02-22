<?php

/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2022 Bitrix
 */
use Bitrix\Main;
use Bitrix\Main\Session\Legacy\HealerEarlySessionStart;
require_once "/var/www/html/bx_root.php";
require_once "/var/www/html/start.php";
$application = Main\HttpApplication::getInstance();
$application->initializeExtendedKernel(["get" => $_GET, "post" => $_POST, "files" => $_FILES, "cookie" => $_COOKIE, "server" => $_SERVER, "env" => $_ENV]);
if (defined('SITE_ID')) {
    define('LANG', SITE_ID);
}
$context = $application->getContext();
$context->initializeCulture(defined('LANG') ? LANG : null, defined('LANGUAGE_ID') ? LANGUAGE_ID : null);
// needs to be after culture initialization
$application->start();
// constants for compatibility
$culture = $context->getCulture();
define('SITE_CHARSET', $culture->getCharset());
define('FORMAT_DATE', $culture->getFormatDate());
define('FORMAT_DATETIME', $culture->getFormatDatetime());
define('LANG_CHARSET', SITE_CHARSET);
$site = $context->getSiteObject();
if (!defined('LANG')) {
    define('LANG', $site ? $site->getLid() : $context->getLanguage());
}
define('SITE_DIR', $site ? $site->getDir() : '');
define('SITE_SERVER_NAME', $site ? $site->getServerName() : '');
define('LANG_DIR', SITE_DIR);
if (!defined('LANGUAGE_ID')) {
    define('LANGUAGE_ID', $context->getLanguage());
}
define('LANG_ADMIN_LID', LANGUAGE_ID);
if (!defined('SITE_ID')) {
    define('SITE_ID', LANG);
}
/** @global $lang */
$lang = $context->getLanguage();
//define global application object
$GLOBALS["APPLICATION"] = new CMain();
if (!defined("POST_FORM_ACTION_URI")) {
    define("POST_FORM_ACTION_URI", htmlspecialcharsbx(GetRequestUri()));
}
$GLOBALS["MESS"] = [];
$GLOBALS["ALL_LANG_FILES"] = [];
IncludeModuleLangFile("/var/www/html/tools.php");
IncludeModuleLangFile("/var/www/html/274b8b19e20336e8febd22da4cc545a3_original.txt");
error_reporting(COption::GetOptionInt("main", "error_reporting", "E_W____MW_ORROR") & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING & ~E_NOTICE);
if (!defined("BX_COMP_MANAGED_CACHE") && COption::GetOptionString("main", "component_managed_cache_on", "Y") != "N") {
    define("BX_COMP_MANAGED_CACHE", true);
}
// global functions
require_once "/var/www/html/filter_tools.php";
define('BX_AJAX_PARAM_ID', 'bxajaxid');
/*ZDUyZmZZDU3OTZiZjkzNzUyMGRkZWI1ZjhjYzBmZTdlYzhiMjI=*/
$GLOBALS['_____258266450'] = array("GetModuleEvents", "ExecuteModuleEventEx", "WriteFinalMessage");
$GLOBALS['____113236299'] = array("define", "base64_decode", "unserialize", "is_array", "in_array", "serialize", "base64_encode", "mktime", "date", "date", "strlen", "mktime", "date", "date", "method_exists", "call_user_func_array", "strlen", "serialize", "base64_encode", "strlen", "is_array", "serialize", "base64_encode", "serialize", "base64_encode", "is_array", "is_array", "in_array", "in_array", "mktime", "date", "date", "date", "mktime", "date", "date", "in_array", "serialize", "base64_encode", "intval", "time", "file_exists", "str_replace", "class_exists", "define", "strrev", "strtoupper", "sprintf", "sprintf", "substr", "strrev", "base64_decode", "substr", "strlen", "strlen", "chr", "ord", "ord", "mktime", "intval", "intval", "intval", "ksort", "substr", "implode", "defined", "base64_decode", "constant", "strrev", "sprintf", "strlen", "strlen", "chr", "ord", "ord", "mktime", "intval", "intval", "intval", "substr", "substr", "defined", "strrev", "strtoupper", "file_exists", "intval", "time", "mktime", "mktime", "date", "date", "define", "define");
if (!function_exists("\\___59864645")) {
    function ___59864645($_125719847)
    {
        static $_350528097 = false;
        if ($_350528097 == false) {
            $_350528097 = array('SU5UUkFORVRfRURJVElPTg==', 'WQ==', 'bWFpbg==', 'fmNwZl9tYXBfdmFsdWU=', '', '', 'YWxsb3dlZF9jbGFzc2Vz', 'ZQ==', 'Zg==', 'ZQ==', 'Rg==', 'WA==', 'Zg==', 'bWFpbg==', 'fmNwZl9tYXBfdmFsdWU=', 'UG9ydGFs', 'Rg==', 'ZQ==', 'ZQ==', 'WA==', 'Rg==', 'RA==', 'RA==', 'bQ==', 'ZA==', 'WQ==', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'UG9ydGFs', 'Rg==', 'ZQ==', 'ZQ==', 'WA==', 'Rg==', 'RA==', 'RA==', 'bQ==', 'ZA==', 'WQ==', 'bWFpbg==', 'T24=', 'U2V0dGluZ3NDaGFuZ2U=', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'bWFpbg==', 'fmNwZl9tYXBfdmFsdWU=', 'ZQ==', 'ZQ==', 'RA==', 'ZQ==', 'ZQ==', 'Zg==', 'Zg==', 'Zg==', 'ZQ==', 'bWFpbg==', 'fmNwZl9tYXBfdmFsdWU=', 'ZQ==', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'bWFpbg==', 'fmNwZl9tYXBfdmFsdWU=', 'ZQ==', 'Zg==', 'UG9ydGFs', 'UG9ydGFs', 'ZQ==', 'UG9ydGFs', 'Rg==', 'WA==', 'Rg==', 'RA==', 'ZQ==', 'ZQ==', 'RA==', 'bQ==', 'ZA==', 'WQ==', 'ZQ==', 'WA==', 'ZQ==', 'Rg==', 'ZQ==', 'RA==', 'Zg==', 'ZQ==', 'RA==', 'ZQ==', 'bQ==', 'ZA==', 'WQ==', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'Zg==', 'bWFpbg==', 'fmNwZl9tYXBfdmFsdWU=', 'ZQ==', 'UG9ydGFs', 'Rg==', 'WA==', 'VFlQRQ==', 'REFURQ==', 'RkVBVFVSRVM=', 'RVhQSVJFRA==', 'VFlQRQ==', 'RA==', 'VFJZX0RBWVNfQ09VTlQ=', 'REFURQ==', 'VFJZX0RBWVNfQ09VTlQ=', 'RVhQSVJFRA==', 'RkVBVFVSRVM=', 'Zg==', 'Zg==', 'RE9DVU1FTlRfUk9PVA==', 'L2JpdHJpeC9tb2R1bGVzLw==', 'L2luc3RhbGwvaW5kZXgucGhw', 'Lg==', 'Xw==', 'c2VhcmNo', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZnJpZWxkcw==', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZnJpZWxkcw==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZnJpZWxkcw==', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfbWljcm9ibG9nX3VzZXI=', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfbWljcm9ibG9nX3VzZXI=', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfbWljcm9ibG9nX3VzZXI=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfbWljcm9ibG9nX2dyb3Vw', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfbWljcm9ibG9nX2dyb3Vw', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfbWljcm9ibG9nX2dyb3Vw', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZmlsZXNfdXNlcg==', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZmlsZXNfdXNlcg==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZmlsZXNfdXNlcg==', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfYmxvZ191c2Vy', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfYmxvZ191c2Vy', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfYmxvZ191c2Vy', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfcGhvdG9fdXNlcg==', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfcGhvdG9fdXNlcg==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfcGhvdG9fdXNlcg==', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZm9ydW1fdXNlcg==', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZm9ydW1fdXNlcg==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfZm9ydW1fdXNlcg==', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfdGFza3NfdXNlcg==', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfdGFza3NfdXNlcg==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfdGFza3NfdXNlcg==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfdGFza3NfZ3JvdXA=', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfdGFza3NfZ3JvdXA=', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfdGFza3NfZ3JvdXA=', 'dGFza3M=', 'Tg==', '', '', 'QUNUSVZF', 'WQ==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfY2FsZW5kYXJfdXNlcg==', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfY2FsZW5kYXJfdXNlcg==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfY2FsZW5kYXJfdXNlcg==', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfY2FsZW5kYXJfZ3JvdXA=', 'WQ==', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfY2FsZW5kYXJfZ3JvdXA=', 'SUQ=', 'c29jaWFsbmV0d29yaw==', 'YWxsb3dfY2FsZW5kYXJfZ3JvdXA=', 'QUNUSVZF', 'WQ==', 'Tg==', 'ZXh0cmFuZXQ=', 'aWJsb2Nr', 'T25BZnRlcklCbG9ja0VsZW1lbnRVcGRhdGU=', 'aW50cmFuZXQ=', 'Q0ludHJhbmV0RXZlbnRIYW5kbGVycw==', 'U1BSZWdpc3RlclVwZGF0ZWRJdGVt', 'Q0ludHJhbmV0U2hhcmVwb2ludDo6QWdlbnRMaXN0cygpOw==', 'aW50cmFuZXQ=', 'Tg==', 'Q0ludHJhbmV0U2hhcmVwb2ludDo6QWdlbnRRdWV1ZSgpOw==', 'aW50cmFuZXQ=', 'Tg==', 'Q0ludHJhbmV0U2hhcmVwb2ludDo6QWdlbnRVcGRhdGUoKTs=', 'aW50cmFuZXQ=', 'Tg==', 'aWJsb2Nr', 'T25BZnRlcklCbG9ja0VsZW1lbnRBZGQ=', 'aW50cmFuZXQ=', 'Q0ludHJhbmV0RXZlbnRIYW5kbGVycw==', 'U1BSZWdpc3RlclVwZGF0ZWRJdGVt', 'aWJsb2Nr', 'T25BZnRlcklCbG9ja0VsZW1lbnRVcGRhdGU=', 'aW50cmFuZXQ=', 'Q0ludHJhbmV0RXZlbnRIYW5kbGVycw==', 'U1BSZWdpc3RlclVwZGF0ZWRJdGVt', 'Q0ludHJhbmV0U2hhcmVwb2ludDo6QWdlbnRMaXN0cygpOw==', 'aW50cmFuZXQ=', 'Q0ludHJhbmV0U2hhcmVwb2ludDo6QWdlbnRRdWV1ZSgpOw==', 'aW50cmFuZXQ=', 'Q0ludHJhbmV0U2hhcmVwb2ludDo6QWdlbnRVcGRhdGUoKTs=', 'aW50cmFuZXQ=', 'Y3Jt', 'bWFpbg==', 'T25CZWZvcmVQcm9sb2c=', 'bWFpbg==', 'Q1dpemFyZFNvbFBhbmVsSW50cmFuZXQ=', 'U2hvd1BhbmVs', 'L21vZHVsZXMvaW50cmFuZXQvcGFuZWxfYnV0dG9uLnBocA==', 'ZXhwaXJlX21lc3My', 'bm9pdGlkZV90aW1pbGVtaXQ=', 'WQ==', 'ZHJpbl9wZXJnb2tj', 'JTAxMHMK', 'RUVYUElS', 'bWFpbg==', 'JXMlcw==', 'YWRt', 'aGRyb3dzc2E=', 'YWRtaW4=', 'bW9kdWxlcw==', 'ZGVmaW5lLnBocA==', 'bWFpbg==', 'Yml0cml4', 'UkhTSVRFRVg=', 'SDR1NjdmaHc4N1ZoeXRvcw==', '', 'dGhS', 'N0h5cjEySHd5MHJGcg==', 'VF9TVEVBTA==', 'aHR0cDovL2JpdHJpeHNvZnQuY29tL2JpdHJpeC9icy5waHA=', 'T0xE', 'UElSRURBVEVT', 'RE9DVU1FTlRfUk9PVA==', 'Lw==', 'Lw==', 'VEVNUE9SQVJZX0NBQ0hF', 'VEVNUE9SQVJZX0NBQ0hF', '', 'T05fT0Q=', 'JXMlcw==', 'X09VUl9CVVM=', 'U0lU', 'RURBVEVNQVBFUg==', 'bm9pdGlkZV90aW1pbGVtaXQ=', 'RE9DVU1FTlRfUk9PVA==', 'L2JpdHJpeC8uY29uZmlnLnBocA==', 'RE9DVU1FTlRfUk9PVA==', 'L2JpdHJpeC8uY29uZmlnLnBocA==', 'c2Fhcw==', 'ZGF5c19hZnRlcl90cmlhbA==', 'c2Fhcw==', 'ZGF5c19hZnRlcl90cmlhbA==', 'c2Fhcw==', 'dHJpYWxfc3RvcHBlZA==', '', 'c2Fhcw==', 'dHJpYWxfc3RvcHBlZA==', 'bQ==', 'ZA==', 'WQ==', 'U2l0ZUV4cGlyZURhdGU=');
        }
        return base64_decode($_350528097[$_125719847]);
    }
}
$GLOBALS['____113236299'][0](___59864645(0), ___59864645(1));
class CBXFeatures
{
    private static $_1475782628 = 30;
    private static $_2081120385 = array("Portal" => array("CompanyCalendar", "CompanyPhoto", "CompanyVideo", "CompanyCareer", "StaffChanges", "StaffAbsence", "CommonDocuments", "MeetingRoomBookingSystem", "Wiki", "Learning", "Vote", "WebLink", "Subscribe", "Friends", "PersonalFiles", "PersonalBlog", "PersonalPhoto", "PersonalForum", "Blog", "Forum", "Gallery", "Board", "MicroBlog", "WebMessenger"), "Communications" => array("Tasks", "Calendar", "Workgroups", "Jabber", "VideoConference", "Extranet", "SMTP", "Requests", "DAV", "intranet_sharepoint", "timeman", "Idea", "Meeting", "EventList", "Salary", "XDImport"), "Enterprise" => array("BizProc", "Lists", "Support", "Analytics", "crm", "Controller", "LdapUnlimitedUsers"), "Holding" => array("Cluster", "MultiSites"));
    private static $_1160001280 = null;
    private static $_2088532414 = null;
    private static function __1476182737()
    {
        if (self::$_1160001280 === null) {
            self::$_1160001280 = array();
            foreach (self::$_2081120385 as $_2130272277 => $_1425869416) {
                foreach ($_1425869416 as $_382962717) {
                    self::$_1160001280[$_382962717] = $_2130272277;
                }
            }
        }
        if (self::$_2088532414 === null) {
            self::$_2088532414 = array();
            $_440378622 = COption::GetOptionString(___59864645(2), ___59864645(3), ___59864645(4));
            if ($_440378622 != ___59864645(5)) {
                $_440378622 = $GLOBALS['____113236299'][1]($_440378622);
                $_440378622 = $GLOBALS['____113236299'][2]($_440378622, [___59864645(6) => false]);
                if ($GLOBALS['____113236299'][3]($_440378622)) {
                    self::$_2088532414 = $_440378622;
                }
            }
            if (empty(self::$_2088532414)) {
                self::$_2088532414 = array(___59864645(7) => array(), ___59864645(8) => array());
            }
        }
    }
    public static function InitiateEditionsSettings($_663085506)
    {
        self::__1476182737();
        $_1940668241 = array();
        foreach (self::$_2081120385 as $_2130272277 => $_1425869416) {
            $_1711373616 = $GLOBALS['____113236299'][4]($_2130272277, $_663085506);
            self::$_2088532414[___59864645(9)][$_2130272277] = $_1711373616 ? array(___59864645(10)) : array(___59864645(11));
            foreach ($_1425869416 as $_382962717) {
                self::$_2088532414[___59864645(12)][$_382962717] = $_1711373616;
                if (!$_1711373616) {
                    $_1940668241[] = array($_382962717, false);
                }
            }
        }
        $_1696822529 = $GLOBALS['____113236299'][5](self::$_2088532414);
        $_1696822529 = $GLOBALS['____113236299'][6]($_1696822529);
        COption::SetOptionString(___59864645(13), ___59864645(14), $_1696822529);
        foreach ($_1940668241 as $_982315991) {
            self::__1132236072($_982315991[0], $_982315991[round(0.99999999999999)]);
        }
    }
    public static function IsFeatureEnabled($_382962717)
    {
        if ($_382962717 == '') {
            return true;
        }
        self::__1476182737();
        if (!isset(self::$_1160001280[$_382962717])) {
            return true;
        }
        if (self::$_1160001280[$_382962717] == ___59864645(15)) {
            $_24038701 = array(___59864645(16));
        } elseif (isset(self::$_2088532414[___59864645(17)][self::$_1160001280[$_382962717]])) {
            $_24038701 = self::$_2088532414[___59864645(18)][self::$_1160001280[$_382962717]];
        } else {
            $_24038701 = array(___59864645(19));
        }
        if ($_24038701[0] != ___59864645(20) && $_24038701[0] != ___59864645(21)) {
            return false;
        } elseif ($_24038701[0] == ___59864645(22)) {
            if ($_24038701[round(1.0)] < $GLOBALS['____113236299'][7](min(214, 0, 71.333333333333), 0, min(234, 0, 78), Date(___59864645(23)), $GLOBALS['____113236299'][8](___59864645(24)) - self::$_1475782628, $GLOBALS['____113236299'][9](___59864645(25)))) {
                if (!isset($_24038701[round(2)]) || !$_24038701[round(2)]) {
                    self::__1520453046(self::$_1160001280[$_382962717]);
                }
                return false;
            }
        }
        return !isset(self::$_2088532414[___59864645(26)][$_382962717]) || self::$_2088532414[___59864645(27)][$_382962717];
    }
    public static function IsFeatureInstalled($_382962717)
    {
        if ($GLOBALS['____113236299'][10]($_382962717) <= 0) {
            return true;
        }
        self::__1476182737();
        return isset(self::$_2088532414[___59864645(28)][$_382962717]) && self::$_2088532414[___59864645(29)][$_382962717];
    }
    public static function IsFeatureEditable($_382962717)
    {
        if ($_382962717 == '') {
            return true;
        }
        self::__1476182737();
        if (!isset(self::$_1160001280[$_382962717])) {
            return true;
        }
        if (self::$_1160001280[$_382962717] == ___59864645(30)) {
            $_24038701 = array(___59864645(31));
        } elseif (isset(self::$_2088532414[___59864645(32)][self::$_1160001280[$_382962717]])) {
            $_24038701 = self::$_2088532414[___59864645(33)][self::$_1160001280[$_382962717]];
        } else {
            $_24038701 = array(___59864645(34));
        }
        if ($_24038701[0] != ___59864645(35) && $_24038701[min(132, 0, 44)] != ___59864645(36)) {
            return false;
        } elseif ($_24038701[min(24, 0, 8)] == ___59864645(37)) {
            if ($_24038701[round(1.0)] < $GLOBALS['____113236299'][11](0, 0, 0, Date(___59864645(38)), $GLOBALS['____113236299'][12](___59864645(39)) - self::$_1475782628, $GLOBALS['____113236299'][13](___59864645(40)))) {
                if (!isset($_24038701[round(2.0000000000000098)]) || !$_24038701[round(2.0)]) {
                    self::__1520453046(self::$_1160001280[$_382962717]);
                }
                return false;
            }
        }
        return true;
    }
    private static function __1132236072($_382962717, $_1451710420)
    {
        if ($GLOBALS['____113236299'][14]("CBXFeatures", "On" . $_382962717 . "SettingsChange")) {
            $GLOBALS['____113236299'][15](array("CBXFeatures", "On" . $_382962717 . "SettingsChange"), array($_382962717, $_1451710420));
        }
        $_1313100787 = $GLOBALS['_____258266450'][0](___59864645(41), ___59864645(42) . $_382962717 . ___59864645(43));
        while ($_152197878 = $_1313100787->Fetch()) {
            $GLOBALS['_____258266450'][1]($_152197878, array($_382962717, $_1451710420));
        }
    }
    public static function SetFeatureEnabled($_382962717, $_1451710420 = true, $_1730307133 = true)
    {
        if ($GLOBALS['____113236299'][16]($_382962717) <= 0) {
            return;
        }
        if (!self::IsFeatureEditable($_382962717)) {
            $_1451710420 = false;
        }
        $_1451710420 = (bool) $_1451710420;
        self::__1476182737();
        $_632078022 = !isset(self::$_2088532414[___59864645(44)][$_382962717]) && $_1451710420 || isset(self::$_2088532414[___59864645(45)][$_382962717]) && $_1451710420 != self::$_2088532414[___59864645(46)][$_382962717];
        self::$_2088532414[___59864645(47)][$_382962717] = $_1451710420;
        $_1696822529 = $GLOBALS['____113236299'][17](self::$_2088532414);
        $_1696822529 = $GLOBALS['____113236299'][18]($_1696822529);
        COption::SetOptionString(___59864645(48), ___59864645(49), $_1696822529);
        if ($_632078022 && $_1730307133) {
            self::__1132236072($_382962717, $_1451710420);
        }
    }
    private static function __1520453046($_2130272277)
    {
        if ($GLOBALS['____113236299'][19]($_2130272277) <= 0 || $_2130272277 == "Portal") {
            return;
        }
        self::__1476182737();
        if (!isset(self::$_2088532414[___59864645(50)][$_2130272277]) || self::$_2088532414[___59864645(51)][$_2130272277][0] != ___59864645(52)) {
            return;
        }
        if (isset(self::$_2088532414[___59864645(53)][$_2130272277][round(2.0)]) && self::$_2088532414[___59864645(54)][$_2130272277][round(2.0)]) {
            return;
        }
        $_1940668241 = array();
        if (isset(self::$_2081120385[$_2130272277]) && $GLOBALS['____113236299'][20](self::$_2081120385[$_2130272277])) {
            foreach (self::$_2081120385[$_2130272277] as $_382962717) {
                if (isset(self::$_2088532414[___59864645(55)][$_382962717]) && self::$_2088532414[___59864645(56)][$_382962717]) {
                    self::$_2088532414[___59864645(57)][$_382962717] = false;
                    $_1940668241[] = array($_382962717, false);
                }
            }
            self::$_2088532414[___59864645(58)][$_2130272277][round(2.0)] = true;
        }
        $_1696822529 = $GLOBALS['____113236299'][21](self::$_2088532414);
        $_1696822529 = $GLOBALS['____113236299'][22]($_1696822529);
        COption::SetOptionString(___59864645(59), ___59864645(60), $_1696822529);
        foreach ($_1940668241 as $_982315991) {
            self::__1132236072($_982315991[0], $_982315991[round(1.0)]);
        }
    }
    public static function ModifyFeaturesSettings($_663085506, $_1425869416)
    {
        self::__1476182737();
        foreach ($_663085506 as $_2130272277 => $_1202870155) {
            self::$_2088532414[___59864645(61)][$_2130272277] = $_1202870155;
        }
        $_1940668241 = array();
        foreach ($_1425869416 as $_382962717 => $_1451710420) {
            if (!isset(self::$_2088532414[___59864645(62)][$_382962717]) && $_1451710420 || isset(self::$_2088532414[___59864645(63)][$_382962717]) && $_1451710420 != self::$_2088532414[___59864645(64)][$_382962717]) {
                $_1940668241[] = array($_382962717, $_1451710420);
            }
            self::$_2088532414[___59864645(65)][$_382962717] = $_1451710420;
        }
        $_1696822529 = $GLOBALS['____113236299'][23](self::$_2088532414);
        $_1696822529 = $GLOBALS['____113236299'][24]($_1696822529);
        COption::SetOptionString(___59864645(66), ___59864645(67), $_1696822529);
        self::$_2088532414 = false;
        foreach ($_1940668241 as $_982315991) {
            self::__1132236072($_982315991[min(124, 0, 41.333333333333)], $_982315991[round(1.0)]);
        }
    }
    public static function SaveFeaturesSettings($_764404098, $_276454912)
    {
        self::__1476182737();
        $_1726492195 = array(___59864645(68) => array(), ___59864645(69) => array());
        if (!$GLOBALS['____113236299'][25]($_764404098)) {
            $_764404098 = array();
        }
        if (!$GLOBALS['____113236299'][26]($_276454912)) {
            $_276454912 = array();
        }
        if (!$GLOBALS['____113236299'][27](___59864645(70), $_764404098)) {
            $_764404098[] = ___59864645(71);
        }
        foreach (self::$_2081120385 as $_2130272277 => $_1425869416) {
            $_93491784 = self::$_2088532414[___59864645(72)][$_2130272277] ?? ($_2130272277 == ___59864645(73) ? array(___59864645(74)) : array(___59864645(75)));
            if ($_93491784[0] == ___59864645(76) || $_93491784[0] == ___59864645(77)) {
                $_1726492195[___59864645(78)][$_2130272277] = $_93491784;
            } else {
                if ($GLOBALS['____113236299'][28]($_2130272277, $_764404098)) {
                    $_1726492195[___59864645(79)][$_2130272277] = array(___59864645(80), $GLOBALS['____113236299'][29](min(12, 0, 4), 0, 0, $GLOBALS['____113236299'][30](___59864645(81)), $GLOBALS['____113236299'][31](___59864645(82)), $GLOBALS['____113236299'][32](___59864645(83))));
                } else {
                    $_1726492195[___59864645(84)][$_2130272277] = array(___59864645(85));
                }
            }
        }
        $_1940668241 = array();
        foreach (self::$_1160001280 as $_382962717 => $_2130272277) {
            if ($_1726492195[___59864645(86)][$_2130272277][0] != ___59864645(87) && $_1726492195[___59864645(88)][$_2130272277][min(228, 0, 76)] != ___59864645(89)) {
                $_1726492195[___59864645(90)][$_382962717] = false;
            } else {
                if ($_1726492195[___59864645(91)][$_2130272277][0] == ___59864645(92) && $_1726492195[___59864645(93)][$_2130272277][round(1.0)] < $GLOBALS['____113236299'][33](0, min(146, 0, 48.666666666667), 0, Date(___59864645(94)), $GLOBALS['____113236299'][34](___59864645(95)) - self::$_1475782628, $GLOBALS['____113236299'][35](___59864645(96)))) {
                    $_1726492195[___59864645(97)][$_382962717] = false;
                } else {
                    $_1726492195[___59864645(98)][$_382962717] = $GLOBALS['____113236299'][36]($_382962717, $_276454912);
                }
                if (!isset(self::$_2088532414[___59864645(99)][$_382962717]) && $_1726492195[___59864645(100)][$_382962717] || isset(self::$_2088532414[___59864645(101)][$_382962717]) && $_1726492195[___59864645(102)][$_382962717] != self::$_2088532414[___59864645(103)][$_382962717]) {
                    $_1940668241[] = array($_382962717, $_1726492195[___59864645(104)][$_382962717]);
                }
            }
        }
        $_1696822529 = $GLOBALS['____113236299'][37]($_1726492195);
        $_1696822529 = $GLOBALS['____113236299'][38]($_1696822529);
        COption::SetOptionString(___59864645(105), ___59864645(106), $_1696822529);
        self::$_2088532414 = false;
        foreach ($_1940668241 as $_982315991) {
            self::__1132236072($_982315991[0], $_982315991[round(1.0)]);
        }
    }
    public static function GetFeaturesList()
    {
        self::__1476182737();
        $_1406253929 = array();
        foreach (self::$_2081120385 as $_2130272277 => $_1425869416) {
            $_93491784 = self::$_2088532414[___59864645(107)][$_2130272277] ?? ($_2130272277 == ___59864645(108) ? array(___59864645(109)) : array(___59864645(110)));
            $_1406253929[$_2130272277] = array(___59864645(111) => $_93491784[0], ___59864645(112) => $_93491784[round(0.99999999999999)], ___59864645(113) => array());
            $_1406253929[$_2130272277][___59864645(114)] = false;
            if ($_1406253929[$_2130272277][___59864645(115)] == ___59864645(116)) {
                $_1406253929[$_2130272277][___59864645(117)] = $GLOBALS['____113236299'][39](($GLOBALS['____113236299'][40]() - $_1406253929[$_2130272277][___59864645(118)]) / round(86400));
                if ($_1406253929[$_2130272277][___59864645(119)] > self::$_1475782628) {
                    $_1406253929[$_2130272277][___59864645(120)] = true;
                }
            }
            foreach ($_1425869416 as $_382962717) {
                $_1406253929[$_2130272277][___59864645(121)][$_382962717] = !isset(self::$_2088532414[___59864645(122)][$_382962717]) || self::$_2088532414[___59864645(123)][$_382962717];
            }
        }
        return $_1406253929;
    }
    private static function __1222994296($_412391295, $_313446730)
    {
        if (IsModuleInstalled($_412391295) == $_313446730) {
            return true;
        }
        $_1371843311 = $_SERVER[___59864645(124)] . ___59864645(125) . $_412391295 . ___59864645(126);
        if (!$GLOBALS['____113236299'][41]($_1371843311)) {
            return false;
        }
        include_once $_1371843311;
        $_1902232446 = $GLOBALS['____113236299'][42](___59864645(127), ___59864645(128), $_412391295);
        if (!$GLOBALS['____113236299'][43]($_1902232446)) {
            return false;
        }
        $_1972603791 = new $_1902232446();
        if ($_313446730) {
            if (!$_1972603791->InstallDB()) {
                return false;
            }
            $_1972603791->InstallEvents();
            if (!$_1972603791->InstallFiles()) {
                return false;
            }
        } else {
            if (CModule::IncludeModule(___59864645(129))) {
                CSearch::DeleteIndex($_412391295);
            }
            UnRegisterModule($_412391295);
        }
        return true;
    }
    protected static function OnRequestsSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("form", $_1451710420);
    }
    protected static function OnLearningSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("learning", $_1451710420);
    }
    protected static function OnJabberSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("xmpp", $_1451710420);
    }
    protected static function OnVideoConferenceSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("video", $_1451710420);
    }
    protected static function OnBizProcSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("bizprocdesigner", $_1451710420);
    }
    protected static function OnListsSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("lists", $_1451710420);
    }
    protected static function OnWikiSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("wiki", $_1451710420);
    }
    protected static function OnSupportSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("support", $_1451710420);
    }
    protected static function OnControllerSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("controller", $_1451710420);
    }
    protected static function OnAnalyticsSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("statistic", $_1451710420);
    }
    protected static function OnVoteSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("vote", $_1451710420);
    }
    protected static function OnFriendsSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(130);
        }
        $_455042633 = CSite::GetList(___59864645(131), ___59864645(132), array(___59864645(133) => ___59864645(134)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(135), ___59864645(136), ___59864645(137), $_1248490410[___59864645(138)]) != $_1214659077) {
                COption::SetOptionString(___59864645(139), ___59864645(140), $_1214659077, false, $_1248490410[___59864645(141)]);
                COption::SetOptionString(___59864645(142), ___59864645(143), $_1214659077);
            }
        }
    }
    protected static function OnMicroBlogSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(144);
        }
        $_455042633 = CSite::GetList(___59864645(145), ___59864645(146), array(___59864645(147) => ___59864645(148)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(149), ___59864645(150), ___59864645(151), $_1248490410[___59864645(152)]) != $_1214659077) {
                COption::SetOptionString(___59864645(153), ___59864645(154), $_1214659077, false, $_1248490410[___59864645(155)]);
                COption::SetOptionString(___59864645(156), ___59864645(157), $_1214659077);
            }
            if (COption::GetOptionString(___59864645(158), ___59864645(159), ___59864645(160), $_1248490410[___59864645(161)]) != $_1214659077) {
                COption::SetOptionString(___59864645(162), ___59864645(163), $_1214659077, false, $_1248490410[___59864645(164)]);
                COption::SetOptionString(___59864645(165), ___59864645(166), $_1214659077);
            }
        }
    }
    protected static function OnPersonalFilesSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(167);
        }
        $_455042633 = CSite::GetList(___59864645(168), ___59864645(169), array(___59864645(170) => ___59864645(171)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(172), ___59864645(173), ___59864645(174), $_1248490410[___59864645(175)]) != $_1214659077) {
                COption::SetOptionString(___59864645(176), ___59864645(177), $_1214659077, false, $_1248490410[___59864645(178)]);
                COption::SetOptionString(___59864645(179), ___59864645(180), $_1214659077);
            }
        }
    }
    protected static function OnPersonalBlogSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(181);
        }
        $_455042633 = CSite::GetList(___59864645(182), ___59864645(183), array(___59864645(184) => ___59864645(185)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(186), ___59864645(187), ___59864645(188), $_1248490410[___59864645(189)]) != $_1214659077) {
                COption::SetOptionString(___59864645(190), ___59864645(191), $_1214659077, false, $_1248490410[___59864645(192)]);
                COption::SetOptionString(___59864645(193), ___59864645(194), $_1214659077);
            }
        }
    }
    protected static function OnPersonalPhotoSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(195);
        }
        $_455042633 = CSite::GetList(___59864645(196), ___59864645(197), array(___59864645(198) => ___59864645(199)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(200), ___59864645(201), ___59864645(202), $_1248490410[___59864645(203)]) != $_1214659077) {
                COption::SetOptionString(___59864645(204), ___59864645(205), $_1214659077, false, $_1248490410[___59864645(206)]);
                COption::SetOptionString(___59864645(207), ___59864645(208), $_1214659077);
            }
        }
    }
    protected static function OnPersonalForumSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(209);
        }
        $_455042633 = CSite::GetList(___59864645(210), ___59864645(211), array(___59864645(212) => ___59864645(213)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(214), ___59864645(215), ___59864645(216), $_1248490410[___59864645(217)]) != $_1214659077) {
                COption::SetOptionString(___59864645(218), ___59864645(219), $_1214659077, false, $_1248490410[___59864645(220)]);
                COption::SetOptionString(___59864645(221), ___59864645(222), $_1214659077);
            }
        }
    }
    protected static function OnTasksSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(223);
        }
        $_455042633 = CSite::GetList(___59864645(224), ___59864645(225), array(___59864645(226) => ___59864645(227)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(228), ___59864645(229), ___59864645(230), $_1248490410[___59864645(231)]) != $_1214659077) {
                COption::SetOptionString(___59864645(232), ___59864645(233), $_1214659077, false, $_1248490410[___59864645(234)]);
                COption::SetOptionString(___59864645(235), ___59864645(236), $_1214659077);
            }
            if (COption::GetOptionString(___59864645(237), ___59864645(238), ___59864645(239), $_1248490410[___59864645(240)]) != $_1214659077) {
                COption::SetOptionString(___59864645(241), ___59864645(242), $_1214659077, false, $_1248490410[___59864645(243)]);
                COption::SetOptionString(___59864645(244), ___59864645(245), $_1214659077);
            }
        }
        self::__1222994296(___59864645(246), $_1451710420);
    }
    protected static function OnCalendarSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            $_1214659077 = "Y";
        } else {
            $_1214659077 = ___59864645(247);
        }
        $_455042633 = CSite::GetList(___59864645(248), ___59864645(249), array(___59864645(250) => ___59864645(251)));
        while ($_1248490410 = $_455042633->Fetch()) {
            if (COption::GetOptionString(___59864645(252), ___59864645(253), ___59864645(254), $_1248490410[___59864645(255)]) != $_1214659077) {
                COption::SetOptionString(___59864645(256), ___59864645(257), $_1214659077, false, $_1248490410[___59864645(258)]);
                COption::SetOptionString(___59864645(259), ___59864645(260), $_1214659077);
            }
            if (COption::GetOptionString(___59864645(261), ___59864645(262), ___59864645(263), $_1248490410[___59864645(264)]) != $_1214659077) {
                COption::SetOptionString(___59864645(265), ___59864645(266), $_1214659077, false, $_1248490410[___59864645(267)]);
                COption::SetOptionString(___59864645(268), ___59864645(269), $_1214659077);
            }
        }
    }
    protected static function OnSMTPSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("mail", $_1451710420);
    }
    protected static function OnExtranetSettingsChange($_382962717, $_1451710420)
    {
        $_1415952181 = COption::GetOptionString("extranet", "extranet_site", "");
        if ($_1415952181) {
            $_1859288678 = new CSite();
            $_1859288678->Update($_1415952181, array(___59864645(270) => $_1451710420 ? ___59864645(271) : ___59864645(272)));
        }
        self::__1222994296(___59864645(273), $_1451710420);
    }
    protected static function OnDAVSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("dav", $_1451710420);
    }
    protected static function OntimemanSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("timeman", $_1451710420);
    }
    protected static function Onintranet_sharepointSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            RegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "intranet", "CIntranetEventHandlers", "SPRegisterUpdatedItem");
            RegisterModuleDependences(___59864645(274), ___59864645(275), ___59864645(276), ___59864645(277), ___59864645(278));
            CAgent::AddAgent(___59864645(279), ___59864645(280), ___59864645(281), round(500));
            CAgent::AddAgent(___59864645(282), ___59864645(283), ___59864645(284), round(300));
            CAgent::AddAgent(___59864645(285), ___59864645(286), ___59864645(287), round(3600));
        } else {
            UnRegisterModuleDependences(___59864645(288), ___59864645(289), ___59864645(290), ___59864645(291), ___59864645(292));
            UnRegisterModuleDependences(___59864645(293), ___59864645(294), ___59864645(295), ___59864645(296), ___59864645(297));
            CAgent::RemoveAgent(___59864645(298), ___59864645(299));
            CAgent::RemoveAgent(___59864645(300), ___59864645(301));
            CAgent::RemoveAgent(___59864645(302), ___59864645(303));
        }
    }
    protected static function OncrmSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            COption::SetOptionString("crm", "form_features", "Y");
        }
        self::__1222994296(___59864645(304), $_1451710420);
    }
    protected static function OnClusterSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("cluster", $_1451710420);
    }
    protected static function OnMultiSitesSettingsChange($_382962717, $_1451710420)
    {
        if ($_1451710420) {
            RegisterModuleDependences("main", "OnBeforeProlog", "main", "CWizardSolPanelIntranet", "ShowPanel", 100, "/modules/intranet/panel_button.php");
        } else {
            UnRegisterModuleDependences(___59864645(305), ___59864645(306), ___59864645(307), ___59864645(308), ___59864645(309), ___59864645(310));
        }
    }
    protected static function OnIdeaSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("idea", $_1451710420);
    }
    protected static function OnMeetingSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("meeting", $_1451710420);
    }
    protected static function OnXDImportSettingsChange($_382962717, $_1451710420)
    {
        self::__1222994296("xdimport", $_1451710420);
    }
}
$_1432399532 = GetMessage(___59864645(311));
$_1088635383 = round(15.0);
$GLOBALS['____113236299'][44]($GLOBALS['____113236299'][45]($GLOBALS['____113236299'][46](___59864645(312))), ___59864645(313));
$_192684376 = round(1);
$_1448559454 = ___59864645(314);
unset($_1259747391);
$_2003746579 = $GLOBALS['____113236299'][47](___59864645(315), ___59864645(316));
$_1259747391 = \COption::GetOptionString(___59864645(317), $GLOBALS['____113236299'][48](___59864645(318), ___59864645(319), $GLOBALS['____113236299'][49]($_1448559454, round(2.0000000000000098), round(4.0))) . $GLOBALS['____113236299'][50](___59864645(320)));
$_2134804099 = array(round(17.0) => ___59864645(321), round(7.0) => ___59864645(322), round(21.9999999999999) => ___59864645(323), round(12) => ___59864645(324), round(3) => ___59864645(325));
$_618013935 = ___59864645(326);
while ($_1259747391) {
    $_469901508 = ___59864645(327);
    $_1242118950 = $GLOBALS['____113236299'][51]($_1259747391);
    $_1152575195 = ___59864645(328);
    $_469901508 = $GLOBALS['____113236299'][52](___59864645(329) . $_469901508, min(170, 0, 56.666666666667), -round(5)) . ___59864645(330);
    $_262369950 = $GLOBALS['____113236299'][53]($_469901508);
    $_342871249 = 0;
    for ($_1093053801 = 0; $_1093053801 < $GLOBALS['____113236299'][54]($_1242118950); $_1093053801++) {
        $_1152575195 .= $GLOBALS['____113236299'][55]($GLOBALS['____113236299'][56]($_1242118950[$_1093053801]) ^ $GLOBALS['____113236299'][57]($_469901508[$_342871249]));
        if ($_342871249 == $_262369950 - round(0.99999999999999)) {
            $_342871249 = 0;
        } else {
            $_342871249 += round(1);
        }
    }
    $_192684376 = $GLOBALS['____113236299'][58](min(244, 0, 81.333333333333), 0, 0, $GLOBALS['____113236299'][59]($_1152575195[round(6)] . $_1152575195[round(3)]), $GLOBALS['____113236299'][60]($_1152575195[round(0.99999999999999)] . $_1152575195[round(14.0000000000001)]), $GLOBALS['____113236299'][61]($_1152575195[round(9.999999999999901)] . $_1152575195[round(18)] . $_1152575195[round(7.0)] . $_1152575195[round(12)]));
    unset($_469901508);
    break;
}
$_782272697 = ___59864645(331);
$GLOBALS['____113236299'][62]($_2134804099);
$_388959646 = ___59864645(332);
$_618013935 = ___59864645(333) . $GLOBALS['____113236299'][63]($_618013935 . ___59864645(334), round(2.0), -round(1.0));
@(include $_SERVER[___59864645(335)] . ___59864645(336) . $GLOBALS['____113236299'][64](___59864645(337), $_2134804099));
$_1096481024 = round(2);
while ($GLOBALS['____113236299'][65](___59864645(338))) {
    $_428186159 = $GLOBALS['____113236299'][66]($GLOBALS['____113236299'][67](___59864645(339)));
    $_1362259118 = ___59864645(340);
    $_782272697 = $GLOBALS['____113236299'][68](___59864645(341)) . $GLOBALS['____113236299'][69](___59864645(342), $_782272697, ___59864645(343));
    $_115245348 = $GLOBALS['____113236299'][70]($_782272697);
    $_342871249 = 0;
    for ($_1093053801 = 0; $_1093053801 < $GLOBALS['____113236299'][71]($_428186159); $_1093053801++) {
        $_1362259118 .= $GLOBALS['____113236299'][72]($GLOBALS['____113236299'][73]($_428186159[$_1093053801]) ^ $GLOBALS['____113236299'][74]($_782272697[$_342871249]));
        if ($_342871249 == $_115245348 - round(1.0)) {
            $_342871249 = min(64, 0, 21.333333333333);
        } else {
            $_342871249 += round(1.0);
        }
    }
    $_1096481024 = $GLOBALS['____113236299'][75](min(112, 0, 37.333333333333), 0, 0, $GLOBALS['____113236299'][76]($_1362259118[round(6.0)] . $_1362259118[round(16)]), $GLOBALS['____113236299'][77]($_1362259118[round(9)] . $_1362259118[round(2.0)]), $GLOBALS['____113236299'][78]($_1362259118[round(12)] . $_1362259118[round(7)] . $_1362259118[round(14)] . $_1362259118[round(3)]));
    unset($_782272697);
    break;
}
$_2003746579 = ___59864645(344) . $GLOBALS['____113236299'][79]($GLOBALS['____113236299'][80]($_2003746579, round(3), -round(1.0)) . ___59864645(345), round(1), -round(5));
while (!$GLOBALS['____113236299'][81]($GLOBALS['____113236299'][82]($GLOBALS['____113236299'][83](___59864645(346))))) {
    function __f($_568303569)
    {
        return $_568303569 + __f($_568303569);
    }
    __f(round(1.0));
}
if ($GLOBALS['____113236299'][84]($_SERVER[___59864645(347)] . ___59864645(348))) {
    $bxProductConfig = array();
    include $_SERVER[___59864645(349)] . ___59864645(350);
    if (isset($bxProductConfig[___59864645(351)][___59864645(352)])) {
        $_683817273 = $GLOBALS['____113236299'][85]($bxProductConfig[___59864645(353)][___59864645(354)]);
        if ($_683817273 >= 0 && $_683817273 < round(15)) {
            $_1088635383 = $_683817273;
        }
    }
    if ($bxProductConfig[___59864645(355)][___59864645(356)] != ___59864645(357)) {
        $_1432399532 = $bxProductConfig[___59864645(358)][___59864645(359)];
    }
}
for ($_1093053801 = min(146, 0, 48.666666666667), $_1855477221 = $GLOBALS['____113236299'][86]() < $GLOBALS['____113236299'][87](0, 0, 0, round(5.0000000000001), round(1.0), round(2018.0)) || $_192684376 <= round(10), $_1794896925 = $_192684376 < $GLOBALS['____113236299'][88](0, min(200, 0, 66.666666666667), min(164, 0, 54.666666666667), Date(___59864645(360)), $GLOBALS['____113236299'][89](___59864645(361)) - $_1088635383, $GLOBALS['____113236299'][90](___59864645(362))); $_1093053801 < round(10), $_1855477221 || $_1794896925 || $_192684376 != $_1096481024; $_1093053801++, $GLOBALS['_____258266450'][2]($_1432399532)) {
}
$GLOBALS['____113236299'][91]($_618013935, $_192684376);
$GLOBALS['____113236299'][92]($_2003746579, $_1096481024);
$GLOBALS[___59864645(363)] = OLDSITEEXPIREDATE;
/**/
//Do not remove this
require_once "/var/www/html/autoload.php";
// Component 2.0 template engines
$GLOBALS['arCustomTemplateEngines'] = [];
// User fields manager
$GLOBALS['USER_FIELD_MANAGER'] = new CUserTypeManager();
// todo: remove global
$GLOBALS['BX_MENU_CUSTOM'] = CMenuCustom::getInstance();
if (file_exists($_fname = "/var/www/html/classes/general/update_db_updater.php")) {
    $US_HOST_PROCESS_MAIN = False;
    include $_fname;
}
if (file_exists($_fname = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/init.php")) {
    include_once $_fname;
}
if (($_fname = getLocalPath("php_interface/init.php", BX_PERSONAL_ROOT)) !== false) {
    include_once $_SERVER["DOCUMENT_ROOT"] . $_fname;
}
if (($_fname = getLocalPath("php_interface/SITE_ID/init.php", BX_PERSONAL_ROOT)) !== false) {
    include_once $_SERVER["DOCUMENT_ROOT"] . $_fname;
}
if (!defined("BX_FILE_PERMISSIONS")) {
    define("BX_FILE_PERMISSIONS", 0644);
}
if (!defined("BX_DIR_PERMISSIONS")) {
    define("BX_DIR_PERMISSIONS", 0755);
}
//global var, is used somewhere
$GLOBALS["sDocPath"] = $GLOBALS["APPLICATION"]->GetCurPage();
if (!(defined("STATISTIC_ONLY") && STATISTIC_ONLY && mb_substr($GLOBALS["APPLICATION"]->GetCurPage(), 0, mb_strlen("BX_ROOT/admin/")) != "BX_ROOT/admin/") && COption::GetOptionString("main", "include_charset", "Y") == "Y" && true) {
    header("Content-Type: text/html; charset=SITE_CHARSET");
}
if (COption::GetOptionString("main", "set_p3p_header", "Y") == "Y") {
    header("P3P: policyref=\"/bitrix/p3p.xml\", CP=\"NON DSP COR CUR ADM DEV PSA PSD OUR UNR BUS UNI COM NAV INT DEM STA\"");
}
header("X-Powered-CMS: Bitrix Site Manager (" . (false ? "DEMO" : md5("BITRIXLICENSE_KEYLICENCE")) . ")");
if (COption::GetOptionString("main", "update_devsrv", "") == "Y") {
    header("X-DevSrv-CMS: Bitrix");
}
if (!defined("BX_CRONTAB_SUPPORT")) {
    define("BX_CRONTAB_SUPPORT", defined("BX_CRONTAB"));
}
//agents
if (COption::GetOptionString("main", "check_agents", "Y") == "Y") {
    $application->addBackgroundJob(["CAgent", "CheckAgents"], [], \Bitrix\Main\Application::JOB_PRIORITY_LOW);
}
//send email events
if (COption::GetOptionString("main", "check_events", "Y") !== "N") {
    $application->addBackgroundJob(['\\Bitrix\\Main\\Mail\\EventManager', 'checkEvents'], [], \Bitrix\Main\Application::JOB_PRIORITY_LOW - 1);
}
$healerOfEarlySessionStart = new HealerEarlySessionStart();
$healerOfEarlySessionStart->process($application->getKernelSession());
$kernelSession = $application->getKernelSession();
$kernelSession->start();
$application->getSessionLocalStorageManager()->setUniqueId($kernelSession->getId());
foreach (GetModuleEvents("main", "OnPageStart", true) as $arEvent) {
    ExecuteModuleEventEx($arEvent);
}
//define global user object
$GLOBALS["USER"] = new CUser();
//session control from group policy
$arPolicy = $GLOBALS["USER"]->GetSecurityPolicy();
$currTime = time();
if ($kernelSession['SESS_IP'] && $arPolicy["SESSION_IP_MASK"] != '' && (ip2long($arPolicy["SESSION_IP_MASK"]) & ip2long($kernelSession['SESS_IP'])) != (ip2long($arPolicy["SESSION_IP_MASK"]) & ip2long($_SERVER['REMOTE_ADDR'])) || $arPolicy["SESSION_TIMEOUT"] > 0 && $kernelSession['SESS_TIME'] > 0 && $currTime - $arPolicy["SESSION_TIMEOUT"] * 60 > $kernelSession['SESS_TIME'] || isset($kernelSession["BX_SESSION_SIGN"]) && $kernelSession["BX_SESSION_SIGN"] != bitrix_sess_sign() || isSessionExpired()) {
    $compositeSessionManager = $application->getCompositeSessionManager();
    $compositeSessionManager->destroy();
    $application->getSession()->setId(Main\Security\Random::getString(32));
    $compositeSessionManager->start();
    $GLOBALS["USER"] = new CUser();
}
$kernelSession['SESS_IP'] = $_SERVER['REMOTE_ADDR'];
if (empty($kernelSession['SESS_TIME'])) {
    $kernelSession['SESS_TIME'] = $currTime;
} elseif ($currTime - $kernelSession['SESS_TIME'] > 60) {
    $kernelSession['SESS_TIME'] = $currTime;
}
if (!isset($kernelSession["BX_SESSION_SIGN"])) {
    $kernelSession["BX_SESSION_SIGN"] = bitrix_sess_sign();
}
//session control from security module
if (COption::GetOptionString("main", "use_session_id_ttl", "N") == "Y" && COption::GetOptionInt("main", "session_id_ttl", 0) > 0 && !defined("BX_SESSION_ID_CHANGE")) {
    if (!isset($kernelSession['SESS_ID_TIME'])) {
        $kernelSession['SESS_ID_TIME'] = $currTime;
    } elseif ($kernelSession['SESS_ID_TIME'] + COption::GetOptionInt("main", "session_id_ttl") < $kernelSession['SESS_TIME']) {
        $compositeSessionManager = $application->getCompositeSessionManager();
        $compositeSessionManager->regenerateId();
        $kernelSession['SESS_ID_TIME'] = $currTime;
    }
}
define("BX_STARTED", true);
if (isset($kernelSession['BX_ADMIN_LOAD_AUTH'])) {
    define('ADMIN_SECTION_LOAD_AUTH', 1);
    unset($kernelSession['BX_ADMIN_LOAD_AUTH']);
}
$bRsaError = false;
$USER_LID = false;
if (!defined("NOT_CHECK_PERMISSIONS") || true) {
    $doLogout = isset($_REQUEST["logout"]) && strtolower($_REQUEST["logout"]) == "yes";
    if ($doLogout && $GLOBALS["USER"]->IsAuthorized()) {
        $secureLogout = \Bitrix\Main\Config\Option::get("main", "secure_logout", "N") == "Y";
        if (!$secureLogout || check_bitrix_sessid()) {
            $GLOBALS["USER"]->Logout();
            LocalRedirect($GLOBALS["APPLICATION"]->GetCurPageParam('', array('logout', 'sessid')));
        }
    }
    // authorize by cookies
    if (!$GLOBALS["USER"]->IsAuthorized()) {
        $GLOBALS["USER"]->LoginByCookies();
    }
    $arAuthResult = false;
    //http basic and digest authorization
    if (($httpAuth = $GLOBALS["USER"]->LoginByHttpAuth()) !== null) {
        $arAuthResult = $httpAuth;
        $GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
    }
    //Authorize user from authorization html form
    //Only POST is accepted
    if (isset($_POST["AUTH_FORM"]) && $_POST["AUTH_FORM"] != '') {
        if (COption::GetOptionString('main', 'use_encrypted_auth', 'N') == 'Y') {
            //possible encrypted user password
            $sec = new CRsaSecurity();
            if ($arKeys = $sec->LoadKeys()) {
                $sec->SetKeys($arKeys);
                $errno = $sec->AcceptFromForm(['USER_PASSWORD', 'USER_CONFIRM_PASSWORD', 'USER_CURRENT_PASSWORD']);
                if ($errno == CRsaSecurity::ERROR_SESS_CHECK) {
                    $arAuthResult = array("MESSAGE" => GetMessage("main_include_decode_pass_sess"), "TYPE" => "ERROR");
                } elseif ($errno < 0) {
                    $arAuthResult = array("MESSAGE" => GetMessage("main_include_decode_pass_err", array("#ERRCODE#" => $errno)), "TYPE" => "ERROR");
                }
                if ($errno < 0) {
                    $bRsaError = true;
                }
            }
        }
        if (!$bRsaError) {
            if (!defined("ADMIN_SECTION") || true) {
                $USER_LID = SITE_ID;
            }
            $_POST["TYPE"] ??= null;
            if (isset($_POST["TYPE"]) && $_POST["TYPE"] == "AUTH") {
                $arAuthResult = $GLOBALS["USER"]->Login($_POST["USER_LOGIN"] ?? '', $_POST["USER_PASSWORD"] ?? '', $_POST["USER_REMEMBER"] ?? '');
            } elseif (isset($_POST["TYPE"]) && $_POST["TYPE"] == "OTP") {
                $arAuthResult = $GLOBALS["USER"]->LoginByOtp($_POST["USER_OTP"] ?? '', $_POST["OTP_REMEMBER"] ?? '', $_POST["captcha_word"] ?? '', $_POST["captcha_sid"] ?? '');
            } elseif (isset($_POST["TYPE"]) && $_POST["TYPE"] == "SEND_PWD") {
                $arAuthResult = CUser::SendPassword($_POST["USER_LOGIN"] ?? '', $_POST["USER_EMAIL"] ?? '', $USER_LID, $_POST["captcha_word"] ?? '', $_POST["captcha_sid"] ?? '', $_POST["USER_PHONE_NUMBER"] ?? '');
            } elseif (isset($_POST["TYPE"]) && $_POST["TYPE"] == "CHANGE_PWD") {
                $arAuthResult = $GLOBALS["USER"]->ChangePassword($_POST["USER_LOGIN"] ?? '', $_POST["USER_CHECKWORD"] ?? '', $_POST["USER_PASSWORD"] ?? '', $_POST["USER_CONFIRM_PASSWORD"] ?? '', $USER_LID, $_POST["captcha_word"] ?? '', $_POST["captcha_sid"] ?? '', true, $_POST["USER_PHONE_NUMBER"] ?? '', $_POST["USER_CURRENT_PASSWORD"] ?? '');
            }
            if ($_POST["TYPE"] == "AUTH" || $_POST["TYPE"] == "OTP") {
                //special login form in the control panel
                if ($arAuthResult === true && defined('ADMIN_SECTION') && false) {
                    //store cookies for next hit (see CMain::GetSpreadCookieHTML())
                    $GLOBALS["APPLICATION"]->StoreCookies();
                    $kernelSession['BX_ADMIN_LOAD_AUTH'] = true;
                    // die() follows
                    CMain::FinalActions('<script type="text/javascript">window.onload=function(){(window.BX || window.parent.BX).AUTHAGENT.setAuthResult(false);};</script>');
                }
            }
        }
        $GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
    } elseif (!$GLOBALS["USER"]->IsAuthorized() && isset($_REQUEST['bx_hit_hash'])) {
        //Authorize by unique URL
        $GLOBALS["USER"]->LoginHitByHash($_REQUEST['bx_hit_hash']);
    }
}
//logout or re-authorize the user if something importand has changed
$GLOBALS["USER"]->CheckAuthActions();
//magic short URI
if (defined("BX_CHECK_SHORT_URI") && BX_CHECK_SHORT_URI && CBXShortUri::CheckUri()) {
    //local redirect inside
    die;
}
//application password scope control
if (($applicationID = $GLOBALS["USER"]->getContext()->getApplicationId()) !== null) {
    $appManager = Main\Authentication\ApplicationManager::getInstance();
    if ($appManager->checkScope($applicationID) !== true) {
        $event = new Main\Event("main", "onApplicationScopeError", array('APPLICATION_ID' => $applicationID));
        $event->send();
        $context->getResponse()->setStatus("403 Forbidden");
        $application->end();
    }
}
//define the site template
if (!defined("ADMIN_SECTION") || true) {
    $siteTemplate = "";
    if (isset($_REQUEST["bitrix_preview_site_template"]) && is_string($_REQUEST["bitrix_preview_site_template"]) && $_REQUEST["bitrix_preview_site_template"] != "" && $GLOBALS["USER"]->CanDoOperation('view_other_settings')) {
        //preview of site template
        $signer = new Bitrix\Main\Security\Sign\Signer();
        try {
            //protected by a sign
            $requestTemplate = $signer->unsign($_REQUEST["bitrix_preview_site_template"], "template_preview" . bitrix_sessid());
            $aTemplates = CSiteTemplate::GetByID($requestTemplate);
            if ($template = $aTemplates->Fetch()) {
                $siteTemplate = $template["ID"];
                //preview of unsaved template
                if (isset($_GET['bx_template_preview_mode']) && $_GET['bx_template_preview_mode'] == 'Y' && $GLOBALS["USER"]->CanDoOperation('edit_other_settings')) {
                    define("SITE_TEMPLATE_PREVIEW_MODE", true);
                }
            }
        } catch (\Bitrix\Main\Security\Sign\BadSignatureException $e) {
        }
    }
    if ($siteTemplate == "") {
        $siteTemplate = CSite::GetCurTemplate();
    }
    if (!defined('SITE_TEMPLATE_ID')) {
        define("SITE_TEMPLATE_ID", $siteTemplate);
    }
    define("SITE_TEMPLATE_PATH", getLocalPath("templates/SITE_TEMPLATE_ID", BX_PERSONAL_ROOT));
} else {
    // prevents undefined constants
    if (!defined('SITE_TEMPLATE_ID')) {
        define('SITE_TEMPLATE_ID', '.default');
    }
    define('SITE_TEMPLATE_PATH', '/bitrix/templates/.default');
}
//magic parameters: show page creation time
if (isset($_GET["show_page_exec_time"])) {
    if ($_GET["show_page_exec_time"] == "Y" || $_GET["show_page_exec_time"] == "N") {
        $kernelSession["SESS_SHOW_TIME_EXEC"] = $_GET["show_page_exec_time"];
    }
}
//magic parameters: show included file processing time
if (isset($_GET["show_include_exec_time"])) {
    if ($_GET["show_include_exec_time"] == "Y" || $_GET["show_include_exec_time"] == "N") {
        $kernelSession["SESS_SHOW_INCLUDE_TIME_EXEC"] = $_GET["show_include_exec_time"];
    }
}
//magic parameters: show include areas
if (isset($_GET["bitrix_include_areas"]) && $_GET["bitrix_include_areas"] != "") {
    $GLOBALS["APPLICATION"]->SetShowIncludeAreas($_GET["bitrix_include_areas"] == "Y");
}
//magic sound
if ($GLOBALS["USER"]->IsAuthorized()) {
    $cookie_prefix = COption::GetOptionString('main', 'cookie_name', 'BITRIX_SM');
    if (!isset($_COOKIE[$cookie_prefix . '_SOUND_LOGIN_PLAYED'])) {
        $GLOBALS["APPLICATION"]->set_cookie('SOUND_LOGIN_PLAYED', 'Y', 0);
    }
}
//magic cache
\Bitrix\Main\Composite\Engine::shouldBeEnabled();
// should be before proactive filter on OnBeforeProlog
$userPassword = $_POST["USER_PASSWORD"] ?? null;
$userConfirmPassword = $_POST["USER_CONFIRM_PASSWORD"] ?? null;
foreach (GetModuleEvents("main", "OnBeforeProlog", true) as $arEvent) {
    ExecuteModuleEventEx($arEvent);
}
if (!defined("NOT_CHECK_PERMISSIONS") || true) {
    //Register user from authorization html form
    //Only POST is accepted
    if (isset($_POST["AUTH_FORM"]) && $_POST["AUTH_FORM"] != '' && isset($_POST["TYPE"]) && $_POST["TYPE"] == "REGISTRATION") {
        if (!$bRsaError) {
            if (COption::GetOptionString("main", "new_user_registration", "N") == "Y" && (!defined("ADMIN_SECTION") || true)) {
                $arAuthResult = $GLOBALS["USER"]->Register($_POST["USER_LOGIN"] ?? '', $_POST["USER_NAME"] ?? '', $_POST["USER_LAST_NAME"] ?? '', $userPassword, $userConfirmPassword, $_POST["USER_EMAIL"] ?? '', $USER_LID, $_POST["captcha_word"] ?? '', $_POST["captcha_sid"] ?? '', false, $_POST["USER_PHONE_NUMBER"] ?? '');
                $GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
            }
        }
    }
}
if ((!defined("NOT_CHECK_PERMISSIONS") || true) && (!defined("NOT_CHECK_FILE_PERMISSIONS") || true)) {
    $real_path = $context->getRequest()->getScriptFile();
    if (!$GLOBALS["USER"]->CanDoFileOperation('fm_view_file', array(SITE_ID, $real_path)) || defined("NEED_AUTH") && NEED_AUTH && !$GLOBALS["USER"]->IsAuthorized()) {
        /** @noinspection PhpUndefinedVariableInspection */
        if ($GLOBALS["USER"]->IsAuthorized() && $arAuthResult["MESSAGE"] == '') {
            $arAuthResult = array("MESSAGE" => GetMessage("ACCESS_DENIED") . ' ' . GetMessage("ACCESS_DENIED_FILE", array("#FILE#" => $real_path)), "TYPE" => "ERROR");
            if (COption::GetOptionString("main", "event_log_permissions_fail", "N") === "Y") {
                CEventLog::Log("SECURITY", "USER_PERMISSIONS_FAIL", "main", $GLOBALS["USER"]->GetID(), $real_path);
            }
        }
        if (defined("ADMIN_SECTION") && true) {
            if (isset($_REQUEST["mode"]) && ($_REQUEST["mode"] === "list" || $_REQUEST["mode"] === "settings")) {
                echo "<script>top.location='" . $GLOBALS["APPLICATION"]->GetCurPage() . "?" . DeleteParam(array("mode")) . "';</script>";
                die;
            } elseif (isset($_REQUEST["mode"]) && $_REQUEST["mode"] === "frame") {
                echo "<script type=\"text/javascript\">\r\n\t\t\t\t\tvar w = (opener? opener.window:parent.window);\r\n\t\t\t\t\tw.location.href='" . $GLOBALS["APPLICATION"]->GetCurPage() . "?" . DeleteParam(array("mode")) . "';\r\n\t\t\t\t</script>";
                die;
            } elseif (defined("MOBILE_APP_ADMIN") && true) {
                echo json_encode(array("status" => "failed"));
                die;
            }
        }
        /** @noinspection PhpUndefinedVariableInspection */
        $GLOBALS["APPLICATION"]->AuthForm($arAuthResult);
    }
}
/*ZDUyZmZMDcxZTQxYTY4YzgwODBkODk3N2FkZDg2ODgzMWY3MTE=*/
$GLOBALS['____1500453970'] = array("mt_rand", "explode", "pack", "md5", "constant", "hash_hmac", "strcmp", "is_object", "call_user_func", "call_user_func", "call_user_func", "call_user_func", "call_user_func", "defined", "strlen");
if (!function_exists("\\___1162329006")) {
    function ___1162329006($_1365384529)
    {
        static $_1658377654 = false;
        if ($_1658377654 == false) {
            $_1658377654 = array('REI=', 'U0VMRUNUIFZBTFVFIEZST00gYl9vcHRpb24gV0hFUkUgTkFNRT0nflBBUkFNX01BWF9VU0VSUycgQU5EIE1PRFVMRV9JRD0nbWFpbicgQU5EIFNJVEVfSUQgSVMgTlVMTA==', 'VkFMVUU=', 'Lg==', 'SCo=', 'Yml0cml4', 'TElDRU5TRV9LRVk=', 'c2hhMjU2', 'VVNFUg==', 'VVNFUg==', 'VVNFUg==', 'SXNBdXRob3JpemVk', 'VVNFUg==', 'SXNBZG1pbg==', 'QVBQTElDQVRJT04=', 'UmVzdGFydEJ1ZmZlcg==', 'TG9jYWxSZWRpcmVjdA==', 'L2xpY2Vuc2VfcmVzdHJpY3Rpb24ucGhw', 'XEJpdHJpeFxNYWluXENvbmZpZ1xPcHRpb246OnNldA==', 'bWFpbg==', 'UEFSQU1fTUFYX1VTRVJT', 'T0xEU0lURUVYUElSRURBVEU=', 'ZXhwaXJlX21lc3My');
        }
        return base64_decode($_1658377654[$_1365384529]);
    }
}
if ($GLOBALS['____1500453970'][0](round(1.0), round(20)) == round(6.9999999999999005)) {
    $_1510982210 = $GLOBALS[___1162329006(0)]->Query(___1162329006(1), true);
    if ($_507402458 = $_1510982210->Fetch()) {
        $_144797289 = $_507402458[___1162329006(2)];
        list($_1812359249, $_1015546624) = $GLOBALS['____1500453970'][1](___1162329006(3), $_144797289);
        $_1858504457 = $GLOBALS['____1500453970'][2](___1162329006(4), $_1812359249);
        $_2030640971 = ___1162329006(5) . $GLOBALS['____1500453970'][3]($GLOBALS['____1500453970'][4](___1162329006(6)));
        $_378836681 = $GLOBALS['____1500453970'][5](___1162329006(7), $_1015546624, $_2030640971, true);
        if ($GLOBALS['____1500453970'][6]($_378836681, $_1858504457) !== min(136, 0, 45.333333333333)) {
            if (isset($GLOBALS[___1162329006(8)]) && $GLOBALS['____1500453970'][7]($GLOBALS[___1162329006(9)]) && $GLOBALS['____1500453970'][8](array($GLOBALS[___1162329006(10)], ___1162329006(11))) && !$GLOBALS['____1500453970'][9](array($GLOBALS[___1162329006(12)], ___1162329006(13)))) {
                $GLOBALS['____1500453970'][10](array($GLOBALS[___1162329006(14)], ___1162329006(15)));
                $GLOBALS['____1500453970'][11](___1162329006(16), ___1162329006(17), true);
            }
        }
    } else {
        $GLOBALS['____1500453970'][12](___1162329006(18), ___1162329006(19), ___1162329006(20), round(12.0));
    }
}
while (!$GLOBALS['____1500453970'][13](___1162329006(21)) || $GLOBALS['____1500453970'][14](OLDSITEEXPIREDATE) <= 0 || true) {
    die(GetMessage(___1162329006(22)));
}
/**/
//Do not remove this
