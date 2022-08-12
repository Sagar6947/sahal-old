<?php
include ("db_connect.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
	<title> Section List | SaharDirectory</title>

	<?php include('header-link.php'); ?>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<div class="clearfix"></div>


		<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
			<div class="container">
					<div class="title-content">
						<h1>Section List</h1>
						<div class="breadcrumbs">
							<a href="company-details.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Section</span>
						</div>
					</div>
				</div>
		</section>
		<div class="clearfix"></div>

			
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
							$section = $conn->query("SELECT * FROM `section` JOIN section_category ON `section_category`.`sec_id` = `section`.`section_category` WHERE `section`.`company_id` = '$company' ");
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
												href="section-edit.php?id=<?php echo $section_row['section_id']; ?>" class="light-gray-btn btn-square" target="_blank"><i class="ti-pencil" style="color:pink;"></i></a>

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
CKEDITOR.replace( 'editor1' );
</script>
			
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>