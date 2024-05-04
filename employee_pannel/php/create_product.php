<?php
require_once("../../common_files/php/database.php");
$product_title = $_POST['title'];
$product_description = $_POST['description'];
$brands = $_POST['brands'];
//get category name 
$get_cat_name = "SELECT category_name FROM brands WHERE brands='$brands'"; $response = $db->query($get_cat_name);
if($response)
{
$data = $response->fetch_assoc();
}

$price = $_POST['price'];
$quantity = $_POST['quantity'];
$select_data = "SELECT * FROM products";
$response = $db->query($select_data);

$all_files = [$_FILES['thumb'], $_FILES['front'], $_FILES['top'], $_FILES['bottom'], $_FILES['left'], $_FILES['right']];
$length = count($all_files);
$dir = mkdir("../../stocks/".$data['category_name']."/".$brands."/".$product_title);
if($dir)
{
    for($i=0;$i<$length;$i++) {
        $file = $all_files[$i];
        $filename = $file['name'];
        $location = $file['tmp_name'];
        move_uploaded_file($location,"../../stocks/".$data['category_name']."/".$brands."/".$product_title."/".$filename);
        }
}

if($response)
{
$store_data = "INSERT INTO products ( brands, title, description, price, quantity) VALUES ('$brands', '$product_title', '$product_description', '$price', '$quantity')";
$response = $db->query($store_data);
if($response)
{
echo "success";

}

else
{
echo "Unable to store data  in products table";
}

}

else{
$create_table = "CREATE TABLE products(
id INT(11) NOT NULL AUTO_INCREMENT, brands VARCHAR(50),
title VARCHAR(100),
description VARCHAR(255),
price FLOAT (20),
quantity INT(10),
PRIMARY KEY(id)
)";
$response = $db->query($create_table);
if($response)
{
$store_data = "INSERT INTO products ( brands, title, description, price, quantity) VALUES ('$brands', '$product_title', '$product_description', '$price', '$quantity')";
$response = $db->query($store_data);
if($response)
{
echo "success";

}
else{
echo "Unable to store data  in products table";
}
}

else{
    echo "Unable to create products table"; 
}
}
?>