<?php
include ("db_connect.php");
if (isset($_POST['Employee_edit'])) {

	$emp_name = mysqli_real_escape_string($conn , $_POST['emp_name']);
	$emp_designation = mysqli_real_escape_string($conn , $_POST['emp_designation']);
	$employee_web_url = mysqli_real_escape_string($conn , $_POST['employee_web_url']);
     
    $eid = mysqli_real_escape_string($conn , $_POST['emp_id']);
    
    $com_id = mysqli_real_escape_string($conn , $_POST['com_id']);

	$emp_address = mysqli_real_escape_string($conn , $_POST['emp_address']);
	$emp_email = mysqli_real_escape_string($conn , $_POST['emp_email']);
	$emp_no = mysqli_real_escape_string($conn , $_POST['emp_no']);
	$emp_whatsapp_no = mysqli_real_escape_string($conn , $_POST['emp_whatsapp_no']);

	
	$emp_fb = mysqli_real_escape_string($conn , $_POST['emp_fb']);

	$emp_insta = mysqli_real_escape_string($conn , $_POST['emp_insta']);
	$emp_whastapp = mysqli_real_escape_string($conn , $_POST['emp_whastapp']);
	$emp_linkdin = mysqli_real_escape_string($conn , $_POST['emp_linkdin']);

 if(!empty($_FILES['image']['name']))
     {
    $file=$_FILES['image']['name'];
	$tmpfile=$_FILES['image']['tmp_name'];
	$folder=$file;
	move_uploaded_file($tmpfile,'images/employee/'.$folder);
    }
    else
    {
	$folder = $_POST['img'];
    }

	$update="UPDATE `employee` SET  `emp_name`='$emp_name',`employee_web_url`='$employee_web_url',`emp_email`='$emp_email',`image`='$folder',`emp_no`='$emp_no',
	`emp_address`='$emp_address',`emp_whatsapp_no`='$emp_whatsapp_no',`emp_designation`='$emp_designation',`emp_whastapp`='$emp_whastapp',`emp_fb`='$emp_fb',
	`emp_insta`='$emp_insta',`emp_linkdin`='$emp_linkdin' WHERE emp_id  ='".$eid."' ";
	if($conn->query($update))
	{
		echo'<script>alert("Your Profile Update Successfully")</script>';
	}
	else
	{
		echo'<script>alert("Try Again")</script>';

	}
	

                                  	$fetch = mysqli_query($conn,"SELECT * FROM `company` WHERE `company_id` ='".$com_id."' ");
                                  	$comp = mysqli_fetch_array($fetch);
			                         			
		
		echo'<script>window.location="../'.$comp['company_web_title'].'/'.$employee_web_url.'"</script>';
	

}
