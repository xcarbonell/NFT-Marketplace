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
                    <div class="card-nft" id="${nft.id}">
                        <div class="card-image" id="${nft.id}">
                            <img id="${nft.id}" src="{{ asset('storage/${nft.photo}') }}" alt="NFT: ${nft.title}, ${nft.description}"></img>
                        </div>
                        <div class="card-info">
                            <a class="card-title" href="{{ env('APP_URL') }}/nfts/${nft.id}">${nft.title}</a>
                            <a href="{{ env('APP_URL') }}/users/${nft.user_id}">
                                <div class="card-username">
                                    <div class="card-photouser"><img src="{{ asset('storage/${nft.userData}') }}" alt="Foto de perfil de ${nft.user_id}"></img></div>
                                    <div class="card-name">${nft.user_id}</div>
                                    <div class="card-price">${nft.price}€</div>
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
