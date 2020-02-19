
var url = "http://localhost/MVC_DB_Demo/Public/AddToCart";

function loadCart(){

    $.ajax({

        url : url+"/getCart",
        success : function(data) {
            data = JSON.parse(data);
            console.log(typeof(data));
            
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

var productData;

function addToCart(productData){

    var productName = productData.productName;
    var productPrice = productData.price;
    var qunt = productData.qunt;
    var action = "add";
    $.ajax({

        url : url,
        method : "POST",
        data : { productName : productName, productPrice : productPrice, qunt : qunt, action : action},
        success : function(data) {
            loadCart();
        } 
    });
}

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
        if(quantity>0){
        $('#quantity').val(quantity - 1);
        }
    });
    
});

$(document).on('click', '.delete', function() {
    
    var deleteProduct = $(this).attr('id');

    if(confirm("You Want To Delete ?")){
        $.ajax({

            url : url+"/removeCartItem",
            method : "POST",
            data : {removeItem : deleteProduct},
            success : function(data) {
                loadCart();
            }
        });
    }
});

