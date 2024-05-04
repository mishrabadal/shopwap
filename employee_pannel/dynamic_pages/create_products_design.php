<?php
require_once("../../common_files/php/database.php");
echo '
<div class="design">
<div class="row">
    <div class="col-md-9"><h3>CREATE PRODUCTS</h3></div>
    <div class="col-md-3"><i class="fa fa-circle-o-notch fa-spin close"></i></div>
</div>
     <form class="create-products-form" >
<div class="row">
    <div class="col-md-6 ">
        <input type="text" class="form-control" name="title" placeholder="NOKIA 220">
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <select name="brands"  class="form-control brands-name">
            <option value="choose brands">choose brands</option>';
            $get_data = "SELECT brands FROM brands"; 
            $response = $db->query($get_data);
            if($response)
            {
            while($data = $response->fetch_assoc()) 
            {
            echo "<option>".$data['brands']."</option>";
            }
            }

      echo' </select>
    </div>
</div>
<div class="row ">
    <div class="col-md-12 p-3 ">
        <span class="d-block">description</span>
        <textarea  id="" cols="30" rows="13" class="form-control" name="description" ></textarea>
    </div>
    
</div>

<div class="row">
    <div class="col-md-4">
        <span class="d-block">PRICE</span>
        <input type="text" class="form-control placeholder="price" name="price" >
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <span class="d-block">QUANTITY</span>
        <input type="text" class="form-control placeholder="1200" name="quantity" >
    </div>
</div>

<div class="row pic p-3">
    <div class="col-md-2"><img src="images/thumb.PNG" alt=""><input type="file" name="thumb"></div>
    <div class="col-md-2"><img src="images/front.PNG" alt=""><input type="file" name="front"></div>
    <div class="col-md-2"><img src="images/top.PNG" alt=""><input type="file"  name="top"></div>
    <div class="col-md-2"><img src="images/bottom.PNG" alt=""><input type="file"  name="bottom"></div>
    <div class="col-md-2"><img src="images/left.PNG" alt=""><input type="file"  name="left"></div>
    <div class="col-md-2"><img src="images/right.PNG" alt=""><input type="file"  name="right"></div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
              40%
            </div>
          </div>
    </div>
    <div class="col-md-3">
<input type="submit" class="btn btn-danger float-right">
    </div>
</div>
</form>
</div>
';
    ?>