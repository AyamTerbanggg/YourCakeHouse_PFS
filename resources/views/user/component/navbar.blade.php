<nav class="navbar navbar-dark navbar-expand-lg shadow sticky-top" style="background-color: #493628">
    <div class="container-fluid justify-content-center font-weight-bolder px-5">
        <a class="navbar-brand font-weight-bold" href="#">Cake House</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ Request::is('/') ? 'active' : '' }} font-weight-bold" aria-current="page" href="{{ route('Home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ Request::is('shop') ? 'active' : '' }} font-weight-bold" href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ Request::is('contact') ? 'active' : '' }} font-weight-bold" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex gap-4 align-items-center">
                <div class="notif">
                    <a href="{{ route('keranjang') }}" class="fs-5">
                        <i class="fa-solid icon-nav fa-cart-shopping icon-cart {{ Request::is('keranjang') ? 'active' : '' }}"></i>
                    </a>
                    <div class="circle">10</div>
                </div>
                @if (Auth::check())
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle font-weight-bolder" style="background-color: #AB886D; color: #D6C0B3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #AB886D; color: #FFFFFF" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>