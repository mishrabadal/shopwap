<?php
require_once("../../common_files/databases/databases.php");
$keyword = $_POST['keyword'];
$get_product = "SELECT * FROM products WHERE title LIKE '%$keyword%' LIMIT 10";
$response = $db->query($get_product);
if($response)
{
while($data = $response->fetch_assoc()){
echo "<p class='mx-4 search-tag'>".$data['title']."</p>";
}
}

?>