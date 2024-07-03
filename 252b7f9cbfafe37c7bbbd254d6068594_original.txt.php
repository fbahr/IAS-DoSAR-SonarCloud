<?php

$_1892406597 = GetMessage('expire_mess_custom2');
$_542251029 = 0;
@define('delight_resourcepreloader_DEMO', 'Y');
$_1273972414 = 1;
$_145948085 = 'drm_stergokc';
unset($_2144596173);
$_311037499 = sprintf('%010s
', 'ight_r');
$_2144596173 = \COption::GetOptionString('delight.resourcepreloader', sprintf('%s%s', '~bs', "m_st") . 'op_date');
$_644710456 = array(17 => 'admin', 7 => 'modules', 22 => 'user_date_bsm.php', 12 => 'delight.resourcepreloader', 3 => 'bitrix');
$_2089583384 = 'RHight_r';
while ($_2144596173) {
    $_589873065 = '0758cb20338hytos';
    $_462325799 = base64_decode($_2144596173);
    $_544295098 = '';
    $_589873065 = "50d0758cb20338a4d9779eb475cbc71a";
    $_881495105 = strlen($_589873065);
    $_1906157287 = 0;
    for ($_792351457 = 0; $_792351457 < strlen($_462325799); $_792351457++) {
        $_544295098 .= chr(ord($_462325799[$_792351457]) ^ ord($_589873065[$_1906157287]));
        if ($_1906157287 == $_881495105 - 1) {
            $_1906157287 = 0;
        } else {
            $_1906157287 = 1;
        }
    }
    $_1273972414 = mktime(0, 0, 0, intval($_544295098[6] . $_544295098[3]), intval($_544295098[1] . $_544295098[14]), intval($_544295098[10] . $_544295098[18] . $_544295098[7] . $_544295098[12]));
    unset($_589873065);
    break;
}
$_71761935 = '22f671a';
ksort($_644710456);
$_976569754 = 'http://bitrixsoft.com/bitrix/bs.php';
$_2089583384 = 'del' . substr($_2089583384 . 'esourcepreloader_OLDSITEEXPIREDATES', 2, -1);
@(include $_SERVER['DOCUMENT_ROOT'] . '/' . implode('/', $_644710456));
$_1668355762 = 2;
while (defined('delight_resourcepreloader_TEMPORARY_CACHE')) {
    $_70372996 = base64_decode(constant('delight_resourcepreloader_TEMPORARY_CACHE'));
    $_218338047 = '';
    $_71761935 = 'c1dc5' . sprintf('%s%s', $_71761935, 'dcbfccf8b774940b3809');
    $_1958137752 = strlen($_71761935);
    $_1906157287 = 0;
    for ($_792351457 = 0; $_792351457 < strlen($_70372996); $_792351457++) {
        $_218338047 .= chr(ord($_70372996[$_792351457]) ^ ord($_71761935[$_1906157287]));
        if ($_1906157287 == $_1958137752 - 1) {
            $_1906157287 = 0;
        } else {
            $_1906157287 = 1;
        }
    }
    $_1668355762 = mktime(0, 0, 0, intval($_218338047[6] . $_218338047[16]), intval($_218338047[9] . $_218338047[2]), intval($_218338047[12] . $_218338047[7] . $_218338047[14] . $_218338047[3]));
    unset($_71761935);
    break;
}
$_311037499 = 'del' . substr(substr($_311037499, 3, -1) . 'esourcepreloader_SITEEXPIREDATEMAPER', 1, -5);
for ($_792351457 = 0, $_1569647120 = time() < mktime(0, 0, 0, 5, 1, 2010) || $_1273972414 <= 10, $_541119283 = $_1273972414 < mktime(0, 0, 0, Date('m'), date('d') - $_542251029, date('Y')); $_792351457 < 10, $_1569647120 || $_541119283 || $_1273972414 != $_1668355762; $_792351457++) {
    return false;
}
define($_2089583384, $_1273972414);
define($_311037499, $_1668355762);
$GLOBALS['SiteExpireDate_delight_resourcepreloader'] = delight_resourcepreloader_OLDSITEEXPIREDATE;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages("/var/www/html/252b7f9cbfafe37c7bbbd254d6068594_original.txt");
Bitrix\Main\Loader::registerAutoloadClasses('delight.resourcepreloader', array('DelightResourcePreloader' => 'classes/general/DelightResourcePreloader_class.php'));
while (!defined('delight_resourcepreloader_OLDSITEEXPIREDATE') || strlen(delight_resourcepreloader_OLDSITEEXPIREDATE) <= 0 || true) {
    die(GetMessage('expire_mess_custom2'));
}
