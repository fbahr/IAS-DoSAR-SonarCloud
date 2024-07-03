<?php

defined("_JEXEC") or die("Restricted access");
require_once "JPATH_ADMINISTRATORDIRECTORY_SEPARATORcomponentsDIRECTORY_SEPARATORcom_miniorange_dirsyncDIRECTORY_SEPARATORhelpersDIRECTORY_SEPARATORmo_customer_setup.php";
class MoLdapUtility
{
    public static function mo_ldap_is_customer_registered()
    {
        $hl = self::mo_ldap_get_details("#__miniorange_ldap_customer");
        $tX = $hl["email"];
        $K_ = $hl["customer_key"];
        $mS = $hl["registration_status"];
        if ($tX && $K_ && is_numeric(trim($K_)) && $mS == "SUCCESS") {
            return 1;
        }
        return 0;
    }
    public static function mo_ldap_check_empty_or_null($vY)
    {
        if (!(!isset($vY) || empty($vY))) {
            return false;
        }
        return true;
    }
    public static function mo_ldap_is_curl_installed()
    {
        if (in_array("curl", get_loaded_extensions())) {
            return 1;
        }
        return 0;
    }
    public static function mo_ldap_check($F3)
    {
        if (empty($F3)) {
            return "";
        }
        return self::mo_ldap_decrypt($F3);
    }
    public static function mo_ldap_get_details(string $rn)
    {
        $i2 = JFactory::getDbo();
        $Tj = $i2->getQuery(true);
        $Tj->select("*");
        $Tj->from($i2->quoteName($rn));
        $Tj->where($i2->quoteName("id") . " = 1");
        $i2->setQuery($Tj);
        $dO = $i2->loadAssoc();
        return $dO;
    }
    public static function mo_ldap_generic_update_query($tZ, $Op)
    {
        $i2 = JFactory::getDbo();
        $Tj = $i2->getQuery(true);
        foreach ($Op as $wI => $vY) {
            $FS[] = $i2->quoteName($wI) . " = " . $i2->quote($vY);
        }
        $Tj->update($i2->quoteName($tZ))->set($FS)->where($i2->quoteName("id") . " = 1");
        $i2->setQuery($Tj);
        $i2->execute();
    }
    public static function mo_ldap_get_plugin_version()
    {
        $i2 = JFactory::getDbo();
        $Nm = $i2->getQuery(true)->select("manifest_cache")->from($i2->quoteName("#__extensions"))->where($i2->quoteName("element") . " = " . $i2->quote("com_miniorange_dirsync"));
        $i2->setQuery($Nm);
        $gq = json_decode($i2->loadResult());
        return $gq->version;
    }
    public static function mo_ldap_is_extension_installed($tD)
    {
        return in_array($tD, get_loaded_extensions());
    }
    public static function mo_ldap_encrypt($E_)
    {
        $E_ = stripcslashes($E_);
        if (MoLdapUtility::mo_ldap_is_extension_installed("openssl")) {
            $wI = 99189;
            return base64_encode(openssl_encrypt($E_, "aes-128-ecb", $wI, OPENSSL_RAW_DATA));
        }
        return;
    }
    public static function mo_ldap_decrypt($vY)
    {
        if (MoLdapUtility::mo_ldap_is_extension_installed("openssl")) {
            $wI = 99189;
            $SL = rtrim(openssl_decrypt(base64_decode($vY), "aes-128-ecb", $wI, OPENSSL_RAW_DATA), "\x00");
            return trim($SL, "\x00..\x1a");
        }
        return;
    }
    public static function mo_ldap_get_license_planname()
    {
        return "joomla_ldap_premium_plan";
    }
    public static function mo_ldap_get_hostname()
    {
        return "https://login.xecurify.com";
    }
    public static function getUserFieldDataFromTable($Kz)
    {
        $i2 = JFactory::getDbo();
        $Tj = $i2->getQuery(true);
        $Tj->select("field_id");
        $Tj->from("#__fields_values");
        $Tj->where($i2->quoteName("item_id") . " = " . $i2->quote($Kz));
        $i2->setQuery($Tj);
        return $i2->loadColumn();
    }
    public static function removeIfExistsUserId($Kz)
    {
        $hl = self::getUserFieldDataFromTable($Kz);
        if (!$hl) {
            goto vh;
        }
        $i2 = JFactory::getDbo();
        $Tj = $i2->getQuery(true);
        $Ja = array($i2->quoteName("item_id") . " = " . $i2->quote($Kz));
        $Tj->delete($i2->quoteName("#__fields_values"));
        $Tj->where($Ja);
        $i2->setQuery($Tj);
        $i2->execute();
        vh:
    }
    public static function getIdFromFields($h9)
    {
        $i2 = JFactory::getDbo();
        $Tj = $i2->getQuery(true);
        $Tj->select("id");
        $Tj->from("#__fields");
        $Tj->where($i2->quoteName("name") . " = " . $i2->quote($h9));
        $i2->setQuery($Tj);
        return $i2->loadObject();
    }
    public static function mo_ldap_error_type($uB)
    {
        if (!(-1 == $uB)) {
            if (!(0 == $uB)) {
                if (!(2 == $uB)) {
                    if (!(3 == $uB || 10301 == $uB)) {
                        if (!(4 == $uB)) {
                            if (!(7 == $uB)) {
                                if (!(11 == $uB)) {
                                    if (!(49 == $uB)) {
                                        if (!(51 == $uB)) {
                                            if (!(52 == $uB)) {
                                                if (!(10302 == $uB)) {
                                                    if (!(10500 == $uB)) {
                                                        if (!(10305 == $uB)) {
                                                            if (!(13 == $uB)) {
                                                                if (!(34 == $uB)) {
                                                                    $gb = JText::_("COM_MINIORANGE_CONNECTION_FAILED");
                                                                    return $gb;
                                                                }
                                                                $gb = JText::_("COM_MINIORANGE_CHECK_DN_SYNTAX");
                                                                return $gb;
                                                            }
                                                            $gb = JText::_("COM_MINIORANGE_SECURE_SESSION");
                                                            return $gb;
                                                        }
                                                        $gb = JText::_("COM_MINIORANGE_CHECK_HOSTNAME");
                                                        return $gb;
                                                    }
                                                    $gb = JText::_("COM_MINIORANGE_CHECK_SEARCH_FILTER");
                                                    return $gb;
                                                }
                                                $gb = JText::_("COM_MINIORANGE_SERVER_REFUSED_CONNECTION");
                                                return $gb;
                                            }
                                            $gb = JText::_("COM_MINIORANGE_CANNOT_CONNECT_TO_SERVER");
                                            return $gb;
                                        }
                                        $gb = JText::_("COM_MINIORANGE_LDAP_SERVER_BUSY");
                                        return $gb;
                                    }
                                    $gb = JText::_("COM_MINIORANGE_ENTER_VALID_CREDENTIALS");
                                    return $gb;
                                }
                                $gb = JText::_("COM_MINIORANGE_SERVERLIMIT_EXCEEDED");
                                return $gb;
                            }
                            $gb = JText::_("COM_MINIORANGE_AUTHENTICATION_NOTSUPPORTED");
                            return $gb;
                        }
                        $gb = JText::_("COM_MINIORANGE_SIZELIMIT_EXCEEDED");
                        return $gb;
                    }
                    $gb = JText::_("COM_MINIORANGE_TIMELIMIT_EXCEEDED");
                    return $gb;
                }
                $gb = JText::_("COM_MINIORANGE_INVALID_RESPONSE");
                return $gb;
            }
            $gb = JText::_("COM_MINIORANGE_SUCCESSFUL_CONNECTION");
            return $gb;
        }
        $gb = JText::_("COM_MINIORANGE_ENTER_VALID_URL");
        return $gb;
    }
    public static function getJoomlaCmsVersion()
    {
        $sX = new JVersion();
        return $sX->getShortVersion();
    }
    public static function mo_ldap_get_operating_system()
    {
        if (isset($_SERVER)) {
            $s4 = $_SERVER["HTTP_USER_AGENT"];
            // [PHPDeobfuscator] Implied goto
            goto Sj;
        }
        global $K5;
        if (isset($K5)) {
            $s4 = $K5["HTTP_USER_AGENT"];
            // [PHPDeobfuscator] Implied goto
            goto HK;
        }
        global $yX;
        $s4 = $yX;
        HK:
        Sj:
        $p3 = ["windows nt 10" => "Windows 10", "windows nt 6.3" => "Windows 8.1", "windows nt 6.2" => "Windows 8", "windows nt 6.1|windows nt 7.0" => "Windows 7", "windows nt 6.0" => "Windows Vista", "windows nt 5.2" => "Windows Server 2003/XP x64", "windows nt 5.1" => "Windows XP", "windows xp" => "Windows XP", "windows nt 5.0|windows nt5.1|windows 2000" => "Windows 2000", "windows me" => "Windows ME", "windows nt 4.0|winnt4.0" => "Windows NT", "windows ce" => "Windows CE", "windows 98|win98" => "Windows 98", "windows 95|win95" => "Windows 95", "win16" => "Windows 3.11", "mac os x 10.1[^0-9]" => "Mac OS X Puma", "macintosh|mac os x" => "Mac OS X", "mac_powerpc" => "Mac OS 9", "linux" => "Linux", "ubuntu" => "Linux - Ubuntu", "iphone" => "iPhone", "ipod" => "iPod", "ipad" => "iPad", "android" => "Android", "blackberry" => "BlackBerry", "webos" => "Mobile", "(media center pc).([0-9]{1,2}\\.[0-9]{1,2})" => "Windows Media Center", "(win)([0-9]{1,2}\\.[0-9x]{1,2})" => "Windows", "(win)([0-9]{2})" => "Windows", "(windows)([0-9x]{2})" => "Windows", "Win 9x 4.90" => "Windows ME", "(windows)([0-9]{1,2}\\.[0-9]{1,2})" => "Windows", "win32" => "Windows", "(java)([0-9]{1,2}\\.[0-9]{1,2}\\.[0-9]{1,2})" => "Java", "(Solaris)([0-9]{1,2}\\.[0-9x]{1,2}){0,1}" => "Solaris", "dos x86" => "DOS", "Mac OS X" => "Mac OS X", "Mac_PowerPC" => "Macintosh PowerPC", "(mac|Macintosh)" => "Mac OS", "(sunos)([0-9]{1,2}\\.[0-9]{1,2}){0,1}" => "SunOS", "(beos)([0-9]{1,2}\\.[0-9]{1,2}){0,1}" => "BeOS", "(risc os)([0-9]{1,2}\\.[0-9]{1,2})" => "RISC OS", "unix" => "Unix", "os/2" => "OS/2", "freebsd" => "FreeBSD", "openbsd" => "OpenBSD", "netbsd" => "NetBSD", "irix" => "IRIX", "plan9" => "Plan9", "osf" => "OSF", "aix" => "AIX", "GNU Hurd" => "GNU Hurd", "(fedora)" => "Linux - Fedora", "(kubuntu)" => "Linux - Kubuntu", "(ubuntu)" => "Linux - Ubuntu", "(debian)" => "Linux - Debian", "(CentOS)" => "Linux - CentOS", "(Mandriva).([0-9]{1,3}(\\.[0-9]{1,3})?(\\.[0-9]{1,3})?)" => "Linux - Mandriva", "(SUSE).([0-9]{1,3}(\\.[0-9]{1,3})?(\\.[0-9]{1,3})?)" => "Linux - SUSE", "(Dropline)" => "Linux - Slackware (Dropline GNOME)", "(ASPLinux)" => "Linux - ASPLinux", "(Red Hat)" => "Linux - Red Hat", "(linux)" => "Linux", "(amigaos)([0-9]{1,2}\\.[0-9]{1,2})" => "AmigaOS", "amiga-aweb" => "AmigaOS", "amiga" => "Amiga", "AvantGo" => "PalmOS", "[0-9]{1,2}\\.[0-9]{1,2}\\.[0-9]{1,3})" => "Linux", "(webtv)/([0-9]{1,2}\\.[0-9]{1,2})" => "WebTV", "Dreamcast" => "Dreamcast OS", "GetRight" => "Windows", "go!zilla" => "Windows", "gozilla" => "Windows", "gulliver" => "Windows", "ia archiver" => "Windows", "NetPositive" => "Windows", "mass downloader" => "Windows", "microsoft" => "Windows", "offline explorer" => "Windows", "teleport" => "Windows", "web downloader" => "Windows", "webcapture" => "Windows", "webcollage" => "Windows", "webcopier" => "Windows", "webstripper" => "Windows", "webzip" => "Windows", "wget" => "Windows", "Java" => "Unknown", "flashget" => "Windows", "MS FrontPage" => "Windows", "(msproxy)/([0-9]{1,2}.[0-9]{1,2})" => "Windows", "(msie)([0-9]{1,2}.[0-9]{1,2})" => "Windows", "libwww-perl" => "Unix", "UP.Browser" => "Windows CE", "NetAnts" => "Windows"];
        $qf = "/\\b(x86_64|x86-64|Win64|WOW64|x64|ia64|amd64|ppc64|sparc64|IRIX64)\\b/ix";
        $nI = preg_match($qf, $s4) ? "64" : "32";
        foreach ($p3 as $t9 => $vY) {
            if (!preg_match("{\\b(" . $t9 . ")\\b}i", $s4)) {
            }
            return $vY . " x" . $nI;
        }
        return "Unknown";
    }
}
