@extends('login_and_register.app.layout')

@section('title', 'Login Intranet')

@section('contentRegister')
    <form class="form-signin" method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}

        <img class="mb-4" src="{{ asset('img/nav/log.png') }}" alt="Form Login">
        <h1 class="h3 mb-3 font-weight-normal">Registrate</h1>

        <label for="inputName">Nombre(s)*</label>
        <input type="text"
               class="form-control mb-3"
               placeholder="Nombre(s)"
               name="name"
               required
               autofocus>

        <label for="inputLastName">Apellidos*</label>
        <input type="text"
               class="form-control mb-3"
               placeholder="Apellidos"
               name="lastName"
               required
               autofocus>

        <label for="inputDateBirth">Fecha de nacimiento*</label>
        <input type="date"
               class="form-control mb-3"
               placeholder="Fecha de nacimiento"
               name="date"
               required
               autofocus>

        <label for="inputDateBirth">Imagen de perfil(Opcional)</label>
        <div class="custom-file mb-3">
            <label class="custom-file-label" for="customFileLang">Imagen</label>
            <input type="file"
                   class="custom-file-input"
                   id="customFileLang"
                   lang="es"
                   name="route_img">
        </div>

        <label for="inputEmail">Correo(Opcional)</label>
        <input type="email"
               class="form-control mb-3"
               placeholder="Correo"
               name="email"
               autofocus>

        <label for="inputUser">Usuario*</label>
        <input type="text"
               class="form-control mb-3"
               placeholder="Usuario"
               name="user"
               required
               autofocus>

        <label for="inputPassword">Contraseña*</label>
        <input type="password"
               class="form-control mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
               name="password"
               placeholder="Contraseña"
               required>

        <label for="inputPassword">Confirmar contraseña*</label>
        <input type="password"
               class="form-control mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
               name="password_confirmation"
               placeholder="Contraseña"
               required>

        <div class="checkbox mb-3"></div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>

        <div class="mt-4">
            <h5>¿Ya tienes cuenta?</h5>
            <a class="btn btn-secondary" href="" data-dismiss="modal" data-toggle="modal" data-target="#login">Inicia sesión</a>
        </div>

        <p class="mt-5 mb-1 text-muted">&copy;Pintumex 2019</p>
    </form>
@endsection
