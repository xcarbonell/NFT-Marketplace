@extends('layouts.app')
@section('content')
    <div id="headercomprar">Comprar</div>
    <div id="backcompra">
        <- NFT Características</div>
            <div id="comprarnft">
                <div id="imgnft">

                </div>
                <div id="compra">
                    <div id="venededorusername">

                    </div>
                    <div id="nft-titlecomprar"></div>
                    <div id="vendedordescription">
                        Me encanta este nft super curioso y grande, por eso lo vendo a un precio muy asequible.
                    </div>
                    <div id="pricefinal">
                        <div id="price">Calculando</div>
                        @auth
                            <div id="botoncomprar">Comprar</div>
                        @endauth
                    </div>

                </div>
                @auth
                    <div id="userid" hidden>{{ Auth::user()->id }}</div>
                @endauth
            </div>
            <script>
                const comprar = document.getElementById("botoncomprar");

                comprar.addEventListener("click", () => {
                    console.log("works");
                    const div = document.createElement("div");
                    div.id = "confirmation";

                    document.body.appendChild(div);
                    addCard();
                });
                document.body.addEventListener("mousedown", (e) => {
                    if (e.target.id === "closewindow") {
                        e.target.parentElement.parentElement.remove();
                    }
                    if (e.target.id === "confirmation") {
                        e.target.remove();
                    }
                });

                async function addCard() {
                    const id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
                    const response = await fetch(`{{ env('APP_URL') }}/api/nfts/${id}`)
                        .then(res => {
                            return res.json();
                        })
                        .then(data => data)
                        .catch(err => err)
                    console.log(response);
                    const confirmation = document.getElementById("confirmation");
                    confirmation.innerHTML += `
                        <div id="creditcard">
                            <span id="closewindow">X</span>
                            <img src="{{ asset('storage/${response.data[0].photo}') }}" alt="Foto de nft de ejemplo"></img>
                            <div id="namecreditcard">
                                <p>Nombre del titular de la tarjeta</p>
                                <input type="text" placeholder="Hitori Janai"></input>
                            </div>
                            <div id="numbercreditcard">
                                <div>
                                    <p>Fecha de Caducidad</p>
                                    <input type="tel" placeholder="MM/AA"></input>
                                </div>
                                <div>
                                    <p>CVV</p>
                                    <input id="cvv" type="number" min="001" max="999" onKeyUp="if(this.value>999){this.value=999}" placeholder="000"></input>
                                </div>
                            </div>
                            <div id="nftconfirmar" onclick="creditcardAccepted()">Confirmar</div>
                        </div>
                    `;
                }
                async function comprarNFT() {
                    console.log("funciona");
                    console.log("-----------------------------");
                    const id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
                    const userid = document.getElementById("userid").textContent;
                    const response = await fetch('{{ env('APP_URL') }}' + `/api/operations/${id}/${userid}/transaction`)
                        .then(res => res.json())
                        .then(data => data)
                        .catch(err => err)
                    console.log(response);
                    return response;
                }

                async function creditcardAccepted() {
                    console.log("works");
                    
                    const response = await comprarNFT();
                    if(response.success){
                        document.getElementById("confirmation").remove();
                    const div = document.createElement("div");
                    div.id = "confirmation";

                    document.body.appendChild(div);
                    successfulWindow();
                    return;
                    }
                    const confirm = document.getElementById("confirmation");
                    confirm.remove();
                    
                }

                function successfulWindow() {
                    const confirmation = document.getElementById("confirmation");
                    confirmation.innerHTML += `
                        <div id="successful">
                            <img src="{{ asset('img/Group.png') }}" alt="Foto de adquisicion de NFT"></img>
                            <p>¡Enhorabuena has conseguido un nuevo NFT!</p>
                            <div><a href="/mercado">Ir al mercado</a></div>
                        </div>
        
                    `;
                }
                const getNFTIndividual = async () => {
                    const id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
                    const imgnft = document.getElementById("imgnft");
                    const userid = document.getElementById("userid");
                    const vendedorusername = document.getElementById("venededorusername");
                    const vendedordescription = document.getElementById("vendedordescription");
                    const price = document.getElementById("price");
                    const confirmar = document.getElementById("nftconfirmar");
                    const nfttitle = document.getElementById("nft-titlecomprar");
                    const response = await fetch(`{{ env('APP_URL') }}/api/nfts/${id}`)
                        .then(res => {
                            return res.json();
                        })
                        .then(data => data)
                        .catch(err => err)
                    console.log(response);
                    imgnft.innerHTML += `
                        <img src="{{ asset('storage/${response.data[0].photo}') }}" alt="NFT: ${response.data[0].title}, ${response.data[0].description}"></img>
                    `;
                    vendedorusername.innerHTML += `
                        <img src="{{ asset('storage/${response.data[0].userData}') }}">
                        ${response.data[0].user_id}
                    `;
                    vendedordescription.innerHTML = response.data[0].description;
                    price.innerHTML = response.data[0].price + ' €';
                    nfttitle.innerHTML = response.data[0].title;
                    const botoncomprar = document.getElementById("botoncomprar");
                    if(response.data[0].onStock == "0"){
                        botoncomprar.remove();
                    }
                }
                getNFTIndividual();
            </script>
        @endsection
