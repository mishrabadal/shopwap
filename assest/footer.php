


<div class="container-fluid bg-dark" >

<div class="row">
<div class="col-md-3">
<h5 class="text-light">CATEGORY</h5>
<?php
$get_menu = "SELECT category_name FROM category"; $get_menu_response = $db->query($get_menu); if($get_menu_response)
{
while($nav = $get_menu_response->fetch_assoc())
{
echo "<a href='#' class=' d-block py-2 text-uppercase cat-name'>".$nav ['category_name']." </a>";
}
}
?>
</div>
<div class="col-md-1"></div>
<div class="col-md-3">
<h5 class="text-light">POLICIES</h5>
<a href="privacy.php" class="d-block py-2">Privacy policiy</a>
<a href="cookies.php" class="d-block py-2">Cookies policiy</a>
<a href="terms.php" class="d-block py-2">Terms & conditions</a>
</div>
<div class="col-md-1"></div>
<div class="col-md-4">

<h5 class="text-light">CONTACTS</h5>
<p class="text-light">Venue: <?php echo $branding_result['address'];?></p>
<p class="text-light">Call: <?php echo $branding_result['phone'];?></p>
<p class="text-light">Email: <?php echo $branding_result['email'];?></p>
<p class="text-light">Website: <?php echo $branding_result['domain_name'];?></p>
</div>
</div>

</div>


<div class="container-fluid bg-dark border-top " >
<div class="row">
    <div class="col-md-4 p-4 ">
    <div class="input-group">
<input type="email" placeholder="email@gmail.com" name="subscribe-email" class="form-control">
<div class="input-group-append">
<span class="input-group-text">SUBSCRIBE</span>
</div>
</div>
    </div>
    <div class="col-md-5">
        
    </div>
    <div class="col-md-3 p-4 ">
    <div class="btn-group ">
<button class="btn btn-dark"> FOLLOW US  </button>
<button class="btn border px-3 bg-white"><a href="<?php echo $branding_result['facebook_url'];?>"><i class="fa fa-facebook "></i></a></button>
<button class="btn border px-3 bg-white"><a href="<?php echo $branding_result['twitter_url'];?>"><i class="fa fa-twitter"></i></a></button>
</div>
    </div>
</div>
</div>