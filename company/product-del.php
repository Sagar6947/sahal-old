
<?php

include('db_connect.php');

if(isset($_GET['id']))
{
	$i=$_GET['id'];

	$qx=mysqli_query($conn , "select * from `product` WHERE product_id='$i'");
	$fd = mysqli_fetch_array($qx);
	unlink('images/product/'.$fd['product_image']);  



	$q=mysqli_query($conn,"DELETE FROM `product` WHERE product_id='$i'");
	if($q)
	{
	   echo '<script>window.location="company-product.php"</script>';
		
}
}

?>