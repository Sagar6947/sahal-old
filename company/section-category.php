<?php
include ("db_connect.php");
 
if (isset($_POST['category_submit'])) {

$name = mysqli_real_escape_string($conn , $_POST['name']);

$sec_cate = "INSERT INTO `section_category`( `company_id`, `name`) VALUES ('$company', '$name')";

if($conn->query($sec_cate)){
		echo'<script>alert("Your Section Category Added Successfully")</script>';
	}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo '<script>window.location="section-category.php"</script>';


}

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
		<?php include('company_edit_menu.php'); ?>
		<div class="clearfix"></div>
		
			
		<section class="manage-listing padd-top-0">
			<div class="container">
			    <div class="row">
						
						<div class="heading">
							
							
						</div>
					</div>
	              <div class="col-md-6">
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">

						<form method="post"  enctype="multipart/form-data"> 
							<div class="row mrg-r-10 mrg-l-10">
								<div class="col-sm-12">
									<label>Section Category :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Category Name"
									name="name"  required />
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
		<div class="col-md-6 col-sm-12">
						<div class="panel-group style-2" id="accordion2" role="tablist" aria-multiselectable="true">
							<?php
							$i=0;
							$section_category = $conn->query("SELECT * FROM `section_category` WHERE `company_id` = '$company' ");
							while ($section_category_row = $section_category->fetch_assoc()) {
							    $i= $i+1;
							 ?>
						
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="who">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?= $i ?>" href="#collapseTwo<?= $i ?>" >
											<?= $section_category_row['name'];  ?>
										</a>
										
									</h4>
								</div>
								<div id="collapseTwo<?= $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="who">
									<div class="panel-body">
									 	<p style="font-size:18px;">
									 	    <a href="section.php?id=<?= $section_category_row['sec_id']; ?>" class="btn btn-danger" style="padding:10px;font-size:18px;"><u>Add <?= $section_category_row['name'];  ?></u></a>
									 	
								<a href="edit-section-category.php?id=<?= $section_category_row['sec_id']; ?>" class="btn btn-danger" style="padding:10px;font-size:18px;"><i class="ti-pencil"></i></a>
								<a href="delete-section-category.php?id=<?= $section_category_row['sec_id']; ?>" class="btn btn-danger" style="padding:10px;font-size:18px;"><i class="ti-trash"></i></a></p>
								
									<div class="row">
							<div class="col-md-12">
								<div class="small-list-wrapper">
								<ul>
							<?php
							$section = $conn->query("SELECT * FROM `section`  WHERE section_category = '".$section_category_row['sec_id']."' ");
							while ($section_row = $section->fetch_assoc()) {
								$sec_id='';
								
							 ?>

						<li>
										<div class="small-listing-box light-gray">
											<div class="small-list-img">
												<img src="images/<?= $section_row['section_image']; ?>" class="img-responsive" alt="" />
											</div>
											<div class="small-list-detail">
												<h4><?=  $section_row['section_title']; ?>(<?=  $section_row['name']; ?>) </h4>
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
								</div>
							</div>
							
								<?php
				     	}
				     	?>
						
						</div>
			</section>
			
		

			
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>