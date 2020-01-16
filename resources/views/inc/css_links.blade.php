{{-- language css --}}
<link rel="stylesheet" href="{{asset('css/language/ar.css')}}">
<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


<!-- theme style -->
<link rel="stylesheet" href="{{asset('css/master_style.css')}}">


<!-- Fab Admin skins -->
<link rel="stylesheet" href="{{asset('css/skins/_all-skins.css')}}">

<link rel="stylesheet" href="{{asset('css/someCss.css')}}">

@if ( Config::get('app.locale') == 'ar')
<link rel="stylesheet" href="{{asset('css/arabic-css.css')}}">
@endif
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('vendor_components/select2/dist/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" />
<!-- horizontal menu style -->
<link rel="stylesheet" href="{{asset('css/horizontal_menu_style.css')}}">

<!--alerts CSS -->
<link href="{{asset('vendor_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">

{{-- font awesome --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">

<link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

<link href="https://fonts.googleapis.com/css?family=Markazi+Text&display=swap" rel="stylesheet">

<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}" />

@yield('added_css')