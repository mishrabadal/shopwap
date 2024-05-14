<?php
require('textlocal.class.php');
$mobile = $_POST['mobile'];
$message = $_POST['message'];
 
$textlocal = new Textlocal(false,false,'MzI1NzUxNjc3NTQ5MzQzMDc2MzQ3OTMyNTg3NTZmNmE=');

$numbers = array($mobile);
$sender = 'TXTLCL';
$otp =rand(456789,996739);

$message = $message;
 
try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
	echo "success";
   // die('Error: ' . $e->getMessage());
}
?>