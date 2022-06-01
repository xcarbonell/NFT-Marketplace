@extends('layouts.app')
@section('content')
    <div id="nftindividual">
        <div id="caracteristicasnft">
            <div id="nft-title">
                <div id="nft-information">
                    <div id="backcompra">
                        <- NFT Características</div>
                            <div id="comprarnft" aria-label="menu comprar nft" role="menu">
                                <div id="imgnft">

                                </div>
                                <div id="compra" tabindex="0">
                                    <div id="venededorusername">
                                    </div>
                                    <div id="compra">
                                        <div id="venededorusername">
                                        </div>
                                        <div id="vendedordescription">

                                        </div>
                                        <div id="infoventa">

                                        </div>
                                        <form method="POST" action="{{ route('putOnStock', 1) }}">
                                            @method('PUT')
                                            @csrf
                                            <div id="pricefinal" aria-label="precio-final">
                                                <input id="price" name="price" type="number" tabindex="0" placeholder="Precio"/>
                                                <input hidden id="nftid" name="nftid" type="text" value="0" tabindex="0">
                                                <input id="botonvender" type="submit" value="Vender" tabindex="0">
                                            </div>
                                            <form>
                                    </div>

                                </div>
                                @auth
                                    <div hidden>
                                        <input hidden type="text" id="userid" name="userid" value="{{ Auth::user()->id }}">
                                    </div>
                                @endauth
                            </div>
                            <script>
                                const id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
                                const nftimg = document.getElementById("imgnft");
                                const username = document.getElementById("venededorusername");
                                const btnVender = document.getElementById("botonvender");
                                const desc = document.getElementById("vendedordescription");
                                const divnftid = document.getElementById("nftid");
                                const infoventa = document.getElementById("infoventa");

                                const getNFTIndividual = async () => {
                                    const response = await fetch(`{{ env('APP_URL') }}/api/nfts/${id}`)
                                        .then(res => {
                                            return res.json();
                                        })
                                        .then(data => data)
                                        .catch(err => err)
                                    console.log(response);
                                    divnftid.value = response.data[0].id;
                                    nftimg.innerHTML += `
                                        <img src="{{ asset('storage/${response.data[0].photo}') }}" alt="NFT: ${response.data[0].title}, ${response.data[0].description}"></img>
                                    `;
                                    username.innerHTML += `
                                        <img src="{{ asset('storage/${response.data[0].userData}') }}" alt="Foto del usuario ${response.data[0].user_id}">
                                        ${response.data[0].user_id}
                                    `;
                                    desc.innerHTML += `
                                        ${response.data[0].description}
                                    `;
                                    if (response.data[0].onStock) {
                                        infoventa.innerHTML += "<p>Este item ya está en venta, pero si quieres puedes actualizar su precio. Si lo quieres quitar del mercado, pon que el precio sea 0</p>";
                                    }
                                }
                                getNFTIndividual();
                            </script>
                        @endsection
