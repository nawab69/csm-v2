<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon"  href="{{ setting('site_favicon') != null ? Storage::disk('public')->url(setting('site_favicon')) : '' }}"/>
    <title>@yield('title') | {{ setting('site_title', 'LaraStarter') }}</title>


    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/guest/stylesheets/bootstrap.css')}}" >

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/guest/stylesheets/style.css')}}">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/guest/stylesheets/responsive.css')}}">

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/guest/stylesheets/animate.css')}}">

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/guest/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/guest/revolution/css/settings.css')}}">

    <!-- GLOBAL STYLESHEET APP -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    @stack('css')
</head>
<body class="header_sticky">
    <!-- Preloader -->
    <section class="loading-overlay">
        <div class="loading-page">
            <div class="loader"></div>
        </div>
    </section>

    <!-- Boxed -->
    <div class="boxed">


    @include('layouts.guest.partials.header')

        @yield('content')

    @include('layouts.guest.partials.footer')



    </div>

    <!-- Javascript -->
    <script src="{{asset('assets/guest/javascript/jquery.min.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/tether.min.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/jquery.easing.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/parallax.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/jquery-countTo.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/jquery-waypoints.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/jquery-validate.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/jquery.cookie.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/plotly-latest.min.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/jquery.easeScroll.js')}}"></script>
    <script src="{{asset('assets/guest/javascript/gmap3.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLjIsk1A1SP8UsfNf2r4VXPinzvnIsnN4&region=GB"></script>
    <script src="{{asset('assets/guest/javascript/main.js')}}"></script>

    <!-- Revolution Slider -->
    <script src="{{asset('assets/guest/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/slider.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('assets/guest/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    @stack('js')
    @include('vendor.lara-izitoast.toast')
</body>
</html>
