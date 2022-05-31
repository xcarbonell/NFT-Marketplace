@extends('layouts.app')
@section('content')
    <div id="nftindividual">
        <div id="caracteristicasnft">
            <div id="nft-title">
                <div id="nft-information">
                    <div id="backcompra">
                        <- NFT Características</div>
                            <div id="comprarnft">
                                <div id="imgnft">

                                </div>
                                <div id="compra">
                                    <div id="venededorusername">
                                    </div>
                                    <div id="compra">
                                        <div id="venededorusername">
                                        </div>
                                        <div id="vendedordescription">
                                            Me encanta este nft super curioso y grande, por eso lo vendo a un precio muy
                                            asequible.
                                        </div>
                                        <form method="POST" action="">
                                            @method('PUT')
                                            @csrf
                                            <div id="pricefinal">
                                                <div id="price"><input type="number"/></div>
                                                <button id="botonvender">Vender</button>
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

                                const getNFTIndividual = async () => {
                                    const response = await fetch(`{{ env('APP_URL') }}/api/nfts/${id}`)
                                        .then(res => {
                                            return res.json();
                                        })
                                        .then(data => data)
                                        .catch(err => err)
                                    console.log(response);
                                    nftimg.innerHTML += `
                                        <img src="{{ asset('storage/${response.data[0].photo}') }}" alt="NFT: ${response.data[0].title}, ${response.data[0].description}"></img>
                                    `;
                                    username.innerHTML += `
                                        <img src="{{ asset('storage/${response.data[0].userData}') }}">
                                        ${response.data[0].user_id}
                                    `;
                                }

                                btnVender.addEventListener("click", async (e) =>{
                                    console.log('hola')
                                })

                                getNFTIndividual();
                            </script>
                        @endsection
