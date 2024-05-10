<?php
require_once("../../common_files/databases/databases.php");


$file = $_FILES['brand-logo'];

$logo = "";
$location = "";
if($file['name'] == "")
{
$logo = "";
$location = "";
}
else{
$location = $file['tmp_name'];
$logo = addslashes(file_get_contents($location));
}
 

// $location = $file['tmp_name'];
// $logo = addslashes(file_get_contents($location));
$brand_name = $_POST['brand-name'];
$domain_name = $_POST['domain-name'];
$email = $_POST['email'];
$facebook_url = $_POST['facebook-url'];
$twitter_url = $_POST['twitter-url'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$about_us = addslashes($_POST['about-us']);
$privacy_policy = addslashes($_POST['privacy-policy']);
$cookies_policy = addslashes($_POST['cookies-policy']);
$terms = addslashes($_POST['terms']);

$check_branding_table = "SELECT * FROM branding";
$response = $db->query($check_branding_table);
if ($response) {
    //point solution
    if($logo == "")
    {
    $update_data = "UPDATE branding SET brand_name='$brand_name', email='$email', domain_name='$domain_name', facebook_url='$facebook_url',twitter_url='$twitter_url', address='$address', phone='$phone' , about_us='$about_us', privacy_policy='$privacy_policy' ,cookies_policy='$cookies_policy', terms_policy='$terms'";
     $response = $db->query($update_data);
    if($response)
    {
    echo "Edit success";
    }
    else{
    echo "Edit failed";
    }
    }

    else{
        $update_data = "UPDATE branding SET brand_name='$brand_name', brand_logo='$logo', email='$email', domain_name='$domain_name',facebook_url='$facebook_url', twitter_url='$twitter_url', address= '$address' ,phone='$phone', about_us='$about_us', privacy_policy='$privacy_policy', cookies_policy='$cookies_policy', terms_policy='$terms'";
$response = $db->query($update_data);
if($response)
{
echo "Edit success";
}
else{
    echo $db->error;
echo "Edit failed";
}
    }
}

else{
    $create_table = "CREATE TABLE branding( 
id INT(11) NOT NULL AUTO_INCREMENT,
brand_name VARCHAR(50),
brand_logo MEDIUMBLOB,
 domain_name VARCHAR(100), 
email VARCHAR(100),
 facebook_url VARCHAR(255),
twitter_url VARCHAR(255), 
address VARCHAR(100),
phone INT(12), about_us MEDIUMTEXT, 
 privacy_policy MEDIUMTEXT,
 cookies_policy MEDIUMTEXT, 
terms_policy MEDIUMTEXT, 
    PRIMARY KEY(id)
)";

//echo "table created";
$response = $db->query($create_table);
if($response)
{
    $store_data = "INSERT INTO branding (brand_name, brand_logo, email, domain_name, facebook_url, twitter_url, address, phone, about_us, privacy_policy, cookies_policy, terms_policy) VALUES ('$brand_name', '$logo' ,'$email','$domain_name', '$facebook_url', '$twitter_url', '$address', '$phone', '$about_us', '$privacy_policy', '$cookies_policy', '$terms')";
 $response = $db->query($store_data);
if($response)
{
echo "success";
}
else{
    echo "data not stored";
}
}
else{
    
echo "unable to create table ";
    
}
}
?>
