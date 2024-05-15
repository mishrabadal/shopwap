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