<?php

session_start();
include "inc/functionscpp.php";
include "inc/Acl.php";
$access = $_SESSION["logged_user"]["acesso"];
$role = $access;
$page = "produtos";
$action = "update";
$acl = rolesPermissions(new LizACL\Acl());
$acc = showAllowedLabel($acl, $role, $page, $action);
if ($acc == "False") {
    GoToNow("/index.php?action=noaccess");
} else {
    include "inc/config.php";
    include "inc/functions.php";
    if (isset($_POST["id"])) {
        $i = get_item("Produto", $_POST["id"]);
        $log = R::dispense("logs");
        $log->hora = date("Y-m-d\\TH:i:s");
        $log->ip = $_SERVER["REMOTE_ADDR"];
        $log->mensagem = $_SESSION["logged_user"]["nome"] . " modificou o produto com o nome de [" . $i["nome"] . "]" . "ID:[" . $i["id"] . "]";
        $i->nome = $_POST["produto-nome"];
        $i->descricao = $_POST["produto-descricao"];
        $i->patrimonio = $_POST["produto-ptr"];
        $i->unidade = $_POST["produto-und"];
        $i->categoria = $_POST["produto-cat"];
        $i->subcategoria = $_POST["produto-subcat"];
        R::store($i);
        R::store($log);
        $path = "./assets/prod/" . $i["id"] . "/";
        if (!file_exists($path)) {
            mkdir($path, 511, true);
            $countfiles = count($_FILES["file-3"]["name"]);
            $totalFileUploaded = 0;
            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES["file-3"]["name"][$i];
                $location = $path;
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $newname = $i . "pic" . date("d.m.Y-H.i.s") . "." . $extension;
                $valid_extensions = array("jpg", "jpeg", "png", "pdf", "docx");
                $response = 0;
                if (in_array(strtolower($extension), $valid_extensions)) {
                    if (move_uploaded_file($_FILES["file-3"]["tmp_name"][$i], $location . $newname)) {
                        $totalFileUploaded++;
                    }
                }
            }
        } else {
            $countfiles = count($_FILES["file-3"]["name"]);
            $totalFileUploaded = 0;
            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES["file-3"]["name"][$i];
                $location = $path;
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $newname = $i . "pic" . date("d.m.Y-H.i.s") . "." . $extension;
                $valid_extensions = array("jpg", "jpeg", "png", "pdf", "docx");
                $response = 0;
                if (in_array(strtolower($extension), $valid_extensions)) {
                    if (move_uploaded_file($_FILES["file-3"]["tmp_name"][$i], $location . $newname)) {
                        $totalFileUploaded++;
                    }
                }
            }
        }
        GoToNow("/produtos.php?action=update");
    } else {
        GoToNow("/produtos.php");
    }
}
