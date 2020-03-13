<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="local" content="<?php echo e(Config::get('app.locale')); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>">
    <title><?php echo e(config('app.name')); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <?php echo $__env->make('inc.css_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if( Config::get('app.locale') == 'en'): ?>
    <style>
        @font-face {
            font-family: Lato;
            src: url('<?php echo e(asset('fonts/Lato/lato-v11-latin-ext_latin-700.ttf')); ?>');
        }


        @font-face {
            font-family: Roboto-Condensed;
            src: url('<?php echo e(asset('fonts/roboto/RobotoCondensed-Regular.ttf')); ?>');
        }


        @font-face {
            font-family: Lato2;
            src: url('<?php echo e(asset('fonts/Lato/lato-v11-latin-ext_latin-regular.ttf')); ?>');
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
    </style>
    <?php else: ?>

    <style>
        @font-face {
            font-family: Almarai;
            src: url('<?php echo e(asset('fonts/Almarai/Almarai-Bold.ttf')); ?>');
        }


        @font-face {
            font-family: Cairo;
            src: url('<?php echo e(asset('fonts/Cairo/Cairo-Regular.ttf')); ?>');
        }

        @font-face {
            font-family: Cairo-Bold;
            src: url('<?php echo e(asset('fonts/Cairo/Cairo-Bold.ttf')); ?>');
        }


        @font-face {
            font-family: Lato2;
            src: url('<?php echo e(asset('fonts/Lato/lato-v11-latin-ext_latin-regular.ttf')); ?>');
        }


        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cairo', 'serif';

        }

        label {
            font-family: 'Cairo', 'serif';

        }

        .nav-tabs {
            font-family: 'Almarai', 'serif' !important;

        }


        .table th,
        .table thead th {
            font-family: 'Cairo-Bold' !important;
            font-size: 13px;
        }

        .btn {
            font-family: 'Cairo', 'Almarai';

            font-size: 12px;
        }
    </style>

    <?php endif; ?>
    <style>
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

<body class="hold-transition skin-blue layout-top-nav has-drawer ">
    <div class="se-pre-con"
        style=" width: 100%;height: 100%;z-index: 99998;position: fixed; left: 0px; top: 0px;background:#efefef ">
        <div style="text-align: center; position: fixed; left: calc(50% - 70px); top: calc(50% - 140px);">
            <img src="<?php echo e(URL::to('/')); ?>/images/logo/document_logo.png" style="height:140px;width:140px;z-index: 99999;">
            </br>
            <img src="<?php echo e(URL::to('/')); ?>/images/loader/Ellipsis-2.1s-140px.gif" style="margin-top:-40px">
        </div>
    </div>

    <div class="wrapper">
        <header class="main-header">
            <div class="inside-header <?php echo e(__('costum_css.inside-header')); ?>">
                <!-- Logo -->
                <a href="<?php echo e(route('home')); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <b class="logo-mini" style="height: 100%;width: auto;">
                        <span class="light-logo"><img src="<?php echo e(asset('images/logo/document_logo.png')); ?>" alt="logo"
                                style="height: 100%;width: auto;"></span>
                    </b>
                    <!-- logo for regular state and mobile devices -->
                    <!--
            <span class="logo-lg">
			  <img src="<?php echo e(asset('images/logo/logo_lg_.png')); ?>" alt="logo" class="light-logo">
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

                                    <img src="<?php echo e(asset('images/svg/manager.svg')); ?>" class="user-image rounded-circle"
                                        style="border: #FD8946 solid 2px;" alt="User Image">


                                </a>
                                <ul class="dropdown-menu scale-up" style="width: 200px;">
                                    <!-- User image -->
                                    <li class="user-header" style=" height: 25px">
                                        <div class="row">
                                            <h5 style="font-size: 15px;width: 100%; text-align: center !important;">
                                                <?php echo e(ucfirst(Auth::user()->full_name)); ?>

                                            </h5>
                                        </div>

                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row no-gutters">

                                            <div role="separator" class="divider col-12"></div>
                                            <div class="col-12 text-left">
                                                <a class="dropdown-item" href="/profile">
                                                    <i class="fa fa-user"></i> <?php echo e(__('Mon profil')); ?>

                                                </a>

                                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out"></i> <?php echo e(__('Déconnexion')); ?>

                                                </a>

                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                    style="display: none;">
                                                    <?php echo csrf_field(); ?>
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
        <div class="main-nav <?php echo e(__('costum_css.body')); ?>">
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </nav>
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper <?php echo e(__('costum_css.body')); ?>">
            <!-- Main content -->
            <section class="content m-content">
                <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>

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
    <?php echo $__env->make('inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/layouts/master.blade.php ENDPATH**/ ?>