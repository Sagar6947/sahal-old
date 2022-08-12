<?php

include('db_connect.php');

if(isset($_GET['id']))
{
	$i=$_GET['id'];


	$q=mysqli_query($conn,"DELETE FROM `emp_feedback` WHERE `id`='$i'");
	if($q)
	{
	   echo '<script>window.location="employee-list.php"</script>';
		
}
}

?>