<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title',config('app.name'))</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="{{ asset('adminassets/./vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/./vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('adminassets/./vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/./css/style.css') }}" rel="stylesheet">
    @yield('style')



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{asset('adminassets/./images/logo.png')}}" alt="">
                <img class="logo-compact" src="{{asset('adminassets/./images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('adminassets/./images/logo-text.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-web"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach

                                </div>
                            </li>

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        @foreach (auth()->user()->notifications as $notification)
                                        <li class="media dropdown-item">
                                                    <span class="success"><i class="ti-user"></i></span>
                                                    <div class="media-body">
                                                <a href="#">
                                                    <p>{{ $notification->data['title'] }}</p>
                                                    <small>{{ $notification->data['message'] }}</small>
                                                </a>
                                            </div>
                                            <span class="notify-time">{{$notification->created_at->diffForHumans()}}</span>

                                        </li>
                                        @endforeach

                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item" >
                                    @csrf
                                    <button class="ml-2 dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


       <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
    @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> {{ date('Y') }}</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('adminassets/./vendor/global/global.min.js')}}"></script>
    <script src="{{asset('adminassets/./js/quixnav-init.js')}}"></script>
    <script src="{{asset('adminassets/./js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{asset('adminassets/./vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('adminassets/./vendor/morris/morris.min.js')}}"></script>


    <script src="{{asset('adminassets/./vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('adminassets/./vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{asset('adminassets/./vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('adminassets/./vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('adminassets/./vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('adminassets/./vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{asset('adminassets/./vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('adminassets/./vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('adminassets/./vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


    <script src="{{asset('adminassets/./js/dashboard/dashboard-1.js')}}"></script>

    @yield('scripts')

</body>

</html>
