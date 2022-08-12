<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
	<div class="container-fluid">       
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			<i class="ti-align-left"></i>
		</button>
		
		<!-- Start Header Navigation -->
		<div class="navbar-header">
			<a class="navbar-brand" href="https://SaharDirectory.com">
				<img src="assets/img/logo-white.png" class="logo logo-display" alt="">
				<img src="assets/img/logo.png" class="logo logo-scrolled" alt="">
			</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar-menu">
			
			
			<ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
				<li >
				<a href="https://SaharDirectory.com" >Home</a>
				
				</li>
			
			<?php 
			if(isset($_SESSION["SaharDirectory_status"]) != '')
			{
				echo'
				
				<li >
				<a href="company-profile-edit.php" class="dropdown-toggle" data-toggle="dropdown">My Profile</a>
				
				</li>
	        	
				
					<li '.(($subscribe == 'falsed')? '':'class="dropdown"').'  >
					<a href="#" class="dropdown-toggle '.(($subscribe == 'falsed')? 'class="subsd"':'').'" data-toggle="dropdown">Employee '.(($subscribe == 'falsed')? $subs:'').'</a>
					<ul class="dropdown-menu animated fadeOutUp">
					<li><a href="add-employee.php">Add Employee</a></li>
					<li><a href="employee-list.php">Employee List</a></li>
					 
					
					</ul>
					</li>

					<li><a href="'.(($subscribe == 'falsed')? '#':'company-inquiries.php').'" '.(($subscribe == 'falsed')? 'class="subsd"':'').'>Inquiries '.(($subscribe == 'falsed')? $subs:'').'</a></li>
					
					<li><a href="'.(($subscribe == 'falsed')? '#':'company-feedback.php').'" '.(($subscribe == 'falsed')? 'class="subsd"':'').'>Feedback '.(($subscribe == 'falsed')? $subs:'').'</a></li>
                    <li><a href="change_password_company.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				 
				';
			}


			else if(isset($_SESSION["ekaumbharat"]) != '')
			{
				echo'
				
				<li><a href="employee-details.php">My profile</a></li>
				<li><a href="employee-packages.php"  >Packages</a></li>
				<li><a href="'.(($subscribe == 'falsed')? '#':'employee-inquiry-list.php').'" '.(($subscribe == 'falsed')? 'class="subsd"':'').'>Inquiries '.(($subscribe == 'falsed')? $subs:'').'</a></li>
					<li><a href="'.(($subscribe == 'falsed')? '#':'employee-feedback.php').'" '.(($subscribe == 'falsed')? 'class="subsd"':'').'>Feedbacks '.(($subscribe == 'falsed')? $subs:'').'</a></li>
					<li><a href="change_password_employee.php">Change Password</a></li>
				<li><a href="employee-logout.php">Logout</a></li>
			
				';
			}
			else
			{

				echo'
			 
				<li><a href="company-packages.php"  >Prices</a></li>
				<li><a href="company-login.php"  >Company/Indvisual  Login</a></li>
				<li><a href="employee-login.php">Employee Login</a></li>
				</ul>


				<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				<li class="no-pd"><a href="add-company.php" class="addlist"><i class="ti-user" aria-hidden="true"></i>Add Business</a></li>
 ';

			}
// 			<li><a href="javascript:void(0)" data-toggle="modal" data-target="#signin">Company Login</a></li>
			?>
			

				</ul>
			
			
		</div>
		<!-- /.navbar-collapse -->
	</div>   
</nav>