// add to cart
$(document).ready(function(){
    $(".cart-btn").each(function(){
    $(this).click(function() {
    var all_cookie = document.cookie.split(';');
    var i;
    var temp_cookie=[];
    for(i=0;i<all_cookie.length;i++)
    {
    var cookie = all_cookie[i].split('=');
    if(cookie[0].trim() != '_au_')
    {
temp_cookie[i]=cookie[0].trim();
    }
    else{
        temp_cookie="matched";
    }
    }
    if(temp_cookie == "matched")
        {
        
            var product_id = $(this).attr("product-id");
            var product_title = $(this).attr("product-title");
            var product_price = $(this).attr("product-price");
            var product_brand= $(this).attr("product-brand");
            var product_pic = $(this).attr("product-pic");
            $.ajax({
            type: "POST",
            url: "http://localhost/shopwap/pages/php/cart.php",
            data: {
                 product_id : product_id,
                 product_title: product_title,
                  product_price : product_price, 
                  product_brand : product_brand, 
                  product_pic : product_pic
            },
            success: function(response){
                // alert(response);

                if(response.trim()=="success"){

        if($(".cart-notification").prop("nodeName") != undefined)
            {
            var no = Number($(".cart-notification span").html().trim());
            no++; 

            $(".cart-notification span").html(no);
            }
            else{
                var div = document.createElement("DIV");
                div.style.color = "white";
                div.style.backgroundColor = "red";
                div.style.width = "25px";
                div.style.height = "25px";
                div.style.borderRadius = "50%";
                div.style.position = "absolute";
                div.style.top = "-10px";
                div.style.left = "25px";
                div.style.fontWeight = "bold";
                div.style.zIndex = "1000";
                div.className = "cart-notification";
                var span = document.createElement("span");
                span.innerHTML = 1;
                $(div).append(span);
                $(".cart-link").append(div);
            }

                }
                else{
                    alert(response);
                }



            }
            });

        }
        else{
        window.location = "signin.php"
        }
    });
    });
    });



// remove from cart
$(document).ready(function(){
    $(".delete-cart-btn").each(function(){
    $(this).click(function(){
        var btn =this;
    var id = $(this).attr("product-id");
    $.ajax({
    type: "POST",
    url: "../../pages/php/remove_cart.php",
    data: {
    id: id
    }, 
    success :function(response){
        if(response.trim() == "success")
            {
            var cart_box = btn.parentElement.parentElement.parentElement;
            cart_box.remove();
            } 
            else{
            alert(response);
            }
    }
    
    });
    });
    });
    });

    //buy btn
    // remove from cart
$(document).ready(function(){
    $(".buy-btn").each(function(){
    $(this).click(function(){
    var product_id = $(this).attr("product-id");
window.location="http://localhost/shopwap/pages/php/buy_product.php?id="+product_id;
    }); 
    });
    });


    //purchase btn
    $(document).ready(function(){
        $(".purchase-btn").click(function(){
        var pay_mode = $("input[name='pay-mode']:checked").val();
        if(pay_mode)
        {
            var id = $(this).attr("product-id");
            var title = $(this).attr("product-title");
            var brand = $(this).attr("product-brand");
            var price = $(this).attr("product-price");
            var qnt = $(".quantity").val();
            if(pay_mode == "online")
            {
               window.location="../../pay/pay.php?id="+id+"&title="+title+"&brand="+brand+"&price="+price+"&qnt="+qnt;
            }
        }
        else{
        alert("Please choose a payment mode");
        }
        });
        });


        //preview
        // preview
$(document).ready(function(){
    $(".thumb-pic").each(function(){
        
    $(this).click(function(){
       
    var src = $(this).attr("src");
    $(".preview").attr("src", src);
    $(".preview").addClass("animated pulse");
    setTimeout(function(){
    $(".preview").removeClass("animated pulse"); }, 1000);
    });
    });
    });



    // ajax live search
$(document).ready(function(){
    $(".search").on("input", function(){
    var keyword = $(this).val();
    $.ajax({
    type: "POST",
   // url: "pages/php/live_search.php",
   url: "http://localhost/shopwap/pages/php/live_search.php",
    data: {
    keyword: keyword
    },
    success: function(response) {
        $(".search-hint").html(response);
        $(".search-tag").on("mouseover", function(){
            $(this).css({
            backgroundColor: 'red', 
            color: 'white',
            cursor:'pointer'
            });
            });
            $(".search-tag").on("mouseout", function(){ $(this).css({
            backgroundColor: 'inherit', color: 'inherit'
            });
            });
            //write in search box text
            $(".search-tag").each(function(){
                $(this).click(function(){
                var id = $(this).attr("product-id");
                $(".search").val($(this).html().trim());
                $(".search-hint").html("");
                window.location="http://localhost/shopwap/pages/php/buy_product.php?id="+id;
                
                });
                }); 
     } 
    });
    });
    });


    //search enter and search box
    $(document).ready(function(){
        $(".search").on("keypress", function(e){
        if(e.keyCode == 13 && $(this).val() != "")
        {
        var keyword = $(".search").val().trim();
        window.location = "http://localhost/shopwap/pages/php/search_result.php?search="+keyword;
        }
        });
        });


        $(document).ready(function(){
            $(".search-icon").on("click", function(e){
            if($(".search").val() != "")
            {
            var keyword = $(".search").val().trim();
            window.location = "http://localhost/shopwap/pages/php/search_result.php?search="+keyword;
            }
            else{
                alert("please write something in search box");
            }
            });
            });