@extends('layouts.guest.app')
@section('title','EXCHANGE')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">EXCHANGE</h1>
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
                                <li><a href="#">EXCHANGE</a></li>
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
                                        Exchange
                                    </h2>
                                </div>
                            </div>
                            <div class="content-box margin_bottom_65 clearfix">

                                <div class="text-about">
                                    <p class="sub-title">An Exchange You Can Count On</p>
                                    <p class="margin_bottom_18">When looking for a cryptocurrency exchange, there are a few things that are a must. It’s imperative that you find an exchange you can rely upon. Being built out on the best infrastructure the blockchain has to offer gives you confidence that whenever emergency strikes, your cryptocurrency will be safe with us.  </p>
                                    <p class="sub-title">Some Of The Best Rates Around</p>
                                    <p class="margin_bottom_18">We take pride in advertising our change rates for everyone to see. We understand that this will be the deciding factor between investing on our platform and the next. That’s why we’ve reduced our exchange rates to the bare minimum to help attract investors from all over the world. </p>
                                </div>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
