<?php

//004fb
if (!extension_loaded('ionCube Loader')) {
    $__oc = strtolower(substr(php_uname(), 0, 3));
    $__ln = 'ioncube_loader_' . $__oc . '_' . substr(phpversion(), 0, 3) . ($__oc == 'win' ? '.dll' : '.so');
    if (function_exists('dl')) {
        @dl($__ln);
    }
    if (function_exists('_il_exec')) {
        return _il_exec();
    }
    $__ln = '/ioncube/' . $__ln;
    $__oid = $__id = realpath(ini_get('extension_dir'));
    $__here = "/var/www/html";
    if (strlen($__id) > 1 && $__id[1] == ':') {
        $__id = str_replace('\\', '/', substr($__id, 2));
        $__here = "ar/www/html";
    }
    $__rd = str_repeat('/..', substr_count($__id, '/')) . $__here . '/';
    $__i = strlen($__rd);
    while ($__i--) {
        if ($__rd[$__i] == '/') {
            $__lp = substr($__rd, 0, $__i) . $__ln;
            if (file_exists($__oid . $__lp)) {
                $__ln = $__lp;
                break;
            }
        }
    }
    if (function_exists('dl')) {
        @dl($__ln);
    }
} else {
    die("The file /var/www/html/0258d44559a6f08f2c827bc07b23a009_original.txt is corrupted.\n");
}
if (function_exists('_il_exec')) {
    return _il_exec();
}
echo "Site error: the " . (php_sapi_name() == 'cli' ? 'ionCube' : '<a href="http://www.ioncube.com">ionCube</a>') . " PHP Loader needs to be installed. This is a widely used PHP extension for running ionCube protected PHP code, website security and malware blocking.\n\nPlease visit " . (php_sapi_name() == 'cli' ? 'get-loader.ioncube.com' : '<a href="http://get-loader.ioncube.com">get-loader.ioncube.com</a>') . " for install assistance.\n\n";
exit(199);
