<?php
include "db_connect.php";
if (isset($_POST['section_submit'])) {

$qr1_no = mysqli_real_escape_string($conn , $_POST['qr1_no']);
$qr2_no = mysqli_real_escape_string($conn , $_POST['qr2_no']);
$qr3_no = mysqli_real_escape_string($conn , $_POST['qr3_no']);

$bank = mysqli_real_escape_string($conn , $_POST['bank']);

$acc_holder = mysqli_real_escape_string($conn , $_POST['acc_holder']);

$acc_no = mysqli_real_escape_string($conn , $_POST['acc_no']);
$ifsc = mysqli_real_escape_string($conn , $_POST['ifsc']);

$acc_type = mysqli_real_escape_string($conn , $_POST['acc_type']);


$qr1_name = mysqli_real_escape_string($conn , $_POST['qr1_name']);

$qr2_name = mysqli_real_escape_string($conn , $_POST['qr2_name']);

$qr3_name = mysqli_real_escape_string($conn , $_POST['qr3_name']);


 if(!empty($_FILES['qr1']['name']))
     {
        $file=$_FILES['qr1']['name'];
    $tmpfile=$_FILES['qr1']['tmp_name'];
    $folder=date("dmy").$file;
    move_uploaded_file($tmpfile,'images/QR/'.$folder);  
      }
     else
     {
        $folder = $_POST['qr1_image'];
     }
     
     
     
    if(!empty($_FILES['qr2']['name']))
     {
        $file2=$_FILES['qr2']['name'];
    $tmpfile2=$_FILES['qr2']['tmp_name'];
    $folder2 = date("dmy").$file2;
    move_uploaded_file($tmpfile2,'images/QR/'.$folder2);  
      }
     else
     {
        $folder2 = $_POST['qr2_image'];
     }
     
     
         if(!empty($_FILES['qr3']['name']))
     {
        $file3=$_FILES['qr3']['name'];
    $tmpfile3=$_FILES['qr3']['tmp_name'];
    $folder3 =date("dmy").$file3;
    move_uploaded_file($tmpfile3,'images/QR/'.$folder3);  
      }
     else
     {
        $folder3 = $_POST['qr3_image'];
     }
     
     
$sqlzz=mysqli_query($conn,"select * from `payment_details` WHERE company_id='$company' ");
    $rdff=mysqli_fetch_array($sqlzz);
    

    
    $count = mysqli_num_rows($sqlzz);
    if($count > 0)
    {
        $update = mysqli_query($conn,"UPDATE `payment_details` SET `qr2_no`='$qr2_no',`qr1_no`='$qr1_no',`qr3_no`='$qr3_no',
        `bank`='$bank',`acc_holder`='$acc_holder',`acc_no`='$acc_no',`ifsc`='$ifsc',`acc_type`='$acc_type',`qr1`='$folder',`qr1_name`='$qr1_name',
        `qr2`='$folder2',`qr2_name`='$qr2_name',`qr3`='$folder3',`qr3_name`='$qr3_name' WHERE company_id='$company'");
        if($update){
            echo'<script>alert("Payment details Updated");</script>';
        }
    }
    else
    {
          $sec_cate = mysqli_query($conn,"INSERT INTO `payment_details`( `company_id`, `qr2_no`, `qr1_no`, `qr3_no`, `bank`, `acc_holder`, `acc_no`, `ifsc`, `acc_type`, `qr1`, `qr1_name`, `qr2`, `qr2_name`, `qr3`, `qr3_name`) 
          VALUES ('$company','$qr2_no','$qr1_no','$qr3_no','$bank','$acc_holder','$acc_no','$ifsc','$acc_type','$folder', '$qr1_name','$folder2','$qr2_name','$folder3','$qr3_name')");
          print_r($sec_cate);
         if($sec_cate){
            echo'<script>alert("Payment details Inserted")</script>';
        }   
    }
}
$sqlz=mysqli_query($conn,"select * from `payment_details` WHERE `company_id`='$company' ");
    $rdf=mysqli_fetch_array($sqlz);
    // print_r($rdf);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
  <title>Payment Section | SaharDirectory</title>

	<?php include('header-link.php'); ?>

<style>
    
    .row{
            padding-top: 15px;
    }
    
    .responsive
    {
            height: ;
    width: 100%;
    }
</style>

</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>
		<section class="padd-0">
			<div class="container">
				<div class="col-md-12 translateY-60 col-sm-12">
					<!-- General Information -->
						<form method="post"  enctype="multipart/form-data">
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">

					 
							<div class="row mrg-r-10 mrg-l-10">
							    <div class="row">
							
								 <div class="col-sm-3">
									<label> QR Code 1 Name :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex : Paytm " name="qr1_name" value="<?= $rdf['qr1_name'] ?>"/>
								</div>
									<div class="col-sm-3">
								  <label> QR Code 1 :</label>
                                <input type="file" class="form-control"  accept="image/*" name="qr1"   />
                                 <input name="qr1_image" type="hidden"  
                                 value="<?= $rdf['qr1'] ?>">
							    </div>
							    
							    	<div class="col-sm-3">
									<label>QR UPI id or Number</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex: 8821876573"	name="qr1_no" value="<?= $rdf['qr1_no'] ?>"  />
								</div>
							    
						<div class="col-sm-2">	   <?= (($rdf['qr1'] == '') ? '' : '<img src="images/QR/'.$rdf['qr1'].'" class="responsive"/>') ?></div>

							    
							</div>
							     <div class="row">
							    		
								 <div class="col-sm-3">
									<label> QR Code 2 Name :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex : Googlepay "	name="qr2_name" value="<?= $rdf['qr2_name'] ?>" />
								</div>
									<div class="col-sm-3">
								  <label> QR Code 2 :</label>
                                <input type="file" class="form-control"  accept="image/*" name="qr2"   />
                                
                                
                                <input name="qr2_image" type="hidden"  value="<?= $rdf['qr2'] ?>">
							    </div>
							    
							    
							    	<div class="col-sm-3">
									<label>QR 2 UPI id or Number</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex: 8821836873"	name="qr2_no" value="<?= $rdf['qr2_no'] ?>"  />
								</div>  
								<div class="col-sm-3"> 
							   	<?= (($rdf['qr2'] == '') ? '' : '<img src="images/QR/'.$rdf['qr2'].'" class="responsive"/>') ?></div>
								
								</div>
								
							 

							    
							        <div class="row">
							     <div class="col-sm-3">
									<label> QR Code 3 Name :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex : Phonepay "	name="qr3_name"  value="<?= $rdf['qr3_name'] ?>"/>
								</div>
									<div class="col-sm-3">
								  <label> QR Code 3 :</label>
                                <input type="file" class="form-control"  accept="image/*" name="qr3"   />
                                <input name="qr3_image" type="hidden"  value="<?= $rdf['qr3'] ?>">

							    </div>
							    
							    <div class="col-sm-3">
									<label>QR 3 UPI id or Number</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex: 8821836873"	name="qr3_no" value="<?= $rdf['qr3_no'] ?>"  />
								</div>
								
							    
						<div class="col-sm-2">	<?= (($rdf['qr3'] == '') ? ''  : '<img src="images/QR/'.$rdf['qr3'].'" class="responsive"') ?></div>
    
							    
							    </div>
							    
							    
							    </div>
							    </div>
							    </div>
							    
							    
							    		<form method="post"  enctype="multipart/form-data">
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">

					 
							<div class="row mrg-r-10 mrg-l-10">
							    <div class="row">
								<div class="col-sm-4">
									<label>bank Name :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex: Union Bank"	name="bank"  value="<?= $rdf['bank'] ?>" />
								</div>
							
							    
							    <div class="col-sm-4">
									<label>Account Holder :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Ex : Munesh Kumar"	name="acc_holder"  value="<?= $rdf['acc_holder'] ?>" />
								</div>
								
							
							    
							    
							        <div class="col-sm-4">
									<label>Account Number :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="Account Number"	name="acc_no"  value="<?= $rdf['acc_no'] ?>" />
								     </div>
								
								
							        <div class="col-sm-4">
									<label>IFSC Code :</label>
									<input type="text" maxlength="255" class="form-control" placeholder="IFSC Code"	name="ifsc"  value="<?= $rdf['ifsc'] ?>" />
								</div>
								
								
							        <div class="col-sm-4">
									<label>Account Type :</label>
									<select class="form-control" name="acc_type">
									    <option value="">Select</option>
									    <option value="Saving" <?= (($rdf['acc_type'] == 'Saving') ? 'selected' : ''); ?>>Saving Account</option>
									     <option value="Current" <?= (($rdf['acc_type'] == 'Current') ? 'selected' : ''); ?>>Current Account</option>
									    
									</select>
								</div>
								
									<div class="col-sm-3">
									<br>
									<input type="submit" class="btn theme-btn" 
									name="section_submit" />

								</div>
								
								</div>
								</div>
								</div>
						</form>
						
						<!-- End General Information -->
					</div>
				</div>
			</section>
			
		
<script>
    CKEDITOR.replace('editor1', {
           extraPlugins: 'colorbutton,colordialog'
    });
  </script>
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>