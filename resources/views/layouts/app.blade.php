<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/showmarketNFT.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/perfil.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/transactions.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/nft.css') }}" rel="stylesheet"/>
</head>
<body>
    <nav>
        <ul>
            <label id="paginas">Páginas</label>
            <li><img src="{{ asset('img/Home.png') }}"></img><a href="/inicio">Inicio</a></li>
            <li><img src="{{ asset('img/Bag.png') }}"></img><a href="/mercado">Mercado</a></li>
            <li><img src="{{ asset('img/Logout.png') }}"></img><a href="/login">Acceso</a></li>
        </ul>
        <ul>
            <label>Información</label>
            <li><img src="{{ asset('img/Profile.png') }}"></img><a href="/perfil">Mi perfil</a></li>
            <li><img src="{{ asset('img/Transaction.png') }}"></img><a href="/transacciones">Transacciones</a></li>
            <li><img src="{{ asset('img/Bookmark.png') }}"></img><a href="/guardados">Guardados</a></li>
        </ul>
        <div class="logout">Cerrar Sesión</div>
    </nav>
    <div id="navmenu">
        <nav >
            <ul>
                <label id="paginas">Páginas</label>
                <li><img src="{{ asset('img/Home.png') }}"></img><a href="/inicio">Inicio</a></li>
                <li><img src="{{ asset('img/Bag.png') }}"></img><a href="/mercado">Mercado</a></li>
                <li><img src="{{ asset('img/Logout.png') }}"></img><a href="/login">Acceso</a></li>
            </ul>
            <ul>
                <label>Información</label>
                <li><img src="{{ asset('img/Profile.png') }}"></img><a href="/perfil">Mi perfil</a></li>
                <li><img src="{{ asset('img/Transaction.png') }}"></img><a href="/transacciones">Transacciones</a></li>
                <li><img src="{{ asset('img/Bookmark.png') }}"></img><a href="/guardados">Guardados</a></li>
            </ul>
            <div class="logout">Cerrar Sesión</div>
        </nav>



    </div>
    <div id="navmobile">
        <div id="menu"></div>
    </div>
    <main>
    @yield('content')
    </main>
    <script>
        const menu = document.getElementById("menu");
        const navmenu = document.getElementById("navmenu");
        menu.addEventListener("click",  (e) => {
            navmenu.style.display = "flex";
        });
        navmenu.addEventListener("click", (e) => {
            if(e.target.id === "navmenu"){
                navmenu.style.display = "none";
            }
        });
    </script>
</body>
</html>