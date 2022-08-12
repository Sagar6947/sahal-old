<?php
include('db_connect.php');

$rand = "ORDS".rand(10000,99999999); 
 $ndate = date("Y-m-d h:i:sa");
 
if(isset($_POST["submit_pack"]))
{
    $package = $_POST["package"];
    $coupon = $_POST["coupon"];
    $totalprice = $_POST["totalprice"];
    
    $query = mysqli_query($conn,"SELECT * FROM `package` WHERE `id` = '".$package."' ");
    $row = mysqli_fetch_array($query);
    $query1 = mysqli_query($conn,"SELECT * FROM `coupon` WHERE `id` = '".$coupon."' ");
    $row1 = mysqli_fetch_array($query1);
    $date_exp = date('Y-m-d H:i:s', strtotime("+".$row['package_day']." days"));

    if(isset($_SESSION["ekaumbharat"])){
        $user = $_SESSION["ekaumbharat_Employee"];
        
        $fd = "SELECT * FROM `package_purchased` WHERE `emp_id`='".$user."' AND `package_id`='".$package."' AND `status`='0' AND `payment_status`='TXN_SUCCESS' ORDER BY `id` DESC";
        $fetch_old_data = mysqli_query($conn,$fd);
        if(mysqli_num_rows($fetch_old_data) > 0){
            $fetch_data = mysqli_fetch_array($fetch_old_data);
            if($fetch_data['exp_date'] < $ndate){
                $date_exp = date('Y-m-d H:i:s', strtotime("+".$row['package_day']." days"));
                // $date_pur = date("Y-m-d h:i:sa");
            }else{
                $date_exp = date('Y-m-d H:i:s', strtotime($fetch_data['exp_date']."+".$row['package_day']." days"));
                // $date_pur = date('Y-m-d H:i:s',strtotime($fetch_data['exp_date']));
            }
            
            
        $f = "INSERT INTO `package_purchased`(`package_id`,`coupon_id`,`pur_type`, `emp_id`, `order_id`,  `exp_date`, `status` ) VALUES ('".$package."','".$coupon."','employee','".$user."','".$rand."','".$date_exp."','1')";
        }else{
            $f = "INSERT INTO `package_purchased`(`package_id`,`coupon_id`,`pur_type`, `emp_id`, `order_id`,  `exp_date`, `status` ) VALUES ('".$package."','".$coupon."','employee','".$user."','".$rand."','".$date_exp."','1')";
        }
    }if(isset($_SESSION["SaharDirectory"])){
        $user = $_SESSION["SaharDirectory"];
        $fd = "SELECT * FROM `package_purchased` WHERE `company_id`='".$user."' AND `package_id`='".$package."' AND `status`='0' AND `payment_status`='TXN_SUCCESS' ORDER BY `id` DESC";
        $fetch_old_data = mysqli_query($conn,$fd);
        if(mysqli_num_rows($fetch_old_data) > 0){
            $fetch_data = mysqli_fetch_array($fetch_old_data);
            if($fetch_data['exp_date'] < $ndate){
                $date_exp = date('Y-m-d H:i:s', strtotime("+".$row['package_day']." days"));
                // $date_pur = date("Y-m-d h:i:sa");
            }else{
                $date_exp = date('Y-m-d H:i:s', strtotime($fetch_data['exp_date']."+".$row['package_day']." days"));
                // $date_pur = date('Y-m-d H:i:s',strtotime($fetch_data['exp_date']));
            }
            
            $f = "INSERT INTO `package_purchased`(`package_id`,`coupon_id`,`pur_type`, `company_id`, `order_id`,  `exp_date`, `status`) VALUES ('".$package."','".$coupon."','company','".$user."','".$rand."','".$date_exp."','1')";
            // echo $f;
            // exit();
        }else{
            $f = "INSERT INTO `package_purchased`(`package_id`,`coupon_id`,`pur_type`, `company_id`, `order_id`,  `exp_date`, `status`) VALUES ('".$package."','".$coupon."','company','".$user."','".$rand."','".$date_exp."','1')";
        }
        // echo $f;
    }
    $query = mysqli_query($conn,$f);
 
}
?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	 
		<form method="post" action="pgRedirect.php" name="f1">
		    
		        <input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?= $rand ?>"/>
                <input id="CUST_ID" type="hidden"tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="REVIEW<?= $user; ?>">
                <input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                <input id="CHANNEL_ID"  type="hidden" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                <input title="TXN_AMOUNT" tabindex="10" type="hidden" name="TXN_AMOUNT" value="<?= $totalprice ?>">
                
		<script type="text/javascript">
            document.f1.submit();
		
		</script>
	</form>
</body>
</html>