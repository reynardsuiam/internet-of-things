let cart = [];


// Add item

function addToCart(name,price){

    let item = cart.find(product => product.name === name);


    if(item){

        item.quantity++;

    }

    else{

        cart.push({

            name:name,
            price:price,
            quantity:1

        });

    }


    updateCart();


    alert(name + " added to cart");

}



// Update cart display

function updateCart(){


let cartItems=document.getElementById("cart-items");

cartItems.innerHTML="";


let total=0;

let count=0;



cart.forEach((item,index)=>{


total += item.price * item.quantity;

count += item.quantity;



cartItems.innerHTML += `

<div class="cart-item">

<h3>${item.name}</h3>

<p>
₹${item.price} x ${item.quantity}
</p>


<button onclick="increase(${index})">
+
</button>


<button onclick="decrease(${index})">
-
</button>


<button onclick="removeItem(${index})">
Remove
</button>


</div>

`;

});



document.getElementById("total").innerHTML=total;

document.getElementById("cart-count").innerHTML=count;


}



// Increase quantity

function increase(index){

cart[index].quantity++;

updateCart();

}



// Decrease quantity

function decrease(index){


if(cart[index].quantity>1){

cart[index].quantity--;

}

else{

cart.splice(index,1);

}


updateCart();


}



// Remove item

function removeItem(index){

cart.splice(index,1);

updateCart();

}



// Open cart

function openCart(){

document.getElementById("cart").style.display="block";

}



// Close cart

function closeCart(){

document.getElementById("cart").style.display="none";

}



// Place order

function placeOrder(){


if(cart.length===0){

alert("Your cart is empty!");

return;

}


alert("Order placed successfully!");


cart=[];

updateCart();

closeCart();


}



// Cancel order

function cancelOrder(){


if(cart.length===0){

alert("No order to cancel!");

return;

}


cart=[];

updateCart();


alert("Order cancelled successfully");


closeCart();


}