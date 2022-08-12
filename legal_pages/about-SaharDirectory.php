<?php
include ("config.php");

$qx=mysqli_query($conn,"select * from `about`");
$up = mysqli_fetch_array($qx);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About Us | SaharDirectory </title>
 
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
						<h1>About Us</h1>
						<div class="breadcrumbs">
							<a href="../index.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">About Us</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			
        	<section class="show-case">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="verticleilist listing-shot">
							
								<a class="listing-item" href="">
									<div class="listing-shot-img">
										<img src="../img/hnadshak.jpg" class="img-responsive" alt="" style="width:auto" >
										
									</div>
								</a>
								<div class="verticle-listing-caption">
									<div class="lp-tag-wrap">
					
						<p><?= $up['terms']; ?></p>
					
					</div>
								
								</div>
							</div>
						</div>
			</div>
				<section>
			
				
		
			<section class="testimonials-3" style="background:url(../assets/img/testimonial.png)">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>What Say <span>Our Customers</span></h2>
							
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div id="testimonial-3" class="slick-carousel-3">
							

							
								
							<?php
							$q=mysqli_query($conn,"select * from website_feedback WHERE status = 0 order by id desc");

                            while($row=mysqli_fetch_array($q))
                            {
							?>	
								<div class="testimonial-detail">
									<div class="client-detail-box">
										<div class="pic">
											<img src="../assets/img/avatar-customer-testimonial.png" alt="">
										</div>
										<div class="client-detail">
											<h3 class="testimonial-title"><?= $row['name']; ?></h3>
										
										</div>
									</div>
									<p class="description">
									<?= $row['msg']; ?>
									</p>
								</div>
								<?php
                            }
                            ?>
								
								
							</div>
						</div>
					</div>
					
				</div>
			</section>	
				
				
			 <section>
				<div class="container">
							 

                    <?php 
                        $query = mysqli_query($conn,"SELECT * FROM `package` ORDER BY `package_price` ASC");
                        while($rows = mysqli_fetch_array($query))
                        {
                            echo '<div class="col-md-4 col-sm-4">
                                <div class="active package-box">
                                    <div class="package-header">
                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                        <h3>'.$rows['package_name'].'</h3>
                                    </div>
                                    <div class="package-price">
                                        <h2><sup>Rs. </sup>'.$rows['package_price'].'<sub>/'.$rows['package_day'].' Days</sub></h2>
                                    </div>
                                    <!-- <div class="package-info">
                                        <ul>
                                        <li>3 Designs</li>
                                        <li>3 PSD Designs</li>
                                        <li>4 color Option</li>
                                        <li>10GB Disk Space</li>
                                        <li>Full Support</li>
                                        </ul>
                                    </div> -->
                                    <a  href="coupon-proceeding.php?id='.$rows['id'].'"><button class="btn btn-package">Upgrade Now</button></a>
                                </div>
                            </div>
                            ';
                            }
                    ?>
					
					 
				</div>
				</div>
			</section>
<?php include 'footer.php';  ?>
<?php include 'footer-link.php';  ?>
			
		</div>
	</body>

</html>