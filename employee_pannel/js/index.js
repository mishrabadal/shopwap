$(document).ready(function () {
    $(".stock-update-btn").click(function () {
        $(".stock-update-btn-menu").collapse('toggle');
    });

    $(".homepage-design-btn").click(function () {
        $(".homepage-design-collapse").collapse('toggle');
    });
});


//dynamics request
$(document).ready(function () {

    var active_link = $(".active").attr("access-link");
    dynamic_request(active_link);
    $(".collapse-item").click(function () {

        var request_link = $(this).attr("access-link");
        dynamic_request(request_link);

    });
});

//active tab
$(document).ready(function () {
    var i;
    $(".collapse-item").each(
        function () {
            $(this).click(function () {
                for (i = 0; i < $(".collapse-item").length; i++) {
                    $(".collapse-item").removeClass("active");

                    //my edit
                    //  category_list();


                    //my edit
                }
                $(this).addClass("active");
            });
        }
    );
});


//dyanmic page request page
function dynamic_request(request_link) {
    $.ajax({
        type: "POST",
        url: "dynamic_pages/" + request_link,
        xhr: function () {
            var request = new XMLHttpRequest();
            request.onprogress = function (e) {
                var percentage = Math.floor(e.loaded * 100 / e.total);
                console.log(percentage);
                var loader = '<center><button class="btn " > <i class="fa fa-circle-o-notch fa-spin " style="font-size:80px""></i><br>Loading' + percentage + '</button></center>';

                $(".page").html(loader);


            }
            return request;
        },
        beforeSend: function () {
            var loader = '<center><button class="btn" > <i class="fa fa-circle-o-notch fa-spin " style="font-size:150px""></i></button></center>';
            $(".page").html(loader);
        },
        success: function (response) {
            $(".page").html(response);

            if(request_link =="category_showcase_design.php"){
                category_Showcase();
            }    
            
            if(request_link =="header_showcase_design.php"){
                header_showcase();
            }            
//pointmishra
if(request_link =="branding_design.php"){
    branding_information();
}
//create products
$(".create-products-form").submit(function(e){

    var option = $(".brands-name option");
var i;
var c_name = "";
for(i=0;i<option.length;i++)
{
if(option[i].innerHTML == $(".brands-name").val())
{
c_name = $(option[i]).attr("c-name");
}
}


e.preventDefault();
if($(".brands-name").val() !="choose brands")
    {
$.ajax({
type:"POST",
url : "php/create_product.php?c_name="+c_name,
data : new FormData(this),
processData:false,
contentType:false,
cache:false,
xhr: function(){
    var request = new XMLHttpRequest();
    request.upload.onprogress = function(e){
    var percentage = Math.floor((e.loaded*100)/e.total);
    $(".create-products-progress .progress-bar").css({
    width: percentage+"%"
    });
    $(".create-products-progress .progress-bar").html(percentage+"%");
    }
    return request;
    },
    beforeSend: function(){
    $(".create-products-progress").removeClass("d-none");
    },
success:function(response){
    if(response.trim() =="success")
        {
            alert("product successfully uploaded");
       $(".create-products-progress").addClass("d-none");
        $(".create-products-progress.progress-bar").css({width:'0%'});
        $(".create-products-form").trigger('reset');
        }
        else{
        alert(response);
        }
}

});
    
}

else{
    alert("choose a brand");
}
});

            if (request_link == "create_category_design.php") {
                category_list();
            }
            //after comming response
            $(".add-field-btn").click(function () {
                var placeholder = $(".input:first").attr("placeholder");
                var input = document.createElement("INPUT");
                input.type = "text";
                input.className = "form-control input mb-3";
                input.placeholder = placeholder;
                input.required = "required";
                input.style.background = "#f9f9f9";
                $(".add-field-area").append(input);
            });
            //create button 
            $(".create-btn").click(function (e) {
                e.preventDefault();
                var input = [];
                var input_length = $(".input").length;
                var i;
                for (i = 0; i < input_length; i++) {
                    input[i] = document.getElementsByClassName("input")[i].value;
                }

                var object = JSON.stringify(input);
                $.ajax({
                    type: "POST",
                    url: "php/create_category.php",
                    data: {
                        json_data: object
                    },
                    beforeSend: function () {
                        $(".create-category-loader").removeClass("d-none");
                    },
                    success: function (response) {
                        $(".create-category-loader").addClass("d-none");

                        if (response.trim() == "done") {
                            category_list();
                            var notice = document.createElement("DIV");
                            notice.className = "alert alert-success";
                            notice.innerHTML = "<b>Success ! </b>";
                            $(".create-category-notice").html(notice);
                            setTimeout(function () {
                                $(".create-category-notice").html("");
                                $(".create-category-form").trigger('reset');
                            }, 3000);
                        } else {
                            var notice = document.createElement("DIV");
                            notice.className = "alert alert-danger";
                            notice.innerHTML = "<b>" + response + "</b>";
                            $(".create-category-notice").html(notice);
                            setTimeout(function () {
                                $(".create-category-notice").html("");
                                $(".create-category-form").trigger('reset');
                            }, 3000);
                        }
                    }
                });

            });

            //add brand field 
            $(".add-brand-btn").click(function () {
                var placeholder = $(".brand-input:first").attr("placeholder");
                var input = document.createElement("INPUT");
                input.type = "text";
                input.className = "form-control brand-input mb-3";
                input.placeholder = placeholder;
                input.required = "required";
                input.style.background = "#f9f9f9";
                $(".brand-field-area").append(input);
            });
            //create brand

            $(".create-brand-btn").click(function (e) {
                e.preventDefault();
                var category = $(".brand-category").val();
                if (category == "Choose category") {
                    var notice = document.createElement("DIV");
                    notice.className = "alert alert-warning";
                    notice.innerHTML = "<b>please choose a category !</b>";
                    $(".brand-field-notice").html(notice);
                    setTimeout(function () {
                        $(".brand-field-notice").html("");
                        $(".brand-form").trigger('reset');
                    }, 3000);
                } else {
                    var input = [];
                    var input_length = $(".brand-input").length;
                    var i;
                    for (i = 0; i < input_length; i++) {
                        input[i] = document.getElementsByClassName("brand-input")[i].value;
                    }

                    var object = JSON.stringify(input);
                    // alert(input_length);
                    $.ajax({
                        type: "POST",
                        url: "php/create_brand.php",
                        data: {
                            json_data: object,
                            category: category
                        },
                        beforeSend: function () {
                            $(".brand-loader").removeClass("d-none");
                        },
                        success: function (response) {
                            $(".brand-loader").addClass("d-none");
                            // alert(response);
                            if (response.trim() == "done") {

                                var notice = document.createElement("DIV");
                                notice.className = "alert alert-success";
                                notice.innerHTML = "<b>Success ! </b>";
                                $(".brand-field-notice").html(notice);
                                setTimeout(function () {
                                    $(".brand-field-notice").html("");
                                    $(".brand-form").trigger('reset');
                                }, 3000);
                            } else {
                                var notice = document.createElement("DIV");
                                notice.className = "alert alert-danger";
                                notice.innerHTML = "<b>" + response + "</b>";
                                $(".brand-field-notice").html(notice);
                                setTimeout(function () {
                                    $(".brand-field-notice").html("");
                                    $(".brand-form").trigger('reset');
                                }, 3000);
                            }
                        }
                    });
                }
            });
            //display brands name
            $(document).ready(function () {
                $(".display-brand").on("change", function () {

                    var selected_cat_name = $(this).val();

 var all_option =$(this).html().replace("<option>Choose category</option>").replace("<option>"+selected_cat_name+"</option>");
                    console.log(all_option);
                    $.ajax({
                        type: "POST",
                        url: "php/display_brands.php",
                        data: {
                            category_name: selected_cat_name
                        },
                        beforeSend: function () {
                            $(".display-brand-loader").removeClass("d-none");
                        },
                        success: function (response) {
                           // alert(response);
if(response.trim() !="<b>No  brand has been created yet in this category</b>"){


$(".display-brand-loader").addClass("d-none");
console.log(JSON.parse(response));
var table = document.createElement("TABLE");
table.width = "100%";
table.style.textAlign="center";

table.border = "1px solid red";

var top_tr = document.createElement("TR");
var th_cat = document.createElement("TH");
th_cat.height="40";
th_cat.innerHTML="CATEGORY";
th_cat.className="bg-danger text-light";
var th_brand = document.createElement("TH");
th_brand.height="40";
th_brand.innerHTML="BRANDS NAME";
th_brand.className="bg-danger text-light";
var th_edit = document.createElement("TH");
th_edit.height="40";
th_edit.innerHTML="EDIT";
th_edit.className="bg-danger text-light";
var th_delete = document.createElement("TH");
th_delete.height="40";
th_delete.innerHTML="DELETE";
th_delete.className="bg-danger text-light";

top_tr.append(th_cat);
top_tr.append(th_brand);
top_tr.append(th_edit);
top_tr.append(th_delete);
table.append(top_tr);
var json_data = JSON.parse(response);
var i;
for (i = 0; i < json_data.length; i++) {
var tr = document.createElement("TR");
var td_cat = document.createElement("TD");
var td_brands = document.createElement("TD");

td_cat.innerHTML = "<select disabled='disabled' class='border p-2 w-75 dynamic-c-name'><option>"+json_data[i].category_name+"</option>"+all_option+"</select>";



td_brands.innerHTML = json_data[i].brands;

var td_edit =document.createElement("td");
td_edit.innerHTML="<i class='fa fa-edit brand-edit' b-name='"+json_data[i].brands+"' c-name='"+json_data[i].category_name+"'></i><i class='fa fa-save brand-save d-none' b-name='"+json_data[i].brands+"' c-name='"+json_data[i].category_name+"'></i>";
var td_delete =document.createElement("td");
td_delete.innerHTML="<i class='fa fa-trash brand-delete' b-name='"+json_data[i].brands+"' c-name='"+json_data[i].category_name+"'></i>";
table.append(tr);
tr.append(td_cat);
tr.append(td_brands);
tr.append(td_edit);
tr.append(td_delete);
$(".brand-list-area").html(table);


 //delete brand
 
 $(".brand-delete").each(function(){
    $(this).click(function(){
        var delete_icon=this;
        var c_name = $(this).attr("c-name");
       var b_name = $(this).attr("b-name");
       $.ajax({
        type:"POST",
        url:"php/delete_brands.php",
        data:{
            c_name:c_name,
            b_name:b_name
        },
        success:function(response){
           if(response.trim()=="<b>delete success</b>")
           {
            var row = delete_icon.parentElement.parentElement;
            row.remove();
           }

           else{
            alert(response);
           }
        }
       });
    });
 });



//edit brand
$(".brand-edit").each(function(){
    $(this).click(function(){
        //alert( $(this).attr("b-name"));
        var edit_icon =this;
        $(this).addClass("d-none");
        var c_name = $(this).attr("c-name");
        var b_name = $(this).attr("b-name");
        var row = this.parentElement.parentElement;
        var td = row.getElementsByTagName("TD");
        var select_tag = td[0].getElementsByClassName("dynamic-c-name")[0];

        select_tag.disabled=false;
        td[1].contentEditable=true;
        td[1].focus();
        var delete_icon = td[3].getElementsByClassName("brand-delete")[0];
        var save_icon = td[2].getElementsByClassName("brand-save")[0];
        $(save_icon).removeClass("d-none");
        save_icon.onclick= function(response){
           $.ajax({
            type:"POST",
            url:"php/edit_brands.php",
            data:{
                previous_c_name : c_name,
                previous_b_name : b_name,
                c_name : select_tag.value,
                b_name :td[1].innerHTML

            },
            success:function(response){
                if(response=="<b>success</b>"){
                    $(save_icon).addClass("d-none");
                    $(edit_icon).removeClass("d-none");
                    td[1].contentEditable=false;
                    select_tag.disabled=true;
                    $(edit_icon).attr("c-name",select_tag.value);
                    $(edit_icon).attr("b-name",td[1].innerHTML);

                    $(save_icon).attr("c-name",select_tag.value);
                    $(save_icon).attr("b-name",td[1].innerHTML);

                    $(delete_icon).attr("c-name",select_tag.value);
                    $(delete_icon).attr("b-name",td[1].innerHTML);

                }
            }

           });
        }

    });
});

}

}

else{
    $(".display-brand-loader").addClass("d-none");
    $(".brand-list-area").html(response);
}
                        }
                    });
                });
            });





        }
    });
}


//category list
function category_list() {


    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "php/category_list.php",
            success: function (response) {
                //console.log(response.length);

                var category_list = JSON.parse(response);
                var i;
                for (i = 0; i < category_list.length; i++) {
                    var id = category_list[i].id;
                    var name = category_list[i].category_name;
                    var ul = document.createElement("UL");
                    ul.className = "list-group";
                    var li = document.createElement("LI");
                    li.className = "list-group-item mb-3";
                    ul.append(li);
                    var div = document.createElement("DIV");
                    div.className = "btn-group";
                    li.append(div);
                    var id_btn = document.createElement("BUTTON");
                    id_btn.innerHTML = id;
                    id_btn.className = "btn btn-danger id";
                    div.append(id_btn);

                    var name_btn = document.createElement("BUTTON");
                    name_btn.innerHTML = name;
                    name_btn.className = "btn btn-dark name";
                    div.append(name_btn);


                    var edit_btn = document.createElement("BUTTON");
                    edit_btn.innerHTML = "<i class='fa fa-edit edit-icon'></i> <i class='fa fa-save save-icon d-none'></i>";
                    edit_btn.className = "btn btn-info";
                    div.append(edit_btn);

                    var delete_btn = document.createElement("BUTTON");
                    delete_btn.innerHTML = "<i class='fa fa-trash delete-icon'></i>";
                    delete_btn.className = "btn btn-danger";
                    div.append(delete_btn);

                    $(".category-area").append(ul);


                    //edit category name
                    edit_btn.onclick = function () {
                        var parent = this.parentElement;
                        var id = parent.getElementsByClassName("id")[0];
                        var cat_name = parent.getElementsByClassName("name")[0];
                        var save_icon = parent.getElementsByClassName("save-icon")[0];
                        var edit_icon = parent.getElementsByClassName("edit-icon")[0];

                        cat_name.contentEditable = true;
                        cat_name.style.fontStyle = "italic";
                        cat_name.focus();
                        $(save_icon).removeClass("d-none");
                        $(edit_icon).addClass("d-none");
                        $(save_icon).click(function () {

                            var changed_name = cat_name.innerHTML.trim();

                            $.ajax({
                                type: "POST",
                                url: "php/edit_category_name.php",
                                data: {
                                    id: id.innerHTML.trim(),
                                    changed_name: changed_name
                                },
                                success: function (response) {

                                    if (response.trim() == "success") {
                                        cat_name.contentEditable = false;
                                        $(save_icon).addClass("d-none");
                                        $(edit_icon).removeClass("d-none");
                                    } else {
                                        alert(response);
                                    }
                                },
                            });

                        });



                    }

                    //delete category
                    delete_btn.onclick = function () {
                        var parent = this.parentElement;
                        var id = parent.getElementsByClassName("id")[0].innerHTML.trim();

                        $.ajax({
                            type: "POST",
                            url: "php/delete_category_name.php",
                            data: {
                                id: id
                            },
                            success: function (response) {
                                if (response.trim() == "success") {
                                    parent.parentElement.parentElement.remove();
                                } else {
                                    alert(response);
                                }
                            }
                        });


                    }



                }

            }
        });
    });
}
category_list();


//branding information
function branding_information(){
    
$(document).ready(function(){
    $("#about-us").on("input", function(){ 
        var length = $(this).val().length;
     $(".about-us-count").html(length); 
    
    });
    });
    
    
    $(document).ready(function(){
    $("#privacy-policy").on("input", function(){
    var length = $(this).val().length;
    $(".privacy-count").html(length);
    });
    });
    
    
    $(document).ready(function(){
    $("#cookies-policy").on("input", function(){
         var length = $(this).val().length;
          $(".cookies-count").html(length); 
    
    });
    });
    
    
    
    // branding detail
    $(document).ready(function(){
    $(".branding-form").submit(function(e){
    e.preventDefault();
    
    
    var file = document.querySelector("#brand-logo"); 
    var file_size;
    if(file.value == "")
    {
    file_size = 0;
    }
    else{
    file_size = file.files[0].size;
    }
    if(200000>file_size){
    $.ajax({
    type: "POST",
    url: "php/branding.php",
    data: new FormData(this),
    processData: false,
    contentType: false,
    cache: false,
    success: function(response)
    {
    document.write(response);
    }
    });
    }
    else{
        alert("upload pic less than 200kb");
    }
    });
    });
    
    
    // point solution 
    //
    $(document).ready(function(){
    $.ajax({
    type: "POST",
    url: "php/check_branding_table.php",
    success: function (response)
    {
    var all_data = JSON.parse(response.trim());
    
        $("#brand-name").val(all_data[0].brand_name);
    $("#domain-name").val(all_data[0].domain_name);
    $("#email").val(all_data[0].email);
    $("#facebook-url").val(all_data[0].facebook_url);
    $("#twitter-url").val(all_data[0].twitter_url);
    $("#address").val(all_data[0].address);
    $("#phone").val(all_data[0].phone);
    $("#about-us").val(all_data[0].about_us);
    $("#privacy-policy").val(all_data[0].privacy_policy);
    $("#cookies-policy").val(all_data[0].cookies_policy);
    $("#terms").val(all_data[0].terms_policy);
    $(".branding-form input,.branding-form textarea,.branding-form button").prop("disabled", true);
    $(".branding-edit").click(function(){
        $(".branding-form input,.branding-form textarea,.branding-form button").prop("disabled", false);
        $("#brand-logo").removeAttr("required");
    });
    }
    
    });
    });

}

//header showcase
function header_showcase() {



    $(document).ready(function() {
        $(".target").each(function() {
            $(".target").click(function(event) {
                var element = event.target;
                var in_number = $(element).index();
                sessionStorage.setItem("color_in_number", in_number);

                var i;
                for (i = 0; i < $(".target").length; i++) {
                    $(".target").css({
                        border: "",
                        boxShadow: "",
                        padding: "",
                        width: ""
                    });
                    $(this).css({
                        border: "5px solid red",
                        boxShadow: "0px 0px 3px grey",
                        padding: "2px",
                        width: "fit-content"
                    });
                }
                $(this).on("dblclick", function() {
                    var i;
                    for (i = 0; i < $(".target").length; i++) {
                        $(".target").css({
                            border: "",
                            boxShadow: "",
                            padding: "",
                            width: ""
                        });
                    }
                });

            });
        });


        $(".color-selector").on("change", function() {
            var color = this.value;
            var in_number = Number(sessionStorage.getItem("color_in_number"));
            var element = document.getElementsByClassName("target")[in_number];
            element.style.color = color;
        });

        $(".font-size").on("input", function() {
            var size = this.value;
            var in_number = Number(sessionStorage.getItem("color_in_number"));
            var element = document.getElementsByClassName("target")[in_number];
            element.style.fontSize = size + "%";
        });



    });


    //title image upload
    $(document).ready(function() {
        $("#title-image").on("change", function() {
            var file = this.files[0];
            if (file.size < 200000) {
                var url = URL.createObjectURL(file);
                var image = new Image();
                image.src = url;
                image.onload = function() {
                    var o_width = image.width;
                    var o_height = image.height;
                    if (o_width == 1920 && o_height == 978) {

                        image.style.width = "100%";
                        image.style.position = "absolute";
                        image.style.top = "0";
                        image.style.left = "0";
                        $(".showcase-preview").append(image);
                    } else {
                        alert("Please upload 1920*978px image");
                    }
                }
            } else {
                alert("Plaese upload leas than 200kb");
            }
        });
    });


    //taxtarea max length
    $(document).ready(function() {
        $("#title-text").on("input", function() {
            var length = this.value.length;
            $(".showcase-title").html(this.value);
            $(".title-limit").html(length);
        });
    });
    $(document).ready(function() {
        $("#subtitle-text").on("input", function() {
            var length = this.value.length;
            $(".showcase-subtitle").html(this.value);
            $(".subtitle-limit").html(length);
        });

    });


    //add show case
    $(document).ready(function() {
        $(".showcase-form").submit(function(e) {
            e.preventDefault();
            var title = document.querySelector(".showcase-title");
            var subtitle = document.querySelector(".showcase-subtitle");
            var file = document.querySelector("#title-image").files[0];
            var title_size = "";
            var title_color = "";

            if (title.style.fontSize == "") {
                title_size = "300%";
            } else {
                title_size = title.style.fontSize;
            }
            if (title.style.color == "") {
                title_color = "black";
            } else {
                title_color = title.style.color;
            }
            var subtitle_size = "";
            var subtitle_color = "";
            if (subtitle.style.fontSize == "") {
                subtitle_size = "200%";
            } else {
                subtitle_size = subtitle.style.fontSize;
            }
            if (subtitle.style.color == "") {
                subtitle_color = "black";
            } else {
                subtitle_color = subtitle.style.color;
            }
            var flex_box = document.querySelector(".showcase-preview");
            var h_align = "";
            var v_align = "";
            if (flex_box.style.justifyContent == "") {
                h_align = "flex-start";
            } else {
                h_align = flex_box.style.justifyContent;
            }
            if (flex_box.style.alignItems == "") {
                v_align = "flex-start";
            } else {
                v_align = flex_box.style.alignItems;
            }


            var css_data = {
                title_size: title_size,
                title_color: title_color,
                subtitle_size: subtitle_size,
                subtitle_color: subtitle_color,
                h_align: h_align,
                v_align: v_align,
                title_text: title.innerHTML,
                subtitle_text: subtitle.innerHTML,
                buttons: $(".title-buttons").html().trim()
            };
            var formdata = new FormData();
            formdata.append("file_data", file);
            formdata.append("css_data", JSON.stringify(css_data));

            console.log(css_data);
            $.ajax({
                type: "POST",
                url: "php/header_showcase.php",
                data: formdata,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    alert(response);

                }
            });
        });
    });

    // aligment
    $(document).ready(function() {
        $(".alignment").each(function() {
            $(this).click(function() {
                var align_position = $(this).attr("align-position");
                var align_value = $(this).attr("align-value");
                if (align_position == "h") {
                    $(".showcase-preview").css({
                        justifyContent: align_value
                    });
                } else if (align_position == "v") {
                    $(".showcase-preview").css({
                        alignItems: align_value
                    });
                }
            });
        });
    });

    //add button in showcase

    $(document).ready(function() {
        $(".add-btn").click(function() {
            var button = document.createElement("BUTTON");
            button.className = "btn mr-2";
            var a = document.createElement("A");
            a.href = $(".btn-url").val();
            a.innerHTML = $(".btn-name").val();
            a.style.color = $(".btn-textcolor").val();
            a.style.fontSize = $(".btn-size").val();
            button.style.backgroundColor = $(".btn-bgcolor").val();
            button.append(a);
            // $(".title-buttons").append(button);

            var title_buttons = document.querySelector(".title-buttons");
            var title_child = title_buttons.getElementsByTagName("BUTTON");
            var button_length = title_child.length;

            if (button_length == 0 || button_length == 1) {
                $(".title-buttons").append(button);

            } else {
                alert("Only two buttons are allowed");
            }

        });
    });

    //preview page coding
    $(document).ready(function() {
        $(".real-preview-btn").click(function(e) {
            e.preventDefault();
            var file = document.querySelector("#title-image").files[0];
            var formdata = new FormData();
            formdata.append("photo", file);
            var flex_box = document.querySelector(".showcase-preview");
            var h_align = "";
            var v_align = "";
            if (flex_box.style.justifyContent == "") {
                h_align = "flex-start";
            } else {
                h_align = flex_box.style.justifyContent;
            }
            if (flex_box.style.alignItems == "") {
                v_align = "flex-start";
            } else {
                v_align = flex_box.style.alignItems;
            }
            var array = [$(".title-box").html().trim(), h_align, v_align];
            formdata.append("data", JSON.stringify(array));
            $.ajax({
                type: "POST",
                url: "php/preview.php",
                data: formdata,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    var page = window.open("about:blank");
                    page.document.open();
                    page.document.write(response);
                    page.document.close();

                }
            });
        });
    });
}


//category showcase coding
function category_Showcase() {
    $(document).ready(function() {
        $(".upload-icon").each(function() {
            $(this).on("change", function() {
                var upload_icon = this;
                var dummy_pic = upload_icon.parentElement.parentElement.parentElement.getElementsByTagName("img")[0];
                var input = upload_icon.parentElement.parentElement.getElementsByTagName("INPUT")[1];
                var set_btn = upload_icon.parentElement.parentElement.getElementsByClassName("set-btn")[0];

                // alert(dummy_pic.naturalWidth)
                var dummy_pic_width = dummy_pic.naturalWidth;
                var dummy_pic_height = dummy_pic.naturalHeight;
                var file = upload_icon.files[0];
                var url = URL.createObjectURL(file);
                var image = new Image();
                image.src = url;
                var uploaded_width = "";
                var uploaded_height = "";
                image.onload = function() {
                    uploaded_width = image.width;
                    uploaded_height = image.height;

                    if (dummy_pic_width == uploaded_width && dummy_pic_height == uploaded_height) {
                        // alert("done");
                        input.oninput = function() {
                            if (this.value.length >= 1) {

                                set_btn.disabled = false;
                                set_btn.onclick = function() {
                                    var formdata = new FormData();
                                    formdata.append("photo", file);
                                    formdata.append("text", input.value);
                                    formdata.append("direction", $(set_btn).attr("img-dir"));
                                    // alert($(".set_btn").attr("img-dir"));
                                    $.ajax({
                                        type: "POST",
                                        url: "php/category_showcase.php",
                                        data: formdata,
                                        processData: false,
                                        contentType: false,
                                        cache: false,
                                        beforeSend: function() {
                                            set_btn.innerHTML = "Please wait...";
                                        },
                                        success: function(response) {

                                            // alert(response);
                                            if (response.trim() == "success") {
                                                dummy_pic.src = url;
                                                set_btn.innerHTML = "SET";
                                                $(upload_icon.parentElement.parentElement).addClass("d-none");
                                                dummy_pic.ondblclick = function() {
                                                    $(upload_icon.parentElement.parentElement).removeClass("d-none");
                                                }
                                            }
                                        }
                                    });
                                }


                            } else {
                                set_btn.disabled = true;
                            }
                        }


                    } else {
                        alert("Please upload " + dummy_pic_width + "/" + dummy_pic_height);
                    }
                }
            });
        });
    });






    //set btn enable and desable code
    $(document).ready(function() {
        var img = $("img");
        var i;
        for (i = 0; i < img.length; i++) {
            if (img[i].src.indexOf("base64") != -1) {
                var set_btn = img[i].parentElement.getElementsByClassName("set-btn")[0];
                set_btn.disabled = false;

                $(".set-btn").each(function() {
                    $(this).click(function() {

                        set_btn = this;
                        var input = this.parentElement.getElementsByTagName("INPUT");
                        var file = input[0].files[0];
                        var text = input[1].value;

                        var input = this.parentElement.getElementsByTagName("INPUT");
                        var file = input[0].files[0];
                        var text = input[1].value;
                        var dummy_pic = this.parentElement.parentElement.getElementsByTagName("img")[0];
                        var url = dummy_pic.src;
                        if (input[0].value != "") {
                            url = URL.createObjectURL(input[0].files[0]);
                        }
                        var formdata = new FormData();
                        formdata.append("photo", file);
                        formdata.append("text", text);
                        formdata.append("direction", $(set_btn).attr("img-dir"));
                        // alert($(".set_btn").attr("img-dir"));
                        $.ajax({
                            type: "POST",
                            url: "php/category_showcase.php",
                            data: formdata,
                            processData: false,
                            contentType: false,
                            cache: false,
                            beforeSend: function() {
                                set_btn.innerHTML = "Please wait...";
                            },
                            success: function(response) {

                                // alert(response);
                                if (response.trim() == "success") {
                                    dummy_pic.src = url;
                                    set_btn.innerHTML = "SET";
                                    $(set_btn.parentElement).addClass("d-none");
                                    dummy_pic.ondblclick = function() {
                                        $(set_btn.parentElement).removeClass("d-none");
                                    }
                                }
                            }
                        });


                    });
                });


            }
        }
    });

}