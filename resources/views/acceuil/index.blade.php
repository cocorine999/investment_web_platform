<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$settings->site_name}} | {{$settings->site_title}}</title>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="{{ asset ('temp/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
        <link href="{{ asset ('temp/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset ('temp/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{ asset ('temp/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{ asset ('temp/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset ('temp/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{ asset ('temp/lib/jquery/magnific-popup.css')}}" rel="stylesheet">



    <!-- Main Stylesheet File -->
    <link href="{{asset('temp/css/frontend_style_'.$settings->site_colour.'.css')}}" rel="stylesheet">

</head>
<body>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
  {{!! $settings->tawk_to !!}}
  </script>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left mt-0">
        <!-- <h1><a href="#intro" class="scrollto">Onlinetrade</a></h1> -->
        <a href="#intro"><img src="{{ asset('images/'.$settings->logo)}}" alt="{{$settings->site_name}}" title="" class="mt-0 logo" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
          
          </li>
          <li><a href="#footer">Contact us</a></li>

          @if($settings->site_preference =="Web dashboard only")
          @guest
          <li><a href="login" class="">Sign In</a></li>
          <li><a href="register" class="btn-log ">Get started</a></li>
          @else
          <li class="nav-item avatar dropdown">
                <a id="navbarDropdownMenuLink-55" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                <a href="dashboard" class="dropdown-item text-dark">Dashboard</a><br>
                  <a href="{{ route('logout') }}" class="dropdown-item text-dark"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    	</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
          @endguest
          @else

          <li><a href="{{$settings->bot_link}}" class="btn-log ">Get started</a></li>
          @endif

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->


  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"> </ol>

        <div class="carousel-inner" role="listbox"  >

          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{ asset ('temp/img/intro-carousel/1.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Trade in the Moment</h2>
                <p>Put your investing ideas into action with a full range of investments.Enjoy real benefits and rewards on Online Trade.</p>
                <a href="login" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{ asset ('temp/img/intro-carousel/2.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>we process withdrawal request Promptly</h2>
                <p>Put your investing ideas into action with a full range of investments.Enjoy real benefits and rewards on Online Trade .</p>
                <a href="login" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{ asset ('temp/img/intro-carousel/3.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Invest in the future</h2>
                <p>Put your investing ideas into action with a full range of investments.Enjoy real benefits and rewards on Online Trade.</p>
                <a href="login" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{ asset ('temp/img/intro-carousel/4.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Trade on the Go</h2>
                <p>Trading on the go has be simplified and easy to go</p>
                <a href="login" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{ asset ('temp/img/intro-carousel/5.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2> Telegram Robot integrated with dashboard</h2>
                <p>Put your investing ideas into action with a full range of investments.Enjoy real benefits and rewards on Online Trade.</p>
                <a href="login" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

        </div>


      </div>
    </div>
  </section><!-- #intro end -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About {{$settings->site_name}}</h3>
          <p>online trade is your no1 cryptocurrency investment portfolio management system</p>
        </header>

        <div class="row about-cols text-center">

          <div class="col-lg-3 col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset ('temp/img/about/innovate.png')}}" alt="" class="w-25 mt-4">
                
              </div>
              <h2 class="title"><a href="#">we Innovate</a></h2>
              <p>
                Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset ('temp/img/about/secure.png')}}" alt="" class="w-25 mt-4">
                
              </div>
              <h2 class="title"><a href="#">lincense Certified</a></h2>
              <p>
                Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit,
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset ('temp/img/about/prof.png')}}" alt="" class="w-25 mt-4">
               
              </div>
              <h2 class="title"><a href="#">we are professional</a></h2>
              <p>
                Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, 
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{ asset ('temp/img/about/invest.png')}}" alt="" class="w-25 mt-4">
               
              </div>
              <h2 class="title"><a href="#">savings and Investment</a></h2>
              <p>
                Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, 
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Our Services</h3>
          <p>Why you should Choose us</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" >
                <svg class="svg">
                  <use xlink:href="{{ asset ('temp/img/sprite.svg#icon-stable')}}"></use>
                </svg>
              </div>
              <h4 class="title"><a href="">stable and profitable</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon">
                <svg class="svg">
                  <use xlink:href="{{ asset ('temp/img/sprite.svg#icon-payment')}}"></use>
                </svg>
              </div>
              <h4 class="title"><a href="">Instant and Secure Withdrawals</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon">
                <svg class="svg">
                  <use xlink:href="{{ asset ('temp/img/sprite.svg#icon-referral')}}"></use>
                </svg>
              </div>
              <h4 class="title"><a href="">Referrals Program</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon">
                <svg class="svg">
                  <use xlink:href="{{ asset ('temp/img/sprite.svg#icon-dollar')}}"></use>
                </svg>
              </div>
              <h4 class="title"><a href="">Multi currency support</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon">
                <svg class="svg">
                  <use xlink:href="{{ asset ('temp/img/sprite.svg#icon-support')}}"></use>
                </svg>
              </div>
              <h4 class="title"><a href="">24/7 customer support</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon">
                <svg class="svg">
                  <use xlink:href="{{ asset ('temp/img/sprite.svg#icon-shield')}}"></use>
                </svg>
              </div>
              <h4 class="title"><a href="">Ultimate Security</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>

      </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Pricing Section
    ============================-->
    <section id="pricing" class="wow fadeInUp section-bg">

      <div class="container">

        <header class="section-header">
          <h3>Our Investment Plan</h3>
          <p>Choose how you want to invest with us</p>
        </header>

        <div class="row flex-items-xs-middle flex-items-xs-center">
      
          @foreach ($plans as $plan)
              <!-- Basic Plan  -->
            <div class="col-lg-4 col-md-4">
              <div class="card">
                <div class="card-block">
                  <h4 class="card-title"> 
                    {{$plan->name}}
                  </h4>
                  <div class="card-header">
                    <h3><span class="currency">{{$settings->currency}}{{$plan->price}}</span><span class="period"></span></h3>
                  </div>
                    <small>Min. Possible deposit:</small>
                    <h6>{{$settings->currency}}{{$plan->min_price}}</h6>
                    <small>Max. Possible deposit:</small>
                    <h6>{{$settings->currency}}{{$plan->max_price}}</h6>
                  <ul class="list-group">
                    <li class="list-group-item">{{$settings->currency}}{{$plan->minr}} Minimum return</li>
                    <li class="list-group-item">{{$settings->currency}}{{$plan->maxr}} Maximum return</li>
                    <li class="list-group-item">{{$settings->currency}}{{$plan->gift}} Gift Bonus</li>
                  </ul>
                  <a href="login" class="btn">Buy Now</a>
                </div>
              </div>
            </div>
         @endforeach
        </div>
      </div>

    </section><!-- #pricing -->

    <!--==========================
      Testimonials Sections
    ============================-->

    <section id="testimonials">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
          <p>Don't take our word for it, here's what some of our clients have to say about us</p>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
              <div class="testimonial-item">
                <img src="{{ asset('temp/img/testimonial/testimonial-1.jpg')}}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; onlinetrade</h4>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('temp/img/testimonial/testimonial-2.jpg')}}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Ceo &amp; onlinetrade</h4>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('temp/img/testimonial/testimonial-3.jpg')}}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Ceo &amp; onlinetrade</h4>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('temp/img/testimonial/testimonial-4.jpg')}}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Ceo &amp; onlinetrade</h4>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
              </div>
            </div>

          </div>
        </div>


      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Transactions Sections
    ============================-->

    <section id="payouts">
      <div class="container">
        <header class="section-header">
          <h3>Latest Transactions</h3>
          <p>Our goal is to simplify investing so that anyone can be an investor. With
              this in mind, we hand-pick the investments we offer on our platform.</p>
        </header>
          <div class="row pt-5 pb-5">
              
              <div class="col-md-12">
  
                  <div class="head">
                      <div id="material-tabs" class="material__tabs">
                          <a id="tab1-tab active" href="#tab1" >Withdrawal</a>
                          <a id="tab2-tab" href="#tab2" >Deposit</a>
                          <span class="yellow-bar"></span>
                      </div>
                    </div>
              
                  <div class="tab-content">
                      <div id="tab1">
                          <div class="shadow table-responsive">
                            <table id="dtBasicExample" class="table table-hover table-borderless">
                              <thead class="bg-light">
                                <tr>
                                  <th scope="col" >NAME</th>
                                  <th scope="col">DATE</th>
                                  <th scope="col">AMOUNT</th>
                                  <th scope="col">MODE</th>
                                  <th scope="col">STATUS</th>
                                </tr>
                              </thead>
                              <tbody >
                                @foreach($withdrawals as $deposit)
                              <tr>
                                <th scope="row">{{$deposit->duser->name}}</th>
                                <td>{{$deposit->created_at}}</td>
                                <td>{{$settings->currency}}{{$deposit->amount}}</td>
                                <td>{{$deposit->payment_mode}}</td>
                                <td>{{$deposit->status}}</td>
                              </tr>
                              @endforeach
                              </tbody>
                            </table>
                          </div>
                      </div>
                      <div id="tab2">
                          <div class="shadow table-responsive">
                            <table id="dtBasicExample" class="table table-hover table-borderless">
                              <thead class="bg-light">
                                <tr>
                                  <th scope="col" >NAME</th>
                                  <th scope="col">DATE</th>
                                  <th scope="col">AMOUNT</th>
                                  <th scope="col">MODE</th>
                                  <th scope="col">STATUS</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($deposits as $deposit)
                                <tr>
                                  <th scope="row">{{$deposit->duser->name}}</th>
                                  <td>{{$deposit->created_at}}</td>
                                  <td>{{$settings->currency}}{{$deposit->amount}}</td>
                                  <td>{{$deposit->payment_mode}}</td>
                                  <td>{{$deposit->status}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section> <!-- #Transaction ends -->

    <!--==========================
      Frequently Ask questions
    ============================-->
    <section id="faq">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Frequently Asked Questions</h3>
          <span class="section-divider"></span>
        </div>

        <ul id="faq-list" class="wow fadeInUp">
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">What is Online trade? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">How Online trading works? <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Similarities and Difference between Regular lincense and Premium Lincense <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">Benefits Of Buying The Premium Lincense <i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
            <div id="faq6" class="collapse" data-parent="#faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section> <!-- #faq  ends-->

    <!--==========================
      Payments Sections
    ============================-->

    <section id="payments" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>we accept</h3>
        </header>

        <div class="owl-carousel payments-carousel">
          <img src="{{ asset('temp/img/payments/payment-1.png')}}" alt="">
          <img src="{{ asset('temp/img/payments/payment-2.png')}}" alt="">
          <img src="{{ asset('temp/img/payments/payment-3.png')}}" alt="">
          <img src="{{ asset('temp/img/payments/payment-4.png')}}" alt="">
          <img src="{{ asset('temp/img/payments/payment-5.png')}}" alt="">
          <img src="{{ asset('temp/img/payments/payment-6.png')}}" alt="">
          <img src="{{ asset('temp/img/payments/payment-7.png')}}" alt="">
          <img src="{{ asset('temp/img/payments/payment-8.png')}}" alt="">
        </div>

      </div>
    </section><!-- #Payments ends -->

  </main>
  <!--==========================
    Footer Sections
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>{{$settings->site_name}}</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita 
              valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin 
              fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right scrollto"></i> <a href="#intro">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#services">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <a href="#" class="text-white"><strong>Phone:</strong> +1 5589 55488 55<br></a>
              <a href="#" class="text-white"><strong>Email:</strong> info@example.com<br></a>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright  {{date('Y')}} &nbsp;<strong> {{$settings->site_name}} &nbsp;</strong> All Rights Reserved.
      </div>
    </div>
  </footer><!-- #footer ends -->
    
  <!-- Back to top -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('temp/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('temp/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{ asset('temp/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('temp/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('temp/lib/superfish/hoverIntent.js')}}"></script>
    <script src="{{ asset('temp/lib/superfish/superfish.min.js')}}"></script>
    <script src="{{ asset('temp/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('temp/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('temp/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('temp/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('temp/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('temp/lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{ asset('temp/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{ asset('temp/js/main.js')}}"></script>

</body>
</html>

