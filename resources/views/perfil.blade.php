@extends('layouts.app')
@section('content')
    <div class="perfil">
        <div class="perfil_titulo">Perfil
        </div>
    </div>

    <form id="form-perfil" method="POST" action="{{ route('user.update', Auth::user()->id) }}">
        @method('PUT')
        @csrf

        <div class="perfil_foto">
            <div class="_perfil_foto_imagen">
                <img src="" alt="Foto de perfil del usuario" id="imagen-user">
            </div>
            <input type="file" name="photo" id="photo">
        </div>

        <div class="editar_perfil">
            <div class="correo">
                <input type="email" id="email" name="email" placeholder="Email">
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
            @auth
                <div hidden>
                    <input hidden type="text" id="userid" name="userid" value="{{ Auth::user()->id }}">
                </div>
            @endauth

            <div class="btn_save_perfil">
                <button type="submit">Guardar perfil</button>
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
