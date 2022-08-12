<?php 
include ("db_connect.php");
 

$qx=mysqli_query($conn,"SELECT * FROM `section` WHERE `section_id` =".$_GET['id']." ");
$section_row = mysqli_fetch_array($qx);


if (isset($_POST['section_submit'])) {

$title = mysqli_real_escape_string($conn , $_POST['title']);
$description = mysqli_real_escape_string($conn , $_POST['description']);
if(!empty($_FILES['section_image']['name']))
{
$errors = array();
$file_name = $_FILES['section_image']['name'];
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
    move_uploaded_file($file_tmp, "images/" . $file_name);
}

}
else
{
	$file_name = $_POST['sec_image'];
}

$sec_cate = "UPDATE `section` SET `section_title`= '$title',`section_image`='$file_name',`description`= '$description' WHERE `section_id` =".$_GET['id']."  ";

if($conn->query($sec_cate))
{
		echo'<script>alert("Your Section Edit Successfully")</script>';
	
}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo'<script>window.location="section.php?id='.$section_row['section_category'].'</script>';


}



?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
	<title>Edit <?=  $section_row['section_title']; ?> Section | SaharDirectory</title>

	<?php include('header-link.php'); ?>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>


	 
		<section class="padd-0">
			<div class="container">
				<div class="col-md-12 translateY-60 col-sm-12">
					<!-- General Information --><h3>Update <?=  $section_row['section_title']; ?> Section</h3>
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">
                        
						<form method="post"  enctype="multipart/form-data"> 
							<div class="row mrg-r-10 mrg-l-10">
								<div class="col-sm-6">
									<label>Section Title :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Section Title"
									name="title"  value="<?=  $section_row['section_title']; ?>" />
								</div>
								<div class="col-sm-6">
								  <label>Section Image :</label>
                                <input type="file" class="form-control"  accept="image/*" id="section_image" name="section_image"  />
                                <input name="sec_image" type="hidden" value="<?= $section_row['section_image'] ;?>">
							    </div>

							    <div class="col-sm-12">
								<label>Description :</label>
								<textarea class="h-100 form-control" 
								 name="description" id="editor1" placeholder="Description"><?=  $section_row['description']; ?></textarea>
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
CKEDITOR.replace( 'editor1' );
</script>
			
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>