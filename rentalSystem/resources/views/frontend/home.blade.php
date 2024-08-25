<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'Home')

@section('content')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hc-inner-text">
                            <div class="hc-text">
                                <h4>Balaji Symphony</h4>
                                <p><span class="icon_pin_alt"></span> Panvel, Navi Mumbai</p>
                                <div class="label">For Rent</div>
                                <h5>$ 65.0<span>/month</span></h5>
                            </div>
                            <div class="hc-widget">
                                <ul>
                                    <li><i class="fa fa-object-group"></i> 2, 283</li>
                                    <li><i class="fa fa-bathtub"></i> 03</li>
                                    <li><i class="fa fa-bed"></i> 05</li>
                                    <li><i class="fa fa-automobile"></i> 01</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hc-inner-text">
                            <div class="hc-text">
                                <h4>Balaji Symphony</h4>
                                <p><span class="icon_pin_alt"></span> Panvel, Navi Mumbai</p>
                                <div class="label">For Rent</div>
                                <h5>$ 65.0<span>/month</span></h5>
                            </div>
                            <div class="hc-widget">
                                <ul>
                                    <li><i class="fa fa-object-group"></i> 2, 283</li>
                                    <li><i class="fa fa-bathtub"></i> 03</li>
                                    <li><i class="fa fa-bed"></i> 05</li>
                                    <li><i class="fa fa-automobile"></i> 01</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hc-inner-text">
                            <div class="hc-text">
                                <h4>Balaji Symphony</h4>
                                <p><span class="icon_pin_alt"></span> Panvel, Navi Mumbai</p>
                                <div class="label">For Rent</div>
                                <h5>$ 65.0<span>/month</span></h5>
                            </div>
                            <div class="hc-widget">
                                <ul>
                                    <li><i class="fa fa-object-group"></i> 2, 283</li>
                                    <li><i class="fa fa-bathtub"></i> 03</li>
                                    <li><i class="fa fa-bed"></i> 05</li>
                                    <li><i class="fa fa-automobile"></i> 01</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

{{-- add about us setion --}}

<!-- Property Section Begin -->
<section class="property-section latest-property-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title">
                    <h4>Latest PROPERTY</h4>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="property-controls">
                    <ul>
                        <li data-filter="all">All</li>
                        <li data-filter=".apart">Apartment</li>
                        <li data-filter=".house">House</li>
                        <li data-filter=".office">Office</li>
                        <li data-filter=".hotel">Hotel</li>
                        <li data-filter=".restaurent">Restaurent</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row property-filter">
            @foreach ($properties as $property)

            <div class="col-lg-4 col-md-6 mix all house">
                <div class="property-item">

                        <div class="pi-pic set-bg" data-setbg="{{ asset('storage/' . $property->photos->first()->photo_url) }}">

                        <div class="pi-pic set-bg" data-setbg="">
                            {{-- profile image --}}
                            <div class="label" style="{{ $property->availability == 1 ? 'background-color:green;' : 'background-color:red;' }}">
                                {{ $property->availability == 1 ? 'available' : 'rented' }}
                            </div>
                                                </div>                    </div>
                    <div class="pi-text">
                        <a href="#" class="heart-icon" style="text-decoration: none"><span class="icon_heart_alt"></span></a>
                        <div class="pt-price">{{ $property->price_per_day }}<span>/Day</span></div>
                        <h5><a href="{{ route('viewProperty', ['id' => $property->id]) }}"  style="text-decoration: none">{{ $property->title }}</a></h5>
                        <p><span class="icon_pin_alt"></span> {{ $property->location }}</p>
                        <ul>
                            {{-- <li><i class="fa fa-object-group"></i> 2, 283</li> --}}

                                <li><i class="fa fa-bathtub"></i> 0{{ $property->number_of_bathrooms }}</li>

                            <li><i class="fa fa-bed"></i> 0{{ $property->number_of_bedrooms }}</li>
                            <li><i class="fa fa-automobile"></i> 0{{ $property->number_of_garage }}</li>
                        </ul>
                        <div class="pi-agent">
                            <div class="pa-item">
                                <div class="pa-info">
                                    <img src="{{ Storage::url($property->user->profile_picture) }}" alt="">
                                    <h6>{{ $property->user->name }}</h6>
                                </div>
                                <div class="pa-text">
                                    {{ $property->user->phone_number }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Property Section End -->

<!-- Chooseus Section Begin -->
<section class="chooseus-section spad set-bg" data-setbg="img/chooseus/chooseus-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="chooseus-text">
                    <div class="section-title">
                        <h4>Why choose us</h4>
                    </div>
                    <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="chooseus-features">
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-1.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5>Find your future home</h5>
                            <p>We help you find a new home by offering a smart real estate.</p>
                        </div>
                    </div>
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-2.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5>Buy or rent homes</h5>
                            <p>Millions of houses and apartments in your favourite cities</p>
                        </div>
                    </div>
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-3.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5>Experienced agents</h5>
                            <p>Find an agent who knows your market best</p>
                        </div>
                    </div>
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-4.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5>List your own property</h5>
                            <p>Sign up now and sell or rent your own properties</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Chooseus Section End -->
<!-- Logo Carousel Begin -->
<div class="logo-carousel">
    <div class="container">
        <div class="lc-slider owl-carousel">
            <a href="#" class="lc-item">
                <div class="lc-item-inner">
                    <img src="img/logo-carousel/lc-1.png" alt="">
                </div>
            </a>
            <a href="#" class="lc-item">
                <div class="lc-item-inner">
                    <img src="img/logo-carousel/lc-2.png" alt="">
                </div>
            </a>
            <a href="#" class="lc-item">
                <div class="lc-item-inner">
                    <img src="img/logo-carousel/lc-3.png" alt="">
                </div>
            </a>
            <a href="#" class="lc-item">
                <div class="lc-item-inner">
                    <img src="img/logo-carousel/lc-4.png" alt="">
                </div>
            </a>
            <a href="#" class="lc-item">
                <div class="lc-item-inner">
                    <img src="img/logo-carousel/lc-5.png" alt="">
                </div>
            </a>
            <a href="#" class="lc-item">
                <div class="lc-item-inner">
                    <img src="img/logo-carousel/lc-6.png" alt="">
                </div>
            </a>
        </div>
    </div>
</div>
<!-- Logo Carousel End -->
<!-- Feature Property Section Begin -->
<section class="feature-property-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-0">
                <div class="feature-property-left">
                    <div class="section-title">
                        <h4>Feature PROPERTY</h4>
                    </div>
                    <ul>
                        <li>Garages</li>
                        <li>Rooms</li>
                        <li>WIFI</li>
                        <li>AC</li>
                        <li>Pool</li>

                    </ul>
                    <a href="{{ route('property') }}" style="text-decoration: none">View all property</a>
                </div>
            </div>
            <div class="col-lg-8 p-0">


                <div class="fp-slider owl-carousel">
                    @foreach ( $properties as $property )
                    @foreach ($property->photos  as $photo )
                    <div class="fp-item set-bg" data-setbg="{{ asset('storage/' . $photo->photo_url) }}">
                        @break
                    @endforeach
                        <div class="fp-text">
                            <h5 class="title">{{ $property->title }}y</h5>
                            <p><span class="icon_pin_alt"></span> {{ $property->location }}</p>
                            <div class="label" style="{{ $property->availability == 1 ? 'background-color:green;' : 'background-color:red;' }}">
                                {{ $property->availability == 1 ? 'available' : 'rented' }}
                            </div>
                            <h5>{{ $property->price_per_day }}<span>/Day</span></h5>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i>0{{ $property->number_of_bathrooms }}</li>
                                <li><i class="fa fa-bed"></i> 0{{ $property->number_of_bedrooms }}</li>
                                <li><i class="fa fa-automobile"></i>0{{ $property->number_of_garage }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach

                   {{-- / <div class="fp-item set-bg" data-setbg="img/feature-property/fp-2.jpg"> --}}
                        {{-- <div class="fp-text">
                            <h5 class="title">Home in Merrick Way</h5>
                            <p><span class="icon_pin_alt"></span> 3 Middle Winchendon Rd, Rindge, NH 03461</p>
                            <div class="label">For Rent</div>
                            <h5>$ 289.0<span>/month</span></h5>
                            <ul>
                                <li><i class="fa fa-object-group"></i> 2, 283</li>
                                <li><i class="fa fa-bathtub"></i> 03</li>
                                <li><i class="fa fa-bed"></i> 05</li>
                                <li><i class="fa fa-automobile"></i> 01</li>
                            </ul>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Feature Property Section End -->

<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="section-title">
                    <h4>Latest Property</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="team-btn">
                    <a href="#"><i class="fa fa-user"></i> ALL counselor</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="ts-item">
                    <div class="ts-text">
                        <img src="img/team/team-1.jpg" alt="">
                        <h5>Ashton Kutcher</h5>
                        <span>123-455-688</span>
                        <p>Ipsum dolor amet, consectetur adipiscing elit, eiusmod tempor incididunt lorem.</p>
                        <div class="ts-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ts-item">
                    <div class="ts-text">
                        <img src="img/team/team-2.jpg" alt="">
                        <h5>Ashton Kutcher</h5>
                        <span>123-455-688</span>
                        <p>Ipsum dolor amet, consectetur adipiscing elit, eiusmod tempor incididunt lorem.</p>
                        <div class="ts-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ts-item">
                    <div class="ts-text">
                        <img src="img/team/team-3.jpg" alt="">
                        <h5>Ashton Kutcher</h5>
                        <span>123-455-688</span>
                        <p>Ipsum dolor amet, consectetur adipiscing elit, eiusmod tempor incididunt lorem.</p>
                        <div class="ts-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->

<!-- Categories Section Begin -->
<section class="categories-section">
    <div class="cs-item-list">
        <div class="cs-item set-bg" data-setbg="img/categories/cat-1.jpg">
            <div class="cs-text">
                <h5>Apartment</h5>
                <span>230 property</span>
            </div>
        </div>
        <div class="cs-item set-bg" data-setbg="img/categories/cat-2.jpg">
            <div class="cs-text">
                <h5>Villa</h5>
                <span>230 property</span>
            </div>
        </div>
        <div class="cs-item set-bg" data-setbg="img/categories/cat-3.jpg">
            <div class="cs-text">
                <h5>House</h5>
                <span>230 property</span>
            </div>
        </div>
        <div class="cs-item set-bg" data-setbg="img/categories/cat-4.jpg">
            <div class="cs-text">
                <h5>Restaurent</h5>
                <span>230 property</span>
            </div>
        </div>
        <div class="cs-item set-bg" data-setbg="img/categories/cat-5.jpg">
            <div class="cs-text">
                <h5>Office</h5>
                <span>230 property</span>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>What our client says?</h4>
                </div>
            </div>
        </div>
        <div class="row testimonial-slider owl-carousel">
            <div class="col-lg-6">
                <div class="testimonial-item">
                    <div class="ti-text">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, seiusmod tempor incididunt ut labore
                            magna aliqua. Quis ipsum suspendisse ultrices gravida accumsan lacus vel facilisis.</p>
                    </div>
                    <div class="ti-author">
                        <div class="ta-pic">
                            <img src="img/testimonial-author/ta-1.jpg" alt="">
                        </div>
                        <div class="ta-text">
                            <h5>Arise Naieh</h5>
                            <span>Designer</span>
                            <div class="ta-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-item">
                    <div class="ti-text">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, seiusmod tempor incididunt ut labore
                            magna aliqua. Quis ipsum suspendisse ultrices gravida accumsan lacus vel facilisis.</p>
                    </div>
                    <div class="ti-author">
                        <div class="ta-pic">
                            <img src="img/testimonial-author/ta-2.jpg" alt="">
                        </div>
                        <div class="ta-text">
                            <h5>Arise Naieh</h5>
                            <span>Designer</span>
                            <div class="ta-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-item">
                    <div class="ti-text">
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, seiusmod tempor incididunt ut labore
                            magna aliqua. Quis ipsum suspendisse ultrices gravida accumsan lacus vel facilisis.</p>
                    </div>
                    <div class="ti-author">
                        <div class="ta-pic">
                            <img src="img/testimonial-author/ta-1.jpg" alt="">
                        </div>
                        <div class="ta-text">
                            <h5>Arise Naieh</h5>
                            <span>Designer</span>
                            <div class="ta-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->



<!-- Contact Section Begin -->

<!-- Contact Section End -->
@endsection
