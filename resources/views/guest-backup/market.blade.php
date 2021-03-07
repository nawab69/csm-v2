@extends('layouts.guest.app')
@section('title','MARKET DATA')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">MARKET DATA</h1>
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
                                <li><a href="#">MARKET DATA</a></li>
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
                                        Market Data
                                    </h2>
                                </div>
                            </div>
                            <div class="content-box margin_bottom_65 clearfix">

                                <div class="text-about">
                                    <p class="sub-title">Understand Market Fluctuations</p>
                                    <p class="margin_bottom_18">In addition to all of the tools and resources we provide on our platform, we also bring to you incredible market insight so you understand the past, present, and future trends of a certain coin. Understanding these growth curves and trend lines will give you an insight into how you can prepare your investment strategy.</p>
                                    <p class="sub-title">Stay On Top Of Trends </p>
                                    <p class="margin_bottom_18">There’s always a trend for everything. Your ability to stay above the trend will dictate how well equipped you are to mitigate risk and capitalize on market fluctuations. </p>
                                </div>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
