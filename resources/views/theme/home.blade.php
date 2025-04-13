@extends('theme.master')

@section('hero-title', 'Welcome to Our Website')
@section('home-active', 'active')

@section('content')

<!-- Hero Section -->
<div class="hero-section" style="background: #f8f9fa; padding: 100px 0; text-align: center;">
    <div class="container">
        <h1 class="display-4">Welcome to Our Website</h1>
        <p class="lead">We provide the best services to boost your business.</p>
        <a href="{{ route('theme.services') }}" class="btn btn-primary mt-3">Our Services</a>
    </div>
</div>

<!-- Services Preview -->
<div class="container my-5">
    <h2 class="text-center mb-4">Our Services</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <img src="{{ asset('assets/images/service1.svg') }}" alt="Service 1" class="img-fluid mb-3">
                <h4>Web Development</h4>
                <p>Build powerful and modern websites tailored to your needs.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <img src="{{ asset('assets/images/service2.svg') }}" alt="Service 2" class="img-fluid mb-3">
                <h4>Graphic Design</h4>
                <p>Attractive branding and visuals to bring your ideas to life.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <img src="{{ asset('assets/images/service3.svg') }}" alt="Service 3" class="img-fluid mb-3">
                <h4>Digital Marketing</h4>
                <p>Grow your reach and customers with smart digital strategies.</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="text-center my-5">
    <h3>Need help with your next project?</h3>
    <a href="{{ route('theme.contact') }}" class="btn btn-success mt-3">Contact Us</a>
</div>

@endsection
