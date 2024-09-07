<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aler Template">
    <meta name="keywords" content="Aler, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aler | Template')</title>

    <!-- SEO -->
    <meta name="description" content="Discover the best chalets for rent in Jordan. Browse our wide selection of luxury, affordable, and family-friendly chalets, with amenities to make your stay perfect. Book now!">
    <meta name="keywords" content="chalets for rent in Jordan, chalet rentals, Jordan chalets, rent chalet Amman, family-friendly chalets Jordan, luxury chalets Jordan, chalet booking Jordan, chalets with pool, vacation rentals Jordan, chalet holiday Jordan">
    <meta name="author" content="Your Name or Company">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/richtext.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}" type="text/css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> --}}
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Wrapper Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <span class="icon_close"></span>
        </div>
        <div class="logo">
            <a href="./index.html">
                <img src="img/logo.png" alt="">
            </a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="om-widget">

            @if (Auth::user())

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="hw-btn" style="text-decoration: none; border :0">Logout</button>
                            </form>


                            @endif
                            @if (!Auth::user())
                            <a href="{{ route('login_register') }}" class="hw-btn"style="text-decoration: none">login</a>
                            @endif
        </div>
        <div class="om-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>

        </div>
    </div>
    <!-- Offcanvas Menu Wrapper End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <!-- Your header content here -->
        <div class="hs-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="ht-widget">
                            {{-- <ul>
                                <li><i class="icon_mail_alt"></i> Aler.support@gmail.com</li>
                                <li><i class="fa fa-mobile-phone"></i> 125-711-811 <span>125-668-886</span></li>
                            </ul> --}}
                            @if (Auth::user())

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="hw-btn" style="text-decoration: none; border :0">Logout</button>
                            </form>


                            @endif
                            @if (!Auth::user())
                            <a href="{{ route('login_register') }}" class="hw-btn"style="text-decoration: none">login</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <span class="icon_menu"></span>
                </div>
            </div>
        </div>
        <div class="hs-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <nav class="nav-menu">
                            <ul>
                                <li><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                                <li><a href="{{ route('property') }}"  style="text-decoration: none">Properties</a>
                                    {{-- <ul class="dropdown"> --}}
                                        {{-- <li><a href="{{ route('property') }}">Property Grid</a></li> --}}
                                        {{-- <li><a href="{{ route('viewProfile') }}">Property List</a></li> --}}
                                        {{-- <li><a href="{{ route('property') }}">Property Detail</a></li> --}}
                                        {{-- <li><a href="{{ route('property-comparison') }}">Property Comparison</a></li> --}}
                                        {{-- <li><a href="{{ route('property-submit') }}">Property Submit</a></li> --}}
                                    {{-- </ul> --}}
                                </li>
                                {{-- <li><a href="{{ route('agents') }}"  style="text-decoration: none">Agents</a></li> --}}
                                <li><a href="{{ route('about') }}" style="text-decoration: none">About</a></li>
                                {{-- <li><a href="{{ route('blog') }}" style="text-decoration: none">Blog</a></li> --}}
                                <li><a href="{{ route('contact') }}" style="text-decoration: none">Contact</a></li>
                                @if (Auth::user())
                                <li><a href="{{ route('user.dashboard') }}" style="text-decoration: none">profile</a></li>
                                @else
                                <li><a href="{{ route('login_register') }}" style="text-decoration: none">profile</a></li>
                                @endif
                                @if (Auth::user())

                                @if (Auth::user()->role == 'lessor')
                                    <li><a href="{{ route('dashboardB') }}" style="text-decoration: none">my dashboard</a></li>
                                @endif
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="hn-social">
                            {{-- @if (Auth::user())
                            <a style="width: 50px" href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i></a>
                            @else
                            <a href="{{ route('login_register') }}"><i class="fa fa-user"></i></a>
                            @endif --}}
                            {{-- <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a> --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Main content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <!-- Your footer content here -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="fs-about">
                        <div class="fs-logo">
                            <a href="#">
                                <img src="img/f-logo.png" alt="">
                            </a>
                        </div>
                        <p>Fun Chalets offers an exceptional experience, combining luxury and leisure for you and your
                            family or friends. The chalets are carefully designed to provide an atmosphere full of excitement and activities, with modern amenities and spaces perfect for enjoying memorable times.</p>
                        <div class="fs-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="fs-widget">
                        <h5>Help</h5>
                        <ul>
                            <li><a href="#" style="text-decoration: none">Privacy Policy</a></li>
                            <li><a href="#" style="text-decoration: none">Contact Support</a></li>
                            <li><a href="#" style="text-decoration: none">Knowledgebase</a></li>
                            <li><a href="#" style="text-decoration: none">Careers</a></li>
                            <li><a href="#" style="text-decoration: none">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="fs-widget">
                        <h5>Links</h5>
                        <ul>
                            <li><a href="{{ route('contact') }}" style="text-decoration: none">Contact</a></li>
                            @if (Auth::user())
                            @if (Auth::user()->role == 'lessor')
                            <li><a href="{{ route('property.index') }}" style="text-decoration: none">My Properties</a></li>
                            @endif
                            @endif


                            <li><a href="{{ route('login_register') }}" style="text-decoration: none">Register or Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h5>Newsletter</h5>
                        <p>Subscribe to our newsletter to receive the latest updates, exclusive offers, and insider news directly to your inbox. Don't miss out!</p>

                        <form id="subscribe-form" action="#" class="subscribe-form">
                            <input type="email" placeholder="Email" name="email" required>
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>


                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.richtext.min.js') }}"></script>
    <script src="{{ asset('js/image-uploader.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Add this before the closing body tag -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('subscribe-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way

        // Show SweetAlert notification
        Swal.fire({
            title: 'Subscribed!',
            text: 'Thank you for subscribing to our newsletter.',
            icon: 'success',
            confirmButtonText: 'OK'
        });

        // Optionally, you can add code here to actually submit the form data to your server
        // For example, using fetch or XMLHttpRequest
    });
</script>



</body>

</html>
