<?php
include ("db_connect.php");
 
if (isset($_POST['image_submit']))
{


$title = mysqli_real_escape_string($conn , $_POST['title']);

$errors = array();
            $file_name = $_FILES['logo']['name'];
            $file_size = $_FILES['logo']['size'];
            $file_tmp = $_FILES['logo']['tmp_name'];
            $file_type = $_FILES['logo']['type'];
            $file_extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png", "PNG");
            if (in_array($file_extension, $extensions) === false) {
                $errors = "extension not allowed, please choose a JPEG or PNG file.";
            } else if (substr_count($file_name, '.') > 1) {
                $errors = "image name only allow one dot";
        echo "<script>alert('$errors');</script>";
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "images/gallery/" . $file_name);

$sec_cate = "INSERT INTO `company_gallery`( `company_id`, `title`, `image`) VALUES ('$company','$title','$file_name')";

if($conn->query($sec_cate)){
		echo'<script>alert("Your Gallery Image Added Successfully")</script>';
	}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo '<script>window.location="company-gallery.php"</script>';
}

}




?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Image Gallery  | SaharDirectory</title>

	<?php include('header-link.php'); ?>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>
			
				<section class="manage-listing padd-top-0">
			<div class="container">
			    	<div class="row">
						
						<div class="heading">
						
							
						</div>
					
					</div>
				<div class="col-md-4">
					<!-- General Information -->
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">
                        
						<form method="post"  enctype="multipart/form-data"> 
							<div class="row mrg-r-10 mrg-l-10">
								<div class="col-sm-12">
									<label>Image Title :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Image Title"
									name="title"  required />
								</div>
								
								<div class="col-sm-12">
									<label>Image :</label>
									<input type="file" maxlength="255" class="form-control" placeholder="Image Title"	name="logo"  required />
								</div>

								<div class="col-sm-3">
									<input type="submit" class="btn theme-btn" 
									name="image_submit" />

								</div>
							</div>
						</form>
						
						
					</div>
				</div>
		 
				<div class="col-md-8">
			   	<table class="table table-striped">
					<thead class="thead-dark">

						<tr>
							<th scope="col">#</th>
							<th scope="col">Date</th>
							<th scope="col">Name</th>
							<th scope="col">Image</th>
							<th scope="col">Action</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						$gallery = mysqli_query($conn , "SELECT * FROM `company_gallery` WHERE `company_id` = '".$company."' ORDER BY `gallery_id` DESC LIMIT 6 ");
						while ($row  =mysqli_fetch_array($gallery)) 
						{
							$i= $i+1;
						?>
					

							<tr>
								<th scope="row"><?= $i ?></th>
								<td><?=date_format(date_create($row['create_date']), "d M,Y") ?></td>
								<td><?= $row['title']; ?></td>
								<td><img src="images/gallery/<?= $row['image']; ?>" style="height:30px;"></td>
								
								<td><a href="gallery-del.php?id=<?= $row['gallery_id']; ?>" class="theme-btn btn-square" ><i class="ti-trash"></i></a></td>
							
							</tr>
					

							<?php
						}
						?>
					</tbody>
				</table>
					
				</div>
			</section>
			
				<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>