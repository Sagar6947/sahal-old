<?php

include('db_connect.php'); 

if(isset($_GET['id']))
{
	$i=$_GET['id'];

	

	$q=mysqli_query($conn,"DELETE FROM `section` WHERE section_id = '$i'");
	
	if($q)
	
	{
	  echo "<script>window.location='section-list.php'</script>";
	}
	
}

?>