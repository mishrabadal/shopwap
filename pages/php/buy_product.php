<?php



?>

<?php
require_once("../../common_files/databases/databases.php"); 
if(empty($_COOKIE['_au_']))
{
header("Location:../../signin.php");
exit;
}
$id = $_GET['id'];
$username = base64_decode($_COOKIE['_au_']);
//echo $username;
$get_product = "SELECT * FROM products WHERE id='$id'";
$response = $db->query($get_product);
$title = "";
$description = "";
$price = "";
$brand = "";
$category=""; 

$stocks = "";
$front_pic = "";
$back_pic = "";
$left_pic = "";
$right_pic ="";



if($response)
{
$data = $response->fetch_assoc();
$title = $data['title'];
$description = $data['description'];
$price = $data['price'];
$brand = $data['brands'];
$category = $data['category_name'];
$stocks = $data['quantity'];
$front_pic = $data['front_pic'];
$back_pic = $data['back_pic'];
$left_pic = $data['left_pic']; 
$right_pic = $data['right_pic'];



}

// activate cart button
$cart_btn = "";
$get_cart = "SELECT * FROM cart WHERE product_id='$id' AND username='$username'";
$response = $db->query($get_cart);
if($response->num_rows != 0)
{
$cart_btn = "";
}
else{
    $cart_btn = "<button class='btn btn-danger mt-3 cart-btn' product-id='".$data['id']."' product-title='".$data['title']."' product-price='".$data['price']."' product-brand='".$data['brands']."' product-pic='".$data['thumb_pic']."'><i class='fa fa-shopping-cart ' ></i> ADD TO CART</button>";
}









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../../common_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../common_files/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../common_files/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="../../common_files/js/jquery.min.js"></script>
    <script src="../../common_files/js/bootstrap.bundle.min.js"></script>
    <script src="../../common_files/js/popper.min.js"></script>
    <script src="../../pages/js/index.js"></script>

   <!-- <script src="js/index.js"></script> -->


</head>

<body>

<?php
include_once("../../assest/nav.php");
?>
<div class="container" >

<a href="#" class="text-capitalize"><?php echo $category; ?></a>
>
<a href="#" class="text-capitalize"><?php echo $brand; ?></a>
>
<a href="#" class="text-capitalize"><?php echo $title; ?></a>
<div class="row mt-3">
<div class="col-md-6 bg-white border">
<img src="<?php echo "../../".$front_pic;?>" width="300" class="mb-3 preview">

<br>
<img src="<?php echo "../../".$back_pic;?>" width="80" class="border shadow-sm thumb-pic">
<img src="<?php echo "../../".$left_pic;?>" width="80" class="border shadow-sm thumb-pic">
<img src="<?php echo "../../".$right_pic;?>" width="80" class=" border shadow-sm thumb-pic">



</div>
<div class="col-md-6 bg-white py-4" style="border-left:5px solid #F8E9FA">
    
<h4 class="p-0 m-0 text-capitalize mt-2"><?php echo $title; ?></h4>
<p class="p-0 m-0"><?php echo $brand?></p>
<p><i class="fa fa-rupee"></i><?php echo $price; ?></p>
<h4>Description</h4>
<?php echo $description; ?>
<h4>Quantity</h4>
<input type="number" class="form-control quantity mb-3" style="
width:80px" value="1">

<h4>Pay mode</h4>
<input type="radio" name="pay-mode" value="online"> ONLINE
<input type="radio" name="pay-mode" value="cod"> CASH ON DELIVERY<br>
<?php 
echo $cart_btn;
?>

<button class="btn btn-primary purchase-btn" product-id="<?php echo $_GET['id']?>" product-title="<?php echo $title;?>" product-brand="<?php echo $brand;?> " product-price="<?php echo $price;?> ">BUY NOW</button>
</div>


</div>
</div>

</div>
<?php
include_once("../../assest/footer.php");
?>

</body>

</html>