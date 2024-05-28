
<?php
require_once("../../common_files/databases/databases.php"); 
// if(empty($_COOKIE['_au_']))
// {
// header("Location:../../signin.php");
// exit;
// }
$keyword = $_GET['search'];

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
<div class="container-fluid">
<div class="row">
    <div  class="col-md-12 p-4 d-flex justify-content-between flex-wrap">
<?php
//search from title
$get_data = "SELECT * FROM products WHERE title LIKE '%$keyword%' LIMIT 12"; 
$response = $db->query($get_data);
if($response->num_rows != 0)
{
    while($data = $response->fetch_assoc())
    {
    echo "<div class='bg-white text-center border shadow-sm p-3 mb-4 '>";
    echo "<img src='../../".$data['thumb_pic']."' width='250' height='316'>";
    echo "<br><span class='text-uppercase font-weight-bold'>".$data['brands']. "</span>";
    echo "<br><span class='text-uppercase'>".$data['title']."</span>";
    echo "<br><span class='text-uppercase'><i class='fa fa-rupee'></i>".$data[ 'price']."</span>";

    echo "<br><button class='btn btn-danger mt-3 cart-btn mr-2'
    product-id='".$data['id']."' product-title='".$data['title']."' product-price='".$data['price']."' product-brand='".$data['brands']."' product-pic='".$data['thumb_pic']."'>
    <i class='fa fa-shopping-cart'></i> ADD TO CART</button>";

    echo "<button class='btn btn-primary mt-3 buy-btn' product-id='".$data['id']."' product-title='".$data['title']."' product-price='".$data['price']."' product-brand='".$data['brands']."'product-pic='".$data['thumb_pic']."'>
    <i class='fa fa-shopping-bag'></i> BUY NOW
    </button>";
    echo "</div>";
    }
}
else
{
//search from category_name start
$get_data = "SELECT * FROM products WHERE category_name LIKE '%$keyword%' LIMIT 12"; 
$response = $db->query($get_data);
if($response->num_rows != 0)
{
    while($data = $response->fetch_assoc())
    {
    echo "<div class='bg-white text-center border shadow-sm p-3 mb-4 '>";
    echo "<img src='../../".$data['thumb_pic']."' width='250' height='316'>";
    echo "<br><span class='text-uppercase font-weight-bold'>".$data['brands']. "</span>";
    echo "<br><span class='text-uppercase'>".$data['title']."</span>";
    echo "<br><span class='text-uppercase'><i class='fa fa-rupee'></i>".$data[ 'price']."</span>";

    echo "<br><button class='btn btn-danger mt-3 cart-btn mr-2'
    product-id='".$data['id']."' product-title='".$data['title']."' product-price='".$data['price']."' product-brand='".$data['brands']."' product-pic='".$data['thumb_pic']."'>
    <i class='fa fa-shopping-cart'></i> ADD TO CART</button>";

    echo "<button class='btn btn-primary mt-3 buy-btn' product-id='".$data['id']."' product-title='".$data['title']."' product-price='".$data['price']."' product-brand='".$data['brands']."'product-pic='".$data['thumb_pic']."'>
    <i class='fa fa-shopping-bag'></i> BUY NOW
    </button>";
    echo "</div>";
    }
}
else
{
//search from brand
$get_data = "SELECT * FROM products WHERE brands LIKE '%$keyword%' LIMIT 12"; 
$response = $db->query($get_data);
if($response->num_rows != 0)
{
    while($data = $response->fetch_assoc())
    {
    echo "<div class='bg-white text-center border shadow-sm p-3 mb-4 '>";
    echo "<img src='../../".$data['thumb_pic']."' width='250' height='316'>";
    echo "<br><span class='text-uppercase font-weight-bold'>".$data['brands']. "</span>";
    echo "<br><span class='text-uppercase'>".$data['title']."</span>";
    echo "<br><span class='text-uppercase'><i class='fa fa-rupee'></i>".$data[ 'price']."</span>";

    echo "<br><button class='btn btn-danger mt-3 cart-btn mr-2'
    product-id='".$data['id']."' product-title='".$data['title']."' product-price='".$data['price']."' product-brand='".$data['brands']."' product-pic='".$data['thumb_pic']."'>
    <i class='fa fa-shopping-cart'></i> ADD TO CART</button>";

    echo "<button class='btn btn-primary mt-3 buy-btn' product-id='".$data['id']."' product-title='".$data['title']."' product-price='".$data['price']."' product-brand='".$data['brands']."'product-pic='".$data['thumb_pic']."'>
    <i class='fa fa-shopping-bag'></i> BUY NOW
    </button>";
    echo "</div>";
    }
}
else
{
echo "item not available search other items";
}

}

}
?>
    </div>
</div>
</div>
<?php
include_once("../../assest/footer.php");
?>

</body>

</html>