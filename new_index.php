<?php
include 'config.php';
$website_url = 'http://localhost/directory/';
$view = $select_companyy_row['website_views'];
$view = $view + 1;
$sal =   mysqli_query($conn, "UPDATE `company` SET `website_views` = '$view' WHERE`company_id` =  '" . $select_companyy_row['company_id'] . "' ");
$menu = '';
$def = "SELECT * FROM `defaults` WHERE `id` = '1'";
$pr = mysqli_query($conn, $def);
$default = mysqli_fetch_array($pr);


$defaul = "SELECT * FROM `social_links` WHERE `id` = '1'";
$pr = mysqli_query($conn, $defaul);
$link = mysqli_fetch_array($pr);


$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $website_url ?>/assets/plugins/css/plugins.css" rel="stylesheet">
    <link href="<?= $website_url ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?= $website_url ?>/assets/css/responsiveness.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= $website_url ?>assets/dist/css/lightbox.min.css">

    <link type="text/css" rel="stylesheet" id="jssDefault" href="<?= $website_url ?>/assets/css/colors/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php if (!empty($select_companyy_row['company_logo'])) {
                                echo $website_url . '/company/images/' . $select_companyy_row['company_logo'];
                            } else {
                                echo $website_url . '/company/images/' . $select_companyy_row['company_banner'];
                            }  ?>" type="image/png" />


    <meta property="og:image" itemprop="image" content="<?php if (!empty($select_companyy_row['company_logo'])) {
                                                            echo $website_url . '/company/images/' . $select_companyy_row['company_logo'];
                                                        } else {
                                                            echo $website_url . '/company/images/' . $select_companyy_row['company_banner'];
                                                        } ?>" />
    <meta property="og:type" content="website" />


    <meta property="og:description" content="<?= $select_companyy_row['company_name'] ?> (<?= $select_companyy_row['company_tagline'] ?>)" />


    <?php if ($select_companyy_row['company_type'] == '1') { ?>

        <title><?= $select_companyy_row['company_person'] ?> | <?= $select_companyy_row['company_designation'] ?> </title>

    <?php

    } else {
    ?>
        <title><?= $select_companyy_row['company_name'] ?> | <?= (($select_companyy_row['company_tagline'] == '') ? '' : '( ' . $select_companyy_row['company_tagline'] . ' )') ?> </title>


    <?php
    }
    ?>



    <link rel="icon" href="<?php if (!empty($select_companyy_row['company_logo'])) {
                                echo $website_url . '/company/images/' . $select_companyy_row['company_logo'];
                            } else {
                                echo $website_url . '/company/images/' . $select_companyy_row['company_banner'];
                            } ?>" type="image/png" />







    <style>
        .sd:hover {
            background-color: red;
        }

        @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

        div.stars {
            display: inline-block;
        }

        .sd {
            background-color: #b00909;
        }

        .sd:hover {
            background-color: #6a0606;
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
            background-color: #327b11;
            opacity: 0.9;
            color: #fff;
            border: none;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2), 0 0 40px rgba(255, 251, 251, 0.1) inset;

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
            background: #327b11;
            flex: 1;
            border-bottom: 6px solid #37393A;
            display: inline-block;
        }

        .shadow-buttons {
            display: flex;
            justify-content: center;
            margin: -5px;
        }



        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 9999;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-linkedin {
            background: #007bb5;
            color: white;
        }

        .fa-whatsapp {
            background: #4FCE5D;
            color: white;
        }

        .fa-instagram {
            background: #F56040;
            color: white;
        }
    </style>

    <style>
        .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
        }

        .top-left {
            position: absolute;
            top: 8px;
            left: 16px;
        }

        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
        }

        .bottom-right {
            position: absolute;
            bottom: 8px;
            right: 16px;
        }


        .map_marker {
            display: flex;
            align-items: center;
            gap: 9px;

        }

        .map_marker i {
            width: 40px !important;
            height: 40px !important;
            flex: 0 0 10%;
        }

        .map_marker .got {
            flex: 0 0 90%;
        }

        @media only screen and (max-width: 600px) {
            .bottom-right {}

            .bottom-left {}

            .map_marker {
                flex-direction: column;
            }

            .map_marker i {
                width: 43px !important;
                height: 38px !important;

            }
        }

        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloulare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php
//   $card_card_background = 'company/images/'.$select_companyy_row['company_card_background']; 
//   if (!empty($card_card_background)) {
//          $body_style=  'style="background-image: url('.$card_card_background.');background-size:100%;background-attachment:fixed;"';  
//      }else{
//          $body_style= '';
//      }    
?>

<body class="home-2" style="background-image: url('<?= $website_url ?>/img/silvio-kundt-Fixg8KipOg8-unsplash.jpg');background-size:100%;background-attachment:fixed;">

    <div class="wrapper">
        <div class="clearfix"></div>
        <section class="list-detail">
            <div class="container">
                <div class="col-md-3 col-sm-12">
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="sidebar">
                        <div class="widget-boxed padd-0" style="background:none;border:none;">
                            <div class="listing-shot grid-style no-shadow border-0 mrg-0" style="background:none;" id="home">




                                <?php
                                if ($select_companyy_row['company_name'] == '') {
                                } else {
                                    $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> 
                                    <a style="color:white; " href="#home" class="texttrans"> Home </a></li>';
                                }
                                ?>

                                <div class=" mrg-bot-25 ">
                                    <?php

                                    if ($select_companyy_row['company_type'] == '0') {



                                        $card_banner = '';


                                        if (!empty($select_companyy_row['company_banner'])) {
                                            $card_banner = 'company/images/' . $select_companyy_row['company_banner'];
                                        } else {

                                            $card_banner = 'admin/images/' . $default['banner'];
                                        }

                                        if (!empty($card_banner)) {

                                    ?>
                                            <!--<a data-fancybox="gallery" href="<?= $website_url ?>/<?php echo $card_banner; ?>" />-->
                                            <!--<img src="<?= $website_url ?>/<?php echo $card_banner; ?>" class="img-responsive banimg  " alt="<?= $select_companyy_row['company_name'] ?>">-->
                                            <!--</a>-->


                                            <a class="example-image-link" href="<?= $website_url ?>/<?php echo $card_banner; ?>" data-lightbox="example-1"><img class="example-image" style="width:100%" ; src="<?= $website_url ?>/<?php echo $card_banner; ?>" alt="image-1" /></a>


                                    <?php }
                                    }
                                    ?>

                                </div>

                                <div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25" id="intro">
                                    <div class="listing-box-header" style="margin-bottom:0;">

                                        <div class="listing-shot-caption">

                                            <?php

                                            if ($select_companyy_row['company_type'] == '0') {   ?>
                                                <h4><u><?= $select_companyy_row['company_name'] ?></u></h4>
                                                <b>
                                                    <p class="listing-location"><?= (($select_companyy_row['company_tagline'] == '') ? '' : '( ' . $select_companyy_row['company_tagline'] . ' )') ?></p>
                                                </b>
                                                <hr style="width: 40%;background-color: #34c325; height:2px;  " /> <?php
                                                                                                                }
                                                                                                                    ?>
                                            <div class="avater-box" style="border-radius:0px;text-align:center; margin-bottom:10px">


                                                <img src="<?= $website_url ?>/<?php if (!empty($select_companyy_row['company_logo'])) {
                                                                                    echo 'company/images/' . $select_companyy_row['company_logo'];
                                                                                } else {
                                                                                    echo 'admin/images/' . $default['logo'];
                                                                                }  ?>" alt="<?= $select_companyy_row['company_name'] ?>" class="img-responsive   edit-avater" alt="<?= $select_companyy_row['company_name'] ?>" />

                                            </div>
                                            <h4><u><?= $select_companyy_row['company_person'] ?></u></h4>
                                            <p class="listing-location"><b> <?= (($select_companyy_row['company_designation'] == '') ? '' : '(' . $select_companyy_row['company_designation'] . ')') ?> </b></p>
                                        </div>
                                        <div class="listing-shot-info">
                                            <div class="row extra">
                                                <div class="col-md-12">
                                                    <ul class="side-list-inline no-border social-side">
                                                        <li class="">
                                                            <a target="_blank" href="tel: +91<?= $select_companyy_row['company_contact'] ?> " class=" btn">
                                                                <img src="<?= $website_url ?>/img/call.png" height="20px" alt="call to <?= $select_companyy_row['company_name'] ?>" class="" />
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://wa.me/91<?= $select_companyy_row['company_whatsapp'] ?>?text=Got%20reference%20from%20your%20Digital%20V-Card.%20Want%20to%20know%20more%20about%20your%20products%20and%20services." class="btn  theme-cl">
                                                                <img src="<?= $website_url ?>/img/whatsapp.png" height="20px" alt="whatsapp to <?= $select_companyy_row['company_name'] ?>" />
                                                            </a>
                                                        </li>
                                                        <li><a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $select_companyy_row['company_email'] ?>" class="btn  theme-cl"><img src="<?= $website_url ?>/img/mail.png" height="20px" alt="Mail to <?= $select_companyy_row['company_name'] ?>" /></a></li>
                                                        <li><a target="_blank" href="<?= $select_companyy_row['company_address_url'] ?>" class="btn  theme-cl">
                                                                <img src="<?= $website_url ?>/img/location.png" height="20px" alt="Direction to <?= $select_companyy_row['company_name'] ?>" />
                                                            </a>
                                                        <li> <?= (($select_companyy_row['company_website_url'] == '') ? '' : '</li>
                                                        <a target="_blank" href="https://' . $select_companyy_row['company_website_url'] . '" class=" btn">
                                                                <img src="' . $website_url . '/img/globe.png" height="20px"  class="" />
                                                            </a>
                                                            
                                                             </li>') ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="booking-price padd-15 ">
                                        <div class="preview-info-body">
                                            <ul class="social-info info-list">

                                                <li>
                                                    <span><i class="fa fa-phone" style="font-size:22px;"></i>&nbsp;&nbsp;
                                                        <span class="got"> <?= (($select_companyy_row['company_contact'] == '') ? 'Not Provided' : $select_companyy_row['company_contact']) ?>
                                                        </span>
                                                        <p class="got"> </p>
                                                    </span>
                                                </li>

                                                <li> <span><i class="fa fa-whatsapp" style="font-size:22px;"></i>&nbsp;&nbsp;<span class="got"><?= $select_companyy_row['company_whatsapp'] ?></span>
                                                        <p class="got"> </p>
                                                    </span> </li>


                                                <li><span><i class="fa fa-envelope" style="font-size:22px;"></i>&nbsp;&nbsp;
                                                        <span class="got"><a href="mailto:<?= $select_companyy_row['company_email'] ?> </a>"> <?= $select_companyy_row['company_email'] ?>
                                                            </a></span></span> </li>



                                                <?= (($select_companyy_row['company_website_url'] == '') ? '' : '<li><span><i class="fa fa-globe" style="font-size:22px;"></i>&nbsp;&nbsp;
                                    <span class="got"><a href="' . $select_companyy_row['company_website_url'] . '" target="_blank">' . $select_companyy_row['company_website_url'] . '</a></span> </li>') ?>


                                                <!--// <span id="url" style="display:none">-->
                                                <?php
                                                //                                     if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                                                //                                         $url = "https://";
                                                //                                     else
                                                //                                         $url = "http://";

                                                //                                     $url .= $_SERVER['HTTP_HOST'];

                                                //                                   $url .= $_SERVER['REQUEST_URI'];

                                                //                                     echo $url;
                                                //                                     
                                                ?>
                                                <!--</span>-->

                                                <!--</span>-->







                                                <?= (($select_companyy_row['company_address'] == '') ? '' : ' <li> <span class="map_marker"> <i class="fa fa-map-marker" style="font-size:22px;"></i>
                                                        <span class="got">' . $select_companyy_row['company_address'] . '</p></span>
                                                </li>') ?>






                                            </ul>


                                        </div>
                                    </div>
                                </div>

                                <div class="widget-boxed padd-15">
                                    <div class="widget-boxed-body">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="tel" id="phonenum" class="form-control" placeholder="Enter whatsapp number" />
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="whatsapp-button" href="" id="whatsappshare">
                                                    <i class="fa fa-whatsapp" style="background:none;font-size:18px;"></i> &nbsp; Share on Whatsapp
                                                </a>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function() {


                                                        $("#phonenum").keyup(function() {
                                                                var link = $('#url').text();
                                                                var bla = $('#phonenum').val();
                                                                console.log(bla);
                                                                $("#whatsappshare").attr("href", "https://wa.me/" + 91 + bla + "?text=Hello, my name is <?= $select_companyy_row['company_person']  ?> and I have listed my business. You can contact me on my business profile -  <?= $actual_link ?>
                                                                    This business profile is powered by Sahar Directory.Click to register your business - https: //sahardirectory.com/");
                                                                });



                                                        });
                                        </script>




                                        <div class="p-20"></div>

                                        <div class="shadow-buttons">

                                            <a class="shadow-button theme-cl" href="<?= $website_url ?>get_company_vcontact.php?action=export&id=<?= $select_companyy_row['company_id'] ?>" title="Export to V-Card" download>
                                                <i class="fa fa-fw fa-download"></i>Add to Phone</a>
                                            <a class="shadow-button theme-cl" data-toggle="modal" data-target="#shareModal"><i class="fa fa-fw fa-share-alt"></i>Share</a>
                                        </div>



                                    </div>
                                </div>
                                <div class="widget-boxed padd-0">
                                    <div class="widget-boxed-body">
                                        <div class="side-list no-border">
                                            <h4 class="texttrans" align="center">Connect with us</h4>
                                            <ul class="side-list-inline no-border social-side" style="text-align:center">
                                                <li><a target="_blank" href="<?= (($select_companyy_row['company_facebook'] != '') ? $select_companyy_row['company_facebook'] : $link['fb']) ?>"><i class="fa fa-facebook" style="font-size:22px;"></i></a></li>


                                                <li><a href="<?= (($select_companyy_row['company_instagram'] != '') ? $select_companyy_row['company_instagram'] :  $link['instagram'])
                                                                ?>">

                                                        <i class="fa fa-instagram" style="font-size:22px;"></i></a></li>


                                                <li><a target="_blank" href="<?= (($select_companyy_row['company_twitter'] != '') ? $select_companyy_row['company_twitter'] : $link['twitter'])
                                                                                ?>"><i class="fa fa-twitter" style="font-size:22px;"></i></a></li>


                                                <li> <a target="_blank" href="<?= (($select_companyy_row['company_linkedin'] != '') ? $select_companyy_row['company_linkedin'] : $link['linkedin']) ?>"><i class="fa fa-linkedin theme-cl" style="font-size:22px;"></i></a></li>



                                                <li> <a target="_blank" href="https://wa.me/+91<?= (($select_companyy_row['company_whatsapp'] != '') ? $select_companyy_row['company_whatsapp'] : $link['whatsaap'])

                                                                                                ?>?text=Got%20reference%20from%20your%20Digital%20V-Card.%20Want%20to%20know%20more%20about%20your%20products%20and%20services.">
                                                        <i class="fa fa-whatsapp theme-cl" style="font-size:22px;"></i></a></li>


                                                <li> <a target="_blank" href="<?= (($select_companyy_row['company_telegram'] != '') ? $select_companyy_row['company_telegram'] : $link['telegram']) ?>"><i class="fa fa-telegram theme-cl" style="font-size:22px;"></i></a></li>


                                                <li> <a target="_blank" href="<?= (($select_companyy_row['company_youtube'] != '') ? $select_companyy_row['company_youtube'] : $link['youtube']) ?>"><i class="fa fa-youtube theme-cl" style="font-size:22px;"></i></a></li>




                                            </ul>
                                        </div><br>
                                    </div>
                                </div>
                                <?php
                                $f = "SELECT * FROM `banner` WHERE `location` = '0'";

                                $gallery = $conn->query($f);
                                if (mysqli_num_rows($gallery) > 0) {




                                ?>

                                    <?php
                                    while ($gallery_fetch = $gallery->fetch_assoc()) {
                                        $om = explode(',', $gallery_fetch["banner_content"]);
                                        foreach ($om as $com) {
                                            if ($com == $select_companyy_row['company_id']) {
                                                echo ' <div class="widget-boxed" >
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border gallery-box">
                                                <ul class=" gallery-list">
                                                                    <li>
                                                                    <a  href="' . $gallery_fetch['banner_name'] . '" >
                                                                    SPONSORED
                                                                    <img src="' . $website_url . '/img/banner/' . $gallery_fetch['banner_logo'] . '" class="img-responsive"   />
                                                                    </a>
                                                                </li> </ul>
                                            </div>
                                        </div>
                                    </div>
                                                                ';
                                            }
                                        }
                                    }
                                    ?>

                                <?php
                                }
                                ?>

                                <?php
                                if ($select_companyy_row['company_about'] == '') {
                                } else {
                                    $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white; " href="#about" class="texttrans"> About </a></li>';


                                ?>
                                    <div class="widget-boxed" <?= (($select_companyy_row['company_about'] == '') ? 'style="display:none;"' : '') ?> id="about">
                                        <div class="widget-boxed-header">
                                            <h4 class="texttrans bgtitle">About Us</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border">
                                                <p><?= $select_companyy_row['company_about'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                $f = "SELECT * FROM `product` WHERE `company_id` = '" . $select_companyy_row['company_id'] . "' LIMIT 4 ";

                                $gallery = $conn->query($f);
                                if (mysqli_num_rows($gallery) > 0) {


                                    $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#product"  class="texttrans">Product</a></li>';

                                ?>
                                    <div class="widget-boxed" id="product">
                                        <div class="widget-boxed-header">
                                            <h4 class="texttrans  bgtitle"><i class="ti-gallery padd-r-10"></i>Product</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border gallery-box">

                                                <div class="row">
                                                    <?php
                                                    while ($gallery_fetch = $gallery->fetch_assoc()) {

                                                        echo '
                                                            <div class="col-lg-12 padd-20" style="text-align:center; border-bottom: 2px solid #ff431e;">
                                                                
                                               	<a data-fancybox="gallery" href="' . $website_url . '/company/images/product/' . $gallery_fetch['product_image'] . '">               
                                                                <img src="' . $website_url . '/company/images/product/' . $gallery_fetch['product_image'] . '" class="img-responsive" style="width:100%;border-radius:10px;" alt="' . $gallery_fetch['product_title'] . '" />
                                                                
                                                                <div class="small-list-detail">
                                                                    <h4>' . $gallery_fetch['product_title'] . ' (₹ ' . (($gallery_fetch['offer'] == 1) ? '<strike>' . $gallery_fetch['product_price'] . '</strike> ₹ ' . $gallery_fetch['offer_price'] : $gallery_fetch['product_price']) . ') </h4>
                                                                    <h5 style="color:red;">' . (($gallery_fetch['offer'] == 1) ? 'Discount @  ₹' . $gallery_fetch['price_discount']  : '') . '</h5><br>

                                                                    <p style="color: #000;">' . (($gallery_fetch['offer'] == 1) ?  $gallery_fetch['product_description']  : '') . '</p><br>

                                                                    <a target="_blank" href="https://wa.me/+91' . $select_companyy_row['company_whatsapp'] . '?text=' . urlencode('Hi, I have query about ' . $gallery_fetch['product_title'] . '\'') . '" class="btn theme-cl mr-top">Query Now</a>
                                                                </div>
                                                                
                                                            </div>
                                                            ';
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>




                                <?php
                                $f = "SELECT * FROM `payment_details` WHERE `company_id` = '" . $select_companyy_row['company_id'] . "'  ";

                                $gallery = $conn->query($f);
                                if (mysqli_num_rows($gallery) > 0) {


                                    $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#payment"  class="texttrans">Payment</a></li>';

                                ?>

                                    <div class="widget-boxed" id="payment" style="padding-bottom: 0px;">
                                        <div class="widget-boxed-header">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h4>Payment Info </h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border gallery-box">
                                                <div class="row">
                                                    <?php
                                                    while ($payment_fetch = $gallery->fetch_assoc()) {


                                                    ?>

                                                        <?php if ($payment_fetch['qr1'] != '')
                                                            echo ' <div class="col-lg-12 padd-20" style="text-align:center; border-bottom: 2px solid #ff431e; ">   <div class="small-list-detail">
                                    									<h4>' . $payment_fetch['qr1_name'] . '</h4>
                                    									<h5> ' . $payment_fetch['qr1_name'] . ' Number : ' . $payment_fetch['qr1_no'] . '  </h5>
                                    								</div> 
                                    								
                                   <img src="' . $website_url . '/company/images/QR/' . $payment_fetch['qr1'] . '"  class="img-responsive"  alt="' . $payment_fetch['qr1_name'] . '"  style="width: 80%"/>
                                   <br>
                                    
                                    <a href="' . $website_url . '/company/images/QR/' . $payment_fetch['qr1'] . '"  class="btn theme-cl mr-top" download >Download</a>
                                     </div> ';
                                                        ?>

                                                        <?php if ($payment_fetch['qr2'] != '')
                                                            echo '  <div class="col-lg-12 padd-20" style="text-align:center; border-bottom: 2px solid #ff431e; ">  <div class="small-list-detail">
                                    									<h4>' . $payment_fetch['qr2_name'] . '</h4>
                                    									<h5> ' . $payment_fetch['qr2_name'] . ' Number :  ' . $payment_fetch['qr2_no'] . '  </h5>
                                    								</div>
                                    								
                                    								
                                     <img src="' . $website_url . '/company/images/QR/' . $payment_fetch['qr2'] . '"  class="img-responsive" alt="' . $payment_fetch['qr2_name'] . '" style="width: 80%" />
                                    
                                    	
                                    	
                                    	 <a href="' . $website_url . '/company/images/QR/' . $payment_fetch['qr2'] . '"  class="btn theme-cl mr-top" download >Download</a>
                                                                   </div>';
                                                        ?>


                                                        <?php if ($payment_fetch['qr3'] != '')
                                                            echo ' <div class="col-lg-12 padd-20" style="text-align:center; border-bottom: 2px solid #ff431e; ">   <div class="small-list-detail">
                                    									<h4>' . $payment_fetch['qr3_name'] . '</h4>
                                    									<h4> ' . $payment_fetch['qr3_name'] . ' Number : ' . $payment_fetch['qr3_no'] . '  </h4>
                                    								</div> 
                                    								
                                         <img src="' . $website_url . '/company/images/QR/' . $payment_fetch['qr3'] . '"  class="img-responsive" style="width: 80%" alt="' . $payment_fetch['qr3_name'] . '" />
                                                                
                                                                                  <a href="' . $website_url . '/company/images/QR/' . $payment_fetch['qr3'] . '"  class="btn theme-cl mr-top" download >Download</a>
                                                                
                                                                 </div>  ';
                                                        ?>




                                                        <div class="col-lg-12" style="text-align:center; padding-bottom: 0px; padding-top: 10px;  ">

                                                            <div class="widget-boxed padd-10" style="text-align:justify;">
                                                                <table class="table table-borderless">
                                                                    <thead>
                                                                        <th>
                                                                            <h4>Bank details</h4>
                                                                        </th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>

                                                                            <td colspan="2">Bank name</td>
                                                                            <td><b><?= $payment_fetch['bank'] ?></b></td>

                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="2">Holder name</td>
                                                                            <td><b><?= $payment_fetch['acc_holder'] ?></b></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Account No.</td>
                                                                            <td><b><?= $payment_fetch['acc_no'] ?></b></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">IFSC Code</td>
                                                                            <td><b><?= $payment_fetch['ifsc'] ?></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Account Type</td>
                                                                            <td><b><?= $payment_fetch['acc_type'] ?></b></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                </div>


                                            <?php
                                                    }
                                            ?>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }

                                ?>






                                <?php
                                $f = "SELECT * FROM `section_category` WHERE `company_id` = '" . $select_companyy_row['company_id'] . "' LIMIT 4 ";

                                $section = $conn->query($f);
                                if (mysqli_num_rows($section) > 0) {
                                    while ($section_row = $section->fetch_assoc()) {

                                        if ($section_row['name'] != '') {
                                            $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#' . str_replace(' ', '_', $section_row['name']) . '"  class="texttrans">' . $section_row['name'] . '</a></li>';
                                        }
                                ?>
                                        <div class="detail-wrapper" id="<?= str_replace(' ', '_', $section_row['name']) ?>">
                                            <div class="detail-wrapper-header">
                                                <h4 class="texttrans  bgtitle"><?= $section_row['name'] ?></h4>
                                            </div>
                                            <div class="detail-wrapper-body">
                                                <ul class="review-list">
                                                    <?php
                                                    $sec = "SELECT * FROM `section` WHERE `section_category` = '" . $section_row['sec_id'] . "'  ";

                                                    $sos = $conn->query($sec);
                                                    while ($section_fetch = $sos->fetch_assoc()) {
                                                    ?>

                                                        <li>
                                                            <div class="reviews-box">
                                                                <h4><?= $section_fetch['section_title'] ?> </h4>
                                                                <p><?= $section_fetch['description'] ?></p>
                                                                <img alt="" src="<?= $website_url ?>/company/images/<?= $section_fetch['section_image'] ?>" class="img-responsive">
                                                                <br>

                                                                <p style="text-align:center;">
                                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=91<?= $select_companyy_row['company_whatsapp'] ?>&text= Hi, I have query about <?= $section_fetch['section_title'] ?>" class="btn theme-cl mr-top">Query Now</a>



                                                                </p>
                                                            </div>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>

                                <?php
                                $f = "SELECT * FROM `company_gallery` WHERE `company_id` = '" . $select_companyy_row['company_id'] . "' LIMIT 6 ";

                                $gallery = $conn->query($f);
                                if (mysqli_num_rows($gallery) > 0) {


                                    $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#gallerya"  class="texttrans">Gallery</a></li>';

                                ?>
                                    <div class="widget-boxed" id="gallerya">
                                        <div class="widget-boxed-header">
                                            <h4><i class="ti-gallery padd-r-10"></i>Gallery</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border gallery-box">
                                                <ul class="gallery-list ">
                                                    <?php
                                                    while ($gallery_fetch = $gallery->fetch_assoc()) {

                                                    ?>

                                                        <li>
                                                            <div class="col-lg-12 " style="text-align:center; border-bottom: 2px solid #ff431e; padding: 15px 0px;">
                                                                <a data-fancybox="gallery" href="<?= $website_url ?>/company/images/gallery/<?= $gallery_fetch['image']; ?>" />


                                                                <img src="<?= $website_url ?>/company/images/gallery/<?= $gallery_fetch['image'] ?>" class="img-responsive" alt="<?= $gallery_fetch['title'] ?>" />
                                                                </a>

                                                                <?= (($gallery_fetch['title'] == '') ? '' : '<h4 style="margin-top:12px">' . $gallery_fetch['title'] . '</h4>')  ?>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                $f = "SELECT * FROM `banner` WHERE `location` = '1'";

                                $gallery = $conn->query($f);
                                if (mysqli_num_rows($gallery) > 0) {




                                ?>

                                    <?php
                                    while ($gallery_fetch = $gallery->fetch_assoc()) {
                                        $om = explode(',', $gallery_fetch["banner_content"]);
                                        foreach ($om as $com) {
                                            if ($com == $select_companyy_row['company_id']) {
                                                echo '
                                                                 <div class="widget-boxed">
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border gallery-box">
                                                <ul class="gallery-list">
                                                                    <li>
                                                <a data-fancybox="gallery" href="' . $website_url . '/img/banner/' . $gallery_fetch['banner_logo'] . '" >
                                                                     SPONSORED
                                                                    <img src="' . $website_url . '/img/banner/' . $gallery_fetch['banner_logo'] . '" class="img-responsive"   />
                                                                    </a>
                                                                </li> </ul>
                                            </div>
                                        </div>
                                    </div>
                                                                ';
                                            }
                                        }
                                    }
                                    ?>

                                <?php
                                }
                                ?>


                                <?php
                                $f = "SELECT * FROM `company_video` WHERE `company_id` = '" . $select_companyy_row['company_id'] . "' LIMIT 4 ";

                                $gallery = $conn->query($f);
                                if (mysqli_num_rows($gallery) > 0) {


                                    $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#video"  class="texttrans">Video</a></li>';

                                ?>
                                    <div class="widget-boxed" id="video">
                                        <div class="widget-boxed-header">
                                            <h4 class="texttrans bgtitle"><i class="ti-gallery padd-r-10"></i>Video</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border gallery-box">
                                                <div class="row ">
                                                    <?php
                                                    while ($gallery_fetch = $gallery->fetch_assoc()) {

                                                        echo '
                                                        <div style="padding:10px;">

                                                        
                                                        <iframe width="100%" height="200px"  class="col-12"
                                                        src="https://www.youtube.com/embed/' . $gallery_fetch['video_path'] . '">
                                                        </iframe>'; ?>

                                                        <?= (($gallery_fetch['title'] == '') ? '' : '<h4 style="margin-top:12px; text-align:center">' . $gallery_fetch['title'] . '</h4>')  ?>

                                                    <?php echo '    
                                                        </div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>


                                <?php

                                $qw = "SELECT * FROM `company` WHERE `company_id`='" . $select_companyy_row['company_id'] . "' AND `graphic_status` = '0' ";

                                $select_companys = mysqli_query($conn, $qw);
                                $select_company_rows = mysqli_fetch_array($select_companys);
                                if (mysqli_num_rows($select_companys) > 0) {
                                    $f1 = "SELECT * FROM `company_graphics` WHERE `status`='1' AND type='1'";

                                    $gallery1 = mysqli_query($conn, $f1);
                                    if (mysqli_num_rows($gallery1) > 0) {

                                        $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#greet"  class="texttrans">Greetings</a></li>';

                                ?>

                                        <div class="widget-boxed" id="greet">
                                            <div class="widget-boxed-header">
                                                <h4 class="texttrans bgtitle">Greetings</h4>

                                            </div>
                                            <div class="widget-boxed-body">
                                                <div class="side-list no-border">
                                                    <div class="row">
                                                        <?php
                                                        while ($gallery_fetch1 = mysqli_fetch_array($gallery1)) {
                                                            $date = $gallery_fetch1['show_date'];


                                                            $ldate = date('Y-m-d', strtotime($date . ' -1 days'));
                                                            $edate = date('Y-m-d', strtotime($date . ' +1 days'));

                                                            $cdate = date('Y-m-d');
                                                            if ($date == $ldate || $date == $cdate || $date == $edate) {
                                                                echo '
                                                            <div class="col-sm-12"> 
                                                                <img src="' . $website_url . '/admin/graphicsuploads/' . $gallery_fetch1['graphics'] . '" alt="' . $select_companyy_row['company_name'] . '" width="100%">
                                                                <div class="bottom-left" style="color:black;padding-left:12px;">' . $select_companyy_row['company_website_url'] . '</div>
                                                                <div class="top-left"></div>
                                                                <div class="top-right" align="right" style="padding-top:10px;padding-right:10px;"><img src="' . $website_url . '/company/images/' . $select_companyy_row['company_logo'] . '" alt="Snow" width="25%"></div>
                                                                <div class="bottom-right" style="color:black;padding-right:12px;">+91-' . $select_companyy_row['company_contact'] . '</div>
                                                                <div class="centered"></div>
                                                                </div>';
                                                            }
                                                        }
                                                        ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php

                                    }
                                }
                                ?>



                                <?php
                                $quote = "SELECT * FROM `company_graphics` WHERE `status`='1' AND type='2' ";

                                $daily = $conn->query($quote);
                                if (mysqli_num_rows($daily) > 0) {


                                    $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#quote"  class="texttrans">Daily Quotes</a></li>';

                                ?>

                                    <div class="widget-boxed" id="quote">
                                        <div class="widget-boxed-header">
                                            <h4 class="texttrans bgtitle">DAILY QUOTES</h4>

                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border">
                                                <div class="row">
                                                    <?php
                                                    while ($gallery_fetch1 = mysqli_fetch_array($daily)) {
                                                        $date = $gallery_fetch1['show_date'];
                                                        $ldate = date('Y-m-d', strtotime($date));


                                                        $cdate = date('Y-m-d');
                                                        if ($date == $ldate) {
                                                            echo '
                        <div class="col-sm-12"> 
                              <img src="' . $website_url . '/admin/graphicsuploads/' . $gallery_fetch1['graphics'] . '" alt="' . $select_companyy_row['company_name'] . '" width="100%">
                              <div class="bottom-left" style="color:black;padding-left:12px;">' . $select_companyy_row['company_website_url'] . '</div>
                              <div class="top-left"></div>
                              <div class="top-right" align="right" style="padding-top:10px;padding-right:10px;"><img src="' . $website_url . '/company/images/' . $select_companyy_row['company_logo'] . '" alt="Snow" width="25%"></div>
                              <div class="bottom-right" style="color:black;padding-right:12px;">+91-' . $select_companyy_row['company_contact'] . '</div>
                              <div class="centered"></div>
                            </div>
                            ';
                                                    ?>

                                                            <ul class="side-list-inline no-border social-side" style="text-align:center">
                                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $website_url . '/admin/graphicsuploads/' . $gallery_fetch1['graphics'] ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-f"></i></a>
                                                                </li>

                                                                <li><a href="whatsapp://send?text=<?= $website_url . '/admin/graphicsuploads/' . $gallery_fetch1['graphics'] ?>" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                                                                <li><a href="https://twitter.com/share?url=<?= $website_url . '/admin/graphicsuploads/' . $gallery_fetch1['graphics'] ?>&text=SaharDirectory" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
                                                                </li>
                                                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $website_url . '/admin/graphicsuploads/' . $gallery_fetch1['graphics'] ?>&t=SaharDirectory " onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fa fa-linkedin"></i></a>
                                                                </li>
                                                            </ul>
                                                    <?php
                                                        }
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>


                                <div class="detail-wrapper" id="inquiry" <?= (($subscribe == 'falsed') ? 'style="display:block"' : '') ?>>
                                    <div class="detail-wrapper-header">
                                        <h4 class="texttrans bgtitle"><i class="ti-files theme-cl mrg-r-10"></i>Inquiry Form </h4>
                                    </div>
                                    <?php $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#inquiry"  class="texttrans">Inquiry</a></li>';
                                    ?>
                                    <form method="post" action="inquiries.php">
                                        <div class="detail-wrapper-body">
                                            <div class="row mrg-r-10 mrg-l-10">
                                                <div class="col-sm-12">
                                                    <label>Name</label>
                                                    <input type="text" name="enquiryName" placeholder="Enter Full Name" class="form-control" required>
                                                </div>
                                                <div class="col-sm-12" style="display: none;">
                                                    <label>Email</label>
                                                    <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                                                </div>
                                                <input type="hidden" name="company_id" value="<?= $select_companyy_row['company_id']; ?>" />
                                                <input type="hidden" name="title" value="<?= $select_companyy_row['company_web_title']; ?>" />
                                                <div class="col-sm-12">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" placeholder="Enter Phone Number " maxlength="10" class="form-control phoneval" required>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Inquiry Message</label>
                                                    <textarea name="message" placeholder="Enter Message" maxlength="100" class="form-control height-110" required></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" name="query" class="btn theme-btn">Submit your query</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="detail-wrapper" id="feedback" <?= (($subscribe == 'falsed') ? 'style="display:block"' : '') ?>>
                                    <div class="detail-wrapper-header">
                                        <h4 class="texttrans bgtitle">Rate & Write Reviews</h4>
                                    </div>
                                    <?php $menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#feedback"  class="texttrans">feedback</a></li>';
                                    ?>
                                    <div class="detail-wrapper-body">
                                        <form class="feedback-form card" method="post" action="feedback.php">
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
                                                    <input type="text" class="form-control" placeholder="Your Name*" name="name" required>
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control height-110" placeholder="Enter your feedback" name="msg" required></textarea>
                                                </div>
                                                <input type="hidden" name="company_id" value="<?= $select_companyy_row['company_id']; ?>" />
                                                <input type="hidden" name="title" value="<?= $select_companyy_row['company_web_title']; ?>" />
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn theme-btn" name="company_feedback">Submit your review</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <?php
                                $f = "SELECT * FROM `banner` WHERE `location` = '2'";

                                $gallery = $conn->query($f);
                                if (mysqli_num_rows($gallery) > 0) {




                                ?>

                                    <?php
                                    while ($gallery_fetch = $gallery->fetch_assoc()) {
                                        $om = explode(',', $gallery_fetch["banner_content"]);
                                        foreach ($om as $com) {
                                            if ($com == $select_companyy_row['company_id']) {
                                                echo ' <div class="widget-boxed">
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border gallery-box">
                                                <ul class="gallery-list">
                                                                    <li>
                                                                    <a href="' . $gallery_fetch['banner_name'] . '" >
                                                                     SPONSORED
                                                                    <img src="' . $website_url . '/img/banner/' . $gallery_fetch['banner_logo'] . '" class="img-responsive"   />
                                                                    </a>
                                                                </li>  </ul>
                                            </div>
                                        </div>
                                    </div>
                                                                ';
                                            }
                                        }
                                    }
                                    ?>

                                <?php
                                }
                                ?>


                                <div class="widget-boxed padd-10" style="text-align:center;">
                                    <h5> <i class="fa fa-eye"></i> Views: <b><?= $select_companyy_row['website_views'] ?></b></h5>
                                </div>

                                <div class="widget-boxed padd-0 sd" style="text-align:center; padding:10px;">


                                    <a href="https://SaharDirectory.com/company/add-company.php" style="color:white;" target="_blank" />अपने स्वयं का कार्ड बनाने के लिए यहाँ क्लिक करे!
                                    </a>
                                </div>
                                <div class="widget-boxed padd-0 sd" style="text-align:center; padding:10px;">
                                    <a href="https://SaharDirectory.com/" style="color:white;" target="_blank" />@Copyright <?= date('Y') ?> SaharDirectory.com</a>



                                </div>
                            </div>
                        </div>

                    </div>
        </section>




    </div>


    <div class="footer-copyright" style="position:fixed;bottom:0;z-index:999;<?= (($subscribe == 'falsed') ? '' : '') ?>">

        <!--<h5>Follow Us</h5>-->
        <ul class=" " style="text-align:center; overflow-y:scroll; ">
            <?php echo $menu; ?>

        </ul>

    </div>


    <script type="text/javascript">
        $("input[name=phone]").attr("maxlength", "10");
        $('.phoneval').keypress(function(evt) {
            if (evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
            }
        });
    </script>



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
                            <h5 class="modal-title" id="exampleModalLabel">Share my Digital V-Card in your network.</h5>
                        </div>

                        <!--<li><a target="_blank" href="<?= $select_companyy_row['company_facebook'] ?>"></a></li>-->
                        <!--<li><a href="<?= $select_companyy_row['company_instagram'] ?>"><i class="fa fa-instagram"></i></a></li>-->
                        <!--<li> <a target="_blank" href="<?= $select_companyy_row['company_twitter'] ?>"><i class="fa fa-twitter"></i></a></li>-->
                        <!--<li> <a target="_blank" href="<?= $select_companyy_row['company_linkedin'] ?>"><i class="fa fa-linkedin"></i></a></li>-->
                        <!--<li> <a target="_blank" href="<?= $select_companyy_row['company_whatsapp_link'] ?>"><i class="fa fa-whatsapp"></i></a></li>-->


                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>

                        <li><a href="http://twitter.com/share?url=<?= urlencode($actual_link) ?>&hashtags=<?= $select_companyy_row['company_name'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=true&url=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                        <li><a href="whatsapp://send?text=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="https://t.me/share/url?url=<?= urlencode($actual_link) ?>&text=Please Visit our page" target="_blank"><i class="fa fa-telegram"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="showmodel" tabindex="-1" role="dialog" aria-hidden="true" style="top:10%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 100%;">
                <span class="imageshowclose">&times;</span>
                <div class="modal-body">
                    <img src="" id="mydiv" style="width:100%; max-height:400px;" />
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary imageshowclose" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {


            $('.imageshow').click(function() {

                var sh = $(this).data("value");
                //   console.log(sh);
                $('#mydiv').attr("src", sh);


                $('#showmodel').show();

            });

            $('.imageshowclose').click(function() {
                $('#showmodel').hide();

            });


        });
    </script>






    <script src="<?= $website_url ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $website_url ?>/assets/plugins/js/bootstrap.min.js"></script>
    <script src="<?= $website_url ?>/assets/plugins/js/bootsnav.js"></script>
    <script src="<?= $website_url ?>/assets/plugins/js/bootstrap-select.min.js"></script>
    <script src="<?= $website_url ?>/assets/plugins/js/bootstrap-touch-slider-min.js"></script>
    <script src="<?= $website_url ?>/assets/plugins/js/jquery.touchSwipe.min.js"></script>
    <script src="<?= $website_url ?>/assets/plugins/js/jquery.fancybox.js"></script>

    <script src="<?= $website_url ?>assets/dist/js/lightbox-plus-jquery.min.js"></script>
    <!-- Custom Js -->
    <script src="<?= $website_url ?>/assets/js/custom.js"></script>
    <a id="back2Top" class="theme-bg" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script>
    <script src="<?= $website_url ?>/assets/js/gmap3.min.js"></script>
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