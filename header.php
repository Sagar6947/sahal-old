<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
	<div class="container-fluid">       
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			<i class="ti-align-left"></i>
		</button>
		
		<!-- Start Header Navigation -->
		<div class="navbar-header">
			<a class="navbar-brand" href="https://SaharDirectory.com/">
				<img src="assets/img/logo-white.png" class="logo logo-display" alt="">
				<img src="assets/img/logo.png" class="logo logo-scrolled" alt="">
			</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar-menu">
			
			
			
			<ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
				<li class="active">
				<a href="https://SaharDirectory.com">Home</a>
				
				</li>
			
			<?php 
			if(isset($_SESSION["SaharDirectory_status"]) != '')
			{
				echo'
				
				<li >
				<a href="company/company-profile-edit.php" >My Profile</a>
				
				</li>
				<li class="">
				<a href="company/company-packages.php">Packages</a>
				
				</li>
			

					<li '.(($subscribe == false)? '':'class="dropdown"').'>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Employee '.(($subscribe == false)? $subs:'').'</a>
					<ul class="dropdown-menu animated fadeOutUp">
					<li><a href="company/add-employee.php">Add Employee</a></li>
					<li><a href="company/employee-list.php">Employee List</a></li>
					
					
					</ul>
					</li>

					<li><a href="'.(($subscribe == false)? '#':'company-inquiries.php').'">Inquiries '.(($subscribe == false)? $subs:'').'</a></li>
					
					<li><a href="'.(($subscribe == false)? '#':'company-feedback.php').'">Feedback '.(($subscribe == false)? $subs:'').'</a></li>

					<li><a href="company/logout.php">Logout</a></li>
				 
				';
			}


			else if(isset($_SESSION["ekaumbharat"]) != '')
			{
				echo'
				
				<li><a href="company/employee-details.php">My profile</a></li>
				<li><a href="company/employee-packages.php"  >Packages</a></li>
				<li><a href="company/'.(($subscribe == false)? '#':'employee-inquiry-list.php').'">Inquiries '.(($subscribe == false)? $subs:'').'</a></li>
					<li><a href="company/'.(($subscribe == false)? '#':'employee-feedback.php').'">Feedbacks '.(($subscribe == false)? $subs:'').'</a></li>
				<li><a href="company/employee-logout.php">Logout</a></li>
			
				';
			}
			else
			{

				echo'
			 
				<li><a href="company/company-packages.php"  >Prices</a></li>
				<li><a href="company/company-login.php"  >Company/Indvisual  Login</a></li>
				<li><a href="company/employee-login.php" >Employee Login</a></li>
				</ul>


				<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				<li class="no-pd"><a href="company/add-company.php" class="addlist"><i class="ti-user" aria-hidden="true"></i>Add Business</a></li>
 ';

			}
			?>
			

				</ul>
			

			
			
			
		</div>
		<!-- /.navbar-collapse -->
	</div>   
</nav>