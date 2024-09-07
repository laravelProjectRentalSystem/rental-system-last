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
                        <h3>Welcome to Fun Chalets</h3>
                        <p>Fun Chalets offers an exceptional experience, combining luxury and leisure for you and your family or friends. The chalets are carefully
                            designed to provide an atmosphere full of excitement and activities, with modern amenities and spaces perfect for enjoying memorable times</p>
                    </div>
                    <div class="at-feature">
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-1.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>Enjoy a Fun-Filled Atmosphere</h6>
                                <p>We help you find the perfect chalet for spending joyful moments with your loved ones.
                                </p>
                            </div>
                        </div>
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-2.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>Professional Services</h6>
                                <p>Find the best experts who know every detail of the chalet market</p>
                            </div>
                        </div>
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-3.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>Rent Chalets</h6>
                                <p>Hundreds of chalets equipped with the latest entertainment facilities are waiting for you in top locations</p>
                            </div>
                        </div>
                        <div class="af-item">
                            <div class="af-icon">
                                <img src="img/chooseus/chooseus-icon-4.png" alt="">
                            </div>
                            <div class="af-text">
                                <h6>List Your Own Chalet</h6>
                                <p>Sign up now and list your chalet for sale or rent with ease</p>
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
