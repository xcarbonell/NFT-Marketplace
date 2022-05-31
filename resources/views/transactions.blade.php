@extends('layouts.app')
@section('content')
    <div class="transacciones">
        <div class="titulo">
            <h1>Transacciones</h1>
        </div>
    </div>
    <div class="transacciones_tabla">
        @auth
            @if (Auth::user()->role_id == 1)
                <button id="btnBenefits">Mostrar Beneficios</button>
                <div id="divBenefits"></div>
            @endif
        @endauth
        <br>
        <div class="transacciones_info">
            <div class="transaccion">
                <h1>id</h1>
            </div>
            <div class="transaccion">
                <h1>Fecha</h1>
            </div>
            <div class="transaccion">
                <h1>Comprador</h1>
            </div>
            <div class="transaccion">
                <h1>Vendedor</h1>
            </div>
            <div class="transaccion">
                <h1>Precio</h1>
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
        const divBenefits = document.getElementById("divBenefits");
        const showBenefits = document.getElementById("btnBenefits");

        async function getTransactions() {
            const tabla = document.getElementsByClassName("transacciones_tabla");
            const response = await fetch(`{{ env('APP_URL') }}/api/operations/${userid.textContent}/userOperations`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log(response);
            const lista = [...response.bought, ...response.sold];
            console.log(lista);
            lista.map(data => {
                const date = new Date(data.created_at);
                const fullDate = date.getDate() + "/" + date.getMonth() + "/" + date.getUTCFullYear();

                informacion_transacciones.innerHTML += `
                <div class="informacion_transacciones">
                    <div class="id_transaccion">
                        <h1>${data.id}</h1>
                    </div>
                    <div class="fecha_transaccion">
                        <h1>${fullDate}</h1>
                    </div>
                    <div class="comprador_transaccion">
                        <h1>${data.buyer_id}</h1>
                    </div>
                    <div class="vendedor_transaccion">
                        <h1>${data.seller_id}</h1>
                    </div>
                    <div class="precio_transaccion">
                        <h1>${data.price}</h1>
                    </div>
                </div>  
            `});
        };

        showBenefits.addEventListener("click", (e) => {
            getBenefits();
        })

        async function getBenefits() {
            const responseBenefits = await fetch(`{{ env('APP_URL') }}/api/benefits`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            divBenefits.innerHTML = `${responseBenefits.data} €`
        }
        getTransactions();
    </script>
@endsection
