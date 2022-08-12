<?php
 
include("db_connect.php");

$package = $_POST['package']; 
$query = mysqli_query($conn,"SELECT * FROM `package` WHERE `id` = '".$package."'");
$row = mysqli_fetch_array($query);
if($_POST['coupon'] == '0'){
    echo $row['package_price'];

}else{
    $coupon = $_POST['coupon']; 
    $query1 = mysqli_query($conn,"SELECT * FROM `coupon` WHERE `id` = '".$coupon."'");
    $row1 = mysqli_fetch_array($query1);
    $coupontotal = ($row['package_price'] * $row1['coupon_off'])/100;
    $total = $row['package_price'] - $coupontotal;
     
     echo $total;
}


?>