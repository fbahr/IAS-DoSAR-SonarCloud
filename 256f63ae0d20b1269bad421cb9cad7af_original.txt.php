<?php

session_start();
require_once "../config.php";
if (!isset($_POST["takeatourtask"])) {
    goto D3d31a10f1194b8ee6983f49b95e2100;
}
if (!($_POST["takeatourtask"] == "submit")) {
    goto f3a6c4447c4d000a1d104a71689adbde;
}
if (isset($_POST["takeatour_checkbox"])) {
    takeatoursubmit($_POST["takeatour_checkbox"]);
    goto Aee35fb635a4c868695bd0e1c6ee8a6c;
}
takeatoursubmit('');
Aee35fb635a4c868695bd0e1c6ee8a6c:
f3a6c4447c4d000a1d104a71689adbde:
D3d31a10f1194b8ee6983f49b95e2100:
if (!isset($_POST["logout"])) {
    goto B8df4e9bddfaf634a655da1c408f41fc;
}
if (!($_POST["logout"] == "true")) {
    goto B4fc665c65780ed138fa6d54abced737;
}
unset($_SESSION["userid"]);
unset($_SESSION["username"]);
if (!isset($_COOKIE["dashboardbuilder_userid"])) {
    goto a5044b982c83c32be534a488a3b97b31;
}
unset($_COOKIE["dashboardbuilder_userid"]);
setcookie("dashboardbuilder_userid", '', time() + 31536000);
a5044b982c83c32be534a488a3b97b31:
if (!isset($_COOKIE["dashboardbuilder_username"])) {
    goto Fac9e7bf9d3f3e6d852790818ac4e14c;
}
unset($_COOKIE["dashboardbuilder_username"]);
setcookie("dashboardbuilder_username", '', time() + 31536000);
Fac9e7bf9d3f3e6d852790818ac4e14c:
B4fc665c65780ed138fa6d54abced737:
B8df4e9bddfaf634a655da1c408f41fc:
$param = '';
$able = "class=\"disabled\"  style=\"color:#CCCCCC;\"";
if (!isset($_REQUEST["col"])) {
    goto ede959be0910a1bb0dd0bb6af8316638;
}
if (empty($_REQUEST["col"])) {
    goto Da2908fa8a55da08e04367ac37cf38f1;
}
$param = "col=" . $_REQUEST["col"] . "&p=1";
$able = '';
Da2908fa8a55da08e04367ac37cf38f1:
ede959be0910a1bb0dd0bb6af8316638:
if (!isset($_POST["loadsampledata"])) {
    goto E16e44c2c9be65356f1c2d92ae768030;
}
$file = "STOREsampledata.data";
$newfiledata = "DATAdata.xml";
$newfilelayout = "DATAlayout.xml";
if (!isset($_SESSION["userid"])) {
    goto fe997be1de24b090176273d91f18bd40;
}
if (!($_SESSION["userid"] != 1)) {
    goto db6245d22c76ba5391599fff0a4a2ca7;
}
$newfiledata = DATA . $_SESSION["userid"] . "/data.xml";
$newfilelayout = DATA . $_SESSION["userid"] . "/layout.xml";
db6245d22c76ba5391599fff0a4a2ca7:
fe997be1de24b090176273d91f18bd40:
if (copy($file, $newfiledata)) {
    goto D3835db1ca436d13ddeda5d5c9d4af68;
}
echo "<div class=\"alert alert-danger alert-dismissable col-md-4 col-md-offset-4\">\r\n\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\r\n\t\t\t\t\t\t\t\t\t\t<strong>Error! failed to copy </strong> " . $file . "<br/><br/><div>Please make sure!</div>\r\n\t\t\t\t\t\t\t\t\t\t<ul>\r\n\t\t\t\t\t\t\t\t\t\t<li>allow_url_fopen is enabled</li>\r\n\t\t\t\t\t\t\t\t\t\t<li>Read-Write permission to folders and sub-folders of dashboardbuilder i.e chmod -R 777 dashbboardbuilder-v?-FREE</li>\r\n                                        </ul>\r\n\t\t\t\t\t\t\t\t\t\t<br/>\r\n\t\t\t\t\t\t\t\t\t\t<div>For more details take a look at the <a href=\"https://dashboardbuilder.net/documentation\" target=\"_blank\">User Guide</a></div>\r\n\t\t\t\t\t\t\t\t\t  </div>";
D3835db1ca436d13ddeda5d5c9d4af68:
$file = "STOREsampledata.lay";
$_SESSION["filename"] = "sampledata";
if (copy($file, $newfilelayout)) {
    goto dc0bc4b3f60ef3066d87183202bca64a;
}
echo _TEXT["ERROR_COPY"] . $file . "\n";
dc0bc4b3f60ef3066d87183202bca64a:
E16e44c2c9be65356f1c2d92ae768030:
if (!isset($_COOKIE["dashboardbuilder_userid"])) {
    goto de57fa04f6b75f03bca911ba5a203966;
}
if (empty($_COOKIE["dashboardbuilder_userid"])) {
    goto e52ef65b4ced929f4d9483cfe8bc5012;
}
$_SESSION["userid"] = $_COOKIE["dashboardbuilder_userid"];
$_SESSION["username"] = $_COOKIE["dashboardbuilder_username"];
e52ef65b4ced929f4d9483cfe8bc5012:
de57fa04f6b75f03bca911ba5a203966:
include "top.php";
if (!isset($_POST["adduser"])) {
    goto d0e21c89c7a9f111d7103d143c77cf86;
}
if (!($_POST["adduser"] == "true")) {
    goto e037026f4116866d5f192fb49dd0f99a;
}
if (!($_SESSION["userid"] == 1)) {
    goto C0d22453d4e313c64fa75a96350c9529;
}
login("adduser");
C0d22453d4e313c64fa75a96350c9529:
e037026f4116866d5f192fb49dd0f99a:
d0e21c89c7a9f111d7103d143c77cf86:
echo "<style>\r\n.disabled {\r\n   pointer-events: none;\r\n   cursor: default;\r\n}\r\n</style>\r\n\t\t\r\n<div class=\"container-fluid main-container\">\r\n\r\n <div class=\"col-md-12 content\" >\r\n  <div>\r\n\r\n<div >\r\n\t\t\r\n<div class=\"row\">\r\n\r\n<!-- Modal -->\t\r\n\r\n<div class=\"modal fade\" id=\"youtube\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">\r\n  <div class=\"modal-dialog modal-lg\" role=\"document\">\r\n    <div class=\"modal-content\" style=\"height:420px;\">\r\n\t  <div class=\"modal-header\">\r\n        <h5 class=\"modal-title\">";
echo _TEXT["VIDEO_TUTORIAL"];
echo "</h5>\r\n        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>\r\n      </div>\r\n      <div class=\"modal-body d-flex justify-content-center\" >\r\n        <iframe id=\"iframeYoutube\" width=\"560\" height=\"315\"  frameborder=\"0\" allowfullscreen></iframe> \r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<div class=\"breadcrumb \" id=\"shortcut\" style=\"background:#ccc; height:100px; padding-left: 100px; padding-right:50px; padding-top:70px;margin-top:10px;top:10px;position:fixed;z-index:10;\">\r\n\t\t\r\n\t\t<div id=\"previewhide\">\r\n\t\t<a  href=\"javascript:void(0);\"  data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["OPEN_NEW_DASHBOARD"];
echo "\" id=\"file-new\" onclick=\"submitAll('n');\">\r\n\t\t\t<span ><i class=\"fa-icon fa fa-file\" style=\"color:#fff;\"></i></span>\r\n\t\t</a>\r\n\t\r\n\t\t<a href=\"javascript:void(0);\"  id=\"file-open\" onclick=\"submitAll('o');\"  data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["FILE_OPEN"];
echo "\">\r\n\t\t\t<i class=\"fa-icon fa fa-folder-open\"></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\"  id=\"file-save\" onclick=\"submitAll('3');\"  data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["SAVE_CHANGES"];
echo "\" >\r\n\t\t\t<i class=\"fa-icon fa fa-save\" style=\"color:#CCCCCC;\"></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t<span class=\"menudivider\"></span>\r\n\r\n\t\t<a href=\"javascript:void(0);\" class=\"addpanel\" id=\"addpanelid\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["ADD_PANEL"];
echo "\"  >\r\n\t\t\t<i class=\"fa-icon fa fa-plus\" ></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\" onClick=\"submitDB(\$('#panelno').val());\" style=\"margin-top:-3px;\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["ADDDATA"];
echo "\" >\r\n\t\t\t<i class=\"fa-gray fa fa-database\" ></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t<a class=\"";
if (!isset($xmldata->col[0]->dbconnected)) {
    goto Bf4c72d2044cbf00c438ecefee66d51d;
}
if (!($xmldata->col[0]->dbconnected != 1)) {
    goto df13b223f4363f75c104809d0915fcb9;
}
echo "disabled";
df13b223f4363f75c104809d0915fcb9:
Bf4c72d2044cbf00c438ecefee66d51d:
echo "\" href=\"javascript:void(0);\" onClick=\"submitform(\$('#panelno').val());\" style=\"margin-top:-3px;\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["CHART_SETTINGS"];
echo "\" >\r\n\t\t\t<i class=\"fa fa-pie-chart\" ></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\"   onclick=\"submitAll('t');\"  data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["THEME"];
echo "\">\r\n\t\t\t<i class=\"fa-icon fas fa-palette\" style=\"color:#fff;\"></i>\r\n\t\t</a>\r\n\t\t\r\n\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\" class=\"addfilter\" id=\"addfilterid\" onclick=\"showhidefilterf()\" style=\"margin-top:-3px;\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["FILTERLABEL"];
echo "\">\r\n\t\t\t";
echo _TEXT["FILTERLABEL"];
echo " <i class=\"fa fa-toggle-off\" id=\"filter-icon\"></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t<span class=\"menudivider\"></span>\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\"  id=\"file-generate\" onclick=\"submitAll('g');\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["GENERATE"];
echo "\">\r\n\t\t\t<i class=\"d-icon phpicon\"  ></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\"  id=\"file-share\" onclick=\"submitAll('s');\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["SHARE"];
echo "\">\r\n\t\t\t <i class=\"fa-gray fa fa-share-alt\" ></i>\r\n\t\t</a>\r\n\t\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\"   id=\"preview\" onclick=\"preview();\" style=\"margin-top:0px;\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["PREVIEW"];
echo "\">\r\n\t\t    <i class=\"fa-gray fa fa-eye\" ></i>\r\n\t\t</a>\r\n\t\t<span class=\"menudivider\"></span>\r\n\t\t</div>\r\n\t\t\r\n\t\t\r\n\t\t<!--- After Privew --->\r\n\t\t<div id=\"previewhide2\">\r\n\t\t<a href=\"javascript:void(0);\"  id=\"print\" onclick=\"print();\" style=\"margin-top:0px;display:none;\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["PRINT"];
echo "\">\r\n\t\t\t <i class=\"fa-icon fa fa-print\" style=\"color:white;\"></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\" id=\"export_image\" onclick=\"export_image();\" style=\"display:none;\" data-bs-toggle-tooltip=\"tooltip\" data-bs-placement=\"bottom\"  title=\"";
echo _TEXT["EXPORT_IMAGE"];
echo "\">\r\n\t\t\t <i class=\"fa fa-image\" style=\"color:green;background:#78c2eb;\"></i>\r\n\t\t</a>\r\n\t\t\r\n\t\t<a href=\"javascript:void(0);\"  id=\"close_preview\" onclick=\"close_preview();\" style=\"margin-top:-3px;display:none;text-decoration:none;\">\r\n\t\t\t<span style=\"color:black;\">";
echo _TEXT["CLOSE"];
echo "</span> <i class=\"fa-icon fa fa-close\" style=\"color:red;\"></i>\r\n\t\t</a>\r\n\t\t\t\r\n\t\t</div>\r\n&nbsp;&nbsp;\r\n\r\n\t\r\n\t<li id=\"panelno\" value=\"0\">";
echo _TEXT["PANEL"];
echo " 1</li>\r\n\t<li><span class=\"menudivider\" ></span></li>\r\n\t<li id=\"resize\">";
echo _TEXT["SIZE"];
echo ":</li>\r\n\t<li id=\"menudivider\"></li>\t\r\n\t<li id=\"reposition\">";
echo _TEXT["POSITION"];
echo ":</li>\r\n\r\n\t\t\t\t\t\t<span style=\"margin-top:-4px;\" class=\"navbar-right ms-auto\">\r\n\t\t\t\t\t\t<form action=\"\" method=\"post\"  ><input type=\"hidden\" name=\"loadsampledata\" value=\"loadsampledata\"><button class=\"btn btn-sm btn-success\" id=\"sampledata_button\" style=\"padding: 0 10px;margin-bottom:10px;margin-top:3px;height:25px;\" >";
echo _TEXT["SAMPLE_DATA"];
echo "</button></form>\r\n\r\n\t\t\t\t\t\t</span>\r\n\r\n\r\n\t\r\n</div>\r\n\r\n\r\n<div class=\"d-flex\" id=\"ruller\"  >\r\n";
$x = 1;
fdbc9b142c5a1cce1d816663a500970e:
if (!($x <= 12)) {
    echo "\r\n</div>\r\n<div class=\"d-flex col col-12\" style=\"postion:static;margin-top:160px;\"></div>\r\n\r\n\r\n<div id=\"details\" class=\"bodycolor\" >\r\n";
    if (!isset($_POST["node"])) {
        goto f74a919384954e1d5c04e7e808f509c5;
    }
    if (!($_POST["node"] == "db")) {
        f74a919384954e1d5c04e7e808f509c5:
        echo "\r\n<!-- Modal take a tour-->\r\n<div class=\"modal fade in\" id=\"takeatour\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabe9\">\r\n  <div class=\"modal-dialog modal-fullscreen\" role=\"document\" >\r\n    <div class=\"modal-content\">\r\n\t";
        include "takeatour.php";
        echo "    </div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Modal take a tour End -->\r\n\r\n";
        $dataxml = "DATAdata.xml";
        $layoutxml = "DATAlayout.xml";
        if (!isset($_SESSION["userid"])) {
            goto c3af866e94bdb9b54c79c51eb7833471;
        }
        if (!($_SESSION["userid"] != 1)) {
            goto c48f2fd043c6e078d7381031cc305bc9;
        }
        $dataxml = DATA . $_SESSION["userid"] . "/data.xml";
        $layoutxml = DATA . $_SESSION["userid"] . "/layout.xml";
        if (file_exists($dataxml)) {
            goto A0122013110ed833ec8b854c1c18452e;
        }
        $file = "DATAempty/data.xml";
        if (copy($file, $dataxml)) {
            goto D0487091037c17e87687e01b8bf535fd;
        }
        echo "failed to copy {$file}...\n";
        D0487091037c17e87687e01b8bf535fd:
        $file = "DATAempty/layout.xml";
        if (copy($file, $layoutxml)) {
            goto Ccc98f6da1806968082696d9b81d71c4;
        }
        echo "failed to copy {$file}...\n";
        Ccc98f6da1806968082696d9b81d71c4:
        A0122013110ed833ec8b854c1c18452e:
        c48f2fd043c6e078d7381031cc305bc9:
        c3af866e94bdb9b54c79c51eb7833471:
        $xml = simplexml_load_file($dataxml) or die("Error: Cannot create object");
        $layout = simplexml_load_file($layoutxml) or die("Error: Cannot create object");
        include "layout.php";
        include "col.php";
        echo "<!-- Modal -->\r\n\r\n</div>\r\n\r\n\r\n</div>\r\n\r\n\r\n";
        if (!isset($_COOKIE["dashboardbuilder_userid"])) {
            goto a26c26a53dd33d8b4e40e31867d73e73;
        }
        if (empty($_COOKIE["dashboardbuilder_userid"])) {
            goto B72a6117b179ca4287d8a713268ebe32;
        }
        $_SESSION["userid"] = $_COOKIE["dashboardbuilder_userid"];
        $_SESSION["username"] = $_COOKIE["dashboardbuilder_username"];
        B72a6117b179ca4287d8a713268ebe32:
        a26c26a53dd33d8b4e40e31867d73e73:
        if (isset($_SESSION["userid"])) {
            goto b1bf39670010c58c30720043700826f4;
        }
        if (!($xmlinfo->takeatour != "true")) {
            goto F35e801090b7a3965597da65ffe2e746;
        }
        login("logout");
        F35e801090b7a3965597da65ffe2e746:
        b1bf39670010c58c30720043700826f4:
        echo "\r\n\r\n";
        function takeatoursubmit($takeatour_checkbox)
        {
            $xmlinfoFile = "../data/version.xml";
            $xmlinfo = simplexml_load_file($xmlinfoFile);
            if ($_POST["languagechange"] == "yes") {
                $xmlinfo->language = $_POST["take_tour_language"];
                $_SESSION["tower_showed"] = '';
                $xmlinfo->takeatour = "true";
                goto a2561fde254cca2bc339e4dfd29a2376;
            }
            $_SESSION["tower_showed"] = "yes";
            $xmlinfo->takeatour = "false";
            a2561fde254cca2bc339e4dfd29a2376:
            $xmlinfo->asXML($xmlinfoFile);
        }
        echo "<!-- Modal -->\r\n<style>\r\n\r\n.modal-popup{\r\n  overflow: hidden;\r\n top:0px;\r\n}\r\n\r\n.modal-header {\r\n  padding: 15px;\r\n  border-bottom: 1px solid rgba(0, 0, 0, 0.1);\r\n  background:#f7f7f7;\r\n}\r\n.modal-control-label{padding-left:25px;}\r\n.modal-content {margin:0; padding:0;}\r\n.modal-login-body {\r\n  height: 100% !important;\r\n  max-height: 600px !important; \r\n  padding-bottom:20px;\r\n}\r\n\r\n.modal-login-footer{\r\n    position: relative !important;\r\n        width: 100% !important;\r\n\t\tpadding:10px !important;\r\n\t\tmargin-top:10px;\r\n\t\t\r\n   bottom: 0px !important;\r\n\r\n}\r\n\r\n.modal-dialog-login {\r\n  padding-top: 7%;\r\n}\r\n\r\n</style>\r\n";
        function login($action)
        {
            $systemdb = "../data/users.db";
            if (file_exists($systemdb)) {
                $fileexists = true;
                goto Bb13fc0c81c12a8e35981578de26eac5;
            }
            $fileexists = false;
            Bb13fc0c81c12a8e35981578de26eac5:
            echo "<div  class=\"modal fade modal-popup\" id=\"login\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\" data-bs-keyboard=\"false\" data-bs-backdrop=\"static\">\r\n  <div class=\"modal-dialog modal-dialog-login\">\r\n  <form action=\"\" method=\"post\" id=\"loginform\" enctype=\"multipart/form-data\"  autocomplete=\"off\">\r\n    <div class=\"modal-content\">\r\n      <div class=\"modal-header\">\r\n        <h5 class=\"modal-title\" id=\"exampleModalLabel\">";
            if ($action == "adduser") {
                echo _TEXT["ADDUSER"];
                goto c5af103e08eb49d5ff3df18a3cc8aa23;
            }
            echo _TEXT["LOGIN"];
            c5af103e08eb49d5ff3df18a3cc8aa23:
            echo "</h5>\r\n\t\t";
            if (!($action == "adduser")) {
                goto a8db4d91478f91e1e461de417c7cc1ad;
            }
            echo "\t\t<button style=\"background:transparent;\" type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\" onclick=\"javascript:window.location.href = window.location.href;\"><i class=\"fa fa-window-close\" style=\"font-size:26px;color:#d14232;\"></i></button>\r\n        ";
            a8db4d91478f91e1e461de417c7cc1ad:
            echo "      </div>\r\n      <div class=\"modal-body modal-login-body\" style=\" padding:0;\">\r\n\r\n\t\t<div class=\"row d-flex justify-content-center pt-5\" >\r\n\r\n<div class=\"col-10\" id=\"login-message\" style=\"margin-top:-20px;\">\r\n\r\n</div>\r\n\t\t\t\t\t\t\t\t  \r\n\t\t  \r\n\t\t<div class=\"col-md-8 d-flex form-floating text-muted\">\r\n\t\t <i style=\"font-size:26px;\" class=\"fas fa-user prefix grey-text pt-2\"></i>\r\n\t\t<input class=\"form-control input-sm mt-1 ms-4\" style=\"height:10px;\" type=\"text\" id=\"username\" name=\"username\" value=\"";
            if ($fileexists) {
                goto b4780501e0066f25b56c7f1d3ff33b99;
            }
            echo "admin";
            b4780501e0066f25b56c7f1d3ff33b99:
            echo "\" autocomplete=\"nope\" placeholder=\"Username\" required  ";
            if ($fileexists) {
                goto Ea6baa4b5699c8f8f608c7b0ac54c4c6;
            }
            echo "readonly";
            Ea6baa4b5699c8f8f608c7b0ac54c4c6:
            echo "/> \r\n\t\t<label class=\"pt-2 ms-5\" for=\"username\" style=\"padding-left:20px;\">";
            echo _TEXT["USER"];
            echo "</label>\r\n\t\t</div>\r\n\r\n\t\t\r\n\t\t<div class=\"col-md-8 d-flex form-floating text-muted pt-4 \">\r\n\t\t <i style=\"font-size:26px;\" class=\"fas fa-lock prefix grey-text pt-2\"></i>\r\n\t\t<input class=\"form-control input-sm mt-1 ms-4\"  style=\"height:10px;\" type=\"password\" id=\"idpassword\" name=\"mypassword\" value=\"\" placeholder=\"Password\" required  autocomplete=\"new-password\"/> \r\n\t\t<label class=\"pt-2 mt-4 ms-5\" for=\"mypassword\" style=\"padding-left:20px;\">";
            echo _TEXT["PASSWORD"];
            echo "</label>\r\n\t\t</div>\r\n\t\t\r\n\t\t";
            if (!(!$fileexists || $action == "adduser")) {
                goto ede748de0fb19618a153550790f94b67;
            }
            echo "\t\t<div class=\"col-md-8 d-flex form-floating text-muted pt-4 \">\r\n\t\t <i style=\"font-size:26px;\" class=\"fas fa-unlock-alt prefix grey-text pt-2\"></i>\r\n\t\t<input class=\"form-control input-sm mt-1 ms-4\"  style=\"height:10px;\" type=\"password\" id=\"confirmpassword\" name=\"confirmpassword\" value=\"\" placeholder=\"confirmpassword\" required /> \r\n\t\t<label class=\"pt-2 mt-4 ms-5\" for=\"confirmpassword\" style=\"padding-left:20px;\">";
            echo _TEXT["CONFIRMPASSWORD"];
            echo "</label>\r\n\t\t</div>\r\n\t\t";
            ede748de0fb19618a153550790f94b67:
            echo "\t\t\r\n\t\t\r\n\t\t<div class=\"col-md-8 d-flex text-muted  pb-4 pt-4 ms-4 form-check\">\r\n\t\t";
            if (!($action != "adduser")) {
                goto e03caa29fd67c1151762f025b28ef1d1;
            }
            echo "\t\t<input class=\"form-check-input ms-4\" type=\"checkbox\" value=\"yes\" id=\"remember\" name=\"remember\"  checked/>\r\n\t\t<label class=\"form-check-label ps-2\" for=\"remember\">";
            echo _TEXT["REMEMBER"];
            echo "</label>\r\n\t\t";
            e03caa29fd67c1151762f025b28ef1d1:
            echo "\t\t</div>\r\n\t\t\r\n\t\t<input type=\"hidden\" value=\"";
            echo $action;
            echo "\"  name=\"action\" />\r\n\t\t\r\n      </div>\r\n\t \r\n      <div class=\"modal-footer modal-login-footer d-flex justify-content-center \">\r\n        <button type=\"submit\" class=\"btn btn-primary w-50 mb-2\">";
            if ($action == "adduser") {
                echo _TEXT["ADDUSER"];
                goto F7bd3df6863823192e25301dcfde9c3a;
            }
            echo _TEXT["LOGIN"];
            F7bd3df6863823192e25301dcfde9c3a:
            echo "</button>\r\n      </div>\r\n    </div>\r\n\r\n  </div>\r\n  </form>\r\n</div>\r\n</div>\r\n<script>\r\n\r\n\t var myModal = new bootstrap.Modal(document.getElementById('login'), {\r\n\t\t  keyboard: false\r\n\t\t})\r\n\t\t\r\n\tmyModal.show();\r\n\t\t\r\n\t\r\n\t\r\n\t\$(document).ready(function(){\r\n\t\t\r\n\r\n\r\n        \$('#loginform').on('submit', function (e) {\r\n            e.preventDefault();\r\n\t\t\t\r\n\t\t\t";
            if (!(!$fileexists || $action == "adduser")) {
                goto c5d29788918d7e66ba87cb2d0dc9bef7;
            }
            echo "\t\t\tif( (\$('#idpassword').val()) === (\$('#confirmpassword').val())  ){\r\n\t\t\t\t//\r\n\t\t\t} else {\r\n\t\t\t\t\$(\"#login-message\").html('<div class=\"alert alert-danger alert-dismissable col d-flex p-4\"><div class=\"position-absolute top-0 start-0 p-2\"><strong>";
            echo _TEXT["PASSWORDMISMATCH"];
            echo "</strong> </div><button type=\"button\" class=\"btn-close position-absolute top-0 end-0 p-2\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>'); \r\n\t\t\t\t return false;\r\n\t\t\t}\r\n\t\t\t";
            c5d29788918d7e66ba87cb2d0dc9bef7:
            echo "\r\n\t\$.ajax({\r\n    url : \"login.php\",\r\n    type: \"POST\",\r\n    data : new FormData(this),\r\n    processData: false,\r\n    contentType: false,\r\n    success:function(data, textStatus, jqXHR){\r\n\r\n\t\t   \r\n\t   if (data=='\"usercreated\"') {\r\n\t\t  \$(\"#login-message\").html('<div class=\"alert alert-success alert-dismissable col d-flex p-4\"><div class=\"position-absolute top-0 start-0 p-2\"><strong>";
            echo _TEXT["USERADDED"];
            echo "</strong> </div><button type=\"button\" class=\"btn-close position-absolute top-0 end-0 p-2\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>'); \r\n\t   } else {\r\n\t\t   if (data=='\"error\"') {\r\n\t\t\t  \$(\"#login-message\").html('<div class=\"alert alert-danger alert-dismissable col d-flex p-4\"><div class=\"position-absolute top-0 start-0 p-2\"><strong>";
            echo _TEXT["INVALIDPASSWORD"];
            echo "</strong> </div><button type=\"button\" class=\"btn-close position-absolute top-0 end-0 p-2\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>'); \r\n\t\t   } else {\r\n\t\t   if (data=='\"userexceed\"') {\r\n\t\t\t   \$(\"#login-message\").html('<div class=\"alert alert-danger alert-dismissable col d-flex p-4\"><div class=\"position-absolute top-0 start-0 p-2\"><strong>";
            echo _TEXT["USEREXCEED"];
            echo "</strong> </div><button type=\"button\" class=\"btn-close position-absolute top-0 end-0 p-2\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>'); \r\n\t\t   } else {\r\n\t\t   if (data=='\"duplicate\"') {\r\n\t\t\t  \$(\"#login-message\").html('<div class=\"alert alert-danger alert-dismissable col d-flex p-4\"><div class=\"position-absolute top-0 start-0 p-2\"><strong>";
            echo _TEXT["DUPLICATEUSER"];
            echo "</strong> </div><button type=\"button\" class=\"btn-close position-absolute top-0 end-0 p-2\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');\r\n\t\t\t} else {\r\n\t\t\t\twindow.location.href = window.location.href;\r\n\t\t\t\t}\r\n\t\t\t}\r\n\t\t   }\r\n\t   }\r\n\t\t\t},\r\n\t\t\terror: function(jqXHR, textStatus, errorThrown){\r\n\t\t\t\t\$(\"#login-message\").html(data);     \r\n\t\t\t}\r\n\t\t});\r\n\r\n       });\r\n    });\r\n\t\r\n</script>\r\n";
        }
        echo "\r\n<script>\r\nfunction changeVideo(vId){\r\n\t\r\n  \$(\"#youtube\").on(\"hidden.bs.modal\",function(){\r\n    \$(\"#iframeYoutube\").attr(\"src\",\"#\");\r\n  })\r\n\t\r\n  var iframe=document.getElementById(\"iframeYoutube\");\r\n  iframe.src=\"https://www.youtube.com/embed/\"+vId;\r\n\r\n  \$(\"#youtube\").modal(\"show\");\r\n\r\n}";
        if (!($xmlinfo->takeatour == "true")) {
            goto A580917c9812679b15e6f101ba18b191;
        }
        if (!empty($_SESSION["tower_showed"])) {
            goto fb4dae9eee337d97b8aa36f610410196;
        }
        echo "\$(window).on('load',function(){\r\n\t\t\t//\$('#takeatour').modal({backdrop: 'static', keyboard: false});\r\n\t\t\tshowmodal('takeatour');\r\n\t\t});";
        fb4dae9eee337d97b8aa36f610410196:
        A580917c9812679b15e6f101ba18b191:
        echo "\r\n\r\nfunction showhidefilterf(){\r\n\t if (\$(\"#showhidefilter\").val() === \"hide\") {\r\n\t\t \$(\"#showhidefilter\").val(\"show\");\r\n\t\t \$(\"#showhide-filterid\").show(100);\r\n\t\t \$(\"#filter-icon\").removeClass(\"fa-toggle-off\");\r\n\t\t \$(\"#filter-icon\").addClass(\"fa-toggle-on\");\r\n\t } else {\r\n\t\t \$(\"#showhidefilter\").val(\"hide\");\r\n\t\t \$(\"#showhide-filterid\").hide(100);\r\n\t\t \$(\"#filter-icon\").removeClass(\"fa-toggle-on\");\r\n\t\t \$(\"#filter-icon\").addClass(\"fa-toggle-off\");\r\n\t }\r\n}\r\n\r\n\r\n";
        echo "</script>";
        include "bottom.php";
        echo "\r\n";
        // [PHPDeobfuscator] Implied script end
        return;
    }
    include "dashboard.php";
    echo "\t\t<script>\r\n\t\tdocument.getElementById(\"close_preview\").style.display = \"inline-block\"; \r\n\t\tdocument.getElementById(\"export_image\").style.display = \"inline-block\"; \r\n\t\tdocument.getElementById(\"print\").style.display = \"inline-block\"; \r\n\t\t\r\n\t\tdocument.getElementById(\"previewhide\").style.display = \"none\"; \r\n\t\tdocument.getElementById(\"sampledata_button\").style.display = \"none\";\r\n\r\n\t\t \$(\".btn-primary\").prop('disabled', true);\r\n\t\t \$(\".dropdown-toggle\").prop('disabled', true);\r\n\r\n\t\t\$.getScript(\"../assets/js/html2canvas.min.js\");\t\r\n\t\t\r\n\t\t\r\n\t\t</script>\r\n\t\t\r\n\t\t\r\n\t\t";
    include "bottom.php";
    die;
}
echo "<div class=\"col-md-1 col-xs-1 col-lg-1\" style=\"padding:0;\"><div id=\"grids\" style=\"text-align:center;\"><mylabel>col-";
echo $x;
echo "</mylabel></div></div>\r\n";
$x++;
goto fdbc9b142c5a1cce1d816663a500970e;
