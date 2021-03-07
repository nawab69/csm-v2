@extends('layouts.guest.app')
@section('title','Team')
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
                                <h2 class="title-head">Team</h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{route('welcome')}}"> home</a></li>
                                    <li>Team</li>
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
                                <h3>Meet The Team</h3>
                                <p>
                                    Our team consists of many experienced It experts and cryptocurrency consultants willing to share their expertise with the world. Take a look at those working for the Crypto Street Market team.
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
