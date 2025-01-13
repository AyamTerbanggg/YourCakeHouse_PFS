@extends('user.layout.index')
@section('title', 'Home')

@section('content')
<style>

.header {
    text-align: center;
    margin-bottom: 20px;
}
.header h1 {
    font-size: 24px;
    font-weight: 700;
}
.main-content {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      border-radius: 15px;
}
.main-content .highlight {
            flex: 1 1 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
        }
        .main-content .highlight img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .main-content .highlight .text {
            max-width: 50%;
            padding-left: 20px;
        }
        .main-content .highlight .text h2 {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 10px;
        }
        .main-content .highlight .text p {
            font-size: 14px;
            margin: 0;
        }
    /* Efek hover pada kartu */
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: scale(1.02); /* Zoom in gambar */        
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
    }
</style>
<main>
    <!-- Banner Carousel -->
    <div id="bannerCarousel" class="carousel slide mt-0" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('asset/jumbotron1.svg') }}" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('asset/jumbotron2.svg') }}" class="d-block w-100" alt="Slide 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="mt-4">
    <!-- Featured Products Section -->
    <div class="header" style="color: #493628">
        <h1 class="fs-4 pt-4 font-weight-bold">Featured Cakes</h1>
    </div>
    <div class="main-content px-5 pt-4" style="color: #493628">
        <div class="highlight shadow hover-card">
            <img alt="Strawberry Cupcakes" height="300" src="{{ asset('asset/4.jpeg') }}" width="500" class="hover-effect" />
            <div class="text px-5">
                <h2 class="font-weight-bold">Strawberry Cupcakes</h2>
                <p>Perfect for any occasion, our cupcakes are crafted with high-quality ingredients and come in a variety of flavors like Vanilla, Chocolate, Red Velvet, and Matcha. Beautifully decorated and customizable to suit your theme, they’re ideal as gifts, party treats, or everyday indulgences. Available in packs of 6, 12, or more. Order now and make every bite special!</p>
            </div>
        </div>
    </div>
    <div class="row px-5 pt-4" style="color: #493628">
        <div class="col-md-3 mb-4">
            <div class="card shadow hover-card">
                <img alt="Birthday Cake" src="{{ asset('asset/1.jpeg') }}" class="card-img-top hover-effect" />
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title font-weight-bold text-center">Birthday Cake</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow hover-card">
                <img alt="Cheesecake" src="{{ asset('asset/9.jpeg') }}" class="card-img-top hover-effect" />
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title font-weight-bold text-center">Cheesecake</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow hover-card">
                <img alt="Brownies" src="{{ asset('asset/12.jpeg') }}" class="card-img-top hover-effect" />
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title font-weight-bold text-center">Brownies</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow hover-card">
                <img alt="Oreo Cupcakes" src="{{ asset('asset/8.jpeg') }}" class="card-img-top hover-effect" />
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title font-weight-bold text-center">Oreo Cupcakes</h5>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection