<?php 

include 'config.php'; 

	if(isset($_POST['test_submit']))
{
	$test_name =$_POST['test_name'];
	$phone=$_POST['phone'];
	$msg= mysqli_real_escape_string($conn , $_POST['msg']);
	
$sql=mysqli_query($conn,"INSERT INTO `website_feedback`( `name`, `contact`, `msg` ) VALUES ('$test_name','$phone','$msg')");

if($sql)
{
	
	echo"<script>alert('Thank You For Your Feedback...')</script>";

}
else{
	echo"<script>alert('Your message  not submitted Please Try Again Later...')</script>";

}

echo"<script>window.location='index.php'</script>";
}


  $er = "SELECT * FROM  `happy_clients` ";
     $pro = mysqli_query($conn, $er);
    $ro = mysqli_fetch_array($pro);

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Home |  SaharDirectory - Get a Personal Visiting Card </title>
    
        <link href="assets/plugins/css/plugins.css" rel="stylesheet">	
        <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsiveness.css" rel="stylesheet">
	<link  type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/main.css">
	<link rel="icon" href="img/favicon.png" type="image/x-icon" />
    
	</head>
	<body class="home-2">
		<div class="wrapper">  
      <?php include('header.php'); ?> 
			<div class="clearfix"></div>
			
			<!-- Main Banner Section Start -->
			<div class="banner dark-opacity" style="background-image:url(assets/img/home-banner.jpg);" data-overlay="8">  
				<div class="container">
					<div class="banner-caption">
						<div class="col-md-12 col-sm-12 banner-text">
							<h1>Digital Impression,<br>The First Impression</h1>
							<p>Sahar Directory helps you to get a Digital Impression via generating your company vCard along with your Employees vCard here that is smart & elegant .</p>
							 
							
							<div class="popular-categories">
								<ul class="popular-categories-list">
								
									<li>
										<a href="company/company-login.php">
											<div class="pc-box">
												<i class="fa fa-briefcase"></i>
												<p>Company-Login</p>
											</div>
										</a>
									</li>
									
									<li>
										<a href="company/employee-login.php">
											<div class="pc-box">
												<i class="fa fa-user-circle-o"></i>
												<p>Employee-Login</p>
											</div>
										</a>
									</li>
									
									<li>
										<a href="company/add-company.php" target="_blank">
											<div class="pc-box">
											<i class="fa fa-eye"></i>
												<p >Create Yours</p>
											</div>
										</a>
									</li>
									
						     	</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		<section class="sec-bt">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>WHAT WE OFFER</span></h2>
							<p>Here are some of the features we provide</p>
						</div>
						</div>
					</div>
					
					<div class="row">
							
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="small-features-box-colors">
							 
									<div class="sfb-icon bg-light-success theme-cl">
									<i class="fa fa-address-card-o"></i>
									</div>
									<h4 class="sfb-title">Get Your Company VCard</h4>
									<span>create your Digital Visiting card in just a click.</span>
							 
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="small-features-box-colors">
								 
									<div class="sfb-icon bg-light-success theme-cl">
										<i class="fa fa-check-circle-o"></i>
									</div>
									<h4 class="sfb-title">Globally Accessible Identity</h4>
									<span>Get your vCard accessible anywhere.</span>
							 
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="small-features-box-colors">
							 
									<div class="sfb-icon bg-light-success theme-cl">
										<i class="fa fa-user"></i>
									</div>
									<h4 class="sfb-title">Join Employees VCard</h4>
									<span>Create your Employee vCard within your company.</span>
							 
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="small-features-box-colors">
								 
									<div class="sfb-icon bg-light-success theme-cl">
										<i class="fa fa-thumbs-o-up"></i>
									</div>
									<h4 class="sfb-title">Feedback And Enquiries</h4>
									<span>Get feedback and enquiries from your vCard</span>
							 
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="small-features-box-colors">
							 
									<div class="sfb-icon bg-light-success theme-cl">
										<i class="fa fa-clone"></i>
									</div>
									<h4 class="sfb-title">Add Infinite Section</h4>
									<span>View infinite product and services by adding informative section in your vCard</span>
							 
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="small-features-box-colors">
							 
									<div class="sfb-icon bg-light-success theme-cl">
										<i class="fa fa-share-alt"></i>
									</div>
									<h4 class="sfb-title">Shareable VCard</h4>
									<span>Share your vCard with a simple link with your name on it.</span>
							 
							</div>
						</div>
						
						<div class="cat-box-name">
								
								<a href="company/add-company.php" class="btn-btn-wrowse">Add your business</a>
					</div>
					
					</div>
						
				</div>
			</section>
			

			
		<section style="background-image: url(assets/img/pattern.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>VCARD  <span>STRUCTURE</span></h2>
							<p>How does my vCard will look like</p>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="category-box-full style-1">
							
				
					<h2>Build your vCard with us and take a step ahead in digital world</h2>
				<p>There are many in your compitition . Lets step ahead of them by making your Identity and your creativity Digitally visible with us .</p>
				
				<ul class="check-listing">
					<li>vCard will start with your Logo</li>
					</br>	 
					<li>Then your Name and contact details</li>	</br>	 
					<li>Along with your social links</li>	</br>	 
					<li>Lets add some description or about your self</li>	</br>	 
					<li>if have any query or feedback then feel free to share it.</li>
					</ul>
				</div>
								
							</div>
						
						
					
						
						<div class="col-md-6 col-sm-6">
							<div class="category-box-full style-1" style=" height:500px; overflow-y: scroll; ">
							
							<img src="img/4.png" style="width: 100%;"/>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			
			
		
			<section class="company-state theme-overlap" style="background:url(assets/img/tag-bg.jpg);">
				<div class="container-fluid">
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-trophy"></span>
							<span class="counter"><?= $ro['company_login']; ?></span> <span class="counter-incr">+</span>
							<p>Register Companies</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-layers"></span>
							<span class="counter"><?= $ro['employee_login']; ?></span> <span class="counter-incr">+</span>
							<p>Register Employees</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-happy"></span>
							<span class="counter"><?= $ro['happy_customer']; ?></span> <span class="counter-incr">+</span>
							<p>Happy Clients</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-dial"></span>
							<span class="counter"><?= $ro['feedback']; ?></span> <span class="counter-incr">+</span>
							<p>Feedbacks</p>
						</div>
					</div>
				</div>
			</section>
			
			<section class="testimonials-3" style="background:url(assets/img/testimonial.png)">
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
											<img src="assets/img/avatar-customer-testimonial.png" alt="">
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
			<section class="list-detail">
				<div class="container">
				    	<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>Write Your  <span>Reviews</span></h2>
							
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-sm-2"></div>
						<div class="col-md-8 col-sm-8">
		                	<div class="detail-wrapper">
							
								<div class="detail-wrapper-body">
								
								
									<form method="post">
									<div class="row">
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Your Name*" name="test_name">
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Phone Number" maxlength="10" name="phone" id="phone"> 
										</div>
										<div class="col-sm-12">
											<textarea class="form-control height-110" placeholder="Tell us your experience..." name="msg"></textarea>
										</div>
										<div class="col-sm-12">
											<button type="submit" class="btn theme-btn" name="test_submit">Submit your review</button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
						</div>
						</div>
						</div>
						</section>
			<!-- End Testimonial Section -->
			
			<?php include('footer.php'); ?>
			 
			
			<!-- START JAVASCRIPT -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/plugins/js/bootstrap.min.js"></script>
			<script src="assets/plugins/js/bootsnav.js"></script>
			<script src="assets/plugins/js/bootstrap-select.min.js"></script>
			<script src="assets/plugins/js/bootstrap-touch-slider-min.js"></script>
			<script src="assets/plugins/js/jquery.touchSwipe.min.js"></script>
			<script src="assets/plugins/js/chosen.jquery.js"></script>
			<script src="assets/plugins/js/datedropper.min.js"></script>
			<script src="assets/plugins/js/dropzone.js"></script>
			<script src="assets/plugins/js/jquery.counterup.min.js"></script>
			<script src="assets/plugins/js/jquery.fancybox.js"></script>
			<script src="assets/plugins/js/jquery.nice-select.js"></script>
			<script src="assets/plugins/js/jqueryadd-count.js"></script>
			<script src="assets/plugins/js/jquery-rating.js"></script>
			<script src="assets/plugins/js/slick.js"></script>
			<script src="assets/plugins/js/timedropper.js"></script>
			<script src="assets/plugins/js/waypoints.min.js"></script>
			
			<script src="assets/js/jQuery.style.switcher.js"></script>
			
			
			 <script type="text/javascript">
   $("input[name=phone]").attr("maxlength", "10");
  $('.phone').keypress(function(e) {
      var arr = [];
      var kk = e.which;
   
      for (i = 48; i < 58; i++)
          arr.push();
   
      if (!(arr.indexOf(kk)>=0))
          e.preventDefault();
  });
</script>
			
			
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			
			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}
				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
			</script>
			
			<script type="text/javascript">
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
				});
			</script>
			
			<script>
				$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();   
				});
			</script>
			
			<script type="text/javascript">
				  $(document).ready(function() {
				  $('select').niceSelect();
				});	
			</script>
			
		</div>
	</body>

</html>