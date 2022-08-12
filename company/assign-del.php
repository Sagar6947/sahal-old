<?php

include('db_connect.php'); 

if(isset($_GET['id']))
{
	$i=$_GET['id'];
	$a=$_GET['sec_id'];
	

	$q=mysqli_query($conn,"DELETE FROM `assign_employee` WHERE assign_id ='$i'");
	
	if($q)
	
	{
	  echo "<script>window.location='assign-employee.php?id=".$a."'</script>";
	}
	
}

?>