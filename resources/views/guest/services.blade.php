@extends('layouts.guest.app')
@section('title','Services')
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
                                <h2 class="title-head">our <span>services</span></h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{route('welcome')}}"> home</a></li>
                                    <li>services</li>
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
                                <h3>Buy</h3>
                                <p>Take advantage of a super-secure, safe cryptocurrency market place to buy all the bitcoin, Ethereum, light coin, and others that you need. </p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/add-bitcoins.png" alt="add bitcoins">
                            <div class="service-box-content">
                                <h3>Sell</h3>
                                <p>When it’s time to sell, do it with confidence, and collect your profits with ease. In a few simple steps, you’ll be able to exchange your coins for cash and walk away a winner.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/buy-sell-bitcoins.png" alt="buy and sell bitcoins">
                            <div class="service-box-content">
                                <h3>Trade</h3>
                                <p>Whether you want to exchange one coin for another or anything else, we’ll help you make a trade with super low fees and amazing transparency</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/strong-security.png" alt="strong security"/>
                            <div class="service-box-content">
                                <h3>Mobile App</h3>
                                <p>Having the confidence of a mobile app gives you the power to always stay on top of your investment. Never be without information when you have the Crypto Street Market app by your side.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/world-coverage.png" alt="world coverage"/>
                            <div class="service-box-content">
                                <h3>Everything You need</h3>
                                <p>We’ve compiled everything you need in one single place. Take advantage of a suite of tools designed to elevate your skillset when it comes to investing in cryptocurrency. It’s all about the resources you have under your belt. Crypto Street Market was designed not only as an exchange marketplace but to hold a plethora of resources for everyone to enjoy.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-6 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/payment-options.png" alt="payment options"/>
                            <div class="service-box-content">
                                <h3>Your Wallet Is Your Wallet</h3>
                                <p>Have confidence that no one will have the power to reach inside of your wallet but you. We know that as a first-time investor, the concept of a digital wallet can seem a bit frightful. However, the blockchain is so secure that you can feel confident in the fact that your currency is safe and sound inside of your digital wallet</p>
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
