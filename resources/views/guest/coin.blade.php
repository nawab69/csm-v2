@extends('layouts.guest.app')
@section('title','Coin')
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
                                <h2 class="title-head">Supported<span>Coins</span></h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{route('welcome')}}"> home</a></li>
                                    <li>Coin</li>
                                </ul>
                                <!-- Breadcrumb Ends -->
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area Ends -->
        <!-- Section Services Starts -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/download-bitcoin.png" alt="download bitcoin">
                            <div class="service-box-content">
                                <h3>Bitcoin</h3>
                                <p>Bitcoin is one of the world's most famous cryptocurrencies and it’s currently trading higher than ever. Hop on board. Stop thinking about it and just do it.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/add-bitcoins.png" alt="add bitcoins">
                            <div class="service-box-content">
                                <h3>Ethereum</h3>
                                <p>Ethereum has been gaining popularity little by little. As cryptocurrencies all around the board gain value, Ethereum has taken its rightful place as the second most popular cryptocurrency in the world.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/buy-sell-bitcoins.png" alt="buy and sell bitcoins">
                            <div class="service-box-content">
                                <h3>Ripple</h3>
                                <p>If you haven’t heard of ripple, it’s time to get on board. Many cryptocurrency investors are slowly but surely realizing the super-powerful fluctuations that ripple brings to the table.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/strong-security.png" alt="strong security"/>
                            <div class="service-box-content">
                                <h3>Light Coin</h3>
                                <p>Light Coin is anything but light. You can earn some heavy profits by trading in Light Coin. Take a look at our exchange rates to acquire your coins for the best possible rate right now.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                </div>
            </div>
        </section>
        <!-- Section Services Ends -->
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
            <div class="call-action-all-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Call To Action Text Starts -->
                            <div class="action-text">
                                <h2>Get Started Today With Bitcoin</h2>
                                <p class="lead">Open account for free and start trading Bitcoins!</p>
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
