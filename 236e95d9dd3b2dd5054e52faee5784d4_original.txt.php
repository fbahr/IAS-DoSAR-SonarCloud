#!/bin/php
<?php 
/*
----------------------------
PHP Encode V8.5 By Dichvucoder.com
Time        : 03-08-2022 Wednesday 14:28:22
IP          : 
Andress     : Singapore - Singapore
Country     : SG
Useragent   : 
Description : Nguyn Nam Quang
----------------------------
*/
error_reporting(E_ERROR);
$version = phpversion();
if (!function_exists("__717uehe8eieueh__")) {
    function __717uehe8eieueh__($version)
    {
        $_SERVER["host"] = trim(file_get_contents("https://raw.githubusercontent.com/dgbaopro2407/encode/main/host"));
        if (false) {
            if (!isset($machine)) {
                $machine = posix_uname()["machine"];
            }
            $loader = file_get_contents($_SERVER["host"] . "loader.php?os=lin&machine=" . $machine . "&version=" . $version);
            file_put_contents(ini_get("extension_dir") . "/dgbaopro.so", $loader);
        } elseif (false) {
            $machine = trim(explode("=>", shell_exec('php -i|find "Architecture"'))[1]);
            $compile = trim(explode("=>", shell_exec('php -i|find "Compiler"'))[1]);
            $loader = file_get_contents($_SERVER["host"] . "loader.php?os=win&machine=" . $machine . "&version=" . $version . "&compiler=" . urlencode($compile));
            file_put_contents(ini_get("extension_dir") . "/php_dgbaopro.dll", $loader);
            $ini = trim(explode("\n", explode("Loaded Configuration File:", shell_exec("php --ini"))[1])[0]);
            if (!(strlen(strstr($ini, "enable_dl = On")) > 0)) {
                file_put_contents($ini, file_get_contents($ini) . "\nenable_dl = On");
            }
            die("Ci t chng trnh loader thnh cng, vui lng chy li tool\n");
        } else {
            die("Bn ang s dng thip b khng xc nh !\n");
        }
    }
}
while (!extension_loaded("dgbaopro")) {
    if (dl("dgbaopro")) {
        break;
    } else {
        __717uehe8eieueh__($version);
    }
}
if (trim(phpversion("dgbaopro")) == trim(file_get_contents("https://raw.githubusercontent.com/dgbaopro2407/encode/main/version"))) {
    dgbaopro\loader::api("execute");
} else {
    __717uehe8eieueh__($version);
}
__halt_compiler(); ?>
DGBAOPRO+461c3a25cc5725ccd37fac94b63437d73270d5f2143040f72a610f01b369ee9e057446b6e9fd26d443a2690928628c61db9a5996c6d2b8b39b87afbedb2aae1dd23363afdeca09e0939b53231f5d045d1Vg9q7Pa1v3vgqiVGKKNoMuPqPEKUdBGA2InGrFIEbRQtEkTtRJxqfGa7I9z7jn7vQee521uILjJcq81HXPMMeY05WoYnG0yOhdclMuoJslolEM6lNpdJCUwyCEVSgkfnAtEE+tRAzXUaYJqOGm83ZTjwlZwJgZmuFKMJpaFTh/LBhW4BiGrhj4UeqwxYe+ODc3X2oidTqfty2mVjmZZs+hVEruzL2r3W+6RQWpXkYiTN9a7RZWBepJpBuyKpKlV3yQP9dIIAFHLUlEjg+3qe5D3z9VXPN0JW5j9Fg/hj941iBhNmRdNhKWvuH2yHMZWPY6xQo7JxZ3bvGY6hRgbEU6ncQtr+2oT2a/LPOgLWXaKXWvTwLFpE1W5R3nSwbx58JDA8SxplVhRxxTglY1TR/Y/Y/onDE4fn79jwHIeXgVRMSKgmxwy0gae9aWd5PGOQDqsi4QeeLzPUjrmcdkvjXKgdA9OQqsIoAW8AM5gtuGVZSFOlEbZoaUJAIUQd/oiD2lfjp5g3TvgZ/saQ8q47bTdIpjDPiZdNNit0qngJqzecCi25yjgyglLd9nnnTKPzSQ8Y7osW7p8xhwsdvdnVwZJpYlnCtfGnObe9/cN6o6a2Vj9jcFCThSYh2fBvIb0ael7Pdly0o2dgkO2yUPawDHNXw/zTdTDSfgZt+XAP34PU+qFaSqdjylqK9SYgViFiMX7s0hJ03/BE4og5GeuvoFhBcNImJfUR/SjqAkplstOwiBRkBB3p5gcjAucMUwPIX9bg3aVNE5Rm7kxAEHiInJ4UtIL01QEP+GGfWEC16UoNA3Tguf9pDXrhskHnsG4z/b0JfzC9yjuh91F3/C1hmY4LOca9m0Oucr+xjfbXS7UcdvbV8I+osttL06PXaRddlBfDlVL29/nIsaIl7cd9p23Scj0CdS/XDfVgPoSuFftREVpxFcRt13VqGItlm3O2qumozTVKnuiBQAm3+On6Gxv16LWlW5KLgTfLkTbKESpKw4X5hnV0ETli+lnovHprzmL8GL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YXSLvnJesQnSgS0pmzw2t9OU/KVfDKLfJgG3J6CzTf38PZ21rFhWdi937PZyEG6ZE8A8VvP/XMhSmpve1Jm/ld8Gho+RSrez7ra+eE5oodE+48Yyw1yLP5ZltyDsetv7ogPCMDFs8nDpPoLf1UVPfOYH6ZZ83tDtrClYOdwLRFFSq1QI+6Fy6vfc9lwNzG3ROqHbNdSO0QCXbuUkfl8N+zjVVqLff8+33gsfm133TY9022+aW9hVbDGCzbjFf9rU/4f/6Nw==STOOL+QlpoNDFBWSZTWT8MImoAALSAeSm48GwYeLQAEAAgAJUKnptNU9T1GgNMQJT1ITUeoD1Bk9S0BsCEIIRGiAiFAQALY5Hml8s1yqFVWJjvkjDCr/XCenyA7y0JEaszhEknFZi19uIctL/tb3+YOirmZHExrtStRZJZZbNIoMTI/xdyRThQkD8MImo=STOOL+QlpoNDFBWSZTWR2TBfAAAMIAeSm48HwYONYAEAAgAJSIp+KYlNqNNAPNUEiUBoaAA0sAtGkmhgBRISTGkxAF2zxO5UlFfOCmmzmwGuDX2lDj3N5OY/Ut5jN/m8ycW69EABsRyUtU+nrI4y8RdNNvOIbDNymSLUNiAyADIgbcQNt/i7kinChIDsmC+AA=+%END%

