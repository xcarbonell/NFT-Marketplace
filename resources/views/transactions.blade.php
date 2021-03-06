@extends('layouts.app')
@section('content')
    <div class="transacciones">
        <div class="titulo">Transacciones</div>
    </div>
    <div class="transacciones_tabla">
        @auth
            @if (Auth::user()->role_id == 1)
                <button id="btnBenefits" tabindex="0">Mostrar Beneficios</button>
                <div id="divBenefits"></div>
            @endif
        @endauth
        <br>
        <div class="transacciones_info">
            <div class="transaccion">
                <h1 name="id" tabindex="0">id</h1>
            </div>
            <div class="transaccion">
                <h1 name="fecha" tabindex="0">Fecha</h1>
            </div>
            <div class="transaccion">
                <h1 name="comprador" tabindex="0">Comprador</h1>
            </div>
            <div class="transaccion">
                <h1 name="vendedor" tabindex="0">Vendedor</h1>
            </div>
            <div class="transaccion">
                <h1 name="precio" tabindex="0">Precio</h1>
            </div>
        </div>

        @auth
            <div id="userid" hidden>
                {{ Auth::user()->id }}
            </div>
        @endauth
    </div>
    <script>
        const id_transaccion = document.getElementsByClassName("id_transaccion");
        const fecha_transaccion = document.getElementsByClassName("fecha_transaccion");
        const comprador_transaccion = document.getElementsByClassName("comprador_transaccion");
        const vendedor_transaccion = document.getElementsByClassName("vendedor_transaccion");
        const precio_transaccion = document.getElementsByClassName("precio_transaccion");
        const informacion_transacciones = document.getElementsByClassName("transacciones_tabla")[0];
        const userid = document.getElementById("userid");

        async function getTransactions() {
            const tabla = document.getElementsByClassName("transacciones_tabla");
            const response = await fetch(`{{ env('APP_URL') }}/api/operations/${userid.textContent}/userOperations`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log(response);
            response.data.map(operation => {
                const date = new Date(operation.created_at);
                const fullDate = date.getDate() + "/" + date.getMonth() + "/" + date.getUTCFullYear();

                informacion_transacciones.innerHTML += `
                <div class="informacion_transacciones" name="informacion transacciones" tabindex="0" aria-label="informacion transacciones">
                    <div class="id_transaccion">
                        <h1 name="id" tabindex="0">${operation.id}</h1>
                    </div>
                    <div class="fecha_transaccion">
                        <h1 name="fecha transaccion" tabindex="0">${fullDate}</h1>
                    </div>
                    <div class="comprador_transaccion">
                        <h1 name="comprador" tabindex="0">${operation.buyer_id}</h1>
                    </div>
                    <div class="vendedor_transaccion">
                        <h1 name="vendedor" tabindex="0">${operation.seller_id}</h1>
                    </div>
                    <div class="precio_transaccion">
                        <h1 name="precio" tabindex="0">${operation.price}</h1>
                </div>  
            `
            });
        };

        /*showBenefits.addEventListener("click", () => {
            console.log('hola');
        })*/

        window.onload = getTransactions();
    </script>
@endsection
