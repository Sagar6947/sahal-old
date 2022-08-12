<?php include 'db_connect.php';

$def = "SELECT * FROM `defaults` WHERE `id` = '1'";
$pr = mysqli_query($conn, $def);
$default = mysqli_fetch_array($pr);


  $select_category = $conn->query("SELECT * FROM `company_category` WHERE `cate_id`= '" . $company_detail['company_category'] . "' ");
  $category = $select_category->fetch_array();


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
	<meta property="og:image" itemprop="image" content="<?php if (!empty($company_detail['company_logo'])) {
															echo 'images/' . $company_detail['company_logo'];
														} else {
															echo 'images/' . $company_detail['company_banner'];
														} ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<?php if (!empty($company_detail['company_web_title'])) {
													echo $company_detail['company_name'];
												} else {
													$company_detail['company_web_title'];
												} ?>" />
	<title><?php if (!empty($company_detail['company_web_title'])) {
				echo $company_detail['company_name'];
			} else {
				$company_detail['company_web_title'];
			} ?></title>
	<link rel="icon" href="<?php if (!empty($company_detail['company_logo'])) {
								echo 'images/' . $company_detail['company_logo'];
							} else {
								echo 'images/' . $company_detail['company_banner'];
							}  ?>" type="image/png" />

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

		/* 
		.:hover {
			background-color: white;
		}

		. {
			background-color: white;
		} */


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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloulare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body class="home-2" style="background-image: url('../img/silvio-kundt-Fixg8KipOg8-unsplash.jpg');background-size:100%;background-attachment:fixed;">
	<div class="wrapper">
		<?php include('header.php'); ?>
		<?php include('company_edit_menu.php'); ?>
		<div class="clearfix"></div>
		<section class="list-detail">
			<div class="container">

				<div class="row">
					<div class="col-md-3 col-sm-12">

					</div>

					<div class="col-md-5 col-sm-12">

						<div class="sidebar">
							<div class="widget-boxed padd-0" style="background:none;border:none;">
								<!-- Booking listing or Space -->
								<div class="listing-shot grid-style no-shadow border-0 mrg-0" style="background:none;">
									<a href="#">
									    
									    <?php
									     if ($company_detail['company_type'] == '0') {
									         ?>
										<div class="listing-shot-img">
											<?php
											
											$card_banner = '';
											if (!empty($company_detail['company_banner'])) {
												$card_banner = 'images/' . $company_detail['company_banner'];
											} else {

												$card_banner = '../admin/images/'.$default['banner'] ;
											}

											if (!empty($card_banner)) {

											?>

												<img src="<?php echo $card_banner; ?>" class="img-responsive" alt="<?= $company_detail['company_name'] ?>" style="width:100%">
									
									
										<?php } 
										
										
										?>
											
											
											
										</div>
										
										<?php
										}
										?>
										

										<div class="edit-info mrg-bot-25 padd-bot-30 padd-top-25" id="intro" style="background:none;border:none;">
											<div class="widget-boxed-header" style="background:white;">
												<div class="row padd-20">

													<div class="col-sm-6">
														<a href="<?= website_url ?>sahar/<?= clean(strtolower(trim($company_detail["company_city"])))?>/<?= clean(strtolower(trim($category["category"]))) ?>/<?=  $company_detail['company_web_title'] ?>" class="btn theme-cl" target="_blank">click here to get url</a>
													</div>
													<div class="col-sm-2">
													</div>
													<div class="col-sm-4">
														<a href="edit-company.php" class="btn theme-cl"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
													</div>
												</div>

												<div class="listing-box-header" style="margin-bottom:0;">
													<div class="avater-box" style="border-radius:0px;text-align:center;width: 30%;">
														<img src="<?php if (!empty($company_detail['company_logo'])) {
																		echo 'images/' . $company_detail['company_logo'];
																	} else {
																		echo 'admin/images/'. $default['logo'];
																	}  ?>" alt="<?= $company_detail['company_name'] ?>" class="img-responsive  edit-avater" alt="<?= $company_detail['company_name'] ?>" />
													</div>
													<div class="listing-shot-caption">
														<h4><?= $company_detail['company_name'] ?></h4>
														<p class="listing-location"><?= (($company_detail['company_tagline'] == '') ? '' : '(' . $company_detail['company_tagline'] . ')') ?></p>
														<hr style="width: 40%;background-color: #34c325; height:2px;  " />

														<h4><?= $company_detail['company_person'] ?></h4>
														<p class="listing-location"><?= (($company_detail['company_designation'] == '') ? '' : '(' . $company_detail['company_designation'] . ')') ?></p>
													</div>
													<div class="listing-shot-info">
														<div class="row extra">
															<div class="col-md-12">
																<ul class="side-list-inline no-border social-side">
																	<li>
																		<a target="_blank" href="tel: <?= $company_detail['company_contact'] ?> " class="btn theme-cl"><img src="../img/call.png" height="20px" alt="call to <?= $company_detail['company_name'] ?>" /></a>
																	</li>
																	<li><a target="_blank" href="https://wa.me/<?= $company_detail['company_whatsapp'] ?>?text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services." class="btn theme-cl"><img src="../img/whatsapp.png" height="20px" alt="whatsapp to <?= $company_detail['company_name'] ?>" /></a></li>
																	<li><a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $company_detail['company_email'] ?>" class="btn theme-cl"><img src="../img/mail.png" height="20px" alt="Mail to <?= $company_detail['company_name'] ?>" /></a></li>
																	<li><a target="_blank" href="<?= $company_detail['company_address_url'] ?>" class="btn theme-cl"><img src="../img/location.png" height="20px" alt="Direction to <?= $company_detail['company_name'] ?>" /></a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="booking-price padd-15 ">
													<div class="preview-info-body">
														<ul class="social-info info-list">
															<li>
																<span> <i class="fa fa-map-marker" style="font-size:22px;"></i>&nbsp;&nbsp;
																	<span class="got"><?= (($company_detail['company_address'] == '') ? 'Not Provided' : $company_detail['company_address']) ?></p></span>
															</li>
															<li>
																<span><i class="fa fa-phone" style="font-size:22px;"></i>&nbsp;&nbsp;
																	<span class="got"> <?= (($company_detail['company_contact'] == '') ? 'Not Provided' : $company_detail['company_contact']) ?>&nbsp;,&nbsp;<?= (($company_detail['company_whatsapp'] == '') ? 'Not Provided' : (($company_detail['company_whatsapp'] == $company_detail['company_contact']) ? '' : $company_detail['company_whatsapp'])) ?></span>
																	<p class="got"> </p>
																</span>
															</li>
															<li>
																<span><i class="fa fa-envelope" style="font-size:22px;"></i>&nbsp;&nbsp;
																	<span class="got"><a href="mailto:<?= $company_detail['company_email'] ?> </a>"> <?= $company_detail['company_email'] ?> </a></span></span>
															</li>
															<li>
																<span><i class="fa fa-globe" style="font-size:22px;"></i>&nbsp;
																	<span class="got"><a href="<?= $company_detail['company_website_url'] ?>" target="_blank"> <?= (($company_detail['company_website_url'] == '') ? 'Not Provided' : $company_detail['company_website_url']) ?></a></span>
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
																										?> </span> </span>
															</li>
														</ul>


													</div>
												</div>
											</div>
											</br>
											<div class="widget-boxed padd-20">
												<div class="widget-boxed-header">
													<div class="row">
														<div class="col-sm-9">
															<h4 class="texttrans"> Connect with us</h4>
														</div>
														<div class="col-sm-3">
															<a <?= (($subscribe == false) ? 'class="subs"' : 'href="company-product.php"') ?> <i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
														</div>
													</div>
												</div>
												<div class="widget-boxed-body">
													<div class="side-list no-border">
														<!--<h4 class="texttrans">Connect with us</h4>-->
														<ul class="side-list-inline no-border social-side" style="text-align:center; border-bottom: 2px solid #f35d82;">
															<li><a target="_blank" href="<?= $company_detail['company_facebook'] ?>"><i class="fa fa-facebook theme-cl"></i></a></li>
															<li><a target="_blank" href="<?= $company_detail['company_instagram'] ?>"><i class="fa fa-instagram theme-cl"></i></a></li>
															<li> <a target="_blank" href="<?= $company_detail['company_twitter'] ?>"><i class="fa fa-twitter theme-cl"></i></a></li>
															<li> <a target="_blank" href="<?= $company_detail['company_linkedin'] ?>"><i class="fa fa-linkedin theme-cl"></i></a></li>
															<li> <a target="_blank" href="<?= $company_detail['company_whatsapp_link'] ?>"><i class="fa fa-whatsapp theme-cl"></i></a></li>
														</ul>
													</div><br>
												</div>
											</div>
											<div class="widget-boxed" id="about">

												<div class="widget-boxed-header">
													<div class="row padd-20">

														<div class="col-sm-6">
															<h4>About Us</h4>
														</div>
														<div class="col-sm-2">
														</div>
														<div class="col-sm-4">
															<a <?= (($subscribe == false) ? 'class="subs"' : 'href="about-us-edit.php"') ?> class="btn theme-cl" style="padding:10px;margin:0;border-radius:5px;"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
														</div>
													</div>

													<?php
													if ($company_detail['company_about'] == '') {
													} else {
														$menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white; " href="#about" class="texttrans"> About Us</a></li>';
													}
													?>
												</div>
												<div class="widget-boxed-body">
													<div class="side-list no-border">
														<p><?= $company_detail['company_about'] ?></p>
													</div>
												</div>
											</div>

											<?php
											$f = "SELECT * FROM `product` WHERE `company_id` = '" . $company_detail['company_id'] . "' LIMIT 4 ";

											$gallery = $conn->query($f);
											if (mysqli_num_rows($gallery) > 0) {


												$menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#product"  class="texttrans">Product</a></li>';
											}
											?>
											<div class="widget-boxed" id="product">
												<div class="widget-boxed-header">
													<div class="row">
														<div class="col-sm-6">
															<h4>Product</h4>
														</div>
														<div class="col-sm-2">
														</div>
														<div class="col-sm-4">
															<a <?= (($subscribe == false) ? 'class="subs"' : 'href="company-product.php"') ?> class="btn theme-cl" style="padding:10px;margin:0;border-radius:5px;"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
														</div>
													</div>
												</div>
												<div class="widget-boxed-body">
													<div class="side-list no-border gallery-box">
														<div class="row">
															<?php
															while ($gallery_fetch = $gallery->fetch_assoc()) {

																echo '
                           <div class="col-lg-12 padd-20" style="text-align:center; border-bottom: 2px solid #f35d82;">
                               
                              <img src="images/product/' . $gallery_fetch['product_image'] . '" class="img-responsive imageshow" data-value="images/product/' . $gallery_fetch['product_image'] . '" style="width:100%;border-radius:10px;" alt="' . $gallery_fetch['product_title'] . '" />
                               <div class="small-list-detail">
                                <h4>' . $gallery_fetch['product_title'] . ' (₹ ' . (($gallery_fetch['offer'] == 1) ? '<strike>' . $gallery_fetch['product_price'] . '</strike> ₹ ' . $gallery_fetch['offer_price'] : $gallery_fetch['product_price']) . ') </h4>
                                <h5 style="color:red;">' . (($gallery_fetch['offer'] == 1) ? 'Discount @ ' . $gallery_fetch['price_discount'] . ' %' : '') . '</h5><br>
                                <a target="_blank" href="https://wa.me/+91' . $company_detail['company_whatsapp'] . '?text=' . urlencode('Hi, I have query about ' . $gallery_fetch['product_title'] . '\'') . '" class="btn theme-cl" style="    padding: 10px 30px;margin:0;border-radius:5px;">Query Now</a>
                              </div>
                              
                           </div>';
															}
															?>
														</div>
													</div>
												</div>
											</div>
											<?php

											?>





											<div class="widget-boxed" id="payment">
												<div class="widget-boxed-header">
													<div class="row">
														<div class="col-sm-6">
															<h4>Payment Section </h4>
														</div>
														<div class="col-sm-2">
														</div>
														<div class="col-sm-4">
															<a <?= (($subscribe == false) ? 'class="subs"' : 'href="payment-details.php"') ?> class="btn theme-cl" style="padding:10px;margin:0;border-radius:5px;"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
														</div>
													</div>
												</div>
												<div class="widget-boxed-body">
													<div class="side-list no-border gallery-box">


														<div class="row">
															<?php
															$f = "SELECT * FROM `payment_details` WHERE `company_id` = '" . $company_detail['company_id'] . "'  ";

															$gallery = $conn->query($f);
															if (mysqli_num_rows($gallery) > 0) {


																$menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#payment"  class="texttrans">Payment</a></li>';
															}  ?>
															<?php
															while ($payment_fetch = $gallery->fetch_assoc()) {


															?>

																<?php if ($payment_fetch['qr1'] != '')
																	echo '<div class="col-lg-12 padd-20" style="text-align:center;  border-bottom: 2px solid #f35d82; ">     <img src="images/QR/' . $payment_fetch['qr1'] . '" class="img-responsive " style="width:100%; height: 400px; " alt="' . $payment_fetch['qr1_name'] . '" />
                                                                   <div class="small-list-detail">
                                    									<h4>' . $payment_fetch['qr1_name'] . '</h4>
                                    									<h5> ' . $payment_fetch['qr1_name'] . ' Number : ' . $payment_fetch['qr1_no'] . '  </h5>
                                    								</div>
                                    								</div>';
																?>

																<?php if ($payment_fetch['qr2'] != '')
																	echo '<div class="col-lg-12 padd-20" style="text-align:center;  border-bottom: 2px solid #f35d82; ">     <img src="images/QR/' . $payment_fetch['qr2'] . '" class="img-responsive " style="width:100%; height: 400px;" alt="' . $payment_fetch['qr2_name'] . '" />
                                                                   <div class="small-list-detail">
                                    									<h4>' . $payment_fetch['qr2_name'] . '</h4>
                                    									<h5> ' . $payment_fetch['qr2_name'] . ' Number :  ' . $payment_fetch['qr2_no'] . '  </h5>
                                    								</div> </div>';
																?>

																<?php if ($payment_fetch['qr3'] != '')
																	echo '  <div class="col-lg-12 padd-20" style="text-align:center;  border-bottom: 2px solid #f35d82; ">   <img src="images/QR/' . $payment_fetch['qr3'] . '" class="img-responsive " style="width:100%; height: 400px;alt="' . $payment_fetch['qr3_name'] . '" />
                                                                   <div class="small-list-detail">
                                    									<h4>' . $payment_fetch['qr3_name'] . '</h4>
                                    									<h4> ' . $payment_fetch['qr3_name'] . ' Number : ' . $payment_fetch['qr3_no'] . '  </h4>
                                    								</div> </div>';
																?>




																<div class="col-lg-12 padd-20" style="text-align:center;">
																	<h3>Bank details</h3>
																	<div class="widget-boxed padd-10" style="text-align:justify;">
																		<table class="table table-borderless">

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
										</div>






										<?php
										$f = "SELECT * FROM `section_category` WHERE `company_id` = '" . $company_detail['company_id'] . "' LIMIT 4 ";

										$section = $conn->query($f);
										if (mysqli_num_rows($section) > 0)
											while ($section_row = $section->fetch_assoc()) {

												if ($section_row['name'] != '') {
													$menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#' . str_replace(' ', '_', $section_row['name']) . '"  class="texttrans">' . $section_row['name'] . '</a></li>';
												}
										?>
											<div class="detail-wrapper" id="<?= str_replace(' ', '_', $section_row['name']) ?>">
												<div class="detail-wrapper-header">
													<h4 class="texttrans"><?= $section_row['name'] ?></h4>
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
																	<div class="row">
																		<div class="col-sm-8">
																			<h4><?= $section_fetch['section_title'] ?> </h4>
																		</div>
																		<div class="col-sm-4"> <a <?= (($subscribe == false) ? 'class="subs"' : 'href="section-edit.php?id=' . $section_fetch['section_id'] . '"') ?> class="btn theme-cl" target="_blank" style="padding:10px;margin:0;border-radius:5px;"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a></div>
																	</div>
																	<p><?= $section_fetch['description'] ?></p>
																	<img alt="" src="images/<?= $section_fetch['section_image'] ?>" class="img-responsive">
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
										else {
										?>
											<div class="detail-wrapper" id="">
												<div class="detail-wrapper-header">
													<div class="row">
														<div class="col-sm-6">
															<h4>Add section</h4>
														</div>
														<div class="col-sm-2">
														</div>
														<div class="col-sm-4">
															<a href="company-gallery.php" class="btn theme-cl" style="padding:10px;margin:0;border-radius:5px;"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
														</div>


													</div>
												</div>

											</div>
										<?php } ?>


										<div class="widget-boxed" id="gallery">
											<div class="widget-boxed-header">
												<div class="row">
													<div class="col-sm-6">
														<h4>Image Gallery</h4>
													</div>
													<div class="col-sm-2">
													</div>
													<div class="col-sm-4">
														<a <?= (($subscribe == false) ? 'class="subs"' : 'href="company-gallery.php"') ?> class="btn theme-cl" style="padding:10px;margin:0;border-radius:5px;"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
													</div>


												</div>

											</div>


											<div class="widget-boxed-body">
												<div class="side-list no-border gallery-box">
													<ul class="gallery-list">
														<?php
														$f = "SELECT * FROM `company_gallery` WHERE `company_id` = '" . $company_detail['company_id'] . "' LIMIT 6 ";

														$gallery = $conn->query($f);
														if (mysqli_num_rows($gallery) > 0) {


															$menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#gallery"  class="texttrans">Gallery</a></li>';

														?>
															<?php
															while ($gallery_fetch = $gallery->fetch_assoc()) {

																echo '
                                             <div class="col-sm-12">
													<a data-fancybox="gallery" href="images/gallery/' . $gallery_fetch['image'] . '" target="_blank">
													 <img src="images/gallery/' . $gallery_fetch['image'] . '" class="img-responsive" alt="' . $gallery_fetch['title'] . '" style="padding-bottom: 5px;" />
													</a>
												</div>
                                               ';
															}
															?>
														<?php
														}
														?>

													</ul>
												</div>
											</div>
										</div>



										<div class="widget-boxed" id="video">
											<div class="widget-boxed-header">
												<div class="row">
													<div class="col-sm-6">
														<h4>Video Gallery</h4>
													</div>
													<div class="col-sm-2">
													</div>
													<div class="col-sm-4">
														<a href="company-gallery.php" class="btn theme-cl" style="padding:10px;margin:0;border-radius:5px;"><i class="fa fa-fw fa-pencil-square" style="color:#f35d82;font-size:20px"></i> Edit</a>
													</div>
												</div>
											</div>
											<div class="widget-boxed-body">
												<div class="side-list no-border gallery-box">
													<div class="row ">
														<?php
														$f = "SELECT * FROM `company_video` WHERE `company_id` = '" . $company_detail['company_id'] . "' LIMIT 4 ";

														$gallery = $conn->query($f);
														if (mysqli_num_rows($gallery) > 0) {


															$menu .= '<li class="menubtn"><i class="fa fa-check-square-o" aria-hidden="true" style="color:white; "></i> <a style="color:white;" href="#video"  class="texttrans">Video</a></li>';

														?><?php
															while ($gallery_fetch = $gallery->fetch_assoc()) {

																echo '
                                                                    <div style="padding:10px;">
                                                                        
                                                                        <iframe width="100%" height="200px"  class="col-12"
                                                                                            src="https://www.youtube.com/embed/' . $gallery_fetch['video_path'] . '">
                                                                                            </iframe>
                                                                        
                                                                    </div>';
															}
															?>
													<?php
														}
													?>
													</div>
												</div>
											</div>
										</div>





								</div>

		</section>

	</div>
 
	<?php include('footer.php'); ?>
	<?php include('footer-link.php'); ?>
</body>

</html>