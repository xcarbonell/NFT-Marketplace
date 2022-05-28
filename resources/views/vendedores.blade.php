@extends('layouts.app')
@section('content')
<div class="los_vendedores">

</div>
</div>
<script>
    const mostrar = document.getElementsByClassName("los_vendedores")[0];
    async function allVendedores() {
        const response = await fetch('http://localhost:8000/api/vendedores')
            .then(res => {
                return res.json();
            })
            .then(data => data)
            .catch(err => err)
        console.log(response);
        response.data.map((vendedor) => {
            mostrar.innerHTML += `
                    <div class="vendedor" id="${vendedor.id}">
                        <div class="icono_texto_vendor">
                            <div class="imagen_del_vendedor">
                                <img src="{{ asset('storage/${vendedor.photo}') }}"></img>
                            </div>
                            <div class="nombre_del_vendedor">
                                <h1>${vendedor.name}</h1>
                            </div>
                        </div>
                    </div>
                 `;
        });
    };
    allVendedores(); 
</script>

@endsection