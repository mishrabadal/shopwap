<?php
require_once("./common_files/databases/databases.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="common_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="common_files/css/font-awesome.min.css">
    <link rel="stylesheet" href="common_files/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="common_files/js/jquery.min.js"></script>
    <script src="common_files/js/bootstrap.bundle.min.js"></script>
    <script src="common_files/js/popper.min.js"></script>
    <script src="pages/js/index.js"></script>
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <!-- <script src="js/index.js"></script> -->

    <style>
        .carousel-caption {
            line-height: 80px;
        }


        @media (max-width:768px) {
            #top-slider h1 {
                margin-top: 20%;
                font-size: 180% !important;
            }

            #top-slider h4 {
                font-size: 120% !important;
            }
            #top-slider button a {
                font-size: 15px !important;
            }
        }

        @media (max-width:576px) {
         

          

            #category-showcase img{
                width: 80%;
                /* border:1px solid red */
                border-radius:12px ;
                margin-left: 10%;
                margin-right: 10%;
            }
        }
    </style>
</head>

<body class="bg-white">

    <?php
    include_once("assest/nav.php");
    ?>
    <div class="container-fluid p-0">
<center>
<img src="common_files/images/page_not_found.jpg" alt="404">
</center>
    </div>




    <?php
    include_once("assest/footer.php");
    ?>
  
</body>

</html>