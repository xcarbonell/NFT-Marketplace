@extends('layouts.app')
@section('content')
    <div id="herosection">
        <div class="heropart">
            <img src="{{ asset('img/astronauta.png') }}" alt="Foto de portada de ENEFTI.SHOP" tabindex="0"/>
        </div>
        <div class="heropart">
            <h1 tabindex="0">Bienvenidos al Nuevo Mundo</h1>
            <button tabindex="0">Ir al Mercado</button>
        </div>
    </div>
    <div class="inicio_vendedores" tabindex="0" role="menu" aria-label="vendedores">
        <div class="inicio_vendedor">
            <div class="todos_los_vendedores">
                <div class="titulos">
                    <div class="titulo_del_div">
                        <h1 tabindex="0" >Vendedores</h1>
                    </div>
                    <div class="ver_todos_los_vendedores">
                        <a href="vendedores" tabindex="0">Ver todos los vendedores</a>
                    </div>
                </div>
                <div class="los_vendedores">

                </div>
            </div>
        </div>
    </div>
    <div id="divmostrar"></div>
    <div class="todas_las_categorias" tabindex="0">
        <div class="titulos">
            <div class="titulo_del_div">
                <h1 tabindex="0">Categorías</h1>
            </div>
            <div class="ver_todos_las_categorias">
                <a href="categories" tabindex="0">Ver todos las categorías</a>
            </div>
        </div>
        <div class="las_categorias" tabindex="0">

        </div>

        <script>
            const vendedores = document.getElementsByClassName("vendedor");
            const mostrarVendedores = document.getElementsByClassName("los_vendedores")[0];
            const categorias = document.getElementsByClassName("categoria");
            const mostrarCategorias = document.getElementsByClassName("las_categorias")[0];

            const getData = async () => {
                const response = await fetch('{{ env('APP_URL') }}' + "/api/landing")
                    .then(res => {
                        return res.json();
                    })
                    .then(data => data)
                    .catch(err => err)
                console.log(response);
                response.users.map((vendedor) => {
                    mostrarVendedores.innerHTML += `
                    <div class="vendedor" id="${vendedor.name}" aria-label="informacion vendedor">
                        <div class="icono_texto_vendor" id="${vendedor.name}">
                            <div class="imagen_del_vendedor">
                                <img id="${vendedor.name}" src="{{ asset('storage/${vendedor.photo}') }}" alt="Foto de perfil del usuario ${vendedor.name}" tabindex="0">
                            </div>
                            <div id="${vendedor.name}" class="nombre_del_vendedor">
                                <h1 id="${vendedor.name}" tabindex="0">${vendedor.name}</h1>
                            </div>
                        </div>
                    </div>
                 `;
                });

                response.categories.map((category) => {
                    mostrarCategorias.innerHTML += `
                        <div class="categoria" id="${category}" tabindex="0" aria-label="menu categorias">
                            <div class="texto_categoria" id="${category}">
                                <div class="nombre_de_la_categoria" id="${category}">
                                    <h1 id="${category}" tabindex="0">${category}</h1>
                                </div>
                            </div>
                        </div>
                    `;
                });

                onClickUser();
                onClickCategory();
            }

            function onClickUser() {
                for (let i = 0; i < vendedores.length - 1; i++) {
                    vendedores[i].addEventListener("click", (e) => {
                        window.location = '{{ env('APP_URL') }}' + `/users/${e.target.id}`
                    });
                }
            }

            function onClickCategory() {
                for (let i = 0; i < categorias.length - 1; i++) {
                    categorias[i].addEventListener("click", (e) => {
                        window.location = '{{ env('APP_URL') }}' + `/categories/${e.target.id}`
                    });
                }
            }

            window.onload = getData();
        </script>
    @endsection
