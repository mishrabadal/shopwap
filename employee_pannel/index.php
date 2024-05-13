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
    <script src="js/iIndex.js"></script>


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
<label for="create-button">Create buttons</label>
<div id="create-button" class="input-group mb-2">
<input type="url" name="btn-url" class="form-control btn-url" placeholder="https://google.com">
<input type="text" name="btn-name" class="form-control btn-name" placeholder="Button 1">
</div>
</div>
<div class="input-group mb-2">
<div class="input-group-prepend">
<span class="input-group-text">BG COLOR</span>
</div>
<input type="color" name="btn-bgcolor" class="form-control btn-bgcolor">
<div class="input-group-prepend">
<span class="input-group-text">TEXT COLOR</span>
</div>
<input type="color" name="btn-textcolor" class="form-control btn-textcolor">
</div>
<div class="input-group mb-2">
<div class="input-group-prepend">
<span class="input-group-text">SIZE</span>
</div>
<select class="form-control btn-size">
<option value="16px">small</option>
<option value="20px">medium</option>
<option value="24px">large</option>
</select>
<div class="input-group-append">
<span class="input-group-text bg-danger add-btn text-light" style="
cursor: pointer">Add</span>
</div>
</div>








<div class="form-group">
<button class="btn btn-primary py-2" type="submit">Add showcase</button>
</div>
</form>
</div>
<div class="col-md-1"></div>
<div class="col-md-7 p-4 bg-white rounded-lg shadow-sm position-relative showcase-preview d-flex">

<div class="title-box border border-success">
<h1 class="showcase-title target ">TITLE</h1>
<h4 class="showcase-subtitle target">SUBTITLE</h4>
<div class="title-buttons my-3">


</div>

</div>
<div class="showcase-formating d-flex justify-content-around align-items-center" >

<div class="btn-group">
<button class="btn btn-light">Color</button>
<button class="btn btn-light">
<input type="color" class="color-selector" name="color-selector">
</button>
</div>

<div class="btn-group">
<button class="btn btn-light">Font size</button>
<button class="btn btn-light">
<input type="range" min="100" max="500" class="font-size" name="font-size">
</button>
</div>

<button class="btn btn-light dropdown-toggle" data-toggle="dropdown"> <span>Alignment</span>
<div class="dropdown-menu">
<span class="dropdown-item alignment" align-position="h" align-value=" flex-start">LEFT</span>
<span class="dropdown-item alignment" align-position="h" align-value=" center">CENTER</span>
<span class="dropdown-item alignment" align-position="h" align-value=" flex-end">RIGHT</span>
<span class="dropdown-item alignment" align-position="v" align-value=" flex-start">TOP</span>
<span class="dropdown-item alignment" align-position="v" align-value=" center">V-CENTER</span>
<span class="dropdown-item alignment" align-position="v" align-value=" flex-end">BOTTOM</span>
</div>
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
});

$(".font-size").on("input", function(){
var size = this.value;
var in_number = Number(sessionStorage.getItem("color_in_number"));
var element = document.getElementsByClassName("target") [in_number];
element.style.fontSize = size+"%";
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
    $(".showcase-form").submit(function(e){
     e.preventDefault();
     var title = document.querySelector(".showcase-title");
var subtitle = document.querySelector(".showcase-subtitle");
var file =document.querySelector("#title-image").files[0];
var title_size = "";
var title_color = "";

if(title.style.fontSize == "")
{
title_size = "300%";
}
else{
title_size = title.style.fontSize;
}
if(title.style.color == "")
{
title_color = "black";
}
else{ title_color = title.style.color;
} 
var subtitle_size = "";
var subtitle_color = "";
if(subtitle.style.fontSize == "")
{
subtitle_size = "200%";
}
else{
subtitle_size = subtitle.style.fontSize;
}
if(subtitle.style.color == "")
{
subtitle_color = "black";
}
else{
    subtitle_color  = subtitle.style.color;
}
var flex_box = document.querySelector(".showcase-preview");
var h_align = "";
var v_align = "";
if(flex_box.style.justifyContent == "")
{
h_align = "flex-start";
}
else{
h_align = flex_box.style.justifyContent;
}
if(flex_box.style.alignItems == "")
{
v_align = "flex-start";
}
else{
v_align = flex_box.style.alignItems;
}


var css_data = {
title_size: title_size,
title_color: title_color,
subtitle_size: subtitle_size,
subtitle_color : subtitle_color,
h_align: h_align,
v_align: v_align,
title_text: title.innerHTML,
subtitle_text: subtitle.innerHTML,
buttons : $(".title-buttons").html().trim()
};
var formdata = new FormData();
formdata.append("file_data",file);
formdata.append("css_data",JSON.stringify(css_data));

console.log(css_data);
$.ajax({
type: "POST",
url: "php/header_showcase.php",
data: formdata,
processData: false,
contentType: false,
cache: false,
success: function(response){
    document.write(response);

}
});
});
});

// aligment
$(document).ready(function(){
$(".alignment").each(function(){
$(this).click(function(){
var align_position = $(this).attr("align-position");
var align_value = $(this).attr("align-value");
if(align_position == "h")
{
$(".showcase-preview").css({
justifyContent : align_value
});
}
else if(align_position == "v")
{
$(".showcase-preview").css({
alignItems : align_value
});
}
});
});
});

//add button in showcase

$(document).ready(function(){
$(".add-btn").click(function(){
var button = document.createElement("BUTTON");
button.className = "btn mr-2";
var a = document.createElement("A");
a.href = $(".btn-url").val();
a.innerHTML = $(".btn-name").val();
a.style.color = $(".btn-textcolor").val();
a.style.fontSize = $(".btn-size").val();
button.style.backgroundColor = $(".btn-bgcolor").val();
button.append(a);
// $(".title-buttons").append(button);

var title_buttons = document.querySelector(".title-buttons");
var title_child = title_buttons.getElementsByTagName("BUTTON");
var button_length = title_child.length;

if(button_length == 0 || button_length == 1)
{
$(".title-buttons").append(button);

}
else{
alert("Only two buttons are allowed");
}

});
 });
</script>
</html>