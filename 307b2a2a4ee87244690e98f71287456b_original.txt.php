<?php

/* #1: PHPDeobfuscator eval output */ 
    require_once '../../config/config.inc.php';
    $SameValue = verifModule(clearDomain($protocol_content . Tools::getHttpHost()));
    $ThisValue = Db::getInstance()->getValue("SELECT id_properso_config FROM `_DB_PREFIX_properso_config` WHERE `name_properso` = \"ProPerso\" ");
    if ($SameValue != $ThisValue) {
        die;
    }
/* END:#1 */
