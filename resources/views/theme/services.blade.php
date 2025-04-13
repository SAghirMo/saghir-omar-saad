@extends('theme.master')

@section('hero-title', 'Nos Services')
@section('services-active', 'active')

@section('content')
    <!-- Section Services -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="section-title">Services S&B Store</h2>
                    <p class="lead">Découvrez nos services exclusifs pour votre mobilier</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('assets') }}/images/truck.svg" alt="Livraison" class="imf-fluid">
                        </div>
                        <h3>Livraison Premium</h3>
                        <p>Livraison soignée à domicile avec déballage et installation de vos meubles inclus.</p>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('assets') }}/images/bag.svg" alt="Shopping" class="imf-fluid">
                        </div>
                        <h3>Shopping Privé</h3>
                        <p>Visite personnalisée de notre showroom avec un conseiller dédié pour vos achats.</p>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('assets') }}/images/support.svg" alt="Support" class="imf-fluid">
                        </div>
                        <h3>Service Client</h3>
                        <p>Assistance dédiée pour le suivi de vos commandes et service après-vente premium.</p>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('assets') }}/images/return.svg" alt="Garantie" class="imf-fluid">
                        </div>
                        <h3>Garantie Confort</h3>
                        <p>Garantie satisfait ou remboursé de 30 jours et garantie qualité de 2 ans sur tous nos produits.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Avantages -->
    <div class="pricing-section pt-0">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="section-title">Nos Formules</h2>
                    <p class="lead">Choisissez le service qui vous convient</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3>Livraison Standard</h3>
                            <div class="price">Gratuite</div>
                            <p>Pour toute commande</p>
                        </div>
                        <ul class="pricing-features">
                            <li>Livraison à domicile</li>
                            <li>Suivi de commande</li>
                            <li>Créneau de 4h</li>
                            <li>Déballage simple</li>
                        </ul>
                        <a href="{{ route('theme.shop') }}" class="btn btn-primary">Commander</a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="pricing-card featured">
                        <div class="pricing-header">
                            <h3>Service Premium</h3>
                            <div class="price">49€</div>
                            <p>Par livraison</p>
                        </div>
                        <ul class="pricing-features">
                            <li>Livraison sur rendez-vous</li>
                            <li>Installation complète</li>
                            <li>Reprise des emballages</li>
                            <li>Assistance montage</li>
                        </ul>
                        <a href="{{ route('theme.shop') }}" class="btn btn-primary">Choisir</a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3>Shopping VIP</h3>
                            <div class="price">Gratuit</div>
                            <p>Sur rendez-vous</p>
                        </div>
                        <ul class="pricing-features">
                            <li>Conseiller personnel</li>
                            <li>Showroom privatisé</li>
                            <li>Devis personnalisé</li>
                            <li>Service prioritaire</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Réserver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Témoignages -->
    <div class="testimonial-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Avis Clients</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">
                        <div class="testimonial-slider">
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>"Service impeccable ! La livraison premium vaut vraiment le coup. Les livreurs ont été très professionnels et ont parfaitement installé notre nouveau salon. Je recommande vivement."</p>
                                            </blockquote>
                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('assets') }}/images/person-1.png" alt="Sophie Martin" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Sophie Martin</h3>
                                                <span class="position d-block mb-3">Cliente Premium</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
.pricing-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.pricing-card {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.pricing-card:hover {
    transform: translateY(-5px);
}

.pricing-card.featured {
    border: 2px solid #3b5d50;
    transform: scale(1.05);
}

.pricing-header {
    text-align: center;
    margin-bottom: 30px;
}

.pricing-header h3 {
    color: #2f2f2f;
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.price {
    font-size: 2.5rem;
    font-weight: bold;
    color: #3b5d50;
}

.pricing-features {
    list-style: none;
    padding: 0;
    margin: 0 0 30px;
}

.pricing-features li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    text-align: center;
}

.pricing-features li:last-child {
    border-bottom: none;
}

.feature {
    text-align: center;
    padding: 20px;
    transition: all 0.3s ease;
}

.feature:hover {
    transform: translateY(-5px);
}

.feature .icon {
    margin-bottom: 20px;
}

.feature h3 {
    font-size: 1.2rem;
    margin-bottom: 15px;
    color: #2f2f2f;
}

.feature p {
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.6;
}

.section-title {
    color: #2f2f2f;
    margin-bottom: 20px;
}

.lead {
    color: #6c757d;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #2f4a40;
    border-color: #2f4a40;
    transform: translateY(-2px);
}
</style>
@endsection
