@extends("home.app")
@section("title","Performance Indicators")
@section("content")

<style>
    .fICnKi {
        margin-bottom: 3.125rem;
    }
    .XgyWl {
        position: relative;
    }
    .XgyWl .DoubleEntryTable__Table {
        width: 100%;
        border-spacing: 0px;
        table-layout: fixed;
        border-collapse: separate;
    }

    table {
        background-color: transparent;
        text-indent: initial;
        border-color: grey;
        display: table;
        font-size:15px;
        font-family: "Maax", Helvetica, Arial, sans-serif;
    }
    table td{
        text-align : right;
    }

    table thead th, .first{
        text-align : left;
    }

    table thead th{
        text-align : right;
    }
    table th{
        text-align : left;
    }


    .XgyWl .DoubleEntryTable__TableContainer {
        overflow-x: scroll;
        margin-bottom: 1.875rem;
        border-left: 0.125rem solid rgba(255, 255, 255, 0.067);
        border-right: 0.125rem solid rgba(255, 255, 255, 0.067);
        background-repeat: no-repeat;
        background-position: 7.5rem center, 100% center;
    }

</style>
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
            </div>
            
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
                            <h3> Our performance indicators</h3>
                        </div>
                        
                        <div style="text-align:center;">
                        <p style="font-size:15px; text-align:center; color:#111111; font-weight:600;">
                        The indicators presented are representative of all the projects open to the public and financed on Billioncycle. They are in no way a reflection of the individual indicators of each Billioncycle lender. Past performance and indicators are not a guide to future performance and indicators. The indicators presented are established in accordance with the code of ethics of Financement Participatif France.
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
                        <h3>Global collections</h3>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div>
                    <div class="styles__Styles-sc-1rikehi-0 XgyWl DoubleEntryTable__Container">
                        <div class="DoubleEntryTable__TableContainer">
                            <table class="DoubleEntryTable__Table" id="funded_amount">
                                <thead>
                                    <tr>
                                        <th class="first">Montant collecté par instrument</th>
                                        <th>Total</th>
                                        <th>2021</th>
                                        <th>2020</th>
                                        <th>2019</th>
                                        <th>2018</th>
                                        <th>2017</th>
                                        <th>2016</th>
                                        <th>2015</th>
                                        <th>2014</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Prêt participatif</th>
                                        <td style="font-family: Montserrat, sans-serif;">16 606 500&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>420 000&nbsp;€</td>
                                        <td>3 168 800&nbsp;€</td>
                                        <td>3 948 200&nbsp;€</td>
                                        <td>5 284 000&nbsp;€</td>
                                        <td>3 594 500&nbsp;€</td>
                                        <td>191 000&nbsp;€</td>
                                    </tr>

                                    <tr>
                                        <th>Obligation simple</th>
                                        <td>25 530 000&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>9 220 000&nbsp;€</td>
                                        <td>9 770 000&nbsp;€</td>
                                        <td>6 540 000&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Obligation convertible</th>
                                        <td>31 821 475&nbsp;€</td>
                                        <td>6 811 000&nbsp;€</td>
                                        <td>9 110 800&nbsp;€</td>
                                        <td>15 199 675&nbsp;€</td>
                                        <td>700 000&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Minibon</th>
                                        <td>841 107&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>250 000&nbsp;€</td>
                                        <td>391 107&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>200 000&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                        <td>0&nbsp;€</td>
                                    </tr>
                                    <tr>
                                            <th >Action non cotée</th>
                                            <td>15 845 483&nbsp;€</td>
                                            <td>8 189 483&nbsp;€</td>
                                            <td>7 656 000&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                    </tr>
                                        
                                    <tr>
                                            <th>Don</th>
                                            <td>15 662&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>15 662&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                            <td>0&nbsp;€</td>
                                        
                                    </tr>
                                    
                                    <tr>
                                            <th>Total tous instruments confondus</th>
                                            <td>90 660 227&nbsp;€</td>
                                            <td>15 000 483&nbsp;€</td>
                                            <td>26 252 462&nbsp;€</td>
                                            <td>25 780 782&nbsp;€</td>
                                            <td>10 408 800&nbsp;€</td>
                                            <td>4 148 200&nbsp;€</td>
                                            <td>5 284 000&nbsp;€</td>
                                            <td>3 594 500&nbsp;€</td>
                                            <td>191 000&nbsp;€</td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <h3>General indicators</h3>
                    </div>
                </div>
            </div>
            <div class="marger__StyledMarger-sc-1qqifp5-0 fICnKi"><div class="styles__Styles-sc-1rikehi-0 XgyWl DoubleEntryTable__Container"><div class="DoubleEntryTable__TableContainer"><table class="DoubleEntryTable__Table" id="financed_amount"><thead><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol first" scope="column">Montant financé</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">Total</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2021</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2020</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2019</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2018</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2017</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2016</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2015</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2014</th></tr></thead><tbody><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">A - Nombre de projets</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">362</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">9</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">38</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">79</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">60</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">49</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">67</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">55</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">B - Nominal financé</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">74 799 082&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">6 811 000&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">18 580 800&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">25 780 782&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">10 408 800&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4 148 200&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5 284 000&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">3 594 500&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">191 000&nbsp;€</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">C - Durée moyenne d'emprunt pondérée (mois)</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">40</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">23</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">42</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">42</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">37</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">46</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">44</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">46</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">44</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">D - Taux moyen annuel pondéré</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">6,02&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4,03&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,20&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,75&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7,25&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7,38&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">8,01&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7,98&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,56&nbsp;%</td></tr></tbody></table></div></div></div>

        </div>
    </section>
    <!-- Pricing Section End -->

<!-- Services Section Begin -->
<section id="services" class="feature-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Remboursements</h3>
                    </div>
                </div>
            </div>
            
            <div class="row">
            <div class="marger__StyledMarger-sc-1qqifp5-0 fICnKi"><div class="styles__Styles-sc-1rikehi-0 XgyWl DoubleEntryTable__Container"><div class="DoubleEntryTable__TableContainer"><table class="DoubleEntryTable__Table" id="reimbursments"><thead><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol first" scope="column">Remboursements</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">Total</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2021</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2020</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2019</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2018</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2017</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2016</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2015</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2014</th></tr></thead><tbody><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">E - Capital remboursé</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">19 258 764&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">39 478&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">1 321 599&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7 015 005&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">3 331 213&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4 475 975&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">2 897 837&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">177 657&nbsp;€</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">F - Part du captal remboursé</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">25,75&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0,00&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0,21&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,13&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">67,39&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">80,31&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">84,71&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">80,62&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">93,01&nbsp;%</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">G - Intérêts versés</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5 665 138&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">9 625&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">534 859&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">1 868 624&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">1 397 581&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">561 646&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">751 308&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">521 733&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">19 762&nbsp;€</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">H - Provisions / pertes</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">3 719 253&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">1 360 926&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">455 990&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">512 060&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">696 626&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">680 308&nbsp;€</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">13 343&nbsp;€</td></tr></tbody></table></div></div></div>
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
                        <h3>Performance indicators</h3>
                    </div>
                </div>
            </div>
            <div class="marger__StyledMarger-sc-1qqifp5-0 blpAo"><div class="styles__Styles-sc-1rikehi-0 XgyWl DoubleEntryTable__Container"><div class="DoubleEntryTable__TableContainer"><table class="DoubleEntryTable__Table" id="total_irr"><thead><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol first" scope="column">Taux de rendement interne</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">Total</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2021</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2020</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2019</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2018</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2017</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2016</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2015</th><th class="DoubleEntryTable__Column DoubleEntryTable__Column--HeaderCol" scope="column">2014</th></tr></thead><tbody><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">Taux de rendement interne (net de risque)</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4,07&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4,60&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,18&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">3,82&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">6,03&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">2,46&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0,71&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">-2,33&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4,31&nbsp;%</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">Taux de rendement interne maximum possible</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,90&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4,60&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,18&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,53&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7,14&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7,53&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">8,05&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7,95&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">4,31&nbsp;%</td></tr><tr><th class="DoubleEntryTable__Column DoubleEntryTable__Column--TitleCol" scope="row">Coût du risque annuel constaté</th><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">1,83&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0,00&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0,00&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">1,71&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">1,11&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">5,07&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">7,34&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">10,28&nbsp;%</td><td class="DoubleEntryTable__Column DoubleEntryTable__Column--Col k-u-font-setting-tnum k-u-align-right--important">0,00&nbsp;%</td></tr></tbody></table></div></div></div>
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

@endsection