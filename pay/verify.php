

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Successful Message </title>

    <meta name="author" content="Codeconvey" />
    <!-- Message Box CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!--Only for demo purpose - no need to add.-->
	
</head>
<body>
<script>
    function id(){

if(sessionStorage.getItem("p_id")!="undefined"){
    <?php
    $payment_id = $_GET['pay_id'];
	
    session_start();
  $_SESSION['payment_id']= $payment_id;
    ?>

    
   window.location ="purchase_entry.php";
}
else{
    alert("failed");
}
    }
    id();
</script>
	</body>
</html>