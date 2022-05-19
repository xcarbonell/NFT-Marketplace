@extends('layouts.app')
@section('content')
<div id="nftindividual">
    <div id="caracteristicasnft">
        <div id="nft-title">
            <div class="arrowback"><-</div>
            <div class="titlenft">NFT Caracteristicas</div>
        </div>
        <div id="nft-image">
            <img src="{{ asset('img/Fotonftexample.png') }}"></img>
        </div>
        <div id="nft-information">
            <div id="nft-username">
                <div id="nft-usertitle">Cool Nft Devep...</div>
                <div id="nft-photouser">
                    <div id="nft-photo">
                        <img src="{{ asset('img/sylvia.png') }}"></img>
                    </div>
                    <div id="nft-name">Skyler Dias</div>
                </div>
            </div>
            <div id="nft-price">
                <div id="nft-euro">12.99€</div>
                <div id="nftcomprar">Comprar</div>
            </div>
           
        </div>
        <div id="nft-description">
            <p>El mejor NFT del mundo entero </p>
        </div>
    </div>
</div>
<script>
    const comprar = document.getElementById("nftcomprar");
   
    comprar.addEventListener("click",() => {
        console.log("works");
        const div = document.createElement("div");
        div.id = "confirmation";
        
        document.body.appendChild(div);
        addCard();
    });
    document.body.addEventListener("mousedown", (e) => {
        if(e.target.id === "confirmation"){
            e.target.remove();
        }
    });
    function addCard(){
        const confirmation = document.getElementById("confirmation");
        confirmation.innerHTML += `
            <div id="creditcard">
                <img src="{{ asset('img/Fotonftexample.png') }}"></img>
                <div id="namecreditcard">
                    <p>Nombre del titular de la tarjeta</p>
                    <input type="text" placeholder="Hitori Janai"></input>
                </div>
                <div id="numbercreditcard">
                   <div>
                        <p>Fecha de Caducidad</p>
                        <input type="tel" placeholder="01/25"></input>
                    </div>
                    <div>
                        <p>CVV</p>
                        <input type="tel" placeholder="01/25"></input>
                    </div>
                    
                </div>
                <div id="nftconfirmar" onclick="creditcardAccepted()">Confirmar</div>
            </div>
        `;
    }
 
    function creditcardAccepted(){
        console.log("works");
        document.getElementById("confirmation").remove();
        const div = document.createElement("div");
        div.id = "confirmation";
        
        document.body.appendChild(div);
        successfulWindow();
    }
    function successfulWindow(){
        const confirmation = document.getElementById("confirmation");
        confirmation.innerHTML += `
            <div id="successful">
                <img src="{{ asset('img/Group.png') }}"></img>
                <p>¡Enhorabuena has conseguido un nuevo NFT!</p>
                <div><a href="/shops">Ir al mercado</a></div>
            </div>
        
        `;
    }

</script>
@endsection