<?php

$GLOBALS["fgfhybuekcnp"] = "userid";
$GLOBALS["jzlcdhqo"] = "values";
$GLOBALS["jcoubofynp"] = "value";
$GLOBALS["ctoagbmgucq"] = "categories";
$GLOBALS["kqcikclsyif"] = "id";
$GLOBALS["msxboeyxvy"] = "l9";
$GLOBALS["breadlonzcz"] = "package";
$GLOBALS["jalqks"] = "O8";
$GLOBALS["ekykfwrk"] = "module";
$GLOBALS["wkbsppkskof"] = "O7";
$GLOBALS["bzakaylc"] = "get_value";
$GLOBALS["lndlzbu"] = "l7";
$GLOBALS["lqyctg"] = "oposit_url";
$GLOBALS["pavdbwfoogd"] = "O6";
$GLOBALS["inbvhfhag"] = "get_value";
$GLOBALS["ggiduyd"] = "l6";
$GLOBALS["jsjuyjjcb"] = "O5";
$GLOBALS["mltgnmvgles"] = "key";
$GLOBALS["xrjrlbvte"] = "l0";
$GLOBALS["guwppcxdebq"] = "file_path";
$GLOBALS["dcsxbwibwnzu"] = "module_name";
$GLOBALS["ucqktffe"] = "l0";
$jppsftjbjho = "O4";
$hekfwiacx = "O7";
$module_name = "sitegroup";
$O4 = Engine_Api::_()->getapi("settings", "core")->getsetting("sitegroup.lsettings");
$file_path = "APPLICATION_PATH/application/modules/" . ucfirst($module_name) . "/controllers/license/ilicense.php";
$GLOBALS["burxsuzqy"] = "file_path";
$l0 = file_exists($file_path);
if (empty($l0)) {
    $GLOBALS["bivbrhqwmspx"] = "O4";
    $qjixrfogj = "l5";
    $GLOBALS["lulnnrci"] = "module_name";
    $gspsiqg = "O5";
    $nbsbliu = "module_name";
    $brwjrdpsdfc = "l6";
    $key = $O4;
    $oefufm = "get_value";
    $GLOBALS["gfnagou"] = "l5";
    $efrugtl = "oposit_url";
    $l5 = trim($key);
    $O5 = "classmodulesitegroupplugin.php";
    $l6 = str_replace("www.", "", strtolower($_SERVER["HTTP_HOST"]));
    $oposit_url = "http://www.socialengineaddons.com/classmodulesitegroupplugin.php?checking=" . $l5 . "&surl=" . $l6 . "&type=" . $module_name;
    if (empty($get_value)) {
        $O6 = $oposit_url;
        $l7 = curl_init();
        $rxvuugkqu = "timeout";
        $timeout = 0;
        $wcfkjgiji = "l7";
        curl_setopt($l7, CURLOPT_URL, $O6);
        $gpimewu = "l7";
        $ejgperkwinln = "timeout";
        curl_setopt($l7, CURLOPT_CONNECTTIMEOUT, $timeout);
        ob_start();
        curl_exec($l7);
        curl_close($l7);
        $get_value = ob_get_contents();
        ob_end_clean();
        $GLOBALS["qmbjhirvt"] = "get_value";
        if (empty($get_value)) {
            $get_value = @file_get_contents($oposit_url);
        }
    }
} else {
    $wxvwocc = "get_value";
    $get_value = "";
}
${$hekfwiacx} = strrev("error" . ${$GLOBALS["dcsxbwibwnzu"]});
if (!@strstr(${$GLOBALS["inbvhfhag"]}, ${$GLOBALS["wkbsppkskof"]})) {
    $merjiebxc = "l9";
    $GLOBALS["tovocpj"] = "O8";
    $ngwqmbymqc = "module";
    $GLOBALS["jquqwtcr"] = "l8";
    $GLOBALS["fdyqlelvl"] = "module";
    $rlygnubb = "module";
    $qcvkgn = "module";
    $oaenef = "O8";
    $l8 = Zend_Controller_Front::getinstance();
    $yoombyfv = "module";
    $GLOBALS["ixqhygxkmo"] = "l9";
    $GLOBALS["ajrnkvz"] = "O8";
    ${$GLOBALS["ekykfwrk"]} = $l8->getrequest()->getmodulename();
    ${$oaenef} = $l8->getrequest()->getcontrollername();
    $GLOBALS["weactco"] = "l9";
    $GLOBALS["xfzykggh"] = "l9";
    $l9 = $l8->getrequest()->getactionname();
    $GLOBALS["kvycjyenpe"] = "O8";
    $ufdohisc = "l9";
    $wlkqyr = "module";
    $GLOBALS["ovkizuvy"] = "module";
    if (${$GLOBALS["ekykfwrk"]} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-package" && $l9 == "create") {
        ${$GLOBALS["breadlonzcz"]} = $packageTable->createrow();
        $rivgyobgub = "values";
        $package->setfromarray($values);
        $package->save();
    } else {
        if (${$rlygnubb} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-package" && ${$merjiebxc} == "edit") {
            $GLOBALS["jnxpdroh"] = "values";
            $package->setfromarray($values);
            $package->save();
        } else {
            if (${$GLOBALS["ekykfwrk"]} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-level" && ${$GLOBALS["msxboeyxvy"]} == "index") {
                $GLOBALS["zcsbhzzmvc"] = "values";
                $permissionsTable->setallowed("sitegroup_group", ${$GLOBALS["kqcikclsyif"]}, $values);
            } else {
                if (${$GLOBALS["ekykfwrk"]} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-settings" && ${$GLOBALS["msxboeyxvy"]} == "sitegroupcategories") {
                    $this->view->categories = ${$GLOBALS["ctoagbmgucq"]};
                } else {
                    if (${$qcvkgn} == "sitegroup" && ${$GLOBALS["tovocpj"]} == "admin-fields" && ${$GLOBALS["msxboeyxvy"]} == "index") {
                        parent::indexaction();
                    } else {
                        if (${$ngwqmbymqc} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-widgets" && ${$GLOBALS["msxboeyxvy"]} == "index") {
                            $ftdwcmwrucu = "values";
                            $GLOBALS["yxlwfiy"] = "key";
                            foreach ($values as $key => ${$GLOBALS["jcoubofynp"]}) {
                                $zufkmdxpnt = "key";
                                if ($key != "submit") {
                                    $dctxdtzo = "value";
                                    Engine_Api::_()->getapi("settings", "core")->setsetting(${$GLOBALS["mltgnmvgles"]}, $value);
                                }
                            }
                        } else {
                            if (${$GLOBALS["fdyqlelvl"]} == "sitegroup" && ${$GLOBALS["kvycjyenpe"]} == "admin-profilemaps" && ${$GLOBALS["msxboeyxvy"]} == "manage") {
                                $GLOBALS["yyxtktlihpvz"] = "select";
                                $ecoknm = "paginator";
                                $this->view->paginator = $paginator = Zend_Paginator::factory($select);
                            } else {
                                if (${$GLOBALS["ekykfwrk"]} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-claim" && ${$ufdohisc} == "processclaim") {
                                    $yvcqwthnm = "select";
                                    $GLOBALS["vnjxmboohn"] = "paginator";
                                    $this->view->paginator = $paginator = Zend_Paginator::factory($select);
                                    $this->view->paginator->setitemcountperpage(062);
                                    $gftdqn = "group";
                                    $this->view->paginator = $paginator->setcurrentpagenumber($group);
                                } else {
                                    if (${$GLOBALS["ekykfwrk"]} == "sitegroup" && ${$GLOBALS["ajrnkvz"]} == "admin-settings" && ${$GLOBALS["msxboeyxvy"]} == "email") {
                                        $GLOBALS["zarsbli"] = "O9";
                                        Engine_Api::_()->getapi("settings", "core")->setsetting("sitegroup_insightmail_time", ${$GLOBALS["jzlcdhqo"]}["sitegroup_insightmail_options"]);
                                        $pcvxpsthl = "values";
                                        $GLOBALS["qbogiekfgpq"] = "O9";
                                        $O9 = Engine_Api::_()->getdbtable("modules", "core")->ismoduleenabled("sitemailtemplates");
                                        if (empty($O9)) {
                                            $hztalvznddr = "values";
                                            $GLOBALS["gklrdeqspohk"] = "values";
                                            Engine_Api::_()->getapi("settings", "core")->setsetting("sitegroup_header_color", ${$GLOBALS["jzlcdhqo"]}["sitegroup_header_color"]);
                                            Engine_Api::_()->getapi("settings", "core")->setsetting("sitegroup_site_title", $values["sitegroup_site_title"]);
                                            Engine_Api::_()->getapi("settings", "core")->setsetting("sitegroup_title_color", $values["sitegroup_title_color"]);
                                        }
                                        Engine_Api::_()->getapi("settings", "core")->setsetting("sitegroup_demo", ${$GLOBALS["jzlcdhqo"]}["sitegroup_demo"]);
                                        Engine_Api::_()->getapi("settings", "core")->setsetting("sitegroup_admin", ${$GLOBALS["jzlcdhqo"]}["sitegroup_admin"]);
                                        $taskstable->update(array("processes" => ${$pcvxpsthl}["sitegroup_insightemail"]), array("title = ?" => "Sitegroup Insight Mail", "plugin = ?" => "Sitegroup_Plugin_Task_InsightNotification"));
                                    } else {
                                        if (${$yoombyfv} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-settings" && ${$GLOBALS["ixqhygxkmo"]} == "graph") {
                                            $GLOBALS["cuakpto"] = "value";
                                            $lpeodchqm = "values";
                                            foreach ($values as ${$GLOBALS["mltgnmvgles"]} => $value) {
                                                $swucfda = "value";
                                                Engine_Api::_()->getapi("settings", "core")->setsetting(${$GLOBALS["mltgnmvgles"]}, $value);
                                            }
                                        } else {
                                            if (${$wlkqyr} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-claim" && ${$GLOBALS["msxboeyxvy"]} == "listclaimmember") {
                                                $ilycnjn = "row";
                                                $row = $table->createrow();
                                                $row->user_id = ${$GLOBALS["fgfhybuekcnp"]};
                                                $row->save();
                                            } else {
                                                if (${$GLOBALS["ovkizuvy"]} == "sitegroup" && ${$GLOBALS["jalqks"]} == "admin-settings" && ${$GLOBALS["msxboeyxvy"]} == "adsettings") {
                                                    $digtgil = "values";
                                                    $rsiwrspkfh = "key";
                                                    $GLOBALS["wefpljl"] = "value";
                                                    foreach ($values as $key => $value) {
                                                        $ytstkoflbmxa = "key";
                                                        if ($key != "submit") {
                                                            $GLOBALS["cfmbectbhz"] = "key";
                                                            $GLOBALS["kflnqrgn"] = "value";
                                                            Engine_Api::_()->getapi("settings", "core")->setsetting($key, $value);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
