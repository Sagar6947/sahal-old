<?php


$default = "SELECT * FROM `social_links` WHERE `id` = '1'";
$pr = mysqli_query($conn, $default);
$link = mysqli_fetch_array($pr);


?>


<footer class="footer dark-footer dark-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="footer-widget">
					<h3 class="widgettitle widget-title">About Us</h3>
					<p>Digital Impression, The First Impression
						Rewari Sahar Helps You To Get A Digital Impression Via Generating Your Company VCard Along With Your Employees VCard Here That Is Smart & Elegant.</p>

				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="footer-widget">
					<h3 class="widgettitle widget-title">Legal Pages</h3>
					<ul class="footer-navigation sinlge">

						<li><a href="<?= website_url ?>legal_pages/disclaimer.php">Disclaimer</a></li>
						<li><a href="<?= website_url ?>legal_pages/privacy_policy.php">Privacy Policy</a></li>
						<li><a href="<?= website_url ?>legal_pages/refund_policy.php">Refund Policy</a></li>
						<li><a href="terms&condition.php">Terms & Condition </a></li>
					</ul>
				</div>
			</div>


			<div class="col-md-3 col-sm-6">
				<div class="footer-widget">
					<h3 class="widgettitle widget-title">Important Links</h3>
					<ul class="footer-navigation sinlge">
						<li><a href="<?= website_url ?>legal_pages/about-SaharDirectory.php">About Us</a></li>
						<li><a href="<?= website_url ?>legal_pages/blog-SaharDirectory.php">Blogs</a></li>
						<li><a href="<?= website_url ?>company/company-packages.php">Packages</a></li>
						<li><a href="<?= website_url ?>company/add-company.php">Add Business</a></li>

					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="footer-widget">
					<div class="textwidget">
						<h3 class="widgettitle widget-title">Get In Touch</h3>
						<div class="address-box">

							<div class="sing-add">
								<i class="ti-email"></i><?= $link['email'] ?>
							</div>
							<div class="sing-add">
								<i class="ti-mobile"></i><?= $link['phone'] ?>
							</div>
							<div class="sing-add">
								<a href="https://wa.me/<?= $link['whatsaap'] ?>?text=Want%20to%20know%20more%20about%20your%20Vcard" style="color:#b0bed1"><i class="fa fa-whatsapp" aria-hidden="true"></i> <?= $link['whatsaap'] ?> </a>
							</div>
							<div class="sing-add">
								<i class="ti-world"></i><?= $link['weburl'] ?>
							</div>
							<ul class="footer-social">
								<li><a href="<?= $link['fb'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>


								<li><a href="<?= $link['instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>


								<li><a href="<?= $link['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>

								<li><a href="<?= $link['telegram'] ?>" target="_blank"><i class="fa fa-telegram"></i></a></li>
								<li><a href="<?= $link['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?= $link['youtube'] ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>

							</ul>
						</div>

					</div>
				</div>
			</div>


		</div>
	</div>
	<div class="footer-copyright">
		<p style="text-transform: none;">Copyright @ <?= date("Y") ?> <a href="<?= $link['weburl'] ?>"><?= $link['weburl'] ?></a> </p>
		<div align='center'><a href='https://www.hit-counts.com/'><img src='https://www.hit-counts.com/counter.php?t=MTQ1NjYwMQ==' border='0' alt='logo redesign'></a><BR><a href='https://www.glowgraphics.co.uk/'></a></div>
	</div>
</footer>

<a id="back2Top" class="theme-bg" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel2">LogIn Your Company Account</h4>
				<button type="button" class="m-close" data-dismiss="modal" aria-label="Close">
					<i class="ti-close"></i>
				</button>
			</div>

			<div class="modal-body">

				<div class="wel-back">
					<h2>Welcome <span class="theme-cl">Back!</span></h2>
				</div>

				<form method="POST" action="login.php">

					<div class="form-group">
						<label>User Name</label>
						<input type="email" class="form-control" placeholder="Username" name="email">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="*******" name="password">
					</div>



					<div class="center">
						<input type="submit" class="btn btn-midium theme-btn btn-radius width-200" name="vbsubmit" />
					</div>

				</form>

			</div>

		</div>
	</div>
</div>


<style>
	.float {
		position: fixed;
		width: 60px;
		height: 60px;
		bottom: 40px;
		right: 40px;
		background-color: #25d366;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		font-size: 30px;
		box-shadow: 2px 2px 3px #999;
		z-index: 100;
	}

	.my-float {
		margin-top: 16px;
	}
</style>


<a href="https://api.whatsapp.com/send?phone=+91 <?= $link['whatsaap'] ?>&text=I have a Query" class="float" target="_blank">
	<i class="fa fa-whatsapp my-float"></i>
</a>