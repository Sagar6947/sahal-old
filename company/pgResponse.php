<?php
include('db_connect.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$msg='';
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); 


if(!isset($_SESSION['SaharDirectory_status']))
    { 
          $sess = mysqli_query($conn,"SELECT * FROM `package_purchased` WHERE `order_id`= '".$_POST['ORDERID']."'");
        $newrowe = mysqli_fetch_array($sess);
     	$_SESSION['SaharDirectory_status'] = 'Active';
        $_SESSION['SaharDirectory'] = $newrowe['company_id'];
    }


if($isValidChecksum == "TRUE") {

    if ($_POST["STATUS"] == "TXN_SUCCESS") {
        $msg .=  '<i class="fa fa-check" aria-hidden="true"></i><h2>Transaction status is success</h2>';
    $sal=mysqli_query($conn, "SELECT * FROM `package_purchased` WHERE `order_id` = '".$_POST['ORDERID']."' ");
    $co= mysqli_fetch_array($sal);
    $coupon_update = mysqli_query($conn, "UPDATE `coupon` SET `status`='used' WHERE `id` = '".$co['coupon_id']."' " );
    
        
    }
    else {
        $msg .=  '<i class="fa fa-times" aria-hidden="true"></i><h2>Transaction status is failure</h2>';
    }
    $rtf='';
    if (isset($_POST) && count($_POST)>0 )
    { 
        // print_r($_POST);
        $newquery = mysqli_query($conn,"SELECT * FROM `package_purchased` WHERE `order_id`= '".$_POST['ORDERID']."'");
        $newrow = mysqli_fetch_array($newquery);
     	$_SESSION['SaharDirectory_status'] = 'Active';
        $_SESSION['SaharDirectory'] = $newrow['company_id'];
        
        
        
        
        $fg = "UPDATE `package_purchased` SET `status`= '0',`mid`='".$_POST['MID']."',`txnid`='".$_POST['TXNID']."',`amount`='".$_POST['TXNAMOUNT']."',`payment_mode`='".$_POST['PAYMENTMODE']."',`payment_status`='".$_POST['STATUS']."',`banktxn_id`='".$_POST['BANKTXNID']."'  WHERE `order_id` ='".$_POST['ORDERID']."'";
        mysqli_query($conn,$fg);
        $msg .= '<p> <b>Amount :</b> Rs.'.$_POST['TXNAMOUNT'].' /-<br><b>OrderID : </b>'.$_POST['ORDERID'].'<br> <b>Payment Status :</b> '.$_POST['STATUS'].'</p>';
    }
}else {
    $msg = '<i class="fa fa-times" aria-hidden="true"></i><b>Checksum mismatched.</b>';
    
}



  




?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payment Response | SaharDirectory </title>
    <?php include('header-link.php'); ?>
    
	</head>
	<body class="home-2">
		<div class="wrapper">  
            <?php include('header.php'); ?>
			<div class="clearfix"></div>
			
			
			<!-- ================ Start Page Title ======================= -->
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Confirmation</h1>
						<div class="breadcrumbs">
							<a href="#">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Payment Confirmation</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ================ End Page Title ======================= -->
			
			
			<section>
				<div class="container">
					<div class="booking-confirm padd-top-30 padd-bot-30">
						<?php //print_r($_POST); ?>
						<?= $msg ?>
					</div>
				</div>
			</section>

			
			<?php include('footer.php'); ?>
			<?php include('footer-link.php'); ?>
			
		</div>
	</body>

</html>