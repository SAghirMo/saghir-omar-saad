@extends('theme.master')

@section('hero-title', 'About Us')
@section('about-active', 'active')

@section('content')
    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit
                        imperdiet dolor tempor tristique.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets') }}/images/truck.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Fast &amp; Free Shipping</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets') }}/images/bag.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Easy to Shop</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets') }}/images/support.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>24/7 Support</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets') }}/images/return.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Hassle Free Returns</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('assets') }}/images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start Team Section -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center">
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>

            <div class="row">
                <!-- Omar -->
                <div class="col-12 col-sm-6 col-md-6 mb-4 mb-lg-0">
                    <div class="team text-center">
                        <figure class="team-image">
                            <img src="{{ asset('assets/images/omar.jpg') }}" alt="Omar" class="img-fluid">
                        </figure>
                        <div class="team-body">
                            <h3 class="team-title">Omar bouksimi</h3>
                            <span class="team-position">Full Stack Developer</span>
                            <p class="team-text">Expert in Laravel, Vue.js, and modern web development. Passionate about creating efficient and scalable web applications.</p>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Saghir -->
                <div class="col-12 col-sm-6 col-md-6 mb-4 mb-lg-0">
                    <div class="team text-center">
                        <figure class="team-image">
                            <img src="{{ asset('assets/images/saghir.jpg') }}" alt="Saghir" class="img-fluid">
                        </figure>
                        <div class="team-body">
                            <h3 class="team-title">Saghir Mohammed</h3>
                            <span class="team-position">Full Stack Developer</span>
                            <p class="team-text">Skilled in PHP, JavaScript, and database management. Focused on building robust and user-friendly web solutions.</p>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Section -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">What Our Clients Say</h2>
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
                                                <p>Creating beautiful and functional spaces with innovative design solutions.</p>
                                            </blockquote>
                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('assets/images/omarendSaghir.jpg') }}" alt="Omar and Saghir" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Omar & Saghir</h3>
                                                <span class="position d-block mb-3">Full Stack Developers</span>
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
    <!-- End Testimonial Slider -->
@endsection

<style>
.untree_co-section {
    padding: 7rem 0;
    background: #f8f9fa;
}

.team {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.team:hover {
    transform: translateY(-10px);
}

.team-image {
    margin: 0 auto 20px;
    width: 250px;
    height: 250px;
    overflow: hidden;
    border-radius: 10px;
    position: relative;
}

.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.team-image:hover img {
    transform: scale(1.1);
}

.team-body {
    padding: 20px 0 0;
}

.team-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2f2f2f;
    margin-bottom: 5px;
}

.team-position {
    color: #6c757d;
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 15px;
    display: block;
}

.team-text {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
}

.team-social {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.team-social li a {
    color: #2f2f2f;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #f8f9fa;
}

.team-social li a:hover {
    color: #fff;
    background: #2f2f2f;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 20px;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background-color: #2f2f2f;
}

.testimonial-section {
    padding: 7rem 0;
    background: #fff;
}

.testimonial-block {
    padding: 40px;
    background: #f8f9fa;
    border-radius: 10px;
    margin-bottom: 30px;
}

.testimonial-block blockquote {
    font-size: 1.2rem;
    font-style: italic;
    color: #2f2f2f;
}

.author-info {
    margin-top: 30px;
}

.author-pic {
    width: 120px;
    height: 120px;
    margin: 0 auto 20px;
    border-radius: 50%;
    overflow: hidden;
    border: 5px solid #fff;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.author-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

@media (max-width: 768px) {
    .team {
        margin-bottom: 30px;
    }
    
    .team-image {
        width: 200px;
        height: 200px;
    }
    
    .section-title {
        font-size: 2rem;
    }

    .testimonial-block {
        padding: 20px;
    }

    .author-pic {
        width: 100px;
        height: 100px;
    }
}
</style>
