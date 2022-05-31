@extends('layouts.app')
@section('content')
    <div id="headermercado">Inventario</div>
    <div id="inventario">
    </div>
    @auth
        <div id="userid" hidden>
            {{ Auth::user()->id }}
        </div>
    @endauth
    <script>
        //api/shops
        const cardnft = document.getElementsByClassName("card-nft");
        const button = document.getElementById("buttonbut");
        const inventario = document.getElementById("inventario");
        const userid = document.getElementById("userid");
        const getListNFT = async () => {
            const response = await fetch('{{ env('APP_URL') }}' + `/api/users/${userid.textContent}/nfts`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            console.log('{{ env('APP_URL') }}');
            console.log(response.data);
            response.data.map((nft) => {
                inventario.innerHTML += `
                    <div class="card-nft" id="${nft.id}" aria-label="imagen nft">
                        <div id="${nft.id}" class="card-image">
                        <img src="{{ asset('storage/${nft.photo}') }}" alt="NFT: ${nft.title}, ${nft.description}" tabindex="0">
                    </div>
                    <div id="${nft.id}" class="card-info" aria-label="informacion nft">
                        <p id="${nft.id}" class="card-title">${nft.title}</p>
                        <div class="card-username">
                            <div class="card-photouser">
                            <img src="{{ asset('storage/${nft.userData}') }}" alt="Foto de perfil de ${nft.user_id}" tabindex="0">
                            </div>
                            <div class="card-name" tabindex="0">${nft.user_id}</div>
                            <div class="card-price" tabindex="0">
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
                cardnft[i].addEventListener("click", (e) => {
                    console.log(e.target.parentElement.id);
                    window.location = '{{ env('APP_URL') }}' + `/nfts/${e.target.parentElement.id}`;
                });
            }
        }
        window.onload = getListNFT();
    </script>
@endsection
