 <?php

include ("db_connect.php");

if(isset($_GET['id']))
{
	$i=$_GET['id']; 



	$q=mysqli_query($conn,"UPDATE `feedback` SET `status`= 0  WHERE `id` = '$i' ");
	if($q)
	{
	   echo '<script>window.location="company-feedback.php"</script>';
		
}
}

?>