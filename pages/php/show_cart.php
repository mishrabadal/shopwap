<?php
require_once("../../common_files/databases/databases.php"); 
if(empty($_COOKIE['_au_']))
{
header("Location:../../signin.php");
exit;
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

   <!-- <script src="js/index.js"></script> -->


</head>

<body>

<?php
include_once("../../assest/nav.php");
?>
<div class="container" >
<div class="row">
<div class="col-md-8">
<div class="bg-white">

<?php
$username = base64_decode($_COOKIE['_au_']);
$get_data = "SELECT * FROM cart WHERE username= '$username'";
$response = $db->query($get_data);
if($response->num_rows != 0)
{
// echo "success";
while($data = $response->fetch_assoc())
{
echo "<div class='media border mb-3 shadow-sm'> <div class='media-left mr-2'>
<img src='../../".$data['product_pic']."'
width='100'>
</div>
<div class='media-body'>
<h5 class='text-capitalize p-0 m-0'>".$data['product_title']."</h5>
<span>".$data['product_brand']."</span><br>
<span><i class='fa fa-rupee'></i>".$data['product_price']."</span><br>
<div class='btn-group shadow-sm mt-2'>
<button class='btn btn-primary' product-id='"
.$data['product_id']."'><i class='fa fa-trash'></i></button>
<button class='btn btn-danger' product-id='".
$data['product_id']."'>BUY NOW</button>

</div>
</div>
</div>";
}











}
else{
echo "<h1 class='text-center' style='font-size:50px'><i class='fa fa-shopping-cart'></i> Your cart is empty</h1>";
}
?>
</div>

</div>
<div class="col-md-4">
<div class="bg-white">
testing-2
</div>
</div>
</div>

</div>
<?php
include_once("../../assest/footer.php");
?>

</body>

</html>