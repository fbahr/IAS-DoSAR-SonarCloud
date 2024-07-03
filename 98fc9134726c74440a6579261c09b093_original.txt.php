<?php

/* This script has been encrypted with SemtokenPHP v.1.1.0, for more information please visit https://semtoken.com/ */
/* #1: PHPDeobfuscator eval output */ 
    header('Content-Type: text/html; charset=utf8');
    ?> <?php 
    $KMEBGVDAFFDI3H5E9RFGFIYW = "vkusnyyb.mysql.tools";
    $NE2XOJATRJWGQ2FH8QO4CS2WWE = "vkusnyyb_stemax";
    $GWHGYEPFDTZELNCV8J056LM5U = "Me4NN4Xhm8y8";
    $DKJGD7OI2JWWH0YSE9P0OHLUAPU = "vkusnyyb_stemax";
    $OJGR1GFD6VOCUNAKOQXZ189QYY = mysqli_connect($KMEBGVDAFFDI3H5E9RFGFIYW, $NE2XOJATRJWGQ2FH8QO4CS2WWE, $GWHGYEPFDTZELNCV8J056LM5U, $DKJGD7OI2JWWH0YSE9P0OHLUAPU);
    mysqli_query("set @session sql_mode = utf8;");
    mysqli_query("set names utf8");
    $HEW1NF5227MZP185BPXKR2DOW = $_GET['id'];
    $UROQU5WLAE5S9RXGO7GHRLVNVC = $_GET['variable'];
    $NYCI15MUAVYMPHUBWWJRDKUHKZY = $_GET['raw'];
    $AZ1IVQQJTXAWPYVYN9Q2JNIO04 = $_GET['price'];
    $Q8KIWCSTKWROR7O3PNJCBYD2GXO = $_GET['quantity'];
    $result = mysqli_query($OJGR1GFD6VOCUNAKOQXZ189QYY, "SELECT `order_id`,`order_status_id` FROM `oc_order`");
    while ($IHACFWABDULI8OEDVTUFYFRAVAS = mysqli_fetch_assoc($result)) {
        $ZNGA5GHTSE28FAZUCCYNM5UXFE[] = $IHACFWABDULI8OEDVTUFYFRAVAS;
    }
    print json_encode($ZNGA5GHTSE28FAZUCCYNM5UXFE);
    mysqli_close();
    ?> 
<!-- This script has been encrypted with SemtokenPHP v.1.1.0, for more information please visit https://semtoken.com/ -->
<?php 
/* END:#1 */
