<?php
  include "config.php";
if (isset($_POST['employee_feedback'])) {
    // print_r($_POST);
    // exit;
    $title = $_POST['title'];
	$star = mysqli_real_escape_string($conn , $_POST['star']);
	$name = mysqli_real_escape_string($conn , $_POST['name']);
	$msg = mysqli_real_escape_string($conn , $_POST['msg']);
	$company_id = mysqli_real_escape_string($conn , $_POST['company_id']);
	$emp_id = mysqli_real_escape_string($conn , $_POST['emp_id']);


	
$insert="INSERT INTO `emp_feedback`( `company_id`, `employee_id`, `name`, `feedback`, `rating`) VALUES ('$company_id','$emp_id','$name','$msg','$star')";
// echo $insert;
 if($conn->query($insert))
 {
		echo'<script>alert("Thank You For Feedback")</script>';
	}
	if($emp_id == '0')
	{
		echo'<script>window.location="../demo/"</script>';
	}else{
		echo'<script>window.location="../demo/'.$title.'"</script>';
	}
	
}

 ?>