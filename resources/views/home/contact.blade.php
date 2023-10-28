@extends("home.app")

@section("title","Contact Info | About Us")
@section("content")
<!-- Breadcrumb Begin -->
<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}"><span class="fa fa-home"></span> Home</a>
                        <a href="#"> About</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Contact info</h3>
                        <p>You have an idea, tell us about it and we will support you in your project through a project study.</p>
                        <ul>
                            <li>
                                <span class="fa fa-map-marker"></span>
                                <h5>Address</h5>
                                <p>500 South Main Street Los Angeles,
ZZ-96110 USA</p>
                            </li>
                            <li>
                                <span class="fa fa-mobile"></span>
                                <h5>Phone Number</h5>
                                <p>+1 175 946 2316 096</p>
                            </li>
                            <li>
                                <span class="fa fa-envelope"></span>
                                <h5>Email Address</h5>
                                <p>support.billioncycle@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20151.047591375514!2d-0.5735782106784704!3d50.85188881113048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4875a4d10c96d8bf%3A0xe9a76e70e6b7cc5a!2sArundel%2C%20UK!5e0!3m2!1sen!2sbd!4v1584862449435!5m2!1sen!2sbd"
                            height="515" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="margin-bottom:20px!important;">BUSINESS INTRODUCERS</h3>
                    <p style="margin-bottom:2rem!important;
    font-size: 16px;
    font-weight: 400;    font-family: Montserrat, sans-serif;
    color: #111111;">You are a broker/adviser in financing or transactions, an asset management adviser, a banker, an accountant or a business introducer and you would like to propose a new financing or investment solution to your clients? Send us your details and we will contact you as soon as possible:</p>

                    <form action="#">
                        <div class="input-list">
                            <input type="text" placeholder="First Name">
                            <input type="text" placeholder="Last Name">
                            <input type="email" placeholder="Email">
                            <input type="number" placeholder="Telephone (optionnel)">
                            <input type="text" placeholder="Mon entreprise">
                            <input type="text" placeholder="Website">
                        </div>
                        <textarea placeholder="Question"></textarea>
                        <button type="submit" class="site-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection