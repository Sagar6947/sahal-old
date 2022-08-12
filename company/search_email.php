<?php
 include('db_connect.php'); 
 

if (!empty($_POST["contact"])) {

    $contact = $_POST["contact"];


    $stateResult = mysqli_query($conn, "SELECT * FROM `company` WHERE `company_email`='".$contact."' ");
     $mus = mysqli_fetch_array($stateResult);
     if(mysqli_num_rows($stateResult) > 0)
    {
         echo 'This Email ID is already registered';
    }
}
?>