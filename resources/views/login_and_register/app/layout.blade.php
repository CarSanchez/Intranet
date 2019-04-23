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

    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">

</head>
<body class="text-center">

    @yield('contentLogin')

    <!-- JavaScript -->

    <!-- JQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
