<?php

//002cd
if (extension_loaded('ionCube Loader')) {
    die("The file /var/www/html/97f0f952d2999db6d8b16ff3d4d19be7_original.txt is corrupted.\n");
}
echo "\nScript error: the " . (($cli = php_sapi_name() == 'cli') ? 'ionCube' : '<a href="https://www.ioncube.com">ionCube</a>') . " Loader for PHP needs to be installed.\n\nThe ionCube Loader is the industry standard PHP extension for running protected PHP code,\nand can usually be added easily to a PHP installation.\n\nFor Loaders please visit" . ($cli ? ":\n\nhttps://get-loader.ioncube.com\n\nFor" : ' <a href="https://get-loader.ioncube.com">get-loader.ioncube.com</a> and for') . " an instructional video please see" . ($cli ? ":\n\nhttp://ioncu.be/LV\n\n" : ' <a href="http://ioncu.be/LV">http://ioncu.be/LV</a> ') . "\n\n";
exit(199);
