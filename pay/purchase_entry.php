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
//echo $time;

// $time = date("h:i:sa");
// echo $time;

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
        echo "success";
    }
    else{
    echo "unable to store data data in purchase table";
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
        echo "success";
    }
    else{
        echo $db->error;
    echo "unable to store data data in purchase table";
    }


}
else{
    echo $db->error;
echo "Unable to create table";
}

 }
}
// echo $id.$amount.$title.$brand.$qnt.$fullname.$mobile;

?>