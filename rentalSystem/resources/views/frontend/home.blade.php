<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'Home')

@section('content')
<style>
    p {

font-family: "Montserrat", sans-serif;
color: rgb(185, 184, 184) ;

}
.property-item {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}

.pi-pic {
    position: relative;
    overflow: hidden;
    transition: transform 0.5s ease; /* Increased duration for smoother zoom */
}

.pi-pic::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0));
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none; /* Ensure it doesn’t interfere with clicking */
}

.pi-pic:hover {
    transform: scale(1.03); /* Softer zoom effect */
}

.pi-pic:hover::before {
    opacity: 1; /* Show the shadow on hover */
}

.pi-text-overlay {
    position: absolute;
    bottom: -100%; /* Hide below the container */
    left: 10px;
    width: calc(100% - 20px); /* Adjust width with padding */
    color: white; /* Text color */
    padding: 10px; /* Padding around the text */
    margin-left: 15px; /* Add left margin to the text */
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    transition: bottom 0.3s ease, opacity 0.3s ease; /* Smooth slide-in effect */
    opacity: 0; /* Hidden initially */
}

.pi-pic:hover .pi-text-overlay {
    bottom: 10px; /* Move up into view on hover */
    opacity: 1; /* Show text on hover */
}

.pi-text-overlay i {
    margin-right: 5px; /* Space between icon and text */
}

/* Example icon styles if needed */
.pi-text-overlay .icon_price::before {
    content: "\f154"; /* FontAwesome icon code (example) */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}
.pi-text-overlay .icon_location::before {
    content: "\f041"; /* FontAwesome icon code (example) */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

/* Lighter neon light effect for the shadow on hover */
.property-item:hover {
    box-shadow: 0 0 10px 4px rgba(0, 200, 158, 0.6); /* Lighter neon light shadow */
}



</style>
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('storage/' . $properties[0]->photos->first()->photo_url) }} " style="height: 600px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hc-inner-text">
                            <div class="hc-text">
                                <h4>{{ $properties[0]->title }}</h4>
                             <p><span class="icon_pin_alt"></span> {{ $properties[0]->location }}</p>
                               <div class="label" style="{{ $properties[0]->availability == 1 ? 'background-color:green;' : 'background-color:red;' }}">
                                    {{ $properties[0]->availability == 1 ? 'available' : 'rented' }}
                                </div>
                                <h5>{{ $properties[0]->price_per_day }}<span>/day</span></h5>
                            </div>
                            <div class="hc-widget">
                                <ul>
                                    {{-- <li><i class="fa fa-object-group"></i> 2, 283</li> --}}
                                    <li><i class="fa fa-bathtub"></i> 0{{ $properties[0]->number_of_bathrooms }}</li>
                                    <li><i class="fa fa-bed"></i> 0{{ $properties[0]->number_of_bedrooms }}</li>
                                    <li><i class="fa fa-automobile"></i> 0{{ $properties[0]->number_of_garage }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="{{ asset('storage/' . $properties[1]->photos->first()->photo_url) }} " style="height: 600px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hc-inner-text">
                            <div class="hc-text">
                                <h4>{{ $properties[1]->title }}</h4>
                                <p><span class="icon_pin_alt"></span> {{ $properties[1]->location }}</p>
                                <div class="label" style="{{ $properties[1]->availability == 1 ? 'background-color:green;' : 'background-color:red;' }}">
                                    {{ $properties[1]->availability == 1 ? 'available' : 'rented' }}
                                </div>
                                <h5>{{ $properties[1]->price_per_day }}<span>/day</span></h5>
                            </div>
                            <div class="hc-widget">
                                <ul>
                                    {{-- <li><i class="fa fa-object-group"></i> 2, 283</li> --}}
                                    <li><i class="fa fa-bathtub"></i> 0{{ $properties[1]->number_of_bathrooms }}</li>
                                    <li><i class="fa fa-bed"></i> 0{{ $properties[1]->number_of_bedrooms }}</li>
                                    <li><i class="fa fa-automobile"></i> 0{{ $properties[1]->number_of_garage }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="{{ asset('storage/' . $properties[2]->photos->first()->photo_url) }}" style="height: 600px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hc-inner-text">
                            <div class="hc-text">
                                <h4>{{ $properties[2]->title }}</h4>
                                <p><span class="icon_pin_alt"></span> {{ $properties[2]->location }}</p>
                                <div class="label" style="{{ $properties[2]->availability == 1 ? 'background-color:green;' : 'background-color:red;' }}">
                                    {{ $properties[2]->availability == 1 ? 'available' : 'rented' }}
                                </div>
                                <h5>{{ $properties[2]->price_per_day }}<span>/day</span></h5>
                            </div>
                            <div class="hc-widget">
                                <ul>
                                    {{-- <li><i class="fa fa-object-group"></i> 2, 283</li> --}}
                                    <li><i class="fa fa-bathtub"></i> 0{{ $properties[2]->number_of_bathrooms }}</li>
                                    <li><i class="fa fa-bed"></i> 0{{ $properties[2]->number_of_bedrooms }}</li>
                                    <li><i class="fa fa-automobile"></i> 0{{ $properties[2]->number_of_garage }}</li>
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
                    <h4>PROPERTIES</h4>
                </div>
            </div>
            <div class="col-lg-7">
                {{-- <div class="property-controls">
                    <ul>
                        <li data-filter="all">All</li>
                        <li data-filter=".apart">Apartment</li>
                        <li data-filter=".house">House</li>
                        <li data-filter=".office">Office</li>
                        <li data-filter=".hotel">Hotel</li>
                        <li data-filter=".restaurent">Restaurent</li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <div class="row property-filter">
            @foreach ($properties as $property)


            <div class="col-lg-4 col-md-6 mix all house">
                <div class="property-item">
                    <div class="pi-pic set-bg" data-setbg="{{ asset('storage/' . $property->photos->first()->photo_url) }}">
                        <div class="pi-pic profile-pic set-bg">
                            {{-- profile image --}}
                            <div class="label" style="{{ $property->availability == 1 ? 'background-color:green;' : 'background-color:red;' }}">
                                {{ $property->availability == 1 ? 'available' : 'rented' }}
                            </div>
                        </div>
                        <!-- Overlay text with icons -->
                        <div class="pi-text-overlay">
                            <p>{{ \Illuminate\Support\Str::words($property->description, 20) }}</p>
                        </div>
                    </div>
                    <div class="pi-text" style="margin:12px">
                        {{-- <a href="#" class="heart-icon" style="text-decoration: none"><span class="icon_heart_alt"></span></a> --}}
                        <div class="pt-price">{{ $property->price_per_day }}<span>/Day</span></div>
                        <h5><a href="{{ route('viewProperty', ['id' => $property->id]) }}" style="text-decoration: none">{{ $property->title }}</a></h5>
                        <p><span class="icon_pin_alt"></span> {{ $property->location }}</p>
                        <ul>
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
                    <p>Fun Chalets offers an exceptional experience, combining luxury and leisure for you and your
                        family or friends. The chalets are carefully designed to provide an atmosphere full of excitement and activities, with modern amenities and spaces perfect for enjoying memorable times.
                   </p>
                </div>
                <div class="chooseus-features">
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-1.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5 {{-- style="font-size: 1rem" --}}>Enjoy a Fun-Filled Atmosphere</h5>
                            <p>We help you find the perfect chalet .</p>
                        </div>
                    </div>
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-2.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5>Professional Services</h5>
                            <p>Find the best experts who know every detail of the chalet market.</p>
                        </div>
                    </div>
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-3.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5> Rent Chalets</h5>
                            <p>Hundreds of chalets equipped with the latest entertainment facilities are waiting for you in top locations</p>
                        </div>
                    </div>
                    <div class="cf-item">
                        <div class="cf-pic">
                            <img src="img/chooseus/chooseus-icon-4.png" alt="">
                        </div>
                        <div class="cf-text">
                            <h5>List Your Own Chalet</h5>
                            <p>Sign up now and list your chalet for rent with ease</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Chooseus Section End -->

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
                                {{-- <li><i class="fa fa-object-group"></i> 2, 283</li> --}}
                                <li><i class="fa fa-bathtub"></i>0{{ $property->number_of_bathrooms }}</li>
                                <li><i class="fa fa-bed"></i> 0{{ $property->number_of_bedrooms }}</li>
                                <li><i class="fa fa-automobile"></i>0{{ $property->number_of_garage }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>
</section>
<!-- Feature Property Section End -->
<!-- Logo Carousel Begin -->
{{-- <div class="logo-carousel">
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
</div> --}}
<!-- Logo Carousel End -->
<!-- Team Section Begin -->
{{-- <section class="team-section spad">
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
</section> --}}
<!-- Team Section End -->

<!-- Categories Section Begin -->
{{-- <section class="categories-section">
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
</section> --}}
<!-- Categories Section End -->

<!-- Testimonial Section Begin -->
{{-- <section class="testimonial-section spad">
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
</section> --}}
<!-- Testimonial Section End -->



<!-- Contact Section Begin -->

<!-- Contact Section End -->
@endsection
