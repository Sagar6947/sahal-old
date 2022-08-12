<?php
include "db_connect.php";
if (isset($_POST['section_submit'])) {

$title = mysqli_real_escape_string($conn , $_POST['title']);
$description = mysqli_real_escape_string($conn , $_POST['description']);

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


$sec_cate = "INSERT INTO `section`(`company_id`, `section_category`, `section_title`, `section_image`, `description`) VALUES  ('$company', '".$_GET['id']."', '$title', '$file_name', '$description')";

if($conn->query($sec_cate))
{
		echo'<script>alert("Your Section Added Successfully")</script>';
	}
}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo'<script>window.location="section.php?id='.$_GET['id'].'"</script>';


}

$section_category = $conn->query("SELECT * FROM `section_category` WHERE sec_id  = '".$_GET['id']."' AND `company_id` = '$company' ");
$section_category_row = $section_category->fetch_assoc();

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
  <title><?= $section_category_row['name'];  ?> Section | SaharDirectory</title>

	<?php include('header-link.php'); ?>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>
 
		<section class="padd-0">
			<div class="container">
				<div class="col-md-12 translateY-60 col-sm-12">
					<!-- General Information --><h3>Add New Section For <?= $section_category_row['name'];  ?></h3>
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">

						<form method="post"  enctype="multipart/form-data"> 
							<div class="row mrg-r-10 mrg-l-10">
								<div class="col-sm-6">
									<label>Section Title :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Section Title"
									name="title"  required />
								</div>
								<div class="col-sm-6">
								  <label>Section Image :</label>
                                <input type="file" class="form-control"  accept="image/*" id="section_image" name="section_image"  />
							    </div>

							    <div class="col-sm-12">
										<label>Description :</label>
										<textarea class="h-100 form-control" 
										 name="description" id="editor1" placeholder="Description"></textarea>
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
			
			<section class="sec-bt">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2> Section <span> List </span></h2>
							
						</div>
						</div>
					</div>
					<div class="row">
							<div class="col-md-12">
								<div class="small-list-wrapper">
								<ul>
							<?php
							$section = $conn->query("SELECT * FROM `section` WHERE `section_category` = '".$_GET['id']."' AND `company_id` = '$company' ");
							while ($section_row = $section->fetch_assoc()) {
								$sec_id='';
								
							 ?>

						<li>
										<div class="small-listing-box light-gray">
											<div class="small-list-img">
												<img src="images/<?= $section_row['section_image']; ?>" class="img-responsive" alt="<?=  $section_row['section_title']; ?>" />
											</div>
											<div class="small-list-detail">
												<h4><?=  $section_row['section_title']; ?></h4>
												<p><a href="assign-employee.php?id=<?php echo $section_row['section_id']; ?>" title="add Employee" target="_blank">Assign Employee</a> | <?=date_format(date_create($section_row['date']), "M d Y") ?></p>
											</div>
											<div class="small-list-action">
												<a 
												href="section-edit.php?id=<?php echo $section_row['section_id']; ?>" class="light-gray-btn btn-square" target="_blank"><i class="ti-pencil"></i></a>

												<a href="section-del.php?id=<?php echo $section_row['section_id']; ?>" class="theme-btn btn-square" ><i class="ti-trash"></i></a>
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
    CKEDITOR.replace('editor1', {
           extraPlugins: 'colorbutton,colordialog'
    });
  </script>
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>