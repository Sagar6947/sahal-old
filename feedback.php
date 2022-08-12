
 
 
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          
         
<?php
  include "config.php";
if (isset($_POST['company_feedback'])) {
    // print_r($_POST);
    // exit;
    $title = $_POST['title'];
    $emp_id =  ((isset($_POST['emp_id']))? $_POST['emp_id']:'');
	$star = mysqli_real_escape_string($conn , $_POST['star']);
	$name = mysqli_real_escape_string($conn , $_POST['name']);
	$msg = mysqli_real_escape_string($conn , $_POST['msg']);
	$company_id = mysqli_real_escape_string($conn , $_POST['company_id']);

$insert="INSERT INTO `feedback`(  `name`, `msg`, `rating`, `company_id`,`emp_id`, `status`) VALUES ( '$name','$msg ','$star','$company_id','$emp_id',1)";
// echo $insert;
 if($conn->query($insert))
 {
 ?>
 <html>
     <body style="background-color:grey;">
        
             <div class="col-lg-12">
                 
                  <div   >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size: 33px;"><?= $title ?> say's</h4>
      </div>
      <div class="modal-body">
        <p style="font-size: 33px;">Your feedback is succesfully submitted.</p>
      </div>
      <div class="modal-footer">
        
	<a href="https://SaharDirectory.com/<?= $title ?>" style="font-size: 33px;" class="btn btn-default" >Close</a>
	 
      </div>
    </div>

  </div>
             </div>
         </div>
        
     </body>
 </html>


    <?php

	} 
	
}

 ?>
    

     
 