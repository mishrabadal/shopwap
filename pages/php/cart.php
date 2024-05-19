<?php
require_once("../../common_files/databases/databases.php");
$id = $_POST['product_id'];
$title = $_POST['product_title'];
$brand = $_POST['product_brand'];
$price = $_POST['product_price'];
$pic = $_POST['product_pic'];
$username = base64_decode($_COOKIE['_au_']);
$get_data = "SELECT * FROM cart";
$response = $db->query($get_data);
if($response){
    $store_data = "INSERT INTO cart (product_id, product_title, product_price, product_brand, product_pic, username) VALUES('$id', '$title', '$price', '$brand', '$pic', '$username')";
    $response = $db->query($store_data);
    if($response)
    {
    echo "success";
    }
    else{
        echo $db->error;
    echo "Unable to store data";
    }
}
else{ 
    $create_table = "CREATE TABLE cart (
 id INT(11) NOT NULL AUTO_INCREMENT, 
 product_id INT(11),
product_title VARCHAR(150), 
product_price FLOAT (20), 
product_brand VARCHAR(150), 
product_pic VARCHAR(250), 
username VARCHAR(250),
PRIMARY KEY(id)
        )";
$response = $db->query($create_table);
if($response)
{
$store_data = "INSERT INTO cart (product_id, product_title, product_price, product_brand, product_pic, username) VALUES('$id', '$title', '$price', '$brand', '$pic', '$username')";
$response = $db->query($store_data);
if($response)
{
echo "success";
}
else{
echo "Unable to store data";
}

}
else{
echo "Unable to create cart table";
}
}
?>