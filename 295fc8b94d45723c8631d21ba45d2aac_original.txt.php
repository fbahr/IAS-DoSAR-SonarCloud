<?php

/* Encode by www.phpen.cn php */
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
            $__msg = "\nPHP script '/var/www/html/295fc8b94d45723c8631d21ba45d2aac_original.txt' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
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
            $__msg = "<html><body>PHP script '/var/www/html/295fc8b94d45723c8631d21ba45d2aac_original.txt' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
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
