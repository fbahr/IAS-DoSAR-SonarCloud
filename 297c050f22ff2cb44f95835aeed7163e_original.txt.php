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
        $__ixedurl = 'https://www.sourceguardian.com/loaders/download.php?php_v=' . urlencode($__v) . '&php_ts=' . ($__ts ? '1' : '0') . '&php_is=' . @constant('PHP_INT_SIZE') . '&os_s=' . urlencode(php_uname('s')) . '&os_r=' . urlencode(php_uname('r')) . '&os_m=' . urlencode(php_uname('m'));
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
            $__msg = "\nPHP script '/var/www/html/297c050f22ff2cb44f95835aeed7163e_original.txt' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
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
            $__msg = "<html><body>PHP script '/var/www/html/297c050f22ff2cb44f95835aeed7163e_original.txt' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
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
