<?php

include('db_connect.php'); 

if(isset($_GET['id']))
{
	$i=$_GET['id'];

	

	$q=mysqli_query($conn,"DELETE FROM `section` WHERE section_category ='$i'");
	$q=mysqli_query($conn,"DELETE FROM `section_category` WHERE sec_id ='$i'");
	
	if($q)
	
	{
	  echo "<script>window.location='section-category.php'</script>";
	}
	
}

?>