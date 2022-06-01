@extends('layouts.app')
@section('content')
<div class="categoria" id="${category}" tabindex="0" aria-label="menu categorias"></div>
<script>
    const mostrar = document.getElementsByClassName("categoria")[0];
    const id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
    async function getCategory() {
        const response = await fetch('{{ env('APP_URL ') }}' + `/categories/${id}`)
            .then(res => {
                return res.json();
            })
            .then(data => data)
            .catch(err => err)
        console.log(response);
        mostrar.innerHTML += `
                <div class="texto_categoria" id="${id}">
                    <div class="nombre_de_la_categoria" id="${id}">
                         <h1 id="${id}" tabindex="0">${id}</h1>
                    </div>
                        </div>
            `;

    }
    window.onload = getCategory();
</script>

@endsection