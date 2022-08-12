<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Add Business | SaharDirectory </title>

</head>


<div class="col-sm-12" style="display:block;">
    <label>Your Name: <i><span style="color:red;font-size:12px;" id="person"></span></i></label>
    <input type="text" class=" form-control" placeholder="  Person name (Like : Name of CEO)" id="company_person_nm" value="" name="company_person" />
</div>


<h5 id="cmp_per_nm"><u>Company Person Name </u></h5>



<input type="text" name="" id="name" placeholder="Enter Your name here.." id="">

<div class="">Hello <span id="echoName"></span></div>

<script>
    $('#name').keyup(function() {
        var nm = $('#name').val();
        $('#echoName').html('<u>' + nm + '</u>');
    });
    $('#company_person_nm').keyup(function() {
        var nm = $('#company_person_nm').val();
        $('#cmp_per_nm').html(  nm );
    });
</script>

</body>

</html>