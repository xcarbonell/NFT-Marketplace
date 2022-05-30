@extends('layouts.app')
@section('content')
    <div class="perfil">
        <div class="perfil_titulo">
            <h1>Perfil</h1>
        </div>
    </div>
    <div class="perfil_foto">
        <div class="_perfil_foto_imagen">
            <img src="" alt="" id="imagen-user">
        </div>
        <input type="file" name="Cambiar" id="">
    </div>
    <div class="editar_perfil">
        <div class="correo">
            <input type="email" id="email" name="correo" placeholder="asasa">
        </div>
        <div class="user">
            <input type="user" id="user" name="user" placeholder="Usuario">
        </div>
        <div class="new_password">
            <input type="password" id="new_password" name="new_password" placeholder="Nueva contraseña">
        </div>
        <div class="confirm_password">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar contraseña">
        </div>
        <div class="info">
            <h1>Introduce tu contraseña actual para guardar<br> los cambios:</h1>
        </div>
        <div class="curent_password">
            <input type="password" id="curentpassword" name="curentpassword" placeholder="Contraseña actual">
        </div>

        <div class="btn_save_perfil">
            <button type="btn_save_perfil">Guardar perfil</button>
        </div>
        @auth
            <div id="userid" hidden>
                {{ Auth::user()->id }}
            </div>
        @endauth
    </div>
    <script>
        const userid = document.getElementById("userid");
        const email = document.getElementById("email");
        const user = document.getElementById("user");
        const imagen = document.getElementById("imagen-user");
        async function showUser() {
            const response = await fetch(`{{ env('APP_URL') }}/api/users/${userid.textContent}/show`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log(response);
            email.value = response.data.email;
            user.value = response.data.name;
            imagen.src = '/storage/' + response.data.photo;

        };
        showUser();
    </script>
@endsection
