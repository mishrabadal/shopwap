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
    <script src="pages/js/index.js"></script> 


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
a@gmail.com" value="" required="required" class="form-control bg-light email">
</div>


<div class="form-group">
<label for="password">Password<sup class="text-danger">*</sup></label>
<input type="password" value="" name="password" id="password" placeholder="*******" required="required" class="form-control bg-light">
</div>

<div class="form-group">
<button class="btn btn-primary shadow-sm py-2" type="submit">LOGIN now</button>
</div>
</form>
<form class="d-none otp-form">

<div class="form-group">
<div class="btn-group border shadow-sm">
<button class="btn btn-light" type="button">
<input type="number" name="otp" placeholder=" 123456" class="form-control otp">
</button>
<button class="btn btn-light verify-btn" type="button">VERIFY</button>
<button class="btn btn-light resend-btn" type="button">resend otp</button>
</div>
</div>


</form>
<div class="form-group login-notice"></div>
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



<script>
    $(document).ready(function(){
$(".signin-form").submit(function(e){
 e.preventDefault();
$.ajax({
type: "POST",
url: "pages/php/login.php",
data: new FormData (this),
processData: false,
contentType: false,
cache: false,
success: function(response)
{

if(response.trim() == "success")
{
$(".otp-form").removeClass("d-none");
$(".signin-form").addClass("d-none");
// verify otp
$(".verify-btn").click(function(){
$.ajax({
type: "POST",
url: "pages/php/verify_otp.php",
data : {
otp: $(".otp").val().trim(),
email: $(".email").val().trim()
},
beforeSend: function(){
$(this).html("Please wait..."); },
success: function (response)
{
    if(response.trim()=="success")
    {


        var notice = document.createElement("DIV");
notice.innerHTML = "<b>Mobile numberverified please login again</b>";
 notice.className = "alert alert-info"; 
 $(".login-notice").html(notice);
setTimeout(function() {
    window.location= "signin.php";
},3000);


}

else{
$(".verify-btn").html(response);
setTimeout(function(){
$(".verify-btn").html("VERIFY");
$(".otp").val('');
},3000);
}
}
});
});

// resend otp
// resend otp
$(".resend-btn").click(function(){
$.ajax({
type: "POST",
url: "pages/php/resend_otp.php",
data : {
mobile : $(".email").val()
},
success: function (response)
{
if(response.trim() == "success")
 {
 $(".resend-btn").html("OTP HAS BEEN SENDED");
 }
else{
 $(".resend-btn").html(response); 
 setTimeout(function(){
 $(".resend-btn").html("RESEND OTP"); 
 },3000);

}
}
});
});

}

else if(response.trim()=="login success"){
window.location="index.php";
}





else{
    var message = document.createElement("DIV"); message.innerHTML = "<b>"+response+"</b>";
message.className = "alert alert-warning";
$(".login-notice").html(message);
setTimeout(function(){
$(".login-notice").html('');
$(".signin-form").trigger('reset');
},3000);
}
}

});
});
});
</script>
</body>

</html>