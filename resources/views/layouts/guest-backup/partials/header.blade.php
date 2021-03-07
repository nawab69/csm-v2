<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="wrap-language-info clearfix">
                    <div class="flat-language">
                        <ul class="unstyled">
                            <li class="current"><a href="#">English</a>
                            </li>
                        </ul>
                    </div><!-- /.flat-language -->
                </div><!-- /.wrap-language-info -->
            </div><!-- /.clo-md-6 -->
            <div class="col-md-6">
                <div class="wrap-social-sign pull-right clearfix">
{{--                    <ul class="flat-social">--}}
{{--                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                    </ul><!-- /.flat-social -->--}}
                    <div class="flat-sign">
                        @guest
                        <a href="{{route('login')}}">Sign in</a>
                        <a href="{{route('register')}}" class="active">Sign Up</a>
                        @else
                            <a href="{{route('home')}}" class="active">Dashboard</a>
                        @endguest
                    </div><!-- /.flat-sign -->
                </div><!-- /.wrap-social-sign -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.top -->

<div class="flat-header-wrap">
    <div class="header header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <div id="logo" class="logo">
                        <a href="#" rel="home">
                            <img src="{{asset('storage/'.setting('site_logo'))}}" alt="image">
                        </a>
                    </div><!-- /.logo -->
                </div><!-- /.col-lg-3 -->
                <div class="col-md-12 col-lg-9">
                    <ul class="flat-information style2">
                        <li class="email">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="text">
                                <p><span>Email Address</span><br/><a href="#">admin@csm.com</a></p>
                            </div>
                        </li>
                        <li class="phone">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="text">
                                <p><span>Phone</span><br/><a href="#">+1 43232432786</a></p>
                            </div>
                        </li>
                        <li class="address">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="text">
                                <p><span>Location</span><br/>US , North lake view</p>
                            </div>
                        </li>
                    </ul><!-- /.flat-information -->
                </div><!-- /.col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->

    <header id="header" class="header header-classic">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-wrap style2">
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{route('welcome')}}">HOME</a>
                                </li>
                                <li >
                                    <a href="{{route('about')}}">ABOUT US</a>
                                </li>
                                <li>
                                    <a href="{{route('services')}}">SERVICES</a>
                                    <ul class="submenu">
                                        <li><a href="{{route('coin')}}">COIN</a></li>
                                        <li><a href="{{route('buysell')}}">BUY AND SELL</a></li>
                                        <li><a href="{{route('market')}}">MARKET DATA</a></li>
                                        <li><a href="{{route('exchange')}}">EXCHANGE</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">PAGES</a>
                                    <ul class="submenu">
                                        <li><a href="{{route('partners')}}">PARTNER</a></li>
                                        <li><a href="{{route('portfolio')}}">PORTOFOLIO</a></li>
                                        <li><a href="{{route('history')}}">HISTORY</a></li>
                                        <li><a href="{{route('approach')}}">APPROACH</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">OTHERS</a>
                                    <ul class="submenu">
                                        <li><a href="{{route('careers')}}">CAREERS</a></li>
                                        <li><a href="{{route('testimonials')}}">TESTIMONIALS</a></li>
                                        <li><a href="{{route('team')}}">TEAMS</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('contact')}}">CONTACT US</a></li>
                            </ul>
                        </nav><!-- /.mainnav -->

                        <div class="btn-menu">
                            <span></span>
                        </div><!-- /.mobile menu button -->
                    </div><!-- /.nav-wrap -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- /header -->
</div><!-- /.flat-header-wrap -->
