<?php  

include ("../db/db_connect.php");


$package_image = "SELECT * FROM disclaimer where id='".$_GET["id"]."'";
$package_image_page_result=$conn->query($package_image); 
$package_image_page_row=$package_image_page_result->fetch_assoc();
 
 $delete = "DELETE FROM disclaimer WHERE id = '".$_GET["id"]."'";  

$result=$conn->query($delete);
echo '<script>window.location="../disclaimer.php"</script>';
 ?>