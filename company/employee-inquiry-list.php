<?php
include ("db_connect.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <title>Employee Inquiry Details | SaharDirectory </title>
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
						<h1>Employee Inquiry Details</h1>
						<div class="breadcrumbs">
							<a href="employee-details.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Employee Inquiry Details</span>
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
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=0;
$in = $conn->query("SELECT * FROM `inquiry` WHERE `emp_id` = '".$employee."' ");
while ($row = $in->fetch_assoc()) 
{
$i= $i+1;
 ?>

    <tr>
     <th scope="row"><?= $i ?></th>
     <td><?=date_format(date_create($row['date']), "d M-Y h:ia") ?></td>
     <td><?= $row['name']; ?></td>
     <td><?= $row['email']; ?></td>
     <td><?= $row['number']; ?></td>
     <td><?= wordwrap($row['msg'], 50, '</br>'); ?></td>
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