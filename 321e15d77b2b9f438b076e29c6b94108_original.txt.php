
<?php 
require "/var/www/html/vendor/autoload.php";
require "/var/www/html/sys/Class/core/Telegram.php";
if (empty($_GET["token"])) {
    echo json_encode(array("error" => true, "message" => "Ocorreu um erro ao processar a sua requisi\xc3\xa7\xc3\xa3o!"));
    die;
}
$message = json_decode(file_get_contents("php://input"));
if (empty($message)) {
    echo json_encode(array("error" => true, "message" => "Ocorreu um erro ao processar a sua requisi\xc3\xa7\xc3\xa3o!"));
    die;
}
try {
    $tg = new Telegram($_GET["token"]);
    $tg->parseMessage($message);
} catch (Exception $e) {
    echo json_encode(array("error" => true, "message" => $e->getMessage()));
}
file_get_contents(SITE["url"] . "sys/testchecker.php");
