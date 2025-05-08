@extends('theme.master')

@section('home-active', 'active')

@section('content')
<!-- Hero Section -->
<div class="hero">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1 class="display-4 mb-4">Bienvenue chez S&B Store</h1>
                    <p class="lead mb-4">Votre destination de confiance pour des meubles de qualité et un design d'intérieur exceptionnel.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Acheter
                        </a>
                        <a href="{{ route('theme.about') }}" class="btn btn-outline-light ms-2">
                            <i class="fas fa-info-circle me-2"></i>En Savoir Plus
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="{{ asset('assets/images/hero-bg.jpg') }}" alt="S&B Store" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="featured-products py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">Produits Vedettes</h2>
            @auth
                @if(auth()->user()->role === 'seller')
                    <a href="{{ route('seller.products.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Ajouter un Produit
                    </a>
                @endif
            @endauth
        </div>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-12 col-md-4 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/product-1.png') }}" alt="Chaise Nordique" class="img-fluid">
                    </div>
                    <div class="product-info">
                        <h3>Chaise Nordique</h3>
                        <p class="price">450DHS</p>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>Voir Détails
                        </a>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-12 col-md-4 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/product-2.png') }}" alt="Chaise Aéro Kruzo" class="img-fluid">
                    </div>
                    <div class="product-info">
                        <h3>Chaise Aéro Kruzo</h3>
                        <p class="price">680DHS</p>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>Voir Détails
                        </a>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-12 col-md-4 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/product-3.png') }}" alt="Chaise Ergonomique" class="img-fluid">
                    </div>
                    <div class="product-info">
                        <h3>Chaise Ergonomique</h3>
                        <p class="price">350DHS</p>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>Voir Détails
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero {
    background-color: #3b5d50;
    color: white;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(59, 93, 80, 0.9), rgba(59, 93, 80, 0.7));
    z-index: 1;
}

.hero .container {
    position: relative;
    z-index: 2;
}

.hero-text h1 {
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.hero-text p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 30px;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
}

.btn-primary:hover {
    background-color: #2d473d;
    border-color: #2d473d;
    transform: translateY(-2px);
}

.btn-outline-light {
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
}

.featured-products {
    background-color: #f8f9fa;
}

.section-title {
    color: #3b5d50;
    font-weight: 600;
    margin-bottom: 0;
}

.product-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image {
    position: relative;
    padding-top: 75%;
    overflow: hidden;
}

.product-image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    padding: 20px;
    text-align: center;
}

.product-info h3 {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 10px;
}

.price {
    color: #3b5d50;
    font-weight: bold;
    font-size: 1.1rem;
    margin-bottom: 15px;
}

.btn-outline-primary {
    color: #3b5d50;
    border-color: #3b5d50;
}

.btn-outline-primary:hover {
    background-color: #3b5d50;
    border-color: #3b5d50;
}

@media (max-width: 991.98px) {
    .hero-text {
        text-align: center;
        margin-bottom: 40px;
    }

    .hero-buttons {
        justify-content: center;
    }
}
</style>
@endsection
