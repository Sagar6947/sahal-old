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

	<title>Graphics | SaharDirectory</title>

	<?php include('header-link.php'); ?>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height:43px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>
			
				<section class="manage-listing padd-top-0">
				<div class="container">
					<div class="row">
						
						<div class="heading">
						    <div class="row">
						        <div class="col-sm-8">
							<h4>Note : For appearing graphics in your V-card please activate the graphics. </h4></div>
							<div class="col-sm-4">
							<form method="post">
							    <label class="switch">
                                  <input type="checkbox" id="graph" name="graph" value="" <?= (($company_detail['graphic_status'] == 0)? 'checked':'') ?>>
                                  <span class="slider round"></span>
                                </label></div>
                                <input type="hidden" id="status" value="<?= (($company_detail['graphic_status'] == 0)? '1':'0') ?>">
							</form>
						</div>
							
						
							
						</div>
					
					</div>
					
					<div class="widget-boxed">
									<div class="widget-boxed-header">
										<h4><i class="ti-gallery padd-r-10"></i>Festival Graphics(These graphics will appear as per festival dates in your panel. you also can download these graphics directly
)</h4>
									</div>
									<div class="widget-boxed-body">
										<div class="side-list no-border gallery-box">
											<div class=" row gallery-list">
											
											
												<?php
                        					$i=0;
                        					$vidy = mysqli_query($conn , "SELECT * FROM `company_graphics` WHERE `type` = '1' ORDER BY `id` DESC");
                        					while ($roww  =mysqli_fetch_array($vidy)) 
                        					{
                        						$i= $i+1;
                        					?>
												<div class="col-sm-4">
												    <p>Festival date : <?= $roww['show_date']; ?></p>
													<a data-fancybox="gallery" href="../admin/graphicsuploads/<?=  $roww['graphics'] ?>">
														<img src="../admin/graphicsuploads/<?=  $roww['graphics'] ?>" class="img-responsive" alt="<?= $roww['name']; ?>" />
													</a>
													 <p>Festival Name : <?= $roww['name']; ?></p>
												</div>
											
																						<?php
                        						}
                        						?>
											</div>
										</div>
									</div>
								</div>
					
					
					
				</div>
			</section>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			
			<script>
            $(document).ready(function(){
            	$('#graph').click(function(){
            	    
            	    var a  = $('#graph').val();
            	     var status = $('#status').val();
            	     $.ajax({
            	         type: "POST",
            	  url: "graphic-status.php",
                    
                    data: {'status':status} ,
                    success: function (response) {
                        // console.log(response);	
                        window.location='company_graphics.php';
               
                }
               });
            	 
	 
	    
	    
	});
		
		});

</script>

			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>
		


