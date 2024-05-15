<?php
require_once("../../common_files/databases/databases.php");
 session_start();
$otp = $_SESSION['otp'];
$user_otp = $_POST['otp'];
$email = $_POST['email'];
if($otp == $user_otp)
{
unset($_SESSION['otp']);
$update_data = "UPDATE users SET status='active' WHERE email='$email'";
$response = $db->query($update_data);
if($response)
{
echo "success";
}
else{
echo "Update failed";
}
}

else{ 
    echo "wrong otp";
}

?>