<?php
include("db_connect.php");
if(isset($_POST['password_submit'])){
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];
    if($new_pass == $confirm_pass){
        $query = mysqli_query($conn,"UPDATE `company` SET  `company_password`= '".$new_pass."' WHERE  `company_id`= '".$company."'");
         echo "<script>alert('Password Updated successfully')</script>";
    }else{
        echo "<script>alert('Password doesnt match')</script>";
    }
    
    
    
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <title>Change Password | SaharDirectory </title>
    <?php include('header-link.php'); ?>



</head>

<body class="home-2">
    <div class="wrapper">
        <?php include('header.php'); ?>
        <div class="clearfix"></div>
        <section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
            <div class="container">
                <div class="title-content">
                    <h1>Change Password</h1>
                    <div class="breadcrumbs">
                        <a href="company-details.php">Home</a>
                        <span class="gt3_breadcrumb_divider"></span>
                        <span class="current">Change Password</span>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>

        <section>
            <div class="container">
                <div class="col-md-10 col-sm-12 col-md-offset-1 mob-padd-0">
                    <!-- General Information -->
                    <div class="add-listing-box general-info mrg-bot-25 padd-bot-30 padd-top-25">

                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="row mrg-r-10 mrg-l-10">
                                <div class="col-sm-12">
                                    <label>New Password:</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="New Password" id="new_pass" name="new_pass" required />
                                    
                                </div>
                                <div class="col-sm-12">
                                    <label>Confirm Password :</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Confirm Password" id="confirm_pass" name="confirm_pass" required />
                                </div>
  
                        </div>
                    </div>


                    <div class="text-center">
                        <input type="submit" class="btn theme-btn" name="password_submit" value="Change Password" />
                    </div>
                </div>
                </form>
            </div>
        </section>

        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>

        
    </div>
</body>

</html>