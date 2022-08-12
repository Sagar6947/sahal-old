<?php

include('database_connection.php');

$message = '';

if(isset($_GET['activation_code']))
{
	$query = "
		SELECT * FROM register_student 
		WHERE user_activation_code = :user_activation_code
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_activation_code'			=>	$_GET['activation_code']
		)
	);
	$no_of_row = $statement->rowCount();
	
	if($no_of_row > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_email_status'] == 'not verified')
			{
				$update_query = "
				UPDATE register_student 
				SET user_email_status = 'verified' 
				WHERE id = '".$row['id']."'
				";
				$statement = $connect->prepare($update_query);
				$statement->execute();
				$sub_result = $statement->fetchAll();
				if(isset($sub_result))
				{
					$message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="#" data-toggle="modal" data-target="#twoeModal">Login</a></label>';
				}
			}
			else
			{
				$message = '<label class="text-info">Your Email Address Already Verified <br/><a href="#" data-toggle="modal" data-target="#twoeModal">Login</a></label>';
			}
		}
	}
	else
	{
		$message = '<label class="text-danger">Invalid Link</label>';
	}
}

?>

<!doctype html>
<html lang="zxx">
 
<head>

   <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Verification - Your Government Job Partner </title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/slick-slider.css">
    <link rel="stylesheet" href="../css/fancybox.css">
    <link rel="stylesheet" href="../css/smartmenus.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/plugin.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/responsive.css">

</head>

<body>

    <div class="kamkaaj-wrapper">
        <!-- Header -->
        <?php include('header.php'); ?>
        <!-- Header -->

        <!-- Sub Header -->
        <div class="kamkaaj-sub-header">
            <span class="kamkaaj-dark-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>  </h1>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Sub Header -->

        <!-- Content -->
        <div class="kamkaaj-main-content">

           

             

            <!-- Main Section -->
            <div class="kamkaaj-main-section">
                <div class="container">
                    <div class="row">

                        <div class="kamkaaj-column-12">
                            <!--// Contact Form \\-->
                            <div class="kamkaaj-contact-form">
                                 
                                <h1 >JOBPARTNER.in Email Verification</h1>
		
        <h3><?php echo $message; ?></h3>

                            </div>
                            <!--// Contact Form \\-->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

           
        <!-- Footer -->
        <?php include('footer.php'); ?>
        <!-- Footer -->
    </div>

    <!-- jQuery -->
    <script src="../script/jquery.js"></script>
    <script src="../script/popper.min.js"></script>
    <script src="../script/bootstrap.min.js"></script>
    <script src="../script/slick.slider.min.js"></script>
    <script src="../script/fancybox.min.js"></script>
    <script src="../script/isotope.min.js"></script>
    <script src="../script/smartmenus.min.js"></script>
    <script src="../script/progressbar.js"></script>
    <script src="../https://maps.googleapis.com/maps/api/js"></script>
    <script src="../script/mapbox.js"></script>
    <script src="../script/map-callback.js"></script>
    <script src="../script/functions.js"></script>

 
    
</body>


 
</html>