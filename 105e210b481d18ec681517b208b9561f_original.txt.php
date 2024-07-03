<?php

//00435
// Pheonix | Cocaine v4.0
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
    die("The file /var/www/html/105e210b481d18ec681517b208b9561f_original.txt is corrupted. Ensure that you use binary mode when transferring files with FTP and disable the 'TAR smart cr/lf feature' if using WinZIP\n");
}
if (function_exists('_il_exec')) {
    return _il_exec();
}
echo "Cocaine kit require PHP 7.1 or later, and ioncube extension installed.";
exit(199);
