@extends('layouts.app')
@section('content')
    <div id="headermercado">Mercado</div>
    <div id="inventario">
    </div>
    <script>
        const cardnft = document.getElementsByClassName("card-nft");
        const carduser = document.getElementsByClassName("card-username");
        const button = document.getElementById("buttonbut");
        const inventario = document.getElementById("inventario");
        const getListNFT = async () => {
            const response = await fetch('{{ env('APP_URL') }}' + "/api/shops")
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            response.data.map((nft) => {
                inventario.innerHTML += `
                    <div class="card-nft" id="${nft.id}" aria-label=" informacion nft" role="menu">
                        <div class="card-image" id="${nft.id}">
                            <img id="${nft.id}" name="${nft.title}" src="{{ asset('storage/${nft.photo}') }}" alt="NFT: ${nft.title}, ${nft.description}" tabindex="0">
                        </div>
                        <div class="card-info">
                            <p class="card-title"id="${nft.id}">${nft.title}</p>
                        <div class="card-info" name="card-info" tabindex="0">
                            <p class="card-title">${nft.title}</p>
                            <a href="{{ env('APP_URL') }}/users/${nft.user_id}">
                                <div class="card-username">
                                    <div class="card-photouser"><img src="{{ asset('storage/${nft.userData}') }}" alt="Foto de perfil de ${nft.user_id}" tabindex="0"></div>
                                    <div class="card-name" tabindex="0">${nft.user_id}</div>
                                    <div class="card-price" tabindex="0">${nft.price}€</div>
                                </div>
                            </a>
                        </div>      
                    </div>            
            `;
            });
            onClickCard();
        }

        function onClickCard() {
            for (let i = 0; i < cardnft.length; i++) {
                cardnft[i].addEventListener("click", (e) => {
                    if (e.target.parentElement.id !== "inventario") {
                        window.location = '{{ env('APP_URL') }}' + `/nfts/${e.target.parentElement.id}`
                    }
                });
            }
        }
        window.onload = getListNFT();
    </script>
@endsection
