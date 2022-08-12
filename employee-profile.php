<?php
include 'config.php';
if (!empty($_GET['bid'])) {
    $url =  $_GET['bid'];
// echo $url;
    $select_employee = $conn->query("SELECT * FROM `employee` WHERE `employee_web_url` = '" . $url . "' ");
    if (mysqli_num_rows($select_employee) > 0) {
        $select_employee_row = $select_employee->fetch_assoc();

        $select_company = $conn->query("SELECT * FROM `company` WHERE `company_status` = '0' AND `company_id` = '" . $select_employee_row['company_id'] . "' ");
        $select_company_row = $select_company->fetch_assoc();
        if ($select_employee_row['emp_status'] == 1) {
            echo '<script>alert("Your vCard is blocked by company")</script>';
            echo '<script>window.location="https://SaharDirectory.com"</script>';
        } elseif (mysqli_num_rows($select_company) < 0) {
            echo '<script>alert("There is no register company with this name")</script>';
        }

        $query2c = "SELECT * FROM `package_purchased`  WHERE `pur_type` = 'company' AND `company_id` = '" . $select_employee_row['company_id'] . "' AND `status`='0' LIMIT 1";
        $row2c = mysqli_query($conn, $query2c);
        if (mysqli_num_rows($row2c) > 0) {
            $fetch2c = mysqli_fetch_array($row2c);
            $expc = date('Y/m/d', strtotime($fetch2c['exp_date']));
            $todayc = date('Y/m/d');
            if ($expc < $todayc) {
                // echo $exp.' < '.$today;
                $fgc = "UPDATE `package_purchased` SET `status`= '1'   WHERE `id` ='" . $fetch2c['id'] . "'";
                mysqli_query($conn, $fgc);
                // exit;
            } elseif ($fetch2c['payment_status'] == 'TXN_SUCCESS') {
                $subscribec = true;
            } else {
            }
        }
    }else{
        echo '<script>window.location="https://SaharDirectory.com"</script>';
    }
}else{
        echo '<script>window.location="https://SaharDirectory.com"</script>';
    }


?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/plugins/css/plugins.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/responsiveness.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="../assets/css/colors/main.css">
    <link rel="shortcut icon" href="../<?php if (!empty($select_employee_row['image'])) { echo 'company/images/employee/' . $select_employee_row['image']; } else { echo 'company/images/' . $select_company_row['company_logo']; }  ?>" type="image/x-icon">
	   
	   
	     <meta property="og:image" itemprop="image" content="../<?php if (!empty($select_employee_row['image'])) { echo 'company/images/employee/' . $select_employee_row['image']; } else { echo 'company/images/' . $select_company_row['company_logo']; }  ?>"/>
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?= $select_employee_row['emp_name'] ?> (<?= $select_employee_row['emp_designation'] ?>)" />
        <title><?= $select_employee_row['emp_name'] ?> </title>
         <link rel="icon" href="../<?php if (!empty($select_employee_row['image'])) { echo 'company/images/employee/' . $select_employee_row['image']; } else { echo 'company/images/' . $select_company_row['company_logo']; }  ?>" type="image/png" />
	   
	   
	
    
    <link rel="manifest" id="manifest-placeholder">
    <link rel="stylesheet" href="../http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

        div.stars {
            display: inline-block;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked~label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked~label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }

        .center {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }

        .texttrans {
            text-transform: uppercase;
        }

        .menubtn {
            margin: 0px 30px 0px 30px;
            padding: 0px 20px 0px 20px;
            display: table-cell;

            /*height:35px;*/
        }

        @media only screen and (max-width: 600px) {
            .menubtn {
                margin: 0px 10px 0px 10px;
                padding: 0px 10px 0px 10px;
            }
        }




        .whatsapp-button {
            -webkit-appearance: none;
            padding: 10px;
            font-size: 13px;
            background-color: #51B14D;
            opacity: 0.9;
            color: #fff;
            border: none;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2), 0 0 40px rgba(255, 251, 251, 0.1) inset;
            margin-left: 10px;
            display: flex;
            align-items: center;
        }

        .p-20 {
            padding-top: 20px;
        }

        .shadow-buttons {
            display: flex;
            justify-content: center;
            margin: -5px;
        }

        .shadow-button {
            padding: 10px 2px;
            font-size: 15px;
            color: #F1F1F1;
            text-align: center;
            margin: 5px;
            background: rgba(72, 72, 72, 0.55);
            flex: 1;
            border-bottom: 6px solid #37393A;
            display: inline-block;
        }

        .shadow-buttons {
            display: flex;
            justify-content: center;
            margin: -5px;
        }
    </style>
</head>
<?php
$card_card_background = 'company/images/' . $select_company_row['company_logo'];
if (!empty($card_card_background)) {
    $body_style =  'style="background-image: url(' . $select_company_row['company_logo'] . ');background-size:100%;background-attachment:fixed;"';
} else {
    $body_style = '';
}
?>

<body class="home-2" <?= $body_style; ?>>

    <div class="wrapper">
        <div class="clearfix"></div>
        <section class="list-detail">
            <div class="container">
                <div class="col-md-3 col-sm-12">
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="sidebar">
                        <div class="widget-boxed padd-0" style="background:none;border:none;">
                            <!-- Booking listing or Space -->
                            <div class="listing-shot grid-style no-shadow border-0 mrg-0" style="background:none;">
                                <a href="../#">
                                    <div class="listing-shot-img">
                                        <?php
                                        $card_banner = '';
                                        if (!empty($select_company_row['company_banner'])) {
                                            $card_banner = 'company/images/' . $select_company_row['company_banner'];
                                        } else {
                                            if (!empty($select_company_row['company_banner'])) {
                                                $card_banner = 'company/images/' . $select_company_row['company_banner'];
                                            }
                                        }

                                        if (!empty($card_banner)) {

                                        ?>

                                            <img src="../<?php echo $card_banner; ?>" class="img-responsive" alt="<?= $select_company_row['company_name'] ?>" style="width:100%">
                                        <?php } ?>
                                    </div>
                                    <div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25" id="intro">
                                        <div class="listing-box-header" style="margin-bottom:0;">
                                            <div class="avater-box">
                                                <img src="../<?php if (!empty($select_employee_row['image'])) {
                                                                    echo 'company/images/employee/' . $select_employee_row['image'];
                                                                } else {
                                                                    echo 'company/images/' . $select_company_row['company_logo'];
                                                                }  ?>" alt="<?= $select_company_row['company_name'] ?>" class="img-responsive img-circle edit-avater" style="width:100%" alt="" />
                                            </div>
                                            <div class="listing-shot-caption">
                                                <h4><?= $select_employee_row['emp_name'] ?> </h4>
                                                Designation : <?= $select_employee_row['emp_designation'] ?>
                                                <hr>
                                                <p class="listing-location"><b><?= $select_company_row['company_name'] ?></b><br><?= $select_company_row['company_tagline'] ?></p>
                                            </div>
                                            <div class="listing-shot-info">
                                                <div class="row extra">
                                                    <div class="col-md-12">
                                                        <ul class="side-list-inline no-border social-side">
                                                            <li>
                                                                <a target="_blank" href="tel: <?= $select_employee_row['emp_no'] ?>" class="btn theme-cl"><img src="../img/call.png" height="20px" alt="call to <?= $select_companyy_row['company_name'] ?>" /></a>
                                                            </li>
                                                            <li><a target="_blank" href="https://wa.me/<?= $select_employee_row['emp_whatsapp_no'] ?>?text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services." class="btn theme-cl"><img src="../img/whatsapp.png" height="20px" alt="whatsapp to <?= $select_companyy_row['company_name'] ?>" /></a></li>
                                                            <li><a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $select_employee_row['company_email'] ?>" class="btn theme-cl"><img src="../img/mail.png" height="20px" alt="Mail to <?= $select_companyy_row['company_name'] ?>" /></a></li>
                                                            <li><a target="_blank" href="<?= $select_employee_row['emp_address'] ?>" class="btn theme-cl"><img src="../img/location.png" height="20px" alt="Direction to <?= $select_employee_row['emp_address'] ?>" /></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-price padd-15 ">
                                            <div class="preview-info-body">
                                                <ul class="social-info info-list">
                                                    <li>
                                                        <span> <i class="fa fa-map-marker"></i>&nbsp;&nbsp;
                                                            <?= (($select_company_row['company_address'] == '') ? 'Not Provided' : $select_company_row['company_address']) ?></span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-phone"></i>&nbsp;&nbsp;
                                                            <a href="#"> Main : <?= (($select_company_row['company_contact'] == '') ? 'Not Provided' : $select_company_row['company_contact']) ?></a> &nbsp;&nbsp;
                                                            <a href="#"> alt : <?= (($select_company_row['company_whatsapp'] == '') ? 'Not Provided' : $select_company_row['company_whatsapp']) ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-envelope"></i>&nbsp;&nbsp;
                                                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $select_employee_row['emp_email'] ?>"> <?= $select_employee_row['emp_email'] ?> </a></span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-globe"></i>&nbsp;
                                                            <a href="#"> <?= (($select_company_row['company_website_url'] == '') ? 'Not Provided' : $select_company_row['company_website_url']) ?></a></span>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="url" style="display:none"><?php
                                                                        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                                                                            $url = "https://";
                                                                        else
                                                                            $url = "http://";
                                                                        // Append the host(domain name, ip) to the URL.   
                                                                        $url .= $_SERVER['HTTP_HOST'];

                                                                        // Append the requested resource location to the URL   
                                                                        $url .= $_SERVER['REQUEST_URI'];

                                                                        echo $url;
                                                                        ?> </span>

                                    <div class="widget-boxed padd-15">
                                        <div class="widget-boxed-body">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="tel" id="phonenum" class="form-control" placeholder="Enter whatsapp number" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <a class="whatsapp-button" href="" id="whatsappshare">
                                                        <i class="fa fa-whatsapp"></i> &nbsp; Share on Whatsapp
                                                    </a>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function() {


                                                    $("#phonenum").keyup(function() {
                                                        var link = $('#url').text();
                                                        var bla = $('#phonenum').val();
                                                        console.log(bla);
                                                        $("#whatsappshare").attr("href", "https://wa.me/" + bla + "?text=" + link);
                                                    });



                                                });
                                            </script>

                                            </script>


                                            <div class="p-20"></div>

                                            <div class="shadow-buttons">

                                                <a class="btn btn-danger" href="../get_vcontact.php?action=export&id=<?php echo $select_employee_row['emp_id']; ?>" title="Export to vCard" download><i class="fa fa-fw fa-download"></i>Add to Phone Book</a>
                                                <a class="btn btn-danger" data-toggle="modal" data-target="#shareModal"><i class="fa fa-fw fa-share-alt"></i>Share</a>
                                            </div>



                                        </div>
                                    </div>


                                    <div class="widget-boxed padd-0">
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border">
                                                <!--<h5>Follow Us</h5>-->
                                                <ul class="side-list-inline no-border social-side" style="text-align:center">
                                                    <li><a target="_blank" href="../<?= $select_company_row['company_facebook'] ?>"><i class="fa fa-facebook theme-cl"></i></a></li>
                                                    <li><a href="../<?= $select_company_row['company_instagram'] ?>"><i class="fa fa-instagram theme-cl"></i></a></li>
                                                    <li> <a target="_blank" href="../<?= $select_company_row['company_twitter'] ?>"><i class="fa fa-twitter theme-cl"></i></a></li>
                                                    <li> <a target="_blank" href="../<?= $select_company_row['company_linkedin'] ?>"><i class="fa fa-linkedin theme-cl"></i></a></li>
                                                    <li> <a target="_blank" href="../<?= $select_company_row['company_whatsapp_link'] ?>"><i class="fa fa-whatsapp theme-cl"></i></a></li>
                                                </ul>
                                            </div><br>
                                        </div>
                                    </div>


                                    <div class="detail-wrapper" id="inquiry" <?= (($subscribec == false) ? 'style="display:none"' : '') ?>>
                                        <div class="detail-wrapper-header">
                                            <h4 class="texttrans"><i class="ti-files theme-cl mrg-r-10"></i>Inquiry Form</h4>
                                        </div>
                                        <?php $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="../#inquiry"  class="texttrans">Inquiry</a></li>';
                                        ?>
                                        <form method="post" action="../inquiries.php">
                                            <div class="detail-wrapper-body">
                                                <div class="row mrg-r-10 mrg-l-10">
                                                    <div class="col-sm-12">
                                                        <label>Name</label>
                                                        <input type="text" name="enquiryName" placeholder="Enter Full Name" class="form-control">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Email</label>
                                                        <input type="email" name="email" placeholder="Enter Email" class="form-control">
                                                    </div>
                                                    <input type="hidden" name="company_id" value="<?= $select_employee_row['company_id']; ?>" />
                                                    <input type="hidden" name="emp_id" value="<?= $select_employee_row['emp_id']; ?>" />
                                                    <input type="hidden" name="title" value="<?= $select_company_row['company_web_title']; ?>/<?= $select_employee_row['employee_web_url']; ?>" />
                                                    <div class="col-sm-12">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Inquiry Message</label>
                                                        <textarea name="message" placeholder="Enter Message" class="form-control height-110"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit" name="query" class="btn theme-btn">Submit your query</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="detail-wrapper" id="feedback" <?= (($subscribec == false) ? 'style="display:none"' : '') ?>>
                                        <div class="detail-wrapper-header">
                                            <h4 class="texttrans">Rate & Write Reviews</h4>
                                        </div>
                                        <?php $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="../#feedback"  class="texttrans">feedback</a></li>';
                                        ?>
                                        <div class="detail-wrapper-body">
                                            <form class="feedback-form card" method="post" action="../feedback.php">
                                                <div class="row mrg-bot-10">
                                                    <div class="col-md-12">
                                                        <div class="stars">
                                                            <input class="star star-5" id="star-5-2" type="radio" value="1" name="star" />
                                                            <label class="star star-5" for="star-5-2"></label>
                                                            <input class="star star-4" id="star-4-2" type="radio" value="2" name="star" />
                                                            <label class="star star-4" for="star-4-2"></label>
                                                            <input class="star star-3" id="star-3-2" type="radio" value="3" name="star" />
                                                            <label class="star star-3" for="star-3-2"></label>
                                                            <input class="star star-2" id="star-2-2" type="radio" value="4" name="star" />
                                                            <label class="star star-2" for="star-2-2"></label>
                                                            <input class="star star-1" id="star-1-2" type="radio" value="5" name="star" />
                                                            <label class="star star-1" for="star-1-2"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" placeholder="Your Name*" name="name">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control height-110" placeholder="Enter your feedback" name="msg"></textarea>
                                                    </div>
                                                    <input type="hidden" name="company_id" value="<?= $select_employee_row['company_id']; ?>" />
                                                    <input type="hidden" name="emp_id" value="<?= $select_employee_row['emp_id']; ?>" />
                                                    <input type="hidden" name="title" value="<?= $select_company_row['company_web_title']; ?>/<?= $select_employee_row['employee_web_url']; ?>" />
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn theme-btn" name="company_feedback">Submit your review</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="widget-boxed padd-10" style="text-align:center;">
                        <h5> <i class="fa fa-eye"></i> Views: <b><?= $select_companyy_row['website_views'] ?></b></h5>
                    </div>

                    <div class="widget-boxed padd-0" style="text-align:center; background-color:black;padding:10px;">


                        <a href="https://SaharDirectory.com/company/add-company.php" style="color:white;" target="_blank" />Click here to Create Your Profile </a>
                    </div>
                    <div class="widget-boxed padd-0" style="text-align:center; background-color:black;padding:10px;">
                        <a href="https://SaharDirectory.com/" style="color:white;" target="_blank" />SaharDirectory.com</a>



                    </div>
                </div>
            </div>

        </section>





        <div class="footer-copyright" style="position:fixed;bottom:0;z-index:999">

            <!--<h5>Follow Us</h5>-->
            <ul class=" " style="text-align:center; overflow-y:scroll; ">
                <?php echo $menu; ?>

            </ul>

        </div>



        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="side-list-inline no-border social-side" style="text-align:center">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Share Profile</h3>
                                <h5 class="modal-title" id="exampleModalLabel">Share my Digital vCard in your network.</h5>
                            </div>
                            <?php
                            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            ?>



                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>

                            <li><a href="http://twitter.com/share?url=<?= urlencode($actual_link) ?>&hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i></a></li>

                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=true&url=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                            <li><a href="whatsapp://send?text=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/plugins/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/js/bootsnav.js"></script>
        <script src="../assets/plugins/js/bootstrap-select.min.js"></script>
        <script src="../assets/plugins/js/bootstrap-touch-slider-min.js"></script>
        <script src="../assets/plugins/js/jquery.touchSwipe.min.js"></script>
        <script src="../assets/plugins/js/chosen.jquery.js"></script>
        <script src="../assets/plugins/js/datedropper.min.js"></script>
        <script src="../assets/plugins/js/dropzone.js"></script>
        <script src="../assets/plugins/js/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/js/jquery.fancybox.js"></script>
        <script src="../assets/plugins/js/jquery.nice-select.js"></script>
        <script src="../assets/plugins/js/jqueryadd-count.js"></script>
        <script src="../assets/plugins/js/jquery-rating.js"></script>
        <script src="../assets/plugins/js/slick.js"></script>
        <script src="../assets/plugins/js/timedropper.js"></script>
        <script src="../assets/plugins/js/waypoints.min.js"></script>
        <script src="../assets/js/jQuery.style.switcher.js"></script>
        <!-- Custom Js -->
        <script src="../assets/js/custom.js"></script>
        <a id="back2Top" class="theme-bg" title="Back to top" href="../#"><i class="ti-arrow-up"></i></a>
        <script>
            function openRightMenu() {
                document.getElementById("rightMenu").style.display = "block";
            }

            function closeRightMenu() {
                document.getElementById("rightMenu").style.display = "none";
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#styleOptions').styleSwitcher();
            });
        </script>
        <!-- Google-map -->
        <script src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script>
        <script src="../assets/js/gmap3.min.js"></script>
        <script type="text/javascript">
            $('#map_full_width_one').gmap3({
                map: {
                    options: {
                        zoom: 5,
                        center: [41.785091, -73.968285],
                        mapTypeControl: true,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                        },
                        mapTypeId: "style1",
                        mapTypeControlOptions: {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "style1"]
                        },
                        navigationControl: true,
                        scrollwheel: false,
                        streetViewControl: true
                    }
                },
                marker: {
                    latLng: [40.785091, -73.968285],
                    options: {
                        animation: google.maps.Animation.BOUNCE,
                        icon: 'assets/img/marker.png'
                    }
                },
                styledmaptype: {
                    id: "style1",
                    options: {
                        name: "Style 1"
                    },

                }
            });
        </script>
        <script type="text/javascript">
            $("[data-fancybox]").fancybox({
                // Options will go here
            });
        </script>
        <!-- Date Dropper Script-->
        <script>
            $('#reservation-date').dateDropper();
        </script>
        <!-- Time Dropper Script-->
        <script>
            this.$('#reservation-time').timeDropper({
                setCurrentTime: false,
                meridians: true,
                primaryColor: "#e8212a",
                borderColor: "#e8212a",
                minutesInterval: '15'
            });
        </script>
        <!-- Rating Script -->
        <script>
            $('.rating-opt').start(function(cur) {
                console.log(cur);
                $('#info').text(cur);
            });
        </script>
</body>

</html>