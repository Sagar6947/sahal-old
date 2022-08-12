<?php

include('db_connect.php');

$def = "SELECT * FROM `defaults` WHERE `id` = '1'";
$pr = mysqli_query($conn, $def);
$default = mysqli_fetch_array($pr);

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
    <title>Add Business | SaharDirectory </title>
    <style>
        /* The Modal (background) */
        .modalhm {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 999999;
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
                <div class="row">
                    <div class="col-md-7 col-sm-12  ">
                        <!-- General Information -->
                        <div class="add-listing-box general-info mrg-bot-25 padd-bot-30 padd-top-25">
                            <div class="listing-box-header">

                                <h3><i class="ti-files theme-cl" style="font-size:1em;"></i>General Information</h3>
                            </div>
                            <form method="post" id="myform" action="insert-company.php" enctype="multipart/form-data">
                                <div class="row mrg-r-10 mrg-l-10">
                                    <div class="col-sm-12">
                                        <label>Registering for : <i><span style="color:red;font-size:12px;" id="company_type_msg"></span></i></label><br>
                                        <input type="radio" name="company_type" value="0" checked /> Company<br>
                                        <input type="radio" name="company_type" value="1" /> Individual<br><br>
                                    </div>
                                    <div class="col-sm-12 yourtype">
                                        <label><span class="com">Company</span> Name : <i><span style="color:red;font-size:12px;" id="company_name_msg"></span></i></label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Company Name" id="company_name" name="company_name" value="" required />
                                    </div>

                                    <div class="col-sm-12 yourtype">
                                        <label><span class="com">Company</span> Tagline</label>
                                        <input type="text" class="h-100 form-control" placeholder="Company Tagline" id="company_tagline" name="company_tagline" />
                                    </div>

                                    <div class="col-sm-12 yourtype">
                                        <label><span class="com">Company</span> <span class="com2">Banner</span> : (size: 458w &#9587; 358h )</label>
                                        <input type="file" class="form-control" accept="image/*" id="company_banner" name="company_banner" />
                                    </div>

                                    <div class="col-sm-12 ">
                                        <label><span class="com">Company</span> logo : (size: 115w &#9587; 37h )</label>
                                        <input type="file" class="form-control" accept="image/*" id="company_logo" name="company_logo" />
                                    </div>


                                    <div class="col-sm-12" style="display:block;">
                                        <label>Your Name: <i><span style="color:red;font-size:12px;" id="person"></span></i></label>
                                        <input type="text" class=" form-control" placeholder="  Person name (Like : Name of CEO)" id="company_person_nm" value="" name="company_person" />
                                    </div>

                                    <div class="col-sm-12" style="display:block;">
                                        <label>Your Designation: <i><span style="color:red;font-size:12px;" id="designation"></span></i></label>
                                        <input type="text" class="  form-control" placeholder="  Designation (like : CEO)" id="company_designation" value="" name="company_designation" />


                                    </div>

                                    <div class="col-sm-12" style="display:none">
                                        <label>Company Card Background :</label>
                                        <input type="file" class="form-control" accept="image/*" id="company_card_background" name="company_card_background" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Email : <i><span style="color:red;font-size:12px;" id="cmp_email_err" style="color:red"></span></i></label>
                                        <input type="email" class="form-control" placeholder="  Email ID (like : abc@gmail.com)" id="company_email" name="company_email" value="" required />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Phone No. <i><span style="color:red;font-size:12px;" id="mainphone"></span></i></label>
                                        <input type="text" class="numbers form-control" maxlength="10" placeholder="  Contact no. (like : 9876543210)" id="company_contact" value="" name="company_contact" required />


                                    </div>
                                    <div class="col-sm-12">
                                        <label>WhatsApp No. : <i><span style="color:red;font-size:12px;" id="whatsappphone"></span></i></label>
                                        <input type="text" maxlength="10" minlength="10" class=" numbers2 form-control" placeholder="  WhatsApp no. (like : 9876543210)" id="company_whatsapp" value="" name="company_whatsapp" />


                                    </div>
                                    <!--<div class="col-sm-12" style="display:none;">-->
                                    <!--    <div class="form-line">-->
                                    <!--        <label>Company Website URL:</label>-->
                                    <!--        <input type="text" maxlength="255" class="form-control" placeholder="Company Website (like : https://abc.com)" value="" id="company_website" name="company_website" />-->
                                    <!--    </div>-->
                                    <!--</div>-->


                                    <div class="  col-sm-12">
                                        <label class="form-label">State</label>
                                        <select class="form-control" name="company_state" id="state">
                                            <option value="">Select state </option>
                                            <?php
                                            $select_category = $conn->query("SELECT * FROM tbl_state");
                                            while ($select_category_row = $select_category->fetch_assoc()) {
                                            ?>
                                                <option value="<?= $select_category_row['state_id'] ?>"><?= $select_category_row['state_name'] ?></option>
                                            <?php


                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class=" col-sm-12">
                                        <label class="form-label">City <span style="color:red;font-size:12px;" id="company_city_msg"></span></label>
                                        <select name="company_city" class="form-control" id="city">
                                            <option value="">Select city</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Category <span style="color:red;font-size:12px;" id="company_category_msg"></span></label>
                                        <select data-placeholder="Choose Category" class="form-control chosen-select" tabindex="2" name="company_category" id="cate_id">
                                            <option value="">Select</option>
                                            <?php
                                            $select_category = $conn->query("SELECT * FROM company_category WHERE category_status='0' order by category ASC ");
                                            while ($select_category_row = $select_category->fetch_assoc()) {
                                                echo '<option value="' . $select_category_row['cate_id'] . '">' . $select_category_row["category"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Address : <i><span style="color:red;font-size:12px;" id="addressmsg"></span></i></label>
                                        <input type="text" class="form-control" placeholder="Enter  Address" id="company_address" name="company_address" value="" />

                                    </div>

                                    <div class="col-sm-12">
                                        <label>Create Web Title : ( Note : Only Use (A-Z),(a-z),(0-9),(_) ) <i><span style="color:red;font-size:12px;" id="web_company_name_msg"></span><span style="color:green;font-size:12px;" id="web_company_name_msgs"></span></i></label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Ex: sahar-directory" name="web_company_name" id="web_company_name" required />


                                    </div>

                                </div>
                        </div>
                        <!-- End General Information -->
                        <!-- Add Location -->
                        <!--<div class="add-listing-box add-location mrg-bot-25 padd-bot-30 padd-top-25" style="display:none;">-->
                        <!--    <div class="listing-box-header">-->

                        <!--        <h3> <i class="ti-location-pin theme-cl" style="font-size:1em;"></i>Add Location</h3>-->
                        <!--        <p>Write Address Information about your Comapany</p>-->
                        <!--    </div>-->


                        <!--    <div class="row mrg-r-10 mrg-l-10">-->
                        <!--        <div class="col-sm-12">-->
                        <!--            <label>Address : <i><span style="color:red;font-size:12px;" id="addressmsg"></span></i></label>-->
                        <!--            <input type="text" class="form-control" placeholder="Enter  Address" id="company_address" name="company_address" value="" />-->

                        <!--        </div>-->


                        <!--        <div class="col-sm-12">-->
                        <!--            <label>Google link for address :</label>-->
                        <!--            <input type="text" class="form-control" placeholder="Enter address url" id="company_add_url" name="company_address_url" />-->
                        <!--            <h4>How to get location google link</h4>-->
                        <!--            <ul>-->
                        <!--                <li>On your computer, open Google Maps.</li>-->
                        <!--                <li>Go to the directions, map, or Street View image you want to share.</li>-->
                        <!--                <li>On the top left, click Menu .</li>-->
                        <!--                <li>Select Share or embed map. If you don't see this option, click Link to this map.</li>-->
                        <!--                <li>Optional: To create a shorter web page link, check the box next to "Short URL."</li>-->
                        <!--                <li>Copy and paste the link wherever you want to share the map.</li>-->
                        <!--            </ul>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- End Add Location -->
                        <!-- Full Information -->
                        <div class="add-listing-box full-detail mrg-bot-25 padd-bot-30 padd-top-25" style="display:none;">
                            <div class="listing-box-header">

                                <h3> <i class="ti-write theme-cl" style="font-size:1em;"></i>Social Details</h3>
                            </div>
                            <div class="row mrg-r-10 mrg-l-10">
                                <div class="col-sm-12">
                                    <label><i class="fa fa-facebook mrg-r-5" aria-hidden="true"></i>Facebook Link</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Company Facebook Link" id="company_facebook" name="company_facebook" />
                                </div>
                                <div class="col-sm-12">
                                    <label><i class="fa fa-twitter mrg-r-5" aria-hidden="true"></i>Twitter Link</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Company Twitter Link" id="company_twitter" name="company_twitter" />
                                </div>
                                <div class="col-sm-12">
                                    <label><i class="fa fa-instagram mrg-r-5" aria-hidden="true"></i>Instagram Link</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Company instagram Link" id="company_instagram" name="company_instagram" />
                                </div>

                                <div class="col-sm-12">
                                    <label><i class="fa fa-linkedin-square mrg-r-5" aria-hidden="true"></i>Linked In</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Company Linkedin Link" id="company_linkedin" name="company_linkedin" />
                                </div>
                                <div class="col-sm-12">
                                    <label><i class="fa fa-telegram mrg-r-5" aria-hidden="true"></i>Telegram</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Company telegram Link" id="company_telegram" name="company_telegram" />
                                </div>


                                <div class="col-sm-12" style="display:none">
                                    <label>Description</label>
                                    <textarea class="h-100 form-control" name="company_about" id="company_about" placeholder="Company About"></textarea>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-12" style="display:none;" id="pr">
                            <input type="submit" class="btn theme-btn" name="company_submit" value="Create Profile" />
                        </div>
                        <div class="col-sm-12" id="pr2">
                            <span id="allerr" style="color:red;"></span><br>
                            <p class="btn theme-btn" id="check">Create Profiles</p>
                        </div>

                        </form>
                    </div>




                    <div class="col-md-5 col-sm-12 ">
                        <div class="sidebar">
                            <h3>Create your Digital Vcard</h3>
                            <div class="widget-boxed padd-0" style="background:none;border:none;">
                                <!-- Booking listing or Space -->
                                <div class="listing-shot grid-style no-shadow border-0 mrg-0" style="background:none;">

                                    <div class="listing-shot-img yourtype">
                                        <img src="<?= website_url ?>admin/images/<?= $default['banner'] ?>" class="img-responsive" id="cmp_banner" alt="Banner Image of company" style="width:100%; height: 100%;">
                                    </div>
                                    <div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25" id="intro">
                                        <div class="listing-box-header" style="margin-bottom:0;">
                                            <div class="listing-shot-caption yourtype">
                                                <h4 id="cmp_nm"><u><span class="com">Company </span> Name </u></h4>
                                            </div>

                                            <div class="listing-shot-caption">

                                                <p class="listing-location yourtype" id="cmp_tag"><b> ( <span class="com">Company</span>
                                                        Tagline ) </b></p>

                                                <!--<h5 id="cmp_per_nm"><u>Company Person Name </u></h5>-->

                                                <!--<p class="listing-location" id="cmp_desig"><b> ( Person Designation ) </b></p>-->

                                            </div>
                                            <div class="avater-box " style="border-radius:0px;text-align:center;width: 30%;">
                                                <img src="../admin/images/<?= $default['logo'] ?>" alt="Company Logo" class="img-responsive" id="cmp_logo" style="width:100%;" />
                                            </div>

                                            <div class="listing-shot-caption">

                                                <h5 id="cmp_per_nm"><u>Company Person Name </u></h5>

                                                <p class="listing-location" id="cmp_desig"><b> ( Person Designation ) </b></p>

                                            </div>
                                            <hr>
                                            <div class="listing-shot-info">
                                                <div class="row extra">
                                                    <div class="col-md-12">
                                                        <ul class="side-list-inline no-border social-side">
                                                            <li>
                                                                <a href="#" class="btn theme-cl" id="mobilecall">Call</a>
                                                            </li>
                                                            <li><a href="#" class="btn theme-cl" id="whats_no">Whatsapp</a></li>
                                                            <li><a href="#" class="btn theme-cl">Mail</a></li>
                                                            <li><a href="#" class="btn theme-cl">Direction</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-price padd-15 ">
                                            <div class="preview-info-body">
                                                <ul class="social-info info-list">

                                                    <li>
                                                        <span><i class="fa fa-phone"></i>&nbsp;&nbsp;
                                                            <a href=""> <span id="cmp_main">9999999999</span></a>
                                                    </li>

                                                    <li>
                                                        <span><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;
                                                            <a href=""> <span id="cmp_alt">9999999999</span></a></span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-envelope"></i>&nbsp;&nbsp;
                                                            <a href="" id="cmp_email"> company@email.com </a></span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-globe"></i>&nbsp;&nbsp;
                                                            <a href="" id="cmp_web"> companyname.com</a></span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="fa fa-map-marker"></i>&nbsp;&nbsp;<span id="cmp_add">
                                                                Location</span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-boxed padd-0" style="display:none;">
                                        <div class="widget-boxed-body">
                                            <div class="side-list no-border">
                                                <!--<h5>Follow Us</h5>-->
                                                <ul class="side-list-inline no-border social-side" style="text-align:center">
                                                    <li> <a href="" id="company_facebook1"><i class="fa fa-facebook theme-cl"></i></a></li>
                                                    <li> <a href="" id="company_instagram1"><i class="fa fa-instagram theme-cl"></i></a>
                                                    </li>
                                                    <li> <a href="" id="company_twitter1"><i class="fa fa-twitter theme-cl"></i></a></li>
                                                    <li> <a href="" id="company_linkedin1"><i class="fa fa-linkedin theme-cl"></i></a></li>
                                                    <li> <a href="https://api.whatsapp.com/send?phone=9039005753&amp;text=Hi there! I have a question :)" id="company_whatsapp1"><i class="fa fa-whatsapp theme-cl"></i></a></li>
                                                </ul>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- The modalhm -->
        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>
        <script>
        </script>
        <script>
            var err = [];
            $('.form-control').keyup(function() {
                runval();
            });
            $('#check').click(function() {
                runval();
            });


            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
            $('input[name=company_type]').change(function() {
                var value = $('input[name=company_type]:checked').val();
                if (value == 0) {
                    $('.com').html('Company');
                    $('.com2').html('Banner');
                    $('.yourtype').show();
                    $('#company_name').val('');

                } else {
                    $('.com').html('Your');
                    $('#company_name').val(' ');
                    $('.com2').html('Photo');
                    $('.yourtype').hide();
                }
            });

            function IsMobile(contact, type) {
                if (type == "m") {
                    contact = contact.replace(/\D/g, '');
                    $('#company_contact').val(contact);
                } else if (type == "w") {
                    contact = contact.replace(/\D/g, '');
                    $('#company_whatsapp').val(contact);
                }
                var regex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
                if (!regex.test(contact)) {
                    return false;
                } else {
                    return true;
                }
            }


            // $('#company_email').keyup(function() {

            //     var email = $('#company_email').val();
            //     $('#cmp_email').text(email);


            //     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            //     if (!emailReg.test(email)) {
            //         // $("#company_email").after('<span>Enter a valid email address.</span>');
            //         $('#cmp_email_err').text('Enter a valid email address.');
            //     } else {
            //         $('#cmp_email_err').text(' ');
            //     }


            // });
            // $('#company_website').keyup(function() {
            //     var web = $('#company_website').val();
            //     $('#cmp_web').text(web);
            // });

            $("#company_logo").change(function() {
                readURL(this);
            });
            $("#company_banner").change(function() {
                readURL2(this);
            });

            // $("#company_facebook").change(function() {
            //     var web = $('#company_facebook').val();
            //     $('#company_facebook1').attr("href", web);
            // });
            // $("#company_twitter").change(function() {
            //     var web = $('#company_twitter').val();
            //     $('#company_twitter1').attr("href", web);
            // });
            // $("#company_instagram").change(function() {
            //     var web = $('#company_instagram').val();
            //     $('#company_instagram1').attr("href", web);
            // });
            // $("#company_linkedin").change(function() {
            //     var web = $('#company_linkedin').val();
            //     $('#company_linkedin1').attr("href", web);
            // });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#cmp_logo').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#cmp_banner').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(document).ready(function() {
                $('#state').change(function() {
                    var state = $('#state').val();
                    console.log(state);
                    if (state != '') {

                        $.ajax({
                            url: "select_city.php",
                            method: "POST",
                            data: {
                                state: state
                            },
                            success: function(data) {

                                $('#city').html(data);
                            }
                        });
                    } else {
                        $('#city').html('<option value="">Select city</option>');
                    }
                });

            });

            function runval() {
                // console.log('kl');
                err = [];
                if (!$('#company_name').val()) {
                    err.push('true');
                    $('#company_name_msg').text('Company Name is required');
                } else {
                    var nm = $('#company_name').val();
                    $('#company_name_msg').text('');
                    $('#cmp_nm').html('<u>' + nm + '</u>');
                }


                if (!$('#cate_id').val()) {
                    err.push('true');
                    $('#company_category_msg').text('Category is required');
                } else {
                    var nm = $('#cate_id').val();
                    $('#company_category_msg').text('');

                }

                if (!$('#city').val()) {
                    err.push('true');
                    $('#company_city_msg').text('City is required');
                } else {
                    var nm = $('#city').val();
                    $('#company_city_msg').text('');

                }



                if (!$('#web_company_name').val()) {
                    err.push('true');
                    $('#web_company_name_msg').text('Company web name is required');
                } else {
                    var str = $('#web_company_name').val();
                    // str = str.replace('--', '-');
                    str = str.replace(/\W$/, '-');
                    $('#web_company_name').val(str);

                    $('#web_company_name_msg').text('');
                    $.ajax({
                        url: "getvalue.php",
                        method: "POST",
                        data: {
                            nm: str
                        },
                        success: function(data) {
                            console.log(data)
                            if (data == 'Y') {
                                $('#web_company_name_msgs').text('Username is Available');
                                $('#web_company_name_msg').text('');
                            } else {
                                err.push('true');
                                $('#web_company_name_msg').text('Username Not Available');
                                $('#web_company_name_msgs').text('');
                            }

                        }
                    });

                }
                var email = $('#company_email').val();
                if (!$('#company_email').val()) {
                    err.push('true');
                    $('#cmp_email_err').text('Company Email is required');
                    $('#cmp_email').text(email);
                } else if (IsEmail(email) == false) {
                    err.push('true');
                    $('#cmp_email_err').text('Company Email is Invalid ');
                    $('#cmp_email').text(email);
                } else {
                    $.ajax({
                        url: "search_email.php",
                        method: "POST",
                        data: {
                            contact: email
                        },
                        success: function(data) {

                            if (data == '') {

                            } else {
                                err.push('true');
                                $('#cmp_email_err').text(data);
                            }

                        }
                    });
                    $('#cmp_email_err').text('');
                    $('#cmp_email').text(email);
                }

                var contact = $('#company_contact').val();
                if (!$('#company_contact').val()) {
                    err.push('true');
                    $('#cmp_main').text(contact);
                    $('#mainphone').text('Company Contact is required');
                } else if (IsMobile(contact, "m") == false) {
                    err.push('true');
                    $('#mainphone').text('Company Contact is Invalid. Should contain 10 digit contact no.');
                    $('#cmp_main').text(contact);

                } else {
                    $.ajax({
                        url: "search_contact.php",
                        method: "POST",
                        data: {
                            contact: contact
                        },
                        success: function(data) {

                            if (data == '') {

                            } else {
                                err.push('true');
                                $('#mainphone').text(data);
                            }

                        }
                    });
                    // $('#mobilecall').text(contact);
                    $('#cmp_main').text(contact);
                    $('#mainphone').text('');
                }


                var whatsappcontact = $('#company_whatsapp').val();
                if (!$('#company_whatsapp').val()) {
                    err.push('true');
                    $('#cmp_alt').text(whatsappcontact);
                    $('#whatsappphone').text('Company Whatsapp is required');
                } else if (IsMobile(whatsappcontact, "w") == false) {
                    err.push('true');
                    $('#whatsappphone').text('Company Whatsapp is Invalid. Should contain 10 digit Whatsapp no.');
                    $('#cmp_alt').text(whatsappcontact);

                } else {
                    $('#company_whatsapp1').attr("href", "https://api.whatsapp.com/send?phone=" + whatsappcontact + "&amp;text=Hi there! I have a question :)");
                    $('#cmp_alt').text(whatsappcontact);

                    $('#whatsappphone').text('');
                }

                if (!$('#company_address').val()) {
                    err.push('true');
                    $('#addressmsg').text('Company Address is required');
                } else {
                    var add = $('#company_address').val();
                    $('#addressmsg').text(' ');
                    $('#cmp_add').text(add);
                }
                var co = jQuery.inArray('true', err);
                // console.log(err);
                if (co >= 0) {
                    $('#pr2').show();
                    $('#pr').hide();
                    $('#allerr').text('Please fill all details');

                } else {
                    $('#pr').show();
                    $('#pr2').hide();
                    $('#allerr').text(' ');
                }
            }
            // $('#company_name').keyup(function() {
            //     var nm = $('#company_name').val();
            //     $('#cmp_nm').text(nm);
            // });
            $('#company_person_nm').keyup(function() {
                var nm = $('#company_person_nm').val();
                $('#cmp_per_nm').html('<u>' + nm + '</u>');
            });
            $('#company_designation').keyup(function() {
                var nm = $('#company_designation').val();
                $('#cmp_desig').text('(' + nm + ')');
            });
            $('#company_tagline').keyup(function() {
                var tag = $('#company_tagline').val();
                $('#cmp_tag').text('(' + tag + ')');
            });
            $('#company_address').keyup(function() {
                var add = $('#company_address').val();
                $('#cmp_add').text(add);
            });
            // $('#company_contact').keyup(function() {
            //     var main = $('#company_contact').val();
            //     var mobile = $('#company_contact');
            //     var goodColor = "#0C6";
            //     var badColor = "#FF9B37";

            //     // if(main.length!=10){

            //     //     mobile.style.backgroundColor = badColor;
            //     //     message.style.color = badColor;
            //     //     message.innerHTML = "required 10 digits, match requested format!"
            //     // }}
            //     $('#cmp_main').text(main);
            // });
            // $('#company_whatsapp').keyup(function() {
            //     var app = $('#company_whatsapp').val();
            //     $('#cmp_alt').text(app);
            // });
            // $('#mainphone').keyup(function() {
            //     var mobile = $('#mainphone').val();
            //     $('#mobilecall').text(main);
            // });
        </script>

</body>

</html>