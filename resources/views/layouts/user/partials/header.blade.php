<!-- header header  -->
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <!-- Logo text -->
                <span><img style="height: 50px" src="{{asset('storage/'.setting('site_logo'))}}" alt="homepage" class="dark-logo" /></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link toggle-nav hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggle hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

            </ul>
            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">
                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                        <ul class="dropdown-user">
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('users.profile.index')}}"> Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('users.profile.password.change')}}"> Change Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- End header header -->
