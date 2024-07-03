<?php

use Drupal\user\Entity\User;
use Drupal\Core\Form\FormState;
use Drupal\ldap_auth\Utilities;
use Drupal\ldap_auth\LDAPLOGGERS;
use Drupal\Component\Utility\Html;
use Drupal\ldap_auth\LDAPFlow\LDAPClass;
use Drupal\Core\Form\FormStateInterface;
use Drupal\ldap_auth\LDAPDirectory\FreeIPA;
use Drupal\ldap_auth\Mo_Ldap_Auth_Response;
use Drupal\ldap_auth\LDAPDirectory\OpenLDAP;
use Drupal\ldap_auth\MiniorangeLDAPConstants;
use Drupal\ldap_auth\LDAPDirectory\ActiveDirectory;
use Drupal\Core\Password\PasswordGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\ldap_auth\Controller\miniorange_ldapController;
function ldap_auth_update_projects_alter(&$sQ)
{
}
function ldap_auth_cron()
{
    $CR = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_import_at_cron");
    $Cf = Utilities::updateDue();
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    if (!($Cf && $j9)) {
        goto Fp;
    }
    Utilities::import();
    Fp:
}
function ldap_auth_update_status_alter(&$sQ)
{
    $form = array();
    $form_state = array();
    if (!Utilities::isCustomerRegistered($form, FALSE)) {
        $s2 = Drupal::config("ldap_auth.settings");
        $o5 = Drupal::service("extension.list.module")->getExtensionInfo("ldap_auth");
        $W8 = $o5["version"];
        $BJ = $sQ["ldap_auth"]["recommended"] ?? 99.98999999999999;
        if (is_null($s2->get("miniorange_ldap_auth_licenseExpiry"))) {
            goto mh;
        }
        $Oj = strtotime($s2->get("miniorange_ldap_auth_licenseExpiry"));
        if (!(isset($sQ["ldap_auth"]) && $Oj !== false && $Oj < time() && strcmp($W8, $BJ) != 0)) {
            goto K_;
        }
        if (!(time() - $s2->get("mo_last_license_fetch_time") >= 86400)) {
            goto jP;
        }
        miniorange_ldapController::moLDAPLicenseFetch(false);
        jP:
        $Oj = strtotime($s2->get("miniorange_ldap_auth_licenseExpiry"));
        if (!($Oj !== false && $Oj < time())) {
            goto Vq;
        }
        Drupal::messenger()->addError("Your license is expired. You need to renew your license.");
        Vq:
        K_:
        mh:
        // [PHPDeobfuscator] Implied return
        return;
    }
    return;
}
function ldap_auth_user_presave($vo)
{
    $sb = \Drupal::request()->getSession();
    $eu = $sb->get("mo_ldap");
    $C3 = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_ldap");
    $kP = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_update_user_info");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    if (!($C3 && $kP && $j9 && !$vo->hasRole("anonymous") && $eu != "true")) {
        goto xT;
    }
    $wm = $vo->get("uid")->value;
    $Rb = User::load($wm);
    if (!$Rb) {
        goto Xi;
    }
    $RI = $Rb->getEmail();
    \Drupal::configFactory()->getEditable("ldap_auth.settings")->set("user_email_before_account_save", $RI)->save();
    $SW = $Rb->getRoles();
    \Drupal::configFactory()->getEditable("ldap_auth.settings")->set("user_roles_before_account_save", json_encode($SW))->save();
    Xi:
    xT:
}
function ldap_auth_user_update($vo)
{
    $sb = \Drupal::request()->getSession();
    $eu = $sb->get("mo_ldap");
    $C3 = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_ldap");
    $kP = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_update_user_info");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    if (!($j9 && $C3 && $kP && $eu != "true")) {
        goto jt;
    }
    $RI = Drupal::config("ldap_auth.settings")->get("user_email_before_account_save");
    $Tn = $vo->getEmail();
    $ZS = $Tn;
    if (!($RI != $Tn)) {
        goto c4;
    }
    $ZS = $RI;
    c4:
    $SW = Drupal::config("ldap_auth.settings")->get("user_roles_before_account_save");
    $SW = json_decode($SW);
    $cp = $vo->getRoles();
    $Ph = array_diff($SW, $cp);
    $vs = array_diff($cp, $SW);
    Utilities::userRoleMappingDrupalToLDAP($ZS, $Ph, $vs);
    Utilities::userAttributeMappingDrupalTOLDAP($ZS, $vo);
    jt:
}
function ldap_auth_user_insert($vo)
{
    $Jo = Drupal::config("ldap_auth.settings")->get("create_user_in_ldap");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    $sb = \Drupal::request()->getSession();
    $eu = $sb->get("mo_ldap");
    if (!($j9 && $Jo && $eu != "true")) {
        goto Vb;
    }
    $P2 = new LDAPClass();
    $VS = $P2::getConnection();
    if ($VS) {
        $IY = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_search_base");
        $B9 = explode(";", $IY);
        $Bt = \Drupal::config("ldap_auth.settings")->get("miniorange_ldap_server_account_username");
        $hd = \Drupal::config("ldap_auth.settings")->get("miniorange_ldap_server_account_password");
        $S2 = null;
        $zC = null;
        $z4 = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_directory");
        if ($z4 == "open_ldap") {
            $g2 = new OpenLDAP();
            // [PHPDeobfuscator] Implied goto
            goto aL;
        }
        if ($z4 == "freeipa") {
            $g2 = new FreeIPA();
            // [PHPDeobfuscator] Implied goto
            goto E2;
        }
        $g2 = new ActiveDirectory();
        E2:
        aL:
        $Gt = $g2->getAttributesSet();
        $n_ = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_user_dn_format");
        if (empty($n_)) {
            goto Wr;
        }
        $zC[$n_] = $vo->get("name")->value;
        Wr:
        foreach ($Gt as $ln) {
            if (!($ln == "useraccountcontrol")) {
                if (!($ln == "mail")) {
                    $zC[$ln] = $vo->get("name")->value;
                    // [PHPDeobfuscator] Implied goto
                    goto nr;
                }
                $zC[$ln] = $vo->get("mail")->value;
                goto nr;
            }
            $zC[$ln] = 512;
            nr:
        }
        $Nj = Utilities::makeLDAPDrupalAttributePair($vo);
        $zC = array_replace($zC, $Nj);
        $g2->setObjectClasses($zC);
        $RA = $n_ . "=" . $zC[$n_] . "," . $B9[0];
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_SYNC_CREATE, "User : [ " . $vo->getEmail() . " ] - User attribute set: ", $zC);
        $zY = @ldap_bind($VS, $Bt, $hd);
        if ($zY) {
            $EZ = @ldap_add($VS, $RA, $zC);
            $oV = ldap_error($VS);
            $KJ = ldap_errno($VS);
            LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_SYNC_CREATE, "User : [ " . $vo->getEmail() . " ] - User status: (" . $KJ . ") " . $oV);
            if ($KJ) {
                goto oC;
            }
            $sR = Drupal::config("ldap_auth.settings")->get("provision_user_password");
            $UM = !is_null(Drupal::config("ldap_auth.settings")->get("miniorange_ldap_server")) && substr(Drupal::config("ldap_auth.settings")->get("miniorange_ldap_server"), 0, 5) == "ldaps";
            LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_SYNC_CREATE, "User : [ " . $vo->getEmail() . " ] - User password = " . $sR . " , ldaps configured = " . $UM);
            if ($UM && !empty($sR)) {
                $S2[$g2->getPasswordAttribute()] = $g2->setPassword($sR);
                $EZ = ldap_modify($VS, $RA, $S2);
                $oV = ldap_error($VS);
                $KJ = ldap_errno($VS);
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_SYNC_CREATE, "User : [ " . $vo->getEmail() . " ] - User Password status: (" . $KJ . ") " . $oV . " , <i>User-password-attribute entry: </i>", $S2);
                // [PHPDeobfuscator] Implied goto
                goto ZB;
            }
            LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_SYNC_CREATE, "User : Password NOT set - ( Password is empty or LDAPS is not set ).");
            ZB:
            Drupal::configFactory()->getEditable("ldap_auth.settings")->clear("provision_user_password")->save();
            // [PHPDeobfuscator] Implied goto
            goto oC;
        }
        $oV = ldap_error($VS);
        $KJ = ldap_errno($VS);
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_SYNC_CREATE, "CREATE : [ " . $vo->getEmail() . " ] - (" . $KJ . ") " . $oV);
        oC:
        ldap_close($VS);
        // [PHPDeobfuscator] Implied goto
        goto Rk;
    }
    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_SYNC_CREATE, "CREATE - ldap_connection Failed.");
    Rk:
    Vb:
}
function ldap_auth_form_alter(&$form, &$form_state, $mf)
{
    $C3 = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_ldap");
    $Dn = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_password_sync");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    if (!($C3 && $Dn && $j9)) {
        goto xA;
    }
    if (!$form_state->get("user_pass_reset")) {
        goto cY;
    }
    $form["actions"]["submit"]["#submit"][] = "ldap_auth_pass_reset_submit";
    cY:
    xA:
    if (!(!Drupal::currentUser()->isAuthenticated() && $C3 && !Utilities::isCustomerRegistered($form, FALSE))) {
        goto hM;
    }
    if (!($mf == "user_login_block" || $mf == "user_login" || $mf == "user_login_form")) {
        goto Kj;
    }
    array_unshift($form["#validate"], "ldap_auth_form_alter_submit");
    Kj:
    hM:
}
function ldap_auth_form_alter_submit(&$form, &$form_state)
{
    global $base_url;
    $s2 = Drupal::config("ldap_auth.settings");
    $er = $s2->get("ldap_auth_upgrade_url");
    if (!(is_null($er) || empty($er) || strpos($er, "/moas/api/plugin/drupalJoomlaUpdate/") === FALSE)) {
        goto L1;
    }
    Utilities::createUpgradeURL();
    L1:
    $MR = Html::escape($_POST["name"]);
    $wz = $_POST["pass"];
    $user = '';
    $OZ = '';
    $Fz = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_authentication");
    $qq = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_email_attribute");
    $P2 = new LDAPClass();
    $Ef = $P2::ldap_login($MR, $wz);
    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "User = {$MR}", $Ef, "ldap_auth_form_alter_submit");
    if ($Ef->statusMessage == "SUCCESS") {
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, $MR . "=> In the Success block. And trying to load account by User name", '', "ldap_auth_form_alter_submit");
        $vo = user_load_by_name($MR);
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Account load by USERNAME " . $MR, is_bool($vo) ? "account found" : "account not found", "ldap_auth_form_alter_submit");
        $rk = $s2->get("group_restriction");
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Enable group restriction ( {$rk} )", $MR, "ldap_auth_form_alter_submit");
        if (!$rk) {
            goto oO;
        }
        $Ur = $s2->get("selected_whitelist_blacklist_option");
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "selected Group restriction type ( {$Ur} )", $MR, "ldap_auth_form_alter_submit");
        if ($Ur == "whitelist") {
            $dR = $s2->get("whitelisted_groups");
            LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "White listed groups: [ {$MR} ]", $dR, "ldap_auth_form_alter_submit");
            if (!isset($dR)) {
                goto f5;
            }
            $We = false;
            foreach ($dR as $kp) {
                if (!(strpos(strtolower($Ef->userDn), strtolower($kp)) != false)) {
                }
                $We = true;
                goto ae;
            }
            ae:
            if (!(!$We && isset($Ef->profileAttributesList["memberof"]))) {
                goto zn;
            }
            $We = !empty(array_intersect($dR, $Ef->profileAttributesList["memberof"]));
            zn:
            if ($We) {
                goto zX;
            }
            $form_state->setErrorByName("name", t("Access Denied: You do not have permission to access this site. Please contact your system administrator for assistance."));
            return;
        }
        $MC = $s2->get("blacklisted_groups");
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Black listed groups: [ {$MR} ]", $MC, "ldap_auth_form_alter_submit");
        if (!isset($MC)) {
            goto VQ;
        }
        $We = true;
        foreach ($MC as $vn) {
            if (!(strpos(strtolower($Ef->userDn), strtolower($vn)) != false)) {
            }
            $We = false;
            goto tB;
        }
        tB:
        if (!($We && isset($Ef->profileAttributesList["memberof"]))) {
            goto pK;
        }
        $We = empty(array_intersect($MC, $Ef->profileAttributesList["memberof"]));
        pK:
        if ($We) {
            VQ:
            zX:
            f5:
            oO:
            $OZ = '';
            if (!empty($Ef->profileAttributesList[$qq])) {
                $OZ = $Ef->profileAttributesList[$qq];
                if (filter_var($OZ, FILTER_VALIDATE_EMAIL)) {
                    goto XE;
                }
                $OZ = $MR;
                XE:
                tz:
                if (!empty($vo)) {
                    goto Ne;
                }
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Trying to load account by Email : " . $OZ, '', "ldap_auth_form_alter_submit");
                $vo = user_load_by_mail($OZ);
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Account load by EMAIL : " . $OZ, is_bool($vo) ? "account found" : "account not found", "ldap_auth_form_alter_submit");
                Ne:
                $TT = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_auto_reg");
                if ($vo == NULL) {
                    if ($TT == 0) {
                        $Jt = explode(".", \Drupal::VERSION);
                        if ($Jt[0] == "10") {
                            $sp = \Drupal::service("password_generator")->generate(8);
                            // [PHPDeobfuscator] Implied goto
                            goto z3;
                        }
                        $sp = user_password(8);
                        z3:
                        $Eu = ["name" => $MR, "mail" => $OZ, "pass" => $sp, "status" => 1];
                        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Trying to create New Account ", $Eu, "ldap_auth_form_alter_submit");
                        $vo = User::create($Eu);
                        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "New Account Created ", $Eu, "ldap_auth_form_alter_submit");
                        $sb = \Drupal::request()->getSession();
                        $sb->set("mo_ldap", "true");
                        $vo->save();
                        $sb->remove("mo_ldap");
                        // [PHPDeobfuscator] Implied goto
                        goto MH;
                    }
                    $form_state->setErrorByName("name", t("The user does not exists in the Drupal database. Contact your administrator."));
                    return;
                }
                $vo = User::load($vo->id());
                MH:
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Attribute Mapping Values ", $Ef->profileAttributesList, "ldap_auth_form_alter_submit");
                Utilities::userAttributeMappingLDAPToDrupal($vo, $Ef->profileAttributesList);
                $V6 = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_list_attribute_machine");
                if (!(isset($V6) && !empty($V6))) {
                    goto nc;
                }
                Utilities::list_mapping($V6, $vo, $Ef->profileAttributesList);
                nc:
                $w2 = miniorange_ldapController::getUserAttributesValue($Ef->profileAttributesList);
                $jM = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_rolemapping");
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Enable Role Mapping ({$jM})", $w2, "ldap_auth_form_alter_submit");
                if (!$jM) {
                    goto uc;
                }
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Role Mapping Values ", $w2, "ldap_auth_form_alter_submit");
                Utilities::userRoleMappingLDAPToDrupal($vo, $w2);
                uc:
                $EG = Drupal::config("ldap_auth.settings")->get("enable_group_mapping");
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Enable Group Mapping ({$EG})", $w2, "ldap_auth_form_alter_submit");
                if (!$EG) {
                    goto Vm;
                }
                LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Group Mapping Values ", $w2, "ldap_auth_form_alter_submit");
                Utilities::userGroupMappingLDAPToDrupal($vo, $w2);
                Vm:
                if (!$vo->isBlocked()) {
                    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Finally trying to login the user [ {$MR} ]", $vo->getEmail(), "ldap_auth_form_alter_submit");
                    $sb = \Drupal::request()->getSession();
                    $sb->set("mo_ldap", "true");
                    $vo->save();
                    $sb->remove("mo_ldap");
                    $Vi = '';
                    $PH = [];
                    $PH["redirect"] = $base_url;
                    user_login_finalize($vo);
                    $XF = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_login_redirect");
                    if (!(!empty($XF) && trim($XF) != '')) {
                        goto J3;
                    }
                    $PH["redirect"] = trim($XF);
                    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "Redirecting the user [ {$MR} ]", $PH["redirect"], "ldap_auth_form_alter_submit");
                    J3:
                    $cw = new RedirectResponse($PH["redirect"]);
                    $mx = Drupal::request();
                    $mx->getSession()->save();
                    $cw->prepare($mx);
                    Drupal::service("kernel")->terminate($mx, $cw);
                    $cw->send();
                    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_LOGIN, "User Logged IN [ {$MR} ]", '', "ldap_auth_form_alter_submit");
                    exit;
                }
                $form_state->setErrorByName("name", t("<strong>BLOCKED USER :</strong> User not allowed to logged in."));
                return;
            }
            if (!filter_var($MR, FILTER_VALIDATE_EMAIL)) {
                $OZ = $MR;
                goto tz;
            }
            $form_state->setErrorByName("name", t("Email Address not received. Please check your mapping again."));
            return;
        }
        $form_state->setErrorByName("name", t("Access Denied: You do not have permission to access this site. Please contact your system administrator for assistance."));
        return;
    }
    if ($Ef->statusMessage == "LDAP_ERROR") {
        $form_state->setErrorByName("name", t("PHP LDAP extension is not installed or disabled. Please enable it."));
        return;
    }
    if ($Ef->statusMessage == "CURL_ERROR") {
        $form_state->setErrorByName("name", t("PHP cURL extension is not installed or disabled. Please enable it."));
        return;
    }
    if ($Ef->statusMessage == "OPENSSL_ERROR") {
        $form_state->setErrorByName("name", t("PHP OpenSSL extension is not installed or disabled. Please enable it."));
        return;
    }
    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LOGIN_RESTRICTION, "Allowed user: {$Fz}", '');
    if ($Fz == "ldap") {
        if (!($Ef->statusMessage == "LDAP_NOT_RESPONDING")) {
            d4:
            // [PHPDeobfuscator] Implied return
            return;
        }
        $form_state->setErrorByName("name", t("It looks like your LDAP is not responding. Please contact your administrator or try after some time."));
        return;
    }
    if ($Fz == "drupal_and_ldap" && !Drupal::service("user.auth")->authenticate($MR, $wz)) {
        $form_state->setErrorByName("name", t("Unrecognized username or password in Drupal." . $Ef->statusMessage));
        return;
    }
    if (!($Fz == "ldap_and_drupalAdmin")) {
        Q7:
        goto d4;
    }
    $S8 = \Drupal::service("user.auth")->authenticate($MR, $wz);
    if ($S8) {
        $user = User::load($S8);
        if ($user->hasRole("administrator")) {
            goto Q7;
        }
        $form_state->setErrorByName("name", t("<strong>PERMISSION DENIED</strong>: only admin are allowed to logged in. "));
        return;
    }
    $form_state->setErrorByName("name", t("Invalid username or incorrect password. Please try again."));
    return;
}
function ldap_auth_form_user_form_alter(&$form, &$form_state, $mf)
{
    $current_user = \Drupal::currentUser();
    $s2 = \Drupal::config("ldap_auth.settings");
    $Dn = $s2->get("miniorange_ldap_enable_password_sync");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    $Jo = Drupal::config("ldap_auth.settings")->get("create_user_in_ldap");
    $Dh = $s2->get("miniorange_ldap_disable_profile_field");
    if (!($Dh == 1 && !in_array("administrator", $current_user->getRoles()))) {
        goto PP;
    }
    $f4 = $s2->get("miniorange_ldap_disable_user_profile_attributes");
    $f4 = explode(";", $f4);
    $Aw = $s2->get("miniorange_ldap_disable_pass_confirm_pass");
    if (!($Aw != '' && $Aw !== "editable")) {
        goto kz;
    }
    if ($Aw === "hide") {
        $form["account"]["current_pass"] = '';
        $form["account"]["pass"] = '';
        // [PHPDeobfuscator] Implied goto
        goto Sg;
    }
    $form["account"]["current_pass"]["#disabled"] = "disabled";
    $form["account"]["pass"]["#disabled"] = "disabled";
    Sg:
    kz:
    foreach ($f4 as $aS) {
        if ($aS == "mail") {
            $form["account"][$aS]["#disabled"] = "disabled";
            // [PHPDeobfuscator] Implied goto
            goto eu;
        }
        $form[$aS]["#disabled"] = "disabled";
        eu:
    }
    PP:
    if (!($j9 && ($Dn || $Jo))) {
        goto FE;
    }
    array_unshift($form["#validate"], "ldap_auth_take_password");
    FE:
}
function ldap_auth_form_user_login_block_alter(&$form, &$form_state)
{
    $Dn = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_password_sync");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    $Jo = Drupal::config("ldap_auth.settings")->get("create_user_in_ldap");
    if (!($j9 && ($Dn || $Jo))) {
        goto t7;
    }
    array_unshift($form["#validate"], "ldap_auth_take_password");
    t7:
}
function ldap_auth_form_user_pass_reset_alter(&$form, $form_state)
{
    $Dn = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_password_sync");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    $Jo = Drupal::config("ldap_auth.settings")->get("create_user_in_ldap");
    if (!($j9 && ($Dn || $Jo))) {
        goto WW;
    }
    array_unshift($form["#validate"], "ldap_auth_take_password");
    WW:
}
function ldap_auth_form_user_login_form_alter(&$form, FormStateInterface $form_state, $mf)
{
    $Dn = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_password_sync");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    $Jo = Drupal::config("ldap_auth.settings")->get("create_user_in_ldap");
    if (!($j9 && ($Dn || $Jo))) {
        goto K4;
    }
    array_unshift($form["#validate"], "ldap_auth_take_password");
    K4:
}
function ldap_auth_form_password_policy_password_tab_alter(&$form, &$form_state)
{
    $Dn = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_enable_password_sync");
    $j9 = !Utilities::isCustomerRegistered($form, FALSE);
    $Jo = Drupal::config("ldap_auth.settings")->get("create_user_in_ldap");
    if (!($j9 && ($Dn || $Jo))) {
        goto pd;
    }
    array_unshift($form["#validate"], "ldap_auth_take_password");
    pd:
}
function ldap_auth_take_password($form, $form_state)
{
    if (!empty($form_state->getValue("current_pass_required_values"))) {
        if (!(!empty($form_state->getValue("current_pass")) && empty($form_state->getValue("pass")))) {
            goto tg;
        }
        Drupal::configFactory()->getEditable("ldap_auth.settings")->set("provision_user_password", $form_state->getValue("current_pass"))->save();
        tg:
        goto gm;
    }
    if (!empty($form_state->getValue("pass"))) {
        Drupal::configFactory()->getEditable("ldap_auth.settings")->set("provision_user_password", $form_state->getValue("pass"))->save();
        // [PHPDeobfuscator] Implied goto
        goto gm;
    }
    gm:
}
function ldap_auth_pass_reset_submit($form, $form_state)
{
}
function ldap_batch_import($QT, &$HC)
{
    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_IMPORT, "L-IMP-20 Utilities-import() Entered for loop for \$i<chunk_elements: ", $QT);
    $dQ = Utilities::import_users($QT);
    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_IMPORT, "L-IMP-21 Utilities-import() \$tmp: ", $dQ);
    if (!($dQ != null && !empty($dQ))) {
        goto zW;
    }
    array_push($HC["results"], $dQ);
    LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_IMPORT, "L-IMP-22 Utilities-import() \$temp array: ", $HC["results"]);
    Drupal::configFactory()->getEditable("ldap_auth.settings")->set("drupal_id_array", $HC["results"])->save();
    zW:
}
function ldap_batch_finish($qz, $at, $kX)
{
    if ($qz) {
        $o3 = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_block_new_users");
        $BG = Drupal::config("ldap_auth.settings")->get("miniorange_ldap_server");
        if (!($o3 == "block_drupal")) {
            goto wA;
        }
        LDAPLOGGERS::addLogger(MiniorangeLDAPConstants::LDAP_IMPORT, "L-IMP-23 Utilities-import() Entered if block_users = block_drupal: ", $at);
        Utilities::block_drupal($at);
        wA:
        $HB = Drupal::config("ldap_auth.settings")->get("user_created_count");
        $mo = Drupal::config("ldap_auth.settings")->get("no_of_users_updated_while_importing");
        Drupal::configFactory()->getEditable("ldap_auth.settings")->clear("user_created_count")->save();
        Drupal::configFactory()->getEditable("ldap_auth.settings")->clear("no_of_users_updated_while_importing")->save();
        Drupal::configFactory()->getEditable("ldap_auth.settings")->set("ldap_user_last_import", strtotime("today"))->save();
        $rS = t("Users are successfully imported from the ( " . $BG . " ) LDAP server.<br> Number of newly created users => @new_user_count <br> Number of updated users => @update_user_count", array("@new_user_count" => $HB, "@update_user_count" => $mo));
        Drupal::messenger()->addMessage($rS);
        // [PHPDeobfuscator] Implied goto
        goto MO;
    }
    $vz = reset($kX);
    $rS = t("An error occurred while processing %error_operation with arguments: @arguments", ["%error_operation" => $vz[0], "@arguments" => print_r($vz[1], TRUE)]);
    \Drupal::messenger()->addMessage($rS, "error");
    MO:
}
