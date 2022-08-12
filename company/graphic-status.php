<?php
include ("db_connect.php");

echo $_POST["status"];
// echo $_POST["a"];
 
 

$sql = "UPDATE `company` SET `graphic_status`='".$_POST["status"]."' WHERE `company_id` = '$company' ";
$msu = mysqli_query($conn, $sql);
 

?>
