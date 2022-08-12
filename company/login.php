<?php  
include ("db_connect.php");
$msg='';
 if (isset($_POST["vbsubmit"]))
{
    // echo '1';
    $name = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$fg =  "SELECT * FROM `company` WHERE `company_contact` ='".$name."'";
	$result = mysqli_query($conn,$fg);
	
	if($row = mysqli_fetch_array($result))
	{
	   // print_r($row['company_password']);
		// echo '2';
	    if ($row['company_password'] == $password) 
    	{
			// echo '3';
			mysqli_query($conn,"UPDATE `company` SET  `last_login`='".date('d-m-Y H:i:s')."',`login_attempt` = '".(1+$row['login_attempt'])."'  WHERE `company_id`='".$row['company_id']."'");
    	$_SESSION['SaharDirectory_status'] = 'Active';
		$_SESSION['SaharDirectory']  = $row['company_id'];
    		if($row['login_attempt'] == 1){
    			echo'<script>window.location="company-profile-edit.php"</script>';
    		}else{
    			echo'<script>window.location="company-profile-edit.php"</script>';
    		}
    	
    	} 
    	else 
    	{
    			$msg =  "Wrong Password Entered! ! !  ";
    	}	
	}
	else
	{
	    $msg =  " No user with register contact no. ! ! !  ";
	   
	}
	echo '<script>alert("'.$msg.'")</script>';
		echo'<script>window.location="company-login.php"</script>';
	
																 
}
 
?>