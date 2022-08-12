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
    
    
    <style>
        
        .fa-check-circle {

  color: #4d49f1;
  font-size:20px;
  padding-right:10px;
    padding-left:15px;
}
  </style>
	</head>
	<body class="home-2">
		<div class="wrapper">  
        <?php include('header.php'); ?>
			<div class="clearfix"></div>
	
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
				
		<section>
		    <div class="container ">
		        <div class="row">
		            <div class="col-md-1 col-sm-12"></div>
		        <div class="col-md-10 col-sm-12">
		        
                         
                      
		    				<?php
		    				$day =0;
		    				$last='';
				$show = false;
				 if(isset($_SESSION["ekaumbharat"])){
					$user = $_SESSION["ekaumbharat_Employee"];
					$query6 = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'employee' AND `emp_id` = '".$user."' AND `status`='0' AND `payment_status` = 'TXN_SUCCESS' ";
					$show = true;
					
				}elseif(isset($_SESSION["SaharDirectory"])){
					$user = $_SESSION["SaharDirectory"];
					$query6 = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'company' AND `company_id` = '".$user."' AND `status`='0' AND `payment_status` = 'TXN_SUCCESS'  ";
					$show = true;
				}else{
					$show = false;
				}
				
				// echo $query6;
				if($show == true)
				{

echo'<table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">My  Available Package</th>
                          <th scope="col">My Package Price</th>
                          <th scope="col">Purchased Price</th>
                          <th scope="col">Purchased on</th>
                          <th scope="col">Expire on</th>
                          <th scope="col">Invoice</th>
                        </tr>
                      </thead>
                      <tbody>';
				
				$row6 = mysqli_query($conn,$query6);
				if(mysqli_num_rows($row6) > 0)
				{
					while($fetch6 = mysqli_fetch_array($row6)){
					    
					$dateDiff= dateDiff( date('d-m-Y'),date('d-m-Y',strtotime($fetch6['exp_date'])));
					$s = "SELECT * FROM `package` WHERE `id`='".$fetch6['package_id']."'";
					// echo $s;
					$x = mysqli_query($conn,$s);
					$fed = mysqli_fetch_array($x);
					echo '
							<!-- <div class="col-md-4 col-sm-12"></div> -->
							<tr>
                          <th scope="row"> </th>
                          <td>'.$fed['package_name'].'</td>
                          <td>Rs. '.$fed['package_price'].' /-</td>
                          <td>Rs. '.$fetch6['amount'].' /-</td>
                           <td>'.date('d M, Y',strtotime($fetch6['pur_date'])).'</td>
                          <td>'.$dateDiff.' Days to go</td>
                          
                          
                          <td><a href="package-invoice.php?id='.$fetch6['id'].' "> <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                 </a>  </td>
                        </tr>
						 
							<!-- <div class="col-md-4 col-sm-12"></div> -->
						';
						$day += $fed['package_day'];
						$last = date('d M, Y',strtotime($fetch6['exp_date']));
					}
				}
			}
			function dateDiff($date1, $date2) 
	{
	  $date1_ts = strtotime($date1);
	  $date2_ts = strtotime($date2);
	  $diff = $date2_ts - $date1_ts;
	  return round($diff / 86400);
	}

	
				?></tbody>
                    </table>
                    </div> 
                     <div class="col-md-4 col-sm-12">
                         <?php
                         
                        //  echo $day;
                        //  echo $last;
                         ?>
                         
                     </div> </div>
				</div>
				<div class="container">
			
			<div class="col-md-1 col-sm-1" ></div>
				
					<div class="col-md-5 col-sm-5" >
						<div class="package-box" >
						<div class="package-header" style="background: linear-gradient(45deg, darkcyan, transparent);">
								<i class="fa fa-cog" aria-hidden="true" style="color:black;"></i>
								<h3 style="color:black;">Join The Club For Free</h3>
							</div>
							
							<div class="package-info">
								<ul>
								       <?php
                  $i=0;
                 $q=mysqli_query($conn,"select * from `package_summary` WHERE type = 'FREE' ");

                   while($summ=mysqli_fetch_array($q))
                    {
                        ?>
								    
								    
								<li style="text-align:justify;"><i class="fa fa-check-circle"></i><?= $summ['points']; ?></li>
							<?php
                    } ?>
								</ul>
							</div>
						
						</div>
					</div>
					
						<div class="col-md-4 col-sm-4"></div>
					<div class="col-md-5 col-sm-5">
						<div class="package-box">
						<div class="package-header" style="background: radial-gradient(#088f8f8f, transparent); ">
								<i class="fa fa-cube" aria-hidden="true" style="color:black;"></i>
								<h3 style="color:black;">Digital Card with Ecommerce</h3>
							</div>
							
							<div class="package-info">
								<ul>
								       <?php
                  $i=0;
                 $que=mysqli_query($conn,"select * from `package_summary` WHERE type = 'Paid' ");

                   while($summary=mysqli_fetch_array($que))
                    {
                        ?>
								    
								    
								<li style="text-align:justify;"><i class="fa fa-check-circle"></i><?= $summary['points']; ?></li>
							<?php
                    } ?>
								</ul>
							</div>
						
						</div>
					</div>
					
					
					</div>
					</section>
			<section>

				
			 
				<div class="container" >
				    <?php
				    	 
				    	     
				    	     
						echo'	 <div class="col-md-4 col-sm-4">
                                <div class="active package-box">
                                    <div class="package-header">
                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                        <h3>Free</h3>
                                    </div>
                                    <div class="package-price">
                                        <h2><sup>Rs. </sup>0<sub>/730 Days</sub></h2>
                                    </div>
                                    <div class="package-info">
                                        <ul>
                                        <li>Free Of Cost<br><br> All Free Features</li>
                                     
                                        </ul>
                                    </div>';
                                    
                                 if(isset($_SESSION["SaharDirectory"])){
				    	  echo'	 <a  href="#"><button class="btn btn-package" disabled>Upgrade Now</button></a>';   
				    	 }
				    	 else
				    	 {
				     echo'	 <a  href="add-company.php"><button class="btn btn-package">Create Now</button></a>'; }
				     echo'
                                </div>
                            </div>';
                            ?>

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
                                    <div class="package-info">
                                        <ul>
                                        <li>'.$rows['package_description'].'</li>
                                     
                                        </ul>
                                    </div>';
                                    	 if(isset($_SESSION["SaharDirectory"])){
				    	     echo '<a  href="coupon-proceeding.php?id='.$rows['id'].'"><button class="btn btn-package">Upgrade  Now</button></a>';
				    	                 }
                                    
                                    else
                                    {
                                        echo'<a  href="coupon-proceeding.php?id='.$rows['id'].'"><button class="btn btn-package">Buy Now</button></a>';
                                    }
                              echo'  </div>
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