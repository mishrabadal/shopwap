<?php

require_once("../../common_files/php/database.php");
$json_data = json_decode($_POST['json_data']);
$length = count($json_data);
$message ="";
$select_category_table ="SELECT * FROM category";

if($db->query($select_category_table))
{
    //echo "found ";

//custom

for ($i=0; $i <$length ; $i++) { 
    $store_data = "INSERT INTO category(category_name)VALUES('$json_data[$i]')";
    if($db->query($store_data))
    {
      $message= "done ";
    }
    else{
      $message =  "failed to insert ";
    }
 }

 echo $message;
//custom












}
else{
   $create_table = "CREATE TABLE category(
    id INT(11) NOT NULL AUTO_INCREMENT,
    category_name VARCHAR(50),
    PRIMARY KEY(id)
   )";

   if($db->query($create_table))
   {
    echo "table created ";
    for ($i=0; $i <$length ; $i++) { 
       $store_data = "INSERT INTO category(category_name)VALUES('$json_data[$i]')";
       if($db->query($store_data))
       {
         $message =  "done ";
       }
       else{
         $message = "failed to insert data ";
       }
    }
   echo $message;

   }
   else{
    echo "unable to create table  ";
    
    
   }
}

?>