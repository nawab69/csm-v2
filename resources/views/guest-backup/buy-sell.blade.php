@extends('layouts.guest.app')
@section('title','Buy and Sell')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">BUY AND SELL</h1>
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
                                <li><a href="#">BUY AND SELL</a></li>
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
                                        Buy and Sell
                                    </h2>
                                </div>
                            </div>
                            <div class="content-box margin_bottom_65 clearfix">

                                <div class="text-about">
                                    <p class="sub-title">Buy With Confidence</p>
                                    <p class="margin_bottom_18">Have faith in the fact that the cryptocurrency market was built for everyone from beginning investors to serious exchange funds. Always get access to laser-accurate pricing to help you buy for the best possible prices in the market.</p>
                                    <p class="sub-title">Sell With Ease</p>
                                    <p class="margin_bottom_18">We’re not here to make you jump through unnecessary hoops. When you want to sell, it’s your right. Simply log into your system from the desktop or the mobile application and begin the process. It’s time for you to engage in a hassle-free Cryptocurrency investing experience. </p>
                                </div>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
