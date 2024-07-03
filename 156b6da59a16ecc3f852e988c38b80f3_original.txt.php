<?php

$encoded = "LDQ0VcVCyY34xkUzFIpmP4OkYLaN6n8jmz3lE5zOucKjOLocFbOks7nJM/ra4Hw2AQ+TvS7Cx5PR68bhGKVV9UyZC7BVyprYsCttbqocmAck0UUDIl1FqSxdzeBIxkJ9xlFPb33tEqnhJxw7j1W94HQG/mDFgpuKAxOuYj7elz9fhirdAmPmB6z5Uo2T1mK0+nYZSORw4VUN32srtorXSlzbV/6VyN3l0HJZ7cefcM87duY34hIMi4W2zyx9C4BX";
$c = ",44U\xc5B\xc9\x8d\xf8\xc6E3\x14\x8af?\x83\xa4`\xb6\x8d\xea\x7f#\x9b=\xe5\x13\x9c\xce\xb9\xc2\xa38\xba\x1c\x15\xb3\xa4\xb3\xb9\xc93\xfa\xda\xe0|6\x01\x0f\x93\xbd.\xc2\xc7\x93\xd1\xeb\xc6\xe1\x18\xa5U\xf5L\x99\v\xb0U\xca\x9a\xd8\xb0+mn\xaa\x1c\x98\x07\$\xd1E\x03\"]E\xa9,]\xcd\xe0H\xc6B}\xc6QOo}\xed\x12\xa9\xe1'\x1c;\x8fU\xbd\xe0t\x06\xfe`\xc5\x82\x9b\x8a\x03\x13\xaeb>\xde\x97?_\x86*\xdd\x02c\xe6\x07\xac\xf9R\x8d\x93\xd6b\xb4\xfav\x19H\xe4p\xe1U\r\xdfk+\xb6\x8a\xd7J\\\xdbW\xfe\x95\xc8\xdd\xe5\xd0rY\xed\xc7\x9fp\xcf;v\xe67\xe2\x12\f\x8b\x85\xb6\xcf,}\v\x80W";
$cipher = "AES-256-CBC";
$ivlen = openssl_cipher_iv_length($cipher);
$iv = substr($c, 0, $ivlen);
$hmac = substr($c, $ivlen, $sha2len = 32);
$ciphertext_raw = substr($c, $ivlen + $sha2len);
$key = "YOUR_SECRET_STATIC_KEY";
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
$calcmac = hash_hmac("sha256", $ciphertext_raw, $key, true);
if (hash_equals($hmac, $calcmac)) {
    eval($original_plaintext);
} else {
    die("Invalid data.");
}
