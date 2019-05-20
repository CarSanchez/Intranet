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

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleUpdateImage') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<nav class="navbar sticky-top navbar-dark bg-success navbar-expand-md">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin') }}" id="log">
            <img src="{{ asset('img/nav/log-white.png') }}" width="250" height="70" class="d-inline-block align-top">
            @if(Route::is('admin'))
                <button class="btn btn-success" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseNavbar" aria-controls="collapseNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapseNavbar">
            <div class="navbar-nav text-center ml-auto">
                <a class="nav-item nav-link" href="{{ route('profile.index') }}" id="round">
                    @if(auth()->user()->route_img == null)
                        <span class="fas fa-user fa-2x mr-2 nav-link" aria-hidden="true" style="color: white;"></span>
                    @else
                        <img src="{{ asset(auth()->user()->route_img) }}" alt="" width="50" height="50">
                    @endif
                </a>
                <div class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuUserLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUserLink">
                        <a class="dropdown-item" href="{{ route('index') }}"><i class="fas fa-home"></i> Inicio</a>
                        <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="far fa-user"></i> Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            {{ csrf_field() }}
                            <button class="dropdown-item" href=""><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('flash'))
    <div class="alert alert-danger text-center">
        {{ session('flash') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!--
{{--@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif

@if (session()->has('flash'))
    <div class="alert alert-danger text-center">
        {{ session('flash') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('flash_info'))
    <div class="alert alert-info text-center">
        {{ session('flash_info') }}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
@endif--}}
-->

@yield('content')


<!-- JavaScript -->

<!-- JQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Functions personalized -->
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/functionsUpdateImage.js') }}"></script>

</body>
</html>
