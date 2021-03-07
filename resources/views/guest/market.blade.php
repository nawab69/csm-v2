@extends('layouts.guest.app')
@section('title','MARKET DATA')
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
                                <h2 class="title-head">Market Data</h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{route('welcome')}}"> home</a></li>
                                    <li>Market Data</li>
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

                            <div class="service-box-content">
                                <h3>Understand Market Fluctuations</h3>
                                <p>In addition to all of the tools and resources we provide on our platform, we also bring to you incredible market insight so you understand the past, present, and future trends of a certain coin. Understanding these growth curves and trend lines will give you an insight into how you can prepare your investment strategy.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Service Box Ends -->
                    <!-- Service Box Starts -->
                    <div class="col-md-12 service-box">
                        <div>
                            <div class="service-box-content">
                                <h3>Stay On Top Of Trends </h3>
                                <p>There’s always a trend for everything. Your ability to stay above the trend will dictate how well equipped you are to mitigate risk and capitalize on market fluctuations.</p>
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
