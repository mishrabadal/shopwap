<?php
require_once("../../common_files/databases/databases.php");
 $id = $_POST['id'];
$username =base64_decode($_COOKIE['_au_']);
$delete_row = "DELETE FROM cart WHERE product_id='$id'  AND username='$username'";
$response = $db->query($delete_row);
if($response)
{
echo "success";
}
else{
echo "Unable to remove product from cart";
}


?>