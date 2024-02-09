<?php

if (count(get_included_files()) == 1) {
    exit("No direct script access allowed");
}
define("GW_API_DEBUG", true);
define("GW_SHOW_UPDATE_PROGRESS", true);
define("GW_TEXT_CONNECTION_FAILED", 'Server is unavailable at the moment, please try again.');
define("GW_TEXT_INVALID_RESPONSE", 'Server returned an invalid response, please contact support.');
define("GW_TEXT_VERIFIED_RESPONSE", 'Verified! Thanks for purchasing.');
define("GW_TEXT_PREPARING_MAIN_DOWNLOAD", 'Preparing to download main update...');
define("GW_TEXT_MAIN_UPDATE_SIZE", 'Main Update size:');
define("GW_TEXT_DONT_REFRESH", '(Please do not refresh the page).');
define("GW_TEXT_DOWNLOADING_MAIN", 'Downloading main update...');
define("GW_TEXT_UPDATE_PERIOD_EXPIRED", 'Your update period has ended or your license is invalid, please contact support.');
define("GW_TEXT_UPDATE_PATH_ERROR", 'Folder does not have write permission or the update file path could not be resolved, please contact support.');
define("GW_TEXT_MAIN_UPDATE_DONE", 'Main update files downloaded and extracted.');
define("GW_TEXT_UPDATE_EXTRACTION_ERROR", 'Update zip extraction failed.');
define("GW_TEXT_PREPARING_SQL_DOWNLOAD", 'Preparing to download SQL update...');
define("GW_TEXT_SQL_UPDATE_SIZE", 'SQL Update size:');
define("GW_TEXT_DOWNLOADING_SQL", 'Downloading SQL update...');
define("GW_TEXT_SQL_UPDATE_DONE", 'SQL update files downloaded.');
define("GW_TEXT_UPDATE_WITH_SQL_IMPORT_FAILED", 'Application was successfully updated but automatic SQL importing failed, please import the downloaded SQL file in your database manually.');
define("GW_TEXT_UPDATE_WITH_SQL_IMPORT_DONE", 'Application was successfully updated and SQL file was automatically imported.');
define("GW_TEXT_UPDATE_WITH_SQL_DONE", 'Application was successfully updated, please import the downloaded SQL file in your database manually.');
define("GW_TEXT_UPDATE_WITHOUT_SQL_DONE", 'Application was successfully updated, there were no SQL updates.');
if (!GW_API_DEBUG) {
    @ini_set('display_errors', 0);
}
ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
error_reporting(E_ALL);
if (@ini_get('max_execution_time') !== '0' && @ini_get('max_execution_time') < 600) {
    @ini_set('max_execution_time', 600);
}
@ini_set('memory_limit', '256M');
class GatewifyUpRepoAPI
{
    private $product_id;
    private $api_url;
    private $api_key;
    private $api_language;
    private $current_version;
    private $verify_type;
    private $verification_period;
    private $current_path;
    private $root_path;
    private $license_file;
    public function __construct()
    {
        $this->product_id = 'GWUpRepo01';
        $this->api_url = 'https://uprepo.gatewify.com/';
        $this->api_key = '0797ACF3211BE30D1C4C';
        $this->api_language = 'english';
        $this->current_version = 'v1.0.0';
        $this->verify_type = 'non_envato';
        $this->verification_period = 1;
        $this->current_path = realpath("/var/www/html");
        $this->root_path = realpath($this->current_path . '/..');
        $this->license_file = $this->current_path . '/.lic';
    }
    public function check_local_license_exist()
    {
        return is_file($this->license_file);
    }
    public function get_current_version()
    {
        return $this->current_version;
    }
    private function call_api($method, $url, $data = null)
    {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }
        $this_server_name = ((getenv('SERVER_NAME') ?: $_SERVER['SERVER_NAME']) ?: getenv('HTTP_HOST')) ?: $_SERVER['HTTP_HOST'];
        $this_http_or_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" or isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https://' : 'http://';
        $this_url = $this_http_or_https . $this_server_name . $_SERVER['REQUEST_URI'];
        $this_ip = ((getenv('SERVER_ADDR') ?: $_SERVER['SERVER_ADDR']) ?: $this->get_ip_from_third_party()) ?: gethostbyname(gethostname());
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'GW-API-KEY: ' . $this->api_key, 'GW-URL: ' . $this_url, 'GW-IP: ' . $this_ip, 'GW-LANG: ' . $this->api_language));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($curl);
        if (!$result && !GW_API_DEBUG) {
            $rs = array('status' => FALSE, 'message' => GW_TEXT_CONNECTION_FAILED);
            return json_encode($rs);
        }
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($http_status != 200) {
            if (GW_API_DEBUG) {
                $temp_decode = json_decode($result, true);
                $rs = array('status' => FALSE, 'message' => !empty($temp_decode['error']) ? $temp_decode['error'] : $temp_decode['message']);
                return json_encode($rs);
            } else {
                $rs = array('status' => FALSE, 'message' => GW_TEXT_INVALID_RESPONSE);
                return json_encode($rs);
            }
        }
        curl_close($curl);
        return $result;
    }
    public function check_connection()
    {
        $get_data = $this->call_api('POST', $this->api_url . 'api/check_connection_ext');
        $response = json_decode($get_data, true);
        return $response;
    }
    public function get_latest_version()
    {
        $data_array = array("product_id" => $this->product_id);
        $get_data = $this->call_api('POST', $this->api_url . 'api/latest_version', json_encode($data_array));
        $response = json_decode($get_data, true);
        return $response;
    }
    public function activate_license($license, $client, $create_lic = true)
    {
        $data_array = array("product_id" => $this->product_id, "license_code" => $license, "client_name" => $client, "verify_type" => $this->verify_type);
        $get_data = $this->call_api('POST', $this->api_url . 'api/activate_license', json_encode($data_array));
        $response = json_decode($get_data, true);
        if (!empty($create_lic)) {
            if ($response['status']) {
                $licfile = trim($response['lic_response']);
                file_put_contents($this->license_file, $licfile, LOCK_EX);
            } else {
                @chmod($this->license_file, 0777);
                if (is_writeable($this->license_file)) {
                    unlink($this->license_file);
                }
            }
        }
        return $response;
    }
    public function verify_license($time_based_check = false, $license = false, $client = false)
    {
        if (!empty($license) && !empty($client)) {
            $data_array = array("product_id" => $this->product_id, "license_file" => null, "license_code" => $license, "client_name" => $client);
        } else {
            if (is_file($this->license_file)) {
                $data_array = array("product_id" => $this->product_id, "license_file" => file_get_contents($this->license_file), "license_code" => null, "client_name" => null);
            } else {
                $data_array = array();
            }
        }
        $res = array('status' => TRUE, 'message' => GW_TEXT_VERIFIED_RESPONSE);
        if ($time_based_check && $this->verification_period > 0) {
            ob_start();
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $type = (int) $this->verification_period;
            $today = date('d-m-Y');
            if (empty($_SESSION["5636db352224731"])) {
                $_SESSION["5636db352224731"] = '00-00-0000';
            }
            if ($type == 1) {
                $type_text = '1 day';
            } elseif ($type == 3) {
                $type_text = '3 days';
            } elseif ($type == 7) {
                $type_text = '1 week';
            } elseif ($type == 30) {
                $type_text = '1 month';
            } elseif ($type == 90) {
                $type_text = '3 months';
            } elseif ($type == 365) {
                $type_text = '1 year';
            } else {
                $type_text = $type . ' days';
            }
            if (strtotime($today) >= strtotime($_SESSION["5636db352224731"])) {
                $get_data = $this->call_api('POST', $this->api_url . 'api/verify_license', json_encode($data_array));
                $res = json_decode($get_data, true);
                if ($res['status'] == true) {
                    $tomo = date('d-m-Y', strtotime($today . ' + ' . $type_text));
                    $_SESSION["5636db352224731"] = $tomo;
                }
            }
            ob_end_clean();
        } else {
            $get_data = $this->call_api('POST', $this->api_url . 'api/verify_license', json_encode($data_array));
            $res = json_decode($get_data, true);
        }
        return $res;
    }
    public function deactivate_license($license = false, $client = false)
    {
        if (!empty($license) && !empty($client)) {
            $data_array = array("product_id" => $this->product_id, "license_file" => null, "license_code" => $license, "client_name" => $client);
        } else {
            if (is_file($this->license_file)) {
                $data_array = array("product_id" => $this->product_id, "license_file" => file_get_contents($this->license_file), "license_code" => null, "client_name" => null);
            } else {
                $data_array = array();
            }
        }
        $get_data = $this->call_api('POST', $this->api_url . 'api/deactivate_license', json_encode($data_array));
        $response = json_decode($get_data, true);
        if ($response['status']) {
            @chmod($this->license_file, 0777);
            if (is_writeable($this->license_file)) {
                unlink($this->license_file);
            }
        }
        return $response;
    }
    public function check_update()
    {
        $data_array = array("product_id" => $this->product_id, "current_version" => $this->current_version);
        $get_data = $this->call_api('POST', $this->api_url . 'api/check_update', json_encode($data_array));
        $response = json_decode($get_data, true);
        return $response;
    }
    public function download_update($update_id, $type, $version, $license = false, $client = false, $db_for_import = false)
    {
        if (!empty($license) && !empty($client)) {
            $data_array = array("license_file" => null, "license_code" => $license, "client_name" => $client);
        } else {
            if (is_file($this->license_file)) {
                $data_array = array("license_file" => file_get_contents($this->license_file), "license_code" => null, "client_name" => null);
            } else {
                $data_array = array();
            }
        }
        ob_end_flush();
        ob_implicit_flush(true);
        $version = str_replace(".", "_", $version);
        ob_start();
        $source_size = $this->api_url . "api/get_update_size/main/" . $update_id;
        echo "Preparing to download main update...<br>";
        if (GW_SHOW_UPDATE_PROGRESS) {
            echo "<script>document.getElementById('prog').value = 1;</script>";
        }
        ob_flush();
        echo "Main Update size: " . $this->get_remote_filesize($source_size) . " " . GW_TEXT_DONT_REFRESH . "<br>";
        if (GW_SHOW_UPDATE_PROGRESS) {
            echo "<script>document.getElementById('prog').value = 5;</script>";
        }
        ob_flush();
        $temp_progress = '';
        $ch = curl_init();
        $source = $this->api_url . "api/download_update/main/" . $update_id;
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_array);
        $this_server_name = ((getenv('SERVER_NAME') ?: $_SERVER['SERVER_NAME']) ?: getenv('HTTP_HOST')) ?: $_SERVER['HTTP_HOST'];
        $this_http_or_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" or isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https://' : 'http://';
        $this_url = $this_http_or_https . $this_server_name . $_SERVER['REQUEST_URI'];
        $this_ip = ((getenv('SERVER_ADDR') ?: $_SERVER['SERVER_ADDR']) ?: $this->get_ip_from_third_party()) ?: gethostbyname(gethostname());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('GW-API-KEY: ' . $this->api_key, 'GW-URL: ' . $this_url, 'GW-IP: ' . $this_ip, 'GW-LANG: ' . $this->api_language));
        if (GW_SHOW_UPDATE_PROGRESS) {
            curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, array($this, 'progress'));
        }
        if (GW_SHOW_UPDATE_PROGRESS) {
            curl_setopt($ch, CURLOPT_NOPROGRESS, false);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        echo "Downloading main update...<br>";
        if (GW_SHOW_UPDATE_PROGRESS) {
            echo "<script>document.getElementById('prog').value = 10;</script>";
        }
        ob_flush();
        $data = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_status != 200) {
            if ($http_status == 401) {
                curl_close($ch);
                exit("<br>Your update period has ended or your license is invalid, please contact support.");
            } else {
                curl_close($ch);
                exit("<br>Server returned an invalid response, please contact support.");
            }
        }
        curl_close($ch);
        $destination = $this->root_path . "/update_main_" . $version . ".zip";
        $file = fopen($destination, "w+");
        if (!$file) {
            exit("<br>Folder does not have write permission or the update file path could not be resolved, please contact support.");
        }
        fputs($file, $data);
        fclose($file);
        if (GW_SHOW_UPDATE_PROGRESS) {
            echo "<script>document.getElementById('prog').value = 65;</script>";
        }
        ob_flush();
        $zip = new ZipArchive();
        $res = $zip->open($destination);
        if ($res === TRUE) {
            $zip->extractTo($this->root_path . "/");
            $zip->close();
            unlink($destination);
            echo "Main update files downloaded and extracted.<br><br>";
            if (GW_SHOW_UPDATE_PROGRESS) {
                echo "<script>document.getElementById('prog').value = 75;</script>";
            }
            ob_flush();
        } else {
            echo "Update zip extraction failed.<br><br>";
            ob_flush();
        }
        if ($type == true) {
            $source_size = $this->api_url . "api/get_update_size/sql/" . $update_id;
            echo "Preparing to download SQL update...<br>";
            ob_flush();
            echo "SQL Update size: " . $this->get_remote_filesize($source_size) . " " . GW_TEXT_DONT_REFRESH . "<br>";
            if (GW_SHOW_UPDATE_PROGRESS) {
                echo "<script>document.getElementById('prog').value = 85;</script>";
            }
            ob_flush();
            $temp_progress = '';
            $ch = curl_init();
            $source = $this->api_url . "api/download_update/sql/" . $update_id;
            curl_setopt($ch, CURLOPT_URL, $source);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_array);
            $this_server_name = ((getenv('SERVER_NAME') ?: $_SERVER['SERVER_NAME']) ?: getenv('HTTP_HOST')) ?: $_SERVER['HTTP_HOST'];
            $this_http_or_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" or isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https://' : 'http://';
            $this_url = $this_http_or_https . $this_server_name . $_SERVER['REQUEST_URI'];
            $this_ip = ((getenv('SERVER_ADDR') ?: $_SERVER['SERVER_ADDR']) ?: $this->get_ip_from_third_party()) ?: gethostbyname(gethostname());
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('GW-API-KEY: ' . $this->api_key, 'GW-URL: ' . $this_url, 'GW-IP: ' . $this_ip, 'GW-LANG: ' . $this->api_language));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            echo "Downloading SQL update...<br>";
            if (GW_SHOW_UPDATE_PROGRESS) {
                echo "<script>document.getElementById('prog').value = 90;</script>";
            }
            ob_flush();
            $data = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status != 200) {
                curl_close($ch);
                exit(GW_TEXT_INVALID_RESPONSE);
            }
            curl_close($ch);
            $destination = $this->root_path . "/update_sql_" . $version . ".sql";
            $file = fopen($destination, "w+");
            if (!$file) {
                exit(GW_TEXT_UPDATE_PATH_ERROR);
            }
            fputs($file, $data);
            fclose($file);
            echo "SQL update files downloaded.<br><br>";
            if (GW_SHOW_UPDATE_PROGRESS) {
                echo "<script>document.getElementById('prog').value = 95;</script>";
            }
            ob_flush();
            if (is_array($db_for_import)) {
                if (!empty($db_for_import["db_host"]) && !empty($db_for_import["db_user"]) && !empty($db_for_import["db_name"])) {
                    $db_host = strip_tags(trim((string) $db_for_import["db_host"]));
                    $db_user = strip_tags(trim((string) $db_for_import["db_user"]));
                    $db_pass = strip_tags(trim((string) $db_for_import["db_pass"]));
                    $db_name = strip_tags(trim((string) $db_for_import["db_name"]));
                    $con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                    if (mysqli_connect_errno()) {
                        echo "Application was successfully updated but automatic SQL importing failed, please import the downloaded SQL file in your database manually.";
                    } else {
                        $templine = '';
                        $lines = file($destination);
                        foreach ($lines as $line) {
                            if (substr($line, 0, 2) == '--' || $line == '') {
                                continue;
                            }
                            $templine .= $line;
                            $query = false;
                            if (substr(trim($line), -1, 1) == ';') {
                                $query = mysqli_query($con, $templine);
                                $templine = '';
                            }
                        }
                        @chmod($destination, 0777);
                        if (is_writeable($destination)) {
                            unlink($destination);
                        }
                        echo "Application was successfully updated and SQL file was automatically imported.";
                    }
                } else {
                    echo "Application was successfully updated but automatic SQL importing failed, please import the downloaded SQL file in your database manually.";
                }
            } else {
                echo "Application was successfully updated, please import the downloaded SQL file in your database manually.";
            }
            if (GW_SHOW_UPDATE_PROGRESS) {
                echo "<script>document.getElementById('prog').value = 100;</script>";
            }
            ob_flush();
        } else {
            if (GW_SHOW_UPDATE_PROGRESS) {
                echo "<script>document.getElementById('prog').value = 100;</script>";
            }
            echo "Application was successfully updated, there were no SQL updates.";
            ob_flush();
        }
        ob_end_flush();
    }
    private function progress($resource, $download_size, $downloaded, $upload_size, $uploaded)
    {
        static $prev = 0;
        if ($download_size == 0) {
            $progress = 0;
        } else {
            $progress = round($downloaded * 100 / $download_size);
        }
        if ($progress != $prev && $progress == 25) {
            $prev = $progress;
            echo "<script>document.getElementById('prog').value = 22.5;</script>";
            ob_flush();
        }
        if ($progress != $prev && $progress == 50) {
            $prev = $progress;
            echo "<script>document.getElementById('prog').value = 35;</script>";
            ob_flush();
        }
        if ($progress != $prev && $progress == 75) {
            $prev = $progress;
            echo "<script>document.getElementById('prog').value = 47.5;</script>";
            ob_flush();
        }
        if ($progress != $prev && $progress == 100) {
            $prev = $progress;
            echo "<script>document.getElementById('prog').value = 60;</script>";
            ob_flush();
        }
    }
    private function get_ip_from_third_party()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://ipecho.net/plain");
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    private function get_remote_filesize($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, TRUE);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_NOBODY, TRUE);
        $this_server_name = ((getenv('SERVER_NAME') ?: $_SERVER['SERVER_NAME']) ?: getenv('HTTP_HOST')) ?: $_SERVER['HTTP_HOST'];
        $this_http_or_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" or isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https://' : 'http://';
        $this_url = $this_http_or_https . $this_server_name . $_SERVER['REQUEST_URI'];
        $this_ip = ((getenv('SERVER_ADDR') ?: $_SERVER['SERVER_ADDR']) ?: $this->get_ip_from_third_party()) ?: gethostbyname(gethostname());
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('GW-API-KEY: ' . $this->api_key, 'GW-URL: ' . $this_url, 'GW-IP: ' . $this_ip, 'GW-LANG: ' . $this->api_language));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        $result = curl_exec($curl);
        $filesize = curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
        if ($filesize) {
            switch ($filesize) {
                case $filesize < 1024:
                    $size = $filesize . ' B';
                    break;
                case $filesize < 1048576:
                    $size = round($filesize / 1024, 2) . ' KB';
                    break;
                case $filesize < 1073741824:
                    $size = round($filesize / 1048576, 2) . ' MB';
                    break;
                case $filesize < 1099511627776:
                    $size = round($filesize / 1073741824, 2) . ' GB';
                    break;
            }
            return $size;
        }
    }
}
if (!function_exists("config_item")) {
    function config_item($nRJmsZF4)
    {
        static $ALcVNWlo;
        if (!empty($ALcVNWlo)) {
            goto vykwYJ_b;
        }
        $ALcVNWlo[0] =& get_config();
        vykwYJ_b:
        return isset($ALcVNWlo[0][$nRJmsZF4]) ? $ALcVNWlo[0][$nRJmsZF4] : null;
    }
}
if (!function_exists("html_escape")) {
    function html_escape($w0SxRnFU, $JfDRXcby = true)
    {
        if (!empty($w0SxRnFU)) {
            if (!is_array($w0SxRnFU)) {
                return htmlspecialchars($w0SxRnFU, ENT_QUOTES, config_item("charset"), $JfDRXcby);
            }
            foreach (array_keys($w0SxRnFU) as $SOXFc430) {
                $w0SxRnFU[$SOXFc430] = html_escape($w0SxRnFU[$SOXFc430], $JfDRXcby);
            }
            return $w0SxRnFU;
        }
        return $w0SxRnFU;
    }
}
if (!function_exists("thousands_currency_format")) {
    function thousands_currency_format($o17C8ddB, $lpqZ8tWl = false)
    {
        if ($o17C8ddB > 1000) {
            $D7lsesc5 = round($o17C8ddB);
            $neCKiqCi = number_format($D7lsesc5);
            $j4o4sjJa = explode(",", $neCKiqCi);
            $ZLg21xLl = array("k", "m", "b", "t");
            $CmPgY2Zo = count($j4o4sjJa) - 1;
            $vRb7R5Hf = $D7lsesc5;
            $vRb7R5Hf = $j4o4sjJa[0] . ((int) $j4o4sjJa[1][0] !== 0 ? "." . $j4o4sjJa[1][0] : '');
            $HEJYwMRI = $ZLg21xLl[$CmPgY2Zo - 1];
            $b6E1SFOm = array($vRb7R5Hf, $HEJYwMRI);
            return !empty($lpqZ8tWl) ? $b6E1SFOm : $vRb7R5Hf . $HEJYwMRI;
        }
        $b6E1SFOm = array($o17C8ddB, '');
        return !empty($lpqZ8tWl) ? $b6E1SFOm : $o17C8ddB;
    }
}
if (!function_exists("generate_breadcrumb")) {
    function generate_breadcrumb($iltgeV97 = null)
    {
        $ltoxvzGt =& get_instance();
        $g5KsOuFH = 1;
        $dXPI7NBd = $ltoxvzGt->uri->segment($g5KsOuFH);
        $xrnKj4fR = "<nav class=\"breadcrumb\" aria-label=\"breadcrumbs\">\r\n\t\t<ul><li><a href=\"" . base_url() . "\">Home</a></li>";
        JJsZ3tlC:
        if (!($dXPI7NBd != '')) {
            $xrnKj4fR .= "</ul></nav>";
            return $xrnKj4fR;
        }
        $QwgTzU0d = '';
        $Ce4zfv7T = 1;
        NnmeUAI2:
        if (!($Ce4zfv7T <= $g5KsOuFH)) {
            if ($ltoxvzGt->uri->segment($g5KsOuFH + 1) == '') {
                if ($iltgeV97) {
                    $xrnKj4fR .= "<li class=\"is-active\"><a href=\"" . site_url($QwgTzU0d) . "\">";
                    $xrnKj4fR .= ucfirst($iltgeV97) . "</a></li>";
                    goto ohtZLYXB;
                }
                $xrnKj4fR .= "<li class=\"is-active\"><a href=\"" . site_url($QwgTzU0d) . "\">";
                $xrnKj4fR .= ucfirst($ltoxvzGt->uri->segment($g5KsOuFH)) . "</a></li>";
                ohtZLYXB:
                goto T_wtLHfn;
            }
            $xrnKj4fR .= "<li><a href=\"" . site_url($QwgTzU0d) . "\">";
            $xrnKj4fR .= ucfirst($ltoxvzGt->uri->segment($g5KsOuFH)) . "</a><span class=\"divider\"></span></li>";
            T_wtLHfn:
            $g5KsOuFH++;
            $dXPI7NBd = $ltoxvzGt->uri->segment($g5KsOuFH);
            goto JJsZ3tlC;
        }
        $QwgTzU0d .= $ltoxvzGt->uri->segment($Ce4zfv7T) . "/";
        $Ce4zfv7T++;
        goto NnmeUAI2;
    }
}
if (!function_exists("get_system_info")) {
    function get_system_info($r1zEpaov)
    {
        $bfSbURQi = array("Server" => $_SERVER["SERVER_SOFTWARE"], "PHP Version" => phpversion(), "Max POST Size" => @ini_get("post_max_size"), "Max Memory Limit" => @ini_get("memory_limit"), "Max Upload Size" => @ini_get("upload_max_filesize"), "Curl Version" => function_exists("curl_version") ? curl_version()["version"] : "Nil", "Core Init" => $r1zEpaov);
        return json_encode($bfSbURQi, JSON_PRETTY_PRINT);
    }
}
if (!function_exists("minify_html")) {
    function minify_html($q8c52m6T)
    {
        $IbfL7egm = array("/(\\n|^)(\\x20+|\\t)/", "/(\\n|^)\\/\\/(.*?)(\\n|\$)/", "/\\n/", "/\\<\\!--.*?-->/", "/(\\x20+|\\t)/", "/\\>\\s+\\</", "/(\\\"|')\\s+\\>/", "/=\\s+(\\\"|')/");
        $WSeq0vg5 = array("\n", "\n", " ", '', " ", "><", "\$1>", "=\$1");
        $S0saiEjd = preg_replace($IbfL7egm, $WSeq0vg5, $q8c52m6T);
        return $S0saiEjd;
    }
}
if (!function_exists("password_verify")) {
    function password_verify($Aci9zjqS, $suUy9m3F)
    {
        if (!(strlen($suUy9m3F) !== 60 or strlen($Aci9zjqS = crypt($Aci9zjqS, $suUy9m3F)) !== 60)) {
            $EHCA0JOD = 0;
            $g5KsOuFH = 0;
            J2kW_v2f:
            if (!($g5KsOuFH < 60)) {
                return $EHCA0JOD === 0;
            }
            $EHCA0JOD |= ord($Aci9zjqS[$g5KsOuFH]) ^ ord($suUy9m3F[$g5KsOuFH]);
            $g5KsOuFH++;
            goto J2kW_v2f;
        }
        return false;
    }
}
