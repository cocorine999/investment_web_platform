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
                        Billioncycle is a participatory financing platform, dedicated to renewable energy projects. Our platform was created by KissKissBankBank in 2014, with the ambition to allow everyone to make their savings more engaged and transparent. Since our launch, we have always remained true to our core values.
                            
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
                                    We carefully analyse the projects that are proposed to us so that they never contradict our philosophy: projects that promote violence in all its forms, sectarianism, racism or any other subject that we consider to be contrary to our values are prohibited on our platforms.
                                    <br/><br/> 
The money collected is never in Billioncycle's account. The amounts collected remain in the online account of each project owner, which is managed by our payment service provider.
<br/><br/>
The amounts collected do not "work" on the financial markets for the benefit of Lendopolis during the period of the collections.

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
                                    We want to enable everyone to have a concrete impact with their savings, by knowing exactly how they are used. By investing on Lendopolis, you become an actor in the energy transition with your savings. Lendopolis is also committed to reforestation alongside our partner Reforest'Action: for every first investment on Lendopolis or when you are sponsored, we offer you a tree to plant.
<br/><br/>
The entire KissKissBankBank & Co group is committed to making a real impact, whether through KissKissBankBank, our participatory financing platform dedicated to donation for donation, Goodeed, our free donation platform, or Microdon, the inventor of the rounding up system.


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
                                        On Billioncycle, we provide users with all the non-sensitive information about companies seeking to raise funds so that they can make an informed decision.
                                        <br/><br/>
                                        All our project leaders clearly state their identity and that of their company, their objective and specify what the money raised will be used for.
                                        <br/><br/>
                                        We encourage direct exchanges between investors and borrowers, notably through a forum accessible to all.
                                        <br/><br/>
                                        We ourselves are transparent about the way we live: the service is completely free for investors, and paid for at a rate of 3 to 5% of the amounts raised on successful projects for borrowers. No other fees apply, there are no hidden costs, no application fees, no insurance fees, etc.
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
                                        We never resell personal data provided on Lendopolis by our business or investor community.
                                        <br/><br/>
                                        The critical banking data of our community is never kept on Lendopolis. It is encrypted, secured and stored by our payment service provider.
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