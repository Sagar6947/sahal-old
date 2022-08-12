<?php  
include ("db_connect.php");
$msg='';
 if (isset($_POST["employee_submit"]))
{
  
    $phone = strip_tags($_POST['phone']);
	$password = strip_tags($_POST['password']);
	$emp =  "SELECT * FROM `employee` WHERE `emp_no` = '".$phone."' ";
	$login = mysqli_query($conn,$emp);
	if(mysqli_num_rows($login)>0)
	{$row = mysqli_fetch_array($login);
		
	    if ($row['employee_pass'] == $password) 
    	{
    	
    	$_SESSION['ekaumbharat'] = 'Active';
    	$_SESSION['ekaumbharat_Employee']  = $row['emp_id'];
    	echo'<script>window.location="employee-details.php"</script>';
    	} 
    	else 
    	{
    			$msg ="<h4 style='color:red;'>Incorrect Username  or Password ! ! ! </h4>";
    	}	
	}
	else
	{
	    $msg =  "<h4 style='color:red;'>no user with register name ! ! ! </h4>";
	   
	}
																 
}
 

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee | SaharDirectory </title>
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
							<p style="text-align: center;">LogIn Your <span class="theme-cl">Employee Account</span></p>
							<p style="color:red;"><?= $msg; ?></p>

							<form method="POST" action="">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope theme-cl"></i></span>
									<input type="text" class="form-control" 
									id="company_contact" placeholder="Phone Number" name="phone" maxlength="10">
								</div>
									<span id="mainphone"></span>
									
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock theme-cl"></i></span>
									<input type="password" class="form-control" placeholder="Password" name="password">
								</div>
								<div class="text-center">
									<br>
									<button type="submit" name="employee_submit" class="btn theme-btn width-200 btn-radius">SignIn</button>
								</div>
								
									
								<div class="row">
								   <div class="col-sm-12">
								    	<div class="connect-with" style="margin:0px; ">
								     <ul style="">
									<li class="gp-ic"><a href="employee-forgot-password.php" style="width:180px;">Forgot Password</a></li>
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
		
	</body>

</html>

		<script type="text/javascript">
 
  
   $(document).ready(function() {
       
         var err = [];
        
          $('#company_contact').keyup(function() {
              
            var contact = $('#company_contact').val();
            
                if (!$('#company_contact').val()) {
                    err.push('true');
                    $('#mainphone').text('Employee Contact is required');
                } else if (IsMobile(contact) == false) {
                    err.push('true');
                    $('#mainphone').text('Employee Contact is Invalid. Should contain 10 digit contact no.');
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