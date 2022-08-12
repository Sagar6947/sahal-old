<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">




<?php
include "config.php";
if (isset($_POST['query'])) {
  $company_id = mysqli_real_escape_string($conn, $_POST['company_id']);
  $emp_id =  ((isset($_POST['emp_id'])) ? $_POST['emp_id'] : '');
  // 	$date = date("d/m/Y H:i a");
  $title = $_POST['title'];
  $name = mysqli_real_escape_string($conn, $_POST['enquiryName']);
  $number = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  $insert = "INSERT INTO `inquiry`(  `name`, `email`, `number`, `msg`, `emp_id`, `company_id`, `status`) VALUES ('$name','$email','$number','$message','$emp_id','$company_id',1)";

  if ($conn->query($insert)) {


?>

    <html>

    <body style="background-color:grey;">

      <div class="col-lg-12">

        <div>
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 33px;"><?= $title ?> Say’s </h4>
              </div>
              <div class="modal-body">
                <p style="font-size: 33px;">Your Enquiry is succesfully submitted. We Will contact You Soon</p>
              </div>
              <div class="modal-footer">

                <a href="https://SaharDirectory.com/<?= $title ?>" style="font-size: 33px;" class="btn btn-default">Close</a>

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