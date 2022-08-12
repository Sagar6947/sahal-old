<?php
include "db_connect.php";
if (isset($_POST['section_submit'])) {

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);

	$offer = ((isset($_POST['offer'])) ? '1' : '0');
	$offer_price = mysqli_real_escape_string($conn, $_POST['offer_price']);
	$price_discount = mysqli_real_escape_string($conn, $_POST['price_discount']);


	$errors = array();
	$file_name = $_FILES['section_image']['name'];
	  $file_name = date('dm') . round(microtime(true) * 1000);
	$file_size = $_FILES['section_image']['size'];
	$file_tmp = $_FILES['section_image']['tmp_name'];
	$file_type = $_FILES['section_image']['type'];
	$file_extension = pathinfo($_FILES["section_image"]["name"], PATHINFO_EXTENSION);
	$extensions = array("jpeg", "jpg", "png", "PNG", "jfif", "gif", "tif");
	if (in_array($file_extension, $extensions) === false) {
		$errors = "extension not allowed, please choose a JPEG or PNG file.";
		echo "<script>alert('$errors');</script>";
	} else if (substr_count($file_name, '.') > 1) {
		$errors = "image name only allow one dot";
		echo "<script>alert('$errors');</script>";
	}
	if (empty($errors) == true) {
		move_uploaded_file($file_tmp, "images/product/" . $file_name);


		$sec_cate = "INSERT INTO `product`(`product_title`, `product_image`, `product_description`, `product_price`, `company_id`, `offer`, `offer_price`, `price_discount`) VALUES ( '$title', '$file_name', '$description' ,'$price', '$company', '$offer', '$offer_price', '$price_discount')";

		if ($conn->query($sec_cate)) {
			echo '<script>alert("Your product Added Successfully")</script>';
		}
	} else {
		echo '<script>alert("Not Inserted")</script>';
	}
	echo '<script>window.location="company-product.php"</script>';
}


?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>-->
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.8.10/themes/smoothness/jquery-ui.css" type="text/css">-->
<!--<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.8.10/jquery-ui.min.js"></script>-->
	<script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<title> Section | SaharDirectory</title>
	

	<?php include('header-link.php'); ?>

</head>

<body class="home-2">
	<div class="wrapper">
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>
		<section class="padd-0">
			<div class="container">
				<div class="col-md-12 translateY-60 col-sm-12">
					<!-- General Information -->
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">

						<form method="post" enctype="multipart/form-data">
							<div class="row mrg-r-10 mrg-l-10">
								<div class="col-sm-4">
									<label>Product Title :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Product Title" name="title" required />
								</div>
								<div class="col-sm-4">
									<label>Product Image :</label>
									<input type="file" class="form-control" accept="image/*" id="section_image" name="section_image" />
								</div>

								<div class="col-sm-4">
									<label>Product Price :</label>
									<input type="number" maxlength="255" class="form-control" placeholder="Product Price" name="price" required />
								</div>
								<div class="col-sm-4">
									<label></label>
									<input type="checkbox" name="offer" value="1" id="offer"  /> <b>Add offer price on product</b>
								</div>

								<div id="offer_price" >
									<div class="col-sm-4">
										<label>Product Offer Price :</label>
										<input type="number" maxlength="10" placeholder="Product Offer Price" class="form-control"  name="offer_price" />
									</div>

									<div class="col-sm-4">
										<label>Product Price Discount :</label>
										<input type="number" maxlength="2" class="form-control"  placeholder="Product Price Discount" name="price_discount" />
									</div>
								</div>
								<div class="col-sm-12">
									<label>Description :</label>
									<textarea class="h-100 form-control" name="description" id="editor1" placeholder="Description"></textarea>
								</div>


								<div class="col-sm-3">
									<br>
									<input type="submit" class="btn theme-btn" name="section_submit" />

								</div>
							</div>
						</form>

						<!-- End General Information -->
					</div>
				</div>
		</section>

		<section class="sec-bt">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2> Product <span> List </span></h2>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="small-list-wrapper">
							<ul>
								<?php
								$section = $conn->query("SELECT * FROM `product` WHERE `company_id` = '$company' ");
								while ($section_row = $section->fetch_assoc()) {
									$sec_id = '';

								?>

									<li>
										<div class="small-listing-box light-gray">
											<div class="small-list-img">
												<img src="images/product/<?= $section_row['product_image']; ?>" class="img-responsive" alt="" />
											</div>
											<div class="small-list-detail">
												<h4><?= $section_row['product_title']; ?></h4>
												<p> ₹ <?= $section_row['product_price']; ?> | <?= date_format(date_create($section_row['date']), "M d Y") ?></p>
											</div>
											<div class="small-list-action">
												<a href="edit-product.php?id=<?php echo $section_row['product_id']; ?>" class="light-gray-btn btn-square"><i class="ti-pencil"></i></a>

												<a href="product-del.php?id=<?php echo $section_row['product_id']; ?>" class="theme-btn btn-square"><i class="ti-trash"></i></a>
											</div>
										</div>
									</li>
								<?php
								}
								?>



							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script>
		
		 $(function() {
    $('#offer_price').hide(); 

    
$('#offer').change(function(){
    
    
       $('#offer_price').toggle(); 
 
        
});
		
	});		CKEDITOR.replace('editor1', {
				extraPlugins: 'colorbutton,colordialog'
			});
			
			
	</script>
		<?php include('footer-link.php'); ?>
		<?php include('footer.php'); ?>
</body>

</html>