<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../common_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="../common_files/css/font-awesome.min.css">
    <link rel="stylesheet" href="../common_files/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../common_files/js/jquery.min.js"></script>
    <script src="../common_files/js/bootstrap.bundle.min.js"></script>
    <script src="../common_files/js/popper.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/iindex.js"></script>


</head>

<body>
    <div class="container-fluid">
        <div class="sidebar">
        <button class="btn  w-100 text-left stock-update-btn w-100">
                <i class="fa fa-image"></i>
               Branding details
                <i class="fa fa-angle-down close mt-2 "></i>
            </button>

            <button class="btn btn-danger w-100 text-left stock-update-btn w-100">
                <i class="fa fa-shopping-cart"></i>
                Stock update
                <i class="fa fa-angle-down close mt-2 "></i>
            </button>
            <ul class="collapse stock-update-btn-menu show">
                <li class="border-left p-2 collapse-item " access-link="create_category_design.php">create category</li>
                <li class="border-left p-2 collapse-item "  access-link="create_brands_design.php">create Brand</li>
                <li class="border-left p-2 collapse-item active"  access-link="create_products_design.php">create Products</li>
            </ul>
        </div>
        <div class="page">
    
        <div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 p-4 bg-white rounded-1g shadow-sm">
    


    <form class="branding-form">
    <div class="form-group ">
<label for="phone" class="font-weight-bold">enter brand name</label>
<input type="text" class="form-control w-100" name="brand-name" id="phone" placeholder="shopwap"> </div>

<div class="form-group ">
<label for="phone" class="font-weight-bold">Upload brand logo</label>
<input type="file" accept="image/*"  class="form-control w-100" name="brand-logo" id="brand-logo" > </div>

<div class="form-group ">
<label for="phone" class="font-weight-bold">enter domain name</label>
<input type="text" class="form-control w-100" name="domain-name" id="phone"  placeholder="www.shopwap.com" > </div>

<div class="form-group ">
<label for="phone" class="font-weight-bold">email</label>
<input type="text" class="form-control w-100" name="email" id="phone" placeholder="shopwap@gmail.com"> </div>
<div class="form-group ">
<label for="phone" class="font-weight-bold">social handle</label>
<input type="text" class="form-control w-100" name="facebook-url" id="phone" placeholder="facebook page url"> <input type="text" class="form-control w-100" name="twitter-url" id="phone" placeholder="twitter page url"></div>

<div class="form-group">
<label for="about-us" class="font-weight-bold">Addresss</label>
<textarea class="form-control"  name="address"></textarea>
</div>


<div class="form-group ">
<label for="phone" class="font-weight-bold">Phone</label>
<input type="text" class="form-control w-100" name="phone" id="phone" placeholder="1800 1200 4005"> </div>
<div class="form-group">
<label for="about-us" class="font-weight-bold">About us <small class="about-us-count"> 0 </small><small>/ 5000</small></label>
<textarea class="form-control"  name="about-us" maxlength="5000" id="about-us"></textarea>
</div>
<div class="form-group">
<label for="about-us" class="font-weight-bold">privacy policy <small class="privacy-count"> 0 </small><small>/ 5000</small> </label>
<textarea class="form-control"  name="privacy-policy" id="privacy-policy" maxlength="5000"></textarea>
</div>
<div class="form-group">
<label for="about-us" class="font-weight-bold">cookies policy <small class="cookies-count"> 0 </small><small>/ 5000</small> </label>
<textarea class="form-control"  name="cookies-policy" id="cookies-policy" maxlength="5000"></textarea>
</div>

<div class="form-group">
<label for="about-us" class="font-weight-bold">terms and condition </label>
<textarea class="form-control"  name="terms" id="cookies-policy" maxlength="5000"></textarea>
</div>

<button type="submit" class="branding-submit-btn btn btn-primary py-2">Submit your information</button>

</form>




</div>
<div class="col-md-2"></div>
</div>
</div>



        </div>
    </div>
</body>
<!-- textarea length count -->
<script>
$(document).ready(function(){
$("#about-us").on("input", function(){ 
    var length = $(this).val().length;
 $(".about-us-count").html(length); 

});
});


$(document).ready(function(){
$("#privacy-policy").on("input", function(){
var length = $(this).val().length;
$(".privacy-count").html(length);
});
});


$(document).ready(function(){
$("#cookies-policy").on("input", function(){
     var length = $(this).val().length;
      $(".cookies-count").html(length); 

});
});


// point solution 
// branding detail
$(document).ready(function(){
$(".branding-form").submit(function(e){
e.preventDefault();


var file = document.querySelector("#brand-logo"); 
var file_size = file.files[0].size; 
if(200000>file_size){
$.ajax({
type: "POST",
url: "php/branding.php",
data: new FormData(this),
processData: false,
contentType: false,
cache: false,
success: function(response)
{
document.write(response);
}
});
}
else{
    alert("upload pic less than 200kb");
}
});
});
</script>
</html>