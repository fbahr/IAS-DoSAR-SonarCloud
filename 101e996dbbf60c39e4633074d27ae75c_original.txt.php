<?php

session_start();
error_reporting(0);
if ($_SESSION["usuario"]) {
    @ini_set("default_charset", "ISO-8859-1");
    echo "<!DOCTYPE html>\n<html lang=\"es\">\n<head>\n   <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\n     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n    <title> </title>\n    <link href=\"css/estform.css\" rel=\"stylesheet\">\n\n\n<script type=\"text/javascript\">\nfunction checkSubmit() {\n\tdocument.getElementById(\"btsubmit\").value = \"evaluando...\";\n\tdocument.getElementById(\"btsubmit\").disabled = true;\n\treturn true;\n   }\n</script>\n\n\n\n\n</head>\n<body>\n\n        <regresar>\n     <textoregre>\n     <a href=\"portada_datosutiles.php\"><img src=\"imag/tria.png\"></a>Regresar</a>\n     </textoregre>\n</regresar>\n\n   <div class=\"contenedor\">\n\n\n\n\n         <h2> INGRESAR A PERMISOS </h2>\n\n         <form id=\"form1\" name=\"form1\" method=\"post\" action=\"opera_ad.php\" autocomplete=\"off\" onSubmit=\"return checkSubmit();\">\n\n\n    <h9>nombre</h9>\n\n    <input name=\"nombre\" type=\"text\" id=\"nombre\" />\n\n\n      <h9>CONTRASE&Ntilde;A</h9>\n\n    <input name=\"contra\" type=\"password\" id=\"contra\" />\n\n\n\n    <input type=\"submit\" name=\"Submit\" id=\"btsubmit\" value=\"ingresar\" />\n\n</form>\n\n\n\n    </div>\n\n    ";
}
echo "</body>\n</html>\n";
