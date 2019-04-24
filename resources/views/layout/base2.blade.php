<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>AquaPool</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Mega  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ======= Google Fonts ======= -->


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
{{--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />--}}
<!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
    <!--Owl Carousel CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <!--magnific popup CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <!-- Animated CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
    <!-- Theme CSS-->
    <link rel="stylesheet" href="{{ asset('css/default.css')}}">
    <link rel="stylesheet" href="{{ asset('css/typography.css')}}">
    <link rel="stylesheet" href="{{ asset('css/gym.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('css/drop.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png')}}">


    @yield('style-section')

</head>

<body data-spy="scroll" data-target="#scroll-menu" data-offset="65">

@include('components.header')
@yield('main-section')
@include('components.footer')
<!-- ======= All js ======= -->
<!-- modernizr js -->
@yield('jquery')

<script src="{{ asset('js/bootstrap.min.js')}}"></script>

<script src="{{ asset('js/scrollreveal.min.js')}}"></script>

<script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>

<script src="{{ asset('js/owl.carousel.min.js')}}"></script>

<script src="{{ asset('js/countdown.js')}}"></script>

<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{ asset('js/isotope.pkgd.min.js')}}"></script>

<script src="{{ asset('js/isotope_custom.js')}}"></script>

<script src="{{ asset('js/masonry.pkgd.min.js')}}"></script>

<script src="{{ asset('js/modernizr.custom.26633.js')}}"></script>

<script src="{{ asset('js/jquery.gridrotator.js')}}"></script>

<script src="{{ asset('js/theme.js')}}"></script>


@yield('script-section')

</body>

</html>
