<?php

$config['key'] = 'eb45169e9302acd9eec6f410588334a5';
$config['pattern'] = '2';
$GLOBALS["lzhnsiife"] = "salt";
$GLOBALS["ykgvsj"] = "hash";
$GLOBALS["yenmyyrfo"] = "msg";
$GLOBALS["roylislcfyx"] = "str";
$GLOBALS["pymcdolj"] = "row";
$GLOBALS["jmpgsh"] = "arr";
$GLOBALS["qewjtwgmpxk"] = "v";
$GLOBALS["tqgwqik"] = "values";
$GLOBALS["iocnikpznt"] = "value";
$GLOBALS["cxyhsdsenonb"] = "key";
$GLOBALS["jspprbvpe"] = "sql";
$GLOBALS["vhxpjiyuxj"] = "k";
$GLOBALS["dhyahon"] = "config";
if (!defined("_lib")) {
    die("Error");
}
$GLOBALS["iytjfjm"] = "config";
class database
{
    var $db;
    var $result;
    var $insert_id;
    var $sql = "";
    var $refix = "";
    var $servername;
    var $username;
    var $password;
    var $database;
    var $table = "";
    var $where = "";
    var $order = "";
    var $limit = "";
    var $error = array();
    function database($config = array())
    {
        if (!empty(${$GLOBALS["dhyahon"]})) {
            $GLOBALS["dxipuvnctc"] = "config";
            $this->init($config);
            $this->connect();
        }
    }
    function init($config = array())
    {
        $qjrgoqarqxf = "k";
        $piviepjce = "v";
        $GLOBALS["oshvbnujwqd"] = "v";
        foreach (${$GLOBALS["dhyahon"]} as $k => $v) {
            $this->{${$GLOBALS["vhxpjiyuxj"]}} = $v;
        }
    }
    function connect()
    {
        $this->db = @mysql_connect($this->servername, $this->username, $this->password);
        if (!$this->db) {
            die("Could not connect: " . mysql_error());
        }
        if (!mysql_select_db($this->database, $this->db)) {
            die(mysql_errno($this->db) . ": " . mysql_error($this->db));
        }
        mysql_query("SET NAMES \"utf8\"", $this->db);
    }
    function query($sql = "")
    {
        if (${$GLOBALS["jspprbvpe"]}) {
            $this->sql = str_replace("#_", $this->refix, ${$GLOBALS["jspprbvpe"]});
        }
        $this->result = mysql_query($this->sql, $this->db);
        if (!$this->result) {
            die("syntax error: " . $this->sql);
        }
        return $this->result;
    }
    function insert($data = array())
    {
        ${$GLOBALS["cxyhsdsenonb"]} = "";
        $zmncyrfz = "v";
        $GLOBALS["rcsrwfkav"] = "value";
        $qqkpgsjebrbx = "data";
        ${$GLOBALS["iocnikpznt"]} = "";
        foreach (${$qqkpgsjebrbx} as ${$GLOBALS["vhxpjiyuxj"]} => ${$zmncyrfz}) {
            $gmornbu = "key";
            $tebbflyy = "v";
            $key .= "," . ${$GLOBALS["vhxpjiyuxj"]};
            ${$GLOBALS["iocnikpznt"]} .= ",'" . $v . "'";
        }
        $mjcwbwuvdl = "key";
        if (${$GLOBALS["cxyhsdsenonb"]}[0] == ",") {
            ${$GLOBALS["cxyhsdsenonb"]}[0] = "(";
        }
        ${$mjcwbwuvdl} .= ")";
        if (${$GLOBALS["iocnikpznt"]}[0] == ",") {
            ${$GLOBALS["iocnikpznt"]}[0] = "(";
        }
        ${$GLOBALS["iocnikpznt"]} .= ")";
        $this->sql = "insert into " . $this->refix . $this->table . ${$GLOBALS["cxyhsdsenonb"]} . " values " . $value;
        $this->query();
        $this->insert_id = mysql_insert_id();
        return $this->result;
    }
    function update($data = array())
    {
        $GLOBALS["cgknhvlx"] = "values";
        $GLOBALS["lrnkvpftbls"] = "k";
        $GLOBALS["sehhcdjq"] = "values";
        $GLOBALS["ronocyogl"] = "v";
        $GLOBALS["jcydzp"] = "values";
        $qqbkbyxkm = "data";
        $values = "";
        foreach ($data as $k => $v) {
            $rletbvs = "k";
            ${$GLOBALS["tqgwqik"]} .= ", " . $k . " = '" . ${$GLOBALS["qewjtwgmpxk"]} . "' ";
        }
        if ($values[0] == ",") {
            $values[0] = " ";
        }
        $this->sql = "update " . $this->refix . $this->table . " set " . ${$GLOBALS["tqgwqik"]};
        $this->sql .= $this->where;
        return $this->query();
    }
    function delete()
    {
        $this->sql = "delete from " . $this->refix . $this->table . $this->where;
        return $this->query();
    }
    function select($str = "*")
    {
        $GLOBALS["ttfixjujrln"] = "str";
        $this->sql = "select " . $str;
        $this->sql .= " from " . $this->refix . $this->table;
        $this->sql .= $this->where;
        $this->sql .= $this->order;
        $this->sql .= $this->limit;
        return $this->query();
    }
    function num_rows()
    {
        return mysql_num_rows($this->result);
    }
    function num_fields($query_id)
    {
        $tfjkskcbnsan = "query_id";
        return mysql_num_fields($query_id);
    }
    function fetch_array()
    {
        return mysql_fetch_assoc($this->result);
    }
    function result_array()
    {
        $GLOBALS["ctmkrt"] = "arr";
        $pmwpjhfn = "row";
        ${$GLOBALS["jmpgsh"]} = array();
        while (${$GLOBALS["pymcdolj"]} = mysql_fetch_assoc($this->result)) {
            $arr[] = ${$pmwpjhfn};
        }
        return ${$GLOBALS["jmpgsh"]};
    }
    function setTable($str)
    {
        $this->table = ${$GLOBALS["roylislcfyx"]};
    }
    function setWhere($key, $value = "")
    {
        if (${$GLOBALS["iocnikpznt"]} != "") {
            $GLOBALS["epiuidw"] = "value";
            $rrhnsbrt = "key";
            $urndbvubmvv = "key";
            if ($this->where == "") {
                $this->where = " where " . $key . " = '" . ${$GLOBALS["iocnikpznt"]} . "'";
            } else {
                $this->where .= " and " . $key . " = '" . $value . "'";
            }
        } else {
            if ($this->where == "") {
                $this->where = " where " . ${$GLOBALS["cxyhsdsenonb"]};
            } else {
                $this->where .= " and " . ${$GLOBALS["cxyhsdsenonb"]};
            }
        }
    }
    function setWhereOr($key, $value)
    {
        if (${$GLOBALS["iocnikpznt"]} != "") {
            $GLOBALS["rqqjxhljvf"] = "value";
            $irvnuggrcij = "value";
            $GLOBALS["mvvpjqv"] = "key";
            $kleswvcbcki = "key";
            if ($this->where == "") {
                $this->where = " where " . $key . " = " . $value;
            } else {
                $this->where .= " or " . $key . " = " . $value;
            }
        } else {
            $amigjni = "key";
            if ($this->where == "") {
                $this->where = " where " . ${$GLOBALS["cxyhsdsenonb"]};
            } else {
                $this->where .= " or " . $key;
            }
        }
    }
    function setOrder($str)
    {
        $ytxmayklf = "str";
        $this->order = " order by " . $str;
    }
    function setLimit($str)
    {
        $ympvqsebxd = "str";
        $this->limit = " limit " . $str;
    }
    function setError($msg)
    {
        $this->error[] = ${$GLOBALS["yenmyyrfo"]};
    }
    function showError()
    {
        $GLOBALS["awcymzfflfcr"] = "value";
        foreach ($this->error as ${$GLOBALS["iocnikpznt"]}) {
            echo "<br>" . $value;
        }
    }
    function reset()
    {
        $this->sql = "";
        $this->result = "";
        $this->where = "";
        $this->order = "";
        $this->limit = "";
        $this->table = "";
    }
    function debug()
    {
        echo "<br> servername: " . $this->servername;
        echo "<br> username: " . $this->username;
        echo "<br> password: " . $this->password;
        echo "<br> database: " . $this->database;
        echo "<br> " . $this->sql;
    }
    function escape_str($str)
    {
        if (is_array(${$GLOBALS["roylislcfyx"]})) {
            $hsrxjcx = "val";
            $vdyhiu = "str";
            foreach (${$GLOBALS["roylislcfyx"]} as ${$GLOBALS["cxyhsdsenonb"]} => $val) {
                $GLOBALS["ucndvagpln"] = "val";
                ${$GLOBALS["roylislcfyx"]}[${$GLOBALS["cxyhsdsenonb"]}] = $this->escape_str($val);
            }
            return ${$vdyhiu};
        }
        if (function_exists("mysql_real_escape_string") and is_resource($this->db)) {
            return mysql_real_escape_string(${$GLOBALS["roylislcfyx"]}, $this->db);
        } elseif (function_exists("mysql_escape_string")) {
            return mysql_escape_string(${$GLOBALS["roylislcfyx"]});
        } else {
            $tobsuuik = "str";
            return addslashes($str);
        }
    }
    function xssClean($str)
    {
        $GLOBALS["inpnxmy"] = "str";
        ${$GLOBALS["roylislcfyx"]} = str_replace("'", "&#039;", ${$GLOBALS["roylislcfyx"]});
        $jirgtz = "str";
        $str = str_replace("\"", "&quot;", ${$GLOBALS["roylislcfyx"]});
        $GLOBALS["cgimzpljwqe"] = "str";
        $str = str_replace("<", "&lt;", ${$GLOBALS["roylislcfyx"]});
        $str = str_replace(">", "&gt;", ${$GLOBALS["roylislcfyx"]});
        return ${$GLOBALS["roylislcfyx"]};
    }
}
$host = $_SERVER["HTTP_HOST"];
die($host);
