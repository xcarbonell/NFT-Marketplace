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
                    <input type="email" id="email" name="email" placeholder="Correo electrónico">
                </div>
                <div class="usuario">
                    <input type="user" id="user" name="name" placeholder="Usuario">
                </div>
                <div class="password">
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                </div>
                <div class="password">
                    <input type="password" id="password" name="password_confirmation" placeholder="Contraseña">
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
            <button type="submit"></button>
        </form>
    </div>
@endsection
