<?php

/* #1: PHPDeobfuscator eval output */ 
    include_once "../module/ceksession.php";
    include_once "../module/connect.php";
    include_once "../module/conset.php";
    include_once "../module/stringfunction.php";
    if ($_POST['action'] == "getuseraccess") {
        $coid = $_SESSION['coid'];
        $userid = $_POST['userid'];
        $sql = "SELECT BrId FROM users WHERE CoId = '{$coid}' AND UserId = '{$userid}'";
        $rs = odbc_exec($conn1, $sql);
        $r = odbc_fetch_array($rs);
        $brid = trim($r['BrId']);
        $query = mssql_query("SELECT BrId, BrName FROM cobranch WHERE Status = 'A'");
        while ($r = mssql_fetch_array($query)) {
            if (strpos($brid, strval($r['BrId'])) === false) {
                echo "<option value = {$r['BrId']}>{$r['BrName']}</option> n";
            } else {
                echo "<option value = {$r['BrId']} selected>{$r['BrName']}</option> n";
            }
        }
    } elseif ($_POST['action'] == "savedata") {
        $coid = $_SESSION['coid'];
        $userid = $_POST['userid'];
        $module = $_POST['module'];
        $brid = trim($_POST['brid']);
        $n = strpos($module, "0");
        $id = left($module, $n);
        $dtl = json_decode($_POST['dtl'], true);
        try {
            $sql = "DELETE FROM usermenus WHERE CoId = '{$coid}' AND UserId = '{$userid}' AND MenuId LIKE '{$id}%'";
            odbc_exec($conn1, $sql);
            $sql = "UPDATE users SET BrId = '{$brid}' WHERE CoId = '{$coid}' AND UserId = '{$userid}'";
            odbc_exec($conn1, $sql);
            foreach ($dtl as $key => $value) {
                $sql = "INSERT INTO usermenus (CoId, UserId, MenuId) VALUES('{$coid}', '{$userid}', '{$value['menuid']}')";
                odbc_exec($conn1, $sql);
            }
            echo "OK";
        } catch (Exception $e) {
            echo "FAILED";
        }
    } elseif ($_POST['action'] == "deldata") {
        $coid = $_SESSION['coid'];
        $userid = $_POST['userid'];
        $module = $_POST['module'];
        $brid = trim($_POST['brid']);
        $n = strpos($module, "0");
        $id = left($module, $n);
        $sql = "DELETE FROM usermenus WHERE CoId = '{$coid}' AND UserId = '{$userid}' AND MenuId LIKE '{$id}%'";
        odbc_exec($conn1, $sql);
        $sql = "UPDATE users SET BrId = '{$brid}' WHERE CoId = '{$coid}' AND UserId = '{$userid}'";
        odbc_exec($conn1, $sql);
    }
/* END:#1 */
