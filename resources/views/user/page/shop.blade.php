@extends('user.layout.index')
@section('title', 'Shop')

@section('content')
<style>
.btn-sm{
    background-color: #AB886D;
}
.btn-sm:hover {
    background-color: #493628;
}
.product-card {
        transition: transform 0.2s; /* Smooth transition for hover effect */
    }
    .product-card:hover {
        transform: scale(1.02); /* Scale up on hover */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
    }
    .card-header img {
        height: 165px; /* Set a fixed height for images */
        object-fit: cover; /* Maintain aspect ratio */
    }
    .card-body {
        text-align: center; /* Center text in card body */
    }
    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
<!-- <div class="d-flex flex-row gap-2 mt-4 px-5"> -->
    <!-- Kategori Sidebar -->
    <!-- <div class="col-md-3">
        <div class="card">
            <div class="card-header fw-bold text-center" style="background-color: #AB886D; color: white;">
                Categories
            </div>
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                     Cake Category -->
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Cakes
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="d-flex flex-column gap-4">
                                    <div class="d-flex flex-row gap-3">
                                        <input type="checkbox" name="category" class="category" value="Birthday Cakes">
                                        <span>Birthday Cakes</span>
                                    </div>
                                    <div class="d-flex flex-row gap-3">
                                        <input type="checkbox" name="category" class="category" value="Cupcakes">
                                        <span>Cupcakes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --> 
                    <!-- Pastries & Desserts Category -->
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Pastries & Desserts
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="d-flex flex-column gap-4">
                                    <div class="d-flex flex-row gap-3">
                                        <input type="checkbox" name="category" class="category" value="Cheesecakes">
                                        <span>Cheesecakes</span>
                                    </div>
                                    <div class="d-flex flex-row gap-3">
                                        <input type="checkbox" name="category" class="category" value="Brownies">
                                        <span>Brownies</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Traditional Cakes Category -->
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Traditional Cakes
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="d-flex flex-column gap-4">
                                    <div class="d-flex flex-row gap-3">
                                        <input type="checkbox" name="category" class="category" value="Layer Cakes">
                                        <span>Layer Cakes</span>
                                    </div>
                                    <div class="d-flex flex-row gap-3">
                                        <input type="checkbox" name="category" class="category" value="Sponge Cakes">
                                        <span>Sponge Cakes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="d-flex flex-wrap gap-4 mb-5 px-5 pt-4" id="filterResult">
    @if ($data->isEmpty())
        <h1 class="text-center w-100">Belum ada produk ...!</h1>
    @else
        @foreach ($data as $p)
            <div class="card product-card" style="width: 200px;">
                <div class="card-header">
                    <img src="{{ asset('storage/product/' . $p->foto) }}" alt="{{ $p->nama_product }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 16px; font-weight: bold;">{{ $p->nama_product }}</h5>
                    <p class="m-0"><i class="fa-regular fa-star"></i> 5+</p>
                </div>
                <div class="card-footer">
                    <p class="m-0" style="font-size: 14px; font-weight: 600;">
                        <span>IDR </span>{{ number_format($p->harga) }}
                    </p>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="idProduct" value="{{ $p->id }}">
                        <button type="submit" class="btn btn-outline-primary" style="font-size: 24px;">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>

<div class="pagination d-flex flex-row justify-content-between px-5">
    <div class="showData">
        Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
    </div>
    <div>
        {{ $data->links() }}
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.kategory').change(function(e) {
            e.preventDefault();
            var value = $(this).val();
            var split = value.split(' ');
            var kategory = split[0];
            var type = split[1];
            $.ajax({
                type: "GET",
                url: "{{ route('shop') }}",
                data: {
                    kategory: kategory,
                    type: type,
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });

    // Function to add item to cart
    function addToCart(name, price) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingItem = cart.find(item => item.name === name);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ name, price, quantity: 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`${name} has been added to your cart!`);
    }

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');
            addToCart(name, price);
        });
    });
</script>
@endsection
