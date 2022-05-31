<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enefti</title>
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/showmarketNFT.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/perfil.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/transactions.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nft.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/inicio.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/vendedor.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <ul>
            <label id="paginas" tabindex="0">Páginas</label>
            <li tabindex="0"><img src="{{ asset('img/Home.png') }}"><a href="/" alt="Imagen de inicio">Inicio</a></li>
            <li tabindex="0"><img src="{{ asset('img/Bag.png') }}"><a href="/mercado" alt="Imagen del mercado">Mercado</a></li>
            @guest
            <li><img src="{{ asset('img/Logout.png') }}"></img><a href="/login">Acceso</a></li>
                <li tabindex="0"><img src="{{ asset('img/Logout.png') }}" alt="Imagen para desloguearse"><a href="/login">Acceso</a></li>
            @endguest
        </ul>
        <ul>
            <label>Información</label>
            <li><a href="/perfil"><img src="{{ asset('img/Profile.png') }}"></img>Mi perfil</a></li>
            <li><a href="/transacciones"><img src="{{ asset('img/Transaction.png') }}"></img>Transacciones</a></li>
            <li><a href="/inventario"><img src="{{ asset('img/Bookmark.png') }}"></img>Inventario</a></li>
            @auth
            @if(Auth::user()->role_id == 1)
            <li><a href="/facturacion"><img src="{{ asset('img/Bookmark.png') }}"></img>Facturación</a></li>
            @endif
            @endauth
        </ul>
        @auth
        <div class="logout">
            <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
            <div class="logout">
                <a class="logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" tabindex="0">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        @endauth
    </nav>
    <div id="navmenu" tabindex="0">
        <nav role="nav">
            <ul>
                <label id="paginas" tabindex="0">Páginas</label>
                <li><a href="/" tabindex="0"><img src="{{ asset('img/Home.png') }}">Inicio</a></li>
                <li><a href="/mercado" tabindex="0"><img src="{{ asset('img/Bag.png') }}">Mercado</a></li>
                @guest
                    <li><a href="/login" tabindex="0"><img src="{{ asset('img/Logout.png') }}">Acceso</a></li>
                @endguest
            </ul>
            @auth
                <ul>
                    <label tabindex="0">Información</label>
                    <li tabindex="0"><a href="/perfil"><img src="{{ asset('img/Profile.png') }}">Mi perfil</a></li>
                    <li tabindex="0"><a href="/transacciones"><img src="{{ asset('img/Transaction.png') }}">Transacciones</a>
                    </li>
                    <li><a href="/inventario"><img src="{{ asset('img/Bookmark.png') }}"></img>Inventario</a></li>
                    @auth
                        @if(Auth::user()->role_id == 1)
                            <li><a href="/facturacion"><img src="{{ asset('img/Bookmark.png') }}"></img>Facturación</a></li>
                        @endif
                    @endauth
                </ul>
                <div class="logout" tabindex="0">
                    <a class="logout" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            @endauth
        </nav>
    </div>

    <div id="navmobile">
        <div id="menu" tabindex="0"><img src="{{ asset('img/Burger.svg') }}"></div>
    </div>
    <main>
        @yield('content')
    </main>

    <script>
        const menu = document.getElementById("menu");
        const navmenu = document.getElementById("navmenu");
        menu.addEventListener("click", (e) => {
            navmenu.style.display = "flex";
        });
        navmenu.addEventListener("click", (e) => {
            if (e.target.id === "navmenu") {
                navmenu.style.display = "none";
            }
        });
    </script>
</body>

</html>
