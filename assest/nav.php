<div class="container-fluid bg-white shadow-sm">
<nav class="container navbar navbar-expand-sm bg-white">
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
<button class="btn border"><i class="fa fa-search"></i></
button>
<button class="btn border"><i class="fa fa-user"></i></button>
</div>
</nav>
<div>