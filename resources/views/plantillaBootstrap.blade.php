<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('slot-name-page') | Sistema de Control</title>

    <!-- Bootstrap -->
    <!-- <link href="{{asset('/resources/bootstrapV4.5/css/bootstrap.css')}}" rel="stylesheet"> -->
    <link href="{{asset('/resources/bootstrapV4.5/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="{{asset('/resources/fontawesome/css/all.css')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="" rel="stylesheet">
</head>
@yield('css')
<body>
    @yield('slot-nav')
    @yield('slot-breadcrumb')
    @yield('slot-body')
    @yield('slot-js')
    <script src="{{asset('/resources/bootstrapV4.5/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('/resources/bootstrapV4.5/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>