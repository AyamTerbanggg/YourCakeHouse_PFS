@extends('user.layout.index')

@section('content')
<div class="row mt-3 px-5">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body ekspedisi">
                <h3>Masukan Alamat Penerima</h3>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('checkout') }}" method ="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="nama_penerima" class="col-form-label col-sm-3">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_penerima" name="namaPenerima"
                                placeholder="Masukan Nama Penerima" autofocus required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_penerima" class="col-form-label col-sm-3">Alamat Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat_penerima" name="alamatPenerima"
                                placeholder="Masukan Alamat Penerima" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tlp" class="col-form-label col-sm-3">No.tlp Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tlp" name="tlp"
                                placeholder="Masukan No tlp Penerima" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ekspedisi" class="col-form-label col-sm-3">Ekspedisi</label>
                        <div class="col-sm-9">
                            <select name="ekspedisi" class="form-control eksp" id="ekspedisi" required>
                                <option value="">-- Pilih Ekspedisi --</option>
                                <option value="jnt">J&T Ekspress</option>
                                <option value="jne">JNE Ekspress</option>
                                <option value="sicepat">Sicepat Ekspress</option>
                                <option value="ninja">Ninja Ekspress</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Proceed to Checkout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header text-center p-4">
                <h3>Total Belanja</h3>
            </div>
            <div class="card-body pembayaran">
                <h3 class="mb-3"></h3>
                <input type="hidden" name="code">
                <div class="row mb-3">
                    <label for="totalBelanja" class="col-form-label col-sm-6">Total Belanja</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control totalBelanja" id="totalBelanja"
                            name="totalBelanja" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="discount" class="col-form-label col-sm-6">Discount</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control discount" id="discount" name="discount" value="0">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="PPn" class="col-form-label col-sm-6">PPn</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control ppn" id="PPn" name="PPn" value="0">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ongkir" class="col-form-label col-sm-6">Ongkir</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control ongkir" id="ongkir" name="ongkir" value="0">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="dibayarkan" class="col-form-label col-sm-6">Total</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control dibayarkan" id="dibayarkan" name="dibayarkan"
                            value="0" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlahBarang" class="col-form-label col-sm-6">Jumlah Barang</label <div class="col-sm-6">
                        <input type="number" class="form-control" id="jumlahBarang" name="jumlahBarang" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="totalQty" class="col-form-label col-sm-6">Total Quantity</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="totalQty" name="totalQty" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="receipt" style="display:none;">
    <h3>Receipt</h3>
    <div id="receipt-content"></div>
</div>

<script>
    function loadCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = ''; // Clear existing items

        let totalBelanja = 0; // Initialize total belanja
        let totalQuantity = 0; // Initialize total quantity

        cart.forEach(item => {
            const totalPrice = item.price * item.quantity;
            totalBelanja += totalPrice; // Add to total belanja
            totalQuantity += item.quantity; // Add to total quantity
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

        // Update the total belanja and quantity input fields
        document.getElementById('totalBelanja').value = totalBelanja; // Set total belanja
        document.getElementById('jumlahBarang').value = cart.length; // Set jumlah barang
        document.getElementById('totalQty').value = totalQuantity; // Set total quantity
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

    function printReceipt() {
        const cart = JSON.parse(localStorage .getItem('cart')) || [];
        let receiptContent = '<h3>Receipt</h3><ul>';
        let totalBelanja = 0;

        cart.forEach(item => {
            const totalPrice = item.price * item.quantity;
            totalBelanja += totalPrice;
            receiptContent += `<li>${item.name} - Quantity: ${item.quantity}, Total: Rp ${totalPrice}</li>`;
        });

        receiptContent += `</ul><h4>Total Belanja: Rp ${totalBelanja}</h4>`;
        document.getElementById('receipt-content').innerHTML = receiptContent;
        document.getElementById('receipt').style.display = 'block'; // Show the receipt
    }

    // Load cart items on page load
    document.addEventListener('DOMContentLoaded', loadCart);
</script>

@endsection