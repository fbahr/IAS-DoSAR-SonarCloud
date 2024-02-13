<?php

$GLOBALS["qxlricuq"] = "headerDisplayed";
$GLOBALS["fkbhypt"] = "data";
$GLOBALS["lwpxmbgeyw"] = "results";
$GLOBALS["eefunot"] = "fh";
$GLOBALS["rbpxnvekjnnq"] = "fileName";
$GLOBALS["rkytawys"] = "root_directory";
$GLOBALS["kflojokqiqx"] = "file_path";
$GLOBALS["qncyyrcdrze"] = "resultinfo";
$GLOBALS["wbydifnhss"] = "csv_sql";
$GLOBALS["emoiyqcz"] = "row";
$GLOBALS["dfmhbuglyidi"] = "prefx";
$GLOBALS["hjbgju"] = "sql";
$GLOBALS["yemmqxv"] = "csvData";
$GLOBALS["fjsqaskx"] = "values";
$GLOBALS["wdkoycnnwkq"] = "entityID";
$GLOBALS["culjgoybb"] = "vtEntityDelta";
$GLOBALS["whefjoixs"] = "application_status";
$GLOBALS["nsojdobavgs"] = "recordModel_po";
$GLOBALS["vofsqmjxpb"] = "moduleName";
class VodacomHandler extends VTEventHandler
{
    function handleEvent($eventName, $entityData)
    {
        global $adb;
        $moduleName = $entityData->getModuleName();
        $gnigmp = "moduleName";
        if ($moduleName == "Vodacom") {
            $GLOBALS["iickpyjgri"] = "eventName";
            $GLOBALS["cwutauj"] = "eventName";
            $GLOBALS["kkkgodjo"] = "eventName";
            $GLOBALS["plaldhrh"] = "eventName";
            if ($eventName == "vtiger.entity.beforesave.modifiable") {
            }
            if ($eventName == "vtiger.entity.beforesave") {
            }
            if ($eventName == "vtiger.entity.beforesave.final") {
            }
            if ($eventName == "vtiger.entity.aftersave") {
                $cctnsk = "entityID";
                $GLOBALS["edesnols"] = "entityID";
                $entityID = $entityData->getId();
                $rcwhfnppq = "statusChanged";
                $GLOBALS["ribwwu"] = "statusChanged";
                $recordModel_po = Vtiger_Record_Model::getInstanceById($entityID, $moduleName);
                $application_status = $recordModel_po->get("application_status");
                $vtEntityDelta = new VTEntityDelta();
                $statusChanged = $vtEntityDelta->hasChanged($moduleName, $entityID, "application_status");
                if ($statusChanged && $application_status == "Bot To Capture") {
                    $GLOBALS["ccefmruyf"] = "fileName";
                    $vvknycgq = "entityID";
                    $GLOBALS["wilbhirv"] = "entityID";
                    $fileName = "vod_" . $entityID . "_NEW.csv";
                    $values = $this->getQueryResult($entityID);
                    $csvData = array();
                    $jjuvyulpgk = "fileName";
                    $GLOBALS["ixzwguw"] = "csvData";
                    $utxtgnvjg = "csvData";
                    $csvData[] = $values;
                    $this->csv_download($csvData, $fileName);
                }
            }
        }
    }
    function getQueryResult($vodacomid)
    {
        $ovsgrcgp = "query";
        $tvynihews = "csv_sql";
        $efywljvndgjv = "csv_sql";
        $mqeajektz = "csv_sql";
        $jrruyi = "csv_sql";
        global $adb;
        $GLOBALS["rpmeqjplhvt"] = "csv_sql";
        $errzuatmov = "csv_sql";
        $GLOBALS["osycgigccdh"] = "row";
        $stkiew = "query";
        $csv_sql = "select a.vodacomid, ";
        $llpjvtq = "sql";
        $query = "select a.tabid, a.columnname, REPLACE(REPLACE(a.fieldlabel, '?', ''), '/','') fieldlabel, a.tablename, b.name from vtiger_field a join vtiger_tab b using (tabid)\nwhere tablename in ('vtiger_vodacom', 'vtiger_products', 'vtiger_contactdetails', 'vtiger_contactscf', 'vtiger_vodacomcf') order by tablename desc";
        $GLOBALS["uvgfngmvr"] = "csv_sql";
        $sql = $adb->pquery($query, array());
        while ($row = $adb->fetch_array($sql)) {
            $bfsxgrtzj = "csv_sql";
            $nmftuzshw = "prefx";
            $brcuuvgvdnt = "row";
            $jqwnpsubnqv = "row";
            $GLOBALS["bmsmysu"] = "csv_sql";
            $hrxqsxeivxn = "csv_sql";
            $GLOBALS["khgxkwgml"] = "row";
            $GLOBALS["cvgtlmou"] = "row";
            $njvjhnrol = "prefx";
            $rjrhzevx = "csv_sql";
            $ymjttqed = "row";
            $opusdoghqcpo = "row";
            $GLOBALS["xnpbeqt"] = "row";
            $GLOBALS["giifcndrlegb"] = "prefx";
            switch ($row["tablename"]) {
                case "vtiger_vodacom":
                    $prefx = "vod";
                    ${$rjrhzevx} .= "a." . ${$brcuuvgvdnt}["columnname"] . " as vod_" . strtolower(preg_replace("/[-()]/", "", str_replace(" ", "_", ${$opusdoghqcpo}["columnname"]))) . ", ";
                    break;
                case "vtiger_vodacomcf":
                    $prefx = "vodcf";
                    ${$bfsxgrtzj} .= "b." . $row["columnname"] . " as vodcf_" . strtolower(preg_replace("/[-()?]/", "", str_replace(" ", "_", $row["fieldlabel"]))) . ", ";
                    break;
                case "vtiger_contactdetails":
                    ${$nmftuzshw} = "con";
                    ${$hrxqsxeivxn} .= "c." . $row["columnname"] . " as {$prefx}_" . strtolower(preg_replace("/[-()?]/", "", str_replace(" ", "_", $row["columnname"]))) . ", ";
                    break;
                case "vtiger_contactscf":
                    ${$njvjhnrol} = "concf";
                    $csv_sql .= "e." . $row["columnname"] . " as {$prefx}_" . strtolower(preg_replace("/[-()?]/", "", str_replace(" ", "_", $row["fieldlabel"]))) . ", ";
                    break;
                case "vtiger_products":
                    $prefx = "prod";
                    $csv_sql .= "d." . ${$ymjttqed}["columnname"] . " as prod_" . strtolower(preg_replace("/[-()?]/", "", str_replace(" ", "_", $row["columnname"]))) . ", ";
                    break;
                default:
                    $prefx = "x";
                    break;
            }
        }
        ${$mqeajektz} = rtrim($csv_sql, " ");
        $gyojodb = "vodacomid";
        ${$jrruyi} = rtrim(${$errzuatmov}, ",");
        ${$tvynihews} .= " from vtiger_vodacom a left join vtiger_vodacomcf b on a.vodacomid=b.vodacomid ";
        $xubdmyrf = "resultinfo";
        $moluzxednk = "csv_sql";
        $csv_sql .= "left join vtiger_contactdetails c on a.contact_id=c.contactid left join vtiger_contactscf e on c.contactid=e.contactid ";
        $vfvlkqwg = "sql";
        $csv_sql .= "left join vtiger_products d on a.package=d.productid where a.vodacomid='" . ${$gyojodb} . "'";
        $sql = $adb->pquery($csv_sql, array());
        $resultinfo = $adb->fetch_array($sql);
        $resultinfo = array_intersect_key($resultinfo, array_flip(array_filter(array_keys($resultinfo), "is_string")));
        return $resultinfo;
    }
    function csv_download($results, $fileName)
    {
        $dkodseumr = "headerDisplayed";
        ob_clean();
        global $root_directory;
        $file_path = $root_directory . "BotCSVDrop/" . $fileName;
        $fh = @fopen($file_path, "w");
        $headerDisplayed = false;
        foreach ($results as $data) {
            $GLOBALS["osoizlhjntx"] = "headerDisplayed";
            $GLOBALS["cdzvjwkxi"] = "data";
            if (!$headerDisplayed) {
                $GLOBALS["qmydqyxyh"] = "data";
                fputcsv($fh, array_keys($data));
                $headerDisplayed = true;
            }
            $GLOBALS["nieplxwuccs"] = "fh";
            fputcsv($fh, $data);
        }
        fclose($fh);
        ob_end_flush();
        return;
    }
}
