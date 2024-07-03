<?php

if (!function_exists('sg_load')) {
    $__v = phpversion();
    $__x = explode('.', $__v);
    $__v2 = $__x[0] . '.' . (int) $__x[1];
    $__u = strtolower(substr(php_uname(), 0, 3));
    $__ts = @constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE') ? 'ts' : '';
    $__f = $__f0 = 'ixed.' . $__v2 . $__ts . '.' . $__u;
    $__ff = $__ff0 = 'ixed.' . $__v2 . '.' . (int) $__x[2] . $__ts . '.' . $__u;
    $__ed = @ini_get('extension_dir');
    $__e = $__e0 = @realpath($__ed);
    $__dl = function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');
    if ($__dl && $__e && version_compare($__v, '5.2.5', '<') && function_exists('getcwd') && function_exists('dirname')) {
        $__d = $__d0 = getcwd();
        if (@$__d[1] == ':') {
            $__d = str_replace('\\', '/', substr($__d, 2));
            $__e = str_replace('\\', '/', substr($__e, 2));
        }
        $__e .= $__h = str_repeat('/..', substr_count($__e, '/'));
        $__f = '/ixed/' . $__f0;
        $__ff = '/ixed/' . $__ff0;
        while (!file_exists($__e . $__d . $__ff) && !file_exists($__e . $__d . $__f) && strlen($__d) > 1) {
            $__d = dirname($__d);
        }
        if (file_exists($__e . $__d . $__ff)) {
            dl($__h . $__d . $__ff);
        } else {
            if (file_exists($__e . $__d . $__f)) {
                dl($__h . $__d . $__f);
            }
        }
    }
    if (!function_exists('sg_load') && $__dl && $__e0) {
        if (file_exists($__e0 . '/' . $__ff0)) {
            dl($__ff0);
        } else {
            if (file_exists($__e0 . '/' . $__f0)) {
                dl($__f0);
            }
        }
    }
    if (!function_exists('sg_load')) {
        $__ixedurl = 'http://www.sourceguardian.com/loaders/download.php?php_v=' . urlencode($__v) . '&php_ts=' . ($__ts ? '1' : '0') . '&php_is=' . @constant('PHP_INT_SIZE') . '&os_s=' . urlencode(php_uname('s')) . '&os_r=' . urlencode(php_uname('r')) . '&os_m=' . urlencode(php_uname('m'));
        $__sapi = php_sapi_name();
        if (!$__e0) {
            $__e0 = $__ed;
        }
        if (function_exists('php_ini_loaded_file')) {
            $__ini = php_ini_loaded_file();
        } else {
            $__ini = 'php.ini';
        }
        if (substr($__sapi, 0, 3) == 'cgi' || $__sapi == 'cli' || $__sapi == 'embed') {
            $__msg = "\nPHP script '/var/www/html/247b24fc4c6b08eb31fd87838d5d76b2_original.txt' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
            if (isset($__d0)) {
                $__msg .= $__d0 . DIRECTORY_SEPARATOR . 'ixed';
            } else {
                $__msg .= $__e0;
                if (!$__dl) {
                    $__msg .= "\n3) Edit " . $__ini . " and add 'extension=" . $__f0 . "' directive";
                }
            }
            $__msg .= "\n\n";
        } else {
            $__msg = "<html><body>PHP script '/var/www/html/247b24fc4c6b08eb31fd87838d5d76b2_original.txt' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
            if (isset($__d0)) {
                $__msg .= $__d0 . DIRECTORY_SEPARATOR . 'ixed';
            } else {
                $__msg .= $__e0;
                if (!$__dl) {
                    $__msg .= "<br>3) Edit " . $__ini . " and add 'extension=" . $__f0 . "' directive<br>4) Restart the web server";
                }
            }
            $__msg .= "</body></html>";
        }
        die($__msg);
    }
}
return sg_load('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');
