
<?php
require("../common_files/databases/databases.php")
?>
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
                <li class="border-left p-2 collapse-item" access-link="header_showcase_design.php">Header showcase</li>
                <li class="border-left p-2 collapse-item" access-link="category_showcase_design.php"> Category showcase</li>
            </ul>
            <button class="btn  w-100 text-left stock-update-btn w-100">
                <i class="fa fa-shopping-cart"></i>
                Stock update
                <i class="fa fa-angle-down close mt-2 "></i>
            </button>
            <ul class="collapse stock-update-btn-menu ">
                <li class="border-left p-2 collapse-item " access-link="create_category_design.php">create category</li>
                <li class="border-left p-2 collapse-item " access-link="create_brands_design.php">create Brand</li>
                <li class="border-left p-2 collapse-item " access-link="create_products_design.php">create Products</li>
            </ul>
        </div>
        <div class="page">
        <?php
$dir = ['top-left', 'bottom-left', 'center', 'top-right', 'bottom-right'];
 $top_left_image ="../common_files/images/small_sample.jpg";
  $top_left_label = "";

  $bottom_left_image = "../common_files/images/small_sample.jpg";
  $bottom_left_label = "";

  $center_image = "../common_files/images/large_sample.jpg";
  $center_label = "";

  $top_right_image = "../common_files/images/small_sample.jpg";
  $top_right_label = "";

  $bottom_right_image = "../common_files/images/small_sample.jpg";
  $bottom_right_label = "";



for($i=0;$i<count($dir); $i++)
{
$get_data = "SELECT * FROM category_showcase WHERE direction='$dir[$i]'"; 
$response = $db->query($get_data);
if($response)
{
$data = $response->fetch_assoc();
if($dir[$i] == "top-left")
{
if($response->num_rows != 0)
{
$top_left_image = "data:image/png;base64,".base64_encode($data['image']); $top_left_label = $data['label'];
}
}
else if($dir[$i] == "bottom-left")
{
    if($response->num_rows != 0)
{
$bottom_left_image = "data:image/png;base64,".base64_encode($data['image']); $bottom_left_label = $data['label'];}
}
else if($dir[$i] == "center")
{
    if($response->num_rows != 0)
{
$center_image = "data:image/png;base64,".base64_encode($data['image']); $center_label = $data['label'];}

}
else if($dir[$i] == "top-right")
{
    if($response->num_rows != 0)
    {
$top_right_image = "data:image/png;base64,".base64_encode($data['image']); $top_right_label = $data['label'];
    }
}
else if($dir[$i] == "bottom-right")
{
    if($response->num_rows != 0)
{
$bottom_right_image = "data:image/png;base64,".base64_encode($data['image']); $bottom_right_label = $data['label'];}
}
}
}
?>
    <!-- point -->

    <div class="row">
    <div class="col-md-4">
    <div class="position-relative">
<div class="btn-group  shadow-sm position-absolute" style="width :352px;z-index:10">

<button class="btn btn-dark">
<input type="file" accept="image/*" class="upload-icon
position-absolute form-control" style="width:100%; height:100%; border:1px solid red;top:0;left:0;opacity:0">
<i class="fa fa-upload"></i>
</button>

<button class="btn">
<input type="text" class="form-control upload-label" placeholder="Mobile" value="<?php echo $top_left_label;?>">
</button>
<button class="btn btn-dark set-btn" img-dir="top-left" disabled="disabled" >
SET
</button>
</div>
<img src="<?php echo $top_left_image;?>" alt="small sample" class="w-100 mb-3">
</div>


<div class="position-relative">
<div class="btn-group  shadow-sm position-absolute" style="width :352px;z-index:10">
<button class="btn btn-dark">
<input type="file" accept="image/*" class="upload-icon
position-absolute form-control" style="width:100%; height:100%; border:1px solid red;top:0;left:0;opacity:0">
<i class="fa fa-upload"></i>
</button>
<button class="btn">
<input type="text" class="form-control upload-label" placeholder="Mobile" value="<?php echo $bottom_left_label;?>">
</button>
<button class="btn btn-dark set-btn" img-dir="bottom-left" disabled="disabled">
SET
</button>
</div>
<img src="<?php echo $bottom_left_image;?>" alt="small sample" class="w-100 mb-3">
</div>
</div>

    
 
    <div class="col-md-4">
    <div class="position-relative">
<div class="btn-group  shadow-sm position-absolute" style="width :352px;z-index:10">
<button class="btn btn-dark">
<input type="file" accept="image/*" class="upload-icon
position-absolute form-control" style="width:100%; height:100%; border:1px solid red;top:0;left:0;opacity:0">
<i class="fa fa-upload"></i>
</button>
<button class="btn">
<input type="text" class="form-control upload-label" placeholder="Mobile" value="<?php echo $center_label;?>">
</button>
<button class="btn btn-dark set-btn" img-dir="center" disabled="disabled">
SET
</button>
</div>
<img src="<?php echo $center_image;?>" alt="large sample" class="w-100 mb-3">
</div>
    
    </div>
    <div class="col-md-4">

    <div class="position-relative">
<div class="btn-group  shadow-sm position-absolute" style="width :352px;z-index:10">
<button class="btn btn-dark">
<input type="file" accept="image/*" class="upload-icon
position-absolute form-control" style="width:100%; height:100%; border:1px solid red;top:0;left:0;opacity:0">
<i class="fa fa-upload"></i>
</button>
<button class="btn">
<input type="text" class="form-control upload-label" placeholder="Mobile" value="<?php echo $top_right_label;?>">
</button>
<button class="btn btn-dark set-btn" img-dir="top-right" disabled="disabled">
SET
</button>
</div>
<img src="<?php echo $top_right_image;?>" alt="small sample" class="w-100 mb-3">
</div>

<div class="position-relative">
<div class="btn-group  shadow-sm position-absolute" style="width :352px;z-index:10">
<button class="btn btn-dark">
<input type="file" accept="image/*" class="upload-icon 
position-absolute form-control" style="width:100%; height:100%; border:1px solid red;top:0;left:0;opacity:0">
<i class="fa fa-upload"></i>
</button>
<button class="btn">
<input type="text" class="form-control upload-label" placeholder="Mobile" value="<?php echo $bottom_right_label;?>">
</button>
<button class="btn btn-dark set-btn" img-dir="bottom-right" disabled="disabled">
SET
</button>
</div>
<img src="<?php echo $bottom_right_image;?>" alt="small sample" class="w-100 mb-3">
</div>
    </div>
        </div>
    </div>
    <!-- points sol-->


    </div>



    </div>

</body>



<script>
$(document).ready(function(){
$(".upload-icon").each(function(){
$(this).on("change", function(){
var upload_icon = this;
var dummy_pic = upload_icon.parentElement.parentElement.parentElement.getElementsByTagName("img")[0];
var input = upload_icon.parentElement.parentElement.getElementsByTagName("INPUT")[1];
var set_btn = upload_icon.parentElement.parentElement.getElementsByClassName("set-btn")[0];

// alert(dummy_pic.naturalWidth)
var dummy_pic_width = dummy_pic.naturalWidth;
var dummy_pic_height = dummy_pic.naturalHeight;
var file = upload_icon.files[0];
var url = URL.createObjectURL(file);
var image = new Image();
image.src = url;
var uploaded_width = "";
var uploaded_height = "";
image.onload = function(){
uploaded_width = image.width;
uploaded_height = image.height;

if(dummy_pic_width == uploaded_width && dummy_pic_height == uploaded_height)
{
// alert("done");
input.oninput = function(){
if(this.value.length >= 1)
{
    
set_btn.disabled = false;
set_btn.onclick = function(){
var formdata = new FormData(); 
formdata.append("photo", file); 
formdata.append("text", input.value);
formdata.append("direction", $(set_btn).attr("img-dir"));
// alert($(".set_btn").attr("img-dir"));
$.ajax({
type: "POST",
url: "php/category_showcase.php",
data: formdata,
processData: false,
contentType: false,
cache: false,
beforeSend: function(){
set_btn.innerHTML = "Please wait...";
},
success: function (response) { 

// alert(response);
if(response.trim() == "success")
{
dummy_pic.src = url;
set_btn.innerHTML = "SET";
$(upload_icon.parentElement.parentElement).addClass("d-none");
dummy_pic.ondblclick = function(){
$(upload_icon.parentElement.parentElement).removeClass("d-none");
}
}
}
});
}


}
else{
set_btn.disabled = true;
}
}


}
else{
alert("Please upload "+dummy_pic_width+"/"+dummy_pic_height);
}
}
});
});
});






//set btn enable and desable code
$(document).ready(function(){
var img = $("img");
var i;
for(i=0;i<img.length;i++)
{
if(img[i].src.indexOf("base64") != -1)
{
var set_btn = img[i].parentElement.getElementsByClassName("set-btn")[0];
set_btn.disabled = false;

$(".set-btn").each(function(){ 
    $(this).click(function(){

        set_btn=this;
        var input = this.parentElement.getElementsByTagName("INPUT");
var file =input[0].files[0];
var text = input[1].value;

var input = this.parentElement.getElementsByTagName("INPUT");
var file = input[0].files[0];
var text = input[1].value;
var dummy_pic = this.parentElement.parentElement.getElementsByTagName("img")[0];
var url = dummy_pic.src;
if(input[0].value !=""){
url=URL.createObjectURL(input[0].files[0]);
}
var formdata = new FormData(); 
formdata.append("photo", file); 
formdata.append("text", text);
formdata.append("direction", $(set_btn).attr("img-dir"));
// alert($(".set_btn").attr("img-dir"));
$.ajax({
type: "POST",
url: "php/category_showcase.php",
data: formdata,
processData: false,
contentType: false,
cache: false,
beforeSend: function(){
set_btn.innerHTML = "Please wait...";
},
success: function (response) { 

// alert(response);
if(response.trim() == "success")
{
dummy_pic.src = url;
 set_btn.innerHTML = "SET";
$(set_btn.parentElement).addClass("d-none");
dummy_pic.ondblclick = function(){
$(set_btn.parentElement).removeClass("d-none");
}
}
}
});


});
});


}
}
});
</script>
</body>

</html>

