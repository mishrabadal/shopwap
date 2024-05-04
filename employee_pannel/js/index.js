$(document).ready(function () {
    $(".stock-update-btn").click(function () {
        $(".stock-update-btn-menu").collapse('toggle');
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
//pointmishra
$(".create-products-form").submit(function(e){

e.preventDefault();
if($(".brands-name").val() !="choose brands")
    {
$.ajax({
type:"POST",
url : "php/create_product.php",
data : new FormData(this),
processData:false,
contentType:false,
cache:false,
success:function(response){
document.write(response);
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