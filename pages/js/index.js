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
            url: "pages/php/cart.php",
            data: {
                 product_id : product_id,
                 product_title: product_title,
                  product_price : product_price, 
                  product_brand : product_brand, 
                  product_pic : product_pic
            },
            success: function(response){
                alert(response);
            }
            });

        }
        else{
        window.location = "signin.php"
        }
    });
    });
    });