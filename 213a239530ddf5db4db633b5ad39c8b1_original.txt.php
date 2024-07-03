<?php

function IIIIIIII1lIl()
{
    $IIIIIIII1lI1 = 'undefined';
    if (isset($_SERVER)) {
        $IIIIIIII1lI1 = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $IIIIIIII1lI1 = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $IIIIIIII1lI1 = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
    } else {
        $IIIIIIII1lI1 = getenv('REMOTE_ADDR');
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $IIIIIIII1lI1 = getenv('HTTP_X_FORWARDED_FOR');
        } else {
            if (getenv('HTTP_CLIENT_IP')) {
                $IIIIIIII1lI1 = getenv('HTTP_CLIENT_IP');
            }
        }
    }
    $IIIIIIII1lI1 = htmlspecialchars($IIIIIIII1lI1, ENT_QUOTES, 'UTF-8');
    return $IIIIIIII1lI1;
}
session_start();
$IIIIIIIllIII = file_get_contents('./includes/eggzie.json');
$IIIIIIIllIIl = json_decode($IIIIIIIllIII, true);
$IIIIIIIllII1 = $IIIIIIIllIIl['info'];
$IIIIIIIllIlI = $IIIIIIIllII1['aa'];
$IIIIIIIl1I1I = new SQLite3('./a/.eggziepanels.db');
$IIIIIIIl1I1I->exec('CREATE TABLE IF NOT EXISTS USERS(id INT PRIMARY KEY,NAME TEXT,USERNAME TEXT,PASSWORD TEXT,LOGO TEXT)');
$IIIIIIIl1I1l = $IIIIIIIl1I1I->query('SELECT COUNT(*) as count FROM USERS');
$IIIIIIIIII1l = $IIIIIIIl1I1l->fetchArray();
$IIIIIIIl1I11 = $IIIIIIIIII1l['count'];
if ($IIIIIIIl1I11 == 0) {
    $IIIIIIIl1I1I->exec('INSERT INTO USERS(id,NAME,USERNAME,PASSWORD,LOGO) VALUES(\'1\',\'Your Name\',\'admin\',\'admin\',\'img/logo.png\')');
}
$IIIIIIIl1lII = $IIIIIIIl1I1I->query("SELECT * \r\n\t\t\t\t  FROM USERS \r\n\t\t\t\t  WHERE id='1'");
$IIIIIIIl1lIl = $IIIIIIIl1lII->fetchArray();
$IIIIIIIl1lI1 = $IIIIIIIl1lIl['NAME'];
$IIIIIIIl1llI = $IIIIIIIl1lIl['LOGO'];
if (isset($_POST['login'])) {
    $IIIIIIIl1lll = 'SELECT * from USERS where USERNAME="' . $_POST['username'] . '"';
    $IIIIIIIl1ll1 = $IIIIIIIl1I1I->query($IIIIIIIl1lll);
    while ($IIIIIIIl1l1I = $IIIIIIIl1ll1->fetchArray()) {
        $IIIIIIIl1l1l = $IIIIIIIl1l1I['id'];
        $NAME = $IIIIIIIl1l1I['NAME'];
        $IIIIIIIl11II = $IIIIIIIl1l1I['USERNAME'];
        $IIIIIIIl11Il = $IIIIIIIl1l1I['PASSWORD'];
        $IIIIIIIl11I1 = $IIIIIIIl1l1I['LOGO'];
    }
    if (empty($IIIIIIIl1l1l)) {
        $IIIIIIIIl1ll = '<div class="alert alert-danger" id="flash-msg"><h4><i class="icon fa fa-times"></i>Not a Valid User!</h4></div>';
        echo "<div class=\"alert alert-danger\" id=\"flash-msg\"><h4><i class=\"icon fa fa-times\"></i>Not a Valid User!</h4></div>";
    } else {
        if ($IIIIIIIl11Il == $_POST['password']) {
            $_SESSION['eggzie_iboPlayer'] = true;
            $_SESSION['N'] = $IIIIIIIl1l1l;
            $_SESSION['id'] = $IIIIIIIl1l1l;
            header('Location: users.php');
        } else {
            $IIIIIIIIl1ll = '<div class="alert alert-danger" id="flash-msg"><h4><i class="icon fa fa-times"></i>Wrong Password!</h4></div>';
            echo "<div class=\"alert alert-danger\" id=\"flash-msg\"><h4><i class=\"icon fa fa-times\"></i>Wrong Password!</h4></div>";
        }
    }
    $IIIIIIIl1I1I->close();
}
$date = date('d-m-Y H:i:s');
$IIIIIIIl11lI = IIIIIIII1lIl();
$IIIIIIIl11ll = new SQLite3('./a/.logs.db');
$IIIIIIIl11ll->exec('CREATE TABLE IF NOT EXISTS logs(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date TEXT, ipaddress TEXT)');
$IIIIIIIl11ll->exec('INSERT INTO logs(date,ipaddress) VALUES(\'' . $date . '\',\'' . $IIIIIIIl11lI . '\')');
$IIIIIIIIlIlI = new SQLite3('./a/.eggziedb.db');
$IIIIIIIIlIlI->exec('CREATE TABLE IF NOT EXISTS ibo(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,mac_address VARCHAR(100),username VARCHAR(100),password VARCHAR(100),expire_date VARCHAR(100),url VARCHAR(100),title VARCHAR(100),created_at VARCHAR(100))');
$IIIIIIIIlIlI->exec('CREATE TABLE IF NOT EXISTS theme(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,name VARCHAR(100),url VARCHAR(100))');
