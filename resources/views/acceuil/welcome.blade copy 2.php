<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Billioncycle {{$settings->description}}">
    <meta name="keywords" content="Billioncycle, Investissement, cryptomonnaies, affiliations, management">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$settings->site_name}} | {{$settings->site_title}}</title>

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

    <style>
        .assets-wrapper {
            position: relative;
        }

        .assets-wrapper .left-gradient,
        .assets-wrapper .right-gradient {
            display: none;
        }

        .left-gradient {
            width: 130px;
            position: absolute;
            height: 100%;
            z-index: 1;
            background: linear-gradient(to left, rgba(255, 255, 255, 0), #fff 100%);
        }

        .assets-list {
            height: 384px;
            position: relative;
            display: grid;
            grid-template-columns: repeat(10, 128px);
            grid-auto-flow: row;
            grid-auto-columns: 128px;
            margin-bottom: 2.625rem;
        }
    </style>
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
        <div class="offcanvas__logo" style="padding-top:0px!important;width:200px;">
            <a href="#intro"><img src="{{ asset('images/'.$settings->logo)}}" alt=""></a>
        </div>
        <nav class="offcanvas__menu mobile-menu">
            <ul>
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#pricing">Testimonials</a></li>
                <li><a href="#">About Us</a>
                    <ul class="dropdown">
                        <li><a href="#">Our Values</a></li>
                        <li><a href="#">Performance indicators</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth ">
            <ul>
                <li><a href="{{$settings->bot_link}}"><span class="icon_chat_alt"></span> Live chat</a></li>

                @guest
                <li><a href="{{route('login')}}"><span class="fa fa-user"></span> Login / Register</a></li>
                @else

                <li><a href="#">{{ Auth::user()->name }}</a>

                    <ul class="dropdown">
                        <li><a href="{{route('login')}}">Dashboard</a></li>
                        <li><a href="{{route('login')}}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
        <div class="offcanvas__info">
            <ul>
                <li><a href="cailto:11234567890" style="color:white"><span class="icon_phone"></span> +1
                        123-456-7890</a></li>
                <li><a href="mailto:support@billioncycle.com?subject='Prise de contact' & body='Je voudrais prendre des renseignements'"
                        style="color:white"><span class="fa fa-envelope"></span> support@billioncycle.com</a></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header__info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__info-left">
                            <ul>
                                <li><a href="cailto:11234567890" style="color:white"><span class="icon_phone"></span> +1
                                        123-456-7890</a></li>
                                <li><a href="mailto:support@billioncycle.com?subject='Prise de contact' & body='Je voudrais prendre des renseignements'"
                                        style="color:white"><span class="fa fa-envelope"></span>
                                        support@billioncycle.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__info-right">
                            <ul>
                                <li><a href="{{$settings->bot_link}}"><span class="icon_chat_alt"></span> Live chat</a>
                                </li>
                                @guest
                                <li><a href="{{route('login')}}"><span class="fa fa-user"></span> Login / Register</a>
                                </li>
                                @else

                                <li><a href="#">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('login')}}">Dashboard</a></li>
                                        <li><a href="{{route('login')}}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo" >
                        <a href="{{route('home')}}"><img src="{{ asset('images/'.$settings->logo)}}" alt="billioncycle investment platform"  style="width:220px; transform: translateY(-45px)"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('home')}}">Home</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#pricing">Pricing</a></li>
                            <li><a href="#testimonials">Testimonials</a></li>
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

    <!-- Hero Section Begin -->
    <section id="home" class="hero-section">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>Donnez du sens à votre épargne avec le financement participatif</h2>
                                <h5>Retrouvez toutes les informations pour investir dans les projets sélectionnés par BillionCycle.</h5>
                                <a href="{{route('register')}}" class="primary-btn">Get started now</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img">
                                <img src="{{asset('assets/img/hero/hero-right.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- 
            <div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h5>Starting At Only $ 2.8/month</h5>
                                <h2>Welcome to the best<br /> hosting company</h2>
                                <a href="{{route('register')}}" class="primary-btn">Get started now</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img">
                                <img src="{{asset('assets/img/hero/hero-right.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h5>we process withdrawal request Promptly</h5>
                                <h2>Invest in the future</h2>
                                <a href="{{route('register')}}" class="primary-btn">Get started now</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img">
                                <img src="{{asset('assets/img/hero/hero-right.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h5>Starting At Only $ 2.8/month</h5>
                                <h2>Welcome to the best<br /> hosting company</h2>
                                <a href="{{route('register')}}" class="primary-btn">Get started now</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img">
                                <img src="{{asset('assets/img/hero/hero-right.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Register Domain Section Begin -->
    <section id="about" class="register-domain spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="register__text">
                        <div class="section-title">
                            <h3> Diversifiez vos placements</h3>
                        </div>
                        
                        <div style="text-align:justify;">
                            <h4>Une bonne diversification de vos investissements (entreprise, durée, taux…) vous permet d’optimiser le rendement global de votre portefeuille tout en diminuant son niveau de risque.</h4>
                            <br />
                            <!-- <p>Une bonne diversification de vos investissements (entreprise, durée, taux…) vous permet d’optimiser le rendement global de votre portefeuille tout en diminuant son niveau de risque.</p> -->
                        </div>
                        <br />
                        <div class="plan__text">
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Register Domain Section End -->

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Choose the right hosting solution</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <h5>Shared Hosting</h5>
                        <span>Starts At $1.84</span>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <h5>Wordpress Hosting</h5>
                        <span>Starts At $1.84</span>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <h5>Dedicated Hosting</h5>
                        <span>Starts At $1.84</span>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <h5>SSL certificate</h5>
                        <span>Starts At $1.84</span>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <h5>Web Hosting</h5>
                        <span>Starts At $1.84</span>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <h5>Cloud server</h5>
                        <span>Starts At $1.84</span>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <!--  Services Section End -->



    <!-- Services Section Begin -->
    <section id="services" class="feature-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>OUR SERVICES</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item">
                        <span class="fa fa-cloud-upload"></span>
                        <h5>stable and profitable</h5>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item">
                        <span class="fa fa-sliders"></span>
                        <h5>Instant and Secure Withdrawals</h5>
                        <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item">
                        <span class="fa fa-database"></span>
                        <h5>Referrals Program</h5>
                        <p>Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item">
                        <span class="fa fa-globe"></span>
                        <h5>Multi currency support</h5>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item">
                        <span class="fa fa-shield"></span>
                        <h5>24/7 customer support</h5>
                        <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item">
                        <span class="fa fa-headphones"></span>
                        <h5>Ultimate Security</h5>
                        <p>Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Pricing Section Begin -->
    <section id="pricing" class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="section-title normal-title">
                        <h3>OUR INVESTMENT PLAN</h3>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="pricing__swipe-btn">
                        <label for="month" class="active">Monthly
                            <input type="radio" id="month">
                        </label>
                        <label for="yearly">Yearly
                            <input type="radio" id="yearly">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row monthly__plans active">
                @foreach ($plans as $plan)
                <!-- Basic Plan  -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <h4>{{$plan->name}}</h4>
                        <h3>{{$settings->currency}}{{$plan->price}}</span></h3>
                        <ul>
                            <small>Min. Possible deposit:</small>
                            <li>{{$settings->currency}}{{$plan->min_price}}</li>
                            <small>Max. Possible deposit:</small>
                            <li>{{$settings->currency}}{{$plan->max_price}}</li>
                            <li>{{$settings->currency}}{{$plan->minr}} Minimum return</li>
                            <li>{{$settings->currency}}{{$plan->maxr}} Maximum return</li>
                            <li>{{$settings->currency}}{{$plan->gift}} Gift Bonus</li>
                        </ul>
                        <a href="#" class="primary-btn">Choose plan</a>
                    </div>
                </div>
                @endforeach
                
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <h4>Business</h4>
                        <h3>$25.90 <span>/ month</span></h3>
                        <ul>
                            <li>90 GB web space</li>
                            <li>Free site buiding tools</li>
                            <li>Free domain registar</li>
                            <li>24/7 Support</li>
                            <li>Free marketing tool</li>
                            <li>99,9% Services uptime</li>
                            <li>30 day money back</li>
                        </ul>
                        <a href="#" class="primary-btn">Choose plan</a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <h4>Dedicated</h4>
                        <h3>$45.90 <span>/ month</span></h3>
                        <ul>
                            <li>Unlimited web space</li>
                            <li>Free site buiding tools</li>
                            <li>Free domain registar</li>
                            <li>24/7 Support</li>
                            <li>Free marketing tool</li>
                            <li>99,9% Services uptime</li>
                            <li>30 day money back</li>
                        </ul>
                        <a href="#" class="primary-btn">Choose plan</a>
                    </div>
                </div>
            </div>
            <div class="row yearly__plans">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <h4>Started</h4>
                        <h3>$150 <span>/ month</span></h3>
                        <ul>
                            <li>2,5 GB web space</li>
                            <li>Free site buiding tools</li>
                            <li>Free domain registar</li>
                            <li>24/7 Support</li>
                            <li>Free marketing tool</li>
                            <li>99,9% Services uptime</li>
                            <li>30 day money back</li>
                        </ul>
                        <a href="#" class="primary-btn">Choose plan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <h4>Business</h4>
                        <h3>$250 <span>/ month</span></h3>
                        <ul>
                            <li>90 GB web space</li>
                            <li>Free site buiding tools</li>
                            <li>Free domain registar</li>
                            <li>24/7 Support</li>
                            <li>Free marketing tool</li>
                            <li>99,9% Services uptime</li>
                            <li>30 day money back</li>
                        </ul>
                        <a href="#" class="primary-btn">Choose plan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <h4>Premium</h4>
                        <h3>$350 <span>/ month</span></h3>
                        <ul>
                            <li>150 GB web space</li>
                            <li>Free site buiding tools</li>
                            <li>Free domain registar</li>
                            <li>24/7 Support</li>
                            <li>Free marketing tool</li>
                            <li>99,9% Services uptime</li>
                            <li>30 day money back</li>
                        </ul>
                        <a href="#" class="primary-btn">Choose plan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <h4>Dedicated</h4>
                        <h3>$450 <span>/ month</span></h3>
                        <ul>
                            <li>Unlimited web space</li>
                            <li>Free site buiding tools</li>
                            <li>Free domain registar</li>
                            <li>24/7 Support</li>
                            <li>Free marketing tool</li>
                            <li>99,9% Services uptime</li>
                            <li>30 day money back</li>
                        </ul>
                        <a href="#" class="primary-btn">Choose plan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Achievement Section Begin -->
    <section class="achievement-section set-bg spad" data-setbg="{{asset('assets/img/achievement-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement__item">
                        <span class="fa fa-user-o"></span>
                        <h2 class="achieve-counter">2468</h2>
                        <p>Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement__item">
                        <span class="fa fa-edit"></span>
                        <h2 class="achieve-counter">2468</h2>
                        <p>Domains</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement__item">
                        <span class="fa fa-clone"></span>
                        <h2 class="achieve-counter">2468</h2>
                        <p>Server</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement__item">
                        <span class="fa fa-cog"></span>
                        <h2 class="achieve-counter">2468</h2>
                        <p>Installs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Achievement Section End -->

    <!-- Work Section Begin -->
    <section class="work-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Find the key information of the project on a single page</h3>
                    </div>
                    <div class="work__text">
                        <div class="row">
                            <div class="col-lg-6" style="padding-bottom:100px;">
                                <div class="work__item">
                                    <i class="fa fa-desktop"></i>
                                    <span style="text-transform: uppercase;"></span>
                                    <h3 style="text-transform: uppercase;"> FINANCIAL CONDITIONS</h3>
                                    <p>Find the main characteristics of the project: interest rate, repayment period, financial instrument used and repayment method.</p>
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding-bottom:100px;">
                                <div class="work__item">
                                    <i class="fa fa-desktop"></i>
                                    <span style="text-transform: uppercase;"></span>
                                    <h3 style="text-transform: uppercase;">INVESTMENT</h3>
                                    <p>Invest by credit card or bank transfer. Funds are transferred to the company only if the fundraising goal is reached. If not, all investors are reimbursed on their Lendopolis account.</p>
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding-bottom:10px;">
                                <div class="work__item">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span style="text-transform: uppercase;"></span>
                                    <h3>Characteristics of the project</h3>
                                    <p>Find out in real time the amount raised, the number of committed investors and the remaining duration.</p>
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding-bottom:10px;">
                                <div class="work__item">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span style="text-transform: uppercase;"></span>
                                    <h3 style="text-transform: uppercase;">COLLECTION GROWTH</h3>
                                    <p>All the financial and extra-financial information about the project is accessible via the different tabs. Do you have a question? Ask it directly to the manager on the "Forum".</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Work Section End -->

    <!-- Choose Plan Section Begin -->
    <section class="choose-plan-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <img src="{{asset('assets/img/choose-plan.png')}}" alt="">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="plan__text">
                        <h3>Track your investments online!</h3>
                        <ul>
                            <li><span class="fa fa-check"></span> Track your Investments in Real Time</li>
                            <li><span class="fa fa-check"></span> To Collect your Refunds</li>
                            <li><span class="fa fa-check"></span> Fund your Billioncycle Account by Credit Card or Bank Transfer</li>
                            <li><span class="fa fa-check"></span> Transfer All or Part Of your Available Balance To your Bank Account at any time, free of charge</li>
                            <li><span class="fa fa-check"></span> Access your Personal Information (preferences, taxes)</li>
                        </ul>
                        <a href="{{route('register')}}" class="primary-btn">Get start now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Choose Plan Section End -->

    <!-- Testimonial Section Begin -->
    <section id="testimonials" class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Our Client say</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <div class="col-lg-4">
                        <div class="testimonial__item">
                            <img src="{{asset('assets/img/testimonial/testimonial-1.jpg')}}" alt="">
                            <h5>Macrina Kgril</h5>
                            <span>CFO</span>
                            <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                                et dolore magna aliqua.</p>
                            <div class="testimonial__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item">
                            <img src="{{asset('assets/img/testimonial/testimonial-2.jpg')}}" alt="">
                            <h5>Alphonse Gérard</h5>
                            <span>CEO ONLINE TRADE </span>
                            <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                                et dolore magna aliqua.</p>
                            <div class="testimonial__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item">
                            <img src="{{asset('assets/img/testimonial/testimonial-3.jpg')}}" alt="">
                            <h5>Alessia Haas</h5>
                            <span>CFO</span>
                            <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                                et dolore magna aliqua.</p>
                            <div class="testimonial__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item">
                            <img src="{{asset('assets/img/testimonial/testimonial-1.jpg')}}" alt="">
                            <h5>Antony Jenkins</h5>
                            <span>Designer</span>
                            <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                                et dolore magna aliqua.</p>
                            <div class="testimonial__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial__item">
                            <img src="{{asset('assets/img/testimonial/testimonial-2.jpg')}}" alt="">
                            <h5>Emilie Choi</h5>
                            <span>Designer</span>
                            <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                                et dolore magna aliqua.</p>
                            <div class="testimonial__rating">
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
    </section>
    <!-- Testimonial Section End -->

    <!-- Question Section Begin -->
    <section class="question-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>FREQUENTLY ASKED QUESTIONS</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="question__accordin">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading active">
                                    <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                        What is {{$settings->site_name}}?
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                            ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                            facilisis. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        How {{$settings->site_name}} works?
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                            ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                            facilisis. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        How affiliate
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                            ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                            facilisis. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        Benefits Of Buying The Premium Lincense
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                            ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                            facilisis. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">
                                        Can I run a business?
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                            ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                            facilisis. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">
                                        Does ArkaHost offer phone support?
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                            ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                            facilisis. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="#" class="question-form">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Email">
                        <textarea placeholder="Question"></textarea>
                        <button type="submit" class="site-btn">Send question</button>
                    </form>
                </div>
            </div>
        </div>
            
        <!-- Currency Type Section Begin -->
        <div class="container" style="margin-top:120px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>We Accept</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <img src="{{ asset('temp/img/payments/payment-4.png')}}" alt="">
                    <img src="{{ asset('temp/img/payments/payment-6.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Question Section End -->

    <!-- Currency Type Section Begin
    <section class="testimonial-section spad" style = "color:white!important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>We Accept</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <img src="{{ asset('temp/img/payments/payment-1.png')}}" alt="">
                    <img src="{{ asset('temp/img/payments/payment-2.png')}}" alt="">
                    <img src="{{ asset('temp/img/payments/payment-3.png')}}" alt="">
                    <img src="{{ asset('temp/img/payments/payment-4.png')}}" alt="">
                    <img src="{{ asset('temp/img/payments/payment-5.png')}}" alt="">
                    <img src="{{ asset('temp/img/payments/payment-6.png')}}" alt="">
                    <img src="{{ asset('temp/img/payments/payment-7.png')}}" alt="">
                </div>
            </div>
        </div>
    </section> Testimonial Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top-call">
                            <h5>Need Help? Call us</h5>
                            <h2>+1 175 946 2316 096</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top-auth">
                            <h5>Join Now And Have Free Month Of Deluxe Hosting</h5>
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
                                <a href="{{route('home')}}"><img src="{{ asset('images/LOGO BC BLANC.png')}}" alt="" style="width:220px; transform: translateY(-50px)" alt=""></a>
                            </div>
                            <div style=" transform: translateY(-74px)">
                                <div class="footer__text-widget">
                                    <p>Avec billioncycle devenez l'investisseur du futur. </p>
                                    <ul class="footer__widget-info">
                                        <li><span class="fa fa-map-marker"></span> 500 South Main Street Los Angeles,<br />
                                            ZZ-96110 USA</li>
                                        <li><span class="fa fa-mobile"></span> 125-711-811 | 125-668-886</li>
                                        <li ><span class="fa fa-headphones"></span> <a href="mailto:support@billioncycle.com?subject='Prise de contact' & body='Je voudrais prendre des renseignements'" style="color:white"> support@billioncycle.com</a></li>
                                    </ul>
                                </div>
                                <div class="footer__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer__text-widget">
                            <h5>Company</h5>
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#pricing">Pricing</a></li>
                                <li><a href="#testimonials">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer__text-widget">
                            <h5>Legal information</h5>
                            <ul>
                                <li><a href="#home">Terms of services</a></li>
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#pricing">Pricing</a></li>
                                <li><a href="#testimonials">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer__text-widget">
                            <h5>About us</h5>
                            <ul>
                                <li><a href="#home">Our values</a></li>
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#services">Performance indicators</a></li>
                                <li><a href="#pricing">Pricing</a></li>
                                <li><a href="#testimonials">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer__text-copyright">
                    &copy; Copyright  {{date('Y')}} &nbsp;<strong> {{$settings->site_name}} &nbsp;</strong> All Rights Reserved.
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