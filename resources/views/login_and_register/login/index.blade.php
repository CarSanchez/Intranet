@extends('login_and_register.app.layout')

@section('title', 'login_and_register')

@section('contentLogin')
    <form class="form-signin" method="POST" action="{{ route('login.login') }}">
        {{ csrf_field() }}

        <img class="mb-4" src="{{ asset('img/nav/log.png') }}" alt="Form Login">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        @if (session()->has('flash'))
            <div class="alert alert-danger text-center">
                {{ session('flash') }}
            </div>
        @endif

        <h1 class="h3 mb-3 font-weight-normal">Inicia sesión</h1>

        <label for="inputUser" class="sr-only">Usuario</label>
        <input type="text"
               class="form-control mb-2 {{ $errors->has('user') ? ' is-invalid' : '' }}"
               placeholder="Usuario"
               value="{{ old('user') }}"
               name="user"
               required
               autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password"
               id="inputPassword"
               class="form-control"
               placeholder="Contraseña"
               name="password"
               required>

        <div class="checkbox mb-3"></div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
        <br>
        <a class="btn btn-secondary btn-block" href="{{ route('index') }}">Regresar</a>

        <div class="mt-4">
            <h5>¿Eres nuevo?</h5>
            <a class="btn btn-secondary" href="">Registrate ahora!</a>
        </div>

        <p class="mt-5 mb-1 text-muted">&copy;Pintumex 2019</p>
    </form>
@endsection