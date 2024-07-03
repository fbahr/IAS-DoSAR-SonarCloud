<?php

//*********************************************************************************/
/**
 *
 * (c) 2012 by Scholl Communications AG
 *
 * Diese Software ist urheberrechtlich geschtzt.
 * Es ist verboten, den Quelltext zu entschlsseln oder zu vernden,
 * sowie die Software mehr als lizensiert zu nutzen.
 * Zuwiderhandlungen werden strafrechtlich verfolgt.
 *
 */
//*********************************************************************************/
class gXsltProcessor extends gClassBasicCoreStandard
{
    static $_db63fe = 0;
    public static function _a21401($_e61c67, $_cd3785, $parameters = NULL, $_dc6bf2 = NULL)
    {
        if (file_exists($_e61c67)) {
            $_1e534d = gFilehandler::_2b0180($_e61c67);
        } else {
            $_b0291e = 'processXslt::_3641e8 (' . $_e61c67 . ')';
            throw new gException($_b0291e);
        }
        if (file_exists($_cd3785)) {
            $_6db43e = gFilehandler::_2b0180($_cd3785);
        } else {
            $_b0291e = 'processXslt::_fbfc59 (' . $_cd3785 . ')';
            throw new gException($_b0291e);
        }
        $_efcd33 = self::_2dd454($_1e534d, $_6db43e, $parameters, $_dc6bf2);
        return $_efcd33;
    }
    public static function _2dd454(&$_1e534d, &$_6db43e, $parameters = array(), $_dc6bf2 = array())
    {
        $_a97dbf = gApplicationEnv::_a62f6f('/wConf/debug/xslt/@errors');
        if ($_a97dbf != 'all') {
            $_a97dbf = 'admin';
        }
        if (!is_array($parameters)) {
            $parameters = array();
        }
        if (!is_array($_dc6bf2)) {
            $_dc6bf2 = array();
        }
        $_1e534d = str_replace('&lt;?', '~wpistart~', $_1e534d);
        $_1e534d = str_replace('?&gt;', '~wpiend~', $_1e534d);
        $_00efd4 = new DOMDocument();
        $_6db43e = str_replace("\$XSLTPRE[wDocumentRoot]", gServerEnv::_f6c23e(), $_6db43e);
        if (empty($parameters['wDocumentRoot'])) {
            $parameters['wDocumentRoot'] = gServerEnv::_f6c23e();
        }
        if (empty($parameters['wUserLanguage'])) {
            $parameters['wUserLanguage'] = gSession::_cbd31f();
        }
        if (empty($parameters['wHostURL'])) {
            $parameters['wHostURL'] = gServerEnv::_978ce6();
        }
        if (empty($parameters['wDocumentURL'])) {
            $parameters['wDocumentURL'] = gHttpRequest::_ea0023(true);
        }
        if (empty($parameters['wRequestURL'])) {
            $parameters['wRequestURL'] = gHttpRequest::_1b90ab(true);
        }
        $_8e3260 = isset($GLOBALS['LIBXML_LOAD_OPTIONS']) ? $GLOBALS['LIBXML_LOAD_OPTIONS'] : 0;
        if (!empty($GLOBALS['debugXsltErrors'])) {
            error_clear_last();
        }
        if (!@$_00efd4->loadXML($_1e534d, $_8e3260)) {
            $_0665a2 = error_get_last();
            if (($_a97dbf == 'admin' && gSession::_c12fd0() == 'admin' && empty($_dc6bf2['hideDebug']) || $_a97dbf == 'all' && !empty($_GET['debug'])) && $_0665a2) {
                $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_1e534d) . '.xml';
                gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_1e534d);
                $_f51f7f = 'Load XML Error';
                if (gSession::_cbd31f() == 'de') {
                    $_f51f7f = 'Es ist ein XML Fehler aufgetreten';
                }
                print '<div style="font-size:11px;font-color:#000000;font-family:arial, helvetica;display:inline-block;padding:10px;border:solid 1px #c0c0c0;background-color:#f0f0f0"><div style="font-weight:bold;font-color:#000000;font-size:14px;padding:10px 0;">' . $_f51f7f . '</div><div style="padding:0 0 10px 0">' . $_0665a2['message'] . '</div>';
                if (gSession::_c12fd0() == 'admin') {
                    print '<div><a style="color:black" target="_blank" href="' . $_802a03 . '">Open XML</a> <a href="http://weblik.de/Vorgehensweise-bei-XML-Fehlern" target="_blank">Info</a> <a style="float:right" href="#" onclick="if(location.href.indexOf(\'debugPHP\') == -1){location.href = location.href + (location.href.indexOf(\'?\') == -1 ? \'?\' : \'&\') + \'debugPHP=1&debug=1\'}else{location.reload(true)}">Neu laden</a>';
                    print "<a href=\"/weblication/grid5/scripts/wSystem.php\" target=\"_blank\">Backend ffnen</a>";
                }
                print "</div></div>";
                print "<script>parent.wHideBlocker();</script>";
                if (empty($GLOBALS['xmlErrorInEditor'])) {
                    exit;
                }
            }
            $GLOBALS['hasLoadXMLError'] = true;
            $_b0291e = "processXsltStr::_d2aa4d\n" . $_0665a2['message'];
            throw new gException($_b0291e, '|processXsltStr|001', 'error');
        }
        if (!empty($GLOBALS['debugXsltErrors'])) {
            $_0665a2 = error_get_last();
            if ($_0665a2) {
                $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_1e534d) . '.xml';
                gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_1e534d);
                print "\n<a href=\"" . $_802a03 . '" target="_blank">' . $_802a03 . '</a>';
                var_dump($_0665a2);
                exit;
            }
        }
        @$_00efd4->xinclude();
        $_c7532e = new DOMDocument();
        if (!@$_c7532e->loadXML($_6db43e)) {
            $_0665a2 = error_get_last();
            if (($_a97dbf == 'admin' && gSession::_c12fd0() == 'admin' && empty($_dc6bf2['hideDebug']) || $_a97dbf == 'all' && !empty($_GET['debug'])) && $_0665a2) {
                $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_6db43e) . '.xml';
                $_6db43e = preg_replace('/^' . preg_quote('<?php $version="1.0"; $encoding="UTF-8"; ?>', '/') . "\n*/", '', $_6db43e);
                $_6db43e = preg_replace('/^' . preg_quote('<?php exit; ?>', '/') . "\n*/", '', $_6db43e);
                gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_6db43e);
                print '<div style="font-size:11px;font-color:#000000;font-family:arial, helvetica;display:inline-block;padding:10px;border:solid 1px #c0c0c0;background-color:#f0f0f0"><div style="font-weight:bold;font-color:#000000;font-size:14px;padding:10px 0;">Load XSL ERROR</div><div style="padding:0 0 10px 0">' . $_0665a2['message'] . '</div><div><a style="color:black" target="_blank" href="' . $_802a03 . '">Open XSL</a></div></div>';
                exit;
            }
            $_b0291e = "processXsltStr::_d2aa4d\n" . $_0665a2['message'];
            throw new gException($_b0291e, '|processXsltStr|001', 'error');
        }
        $_0d3ad4 = new XSLTProcessor();
        if (is_array($parameters)) {
            foreach ($parameters as $_42b293 => $_11b00f) {
                if (!is_array($_11b00f)) {
                    if ($_11b00f === null) {
                        $_11b00f = '';
                    }
                    $_0d3ad4->setParameter('', $_42b293, gStringconverter::_1bea7c($_11b00f));
                }
            }
        }
        $_0d3ad4->registerPHPFunctions();
        $_efcd33 = '';
        if ($_a97dbf == 'admin' && gSession::_c12fd0() == 'admin') {
            if (!empty($_GET['debug'])) {
                libxml_clear_errors();
                $_0d3ad4->importStyleSheet($_c7532e);
                $_0665a2 = libxml_get_last_error();
                if ($_0665a2) {
                    var_dump($_0665a2);
                }
                ob_start();
                $_efcd33 = $_0d3ad4->transformToXML($_00efd4);
                $_014281 = ob_get_contents();
                ob_end_flush();
                if (!$_efcd33 && libxml_get_last_error()) {
                    $_0665a2 = libxml_get_last_error();
                    $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_1e534d . $_6db43e) . '.xml';
                    $_fde223 = '/weblication/grid5/tmpHTTP/lastError-xsl-' . md5($_1e534d . $_6db43e) . '.xml';
                    gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_1e534d);
                    gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_fde223, $_6db43e);
                    var_dump($_0665a2);
                    print '<div style="font-size:11px;font-color:#000000;font-family:arial, helvetica;display:inline-block;padding:10px;border:solid 1px #c0c0c0;background-color:#f0f0f0"><div style="font-weight:bold;font-color:#000000;font-size:14px;padding:10px 0;">Execute XSLT ERROR</div><div style="padding:0 0 10px 0">' . $_014281 . '</div><div style="padding:0 0 10px 0">' . $_0665a2->_3f85a4 . '</div><div><a style="color:black" target="_blank" href="' . $_802a03 . '">Open XML</a> <a style="color:black" target="_blank" href="' . $_fde223 . '">Open XSLT</a> <a style="float:right" href="#" onclick="location.reload(true)">Neu laden</a></div></div>';
                    exit;
                }
            } else {
                @$_0d3ad4->importStyleSheet($_c7532e);
                libxml_clear_errors();
                ob_start();
                $_efcd33 = @$_0d3ad4->transformToXML($_00efd4);
                $_014281 = ob_get_contents();
                ob_end_flush();
            }
        } else {
            @$_0d3ad4->importStyleSheet($_c7532e);
            $_efcd33 = @$_0d3ad4->transformToXML($_00efd4);
        }
        $_efcd33 = str_replace('~wpistart~', '&lt;?', $_efcd33 ?? '');
        $_efcd33 = str_replace('~wpiend~', '?&gt;', $_efcd33 ?? '');
        return $_efcd33;
    }
    public static function _0aeee9(&$_1e534d, &$_6db43e, $parameters = array(), $_dc6bf2 = array())
    {
        $_a97dbf = gApplicationEnv::_a62f6f('/wConf/debug/xslt/@errors');
        if ($_a97dbf != 'all') {
            $_a97dbf = 'admin';
        }
        if (!is_array($parameters)) {
            $parameters = array();
        }
        if (!is_array($_dc6bf2)) {
            $_dc6bf2 = array();
        }
        $_1e534d = str_replace('&lt;?', '~wpistart~', $_1e534d);
        $_1e534d = str_replace('?&gt;', '~wpiend~', $_1e534d);
        $_00efd4 = new DOMDocument();
        $_6db43e = str_replace("\$XSLTPRE[wDocumentRoot]", gServerEnv::_f6c23e(), $_6db43e);
        if (empty($parameters['wDocumentRoot'])) {
            $parameters['wDocumentRoot'] = gServerEnv::_f6c23e();
        }
        if (empty($parameters['wUserLanguage'])) {
            $parameters['wUserLanguage'] = gSession::_cbd31f();
        }
        if (empty($parameters['wHostURL'])) {
            $parameters['wHostURL'] = gServerEnv::_978ce6();
        }
        if (empty($parameters['wDocumentURL'])) {
            $parameters['wDocumentURL'] = gHttpRequest::_ea0023(true);
        }
        if (empty($parameters['wRequestURL'])) {
            $parameters['wRequestURL'] = gHttpRequest::_1b90ab(true);
        }
        $_8e3260 = isset($GLOBALS['LIBXML_LOAD_OPTIONS']) ? $GLOBALS['LIBXML_LOAD_OPTIONS'] : 0;
        if (!@$_00efd4->loadXML($_1e534d, $_8e3260)) {
            $_0665a2 = error_get_last();
            if ($_0665a2) {
                $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_1e534d) . '.xml';
                gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_1e534d);
                $_f51f7f = 'Load XML Error';
                if (gSession::_cbd31f() == 'de') {
                    $_f51f7f = 'Es ist ein XML Fehler aufgetreten';
                }
                print '<div style="font-size:11px;font-color:#000000;font-family:arial, helvetica;display:inline-block;padding:10px;border:solid 1px #c0c0c0;background-color:#f0f0f0"><div style="font-weight:bold;font-color:#000000;font-size:14px;padding:10px 0;">' . $_f51f7f . '</div><div style="padding:0 0 10px 0">' . $_0665a2['message'] . '</div>';
                if (gSession::_c12fd0() == 'admin') {
                    print '<div><a style="color:black" target="_blank" href="' . $_802a03 . '">Open XML</a> <a href="http://weblik.de/Vorgehensweise-bei-XML-Fehlern" target="_blank">Info</a> <a style="float:right" href="#" onclick="if(location.href.indexOf(\'debugPHP\') == -1){location.href = location.href + (location.href.indexOf(\'?\') == -1 ? \'?\' : \'&\') + \'debugPHP=1&debug=1\'}else{location.reload(true)}">Neu laden</a>';
                    print "<a href=\"/weblication/grid5/scripts/wSystem.php\" target=\"_blank\">Backend ffnen</a>";
                }
                print "</div></div>";
                print "<script>parent.wHideBlocker();</script>";
                if (empty($GLOBALS['xmlErrorInEditor'])) {
                    exit;
                }
            }
            $GLOBALS['hasLoadXMLError'] = true;
            $_b0291e = "processXsltStr::_d2aa4d\n" . $_0665a2['message'];
            throw new gException($_b0291e, '|processXsltStr|001', 'error');
        }
        if (!empty($GLOBALS['debugXsltErrors'])) {
            $_0665a2 = error_get_last();
            if ($_0665a2) {
                $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_1e534d) . '.xml';
                gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_1e534d);
                print '<a href="' . $_802a03 . '" target="_blank">' . $_802a03 . '</a>';
                exit;
            }
        }
        $_00efd4->xinclude();
        $_c7532e = new DOMDocument();
        if (!$_c7532e->loadXML($_6db43e)) {
            $_0665a2 = error_get_last();
            if (($_a97dbf == 'admin' && gSession::_c12fd0() == 'admin' && empty($_dc6bf2['hideDebug']) || $_a97dbf == 'all' && !empty($_GET['debug'])) && $_0665a2) {
                $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_6db43e) . '.xml';
                $_6db43e = preg_replace('/^' . preg_quote('<?php $version="1.0"; $encoding="UTF-8"; ?>', '/') . "\n*/", '', $_6db43e);
                $_6db43e = preg_replace('/^' . preg_quote('<?php exit; ?>', '/') . "\n*/", '', $_6db43e);
                gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_6db43e);
                print '<div style="font-size:11px;font-color:#000000;font-family:arial, helvetica;display:inline-block;padding:10px;border:solid 1px #c0c0c0;background-color:#f0f0f0"><div style="font-weight:bold;font-color:#000000;font-size:14px;padding:10px 0;">Load XSL ERROR</div><div style="padding:0 0 10px 0">' . $_0665a2['message'] . '</div><div><a style="color:black" target="_blank" href="' . $_802a03 . '">Open XSL</a></div></div>';
                exit;
            }
            $_b0291e = "processXsltStr::_d2aa4d\n" . $_0665a2['message'];
            throw new gException($_b0291e, '|processXsltStr|001', 'error');
        }
        $_0d3ad4 = new XSLTProcessor();
        if (is_array($parameters)) {
            foreach ($parameters as $_42b293 => $_11b00f) {
                if (!is_array($_11b00f)) {
                    if ($_11b00f === null) {
                        $_11b00f = '';
                    }
                    $_0d3ad4->setParameter('', $_42b293, gStringconverter::_1bea7c($_11b00f));
                }
            }
        }
        $_0d3ad4->registerPHPFunctions();
        if (gSession::_c12fd0() == 'admin') {
            if (!empty($_GET['debug'])) {
                libxml_clear_errors();
                $_0d3ad4->importStyleSheet($_c7532e);
                $_0665a2 = libxml_get_last_error();
                if ($_0665a2) {
                    var_dump($_0665a2);
                }
                ob_start();
                $_efcd33 = $_0d3ad4->transformToXML($_00efd4);
                $_014281 = ob_get_contents();
                ob_end_flush();
                if (!$_efcd33 && libxml_get_last_error()) {
                    $_0665a2 = libxml_get_last_error();
                    $_802a03 = '/weblication/grid5/tmpHTTP/lastError-xml-' . md5($_1e534d . $_6db43e) . '.xml';
                    $_fde223 = '/weblication/grid5/tmpHTTP/lastError-xsl-' . md5($_1e534d . $_6db43e) . '.xml';
                    gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_802a03, $_1e534d);
                    gFilehandler::_e73643($_SERVER['DOCUMENT_ROOT'] . $_fde223, $_6db43e);
                    var_dump($_0665a2);
                    print '<div style="font-size:11px;font-color:#000000;font-family:arial, helvetica;display:inline-block;padding:10px;border:solid 1px #c0c0c0;background-color:#f0f0f0"><div style="font-weight:bold;font-color:#000000;font-size:14px;padding:10px 0;">Execute XSLT ERROR</div><div style="padding:0 0 10px 0">' . $_014281 . '</div><div style="padding:0 0 10px 0">' . $_0665a2->_3f85a4 . '</div><div><a style="color:black" target="_blank" href="' . $_802a03 . '">Open XML</a> <a style="color:black" target="_blank" href="' . $_fde223 . '">Open XSLT</a> <a style="float:right" href="#" onclick="location.reload(true)">Neu laden</a></div></div>';
                    exit;
                }
            } else {
                $_0d3ad4->importStyleSheet($_c7532e);
                libxml_clear_errors();
                ob_start();
                $_efcd33 = $_0d3ad4->transformToXML($_00efd4);
                $_014281 = ob_get_contents();
                ob_end_flush();
            }
        } else {
            $_0d3ad4->importStyleSheet($_c7532e);
            $_efcd33 = $_0d3ad4->transformToXML($_00efd4);
        }
        $_efcd33 = str_replace('~wpistart~', '&lt;?', $_efcd33);
        $_efcd33 = str_replace('~wpiend~', '?&gt;', $_efcd33);
        return $_efcd33;
    }
    public static function _3be4a3(&$_1e534d, &$_6db43e)
    {
        $_00efd4 = new DomDocument();
        if (!@$_00efd4->loadXML($_1e534d)) {
            throw new gException('processXsltStr::_d2aa4d');
        }
        $_c7532e = new DomDocument();
        if (!@$_c7532e->loadXML($_6db43e)) {
            throw new gException('processXsltStr::_c936d5');
        }
        $_0d3ad4 = new xsltprocessor();
        $_0d3ad4->importStyleSheet($_c7532e);
        $_efcd33 = @$_0d3ad4->transformToXML($_00efd4);
        return $_efcd33;
    }
    public static function _8678a3(&$_1e534d, &$_6db43e, $parameters = array())
    {
        $_00efd4 = new DomDocument();
        if (!@$_00efd4->loadXML($_1e534d)) {
            $_d5de8e = error_get_last();
            $_b0291e = "processXsltStr::_d2aa4d\n" . $_d5de8e['message'];
            throw new gException($_b0291e, 'processXsltStr|001', 'error');
        }
        $_c7532e = new DomDocument();
        if (!@$_c7532e->loadXML($_6db43e)) {
            $_d5de8e = error_get_last();
            $_b0291e = "processXsltStr::_c936d5\n" . $_d5de8e['message'];
            throw new gException($_b0291e, 'processXsltStr|002', 'error');
        }
        $_0d3ad4 = new xsltprocessor();
        if (is_array($parameters)) {
            foreach ($parameters as $_42b293 => $_11b00f) {
                $_0d3ad4->setParameter("", $_42b293, $_11b00f);
            }
        }
        $_0d3ad4->importStyleSheet($_c7532e);
        $_efcd33 = $_0d3ad4->transformToXML($_00efd4);
        return $_efcd33;
    }
    public static function _ed6b4c(&$_1e534d, &$_6db43e, $parameters = array())
    {
        $_00efd4 = new DomDocument();
        if (!@$_00efd4->loadXML($_1e534d)) {
            $_d5de8e = error_get_last();
            $_b0291e = "processXsltStr::_d2aa4d\n" . $_d5de8e['message'];
            throw new gException($_b0291e, 'processXsltStr|001', 'error');
        }
        $_c7532e = new DomDocument();
        if (!@$_c7532e->loadXML($_6db43e)) {
            $_d5de8e = error_get_last();
            $_b0291e = "processXsltStr::_c936d5\n" . $_d5de8e['message'];
            throw new gException($_b0291e, 'processXsltStr|002', 'error');
        }
        $_0d3ad4 = new xsltprocessor();
        if (is_array($parameters)) {
            foreach ($parameters as $_42b293 => $_11b00f) {
                $_0d3ad4->setParameter("", $_42b293, $_11b00f);
            }
        }
        $_0d3ad4->importStyleSheet($_c7532e);
        $_efcd33 = @$_0d3ad4->transformToXML($_00efd4);
        return $_efcd33;
    }
    public static function _92c875($_1e534d)
    {
        return $_1e534d;
    }
    public static function _b7dac3($_2e8d27, $data = array(), $_dc6bf2 = array())
    {
        $_efcd33 = '';
        $_da0c7b = array();
        $_3e08c9 = '';
        if (strpos($_2e8d27, '/') === false && isset($GLOBALS['wGlobalValues']['wTemplateViewPath']) && preg_match('/^(\\/[^\\/]+)/', $GLOBALS['wGlobalValues']['wTemplateViewPath'], $_da0c7b)) {
            $_3e08c9 = $_da0c7b[1];
            $_b12e60 = $_3e08c9 . '/wGlobal/layout/templates/items/' . $_2e8d27 . '.wItem.php';
        } else {
            if (preg_match('/^(\\/[^\\/]+)/', $_2e8d27, $_da0c7b)) {
                $_3e08c9 = $_da0c7b[1];
                $_b12e60 = $_2e8d27;
                $_2e8d27 = preg_replace('/^.*\\/([^\\/]+)\\.wItem\\.php$/', '$1', $_2e8d27);
            } else {
                try {
                    $_6e764e = gRepository::_f615cc($_SERVER['PHP_SELF']);
                    $_c0e951 = new gProjectObject($_6e764e);
                    $_3e08c9 = $_c0e951->_954066();
                    $_b12e60 = $_3e08c9 . '/wGlobal/layout/templates/items/' . $_2e8d27 . '.wItem.php';
                } catch (gException $_b8d4ad) {
                }
            }
        }
        $_ba8378 = md5(rand(1000000, 9999999) . time());
        if (isset($_dc6bf2['uid'])) {
            $_ba8378 = $_dc6bf2['uid'];
        }
        try {
            $_fe18a8 = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<wd:document xmlns:wsl=\"http://weblication.de/5.0/wsl\" xmlns:wd=\"http://weblication.de/5.0/wd\" version=\"1.0\" type=\"page.standard\">";
            $_fe18a8 .= '<wd:group><wd:item type="' . $_2e8d27 . '" uid="' . $_ba8378 . '" renderItemData="1">';
            foreach ($data as $_763e67 => $_5189eb) {
                $_fe18a8 .= '<wd:fragment id="' . $_763e67 . '">' . $_5189eb . '</wd:fragment>';
            }
            $_fe18a8 .= '</wd:item></wd:group></wd:document>';
            $_baf63d = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<xsl:stylesheet xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:xsl=\"http://www.w3.org/1999/XSL/Transform\" xmlns:xslIfIsInEditor=\"http://www.w3.org/1999/XSL/TransformIfIsInEditor\" xmlns:wslPre=\"http://weblication.de/5.0/wsl\" xmlns:wslPost=\"http://weblication.de/5.0/wsl\" xmlns:wslEditorPre=\"http://weblication.de/5.0/wsl\" xmlns:wsl=\"http://weblication.de/5.0/wsl\" xmlns:wd=\"http://weblication.de/5.0/wd\" xmlns:php=\"http://php.net/xsl\" exclude-result-prefixes=\"xslIfIsInEditor wd wslPre wsl php\" version=\"1.0\"> <xsl:output method=\"xml\" indent=\"yes\" omit-xml-declaration=\"no\" encoding=\"UTF-8\"/> <xsl:include href=\"" . $_SERVER['DOCUMENT_ROOT'] . $_3e08c9 . '/wGlobal/layout/templates/misc/standard.wParams.php"/>';
            if (isset($_dc6bf2['includeItemsProject']) && $_dc6bf2['includeItemsProject']) {
                $_e64d63 = gFilepath::_4b4e30($_b12e60);
                $_baf63d .= wsl_includeXsltItemsProject::parseTag(array('project' => $_e64d63));
            } else {
                $_baf63d .= '<xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_b12e60 . '"/>';
            }
            if (isset($_dc6bf2['includeGlobalsProject']) && $_dc6bf2['includeGlobalsProject']) {
                $_e64d63 = gFilepath::_4b4e30($_b12e60);
                $_baf63d .= wsl_includeXsltItemsProject::parseTag(array('project' => $_e64d63, 'subDir' => $_dc6bf2['subDirItems'] ?? ''));
            }
            if (isset($_dc6bf2['additionalTemplatesToInclude']) && is_array($_dc6bf2['additionalTemplatesToInclude'])) {
                foreach ($_dc6bf2['additionalTemplatesToInclude'] as $_e635bb) {
                    $_baf63d .= '<xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_e635bb . '"/>';
                }
            }
            if (isset($_dc6bf2['includeObjectsProject']) && $_dc6bf2['includeObjectsProject']) {
                $_e64d63 = gFilepath::_4b4e30($_b12e60);
                $_baf63d .= wsl_includeXsltObjectsProject::parseTag(array('project' => $_e64d63));
            }
            if (isset($_dc6bf2['includeGlobalsProject']) && $_dc6bf2['includeGlobalsProject']) {
                $_e64d63 = gFilepath::_4b4e30($_b12e60);
                $_baf63d .= wsl_includeXsltGlobals::parseTag(array('project' => $_e64d63));
            }
            $_baf63d .= ' <xsl:template match="/wd:document"> <xsl:apply-templates select="wd:group/wd:item"/>
</xsl:template> </xsl:stylesheet> ';
            if (gSession::_c12fd0() == 'admin' && gHttpRequest::_bb730f('debug') == 1) {
                print "\n\nxmlStr:\n" . $_fe18a8 . "\nxsltStr:\n" . $_baf63d . "\n\n";
                exit;
            }
            $_d8de25 = isset($GLOBALS['wGlobalValues']['wHideEditEmbed']) ? $GLOBALS['wGlobalValues']['wHideEditEmbed'] : '';
            $GLOBALS['wGlobalValues']['wHideEditEmbed'] = '1';
            $_efcd33 = gProcessorPage8::_a380f4($_fe18a8, $_baf63d, null, array('envelop' => true, 'wsl' => '1', 'wslPre' => isset($_dc6bf2['wslPre']) ? $_dc6bf2['wslPre'] : null));
            $_efcd33 = preg_replace('/<\\/?wdiv[^>]*>/', '', $_efcd33);
            $_efcd33 = str_replace(' xmlns=""', '', $_efcd33);
            $GLOBALS['wGlobalValues']['wIsRenderItem'] = $_d8de25;
        } catch (gException $_b8d4ad) {
            unset($_b8d4ad);
        }
        if (isset($_dc6bf2['executePHPPost']) && $_dc6bf2['executePHPPost'] && strpos($_efcd33, '<wd:phpPost ') !== false) {
            $_efcd33 = preg_replace_callback('/<wd:phpPost[^>]+executionId="([^"]+)"(?:[^>]+expires="([^"]*)")?(?:[^>]+cacheIdCallback="([^"]*)")?[^>]*>/', function ($_da0c7b) {
                return gWslProcessor::executePHPPostCode($_da0c7b[1], $_da0c7b[2], true, $_da0c7b[3]);
            }, $_efcd33);
        }
        return $_efcd33;
    }
    public static function _d07146($_8c288f, $_dc6bf2 = array())
    {
        $_a5e001 = false;
        $_efcd33 = '';
        $_da0c7b = array();
        $_3e08c9 = '';
        if (isset($_dc6bf2['pathProjectLayout'])) {
            $_3e08c9 = $_dc6bf2['pathProjectLayout'];
        }
        $_b408b3 = isset($_dc6bf2['isInEditor']) && $_dc6bf2['isInEditor'];
        $_b12e60 = '';
        if (!empty($_3e08c9) && !empty($_dc6bf2['includeOnlyCurrentItem'])) {
            if (preg_match('/type="([^"]+)"/', $_8c288f, $_da0c7b)) {
                $_dd7249 = $_da0c7b[1];
                $_b12e60 = $_3e08c9 . '/wGlobal/layout/templates/items/' . $_dd7249 . '.wItem.php';
                $_a5e001 = true;
            }
        } else {
            if (preg_match('/^(\\/[^\\/]+)/', $GLOBALS['wGlobalValues']['wTemplateViewPath'] ?? '', $_da0c7b)) {
                $_3e08c9 = $_da0c7b[1];
                if (preg_match('/type="([^"]+)"/', $_8c288f, $_da0c7b)) {
                    $_dd7249 = $_da0c7b[1];
                    $_b12e60 = $_3e08c9 . '/wGlobal/layout/templates/items/' . $_dd7249 . '.wItem.php';
                    $_a5e001 = true;
                }
            } else {
                if (isset($_dc6bf2['pathProjectLayout'])) {
                    $_3e08c9 = $_dc6bf2['pathProjectLayout'];
                    $_a5e001 = true;
                } else {
                    if (!empty($GLOBALS['wPageCur']['pathLayout'])) {
                        $_3e08c9 = $GLOBALS['wPageCur']['pathLayout'];
                        $_a5e001 = true;
                    } else {
                        if (!empty($GLOBALS['documentStr'])) {
                            if (preg_match('/(\\/[^\\/]+)\\/wGlobal\\/scripts\\/pre\\.php/', $GLOBALS['documentStr'], $_da0c7b)) {
                                $_3e08c9 = $_da0c7b[1];
                                $_a5e001 = true;
                            }
                        }
                    }
                }
            }
        }
        if ($_a5e001) {
            try {
                $_fe18a8 = '<wd:document xmlns:wsl="http://weblication.de/5.0/wsl" xmlns:wd="http://weblication.de/5.0/wd" version="1.0" type="page.standard">';
                $_fe18a8 .= '<wd:group>' . $_8c288f . '</wd:group></wd:document>';
                if (isset($_dc6bf2['checkOnline']) && $_dc6bf2['checkOnline']) {
                    $_d89b25 = gDom::parseString($_fe18a8);
                    $_784a38 = gDom::executeXPath($_d89b25, '//wd:item');
                    $_24e2ac = false;
                    foreach ($_784a38 as $_2e8d27) {
                        if (!wOutput::isViewableItem(array($_2e8d27))) {
                            $_2e8d27->parentNode->removeChild($_2e8d27);
                            $_24e2ac = true;
                        }
                    }
                    if ($_24e2ac) {
                        $_fe18a8 = gStringconverter::removePrologXml($_d89b25->saveXML());
                    }
                }
                $_baf63d = '<xsl:stylesheet xmlns="http://www.w3.org/1999/xhtml" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xslIfIsInEditor="http://www.w3.org/1999/XSL/TransformIfIsInEditor" xmlns:wslPre="http://weblication.de/5.0/wsl" xmlns:wslPost="http://weblication.de/5.0/wsl" xmlns:wslEditorPre="http://weblication.de/5.0/wsl" xmlns:wsl="http://weblication.de/5.0/wsl" xmlns:wd="http://weblication.de/5.0/wd" xmlns:php="http://php.net/xsl" exclude-result-prefixes="xslIfIsInEditor wd wslPre wsl php" version="1.0"> <xsl:output method="xml" indent="yes" omit-xml-declaration="no" encoding="UTF-8"/> <xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_3e08c9 . '/wGlobal/layout/templates/misc/standard.wParams.php"/>';
                if (isset($_dc6bf2['includeItemsProject']) && $_dc6bf2['includeItemsProject'] || $_b12e60 == '') {
                    if ($_b12e60 != '') {
                        $_e64d63 = gFilepath::_4b4e30($_b12e60);
                    } else {
                        $_e64d63 = $_3e08c9;
                    }
                    $_baf63d .= wsl_includeXsltItemsProject::parseTag(array('project' => $_e64d63, 'subDir' => $_dc6bf2['subDirItems'] ?? ''));
                } else {
                    $_baf63d .= '<xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_b12e60 . '"/>';
                }
                if (isset($_dc6bf2['additionalTemplatesToInclude']) && is_array($_dc6bf2['additionalTemplatesToInclude'])) {
                    foreach ($_dc6bf2['additionalTemplatesToInclude'] as $_e635bb) {
                        $_baf63d .= '<xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_e635bb . '"/>';
                    }
                }
                if (isset($_dc6bf2['includeObjectsProject']) && $_dc6bf2['includeObjectsProject']) {
                    if ($_b12e60 != '') {
                        $_e64d63 = gFilepath::_4b4e30($_b12e60);
                    } else {
                        $_e64d63 = $_3e08c9;
                    }
                    $_baf63d .= wsl_includeXsltObjectsProject::parseTag(array('project' => $_e64d63));
                }
                if (isset($_dc6bf2['includeGlobalsProject']) && $_dc6bf2['includeGlobalsProject']) {
                    if ($_b12e60 != '') {
                        $_e64d63 = gFilepath::_4b4e30($_b12e60);
                    } else {
                        $_e64d63 = $_3e08c9;
                    }
                    $_baf63d .= wsl_includeXsltGlobals::parseTag(array('project' => $_e64d63));
                }
                $_baf63d .= '<xsl:template match="/wd:document"> <wdiv><xsl:apply-templates select="wd:group/wd:item"/></wdiv> </xsl:template> </xsl:stylesheet> ';
                if (gSession::_c12fd0() == 'admin' && gHttpRequest::_bb730f('debug') == 1) {
                    print "\n\nxmlStr:\n" . $_fe18a8 . "\nxsltStr:\n" . $_baf63d . "\n\n";
                }
                $_d8de25 = isset($GLOBALS['wGlobalValues']['wHideEditEmbed']) ? $GLOBALS['wGlobalValues']['wHideEditEmbed'] : '';
                $GLOBALS['wGlobalValues']['wHideEditEmbed'] = '1';
                gRepository::_fff617('/_i.xml', $_baf63d);
                $_efcd33 = gProcessorPage8::_a380f4($_fe18a8, $_baf63d, null, array('envelop' => true, 'wsl' => '1', 'wslPre' => isset($_dc6bf2['wslPre']) ? $_dc6bf2['wslPre'] : null, 'isInEditor' => $_b408b3));
                $_efcd33 = preg_replace('/<\\/?wdiv[^>]*>/', '', $_efcd33);
                $_efcd33 = str_replace(' xmlns=""', '', $_efcd33);
                $GLOBALS['wGlobalValues']['wHideEditEmbed'] = $_d8de25;
            } catch (gException $_b8d4ad) {
                unset($_b8d4ad);
            }
        }
        if (isset($_dc6bf2['executePHPPost']) && $_dc6bf2['executePHPPost'] && strpos($_efcd33, '<wd:phpPost ') !== false) {
            $_efcd33 = preg_replace_callback('/<wd:phpPost[^>]+executionId="([^"]+)"(?:[^>]+expires="([^"]*)")?(?:[^>]+cacheIdCallback="([^"]*)")?[^>]*>/', function ($_da0c7b) {
                return gWslProcessor::executePHPPostCode($_da0c7b[1], $_da0c7b[2], true, $_da0c7b[3]);
            }, $_efcd33);
        }
        return $_efcd33;
    }
    public static function _b2a00b($_40595a, $_e111a0, $_dc6bf2 = array())
    {
        $_a5e001 = false;
        $_efcd33 = '';
        $_da0c7b = array();
        $_3e08c9 = '';
        if (isset($_dc6bf2['pathProjectLayout'])) {
            $_3e08c9 = $_dc6bf2['pathProjectLayout'];
        }
        if (!gRepository::_3fd1cc($_40595a)) {
            return "";
        }
        $_329857 = gDom::parseFile($_SERVER['DOCUMENT_ROOT'] . $_40595a);
        $_ebeb38 = gDom::executeXPath($_329857, '/wd:document/wd:group//wd:item[@uid="' . $_e111a0 . '"]')->item(0);
        if ($_ebeb38) {
            if (isset($_dc6bf2['fragmentsToSet']) && is_array($_dc6bf2['fragmentsToSet'])) {
                foreach ($_dc6bf2['fragmentsToSet'] as $_fd1aa1 => $value) {
                    if (!gDom::executeXPath($_329857, 'wd:fragment[@id="' . $_fd1aa1 . '"]', array('context' => $_ebeb38))->item(0)) {
                        $_ded794 = $_329857->createElementNS('http://weblication.de/5.0/wd', 'wd:fragment');
                        $_ded794->setAttribute('id', $_fd1aa1);
                        $_ebeb38->appendChild($_ded794);
                    } else {
                        $_ded794 = gDom::executeXPath($_329857, 'wd:fragment[@id="' . $_fd1aa1 . '"]', array('context' => $_ebeb38))->item(0);
                    }
                    $_ded794->textContent = $value;
                }
            }
            $_8c288f = $_329857->saveXML($_ebeb38);
        } else {
            return "";
        }
        $_b408b3 = isset($_dc6bf2['isInEditor']) && $_dc6bf2['isInEditor'];
        $_b12e60 = '';
        if (!empty($_3e08c9) && !empty($_dc6bf2['includeOnlyCurrentItem'])) {
            if (preg_match('/type="([^"]+)"/', $_8c288f, $_da0c7b)) {
                $_dd7249 = $_da0c7b[1];
                $_b12e60 = $_3e08c9 . '/wGlobal/layout/templates/items/' . $_dd7249 . '.wItem.php';
                $_a5e001 = true;
            }
        } else {
            if (preg_match('/^(\\/[^\\/]+)/', $GLOBALS['wGlobalValues']['wTemplateViewPath'] ?? '', $_da0c7b)) {
                $_3e08c9 = $_da0c7b[1];
                if (preg_match('/type="([^"]+)"/', $_8c288f, $_da0c7b)) {
                    $_dd7249 = $_da0c7b[1];
                    $_b12e60 = $_3e08c9 . '/wGlobal/layout/templates/items/' . $_dd7249 . '.wItem.php';
                    $_a5e001 = true;
                }
            } else {
                if (isset($_dc6bf2['pathProjectLayout'])) {
                    $_3e08c9 = $_dc6bf2['pathProjectLayout'];
                    $_a5e001 = true;
                } else {
                    if (!empty($GLOBALS['wPageCur']['pathLayout'])) {
                        $_3e08c9 = $GLOBALS['wPageCur']['pathLayout'];
                        $_a5e001 = true;
                    } else {
                        if (!empty($GLOBALS['documentStr'])) {
                            if (preg_match('/(\\/[^\\/]+)\\/wGlobal\\/scripts\\/pre\\.php/', $GLOBALS['documentStr'], $_da0c7b)) {
                                $_3e08c9 = $_da0c7b[1];
                                $_a5e001 = true;
                            }
                        }
                    }
                }
            }
        }
        if (empty($_3e08c9)) {
            $_e64d63 = gFilepath::_4b4e30($_40595a);
            try {
                $_c0e951 = new gProjectObject($_e64d63);
                $_3e08c9 = $_c0e951->_954066();
                $_dd7249 = $_ebeb38->getAttribute('type');
                $_b12e60 = $_3e08c9 . '/wGlobal/layout/templates/items/' . $_dd7249 . '.wItem.php';
                $_a5e001 = true;
            } catch (gException $_b8d4ad) {
            }
        }
        if ($_a5e001) {
            try {
                $_fe18a8 = '<wd:document xmlns:wsl="http://weblication.de/5.0/wsl" xmlns:wd="http://weblication.de/5.0/wd" version="1.0" type="page.standard">';
                $_fe18a8 .= '<wd:group>' . $_8c288f . '</wd:group></wd:document>';
                $_baf63d = '<xsl:stylesheet xmlns="http://www.w3.org/1999/xhtml" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xslIfIsInEditor="http://www.w3.org/1999/XSL/TransformIfIsInEditor" xmlns:wslPre="http://weblication.de/5.0/wsl" xmlns:wslPost="http://weblication.de/5.0/wsl" xmlns:wslEditorPre="http://weblication.de/5.0/wsl" xmlns:wsl="http://weblication.de/5.0/wsl" xmlns:wd="http://weblication.de/5.0/wd" xmlns:php="http://php.net/xsl" exclude-result-prefixes="xslIfIsInEditor wd wslPre wsl php" version="1.0"> <xsl:output method="xml" indent="yes" omit-xml-declaration="no" encoding="UTF-8"/> <xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_3e08c9 . '/wGlobal/layout/templates/misc/standard.wParams.php"/>';
                if (!empty($_dc6bf2['includeItemsProject']) || $_b12e60 == '') {
                    if ($_b12e60 != '') {
                        $_e64d63 = gFilepath::_4b4e30($_b12e60);
                    } else {
                        $_e64d63 = $_3e08c9;
                    }
                    $_baf63d .= wsl_includeXsltItemsProject::parseTag(array('project' => $_e64d63));
                } else {
                    $_baf63d .= '<xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_b12e60 . '"/>';
                }
                if (isset($_dc6bf2['additionalTemplatesToInclude']) && is_array($_dc6bf2['additionalTemplatesToInclude'])) {
                    foreach ($_dc6bf2['additionalTemplatesToInclude'] as $_e635bb) {
                        $_baf63d .= '<xsl:include href="' . $_SERVER['DOCUMENT_ROOT'] . $_e635bb . '"/>';
                    }
                }
                if (isset($_dc6bf2['includeObjectsProject']) && $_dc6bf2['includeObjectsProject']) {
                    if ($_b12e60 != '') {
                        $_e64d63 = gFilepath::_4b4e30($_b12e60);
                    } else {
                        $_e64d63 = $_3e08c9;
                    }
                    $_baf63d .= wsl_includeXsltObjectsProject::parseTag(array('project' => $_e64d63));
                }
                if (isset($_dc6bf2['includeGlobalsProject']) && $_dc6bf2['includeGlobalsProject']) {
                    if ($_b12e60 != '') {
                        $_e64d63 = gFilepath::_4b4e30($_b12e60);
                    } else {
                        $_e64d63 = $_3e08c9;
                    }
                    $_baf63d .= wsl_includeXsltGlobals::parseTag(array('project' => $_e64d63));
                }
                $_baf63d .= '<xsl:template match="/wd:document">
<wdiv><xsl:apply-templates select="wd:group/wd:item"/></wdiv> </xsl:template> </xsl:stylesheet> ';
                if (gSession::_c12fd0() == 'admin' && gHttpRequest::_bb730f('debug') == 1) {
                    print "\n\nxmlStr:\n" . $_fe18a8 . "\nxsltStr:\n" . $_baf63d . "\n\n";
                }
                $_d89b25 = gDom::parseString($_fe18a8);
                if ($_d89b25->documentElement->firstChild && $_d89b25->documentElement->firstChild->firstChild) {
                    if (!wOutput::isViewableItem(array($_d89b25->documentElement->firstChild->firstChild))) {
                        return "";
                    }
                }
                $_d8de25 = isset($GLOBALS['wGlobalValues']['wHideEditEmbed']) ? $GLOBALS['wGlobalValues']['wHideEditEmbed'] : '';
                $GLOBALS['wGlobalValues']['wHideEditEmbed'] = '1';
                $_efcd33 = gProcessorPage8::_a380f4($_fe18a8, $_baf63d, null, array('envelop' => true, 'wsl' => '1', 'wslPre' => isset($_dc6bf2['wslPre']) ? $_dc6bf2['wslPre'] : null, 'isInEditor' => $_b408b3));
                $_efcd33 = preg_replace('/<\\/?wdiv[^>]*>/', '', $_efcd33);
                $_efcd33 = str_replace(' xmlns=""', '', $_efcd33);
                $GLOBALS['wGlobalValues']['wHideEditEmbed'] = $_d8de25;
            } catch (gException $_b8d4ad) {
                unset($_b8d4ad);
            }
        }
        if (isset($_dc6bf2['executePHPPost']) && $_dc6bf2['executePHPPost'] && strpos($_efcd33, '<wd:phpPost ') !== false) {
            $_efcd33 = preg_replace_callback('/<wd:phpPost[^>]+executionId="([^"]+)"(?:[^>]+expires="([^"]*)")?(?:[^>]+cacheIdCallback="([^"]*)")?[^>]*>/', function ($_da0c7b) {
                return gWslProcessor::executePHPPostCode($_da0c7b[1], $_da0c7b[2], true, $_da0c7b[3]);
            }, $_efcd33);
        }
        return $_efcd33;
    }
}
