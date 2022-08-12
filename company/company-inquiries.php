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


	<title>Company Inquiry Details | SaharDirectory </title>
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
					<h1>Company Inquiry Details</h1>
					<div class="breadcrumbs">
						<a href="company-details.php">Home</a>
						<span class="gt3_breadcrumb_divider"></span>
						<span class="current">Company Inquiry Details</span>
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
							<th class="cell100 ">Name</th>
							<th class="cell100  ">Email</th>
							<th class="cell100  ">Number</th>
							<th class="cell100  ">Message</th>
							<th class="cell100  ">Remarks</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							    <?php
						$i=0;
						$in = $conn->query("SELECT * FROM `inquiry` WHERE `company_id` = '".$company."' ");
						while ($row = $in->fetch_assoc()) 
						{
							$i= $i+1;
						?>
						<?php
							$employee = $conn->query("SELECT * FROM `employee` WHERE  
								`emp_id` = '".$row['emp_id']."' ");
								if(mysqli_num_rows($employee) > 0)
								{
									$employee_row = $employee->fetch_assoc();
								}
							
							 
							 ?>

					<tr class="row100 body">
								<td class="cell100 "><?= $i ?></td>
								<td class="cell100 "><?=date_format(date_create($row['date']), "d-m-Y") ?></td>
								<td class="cell100"><?= $row['name']; ?></td>
								<td class="cell100   "><?= wordwrap($row['email'],20,'<br>'); ?></td>
								<td class="cell100  "><?= $row['number']; ?></td>
							
							
								<td class="cell100  "><?= wordwrap($row['msg'], 25, '</br>'); ?></td>
								
								
								<td class="cell100  "><?= ((!isset($employee_row['emp_name']))? 'Its Company Feedback':$employee_row['emp_name']); ?>
								</br><?= ((!isset($employee_row['emp_no']))? '':$employee_row['emp_no']); ?>
								 </td>
							
							</tr>
							<?php
						
						     ?>

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
			
				<script src="assets/perfect-scrollbar.min.js"></script>
			
			
			
	</div>
</body>
</html>


	<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>
