     <?php echo '<div class="row animated fadeIn">
<div class="col-md-2"></div>
<div class="col-md-8 p-4 bg-white rounded-1g shadow-sm">
    


    <form class="branding-form">
    <h1 text-align="center">company details</h1>
    <div class="form-group ">
<label for="phone" class="font-weight-bold">enter brand name
<i class="fa fa-edit branding-edit" style="cursor :pointer;"></i>
</label>
<input type="text" class="form-control w-100" name="brand-name" id="brand-name" placeholder="shopwap"> </div>

<div class="form-group ">
<label for="phone" class="font-weight-bold">Upload brand logo</label>
<input type="file" accept="image/*"  class="form-control w-100" name="brand-logo" id="brand-logo" required> </div>

<div class="form-group ">
<label for="phone" class="font-weight-bold">enter domain name</label>
<input type="text" class="form-control w-100" name="domain-name" id="domain-name"  placeholder="www.shopwap.com" > </div>

<div class="form-group ">
<label for="phone" class="font-weight-bold">email</label>
<input type="text" class="form-control w-100" name="email" id="email" placeholder="shopwap@gmail.com"> </div>
<div class="form-group ">
<label for="phone" class="font-weight-bold">social handle</label>
<input type="text" class="form-control w-100" name="facebook-url" id="facebook-url" placeholder="facebook page url"> <input type="text" class="form-control w-100" name="twitter-url" id="twitter-url" placeholder="twitter page url"></div>

<div class="form-group">
<label for="about-us" class="font-weight-bold">Addresss</label>
<textarea class="form-control"  name="address" id="address"></textarea>
</div>


<div class="form-group ">
<label for="phone" class="font-weight-bold">Phone</label>
<input type="text" class="form-control w-100" name="phone" id="phone" placeholder="1800 1200 4005"> </div>
<div class="form-group">
<label for="about-us" class="font-weight-bold">About us <small class="about-us-count"> 0 </small><small>/ 5000</small></label>
<textarea class="form-control"  name="about-us" maxlength="5000" id="about-us"></textarea>
</div>
<div class="form-group">
<label for="about-us" class="font-weight-bold">privacy policy <small class="privacy-count"> 0 </small><small>/ 5000</small> </label>
<textarea class="form-control"  name="privacy-policy" id="privacy-policy" maxlength="5000"></textarea>
</div>
<div class="form-group">
<label for="about-us" class="font-weight-bold">cookies policy <small class="cookies-count"> 0 </small><small>/ 5000</small> </label>
<textarea class="form-control"  name="cookies-policy" id="cookies-policy" maxlength="5000"></textarea>
</div>

<div class="form-group">
<label for="about-us" class="font-weight-bold">terms and condition </label>
<textarea class="form-control"  name="terms" id="terms" maxlength="5000"></textarea>
</div>

<button type="submit" class="branding-submit-btn btn btn-primary py-2">Submit your information</button>

</form>




</div>
<div class="col-md-2"></div>
</div>';
?>