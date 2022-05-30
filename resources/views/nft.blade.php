@extends('layouts.app')
@section('content')
    <div id="headercomprar">Comprar</div>
    <div id="backcompra"><- NFT Características</div>
    <div id="comprarnft">
        <div id="imgnft">
           
        </div>
        <div id="compra">
            <div id="venededorusername">

            </div>
            <div id="vendedordescription">
                Me encanta este nft super curioso y grande, por eso lo vendo a un precio muy asequible.
            </div>
            <div id="pricefinal">
                <div id="price">Calculando</div>
                <div id="botoncomprar">Comprar</div>
            </div>
            
        </div>
       <div id="userid" hidden></div>
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
        if(e.target.id === "closewindow"){
            e.target.parentElement.parentElement.remove();
        }
        if(e.target.id === "confirmation"){
            e.target.remove();
        }
    });
    function addCard(){
        const confirmation = document.getElementById("confirmation");
        confirmation.innerHTML += `
            <div id="creditcard">
                <span id="closewindow">X</span>
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
    async function comprarNFT(){
        console.log("funciona");
        console.log("-----------------------------");
        const id = window.location.href.substring(window.location.href.lastIndexOf('/')+1);
        const userid = document.getElementById("userid").textContent;
        const response = await fetch(`http://localhost:8000/api/operations/${id}/${userid}/transaction`)
        .then(res => res.json())
        .then(data => data)
        .catch(err => err)
        console.log(response);
    } 
    function creditcardAccepted(){
        console.log("works");
        comprarNFT();

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
    const getNFTIndividual = async () => {
        const id = window.location.href.substring(window.location.href.lastIndexOf('/')+1);
        const imgnft = document.getElementById("imgnft");
        const userid = document.getElementById("userid");
        const vendedorusername = document.getElementById("venededorusername");
        const vendedordescription = document.getElementById("vendedordescription");
        const price = document.getElementById("price");
        const confirmar = document.getElementById("nftconfirmar");
        const response = await fetch(`http://localhost:8000/api/nfts/${id}:8000`)
        .then( res => {
            return res.json();
        })
        .then( data => data)
        .catch( err => err)
        imgnft.innerHTML += `
        <img src="{{ asset('storage/${response.data[0].photo}') }}"></img>
        `;
        vendedorusername.innerHTML += `
        <img src="http://localhost:8000/img/sylvia.png">
        Username
        `;
        vendedordescription.innerHTML = response.data[0].description;
        price.innerHTML = response.data[0].price+' €';
        userid.textContent = response.data[0].user_id;

        console.log(response);
    }
    getNFTIndividual();

</script>
@endsection