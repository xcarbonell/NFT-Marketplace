@extends('layouts.app')
@section('content')
    <div class="vendedor_vendedor">
        <div class="vendedor_username">
            <div class="vendedor_info">
            </div>

            <div id="mostrarban"></div>
            
            <div class="vendedor_inventario">
                <div class="inventario_y_venta">
                    <div class="inventario_vendor">
                        <h1>Inventario</h1>
                    </div>
                    <div class="venta">
                        <h1>En venta</h1>
                    </div>
                </div>
            </div>

            <div id="inventario"></div>
        </div>
    </div>

    <script>
        const vendedores = document.getElementById("vendedor");
        const mostrarban = document.getElementById("mostrarban");
        const inventario = document.getElementById("inventario");
        const mostrar = document.getElementsByClassName("vendedor_info")[0];
        const getUserData = async () => {
            const name = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
            const response = await fetch('{{ env('APP_URL') }}' + `/api/users/${name}`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
            mostrar.innerHTML += `
                <div class="vendedor_foto_imagen">
                    <img src="{{ asset('storage/${response.user.photo}') }}" alt="Foto de perfil de ${response.user.name}">
                </div>
                <div class="vendedor_name">
                    <h1>${response.user.name}</h1>
                </div>
            `;
            mostrarban.innerHTML += `
                @auth
                    @if(Auth::user()->role_id == 1)
                        <div class="btnban">
                            <button id="ban">Banear usuario</button>
                        </div>
                    @endif
                @endauth
            `;
            response.nfts.map((nft) => {
                inventario.innerHTML += `
                <div class="vendor_card-nft" id="${nft.id}">
                    <div class="card-image" id="${nft.id}">
                        <img id="${nft.id}" src="{{ asset('storage/${nft.photo}') }}" alt="NFT: ${nft.title}, ${nft.description}">
                    </div>
                    <div class="card-info">
                        <p class="card-title">${nft.title}</p>
                        <div class="card-username">
                            <div class="card-photouser">
                                <img src="{{ asset('storage/${response.user.photo}') }}" alt="Foto de perfil de ${response.user.name}">
                            </div>
                            <div class="card-name">${response.user.name}</div>
                            <div class="card-price">
                                ${nft.price}€
                            </div>
                        </div>
                    </div>
                </div>
            `;
            });
            const vendedor = document.getElementsByClassName("vendedor_info")[0];
            
            const banbutton = document.getElementById("ban");
            banbutton.addEventListener("click", async (e) => {
                console.log(e.target);
                const responseBan = await fetch('{{ env('APP_URL') }}' + `/api/users/${response.user.id}/ban`)
                    .then(res => {
                        return res.json();
                    })
                    .then(data => data)
                    .catch(err => err)
                console.log(responseBan);
                if(responseBan.user.isBanned == "1"){
                    vendedor.style.border = "2px solid red";
                }else{
                    vendedor.style.border = "none";
                }
            });
            onClickNFT();
            ban();
        }

        function onClickNFT() {
            const cardnft = document.getElementsByClassName("card-nft");
            for (let i = 0; i < cardnft.length; i++) {
                console.log("hola");
                cardnft[i].addEventListener("click", (e) => {
                    if (e.target.parentElement.id !== "inventario") {
                        window.location = '{{ env('APP_URL') }}' + `/nfts/${e.target.parentElement.id}`
                    }
                });
            }
        }

        function ban() {

        }
        window.onload = getUserData();
    </script>
@endsection
