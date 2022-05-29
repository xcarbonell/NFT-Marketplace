@extends('layouts.app')
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