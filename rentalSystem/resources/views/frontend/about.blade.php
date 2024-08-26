<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'About Us')

@section('content')
<section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h4>About us</h4>
                    <div class="bt-option">
                        <a href="{{ route('home') }}" style="text-decoration: none;"><i class="fa fa-home"></i> Home</a>
                        <span>About</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- About Section Begin -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="at-title">
                        <h3>Welcom to Aler REAL</h3>
                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type.</p>
                    </div>
                    <div class="at-feature">
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-1.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>Find your future home</h6>
                                <p>We help you find a new home by offering a smart real estate.</p>
                            </div>
                        </div>
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-2.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>Experienced agents</h6>
                                <p>Find an agent who knows your market best</p>
                            </div>
                        </div>
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-3.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>Buy or rent homes</h6>
                                <p>Millions of houses and apartments in your favourite cities</p>
                            </div>
                        </div>
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-4.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>List your own property</h6>
                                <p>Sign up now and sell or rent your own properties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic set-bg" data-setbg="img/about-us.jpg">
                    <a href="https://www.youtube.com/watch?v=8EJ3zbKTWQ8" class="play-btn video-popup">
                        <i class="fa fa-play-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Team Section Begin -->


<!-- Contact Section Begin -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Address</h5>
                            <p>Salt Institute for careers traditional crafts</p>
                        </div>
                    </div>
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Phone</h5>
                            <ul>
                                <li>125-711-811</li>
                                <li>125-668-886</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Support</h5>
                            <p>Support.aler@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-map">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.236621581292!2d35.744689!3d32.042033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca2aa6c9505af%3A0xc1d8fa75aade030f!2sSalt%20Institute%20for%20Careers%20and%20Traditional%20Crafts!5e0!3m2!1sen!2sbd!4v1637306447307!5m2!1sen!2sbd"
        height="450" style="border:0;" allowfullscreen=""></iframe>
    </div>
</section>
<!-- Contact Section End -->
@endsection
