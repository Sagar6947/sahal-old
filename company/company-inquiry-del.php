 <?php

include ("db_connect.php");

if(isset($_GET['id']))
{
	$i=$_GET['id']; 



	$q=mysqli_query($conn,"DELETE FROM `inquiry` WHERE `id` = '$i' ");
	if($q)
	{
	   echo '<script>window.location="company-inquiries.php"</script>';
		
}
}

?>