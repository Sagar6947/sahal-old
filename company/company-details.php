<?php
   include("db_connect.php");
   ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile Details | <?= $company_detail['company_name']; ?> </title>
      <?php include('header-link.php'); ?>
   </head>
   <body class="home-2">
      <div class="wrapper">
      <?php include('header.php'); ?>
      <div class="clearfix"></div>
      <section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
         <div class="container">
            <div class="title-content">
               <h1>Company <span class="current">Dashboard</span></h1>
            </div>
         </div>
      </section>
      <div class="clearfix"></div>
      <!-- Page Title -->
      <section class="padd-0">
         <div class="container">
            <div class="add-listing-box translateY-60 edit-info mrg-bot-25 padd-bot-30 padd-top-25">
               <div class="listing-box-header">
                  <div class="avater-box">
                     <?php
                        if($company_detail['company_logo'] != '')
                        	echo'
                        <img src="images/'.$company_detail["company_logo"].'" class="img-responsive img-circle edit-avater" alt="'.$company_detail['company_name'].'" style="height:100%;"/>';
                        
                        else
                        {
                        echo'	<img src="images/com_profile_def.png" class="img-responsive img-circle edit-avater" />';
                        }
                        ?>
                  </div>
                  <h3><?= $company_detail['company_name']; ?></h3>
                  <h5>Tagline : " <?= $company_detail['company_tagline']; ?> "</h5>
                  <p><a href="../<?= $company_detail['company_web_title']; ?>" target="_blank" class="btn btn-info"> click here to get url</a> 
                  <a href="company-profile-edit.php" class="btn btn-info">Edit Profile</a></p>
               </div>
               <div class="row mrg-r-10 mrg-l-10 preview-info">
                  <div class="col-sm-3">
                     <label><i class="ti-mobile preview-icon call mrg-r-10"></i><br><b>Contact - </b><br> <?= $company_detail['company_contact']; ?></label>
                  </div>
                  <div class="col-sm-3">
                     <label><i class="ti-email preview-icon email mrg-r-10"></i><br><b>Email -</b><br> <?= $company_detail['company_email']; ?></label>
                  </div>
                  <div class="col-sm-3">
                     <label>
                        <i class="ti-gift preview-icon birth mrg-r-10"></i><br><b>Registered Date -</b><br> <?=date_format(date_create($company_detail['created_date']), "d M Y") ?>
                  </div>
                  <div class="col-sm-3">
                  <label><i class="ti-world preview-icon web mrg-r-10"></i><br><b>Website URL -</b><br> <?= $company_detail['company_website_url']; ?></label>
                  </div>
                  <div class="col-sm-3">
                     <label><b>Co. Category :</b><br>
                     <?php
                        $select_category = mysqli_query($conn , "SELECT * FROM company_category WHERE cate_id =".$company_detail['company_category']." AND category_status ='0'  ");
                        if(mysqli_num_rows($select_category) > 0){
                        	$select_category_row =mysqli_fetch_array($select_category);
                        	echo'<span>'. $select_category_row["category"].'</span>';
                        }else{
                        	echo 'Not Selected';
                        }
                        
                        
                        
                        
                        ?></label>
                  </div>
                  <div class="col-sm-3">
                     <label><b>Subcategory:</b><br>
                     <?php
                        $select_subcategory = mysqli_query($conn ,"SELECT * FROM company_subcategory WHERE subcat_id  =".$company_detail['company_subcategory']." AND status ='0'  ");
                        if(mysqli_num_rows($select_subcategory) > 0){
                        $select_subcategory_row = mysqli_fetch_array($select_subcategory);
                        
                        	echo'
                        <span>'. $select_subcategory_row["subcategory"].'</span>
                        ';}else{
                        echo 'Not Selected';
                        }
                        
                        
                        
                        ?></label>
                  </div>
                 
                  <div class="col-sm-3">
                     <label><b>Co. City :</b><br>
                     <?= (($company_detail['company_city'] == '')? 'Not Entered':$company_detail['company_city']); ?>
                     </label>
                  </div>
                  <div class="col-sm-3">
                     <label><b>Co. State :</b><br>
                     <?= (($company_detail['company_state'] == '')? 'Not Entered':$company_detail['company_state']); ?>
                     </label>
				  </div>
				  <div class="col-sm-5">
                     <label><b>Co. Address :</b><br>
                     <?= (($company_detail['company_address'] == '')? 'Not Entered':$company_detail['company_address']); ?>
                     </label>
                  </div>
                  <div class="col-sm-4">
                     <label><b>Co. Address google link:</b><br>
                     <?= (($company_detail['company_address_url'] == '')? 'Not Entered':$company_detail['company_address_url']); ?>
                     </label>
                  </div>
                  
                   
                  
                   <div class="col-sm-3">
                     <label><b>Website Views :</b><br>
                     <?= (($company_detail['website_views'] == '')? 'Not Entered':$company_detail['website_views']); ?>
                     </label>
                  </div>
              
            <!-- End General Information -->
             </div>
             </div>
			  
			 <div class="row mrg-r-10 mrg-l-10 preview-info">
               <div class="col-md-12 col-sm-12">
                  <!-- About Information -->
                  <div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-5">
                     <div class="preview-info-header">
                        <h4>About</h4>
                     </div>
                     <div class="preview-info-body">
                        <p><?= (($company_detail['company_about'] == '')? 'Not Entered':$company_detail['company_about']); ?> </p>
                     </div>
                  </div>
                  <!-- End About Information -->
               </div>
               <div class="col-md-6 col-sm-12">
                  <!-- Address Information -->
                  <div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-5">
                     <div class="preview-info-header">
                        <h4>Basic Info</h4>
                     </div>
                     <div class="preview-info-body">
                        <ul class="info-list">
                           <ul class="social-info info-list row">
                              <li class="col-md-6">
                                 <label>Co. banner</label>
                                 <span><img src="images/<?= (($company_detail['company_banner'] == '')? '/com_profile_def.png':$company_detail['company_banner']); ?>" class="img-responsive img-circle edit-avater" style="height:100px;"></span>
                              </li>
                              <li class="col-md-6">
                                 <label>Co. Card Background</label>
                                 <span><img src="images/<?= (($company_detail['company_card_background'] == '')? '/com_profile_def.png':$company_detail['company_card_background']); ?>" class="img-responsive " style="height:100px;" ></span>
                              </li>
                           </ul>
                        </ul>
                     </div>
                  </div>
                  <!-- End Address Information -->
               </div>
               <div class="col-md-6 col-sm-12">
                  <!-- Follow Information -->
                  <div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-5">
                     <div class="preview-info-header">
                        <h4>Follow Us</h4>
                     </div>
                     <div class="preview-info-body">
                        <ul class="social-info info-list">
                           <li>
                              <label><i class="fa fa-facebook"></i></label>
                              <span>
                              <?= (($company_detail['company_facebook'] == '')? 'Not Entered':$company_detail['company_facebook']); ?> </span>
                           </li>
                           <li>
                              <label><i class="fa fa-twitter"></i></label>
                              <span><?= (($company_detail['company_twitter'] == '')? 'Not Entered':$company_detail['company_twitter']); ?>
                              </span>
                           </li>
                           <li>
                              <label><i class="fa fa-whatsapp"></i></label>
                              <span><?= (($company_detail['company_whatsapp_link'] == '')? 'Not Entered':$company_detail['company_whatsapp_link']); ?>
                              </span>
                           </li>
                           <li>
                              <label><i class="fa fa-linkedin"></i></label>
                              <span><?= (($company_detail['company_linkedin'] == '')? 'Not Entered':$company_detail['company_linkedin']); ?>
                              </span>
                           </li>
                           <li>
                              <label><i class="fa fa-instagram"></i></label>
                              <span><?= (($company_detail['company_instagram'] == '')? 'Not Entered':$company_detail['company_instagram']); ?>
                              </span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
      </section>
      <?php include('footer-link.php'); ?>
      <?php include('footer.php'); ?>
      </div>
   </body>
</html>
