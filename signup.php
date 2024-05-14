<?php
require_once("./common_files/databases/databases.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="common_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="common_files/css/font-awesome.min.css">
    <link rel="stylesheet" href="common_files/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="common_files/js/jquery.min.js"></script>
    <script src="common_files/js/bootstrap.bundle.min.js"></script>
    <script src="common_files/js/popper.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
   <!-- <script src="js/index.js"></script> -->


</head>

<body>

<?php
include_once("assest/nav.php");
?>

<div class="container p-5 bg-white shadow-lg" style="border:2px solid red">
<h2>CREATE AN ACCOUNT</h2>
<hr>
<div class="row">
<div class="col-md-6">
<form action="" class="signup-form">
<div class="form-group">
<label for="firstname">Firstname<sup class="text-danger">*</sup></label>
<input type="text" name="firstname" id="firstname" placeholder="
Mr raj" required="required" class="form-control bg-light" value="badal">
</div>
<div class="form-group">
<label for="lastname">lastname<sup class="text-danger">*</sup></label>
<input type="text" name="lastname" id="lastname" placeholder="
Mr raj" required="required" class="form-control bg-light"  value="kumar">
</div>
<div class="form-group">
<label for="email">email<sup class="text-danger">*</sup></label>
<input type="email" name="email" id="email" placeholder="
a@gmail.com" required="required" class="form-control bg-light"  value="badal@gmail.com">
</div>

 <div class="form-group">
<label for="Mobile">Mobile<sup class="text-danger">*</sup></label>
 <input  value="8520741963" type="number" name="mobile" id="Mobile" placeholder="****999" required="required" class="form-control bg-light">
</div>
<div class="form-group">
<label for="password">Password<sup class="text-danger">*</sup></label>
<input  value="1234" type="password" name="password" id="password" placeholder="*******" required="required" class="form-control bg-light">
</div>

<div class="form-group">
<button class="btn btn-primary shadow-sm py-2 register-btn" type="submit"> Register now</button>
</div>
</form>


<form class="d-none otp-form">

<div class="form-group">
<div class="btn-group border shadow-sm">
<button class="btn btn-light" type="button">
<input type="number" name="otp" placeholder=" 123456" class="form-control">
</button>
<button class="btn btn-light verify-btn" type="button">VERIFY</ button>
<button class="btn btn-light resend-btn" type="button">resend otp</button>
</div>
</div>
</form>





</div>
<div class="col-md-6"></div>
</div>
</div>

<?php
include_once("assest/footer.php");
?>


<script>
$(document).ready(function(){
$(".signup-form").submit(function(e){ e.preventDefault();

$.ajax({
type: "POST",
url: "pages/php/register.php",
data: new FormData (this),
processData: false,
contentType: false,
cache: false,
beforeSend: function(){
$(".register-btn").html("Please wait...");
},
success: function (response)
{
document.write(response)
}
});
});
});
</script>
</body>

</html>