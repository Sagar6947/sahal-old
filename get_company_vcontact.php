<?php


require_once "DBController.php";
$dbController = new DBController();



if(!empty($_GET["action"])) {
    $query = "SELECT * FROM `company` WHERE `company_id` = ?";
    $param_type = "i";
    $param_value_array = array($_GET["id"]);
    $contactResult = $dbController->runQuery($query,$param_type,$param_value_array);
    
    require_once "vcardexport_company.php";
    $vcardExport = new VcardExport();
    $vcardExport->contactVcardExportService($contactResult);
    exit;
}

?>