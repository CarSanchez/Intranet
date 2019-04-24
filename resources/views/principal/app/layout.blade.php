<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- titulo -->
    <title>@yield('title')</title>

    <!-- Isotipo -->
    <link rel="icon" href="{{ asset('img/isotipo.png') }}">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Slider Flickity-->
    <link rel="stylesheet" href="{{ asset('css/flickity.css') }}">

    <!-- LightBox -->
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

    @yield('nav-content')

    @yield('mod-sop-content')

    @yield('mod-dir-content')

    @yield('mod-log-content')

    @yield('mod-reg-content')

    @yield('car-content')

    @yield('abo-content')

    @yield('soc-content')

    @yield('foo-content')


    <!-- JavaScript -->

    <!-- Functions -->
    <script src="{{ asset('js/functions.js') }}"></script>

    <!-- JQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Flickity -->
    <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>

    <!-- LightBox -->
    <script src="{{ asset('js/lightbox.min.js') }}"></script>

</body>
</html>
