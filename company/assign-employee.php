<?php 
include ("db_connect.php");

if (isset($_POST['assign_employee'])) {

 $c =  $_POST['employee'];
  
    if(!empty($c))
      {
        for($i = 0; $i < count($c); $i++)
      { 
            if(!empty($c[$i]))
            {
$sal =mysqli_query($conn,"INSERT INTO `assign_employee`( `section_id`, `employee_id`, `company_id`) VALUES  ('".$_GET['id']."', '".$c[$i]."', '".$company."')");

}
    }
 echo'<script>window.location="assign-employee.php?id='.$_GET['id'].'"</script>';

  }

	else
	{
		echo'<script>alert("Not Inserted")</script>';

	}


}

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
	<title> Assign Employee | SaharDirectory</title>

	<?php include('header-link.php'); ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script type="application/javascript">
		$(document).ready(function(){
			//group add limit
			var maxGroup = 200;
			
			//add more fields group
			$(".addMore").click(function(){
				if($('body').find('.fieldGroup').length < maxGroup){
					var fieldHTML = '<div class="fieldGroup row">'+$(".fieldGroupCopy").html()+'</div>';
					$('body').find('.fieldGroup:last').after(fieldHTML);
				}else{
					alert('Maximum '+maxGroup+' groups are allowed.');
				}
			});
			
			//remove fields group
			$("body").on("click",".remove",function(){ 
				$(this).parents(".fieldGroup").remove();
			});
		});
		</script>
</head>
<body class="home-2">
	<div class="wrapper">  
		<?php include('header.php'); ?>
		<div class="clearfix"></div>


		<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
			<div class="container">
					<div class="title-content">
						<h1>Assign Section </h1>
						<div class="breadcrumbs">
							<a href="company-details.php">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Assign Section</span>
						</div>
					</div>
				</div>
		</section>
		<div class="clearfix"></div>
		<section class="padd-0">
			<div class="container">
				<div class="col-md-12 translateY-60 col-sm-12">
					<!-- General Information -->
					<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">

						<form method="post"  enctype="multipart/form-data"> 
							<div class="row mrg-r-10 mrg-l-10">
								<div class="fieldGroup row" >
								<div class="col-sm-8">
                       <select class="form-control" name="employee[]" required="">
                       	<option value="">Select Employee</option>
                             <?php
                  
                 $q=mysqli_query($conn,"select * from employee WHERE company_id = '$company' ");

                   while($assign=mysqli_fetch_array($q))
                  {
                    ?>
                          <option value="<?= $assign['emp_id'] ?>"><?= $assign['emp_name'] ?></option>
                          <?php
                        }?>
                        
                        </select>
								</div>
								 <div class="col-sm-1">
								  	
								  	<a href="javascript:void(0)" class="form-control btn btn-primary addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"> </span>  </a>
								  </div>
								</div>

								<div class="fieldGroupCopy row" 
								style="display: none;">
								<div class="col-sm-8">
                       <select class="form-control" name="employee[]">
                       	 	<option value="">Select Employee</option>
                             <?php
                  $i=0;
                  $q=mysqli_query($conn,"select * from employee WHERE company_id = '$company' ");

                   while($assign=mysqli_fetch_array($q))
                  {
                    ?>
                          <option value="<?= $assign['emp_id'] ?>"><?= $assign['emp_name'] ?></option>
                          <?php
                        }?>
                        
                        </select>
								</div>
								 <div class="col-sm-1">
								  </br>
								  	<a href="javascript:void(0)" class="form-control btn btn-danger remove"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>  </a>
								  </div>
								</div>
								
								
							</div>
							<div class="col-sm-3">
									<br>
									<input type="submit" class="btn theme-btn" 
									name="assign_employee" value="Assign" />

								</div>
							</div>
						</form>
						
						<!-- End General Information -->
					</div>
				</div>
			</section>
			
			<section class="padd-top-20">
				<div class="container">
					
					<div class="row">
						  <?php
                  
                 $q=mysqli_query($conn,"SELECT * FROM `assign_employee` JOIN `employee`ON `employee`.`emp_id` = `assign_employee`.`employee_id` 
                    WHERE `assign_employee`.`section_id` = '".$_GET['id']."' ");

                   while($employee_row=mysqli_fetch_array($q))
                  {
                  	?>
						<div class="col-md-4 col-sm-6">
							<div class="listing-shot grid-style">
								
								<a href="listing-detail.html">
									<div class="listing-shot-img">
										<img src="images/employee/<?= $employee_row['image']; ?>" class="img-responsive" alt="<?= $employee_row['emp_name']; ?>" style="width:100%">
										<span class="approve-listing"><i class="fa fa-check"></i></span>
									</div>
									<div class="listing-shot-caption">
										<h4><?= $employee_row['emp_name']; ?></h4>
										<p class="listing-location"><?= $employee_row['emp_designation']; ?></p>
										
									</div>
								</a>
								<div class="listing-shot-info">
									<div class="row extra">
										<div class="col-md-12">
											<div class="listing-detail-info">
													<span><i class="fa fa-envelope" aria-hidden="true"></i><?= $employee_row['emp_email']; ?></span>
												<span><i class="fa fa-phone" aria-hidden="true"></i> <?= $employee_row['emp_no']; ?></span>

											<span>	<i class="fa fa-whatsapp mrg-r-5" aria-hidden="true"></i><?= $employee_row['emp_whatsapp_no']; ?></span>
												
											</div>
										</div>
									</div>
								</div>
								<div class="listing-shot-info rating">
									<div class="row extra">
										
										<div class="col-md-5 col-sm-5 col-xs-6 pull-right">
											<a href="assign-del.php?id=<?= $employee_row['assign_id'] ?>&&sec_id=<?=$employee_row['section_id']?> " class="detail-link">Remove Now</a>
										</div>
									</div>
								</div>
							</div>
<?php
}
?>					

	</div>
</div>
</div>
</section>

<script>
CKEDITOR.replace( 'editor1' );
</script>
	<script src="assets/js/select2.js"></script>
			
			<?php include('footer-link.php'); ?>
			<?php include('footer.php'); ?>
		</body>
		</html>