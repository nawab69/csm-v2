@extends('layouts.guest.app')
@section('title','About us ')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">About Us</h1>
                            <div class="sub-title">Join the CryptoGang</div>
                        </div><!-- /.page-title-captions -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <div class="flat-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('welcome')}}">Home</a></li>
                                <li><a href="#">About Us</a></li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-breadcrumbs -->


        <section class="flat-row row-wallet style4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-wallet">
                            <div class="content-box margin_bottom_79">
                                <div class="title-section">
                                    <h2 class="title">
                                        Crypto Street Market <br>
                                        Is Helping Leading The Crypto Revolution
                                    </h2>
                                </div>
                                <p class="margin_bottom_35">Cryptocurrency has been somewhat of an abstract concept for many years. It's not until recently that many investors have realized that with enough education, the right consulting, and the proper tools, anything is possible. We’re helping push investors in the right direction by giving them everything they need to succeed.</p>
                            </div>
                            <div class="content-box margin_bottom_65 clearfix">

                                <div class="text-about">
                                    <div class="title-section">
                                        <h2 class="title letter_spacing_0">
                                            Our Story
                                        </h2>
                                    </div>
                                    <p class="sub-title">Begins and Ends With Crypto</p>
                                    <p class="margin_bottom_18">Ever since the beginning, Crypto Street Market has had a singular focus in mind. That goal was to help share our experience and insights with the world. As a team of expert IT and cryptocurrency experts, we believe cryptocurrency can be simplified to a level where everyone can enjoy it. By combining free consulting and extremely accurate exchange rates, our platform is suitable for anyone. That’s where we began and where will continue to stay.</p>
                                </div>
                            </div>
                            <div class="content-box margin_bottom_29 clearfix">
                                <div class="flat-column one-half">
                                    <h5>24/7 Support</h5>
                                    <p>Constant 24/7 service support means that your cryptocurrency investments are always safe with us.</p>
                                </div>
                                <div class="flat-column one-half padding_left_24">
                                    <h5>Innovative Tech</h5>
                                    <p>By combining the best blockchain tech, we’ve developed an innovative solution to fuel your growth.</p>
                                </div>
                            </div>
                            <div class="content-box clearfix">
                                <div class="title-section">
                                    <h2 class="title">
                                        Low Exchange Fees
                                    </h2>
                                </div>
                                <p>We believe in upfront transparency and therefore we list all of our exchange rates in plain view for everyone to see.</p>
                            </div>
                            <div class="content-box clearfix">
                                <div class="title-section">
                                    <h2 class="title">
                                        More About Us
                                    </h2>
                                </div>
                                <p>What makes us so very different is our commitment to continued education. We believe that through a systematic effort of learning, we can continue to grow and enhance our cryptocurrency investing skills.</p>
                                <p class="mt-5">Think about what you knew about cryptocurrency a month ago versus what you know today. Things change in the blink of an eye and with the support of our expert team behind you, it’s truly possible to make great leaps forward.</p>
                                <p class="mt-5">Where do you see yourself as a cryptocurrency investor in five years? Do you have a plan to maximize your returns? Let's talk about it. We want to hear how you feel, where you want to go and how you see yourself getting there.</p>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
