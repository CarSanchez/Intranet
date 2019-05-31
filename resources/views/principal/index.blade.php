@extends('principal.app.layout')

@section('title', 'Intranet')

@section('nav-content')
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
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acerca de
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#about">Nosotros</a>
                            <a class="dropdown-item" href="#social">Social</a>
                            <a class="dropdown-item" href="#footer">Contacto</a>
                            <!--<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
                    </li>
                    @auth
                        <li class="nav-item">
                            @if(auth()->user()->role == 'sa')
                                <a class="nav-link" href="{{ route('admin') }}">{{ auth()->user()->name }}</a>
                            @elseif(auth()->user()->role == 'admin')
                                <a class="nav-link" href="{{ route('admin') }}">{{ auth()->user()->name }}</a>
                            @elseif(auth()->user()->role == 'user')
                                <a class="nav-link" href="{{ route('admin') }}">{{ auth()->user()->name }}</a>
                            @else
                                <a class="nav-link" href="{{ route('admin') }}">{{ auth()->user()->name }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href='{{ route('auth.index') }}'>login /</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.index') }}">Registro</a>
                        </li>
                    @endauth
                </ul>
                <div class="d-flex flex-row justify-content-center">
                    <a href="#" class="mr-2"><img src="{{ asset('img/nav/c.png') }}" title="Soporte Tecnico" data-toggle="modal" data-target="#soporte"></a>
                    <a href="#"><img src="{{ asset('img/nav/agen.png') }}" title="Directorio Telefonico" data-toggle="modal" data-target="#directorio"></a>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('mod-sop-content')
    <!-- Modal Soporte -->
    <div class="modal fade bd-example-modal-xl" id="soporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle & myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Soporte Técnico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="http://intranet/soporte" frameborder="0" width="100%" height="400px">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('mod-dir-content')
    <!-- Modal Directorio telefonico -->
    <div class="modal fade bd-example-modal-xl" id="directorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle & myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Directorio Telefonico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <!--<embed src="{{ asset('documents/directorio.pdf') }}" frameborder="0" width="100%" height="400px">-->
                    <h1>¡PROXIMAMENTE!</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('mod-log-content')
    <!-- Modal Login -->
    <!--<div class="modal fade" id="login_and_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Iniciar sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>-->
@endsection

@section('mod-reg-content')
    <!-- Modal Register -->
    <!--<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>-->
@endsection

@section('car-content')
    <section id="inicio">
        <div class="carousel" data-flickity='{ "cellAlign": "center", "contain": true, "wrapAround": true, "autoPlay": 5000, "draggable": false, "pauseAutoPlayOnHover": false, "imagesLoaded": true }'>
            <img class="carousel-image" src="{{ asset('img/slides/e.jpg') }}" />
            <img class="carousel-image" src="{{ asset('img/slides/3.jpg') }}" />
            <img class="carousel-image" src="{{ asset('img/slides/5.jpg') }}" />
            <img class="carousel-image" src="{{ asset('img/slides/6.jpg') }}" />
        </div>
    </section>
@endsection

@section('abo-content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center about">
                    <h2>¿Quiénes somos?</h2>
                    <div class="container">
                        <p>En 1959 inicia la empresa "Pinturas Alfa Gama", en la cual se obtiene un enorme éxito por su cobertura en el país, lleva a la empresa a ser una de las fabricas más importante en la industria de las pinturas.
                            Al inicio de los años 80´s, traslado su residencia a la Ciudad de Puebla, en donde funda la empresa "Pinturas y lacas de Puebla" ubicada en la Av. 12 Pte. y 5 Norte.	En 1971, su tenacidad y gran visión de empresario lo lleva a fundar otro eslabón más de su cadena de éxitos "Pinturas Mexicanas de Puebla" Pintumex, ubicada en la 15 Pte. y 23 Sur, en poco tiempo el crecimiento le hace cambiar sus instalaciones al Parque Industrial 5 de mayo; lugar en donde actualmente continua su gran carrera de crecimiento
                            En septiembre de 1983, Ingresa al Club Rotario, logrando la amistad de la sociedad poblana, por su gran visión empresarial y por su particular gusto por la poesía.
                            En noviembre de 2004 fallece dejándonos un legado de conocimientos y éxito.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <img src="{{ asset('img/who_we_are/1.jpg') }}" alt="" width="350" height="400" style="border-radius: 2rem;">
                </div>
                <div class="col">
                    <img src="{{ asset('img/who_we_are/2.jpg ') }}" alt="" width="350" height="380" style="background: rgb(202, 202, 202) no-repeat bottom left; padding: 0px 0px 10px 10px; border-radius: 2rem;">
                </div>
                <div class="col">
                    <img src="{{ asset('img/who_we_are/3.jpg ') }}" alt="" width="350" height="380" style="background: rgb(202, 202, 202) no-repeat bottom left; padding: 0px 0px 10px 10px; border-radius: 2rem;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center portafolio">
                    <h2>¿De qué color sueñas?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 mt-5">
                    <h3>Misión</h3>
                    <p>"Proteger y embellecer el entorno cumpliendo sueños a través de recubrimientos que generan identidad, alegría y satisfacción."</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 mt-5">
                    <h3>Visión</h3>
                    <p>"Permanecer 50 años a partir de hoy creciendo en el mercado tecnológica e institucionalmente mejorando el medio ambiente generando valor económico y social."</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 mt-5">
                    <h3>Política de calidad</h3>
                    <p>“Recubrimientos de alta calidad con mejora continua y excelente servicio, alineados a la misión de la empresa.”</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 mt-5">
                    <h3>Valores</h3>
                    <div class="icon"></div>
                    <p>
                    <li>Consciencia</li>
                    <li> Confiabilidad</li>
                    <li>Integridad</li>
                    <li>Adaptabilidad </li>
                    <li>Creatividad</li>
                    <li>Enfoque y trabajo en equipo</li>
                    <li>Pasión en el servicio al cliente</li>
                    <li>Resiliencia</li>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('soc-content')
    <section id="social">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center social">
                    <h2>Social</h2>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 text-center social2 mb-5">
                    <p>Actividades Recreativas, Sociales y Culturales</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12 col-md-6 col-lg-4 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/e.jpg') }}" data-lightbox="example-set" data-title="Evolución Consciente.">
                        <img src="{{ asset('img/social/e.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/5.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/5.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/f1.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/f1.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/f2.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/f2.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/f3.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/f3.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/7.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/7.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/dia_pintu.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/dia_pintu.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/dia_pintu2.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/dia_pintu2.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/dia_pintu3.jpeg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/dia_pintu3.jpeg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 mb-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/dia_pintu4.jpg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/dia_pintu4.jpg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 mb-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/dia_mama.jpeg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/dia_mama.jpeg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5 mb-5 imagen">
                    <a class="example-image-link" href="{{ asset('img/social/dia_mama2.jpeg') }}" data-lightbox="example-set" data-title="Plan de Negocios">
                        <img src="{{ asset('img/social/dia_mama2.jpeg') }}" alt="Image" class="img-responsive">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('foo-content')
    <section id="footer">
        <div class="container con">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-gl-6 mt-5 contact">
                    <p class="pull-left">
                        <small class="block">&copy; 2019</small>
                        <br>
                        <small class="block">Preguntas o Sugerencias favor de enviar un correo a<a href="#" target="_blank"> asistemas@pintumex.com.mx</a> </small>
                        <br>
                        <small class="block">Derechos reservados<a href="#" target="_blank"> Pintumex </a></small>
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 col-gl-6 mt-5 text-right">
                    <p class="pull-right">
                        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.facebook.com/pintumexoficial"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fab fa-youtube fa-2x"></i></a>
                        <a href="https://www.twitter.com/pintumexoficial"><i class="fab fa-twitter fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
