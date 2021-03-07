@extends('layouts.guest.app')
@section('title','About us ')
    @section('content')


        <!-- Banner Area Starts -->
        <section class="banner-area">
            <div class="banner-overlay">
                <div class="banner-text text-center">
                    <div class="container">
                        <!-- Section Title Starts -->
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <!-- Title Starts -->
                                <h2 class="title-head">About <span>Us</span></h2>
                                <h4 style="font-size: 1.5em" class="title-head">Join the <span>CryptoGang</span></h4>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{route('welcome')}}"> home</a></li>
                                    <li>About</li>
                                </ul>
                                <!-- Breadcrumb Ends -->
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area Starts -->
        <!-- About Section Starts -->
        <section class="about-page">
            <div class="container">
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img class="img-responsive img-about-us" src="assets/bayya/images/about-us.png" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <div class="feature-about">
                            <h3 class="title-about"><i class="fa fa-bitcoin"></i>Crypto Street Market <br/>
                                Is Helping Leading The Crypto Revolution
                            </h3>
                            <p>Cryptocurrency has been somewhat of an abstract concept for many years. It's not until recently that many investors have realized that with enough education, the right consulting, and the proper tools, anything is possible. We’re helping push investors in the right direction by giving them everything they need to succeed.</p>
                        </div>
                        <div class="feature-about">
                            <h3 class="title-about risk-title"><i class="fa fa-pencil"></i> Our Story <br/>
                                Begins and Ends With Crypto
                            </h3>
                            <p>Ever since the beginning, Crypto Street Market has had a singular focus in mind. That goal was to help share our experience and insights with the world. As a team of expert IT and cryptocurrency experts, we believe cryptocurrency can be simplified to a level where everyone can enjoy it. By combining free consulting and extremely accurate exchange rates, our platform is suitable for anyone. That’s where we began and where will continue to stay.</p>
                        </div>
                        <a class="btn btn-primary btn-services" href="{{route('services')}}">Our services</a>
                    </div>
                    <!-- Content Ends -->

                </div>
                <!-- Section Content Ends -->
            </div><!--/ Content row end -->
        </section>
        <!-- About Section Ends -->
        <!-- Facts Section Starts -->
        <section class="facts">
            <!-- Container Starts -->
            <div class="container">
                <!-- Fact Badges Starts -->
                <div class="row text-center facts-content">
                    <div class="text-center heading-facts">
                        <h2>CSM<span> STATS</span></h2>
                        <p>leading cryptocurrency exchange</p>
                    </div>
                    <!-- Fact Badge Item Starts -->
                    <div class="col-xs-12 col-md-3 col-sm-6 fact">
                        <h3>$77.45B</h3>
                        <h4>market cap</h4>
                    </div>
                    <!-- Fact Badge Item Ends -->
                    <!-- Fact Badge Item Starts -->
                    <div class="col-xs-12 col-md-3 col-sm-6 fact fact-clear">
                        <h3>165k</h3>
                        <h4>daily transactions</h4>
                    </div>
                    <!-- Fact Badge Item Ends -->
                    <!-- Fact Badge Item Starts -->
                    <div class="col-xs-12 col-md-3 col-sm-6 fact">
                        <h3>1726</h3>
                        <h4>active accounts</h4>
                    </div>
                    <!-- Fact Badge Item Ends -->
                    <!-- Fact Badge Item Starts -->
                    <div class="col-xs-12 col-md-3 col-sm-6">
                        <h3>17</h3>
                        <h4>years on the market</h4>
                    </div>
                    <!-- Fact Badge Item Ends -->
                    <div class="col-xs-12 buttons">
                        <a class="btn btn-primary btn-pricing" href="{{route('home')}}">Trade Now</a>
                        <span class="or"> or </span>
                        <a class="btn btn-primary btn-register" href="{{route('register')}}">Register Now</a>
                    </div>
                </div>
                <!-- Fact Badges Ends -->
            </div>
            <!-- Container Ends -->
        </section>
        <!-- facts Section Ends -->
        <!-- Section Services Starts -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/download-bitcoin.png" alt="download bitcoin">
                            <div class="service-box-content">
                                <h3>24/7 Support</h3>
                                <p>Constant 24/7 service support means that your cryptocurrency investments are always safe with us.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/add-bitcoins.png" alt="add bitcoins">
                            <div class="service-box-content">
                                <h3>Innovative Tech</h3>
                                <p>By combining the best blockchain tech, we’ve developed an innovative solution to fuel your growth.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-12 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/buy-sell-bitcoins.png" alt="buy and sell bitcoins">
                            <div class="service-box-content">
                                <h3>Low Exchange Fees</h3>
                                <p>We believe in upfront transparency and therefore we list all of our exchange rates in plain view for everyone to see.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-12 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/strong-security.png" alt="strong security"/>
                            <div class="service-box-content">
                                <h3>More About Us</h3>
                                <p>
                                    What makes us so very different is our commitment to continued education. We believe that through a systematic effort of learning, we can continue to grow and enhance our cryptocurrency investing skills.
                                </p>
                                <p>
                                    Think about what you knew about cryptocurrency a month ago versus what you know today. Things change in the blink of an eye and with the support of our expert team behind you, it’s truly possible to make great leaps forward.
                                </p>
                                <p>
                                    Where do you see yourself as a cryptocurrency investor in five years? Do you have a plan to maximize your returns? Let's talk about it. We want to hear how you feel, where you want to go and how you see yourself getting there.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->


                </div>
            </div>
        </section>
        <!-- Section Services Ends -->
        <!-- Team Section Starts -->
        <section class="team">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">our <span>experts</span></h2>
                    <div class="title-head-subtitle">
                        <p> A talented team of Cryptocurrency experts</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Team Members Starts -->
                <div class="row team-content team-members">
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member1.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Maryana Mori</h4>
                                <p>Ceo Founder</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Starts -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member2.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Marco Verratti</h4>
                                <p>Director</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <!-- Team Member-->
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member3.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Emilia Bella</h4>
                                <p>Bitcoin Consultant</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member4.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Antonio Conte</h4>
                                <p>Bitcoin Developer</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                </div>
                <!-- Team Members Ends -->
            </div>
        </section>
        <!-- Team Section Ends -->
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
            <div class="call-action-all-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Call To Action Text Starts -->
                            <div class="action-text">
                                <h2>Get Started Today With Crypto and Fiat</h2>
                                <p class="lead">Open account for free and start trading Crypto and Fiat!</p>
                            </div>
                            <!-- Call To Action Text Ends -->
                            <!-- Call To Action Button Starts -->
                            <p class="action-btn"><a class="btn btn-primary" href="{{route('register')}}">Register Now</a></p>
                            <!-- Call To Action Button Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call To Action Section Ends -->



    @endsection
