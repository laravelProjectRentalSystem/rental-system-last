<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'Property Blade')

@section('content')
<style>
    #search-input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    color: #555;
    background-color: #fff;
    box-shadow: none;
    outline: none;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

#search-input:focus {
    border-color: #00c89e;
    box-shadow: 0 0 5px rgba(0, 200, 158, 0.5);
}

.newcont{
    display: flex;
    gap: 2%;
}
.sm-width{
    width: 32%;
    margin-bottom: 2%;
    height: 45px;

}
select option{
    overflow: auto;

}
.slider-container {
    position: relative;
    width: 100%;
    height: 10px;
    margin-top: 20px;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 10px;
    background: transparent;
    position: absolute;
    top: 0;
    pointer-events: auto; /* Enable interaction */
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: #00c89e;
    cursor: pointer;
    border-radius: 50%;
    border: 2px solid #ffffff;
    position: relative;
    z-index: 2;
}

.slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: #00c89e;
    cursor: pointer;
    border-radius: 50%;
    border: 2px solid #ffffff;
    position: relative;
    z-index: 2;
}

.range-fill {
    position: absolute;
    height: 10px;
    background-color: #00c89e;
    z-index: 1;
    top: 0;
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
p {

    font-family: "Montserrat", sans-serif;
    color: rgb(185, 184, 184) ;

}
</style>
<!-- Breadcrumb Section Begin -->
{{-- <section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h4>Property Grid</h4>
                    <div class="bt-option">
                        <a href="{{ route('home') }}"  style="text-decoration: none"><i class="fa fa-home" ></i> Home</a>
                        <span>Property</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Breadcrumb Section End -->
<!-- Search Section Begin -->
<section class="search-section spad" style="height: 67vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title">
                    <h4>what would you rather to book?</h4>
                </div>
            </div>

        </div>

        <div class="search-form-content">
            <form action="{{ route('searchProperty') }}" method="POST" class="filter-form">
                @csrf

                <select class="sm-width" name="location">
                    <option value="" selected disabled>Choose The City</option>
                    <option value="amman">Amman</option>
                    <option value="aqaba">Aqaba</option>
                    <option value="irbid">Irbid</option>
                    <option value="zarqa">Zarqa</option>
                    <option value="mafraq">Mafraq</option>
                    <option value="karak">Karak</option>
                    <option value="madaba">Madaba</option>
                    <option value="tafilah">Tafilah</option>
                    <option value="ma'an">Ma'an</option>
                    <option value="ajloun">Ajloun</option>
                    <option value="jerash">Jerash</option>
                    <option value="al-Salt">Al-Salt</option>
                </select>
                <input value="" id="search-input" class="sm-width" placeholder="search" name="search">

                <select class="sm-width" name="availability">
                    <option value="">Property Status</option>
                    <option value="1">available</option>
                    <option value="0">not available</option>
                </select>


                <div class="price-range-wrap sm-width">
                   <div class="price-text">
    <label for="priceRange">Price:</label>
    <input type="text" id="priceRange" readonly>
</div>
<div class="slider-container">
    <input type="range" id="minPriceRange" class="slider" min="0" max="2000" value="0" step="10">
    <input type="range" id="maxPriceRange" class="slider" min="0" max="2000" value="2000" step="10">
    <div class="range-fill"></div>
</div>
<input type="hidden" name="min_price" id="hiddenMinPrice">
<input type="hidden" name="max_price" id="hiddenMaxPrice">



                    <div class="price-text">

                    </div>
                    {{-- <div id="price-range" class="slider"></div> --}}
                </div>
<br> <br><br><br>
                <button type="submit" class="search-btn sm-width">Search</button>
            </form>
        </div>
        {{-- <div class="more-option">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-heading active">
                        <a data-toggle="collapse" data-target="#collapseOne">
                            More Search Options
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="mo-list">
                                <div class="ml-column">
                                    <label for="air">Air conditioning
                                        <input type="checkbox" id="air">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="lundry">Laundry
                                        <input type="checkbox" id="lundry">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="refrigerator">Refrigerator
                                        <input type="checkbox" id="refrigerator">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="washer">Washer
                                        <input type="checkbox" id="washer">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="ml-column">
                                    <label for="barbeque">Barbeque
                                        <input type="checkbox" id="barbeque">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="lawn">Lawn
                                        <input type="checkbox" id="lawn">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="sauna">Sauna
                                        <input type="checkbox" id="sauna">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="wifi">Wifi
                                        <input type="checkbox" id="wifi">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="ml-column">
                                    <label for="dryer">Dryer
                                        <input type="checkbox" id="dryer">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="microwave">Microwave
                                        <input type="checkbox" id="microwave">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pool">Swimming Pool
                                        <input type="checkbox" id="pool">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="window">Window Coverings
                                        <input type="checkbox" id="window">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="ml-column last-column">
                                    <label for="gym">Gym
                                        <input type="checkbox" id="gym">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="shower">OutdoorShower
                                        <input type="checkbox" id="shower">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="tv">Tv Cable
                                        <input type="checkbox" id="tv">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- Search Section End -->
<!-- Property Section Begin -->
<section class="property-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>PROPERTY Grid</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ( $properties as $property )

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
        {{-- <div class="loadmore-btn">
            <a href="#">Load more</a>
        </div> --}}
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const minPriceRange = document.getElementById('minPriceRange');
    const maxPriceRange = document.getElementById('maxPriceRange');
    const priceRangeLabel = document.getElementById('priceRange');
    const rangeFill = document.querySelector('.range-fill');
    const hiddenMinPrice = document.getElementById('hiddenMinPrice');
    const hiddenMaxPrice = document.getElementById('hiddenMaxPrice');

    function updateRange() {
        let minValue = parseInt(minPriceRange.value);
        let maxValue = parseInt(maxPriceRange.value);

        if (minValue > maxValue) {
            minValue = maxValue;
            minPriceRange.value = minValue;
        }
        if (maxValue < minValue) {
            maxValue = minValue;
            maxPriceRange.value = maxValue;
        }

        const minPercent = (minValue / minPriceRange.max) * 100;
        const maxPercent = (maxValue / maxPriceRange.max) * 100;

        rangeFill.style.left = `${minPercent}%`;
        rangeFill.style.width = `${maxPercent - minPercent}%`;

        priceRangeLabel.value = `$${minValue} - $${maxValue}`;

        // Update hidden inputs
        hiddenMinPrice.value = minValue;
        hiddenMaxPrice.value = maxValue;
    }

    minPriceRange.addEventListener('input', updateRange);
    maxPriceRange.addEventListener('input', updateRange);

    updateRange();  // Initialize the range and sync hidden inputs
});


</script>
<!-- Property Section End -->
@endsection
