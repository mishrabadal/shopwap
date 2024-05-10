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

<div class="container-fluid bg-white border-top" style="margin-top:100px">
<div class="container d-flex justify-content-between">
<div class="input-group w-50">
<input type="email" placeholder="email@gmail.com" name="subscribe-email" class="form-control">
<div class="input-group-append">
<span class="input-group-text">SUBSCRIBE</span>
</div>
</div>
<!-- pointgsolutin -->
<div class="btn-group">
<button class="btn btn-dark"> FOLLOW US  </button>
<button class="btn border px-3"><a href="#"><i class="fa fa-facebook"></i></a></button>
<button class="btn border px-3"><a href="#"><i class="fa fa-twitter"></i></a></button>
</div>
</div>
</div>


<div class="container-fluid bg-dark" >
<div class="container py-3">
<div class="row">
<div class="col-md-3">
<h5 class="text-light">CATEGORY</h5>
<?php
$get_menu = "SELECT category_name FROM category"; $get_menu_response = $db->query($get_menu); if($get_menu_response)
{
while($nav = $get_menu_response->fetch_assoc())
{
echo "<a href='#' class=' d-block py-2 text-uppercase'>".$nav ['category_name']." </a>";
}
}
?>
</div>
<div class="col-md-1"></div>
<div class="col-md-3">
<h5 class="text-light">POLICIES</h5>
<a href="#" class="d-block py-2">Privacy policiy</a>
<a href="#" class="d-block py-2">Cookies policiy</a>
<a href="#" class="d-block py-2">Terms & conditions</a>
</div>
<div class="col-md-1"></div>
<div class="col-md-4">

<h5 class="text-light">CONTACTS</h5>
<p class="text-light">Venue: dcscvdfvdfvdvd</p>
<p class="text-light">Call: dcscvdfvdfvdvd</p>
<p class="text-light">Email: dcscvdfvdfvdvd</p>
<p class="text-light">Website: dcscvdfvdfvdvd</p>
</div>
</div>
</div>
</div>
</body>

</html>