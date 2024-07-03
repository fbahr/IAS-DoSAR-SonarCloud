<?php

$GLOBALS["kqlajclh"] = "config";
$GLOBALS["ognjlos"] = "value";
$GLOBALS["mkygrpsnnj"] = "key";
$GLOBALS["xyzuenvkfg"] = "posts";
$GLOBALS["ptqgivmcsmui"] = "config";
$GLOBALS["wntjdlevoyy"] = "errMessage";
if (!defined("BASEPATH")) {
    exit("Unable to view file.");
}
$oxwfvpfrp = "config";
$GLOBALS["dlunks"] = "config";
$GLOBALS["mzvhzmjuzle"] = "config";
$ynymydzxwcr = "config";
require "BASE_PATH/template/admin/common/sidebar.php";
${$GLOBALS["wntjdlevoyy"]} = "";
if (isset($_POST["submit"])) {
    $GLOBALS["hcjltzcndyw"] = "errMessage";
    ${$GLOBALS["xyzuenvkfg"]} = $db->EscapeString($_POST["set"]);
    foreach (${$GLOBALS["xyzuenvkfg"]} as ${$GLOBALS["mkygrpsnnj"]} => ${$GLOBALS["ognjlos"]}) {
        $GLOBALS["bgjysphoos"] = "value";
        $wbxirnsdwae = "key";
        $GLOBALS["gqckupvb"] = "config";
        if ($config[$key] != $value) {
            $GLOBALS["jqmcxgbwgymp"] = "value";
            $GLOBALS["rendhvcnx"] = "config";
            $db->Query("UPDATE `site_config` SET `config_value`='" . $value . "' WHERE `config_name`='" . ${$GLOBALS["mkygrpsnnj"]} . "'");
            $config[${$GLOBALS["mkygrpsnnj"]}] = ${$GLOBALS["ognjlos"]};
        }
    }
    ${$GLOBALS["hcjltzcndyw"]} = "<div class=\"alert alert-success mt-2\"><b>SUCCESS:</b> Settings were successfully changed!</div>";
}
$GLOBALS["jdkuzln"] = "config";
echo "<main id=\"main\" class=\"main\">\n<div class=\"pagetitle\">\n  <h1>Settings</h1>\n  <nav>\n\t<ol class=\"breadcrumb\">\n\t  <li class=\"breadcrumb-item\"><a href=\"";
echo GenerateURL("dashboard", false, true);
echo "\">Home</a></li>\n\t  <li class=\"breadcrumb-item\">Settings</li>\n\t</ol>\n  </nav>\n</div>\n<section class=\"section\">\n  <div class=\"row\">\n    ";
$GLOBALS["nbnagcclu"] = "config";
echo ${$GLOBALS["wntjdlevoyy"]};
$GLOBALS["eytjhtclv"] = "config";
echo "\t<div class=\"col-lg-6\">\n\t  <div class=\"card\">\n\t\t<div class=\"card-body\">\n\t\t  <h5 class=\"card-title\">General Settings</h5>\n\t\t  <form method=\"POST\" class=\"row g-3\">\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"site_logo\" class=\"form-label\">Website Name</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[site_logo]\" value=\"";
$GLOBALS["kofotneuly"] = "config";
$ciqxhmuz = "config";
$biypxdcsnqrn = "config";
$GLOBALS["cjtgkmgxm"] = "config";
echo ${$GLOBALS["kqlajclh"]}["site_logo"];
echo "\" id=\"site_logo\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"site_name\" class=\"form-label\">Website Title</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[site_name]\" value=\"";
echo $config["site_name"];
echo "\" id=\"site_name\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-12\">\n\t\t\t  <label for=\"site_description\" class=\"form-label\">Meta Description</label>\n\t\t\t  <textarea name=\"set[site_description]\" class=\"form-control\" id=\"site_description\" required>";
echo ${$ynymydzxwcr}["site_description"];
echo "</textarea>\n\t\t\t</div>\n\t\t\t<div class=\"col-12\">\n\t\t\t  <label for=\"site_keywords\" class=\"form-label\">Meta Keywords</label>\n\t\t\t  <textarea name=\"set[site_keywords]\" class=\"form-control\" id=\"site_keywords\" required>";
echo $config["site_keywords"];
echo "</textarea>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"site_url\" class=\"form-label\">Non-Secure Site URL (HTTP)</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[site_url]\" value=\"";
echo ${$oxwfvpfrp}["site_url"];
echo "\" id=\"site_url\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"secure_url\" class=\"form-label\">Secure Site URL (HTTPS)</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[secure_url]\" value=\"";
echo $config["secure_url"];
echo "\" id=\"secure_url\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-12\">\n\t\t\t  <label for=\"force_secure\" class=\"form-label\">Redirect non-secure to secure URL</label>\n\t\t\t  <select name=\"set[force_secure]\" class=\"form-control\">\n\t\t\t\t<option value=\"0\">Disabled</option>\n\t\t\t\t<option value=\"1\"";
echo $config["force_secure"] == 1 ? " selected" : "";
echo ">Enabled</option>\n\t\t\t  </select>\n\t\t\t</div>\n\t\t\t<div class=\"col-12\">\n\t\t\t  <label for=\"mod_rewrite\" class=\"form-label\">SEO Friendly URLs</label>\n\t\t\t  <select name=\"set[mod_rewrite]\" class=\"form-control\">\n\t\t\t\t<option value=\"0\">Disabled</option>\n\t\t\t\t<option value=\"1\"";
$ujyllpophbkm = "config";
echo $config["mod_rewrite"] == 1 ? " selected" : "";
echo ">Enabled</option>\n\t\t\t  </select>\n\t\t\t</div>\n\t\t\t<div class=\"col-12\">\n\t\t\t  <label for=\"analytics_id\" class=\"form-label\">Analytics ID</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[analytics_id]\" value=\"";
echo ${$GLOBALS["dlunks"]}["analytics_id"];
echo "\" id=\"analytics_id\">\n\t\t\t</div>\n\t\t\t<div class=\"text-center\">\n\t\t\t  <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Save</button>\n\t\t\t</div>\n\t\t  </form>\n\t\t</div>\n\t  </div>\n\t</div>\n\t<div class=\"col-lg-6\">\n\t  <div class=\"card\">\n\t\t<div class=\"card-body\">\n\t\t  <h5 class=\"card-title\">Mailing Settings</h5>\n\t\t  <form method=\"POST\" class=\"row g-3\">\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"site_email\" class=\"form-label\">Contact Email</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[site_email]\" value=\"";
echo ${$GLOBALS["kqlajclh"]}["site_email"];
echo "\" id=\"site_email\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"noreply_email\" class=\"form-label\">NoReply Email</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[noreply_email]\" value=\"";
echo ${$GLOBALS["kqlajclh"]}["noreply_email"];
echo "\" id=\"noreply_email\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"mail_delivery_method\" class=\"form-label\">Mail delivery method</label>\n\t\t\t  <select name=\"set[mail_delivery_method]\" class=\"form-control\">\n\t\t\t\t<option value=\"0\">PHP Mail()</option>\n\t\t\t\t<option value=\"1\"";
$GLOBALS["zbqvhgkssnf"] = "config";
echo $config["mail_delivery_method"] == 1 ? " selected" : "";
echo ">SMTP</option>\n\t\t\t  </select>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"smtp_host\" class=\"form-label\">SMTP Host</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[smtp_host]\" value=\"";
echo ${$GLOBALS["mzvhzmjuzle"]}["smtp_host"];
$lrkqyiqs = "config";
echo "\" id=\"smtp_host\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"smtp_port\" class=\"form-label\">SMTP Port</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[smtp_port]\" value=\"";
echo $config["smtp_port"];
echo "\" id=\"smtp_port\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"smtp_auth\" class=\"form-label\">SMTP Auth</label>\n\t\t\t  <select name=\"set[smtp_auth]\" class=\"form-control\">\n\t\t\t\t<option value=\"0\">N/A</option>\n\t\t\t\t<option value=\"ssl\"";
echo ${$GLOBALS["ptqgivmcsmui"]}["smtp_auth"] == "ssl" ? " selected" : "";
echo ">SSL</option>\n\t\t\t\t<option value=\"tls\"";
echo $config["smtp_auth"] == "tls" ? " selected" : "";
echo ">TLS</option>\n\t\t\t  </select>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"smtp_username\" class=\"form-label\">SMTP Username</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[smtp_username]\" value=\"";
echo ${$GLOBALS["kqlajclh"]}["smtp_username"];
echo "\" id=\"smtp_username\" required>\n\t\t\t</div>\n\t\t\t<div class=\"col-6\">\n\t\t\t  <label for=\"smtp_password\" class=\"form-label\">SMTP Password</label>\n\t\t\t  <input type=\"text\" class=\"form-control\" name=\"set[smtp_password]\" value=\"";
echo $config["smtp_password"];
echo "\" id=\"smtp_password\" required>\n\t\t\t</div>\n\t\t\t<div class=\"text-center\">\n\t\t\t  <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Save</button>\n\t\t\t</div>\n\t\t  </form>\n\t\t</div>\n\t  </div>\n\t  <div class=\"card\">\n\t\t<div class=\"card-body\">\n\t\t  <h5 class=\"card-title\">Other Settings</h5>\n\t\t  <form method=\"POST\" class=\"row g-3\">\n\t\t\t<div class=\"col-12\">\n\t\t\t  <label for=\"more_per_ip\" class=\"form-label\">Allow multiple accounts</label>\n\t\t\t  <select name=\"set[more_per_ip]\" class=\"form-control\">\n\t\t\t\t<option value=\"0\">False</option>\n\t\t\t\t<option value=\"1\"";
echo $config["more_per_ip"] == 1 ? " selected" : "";
echo ">True</option>\n\t\t\t  </select>\n\t\t\t</div>\n\t\t\t<div class=\"col-12\">\n\t\t\t  <label for=\"reg_reqmail\" class=\"form-label\">Require email confirmation</label>\n\t\t\t  <select name=\"set[reg_reqmail]\" class=\"form-control\">\n\t\t\t\t<option value=\"0\">False</option>\n\t\t\t\t<option value=\"1\"";
echo ${$GLOBALS["kqlajclh"]}["reg_reqmail"] == 1 ? " selected" : "";
echo ">True</option>\n\t\t\t  </select>\n\t\t\t</div>\n\t\t\t<div class=\"text-center\">\n\t\t\t  <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Save</button>\n\t\t\t</div>\n\t\t  </form>\n\t\t</div>\n\t  </div>\n\t</div>\n  </div>\n</section>\n</main>\n";
