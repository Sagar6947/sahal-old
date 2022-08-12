<?php
include ("config.php");

$er = "SELECT * FROM `refunds` ";
    $pro = mysqli_query($conn, $er);
    $row = mysqli_fetch_array($pro);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Refund Policy | SaharDirectory </title>
 
     <link href="../assets/plugins/css/plugins.css" rel="stylesheet">	
    
    <!-- Custom style -->
    <link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/responsiveness.css" rel="stylesheet">
	<link  type="text/css" rel="stylesheet" id="jssDefault" href="../assets/css/colors/main.css">

    
	</head>
	</head>
	<body class="home-2">
	    
	    
	    
		<div class="wrapper">  
	 <?php include('header.php'); ?>
			<div class="clearfix"></div>
			
			
			<!-- Page Title -->
			<section class="title-transparent page-title" style="background:url(../assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Refund Policy</h1>
						<div class="breadcrumbs">
							<a href="../index.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Refund Policy</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<section class="list-detail">
				<div class="container">
					<div class="detail-wrapper padd-top-30 padd-bot-30">
						<div class="row text-center">
							<a class="btn theme-btn-trans">Refund Policy</a>
						</div>
					
						<div class="row  mrg-0 detail-invoice">
							<div class="col-md-12">
							<p> <?= $row["terms"]; ?></p>
							</div>
						
					</div>
					</div>
				</div>
			</section>
<?php include 'footer.php';  ?>
<?php include 'footer-link.php';  ?>
			
		</div>
	</body>

</html>