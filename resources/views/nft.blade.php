@extends('layouts.app')
@section('content')
    <div id="headercomprar">Comprar</div>
    <div id="backcompra"><- NFT Características</div>
    <div id="comprarnft">
        <div id="imgnft">
            <img src="{{ asset('img/Fotonftexample.png') }}"></img>
        </div>
        <div id="compra">
            <div id="venededorusername">
                <img src="{{ asset('img/sylvia.png') }}"></img>
                Username
            </div>
            <div id="vendedordescription">
                Me encanta este nft super curioso y grande, por eso lo vendo a un precio muy asequible.
            </div>
            <div id="pricefinal">
                <div id="price">17,99€</div>
                <div id="botoncomprar">Comprar</div>
            </div>
            
        </div>
       
    </div>
<script>
    const comprar = document.getElementById("botoncomprar");
   
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
                <div><a href="/mercado">Ir al mercado</a></div>
            </div>
        
        `;
    }

</script>
@endsection