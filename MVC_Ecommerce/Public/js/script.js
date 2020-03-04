
var url = "http://localhost/MVC_DB_Demo/Public";
var categoryData = [];

//load Category
$(document).ready(function() {

    $.ajax({
        
        url : url+"/Home/getCategorys",
        success : function(category) {
            
            category = JSON.parse(category);
            categoryData = category;
            categoryNav = "";
            for (const catName in category) {
                
                categoryNav += "<div class='dropdown'>";
                categoryNav += '<a href="" class="navbar-brand dropdown-toggle" data-toggle="dropdown">'+category[catName]["parentCat"]+'</a>';
                categoryNav += '<div class="dropdown-menu">';
                childCategory = category[catName]["childCat"];
                childCategory = childCategory.split(",");
                childCategoryUrl = category[catName]["childUrl"];
                childCategoryUrl = childCategoryUrl.split(",");

                for(var i=0; i<childCategoryUrl.length; i++){
                    categoryNav += '<a href="'+url+'/category/view/'+childCategoryUrl[i]+'" class="dropdown-item">'+childCategory[i]+'</a>';
                }
                categoryNav += "</div>";
                categoryNav += "</div>";
                
            }

            $("#categoryList").html(categoryNav);
        }
    });
});

console.log(categoryData);

//Load Cart
function loadCart(){

    $.ajax({

        url : url+"/AddToCart/getCart",
        success : function(data) {
            data = JSON.parse(data);
            
            if(data != ""){
                var table = "<table class='table table-striped'><tr><th>Product Name</th><th>Price</th><th>Qunt</th><th>Total</th><th>Action</th></tr>";
                for (const product in data) {

                    temp = data[product];
                    table += "<tr>";
                    for (const productData in temp) {
                        table += "<td>"+temp[productData]+"</td>";
                    }
                    table += "<td><i class='glyphicon delete glyphicon-trash' id='"+temp['productName']+"'></i></td>";
                    table += "</tr>";
                }
                table += "</table>";
            } else {
                table = "<b>Your Cart is Empty</b>";
            }

            $("#cartData").html(table);
        }
        
    });
}

loadCart();

//Add To Cart
function addToCart(productData){

    var productName = productData.productName;
    var productPrice = productData.price;
    var qunt = productData.qunt;
    var action = "add";
    $.ajax({

        url : url+"/AddToCart",
        method : "POST",
        data : { productName : productName, productPrice : productPrice, qunt : qunt, action : action},
        success : function(data) {
            loadCart();
        } 
    });
}

//qunt increment Decrement
$(document).ready(function(){

    var quantitiy=0;
    var maxQunt = parseInt($("#quantity").attr("max"));

    $('.quantity-right-plus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        if(quantity < maxQunt)
            $('#quantity').val(quantity + 1);
        else
            $('#quantity').val(quantity);
        
    });

    $('.quantity-left-minus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        if(quantity>1){
        $('#quantity').val(quantity - 1);
        }
    });
    
});

// delte From Cart
$(document).on('click', '.delete', function() {
    
    var deleteProduct = $(this).attr('id');

    if(confirm("You Want To Delete ?")){
        $.ajax({

            url : url+"/AddToCart/removeCartItem",
            method : "POST",
            data : {removeItem : deleteProduct},
            success : function(data) {
                loadCart();
            }
        });
    }
});


// search Product
$(document).on('click', '.srch', function() { 
    var srchName = "";
    srchName = $('#srchName').val();
    srchName = srchName.trim();
    srchName = srchName.replace(/ /g, '-');
    //alert(srchName);
    if(srchName != "")
        window.location.href = url+"/search/view/"+srchName;
});
