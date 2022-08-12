<?php
include ("db_connect.php");  
 
 
 $muskan =mysqli_query($conn, "SELECT * FROM `package_purchased` WHERE `id` = '".$_GET['id']."' " );
 
 
 $ras = mysqli_fetch_array($muskan);
 
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Package Invoice | SaharDirectory </title>
    
 
    <link href="assets/plugins/css/plugins.css" rel="stylesheet">	
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsiveness.css" rel="stylesheet">
	<link  type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/main.css">

    
    
	</head>
	<body>
		<div class="wrapper">  
			<section class="list-detail">
				<div class="container">
					<div class="detail-wrapper padd-top-30 padd-bot-30">
						<div class="row text-center">
							<h2>INVOICE</h2>
						</div>
					
					
					<div class="row mrg-0">
							<div class="col-md-3">
								<div id="logo"><img src="assets/img/logo.png" class="img-responsive" alt="SaharDirectory"  style="width:200px;"></div>
							</div>

						
						</div>
					
						<div class="row  mrg-0 detail-invoice">
							<div class="col-md-12">
							
							</div>
							<div class="row mrg-0">
							  <div class="col-lg-9 col-md-9 col-sm-9">
							  
								 <h5>Ekaum Enterprises <span style="font-size:14px;"> (Gst No. - 06CKAPK1798P3ZI ) </span></h5>
							
								<p>
									info@SaharDirectory.com<br />
									
									+91-9728 738 439<br />
									
								
								</p>
								
							  </div>
							  <div class="col-lg-3 col-md-3 col-sm-3">
							      <?php 
							      
							      $company = mysqli_query($conn, "SELECT * FROM `company` WHERE `company_id` =  '".$ras['company_id']."'   ");
							      $com = mysqli_fetch_array($company);
							      
							      ?>
							      
								<h4>Client Contact :</h4>
								<h5><?= $com['company_name'] ?>  </h5>
								<p>
								<?= $com['company_email'] ?><br/>
									
									<?= $com['company_contact'] ?><br/>
									
									<?= $com['company_address'] ?>
									<br /> 
								</p>
							  </div>
							</div>
						
							<hr />
							<div class="row mrg-0">
							  <div class="col-lg-6 col-md-6 col-sm-6">
							     
							   
									<strong>OREDER NO    :</strong>   <?= $ras['order_id'] ?> <br>
									<strong>Transaction id    :</strong>   <?= $ras['txnid'] ?> <br>
									<strong>ISSUED ON  :</strong>  <?= date("d/m/Y") ?>
 
								</br>
							      
							      
								<strong>PACKAGE DETAILS :</strong>
							  </div>
							</div>
							<hr />
							<div class="row mrg-0">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>S. No.</th>
													<th>Package Name</th>
													<th>Package Price</th>
												
													<th>Purchase date</th>
													<th>Expiry  date</th>
												
												</tr>
											</thead>
											<tbody>
											    
									<?php 
							      
							      $package = mysqli_query($conn, "SELECT * FROM `package` WHERE `id`= '".$ras['package_id']."'   ");
							      $pac = mysqli_fetch_array($package);
							      
							      $coupon = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `id` = '".$ras['coupon_id']."'   ");
							      $cou = mysqli_fetch_array($coupon);
							      
							      ?>
											    
												<tr>
													<td>1</td>
													<td><?= $pac['package_name']  ?>  Digital V-card + Mini Website</td>
													<td>₹<?= $pac['package_price']  ?></td>
												
													<td><?= date_format(date_create($ras['pur_date']), "d/m/Y ") ?> </td>
													<td><?= date_format(date_create($ras['exp_date']), "d/m/Y ") ?> </td>
												
												</tr>
												
											</tbody>
										</table>
									</div>
									<hr>
							  <?= (($cou['coupon_nm'] == '') ? 'Coupon Not Applied ' : '	<div> 	<hr> <h5>Coupon Name : ' .$cou['coupon_nm'].' </h5></div>') ?>
								
								
									    <?= (($cou['coupon_off'] == '') ? '' : '	<div> 	<hr> <h5>Discount : ' .$cou['coupon_off'].'% </h5> 	</div>') ?>
										
								
									<hr>
									<div>
										<h4>Total Amount : ₹<?= $ras['amount']; ?> </h4>
									</div>
									
									
									
									
									<hr>
									
										<div class="row text-right">
							<a href="javascript:window.print()" class="btn theme-btn-trans">Print</a>
						</div>
								
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</section>
		
			<a id="back2Top" class="theme-bg" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

			
			<!-- START JAVASCRIPT -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/plugins/js/bootstrap.min.js"></script>
			<script src="assets/plugins/js/bootsnav.js"></script>
			<script src="assets/plugins/js/bootstrap-select.min.js"></script>
			<script src="assets/plugins/js/bootstrap-touch-slider-min.js"></script>
			<script src="assets/plugins/js/jquery.touchSwipe.min.js"></script>
			<script src="assets/plugins/js/chosen.jquery.js"></script>
			<script src="assets/plugins/js/datedropper.min.js"></script>
			<script src="assets/plugins/js/dropzone.js"></script>
			<script src="assets/plugins/js/jquery.counterup.min.js"></script>
			<script src="assets/plugins/js/jquery.fancybox.js"></script>
			<script src="assets/plugins/js/jquery.nice-select.js"></script>
			<script src="assets/plugins/js/jqueryadd-count.js"></script>
			<script src="assets/plugins/js/jquery-rating.js"></script>
			<script src="assets/plugins/js/slick.js"></script>
			<script src="assets/plugins/js/timedropper.js"></script>
			<script src="assets/plugins/js/waypoints.min.js"></script>
			
			<script src="assets/js/jQuery.style.switcher.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
	
		</div>
	</body>
</html>