<?php
require_once("../../common_files/php/database.php");
$file = $_FILES['file_data'];
$location = $file['tmp_name'];
$files_binary = addslashes(file_get_contents($location));
$json_data = json_encode($_POST['css_data']);
$tmp_data = json_decode($json_data, true);
$all_data = json_decode($tmp_data, true);
$title_text = addslashes($all_data['title_text']);
$title_color = $all_data['title_color'];
$title_size = $all_data['title_size'];
$subtitle_text = addslashes($all_data['subtitle_text']);
$subtitle_color = $all_data['subtitle_color'];
$subtitle_size = $all_data['subtitle_size'];
$h_align = $all_data['h_align'];
$v_align = $all_data['v_align'];
$buttons = addslashes($all_data['buttons']);

$check_table = "SELECT count(id) AS result FROM header_showcase";
 $response = $db->query($check_table);
if($response)
{
    $data = $response->fetch_assoc();
$count_rows = $data['result'];

 if($count_rows < 3)
 {

    $store_data = "INSERT INTO header_showcase(title_image,title_text, title_color,title_size, subtitle_text, subtitle_color, subtitle_size,h_align, v_align, buttons) VALUES('$files_binary', '$title_text', '$title_color', '$title_size', '$subtitle_text', '$subtitle_color', '$subtitle_size', '$h_align', '$v_align' ,'$buttons')";
    $response = $db->query($store_data);
    if($response)
    {
    echo "success";
    
    }
    else{
    echo "Unable to store data in hedaer_showcase table";
    }
 }

 else if($count_rows >=3 ){
echo "limit full";
 }

}
else{ 
    $create_table = "CREATE TABLE header_showcase( 
        id INT(11) NOT NULL AUTO_INCREMENT,
    title_text VARCHAR(255), 
    title_color VARCHAR(20),
    title_image MEDIUMBLOB, 
    title_size VARCHAR(10), 
    subtitle_text VARCHAR(255), 
    subtitle_color VARCHAR(10), 
    subtitle_size VARCHAR(20), 
    h_align VARCHAR(20),
     v_align VARCHAR(20), 
     buttons MEDIUMTEXT,
      PRIMARY KEY(id)
    )";
  
    $response = $db->query($create_table);
    if($response){

        $store_data = "INSERT INTO header_showcase(title_image,title_text, title_color,title_size, subtitle_text, subtitle_color, subtitle_size,h_align, v_align, buttons) VALUES('$files_binary', '$title_text', '$title_color', '$title_size', '$subtitle_text', '$subtitle_color', '$subtitle_size', '$h_align', '$v_align' ,'$buttons')";
        $response = $db->query($store_data);
        if($response)
        {
        echo "success";
        
        }
        else{
        echo "Unable to store data in hedaer_showcase table";
        }

    }
    else{
        echo "unable to create table";
    }
}
?>

