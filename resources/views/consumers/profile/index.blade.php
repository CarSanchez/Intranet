@extends('consumers.app.layout')

@section('title', 'Intranet Perfil')

@section('content')
    <div class="back" style="background: url('{{ asset('img/profile_page/fondo.jpg') }}');"></div>
    <div class="container pos">
        <div class="py-5 text-center">
                @if(auth()->user()->route_img == null)
                    <div class="ml-auto mr-auto mt-4" style="background: url('{{ asset(auth()->user()->route_img) }}'); background-size: cover" id="round_profile">
                        <a class="pen" href="">
                            <span class="fas fa-user fa-7x mr-2" aria-hidden="true" style="color: black;"></span>
                        </a>
                    </div>
                @else
                    <div class="ml-auto mr-auto" style="background: url('{{ asset(auth()->user()->route_img) }}'); background-size: cover" id="round_profile">
                        <a class="pen" href=""></a>
                    </div>
                @endif
            <h2>¡Hola {{ auth()->user()->name }}!</h2>
            <p class="lead">Te mostramos tu perfil</p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                @if (session()->has('flash'))
                    <div class="alert alert-info text-center">
                        {{ session('flash') }}
                    </div>
                @endif

                <nav class="nav nav-pills nav-fill mt-5" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Datos Personales</a>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <hr class="mb-4">

                    <!-- Datos personales -->
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form method="POST" action="#" class="needs-validation form-signin" novalidate>
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                                        <label for="nombre">Nombre</label>
                                        <input type="text"
                                               class="form-control"
                                               id="name"
                                               name="name"
                                               placeholder="Nombre"
                                               value="{{ auth()->user()->name }}"
                                               required
                                               autocomplete="of"
                                               disabled>
                                        <div class="invalid-feedback">
                                            El nombre es requerido.
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label for="lastName">Apellidos</label>
                                        <input type="text"
                                               class="form-control"
                                               id="lastName"
                                               name="lastName"
                                               placeholder="Apellidos"
                                               value="{{ auth()->user()->lastName }}"
                                               required
                                               autocomplete="of"
                                               disabled>
                                        <div class="invalid-feedback">
                                            Los apellidos son requeridos.
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label for="date">Cumpleaños</label>
                                        <input type="date"
                                               class="form-control"
                                               id="date"
                                               name="date"
                                               placeholder="Fecha de nacimiento"
                                               value="{{ (auth()->user()->date)->format('Y-m-d') }}"
                                               required
                                               autocomplete="of"
                                               disabled>
                                        <div class="invalid-feedback">
                                            La fecha es requerida.
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label for="email">Email</label>
                                        <input type="email"
                                               class="form-control"
                                               id="email"
                                               placeholder="Correo"
                                               name="email"
                                               value="{{ auth()->user()->email }}"
                                               required
                                               disabled>
                                        <div class="invalid-feedback">
                                            El Email es requerido.
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label for="user">Usuario</label>
                                        <input type="text"
                                               class="form-control"
                                               id="user"
                                               placeholder="Usuario"
                                               name="user"
                                               value="{{ auth()->user()->user }}"
                                               required
                                               disabled>
                                        <div class="invalid-feedback">
                                            El Usuario es requerido.
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label for="role">Nivel de perfil</label>
                                        <input type="text"
                                               class="form-control"
                                               id="role"
                                               placeholder="Usuario"
                                               name="role"
                                               value="{{ auth()->user()->role }}"
                                               disabled>
                                        <div class="invalid-feedback">
                                            El Usuario es requerido.
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label for="exampleFormControlTextarea1">Notas del usuario</label>
                                        <textarea class="form-control" id="formControlTextarea" rows="3" name="notes" disabled value="{{ auth()->user()->notes }}"></textarea>
                                    </div>
                                </div>
                            </div>

                            @if(auth()->user()->role == 'sa')
                                <div class="row d-flex justify-content-center mt-5">
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="re" style="display: inline" href="{{ route('admin') }}" >Regresar</a>
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="ca" style="display: none; color: white;" onclick="ocultarActualizarsa()">Cancelar</a>
                                    <a class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="ed" style="display: inline; color: white;" onclick="mostrarActualizarsa()">Editar</a>
                                    <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="up" style="display: none">Actualizar</button>
                                </div>
                            @else
                                <div class="row d-flex justify-content-center mt-5">
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="re" style="display: inline" href="{{ route('admin') }}" >Regresar</a>
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="ca" style="display: none; color: white;" onclick="ocultarActualizar()">Cancelar</a>
                                    <a class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="ed" style="display: inline; color: white;" onclick="mostrarActualizar()">Editar</a>
                                    <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="up" style="display: none">Actualizar</button>
                                </div>
                            @endif

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
