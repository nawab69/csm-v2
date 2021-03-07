@extends('layouts.guest.app')
@section('title','Buy and Sell')
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
                                <h2 class="title-head"><span>Buy</span> And <span>Sell</span></h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{route('welcome')}}"> home</a></li>
                                    <li><span>Buy</span> And <span>Sell</span></li>
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
                    <div class="col-md-12 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/download-bitcoin.png" alt="download bitcoin">
                            <div class="service-box-content">
                                <h3>Buy With Confidence</h3>
                                <p>Have faith in the fact that the cryptocurrency market was built for everyone from beginning investors to serious exchange funds. Always get access to laser-accurate pricing to help you buy for the best possible prices in the market.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-12 service-box">
                        <div>
                            <img src="assets/bayya/images/icons/orange/add-bitcoins.png" alt="add bitcoins">
                            <div class="service-box-content">
                                <h3>Sell with Ease</h3>
                                <p>We’re not here to make you jump through unnecessary hoops. When you want to sell, it’s your right. Simply log into your system from the desktop or the mobile application and begin the process. It’s time for you to engage in a hassle-free Cryptocurrency investing experience. </p>
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
