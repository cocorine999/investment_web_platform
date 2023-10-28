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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <ul>
                            <li>
                                <span class="fa fa-map-marker"></span>
                                <h5>Address</h5>
                                <p>160 Pennsylvania Ave NW, Washington Castle, PA 16101-5161</p>
                            </li>
                            <li>
                                <span class="fa fa-mobile"></span>
                                <h5>Phone Number</h5>
                                <p>125-711-811 | 125-668-886</p>
                            </li>
                            <li>
                                <span class="fa fa-envelope"></span>
                                <h5>Email Address</h5>
                                <p>support.billioncycle@gmail.com</p>
                            </li>
                        </ul>
                        <div class="contact__social">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
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
                    <h3 style="margin-bottom:20px!important;">Apporteurs d'affaires</h3>
                    <p style="margin-bottom:2rem!important;
    font-size: 16px;
    font-weight: 400;    font-family: Montserrat, sans-serif;
    color: #111111;">Vous êtes courtier/conseiller en financement ou transactions, conseiller en gestion de patrimoine, banquier, expert comptable ou apporteur d'affaires et vous souhaitez proposer une nouvelle solution de financement ou de placement à vos clients ? Transmettez-nous vos coordonnées et nous vous recontacterons dans les plus brefs délais :</p>

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