@extends('layouts.app')
@section('content')
    <div class="perfil">
        <div class="perfil_titulo">
            <h1>Perfil</h1>
        </div>
    </div>
    <!-- cambiar auth... por $user->id -->
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div aria-label="formulario perfil" class="editar_perfil" tabindex="0" role="main" aria-label="formulario main">
            <div class="correo">
                <input type="correo" id="correo" name="correo" placeholder="Correo electrónico" tabindex="0">
            </div>
            <div class="user">
                <input type="user" id="user" name="user" placeholder="Usuario" tabindex="0">
            </div>
            <div class="info">
                <h1 tabindex="0">Introduce tu contraseña actual para guardar<br> los cambios:</h1>
            </div>
            <div class="curent_password">
                <input type="password" id="curentpassword" name="curentpassword" placeholder="Contraseña actual" tabindex="0" >
            </div>
            <div class="new_password">
                <input type="password" id="new_password" name="new_password" placeholder="Nueva contraseña" tabindex="0">
            </div>
            <div class="confirm_password">
                <input type="password" id="confirm_password" name="confirm_password"
                    placeholder="Confirmar nueva contraseña" tabindex="0">
            </div>
            <div>
                <input type="file" id="photo" name="photo" accept="image/*" tabindex="0">
            </div>
            <div class="btn_save_perfil">
                <button type="btn_save_perfil" tabindex="0" aria-label="boton de guardar perfil">Guardar perfil</button>
            </div>
        </div>
        <input type="submit" value="send" tabindex="0" aria-label="enviar">
    </form>
@endsection
