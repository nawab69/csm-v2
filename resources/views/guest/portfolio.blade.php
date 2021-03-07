@extends('layouts.guest.app')
@section('title','Portfolio')
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
                            <h2 class="title-head">Portfolio</h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="{{route('welcome')}}"> home</a></li>
                                <li>Portfolio</li>
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
                            <h3>We Invest Just Like you </h3>
                            <p>
                                Just like you, we understand the potential behind cryptocurrency. That’s why our portfolio is always available for you to inquire upon. Take a look at the assets we hold, our future strategies, and how we plan to attack the market. If we can give you any advice on how to proceed, let us know.                            </p>
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
