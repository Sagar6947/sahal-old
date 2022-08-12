
<?php include 'config.php'; 

 $q=mysqli_query($conn,"SELECT * FROM `blog` WHERE blog_id = '".$_GET['id']."' ");
$row=mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog Detail | EKaumBharat</title>
    
    <link href="../assets/plugins/css/plugins.css" rel="stylesheet">	
    
    <!-- Custom style -->
    <link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/responsiveness.css" rel="stylesheet">
	<link  type="text/css" rel="stylesheet" id="jssDefault" href="../assets/css/colors/main.css">

    
    
	</head>
	<body class="home-2">
		<?php include'header.php'; ?>
			<div class="clearfix"></div>
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Blog Detail</h1>
						<div class="breadcrumbs">
							<a href="index.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Blog Detail</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
		
			<section>
				<div class="container">
				
					<div class="row">
						<div class="col-md-8 col-sm-12">
							
							<!-- /.Article -->
							<article class="blog-news detail-wrapper">
								<div class="full-blog">
								
									<!-- Featured Image -->
									<figure class="img-holder">
										<a href=""><img src="../img/blog/<?= $row['blog_logo'] ?>" class="img-responsive" alt="News"></a>
										<div class="blog-post-date theme-bg">
										<?=date_format(date_create($row['created_date']), "M d, Y") ?>

										</div>
									</figure>
									
								
									<div class="full blog-content">
										<div class="post-meta">
											<span class="author"><i class="ti-user"></i><a href="#" title="Posts by admin">Admin</a></span>
											<span class="author"><i class="ti-calendar"></i><?=date_format(date_create($row['created_date']), "M d, Y") ?></span>
										
										</div>
										<h3 class="bl-title"><?= $row['blog_name'] ?></h3>
										<div class="blog-text">
										    <p><?= $row['blog_content'] ?></p>


										</div>
										
									
								</div>
							</article>
							<!-- /.Article -->
							
							<!-- User Comments -->
							
						
						</div>
					
					
						<div class="col-md-4 col-sm-12">
							<div class="sidebar">
							
						
								<div class="widget-boxed">
									<div class="widget-boxed-header">
										<h4><i class="ti-check-box padd-r-10"></i>Latest Blogs</h4>
									</div>
									<div class="widget-boxed-body padd-top-5">
										<div class="side-list">
											<ul class="side-blog-list">
											
											
											 <?php
					    $q=mysqli_query($conn,"SELECT * FROM `blog` ORDER BY `blog_id` DESC");
					     while($rowk=mysqli_fetch_array($q)){
?>
												<li>
													<a href="blog-detail.php?id=<?=$row['blog_id'] ?>">
														<div class="blog-list-img">
															<img src="../img/blog/<?= $rowk['blog_logo'] ?>" class="img-responsive" alt="<?= $rowk['blog_name'] ?>">
														</div>
													</a>
													<div class="blog-list-info">
														<h5><a href="blog-detail.php?id=<?=$row['blog_id'] ?>" title="blog"><?= $rowk['blog_name'] ?></a></h5>
														<div class="blog-post-meta">
															<span class="updated"><?=date_format(date_create($rowk['created_date']), "M d, Y") ?>
</span> 					
														</div>
													</div>
												</li>
												
												
											<?php
					     }
					     ?>
												
												

											</ul>
										</div>
									</div>
								</div>
								
								
							
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
		<?php include'footer.php'; ?>
	

		<?php include 'footer-link.php'; ?>
			
		</div>
	</body>
</html>