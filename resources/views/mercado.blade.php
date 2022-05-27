@extends('layouts.app')
@section('content')
    <div id="headermercado">Mercado</div>
    <div id="inventario">
    </div>
    <script>
        //api/shops
        const cardnft = document.getElementsByClassName("card-nft");
        const button = document.getElementById("buttonbut");
        const inventario = document.getElementById("inventario");
        const getListNFT = async () => {
            const response = await fetch('{{ env('APP_URL') }}' + ":8000/api/shops")
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log('{{ env('APP_URL') }}');
            console.log(response.data);
            response.data.map((nft) => {
                inventario.innerHTML += `
            <div class="card-nft" id="${nft.id}">
        <div class="card-image">
            <img src="{{ asset('storage/${nft.photo}') }}"></img>
        </div>
        <div class="card-info">
            <p class="card-title">${nft.title}</p>
            <div class="card-username">
                <div class="card-photouser">
                    <img src="{{ asset('img/sylvia.png') }}"></img>
                </div>
                <div class="card-name">${nft.user_id}</div>
                <div class="card-price">
                    ${nft.price}€
                </div>
            </div>

        </div>
            
            `;
            });
            onClickCard();
        }

        function onClickCard() {
            for (let i = 0; i < cardnft.length - 1; i++) {
                console.log("hola");
                cardnft[i].addEventListener("click", (e) => {
                    console.log(e.target.parentElement.id);
                    window.location = '{{ env('APP_URL') }}' + ":8000/nft"
                });
            }
        }
        window.onload = getListNFT();
        console.log("Prueba");
    </script>
@endsection
