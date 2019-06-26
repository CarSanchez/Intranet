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
        <a class="navbar-brand d-flex align-items-center" href="{{ route('sas') }}" id="log">
            <img src="{{ asset('img/nav/log-white.png') }}" width="250" height="70" class="d-inline-block align-top">
            @if(Route::is('sas'))
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

@if($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger text-center">
            <ul>
                <li>
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </li>
            </ul>
        </div>
    @endforeach
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
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif--}}
-->
@if(Route::is('sas'))
    @if(auth()->user()->role->role == 'sa' && auth()->user()->department->name == 'Sistemas')
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Panel de control</div>
                <nav class="list-group list-group-flush nav nav-pills nav-fill" id="nav-tab" role="tablist">
                    <a class="list-group-item list-group-item-action nav-item nav-link active" id="nav-index-tab" data-toggle="tab" href="#nav-index" role="tab" aria-controls="nav-index" aria-selected="true">Inicio</a>
                    <a class="list-group-item list-group-item-action nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Datos Personales</a>
                    <a class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                    <a class="list-group-item list-group-item-action bg-light">Overview</a>
                    <a class="list-group-item list-group-item-action bg-light">Events</a>
                    <a class="list-group-item list-group-item-action bg-light">Profile</a>
                    <a class="list-group-item list-group-item-action bg-light">Status</a>
                </nav>
            </div>
            <!-- /#sidebar-wrapper -->

            @yield('content-sas')
        </div>
        <!-- /#wrapper -->
    @elseif(auth()->user()->role->role == 'admin' && auth()->user()->department->name == 'Comunicación')
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Panel de control</div>
                <nav class="list-group list-group-flush nav nav-pills nav-fill" id="nav-tab" role="tablist">
                    <a class="list-group-item list-group-item-action nav-item nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="true">Contenido</a>
                    <a class="list-group-item list-group-item-action nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Principal</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                </nav>
            </div>
            <!-- /#sidebar-wrapper -->

            @yield('content')
        </div>
    @endif
@else
    @yield('content')
@endif


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
