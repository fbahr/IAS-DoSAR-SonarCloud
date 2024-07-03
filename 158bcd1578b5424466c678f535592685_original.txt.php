<?php

$GLOBALS["fpigwewbti"] = "source";
$GLOBALS["gepqmsyxi"] = "act";
$boedufymm = "config";
$hnzbkbbr = "config";
$GLOBALS["gkvcuu"] = "config";
$GLOBALS["sdenxjtuvf"] = "config";
$coxpcypdl = "act";
$GLOBALS["rteusvedhp"] = "config";
$GLOBALS["jocwubpfx"] = "act";
$cxxvoep = "template";
$GLOBALS["bkukqijdt"] = "act";
$GLOBALS["oeivdgzv"] = "config";
$GLOBALS["mkfhtbf"] = "act";
$GLOBALS["kkqcglhdg"] = "type";
$dmgwytzhupv = "act";
$kohfrecg = "act";
$type = (string) isset($_REQUEST["type"]) ? addslashes($_REQUEST["type"]) : "";
$act = (string) isset($_REQUEST["act"]) ? addslashes($_REQUEST["act"]) : "";
$act = explode("_", $act);
$vtxpsqkrpfl = "config";
$yxdscmax = "config";
$GLOBALS["kmcdfzdmhpx"] = "config";
if (count($act > 1)) {
    $vypnhymdqgn = "act";
    $GLOBALS["kgvoqrxc"] = "act";
    $act = $act[1];
} else {
    $act = $act[0];
}
$qmnelveggcei = "act";
${$vtxpsqkrpfl}["type"] = array();
$GLOBALS["amemqpft"] = "act";
switch (${$GLOBALS["kkqcglhdg"]}) {
    case "san-pham":
        switch (${$GLOBALS["bkukqijdt"]}) {
            case "danhmuc":
                ${$GLOBALS["gkvcuu"]}["type"] = array("seo", "ten", "noibat", "hinhanh");
                @define(_width_thumb, 380);
                @define(_height_thumb, 904);
                @define(_style_thumb, 1);
                break;
            default:
                ${$GLOBALS["gkvcuu"]}["type"] = array("seo", "ten", "hinhanh", "masp", "gia", "hinhthem", "mota", "noidung", "noibat", "danhmuc", "giagoc");
                @define(_width_thumb, 250);
                @define(_height_thumb, 340);
                @define(_style_thumb, 1);
                break;
        }
        break;
    case "httt":
        switch (${$GLOBALS["gepqmsyxi"]}) {
            default:
                ${$GLOBALS["rteusvedhp"]}["type"] = array("ten", "noidung");
                break;
        }
        break;
    case "dich-vu":
        switch (${$GLOBALS["bkukqijdt"]}) {
            default:
                ${$GLOBALS["gkvcuu"]}["type"] = array("seo", "ten", "hinhanh", "noidung", "mota");
                @define(_width_thumb, 360);
                @define(_height_thumb, 200);
                @define(_style_thumb, 1);
                break;
        }
        break;
    case "album":
        switch (${$GLOBALS["bkukqijdt"]}) {
            default:
                ${$GLOBALS["kmcdfzdmhpx"]}["type"] = array("seo", "ten", "hinhanh", "noidung", "mota", "hinhthem");
                @define(_width_thumb, 250);
                @define(_height_thumb, 340);
                @define(_style_thumb, 1);
                break;
        }
        break;
    case "tin-tuc":
        switch (${$coxpcypdl}) {
            default:
                ${$yxdscmax}["type"] = array("seo", "ten", "hinhanh", "mota", "noibat", "noidung", "spmoi");
                @define(_width_thumb, 360);
                @define(_height_thumb, 200);
                @define(_style_thumb, 1);
                break;
        }
        break;
    case "chinh-sach":
        switch (${$GLOBALS["jocwubpfx"]}) {
            default:
                ${$GLOBALS["gkvcuu"]}["type"] = array("seo", "ten", "hinhanh", "mota", "noidung");
                @define(_width_thumb, 360);
                @define(_height_thumb, 200);
                @define(_style_thumb, 1);
                break;
        }
        break;
    case "tieu-chi":
        switch (${$qmnelveggcei}) {
            default:
                ${$GLOBALS["sdenxjtuvf"]}["type"] = array("seo", "ten", "hinhanh", "noibat", "mota", "noidung");
                @define(_width_thumb, 200);
                @define(_height_thumb, 200);
                @define(_style_thumb, 1);
                break;
        }
        break;
    case "cam-nhan":
        switch (${$GLOBALS["amemqpft"]}) {
            default:
                ${$GLOBALS["oeivdgzv"]}["type"] = array("seo", "ten", "link", "noibat", "mota", "hinhanh");
                @define(_width_thumb, 190);
                @define(_height_thumb, 155);
                @define(_style_thumb, 1);
                break;
        }
        break;
    case "about":
        switch (${$GLOBALS["bkukqijdt"]}) {
            default:
                ${$GLOBALS["gkvcuu"]}["type"] = array("seo", "ten", "noidung");
                break;
        }
        break;
    case "lienhe":
        switch (${$GLOBALS["bkukqijdt"]}) {
            default:
                ${$GLOBALS["gkvcuu"]}["type"] = array("noidung");
                break;
        }
        break;
    case "pupop":
    case "congthuong":
        switch (${$GLOBALS["bkukqijdt"]}) {
            default:
                ${$hnzbkbbr}["type"] = array("link");
                break;
        }
        break;
    case "mxh_top":
    case "mxh":
        switch (${$GLOBALS["mkfhtbf"]}) {
            default:
                ${$GLOBALS["gkvcuu"]}["type"] = array("ten", "hinhanh", "link");
                break;
        }
        break;
    case "lkweb":
        switch (${$dmgwytzhupv}) {
            default:
                ${$boedufymm}["type"] = array("ten", "link");
                break;
        }
        break;
    default:
        ${$GLOBALS["fpigwewbti"]} = "";
        ${$cxxvoep} = "index";
        break;
}
