@extends('theme.master')

@section('home-active', 'active')

@section('content')
<!-- Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Bienvenue chez S&B Store</h1>
                    <p>Votre destination de confiance pour des meubles de qualité et un design d'intérieur exceptionnel.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('theme.shop') }}" class="btn btn-shop">Acheter</a>
                        <a href="{{ route('theme.about') }}" class="btn btn-explore">En Savoir Plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="{{ asset('assets/images/couch.jpg') }}" alt="Modern Couch" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="featured-products">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Produits Vedettes</h2>
            <a href="{{ route('products.create') }}" class="btn btn-success">+ Ajouter un Produit</a>
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
                        <p class="price">450€</p>
                        <a href="{{ route('theme.shop') }}" class="btn btn-outline-primary">Voir Détails</a>
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
                        <p class="price">680€</p>
                        <a href="{{ route('theme.shop') }}" class="btn btn-outline-primary">Voir Détails</a>
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
                        <p class="price">350€</p>
                        <a href="{{ route('theme.shop') }}" class="btn btn-outline-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero {
    background-image: url('{{ asset('assets') }}/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 80px 0;
    position: relative;
    overflow: hidden;
    color: white;
}

.hero-text {
    color: white;
    padding-right: 50px;
}

.hero-text p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 1rem;
    opacity: 0.9;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.btn {
    padding: 15px 35px;
    border-radius: 30px;
    font-weight: 500;
    font-size: 0.9rem;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

.btn-shop {
    background: #ffc107;
    color: #000;
    border: none;
}

.btn-shop:hover {
    background: #ffcd38;
    transform: translateY(-2px);
}

.btn-explore {
    background: transparent;
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.btn-explore:hover {
    background: rgba(255, 255, 255, 0.1);
}

.featured-products {
    padding: 80px 0;
    background: #f8f9fa;
}

.product-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
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
    padding: 8px 20px;
}

.btn-outline-primary:hover {
    background-color: #3b5d50;
    color: white;
}

@media (max-width: 991.98px) {
    .hero-text {
        text-align: center;
        padding-right: 0;
        margin-bottom: 40px;
    }

    .hero-buttons {
        justify-content: center;
    }
}
</style>
@endsection
