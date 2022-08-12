
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog | EKaumBharat</title>
    
    <!-- All plugins -->
    <link href="../assets/plugins/css/plugins.css" rel="stylesheet">	
    
    <!-- Custom style -->
    <link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/responsiveness.css" rel="stylesheet">
	<link  type="text/css" rel="stylesheet" id="jssDefault" href="../assets/css/colors/main.css">


    
	</head>
	<body class="home-2">
		<div class="wrapper">  
		<?php include'header.php'; ?>
			<div class="clearfix"></div>
			
			<section class="title-transparent page-title" style="background:url(../assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>All Blogs</h1>
						<div class="breadcrumbs">
							<a href="../index.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Blog</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			
			<section>
				<div class="container">
					<div class="row">
					    <?php
					    $q=mysqli_query($conn,"SELECT * FROM `blog` ORDER BY `blog_id` DESC");
					     while($row=mysqli_fetch_array($q)){
?>
						<div class="col-md-4 col-sm-6">
							<div class="blog-box blog-grid-box">
								<div class="blog-grid-box-img">
									<img src="../img/blog/<?= $row['blog_logo'] ?>" class="img-responsive" alt="<?= $row['blog_name'] ?>" />
								</div>
								
								<div class="blog-grid-box-content">
									<div class="blog-avatar text-center">
										<img src="../assets/img/user-1.png" class="img-responsive" alt="<?= $row['blog_name'] ?>" />
										<p><strong>By</strong> <span class="theme-cl">Admin</span></p>
									</div>
									<h4><?= $row['blog_name'] ?></h4>
									<p><?= substr($row['blog_content'],0,150) ?>...</p>
									<a href="blog-detail.php?id=<?=$row['blog_id'] ?>" class="theme-cl" title="Read More..">Continue...</a>
								</div>
								
							</div>
						</div>
						
				
						
				<?php
				}
				?>
					
				
				
						
					
				
				</div>
			</section>

			<?php include'footer.php' ?>
			

			<!-- START JAVASCRIPT -->
		<?php include 'footer-link.php'; ?>
		</div>
	</body>
</html>