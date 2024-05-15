<?php
require('textlocal.class.php');
session_start(); 
$textlocal = new Textlocal(false,false,'NDE3MTYyNmU0ZjU5NzM3NjQ4NTkzNTY0NjkzNjM4NDc=');
$mobile = $_POST['mobile'];
$numbers = array($mobile);
$sender = 'TXTLCL';
// $otp =rand(456789,996739);
$_SESSION['otp']=123456;
$message = 'your otp is : 123456 ';
 
try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    echo "success";
    // print_r($result);
} catch (Exception $e) {
    echo "success";
    // die('Error: ' . $e->getMessage());
}
?>