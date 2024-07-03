<?php

session_start();
//this local
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sharefile";
$dbstudent = "student_id";
//$conn_studentadmin = mysqli_connect($servername, $username, $password,$dbstudent);//student
$conn_admin = mysqli_connect($servername, $username, $password, $dbname);
//inventory
$conn_status = 'Active';
if (!$conn_admin) {
    die("Connection failed");
} else {
    $GLOBALS['conn_admin'] = $conn_admin;
}
// Create connection
$conn = new mysqli($servername, $username, $password);
// // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set('Asia/Manila');
$datenow = date('F j, Y g:i:a  ');
// date and time May 12, 2022 5:23AM
$created_date = date('Y-m-d H:i:s');
// date and time yyyy-mm-dd hr-min-sec
$time = "SELECT NOW() as 'now'";
$result_time = $conn_admin->query($time);
$row_time = $result_time->fetch_assoc();
$servertime = $row_time['now'];
$date_incode = $servertime;
$date_inventory = substr($servertime, 0, 10);
$time_inventory = substr($servertime, 10, 6);
if (!file_exists("D:allfolder")) {
    //wala
    $drive = 'D';
    mkdir("D:/allfolder/");
} elseif (file_exists("D:allfolder")) {
    //merun
    $drive = 'D';
} elseif (!file_exists("E:allfolder ")) {
    //wala
    $drive = 'E';
    mkdir("E:/allfolder/");
} elseif (file_exists("E:allfolder ")) {
    //merun
    $drive = 'E';
}
$_SESSION['drive'] = $drive;
