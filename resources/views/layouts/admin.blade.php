<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- your custom css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    @yield('css')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ route('home') }}" class="logo">
                    <span>
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width:70%;">
                    </span>
                    <i>
                        <img src="{{ asset('assets/images/logo_sm.png') }}" alt="" style="width:70%;">
                    </i>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-light waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        @if (auth()->user()->role == 'admin')
                            @include('inc.nav')
                        @else
                            @include('inc.user_nav')
                        @endif
                        
                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">@yield('title')</h4>

                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashbord</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer">
                {{ date('Y') }} © thelakhanigroup.com
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
    @yield('js')
</body>
</html>