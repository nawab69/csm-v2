<!-- Header Starts -->
<header class="header">
    <div class="container">
        <div class="row">
            <!-- Logo Starts -->
            <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                <a href="{{route('welcome')}}">
                    <img class="img-responsive" src="{{asset('storage/'.setting('site_logo'))}}" alt="logo">
                </a>
            </div>
            <!-- Logo Ends -->
            <!-- Statistics Starts -->
            <div class="col-md-7 col-lg-7">
            </div>
            <!-- Statistics Ends -->
            <!-- User Sign In/Sign Up Starts -->
            <div class="col-md-3 col-lg-3">
                <ul class="unstyled user">
                    @guest
                    <li class="sign-in"><a href="{{route('login')}}" class="btn btn-primary"><i class="fa fa-user"></i> sign in</a></li>
                    <li class="sign-up"><a href="{{route('register')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i> register</a></li>
                    @else
                        <li class="sign-up"><a href="{{route('home')}}" class="btn btn-primary"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    @endguest
                </ul>
            </div>
            <!-- User Sign In/Sign Up Ends -->
        </div>
    </div>
    <!-- Navigation Menu Starts -->
    <nav class="site-navigation navigation" id="site-navigation">
        <div class="container">
            <div class="site-nav-inner">
                <!-- Logo For ONLY Mobile display Starts -->
                <a class="logo-mobile" href="{{route('welcome')}}">
                    <img class="img-responsive" src="assets/bayya/images/logo.png" alt="">
                </a>
                <!-- Logo For ONLY Mobile display Ends -->
                <!-- Toggle Icon for Mobile Starts -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Toggle Icon for Mobile Ends -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <!-- Main Menu Starts -->
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('welcome')}}">Home</a></li>
                         <li><a href="{{route('buysell')}}">Buy and Sell</a></li>
                         <li><a href="{{route('exchange')}}">Exchange</a></li>
                         <li><a href="{{route('market')}}">Market Data</a></li>
                         
                        <!--<li><a href="{{route('about')}}">About Us</a></li>-->
                        <!--<li><a href="{{route('services')}}">Services</a></li>-->
                        <!--<li class="dropdown">-->
                        <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown">pages <i class="fa fa-angle-down"></i></a>-->
                        <!--    <ul class="dropdown-menu" role="menu">-->
                        <!--        <li><a href="{{route('approach')}}">Approach</a></li>-->
                               
                        <!--        <li><a href="{{route('careers')}}">Careers</a></li>-->
                        <!--        <li><a href="{{route('coin')}}">Coin</a></li>-->
                        <!--        <li><a href="{{route('events')}}">Event</a></li>-->
                                
                        <!--        <li><a href="{{route('history')}}">History</a></li>-->
                                
                        <!--        <li><a href="{{route('partners')}}">Partners</a></li>-->
                        <!--        <li><a href="{{route('portfolio')}}">Portfolio</a></li>-->
                        <!--        <li><a href="{{route('team')}}">Team</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <!--<li><a href="{{route('contact')}}">Contact</a></li>-->
                    </ul>
                    <!-- Main Menu Ends -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation Menu Ends -->
</header>
<!-- Header Ends -->
