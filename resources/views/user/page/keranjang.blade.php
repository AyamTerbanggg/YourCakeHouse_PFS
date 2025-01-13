@extends('user.layout.index')

@section('content')
<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<h3 class="mt-5 px-5">Keranjang Belanja</h3>
<div class="row px-5" id="cart-items">
    <!-- Cart items will be dynamically inserted here -->
</div>

<script>
    function loadCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = ''; // Clear existing items

        cart.forEach(item => {
            const totalPrice = item.price * item.quantity;
            cartItemsContainer.innerHTML += `
                <div class="card mb-3">
                    <div class="card-body d-flex gap-4">
                        <img src="{{ asset('path/to/your/image') }}" alt="${item.name}" width="200" height="200">
                        <div class="desc w-100">
                            <p style="font-size:24px; font-weight:700;">${item.name}</p>
                            <input type="number" class="form-control border-0 fs-1" value="${item.price}" readonly>
                            <div class="row mb-2">
                                <label for="qty" class="col-sm-2 col-form-label fs-5">Quantity</label>
                                <div class="col-sm-5 d-flex">
                                    <button class="rounded-start bg-secondary p-2 border border-0" onclick="updateQuantity('${item.name}', 1)">+</button>
                                    <input type="number" name="qty" class="form-control w-25 text-center" id="qty" min="0" max="9999" value="${item.quantity}">
                                    <button class="rounded-end bg-secondary p-2 border border-0" onclick="updateQuantity('${item.name}', -1)" ${item.quantity <= 1 ? 'disabled' : ''}>-</button>
                                </div>
                            </div>
                            <div class="row">
                                <label for="price" class="col-sm-2 col-form-label fs-5">Total</label>
                                <input type="text" class="col-sm-2 form-control w-25 border-0 fs-5" readonly value="Rp ${totalPrice}">
                            </div>
                            <div class="row w-50 gap-1">
                                <a href="/checkout" class="btn btn-success col-sm-5">
                                    <i class="fas fa-shopping-cart"></i>
                                    Checkout
                                </a>
                                <button class="btn btn-danger col-sm-5" onclick="removeFromCart('${item.name}')">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    }

    function updateQuantity(name, change) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const item = cart.find(item => item.name === name);
        if (item) {
            item.quantity += change;
            if (item.quantity <= 0) {
                removeFromCart(name);
            } else {
                localStorage.setItem('cart', JSON.stringify(cart));
                loadCart(); // Refresh the cart display
            }
        }
    }

    function removeFromCart(name) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.name !== name);
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCart(); // Refresh the cart display
    }

    // Load cart items on page load
    document.addEventListener('DOMContentLoaded', loadCart);
</script>
@endsection