@extends('layouts.app')
@section('content')
    <div class="formlogin">
        @if (session('error'))
            <div>
                {{ session('error') }}
            </div>
        @endif
        <div class="rowlogin">
            <div class="acceso">
                <h1>Acceso</h1>
            </div>
            <div class="registrarse">
                <a href="{{ route('register') }}">
                    <h1>Registrarse</h1>
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
                        <button type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
