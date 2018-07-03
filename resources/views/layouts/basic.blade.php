<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- End CSRF Token -->

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>Management System</title>

    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->

    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="{{asset('_vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/themify-icons/themify-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/perfect-scrollbar/perfect-scrollbar.min.css')}}" >
    <link rel="stylesheet" href="{{asset('_vendor/switchery/switchery.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/pace/pace.css')}}" >
    <link rel="stylesheet" href="{{asset('_vendor/sweetalert/sweet-alert.css')}}">
    <!-- end: MAIN CSS -->

    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <link rel="stylesheet" href="{{asset('plugins.css')}}">
    <link rel="stylesheet" href="{{asset('themes/theme-1.css')}}" >
    <!-- end: CLIP-TWO CSS -->

    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    @yield('required_css')
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

</head>
<body>

@guest
    @include('inc.basic_notys');
    @yield('content')
@else

@endguest
  


<!-- start: MAIN JAVASCRIPTS -->
<script src="{{asset('_vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('_vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('_vendor/modernizr/modernizr.js')}}"></script>)
<script src="{{asset('_vendor/jquery-cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('_vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('_vendor/switchery/switchery.min.js')}}"></script>
<script src="{{asset('_vendor/pace/pace.min.js')}}"></script>
<script src="{{asset('_vendor/jquery.blockUI.js')}}"></script>
<script src="{{asset('_vendor/sweetalert/sweet-alert.min.js')}}"></script>
<!-- end: MAIN JAVASCRIPTS -->

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('required_js')
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

@yield('additional_js')

</body>
</html>