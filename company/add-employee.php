<?php
include("db_connect.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <title>Add Employee | SaharDirectory </title>
    <?php include('header-link.php'); ?>



</head>

<body class="home-2">
    <div class="wrapper">
        <?php include('header.php'); ?>
        <div class="clearfix"></div>
        <section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
            <div class="container">
                <div class="title-content">
                    <h1>Add Employee</h1>
                    <div class="breadcrumbs">
                        <a href="company-details.php">Home</a>
                        <span class="gt3_breadcrumb_divider"></span>
                        <span class="current">Add Employee</span>
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

                        <form method="post" action="insert-employee.php" enctype="multipart/form-data">
                            <div class="row mrg-r-10 mrg-l-10">
                                <div class="col-sm-12">
                                    <label>Employee Name :</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Employee Name" id="employee_name" name="emp_name" required />
                                    <input type="hidden" id="cmp" value="<?= $company_detail['company_web_title'] ?>" />
                                </div>
                                <div class="col-sm-12">
                                    <label>Designation :</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Employee Designation" id="emp_designation" name="emp_designation" required />
                                </div>

                                <div class="col-sm-12">
                                    <label>Employee Web url :</label><br>Your URL title : <span id="url"></span>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Ex : John_Deo" id="employee_web_url" name="employee_web_url" required />
                                    (only use alphabets , numbers and underscore only)
                                </div>

                                <div class="col-sm-12">
                                    <label>Email :</label>
                                    <input type="email" class="form-control" placeholder="Employee Email" id="emp_email" name="emp_email" />
                                    <span style="" id="emp_email_msg"></span>
                                </div>

                                <div class="col-sm-12">
                                    <label>Phone</label>
                                    <input type="text"   class="form-control" placeholder="Employee Contact" id="Employee_no" name="emp_no"  maxlength="10"/>
                                    
                                </div>

                                <div class="col-sm-12">
                                    <label>WhatsApp :</label>
                                    <input type="text" class="form-control" placeholder="Employee WhatsApp" id="emp_whatsapp_no" name="emp_whatsapp_no" maxlength="10" />
                                    <span style="color:red" id="emp_email_msg"></span>
                                </div>
                                <div class="col-sm-12">
                                    <label>Employee Image :</label>
                                    <input type="file" class="form-control" name="image" />
                                </div>


                                <div class="col-sm-12">
                                    <label><i class="fa fa-facebook mrg-r-5" aria-hidden="true"></i>Facebook Link</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Employee Facebook Link" id="emp_fb" name="emp_fb" />
                                </div>
                                <div class="col-sm-12">
                                    <label><i class="fa fa-instagram mrg-r-5" aria-hidden="true"></i>Instagram Link</label>
                                    <input type="text"  class="form-control" placeholder="Employee instagram Link" id="emp_insta " name="emp_insta" />
                                </div>


                                <div class="col-sm-12" style="display:none">
                                    <label><i class="fa fa-whatsapp mrg-r-5" aria-hidden="true"></i>Whatsapp Link</label>
                                    <input type="text"   class="form-control" placeholder="Employee Whatsapp Link" id="emp_whastapp" name="emp_whastapp" />
                                </div>




                                <div class="col-sm-12">
                                    <label><i class="fa fa-linkedin-square mrg-r-5" aria-hidden="true"></i>Linked In</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Employee Linkedin Link" id="emp_linkdin" name="emp_linkdin" />
                                </div>
                                <div class="col-sm-12">
                                    <label><i class="fa fa-linkedin-square mrg-r-5" aria-hidden="true"></i>Twitter</label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Employee Linkedin Link" id="emp_twitter" name="emp_twitter" />
                                </div>




                            </div>

                    </div>
                    <!-- End General Information -->

                    <!-- Add Location -->
                    <div class="add-listing-box add-location mrg-bot-25 padd-bot-30 padd-top-25" style="display:none">
                        <div class="listing-box-header">
                            <i class="ti-location-pin theme-cl"></i>
                            <h3>Add Location</h3>
                            <p>Write Address Information about your Comapany</p>
                        </div>

                        <div class="row mrg-r-10 mrg-l-10">
                            <div class="col-sm-12">
                                <label>Address :</label>
                                <input type="text" class="form-control" placeholder="Employee Address" id="emp_address" name="emp_address" />

                            </div>
                        </div>
                    </div>


                    <div class="text-center">
                        <input type="submit" class="btn theme-btn" name="Employee_submit" value="Add Employee" />
                    </div>
                </div>
                </form>
            </div>
        </section>

        <?php include('footer.php'); ?>
        <?php include('footer-link.php'); ?>

        <script>
            
            $(document).ready(function() {
                
                
                // $('#Employee_no').text( function(i,txt) {return txt.replace(/\d+/,'other value'); });
                
                
                
                $("#emp_email").keyup(function() {
                    var inputvalues = $(this).val();
                    console.log(inputvalues);
                    atpos = inputvalues.indexOf("@");
                    dotpos = inputvalues.lastIndexOf(".");
                    if (atpos < 1 || ( dotpos - atpos < 2 )){
                        $('#emp_email_msg').text('Invalid email').css('color', 'red');;
                        // return regex.test(inputvalues);
                    }else{
                         $('#emp_email_msg').text('Valid email').css('color', 'green');;
                    }
                });
                
                $("#Employee_no").keyup(function() {
                    var inputvalues = $(this).val(); 
                     inputvalues = inputvalues.replace(/\D/g,'');
                      $("#Employee_no").val(inputvalues);
                     
                });
                
                $("#emp_whatsapp_no").keyup(function() {
                    var inputvalues = $(this).val(); 
                     inputvalues = inputvalues.replace(/\D/g,'');
                      $("#emp_whatsapp_no").val(inputvalues);
                     
                });
                  
         



                $('#employee_web_url').keyup(function(e) {
                    //alert("key up");
                    e.preventDefault();
                    var str = $(this).val();
                    str = str.replace(/\W+(?!$)/g, '-');
                    str = str.replace(/\W$/, '');
                    //   str = str.replace(/\s+/g, '-').toLowerCase();
                    $('#employee_web_url').val(str);
                    var cmp = $('#cmp').val();
                    $('#url').text("https://SaharDirectory.com/" + cmp + "/" + str);
                });


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

                                $('#Employee_subcategory').html(data);
                            }
                        });
                    } else {
                        $('#Employee_subcategory').html('<option value="">Select subcategory</option>');
                    }
                });

            });
        </script>
    </div>
</body>

</html>