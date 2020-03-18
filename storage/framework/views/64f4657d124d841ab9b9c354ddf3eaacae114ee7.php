<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="user-role" content="<?php echo e(Auth::user()->role->first()->role_name); ?>">
    <meta name="local" content="<?php echo e(Config::get('app.locale')); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>">
    <title>E.B.O</title>
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

        .main-header .notifications-menu .dropdown-toggle i::after {
            <?php if(Auth()->user()->unreadNotifications->count()==0): ?> background-color: unset !important;
            <?php endif; ?>
        }



        /* Notifications */

        .notification {
            display: inline-block;
            position: relative;
            border-radius: 0.2em;
        }

        .notification::before,
        .notification::after {
            color: #0b2942;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .notification::before {
            display: block;
            content: "\f0f3";
            font-family: "FontAwesome";
            transform-origin: top center;
        }

        .notification::after {
            color: white;
            font-family: Arial;
            font-size: 15px;
            font-weight: 700;
            position: absolute;
            top: 2px;
            right: -15px;
            padding: 5px 8px;
            line-height: 100%;
            border-radius: 60px;
            background: #d11124;
            opacity: 0;
            content: attr(data-count);
            opacity: 0;
            transform: scale(0.5);
            transition: transform, opacity;
            transition-duration: 0.3s;
            transition-timing-function: ease-out;
        }

        .notification.notify::before {
            animation: ring 1.5s ease;
        }

        .notification.show-count::after {
            transform: scale(1);
            opacity: 1;
        }
    </style>
</head>

<body class="hold-transition skin-blue layout-top-nav has-drawer ">


    <input type="hidden" id="user_service_input_id" value="<?php echo e(Auth()->user()->service->id); ?>">
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
                            <!-- Notifications -->
                            <input type="hidden" name="notification_count_input" id="notification_count_input_id"
                                value="<?php echo e(Auth()->user()->unreadNotifications->count()); ?>">
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <div class="notification"></div>
                                </a>
                                <ul class="dropdown-menu scale-up">
                                    <li id="notification_list">
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu inner-content-div">
                                            <?php $__currentLoopData = Auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <div class="media-object">
                                                            <?php
                                                            $icon = '';
                                                            switch ($notification->data['element_type']) {
                                                            case 'Courrier Entrant':
                                                            $icon = "/arrow-right.svg";
                                                            break;
                                                            case 'Courrier Sortant':
                                                            $icon = "/arrow-left.svg";
                                                            break;
                                                            default :
                                                            $icon = "/arrow-right.svg";

                                                            }
                                                            ?>
                                                            <img src="<?php echo e(asset('images/svg').$icon); ?>"
                                                                style="width: 50px; height: 50px;">
                                                        </div>
                                                    </div>
                                                    <a
                                                        href="<?php echo e(route('courriers-entrants.edit', ['courriers_entrant' => $notification->data['element_id'] ])); ?>">
                                                        <?php
                                                        $action = '';
                                                        $element = '';
                                                        switch ($notification->data['action']) {
                                                        case 'ajouter':
                                                        $action = 'أضاف';
                                                        break;
                                                        case 'cloturer':
                                                        $action = "أغلق";
                                                        break;
                                                        default :
                                                        $action = $notification->data['action'];

                                                        }

                                                        switch ($notification->data['element_type']) {
                                                        case 'Courrier Entrant':
                                                        $element = 'ارسالية واردة';
                                                        break;

                                                        case 'Courrier Sortant':
                                                        $element = 'ارسالية صادرة';
                                                        break;

                                                        case 'Diffusion Interne':
                                                        $element = ' مراسلة داخلية';
                                                        break;

                                                        default:
                                                        $element = '';
                                                        break;
                                                        }
                                                        ?>

                                                        <?php echo e($notification->data['user']); ?> <?php echo e($action); ?>

                                                        <?php echo e($element); ?>

                                                        <div class="row">
                                                            <span
                                                                style="color: darkgrey;"><?php echo e($notification->created_at); ?></span>
                                                        </div>

                                                    </a>
                                                </div>

                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <?php if(Auth()->user()->unreadNotifications->count() > 0): ?>
                                    <li class="footer"><a href="<?php echo e(route('markNotificationsAsRead')); ?>"><i
                                                class="fa fa-check text-orange"></i><?php echo e(__('Marquer tous comme lus')); ?>

                                        </a></li>
                                    <?php endif; ?>

                                </ul>
                            </li>

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

                <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
                <script src="<?php echo e(asset('js/pushjs/push.js')); ?>"></script>

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




<script>
    function pushDesktopNotification()
    {        
        Push.create("E.B.O", {
            body: "لديكم اشعار جديد في نظام مكتب الضبط",
            icon: '/images/logo/document_logo.png',
            timeout: 100000000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
    }

    var current_user_service = $('#user_service_input_id').val();
    
   
    var el = document.querySelector('.notification');    
    var count = Number($('#notification_count_input_id').val()) ; 
    var count_pusher;
 
                
    var pusher = new Pusher('9656e3b943b191d7be22', {
        cluster: 'eu',
        forceTLS: true
    });

    var channel = pusher.subscribe('courrier-validated-channel');
    var data;
    var icon = '';
    var route = '';
    var action = '';
    var data_type = '';
    channel.bind('courrier-validated-event', function(data) {  
        console.log(data) 
        if(data.services_ids.includes(current_user_service))
        {
            
            pushDesktopNotification();
            //Push.create('Hello world');
            count_from_bind = Number($('#notification_count_input_id').val());
            count_from_bind++;
            $('#notification_count_input_id').val(count_from_bind)        
            el.setAttribute('data-count', count_from_bind);

            switch (data.element_type) {
                case 'Courrier Entrant':
                    icon = "/images/svg/arrow-right.svg";                   
                    route = "courriers-entrants/"+data.element_id+"/edit";    
                    data_type = "ارسالية واردة";                           
                    break;

                case 'Courrier Sortant':
                    icon = "/images/svg/arrow-left.svg";
                    route = "courriers-sortants/"+data.element_id+"/edit";
                    data_type = "ارسالية صادرة";
                    break;            
                default:
                    break;
            }

            switch (data.action) {
                case 'ajouter':
                    action = "أضاف";
                    break;

                case 'cloturer':
                    action = "أغلق";
                    break;
            
                default:
                    break;
            }

              $('#notification_list ul').prepend(`
                    <li>
                        <div class="media">
                            <div class="media-left">
                                <div class="media-object">
                                    <img src="`+icon+`" style="width: 50px; height: 50px;">
                                </div>
                            </div>
                            <a href="`+route+`">                                
                                `+data.user+`  `+action+`  `+data_type+` 
                                <div class="row">
                                    <span style="color: darkgrey;">Il y a une minute</span>  
                                </div>       
                            </a>                            
                        </div>
                                  
                    </li>
                `);
        }        
    });   
       
    el.setAttribute('data-count', count);
    el.classList.remove('notify');
    el.offsetWidth = el.offsetWidth;
    el.classList.add('notify');
    if(count > 0)
    {
        el.classList.add('show-count');
    } 
</script>


</html><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/layouts/master.blade.php ENDPATH**/ ?>