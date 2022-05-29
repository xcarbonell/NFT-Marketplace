@extends('layouts.app')
<<<<<<< HEAD:resources/views/all_category.blade.php
@section('content'
)
<div class="las_categorias">
                
</div>
<script>
    const mostrar = document.getElementsByClassName("las_categorias")[0];
    async function allCategoria() {
        const response = await fetch('http://localhost:8000/api/users/1/show')
            .then(res => {
                return res.json();
            })
            .then(data => data)
            .catch(err => err)
        console.log(response);
    };
        allCategoria(); 
</script>
@endsection
=======
@section('content')
    <div class="las_categorias">

    </div>
    <script>
        const categorias = document.getElementsByClassName("categoria");
        const mostrar = document.getElementsByClassName("las_categorias")[0];
        async function allCategories() {
            const response = await fetch('{{ env('APP_URL') }}' + `/api/categories`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log(response);
            response.data.map((categories) => {
                mostrar.innerHTML += `
                    <div class="categoria" id="${categories}">
                        <div class="texto_categoria" id="${categories}>
                            <div class="nombre_de_la_categoria" id="${categories}>
                                <h1 id="${categories}">${categories}</h1>
                            </div>
                        </div>
                    </div>
                `;
            });

            onClickCategory();
        };

        function onClickCategory() {
            for (let i = 0; i < categorias.length - 1; i++) {
                categorias[i].addEventListener("click", (e) => {
                    window.location = '{{ env('APP_URL') }}' + `/categories/${e.target.id}`
                });
            }
        }

        window.onload = allCategories();
    </script>
@endsection
>>>>>>> 0009cf8b489adb1e9a4acda9998778bb195aab9f:resources/views/categories.blade.php
