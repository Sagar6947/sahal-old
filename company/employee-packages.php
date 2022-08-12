<?php
include ("db_connect.php");

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Package Details | SaharDirectory </title>
 
    <?php include('header-link.php'); ?>
    
	</head>
	<body class="home-2">
		<div class="wrapper">  
        <?php include('header.php'); ?>
			<div class="clearfix"></div>
			
			
			<!-- Page Title -->
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Packages</h1>
						<div class="breadcrumbs">
							<a href="#">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Pricing</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Page Title -->
			
			<!-- ================ Pricing Table ======================= -->
			<section>
				<?php
				$show = false;
				 if(isset($_SESSION["ekaumbharat"])){
					$user = $_SESSION["ekaumbharat_Employee"];
					$query6 = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'employee' AND `emp_id` = '".$user."' AND `status`='0'  ";
					$show = true;
					
				}elseif(isset($_SESSION["SaharDirectory"])){
					$user = $_SESSION["SaharDirectory"];
					$query6 = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'company' AND `company_id` = '".$user."' AND `status`='0'  ";
					$show = true;
				}else{
					$show = false;
				}
				
				// echo $query6;
				if($show == true)
				{

				
				$row6 = mysqli_query($conn,$query6);
				if(mysqli_num_rows($row6) > 0)
				{
					$fetch6 = mysqli_fetch_array($row6);
					$s = "SELECT * FROM `package` WHERE `id`='".$fetch6['package_id']."'";
					// echo $s;
					$x = mysqli_query($conn,$s);
					$fed = mysqli_fetch_array($x);
					echo '<div class="container">
							<!-- End Notic Message -->
							<div class="col-md-6 col-sm-12">
								<div class="notice notice-success">
									<strong>Your Available Package - </strong>'.$fed['package_name'].'<br>
									<strong>Your Package Price- </strong> Rs. '.$fed['package_price'].' /-<br>
									<strong>@ Price- </strong>Rs. '.$fetch6['amount'].' /-<br>
									<strong>Expire on - </strong> '.date('d M, Y',strtotime($fetch6['exp_date'])).' <br>
								</div>
							</div>
						</div>';
				}
			}
				?>
				
			 
				<div class="container">
							 

                    <?php 
                        $query = mysqli_query($conn,"SELECT * FROM `emp_package` ORDER BY `package_price` ASC");
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
                                    <div class="package-info">
                                        <ul>
                                        <li>'.$rows['package_description'].'</li>
                                     
                                        </ul>
                                    </div>
                                    <a  href="coupon-proceeding.php?id='.$rows['id'].'"><button class="btn btn-package">Upgrade Now</button></a>
                                </div>
                            </div>
                            ';
                            }
                    ?>
					
					 
				</div>
			</section>

			<?php include('footer.php'); ?>
			<?php include('footer-link.php'); ?>
			
		</div>
	</body>

 </html>