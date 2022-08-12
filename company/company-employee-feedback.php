<?php
include ("db_connect.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Customer feedback | EkaumBharat </title>
	<?php include('header-link.php'); ?>
</head>
<body class="home-2">
	<div class="wrapper">  
		<!-- Start Navigation -->
		<?php include('header.php'); ?>
		<div class="clearfix"></div>

		<!-- Page Title -->
		<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
			<div class="container">
				<div class="title-content">
					<h1>Employee  Feedbacks</h1>
					<div class="breadcrumbs">
						<a href="company-details.php">Home</a>
						<span class="gt3_breadcrumb_divider"></span>
						<span class="current">Employee  Feedbacks</span>
					</div>
				</div>
			</div>
		</section>
		<div class="clearfix"></div>

		<section class="show-case">
			<div class="container">
				<table class="table table-striped">
					<thead class="thead-dark">

						<tr>
							<th scope="col">#</th>
							<th scope="col">Date</th>
							<th scope="col">Name</th>
								<th scope="col">Rating</th>
							<th scope="col">Message</th>
							<th scope="col">Action</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						$feed = mysqli_query($conn , "SELECT * FROM `emp_feedback` WHERE `employee_id` = '".$_GET['id']."' AND company_id = '$company' ");
						while ($row  =mysqli_fetch_array($feed)) 
						{
							$i= $i+1;
						?>
					

							<tr>
								<th scope="row"><?= $i ?></th>
								<td><?=date_format(date_create($row['date']), "d M-Y") ?></td>
								<td><?= $row['name']; ?></td>
									<td><?= $row['rating']; ?></td>
								
								<td><?= wordwrap($row['feedback'], 50, '</br>'); ?></td>
								<td><a href="emp-feedback-del.php?id=<?= $row['id']; ?>" class="theme-cl" />Delete</a></td>
							
							</tr>
					

							<?php
						}
						?>
					</tbody>
				</table>


			</div>
		</section>

		<?php include('footer.php'); ?>
		<?php include('footer-link.php'); ?>

	</div>
</body>
</html>