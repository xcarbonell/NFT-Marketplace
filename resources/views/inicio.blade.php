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
                        <a href="all_vendedores">Ver todos los vendedores</a>
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
                <a href="all_category">Ver todos las categorías</a>
            </div>
        </div>
        <div class="las_categorias">
            
        </div>

        <script>
            //api/shops
            const vendedores = document.getElementsByClassName("vendedor");
            const mostrar_los_vendedores = document.getElementsByClassName("los_vendedores")[0];
            const getListSellers = async () => {
                const response = await fetch('{{ env('APP_URL') }}' + ":8000/api/vendedores")
                    .then(res => {
                        return res.json();
                    })
                    .then(data => data)
                    .catch(err => err)
                console.log(response.data);
                response.data.map((vendedor) => {
<<<<<<< HEAD
                    mostrar_los_vendedores.innerHTML += `
                    <div class="vendedor" id="${vendedor.id}">
                        <div class="icono_texto_vendor">
=======
                    mostrar.innerHTML += `
                    <div class="vendedor" id="${vendedor.name}">
                        <div class="icono_texto_vendor" id="${vendedor.name}">
>>>>>>> 151cdac5863f84d5ae1201ddc9966d791e3d11aa
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
<<<<<<< HEAD
            const mostrar_las_categorias = document.getElementsByClassName("las_categorias")[0];
    async function allCategoria() {
        const response = await fetch('http://localhost:8000/api/categories/Animal')
            .then(res => {
                return res.json();
            })
            .then(data => data)
            .catch(err => err)
        console.log(response);
        response.data.map((categories) => {
            mostrar_las_categorias.innerHTML += `
            <div class="categoria">
                    <div class="texto_categoria">
                    <div class="nombre_de_la_categoria">
                    <h1>${categories.category}</h1>
                    </div>
                </div>
                </div>
                 `;
        });
    };
        allCategoria(); 
=======

            function onClickUser() {
                for (let i = 0; i < vendedores.length - 1; i++) {
                    vendedores[i].addEventListener("click", (e) => {
                        window.location = '{{ env('APP_URL') }}' + `:8000/users/${e.target.id}`
                        console.log(e.target.id);
                    });
                }
            }
>>>>>>> 151cdac5863f84d5ae1201ddc9966d791e3d11aa
            window.onload = getListSellers();
        </script>
    @endsection
