@extends('layouts.guest.app')
@section('title','Team')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Team</h1>
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
                                <li><a href="#">Team</a></li>
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
                                        Meet The Team
                                    </h2>
                                </div>
                                <p class="margin_bottom_35">Our team consists of many experienced It experts and cryptocurrency consultants willing to share their expertise with the world. Take a look at those working for the Crypto Street Market team. </p>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
