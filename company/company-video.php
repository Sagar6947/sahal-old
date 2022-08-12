<?php
include ("db_connect.php");
 

if (isset($_POST['video_submit']))
{


$title = mysqli_real_escape_string($conn , $_POST['title']);
 $video_path =  $_POST['video_path'];

  $video_path = preg_replace("#.*youtube\.com/watch\?v=#", "" , $video_path);
   $video_path = preg_replace("#.*https://youtu.be/#", "" , $video_path);

$video = "INSERT INTO `company_video`(`company_id`, `title`, `video_path`) VALUES ('$company','$title','$video_path')";

if($conn->query($video)){
		echo'<script>alert("Your video  Added Successfully")</script>';
	}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo '<script>window.location="company-video.php"</script>';
}


?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Video  Gallery | SaharDirectory</title>

	<?php include('header-link.php'); ?>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>
			
				<section class="manage-listing padd-top-0">
				<div class="container">
					<div class="row">
						
						<div class="heading">
							
							
						</div>
					</div>
						<div class="col-md-6">
						<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">
						    	<form method="post"  enctype="multipart/form-data"> 
							<div class="row mrg-r-10 mrg-l-10">
								<div class="col-sm-12">
									<label>Video Title :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Video Title"
									name="title"  required />
								</div>
								
								<div class="col-sm-12">
									<label>Youtube Video :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="youtube.com/..."	name="video_path"  required />
								</div>

								<div class="col-sm-3">
									<input type="submit" class="btn theme-btn" 
									name="video_submit" />

								</div>
							</div>
						</form>
					</div>
					</div>
						<div class="col-md-6">
				
				<table class="table table-striped">
					<thead class="thead-dark">

						<tr>
							<th scope="col">#</th>
							<th scope="col">Date</th>
							<th scope="col">Title</th>
							<th scope="col">Video</th>
							<th scope="col">Action</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						$vidy = mysqli_query($conn , "SELECT * FROM `company_video` WHERE `company_id` = '".$company."' ORDER BY `video_id` DESC LIMIT 6 ");
						while ($roww  =mysqli_fetch_array($vidy)) 
						{
							$i= $i+1;
						?>
					

							<tr>
								<th scope="row"><?= $i ?></th>
								<td><?=date_format(date_create($roww['create_date']), "d M,Y") ?></td>
								<td><?= $roww['title']; ?></td>
								<td><iframe width="100" height="100"
                                                src="https://www.youtube.com/embed/<?= $roww['video_path']; ?>">
                                                </iframe></td>
								
								<td><a href="video-del.php?id=<?= $roww['video_id']; ?>" class="theme-btn btn-square" ><i class="ti-trash"></i></a></td>
							
							</tr>
					

							<?php
						}
						?>
					</tbody>
				</table>
					
					
					</div>
					</div>
				</div>
			</section>

			
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>