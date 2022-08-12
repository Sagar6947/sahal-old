<?php
include('../db_connect.php');
 

date_default_timezone_set("Asia/Kolkata");

define('website_url', 'http://localhost/directory/');
$company_detail='';
$subscribe=false;
$subs = '<img src="images/subs.png" style="width:20px;" />';

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


if(isset($_SESSION['SaharDirectory_status']))
{
	
    $company = $_SESSION['SaharDirectory'];
    $queryi = "SELECT * FROM `company`  WHERE `company_id` = '".$company."'";
    $ras = mysqli_query($conn,$queryi);
    $company_detail = mysqli_fetch_array($ras);
    $query2 = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'company' AND `company_id` = '".$company."' AND `status`='0' LIMIT 1";
    $row2 = mysqli_query($conn,$query2);
    if(mysqli_num_rows($row2) > 0)
    {
        $fetch2 = mysqli_fetch_array($row2);
        $exp = date('Y/m/d',strtotime($fetch2['exp_date']));
        $today = date('Y/m/d');
        if($exp < $today){
            // echo $exp.' < '.$today;
            $fg = "UPDATE `package_purchased` SET `status`= '1'   WHERE `id` ='".$fetch2['id']."'";
            mysqli_query($conn,$fg);
            // exit;

        }elseif($fetch2['payment_status'] == 'TXN_SUCCESS'){
            $subscribe=true;
        }else{}
    }

}
else if(isset($_SESSION['ekaumbharat']))
{
	
    $employee = $_SESSION['ekaumbharat_Employee'];
    $comemp= "SELECT * FROM `employee`  WHERE emp_id = '".$employee."' AND emp_status = 0";
    $rashu = mysqli_query($conn,$comemp);
    $emp = mysqli_fetch_array($rashu);

    $query2 = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'employee' AND `emp_id` = '".$employee."' AND `status`='0' LIMIT 1";
    $row2 = mysqli_query($conn,$query2);
    if(mysqli_num_rows($row2) > 0)
    {
        $fetch2 = mysqli_fetch_array($row2);
        $exp = date('d/m/Y',strtotime($fetch2['exp_date']));
        $today = date('d/m/Y');
        if($exp == $today){
            $fg = "UPDATE `package_purchased` SET `status`= '1' WHERE `id` ='".$fetch2['id']."'";
            mysqli_query($conn,$fg);
            // echo 'expire';

        }elseif($fetch2['payment_status'] == 'TXN_SUCCESS'){
            $subscribe=true;
            // echo 'notexpire';
        }else{}
    }

}

else
{
   
}


?>