@extends("home.app")
@section("title","Home")
@section("content")

    <!-- Hero Section Begin -->
    <section id="home" class="hero-section">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                            <h5>Find out how to invest <br/> in the projects selected by BillionCycle.</h5>
                                <h2>Make sense <br/>of your savings with participatory financing</h2>
                                
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
                            <h3> DIVERSIFY YOUR INVESTMENTS</h3>
                        </div>
                        
                        <div style="text-align:center;">
                        <p style="font-size:15px; text-align:center; color:#111111; font-weight:600;">
                            A good diversification of your investments (company, duration, rate...) allows you to optimise the global return of your portfolio while reducing its risk level.
                            
                        </p></div>
                        <br />
                        <div class="plan__text">
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Register Domain Section End -->

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
                    <div class="feature__item" style="padding: 0px 0px 3px 0px!important;">
                        <div class="blog__item">
                                <div class="blog__pic set-bg" style="height: 240px;" data-setbg="{{asset('assets/img/services/agro.jpg')}}" style="background-image: url({{asset('assets/img/services/agro.jpg')}});">
                                    <div class="label">Agri-Food</div>
                                </div>
                                <div class="blog__text" style="padding-right: 10px!important; height:156px!important; max-height:156px!important; padding-bottom: 0px!important; text-align:left;">
                                    <h5><a style=" font-size:17px!important;" href="#" data-toggle="tooltip" data-placement="top" title="See details of Renewable Energy projects">Investment in agri food projects</a></h5>
                                    <ul>
                                        <li style="font-weight:600;color:black;font-size:14px"><i  style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;"class="fa fa-lock"></i> Maturity</li>
                                        <li style="font-weight:600;color:black;font-size:14px"><i style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;" class="fa fa-money"></i> $800000</li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item" style="padding: 0px 0px 3px 0px!important;">
                        <div class="blog__item">
                                <div class="blog__pic set-bg" style="height: 240px;" data-setbg="{{asset('assets/img/services/immo.jpg')}}" style="background-image: url(&quot;img/blog/blog-8.jpg&quot;);">
                                    <div class="label">Real Estate</div>
                                </div>
                                <div class="blog__text" style="padding-right: 10px!important; height:156px!important; max-height:156px!important; padding-bottom: 0px!important; text-align:left;" >
                                    <h5><a style=" font-size:18px!important;" href="" data-toggle="tooltip" data-placement="top" title="See details of Real Estate projects">Real Estate offer allows you to invest in projects related to builing...</a></h5>
                                    <ul>
                                        <li style="font-weight:600;color:black;font-size:14px"><i  style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;"class="fa fa-lock"></i> Maturity</li>
                                        <li style="font-weight:600;color:black;font-size:14px"><i style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;" class="fa fa-money"></i> $200000</li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item" style="padding: 0px 0px 3px 0px!important;">
                        <div class="blog__item">
                                <div class="blog__pic set-bg" style="height: 240px;" data-setbg="{{asset('assets/img/services/renouvelable.jpg')}}" style="background-image: url(&quot;img/blog/blog-8.jpg&quot;);">
                                    <div class="label">Renewable Energy</div>
                                </div>
                                <div class="blog__text" style="padding-right: 10px!important; height:156px!important; max-height:156px!important; padding-bottom: 0px!important; text-align:left;">
                                    <h5><a style=" font-size:17px!important;" href="#" data-toggle="tooltip" data-placement="top" title="See details of Renewable Energy projects">The Renewable Energy <br/> offer allows you to invest in projects related to the energy...</a></h5>
                                    <ul>
                                        <li style="font-weight:600;color:black;font-size:14px"><i  style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;"class="fa fa-lock"></i> Maturity</li>
                                        <li style="font-weight:600;color:black;font-size:14px"><i style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;" class="fa fa-money"></i> $800000</li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="feature__item" style="padding: 0px 0px 3px 0px!important;">
                        <div class="blog__item">
                                <div class="blog__pic set-bg" style="height: 240px;" data-setbg="{{asset('assets/img/services/automobile.jpg')}}" style="background-image: url(&quot;img/blog/blog-8.jpg&quot;);">

                                    <img src="{{asset('assets/img/services/automobile.jpg')}}" alt="">
                                    <div class="label">Automotive</div>
                                </div>
                                <div class="blog__text" style="padding-right: 10px!important; height:156px!important; max-height:156px!important; padding-bottom: 0px!important; text-align:left;">
                                    <h5><a style=" font-size:18px!important;" href="#" data-toggle="tooltip" data-placement="top" title="See details of entreprises projects">Invest in automotive projects</a></h5>
                                    <ul>
                                        <li style="font-weight:600;color:black;font-size:14px"><i  style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;"class="fa fa-lock"></i> Maturity</li>
                                        <li style="font-weight:600;color:black;font-size:14px"><i style="margin-right:0px;background-color:transparent; height:0px!important; border-radius:0px; text-align:left; line-height:0px!important;" class="fa fa-money"></i> $450000</li>
                                    </ul>
                                </div>
                        </div>
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
                        <label for="month" class="active">LOW
                            <input type="radio" id="month">
                        </label>
                        <label for="yearly">HIGH<input type="radio" id="yearly">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row monthly__plans active">
                @foreach ($plans as $plan)
                    <!-- Basic Plan  -->
                    @if($plan->price < 500)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="pricing__item">
                                <h4>{{$plan->name}}</h4>
                                <h3>{{$settings->currency}}{{$plan->price}}</span></h3>
                                <ul>

                                    <li><span class="desc-label">Daily Interest (%) </span> - <span
                                                                        class="desc-data">{{round($plan->increment_amount,2)}}%</span></li>
                                    <li><span class="desc-label">Daily Interest</span> - <span
                                                                        class="desc-data">${{round($plan->increment_amount,2)}}</span></li>
                                                                <li><span class="desc-label">Monthly Interest</span> - <span
                                                                        class="desc-data">${{round(((($plan->price * $plan->gift)/100)/($plan->expiration/30)),2)}}</span></li>
                                                                <li><span class="desc-label">Expect Return</span> -
                                                                    <span class="desc-data">${{$plan->expected_return}}</span></li>
                                                                <li><span class="desc-label">Total Return</span> - <span
                                                                        class="desc-data">{{$plan->gift+100}}%</span></li>
                                                                <li><span class="desc-label">Terms Days</span> - <span
                                                                        class="desc-data">{{$plan->expiration}}</span></li>
                                </ul>
                                <a href="{{route('register')}}" class="primary-btn">Choose plan</a>
                            </div>
                        </div>
                    @endif
                @endforeach
                
            </div>
            <div class="row yearly__plans">
            @foreach ($plans as $plan)
                    <!-- Basic Plan  -->
                    @if($plan->price >=500 && $plan->price < 3000)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="pricing__item">
                                <h4>{{$plan->name}}</h4>
                                <h3>{{$settings->currency}}{{$plan->price}}</span></h3>
                                
                                <ul>

                                    <li><span class="desc-label">Daily Interest (%) </span> - <span
                                                                        class="desc-data">{{round($plan->increment_amount,2)}}%</span></li>
                                    <li><span class="desc-label">Daily Interest</span> - <span
                                                                        class="desc-data">${{round($plan->increment_amount,2)}}</span></li>
                                                                <li><span class="desc-label">Monthly Interest</span> - <span
                                                                        class="desc-data">${{round(((($plan->price * $plan->gift)/100)/($plan->expiration/30)),2)}}</span></li>
                                                                <li><span class="desc-label">Expect Return</span> -
                                                                    <span class="desc-data">${{$plan->expected_return}}</span></li>
                                                                <li><span class="desc-label">Total Return</span> - <span
                                                                        class="desc-data">{{$plan->gift+100}}%</span></li>
                                                                <li><span class="desc-label">Terms Days</span> - <span
                                                                        class="desc-data">{{$plan->expiration}}</span></li>
                                </ul>
                                <a href="{{route('register')}}" class="primary-btn">Choose plan</a>
                            </div>
                        </div>
                    @endif
                @endforeach
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
                        <h2 class="achieve-counter">5468</h2>
                        <p>Investments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement__item">
                        <span class="fa fa-clone"></span>
                        <h2 class="achieve-counter">208</h2>
                        <p>Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement__item">
                        <span class="fa fa-cog"></span>
                        <h2 class="achieve-counter">6</h2>
                        <p>Domains</p>
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
                                    <p>Invest by Bitcoin or Ethereum. Funds are transferred to the company only if the fundraising goal is reached. If not, all investors are reimbursed on their Billioncycle account.</p>
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
    <section id="how-invest" class="choose-plan-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <img src="{{asset('assets/img/home-illustration/cryptocurrency-market-3216964-2738779.png')}}" alt="">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="plan__text">
                        <h3>Track your investments online!</h3>
                        <ul>
                            <li><span class="fa fa-check"></span> Track your Investments in Real Time</li>
                            <li><span class="fa fa-check"></span> To Collect your Refunds</li>
                            <li><span class="fa fa-check"></span> Fund your Billioncycle Account by Bitcoin or Ethereum</li>
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
                        <div class="testimonial__item" style="height:320px!important;">
                            <img src="{{asset('assets/img/testimonial/testimonial-1.jpg')}}" alt="">
                            <h5>Macrina Kgril</h5>
                            <span></span>
                            <p>I advise you this Platforms if you want to diversify your income sources.</p>
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
                        <div class="testimonial__item"  style="height:320px!important;">
                            <img src="{{asset('assets/img/testimonial/alphonse.jpg')}}" alt="" style="width:120px!important; height:120px!important;" >
                            <h5>Alphonse Gérard</h5>
                            <span> </span>
                            <p>Today there are several investment platforms but I must admit that of all my experiences this is the best with an 80% risk free guarantee.</p>
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
                        <div class="testimonial__item" style="height:320px!important;">
                            <img src="{{asset('assets/img/testimonial/testimonial-3.jpg')}}" alt="">
                            <h5>Alessia Haas</h5>
                            <span></span>
                            <p>With this platform you can get financing for your projects.</p>
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
                        <div class="testimonial__item" style="height:320px!important;">
                            <img src="{{asset('assets/img/testimonial/antony.jpg')}}" alt="" style="width:120px!important; height:120px!important;">
                            <h5>Antony Jenkins</h5>
                            <span></span>
                            <p>Thanks to BillionCycle I have a stable source of income that allows me to live without working full time..</p>
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
    <section id="faq" class="question-section spad">
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
                                        <p>BillionCycle is a platform that brings together project owners and project funders. It aims to fruit your portfolio but promote companies that need capital to seed their boxes. </p>
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
                                        <p>BillionCycle does not invest your money itself, but rather finds project owners in the areas mentioned and gives them the capital to finance the project over a given period of time. These idea carriers invest your funds and generate interest that serves as profit for you.</p>
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
                                        <p>To affiliate someone and get bonuses you just have to copy in your customer area the affiliate link that your leaflet will use to create his account. </p>
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
                                        <p>Companies can come in and submit project ideas that BillionCycle's team will evaluate and see if they have a future. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">
                                        Does BillionCycle offer phone support?
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Yes, we offer telephone assistance. </p>
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
@endsection