@extends('layouts.app')
@section('content')
<div class="perfil">
    <div class="perfil_titulo">
        <h1>Perfil</h1>
    </div>
</div>
<div class="editar_perfil">
    <div class="correo">
    <input type="correo" id="correo" name="correo" placeholder="Correo electrónico">
    </div>
    <div class="user">
    <input type="user" id="user" name="user" placeholder="Usuario">
    </div>
    <div class="info">
        <h1>Introduce tu contraseña actual para guardar<br> los cambios:</h1>
    </div>
    <div class="curent_password">
    <input type="password" id="curentpassword" name="curentpassword" placeholder="Contraseña actual">
    </div>
    <div class="new_password">
    <input type="password" id="new_password" name="new_password" placeholder="Nueva contraseña">
    </div>
    <div class="confirm_password">
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar nueva contraseña">
    </div>
    <div class="btn_save_perfil">
        <button type="btn_save_perfil">Guardar perfil</button>
    </div>
</div>

@endsection