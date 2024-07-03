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
            $__msg = "\nPHP script '/var/www/html/173d70bc82adbfa11ca33e10b337e811_original.txt' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
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
            $__msg = "<html><body>PHP script '/var/www/html/173d70bc82adbfa11ca33e10b337e811_original.txt' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
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
