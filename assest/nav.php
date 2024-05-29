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
$menu = '<a href="http://localhost/shopwap/signup.php" class="dropdown-item"><i class="fa fa-user"></i>
Sign up</a>
<a href="http://localhost/shopwap/signin.php" class="dropdown-item"><i class="fa fa-sign-in"></i> Sign in</a>';
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
 left: 25px; top:-10px" class="cart-notification text-center"> <span>'.$data["result"].'
</span>
</div>';

    }

} 
}


?>
<style>
        .search-box{
        position: absolute;
       
        left:0;
        width: 100%;
        z-index: 1000;
        background-color: white;
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

<a href="http://localhost/shopwap/index.php" class="text-uppercase navbar-brand border shadow-sm d-flex align-items-center p-2">
<?php
$logo_string = base64_encode($branding_result['brand_logo']); $complete_src = "data:image/png;base64,".$logo_string;
echo "<img src='".$complete_src."' width='20'>";
echo "&nbsp";

echo "<small>".$branding_result['brand_name']. "</small>";
?>
</a>






        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
          <?php
$get_menu = "SELECT category_name FROM category"; $get_menu_response = $db->query($get_menu); if($get_menu_response)
{


    
while($nav = $get_menu_response->fetch_assoc())
{
echo "<li class='nav-item'><a href='#' class='nav-link text text-uppercase cat-name'>".$nav ['category_name']." </a></li>";
}
}
?>




           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user">USER</i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
 echo $menu;
?>
                
      
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="http://localhost/shopwap/pages/php/show_cart.php" class="cart-link"  tabindex="-1" style="position:relative" >
                <i class="fa fa-shopping-cart"></i>

                <?php
echo $cart_count;

?>


              </a>
            </li>
          </ul>
          <form class="  my-2 d-flex align-items-center " >
           <div class="w-100" style="position: relative;">
            <input class="form-control mr-sm-2 search" type="search" placeholder="Search" >
            <div class="search-box search-hint">
              
            </div>
           </div>
          <div>
            <button class="btn btn-outline-success my-2 my-sm-0 search-icon" type="button">Search</button>
          </div>
          </form>
        </div>
      </nav>

