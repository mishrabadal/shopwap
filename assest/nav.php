<?php
session_start();
$branding_result = "";
$cart_count="";
$get_branding_data = "SELECT * FROM branding";
$branding_response = $db->query($get_branding_data); 
if($branding_response)
{
$branding_result = $branding_response->fetch_assoc();
}


$menu="";
if(empty($_COOKIE['_au_']))
{
$menu = '<a href="signup.php" class="dropdown-item"><i class="fa fa-user"></i>
Sign up</a>
<a href="signin.php" class="dropdown-item"><i class="fa fa-sign-in"></i> Sign in</a>';
}
else{
    $fullname = "";
    $username = base64_decode($_COOKIE['_au_']);
    $get_data = "SELECT * FROM users WHERE email='$username'";
    $response = $db->query($get_data);
    if($response)
    {
    $data = $response->fetch_assoc();
    $fullname = $data['firstname']." ".$data['lastname'];
    $_SESSION['fullname'] = $fullname;
$_SESSION['mobile'] = $data['mobile'];

// echo $_SESSION['fullname'];
// echo $_SESSION['mobile'];

    }
    $menu = '<a href="profile.php" class="dropdown-item text-capitalize"><i class="fa fa-user "></i> '.$fullname.'</a>
    <a href="pages/php/signout.php" class="dropdown-item"><i class="fa fa-sign-out"></i> Sign out</a>';

    $get_cart = "SELECT COUNT(id) AS result FROM cart WHERE username='$username'";
$response = $db->query($get_cart);
if($response->num_rows != 0)
{
    $data = $response->fetch_assoc();
    if($data['result'] !=0){
$cart_count = '<div style="position: absolute; width: 25px;height:25px; background-color:red;color:white; font-weight:bold; border-radius:50%; z-index: 1000;
 left: 25px; top:-10px" class="cart-notification"> <span>'.$data["result"].'
</span>
</div>';

    }

} 
}


?>



<div class="container-fluid bg-white shadow-sm">
<nav class="container navbar navbar-expand-sm bg-white">

<a href="#" class="text-uppercase navbar-brand border shadow-sm d-flex align-items-center p-2">
<?php
$logo_string = base64_encode($branding_result['brand_logo']); $complete_src = "data:image/png;base64,".$logo_string;
echo "<img src='".$complete_src."' width='20'>";
echo "&nbsp";
echo "<small>".$branding_result['brand_name']. "</small>";
?>
</a>



<div class="collapse navbar-collapse" id="menu-box">
<ul class="navbar-nav">
<?php
$get_menu = "SELECT category_name FROM category"; $get_menu_response = $db->query($get_menu); if($get_menu_response)
{
while($nav = $get_menu_response->fetch_assoc())
{
echo "<li class='nav-item'><a href='#' class='nav-link text text-uppercase'>".$nav ['category_name']." </a></li>";
}
}
?>
</ul>
</div>

<div class="btn-group ml-auto">
<button class="btn border navbar-toggler" data-toggle="collapse" data-target="#menu-box"><i class="fa fa-bars"></i></button>
<button class="btn border">
    <a href="http://localhost/shopwap/pages/php/show_cart.php" class="cart-link" >
    <i class="fa fa-shopping-cart"></i>

<?php
echo $cart_count;

?></a>
</button>
<button class="btn border d-flex align-items-center " >
    <input type="search" class="form-control mr-2 search " style="width:300px;" placeholder="search">
    <i class="fa fa-search" style=""></i>

</button>
<button class="btn border dropdown">
<i class="fa fa-user" data-toggle="dropdown"></i>
<div class="dropdown-menu">
<?php
echo $menu;
?>
</div>
</button>

<div class="position-absolute bg-white search-hint" style="width:100%; z-index:5000; top: 60px; border:2px solid red" >



</div>
<!-- point -->

</div>
</nav>
<div>