<?php
include ("db_connect.php");

 $comemp= "SELECT * FROM `employee`  WHERE emp_id = '".$_GET['id']."'";
    $rashu = mysqli_query($conn,$comemp);
    $emp = mysqli_fetch_array($rashu);

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
	    <title>Edit Employee Profile | SaharDirectory </title>
    <?php include('header-link.php'); ?>

   
    
	</head>
	<body class="home-2">
		<div class="wrapper">  
			<?php include('header.php'); ?>
			<div class="clearfix"></div>
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Edit Employee profile</h1>
						<div class="breadcrumbs">
							<a href="employee-details.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Edit Employee profile</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
		
			<section>
				<div class="container">
					<div class="col-md-10 col-sm-12 col-md-offset-1 mob-padd-0">
						<!-- General Information -->
						<div class="add-listing-box general-info mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<i class="ti-files theme-cl"></i>
								<h3>General Information</h3>
								
							</div>
							<form method="post" action="edit-employee-code.php" enctype="multipart/form-data"> 
								<div class="row mrg-r-10 mrg-l-10">
									<div class="col-sm-4">
										 <label>Employee Name :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Name"  id="employee_name" name="emp_name" value="<?= $emp['emp_name']; ?>" />
									</div>
									<div class="col-sm-4">
										 <label>Designation :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Designation"  id="emp_designation" name="emp_designation" value="<?= $emp['emp_designation']; ?>"/>
									</div>

									<div class="col-sm-4">
										 <label>Employee Web url :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Ex : John_Deo"  id="employee_web_url" name="employee_web_url" value="<?= $emp['employee_web_url']; ?>"/>
									</div>
								</div>
							</div>
 
						<div class="add-listing-box full-detail mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<i class="ti-write theme-cl"></i>
								<h3>Full Details</h3>
								<p>Write full detail information about Employee</p>
							</div>
							
								<div class="row mrg-r-10 mrg-l-10">
									
									<div class="col-sm-4">
									  <label>Email :</label>
                                        <input type="email" class="form-control" placeholder="Employee Email"  id="emp_email " name="emp_email" value="<?= $emp['emp_email']; ?>" />
									</div>
									
									<div class="col-sm-4">
										<label>Phone No. :</label>
										 <input type="number"  class="form-control" placeholder="Employee Contact"  id="emp_no" name="emp_no"  value="<?= $emp['emp_no']; ?>"/>
									</div>
									
									<div class="col-sm-4">
										 <label>WhatsApp No. :</label>
                                        <input type="number"  class="form-control" placeholder="Employee WhatsApp"  id="emp_whatsapp_no" name="emp_whatsapp_no"  value="<?= $emp['emp_whatsapp_no']; ?>"/>
									</div>
								 
									<div class="col-sm-8">
									<label>Address :</label>
                                        <input type="text"  class="form-control" placeholder="Employee Address"  id="emp_address" name="emp_address" value="<?= $emp['emp_address']; ?>"  />
								</div>
									<div class="col-sm-4">
										  <label>Employee Image :</label>
                                        <input type="file" class="form-control" name="image" />

                                        <input name="img" type="hidden" value="<?= $emp["image"] ;?>">
									</div>
									
									
									<div class="col-sm-6">
										<label><i class="fa fa-facebook mrg-r-5" aria-hidden="true"></i>Facebook Link</label>
										 <input type="text" maxlength="255" class="form-control" placeholder="Employee Facebook Link"  id="emp_fb" name="emp_fb" value="<?= $emp['emp_fb']; ?>"  />
									</div>
									<div class="col-sm-6">
										<label><i class="fa fa-instagram mrg-r-5" aria-hidden="true"></i>Instagram Link</label>
										  <input type="text" maxlength="255" class="form-control" placeholder="Employee instagram Link"  id="emp_insta " 
										  name="emp_insta"  value="<?= $emp['emp_insta']; ?>"/>
									     </div>
									
									
										<div class="col-sm-6">
										<label><i class="fa fa-whatsapp mrg-r-5" aria-hidden="true"></i>Whatsapp Link</label>
										  <input type="text" maxlength="255" class="form-control" placeholder="Employee Whatsapp Link"  id="emp_whastapp" name="emp_whastapp"  value="<?= $emp['emp_whastapp']; ?>"/>
									    </div>
									    <div class="col-sm-6">
										<label><i class="fa fa-linkedin-square mrg-r-5" aria-hidden="true"></i>Linked In</label>
										  <input type="text" maxlength="255" class="form-control" placeholder="Employee Linkedin Link"  id="emp_linkdin" name="emp_linkdin" value="<?= $emp['emp_linkdin']; ?>"  />
									</div>
								</div>
							
						</div>
						
						<div class="text-center">
							<input type="submit"  class="btn theme-btn" 
							 name="Employee_edit" />
						</div>
					</div>
					</form>
				</div>
			</section>
			
			<?php include('footer.php'); ?>
			<?php include('footer-link.php'); ?>
		</div>
	</body>
</html>