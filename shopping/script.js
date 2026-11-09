
let cart = [];

// Format Indian currency
function formatPrice(price) {
    return price.toLocaleString("en-IN");
}

// Show notification
function showToast(message) {

    let toast = document.getElementById("toast");

    toast.textContent = message;
    toast.classList.add("show");

    clearTimeout(window.toastTimer);

    window.toastTimer = setTimeout(() => {
        toast.classList.remove("show");
    }, 2200);
}

// Add item to cart
function addToCart(name, price) {

    let item = cart.find(product => product.name === name);

    if (item) {
        item.quantity++;
    } else {
        cart.push({
            name: name,
            price: price,
            quantity: 1
        });
    }

    updateCart();

    showToast(name + " added to cart ✓");
}

// Update cart
function updateCart() {

    let cartItems = document.getElementById("cart-items");

    cartItems.innerHTML = "";

    let total = 0;
    let count = 0;

    if (cart.length === 0) {

        cartItems.innerHTML = `
            <div class="empty-cart">
                <div>🛍️</div>
                <h3>Your cart is empty</h3>
                <p>Add some products to get started!</p>
                <button onclick="closeCart()">Continue Shopping</button>
            </div>
        `;
    }

    cart.forEach((item, index) => {

        let subtotal = item.price * item.quantity;

        total += subtotal;
        count += item.quantity;

        cartItems.innerHTML += `

            <div class="cart-item">

                <div class="cart-item-info">

                    <h3>${item.name}</h3>

                    <p>₹${formatPrice(item.price)}</p>

                    <div class="quantity-controls">

                        <button onclick="decrease(${index})">−</button>

                        <span>${item.quantity}</span>

                        <button onclick="increase(${index})">+</button>

                    </div>

                </div>

                <div class="cart-item-right">

                    <strong>₹${formatPrice(subtotal)}</strong>

                    <button class="remove-btn"
                    onclick="removeItem(${index})">
                    Remove
                    </button>

                </div>

            </div>

        `;
    });

    document.getElementById("total").textContent = formatPrice(total);

    document.getElementById("cart-count").textContent = count;

    document.getElementById("cart-subtitle").textContent =
        count + (count === 1 ? " item in your cart" : " items in your cart");
}

// Increase quantity
function increase(index) {

    cart[index].quantity++;

    updateCart();
}

// Decrease quantity
function decrease(index) {

    if (cart[index].quantity > 1) {
        cart[index].quantity--;
    } else {
        cart.splice(index, 1);
    }

    updateCart();
}

// Remove item
function removeItem(index) {

    let name = cart[index].name;

    cart.splice(index, 1);

    updateCart();

    showToast(name + " removed from cart");
}

// Open cart sidebar
function openCart() {

    document.getElementById("cart").classList.add("active");

    document.getElementById("overlay").classList.add("active");
}

// Close cart sidebar
function closeCart() {

    document.getElementById("cart").classList.remove("active");

    document.getElementById("overlay").classList.remove("active");
}

// Clear cart
function cancelOrder() {

    if (cart.length === 0) {
        showToast("Your cart is already empty");
        return;
    }

    cart = [];

    updateCart();

    showToast("Cart cleared successfully");
}

// Place order
function placeOrder() {

    if (cart.length === 0) {
        showToast("Please add products to your cart first");
        return;
    }

    cart = [];

    updateCart();

    closeCart();

    document.getElementById("success-message").classList.add("active");
}

// Close success message
function closeSuccess() {

    document.getElementById("success-message").classList.remove("active");
}

// Initial display
updateCart();
