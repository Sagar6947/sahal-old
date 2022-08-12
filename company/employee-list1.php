<?php
include("db_connect.php");
// echo $_SESSION["SaharDirectory"].'lol';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>Employee List | SaharDirectory </title>
    
    <?php include('header-link.php'); ?>
    
	</head>
	<body class="home-2">
	<div class="wrapper">
		<!-- Start Navigation -->
		<?php include('header.php'); ?>
		<div class="clearfix"></div>

		<!-- Page Title -->
		<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
			<div class="container">
				<div class="title-content">
					<h1>Employee Details</h1>
					<div class="breadcrumbs">
						<a href="company-details.php">Home</a>
						<span class="gt3_breadcrumb_divider"></span>
						<span class="current">Employee Details</span>
					</div>
				</div>
			</div>
		</section>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			

		 
			
			<!-- ================ Listing Detail Full Information ======================= -->
			<section class="list-detail">
				<div class="container">
					<div class="row">
						<!-- Start: Listing Detail Wrapper -->
						<div class="col-md-1 col-sm-8">
						    </div>
						
						<div class="col-md-10 col-sm-8">
						    <?php
					$employee = $conn->query("SELECT * FROM `employee` WHERE  `company_id` = '$company' ");
					$count = mysqli_num_rows($employee);
					if($count > 0){
					
					
					while ($employee_row = $employee->fetch_assoc()) {
					?>
					
							<div class="detail-wrapper">
								<div class="detail-wrapper-body">
								    <div class="row">
										<div class="col-sm-3">
											<img src="images/<?= (($employee_row['image'] == '') ? 'com_profile_def.png' : 'employee/' . $employee_row['image']); ?>" class="img-responsive" alt="<?= $employee_row['emp_name']; ?>">
										</div>
										<div class="col-sm-6">
            								    <div class="listing-title-bar">
            										<h3><?= $employee_row['emp_name']; ?><span class="mrg-l-5 category-tag"><?= $employee_row['emp_designation']; ?></span></h3>
            										<div>
            										    	<?php
												$fetch = mysqli_query($conn, "SELECT * FROM `company` WHERE `company_id` ='" . $employee_row['company_id'] . "' ");
												$comp = mysqli_fetch_array($fetch);
												?>
												
            											<a href="tel:<?= $employee_row['emp_no']; ?>" class="listing-address">
            												<i class="fa fa-phone" aria-hidden="true"></i> <?= $employee_row['emp_no']; ?>
            											</a> /
            											<a href="https://wa.me/91<?= $employee_row['emp_whatsapp_no']; ?>?text=Got%20reference%20from%20your%20Digital%20V-Card.%20Want%20to%20know%20more%20about%20your%20products%20and%20services." class="listing-address">
            											<i class="fa fa-whatsapp mrg-r-5" aria-hidden="true"></i><?= $employee_row['emp_whatsapp_no']; ?>
            											</a></br>
            											<a href="mailto:<?= $employee_row['emp_email']; ?>" class="listing-address">
            											<i class="fa fa-envelope" aria-hidden="true"></i> <?= $employee_row['emp_email']; ?>
            											</a></br>
            											<a href="https://SaharDirectory.com/<?= $comp['company_web_title'] ?>/<?= $employee_row['employee_web_url']; ?>"  target="_blank" class="listing-address">
            												<i class="fa fa-user" aria-hidden="true"></i>  SaharDirectory.com/<?= $comp['company_web_title'] ?>/<?= $employee_row['employee_web_url']; ?>
            											</a></br></br>
            											
            											<a href="../<?= $comp['company_web_title'] ?>/<?= $employee_row['employee_web_url']; ?>"   target="_blank" ><span class="mrg-l-5 category-tag">V-card</span></a>
            											
            											<a href="edit-employee.php?id=<?= $employee_row['emp_id']; ?>"   target="_blank" ><span class="mrg-l-5 category-tag">Edit</span></a>
            											
            												<a href="company-employee-feedback.php?id=<?= $employee_row['emp_id']; ?>"   target="_blank" ><span class="mrg-l-5 category-tag">Feedback</span></a>
            											
            											
            											<?php
															if ($employee_row['emp_status'] == 0) {
																echo '	<a href="delete_emp.php?id=' . $employee_row['emp_id'] . '"  ><span class="mrg-l-5 category-tag">Block</span></a>';
															} else {
																echo '<a href="delete_emp.php?id=' . $employee_row['emp_id'] . '" class="mrg-l-5 category-tag">Unblock</a>';
															}
															?>
															
															
															
            											 
            										</div>
            									</div>
										</div>
										<div class="col-sm-3">
												<h5> Username : <?= $employee_row['emp_no']; ?> </h5>
														<h5> Password : <?= $employee_row['employee_pass'] ?></h5><br>
														<a href="https://SaharDirectory.com/company/employee-login.php" class="btn btn-success col-md-12" target="_blank">Login Here </a>
										</div>
										 
									</div>
									
									 
								</div>
							</div>	
							<?php
					}
					}
					else
					{
					    echo '<div class="col-md-12 col-sm-12">
							<div class="  listing-shot" style="text-align:center;padding:20px;">
							<h3>You have not added any employee.<br>
							 Add Employees to view Them <br><i class="fa fa-search-minus" aria-hidden="true" style="font-size:100px;color:lightgrey"></i></h3>
							</div>
							</div>';
					    
					}
					?>
					
							 
							
							 
							
						 
							
							 
							
							 
						</div>
						<!-- End: Listing Detail Wrapper -->
							<div class="col-md-1 col-sm-8">
						    </div>
						<!-- Sidebar Start -->
					 
					    <!-- End: Sidebar Start -->
					</div>
				</div>
			</section>
			<?php include('footer.php'); ?>
		<?php include('footer-link.php'); ?>

	</div>
</body>

</html>