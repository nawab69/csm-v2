@extends('layouts.guest.app')
@section('title','Contact')
    @section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Contact</h1>
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
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-breadcrumbs -->

        <section class="flat-row flat-wrap-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section style1 style2 no_padding">
                            <h2 class="title">
                                We would love to hear from you
                            </h2>
                            <p class="sub-title no_padding">
                                Have a question about how our platform operates? <br/> Are you interested in taking advantage of a free consultation? <br/> Let us know. We want to hear from you. Our team is waiting.
                            </p>
                        </div><!-- /.title-box -->
                        <form novalidate="novalidate" class="contact-form" method="post" action="">
                            <div class="wrap-type-input clearfix">
                                <p class="one-half contact-first-name padding_right_15">
                                    <input type="text" placeholder="First Name" aria-required="true" size="30" value="" name="name" id="firstname" required="required">
                                </p>
                                <p class="one-half contact-last-name padding_left_15">
                                    <input type="text" placeholder="Last Name" aria-required="true" size="30" value="" name="name" id="lastname" required="required" >
                                </p>
                            </div>
                            <div class="wrap-type-input clearfix">
                                <p class="one-half contact-email padding_right_15">
                                    <input type="email" placeholder="Email" size="30" value="" name="email" id="email" required="required">
                                </p>
                                <p class="one-half contact-phone padding_left_15">
                                    <input type="text" placeholder="Phone Number" size="30" value="" name="phone" id="phone" required="required">
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <p class="contact-form-messages">
                                <textarea  tabindex="4" placeholder="Messages" name="message" required="required"></textarea>
                            </p>
                            <p class="form-submit">
                                <button type="submit" name="submit" class="contact-submit">Submit Request</button>
                            </p>
                        </form>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="divider h128"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="flat-contact-info bg_color1">
                            <h5>Office Location</h5>
                            <p>12/A Locous Creek Ave,<br /> Port Jefferson</p>
                        </div>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="flat-contact-info bg_color2">
                            <h5>Contact Number</h5>
                            <ul>
                                <li><a href="#">+1 34587539854</a></li>
                                <li><a href="#">+1 34578654783</a></li>
                            </ul>
                        </div>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="flat-contact-info bg_color3">
                            <h5>Contact Mail</h5>
                            <ul>
                                <li><a href="#">Info@cryptostreetmarket.com</a></li>
                                <li><a href="#">quick_help@cryptostreetmarket.com</a></li>
                            </ul>
                        </div>
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section>


    @endsection
