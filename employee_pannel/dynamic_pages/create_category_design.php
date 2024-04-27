<?php

echo ' <div class="row animated pulse">
<div class="col-md-4  bg-white rounded-lg shadow-sm">
    <h5 class="my-3">CREATE CATEGORY

        <i class="fa fa-circle-o-notch close fa-spin create-category-loader d-none" style="font-size:18px"></i>

    </h5>
    <form class="create-category-form">
        <input type="text" class="input form-control mb-3" placeholder="Mobiles" style="border:nonr ;background-color: #f9f9f9;" required="required">

    <div class="add-field-area mb-3">
    
    </div>



        <button type="button" class="btn btn-primary mb-3 add-field-btn"> <i class="fa fa-plus"></i>Add field</button>

        <button  type="submit" class="btn btn-danger mb-3 create-btn">Create</button>
     
        <div class=" create-category-notice my-3"></div>
    
        </form>
</div>
<div class="col-md-2 "></div>
<div class="col-md-6 py-2 bg-white rounded-lg shadow-sm">
    <h5>CATEGORY LIST</h5>
    <HR>
   <div class="category-area overflow-auto" style="height:300px"></div>
</div>
</div>
';
?>