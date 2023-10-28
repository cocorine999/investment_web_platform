<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Billioncycle {{$settings->description}}">
    <meta name="keywords" content="Billioncycle, Investissement, cryptomonnaies, affiliations, management">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield("title") - Billioncycle | Create your investment</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css') }}" type="text/css">
</head>

<body>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        { { !!$settings -> tawk_to!! } }
    </script>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas__menu__overlay"></div>
    <div class="offcanvas__menu__wrapper">
        <div class="canvas__close">
            <span class="fa fa-times-circle-o"></span>
        </div>
        <div class="offcanvas__logo">
            <a href="{{route('home')}}"><img src="{{asset('images/LOGO BC BLANC.png')}}" alt=""  style="width:220px;"></a>
        </div>
        <nav class="offcanvas__menu mobile-menu">
            <ul>
                
            <li class="active"><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('home')}}#services">Services</a></li>
                            <li><a href="{{route('home')}}#pricing">Pricing</a></li>
                            <li><a href="{{route('home')}}#testimonials">Testimonials</a></li>
                            <li><a href="#">About Us</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('values')}}">Our Values</a></li>
                                    <li><a href="{{route('performance-indicators')}}">Performance indicators</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <ul>
                <li><a href="#"><span class="icon_chat_alt"></span> Live chat</a></li>
                @guest
                                <li><a href="{{route('login')}}"><span class="fa fa-user"></span> Login / Register</a></li>
                                @else

                                <li><a href="{{route('login')}}"><span class="fa fa-tachometer"></span>Dashboard</a></li>
                                @endguest
            </ul>
        </div>
        <div class="offcanvas__info">
            <ul>
                <li><span class="icon_phone"></span> +1 175 946 2316 096</li>
                <li><span class="fa fa-envelope"></span> support@billioncycle.com
</li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="header__info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__info-left">
                            <ul>
                                <li><span class="icon_phone"></span> +1 175 946 2316 096</li>
                                <li><span class="fa fa-envelope"></span> support@billioncycle.com
</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__info-right">
                            <ul>
                                <li><a href="#"><span class="icon_chat_alt"></span> Live chat</a></li>
                            
                                @guest
                                    <li><a href="{{route('login')}}"><span class="fa fa-user"></span> Login / Register</a></li>
                                @else
                                    <li><a href="{{route('login')}}"><span class="fa fa-tachometer"></span>Dashboard</a></li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                    <a href="{{route('home')}}"><img src="{{asset('images/LOGO BC BLANC.png')}}" alt="" style="width:150px; transform: translateY(-22px)"></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            
                            <li class="active"><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('home')}}#services">Services</a></li>
                            <li><a href="{{route('home')}}#pricing">Pricing</a></li>
                            <li><a href="{{route('home')}}#testimonials">Testimonials</a></li>
                            <li><a href="#">About Us</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('values')}}">Our Values</a></li>
                                    <li><a href="{{route('performance-indicators')}}">Performance indicators</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield("content")

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer__top-call">
                            <h5>Need Help? Call us</h5>
                            <h2>+1 175 946 2316 096</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer__top-auth">
                            <h5>Join Us Now And Gain Money</h5>
                            <a href="{{route('login')}}" class="primary-btn">Log in</a>
                            <a href="{{route('register')}}" class="primary-btn sign-up">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__text set-bg" data-setbg="{{asset('assets/img/footer-bg.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="footer__text-about">
                            <div class="footer__logo">
                                <a href="{{route('home')}}"> <h5 style="font-size: 34px;
    color: #ffffff;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 0px;">BILLIONCYCLE</h5></a>
                            </div>
                            <p>With Billioncycle become the investor of the future.</p>

                        <div class="footer__text-widget">
                            <ul class="footer__widget-info">
                                <li><span class="fa fa-map-marker"></span>67, rue de EMILIE ZOLA 91100 CORBEIL - ESSONNES </li>
                                <li><span class="fa fa-mobile"></span> +1 175 946 2316 096</li>
                                <li><span class="fa fa-headphones"></span> support@billioncycle.com</li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer__text-widget">
                            <h5>Company</h5>
                            <ul>
                                <li><a href="{{route('register')}}">Invest</a></li>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('home')}}#services">Discover projects</a></li>
                                <li><a href="{{route('home')}}#how-invest">How to invest</a></li>
                                <li><a href="{{route('home')}}#pricing">Plans</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__text-widget">
                            <h5>Legal information</h5>
                            <ul>
                                <li><a href="{{route('cgu')}}">Terms of services</a></li>
                                <li><a href="{{route('legal-notices')}}">Legal Notices</a></li>
                                <li><a href="{{route('privacy')}}">Privacy</a></li>
                                <li><a href="{{route('cookies')}}">Cookies</a></li>
                                <li><a href="#faq">Faqs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer__text-widget">
                            <h5>ABOUT US</h5>
                            <ul class="footer__widget-info">
                                <li><a href="{{route('values')}}">Our values</a></li>
                                <li><a href="{{route('performance-indicators')}}">Performance indicators</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer__text-copyright">
                    <p  style="color:white!important;"> &copy; Copyright  2014 &nbsp;<strong> {{$settings->site_name}} &nbsp;</strong> All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset ('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset ('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset ('assets/js/main.js') }}"></script>
</body>

</html>