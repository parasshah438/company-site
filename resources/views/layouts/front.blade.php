<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content>
    <meta name="keywords" content>
    <title>Motex - Car Dealer And Automotive HTML5 Template</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo/favicon.png">
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/all-fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
</head>
<body>
    @include('front.include.header')

    @yield('content')

    @include('front.include.footer')

    <script src="{{asset('front_assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('front_assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('front_assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front_assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('front_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front_assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('front_assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('front_assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('front_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front_assets/js/counter-up.js')}}"></script>
    <script src="{{asset('front_assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('front_assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front_assets/js/wow.min.js')}}"></script>
    <script src="{{asset('front_assets/js/main.js')}}"></script>
</body>
</html>