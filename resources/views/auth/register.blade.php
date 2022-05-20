@extends('layouts.app')
@section('content')
    <div class="formlogin">
        <div class="rowlogin">
            <div class="acceso">
                <button id="btnacceso" type="btnacceso">Acceso</button>
            </div>
            <div class="acceso">
                <button id="btnregistrarse" type="btnregistrarse">Registrarse</button>
            </div>
        </div>
        <form class="rowform" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="inputs">
                <div class="email">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                </div>
                <div class="usuario">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                </div>
                <div class="password">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Contraseña">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="password">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirmar contraseña">
                </div>
            </div>
            <div class="forgotenviar">
                <div class="forgotten">
                    <a href="">Has olvidado tu contraseña?</a>
                </div>
                <div class="btnenviar">
                    <button type="btnenviar">Enviar</button>
                </div>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
@endsection
