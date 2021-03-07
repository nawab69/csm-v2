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
    <!-- Custom CSS -->

    <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @stack('css')
</head>

<body class="header-fix fix-sidebar">

<!-- Main wrapper  -->
<div id="main-wrapper">
    @include('layouts.user.partials.header')
    @include('layouts.user.partials.sidebar')
    <!-- Page wrapper  -->
    <div class="page-wrapper">

        @yield('content')

    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="{{asset('assets/dashboard/js/lib/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/dashboard/js/lib/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/dashboard/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('assets/dashboard/js/jquery.slimscroll.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('assets/dashboard/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('assets/dashboard/js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('assets/dashboard/js/custom.min.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>

@stack('js')
@include('vendor.lara-izitoast.toast')

</body>

</html>
