<?php

$encrypted_string = $_F = "/var/www/html/115ef25ebf5cc76b9e2af2331b9cc12b_original.txt";
$_X = 'P2lCP1ouWj5zQT4oIT45TUFzSE05KCdvRnBLbUZUdCcpKT5NUnM9KCdFTz45c3pNMj0+bjJ6c1o9PmUyMk1ubj5lV1dPfU05Jyk7DVYNVjJXZW5uPnBzeEg3UT0+TVI9TUg5bj5GOVlzSF8vT0g9ek9XV016Pl0NVglaUTxXczI+QVFIMj1zT0g+X18yT0huPXpRMj0oKT5dDVYJCVplek1IPTo6X18yT0huPXpRMj0oVGcgSyw+ckZJcEssPnJGSXBLKTsNVglsPmhoPkFRSDI9c09IDVYNVglaUTxXczI+QVFIMj1zT0g+c0g5TVIoKT5dDVYJCSQ9LnNuLWk5T19uc3hIT1E9KCk7DVYJCSQ9LnNuLWl6TTlzek0yPSgncDNDRTNFJyk7DVYJbD5oaD5BUUgyPXNPSA1WbD5oaD4yV2Vubg=';
$_D = "base64_decode";
/* #1: PHPDeobfuscator eval output */ 
    $_X = "?iB?Z.Z>sA>(!>9MAsHM9('oFpKmFTt'))>MRs=('EO>9szM2=>n2zsZ=>e22Mnn>eWWO}M9');\rV\rV2Wenn>psxH7Q=>MR=MH9n>F9YsH_/OH=zOWWMz>]\rV\tZQ<Ws2>AQH2=sOH>__2OHn=zQ2=()>]\rV\t\tZezMH=::__2OHn=zQ2=(Tg K,>rFIpK,>rFIpK);\rV\tl>hh>AQH2=sOH\rV\rV\tZQ<Ws2>AQH2=sOH>sH9MR()>]\rV\t\t\$=.sn-i9O_nsxHOQ=();\rV\t\t\$=.sn-izM9szM2=('p3CE3E');\rV\tl>hh>AQH2=sOH\rVl>hh>2Wenn";
    $_X = "?><?php if (! defined('BASEPATH')) exit('No direct script access allowed');\r\n\r\nclass SignOut extends Admin_Controller {\r\n\tpublic function __construct() {\r\n\t\tparent::__construct(TRUE, FALSE, FALSE);\r\n\t} // function\r\n\r\n\tpublic function index() {\r\n\t\t\$this->do_signout();\r\n\t\t\$this->redirect('SIGNIN');\r\n\t} // function\r\n} // class";
    $_R = "?><?php if (! defined('BASEPATH')) exit('No direct script access allowed');\r\n\r\nclass SignOut extends Admin_Controller {\r\n\tpublic function __construct() {\r\n\t\tparent::__construct(TRUE, FALSE, FALSE);\r\n\t} // function\r\n\r\n\tpublic function index() {\r\n\t\t\$this->do_signout();\r\n\t\t\$this->redirect('SIGNIN');\r\n\t} // function\r\n} // class";
    /* #2: PHPDeobfuscator eval output */ 
        if (!defined('BASEPATH')) {
            exit('No direct script access allowed');
        }
        class SignOut extends Admin_Controller
        {
            public function __construct()
            {
                parent::__construct(TRUE, FALSE, FALSE);
            }
            // function
            public function index()
            {
                $this->do_signout();
                $this->redirect('SIGNIN');
            }
            // function
        }
        // class
    /* END:#2 */
    $_R = 0;
    $_X = 0;
/* END:#1 */
$decrypted_string = openssl_decrypt($encrypted_string, 'sha1', 'htyedhfnvmbnyurtes6453726354xb10', 0, NULL);
echo $decrypted_string;
