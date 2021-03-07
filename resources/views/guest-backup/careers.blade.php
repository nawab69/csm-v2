@extends('layouts.guest.app')
@section('title','Careers')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Careers</h1>
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
                                <li><a href="#">Careers</a></li>
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
                                        Work With Us
                                    </h2>
                                </div>
                                <p class="margin_bottom_35">Are you an expert IT agent looking for work? Are you an amazing cryptocurrency consultant who would like to share your expertise? We’re always on the hunt for amazing talent willing to share their skills with the world.  .</p>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="wrap-wallet">
                            <div class="content-box margin_bottom_79">
                                <div class="title-section">
                                    <h2 class="title">
                                        Join The Team
                                    </h2>
                                </div>
                                <p class="margin_bottom_35">Don’t hesitate to send us your application. We want you to join the team and to advance your cryptocurrency investing career with us today.</p>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
