@extends('layouts.app')
@section('content')
    <div class="los_vendedores">

    </div>
    </div>
    <script>
        const vendedores = document.getElementsByClassName("vendedor");
        const mostrar = document.getElementsByClassName("los_vendedores")[0];
        async function allVendedores() {
            const response = await fetch('{{ env('APP_URL') }}/api/vendedores')
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log(response);
            response.data.map((vendedor) => {
                mostrar.innerHTML += `
                    <div class="vendedor" id="${vendedor.name}">
                        <div class="icono_texto_vendor" id="${vendedor.name}">
                            <div class="imagen_del_vendedor" id="${vendedor.name}">
                                <img id="${vendedor.name}" src="{{ asset('storage/${vendedor.photo}') }}"></img>
                            </div>
                            <div id="${vendedor.name}" class="nombre_del_vendedor">
                                <h1 id="${vendedor.name}">${vendedor.name}</h1>
                            </div>
                        </div>
                    </div>
                 `;
            });
            onClickUser();
        };

        function onClickUser() {
            for (let i = 0; i < vendedores.length - 1; i++) {
                vendedores[i].addEventListener("click", (e) => {
                    window.location = '{{ env('APP_URL') }}' + `/users/${e.target.id}`
                });
            }
        }

        allVendedores();
    </script>
@endsection
