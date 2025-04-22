<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="S&B Store navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{ route('theme.home') }}">S&B<span>Store</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsStore"
            aria-controls="navbarsStore" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsStore">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item @yield('home-active')">
                    <a class="nav-link" href="{{ route('theme.home') }}">Home</a>
                </li>
                <li class="nav-item @yield('shop-active')">
                    <a class="nav-link" href="{{ route('theme.shop') }}">Shop</a>
                </li>
                <li class="nav-item @yield('about-active')">
                    <a class="nav-link" href="{{ route('theme.about') }}">About us</a>
                </li>
                <li class="nav-item @yield('services-active')">
                    <a class="nav-link" href="{{ route('theme.services') }}">Services</a>
                </li>
                <li class="nav-item @yield('contact-active')">
                    <a class="nav-link" href="{{ route('theme.contact') }}">Contact us</a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets') }}/images/user.svg">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li><a class="dropdown-item" href="{{ route('wishlist.index') }}">My Wishlist</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
                <li>
                    <a class="nav-link position-relative" href="{{ route('wishlist.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        @auth
                            @php
                                $wishlistCount = \App\Models\Wishlist::where('user_id', auth()->id())->count();
                            @endphp
                            @if($wishlistCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $wishlistCount }}
                                </span>
                            @endif
                        @endauth
                    </a>
                </li>
                <li>
                    <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                        <img src="{{ asset('assets') }}/images/cart.svg">
                        @auth
                            @php
                                $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                            @endphp
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        @endauth
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
