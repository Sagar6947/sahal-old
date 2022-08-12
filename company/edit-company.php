<?php
include("db_connect.php");

if (isset($_POST['update_desc'])) {


    $company_about = mysqli_real_escape_string($conn, $_POST['company_about']);

    $update_profile = "UPDATE `company` SET  `company_about`='$company_about' WHERE company_id = '" . $company . "' ";
    if ($conn->query($update_profile)) {
        echo '<script>alert("Your Profile Updated Successfully ")</script>';
    } else {
        echo '<script>alert("Not Inserted")</script>';
    }
    echo '<script>window.location = "company-details.php"</script>';
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <title>Edit Business | SaharDirectory </title>

    <!-- All plugins -->
    <?php include('header-link.php'); ?>
    <script src="assets/js/cities.js"></script>


</head>

<body class="home-2">
    <div class="wrapper">
        <?php include('header.php'); ?>
        <?php include('company_edit_menu.php'); ?>


        <section class="padd-0">
            <div class="container">
                <div class="col-md-10 translateY-60 col-sm-12 col-md-offset-1">
                    <!-- General Information -->
                    <div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">
                        <div class="listing-box-header">
                            <div class="avater-box" style="width:200px; border-radius:0px">
                                <?php
                                if ($company_detail['company_logo'] != '')
                                    echo '
								<img src="images/' . $company_detail["company_logo"] . '" class="img-responsive"    edit-avater" alt="' . $company_detail['company_name'] . '" />';

                                else {
                                    echo '	<img src="assets/img/avatar.jpg" class="img-responsive  edit-avater" />';
                                }
                                ?>
                            </div>
                            <h3>
                                <?= $company_detail['company_name']; ?>
                            </h3>
                            <p>
                                <?= $company_detail['company_web_title']; ?>
                            </p>

                        </div>
                        <form method="post" action="edit-company-code.php" enctype="multipart/form-data">
                            <div class="row mrg-r-10 mrg-l-10">
                                <div class="col-sm-12">
                                    <label><span class="com">Company</span> Name :</label>

                                    <input type="hidden" id="type" value="<?= $company_detail['company_type']; ?>" />
                                    <input type="text" maxlength="255" class="form-control" placeholder="  Name" id="company_name" name="company_name" value="<?= $company_detail['company_name']; ?>" />
                                </div>
                                <div class="col-sm-12">
                                    <label>Web URL :</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="  Web Title" id="web_company_name" name="web_company_name" value="<?= $company_detail['company_web_title']; ?>" />
                                </div>
                                <div class="col-sm-12 yourtype">
                                    <label>Person Name:</label>
                                    <input type="text" class=" form-control" value="<?= $company_detail['company_person']; ?>" placeholder="Company Person name (Like : Name of CEO)" id="company_person_nm" name="company_person" />


                                </div>

                                <div class="col-sm-12">
                                    <label>Designation:</label>
                                    <input type="text" class="  form-control" placeholder="Company designation (like : CEO)" id="company_designation" name="company_designation" value="<?= $company_detail['company_designation']; ?>" />


                                </div>
                                <div class="col-sm-12">
                                    <label>Email :</label>
                                    <input type="email" class="form-control" placeholder="Company Email" id="company_email" name="company_email" value="<?= $company_detail['company_email']; ?>" />
                                </div>

                                <div class="col-sm-12" style="display:none">
                                    <label>Phone</label>
                                    <input type="number" maxlength="10" minlength="10" class="form-control" placeholder="Company Contact" id="company_contact" name="company_contact" value="<?= $company_detail['company_contact']; ?>" />
                                </div>

                                <div class="col-sm-12">
                                    <label>WhatsApp :</label>
                                    <input type="number" maxlength="10" minlength="10" class="form-control" placeholder="Company WhatsApp" id="company_whatsapp" name="company_whatsapp" value="<?= $company_detail['company_whatsapp']; ?>" />
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-line">
                                        <label>Website :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Company Website" id="company_website" name="company_website" value="<?= $company_detail['company_website_url']; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-12 yourtype">
                                    <label>Tagline </label>
                                    <textarea class="h-100 form-control" placeholder="Company Tagline" id="company_tagline" name="company_tagline"><?= $company_detail['company_tagline']; ?></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <label>Category</label>
                                    <select data-placeholder="Choose Category" class="form-control chosen-select" tabindex="2" name="company_category" id="cate_id">
                                        <option value="">Select</option>


                                        <?php
                                        $select_category = $conn->query("SELECT * FROM company_category WHERE category_status='0' order by category ASC   ");
                                        while ($select_category_row = $select_category->fetch_assoc()) {
                                        ?>
                                            <option value="<?= $select_category_row['cate_id']; ?>" <?php
                                                                                                    if ($select_category_row['cate_id'] == $company_detail['company_category'])
                                                                                                        echo 'selected'; ?>>
                                                <?= $select_category_row["category"]  ?>

                                            </option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>



                                <div class="col-sm-12">
                                    <label>Subcategory</label>
                                    <select class="form-control" name="company_subcategory" id="company_subcategory">

                                        <?php
                                        $select_subcategory = $conn->query("SELECT * FROM `company_subcategory` WHERE `subcat_id`  =" . $company_detail['company_subcategory'] . " AND status ='0'  ");
                                        if (mysqli_num_rows($select_subcategory) > 0) {
                                            $select_subcategory_row = $select_subcategory->fetch_assoc();

                                        ?>
                                            <option value="<?= $select_subcategory_row[" subcat_id"] ?>">
                                                <?= $select_subcategory_row["subcategory"] ?>
                                            </option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>

                    </div>
                    <!-- End General Information -->

                    <!-- Add Location -->
                    <div class="add-listing-box add-location mrg-bot-25 padd-bot-30 padd-top-25">
                        <div class="listing-box-header">

                            <h3><i class="ti-location-pin theme-cl"></i> Add Location</h3>
                            <p>Write Address Information about your Comapany</p>
                        </div>

                        <div class="row mrg-r-10 mrg-l-10">
                            <div class="col-sm-12">
                                <label>Address :</label>
                                <input type="text" class="form-control" placeholder="Add Address" id="company_address" name="company_address" value="<?= $company_detail['company_address']; ?>" />
                            </div>

                            <div class="col-sm-12" style="display:none">
                                <label>District :</label>
                                <input type="text" class="form-control" placeholder="Add District" id="company_district" name="company_district" value="<?= $company_detail['company_district']; ?>" />


                            </div>
                            <div class="  col-sm-12">
                                <label class="form-label">State</label>
                                <select class="form-control" name="company_state" id="state">
                                    <option value="">Select state </option>
                                    <?php
                                    $select_category = $conn->query("SELECT * FROM tbl_state  ");
                                    while ($select_category_row = $select_category->fetch_assoc()) {
                                    ?>
                                        <option value="<?= $select_category_row['state_id'] ?>" <?= (($select_category_row['state_id'] == $company_detail['company_state'])
                                                                                                    ? 'selected' : '') ?>>
                                            <?= $select_category_row['state_name'] ?>
                                        </option>
                                    <?php


                                    }
                                    ?>
                                </select>
                            </div>
                            <div class=" col-sm-12">
                                <label class="form-label">City</label>
                                <select name="company_city" class="form-control" id="city">
                                    <option value="><?= $company_detail['company_city'] ?>">
                                        <?= $company_detail['company_city'] ?>
                                    </option>
                                </select>

                            </div>
                            <div class="col-sm-12">
                                <label>Google link :</label>
                                <input type="text" class="form-control" placeholder="Enter address url" id="company_add_url" name="company_address_url" value="<?= $company_detail['company_address']; ?>" />
                                <h4>How to get location google link</h4>
                                <ul>
                                    <li>On your computer, open Google Maps.</li>
                                    <li>Go to the directions, map, or Street View image you want to share.</li>
                                    <li>On the top left, click Menu .</li>
                                    <li>Select Share or embed map. If you don't see this option, click Link to this map.
                                    </li>
                                    <li>Optional: To create a shorter web page link, check the box next to "Short URL."
                                    </li>
                                    <li>Copy and paste the link wherever you want to share the map.</li>
                                </ul>

                            </div>

                        </div>
                    </div>
                    <!-- End Add Location -->

                    <!-- Full Information -->
                    <div class="add-listing-box full-detail mrg-bot-25 padd-bot-30 padd-top-25">
                        <div class="listing-box-header">
                            <i class="ti-write theme-cl"></i>
                            <h3>Social Links</h3>

                        </div>

                        <div class="row mrg-r-10 mrg-l-10">

                            <div class="col-sm-12">
                                <label><i class="fa fa-facebook mrg-r-5" aria-hidden="true"></i>Facebook Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Facebook Link" id="company_facebook" name="company_facebook" value="<?= $company_detail['company_facebook']; ?>" />
                            </div>

                            <div class="col-sm-12">
                                <label><i class="fa fa-twitter mrg-r-5" aria-hidden="true"></i>Twitter Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Twitter Link" id="company_twitter" name="company_twitter" value="<?= $company_detail['company_twitter']; ?>" />
                            </div>

                            <div class="col-sm-12">
                                <label><i class="fa fa-instagram mrg-r-5" aria-hidden="true"></i>Instagram Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company instagram Link" id="company_instagram" name="company_instagram" value="<?= $company_detail['company_instagram']; ?>" />
                            </div>

                            <div class="col-sm-12" style="display:none">
                                <label><i class="fa fa-whatsapp mrg-r-5" aria-hidden="true"></i>Whatsapp Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Whatsapp Link" id="company_whatsapp_link" name="company_whatsapp_link" value="<?= $company_detail['company_whatsapp_link']; ?>" />
                            </div>

                            <div class="col-sm-12">
                                <label><i class="fa fa-linkedin-square mrg-r-5" aria-hidden="true"></i>Linked In</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Linkedin Link" id="company_linkedin" name="company_linkedin" value="<?= $company_detail['company_linkedin']; ?>" />
                            </div>
                            <div class="col-sm-12">
                                <label><i class="fa fa-telegram mrg-r-5" aria-hidden="true"></i>Telegram Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Telegram Link" id="company_linkedin" name="company_telegram" value="<?= $company_detail['company_linkedin']; ?>" />
                            </div>
                             <div class="col-sm-12">
                                <label><i class="fa fa-youtube mrg-r-5" aria-hidden="true"></i>Youtube Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Youtube Link" id="company_youtube" name="company_youtube" 
                                value="<?= $company_detail['company_youtube']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="add-listing-box full-detail mrg-bot-25 padd-bot-30 padd-top-25">
                        <div class="listing-box-header">
                            <i class="ti-write theme-cl"></i>
                            <h3>Profile Images & Colours</h3>

                        </div>

                        <div class="row mrg-r-10 mrg-l-10">
                            <div class="col-sm-4">
                                <label><span class="com">Company</span> Logo :</label>
                                <input type="file" class="form-control" accept="image/*" id="company_logo" name="company_logo" />

                                <input name="com_logo" type="hidden" value="<?= $company_detail["company_logo"]; ?>">

                            </div>

                            <div class="col-sm-4"  <?= (($company_detail["company_type"] == '1') ? 'style="display:none"' : '') ?>>
                                <label><span class="com">Company</span> Banner :</label>
                                <input type="file" class="form-control" accept="image/*" id="company_banner" name="company_banner" />

                                <input name="com_banner" type="hidden" value="<?= $company_detail["company_banner"]; ?>">
                            </div>
                            
                            
                            
                            


                            <div class="col-sm-4" style="display:none">
                                <label><span class="com">Company</span> Card Background :</label>
                                <input type="file" class="form-control" accept="image/*" id="company_card_background" name="company_card_background" />

                                <input name="com_card_background" type="hidden" value="<?= $company_detail["
                                    company_card_background"]; ?>">

                            </div>


                            <div class="col-sm-12" style="display:none">
                                <label>Change background color </label>
                                <input type="color" maxlength="255" class="form-control" placeholder="Company background Color" name="bg_color" value="<?= $company_detail['bg_color']; ?>" />
                            </div>

                        </div>
                        <div class="text-center">

                            <button type="submit" class="btn theme-btn" title="Submit Listing" name="update_profile">Update Profile</button>
                        </div>
                    </div>
                    </form>


                </div>
        </section>

        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>


        <script>
            $(function() {
                CKEDITOR.replace('company_about', {});
            })
        </script>
        <script>
            $(document).ready(function() {
                $('#cate_id').change(function() {
                    var cate_id = $('#cate_id').val();
                    console.log(cate_id);
                    if (cate_id != '') {

                        $.ajax({
                            url: "select_sub_category.php",
                            method: "POST",
                            data: {
                                cate_id: cate_id
                            },
                            success: function(data) {
                                $('#company_subcategory').html(data);
                            }
                        });
                    } else {
                        $('#company_subcategory').html('<option value="">Select subcategory</option>');
                    }
                });

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

                var value = $('#type').val();
                if (value == 0) {
                    $('.com').html('Company');
                    $('.yourtype').show();

                } else {
                    $('.com').html('Your');
                    $('.yourtype').hide();
                }


            });
        </script>
    </div>
</body>

</html>