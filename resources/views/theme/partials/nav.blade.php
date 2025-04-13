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
                            <li><a class="dropdown-item" href="#">Mon compte</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
                @endauth
                <li><a class="nav-link" href="{{ route('theme.cart') }}"><img src="{{ asset('assets') }}/images/cart.svg"></a></li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
