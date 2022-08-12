<?php
include('db_connect.php');

 if(!isset($_SESSION['SaharDirectory_status']) && !isset($_SESSION['ekaumbharat'])){
     echo '<script>alert("Login Required")</script>'; 
     	echo '<script>window.location="company-login.php"</script>'; 
 }
 $ndate = date("Y-m-d h:i:sa");
 
    $query = mysqli_query($conn,"SELECT * FROM `package` WHERE `id` = '".$_GET["id"]."'");
    
    // $query = mysqli_query($conn,"INSERT INTO `package_purchased`(`package_id`, `company_id`, `order_id`,  `exp_date`, `status`) VALUES ('".$_GET["id"]."','".$_SESSION['SaharDirectory']."','".$rand."','0','1')");
 
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Package Details | SaharDirectory </title>
 
    <?php include('header-link.php'); ?>
    
	</head>
	<body class="home-2">
		<div class="wrapper">  
        <?php include('header.php'); ?>
			<div class="clearfix"></div>
			
			
			<!-- Page Title -->
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Packages</h1>
						<div class="breadcrumbs">
							<a href="#">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Pricing</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Page Title -->
			
			<!-- ================ Pricing Table ======================= -->
			<section>
				<div class="container">
				<form action="proceeding.php" method="post">
                    <?php 
                        // $query = mysqli_query($conn,"SELECT * FROM `package` ORDER BY `package_price` ASC");
                        $rows = mysqli_fetch_array($query);
                        
                            echo '<div class="col-md-4 col-sm-4">
                                <div class="package-box">
                                    <div class="package-header">
                                         
                                        <h3>Package - '.$rows['package_name'].'</h3>
                                    </div>
                                    <div class="package-price">
                                        <h2><sup>Rs. </sup>'.$rows['package_price'].'<sub>/'.$rows['package_day'].' Days</sub></h2>
                                    </div>
                                    <!-- <div class="package-info">
                                        <ul>
                                        <li>3 Designs</li>
                                        <li>3 PSD Designs</li>
                                        <li>4 color Option</li>
                                        <li>10GB Disk Space</li>
                                        <li>Full Support</li>
                                        </ul>
                                    </div>
                                    <a  href="coupon-proceeding.php?id='.$rows['id'].'"><button class="btn btn-package">Upgrade Now</button></a> -->
                                </div>
                            </div>
                            
                            ';
                            
                    ?>
					
                    <div class="col-md-4 col-sm-4">
                                <div class="package-box">
                                    <div class="package-header">
                                         
                                        <h3>Apply Coupon  </h3>
                                    </div>
                                     
                                    <div class="package-info">
                                    <input type="hidden" name="package" id="package" value="<?= $rows['id'] ?>" />
                                        <ul>
                                        <?php
                                        if(isset($_SESSION["ekaumbharat"])){
                                            $user = $_SESSION["ekaumbharat_Employee"];
                                            $q= "SELECT * FROM `coupon` WHERE `company_id`='".$emp['company_id']."' AND `status`='new' AND `type`='employee'";
                                            
                                        }if(isset($_SESSION["SaharDirectory"])){
                                            $user = $_SESSION["SaharDirectory"];
                                            $q= "SELECT * FROM `coupon` WHERE `company_id`='".$user."' AND `status`='new' AND `type`='company'";
                                        }
                                            $query = mysqli_query($conn,$q);
                                            if(mysqli_num_rows($query) > 0){

                                            
                                            while($que = mysqli_fetch_array($query)){
                                                echo '<li>';
                                                ?>
                                                <label><input type="radio" class="coupon" name="coupon" value="<?= $que['id'] ?>" data-waschecked="false" />Apply Coupon  <?= $que['coupon_nm'] ?> and get 
                                                <span style="color:green">  <?= $que['coupon_off'].' % OFF' ?>   </span></label>
                                                <?php
                                                echo '</li>';
                                            }
                                        }else{
                                            echo '<li style="color:red"> Coupons Not available </li>';
                                        }
                                           
                                            ?>
                                        
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="package-box">
                                    <div class="package-header">
                                         
                                        <h3>Grand Total</h3>
                                    </div>
                                     
                                    <div class="package-info">
                                    <div class="package-price">
                                        <h2><sup>Rs. </sup><span id="price"></span><sub>/- </sub></h2>
                                        <input type="hidden" name="totalprice" id="totalprice" value="" />
                                    </div>
                                      
                                    </div>
                                    <button type="submit" name="submit_pack" class="btn btn-package">Pay Now</button>
                                </div>
                            </div>
                            </form>
				</div>
			</section>
			<!-- ================ End Pricing Table ======================= -->
			
			<?php include('footer.php'); ?>
			<?php include('footer-link.php'); ?>
			<script>
                $('input[name="coupon"]').change(function(){
                    radiovalue();
                });

                $('input[name="coupon"]').click(function(){
                    var $radio = $(this);
                    // console.log('click');
                    // if this was previously checked
                    if ($radio.data('waschecked') == true)
                    {
                        $radio.prop('checked', false);
                        $radio.data('waschecked', false);
                        radiovalue();
                    }
                    else
                        $radio.data('waschecked', true);

                    // remove was checked from other radios
                    $radio.siblings('input[type="radio"]').data('waschecked', false);
                });
                function radiovalue(){
                    var package = $('#package').val();
                    if($('input:radio:checked').length > 0){
                        var as = $('input[name="coupon"]:checked').val();
                    }else{
                        var as ='0';
                    }
                    
                    
                    jQuery.ajax({
                        url: 'get_amt.php',
                        type: 'post',
                        data: {coupon:as,package:package},
                        success:function(data)
                        {
                            console.log(data);
                            $('#price').text(data);
                            $('#totalprice').val(data);
                        } 
                    });
                }
                radiovalue();
            </script>
		</div>
	</body>

 </html>