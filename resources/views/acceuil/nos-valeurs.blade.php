@extends("home.app")

@section("title","Our Values | About Us")
@section("content")
<!-- Breadcrumb Begin -->
<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}"><span class="fa fa-home"></span> Home</a>
                        <a href="#"> About</a>
                        <span>Our Values</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Register Domain Section Begin -->
    <section id="about" class="register-domain spad" style="padding-bottom: 80px!important;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="register__text">
                        <div class="section-title">
                            <h3> OUR VALUES</h3>
                        </div>
                        
                        <div>
                        <p style="font-size:15px; text-align:center; color:#111111; font-weight:600;">
                        BillionCycle is a crowdfunding platform, dedicated to sectors such as renewable energy, real estate, agriculture and food, and automotive. Our platform was created by FUTUREX in 2014, with the ambition to allow everyone to make their savings more engaged and transparent. Since our launch, we have always remained true to our core values.
                            
                        </p></div>
                        <br />
                    </div>
                </div>
            </div>
    </section>
    <!-- Register Domain Section End -->
    <!-- Team Section Begin -->
    <section class="team-section">
        <div class="container">
            
            <div class="row">
                <section class="about-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about__img">
                                    <img src="{{asset('assets/img/achievement-bg.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about__text">
                                    <h2>The commitment</h2><hr/>
                                    <p style="font-size:15px; text-align:justify; font-weight:500;">
                                    We firmly believe that the peer-to-peer or individual-to-individual economy allows for the emergence of new modes of organisation within our society. This economy gives collective intelligence a leading role in the management of economic and social affairs: a more direct, open, less hierarchical and less compartmentalised society.
                                    <br/><br/>
We claim that crowdfunding allows us to regain power over our money, our creativity and therefore our individual and collective destiny.

                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about__text">
                                    <h2> Ethics</h2><hr/>
                                    <p style="font-size:15px; text-align:justify; font-weight:500;">
                                    
                                    We carefully screen the projects we receive from our different business areas to ensure that they do not conflict with our philosophy: projects that promote violence in any form, sectarianism, racism or any other subject that we consider to be contrary to our values are not allowed on our platforms.

                                    <br/><br/>

Investment money never stays in BillionCycle's account. The money raised remains in the online account of each project owner, which is managed by our payment service provider.

                                    <br/><br/>
This means that the money raised does not 'work' in the financial markets for BillionCycle during the term of the investment.
                                    </p>
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="about__img">
                                    <img src="{{asset('assets/img/achievement-bg.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about__img">
                                    <img src="{{asset('assets/img/achievement-bg.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about__text">
                                    <h2> Impact</h2><hr/>
                                    <p style="font-size:15px; text-align:justify; font-weight:500;">
                                    We want to enable everyone to make a real impact with their savings, by knowing exactly how they are being used. By investing with BillionCycle, you become an actor with your savings. BillionCycle is also committed to reforestation with our partner Reforest'Action: for every first investment on BillionCycle or when you sponsor us, we offer you a tree to plant that defines your network.
                                    <br/><br/>
The entire FUTUREX group defends this ability to have a real impact.

                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about__text">
                                    <h2> Openness</h2><hr/>
                                    <p style="font-size:15px; text-align:justify; font-weight:500;">
                                    On BillionCycle, we provide users with all the non-sensitive information about companies seeking to raise funds so that they can make an informed decision.
                                    <br/><br/>
All of our project areas clearly state their idea, purpose and where the investment money will go.
<br/><br/>
We encourage direct exchanges between investors and our team, notably through a forum accessible to all.
<br/><br/>
We ourselves are transparent about how we live: the service is completely free for investors, and pays 50% to 100% of an investor's investment in a successful project for the borrower. No other fees apply, there are no hidden costs, no application fees, no insurance fees, etc.

                                    </p>
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="about__img">
                                    <img src="{{asset('assets/img/achievement-bg.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about__img">
                                    <img src="{{asset('assets/img/achievement-bg.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about__text">
                                    <h2> Security</h2><hr/>
                                    <p style="font-size:15px; text-align:justify; font-weight:500;">
                                    We never resell personal data provided on BillionCycle by our business or investment community.
                                    <br/><br/>
Critical account data from our community is never stored on BillionCycle. It is encrypted, secure and held by our payment service provider.
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    </section>
    <!-- Team Section End -->

@endsection