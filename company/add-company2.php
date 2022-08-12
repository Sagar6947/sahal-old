<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
	    <title>Add Business | SaharDirectory </title>
		<style>
 

/* The Modal (background) */
.modalhm {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* modalhm Content */
.modalhm-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 20%;
}
@media only screen and (max-width: 900px) {
	.modalhm-content {
		width: 80%;
  }
}
/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
    <!-- All plugins -->
    <?php include('header-link.php'); ?>

   
    
	</head>
	<body class="home-2">
		<div class="wrapper">  
			<?php include('header.php'); ?> 
			<div class="clearfix"></div>
			<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Add Business</h1>
						
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
		
			<section>
				<div class="container">
					<div class="col-md-10 col-sm-12 col-md-offset-1 mob-padd-0">
						<!-- General Information -->
						<div class="add-listing-box general-info mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<i class="ti-files theme-cl"></i>
								<h3>General Information</h3>
								
							</div>
							<form method="post" action="insert-company.php" enctype="multipart/form-data"> 
								<div class="row mrg-r-10 mrg-l-10">
									<div class="col-sm-6">
										 <label>Company Name :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Company Name"  id="company_name" name="company_name"  required/>
									</div>
									<div class="col-sm-6">
										 <label>Web Title :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Company Web Title"  name="web_company_name" id="web_company_name" required/>
										 
										<span id="web_company_name_msg"></span>
									</div>
									<div class="col-sm-6">
									  <label>Email :</label>
                                        <input type="email" class="form-control" placeholder="Company Email"  id="company_email" name="company_email" required />
									</div>
									
									<div class="col-sm-6">
										<label>Phone No.</label>
										 <input type="number" maxlength="10" minlength="10" class="form-control" placeholder="Company Contact"  id="company_contact" name="company_contact"  required/>
									</div>
									
									<div class="col-sm-6">
										 <label>WhatsApp No. :</label>
                                        <input type="number" maxlength="10" minlength="10" class="form-control" placeholder="Company WhatsApp"  id="company_whatsapp" name="company_whatsapp"  />
									</div>
									
									<div class="col-sm-6">
									 <div class="form-line">
                                        <label>Website :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Company Website"  id="company_website" name="company_website"  />
                                    </div>
									</div>
									<div class="col-sm-6" style="display:none">
										<label>Category</label>
										<select data-placeholder="Choose Category" class="form-control chosen-select" tabindex="2" name="company_category" id="cate_id" ="">
											<option value="">Select</option>
										

										<?php
                                          $select_category = $conn->query("SELECT * FROM company_category WHERE category_status='0' ");
                                          while ($select_category_row = $select_category->fetch_assoc()) 
                                          {
                                          	echo'<option value="'.$select_category_row['cate_id'].'">' . $select_category_row["category"] . '</option>';


                                          }
                                          ?>
										</select>
									</div>

                              

									<div class="col-sm-6"  style="display:none">
										<label>Subcategory</label>
												<select class="form-control" name="company_subcategory" id="company_subcategory">
													<option value="">Choose </option>
												</select>
									</div>
								</div>
							
						</div>
						<!-- End General Information -->
						
						<!-- Add Location -->
						<div class="add-listing-box add-location mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<i class="ti-location-pin theme-cl"></i>
								<h3>Add Location</h3>
								<p>Write Address Information about your Comapany</p>
							</div>
						
								<div class="row mrg-r-10 mrg-l-10">
									<div class="col-sm-12">
									<label>Address :</label>
                                        <input type="text"  class="form-control" placeholder="Enter  Address"  id="company_address" name="company_address"   /> 
								</div>
								<div class="row mrg-r-10 mrg-l-10">
									<div class="col-sm-12">
									<label>Google link :</label>
                                    <input type="text"  class="form-control" placeholder="Enter address url"  id="company_add_url" name="company_address_url"   /> 
									<h4>How to get location google link</h4>
									<ul>
									<li>On your computer, open Google Maps.</li>
									<li>Go to the directions, map, or Street View image you want to share.</li>
									<li>On the top left, click Menu  .</li>
									<li>Select Share or embed map. If you don't see this option, click Link to this map.</li>
									<li>Optional: To create a shorter web page link, check the box next to "Short URL."</li>
									<li>Copy and paste the link wherever you want to share the map.</li>
									</ul>

								</div>
							
						</div>
						</div></div>
						<!-- End Add Location -->
						
						<!-- Full Information -->
						<div class="add-listing-box full-detail mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<i class="ti-write theme-cl"></i>
								<h3>Visual Details</h3>
								 
							</div>
							
								<div class="row mrg-r-10 mrg-l-10">
									
									
									
									
									<div class="col-sm-6" style="display:none">
										<label><i class="fa fa-facebook mrg-r-5" aria-hidden="true"></i>Facebook Link</label>
										 <input type="text" maxlength="255" class="form-control" placeholder="Company Facebook Link"  id="company_facebook" name="company_facebook"  />
									</div>
									
									<div class="col-sm-6" style="display:none">
										<label><i class="fa fa-twitter mrg-r-5" aria-hidden="true"></i>Twitter Link</label>
										<input type="text" maxlength="255" class="form-control" placeholder="Company Twitter Link"  id="company_twitter" name="company_twitter"  />
									</div>

									<div class="col-sm-6" style="display:none">
										<label><i class="fa fa-instagram mrg-r-5" aria-hidden="true"></i>Instagram Link</label>
										  <input type="text" maxlength="255" class="form-control" placeholder="Company instagram Link"  id="company_instagram" name="company_instagram"  />
									</div>
									
									<div class="col-sm-6" style="display:none">
										<label><i class="fa fa-whatsapp mrg-r-5" aria-hidden="true"></i>WhatsApp Link</label>
										 <input type="text" maxlength="255" class="form-control" placeholder="Company WhatsApp Link"  id="company_whatsapp_link" name="company_whatsapp_link"  />
									</div>
									
									<div class="col-sm-6" style="display:none">
										<label><i class="fa fa-linkedin-square mrg-r-5" aria-hidden="true"></i>Linked In</label>
										  <input type="text" maxlength="255" class="form-control" placeholder="Company Linkedin Link"  id="company_linkedin" name="company_linkedin"  />
									</div>
									<div class="col-sm-4" >
										  <label>Company Logo :</label>
                                        <input type="file" class="form-control"  accept="image/*" id="company_logo" name="company_logo"  />
                                        
									</div>

									<div class="col-sm-4">
										 <label>Company Banner :</label>
                                        <input type="file" class="form-control"  accept="image/*" id="company_banner" name="company_banner"  />
                                    </div>
								

									<div class="col-sm-4">
										 <label>Company Card Background :</label>
                                        <input type="file" class="form-control"  accept="image/*" id="company_card_background" name="company_card_background"  />
									</div>

									<div class="col-sm-12" style="display:none">
										<label>Tagline </label>
										<textarea class="h-100 form-control" placeholder="Company Tagline"  id="company_tagline" name="company_tagline"></textarea>
									</div>
									<div class="col-sm-12" style="display:none">
										<label>Description</label>
										<textarea class="h-100 form-control"  name="company_about" id="company_about" placeholder="Company About"></textarea>
									</div>
									
								</div>
							
						</div>
						
						<div class="text-center">
							 
							<p id="myBtn" class="btn theme-btn" >Create Profile</p>
							<div id="mymodalhm" class="modalhm">

							<!-- modalhm content -->
							<div class="modalhm-content">
								<!-- <span class="close">&times;</span> -->
								<div class="row mrg-r-10 mrg-l-10">
								<br><br>
								<h4>Enter OTP </h4>
								Sent to your <span id="contact"></span>
								<input type="text" name="otp" class="form-control"  placeholder="XXXXXX">
								<input type="hidden" name="original_otp" id="original_otp" class="form-control"  value="">
								<p class="btn theme-btn" id="otpresend" >Resend OTP </p>
								<input type="submit"  class="btn theme-btn"  name="company_submit" value="Create Profile" />
								</div>
							</div>

							</div>
						</div>
					</div>
					</form>
				</div>
			</section>
			

<!-- The modalhm -->
				
			
			<?php include('footer.php'); ?>
			<?php include('footer-link.php'); ?>
	
			
<script>
// Get the modalhm
var modalhm = document.getElementById("mymodalhm");
 
$('#myBtn').click(function () {
  
  var contact = $('#company_contact').val();
  if(contact == '')
  {
	 alert('Please enter contact no.');

  }else{
	modalhm.style.display = "block";
	$('#contact').text(contact);
	$.ajax({
        type:"GET",
        dataType: 'json',
        url:"sendsms.php", 
        data:{contact:contact}, 
        success:function(data) {
        //  console.log(data); 
		 $('#original_otp').val(data);
        }
    });
  }
 

});
$('#otpresend').click(function () {
  
  var contact = $('#company_contact').val();
  if(contact == '')
  {
	 alert('Please enter contact no.');

  }else{
	 
	$('#contact').text(contact);
	$.ajax({
        type:"GET",
        dataType: 'json',
        url:"sendsms.php", 
        data:{contact:contact}, 
        success:function(data) {
        //  console.log(data); 
		 $('#original_otp').val(data);
        }
    });
  }
 

});
 
</script>
<script>
  $(function () {
	CKEDITOR.replace( 'company_about', {
		} );
  })
 
$('#web_company_name').keyup(function () {
	var nm = $('#web_company_name').val();
	// console.log(nm);
    $.ajax({
        type:"GET",
        url:"getvalue.php", 
        data:{nm:nm}, 
        success:function(data) {
        	$('#web_company_name_msg').html(data);
			
        }
    });
});

</script>
<script>
    $(document).ready(function () {
    $('#cate_id').change(function(){
  	var cate_id = $('#cate_id').val();
	console.log(cate_id);
	if(cate_id != '')
	{

	$.ajax({
		url: "select_sub_category.php",
		method:"POST",
		data:{cate_id:cate_id},
		success:function(data)
		{

		$('#company_subcategory').html(data);
		}
	});
	}
	else
	{
	$('#company_subcategory').html('<option value="">Select subcategory</option>');
	}
	});
 
	});
</script>
		</div>
	</body>
</html>