<?php
require_once("../../common_files/php/database.php");
$category_name = $_POST['c_name'];
$brands = $_POST['b_name'];
$delete_row ="DELETE FROM brands WHERE category_name ='$category_name' AND brands ='$brands'";
$response = $db->query($delete_row);
if($response){
echo "<b>delete success</b>";
}
else{
    echo "<b>unable to deleet brands name</b>";
}
?>