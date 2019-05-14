@extends('consumers.app.layout')

@section('title', 'Intranet Update Img')

@section('content')
    <div class="back_up" style="background: gray;"></div>
    <div class="container pos_up mb-5" style="border-style: solid; border-color: gray;">
        <div class="py-5 text-center">
            @if(auth()->user()->route_img == null)
                <div class="ml-auto mr-auto mt-4" style="background-size: cover" id="round_profile">
                    <a>
                        <span class="fas fa-user fa-7x mr-2" aria-hidden="true" style="color: black;"></span>
                    </a>
                </div>
            @else
                <div class="ml-auto mr-auto">
                    <img src="{{ asset(auth()->user()->route_img) }}" id="round_profile_up">
                </div>
            @endif
            <h2>¡Hola {{ auth()->user()->name }}!</h2>
            <p class="lead">Te mostramos la imagen de tu perfil que quieres cambiar</p>
        </div>

        <div class="row d-flex justify-content-center">
            <!-- Imagen -->
            <div class="container">
                <form method="POST" action="#" class="form-signin" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

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

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="nombre">Nombre</label>
                            <!--<label class="custom-file-label" for="customFile">Choose file</label>-->
                            <!--<input type="file" class="custom-file-input" id="customFile">-->

                            <!--<input type="file"
                                   class="form-control-file"
                                   id="customFileLang"
                                   lang="es"
                                   name="route_img"
                                   value="{{ old('route_img') }}"
                                   autocomplete="of">-->
                            <div class="form-group">
                                <label>Upload Image</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <img id="img-upload">
                            </div>
                        </div>
                    </div>

                    @if(auth()->user()->role == 'sa')
                        <div class="row d-flex justify-content-center mt-5">
                            <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="re" style="display: inline" href="{{ route('profile.index') }}" >Regresar</a>
                            <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="ca" style="display: none; color: white;" onclick="ocultarActualizarsa()">Cancelar</a>
                            <a class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="ed" style="display: inline; color: white;" onclick="mostrarActualizarsa()">Editar</a>
                            <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="up" style="display: none">Actualizar</button>
                        </div>
                    @else
                        <div class="row d-flex justify-content-center mt-5">
                            <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="re" style="display: inline" href="{{ route('profile.index') }}" >Regresar</a>
                            <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" id="ca" style="display: none; color: white;" onclick="ocultarActualizar()">Cancelar</a>
                            <a class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="ed" style="display: inline; color: white;" onclick="mostrarActualizar()">Editar</a>
                            <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" id="up" style="display: none">Actualizar</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
