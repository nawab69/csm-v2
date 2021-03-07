@extends('layouts.guest.app')
@section('title','Coin')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Coin</h1>
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
                                <li><a href="#">Coin</a></li>
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
                                        COIN
                                    </h2>
                                </div>
                            </div>
                            <div class="content-box margin_bottom_65 clearfix">

                                <div class="text-about">
                                    <p class="sub-title">Bitcoin</p>
                                    <p class="margin_bottom_18">Bitcoin is one of the world's most famous cryptocurrencies and it’s currently trading higher than ever. Hop on board. Stop thinking about it and just do it. </p>
                                    <p class="sub-title">Ethereum</p>
                                    <p class="margin_bottom_18">Ethereum has been gaining popularity little by little. As cryptocurrencies all around the board gain value, Ethereum has taken its rightful place as the second most popular cryptocurrency in the world.</p>
                                    <p class="sub-title">Ripple</p>
                                    <p class="margin_bottom_18">If you haven’t heard of ripple, it’s time to get on board. Many cryptocurrency investors are slowly but surely realizing the super-powerful fluctuations that ripple brings to the table. </p>
                                    <p class="sub-title">Light Coin</p>
                                    <p class="margin_bottom_18">Light Coin is anything but light. You can earn some heavy profits by trading in Light Coin. Take a look at our exchange rates to acquire your coins for the best possible rate right now. </p>
                                </div>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
