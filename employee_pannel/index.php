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
        <button class="btn  w-100 text-left collapse-item w-100 active" access-link="branding_design.php">
                <i class="fa fa-image"></i>
               Branding details
                <i class="fa fa-angle-down close mt-2 "></i>
            </button>
            <button class="btn w-100 text-left homepage-design-btn" style="font-size:20px"> <i class="fa fa-home"></i>
Homepage design <i class="fa fa-angle-down close mt-2 "></i>
</button>
<ul class="collapse homepage-design-collapse">
<li class="border-left p-2 collapse-item" access-link="header_showcase_design.php" >Header showcase</li>
<li class="border-left p-2 collapse-item" access-link="category_showcase_design.php"> Category showcase</li>
</ul>
            <button class="btn  w-100 text-left stock-update-btn w-100">
                <i class="fa fa-shopping-cart"></i>
                Stock update
                <i class="fa fa-angle-down close mt-2 "></i>
            </button>
            <ul class="collapse stock-update-btn-menu ">
                <li class="border-left p-2 collapse-item " access-link="create_category_design.php">create category</li>
                <li class="border-left p-2 collapse-item "  access-link="create_brands_design.php">create Brand</li>
                <li class="border-left p-2 collapse-item "  access-link="create_products_design.php">create Products</li>
            </ul>
        </div>
        <div class="page">
    
<div class="row">
<div class="col-md-4 p-4 bg-white rounded-1g shadow-sm">
<form class="header-showcase-form showcase-form">
<div class="form-group">
<label for="title-image">Title image<span> 200kb (1920*978)</span></label>
<input type="file" accept="image/*" name="title-image" id="title-image" class= "form-control">
</div>
<div class="form-group">
<label for="title-text">Title text<span class="title-limit"> 0 </span><span > /40 </span></label>
<textarea class="form-control" rows="1" id="title-text" name="title-text" maxlength="40"></textarea>
</div>
<div class="form-group">
<label for="subtitle-text">Subtitle text
<span class="subtitle-limit"> 0 </span><span > /100 </span>
</label>
<textarea class="form-control" rows="5" id="subtitle-text" name="subtitle-text" maxlength="100"></textarea>
</div>
<div class="form-group">
<button class="btn btn-primary py-2" type="submit">Add showcase</button>
</div>
</form>
</div>
<div class="col-md-1"></div>
<div class="col-md-7 p-4 bg-white rounded-lg shadow-sm position-relative showcase-preview">

<h1 class="showcase-title target ">TITLE</h1>
<h4 class="showcase-subtitle target">SUBTITLE</h4>
<div class="showcase-formating d-flex justify-content-around align-items-center" >
<!-- <input type="color" class="color-selector" name="color-selector"> -->
<div class="btn-group">
<button class="btn btn-light">Color</button>
<button class="btn btn-light">
<input type="color" class="color-selector" name="color-selector">
</button>
</div>

<div class="btn-group">
<button class="btn btn-light">Font size</button>
<button class="btn btn-light">
<input type="number" class="font-size" name="font-size">
</button>
</div>
<div class="btn-group">
<button class="btn btn-light">Align</button>
<button class="btn btn-light">
<i class="fa fa-align-left"></i>
</button>
<button class="btn btn-light">
<i class="fa fa-align-center"></i>
</button>
<button class="btn btn-light">
<i class="fa fa-align-left"></i>
</button>
</div>

</div>
</div>
</div>

</div>



 </div>
    
</body>

<script>


$(document).ready(function(){
    $(".target").each(function(){
        $(".target").click(function(event) {
var element = event.target;
var in_number = $(element).index();
sessionStorage.setItem("color_in_number", in_number);

var i;
for(i=0;i<$(".target").length;i++)
{
$(".target").css({
border:"",
boxShadow :"",
padding: "",
width: ""
});
$(this).css({
border: "5px solid red",
boxShadow: "0px 0px 3px grey",
padding: "2px",
width: "fit-content"
});
}
$(this).on("dblclick", function(){ 
    var i;
for(i=0;i<$(".target").length;i++) {
$(".target").css({
border: "",
boxShadow : "",
padding: "",
width: ""
});
}
});

 }); 
    });


$(".color-selector").on("change", function(){
var color = this.value;
var in_number = Number(sessionStorage.getItem("color_in_number"));
var element = document.getElementsByClassName("target") [in_number];
element.style.color = color;
sessionStorage.removeItem("color_in_number");
});
});


//title image upload
$(document).ready(function(){
$("#title-image").on("change", function(){
var file = this.files[0];
if(file.size < 200000)
{
    var url = URL.createObjectURL (file);
var image = new Image();
image.src = url;
image.onload = function(){
var o_width = image.width;
var o_height = image.height;
if(o_width == 1920 && o_height == 978)
{

image.style.width = "100%";
image.style.position = "absolute";
image.style.top = "0";
image.style.left = "0";
$(".showcase-preview").append(image);
}
else{
     alert("Please upload 1920*978px image");
}
}
}
else{
alert("Plaese upload leas than 200kb");
}
});
});


//taxtarea max length
$(document).ready(function(){
$("#title-text").on("input", function(){
var length = this.value.length;
$(".showcase-title").html(this.value);
$(".title-limit").html(length);
});
});
$(document).ready(function(){
$("#subtitle-text").on("input", function(){
var length = this.value.length;
$(".showcase-subtitle").html(this.value);
$(".subtitle-limit").html(length);
});

});


//add show case
$(document).ready(function(){
    $(".showcase-form").submit(function(e){ e.preventDefault();
$.ajax({
type: "POST",
url: "php/header_showcase.php",
data: new FormData(this),
processData: false,
contentType: false,
cache: false,
success: function(response){
    alert(response);

}
});
});
});
</script>
</html>