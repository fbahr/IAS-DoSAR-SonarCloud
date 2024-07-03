<?php

$Cyto = "Sy1LzNFQt1dLL7FW10uvKs1Lzs8tKEotLtZIr8rMS8tJLEnVSEosTjUziU9JTc5PSdUoLikqSi3TUPHJrNAEAWsA";
$Lix = "==QQZoZxP1enuc/rf789gGsPzAlTbu7uOx4FFFcoQLMsgTQ6bDooA+Uwcc13qKdAzp7YO7wOr4XjDRVjCnOFyy+PsNvaa9z/cRoHlEHRLrOdnqlDA78FxGMWL4qzwtTNzZ2+6xq8YwcSUV3ZWdy+58laq9MbBn0ZsU9IEB9PywTpLR9AqhP/52rc6XPl+F328m6gxiY5EfzCCisy7Ympvi90IyJXEiN1g9LPXFbRSk7mdyHXhSzqWSRfvdRQTHiIaicczQZRe0vip1itbR1e5IQbDS7SPShQBwBZ1eiYhOaaPO6RV9FisVIPaY1VQ/G6Gn31/dg5XV1A4CrSakql+kvkR7LgkzYBf88Fuq/LVdj0bjT0EgSPbQ20j5sTYqbvW9nrf1cGrNdQweGhFMDWvUIpZcQqj6jEJvnwG9URg+jQ5oiwwvoJs+JDLJ2SA7zpNadARGq3JEY6aDuxnphLJzShJxSLbfrclPr+QobDp83vTuslOppvyZ+c5wpzN7D6a9VckOuc72r/CNVFnV3F8qBqtvCECJlhA7Vh20Y6KSz9tjoUUXkhfg/N9BBQbr22SVLn45fTBIbA";
/* #1: PHPDeobfuscator eval output */ 
    //***************************************************
    // http://www.niadesain.com
    // Solusi Hemat Script Bisnis Online Anda
    // Menerima Jasa Pembuatan Website & Template Website
    //***************************************************
    include "configdb.php";
    include "masterclass.php";
    $db = new db_mysql($server_name, $userdb, $passdb, $databasename, "");
    include "function.php";
    include "affiliate.php";
    include "domainlisensi.php";
    $skr = date("Y-m-d");
    $db->select("*", "click");
    $totvis = $db->num_rows();
    $db->select("DISTINCT ipaddress", "click", "date='{$skr}'");
    $mbr_on = $db->num_rows();
    $onl = isset($_GET['ipaddress']) ? $_GET['ipaddress'] : null;
    $ip = $onl["ipaddress"];
    $onl = isset($_GET['ipaddress']) ? $_GET['ipaddress'] : null;
    $ip = $onl["ipaddress"];
    if ($domain == "www.maduberkahstore.com" and $databasename == "maduberkahstore") {
        include "theme.html";
    } else {
        include "error.php";
    }
/* END:#1 */
exit;
