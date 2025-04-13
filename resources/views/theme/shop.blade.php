@extends('theme.master')

@section('hero-title', 'Shop')
@section('shop-active', 'active')

@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2 class="section-title">Our Products</h2>
                </div>
            </div>

            <div class="row">

                <!-- Product Item -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="{{ asset('assets/images/product-1.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Product Name</h3>
                        <strong class="product-price">$19.00</strong>
                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>

                <!-- Repeat more products as needed -->

            </div>
        </div>
    </div>
@endsection
