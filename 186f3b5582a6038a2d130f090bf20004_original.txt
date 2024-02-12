public function mo_oauth_login_validate()
    {
        global $Rg;
        $c8 = new StorageManager();
        if (!(isset($_REQUEST[\MoOAuthConstants::OPTION]) and strpos($_REQUEST[\MoOAuthConstants::OPTION], "\x6f\x61\x75\x74\x68\162\145\x64\x69\x72\x65\143\x74") !== false)) {
            goto Sw;
        }
        if (isset($_REQUEST["\x6d\157\x5f\154\x6f\147\151\x6e\x5f\160\x6f\160\165\160"])) {
            goto bx;
        }
        if (!(isset($_REQUEST["\x72\145\163\157\165\x72\x63\145"]) && !empty($_REQUEST["\162\145\x73\x6f\x75\x72\x63\145"]))) {
            goto BJ;
        }
        if (!empty($_REQUEST["\162\x65\163\157\165\x72\x63\x65"])) {
            goto Cc;
        }
        $Rg->handle_error("\124\150\145\40\162\x65\163\x70\157\x6e\x73\145\40\x66\x72\157\x6d\x20\x75\x73\145\x72\x69\156\146\x6f\40\167\x61\x73\x20\145\x6d\160\x74\x79\x2e");
        MO_Oauth_Debug::mo_oauth_log("\x54\x68\145\40\x72\145\163\x70\157\156\163\145\40\146\x72\x6f\x6d\40\165\163\x65\162\151\x6e\146\x6f\x20\x77\x61\163\x20\x65\155\160\x74\171\56");
        wp_die(wp_kses("\x54\x68\145\40\162\145\163\x70\157\x6e\163\145\x20\x66\162\157\x6d\x20\x75\163\145\162\151\x6e\x66\x6f\40\167\x61\x73\x20\x65\x6d\x70\164\x79\56", \mo_oauth_get_valid_html()));
        Cc:
        $c8 = new StorageManager(urldecode($_REQUEST["\x72\x65\163\157\x75\162\143\x65"]));
        $so = $c8->get_value("\162\x65\163\157\x75\162\143\145");
        $vR = $c8->get_value("\141\160\x70\156\141\x6d\145");
        $m2 = $c8->get_value("\x72\145\x64\x69\x72\145\x63\x74\x5f\165\x72\x69");
        $sI = $c8->get_value("\x61\143\143\145\163\x73\x5f\x74\x6f\153\145\156");
        $NY = $Rg->get_app_by_name($vR)->get_app_config();
        $CV = isset($_REQUEST["\x74\x65\x73\x74"]) && !empty($_REQUEST["\x74\x65\x73\x74"]);
        if (!($CV && '' !== $CV)) {
            goto Jn;
        }
        $this->handle_group_test_conf($so, $NY, $sI, false, $CV);
        exit;
        Jn:
        $c8->remove_key("\162\145\163\x6f\x75\162\x63\x65");
        $c8->add_replace_entry("\160\x6f\x70\165\x70", "\151\147\x6e\x6f\162\x65");
        if (!has_filter("\x77\x6f\157\143\157\155\155\145\x72\143\x65\x5f\x63\x68\x65\x63\x6b\157\x75\164\137\147\145\x74\x5f\x76\x61\154\x75\x65")) {
            goto u7;
        }
        $so["\x61\x70\160\x6e\x61\x6d\145"] = $vR;
        u7:
        do_action("\155\x6f\137\141\x62\162\x5f\x66\151\154\164\x65\162\137\x6c\157\147\x69\x6e", $so);
        $this->handle_sso($vR, $NY, $so, $c8->get_state(), ["\141\x63\x63\145\x73\163\x5f\164\x6f\x6b\x65\x6e" => $sI]);
        BJ:
        if (isset($_REQUEST["\x61\160\160\137\x6e\x61\155\145"])) {
            goto zU;
        }
        $NE = "\120\154\x65\141\x73\x65\40\143\x68\145\143\x6b\40\151\146\40\x79\157\165\40\141\x72\145\40\x73\145\x6e\144\x69\156\147\x20\164\150\x65\x20\x27\141\160\x70\137\x6e\x61\x6d\145\x27\x20\160\x61\162\141\x6d\x65\164\x65\x72";
        $Rg->handle_error($NE);
        wp_die(wp_kses($NE, \mo_oauth_get_valid_html()));
        exit;
        zU:
        $Xq = isset($_REQUEST["\x61\160\160\137\156\141\x6d\x65"]) && !empty($_REQUEST["\x61\x70\x70\x5f\x6e\x61\x6d\x65"]) ? $_REQUEST["\141\x70\x70\x5f\x6e\141\x6d\x65"] : '';
        if (!($Xq == '')) {
            goto xl;
        }
        $NE = "\x4e\x6f\x20\163\165\x63\150\40\x61\x70\x70\40\x66\x6f\x75\156\144\40\x63\157\x6e\x66\x69\x67\165\x72\x65\144\56\x20\x50\x6c\145\141\x73\x65\40\x63\x68\145\x63\153\40\151\146\40\x79\x6f\165\40\141\162\145\40\163\145\156\x64\x69\156\x67\x20\x74\x68\x65\40\x63\x6f\162\162\145\143\164\40\x61\x70\x70\x5f\x6e\141\155\x65";
        MO_Oauth_Debug::mo_oauth_log($NE);
        $Rg->handle_error($NE);
        wp_die(wp_kses($NE, \mo_oauth_get_valid_html()));
        exit;
        xl:
        $Z3 = $Rg->mo_oauth_client_get_option("\x6d\157\x5f\x6f\x61\x75\x74\150\x5f\141\x70\160\x73\137\154\x69\x73\164");
        if (is_array($Z3) && isset($Z3[$Xq])) {
            goto he;
        }
        $NE = "\x4e\157\40\163\165\x63\150\x20\141\160\x70\40\x66\157\165\156\x64\40\143\x6f\156\x66\x69\147\x75\162\145\x64\56\40\x50\154\x65\x61\163\145\40\x63\x68\x65\143\153\40\151\146\40\x79\x6f\165\x20\141\x72\145\40\163\145\156\144\151\156\147\x20\164\x68\145\40\143\157\162\x72\145\x63\164\40\141\x70\x70\x5f\156\141\155\145";
        MO_Oauth_Debug::mo_oauth_log($NE);
        $Rg->handle_error($NE);
        wp_die(wp_kses($NE, \mo_oauth_get_valid_html()));
        exit;
        he:
        $TG = "\x2f\57" . $_SERVER["\x48\124\124\x50\x5f\110\x4f\x53\x54"] . $_SERVER["\122\x45\x51\x55\105\x53\x54\x5f\x55\x52\111"];
        $TG = strtok($TG, "\77");
        $bn = isset($_REQUEST["\x72\145\x64\151\x72\x65\143\x74\137\x75\162\154"]) ? urldecode($_REQUEST["\x72\x65\x64\151\x72\x65\x63\164\x5f\165\162\x6c"]) : $TG;
        $CV = isset($_REQUEST["\164\x65\x73\164"]) ? urldecode($_REQUEST["\x74\145\163\x74"]) : false;
        $jN = isset($_REQUEST["\x72\x65\163\164\x72\151\x63\164\x72\x65\x64\151\x72\145\143\x74"]) ? urldecode($_REQUEST["\x72\145\163\x74\x72\151\143\164\162\145\x64\x69\x72\145\x63\x74"]) : false;
        $s2 = $Rg->get_app_by_name($Xq);
        $PC = $s2->get_app_config("\147\162\141\156\164\137\x74\x79\x70\x65");
        if (!is_multisite()) {
            goto m5;
        }
        $blog_id = get_current_blog_id();
        $Yl = $Rg->mo_oauth_client_get_option("\155\157\137\x6f\x61\x75\x74\x68\137\143\x33\126\151\x63\62\154\60\132\x58\x4e\x7a\x5a\127\170\x6c\x59\x33\x52\154\132\x41");
        $Yh = array();
        if (!isset($Yl)) {
            goto fL;
        }
        $Yh = json_decode($Rg->mooauthdecrypt($Yl), true);
        fL:
        $I3 = false;
        $Zt = $Rg->mo_oauth_client_get_option("\155\157\137\x6f\141\x75\x74\150\137\x69\163\115\165\x6c\x74\x69\x53\151\x74\x65\x50\x6c\x75\x67\x69\156\x52\x65\161\165\145\x73\164\x65\144");
        if (!(is_array($Yh) && in_array($blog_id, $Yh))) {
            goto zf;
        }
        $I3 = true;
        zf:
        if (!(is_multisite() && $Zt && ($Zt && !$I3) && !$CV && $Rg->mo_oauth_client_get_option("\156\x6f\x4f\146\123\x75\142\123\151\164\145\163") < 1000)) {
            goto Hp;
        }
        $Rg->handle_error("\x4c\157\147\x69\x6e\x20\x69\163\x20\144\x69\163\x61\x62\x6c\145\144\40\146\x6f\162\40\x74\x68\x69\x73\x20\x73\x69\x74\145\x2e\x20\120\x6c\x65\x61\163\x65\x20\143\x6f\156\x74\141\143\164\x20\x79\x6f\165\162\x20\141\144\x6d\151\x6e\x69\163\164\x72\x61\164\x6f\162\56");
        MO_Oauth_Debug::mo_oauth_log("\x4c\x6f\147\151\x6e\40\151\x73\40\x64\x69\163\141\142\x6c\x65\x64\x20\x66\x6f\162\40\164\x68\151\x73\40\163\151\x74\x65\x2e\x20\120\x6c\x65\141\x73\x65\x20\x63\157\156\x74\141\143\164\x20\171\157\x75\x72\40\x61\x64\x6d\x69\x6e\x69\x73\164\x72\x61\164\x6f\162\x2e");
        wp_die("\x4c\157\x67\x69\156\40\x69\163\x20\144\x69\163\x61\142\154\x65\144\40\x66\157\162\40\x74\150\151\x73\40\x73\151\x74\145\56\40\120\154\x65\x61\163\x65\x20\143\x6f\156\x74\x61\x63\x74\x20\171\157\165\162\40\x61\x64\155\x69\156\151\163\164\x72\141\164\157\162\56");
        Hp:
        $c8->add_replace_entry("\x62\154\157\147\137\x69\x64", $blog_id);
        m5:
        MO_Oauth_Debug::mo_oauth_log("\107\x72\141\x6e\x74\x3a\x20" . $PC);
        if ($PC && "\x50\141\x73\163\x77\157\162\x64\x20\107\x72\141\x6e\x74" === $PC) {
            goto d9;
        }
        if (!($PC && "\103\x6c\151\x65\x6e\x74\x20\103\x72\145\144\x65\x6e\x74\x69\141\154\163\x20\107\162\141\156\x74" === $PC)) {
            goto xz;
        }
        do_action("\155\157\137\x6f\x61\x75\x74\150\x5f\143\154\x69\145\x6e\x74\137\143\162\145\x64\x65\156\x74\x69\x61\x6c\163\137\147\162\x61\156\164\137\x69\156\151\164\151\141\164\x65", $Xq, $CV);
        exit;
        xz:
        goto AU;
        d9:
        do_action("\x70\167\x64\137\x65\163\x73\x65\156\164\151\141\x6c\x73\137\151\x6e\x74\x65\x72\156\x61\154");
        do_action("\155\x6f\137\x6f\141\x75\164\x68\137\x63\x6c\151\x65\x6e\164\x5f\x61\144\x64\137\160\167\144\x5f\x6a\x73");
        echo "\x9\x9\11\11\74\163\x63\162\x69\x70\x74\76\12\11\11\x9\11\x9\x76\141\162\40\155\x6f\x5f\x6f\x61\x75\x74\150\x5f\x61\x70\x70\x5f\156\x61\155\145\x20\75\x20\42";
        echo wp_kses($Xq, \mo_oauth_get_valid_html());
        echo "\x22\73\12\11\11\11\11\11\144\x6f\143\165\155\x65\x6e\x74\x2e\x61\x64\144\x45\x76\x65\x6e\164\114\x69\x73\x74\x65\x6e\x65\x72\50\47\x44\x4f\x4d\103\157\156\164\x65\156\x74\x4c\157\x61\x64\145\144\x27\x2c\x20\146\x75\156\x63\164\x69\157\156\50\51\x20\173\xa\x9\x9\x9\x9\x9\11";
        if ($CV) {
            goto Xi;
        }
        echo "\11\11\11\x9\x9\11\x9\x6d\157\x4f\x41\x75\164\150\x4c\157\147\151\156\x50\167\144\x28\155\x6f\137\157\x61\165\164\x68\137\141\160\160\137\x6e\x61\x6d\x65\54\40\146\141\x6c\163\x65\x2c\40\47";
        echo $bn;
        echo "\47\x29\x3b\xa\11\11\11\x9\x9\11";
        goto qi;
        Xi:
        echo "\x9\x9\x9\x9\11\11\11\155\x6f\117\101\165\164\x68\x4c\x6f\x67\151\x6e\x50\x77\x64\50\155\157\x5f\157\x61\165\164\x68\137\x61\x70\160\137\156\x61\x6d\145\54\40\164\162\165\x65\x2c\x20\x27";
        echo $bn;
        echo "\x27\x29\x3b\12\11\11\11\11\11\11";
        qi:
        echo "\11\x9\11\11\11\175\54\40\x66\x61\x6c\163\x65\x29\x3b\12\11\11\11\11\74\x2f\x73\143\x72\x69\160\x74\x3e\xa\x9\11\11\x9";
        exit;
        AU:
        if (!($s2->get_app_config("\x61\x70\160\111\x64") === "\x74\167\x69\164\x74\x65\x72" || $s2->get_app_config("\141\x70\x70\x49\144") === "\157\x61\165\x74\x68\x31")) {
            goto jR;
        }
        MO_Oauth_Debug::mo_oauth_log("\x4f\x61\x75\x74\x68\61\x20\146\154\x6f\x77");
        $CV = isset($_REQUEST["\164\145\x73\164"]) && !empty($_REQUEST["\x74\145\163\164"]);
        if (!($CV && '' !== $CV)) {
            goto wO;
        }
        setcookie("\157\141\x75\164\x68\x31\x5f\164\145\x73\x74", "\x31", time() + 20);
        wO:
        setcookie("\x6f\x61\165\164\x68\61\141\160\x70\x6e\141\155\x65", $Xq, time() + 60);
        $_COOKIE["\x6f\141\x75\x74\x68\x31\141\160\x70\x6e\x61\x6d\x65"] = $Xq;
        MO_Custom_OAuth1::mo_oauth1_auth_request($Xq);
        exit;
        jR:
        $TF = md5(rand(0, 15));
        $c8->add_replace_entry("\x61\x70\160\156\x61\155\x65", $Xq);
        $c8->add_replace_entry("\x72\145\x64\151\x72\x65\x63\x74\137\165\162\x69", $bn);
        $c8->add_replace_entry("\164\x65\163\164\137\x63\157\x6e\146\151\x67", $CV);
        $c8->add_replace_entry("\x72\145\x73\164\x72\x69\x63\x74\162\x65\144\151\162\145\143\164", $jN);
        $c8->add_replace_entry("\x73\164\141\x74\x65\137\156\157\x6e\143\x65", $TF);
        $c8 = apply_filters("\155\x6f\x5f\157\141\165\x74\x68\x5f\x73\x65\164\137\x63\165\x73\x74\x6f\x6d\137\x73\164\157\162\x61\x67\145", $c8);
        $OC = $c8->get_state();
        $OC = apply_filters("\x73\x74\141\164\x65\137\x69\156\164\x65\162\156\141\x6c", $OC);
        $sx = $s2->get_app_config("\x61\x75\x74\x68\157\x72\x69\172\145\x75\162\x6c");
        if (!($s2->get_app_config("\163\x65\156\x64\137\x73\164\141\164\x65") === false || $s2->get_app_config("\x73\145\x6e\144\137\163\164\x61\164\145") === '')) {
            goto uj;
        }
        $s2->update_app_config("\163\x65\x6e\x64\137\163\x74\141\x74\145", 1);
        $Rg->set_app_by_name($Xq, $s2->get_app_config('', false));
        uj:
        if ($s2->get_app_config("\x73\x65\x6e\144\137\x73\164\x61\x74\x65")) {
            goto JP;
        }
        setcookie("\163\x74\x61\x74\x65\137\160\141\162\141\x6d", $OC, time() + 60);
        JP:
        $iE = $s2->get_app_config("\160\153\143\145\x5f\146\x6c\x6f\167");
        $m2 = $s2->get_app_config("\162\145\x64\x69\162\145\143\x74\137\165\x72\x69");
        $l3 = urlencode($s2->get_app_config("\143\x6c\x69\145\x6e\164\137\151\x64"));
        $m2 = empty($m2) ? \site_url() : $m2;
        if ($iE && 1 === $iE) {
            goto uF;
        }
        $V4 = $s2->get_app_config("\x73\145\x6e\x64\x5f\x73\x74\x61\164\145") ? "\46\x73\164\x61\164\145\x3d" . $OC : '';
        if ($s2->get_app_config("\163\x65\x6e\144\x5f\163\x74\141\x74\145")) {
            goto oB;
        }
        setcookie("\163\164\x61\164\x65\x5f\x70\141\162\x61\155", $OC, time() + 60);
        MO_Oauth_Debug::mo_oauth_log("\x73\164\x61\x74\x65\x20\160\141\162\141\x6d\145\x74\x65\x72\40\x6e\157\x74\40\x73\x65\156\164");
        goto d5;
        oB:
        MO_Oauth_Debug::mo_oauth_log("\x73\164\x61\x74\x65\40\160\x61\162\141\155\x65\164\145\162\x20\x73\x65\156\x74");
        d5:
        if (strpos($sx, "\x3f") !== false) {
            goto t3;
        }
        $sx = $sx . "\77\143\x6c\x69\145\156\x74\x5f\x69\144\75" . $l3 . "\46\x73\x63\x6f\160\145\x3d" . $s2->get_app_config("\x73\x63\x6f\x70\145") . "\46\x72\145\144\151\x72\x65\x63\164\137\x75\162\151\x3d" . urlencode($m2) . "\x26\x72\x65\163\x70\x6f\x6e\x73\x65\x5f\x74\171\160\x65\x3d\x63\x6f\144\x65" . $V4;
        goto Vv;
        t3:
        $sx = $sx . "\x26\143\x6c\x69\x65\156\164\x5f\x69\144\x3d" . $l3 . "\46\163\143\157\160\145\x3d" . $s2->get_app_config("\x73\143\x6f\x70\145") . "\46\162\x65\x64\151\162\145\143\x74\137\x75\x72\151\x3d" . urlencode($m2) . "\x26\x72\145\x73\x70\157\156\163\145\x5f\164\x79\x70\145\75\x63\x6f\x64\145" . $V4;
        Vv:
        goto cf;
        uF:
        MO_Oauth_Debug::mo_oauth_log("\x50\x4b\x43\105\x20\146\x6c\x6f\167");
        $uB = bin2hex(openssl_random_pseudo_bytes(32));
        $BU = $Rg->base64url_encode(pack("\110\x2a", $uB));
        $Eu = $Rg->base64url_encode(pack("\110\x2a", hash("\x73\x68\141\62\65\66", $BU)));
        $c8->add_replace_entry("\x63\x6f\144\145\x5f\166\x65\162\x69\x66\151\x65\162", $BU);
        $OC = $c8->get_state();
        $V4 = $s2->get_app_config("\163\145\156\144\137\163\x74\x61\164\x65") ? "\46\x73\x74\x61\164\145\75" . $OC : '';
        if ($s2->get_app_config("\x73\145\x6e\144\x5f\x73\x74\x61\164\145")) {
            goto Yk;
        }
        MO_Oauth_Debug::mo_oauth_log("\x73\164\141\164\x65\x20\x70\141\162\141\155\145\164\x65\162\x20\156\x6f\164\x20\x73\x65\x6e\164");
        goto Y1;
        Yk:
        MO_Oauth_Debug::mo_oauth_log("\x73\x74\141\x74\x65\40\160\x61\162\x61\155\x65\164\x65\x72\x20\x73\x65\x6e\x74");
        Y1:
        if (strpos($sx, "\77") !== false) {
            goto Bg;
        }
        $sx = $sx . "\77\x63\x6c\x69\145\x6e\x74\137\x69\x64\x3d" . $l3 . "\46\x73\143\x6f\x70\145\x3d" . $s2->get_app_config("\163\x63\157\160\145") . "\x26\162\x65\144\x69\162\x65\143\164\137\165\162\x69\75" . urlencode($m2) . "\46\x72\145\163\x70\157\x6e\x73\145\137\164\x79\160\x65\x3d\x63\x6f\x64\145" . $V4 . "\46\x63\157\144\145\137\143\x68\x61\x6c\x6c\145\x6e\147\145\x3d" . $Eu . "\46\x63\x6f\x64\x65\137\143\150\x61\154\x6c\x65\x6e\147\x65\137\155\145\164\x68\157\144\75\x53\x32\x35\66";
        goto SY;
        Bg:
        $sx = $sx . "\46\x63\154\x69\145\156\x74\137\151\x64\x3d" . $l3 . "\46\x73\x63\157\160\x65\x3d" . $s2->get_app_config("\x73\x63\x6f\x70\145") . "\46\162\x65\144\x69\162\145\143\x74\137\165\x72\151\75" . urlencode($m2) . "\x26\x72\x65\x73\160\157\156\163\x65\x5f\164\x79\x70\x65\x3d\143\157\144\145" . $V4 . "\x26\143\157\x64\145\x5f\143\x68\x61\x6c\x6c\x65\156\147\x65\75" . $Eu . "\x26\143\x6f\144\145\x5f\143\x68\141\x6c\x6c\x65\x6e\147\x65\137\x6d\145\164\150\x6f\x64\x3d\x53\62\x35\66";
        SY:
        cf:
        if (!(null !== $s2->get_app_config("\x73\145\x6e\144\137\156\157\156\143\145") && $s2->get_app_config("\x73\x65\156\144\137\156\157\156\143\x65"))) {
            goto Hk;
        }
        $U5 = md5(rand());
        $Rg->set_transient("\x6d\157\137\x6f\x61\x75\164\x68\137\156\157\x6e\143\x65\137" . $U5, $U5, time() + 120);
        $sx = $sx . "\46\156\157\x6e\x63\x65\75" . $U5;
        MO_Oauth_Debug::mo_oauth_log("\x6e\157\x6e\143\145\x20\x70\141\x72\141\x6d\145\x74\x65\x72\x20\x73\145\x6e\x74");
        Hk:
        if (!(strpos($sx, "\x61\160\160\x6c\145") !== false)) {
            goto Xy;
        }
        $sx = $sx . "\46\x72\x65\x73\x70\x6f\156\x73\x65\137\x6d\157\144\x65\75\x66\x6f\162\155\x5f\x70\x6f\x73\x74";
        Xy:
        $sx = apply_filters("\x6d\157\137\141\165\x74\150\x5f\165\162\x6c\137\x69\x6e\x74\x65\162\156\x61\154", $sx, $Xq);
        MO_Oauth_Debug::mo_oauth_log("\x41\165\164\150\157\162\151\172\x61\x69\x6f\156\40\105\x6e\144\x70\157\151\x6e\x74\40\x3d\x3e\x20" . $sx);
        header("\114\157\x63\x61\x74\151\157\156\72\x20" . $sx);
        exit;
        bx:
        Sw:
        if (isset($_GET["\145\x72\162\x6f\x72\137\x64\145\163\143\x72\x69\160\164\151\157\x6e"])) {
            goto Cb;
        }
        if (!isset($_GET["\x65\162\x72\x6f\162"])) {
            goto t5;
        }
        if (!empty($_GET["\145\x72\x72\157\162"])) {
            goto Bm;
        }
        MO_Oauth_Debug::mo_oauth_log("\x52\x65\x63\145\x69\x76\x65\144\x2c\x20\105\155\160\164\171\x20\105\x72\162\x6f\x72\x20\146\162\x6f\x6d\40\101\165\164\150\x6f\x72\151\172\x65\40\x45\x6e\144\160\x6f\x69\x6e\164");
        return;
        Bm:
        do_action("\155\157\x5f\162\145\x64\x69\162\x65\143\164\x5f\x74\x6f\x5f\143\x75\163\164\157\x6d\x5f\x65\162\x72\x6f\162\x5f\160\141\147\x65");
        $qh = "\x45\x72\x72\x6f\x72\40\146\x72\157\x6d\40\x41\165\164\150\x6f\162\x69\x7a\x65\x20\x45\x6e\x64\x70\x6f\151\156\x74\72\x20" . sanitize_text_field($_GET["\x65\x72\162\x6f\162"]);
        MO_Oauth_Debug::mo_oauth_log($qh);
        $Rg->handle_error($qh);
        wp_die($qh);
        t5:
        goto Lh;
        Cb:
        if (!(strpos($_GET["\163\x74\141\x74\145"], "\x64\157\153\141\x6e\55\x73\164\x72\151\160\x65\x2d\x63\x6f\x6e\156\x65\143\164") !== false)) {
            goto fJ;
        }
        return;
        fJ:
        do_action("\x6d\x6f\137\x72\145\x64\151\162\x65\x63\164\137\164\x6f\137\143\x75\163\164\157\x6d\137\x65\x72\x72\x6f\x72\137\160\141\x67\145");
        $UE = "\x45\x72\x72\157\x72\40\144\x65\x73\x63\x72\151\x70\x74\151\157\156\x20\146\x72\157\x6d\x20\101\x75\164\x68\157\162\x69\x7a\145\40\105\156\144\x70\157\151\x6e\x74\x3a\40" . sanitize_text_field($_GET["\x65\162\162\x6f\162\137\x64\x65\163\143\x72\151\160\x74\151\x6f\x6e"]);
        MO_Oauth_Debug::mo_oauth_log($UE);
        $Rg->handle_error($UE);
        wp_die($UE);
        Lh:
        if (!(strpos($_SERVER["\122\105\121\125\105\x53\x54\137\x55\122\111"], "\157\160\145\x6e\x69\144\143\x61\154\154\142\141\143\x6b") !== false || strpos($_SERVER["\122\105\x51\x55\x45\x53\x54\x5f\x55\122\111"], "\x6f\x61\x75\164\150\137\x74\x6f\153\145\156") !== false && strpos($_SERVER["\122\x45\121\125\105\x53\124\x5f\x55\x52\x49"], "\157\x61\x75\164\x68\137\x76\x65\162\151\146\151\x65\x72"))) {
            goto Z8;
        }
        MO_Oauth_Debug::mo_oauth_log("\x4f\x61\165\x74\150\x31\x20\143\141\x6c\x6c\x62\141\143\x6b\40\146\x6c\x6f\167");
        if (!empty($_COOKIE["\157\x61\x75\x74\x68\x31\x61\x70\160\156\141\x6d\x65"])) {
            goto ut;
        }
        MO_Oauth_Debug::mo_oauth_log("\122\145\164\x75\162\156\151\x6e\x67\40\x66\162\157\x6d\40\117\101\165\164\x68\x31");
        return;
        ut:
        MO_Oauth_Debug::mo_oauth_log("\117\101\x75\x74\x68\61\x20\141\160\x70\40\x66\157\165\x6e\144");
        $Xq = $_COOKIE["\x6f\x61\x75\x74\x68\61\141\x70\160\x6e\x61\155\x65"];
        $so = MO_Custom_OAuth1::mo_oidc1_get_access_token($_COOKIE["\x6f\x61\x75\164\x68\x31\141\160\160\156\x61\155\x65"]);
        $g8 = apply_filters("\155\x6f\137\x74\162\137\141\146\x74\145\x72\x5f\x70\162\157\x66\x69\154\145\137\151\x6e\x66\157\x5f\x65\x78\x74\x72\141\x63\164\x69\157\156\137\x66\x72\x6f\x6d\x5f\x74\157\x6b\145\x6e", $so);
        $n_ = [];
        $vc = $this->dropdownattrmapping('', $so, $n_);
        $Rg->mo_oauth_client_update_option("\x6d\157\137\x6f\x61\x75\x74\150\137\x61\x74\x74\162\137\156\x61\155\x65\x5f\x6c\151\x73\x74" . $Xq, $vc);
        if (!(isset($_COOKIE["\157\141\165\164\x68\61\137\x74\x65\163\x74"]) && $_COOKIE["\x6f\141\x75\x74\150\x31\137\x74\x65\x73\164"] == "\x31")) {
            goto lY;
        }
        $s2 = $Rg->get_app_by_name($Xq);
        $Vh = $s2->get_app_config();
        $this->render_test_config_output($so, false, $Vh, $Xq);
        exit;
        lY:
        $s2 = $Rg->get_app_by_name($Xq);
        $XB = $s2->get_app_config("\165\x73\x65\162\156\141\x6d\x65\137\141\164\x74\162");
        $j2 = isset($NY["\x65\x6d\141\151\x6c\x5f\x61\164\164\162"]) ? $NY["\x65\155\x61\151\154\x5f\x61\164\164\162"] : '';
        $B7 = $Rg->getnestedattribute($so, $j2);
        $K2 = $Rg->getnestedattribute($so, $XB);
        if (!empty($K2)) {
            goto Vj;
        }
        MO_Oauth_Debug::mo_oauth_log("\x55\163\x65\162\156\141\x6d\145\x20\156\157\x74\x20\x72\x65\143\x65\x69\x76\x65\x64\56\x50\154\145\x61\x73\145\x20\143\x6f\x6e\x66\151\147\x75\x72\145\x20\101\164\164\x72\x69\x62\x75\x74\x65\40\115\141\x70\x70\151\156\147");
        $Rg->handle_error("\125\163\145\x72\156\x61\x6d\145\x20\156\157\164\x20\x72\x65\x63\x65\x69\166\x65\x64\56\120\154\x65\141\x73\x65\x20\143\x6f\x6e\146\x69\x67\x75\x72\x65\x20\x41\164\164\162\x69\x62\x75\x74\145\x20\115\141\160\x70\151\156\147");
        wp_die("\125\163\x65\162\x6e\141\x6d\145\x20\x6e\x6f\164\40\162\145\143\145\x69\x76\145\144\56\x50\x6c\x65\x61\x73\145\40\143\157\156\x66\x69\x67\x75\x72\145\x20\x41\x74\164\x72\151\x62\165\164\145\40\x4d\x61\160\160\x69\x6e\147");
        Vj:
        if (!empty($B7)) {
            goto tG;
        }
        $user = get_user_by("\154\157\147\151\x6e", $K2);
        goto Eg;
        tG:
        $B7 = $Rg->getnestedattribute($so, $j2);
        if (!(false === strpos($B7, "\100"))) {
            goto hI;
        }
        MO_Oauth_Debug::mo_oauth_log("\x4d\141\x70\160\145\144\x20\105\x6d\x61\151\x6c\x20\x61\164\164\162\151\142\x75\164\x65\40\144\157\145\x73\x20\156\157\164\x20\143\157\156\x74\x61\151\x6e\x20\x76\x61\154\x69\144\x20\x65\x6d\141\151\x6c\56");
        $Rg->handle_error("\115\141\x70\160\145\x64\40\x45\155\x61\x69\154\x20\x61\x74\164\x72\151\142\x75\164\x65\x20\144\x6f\145\163\x20\156\x6f\164\40\143\157\156\164\141\151\156\x20\x76\141\154\x69\144\x20\145\155\x61\x69\154\x2e");
        wp_die("\x4d\x61\160\160\x65\144\x20\105\x6d\141\x69\x6c\x20\141\164\x74\162\151\x62\x75\x74\x65\40\144\x6f\x65\163\40\x6e\157\x74\40\143\157\156\x74\141\151\156\x20\x76\141\x6c\x69\144\40\145\155\x61\151\x6c\x2e");
        hI:
        Eg:
        if ($user) {
            goto KH;
        }
        $YM = 0;
        if ($Rg->mo_oauth_hbca_xyake()) {
            goto ly;
        }
        $user = $Rg->mo_oauth_hjsguh_kiishuyauh878gs($B7, $K2);
        goto Ul;
        ly:
        if ($Rg->mo_oauth_client_get_option("\155\157\137\x6f\x61\x75\164\150\137\x66\154\141\147") !== true) {
            goto wB;
        }
        $h7 = base64_decode("PGRpdiBzdHlsZT0ndGV4dC1hbGlnbjpjZW50ZXI7Jz48Yj5Vc2VyIEFjY291bnQgZG9lcyBub3QgZXhpc3QuPC9iPjwvZGl2Pjxicj48c21hbGw+VGhpcyB2ZXJzaW9uIHN1cHBvcnRzIEF1dG8gQ3JlYXRlIFVzZXIgZmVhdHVyZSB1cHRvIDEwIFVzZXJzLiBQbGVhc2UgdXBncmFkZSB0byB0aGUgaGlnaGVyIHZlcnNpb24gb2YgdGhlIHBsdWdpbiB0byBlbmFibGUgYXV0byBjcmVhdGUgdXNlciBmb3IgdW5saW1pdGVkIHVzZXJzIG9yIGFkZCB1c2VyIG1hbnVhbGx5Ljwvc21hbGw+");
        $Rg->handle_error($h7);
        MO_Oauth_Debug::mo_oauth_log($h7);
        wp_die($h7);
        goto co;
        wB:
        if (!empty($B7)) {
            goto Qw;
        }
        $user = $Rg->mo_oauth_jhuyn_jgsukaj($K2, $K2);
        goto A0;
        Qw:
        $user = $Rg->mo_oauth_jhuyn_jgsukaj($B7, $K2);
        A0:
        co:
        Ul:
        goto EM;
        KH:
        $YM = $user->ID;
        EM:
        if (!$user) {
            goto pm;
        }
        wp_set_current_user($user->ID);
        $uA = false;
        $uA = apply_filters("\155\x6f\137\162\145\155\145\x6d\142\x65\162\137\x6d\145", $uA);
        wp_set_auth_cookie($user->ID, $uA);
        $user = get_user_by("\x49\x44", $user->ID);
        do_action("\167\160\137\154\157\x67\151\x6e", $user->user_login, $user);
        wp_safe_redirect(home_url());
        exit;
        pm:
        Z8:
        if (!isset($_SERVER["\110\x54\124\x50\x5f\x58\137\x52\x45\121\125\x45\x53\124\x45\x44\137\127\x49\124\x48"]) && (strpos($_SERVER["\122\105\x51\x55\105\x53\x54\137\125\122\111"], "\57\157\141\165\x74\x68\143\x61\x6c\x6c\x62\141\x63\x6b") !== false || isset($_REQUEST["\x63\x6f\x64\145"]) && !empty($_REQUEST["\143\157\144\x65"]) && !isset($_REQUEST["\x69\144\137\x74\x6f\x6b\x65\x6e"]))) {
            goto f7;
        }
        if (!empty($_POST["\x72\145\x66\x72\x65\x73\150\x5f\x74\x6f\x6b\x65\156"])) {
            goto gJ;
        }
        goto lb;
        f7:
        if (!(isset($_REQUEST["\x70\x6f\163\164\x5f\111\x44"]) || isset($_REQUEST["\x65\144\144\x2d\141\x63\164\151\x6f\x6e"]) || isset($_REQUEST["\x6c\x6f\143\141\x74\x69\157\156"]) || isset($_REQUEST["\141\160\x69"]))) {
            goto M5;
        }
        return;
        M5:
        if (!(strpos($_SERVER["\x52\105\121\125\x45\123\124\137\125\122\x49"], "\57\x77\160\x2d\152\x73\157\x6e\57\x6d\x6f\x73\145\x72\x76\x65\162\57\x74\x6f\153\145\156") !== false)) {
            goto Fk;
        }
        return;
        Fk:
        try {
            if (isset($_COOKIE["\163\164\141\164\145\x5f\160\141\162\141\155"])) {
                goto Ex;
            }
            if (isset($_GET["\x73\x74\141\x74\145"]) && !empty($_GET["\163\x74\x61\164\x65"])) {
                goto W6;
            }
            $P4 = new StorageManager();
            if (!is_multisite()) {
                goto S7;
            }
            $P4->add_replace_entry("\x62\154\x6f\147\137\x69\144", 1);
            S7:
            $r0 = $Rg->get_app_by_name();
            if (isset($_GET["\141\x70\x70\137\x6e\x61\x6d\145"])) {
                goto jL;
            }
            $P4->add_replace_entry("\141\160\160\x6e\x61\x6d\145", $r0->get_app_name());
            goto sX;
            jL:
            $P4->add_replace_entry("\141\160\x70\156\141\155\x65", $_GET["\x61\x70\x70\x5f\x6e\141\x6d\x65"]);
            sX:
            $P4->add_replace_entry("\164\x65\x73\x74\137\x63\x6f\156\146\151\x67", false);
            $P4->add_replace_entry("\162\x65\144\x69\x72\145\143\x74\x5f\x75\x72\151", site_url());
            $OC = $P4->get_state();
            goto Ao;
            Ex:
            $OC = $_COOKIE["\x73\164\141\x74\x65\x5f\x70\x61\x72\x61\x6d"];
            goto Ao;
            W6:
            $OC = wp_unslash($_GET["\x73\164\141\164\145"]);
            Ao:
            $c8 = new StorageManager($OC);
            if (!empty($c8->get_value("\x61\x70\160\x6e\141\x6d\x65"))) {
                goto jy;
            }
            return;
            jy:
            $Xq = $c8->get_value("\x61\x70\160\156\x61\x6d\145");
            $CV = $c8->get_value("\x74\x65\x73\164\x5f\x63\157\x6e\146\151\x67");
            if (!is_multisite()) {
                goto a0;
            }
            if (!(empty($c8->get_value("\x72\x65\x64\151\x72\x65\143\x74\145\144\x5f\x74\157\x5f\163\x75\x62\163\151\164\145")) || $c8->get_value("\x72\145\x64\x69\162\x65\x63\164\x65\x64\x5f\x74\x6f\x5f\x73\x75\142\x73\151\164\x65") !== "\162\x65\x64\151\x72\x65\x63\164")) {
                goto Z9;
            }
            MO_Oauth_Debug::mo_oauth_log("\x52\x65\x64\x69\162\x65\143\x74\x69\156\147\x20\x66\157\x72\x20\155\x75\154\164\x69\x73\x74\x65\40\163\x75\142\163\x69\x74\x65");
            $blog_id = $c8->get_value("\x62\154\x6f\x67\137\x69\144");
            $Hb = get_site_url($blog_id);
            $c8->add_replace_entry("\x72\145\x64\x69\x72\x65\x63\164\x65\x64\x5f\164\x6f\137\x73\165\142\163\151\x74\145", "\162\145\x64\151\x72\145\143\x74");
            $BC = $c8->get_state();
            $Hb = $Hb . "\x3f\143\x6f\144\145\75" . $_REQUEST["\143\157\x64\145"] . "\x26\x73\164\x61\164\x65\x3d" . $BC;
            wp_redirect($Hb);
            exit;
            Z9:
            a0:
            $vR = $Xq ? $Xq : '';
            $Z3 = $Rg->mo_oauth_client_get_option("\x6d\x6f\x5f\x6f\x61\165\x74\150\137\141\x70\x70\x73\137\154\151\163\164");
            $XB = '';
            $j2 = '';
            $Sw = $Rg->get_app_by_name($vR);
            if ($Sw) {
                goto qj;
            }
            $Rg->handle_error("\101\160\160\154\x69\x63\141\x74\x69\x6f\x6e\x20\156\x6f\x74\40\x63\x6f\x6e\146\x69\x67\x75\x72\145\x64\56");
            MO_Oauth_Debug::mo_oauth_log("\x41\160\160\154\x69\x63\141\164\x69\x6f\156\x20\x6e\157\164\x20\143\157\156\x66\x69\147\x75\x72\145\x64\56");
            exit("\101\160\x70\x6c\x69\x63\141\x74\151\x6f\156\40\x6e\x6f\164\x20\143\157\x6e\x66\x69\x67\x75\x72\145\144\x2e");
            qj:
            $NY = $Sw->get_app_config();
            if (!(isset($NY["\x73\145\156\x64\137\x6e\x6f\156\x63\x65"]) && $NY["\163\145\x6e\x64\x5f\x6e\x6f\x6e\x63\145"] === 1)) {
                goto CA;
            }
            if (!(isset($_REQUEST["\x6e\157\x6e\143\x65"]) && !$Rg->get_transient("\155\157\137\157\x61\165\x74\150\137\x6e\157\156\x63\x65\137" . $_REQUEST["\156\157\x6e\x63\145"]))) {
                goto i4;
            }
            $qh = "\x4e\157\x6e\x63\x65\40\x76\x65\x72\151\146\151\x63\x61\x74\x69\157\x6e\x20\151\163\40\x66\141\151\x6c\x65\x64\x2e\x20\x50\x6c\145\141\x73\x65\40\x63\157\156\164\x61\143\x74\x20\164\157\40\171\157\x75\162\x20\141\x64\x6d\x69\156\x69\163\164\162\x61\164\x6f\x72\x2e";
            $Rg->handle_error($qh);
            MO_Oauth_Debug::mo_oauth_log($qh);
            wp_die($qh);
            i4:
            CA:
            $iE = $Sw->get_app_config("\160\153\x63\145\137\x66\x6c\157\167");
            $uz = $Sw->get_app_config("\160\x6b\x63\x65\x5f\143\154\x69\145\156\x74\137\163\145\143\162\x65\x74");
            $CF = array("\147\162\141\156\164\x5f\164\x79\x70\x65" => "\141\x75\164\x68\157\x72\151\x7a\141\x74\151\x6f\x6e\137\x63\x6f\x64\145", "\x63\x6c\x69\x65\x6e\164\x5f\151\144" => $NY["\143\x6c\151\x65\156\164\x5f\151\144"], "\162\x65\144\151\162\x65\x63\x74\x5f\x75\x72\151" => $NY["\x72\145\144\151\x72\x65\x63\x74\137\x75\162\x69"], "\x63\157\144\x65" => $_REQUEST["\x63\157\144\145"]);
            if (!(strpos($NY["\141\143\143\x65\x73\x73\164\157\153\x65\156\x75\162\x6c"], "\x73\x65\x72\x76\151\143\145\x73\x2f\x6f\141\x75\164\150\x32\57\164\157\x6b\x65\x6e") === false && strpos($NY["\141\x63\143\x65\x73\x73\x74\x6f\x6b\145\156\x75\x72\x6c"], "\x73\141\154\145\x73\146\x6f\x72\143\x65") === false && strpos($NY["\141\x63\x63\x65\163\163\164\157\x6b\145\x6e\165\162\154"], "\x2f\157\141\x6d\57\x6f\141\x75\164\150\x32\57\x61\143\143\x65\163\x73\x5f\x74\x6f\x6b\x65\x6e") === false)) {
                goto TD;
            }
            $CF["\x73\x63\157\x70\x65"] = $Sw->get_app_config("\x73\143\157\160\145");
            TD:
            if ($iE && 1 === $iE) {
                goto JF;
            }
            $CF["\x63\x6c\151\x65\x6e\x74\x5f\163\x65\143\x72\x65\164"] = $NY["\x63\154\x69\145\x6e\164\x5f\163\x65\143\x72\x65\164"];
            goto MA;
            JF:
            if (!($uz && 1 === $uz)) {
                goto Af;
            }
            $CF["\x63\x6c\x69\x65\156\x74\137\x73\x65\x63\x72\x65\164"] = $NY["\x63\154\x69\x65\156\x74\137\163\145\x63\162\x65\x74"];
            Af:
            $CF = apply_filters("\x6d\157\x5f\x6f\141\165\x74\150\x5f\141\144\144\x5f\143\154\151\x65\156\x74\137\x73\145\143\162\145\x74\x5f\160\153\x63\145\x5f\146\154\157\x77", $CF, $NY);
            $CF["\x63\157\x64\x65\x5f\166\x65\x72\x69\146\x69\145\162"] = $c8->get_value("\143\157\x64\x65\x5f\x76\145\162\x69\146\151\145\162");
            MA:
            $Hg = isset($NY["\163\x65\x6e\x64\x5f\150\x65\x61\144\145\162\163"]) ? $NY["\x73\145\156\x64\137\x68\145\141\144\x65\162\x73"] : 0;
            $e8 = isset($NY["\x73\x65\x6e\144\x5f\142\x6f\144\171"]) ? $NY["\163\x65\x6e\144\x5f\142\x6f\144\171"] : 0;
            if ("\x6f\160\x65\x6e\x69\x64\143\x6f\x6e\156\145\143\x74" === $Sw->get_app_config("\x61\160\160\137\164\171\x70\145")) {
                goto u9;
            }
            $J1 = $NY["\x61\x63\x63\x65\163\x73\164\x6f\x6b\145\156\165\162\x6c"];
            MO_Oauth_Debug::mo_oauth_log("\x4f\101\x75\x74\150\40\x66\x6c\x6f\167");
            if (strpos($NY["\x61\165\164\150\x6f\162\x69\172\x65\165\x72\x6c"], "\x63\x6c\145\x76\x65\x72\x2e\143\157\155\x2f\x6f\141\x75\x74\x68") != false || strpos($NY["\x61\143\x63\145\x73\x73\x74\x6f\153\x65\x6e\165\x72\x6c"], "\142\151\164\162\x69\x78") != false) {
                goto E_;
            }
            $ik = json_decode($this->oauth_handler->get_token($J1, $CF, $Hg, $e8), true);
            goto QY;
            E_:
            $ik = json_decode($this->oauth_handler->get_atoken($J1, $CF, $_GET["\143\157\x64\x65"], $Hg, $e8), true);
            QY:
            if (!(get_current_user_id() && $CV != 1)) {
                goto ED;
            }
            if (has_filter("\155\x6f\x5f\157\141\165\x74\x68\x5f\x62\162\x65\141\153\x5f\163\x73\x6f\x5f\x66\x6c\157\167")) {
                goto cn;
            }
            wp_clear_auth_cookie();
            wp_set_current_user(0);
            cn:
            ED:
            $_SESSION["\160\162\157\x63\157\162\145\137\141\x63\x63\x65\x73\x73\137\164\157\x6b\x65\156"] = isset($ik["\141\143\x63\145\163\163\x5f\x74\157\153\x65\x6e"]) ? $ik["\141\143\143\x65\x73\163\137\164\x6f\x6b\x65\156"] : false;
            if (isset($ik["\141\x63\143\x65\163\x73\137\164\x6f\x6b\x65\156"])) {
                goto qw;
            }
            do_action("\155\x6f\137\162\x65\x64\x69\x72\145\143\164\x5f\164\x6f\x5f\143\x75\x73\x74\157\x6d\x5f\145\x72\x72\x6f\x72\137\x70\x61\x67\145");
            $Rg->handle_error("\111\x6e\x76\141\x6c\151\144\x20\x74\x6f\x6b\145\x6e\x20\162\x65\143\145\x69\x76\x65\x64\56");
            MO_Oauth_Debug::mo_oauth_log("\x49\156\x76\x61\154\151\144\x20\x74\157\153\x65\156\40\x72\x65\143\145\x69\166\x65\x64\56");
            exit("\x49\x6e\166\x61\154\x69\x64\40\164\157\x6b\x65\x6e\x20\162\x65\x63\145\151\166\x65\144\56");
            qw:
            MO_Oauth_Debug::mo_oauth_log("\x54\x6f\153\x65\156\x20\122\x65\163\160\157\x6e\163\x65\40\75\x3e\40");
            MO_Oauth_Debug::mo_oauth_log($ik);
            $II = $NY["\162\x65\x73\157\165\162\143\x65\x6f\x77\156\145\162\x64\x65\164\x61\x69\154\163\x75\162\x6c"];
            if (!(substr($II, -1) === "\75")) {
                goto Th;
            }
            $II .= $ik["\141\x63\143\x65\x73\163\137\x74\157\x6b\x65\156"];
            Th:
            MO_Oauth_Debug::mo_oauth_log("\x41\x63\143\x65\x73\163\40\164\x6f\153\145\x6e\40\162\145\143\145\151\166\x65\x64\x2e");
            MO_Oauth_Debug::mo_oauth_log("\101\143\143\145\x73\x73\40\124\157\x6b\145\156\x20\75\x3e\x20" . $ik["\141\143\143\145\x73\163\x5f\164\157\x6b\x65\156"]);
            $so = false;
            MO_Oauth_Debug::mo_oauth_log("\x52\x65\x73\157\x75\x72\143\145\40\x4f\x77\156\145\x72\x20\75\x3e\40");
            if (!has_filter("\155\x6f\137\x75\163\x65\162\x69\x6e\x66\157\137\146\154\157\167\137\x66\157\x72\137\167\x61\x6c\155\141\x72\164")) {
                goto h8;
            }
            $so = apply_filters("\155\x6f\x5f\165\163\x65\162\x69\156\x66\157\137\x66\x6c\x6f\x77\137\146\157\162\137\167\x61\x6c\155\x61\162\164", $II, $ik, $CF, $vR, $NY);
            h8:
            if (!($so === false)) {
                goto YZ;
            }
            $h5 = null;
            $h5 = apply_filters("\x6d\157\x5f\160\157\154\141\162\137\162\145\147\x69\x73\164\145\x72\137\165\x73\145\x72", $ik);
            if (!(!empty($h5) && !empty($ik["\x78\137\x75\163\x65\x72\137\x69\x64"]))) {
                goto XT;
            }
            $II .= "\57" . $ik["\170\137\x75\x73\x65\162\137\x69\144"];
            XT:
            $so = $this->oauth_handler->get_resource_owner($II, $ik["\141\x63\x63\145\x73\163\137\x74\157\x6b\x65\156"]);
            $Zo = array();
            if (!(strpos($Sw->get_app_config("\141\x75\x74\x68\x6f\162\x69\172\x65\165\162\x6c"), "\154\x69\156\153\145\144\151\x6e") !== false && strpos($NY["\x73\x63\157\160\x65"], "\x72\x5f\145\x6d\141\x69\154\141\x64\144\x72\145\x73\163") != false)) {
                goto UI;
            }
            $XC = "\150\164\x74\160\163\72\57\x2f\141\x70\151\x2e\x6c\151\156\153\x65\144\x69\x6e\x2e\x63\x6f\x6d\x2f\166\62\x2f\145\x6d\141\x69\x6c\101\x64\144\162\145\x73\163\77\161\75\155\x65\x6d\x62\145\x72\163\x26\160\162\157\152\145\x63\164\151\x6f\156\x3d\50\145\x6c\145\x6d\145\156\164\x73\52\50\x68\x61\x6e\144\154\145\176\x29\51";
            $Zo = $this->oauth_handler->get_resource_owner($XC, $ik["\141\143\143\x65\x73\163\137\164\157\153\x65\156"]);
            UI:
            $so = array_merge($so, $Zo);
            YZ:
            if (!has_filter("\155\x6f\137\x63\150\145\143\153\137\x74\x6f\137\x65\170\145\143\x75\x74\145\137\160\157\x73\x74\137\x75\x73\145\x72\x69\x6e\x66\x6f\x5f\146\154\157\167\137\146\157\x72\137\167\x61\154\x6d\141\162\164")) {
                goto mP;
            }
            $so = apply_filters("\x6d\157\x5f\143\150\145\143\x6b\x5f\x74\157\x5f\x65\170\x65\143\x75\x74\x65\x5f\x70\x6f\163\x74\137\x75\163\x65\162\x69\156\146\157\137\x66\x6c\x6f\x77\x5f\x66\x6f\162\x5f\167\141\x6c\155\141\x72\x74", $so, $vR, $NY);
            mP:
            MO_Oauth_Debug::mo_oauth_log($so);
            if (has_filter("\155\157\137\147\145\164\137\x74\x6f\x6b\145\x6e\137\146\157\x72\137\x6e\x65\x6f\156\137\155\x65\x6d\x62\x65\x72\163\x68\x69\x70")) {
                goto y1;
            }
            $g8 = apply_filters("\x6d\x6f\137\x74\162\137\x61\x66\x74\x65\162\x5f\x70\x72\x6f\x66\151\x6c\145\137\x69\x6e\146\x6f\137\x65\170\164\162\141\x63\164\x69\157\x6e\x5f\146\x72\157\155\x5f\x74\157\x6b\145\x6e", $so);
            goto mA;
            y1:
            $g8 = apply_filters("\x6d\157\x5f\x67\x65\164\137\164\x6f\153\x65\x6e\137\146\x6f\x72\137\156\x65\157\156\x5f\x6d\x65\155\142\145\x72\x73\x68\151\x70", $so, $ik["\141\x63\143\x65\163\163\x5f\164\x6f\153\145\x6e"]);
            mA:
            if (!($g8 != '' && is_array($g8))) {
                goto qI;
            }
            $so = array_merge($so, $g8);
            qI:
            $Sy = apply_filters("\141\x63\143\162\x65\x64\151\164\151\157\156\163\137\x65\156\144\x70\157\151\156\164", $ik["\x61\143\143\x65\163\163\137\x74\x6f\153\x65\156"]);
            if (!($Sy !== '' && is_array($Sy))) {
                goto TQ;
            }
            $so = array_merge($so, $Sy);
            TQ:
            if (!has_filter("\155\x6f\x5f\x70\x6f\154\x61\162\137\162\145\147\x69\163\164\145\162\x5f\165\163\x65\162")) {
                goto pV;
            }
            $Yf = array();
            $Yf["\x74\157\x6b\x65\x6e"] = $ik["\141\143\143\x65\163\x73\137\164\x6f\153\x65\x6e"];
            $so = array_merge($so, $Yf);
            pV:
            if (!(strpos($Sw->get_app_config("\x61\x75\x74\150\157\x72\151\x7a\x65\x75\x72\x6c"), "\x64\151\x73\x63\x6f\162\x64") !== false)) {
                goto xL;
            }
            apply_filters("\x6d\x6f\137\x64\151\163\137\x75\x73\145\x72\137\x61\x74\x74\145\x6e\144\x61\156\x63\x65", $so["\x69\x64"]);
            $a5 = apply_filters("\x6d\157\x5f\144\162\x6d\x5f\x67\x65\164\x5f\x75\x73\145\x72\137\162\x6f\154\x65\x73", array_key_exists("\x69\x64", $so) ? $so["\x69\144"] : '');
            if (!(false !== $a5)) {
                goto Le;
            }
            MO_Oauth_Debug::mo_oauth_log("\104\151\x73\x63\x6f\162\x64\x20\122\x6f\154\145\163\40\75\76\40");
            MO_Oauth_Debug::mo_oauth_log($a5);
            $so["\x72\157\x6c\x65\163"] = $a5;
            Le:
            if (!(!$CV && '' == $CV)) {
                goto aQ;
            }
            do_action("\x6d\x6f\137\x6f\141\x75\164\150\137\141\x64\144\x5f\144\151\163\x5f\x75\x73\x65\162\137\163\145\x72\166\145\162", get_current_user_id(), $ik, $so);
            aQ:
            xL:
            if (!(isset($NY["\x73\x65\x6e\144\137\156\157\156\143\x65"]) && $NY["\163\145\156\144\x5f\x6e\x6f\156\x63\145"] === 1)) {
                goto nN;
            }
            if (!(isset($so["\156\157\156\x63\x65"]) && $so["\156\x6f\x6e\x63\x65"] != NULL)) {
                goto wn;
            }
            if ($Rg->get_transient("\x6d\157\137\x6f\141\165\x74\150\x5f\156\157\x6e\143\x65\x5f" . $so["\156\x6f\156\x63\145"])) {
                goto P2;
            }
            $qh = "\x4e\157\x6e\143\x65\x20\166\145\x72\151\146\151\143\x61\x74\151\157\x6e\x20\x69\163\x20\146\141\151\x6c\x65\144\x2e\x20\120\154\145\141\x73\145\40\x63\x6f\x6e\164\x61\x63\x74\40\164\x6f\40\x79\157\x75\162\x20\141\144\155\x69\156\x69\x73\x74\x72\141\x74\157\x72\56";
            $Rg->handle_error($qh);
            MO_Oauth_Debug::mo_oauth_log($qh);
            wp_die($qh);
            goto uL;
            P2:
            $Rg->delete_transient("\x6d\157\x5f\157\141\165\x74\150\x5f\156\157\156\143\145\x5f" . $so["\x6e\157\x6e\143\x65"]);
            uL:
            wn:
            nN:
            $n_ = [];
            $vc = $this->dropdownattrmapping('', $so, $n_);
            $Rg->mo_oauth_client_update_option("\155\x6f\137\157\141\x75\164\150\x5f\x61\164\164\162\137\x6e\141\155\145\x5f\x6c\151\x73\x74" . $vR, $vc);
            if (!($CV && '' !== $CV)) {
                goto VU;
            }
            $this->handle_group_test_conf($so, $NY, $ik["\x61\x63\143\x65\163\163\x5f\164\x6f\153\x65\x6e"], false, $CV);
            exit;
            VU:
            goto GB;
            u9:
            MO_Oauth_Debug::mo_oauth_log("\x4f\x70\145\156\111\x44\40\x43\x6f\156\x6e\x65\143\164\x20\146\154\x6f\167");
            $ik = json_decode($this->oauth_handler->get_token($NY["\x61\x63\143\x65\163\163\164\157\153\x65\x6e\x75\x72\x6c"], $CF, $Hg, $e8), true);
            MO_Oauth_Debug::mo_oauth_log("\124\x6f\x6b\x65\x6e\x20\122\x65\x73\160\157\x6e\x73\x65\x20\75\x3e\x20");
            MO_Oauth_Debug::mo_oauth_log($ik);
            $g7 = [];
            try {
                $g7 = $this->resolve_and_get_oidc_response($ik);
            } catch (\Exception $sw) {
                $Rg->handle_error($sw->getMessage());
                MO_Oauth_Debug::mo_oauth_log("\x49\156\x76\141\154\151\x64\40\x52\x65\x73\x70\157\156\x73\x65\x20\x72\145\143\145\151\x76\145\144\x2e");
                do_action("\x6d\157\x5f\162\x65\144\x69\162\x65\143\164\137\x74\x6f\137\143\165\x73\x74\157\155\137\145\162\x72\157\162\137\x70\x61\147\145");
                wp_die("\111\x6e\x76\x61\154\x69\144\x20\x52\145\x73\160\x6f\x6e\x73\145\40\162\145\x63\x65\151\x76\145\x64\x2e");
                exit;
            }
            MO_Oauth_Debug::mo_oauth_log("\x49\x44\x20\x54\157\x6b\145\156\40\162\x65\143\x65\151\x76\145\x64\x20\x53\165\143\143\145\x73\163\146\165\154\x6c\x79");
            MO_Oauth_Debug::mo_oauth_log("\x49\x44\40\x54\157\x6b\x65\156\40\x3d\x3e\x20");
            MO_Oauth_Debug::mo_oauth_log($g7);
            $so = $this->get_resource_owner_from_app($g7, $vR);
            MO_Oauth_Debug::mo_oauth_log("\122\x65\163\157\x75\162\143\x65\x20\117\167\x6e\x65\162\40\75\76\40");
            MO_Oauth_Debug::mo_oauth_log($so);
            if (!(strpos($Sw->get_app_config("\x61\x75\164\x68\157\162\x69\172\145\x75\162\x6c"), "\164\167\x69\x74\143\x68") !== false)) {
                goto LW;
            }
            $vO = apply_filters("\x6d\157\x5f\164\x73\155\x5f\x67\x65\x74\x5f\165\x73\x65\x72\137\163\165\x62\163\143\x72\x69\x70\164\151\157\156", $so["\163\165\x62"], $NY["\x63\154\x69\145\156\x74\137\151\144"], $ik["\x61\143\143\145\163\x73\137\164\157\153\145\156"]);
            if (!(false !== $vO)) {
                goto mv;
            }
            MO_Oauth_Debug::mo_oauth_log("\x54\x77\x69\164\x63\150\x20\x53\165\142\x73\143\162\151\x70\164\151\157\x6e\40\x3d\76\40");
            MO_Oauth_Debug::mo_oauth_log($vO);
            $so["\163\165\x62\x73\x63\x72\x69\160\164\151\x6f\x6e"] = $vO;
            mv:
            LW:
            if (!($Sw->get_app_config("\x61\x70\160\111\x64") === "\153\x65\x79\x63\x6c\157\141\153")) {
                goto I3;
            }
            $Wu = apply_filters("\x6d\x6f\137\153\x72\x6d\137\147\x65\164\x5f\x75\x73\145\162\137\162\157\x6c\x65\x73", $so, $ik);
            if (!(false !== $Wu)) {
                goto Oc;
            }
            $so["\162\x6f\154\145\163"] = $Wu;
            Oc:
            I3:
            $so = apply_filters("\x6d\157\137\141\172\x75\162\x65\x62\62\143\137\147\x65\164\137\165\x73\145\162\137\x67\x72\x6f\165\x70\137\151\x64\x73", $so, $NY);
            $g8 = apply_filters("\x6d\x6f\x5f\x74\162\137\x61\146\164\145\162\x5f\x70\162\157\x66\151\154\145\137\x69\156\146\157\137\145\170\x74\162\x61\143\164\x69\157\156\x5f\x66\x72\157\155\137\164\157\153\x65\x6e", $so);
            if (!($g8 != '' && is_array($g8))) {
                goto mH;
            }
            $so = array_merge($so, $g8);
            mH:
            if (!(isset($NY["\x73\145\x6e\x64\137\156\x6f\156\143\x65"]) && $NY["\x73\x65\156\144\x5f\156\157\x6e\143\x65"] === 1)) {
                goto lD;
            }
            if (!(isset($so["\x6e\x6f\156\143\x65"]) && $so["\x6e\157\x6e\x63\145"] != NULL)) {
                goto E2;
            }
            if ($Rg->get_transient("\155\x6f\x5f\157\x61\165\164\x68\137\x6e\x6f\x6e\x63\145\x5f" . $so["\156\157\x6e\143\x65"])) {
                goto kg;
            }
            $qh = "\116\x6f\156\143\x65\x20\166\x65\x72\x69\146\x69\143\x61\164\x69\157\x6e\40\151\x73\x20\146\x61\151\x6c\x65\x64\x2e\x20\120\x6c\145\141\x73\145\40\x63\157\x6e\x74\141\143\164\40\x74\x6f\40\x79\157\x75\162\40\x61\x64\x6d\x69\156\151\x73\x74\162\x61\x74\x6f\x72\56";
            $Rg->handle_error($qh);
            MO_Oauth_Debug::mo_oauth_log($qh);
            wp_die($qh);
            goto uN;
            kg:
            $Rg->delete_transient("\155\157\x5f\157\141\x75\x74\150\137\156\157\156\143\x65\x5f" . $so["\x6e\157\156\x63\145"]);
            uN:
            E2:
            lD:
            $n_ = [];
            $vc = $this->dropdownattrmapping('', $so, $n_);
            $Rg->mo_oauth_client_update_option("\155\x6f\137\x6f\141\x75\x74\x68\137\141\x74\x74\x72\137\x6e\x61\x6d\145\137\x6c\x69\163\x74" . $vR, $vc);
            if (!($CV && '' !== $CV)) {
                goto gz;
            }
            $ik["\x72\145\146\162\x65\x73\150\x5f\x74\157\153\145\156"] = isset($ik["\x72\145\146\162\145\x73\x68\x5f\164\157\x6b\145\156"]) ? $ik["\x72\x65\146\x72\145\x73\x68\137\x74\157\x6b\145\156"] : '';
            $_SESSION["\160\x72\157\x63\157\x72\145\x5f\x72\145\146\162\145\163\150\x5f\164\157\153\x65\x6e"] = $ik["\x72\x65\146\162\145\x73\150\137\x74\157\153\x65\156"];
            $Uj = isset($ik["\141\143\143\x65\163\163\x5f\x74\x6f\x6b\x65\x6e"]) ? $ik["\141\x63\143\x65\x73\163\x5f\x74\x6f\153\x65\x6e"] : '';
            $this->handle_group_test_conf($so, $NY, $Uj, false, $CV);
            MO_Oauth_Debug::mo_oauth_log("\101\164\x74\x72\151\142\x75\164\145\x20\122\x65\143\145\x69\166\x65\144\x20\x53\165\x63\x63\x65\x73\163\x66\165\x6c\154\x79");
            exit;
            gz:
            GB:
            if (!(isset($NY["\x67\162\157\x75\x70\144\x65\164\141\x69\x6c\163\x75\162\x6c"]) && !empty($NY["\x67\162\157\165\160\x64\x65\164\141\151\x6c\x73\x75\x72\x6c"]))) {
                goto n3;
            }
            $so = $this->handle_group_user_info($so, $NY, $ik["\x61\x63\x63\x65\163\163\137\164\x6f\x6b\x65\156"]);
            MO_Oauth_Debug::mo_oauth_log("\x47\x72\157\x75\160\40\x44\145\164\141\151\154\x73\x20\x4f\x62\164\141\x69\156\145\x64\x20\75\76\40");
            MO_Oauth_Debug::mo_oauth_log($so);
            n3:
            MO_Oauth_Debug::mo_oauth_log("\106\x65\x74\143\x68\145\x64\x20\x72\x65\x73\157\x75\x72\x63\x65\40\157\167\156\145\x72\x20\72\x20" . json_encode($so));
            if (!has_filter("\167\x6f\157\143\x6f\155\155\145\x72\x63\x65\137\143\150\145\x63\153\157\x75\164\x5f\x67\145\164\x5f\166\x61\x6c\x75\145")) {
                goto y6;
            }
            $so["\141\160\x70\156\x61\x6d\x65"] = $vR;
            y6:
            do_action("\155\x6f\x5f\141\142\x72\137\x66\x69\154\x74\x65\162\137\154\x6f\x67\x69\x6e", $so);
            $this->handle_sso($vR, $NY, $so, $OC, $ik);
        } catch (Exception $sw) {
            $Rg->handle_error($sw->getMessage());
            MO_Oauth_Debug::mo_oauth_log($sw->getMessage());
            do_action("\x6d\x6f\x5f\162\145\x64\x69\162\145\143\164\137\x74\x6f\137\143\x75\x73\x74\157\x6d\x5f\x65\x72\162\x6f\162\x5f\x70\141\x67\145");
            exit(esc_html($sw->getMessage()));
        }
        goto lb;
        gJ:
        try {
            if (isset($_COOKIE["\x73\x74\x61\164\145\x5f\160\141\162\x61\x6d"])) {
                goto BB;
            }
            if (isset($_GET["\x73\x74\x61\164\x65"])) {
                goto c2;
            }
            $P4 = new StorageManager();
            if (!is_multisite()) {
                goto Vw;
            }
            $P4->add_replace_entry("\142\154\x6f\147\137\x69\144", 1);
            Vw:
            $r0 = $Rg->get_app_by_name();
            if (isset($_GET["\141\160\x70\x5f\156\x61\x6d\145"])) {
                goto Kk;
            }
            $P4->add_replace_entry("\x61\160\160\156\x61\155\x65", $r0->get_app_name());
            goto WR;
            Kk:
            $P4->add_replace_entry("\x61\x70\160\x6e\141\x6d\x65", sanitize_text_field(wp_unslash($_GET["\x61\160\160\137\x6e\141\155\145"])));
            WR:
            $P4->add_replace_entry("\x74\145\163\164\x5f\143\x6f\x6e\x66\151\x67", false);
            $P4->add_replace_entry("\162\x65\144\x69\162\145\143\164\137\x75\162\151", site_url());
            $OC = $P4->get_state();
            goto fZ;
            c2:
            $OC = sanitize_text_field(wp_unslash($_GET["\163\x74\x61\x74\x65"]));
            fZ:
            goto wz;
            BB:
            $OC = sanitize_text_field(wp_unslash($_COOKIE["\x73\164\141\x74\x65\137\x70\141\x72\x61\x6d"]));
            wz:
            $c8 = new StorageManager($OC);
            if (!empty($c8->get_value("\x61\x70\x70\156\x61\x6d\145"))) {
                goto WW;
            }
            return;
            WW:
            $Xq = $c8->get_value("\141\160\160\156\x61\155\145");
            $CV = $c8->get_value("\x74\x65\163\x74\x5f\143\157\156\146\x69\x67");
            $vR = $Xq ? $Xq : '';
            $Z3 = $Rg->mo_oauth_client_get_option("\x6d\157\137\x6f\x61\x75\x74\x68\x5f\x61\x70\160\163\137\154\151\163\164");
            $XB = '';
            $j2 = '';
            $Sw = $Rg->get_app_by_name($vR);
            if ($Sw) {
                goto dK;
            }
            $Rg->handle_error("\x41\x70\x70\x6c\151\143\x61\x74\x69\x6f\x6e\x20\x6e\x6f\164\40\x63\x6f\x6e\x66\x69\147\x75\x72\x65\x64\56");
            MO_Oauth_Debug::mo_oauth_log("\x41\160\160\x6c\151\143\141\164\151\157\156\x20\156\x6f\164\x20\x63\x6f\156\x66\151\x67\165\x72\145\144\56");
            exit("\101\x70\160\x6c\151\143\141\x74\x69\x6f\x6e\x20\x6e\x6f\164\40\x63\157\156\x66\x69\147\165\162\x65\x64\x2e");
            dK:
            $NY = $Sw->get_app_config();
            if (!(isset($NY["\x73\145\156\144\x5f\156\x6f\156\143\145"]) && $NY["\x73\145\x6e\x64\x5f\156\157\156\x63\145"] === 1)) {
                goto PH;
            }
            if (!(isset($_REQUEST["\156\157\156\x63\x65"]) && !$Rg->get_transient("\x6d\157\137\x6f\141\165\x74\x68\137\156\157\156\x63\145\x5f" . sanitize_text_field(wp_unslash($_REQUEST["\x6e\x6f\x6e\143\145"]))))) {
                goto DC;
            }
            $qh = "\x4e\157\156\143\145\x20\x76\145\162\x69\146\x69\143\141\164\x69\157\156\x20\151\163\x20\x66\x61\151\x6c\145\x64\x2e\40\x50\154\x65\x61\x73\145\40\x63\x6f\156\x74\141\x63\x74\40\x74\x6f\x20\x79\157\x75\162\x20\141\x64\x6d\151\156\x69\163\164\x72\141\164\157\x72\56";
            $Rg->handle_error($qh);
            MO_Oauth_Debug::mo_oauth_log($qh);
            wp_die(esc_html($qh));
            DC:
            PH:
            $CF = array("\x67\162\141\156\164\x5f\164\x79\x70\x65" => "\162\145\x66\162\145\x73\150\137\164\x6f\153\145\156", "\x63\154\x69\x65\156\164\x5f\151\x64" => $NY["\x63\x6c\x69\145\x6e\164\137\x69\x64"], "\x72\145\144\x69\x72\x65\143\164\x5f\x75\162\x69" => $NY["\x72\145\144\x69\162\x65\x63\164\137\165\x72\x69"], "\x72\x65\146\x72\145\x73\x68\137\x74\x6f\153\145\156" => $_POST["\162\145\x66\x72\145\163\x68\137\x74\157\x6b\x65\156"], "\163\x63\157\160\x65" => $Sw->get_app_config("\x73\x63\x6f\x70\145"), "\143\154\151\145\x6e\x74\137\x73\145\x63\162\145\164" => $NY["\143\154\x69\145\x6e\x74\137\163\x65\x63\162\x65\x74"]);
            $Hg = isset($NY["\163\x65\x6e\144\137\150\145\x61\144\145\x72\163"]) ? $NY["\x73\145\156\144\137\150\x65\141\x64\145\162\163"] : 0;
            $e8 = isset($NY["\x73\x65\156\144\137\142\x6f\x64\171"]) ? $NY["\x73\145\x6e\x64\137\x62\x6f\144\x79"] : 0;
            $J1 = $NY["\141\143\143\x65\163\x73\164\157\153\145\x6e\x75\162\x6c"];
            MO_Oauth_Debug::mo_oauth_log("\117\101\x75\x74\150\40\146\154\157\167");
            $ik = json_decode($this->oauth_handler->get_token($J1, $CF, $Hg, $e8), true);
            $dW = isset($ik["\141\143\143\x65\x73\163\x5f\x74\x6f\153\x65\x6e"]) ? $ik["\x61\x63\x63\145\x73\x73\x5f\164\x6f\153\145\156"] : false;
            if (isset($dW)) {
                goto pb;
            }
            do_action("\x6d\157\137\x72\145\x64\x69\x72\145\x63\x74\137\x74\157\x5f\143\x75\163\x74\x6f\155\137\145\162\162\157\x72\x5f\x70\x61\147\145");
            $Rg->handle_error("\x49\156\x76\141\x6c\151\144\x20\x74\x6f\x6b\145\x6e\40\162\x65\143\x65\x69\166\x65\144\56");
            MO_Oauth_Debug::mo_oauth_log("\111\x6e\x76\141\154\x69\x64\x20\164\x6f\153\x65\156\40\x72\x65\143\x65\x69\166\145\x64\x2e");
            exit("\x49\x6e\x76\x61\154\x69\x64\x20\164\157\153\x65\x6e\x20\162\145\143\x65\x69\166\145\144\x2e");
            pb:
            MO_Oauth_Debug::mo_oauth_log("\x54\157\x6b\x65\156\x20\x52\145\x73\x70\x6f\x6e\x73\x65\40\x3d\76\40");
            MO_Oauth_Debug::mo_oauth_log($ik);
            $II = $NY["\x72\145\x73\157\165\162\x63\x65\x6f\167\156\145\x72\x64\145\x74\141\x69\x6c\x73\165\162\154"];
            if (!(substr($II, -1) == "\75" && !empty($ik["\165\163\x65\162\x4e\x61\x6d\x65"]))) {
                goto Wt;
            }
            $II .= strtolower($ik["\165\163\145\162\116\141\x6d\145"]);
            Wt:
            MO_Oauth_Debug::mo_oauth_log("\101\143\x63\x65\163\x73\x20\x74\157\x6b\145\156\40\162\x65\x63\x65\x69\166\x65\144\x2e");
            MO_Oauth_Debug::mo_oauth_log("\x41\x63\x63\x65\x73\163\x20\124\157\153\145\x6e\40\x3d\x3e\40");
            MO_Oauth_Debug::mo_oauth_log($dW);
            $so = false;
            if (!($so === false)) {
                goto rm;
            }
            $so = $this->oauth_handler->get_resource_owner($II, $dW);
            rm:
            MO_Oauth_Debug::mo_oauth_log($so);
            $n_ = [];
            $vc = $this->dropdownattrmapping('', $so, $n_);
            $Rg->mo_oauth_client_update_option("\155\157\137\157\141\165\164\x68\x5f\141\x74\x74\162\137\156\141\155\x65\x5f\154\151\163\164" . $vR, $vc);
            if (!($CV && '' !== $CV)) {
                goto wp;
            }
            $this->handle_group_test_conf($so, $NY, $dW, false, $CV);
            exit;
            wp:
            if (!(isset($NY["\x67\x72\157\x75\160\144\x65\164\x61\x69\x6c\163\x75\162\x6c"]) && !empty($NY["\x67\x72\x6f\165\160\x64\145\x74\x61\151\x6c\x73\165\162\x6c"]))) {
                goto Hj;
            }
            $so = $this->handle_group_user_info($so, $NY, $dW);
            MO_Oauth_Debug::mo_oauth_log("\107\162\x6f\165\x70\x20\x44\x65\x74\141\151\x6c\x73\x20\117\x62\x74\141\x69\x6e\145\x64\40\75\76\40" . $so);
            Hj:
            MO_Oauth_Debug::mo_oauth_log("\x46\x65\164\x63\x68\145\144\40\162\x65\163\x6f\x75\x72\143\x65\40\157\167\x6e\x65\x72\40\72\40" . json_encode($so));
            if (!has_filter("\x77\157\157\143\x6f\x6d\x6d\x65\x72\x63\x65\x5f\143\150\145\143\x6b\x6f\x75\x74\x5f\x67\145\x74\137\166\x61\x6c\x75\x65")) {
                goto I6;
            }
            $so["\141\x70\x70\x6e\x61\155\x65"] = $vR;
            I6:
            do_action("\x6d\x6f\x5f\x61\x62\162\x5f\x66\x69\x6c\x74\145\x72\137\154\x6f\x67\151\156", $so);
            $this->handle_sso($vR, $NY, $so, $OC, $ik);
        } catch (Exception $sw) {
            $Rg->handle_error($sw->getMessage());
            MO_Oauth_Debug::mo_oauth_log($sw->getMessage());
            do_action("\155\x6f\137\x72\x65\x64\x69\162\145\x63\x74\137\164\x6f\x5f\x63\165\x73\164\157\155\x5f\145\162\162\157\x72\137\160\x61\147\145");
            exit(esc_html($sw->getMessage()));
        }
        lb:
    }
