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

<div class="container p-5 bg-white shadow-lg "  style="border:2px solid red">
<h2>LOGIN WITH US</h2>
<hr>
<div class="row">
<div class="col-md-6">
<form action="" class="signin-form">

<div class="form-group">
<label for="email">email<sup class="text-danger">*</sup></label>
<input type="email" name="email" id="email" placeholder="
a@gmail.com" required="required" class="form-control bg-light">
</div>


<div class="form-group">
<label for="password">Password<sup class="text-danger">*</sup></label>
<input type="password" name="password" id="password" placeholder="*******" required="required" class="form-control bg-light">
</div>

<div class="form-group">
<button class="btn btn-primary shadow-sm py-2" type="submit">LOGIN now</button>
</div>
</form>


</div>
<div class="col-md-1"></div>
<div class="col-md-5">
<h4>NEW CUSTOMER</h4>
<p>If you don't have an accoutn please register with us</p>
<a href='signup.php' class="btn btn-danger py-2 my-3">Create an account</a>
</div>
</div>
</div>

<?php
include_once("assest/footer.php");
?>

</body>

</html>