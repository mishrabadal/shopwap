<?php
require('textlocal.class.php');
session_start(); 
$textlocal = new Textlocal(false,false,'NDE3MTYyNmU0ZjU5NzM3NjQ4NTkzNTY0NjkzNjM4NDc=');
$mobile=6287055423;
$numbers = array($mobile);
$sender = 'TXTLCL';
$otp =rand(456789,996739);
$_SESSION['otp']=$otp;
$message = 'your otp is : '  .$otp;
 
try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
    echo "success";
    // die('Error: ' . $e->getMessage());
}
?>