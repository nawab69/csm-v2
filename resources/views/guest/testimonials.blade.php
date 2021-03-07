@extends('layouts.guest.app')
@section('title','Testimonials')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Testimonials</h1>
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
                                <li><a href="#">Testimonials</a></li>
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
                                        Hear What our Investors Have To Say
                                    </h2>
                                </div>
                                <p class="margin_bottom_35">Everyone who takes the time to leave a review on our platform understands exactly what they are doing. If you see a review, it’s because the person who left it was extremely happy with the way we helped them invest in the cryptocurrency world. Take a look at what they had to say below</p>
                            </div>
                        </div><!-- /.wrap-wallet -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <section class="flat-row row-testimonials parallax parallax4">
            <div class="overlay bg_color1"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-testimonials text-center">
                            <div class="flat-testimonials" data-item="1" data-nav="false" data-dots="false" data-auto="true">
                                <div class="testimonials">
                                    <div class="avatar">
                                        <div class="author-thumb">
                                            <img src="{{asset('assets/guest/images/testimonials/2.png')}}" alt="image">
                                        </div>
                                        <div class="name"><span>Spencer Mann, VP of Growth at Lucid Software</span></div>
                                    </div>
                                    <div class="message">
                                        <blockquote>
                                            <p>Advice for your business when you need it From succesful entrepeneurs to corporate leaders,<br /> we come from all industry sectors to give your business the help it needs support network ded- <br/>icated to helping small </p>
                                        </blockquote>
                                    </div>
                                </div><!-- /.testimonials -->
                                <div class="testimonials">
                                    <div class="avatar">
                                        <div class="author-thumb">
                                            <img src="{{asset('assets/guest/images/testimonials/2.png')}}" alt="image">
                                        </div>
                                        <div class="name"><span>Spencer Mann, VP of Growth at Lucid Software</span></div>
                                    </div>
                                    <div class="message">
                                        <blockquote>
                                            <p>Advice for your business when you need it From succesful entrepeneurs to corporate leaders,<br /> we come from all industry sectors to give your business the help it needs support network ded- <br/>icated to helping small </p>
                                        </blockquote>
                                    </div>
                                </div><!-- /.testimonials -->
                            </div><!-- /.flat-testimonials -->
                        </div><!-- /.wrap-testimonials -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->


    @endsection
