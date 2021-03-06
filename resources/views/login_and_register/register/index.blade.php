@extends('login_and_register.app.layout')

@section('title', 'Login Intranet')

@section('contentRegister')
    <form class="form-signin" method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <img class="mb-4" src="{{ asset('img/nav/log.png') }}" alt="Form Login">

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

        <h1 class="h3 mb-3 font-weight-normal">Registrate</h1>

        <label for="inputName">Nombre(s)*</label>
        <input type="text"
               class="form-control mb-3 {{ $errors->has('name') ? 'is-invalid' : '' }}"
               placeholder="Nombre(s) Eje. José"
               name="name"
               value="{{ old('name') }}"
               required
               autocomplete="of">

        <label for="inputLastName">Apellidos*</label>
        <input type="text"
               class="form-control mb-3 {{ $errors->has('lastName') ? 'is-invalid' : '' }}"
               placeholder="Apellidos Eje. Salas Ortiz"
               name="lastName"
               value="{{ old('lastName') }}"
               required
               autocomplete="of">

        <label for="inputDateBirth">Fecha de nacimiento*</label>
        <input type="date"
               class="form-control mb-3 {{ $errors->has('date') ? 'is-invalid' : '' }}"
               placeholder="Fecha de nacimiento"
               name="date"
               value="{{ old('date') }}"
               required
               autocomplete="of">

        <label for="inputDateBirth">Imagen de perfil(Opcional)</label>
        <div class="form-group">
            <input type="file"
                   class="form-control-file {{ $errors->has('route_img') ? 'is-invalid' : '' }}"
                   id="customFileLang"
                   lang="es"
                   name="route_img"
                   autocomplete="of"
                   required>
        </div>

        <label for="inputEmail">Correo*</label>
        <input type="email"
               class="form-control mb-3 {{ $errors->has('email') ? 'is-invalid' : '' }}"
               placeholder="Correo"
               name="email"
               value="{{ old('email') }}"
               autocomplete="of"
               required>

        <label for="inputExt">Extención*</label>
        <input type="text"
               class="form-control mb-3 {{ $errors->has('ext') ? 'is-invalid' : '' }}"
               placeholder="Extención"
               name="ext"
               value="{{ old('ext') }}"
               autocomplete="of"
               required>

        <label for="inputUser">Usuario*</label>
        <input type="text"
               class="form-control mb-3 {{ $errors->has('user') ? 'is-invalid' : '' }}"
               placeholder="Usuario Min: 2 caracteres"
               name="user"
               value="{{ old('user') }}"
               required
               autocomplete="of">

        {{--<label for="inputUser">Departamento*</label>
        <select class="form-control mb-3" id="department" name="department" required>
            <option value="">Selecciona departamento</option>
            @forelse($departments as $department)
                <option value="{{ $department->id }}" {{ (old("department") == $department->id ? "selected" : "") }}>{{ $department->name }}</option>
            @empty
                <option>No hay resultados</option>
            @endforelse
        </select>--}}

        <label for="inputPassword">Contraseña*</label>
        <input type="password"
               class="form-control mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
               name="password"
               placeholder="Contraseña Min: 6 caracteres"
               required>

        <label for="inputPassword">Confirmar contraseña*</label>
        <input type="password"
               class="form-control mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
               name="password_confirmation"
               placeholder="Confirmar contraseña"
               required>

        <div class="checkbox mb-3"></div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
        <br>
        <a class="btn btn-secondary btn-block" href="{{ route('index') }}">Inicio</a>

        <div class="mt-4">
            <h5>¿Ya tienes cuenta?</h5>
            <a class="btn btn-secondary" href="{{ route('auth.index') }}">Inicia sesión</a>
        </div>

        <p class="mt-5 mb-1 text-muted">&copy;Pintumex 2019</p>
    </form>
@endsection
