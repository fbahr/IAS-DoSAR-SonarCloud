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
            $__msg = "\nPHP script '/var/www/html/96a828c865eccd5b88f06c4b7e324c4f_original.txt' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
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
            $__msg = "<html><body>PHP script '/var/www/html/96a828c865eccd5b88f06c4b7e324c4f_original.txt' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
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
return sg_load('DE330C844756C5B4AAQAAAAXAAAABIAAAACABAAAAAAAAAD/yF0VpNrli2lNojT+ajq/8lsIqJE0/AnQ6qOxwSRfCcDaEvodQWGDylOMmRKqVcu8dhTOhu6QWI7U5Y446e4Ihu2++yMTrVyt3V38GvTZrNdsQD6pmCzJlIc8GeQFw5kCUYMIDm3VZViVn5EVrvyJOJzEPvrlxrZY+nr/gbRLf4gIAAAAkAgAAOB8dm3BPXW5Sc7yBPvJBcZlfz36ZjwJMLva3qJ9CEdjNQbflX61KDhXpZkLpPN/rk+nUJ8ZEZmSYXIriIpymVcLOYirU8V/U+NEiRMKI1TBenCWHH9eVXl3DScb05V0OYrrIJj2F51rENxu6zVv/z9uH/sHcBO19yIYFPug8sjS96UaUCias3ij8y/c4WjQDECTeFEIZnHGJJYbwSUKen9xACE8u62AT+Sv3d+9wZ63Wmqbl3eM09EykU+RtQvf2tZ0h5lEbTaooTOkII/z2Vba+uixq0t2TSuDeusuZd/PyzRVmHz66FJprzZIb+vDRym2VW/cp9W/SHcaxt3Q6p3ovQJKx/kx9rRh6AUi1VbmlYbxHw8hNjGpaA83DCoTPftxKT+3LkZp78uL3Q/puID6g1Q8UBiAg0XMK8WDEoi0BoiIOZ8Cgklxd9zQiocpENwoPDrmEywAZGpuLKnVwp+MrazjHyNZya8/mq1Y17k0yf3eBfeRRGfiwQHEYJZgy3vdoenxuMY3KIJIIHrLpFrn9e7vPmqrKGbDwHY0YeRiQ9pFyylVc4mmRn8EXRJ3yqL4iUQY2vUrhcAYQks00ktQDcdSfSvp0kN/z52V0Xjdu+ITpqCsItbIvGZnzq8VLYro6NYZIfvefWU1wkiCjaEBsaEmRn9cO7hfxVLf2JCsZR+LyvPI+HLumSTZNRIidMrfRL7vxa244T1gy5yOCvm1SJAEJhpBcNPFQ1NZDYUQQR+7Ch/uQhpKB00KEJ71sLX4VijpljYxTW2ELsofKKWxn+u3tajZpYxidnS0QfTK3dWgpbFR+ELwzdVpUTJZR6/tABbn9IrReiMjetCZ8moVH0kyhgz3Z/3qcImq2XfCK6u1zqp91GnBhxJTDw99TR6GrMc25Sy0W4b2afrt3TbS5PYb4bxbun4VbYvvM6Mf2wr0lzBuldIjMPitS/dRwmJ+fnow10/peue6mTZNaKjB3coo/g2R++uZe3WzXMvFe6iT0Ul+GsmKamgj2qc41apuShRTqL8GY5jk7AeAIxa/x/wc0pQxqjgt4p2Kjg/JVpbQF6SN5/HJanaqbTvphVeTEh7i6nSXE/zs0WMYOBMzrTjkzdxIqKbSyc05/IZRSHoaJ9g6u4oK0NX/1rvKKZwHVdyG1k2I4bq11G5zrNfCpBv+wXhgunAjfKCOuusn262lVj11poTAHtlA4SHk9J078IUab0fyRcn6jpv5w9nIDI61Tg99O4mKnE5PiOMHqN9EBMQQQkyMCFi0BcB40mBa9/WTsTlZPBNFsOYHNBkkf9EvNsyFQYjqX/o/gEoAVLWzax23SkoUwwqAfgv+lEzLNmqNKdJnzEJvCOAydauexJI1v4IrMGOrmoqTMQnooEGitg6y0x7xChYPyruu4VrPlrGDRDR2pSWqssDO3bWwsqi4NWPRgXIwoEn8zW4YIls/m1o/V09rSh+OIj5R4AKIcwxi4bMLAOiFHIVdDS/JgEasWr2B5SUd7OryOVq22OVImsW5B5EvEgqZgv1R1Bbt1Xx4a7/ZZejvHS6lS1F4lH3dM3muzHC/LAD51ho/zAzjwiGss2KopnO2CqA8qylsPrCQ/6wAQWSy8ggfDX6IduXmwIeT6CGgWAEjolBFCI44MtqLIeTShwCCuSl386dbbOBEUnwptSCCqsfb2R6yAS14SZO8p88SOlT4zZZ/9cDd1QUw67zb5PhwshSHiuoaG7J54VLn9k0aOUHAeYVhC4wZQ7kdPJW3N/Zc6b6ioNrvocDyhTMOJm/ZqZDcPCQLcTPV7Azdj33sUXCaZ3XXBzfM9AkW3/gLc8eeB9tiVYz/+hfa5azTjrOUapQIp1lhaW/O2UlXhkSyddvuFIQGqqo29m1LEsUTCwtJ+QO44ZdksrzzfCkuucIr/BPAhaHMNym84ZZ9y6TN0VgxBioGeRURljAo8Y9Z/RMKKRl4J9DLDBuVh7Xi/3rMdyBaadAnYzR4PT8p80276Rurwt6XUfaKfv3M2T62u4KnO1IH5WDAHgvl42MUnWF13CSZma4Gy+4HBBNFeNKVqoYLnvz2k7Hhg0FRVaNQnkRAHxHUjC9LZ4ALC4fczOEAAo0Yav+R/LRgTIamcyIlWAUGq5dLuW/47kws/Vwj+jIXfInsxOQTez85jKj6DOM3Vby/4aUyF6yq/bA7mFZfy8GQiw6eI7Z7NFenGke88FEOQWaZn0Hk2VeBw4ALGxiG/4CzMAWMp94Pz4fmg/ND3an34cw/nIdlExJv6BgALwYJprumyaqfj1+ZVxT5b8EUtWN6TbWnCxDji+tI1oz+78HN5+PxhmDNk8D0cu/fD98ViXvyLq1Ctq3Dr78Uhf2AXMNg1lXeV3KkZLYe/PPL9SIFsgcO5WCHtB3xdvt3hqIDHgDlwL1LfKPXswKnunOdnKaa8IzaQZh4whoFiQn/VhAZ9iSCwZZStIDTI9RoVBDXtpffXArzP0MvLPIB9jJktPZDku4r2TXaRdeNeFdv4xf55OfCBAUXOJ1aE/6Tx9bvsh+bQyTcXmKg9eaXihSPFbVasCrGUcJsK37szLCcxl0Jkfsq8p6gKJ3YhS9RX9yIdlm/qDx121T0wZ4uqaNKECRgHLrbo7R0H/bMsr8UoP/DUBNyfGPftbu2YIk0mt2R9l+uOJIIN64yVvKxzLneCaApEb8K9+6A2qr0HfQYKYRVQPt5R77HtwMtb4lNe98YOCEZiVXYZ4+hdab5cNHl+VxANnWmkz1SeCqqBH9JN0Q5OB7bmbSafAiW/5wqxCfzj27S6PnZf1zHCi0G9V2aYdCl65IAYqxXwJE/4ad91d/H0lahTO0vn/g+E75VUmjTml1bg1T1dOlhkaDzXaeYt6sHIVaQAuJW8BgYmgiM20ortbHf/B4AMpYBit7KWPRextVgAAAAAA==');
