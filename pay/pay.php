<?php
session_start();
$id = $_GET['id'];
$amount = $_GET['price']*100;
$title= $_GET['title'];
$brand = $_GET['brand'];
$qnt=$_GET['qnt'];
$fullname = $_SESSION['fullname'];
$mobile = $_SESSION['mobile'];

//all are my personal code
$_SESSION['buy_id']=$id;
$_SESSION['buy_amount']=$amount;
$_SESSION['buy_title']=$title;
$_SESSION['buy_brand']=$brand;
$_SESSION['buy_qnt']=$qnt;
$_SESSION['buy_fullname']=$fullname;
$_SESSION['buy_mobile']=$mobile;


//all are my personal code

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>

<body>
    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>

    
            
          
           
            var options = {
                "key": "rzp_test_l18gQuvE27aFIv", // Enter the Key ID generated from the Dashboard
                "amount": <?php echo $amount;?>, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise

                "name": "<?php echo $title;?>",
                "description": "<?php echo $brand;?>",
                "image": "videha.png",
            
                "handler": function (response) {
                    // alert(response.razorpay_payment_id);
                   
                    sessionStorage.setItem("p_id", response.razorpay_payment_id);
                    sessionStorage.setItem("o_id", response.razorpay_order_id);
                    window.location="verify.php?pay_id="+response.razorpay_payment_id;
                    //alert(response.razorpay_order_id);
                    // alert(response.razorpay_signature);
                },
                "prefill": {
        "name": "<?php echo $fullname;?>",
        "email": "<?php echo base64_decode($_COOKIE['_au_']);?>",
        "contact": <?php echo $mobile;?>,
    },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "yellow"
                }
            };
            var rzp1 = new Razorpay(options);


            rzp1.open();
            e.preventDefault();
      
    </script>

    <script>
       
    </script>
</body>

</html>