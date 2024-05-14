<?php
require_once("../../common_files/databases/databases.php");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = md5($_POST['password']);
$check_table = "SELECT * FROM users";
$response = $db->query($check_table); 
if($response)
{
    // edit by point solution
    $store_data = "INSERT INTO users(
        firstname, lastname, email, mobile, password) VALUES ('$firstname', '$lastname', '$email', '$mobile', '$password')";
        $response = $db->query($store_data);
        if($response)
        {
        // echo "success";
        require("sendsms.php");
        }
        else{
            echo $db->error;
        echo "Unable to store data";
        }
          // edit by point solution
}
else{
     $create_table = "CREATE TABLE users(
     id INT(11) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(50), 
    lastname VARCHAR(50), 
    email VARCHAR(100),
     mobile VARCHAR(20), 
     password VARCHAR(150),
      status VARCHAR(20) DEFAULT 'pending', 
      reg_date DATETIME DEFAULT CURRENT_TIMESTAMP, 
      PRIMARY KEY(id)
      )";
      $response = $db->query($create_table); 
      if($response)
      {
    
        $store_data = "INSERT INTO users(
            firstname, lastname, email, mobile, password) VALUES ('$firstname', '$lastname', '$email', '$mobile', '$password')";
            $response = $db->query($store_data);
            if($response)
            {
            // echo "success";
            require("sendsms.php");
            }
            else{
                echo $db->error;
            echo "Unable to store data";
            }

      }
      else{
      echo "Unable to create table";
      }
}

?>