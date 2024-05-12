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
<form class="header-showcase-form">
<div class="form-group">
<label for="title-image">Title image</label>
<input type="file" accept="image/*" name="title-image" id="title-image" class= "form-control">
</div>
<div class="form-group">
<label for="title-text">Title text</label>
<textarea class="form-control" rows="1" id="title-text" name="title-text"></textarea>
</div>
<div class="form-group">
<label for="subtitle-text">Subtitle text</label>
<textarea class="form-control" rows="5" id="subtitle-text" name="subtitle-text"></textarea>
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
<div class="showcase-formating">
<input type="color" class="color-selector" name="color-selector">
</div>
</div>
</div>

</div>



 </div>
    
</body>

<script>


$(document).ready(function(){
$(".target").click(function(event) {
var element = event.target;
var in_number = $(element).index();
sessionStorage.setItem("color_in_number", in_number);
 });
$(".color-selector").on("change", function(){
var color = this.value;
var in_number = Number(sessionStorage.getItem("color_in_number"));
var element = document.getElementsByClassName("target") [in_number];
element.style.color = color;
sessionStorage.removeItem("color_in_number");
});
});
</script>
</html>