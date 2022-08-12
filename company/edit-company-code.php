<?php
include ("db_connect.php");
if (isset($_POST['update_profile'])) {

	$company_name = mysqli_real_escape_string($conn , $_POST['company_name']);
	$web_company_name = mysqli_real_escape_string($conn , $_POST['web_company_name']);
	$company_district = mysqli_real_escape_string($conn , $_POST['company_district']);
	$company_tagline =mysqli_real_escape_string($conn , $_POST['company_tagline']);
	$company_category = mysqli_real_escape_string($conn , $_POST['company_category']);
	$company_subcategory = mysqli_real_escape_string($conn , $_POST['company_subcategory']);

	$company_address = mysqli_real_escape_string($conn , $_POST['company_address']);
	$company_address_url = mysqli_real_escape_string($conn , $_POST['company_address_url']);
	$company_email = mysqli_real_escape_string($conn , $_POST['company_email']);
	$company_contact = mysqli_real_escape_string($conn , $_POST['company_contact']);
	$company_whatsapp = mysqli_real_escape_string($conn , $_POST['company_whatsapp']);
	$company_website = mysqli_real_escape_string($conn , $_POST['company_website']);
	$company_facebook = mysqli_real_escape_string($conn , $_POST['company_facebook']);
	$company_twitter = mysqli_real_escape_string($conn , $_POST['company_twitter']);
	$company_instagram = mysqli_real_escape_string($conn , $_POST['company_instagram']);
	$company_whatsapp_link = mysqli_real_escape_string($conn , $_POST['company_whatsapp_link']);
	$company_linkedin = mysqli_real_escape_string($conn , $_POST['company_linkedin']);
	$company_telegram = mysqli_real_escape_string($conn , $_POST['company_telegram']);
		$company_telegram = mysqli_real_escape_string($conn , $_POST['company_telegram']);
	$bg_color = mysqli_real_escape_string($conn , $_POST['bg_color']);
	$company_youtube = mysqli_real_escape_string($conn , $_POST['company_youtube']);
		
		
			$company_person = mysqli_real_escape_string($conn , $_POST['company_person']);
	$company_designation = mysqli_real_escape_string($conn , $_POST['company_designation']);


 $company_state = mysqli_real_escape_string($conn, $_POST['company_state']);

    $company_city = mysqli_real_escape_string($conn, $_POST['company_city']);
     
     

 if(!empty($_FILES['company_logo']['name']))
     {
	$file=$_FILES['company_logo']['name'];
	$tmpfile=$_FILES['company_logo']['tmp_name'];
	$folder=$file;
	move_uploaded_file($tmpfile,'images/'.$folder);
	 }
     else
     {
        $folder = $_POST['com_logo'];
     }

if(!empty($_FILES['company_banner']['name']))
     {
	$file2=$_FILES['company_banner']['name'];
	$tmpfile=$_FILES['company_banner']['tmp_name'];
	$folder2=$file2;
	move_uploaded_file($tmpfile,'images/'.$folder2);
}
else
     {
        $folder2 = $_POST['com_banner'];
     }

     if(!empty($_FILES['company_card_background']['name']))
     {

	$file3=$_FILES['company_card_background']['name'];
	$tmpfile=$_FILES['company_card_background']['tmp_name'];
	$folder3=$file3;
	move_uploaded_file($tmpfile,'images/'.$folder3);
}
else
     {
        $folder3 = $_POST['com_card_background'];
     }


	$update_profile = "UPDATE `company` SET `company_name`= '$company_name', `company_person`='$company_person',`company_designation`='$company_designation',
	`company_web_title`='$web_company_name',`company_category`='$company_category',`company_subcategory`='$company_subcategory',
	`company_address`='$company_address',`company_address_url`='$company_address_url',`bg_color`='$bg_color',
	`company_city`='$company_city',`company_state`='$company_state',`company_email`='$company_email',`company_website_url`='$company_website', `company_district`='$company_district',
	`company_tagline`='$company_tagline',`company_contact`='$company_contact',`company_whatsapp`= '$company_whatsapp',`company_telegram`= '$company_telegram',`company_logo`= '$folder',
	`company_banner`='$folder2',`company_card_background`='$folder3',`company_facebook`='$company_facebook',`company_twitter`='$company_twitter',
	`company_instagram`='$company_instagram',`company_youtube`='$company_youtube',`company_whatsapp_link`='$company_whatsapp_link'  WHERE company_id = '".$company."' ";
	if($conn->query($update_profile))
	{
		echo'<script>alert("Your Profile Updated Successfully ")</script>';
	}
	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}
	echo'<script>window.location="company-profile-edit.php"</script>';
}

?>

