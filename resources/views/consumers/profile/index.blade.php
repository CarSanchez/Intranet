@extends('consumers.app.layout')

@section('title', 'Intranet Perfil')

@section('content')
    <div class="back" style="background: url('{{ asset('img/profile_page/fondo.jpg') }}');"></div>
    <div class="container pos">
        <div class="py-5 text-center">
                @if(auth()->user()->route_img == null)
                    <div class="ml-auto mr-auto mt-4" style="background-size: cover" id="round_profile">
                        <a class="pen" href="{{ route('changeImage.show') }}">
                            <span class="fas fa-user fa-7x mr-2" aria-hidden="true" style="color: black;"></span>
                        </a>
                    </div>
                @else
                    <div class="ml-auto mr-auto" style="background: url('{{ asset(auth()->user()->route_img) }}'); background-size: cover" id="round_profile">
                        <a class="pen" href="{{ route('changeImage.show') }}"></a>
                    </div>
                @endif
            <h2>¡Hola {{ auth()->user()->name }}!</h2>
            <p class="lead">Te mostramos tu perfil</p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
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

                @if (session()->has('flash_info'))
                    <div class="alert alert-info text-center">
                        {{ session('flash_info') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <nav class="nav nav-pills nav-fill mt-5" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Datos</a>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <hr class="mb-4">

                    <!-- Datos personales -->
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form method="POST" action="{{ route('dates.update') }}" class="needs-validation form-signin">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="container">
                                <div class="row">
                                    <h1>Personales</h1>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-4 mt-2 col-md-4 col-lg-4 ">
                                        <label for="nombre">Nombre(s)</label>
                                        <input type="text"
                                               class="form-control"
                                               id="name"
                                               name="name"
                                               placeholder="Nombre"
                                               value="{{ auth()->user()->name }}"
                                               required
                                               autocomplete="of"
                                               disabled>
                                    </div>

                                    <div class="col-sm-4 mt-2 col-md-4 col-lg-4">
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
                                    </div>

                                    <div class="col-sm-4 mt-2 col-md-4 col-lg-4">
                                        <label for="date">Fecha de nacimiento</label>
                                        <input type="date"
                                               class="form-control"
                                               id="date"
                                               name="date"
                                               placeholder="Fecha de nacimiento"
                                               value="{{ (auth()->user()->date)->format('Y-m-d') }}"
                                               required
                                               autocomplete="of"
                                               disabled>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <h1>Laborales</h1>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-4 mt-2 col-md-4 col-lg-4">
                                        <label for="email">Email</label>
                                        <input type="email"
                                               class="form-control"
                                               id="email"
                                               placeholder="Correo"
                                               name="email"
                                               value="{{ auth()->user()->email }}"
                                               required
                                               disabled>
                                    </div>

                                    <div class="col-sm-4 mt-2 col-md-4 col-lg-4">
                                        <label for="ext">Extención</label>
                                        <input type="text"
                                               class="form-control"
                                               id="ext"
                                               placeholder="Extención"
                                               name="ext"
                                               value="{{ auth()->user()->ext }}"
                                               required
                                               disabled>
                                    </div>

                                    <div class="col-sm-4 mt-2 col-md-4 col-lg-4">
                                        <label for="user">Usuario</label>
                                        <input type="text"
                                               class="form-control"
                                               id="user"
                                               placeholder="Usuario"
                                               name="user"
                                               value="{{ auth()->user()->user }}"
                                               required
                                               disabled>
                                    </div>

                                    <div class="col-sm-4 mt-2 col-md-4 col-lg-4">
                                        <label for="Department">Departamento: <b>{{ auth()->user()->department->name }}</b></label>
                                        <select class="form-control" id="department" name="department" required disabled>
                                            @forelse($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @empty
                                                <option>No hay resultados</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    @if(auth()->user()->role->role == 'sa')
                                        <div class="col-sm-4 mt-2 col-md-4 col-lg-4">
                                            <label for="Department">Nivel de perfil: <b>{{ auth()->user()->role->role }}</b></label>
                                            <select class="form-control" id="role" name="role" required disabled>
                                                @forelse($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                @empty
                                                    <option>No hay resultados</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-row mt-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label for="exampleFormControlTextarea1">Notas del usuario</label>
                                        <textarea class="form-control" id="formControlTextarea" rows="3" name="notes" disabled value="{{ auth()->user()->notes }}"></textarea>
                                    </div>
                                </div>


                            @if(auth()->user()->role->role == 'sa')
                                <div class="form-row d-flex justify-content-center mt-5">
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="re" style="display: inline" href="{{ route('admin') }}" >Regresar</a>
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="ca" style="display: none; color: white;" onclick="ocultarActualizarsa()">Cancelar</a>
                                    <a class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="ed" style="display: inline; color: white;" onclick="mostrarActualizarsa()">Editar</a>
                                    <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="up" style="display: none">Actualizar</button>
                                </div>
                            @else
                                <div class="form-row d-flex justify-content-center mt-5">
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="re" style="display: inline" href="{{ route('admin') }}" >Regresar</a>
                                    <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="ca" style="display: none; color: white;" onclick="ocultarActualizar()">Cancelar</a>
                                    <a class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="ed" style="display: inline; color: white;" onclick="mostrarActualizar()">Editar</a>
                                    <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="up" style="display: none">Actualizar</button>
                                </div>
                            @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
