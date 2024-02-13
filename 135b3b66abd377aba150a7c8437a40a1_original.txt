<?php

if (!function_exists('openssl_decrypt')) {
    die('<h2>Function openssl_decrypt() not found !</h2>');
}
if (!defined('_FILE_')) {
    define("_FILE_", getcwd() . DIRECTORY_SEPARATOR . basename($_SERVER['PHP_SELF']), false);
}
if (!defined('_DIR_')) {
    define("_DIR_", getcwd(), false);
}
if (file_exists('key.inc.php')) {
    include_once 'key.inc.php';
} else {
    die('<h2>File key.inc.php not found !</h2>');
}
$e7091 = "QklLdWgzMDdIVHlRSTJLN0NqZnVNSFVOTGd5UCt0aWNWKy9LSEl0eHlsZk5CV0NMb1VxbzNDdE13eXhwcDczQndkRzRYYTJ1bkxOeHMzSXhOU2YxVkwwTDZKVGtVWENoNU8rR1lJdlB3SnlQbjdCZXAxcnpYTlF4RXR3YTNpeC95eVdRclc3NlU3Z2VMMHpoK285V251OXBDV3FvTzdwc2hOd3NBcDlNWjFhTTAvK3BJY1FjS3RodGZza09ObElQcDNrMnFzdDQyRERGMVRNSHBNUXlYeEFRSk81SHdwdlg5aTlkMGJ6NFUzVHdObjhYT01HdCtrRzZRN1VwRlU3S21QdEZpRWxtNHNkTXdPRTlHUkVjK2FIY2NnNnJST3Y2UFAxQWsvSm1ib21xdVpzT1poeU5TS1NyRFRhZnhlRTc0Rm5mRllnR0pVdmZ3UFJvS042eFlHL08rUDN4U04rY3o0dER6YWM4M3VrOEcwWFpUbW5HeEl0SzQxNG9Ta3hrQXYxWDY0ZmZCZzBlb1l4QjFML0xNdCtaL2dpZmVweXZNVUg2WG9Idm5zQkJTUDVLdmhwLzF5Z2tzaWR0VUZFaDVYTzJLalhLWUlsTDhoVUF1VGp5bEl5OGpveHZxRDhJbG9yK0RScXJMYnhtNGprZ0F0WGNEWkNmbW0ydlV6cjZHT3ZmMG9OWFlPcHM4SXpVWjdxSE9BPT0=";
eval(e7061($e7091));
