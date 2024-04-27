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
            
            if(request_link=="create_category_design.php")
            {
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



        }
    });
}


//category list
function category_list(){


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
edit_btn.onclick=function(){
var parent = this.parentElement;
var id =parent.getElementsByClassName("id")[0];
var cat_name = parent.getElementsByClassName("name")[0];
var save_icon = parent.getElementsByClassName("save-icon")[0];
var edit_icon = parent.getElementsByClassName("edit-icon")[0];

cat_name.contentEditable=true;
cat_name.style.fontStyle="italic";
cat_name.focus();
$(save_icon).removeClass("d-none");
$(edit_icon).addClass("d-none");
$(save_icon).click(function(){

var changed_name =cat_name.innerHTML.trim() ;

$.ajax({
    type:"POST",
    url:"php/edit_category_name.php",
    data:{
        id:id.innerHTML.trim(),
        changed_name:changed_name
    },
    success:function(response){

if(response.trim()=="success")
{
    cat_name.contentEditable=false;
    $(save_icon).addClass("d-none");
    $(edit_icon).removeClass("d-none");
}

else{
    alert(response);
}
    },
});

});



}

//delete category
delete_btn.onclick=function(){
    var parent = this.parentElement;
    var id = parent.getElementsByClassName("id")[0].innerHTML.trim();

$.ajax({
    type:"POST",
    url: "php/delete_category_name.php",
    data:{
        id:id
    },
    success:function(response){
        if(response.trim()=="success")
        {
            parent.parentElement.parentElement.remove();
        }
        else{
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
