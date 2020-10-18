<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Learning - @yield('title')</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('frontendtemplate/signup/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('frontendtemplate/signup/css/style.css')}}">
    <link href="{{ asset('frontendtemplate/signup/css/main.css')}}" rel="stylesheet" media="all">
</head>
<body>
    @yield('content')

    <!-- JS -->
    <script src="{{ asset('frontendtemplate/signup/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('frontendtemplate/signup/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>