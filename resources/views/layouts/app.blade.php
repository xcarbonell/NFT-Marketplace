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
    
</head>

<body>
    <nav>
        <ul>
            <label id="paginas">Páginas</label>
            <li><img src="{{ asset('img/Home.png') }}"></img><a href="/">Inicio</a></li>
            <li><img src="{{ asset('img/Bag.png') }}"></img><a href="/mercado">Mercado</a></li>
            @guest
                <li><img src="{{ asset('img/Logout.png') }}"></img><a href="/login">Acceso</a></li>
            @endguest
        </ul>
        <ul>
            <label>Información</label>
            <li><a href="/perfil"><img src="{{ asset('img/Profile.png') }}"></img>Mi perfil</a></li>
            <li><a href="/transacciones"><img src="{{ asset('img/Transaction.png') }}"></img>Transacciones</a></li>
            <li><a href="/inventario"><img src="{{ asset('img/Bookmark.png') }}"></img>Inventario</a></li>
        </ul>
        @auth
            <div class="logout">
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
    <div id="navmenu">
        <nav>
            <ul>
                <label id="paginas">Páginas</label>
                <li><a href="/"><img src="{{ asset('img/Home.png') }}"></img>Inicio</a></li>
                <li><a href="/mercado"><img src="{{ asset('img/Bag.png') }}"></img>Mercado</a></li>
                @guest
                    <li><a href="/login"><img src="{{ asset('img/Logout.png') }}"></img>Acceso</a></li>
                @endguest
            </ul>
            @auth
                <ul>
                    <label>Información</label>
                    <li><a href="/perfil"><img src="{{ asset('img/Profile.png') }}"></img>Mi perfil</a></li>
                    <li><a href="/transacciones"><img src="{{ asset('img/Transaction.png') }}"></img>Transacciones</a>
                    </li>
                    <li><a href="/inventario"><img src="{{ asset('img/Bookmark.png') }}"></img>Inventario</a></li>
                </ul>
                <div class="logout">
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
        <div id="menu"><img src="{{ asset('img/Burger.svg') }}"></img></div>
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
