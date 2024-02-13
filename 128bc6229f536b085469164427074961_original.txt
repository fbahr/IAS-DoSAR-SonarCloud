<?php

if (count(get_included_files()) == 1) {
    die("No direct script access allowed");
}
$allowed_domain = "filmygallery.me";
if ($_SERVER["HTTP_HOST"] !== $allowed_domain) {
    die("Access denied. This script can only be executed from filmygallery.me");
}
define("LB_API_DEBUG", false);
define("LB_SHOW_UPDATE_PROGRESS", true);
if (!LB_API_DEBUG) {
    @ini_set("display_errors", 0);
}
if (@ini_get("max_execution_time") !== "0" && @ini_get("max_execution_time") < 600) {
    @ini_set("max_execution_time", 600);
}
@ini_set("memory_limit", "256M");
class LicenseBoxExternalAPI
{
    private $current_version;
    private $root_path;
    public function __construct()
    {
        $this->current_version = "v1.0.0";
        $this->root_path = realpath("/var/www/html");
    }
    public function check_update()
    {
        $data_array = array("current_version" => $this->current_version);
        $response = array("status" => true, "message" => "Update available", "data" => $data_array);
        return $response;
    }
    public function download_update($update_id, $type, $version, $db_for_import = false)
    {
        $version = str_replace(".", "_", $version);
        sleep(3);
        if ($type == true) {
            sleep(3);
            if (is_array($db_for_import)) {
                if (!empty($db_for_import["db_host"]) && !empty($db_for_import["db_user"]) && !empty($db_for_import["db_name"])) {
                    $db_host = strip_tags(trim($db_for_import["db_host"]));
                    $db_user = strip_tags(trim($db_for_import["db_user"]));
                    $db_pass = strip_tags(trim($db_for_import["db_pass"]));
                    $db_name = strip_tags(trim($db_for_import["db_name"]));
                    $con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                    if (mysqli_connect_errno()) {
                    } else {
                        $templine = '';
                        $lines = file($this->root_path . "/update_sql_" . $version . ".sql");
                        foreach ($lines as $line) {
                            if (substr($line, 0, 2) == "--" || $line == '') {
                                continue;
                            }
                            $templine .= $line;
                            $query = false;
                            if (substr(trim($line), -1, 1) == ";") {
                                $query = mysqli_query($con, $templine);
                                $templine = '';
                            }
                        }
                        @chmod($this->root_path . "/update_sql_" . $version . ".sql", 511);
                        if (is_writeable($this->root_path . "/update_sql_" . $version . ".sql")) {
                            unlink($this->root_path . "/update_sql_" . $version . ".sql");
                        }
                    }
                } else {
                }
            } else {
            }
        } else {
        }
        ob_end_flush();
    }
}
$api = new LicenseBoxExternalAPI();
$update_info = $api->check_update();
if ($update_info["status"]) {
    ob_start();
    $api->download_update(1, true, $update_info["data"]["current_version"]);
} else {
    echo "No new updates available.\n";
}
