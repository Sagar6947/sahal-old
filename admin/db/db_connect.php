<?php

session_start();
$conn = mysqli_connect("localhost", "rewaruga_harsha", "M=4qtas@o]9W", "rewaruga_review") or die("Error " . mysqli_error($conn));

date_default_timezone_set("Asia/Kolkata");


define('product_url', 'http://SaharDirectory.com/img/product/');
define('product_location', '../../img/product/');
define('website_url', 'http://SaharDirectory.com/');




function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

?>