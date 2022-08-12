<?php

include('db_connect.php'); 

if(isset($_GET['id']))
{
	$i=$_GET['id'];

	

	$q=mysqli_query($conn,"DELETE FROM `company_video` WHERE video_id = '$i'");
	
	if($q)
	
	{
	  echo "<script>window.location='company-video.php'</script>";
	}
	
}

?>