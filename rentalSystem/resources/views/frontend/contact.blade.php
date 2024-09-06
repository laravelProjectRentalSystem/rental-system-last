
@extends('layouts.master')

@section('title', 'Contact')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-contact-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h4>Contact Us</h4>
                    <div class="bt-option">
                        <a href="{{ route('home') }}"style="text-decoration: none;"><i class="fa fa-home" ></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Form Section Begin -->
<section class="contact-form-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cf-content">
                    <div class="cc-title">
                        <h4>Contact form</h4>
                        <p>We would appreciate your feedback on how we can improve the flexibility of our current system/process. Your insights will help us make necessary adjustments and enhancements to better meet your needs.</p>
                    </div>
                    <form action="{{ route('tohome') }}" method="GET" class="cc-form" id="contactForm">
                        @csrf
                        <div class="group-input">
                            <input type="text" style="width: 48%" placeholder="Name" id="name" required>
                            <input type="email" style="width: 48%" placeholder="Email" id="email" required>
                            {{-- <input type="text" placeholder="Website" id="website"> --}}
                        </div>
                        <textarea placeholder="Comment" id="comment" required></textarea>
                        <button type="submit" class="site-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form Section End -->

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
<script>
     document.getElementById('contactForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Optional: Add your own form validation logic here

        // Display SweetAlert confirmation message
        Swal.fire({
            title: 'Thank You!',
            text: 'Thanks for reaching out to us',
            icon: 'success',
            confirmButtonText: 'OK'
        });

        // Optionally, you could reset the form after showing the alert
        document.getElementById('contactForm').reset();
    });
</script>
 <!-- Contact Section End -->
@endsection

