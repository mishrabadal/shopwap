<?php

require_once("../../common_files/php/database.php");
$file = $_FILES['photo'];
$image = addslashes(file_get_contents($file['tmp_name']));
$label = $_POST['text'];
$direction = $_POST['direction'];
// $file = $_FILES['photo'];
// $label = $_POST['text'];
// $direction = $_POST['direction'];
$get_data = "SELECT * FROM category_showcase WHERE direction='$direction'";
$response = $db->query($get_data);
if($response)
{
    // echo "table found";
    if($response->num_rows != 0){
    $update_data = "UPDATE category_showcase SET image='$image', label='$label' WHERE direction='$direction'";
    $response = $db->query($update_data);
    if($response)
    {
    echo "success";
    }
    else{
    echo "Unable to update data";
    }
    }
    else{

        $store_data = "INSERT INTO category_showcase(image, label, direction)VALUES('$image', '$label', '$direction')";
        $response = $db->query($store_data);
        if($response)
        {
        echo "success";
        }
        else{
        echo "Unable to insert data";
        }
    }









}

else{
    $create_table = "CREATE TABLE category_showcase(
     id INT(11) NOT NULL AUTO_INCREMENT,
     image MEDIUMBLOB, 
     label VARCHAR(50),
     direction VARCHAR(50), 
     PRIMARY KEY(id)
    )";
    $response = $db->query($create_table);
    if($response)
    {
    $store_data = "INSERT INTO category_showcase(image, label, direction)VALUES('$image', '$label', '$direction')";
    $response = $db->query($store_data);
    if($response)
    {
    echo "success";
    }
    else{
    echo "Unable to insert data";
    }
    }
    else{
    echo "Unable to create table";
    }
    }
?>