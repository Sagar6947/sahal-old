<?php
include "db_connect.php";
if (isset($_POST['section_submit'])) {
$title = mysqli_real_escape_string($conn , $_POST['title']);
$description = mysqli_real_escape_string($conn , $_POST['description']);
$price = mysqli_real_escape_string($conn , $_POST['price']);

$offer_price = mysqli_real_escape_string($conn, $_POST['offer_price']);
$price_discount = mysqli_real_escape_string($conn, $_POST['price_discount']);


if(!empty($_FILES['section_image']['name']))
{
$errors = array();
$file_name = $_FILES['section_image']['name'];
  $file_name = date('dm') . round(microtime(true) * 1000);
$file_size = $_FILES['section_image']['size'];
$file_tmp = $_FILES['section_image']['tmp_name'];
$file_type = $_FILES['section_image']['type'];
$file_extension = pathinfo($_FILES["section_image"]["name"], PATHINFO_EXTENSION);
$extensions = array("jpeg", "jpg", "png", "PNG","jfif" ,"gif","tif");
if (in_array($file_extension, $extensions) === false) {
    $errors = "extension not allowed, please choose a JPEG or PNG file.";
    echo "<script>alert('$errors');</script>";

} else if (substr_count($file_name, '.') > 1) {
    $errors = "image name only allow one dot";
echo "<script>alert('$errors');</script>";
}
if (empty($errors) == true) {
    move_uploaded_file($file_tmp, "images/product/" . $file_name);
}

}
else
{
	$file_name = $_POST['sec_image'];
}
$sec_cate = "UPDATE `product` SET `product_title`='$title',`product_image`='$file_name',`product_description`='$description',`product_price`='$price',`offer_price`='$offer_price',`price_discount`='$price_discount' WHERE `product_id` = '".$_GET['id']."' ";

if($conn->query($sec_cate))
{
		echo'<script>alert("Your Product Edit Successfully")</script>';
	
}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo'<script>window.location="company-profile-edit.php"</script>';


}


$qx=mysqli_query($conn,"SELECT * FROM `product` WHERE `product_id` ='".$_GET['id']."' ");
$section_row = mysqli_fetch_array($qx);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
  <title> Section | SaharDirectory</title>

	<?php include('header-link.php'); ?>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<div class="clearfix"></div>


		<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
			<div class="container">
					<div class="title-content">
						<h1>Company Product </h1>
						<div class="breadcrumbs">
							<a href="company-details.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Products</span>
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
								<div class="col-sm-4">
									<label>Product Title :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Product Title"
									name="title"  value="<?=  $section_row['product_title']; ?>" />
								</div>
								<div class="col-sm-4">
								  <label>Product Image :</label>
                                <input type="file" class="form-control"  accept="image/*" id="section_image" name="section_image"  />
                                <input name="sec_image" type="hidden" value="<?= $section_row['product_image'] ;?>">
							    </div>
							    
							    <div class="col-sm-4">
								 <label>Product Price :</label>
									<input type="number" maxlength="255" class="form-control" placeholder="Product Price"
									name="price"  value="<?=  $section_row['product_price']; ?>" />
							    </div>
							    
							    
							    
							    <?php
							    
							    if($section_row['offer'] == '1')
							    {
							        ?>
							   
							    	<div id="offer_price" >
									<div class="col-sm-4">
										<label>Product Offer Price :</label>
										<input type="number" maxlength="10" placeholder="Product Offer Price" class="form-control"  name="offer_price" value="<?=  $section_row['offer_price']; ?>" />
									</div>

									<div class="col-sm-4">
										<label>Product Price Discount :</label>
										<input type="number" maxlength="2" class="form-control"  placeholder="Product Price Discount" name="price_discount" value="<?=  $section_row['price_discount']; ?>" />
									</div>
								</div>
							    
							    
							  <?php }  ?>

							    <div class="col-sm-12">
										<label>Description :</label>
										<textarea class="h-100 form-control" 
										 name="description" id="editor1" placeholder="Description"><?=  $section_row['product_description']; ?></textarea>
									</div>


								<div class="col-sm-3">
									<br>
									<input type="submit" class="btn theme-btn" 
									name="section_submit" />

								</div>
							</div>
						</form>
						
						<!-- End General Information -->
					</div>
				</div>
			</section>
			
			
<script>
    CKEDITOR.replace('editor1', {
           extraPlugins: 'colorbutton,colordialog'
    });
  </script>
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>