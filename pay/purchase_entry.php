<?php
require_once("../common_files/databases/databases.php");
session_start();
$id = $_SESSION['buy_id'];
$amount = $_SESSION['buy_amount']/100;
$title=$_SESSION['buy_title'];
$brand = $_SESSION['buy_brand'];
$qnt=$_SESSION['buy_qnt'];
$fullname = $_SESSION['buy_fullname'];
$mobile = $_SESSION['buy_mobile'];
$username = base64_decode($_COOKIE['_au_']);
$address ="";
$address ="";
$state ="";
$pincode ="";
$country="";
$payment_id = $_SESSION['payment_id'];
//echo $payment_id;
$date = date('Y-m-d');

date_default_timezone_set('Asia/Kolkata');
$time = date( 'H:i:s A');

$qnt_stocks = "";
$message="";
// get stocks
$get_stocks = "SELECT quantity FROM products WHERE id='$id' AND brands='$brand'";
$response = $db->query($get_stocks);
if($response)
{
$data = $response->fetch_assoc();

$qnt_stocks = $data['quantity']- $qnt;
// echo $qnt_stocks;

}
// echo $db->error;
// exit;



$get_data = "SELECT * FROM users WHERE email='$username'";
$response = $db->query($get_data);
if($response)
{
$data = $response->fetch_assoc();
$address = $data['address'];
$state = $data['state'];
$pincode = $data['pincode'];
$country = $data['country'];
$purchase_entry = "SELECT * FROM purchase";
 $response = $db->query($purchase_entry );

 //main if else
 if($response){
    $store_data = "INSERT INTO purchase (product_id, title, brand, qnt ,amount, fullname, email, mobile, address, state, pincode, country,payment_id,purchase_date,purchase_time) VALUES ('$id', '$title', '$brand', '$qnt', '$amount', '$fullname ', '$username', '$mobile', '$address', '$state', '$pincode', '$country', '$payment_id', '$date','$time')";


    $response = $db->query($store_data); 
    if($response)
    {
        // echo "success";

        $delete_cart = "DELETE FROM cart WHERE product_id=' $id' AND username='$username'";
        $response = $db->query($delete_cart); if($response)
        {
        // echo "success";
        // update stocks
$update_stocks = "UPDATE products SET quantity= '$qnt_stocks' WHERE title='$title' AND brands='$brand'";
$response = $db->query($update_stocks);
if($response)
{
    $message = "success";
}
else {
    $message = "Unable to update stocks";
}
        }
        else{
        // echo "success";
        // update stocks
$update_stocks = "UPDATE products SET quantity= '$qnt_stocks' WHERE title='$title' AND brands='$brand'";
$response = $db->query($update_stocks);
if($response)
{
    $message = "success";
}
else {
$message = "Unable to update stocks";
}
        }


    }
    else{
        $message ="unable to store data data in purchase table";
    }
 }

 else{
    $create_table = "CREATE TABLE purchase ( 
    id INT(11) NOT NULL AUTO_INCREMENT,
    product_id INT(25), 
    title VARCHAR(250), 
    brand VARCHAR(100), 
    qnt INT(11), 
    amount FLOAT(25), 
    fullname VARCHAR(250), 
    email VARCHAR(255),  
    mobile INT(20), 
    address VARCHAR(255), 
    state VARCHAR(180), 
    pincode INT(20), 
    country VARCHAR(150),
    payment_id VARCHAR(100),
    purchase_date DATE,
    purchase_time TIME,
   
    PRIMARY KEY(id)
     )";

$response = $db->query($create_table); 
if($response)
{
    $store_data = "INSERT INTO purchase (product_id, title, brand, qnt ,amount, fullname, email, mobile, address, state, pincode, country,payment_id,purchase_date,purchase_time) VALUES ('$id', '$title', '$brand', '$qnt', '$amount', '$fullname ', '$username', '$mobile', '$address', '$state', '$pincode', '$country', '$payment_id', '$date','$time')";
    $response = $db->query($store_data); 
    if($response)
    {
        // echo "success";
        // update stocks
$update_stocks = "UPDATE products SET quantity= '$qnt_stocks' WHERE title='$title' AND brands='$brand'";
$response = $db->query($update_stocks);
if($response)
{
    $message = "success";
}
else {
    $message ="Unable to update stocks";
}
    }
    else{
        echo $db->error;
        $message = "unable to store data data in purchase table";
    }


}
else{
    echo $db->error;
    $message = "Unable to create table";
}

 }
}
// echo $id.$amount.$title.$brand.$qnt.$fullname.$mobile;

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

   <!-- <script src="js/index.js"></script> -->


</head>

<body>

<?php
//include_once("../assest/nav.php");
?>
<div class="container" >
 
<div class="jumbotron bg-white border-right border-top border-bottom shadow-sm" style="border-left:5px solid #47e20a">
<center>  

<?php
if($message == "success")
{echo '<i class="fa fa-check-circle" style="font-size:100px; color: #47e20a"></i>';}
else{
echo '<i class="fa fa-times-circle" style="font-size: 100px; color:red"></i>';
}
?>


<h2><?php echo $message ;?></h2>
<p>PLEASE OPEN YOUR EMAIL MORE INFORMATION</p>
<button class="btn btn-danger py-2 px-3">
    <a href="http://localhost/shopwap/index.php" class="text-decoration-none text-light">SHOP MORE</a>
</button>
</center>
</div>

</div>
<?php
//include_once("../assest/footer.php");
?>

</body>

</html>