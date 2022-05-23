@extends('layouts.app')
@section('content')


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