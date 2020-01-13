<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <title>{{config('app.name')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    @include('inc.css_links')
    <style>
        @font-face {
            font-family: Lato;
            src: url('{{ asset('fonts/Lato/lato-v11-latin-ext_latin-700.ttf') }}');
        }


        @font-face {
            font-family: Roboto-Condensed;
            src: url('{{ asset('fonts/roboto/RobotoCondensed-Regular.ttf') }}');
        }


        @font-face {
            font-family: Lato2;
            src: url('{{ asset('fonts/Lato/lato-v11-latin-ext_latin-regular.ttf') }}');
        }


        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', 'Lato2';

        }

        label {
            font-family: 'Poppins', 'Lato2';

        }

        .nav-tabs {
            font-family: 'Poppins', 'Lato2' !important;

        }


        .table th,
        .table thead th {
            font-family: Lato;
            font-size: 13px;
        }

        .btn {
            font-family: 'Poppins', 'Lato2';

            font-size: 12px;
        }

        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {}



        .mobile-nav {
            margin-top: 15px !important;
        }

        .mobile-nav>li {
            border-bottom: 1px solid !important;
        }
    </style>
</head>

<body class="hold-transition skin-blue layout-top-nav has-drawer">
    <div class="se-pre-con"
        style=" width: 100%;height: 100%;z-index: 99998;position: fixed; left: 0px; top: 0px;background:#efefef ">
        <div style="text-align: center; position: fixed; left: calc(50% - 70px); top: calc(50% - 140px);">
            <img src="{{URL::to('/')}}/images/logo/document_logo.png" style="height:140px;width:140px;z-index: 99999;">
            </br>
            <img src="{{URL::to('/')}}/images/loader/Ellipsis-2.1s-140px.gif" style="margin-top:-40px">
        </div>
    </div>

    <div class="wrapper">

        <header class="main-header">
            <div class="inside-header">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <b class="logo-mini" style="height: 100%;width: auto;">
                        <span class="light-logo"><img src="{{asset('images/logo/document_logo.png')}}" alt="logo"
                                style="height: 100%;width: auto;"></span>
                    </b>
                    <!-- logo for regular state and mobile devices -->
                    <!--
            <span class="logo-lg">
			  <img src="{{asset('images/logo/logo_lg_.png')}}" alt="logo" class="light-logo">
		  </span>-->
                </a>


                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle d-block d-lg-none" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <ul class="navbar-nav mr-auto mt-md-0">


                    </ul>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <img src="{{asset('images/svg/manager.svg')}}" class="user-image rounded-circle"
                                        style="border: #FD8946 solid 2px;" alt="User Image">


                                </a>
                                <ul class="dropdown-menu scale-up" style="width: 200px;">
                                    <!-- User image -->
                                    <li class="user-header" style=" height: 25px">
                                        <div class="row">
                                            <h5 style="font-size: 15px;width: 100%; text-align: center !important;">
                                                {{ ucfirst(Auth::user()->nom)   }} {{ ucfirst(Auth::user()->prenom )  }}
                                            </h5>
                                        </div>

                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row no-gutters">

                                            <div role="separator" class="divider col-12"></div>
                                            <div class="col-12 text-left">
                                                <a class="dropdown-item" href="/profile">
                                                    <i class="fa fa-user"></i> Mon profil
                                                </a>

                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out"></i> {{ __('Déconnexion') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>


        <!-- Main Navbar -->
        <div class="main-nav">
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    @include('inc.navbar')
                </div>
            </nav>
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content m-content" style="overflow-y: hidden;">
                @include('inc.messages')
                @yield('content')

            </section>
            <!-- /.content -->
        </div>


        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    @include('inc.scripts')
</body>

</html>