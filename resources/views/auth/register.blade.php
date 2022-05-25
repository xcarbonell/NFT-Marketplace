@extends('layouts.app')
@section('content')
<div class="formlogin">
    <div class="rowlogin">
        <div class="acceso_register">
            <a href="{{ route('login') }}">
                <h1>Acceso</h1>
            </a>
        </div>
        <div class="registrarse_register">
            <h1>Registrarse</h1>
        </div>
    </div>
    <form class="rowform" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="inputs">
            <div class="email">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
            </div>
            <div class="input_user">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            </div>
            <div class="user_password">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="password">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
            </div>
        </div>
        <div class="forgotenviar">
            <div class="forgotten">
                <a href="">Ya tienes tu cuenta? Accede!</a>
            </div>
            <div class="btnenviar">
                <button type="btnenviar">Enviar</button>
            </div>
        </div>
        <button type="submit">Enviar</button>
    </form>
</div>
</div>
@endsection