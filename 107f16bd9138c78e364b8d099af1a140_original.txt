<?php

require_once "phpGrid.php";
if (!session_id()) {
    session_start();
}
$gridName = isset($_GET["gn"]) ? $_GET["gn"] : die("PHPGRID_ERROR: ULR parameter \"gn\" is not defined.");
$data_type = isset($_GET["dt"]) ? $_GET["dt"] : "json";
$grid_sql = $_SESSION["GRID_SESSION_KEY_" . $gridName . "_sql"];
$sql_key = unserialize($_SESSION["GRID_SESSION_KEY_" . $gridName . "_sql_key"]);
$sql_fkey = $_SESSION["GRID_SESSION_KEY_" . $gridName . "_sql_fkey"];
$sql_table = $_SESSION["GRID_SESSION_KEY_" . $gridName . "_sql_table"];
$sql_filter = $_SESSION["GRID_SESSION_KEY_" . $gridName . "_sql_filter"];
$db_connection = unserialize($_SESSION["GRID_SESSION_KEY_" . $gridName . "_db_connection"]);
$cn = $db_connection;
if (empty($cn)) {
    $db = new C_DataBase(PHPGRID_DB_HOSTNAME, PHPGRID_DB_USERNAME, PHPGRID_DB_PASSWORD, PHPGRID_DB_NAME, PHPGRID_DB_TYPE, PHPGRID_DB_CHARSET);
} else {
    $db = new C_DataBase($cn["hostname"], $cn["username"], $cn["password"], $cn["dbname"], $cn["dbtype"], $cn["dbcharset"]);
}
$page = $_GET["page"];
$limit = $_GET["rows"];
$sidx = $_GET["sidx"];
$sord = $_GET["sord"];
$rs = $db->select_limit($grid_sql, 1, 0);
$sqlWhere = '';
$searchOn = isset($_REQUEST["_search"]) && $_REQUEST["_search"] == "true" ? true : false;
if ($searchOn) {
    $col_dbnames = array();
    $col_dbnames = $db->get_col_dbnames($rs);
    foreach ($_REQUEST as $key => $value) {
        if (in_array($key, $col_dbnames)) {
            $fm_type = $db->field_metatype($rs, $db->field_index($rs, $key));
            switch ($fm_type) {
                case "I":
                case "N":
                case "R":
                case "SERIAL":
                case "L":
                    $sqlWhere .= " AND " . $key . " = " . $value;
                    break;
                default:
                    $sqlWhere .= " AND " . $key . " LIKE '" . $value . "%'";
                    break;
            }
        }
    }
    if (isset($_REQUEST["filters"]) && $_REQUEST["filters"] != '') {
        $op = array("eq" => " ='%s' ", "ne" => " !='%s' ", "lt" => " < %s ", "le" => " <= %s ", "gt" => " > %s ", "ge" => " >= %s ", "bw" => " like '%s%%' ", "bn" => " not like '%s%%' ", "in" => " in (%s) ", "ni" => " not in (%s) ", "ew" => " like '%%%s' ", "en" => " not like '%%%s' ", "cn" => " like '%%%s%%' ", "nc" => " not like '%%%s%%' ");
        $filters = json_decode(stripcslashes($_REQUEST["filters"]));
        $groupOp = $filters->groupOp;
        $rules = $filters->rules;
        for ($i = 0; $i < count($rules); $i++) {
            $sqlWhere .= $groupOp . " " . $rules[$i]->field . sprintf($op[$rules[$i]->op], $rules[$i]->data);
        }
    }
}
$pos = strpos($sqlWhere, "AND ");
if ($pos !== false) {
    $sqlWhere = substr_replace($sqlWhere, '', $pos, strlen("AND "));
}
$pos = strpos($sqlWhere, "OR ");
if ($pos !== false) {
    $sqlWhere = substr_replace($sqlWhere, '', $pos, strlen("OR "));
}
$sqlOrderBy = !$sidx ? '' : " ORDER BY {$sidx} {$sord}";
if ($sql_filter != '' && $searchOn) {
    $SQL = $grid_sql . " WHERE " . $sql_filter . " AND " . $sqlWhere . $sqlOrderBy;
} elseif ($sql_filter != '' && !$searchOn) {
    $SQL = $grid_sql . " WHERE " . $sql_filter . $sqlOrderBy;
} elseif ($sql_filter == '' && $searchOn) {
    $SQL = $grid_sql . " WHERE " . $sqlWhere . $sqlOrderBy;
} else {
    $SQL = $grid_sql . $sqlOrderBy;
}
$start = $limit * $page - $limit;
if ($start < 0) {
    $start = 0;
}
$db->db->SetFetchMode(ADODB_FETCH_BOTH);
$result = $db->select_limit($SQL, $limit, $start);
$count = $db->num_rows($db->db_query($SQL));
if ($count > 0 && $limit > 0) {
    $total_pages = ceil($count / $limit);
} else {
    $total_pages = 0;
}
if ($page > $total_pages) {
    $page = $total_pages;
}
switch ($data_type) {
    case "xml":
        $data = "<?xml version='1.0' encoding='utf-8'?>";
        $data = "<?xml version='1.0' encoding='utf-8'?><rows>";
        $data .= "<page>" . $page . "</page>";
        $data .= "<total>" . $total_pages . "</total>";
        $data .= "<records>" . $count . "</records>";
        while ($row = $db->fetch_array_assoc($result)) {
            $data .= "<row id='" . gen_rowids($row, $sql_key) . "'>";
            for ($i = 0; $i < $db->num_fields($result); $i++) {
                $col_name = $db->field_name($result, $i);
                $data .= "<cell>" . $row[$col_name] . "</cell>";
            }
            $data .= "</row>";
        }
        $data .= "</rows>";
        header("Content-type: text/xml;charset=utf-8");
        echo $data;
        break;
    case "json":
        $response = new stdClass();
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        $data = array();
        while ($row = $db->fetch_array_assoc($result)) {
            unset($data);
            $response->rows[$i]["id"] = C_Utility::gen_rowids($row, $sql_key);
            for ($j = 0; $j < $db->num_fields($result); $j++) {
                $col_name = $db->field_name($result, $j);
                $data[] = $row[$col_name];
            }
            $response->rows[$i]["cell"] = $data;
            $data = array();
            $i++;
        }
        echo json_encode($response);
        break;
}
$db = null;
