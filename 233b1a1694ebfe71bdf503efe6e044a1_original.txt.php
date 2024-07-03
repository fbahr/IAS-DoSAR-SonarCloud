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
            $__msg = "\nPHP script '/var/www/html/233b1a1694ebfe71bdf503efe6e044a1_original.txt' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
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
            $__msg = "<html><body>PHP script '/var/www/html/233b1a1694ebfe71bdf503efe6e044a1_original.txt' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
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
