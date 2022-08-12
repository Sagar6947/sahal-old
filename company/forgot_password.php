<?php  
include ("db_connect.php");
$msg='';
 
 

if(isset($_POST["recover_email"]))
{
    $email  =  strip_tags($_POST['email']);
    
    $token = bin2hex(random_bytes(15));
    
      $update_query = "UPDATE `company` SET `token`= '$token' WHERE `company_email` = '" . $email . "'";
    $statement = mysqli_query($conn,$update_query);
    
    $result = mysqli_query($conn, "SELECT * FROM `company` WHERE `company_contact` = '" . $email . "'");
    $row = mysqli_fetch_array($result);
    
    $emailcount =mysqli_num_rows($result);
    
    if($emailcount)
    {
        $user = "Munesh012";
        $password = "Munesh012";
        $senderid = "EKAUMB";
        $smsurl = "http://smpp.webtechsolution.co/http-api.php?";
        
        function httpRequest($url){
            $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
            preg_match($pattern,$url,$args);
            $in = "";
            $fp = fsockopen($args[1],80, $errno, $errstr, 30);
            if (!$fp) {
            return("$errstr ($errno)");
            } else {
                $args[3] = "C".$args[3];
                $out = "GET /$args[3] HTTP/1.1\r\n";
                $out .= "Host: $args[1]:$args[2]\r\n";
                $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
                $out .= "Accept: */*\r\n";
                $out .= "Connection: Close\r\n\r\n";
        
                fwrite($fp, $out);
                while (!feof($fp)) {
                $in.=fgets($fp, 128);
                }
            }
            fclose($fp);
            return($in);
        }
        
        function SMSSend($phone, $msg, $debug=false){
            global $user,$password,$senderid,$smsurl;
        
            $url = 'username='.$user;
            $url.= '&password='.$password;
            $url.= '&senderid='.$senderid;
            $url.= '&route='.'1';
            
            $url.= '&number='.urlencode($phone);
            $url.= '&message='.urlencode($msg);
            $url.= '&priority=1';
            $url.= '&dnd=1';
            $url.= '&unicode=0';
        
            $urltouse =  $smsurl.$url;
            
          
            if ($debug) { $rc1 = "Request: <br>$urltouse<br><br>"; }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urltouse);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //Open the URL to send the message
            //$response = httpRequest($urltouse);
            $response = curl_exec($ch);
            curl_close($ch);
            if ($debug) {
                $rc = "Response: <br><pre>".
                str_replace(array("<",">"),array("&lt;","&gt;"),$response).
                "</pre><br>"; }
        // echo $response;
            return($response);
        }
         
        $phonenum = $email;
        $message ='Hi '.$row['company_name'].', 
Your V-card link is http://SaharDirectory.com/'.$row['company_web_title'].'. 
Your Login Id- '.$row['company_contact'].' and Password- '.$row['company_password'].'.
 Thanks. 
 SaharDirectory.com
(Ekaum Enterprises)' ;



        $debug = true;      
        SMSSend($phonenum,$message,$debug);
        $arr = array("$otp",$phonenum);
        // echo $otp;
        //   $base_url = "https://SaharDirectory.com/";  //change this baseurl value as per your file path
        //     $mail_body = "
        //     <p>Hi ".$row['company_name']." ,</p>
            
        //     <p>Click here to Reset Your Password https://SaharDirectory.com/company/reset_password.php?token=".$token."  </p>
        //     <p>Best Regards,<br />SaharDirectory</p>
        //     ";
     
        //     require 'php/class/class.phpmailer.php';
        //     $mail = new PHPMailer;
        //     $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        //     $mail->Host = 'mail.SaharDirectory.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        //     $mail->Port = '587';								//Sets the default SMTP server port
        //     $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
        //     $mail->Username = 'passwordreset@SaharDirectory.com';					//Sets SMTP username
        //     $mail->Password = 'ZHE20E@G)%.w';					//Sets SMTP password
        //     $mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
        //     $mail->From = 'passwordreset@SaharDirectory.com';	         //Sets the From email address for the message
        //     $mail->FromName = 'SaharDirectory';					//Sets the From name of the message
        //     $mail->AddAddress($email);		//Adds a "To" address			
        //     $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        //     $mail->IsHTML(true);							//Sets message type to HTML				
        //     $mail->Subject = 'Reset Password';			//Sets the Subject of the message
        //     $mail->Body = $mail_body;							//An HTML or plain text message body
        //     if($mail->Send())								//Send an Email. Return true on success or false on error
        //     {
        //         echo'<script>alert("Check your Mail  to activate Your account")</script>';
        //     }else{
        //         print_r($mail);
        //          echo'<script>alert("Check your Mail  to activate Your account.Check Your Spam mail also")</script>';
        //     }
            echo '<script>alert("We have send your Crendentials to your registered mobile no. ")</script>';
         echo'<script>window.location="https://SaharDirectory.com/company/company-login.php"</script>';
    }
    
    else
  {
     echo'<script>alert("Email does not exists")</script>';
      
  }
}

 
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password | SaharDirectory </title>
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
							<p style="text-align: center;">  <span class="theme-cl">Forget Password</span></p>
							<p style="color:red;"><?= $msg; ?></p>

							<form method="POST" action="">
							
								<div class="form-group">
									<label>Contact No.</label>
									<input type="text" class="form-control" placeholder="Ex. 9876543210" name="email">
								</div>
								 
								 
								<div class="center">
									<input  type="submit"  value="Get Password"  class="btn btn-midium theme-btn btn-radius width-200" 
									name="recover_email" />
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