<?php
include ("db_connect.php");
 
if (isset($_POST['category_submit'])) {

$name = mysqli_real_escape_string($conn , $_POST['name']);

$sec_cate = "UPDATE `section_category` SET `name`='".$name."' WHERE `company_id` = '$company' AND `sec_id` =".$_GET['id']."";

if($conn->query($sec_cate)){
		echo'<script>alert("Your Section Category updated Successfully")</script>';
	}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo '<script>window.location="section-category.php"</script>';


}
	$section_category = $conn->query("SELECT * FROM `section_category` WHERE `company_id` = '$company' AND `sec_id` =".$_GET['id']." ");
		$up = mysqli_fetch_array($section_category);

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Section Category | SaharDirectory</title>

	<?php include('header-link.php'); ?>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<div class="clearfix"></div>
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
			<div class="container">
					<div class="title-content">
						<h1>Section Category </h1>
						<div class="breadcrumbs">
							<a href="#">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Section Category</span>
						</div>
					</div>
				</div>
		</section>
		<div class="clearfix"></div>
		<section class="padd-0">
			<div class="container">
				<div class="col-md-12 translateY-60 col-sm-12">
					<!-- General Information -->
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">

						<form method="post"  enctype="multipart/form-data"> 
							<div class="row mrg-r-10 mrg-l-10">
								<div class="col-sm-12">
									<label>Section Category :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Category Name"
									name="name"  value="<?= $up['name'] ?>" />
								</div>

								<div class="col-sm-3">
									<input type="submit" class="btn theme-btn" 
									name="category_submit" />

								</div>
							</div>
						</form>
						
						<!-- End General Information -->
					</div>
				</div>
			</section>
			
			
			
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>