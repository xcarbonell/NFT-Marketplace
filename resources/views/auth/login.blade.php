@extends('layouts.app')
@section('content')
    <div class="formlogin">
        <div class="rowlogin">
            <div class="acceso">
                <button id="btnacceso" type="btnacceso">Acceso</button>
            </div>
            <div class="acceso">
                <a href="{{ route('register') }}">
                    <button id="btnregistrarse" type="btnregistrarse">Registrarse</button>
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="rowform">
                <div class="inputs">
                    <div class="usuario">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    </div>
                    <div class="password">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Contraseña">
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
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
@endsection
