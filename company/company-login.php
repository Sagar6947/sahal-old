<?php  
include ("db_connect.php");
$msg='';
 

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login | SaharDirectory </title>
    <?php include('header-link.php'); ?>
    
  
    
	</head>
	<body>
		<div class="wrapper">  
				<?php include('header.php'); ?>
			<div class="clearfix"></div>
			
			<!-- Start Login Section -->
			<section class="log-wrapper">
				<div class="container">
					<div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1">
						<div class="log-box">
							<h2>Welcome <span class="theme-cl">Back!</span></h2>
							<p style="text-align: center;">Login Your <span class="theme-cl">Company Account</span></p>
							<p style="color:red;"><?= $msg; ?></p>

							<form method="POST" action="login.php">
							
								<div class="form-group">
									<label>Contact No.</label>
									<input type="text" class="form-control" id="company_contact" placeholder="Ex: 9876543210" name="email" maxlength="10">
									<span id="mainphone"></span>
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" placeholder="Ex: *******" name="password" >
								</div>
								
								
								
								<div class="center">
									<input  type="submit"  value="Login"  class="btn btn-midium theme-btn btn-radius width-200" 
									name="vbsubmit" /><br><br>
								</div>
								
								<div class="row">
								   <div class="col-sm-12">
								    	<div class="connect-with" style="margin:0px; ">
								     <ul style="">
									<li class="gp-ic"><a href="forgot_password.php" style="width:180px;">Forgot Password</a></li>
											<li class="tw-ic" style="padding-top: 15px"><a href="add-company.php" style="width:180px;">Create an account</a></li>
								   </ul>
								     </div>
							       </div>
								 </div>
								
								
						
							
						
							
								
							</form>
						</div>
					</div>
				</div>
			</section>
			</div>
			<?php include('footer.php'); ?>
			<?php include('footer-link.php'); ?>
		<script type="text/javascript">
 
  
   $(document).ready(function() {
       
         var err = [];
        
          $('#company_contact').keyup(function() {
              
            var contact = $('#company_contact').val();
            
                if (!$('#company_contact').val()) {
                    err.push('true');
                    $('#mainphone').text('Company Contact is required');
                } else if (IsMobile(contact) == false) {
                    err.push('true');
                    $('#mainphone').text('Company Contact is Invalid. Should contain 10 digit contact no.');
                    // $('#cmp_main').text(contact);

                }else{
                    err = [];
                     $('#mainphone').text('');
                    
                }
          });
   });
  
  function IsMobile(contact) {
                
                    contact = contact.replace(/\D/g,'');
                    $('#company_contact').val(contact);
                
                var regex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
                if (!regex.test(contact)) {
                    return false;
                } else {
                    return true;
                }
            }

</script>
		
	</body>

</html>