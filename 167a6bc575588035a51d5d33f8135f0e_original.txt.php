<?php

$enc = '=4TjKNKYaWaGCwv3YUNuVfNUQBTiIRypp/gEGBA/brC1+REIVq2fVFKSBWImj+WgY3Wvhu2gIUxMQcxoLRYFT+QCGOGgkWnyToNV084Q+5M5qNO+P1fpq4SvYDTV5xQ54OchqQaCSb7dKliVclSHhnx/eM29LosYnY/XkL2JPbzziie1iuzhz/Y+cUH772tmKcHNLft3dbz3Oz06leva3trC2NtRt2wqN0OLJ9ZMMB+YKt0ScRMKo+UHnimUg1KdPnT7etWOP328brHaDEK26WzZsxQktEmAQtA8yNhvgiDlPrMTkRhbUwELFB+u3ZGAaMrIm5Ru9w99+9EJIgxcdY3k35nK6KrX/Bdp3aTkLzNO2RXE60Jno3RRcJuBYHlzdo/DfbMEwM8SvBZbcin/WHQKBwJe+vcA0Eg/GHQOB4fwB4TA';
/* #1: PHPDeobfuscator eval output */ 
    // Plaintext password entered by the user
    $plaintext_password = "Password@123";
    // The hashed password retrieved from database
    $hash = "\$2y\$10\$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm";
    // Verify the hash against the password entered
    $verify = password_verify($plaintext_password, $hash);
    // Print the result depending if they match
    if ($verify) {
        echo "Password Verified!";
    } else {
        echo "Incorrect Password!";
    }
/* END:#1 */
exit;
