@extends('consumers.app.layout')

@section('title', 'Intranet Perfil')

@section('content')
    <div class="back" style="background: url('{{ asset('img/profile_page/fondo.jpg') }}') no-repeat;"></div>
    <div class="container">
        <div class="py-5 text-center">
                @if(auth()->user()->route_img == null)
                    <div class="ml-auto mr-auto" style="background: url('{{ asset(auth()->user()->route_img) }}'); background-size: cover" id="round_profile">
                        <a class="pen" href="">
                            <span class="fas fa-user fa-7x mr-2" aria-hidden="true" style="color: black;"></span>
                        </a>
                    </div>
                @else
                    <div class="ml-auto mr-auto" style="background: url('{{ asset(auth()->user()->route_img) }}'); background-size: cover" id="round_profile">
                        <a class="pen ml-auto mr-auto d-flex align-items-center" href=""></a>
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

                <nav class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-pass-tab" data-toggle="tab" href="#nav-pass" role="tab" aria-controls="nav-pass" aria-selected="false">Contraseña</a>
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Datos Personales</a>
                    <a class="nav-item nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-controls="nav-payment" aria-selected="false">Formas de pago</a>
                    <a class="nav-item nav-link" id="nav-shop-tab" data-toggle="tab" href="#nav-shop" role="tab" aria-controls="nav-shop" aria-selected="false">Compras</a>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <hr class="mb-4">

                    <!-- Cambio de contraseña -->
                    <div class="tab-pane fade show" id="nav-pass" role="tabpanel" aria-labelledby="nav-pass-tab">
                        <h5>Cambio de contraseña</h5>

                        <form method="POST" action="">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="d-flex justify-content-center row">
                                <div class="col-md-7 mb-3">
                                    <label for="pass-new">Contraseña anterior</label>
                                    <input type="password"
                                           class="form-control {{ $errors->has('pass_old') ? 'is-invalid' : '' }}"
                                           name="pass_old">
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="pass-new">Contraseña nueva</label>
                                    <input type="password"
                                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                           name="password">
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="pass-rep">Repita la contraseña</label>
                                    <input type="password"
                                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                           name="password_confirmation">
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <a href="{{ route('index') }}" class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3">Regresar</a>
                                <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" type="submit">Actualizar</button>
                            </div>
                        </form>
                    </div>

                    <!-- Datos personales -->
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form method="POST" action="" class="needs-validation" novalidate>
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ auth()->user()->name }}" required>
                                        <div class="invalid-feedback">
                                            El nombre es requerido.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lastName_ap">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="lastName_ap" name="last_name_ap" placeholder="" value="{{ auth()->user()->last_name_ap }}" required>
                                    <div class="invalid-feedback">
                                        El apellido paterno es requerido.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lastName_am">Apellido Materno</label>
                                    <input type="text" class="form-control" id="lastName_am" name="last_name_am" placeholder="" value="{{ auth()->user()->last_name_am }}" required>
                                    <div class="invalid-feedback">
                                        El apellido materno es requerido.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="" name="email" value="{{ auth()->user()->email }}" required>
                                    <div class="invalid-feedback">
                                        El Email es requerido.
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="phone">Teléfono</label>
                                    <input type="text" class="form-control" id="phone" placeholder="" name="tel" value="{{ auth()->user()->tel }}" required>
                                    <div class="invalid-feedback">
                                        El teléfono es requerido.
                                    </div>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <label for="address">Dirección</label>
                                    <input type="text" class="form-control" id="address" placeholder="" name="address" value="{{ auth()->user()->address }}" required>
                                    <!--<input type="hiden" class="form-control" id="route" placeholder="" name="route_img">-->
                                    <div class="invalid-feedback">
                                        Por favor ingrese su dirección.
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <a href="{{ route('index') }}" class="btn btn-dark btn-lg col-md-4 mr-3 ml-3 mb-3">Regresar</a>
                                <button class="btn btn-primary btn-lg col-md-4 mr-3 ml-3 mb-3" type="submit">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
