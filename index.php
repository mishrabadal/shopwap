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
    <!-- <link rel="stylesheet" href="css/index.css"> -->
   <!-- <script src="js/index.js"></script> -->

<style>
    .carousel-caption{
        line-height: 80px;
    }
</style>
</head>

<body>

<?php
include_once("assest/nav.php");
?>
<div class="container-fluid p-0">
<div class="carousel slide" data-ride="carousel" data-interval="2000">
<div class="carousel-inner">

<?php
$showcase = "SELECT * FROM header_showcase";
$response = $db->query($showcase);
if($response)
{
echo "";
while($data = $response->fetch_assoc())
{
    $h_align = $data['h_align'];
    $text_align = "";
if($h_align == "center")
{ $text_align = "text-center";
}
else{ 
    $text_align = "text-left";
}
    $v_align = $data['v_align'];
    $title_color = $data['title_color'];
    $title_size = $data['title_size'];
    $subtitle_color = $data['subtitle_color']; 
    $subtitle_size = $data['subtitle_size'];
    echo "<div class='carousel-item carousel-item-control'>";
    $image = "data:image/png;base64,".base64_encode($data['title_image']);
    echo "<img src='".$image."' class='w-100'>";
    echo "<div class='carousel-caption ".$text_align."d-flex h-100' style='justify-content:" .$h_align."; align-items:".$v_align."'>";
    echo "<div>";
    echo "<h1 style='color:".$title_color."; font-size:".$title_size."'>".$data['title_text']."</h1>";
    echo "<h4 style='color:".$subtitle_color."; font-size:".$subtitle_size."'> ".$data['subtitle_text']."</h4>";
    echo $data['buttons'];
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
}
?>
</div>
</div>
</div>


<!-- start category showcase -->


<div class="container animated swing">
<h4 class="my-4 text-center">TRENDING PRODUCT</h4>
<div class="row">
<?php
$dir = ['top-left', 'bottom-left', 'center', 'top-right', 'bottom-right'];
 $top_left_image ="";
  $top_left_label = "";

  $bottom_left_image = "";
  $bottom_left_label = "";

  $center_image = "";
  $center_label = "";

  $top_right_image = "";
  $top_right_label = "";

  $bottom_right_image = "";
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
$top_left_image = "data:image/png;base64,".base64_encode($data['image']); $top_left_label = $data['label'];
}
else if($dir[$i] == "bottom-left")
{
$bottom_left_image = "data:image/png;base64,".base64_encode($data['image']); $bottom_left_label = $data['label'];
}
else if($dir[$i] == "center")
{
$center_image = "data:image/png;base64,".base64_encode($data['image']); $center_label = $data['label'];

}
else if($dir[$i] == "top-right")
{
$top_right_image = "data:image/png;base64,".base64_encode($data['image']); $top_right_label = $data['label'];
}
else if($dir[$i] == "bottom-right")
{
$bottom_right_image = "data:image/png;base64,".base64_encode($data['image']); $bottom_right_label = $data['label'];
}
}
}


echo "<div class='col-md-4'>
<div class='position-relative mb-3'> 
<button class='btn bg-white p-2 shadow-1g border' style='position:absolute; top: 50%;left:50%; transform: translate(-50%,-50%);z-index:1000'>".$top_left_label."
</button>
<img src='".$top_left_image."' width='100%'>
</div>
<div class='position-relative mb-3'>
<button class='btn bg-white p-2 shadow-1g border' style='position:absolute;top: 50%; left:50%; transform: translate(-50%,-50%);z-index:1000'>".$bottom_left_label."</button>
<img src='".$bottom_left_image."' width='100%'></div></div>";


echo "<div class='col-md-4'>
<div class='position-relative mb-3'>
<button class='btn bg-white p-2 shadow-1g border' style='position:absolute;top:50%;left:50%; transform: translate(-50%,-50%); z-index: 1000'>".$center_label."
</button>
<img src='".$center_image."' width='100%'>
</div>
</div>";


echo "<div class='col-md-4'>
<div class='position-relative mb-3'>
<button class='btn bg-white p-2 shadow-1g border' style='position:absolute;top: 50%; left:50%; transform: translate(-50%,-50%);z-index:1000'>".$top_right_label."
</button>
<img src='".$top_right_image."' width='100%'>
</div>
<div class='position-relative mb-3'>
<button class='btn bg-white p-2 shadow-lg border' style='position:absolute;top: 50%; left:50%; transform: translate(-50%,-50%);z-index:1000'>".$bottom_right_label
."</button>
<img src='".$bottom_right_image."' width='100%'>
</div>
</div>";



?>
</div>

</div>









<!-- end category showcase -->

<?php
include_once("assest/footer.php");
?>
<script>
$(document).ready(function(){
     var carousel_item = document.querySelector(".carousel-item-control"); 
     $(carousel_item).addClass("active"); I
});
</script>
</body>

</html>