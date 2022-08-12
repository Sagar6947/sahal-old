<?php
include ("db_connect.php");
 
if (isset($_POST['update_desc'])) {
  
	
	$company_about = mysqli_real_escape_string($conn , $_POST['company_about']);
	
	$update_profile = "UPDATE `company` SET  `company_about`='$company_about' WHERE company_id = '".$company."' ";
	if($conn->query($update_profile))
	{
		echo'<script>alert("Your Profile Updated Successfully ")</script>';
	}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo'<script>window.location="company-profile-edit.php"</script>';
}

?>




<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>	  
 <title>Edit About Us | SaharDirectory </title>
    
    <!-- All plugins -->
    <?php include('header-link.php'); ?>

   
    
	</head>
	<body class="home-2">
		<div class="wrapper">  
			<?php include('header.php'); ?>
<?php include 'company_edit_menu.php'; ?>
	
		
			<section class="padd-0">
				<div class="container">
				    	<div class="col-md-10 translateY-60 col-sm-12 col-md-offset-1"><h3>Edit About Us</h3>
						<form method="post" action="" enctype="multipart/form-data"> 
						<div class="add-listing-box full-detail mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<i class="ti-write theme-cl"></i>
								<h3>ABOUT US <?= (($subscribe == false)? $subs:'') ?></h3>
								 
							</div>
							
								<div class="row mrg-r-10 mrg-l-10">
							
						 
								
									<div class="col-sm-12">
										<label>Description</label>
										<textarea class="h-100 form-control"  name="company_about" id="editor1" placeholder="Company About"><?= $company_detail['company_about']; ?></textarea>
									</div>
									
								</div>
								
						
						<div class="text-center">
							<br>
							
							 	<button <?= (($subscribe == false)? 'id="subs"':'type="submit" ') ?> class="btn theme-btn" title="Submit Listing" name="update_desc">Update Description <?= (($subscribe == false)? $subs:'') ?></button>
						</div>
					</div>
					</form>
				</div>
			</section>
			
			<?php include('footer.php'); ?>
			<?php include('footer-link.php'); ?>
	
  <script>
    CKEDITOR.replace('editor1', {
      height: 250,
      extraPlugins: 'colorbutton,colordialog'
    });
  </script>
		</div>
	</body>
</html>