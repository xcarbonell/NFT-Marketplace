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
                        <h1 name="inventario" tabindex="0">Inventario</h1>
                    </div>
                    <div class="venta">
                        <h1 name="en venta" tabindex="0">En venta</h1>
                    </div>
                </div>
            </div>

            <div id="inventario"></div>
            <div id="enventa"></div>
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
                    <h1 name="nombre vendedor" tabindex="0">${response.user.name}</h1>
                </div>
            `;
            mostrarban.innerHTML += `
                @auth
                    @if(Auth::user()->role_id == 1)
                        <div class="btnban">
                            <button id="ban" tabindex="0">Banear usuario</button>
                        </div>
                    @endif
                @endauth
            `;
            response.nfts.map((nft) => {
                inventario.innerHTML += `
                <div class="vendor_card-nft" id="${nft.id}" aria-label="info-NFT">
                    <div class="card-image" id="${nft.id}">
                        <img id="${nft.id}" src="{{ asset('storage/${nft.photo}') }}" alt="NFT: ${nft.title}, ${nft.description}">
                    </div>
                    <div id="${nft.id}" class="card-info">
                        <p class="card-title" tabindex="0">${nft.title}</p>
                        <div id="${nft.id}" class="card-username">
                            <div class="card-photouser">
                                <img src="{{ asset('storage/${response.user.photo}') }}" alt="Foto de perfil de ${response.user.name}">
                            </div>
                            <div class="card-name" tabindex="0">${response.user.name}</div>
                            <div class="card-price" tabindex="0">
                                ${nft.price}???
                            </div>
                        </div>
                    </div>
                </div>
            `;
            });
            onClickNFT();

            const vendedor = document.getElementsByClassName("vendedor_info")[0];
            mostrarban.addEventListener("click", async (e) => {
                console.log(e.target);
                const responseBan = await fetch('{{ env('APP_URL') }}' + `/users/${response.user.id}/ban`)
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
        }

        function onClickNFT() {
            const cardnft = document.getElementsByClassName("vendor_card-nft");
            for (let i = 0; i < cardnft.length; i++) {
                console.log("este");
                cardnft[i].addEventListener("click", (e) => {
                    if (e.target.parentElement.id !== "inventario") {
                        window.location = '{{ env('APP_URL') }}' + `/nfts/${e.target.parentElement.id}`
                    }
                });
            }
        }
        async function onClickVenta(){
            const venta = document.getElementsByClassName("venta")[0];
            const name = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
            const response = await fetch('{{ env('APP_URL') }}' + `/api/users/${name}`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
                venta.style.background="#282B2F";
                venta.style.color = "white";
                venta.style.padding = "5px";
                inventario_vendor.style.background = "none";
                inventario_vendor.style.color = "#282B2F";

                inventario.innerHTML = "";
            response.nfts.map((nft) => {
                if(nft.onStock == 1){
                    inventario.innerHTML += `
                <div class="vendor_card-nft" id="${nft.id}">
                    <div class="card-image" id="${nft.id}">
                        <img id="${nft.id}" src="{{ asset('storage/${nft.photo}') }}">
                    </div>
                    <div id="${nft.id}" class="card-info">
                        <p class="card-title">${nft.title}</p>
                        <div id="${nft.id}" class="card-username">
                            <div class="card-photouser">
                                <img src="{{ asset('storage/${response.user.photo}') }}">
                            </div>
                            <div class="card-name">${response.user.name}</div>
                            <div class="card-price">
                                ${nft.price}???
                            </div>
                        </div>
                    </div>
                </div>
            `;
                }
            });
            onClickNFT();
        }
        async function onClickInventario(){
            const inventario_vendor = document.getElementsByClassName("inventario_vendor")[0];
            const name = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
            const response = await fetch('{{ env('APP_URL') }}' + `/api/users/${name}`)
                .then(res => {
                    return res.json();
                })
                .then(data => data)
                .catch(err => err)
                inventario_vendor.style.color="white"
                inventario_vendor.style.background="#282B2F";
                inventario_vendor.style.padding="5px";
                venta.style.background = "none";
                venta.style.color = "#282B2F";
                inventario.innerHTML = "";
            response.nfts.map((nft) => {
                    inventario.innerHTML += `
                <div class="vendor_card-nft" id="${nft.id}">
                    <div class="card-image" id="${nft.id}">
                        <img id="${nft.id}" src="{{ asset('storage/${nft.photo}') }}">
                    </div>
                    <div id="${nft.id}" class="card-info">
                        <p class="card-title">${nft.title}</p>
                        <div id="${nft.id}" class="card-username">
                            <div class="card-photouser">
                                <img src="{{ asset('storage/${response.user.photo}') }}">
                            </div>
                            <div class="card-name">${response.user.name}</div>
                            <div class="card-price">
                                ${nft.price}???
                            </div>
                        </div>
                    </div>
                </div>
            `;
            });
            onClickNFT();
        }
        const inventario_vendor = document.getElementsByClassName("inventario_vendor")[0];
        const venta = document.getElementsByClassName("venta")[0];
        venta.addEventListener("click",(e)=>{
                console.log("venta");
                onClickVenta();
            })
            inventario_vendor.addEventListener("click",(e)=>{
                console.log("inventario_vendor");
                onClickInventario();
            })
        window.onload = getUserData();
    </script>
@endsection
