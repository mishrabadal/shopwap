<?php
session_start();
$branding_result = "";
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
    }
    $menu = '<a href="profile.php" class="dropdown-item text-capitalize"><i class="fa fa-user "></i> '.$fullname.'</a>
    <a href="pages/php/signout.php" class="dropdown-item"><i class="fa fa-sign-out"></i> Sign out</a>';
}


?>



<div class="container-fluid bg-white shadow-sm">
<nav class="container navbar navbar-expand-sm bg-white">

<a href="#" class="text-uppercase navbar-brand border shadow-sm d-flex flex-column align-items-center p-2">
<?php
$logo_string = base64_encode($branding_result['brand_logo']); $complete_src = "data:image/png;base64,".$logo_string;
echo "<img src='".$complete_src."' width='50'>";
echo "<small>".$branding_result['brand_name']. "</small>";
?>
</a>


<!-- //point solutions -->
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

<div class="btn-group ml-auto">
<button class="btn border"><i class="fa fa-shopping-bag"></i>
</button>
<button class="btn border"><i class="fa fa-search"></i></button>
<button class="btn border dropdown">
<i class="fa fa-user" data-toggle="dropdown"></i>
<div class="dropdown-menu">
<?php
echo $menu;
?>
</div>
</button>


<!-- point -->

</div>
</nav>
<div>