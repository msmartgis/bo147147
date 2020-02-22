<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="user-role" content="{{ Auth::user()->role->first()->role_name }}">
    <meta name="local" content="{{Config::get('app.locale')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <title>{{config('app.name')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    @include('inc.css_links')

    @if ( Config::get('app.locale') == 'en')
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
    </style>
    @else

    <style>
        @font-face {
            font-family: Almarai;
            src: url('{{ asset('fonts/Almarai/Almarai-Bold.ttf') }}');
        }


        @font-face {
            font-family: Cairo;
            src: url('{{ asset('fonts/Cairo/Cairo-Regular.ttf') }}');
        }

        @font-face {
            font-family: Cairo-Bold;
            src: url('{{ asset('fonts/Cairo/Cairo-Bold.ttf') }}');
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

    @endif
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
            @if (Auth()->user()->unreadNotifications->count() == 0)
                background-color: unset !important;
            @endif
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
            <div class="inside-header {{__('costum_css.inside-header')}}">
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
                            <!-- Notifications -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <div class="notification"></div>
                                </a>
                                <ul class="dropdown-menu scale-up"  >
                                <li class="header" style="text-align: center;font-weight: 600;">Vous avez {{Auth()->user()->unreadNotifications->count()}} notifications</li>
                                <li id="notification_list">
                                    <!-- inner menu: contains the actual data -->                                   
                                        <ul class="menu inner-content-div">                                           
                                            {{-- <li><a><i class="fa fa-arrow-right text-yellow"></i></a></li> --}}
                                            {{-- @foreach(Auth()->user()->unreadNotifications as $notification)
                                                <li>                                                                                              
                                                    <a
                                                        @if ($notification->data['type_courrier'] == "entrant")
                                                            href="{{ route('courriers-entrants.edit', ['courriers_entrant' => $notification->data['id'] ]) }}"
                                                        @endif

                                                        @if ($notification->data['type_courrier'] == "sortant")
                                                            href="{{ route('courriers-sortants.edit', ['courriers_sortant' => $notification->data['id'] ]) }}"
                                                        @endif                                            
                                                        target="_blank">
                                                    <i 
                                                    @if ($notification->data['type_courrier'] == "entrant" )
                                                    class="fa fa-arrow-left text-green" 
                                                    @else
                                                    class="fa fa-arrow-right text-yellow" 
                                                    @endif
                                                    ></i>                                                     
                                                        {{ Str::limit($notification->data['objet'] , 30)   }}                                                    
                                                        <div class="row">
                                                            <span style="color: darkgrey;">{{$notification->created_at}}</span>  
                                                        </div>
                                                        
                                                    </a>
                                                </li>                                        
                                            @endforeach --}}
                                        </ul>  
                                </li>
                                @if (Auth()->user()->unreadNotifications->count() > 0)
                            <li class="footer"><a href="{{ route('markNotificationsAsRead')}}"><i class="fa fa-check text-orange"></i> Marquer tous comme lus</a></li> 
                                @endif
                                
                                </ul>
                            </li>

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
                                                {{ ucfirst(Auth::user()->full_name)   }}
                                            </h5>
                                        </div>

                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row no-gutters">
                                            <div role="separator" class="divider col-12"></div>
                                            <div class="col-12 text-left">
                                                <a class="dropdown-item" href="/profile">
                                                    <i class="fa fa-user"></i> {{ __('Mon profil')}}
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
        <div class="main-nav {{__('costum_css.body')}}">
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    @include('inc.navbar')
                </div>
            </nav>
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper {{__('costum_css.body')}}">
            <!-- Main content -->
            <section class="content m-content">

                <!-- The core Firebase JS SDK is always required and must be listed first -->
                <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-app.js"></script>
                <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-firestore.js"></script>
                <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-auth.js"></script>
                <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-database.js"></script>
                <!-- TODO: Add SDKs for Firebase products that you want to use
                    https://firebase.google.com/docs/web/setup#available-libraries -->

                <script>
                // Your web app's Firebase configuration
                var firebaseConfig = {
                    apiKey: "AIzaSyD_vc9pYsaE5fPrAf_XCsk_RAALvTVaNSI",
                    authDomain: "bureau-ordre-firebase.firebaseapp.com",
                    databaseURL: "https://bureau-ordre-firebase.firebaseio.com",
                    projectId: "bureau-ordre-firebase",
                    storageBucket: "bureau-ordre-firebase.appspot.com",
                    messagingSenderId: "927104865964",
                    appId: "1:927104865964:web:a68c2b369fe75a26a87109"
                };
                // Initialize Firebase
                firebase.initializeApp(firebaseConfig);
                </script>


            
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

<script>
 
    //notification firebase
    var submitBtn = document.getElementById('firebase_btn'); 

    var firebaseNotificationRef = firebase.database().ref("/Notifications");
    var logged_user = $('meta[name=user-role]').attr("content");
    
  
   

    //console.log(firebaseElementsRef);
    firebaseNotificationRef.on('value', function(datasnapshot){       
        var notification_number = 0;
        var list_to_append = "";
        
        datasnapshot.forEach(function(childSnapshot) {            
            var childDataNotification = childSnapshot.val();
            var arrow_icon;
            if(logged_user === childDataNotification.user_to_notify)
            {                
                notification_number++;           

                switch(childDataNotification.type) {
                case "courrier_entrant":
                    arrow_icon = "fa fa-arrow-left text-green";
                    break;
                case "courrier_sortant":
                    arrow_icon = "fa fa-arrow-right text-yellow";
                    break;
                default:
                    arrow_icon = "fa fa-info text-yellow";
                }

                list_to_append += '<li>'+
                '<a>'+
                '<i  class="'+arrow_icon+'" ></i>'
                +childDataNotification.objet+
                '</a>'+
                '</li>';
            }       
            
        });

        $('#notification_list').html(list_to_append)

        
        var el = document.querySelector('.notification');
        var count = Number(el.getAttribute('data-count')) || 0;
        el.setAttribute('data-count', notification_number);
       
        el.classList.remove('notify');
        el.offsetWidth = el.offsetWidth;
        el.classList.add('notify');

        if(count === 0){
            el.classList.add('show-count');
        }

    });

  
    
    // function submitToFirebase()
    // {
    //   var firebaseRef = firebase.database().ref("/Notifications");
    //   firebaseRef.push({
    //       type : "CourrierAdded",
    //       user_id : 7,
    //       data : {
    //         type_courrier : "Sortant",
    //         id : "c831e2e0-4daa-11ea-b5fd-b909c4f7f2f6",
    //         objet : "objet sortant",
    //       },
    //   });
    // }

    // end notification firebase
</script>

</html>