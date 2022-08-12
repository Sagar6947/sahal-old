<?php
include ("db_connect.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="assets/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="assets/main.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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
					<h1>Feedbacks</h1>
					<div class="breadcrumbs">
						<a href="company-details.php">Home</a>
						<span class="gt3_breadcrumb_divider"></span>
						<span class="current">Feedbacks</span>
					</div>
				</div>
			</div>
		</section>
		<div class="clearfix"></div>

		<div class="limiter" >
		<div class="container-table100">
			<div class="wrap-table100" style="width:100%">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table >
							<thead>

							<tr class="row100 head">
							<th class="cell100">#</th>
							<th class="cell100">Date</th>
							<th class="cell100 column1">Name</th>
							<th class="cell100 column2">Rating</th>
							<th class="cell100 column3">Message</th>
							<!--<th class="cell100 column4">Action</th>-->
							
					</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
						<?php
						$i=0;
						$feed = mysqli_query($conn , "SELECT * FROM `feedback` WHERE `company_id` = '".$company."' AND status=1 ");
						while ($row  =mysqli_fetch_array($feed)) 
						{
							$i= $i+1;
						?>
					

							<tr class="row100 body">
								<td class="cell100 "><?= $i ?></td>
								<td class="cell100 "><?=date_format(date_create($row['date']), "d M-Y h:ia") ?></td>
								<td class="cell100 column1"><?= $row['name']; ?></td>
								<td class="cell100 column2 "><?= $row['rating']; ?></td>
								
								<td class="cell100 column3"><?= wordwrap($row['msg'], 50, '</br>'); ?></td>
					<!--<td class="cell100 column4"><a href="company-feedback-del.php?id=<?=$row['id']; ?>" class="btn theme-cl" />delete</a></td>-->
							
							</tr>
					

							<?php
						}
						?>
				</tr>


</tbody>
						</table>
					</div>
				</div>
				
				</div>
			</div>
		</div>
		
	
		<?php include('footer.php'); ?>	

		<?php include('footer-link.php'); ?>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		
			<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>

	<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>
