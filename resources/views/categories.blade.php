@extends('layouts.app')
@section('content'
)
<div class="las_categorias">
                
</div>
<script>
    const mostrar = document.getElementsByClassName("las_categorias")[0];
    async function allCategoria() {
        const response = await fetch('http://localhost:8000/api/categories')
            .then(res => {
                return res.json();
            })
            .then(data => data)
            .catch(err => err)
        console.log(response);
        response.data.map((categories) => {
            mostrar.innerHTML += `
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
</script>
@endsection