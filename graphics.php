<?php
include 'config.php';
$view = $select_companyy_row['website_views'];

$view = $view + 1;
$sal =   mysqli_query($conn, "UPDATE `company` SET `website_views` = '$view' WHERE`company_id` =  '" . $select_companyy_row['company_id'] . "' ");
$menu = '';

?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/plugins/css/plugins.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/responsiveness.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/main.css">
  <meta property="og:image" itemprop="image" content="<?php if (!empty($select_companyy_row['company_logo'])) {
                                                        echo 'company/images/' . $select_companyy_row['company_banner'];
                                                      } else {
                                                        echo 'company/images/' . $select_companyy_row['company_logo'];
                                                      } ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:description" content="<?php if (!empty($select_companyy_row['company_web_title'])) {
                                              echo $select_companyy_row['company_name'];
                                            } else {
                                              $select_companyy_row['company_web_title'];
                                            } ?>" />
  <title><?php if (!empty($select_companyy_row['company_web_title'])) {
            echo $select_companyy_row['company_name'];
          } else {
            $select_companyy_row['company_web_title'];
          } ?></title>
  <link rel="icon" href="<?php if (!empty($select_companyy_row['company_logo'])) {
                            echo 'company/images/' . $select_companyy_row['company_logo'];
                          } else {
                            echo 'company/images/' . $select_companyy_row['company_banner'];
                          }  ?>" type="image/png" />

  <meta name="description" content="<?= $select_companyy_row['company_about'] ?>
          " />
  <meta name="keywords" content="<?= $select_companyy_row['company_about'] ?>" />
  <meta name="author" content="<?php if (!empty($select_companyy_row['company_web_title'])) {
                                  echo $select_companyy_row['company_name'];
                                } else {
                                  $select_companyy_row['company_web_title'];
                                } ?>" />
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
.container {
  position: relative;
  text-align: center;
  color: white;
}

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

<body class="home-2" style="background-image: url('img/silvio-kundt-Fixg8KipOg8-unsplash.jpg');background-size:100%;background-attachment:fixed;">

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
                
                
                <div class="widget-boxed padd-15">
                  <div class="widget-boxed-body">

                    <div class="row"  >
                        <div class="col-sm-12"> 
                              <img src="img/impdays/6.jpg" alt="Snow" width="100%">
                              <div class="bottom-left" style="color:black;padding-left:12px;">www.webangeltech.com</div>
                              <div class="top-left"></div>
                              <div class="top-right" align="right" style="padding-top:10px;padding-right:10px;"><img src="assets/img/logo.png" alt="Snow" width="25%"></div>
                              <div class="bottom-right" style="color:black;padding-right:12px;">+91-9039005753</div>
                              <div class="centered"></div>
                            </div>
                      
                         
                    </div>
                      
                    <div class="p-20"></div>
                     </div>
                </div>
                
                 

                
                   

                  
              </div>




           

           
          <div class="detail-wrapper" id="feedback" <?= (($subscribe == false) ? 'style="display:none;"' : '') ?>>
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


          <div class="widget-boxed padd-10" style="text-align:center;">
            <h5> <i class="fa fa-eye"></i> Views: <b><?= $select_companyy_row['website_views'] ?></b></h5>
          </div>

          <div class="widget-boxed padd-0 sd" style="text-align:center; padding:10px;">


            <a href="https://SaharDirectory.com/company/add-company.php" style="color:white;" target="_blank" />Create Your Business Card
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


  <div class="footer-copyright" style="position:fixed;bottom:0;z-index:999;<?= (($subscribe == false) ? 'display:none;' : '') ?>">

    <!--<h5>Follow Us</h5>-->
    <ul class=" " style="text-align:center; overflow-y:scroll; ">
      <?php echo $menu; ?>

    </ul>

  </div>


  <script type="text/javascript">
    $("input[name=phone]").attr("maxlength", "10");
    $('.moblie-no').keypress(function(e) {
      var arr = [];
      var kk = e.which;

      for (i = 48; i < 58; i++)
        arr.push();

      if (!(arr.indexOf(kk) >= 0))
        e.preventDefault();
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
            <?php
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            ?>
            <!--<li><a target="_blank" href="<?= $select_companyy_row['company_facebook'] ?>"></a></li>-->
            <!--<li><a href="<?= $select_companyy_row['company_instagram'] ?>"><i class="fa fa-instagram"></i></a></li>-->
            <!--<li> <a target="_blank" href="<?= $select_companyy_row['company_twitter'] ?>"><i class="fa fa-twitter"></i></a></li>-->
            <!--<li> <a target="_blank" href="<?= $select_companyy_row['company_linkedin'] ?>"><i class="fa fa-linkedin"></i></a></li>-->
            <!--<li> <a target="_blank" href="<?= $select_companyy_row['company_whatsapp_link'] ?>"><i class="fa fa-whatsapp"></i></a></li>-->


            <li><a href="https://fb://profile/webangeltech/" target="_blank"><i class="fa fa-facebook"></i></a></li>

            <li><a href="http://twitter.com/share?url=<?= urlencode($actual_link) ?>&hashtags=<?= $select_companyy_row['company_name'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>

            <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=true&url=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>

            <li><a href="whatsapp://send?text=<?= urlencode($actual_link) ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
            <li><a href="https://t.me/share/url?url=<?= urlencode($actual_link) ?>&text=Please Visit our page" target="_blank"><i class="fa fa-telegram"></i></a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="showmodel" tabindex="-1" role="dialog" aria-hidden="true" style="top:10%">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <span class="imageshowclose">&times;</span>
        <div class="modal-body">

          <img src="" id="mydiv" style="width:100%;" />
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


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/js/bootstrap.min.js"></script>
  <script src="assets/plugins/js/bootsnav.js"></script>
  <script src="assets/plugins/js/bootstrap-select.min.js"></script>
  <script src="assets/plugins/js/bootstrap-touch-slider-min.js"></script>
  <script src="assets/plugins/js/jquery.touchSwipe.min.js"></script>

  <!-- Custom Js -->
  <script src="assets/js/custom.js"></script>
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
  <script src="assets/js/gmap3.min.js"></script>
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