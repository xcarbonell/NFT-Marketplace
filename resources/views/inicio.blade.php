@extends('layouts.app')
@section('content')
    <div id="herosection">
        <div class="heropart">
            <img src="{{ asset('img/astronauta.png') }}"></img>
        </div>
        <div class="heropart">
            <h1>Bienvenidos al Nuevo Mundo</h1>
            <button>Ir al Mercado</button>
        </div>
    </div>
    <div class="inicio_vendedores">
        <div class="inicio_vendedor">
            <div class="todos_los_vendedores">
                <div class="titulos">
                    <div class="titulo_del_div">
                        <h1>Vendedores</h1>
                    </div>
                    <div class="ver_todos_los_vendedores">
                        <a href="">Ver todos los vendedores</a>
                    </div>
                </div>
                <div class="los_vendedores">

                </div>
            </div>
        </div>
    </div>
    <div id="divmostrar"></div>
    <div class="todas_las_categorias">
        <div class="titulos">
            <div class="titulo_del_div">
                <h1>Categorías</h1>
            </div>
            <div class="ver_todos_las_categorias">
                <a href="">Ver todos las categorías</a>
            </div>
        </div>
        <div class="las_categorias">
            <div class="categoria">
                <div class="texto_categoria">
                    <div class="nombre_de_la_categoria">
                        <h1>Arte</h1>
                    </div>
                </div>
            </div>
            <div class="categoria">
                <div class="texto_categoria">
                    <div class="nombre_de_la_categoria">
                        <h1>Arte</h1>
                    </div>
                </div>
            </div>
            <div class="categoria">
                <div class="texto_categoria">
                    <div class="nombre_de_la_categoria">
                        <h1>Arte</h1>
                    </div>
                </div>
            </div>
            <div class="categoria">
                <div class="texto_categoria">
                    <div class="nombre_de_la_categoria">
                        <h1>Arte</h1>
                    </div>
                </div>
            </div>
        </div>

        <script>
            //api/shops
            const vendedores = document.getElementsByClassName("vendedor");
            const mostrar = document.getElementsByClassName("los_vendedores")[0];
            const getListSellers = async () => {
                const response = await fetch('{{ env('APP_URL') }}' + ":8000/api/vendedores")
                    .then(res => {
                        return res.json();
                    })
                    .then(data => data)
                    .catch(err => err)
                console.log(response.data);
                response.data.map((vendedor) => {
                    mostrar.innerHTML += `
                    <div class="vendedor" id="${vendedor.name}">
                        <div class="icono_texto_vendor" id="${vendedor.name}">
                            <div class="imagen_del_vendedor">
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
            }

            function onClickUser() {
                for (let i = 0; i < vendedores.length - 1; i++) {
                    vendedores[i].addEventListener("click", (e) => {
                        window.location = '{{ env('APP_URL') }}' + `:8000/users/${e.target.id}`
                        console.log(e.target.id);
                    });
                }
            }
            window.onload = getListSellers();
            console.log("Prueba");
        </script>
    @endsection
