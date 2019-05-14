@extends('consumers.app.layout')

@section('title', 'Intranet Update Img')

@section('content')
    <div class="back_up" style="background: gray;"></div>
    <div class="container pos_up mb-5" style="border-style: solid; border-color: gray;">
        <div class="py-5 text-center">
            @if(auth()->user()->route_img == null)
                <div class="ml-auto mr-auto form-group" style="background-size: cover">
                    <img style="width: 15rem; height: 15rem; border-radius: 10rem;" id="img-upload">
                </div>
            @else
                <div class="ml-auto mr-auto form-group">
                    <img style="width: 15rem; height: 15rem; border-radius: 10rem;" src="{{ asset(auth()->user()->route_img) }}" id="img-upload">
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
                            <label for="nombre">Selecciona imagen</label>
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
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            <input type="file" id="imgInp">
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mt-5">
                        <a class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3" href="{{ route('profile.index') }}" >Regresar</a>
                        <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
