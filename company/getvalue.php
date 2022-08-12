<?php
 
include("db_connect.php");
$nm = $_POST['nm']; 
$f="SELECT * FROM `company` WHERE `company_web_title` IN ('".$nm."')";
// echo $f;
$query=mysqli_query($conn,$f);
if(mysqli_num_rows($query) > 0){
     echo 'N';
    }else{
        echo 'Y';
    }
    // echo 'asdf';
?>