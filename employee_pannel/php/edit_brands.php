<?php
require_once("../../common_files/php/database.php");
//PREVIOUS
$previous_c_name = $_POST['previous_c_name'];
$previous_b_name = $_POST['previous_b_name'];


//changed
$c_name = $_POST['c_name'];
$b_name = $_POST['b_name'];
$edit_data = "UPDATE brands SET category_name='$c_name',brands ='$b_name'
WHERE category_name='$previous_c_name' AND brands='$previous_b_name'
";

$response = $db->query($edit_data);
if($response){
    echo "<b>success</b>";
}
else{
    echo "<b>failed</b>";
}
?>