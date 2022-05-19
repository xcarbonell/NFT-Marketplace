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
            <li><img src="{{ asset('img/Home.png') }}"></img>Inicio</li>
            <li><img src="{{ asset('img/Bag.png') }}"></img>Mercado</li>
            <li><img src="{{ asset('img/Logout.png') }}"></img>Acceso</li>
        </ul>
        <ul>
            <label>Información</label>
            <li><img src="{{ asset('img/Profile.png') }}"></img>Mi perfil</li>
            <li><img src="{{ asset('img/Transaction.png') }}"></img>Transacciones</li>
            <li><img src="{{ asset('img/Bookmark.png') }}"></img>Guardados</li>
        </ul>
        <div class="logout">Cerrar Sesión</div>
    </nav>
    <main>
    @yield('content')
    </main>

</body>
</html>