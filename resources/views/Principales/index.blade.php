<!doctype html>
<html lang=lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- titulo -->
    <title>Pintranet</title>

    <!-- Isotipo -->
    <link rel="icon" href="{{ asset('img/isotipo.png') }}">

    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Modal -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Slider Flickity-->
    <link rel="stylesheet" href="{{ asset('css/flickity.css') }}">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar sticky-top navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('img/nav/log.png') }}" alt="" width="206" height="63">
            </a>
            <button class="navbar-toggler navbar-dark bg-dark" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Contacto</a>
                            <!--<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">login</a>
                        </li>
                    @endauth
                </ul>
                <div class="d-flex flex-row justify-content-center">
                    <a class="mr-2" href=""><img src="{{ asset('img/nav/c.png') }}" title="Soporte Tecnico" data-toggle="modal" data-target="#soporte"></a>
                    <a href=""><img src="{{ asset('img/nav/agen.png') }}" title="Directorio Telefonico" data-toggle="modal" data-target="#Directorio"></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div id="soporte" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Soporte Técnico</h4>
                </div>
                <div class="modal-body">
                    <embed src="../os/index_m.php" frameborder="0" width="100%" height="400px">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="inicio">
        <div class="carousel" data-flickity='{ "cellAlign": "center", "contain": true, "wrapAround": true, "autoPlay": 5000, "draggable": false, "pauseAutoPlayOnHover": false }'>
            <img class="carousel-image" src="{{ asset('img/slides/e.jpg') }}" />
            <img class="carousel-image" src="{{ asset('img/slides/3.jpg') }}" />
            <img class="carousel-image" src="{{ asset('img/slides/5.jpg') }}" />
            <img class="carousel-image" src="{{ asset('img/slides/6.jpg') }}" />
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center about">
                    <h2>¿Quienes somos?</h2>
                    <p>En 1959 inicia la empresa "Pinturas Alfa Gama", en la cual se obtiene un enorme éxito por su cobertura en el país, lleva a la empresa a ser una de las fabricas más importante en la industria de las pinturas.
                        Al inicio de los años 80´s, traslado su residencia a la Ciudad de Puebla, en donde funda la empresa "Pinturas y lacas de Puebla" ubicada en la Av. 12 Pte. y 5 Norte.	En 1971, su tenacidad y gran visión de empresario lo lleva a fundar otro eslabón mas de su cadena de éxitos "Pinturas Mexicanas de Puebla" Pintumex, ubicada en la 15 Pte. y 23 Sur, en poco tiempo el crecimiento le hace cambiar sus instalaciones al Parque Industrial 5 de mayo; lugar en donde actualmente continua su gran carrera de crecimiento
                        En septiembre de 1983, Ingresa al Club Rotario, logrando la amistad de la sociedad poblana, por su gran visión empresarial y por su particular gusto por la poesía.
                        En noviembre de 2004 fallece dejándonos un legado de conocimientos y éxito.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- JavaScript -->

    <!-- JQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Flickity -->
    <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>

</body>
</html>
