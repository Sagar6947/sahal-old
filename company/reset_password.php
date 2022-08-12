<?php
include("db_connect.php");

if (isset($_POST['reset_pass'])) {

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $newpassword = $_POST['newpassword'];
        $connfirmnewpassword = $_POST['confirmnewpassword'];
        $r = strcmp($newpassword, $connfirmnewpassword);
        if($r == 0) {
            $where = mysqli_query($conn, "SELECT * FROM `company` WHERE token = '$token' ");
            $fetc = mysqli_fetch_array($where);
            $update = mysqli_query($conn, "UPDATE `company` SET `company_password`='$newpassword'  WHERE `token` = '$token' ");
            if ($update) {
                $base_url = "https://SaharDirectory.com/"; //change this baseurl value as per your file path
                $mail_body = "
                <p>Hi " . $fetc['company_name'] . ",</p>
                
                <p>Your Password is changed. Your New Password is '.$newpassword.'</p>
                <p>Best Regards,<br />JobPartner</p>
                ";

                // echo 'hj';
                require 'php/class/class.phpmailer.php';
                $mail = new PHPMailer;
                $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
                $mail->Host = 'mail.SaharDirectory.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
                $mail->Port = '587';                                //Sets the default SMTP server port
                $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
                $mail->Username = 'passwordreset@SaharDirectory.com';                    //Sets SMTP username
                $mail->Password = 'ZHE20E@G)%.w';                    //Sets SMTP password
                $mail->SMTPSecure = '';                            //Sets connection prefix. Options are "", "ssl" or "tls"
                $mail->From = 'passwordreset@SaharDirectory.com';             //Sets the From email address for the message
                $mail->FromName = 'SaharDirectory';                    //Sets the From name of the message
                $mail->AddAddress($fetc['company_email']);        //Adds a "To" address			
                $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
                $mail->IsHTML(true);                            //Sets message type to HTML				
                $mail->Subject = 'Reset Password';            //Sets the Subject of the message
                $mail->Body = $mail_body;                 //Sets the From name of the message 
                if ($mail->Send())                                //Send an Email. Return true on success or false on error
                {
                    echo '<script>alert("your password is updated!");
                    window.location.href="https://SaharDirectory.com/company/company-login.php";</script>';
                } else {

                    echo '<script>alert("your password is updated!");
                    window.location.href="https://SaharDirectory.com/company/company-login.php";</script>';
                }
            } else {
                echo '<script>alert("You have wrong or expired key. Try again Later");</script>';
                
            }
        } else {
            echo '<script>alert("Your New  And confirm password are not same!");</script>';
            
        }
    }else{
        echo '<script>alert("You have wrong or expired key. Try again Later");</script>';
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
                        <p style="text-align: center;"> <span class="theme-cl">Create new Password</span></p>
                        <p style="color:red;"><?= $msg; ?></p>

                        <form method="POST" action="">

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" placeholder="*******" name="newpassword">
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="******" name="confirmnewpassword">
                            </div>


                            <div class="center">
                                <input type="submit" value="Update Password" class="btn btn-midium theme-btn btn-radius width-200" name="reset_pass" />
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