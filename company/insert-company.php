<?php
include("db_connect.php");
$user = "homo01";
$password = "Homo@19";
$senderid = "EKAUMS";
$smsurl = "http://smpp.webtechsolution.co/http-api.php?";

// $user = "ekaumotp794454";
// $password = "6337";
// $senderid = "EKAUMB";
// $smsurl = "https://kit19.com/ComposeSMS.aspx?";
// $insert = '';

function httpRequest($url)
{
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern, $url, $args);
    $in = "";
    $fp = fsockopen($args[1], 80, $errno, $errstr, 30);
    if (!$fp) {
        return ("$errstr ($errno)");
    } else {
        $args[3] = "C" . $args[3];
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
            $in .= fgets($fp, 128);
        }
    }
    fclose($fp);
    return ($in);
}

function SMSSend($phone, $msg, $template, $debug = false)
{
    global $user, $password, $senderid, $smsurl;

    $url = 'http://smpp.webtechsolution.co/http-tokenkeyapi.php?authentic-key=3537686f6d6f30313137331655981948&senderid=EKAUMS&route=1&number=
    ' . urlencode($phone) . '&message=' . urlencode($msg) . '&templateid=' . $template;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Open the URL to send the message
    // 	$response = httpRequest($urltouse);
    // echo $url;
    $response = curl_exec($ch);
    curl_close($ch);
    if ($debug) {
        $rc = "Response: <br><pre>" .
            str_replace(array("<", ">"), array("&lt;", "&gt;"), $response) .
            "</pre><br>";
    }

    return ($response);
}


if (isset($_POST['company_submit'])) {


    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $company_type = mysqli_real_escape_string($conn, $_POST['company_type']);
    $web_company_name = preg_replace('/\s+/', '-', trim(preg_replace('/[^a-zA-Z0-9- ]/s', ' ', (strtolower($_POST['web_company_name'])))));
    // echo $web_company_name;
    // exit;
    $company_tagline = mysqli_real_escape_string($conn, $_POST['company_tagline']);

    $company_state = mysqli_real_escape_string($conn, $_POST['company_state']);

    $company_city = mysqli_real_escape_string($conn, $_POST['company_city']);



    $company_category = mysqli_real_escape_string($conn, $_POST['company_category']);
    $company_subcategory = mysqli_real_escape_string($conn, $_POST['company_subcategory']);

    $company_address = mysqli_real_escape_string($conn, $_POST['company_address']);
    // $company_address_url = mysqli_real_escape_string($conn, $_POST['company_address_url']);
    $company_email = mysqli_real_escape_string($conn, $_POST['company_email']);
    $company_contact = mysqli_real_escape_string($conn, $_POST['company_contact']);
    $company_whatsapp = mysqli_real_escape_string($conn, $_POST['company_whatsapp']);
    // $company_website = mysqli_real_escape_string($conn, $_POST['company_website']);
    // 	$company_facebook = mysqli_real_escape_string($conn, $_POST['company_facebook']);
    // 	$company_twitter = mysqli_real_escape_string($conn, $_POST['company_twitter']);
    // 	$company_instagram = mysqli_real_escape_string($conn, $_POST['company_instagram']);
    // 	$company_telegram = mysqli_real_escape_string($conn, $_POST['company_telegram']);
    $company_person = mysqli_real_escape_string($conn, $_POST['company_person']);
    $company_designation = mysqli_real_escape_string($conn, $_POST['company_designation']);

    $company_linkedin = mysqli_real_escape_string($conn, $_POST['company_linkedin']);
    // $company_about = mysqli_real_escape_string($conn, $_POST['company_about']);

    $company_password = "SD" . rand(50000, 1000);
    $file = $_FILES['company_logo']['name'];
    $tmpfile = $_FILES['company_logo']['tmp_name'];
    $folder = date("dmyhis") . $file;
    move_uploaded_file($tmpfile, 'images/' . $folder);


    $file2 = $_FILES['company_banner']['name'];
    $tmpfile = $_FILES['company_banner']['tmp_name'];
    $folder2 = date("dmyhis") . $file2;
    move_uploaded_file($tmpfile, 'images/' . $folder2);

    // $url = 'https://sahardirectory.com/sahar/'  . clean($company_city)  .'/'. clean($company_category) .'/' . $web_company_name;
}


$msg = '';
if (isset($_POST['company_otp_submit'])) {

    // print_r($_POST);

    $otp = $_POST['otp'];
    $original_otp = $_POST['original_otp'];
    // $insert = $_POST['insertquery'];
    $web_company_name = $_POST['web_company_name'];


    $company_contact =   $_POST['company_contact'];
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $company_type = mysqli_real_escape_string($conn, $_POST['company_type']);
    // echo $web_company_name;
    // exit;
    $company_tagline = mysqli_real_escape_string($conn, $_POST['company_tagline']);
    $company_category = mysqli_real_escape_string($conn, $_POST['company_category']);
    $company_subcategory = mysqli_real_escape_string($conn, $_POST['company_subcategory']);



    $company_address = mysqli_real_escape_string($conn, $_POST['company_address']);
    $company_address_url = ''; // mysqli_real_escape_string($conn, $_POST['company_address_url'])
    $company_email = mysqli_real_escape_string($conn, $_POST['company_email']);
    $company_whatsapp = mysqli_real_escape_string($conn, $_POST['company_whatsapp']);
    $company_website = ''; // mysqli_real_escape_string($conn, $_POST['company_website'])
    $company_facebook = mysqli_real_escape_string($conn, $_POST['company_facebook']);
    $company_twitter = mysqli_real_escape_string($conn, $_POST['company_twitter']);
    $company_instagram = mysqli_real_escape_string($conn, $_POST['company_instagram']);
    $company_telegram = mysqli_real_escape_string($conn, $_POST['company_telegram']);
    $company_person = mysqli_real_escape_string($conn, $_POST['company_person']);
    $company_designation = mysqli_real_escape_string($conn, $_POST['company_designation']);

    $company_linkedin = mysqli_real_escape_string($conn, $_POST['company_linkedin']);
    $company_about = mysqli_real_escape_string($conn, $_POST['company_about']);
    $company_about = ''; //mysqli_real_escape_string($conn, $_POST['company_about'])
    $company_password =  $_POST['company_password'];


    $folder = $_POST['company_logo'];
    $folder2 = $_POST['company_banner'];

    $company_state = mysqli_real_escape_string($conn, $_POST['company_state']);

    $company_city = mysqli_real_escape_string($conn, $_POST['company_city']);


    $select_category = $conn->query("SELECT * FROM `company_category` WHERE `cate_id`= '" . $company_category . "' ");
    $category = $select_category->fetch_array();



    $url = 'https://sahardirectory.com/sahar/'  . clean(strtolower(trim($company_city)))  . '/' . clean(strtolower(trim($category["category"]))) . '/' . $web_company_name;

    $url2 = 'sahar/'  . clean(strtolower(trim($company_city)))  . '/' . clean(strtolower(trim($category["category"]))) . '/' . $web_company_name;

    $insert = "INSERT INTO `company` ( `company_type`, `company_name`, `company_person`,`company_designation`, `company_about`, `company_web_title`, `company_category`, `company_subcategory`,  `company_tagline`, `company_address`, `company_address_url`, `company_email`, `company_website_url`, `company_contact`, `company_whatsapp`, `company_logo`, `company_banner`,  `company_facebook`, `company_twitter`, `company_instagram`,`company_telegram`,  `company_linkedin`,`company_password`, `company_city`, `company_state`)
		VALUES ( '$company_type',  '$company_name',  '$company_person','$company_designation', '$company_about', '$web_company_name','$company_category','$company_subcategory', '$company_tagline', '$company_address','$company_address_url', '$company_email', '$company_website', '$company_contact', '$company_whatsapp', '$folder', '$folder2', '$company_facebook', '$company_twitter', '$company_instagram', '$company_telegram', '$company_linkedin','$company_password' , '$company_city','$company_state')";
    // 	echo $insert;


    if ($original_otp == $otp) {

        if ($conn->query($insert)) {

            $debug = true;


            $message = 'Hi ' . (($company_type == 1) ? $company_person : $company_name) . ', Your Login Id- ' . $company_contact . 'and Password-  ' . $company_password . '.
Thanks
Team Sahar Directory (
Ekaum)
';



            $msg = 'Hi ' . (($company_type == 1) ? $company_person : $company_name) . ', Your V-card link is sahardirectory.com/' . $url2 . '.
Thanks
Team Sahar Directory
(Ekaum)
';



            $rf = SMSSend($company_contact, $message, '1707165665533059542', $debug);
            echo '<br><br>';
            $um = SMSSend($company_contact,  $msg,  '1707165665521396509', $debug);

            $base_url = "https://sahardirectory.com/";  //change this baseurl value as per your file path


            $mail_body = '';

            $ToEmail = $company_email;

            $EmailSubject = 'Sahar Directory User Login Details';

            $mailheader = "From:  info@sahardirectory.com\r\n";
            $mailheader .= "Reply-To:  info@sahardirectory.com\r\n";
            $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";



            $mail_body = 'नमस्ते ' . $company_name . '!
  हम आपका हमारी Sahar Directory परिवार में दिल से स्वागत करते है ! Sahar Directory एक free plateform है जो आपको अपनी डिजिटल पहचान बनाने में मदद करता है। और हम जानते हैं कि आज की दुनिया में हमारे लिए डिजिटल रूप से मजबूत होना कितना महत्वपूर्ण है। और हम आपको पूरी तरह से मुफ्त में डिजिटल रूप से मजबूत बनने में मदद करते हैं। यहां आप अपनी वेबसाइट और डिजिटल विजिटिंग कार्ड बिल्कुल मुफ्त प्राप्त कर सकते हैं। तो तैयार हो जाइए खुद को एक डिजिटल पहचान देने और अपने लक्ष्यों तक पहुंचने के लिए। आप अपने बिज़नेस को फ्री में लिस्ट कीजिये हमारे साथ और बनाइये अपनी एक डिजिटल पहचान ताकि जयादा से जयादा लोगो तक आपकी पहुंच हो सके और आपका बिज़नेस तरक्की करे !

  निचे आपके अकाउंट की जानकारी शेयर की जा रही है :

  Login Url : https://sahardirectory.com/company/company-login.पहप
  Contact No. -' . $company_email . '
  Password - ' . $company_password . '

  अगर आप डेमो देखना चाहते है की हम आपको क्या दे रहे है तो आप निचे दिए लिंक पर क्लिक कीजिये :
  http://sahardirectory.com/sahar/rewari/information-tech/sahardirectory

  हम आपको निचे दिए गए लिंक में वीडियो के माध्यम से भी बताना चाहेंगे की आप कैसे अपने अकाउंट को setup कर सकते है !
  ........(ये लिंक म आपको बाद में दे दूंगा mam )..........

  अगर आप को अभी भी कोई भी समस्या आ रही है अपने अकाउंट से सम्बंधित तो आप हमें हमारे निचे दिए गए Social Media के links के माध्यम से सम्पर्क कर सकते है
  Facebook : https://www.facebook.com/sahardirectory
  Instagram : https://www.instagram.com/sahardirectory
  Linkedin : https://www.linkedin.com/SaharDirectory
  Email : hello sahardirectorycom
  Support No.: +91 7419272427

  Thanks
  Team Sahar Directory ';

            $send =  mail($ToEmail,  $EmailSubject, $mail_body, $mailheader) or die("Failure");
            if ($send) {
                echo '<script>alert("Check your mail to verify it")</script>';
            } else {
                echo '<script>alert("Check your mail to verify it,Also check in spam folder")</script>';
            }
            echo '<script>alert("Your Company Registered Successfully. Your Website URL is - ' . $url . '  please check your mail to get your username and password")</script>';
        } else {
            echo '<script>alert("Server error..")</script>';
        }

        echo '<script>window.location="' . $url . '"</script>';
    } else {
        $msg = 'Not Registered. You entered wrong OTP. Please Retry';
        echo '<script>alert("' . $msg . '")</script>';
        // echo '<script>window.location="add-company.php"</script>';
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Add Business | Review-kiya </title>

    <?php include('header-link.php'); ?>
</head>

<body class="home-2">
    <div class="wrapper">
        <?php include('header.php'); ?>
        <div class="clearfix"></div>
        <section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
            <div class="container">
                <div class="title-content">
                    <h1>One step far from creating your vcard </h1>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <section>
            <div class="container">
                <div class="col-md-3 col-sm-12 ">
                </div>
                <div class="col-md-6 col-sm-12  ">
                    <!-- General Information -->
                    <div class="add-listing-box general-info mrg-bot-25 padd-bot-30 padd-top-25">
                        <div class="listing-box-header">

                            <h3><i class="ti-files theme-cl" style="font-size:1em;"></i>Verify OTP send to your Number</h3>
                            <p style="color:red"><?php echo $msg; ?></p>
                        </div>
                        <form method="post" id="myform" action="" enctype="multipart/form-data">
                            <div class="row mrg-r-10 mrg-l-10">
                                <div class="col-sm-12">
                                    <label>Phone No.</label>
                                    <input type="text" class="numbers form-control company_contact" placeholder="Company Contact" id="company_contact" value="<?= $company_contact ?>" name="company_contact" />

                                    <span id="mainphone" style="color:red"></span>
                                </div>
                                <div class="col-sm-12">
                                    <div id="some_div">
                                    </div>
                                    <p id="otpresends" style="cursor:pointer" class="btn"> Resend OTP </p>
                                    <p id="otpresend" style="cursor:pointer" class="btn btn-success" style="display:none;"> Resend OTP </p>
                                </div>
                                <div class="col-sm-12">
                                    <label>OTP :</label>
                                    <input type="text" name="otp" class="form-control" placeholder="XXXXXX">

                                </div>

                                <div class="col-sm-6">
                                    <br>
                                    <input type="submit" class="btn theme-btn" name="company_otp_submit" value="Submit" />
                                </div>


                                <input type="hidden" name="original_otp" id="original_otp" class="form-control" value="">
                                <!-- <input type="hidden" name="insertquery" id="" class="form-control" value="<?= $insert ?>"> -->
                                <input type="hidden" name="web_company_name" id="" class="form-control" value="<?= $web_company_name ?>">
                                <input type="hidden" name="company_name" value="<?= $company_name ?>" />
                                <input type="hidden" name="company_type" value="<?= $company_type ?>" />

                                <input type="hidden" name="company_tagline" value="<?= $company_tagline ?>" />

                                <input type="hidden" name="company_state" value="<?= $company_state ?>" />

                                <input type="hidden" name="company_city" value="<?= $company_city ?>" />



                                <input type="hidden" name="company_category" value="<?= $company_category ?>" />
                                <input type="hidden" name="company_subcategory" value="<?= $company_subcategory ?>" />
                                <input type="hidden" name="company_address" value="<?= $company_address ?>" />
                                <!-- <input type="hidden" name="company_address_url" value="<?= $company_address_url ?>" />  -->
                                <input type="hidden" name="company_whatsapp" value="<?= $company_whatsapp ?>" />
                                <!-- <input type="hidden" name="company_website" value="<?= $company_website ?>" />  -->
                                <input type="hidden" name="company_facebook" value="<?= $company_facebook ?>" />
                                <input type="hidden" name="company_twitter" value="<?= $company_twitter ?>" />
                                <input type="hidden" name="company_instagram" value="<?= $company_instagram ?>" />
                                <input type="hidden" name="company_telegram" value="<?= $company_telegram ?>" />
                                <input type="hidden" name="company_person" value="<?= $company_person ?>" />
                                <input type="hidden" name="company_designation" value="<?= $company_designation ?>" />
                                <!-- <input type="hidden" name="company_about" value="<?= $company_about ?>" />  -->
                                <input type="hidden" name="company_linkedin" value="<?= $company_linkedin ?>" />
                                <input type="hidden" name="company_logo" value="<?= $folder ?>" />
                                <input type="hidden" name="company_banner" value="<?= $folder2 ?>" />
                                <input type="hidden" name="company_password" value="<?= $company_password ?>" />
                                <input type="hidden" name="company_email" value="<?= $company_email ?>" />
                                <!-- company_password -->

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 ">

                </div>
            </div>
        </section>
        <!-- The modalhm -->
        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var err = [];
            var contact = $('.company_contact').val();
            //   console.log(alldata+' yu');
            $("#otpresends").show();
            $("#otpresend").hide();
            $('#contact').text(contact);
            $.ajax({
                type: "POST",
                url: "sendsms.php",
                data: {
                    contact: contact
                },
                success: function(data) {
                    console.log(data);
                    $('#original_otp').val(data);
                    setTimeout(function() {
                        $("#otpresends").hide();
                        $("#otpresend").show();
                    }, 40000);
                }
            });
            var timeLeft = 40;
            var elem = document.getElementById('some_div');

            var timerId = setInterval(countdown, 1000);

            function countdown() {
                if (timeLeft == -1) {
                    clearTimeout(timerId);
                    // doSomething();
                } else {
                    elem.innerHTML = timeLeft + ' seconds remaining';
                    timeLeft--;
                }
            }
            $('.company_contact').keyup(function() {
                err = [];
                var contact = $('.company_contact').val();
                $.ajax({
                    url: "search_contact.php",
                    method: "POST",
                    data: {
                        contact: contact
                    },
                    success: function(data) {

                        if (data == '') {
                            $('#mainphone').text(' ');
                        } else {
                            err.push('true');
                            $('#mainphone').text(data);
                            $("#otpresends").show();
                            $("#otpresend").hide();
                            clearInterval(downloadTimer);
                            clearTimeout(timerId);

                        }

                    }
                });
            });
            $('#otpresend').click(function() {

                var contact = $('.company_contact').val();
                $("#otpresends").show();
                $("#otpresend").hide();
                $('#contact').text(contact);

                var co = jQuery.inArray('true', err);
                // console.log(err);

                if (contact == '' || co >= 0) {
                    alert('Please enter valid contact no.');

                } else {
                    console.log(contact);

                    var timeleft = 40;
                    $.ajax({
                        type: "POST",

                        url: "sendsms.php",
                        data: {
                            contact: contact
                        },
                        success: function(data) {
                            console.log(data);



                            $('#original_otp').val(data);
                            setTimeout(function() {
                                $("#otpresends").hide();
                                $("#otpresend").show();
                            }, 40000);



                        }
                    });



                }
                var timeleft = 40;
                $('#some_div').text('');
                var downloadTimer = setInterval(function() {
                    if (timeleft <= 0) {
                        clearInterval(downloadTimer);
                        $("#otpresends").hide();
                        $("#otpresend").show();
                    }

                    // var d =10 - timeleft;
                    $('#some_div').text(timeleft + ' seconds remaining');
                    timeleft -= 1;
                }, 1000);


            });
        </script>
    </div>
</body>

</html>