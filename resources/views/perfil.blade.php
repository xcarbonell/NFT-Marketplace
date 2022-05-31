@extends('layouts.app')
@section('content')
    <div class="perfil">
        <div class="perfil_titulo">Perfil
        </div>
    </div>

    <form id="form-perfil" method="POST" action="{{ route('user.update', Auth::user()->id) }}" aria-label="form-perfil">
        @method('PUT')
        @csrf

        <div class="perfil_foto">
            <div class="_perfil_foto_imagen">
                <img src="" alt="Foto de perfil del usuario" id="imagen-user" aria-label="imagen-user">
            </div>
            <input type="file" name="photo" id="photo">
        </div>

        <div class="editar_perfil">
            <div class="correo">
                <input type="email" id="email" name="email" placeholder="Email" tabindex="0">
            </div>
            <div class="user">
                <input type="user" id="user" name="user" placeholder="Usuario" tabindex="0">
            </div>
            <div class="new_password">
                <input type="password" id="new_password" name="new_password" placeholder="Nueva contraseña" tabindex="0">
            </div>
            <div class="confirm_password">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar contraseña" tabindex="0">
            </div>
            <div class="info">
                <h1>Introduce tu contraseña actual para guardar<br> los cambios:</h1>
            </div>
            <div class="curent_password">
                <input type="password" id="curentpassword" name="curentpassword" placeholder="Contraseña actual" tabindex="0">
            </div>
            @auth
                <div hidden>
                    <input hidden type="text" id="userid" name="userid" value="{{ Auth::user()->id }}">
                </div>
            @endauth

            <div class="btn_save_perfil">
                <button type="submit" tabindex="0">Guardar perfil</button>
            </div>
    </form>
    </div>
    <script>
        const userid = document.getElementById("userid");
        const email = document.getElementById("email");
        const user = document.getElementById("user");
        const imagen = document.getElementById("imagen-user");
        async function showUser() {
            const response = await fetch(`{{ env('APP_URL') }}/api/users/${userid.value}/show`)
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
