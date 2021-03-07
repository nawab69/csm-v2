@extends('layouts.guest.app')
@section('title','Services')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Services</h1>
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
                                <li><a href="#">Services</a></li>
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
                                        Free Consulting. Expert Advice
                                    </h2>
                                </div>
                                <p class="margin_bottom_35">Don’t hesitate to pick up the phone and give us a ring. Our expert cryptocurrency consultants will be standing by to help you plan the best course forward. Have a question about an exchange? Interested in learning the history of a cryptocurrency? Let’s talk about it.</p>
                            </div>
                            <div class="content-box margin_bottom_65 clearfix">

                                <div class="text-about">
                                    <p class="sub-title">Buy</p>
                                    <p class="margin_bottom_18">Take advantage of a super-secure, safe cryptocurrency market place to buy all the bitcoin, Ethereum, light coin, and others that you need. </p>
                                    <p class="sub-title">Sell</p>
                                    <p class="margin_bottom_18">When it’s time to sell, do it with confidence, and collect your profits with ease. In a few simple steps, you’ll be able to exchange your coins for cash and walk away a winner.</p>
                                    <p class="sub-title">Trade</p>
                                    <p class="margin_bottom_18">Whether you want to exchange one coin for another or anything else, we’ll help you make a trade with super low fees and amazing transparency</p>
                                    <p class="sub-title">Mobile App</p>
                                    <p class="margin_bottom_18">Having the confidence of a mobile app gives you the power to always stay on top of your investment. Never be without information when you have the Crypto Street Market app by your side.</p>
                                    <p class="sub-title">Everything You Need</p>
                                    <p class="margin_bottom_18">We’ve compiled everything you need in one single place. Take advantage of a suite of tools designed to elevate your skillset when it comes to investing in cryptocurrency. It’s all about the resources you have under your belt. Crypto Street Market was designed not only as an exchange marketplace but to hold a plethora of resources for everyone to enjoy.</p>
                                    <p class="sub-title">Your Wallet Is Your Wallet</p>
                                    <p class="margin_bottom_18">Have confidence that no one will have the power to reach inside of your wallet but you. We know that as a first-time investor, the concept of a digital wallet can seem a bit frightful. However, the blockchain is so secure that you can feel confident in the fact that your currency is safe and sound inside of your digital wallet </p>
                                    </div>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
