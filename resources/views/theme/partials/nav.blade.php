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
                <li><a class="nav-link" href="#"><img src="{{ asset('assets') }}/images/user.svg"></a></li>
                <li><a class="nav-link" href="{{ route('theme.cart') }}"><img src="{{ asset('assets') }}/images/cart.svg"></a></li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
