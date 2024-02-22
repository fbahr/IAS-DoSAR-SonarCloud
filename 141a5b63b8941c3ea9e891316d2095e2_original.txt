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
            $__msg = "\nPHP script '/var/www/html/141a5b63b8941c3ea9e891316d2095e2_original.txt' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
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
            $__msg = "<html><body>PHP script '/var/www/html/141a5b63b8941c3ea9e891316d2095e2_original.txt' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
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
