
<?php
$view = $select_companyy_row['website_views'];

$view = $view+1;
$sal=   mysqli_query($conn, "UPDATE `company` SET `website_views` = '$view' WHERE`company_id` =  '".$select_companyy_row['company_id']."' ");


?>

<html>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shadows+Into%20Light&amp;display=swap" media="all" id="shr-font-shadows-into light">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="templates/template4/t4-style.css" rel="stylesheet">
        <link href="templates/common/css/star-rating.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/intlTelInput.min.css">
      <script async defer crossorigin="anonymous" src="sdk.js#xfbml=1&version=v5.0"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui">
      
      
      <meta property="og:image" itemprop="image" content="<?php if (!empty($select_companyy_row['company_logo'])) {echo 'company/images/'.$select_companyy_row['company_banner'];}
         else { echo 'company/images/'.$select_companyy_row['company_logo']; } ?>"/>
      <meta property="og:type" content="website" />
      <meta property="og:description" content="<?php if(!empty($select_companyy_row['company_web_title'])) {echo $select_companyy_row['company_name'];} 
         else { $select_companyy_row['company_web_title'];} ?>" />
         
      <title><?php if(!empty($select_companyy_row['company_web_title'])) {echo $select_companyy_row['company_name'];} 
         else { $select_companyy_row['company_web_title'];} ?></title>
         
      <link rel="icon" href="<?php if (!empty($select_companyy_row['company_logo'])) {echo 'company/images/'.$select_companyy_row['company_logo'];}
         else  {echo 'company/images/'.$select_companyy_row['company_banner'];}  ?>" type="image/png" />
         
      <link rel="manifest" id="manifest-placeholder">
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <style>
         @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);
         div.stars {
         width: 270px;
         display: inline-block;
         }
         input.star { display: none; }
         label.star {
         float: right;
         padding: 10px;
         font-size: 36px;
         color: #444;
         transition: all .2s;
         }
         input.star:checked ~ label.star:before {
         content: '\f005';
         color: #FD4;
         transition: all .25s;
         }
         input.star-5:checked ~ label.star:before {
         color: #FE7;
         text-shadow: 0 0 20px #952;
         }
         input.star-1:checked ~ label.star:before { color: #F62; }
         label.star:hover { transform: rotate(-15deg) scale(1.3); }
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
      </style>
      <script>
         document.documentElement.style.setProperty('--theme-color', '#6495ED');
         document.documentElement.style.setProperty('--theme-color-light', '#34c32526');
      </script>
   </head>
   <?php 
      $card_card_background = 'company/images/'.$select_companyy_row['company_card_background']; 
      if (!empty($card_card_background)) {
             $body_style=  'style="background-image: url('.$card_card_background.');background-size:100%;background-attachment:fixed;"';  
         }else{
             $body_style= '';
         }    
      ?>
   <body <?= $body_style; ?>>
      <div class="page-wrapper" id="home-section" style="background-color: <?= $select_companyy_row['bg_color'] ?>;
         ">
          
          
          <div class="views-label"><i class="fas fa-eye"></i> Views: <b><?= $select_companyy_row['website_views'] ?></b></div>
          
          
         <?php 
            $card_banner=''; 
            if (!empty($select_companyy_row['company_banner'])){ 
                $card_banner = 'company/images/'.$select_companyy_row['company_banner']; 
            }else { 
                if (!empty($select_companyy_row['company_banner'])) {
                    $card_banner = 'company/images/'.$select_companyy_row['company_banner'];
                }
            } 
            
            if (!empty($card_banner)) {
                
            ?>
         <img alt="Banner" src="<?php echo $card_banner; ?>" style="width:100%;height: 205px;">
         <?php } ?>
         <div class="upper" >
         <div class="profile-pic-img" style="background:url('assets/img/border.png');background-size:100% 100%;height:200px;width:200px;">
		
            <img src="<?php if (!empty($select_companyy_row['company_logo'])) {echo 'company/images/'.$select_companyy_row['company_logo'];}
               else  {echo 'company/images/'.$select_companyy_row['company_banner'];}  ?>" class="<?= $select_companyy_row['company_name'] ?>" style="border-radius:50%;height:110px;width:110px;margin:50px 40px 40px 50px;background:white;">
            <!-- User Company Name -->
            
		</div>
            <div class="firmname" style="color: white;"><?= $select_companyy_row['company_name'] ?></div>
            <div style="width: 40%;background-color: #34c325; height:2px;"></div>
            <!-- User First Name and Last Name -->
            <div class="name" style="color: white;"><span style="margin-top: 5px;display: block"><i style="font-size: 12px; color: white;"><?= (($select_companyy_row['company_tagline'] == '')? '':'('.$select_companyy_row['company_tagline'].')') ?></i></span></div>
            <div class="round-contact-buttons">
               <a target="_blank" href="tel: <?= $select_companyy_row['company_contact'] ?> ">
               <i class="fas fa-phone fa-flip-horizontal contact-buttons-icon"></i>
               <span class="contact-buttons-text" style="color: white;">Call Me</span>
               </a>
               <a target="_blank" href="https://wa.me/<?= $select_companyy_row['company_whatsapp'] ?>?text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services.">
               <i class="fab fa-whatsapp contact-buttons-icon"></i>
               <span class="contact-buttons-text" style="color: white;">Whatsapp</span>
               </a>
               <a target="_blank" href="https://maps.google.com/?q=<?= $select_companyy_row['company_address'] ?>">
               <i class="fas fa-map-marker-alt fa-flip-horizontal contact-buttons-icon"></i>
               <span class="contact-buttons-text"style="color: white;">Direction</span>
               </a>
               <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $select_companyy_row['company_email'] ?>">
               <i class="fas fa-envelope fa-flip-horizontal contact-buttons-icon"></i>
               <span class="contact-buttons-text" style="color: white;">Mail</span>
               </a>
            </div>
         </div>
         <div class="lower">
            <table class="contact-action-table">
               <tbody>
                  <tr>
                     <td>
                        <a target="_blank" >
                        <i class="fas fa-map-marker-alt contact-action-container-icon"></i>
                        </a>
                     </td>
                     <td>
                        <a target="_blank"  class="contact-action-container-text" style="color: white;">
                      
                        <?= (($select_companyy_row['company_address'] == '')? 'Not Provided':$select_companyy_row['company_address']) ?>
                        </a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $select_companyy_row['company_email'] ?>">
                        <i class="fas fa-envelope contact-action-container-icon"></i>
                        </a>
                     </td>
                     <td>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $select_companyy_row['company_email'] ?>" class="contact-action-container-text" style="color: white;">
                        <?= $select_companyy_row['company_email'] ?>
                        </a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <a target="_blank" href="<?= $select_companyy_row['company_website_url'] ?>">
                        <i class="fas fa-globe contact-action-container-icon"></i>
                        </a>
                     </td>
                     <td>
                        <a target="_blank" href="<?= $select_companyy_row['company_website_url'] ?>" class="contact-action-container-text" style="color: white;">
                  
                        <?= (($select_companyy_row['company_website_url'] == '')? 'Not Provided':$select_companyy_row['company_website_url']) ?>
                        </a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <a target="_blank" href="tel:<?= $select_companyy_row['company_contact'] ?>">
                        <i class="fas fa-phone fa-flip-horizontal contact-action-container-icon"></i>
                        </a>
                     </td>
                     <td>
                        <a target="_blank" href="tel:<?= $select_companyy_row['company_contact'] ?>" class="contact-action-container-text" style="color: white;">
                         <?= (($select_companyy_row['company_contact'] == '')? 'Not Provided':$select_companyy_row['company_contact']) ?>
                        </a>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <a target="_blank" href="tel:<?= $select_companyy_row['company_whatsapp'] ?>">
                        <i class="fab fa-whatsapp  contact-action-container-icon"></i>
                        </a>
                     </td>
                     <td>
                        <a target="_blank" href="tel:<?= $select_companyy_row['company_whatsapp'] ?>" class="contact-action-container-text" style="color: white;">
                        <?= (($select_companyy_row['company_whatsapp'] == '')? 'Not Provided':$select_companyy_row['company_whatsapp']) ?>
                        </a>
                     </td>
                  </tr>
               </tbody>
            </table>
            <div class="p-20"></div>
            <div class="shadow-buttons">
               <a class="shadow-button" href="" download><i class="fas fa-download shadow-button-icon"></i>Add to Phone Book</a>
               <a  class="shadow-button" data-toggle="modal" data-target="#shareModal"><i class="fas fa-share-alt shadow-button-icon"></i>Share</a>
            </div>
            <div class="p-30"></div>
            <ul class="inprofile share-buttons">
               <li class="share-button">
                  <a target="_blank" href="<?= $select_companyy_row['company_facebook'] ?>"><i class="share-button-facebook fab fa-facebook-f"></i></a>
               </li>
               <li class="share-button">
                  <a target="_blank" href="<?= $select_companyy_row['company_twitter'] ?>"><i class="share-button-twitter fab fa-twitter"></i></a>
               </li>
               <li class="share-button">
                  <a target="_blank" href="<?= $select_companyy_row['company_instagram'] ?>"><i class="share-button-instagram fab fa-instagram"></i></a>
               </li>
               <li class="share-button">
                  <a target="_blank" href="<?= $select_companyy_row['company_whatsapp_link'] ?>">
                  <i class="share-button-whatsapp fab fa-whatsapp"></i></a>
               </li>
               <li class="share-button">
                  <a target="_blank" href="<?= $select_companyy_row['company_linkedin'] ?>"><i class="share-button-linkedin fab fa-linkedin-in"></i></a>
               </li>
            </ul>
            <div class="p-20"></div>
         </div>
      </div>
      <div class="section-container" id="about-us-section" <?= (($select_companyy_row['company_about'] == '')? 'style="display:none;"':'') ?>>
         <h2 class="section-header">About Us</h2>
         <div class="section-header-seperator"></div>
         <div class="about-us-text">
            <p><?= $select_companyy_row['company_about'] ?></p>
         </div>
         <div class="section-close"></div>
      </div>
      <?php
      $f = "SELECT * FROM `section` JOIN `section_category` ON `section_category`.`sec_id` = `section`.`section_category` WHERE `section`.`company_id` = '".$select_companyy_row['company_id']."' ";
    
         $section = $conn->query($f);
         while ($section_row = $section->fetch_assoc())
         {
         ?>
      <div class="section-container" id="products-services-section">
         <h2 class="section-header"><?= $section_row['name'] ?></h2>
         <div class="section-header-seperator" style="width: 130px;"></div>
         <div class="p-10"></div>
         <div>
            <div class="card">
               <h3 class="card-title"><?= $section_row['section_title'] ?></h3>
               <img alt="ICE CREAM" src="company/images/<?= $section_row['section_image'] ?>" style="height:220px;margin-bottom: 15px;"> 
               
               <div class="product-enquiry-section">
                  <div class="product-price">
                  </div>
                <div class="about-us-text">
                <p><?= $section_row['description'] ?></p>
                </div>              
                </div>
            </div>
         </div>
      </div>
      <?php
         }
         
         ?>
      <div class="section-container" id="feedback-section">
         <h2 class="section-header">Feedbacks</h2>
         <div class="section-header-seperator"></div>
         <div class="feedback-list">
         </div>
         <form class="feedback-form card" method="post" action="feedback.php">
            <div class="feedback-form-heading">Give Feedback</div>
            <div class="cont">
               <div class="stars">
                      <input class="star star-5" id="star-5-2" type="radio" value="5" name="star" />
                  <label class="star star-5" for="star-5-2"></label>
                  <input class="star star-4" id="star-4-2" type="radio" value="4" name="star" />
                  <label class="star star-4" for="star-4-2"></label>
                  <input class="star star-3" id="star-3-2" type="radio" value="3" name="star" />
                  <label class="star star-3" for="star-3-2"></label>
                  <input class="star star-2" id="star-2-2" type="radio"  value="2"   name="star" />
                  <label class="star star-2" for="star-2-2"></label>
                  <input class="star star-1" id="star-1-2" type="radio" value="1"  name="star" />
                  <label class="star star-1" for="star-1-2"></label>
               </div>
            </div>
            <input type="text" name="name" id="feedbackName" placeholder="Enter Full Name"/>
            <textarea name="msg" id="feedback" placeholder="Enter your feedback"></textarea>
            <input type="hidden" name="company_id" value="<?= $select_companyy_row['company_id']; ?>" />
            <input type="hidden" name="title" value="<?= $select_companyy_row['company_web_title']; ?>" />
            <input type="submit" value="Give Feedback"  name="company_feedback" />
         </form>
      </div>
      <div class="section-container" id="">
         <h2 class="section-header">Enquiry Form</h2>
         <div class="section-header-seperator" style="width: 120px;"></div>
         <form class="enquiry-form" method="post" action="inquiries.php">
            <!-- Full Name:<br/> -->
            <input type="text" name="enquiryName" placeholder="Enter Full Name"/><br/>
            <div class="flex">
               <div class="enquiry-phoneNumber">
                  <!-- Phone Number:<br/> -->
                  <input type="text" name="phone"  placeholder="Enter Phone Number"/><br/>
               </div>
               <div class="enquiry-email">
                  <!-- Email:<br/> -->
                  <input type="text" name="email"  placeholder="Enter Email"/><br/>
                  <input type="hidden" name="company_id" value="<?= $select_companyy_row['company_id']; ?>" />
                    <input type="hidden" name="title" value="<?= $select_companyy_row['company_web_title']; ?>" />
               </div>
            </div>
            <!-- Message:<br/> -->
            <textarea name="message"  placeholder="Enter Message"></textarea>
            <br/>
            <input type="submit" value="Send" name="query" />
         </form>
         <div class="section-close"></div>
      </div>
      <div class="copyright-wrapper">
         <div class="copyright-wrapper-inner">
            © 2020 <a href="index.html" target="_blank"><b>Ekaumbharat</b></a>
         </div>
      </div>
      <div id="shareModal" class="modal share-modal ">
         <div class="share-form fadeInUpBig center" style="margin-top:10px">
            <div class="share-form-header">
               <h3 class="share-form-header-text">Share Profile</h3>
               <span class="close" data-dismiss="modal">&times;</span>
            </div>
            <div class="share-form-buttons-container" style="align:center">
               <p>Share my Digital vCard in your network.</p>
               <div class="share-buttons-heading">
                  <img src="templates/template4/tild-arrow.svg" class="share-buttons-arrow">
                  <div class="share-buttons-heading-text">Share my Digital vCard</div>
               </div>
               <ul class="share-buttons">
                  <li class="share-button">
                     <a href="javascript:;" target="_blank" onclick="handleDirectWhatsappShare(this, 9407447733)">
                     <i class="share-button-whatsapp fab fa-whatsapp"></i>
                     </a>
                  </li>
                  <li class="share-button">
                     <a target="_blank" href="sms:?body=http://mycrd.in/Oyster ">
                     <i class="share-button-sms fas fa-comment-dots"></i>
                     </a>
                  </li>
                  <li class="share-button">
                     <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://mycrd.in/Oyster &amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                     <i class="share-button-facebook fab fa-facebook-f"></i>
                     </a>
                  </li>
                  <li class="share-button">
                     <a target="_blank" href="https://twitter.com/intent/tweet?text=http://mycrd.in/Oyster " data-size="large">
                     <i class="share-button-twitter fab fa-twitter"></i>
                     </a>
                  </li>
                  <li class="share-button">
                     <a target="_blank" href="http://pinterest.com/pin/create/link/?url=http://mycrd.in/Oyster ">
                     <i class="share-button-pinterest fab fa-pinterest-p"></i>
                     </a>
                  </li>
                  <li class="share-button">
                     <a target="_blank" href="mailto:?subject=Digital Card&amp;body=Check out this digital card http://mycrd.in/Oyster .">
                     <i class="share-button-mail fas fa-envelope"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <?php include('footer-link.php'); ?>
      
      
      <script type="text/javascript">
    $(document).ready(function() {
        $("#fedd").click(function() {
            
        var rating=   $("#rating").val();
        var feedbackName=   $("#feedbackName").val();
        var feedback=   $("#feedback").val();
        var company_id=   $("#company_id").val();
        
        var dataString = 'rating1='+ rating + '&feedbackName1='+ feedbackName + '&feedback1='+ feedback+ '&company_id='+ company_id;
        if(rating==''||feedbackName==''||feedback=='')
        {
        alert("Please Fill All Fields");
        }
        else
        {
        // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "ajaxsubmit.php",
        data: dataString,
        cache: false,
        success: function(result){
            $.alert({
                title: 'Feedback Form Submit successfully',
                content: result,
                type: 'blue',
                typeAnimated: true,
            });
         $('#myyform')[0].reset();
        }
        });
        }
    });
  });
</script>
      
      
      
</html>