<?php
include("db_connect.php");

    $sal = "SELECT * FROM `company`  WHERE company_id = '".$emp['company_id']."'";
    $rashu = mysqli_query($conn,$sal);
    $comp_del = mysqli_fetch_array($rashu);
?>


<style>
.img-responsive 
 {
     width:200px;
     height:auto;
 }   
    
</style>


<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile Details | SaharDirectory </title>
    
    <?php include('header-link.php'); ?>

	</head>
	<body class="home-2">
		<div class="wrapper">  
			<?php include('header.php'); ?>
			<div class="clearfix"></div>
			
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">

						<h1>Employee <span class="current"> Dashboard</span></h1>
					</div>

				</div>

			</section>
			<div class="clearfix"></div>
			<!-- Page Title -->
			
			<section class="padd-0">
				<div class="container">
					
					<div class="add-listing-box translateY-60 edit-info mrg-bot-25 padd-bot-30 padd-top-25">


						<div class="listing-box-header">

							<div class="avater-box" style=";">

								<?php
						
								if($emp['image'] != '')
									echo'
							<img src="images/employee/'.$emp["image"].'" class="img-responsive img-circle edit-avater" alt="'.$emp['emp_name'].'"/>';

							else
							{
								echo'	<img src="images/com_profile_def.png" class="img-responsive img-circle edit-avater" />';
							}
							?>
							</div>
							<h3> <?= $emp['emp_name']; ?></h3>
							<?php
	$fetch = mysqli_query($conn,"SELECT * FROM `company` WHERE `company_id` ='".$emp['company_id']."' ");
	$comp = mysqli_fetch_array($fetch);
							?>
							<p><a target="_blank" 
						   href="../<?= $comp['company_web_title'] ?>/<?= $emp['employee_web_url']; ?>"  class="btn btn-info"> click here to get url</a>
						   <a href="edit-employee.php" class="btn btn-info">Edit Profile</a></p>
					       </div>
						<div class="row mrg-r-10 mrg-l-10 preview-info">
							<div class="col-sm-6 row">
								
							<div class="col-sm-12">
							<br><label>
								<b>Contact no. :</b> <?= $emp['emp_no']; ?></label>
							</div>
							<div class="col-sm-12">
								<label>
									<b>Email ID :</b> <?= $emp['emp_email']; ?></label>
							</div>
							<div class="col-sm-12">
								<label>
									<b>Registered Date : </b><?=date_format(date_create($emp['create_date']), "d M Y") ?>

							</div>
							<div class="col-sm-12">
								<label><b>Whatsapp No. :</b></label>
										<span><?= $emp['emp_whatsapp_no']; ?></span>
										</div>
										<div class="col-sm-12">
								<label><b>Designation :</b></label>
										<span><?= $emp['emp_designation']; ?></span>
										</div>
										<div class="col-sm-12">
								<label><b>Address :</b></label>
										<span><?= $emp['emp_address']; ?></span>
										</div></div>
							 
							
							<div class="col-sm-6">
							<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-5">
							<div class="preview-info-header">
								<br>
								<h4>Follow Us</h4>
							</div>
							<div class="preview-info-body">
								<ul class="social-info info-list">
									<li>
										<label><i class="fa fa-facebook"></i></label>
										<span><?= $emp['emp_fb']; ?></span>
									</li>
									
									<li>
										<label><i class="fa fa-whatsapp"></i></label>
										<span><?= $emp['emp_whastapp']; ?></span>
									</li>
									<li>
										<label><i class="fa fa-linkedin"></i></label>
										<span><?= $emp['emp_linkdin']; ?></span>
									</li>
									<li>
										<label><i class="fa fa-instagram"></i></label>
										<span><?= $emp['emp_insta']; ?></span>
									</li>

									
								</ul>
							</div>
							</div>
							</div>
							
							 
						</div>
					</div>
					<!-- End General Information -->
				</div>
			</section>
			
				
			<?php include('footer-link.php'); ?>
			
		<?php include('footer.php'); ?>
			
		</div>
	</body>
</html>