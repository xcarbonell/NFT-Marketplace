@extends('layouts.app')
@section('content')
<div class="saludo">
    <div class="saludo_titulo">
        <h1>Hola, Sebastian</h1>
    </div>
</div>
<div class="titulo_section">
        <h1>Trending Digital Art</h1>
    </div>
<div class="homepage">
    <div class="nfts">
    <div class="card-nfts">
        <div class="card-imagesNFT">
            <img src="{{ asset('img/Fotonftexample.png') }}"></img>
        </div>
        <div class="card-informacion">
            <p class="card-titulo">Cool cat 05 - It's All in...</p>
            <div class="card-ususario">
                <div class="card-iconouser">
                    <img src="{{ asset('img/sylvia.png') }}"></img>
                </div>
                <div class="card-nombre">Pepito de los Paltoes</div>
                <div class="card-precio">
                    12.99€
                </div>
            </div>

        </div>
    </div>
    <div class="card-nfts">
        <div class="card-imagesNFT">
            <img src="{{ asset('img/Fotonftexample.png') }}"></img>
        </div>
        <div class="card-informacion">
            <p class="card-titulo">Cool cat 05 - It's All in...</p>
            <div class="card-ususario">
                <div class="card-iconouser">
                    <img src="{{ asset('img/sylvia.png') }}"></img>
                </div>
                <div class="card-nombre">Pepito de los Paltoes</div>
                <div class="card-precio">
                    12.99€
                </div>
            </div>

        </div>
    </div>
    <div class="card-nfts">
        <div class="card-imagesNFT">
            <img src="{{ asset('img/Fotonftexample.png') }}"></img>
        </div>
        <div class="card-informacion">
            <p class="card-titulo">Cool cat 05 - It's All in...</p>
            <div class="card-ususario">
                <div class="card-iconouser">
                    <img src="{{ asset('img/sylvia.png') }}"></img>
                </div>
                <div class="card-nombre">Pepito de los Paltoes</div>
                <div class="card-precio">
                    12.99€
                </div>
            </div>

        </div>
    </div>
    <div class="card-nfts">
        <div class="card-imagesNFT">
            <img src="{{ asset('img/Fotonftexample.png') }}"></img>
        </div>
        <div class="card-informacion">
            <p class="card-titulo">Cool cat 05 - It's All in...</p>
            <div class="card-ususario">
                <div class="card-iconouser">
                    <img src="{{ asset('img/sylvia.png') }}"></img>
                </div>
                <div class="card-nombre">Pepito de los Paltoes</div>
                <div class="card-precio">
                    12.99€
                </div>
            </div>

        </div>
    </div>
    </div>
</div>
<div class="vendedores_categorias">
<div class="todos_los_vendedores">
    <div class="titulos">
    <div class="titulo_del_div">
        <h1>Vendedores</h1>
    </div>
    <div class="ver_todos_los_vendedores">
        <a href="">Ver todos los vendedores</a>
    </div>
    </div>
    <div class="los_vendedores">
        <div class="vendedor">
        <div class="icono_texto_vendor">
            <div class="imagen_del_vendedor">
                <img src="img/vendor1.png" alt="">
            </div>
            <div class="nombre_del_vendedor">
                <h1>Skylar Dias</h1>
            </div>
            </div>
        </div>
        <div class="vendedor">
        <div class="icono_texto_vendor">
            <div class="imagen_del_vendedor">
                <img src="img/vendor2.png" alt="">
            </div>
            <div class="nombre_del_vendedor">
                <h1>Sam Rolfes</h1>
            </div>
            </div>
        </div>
        <div class="vendedor">
        <div class="icono_texto_vendor">
            <div class="imagen_del_vendedor">
                <img src="img/vendor3.png" alt="">
            </div>
            <div class="nombre_del_vendedor">
                <h1>Andrew Benson</h1>
            </div>
            </div>
        </div>
        <div class="vendedor">
        <div class="icono_texto_vendor">
            <div class="imagen_del_vendedor">
                <img src="img/vendor4.png" alt="">
            </div>
            <div class="nombre_del_vendedor">
                <h1>Huntlancer</h1>
            </div>
            </div>
        </div>
        <div class="vendedor">
            <div class="icono_texto_vendor">
            <div class="imagen_del_vendedor">
                <img src="img/vendor5.png" alt="">
            </div>
            <div class="nombre_del_vendedor">
                <h1>Eric tansoy</h1>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="todas_las_categorias">
    <div class="titulos">
    <div class="titulo_del_div">
        <h1>Categorías</h1>
    </div>
    <div class="ver_todos_las_categorias">
        <a href="">Ver todos las categorías</a>
    </div>
    </div>
    <div class="las_categorias">
        <div class="categoria">
        <div class="texto_categoria">
            <div class="nombre_de_la_categoria">
                <h1>Arte</h1>
            </div>
            </div>
        </div>
        <div class="categoria">
        <div class="texto_categoria">
            <div class="nombre_de_la_categoria">
                <h1>Arte</h1>
            </div>
            </div>
        </div>
        <div class="categoria">
        <div class="texto_categoria">
            <div class="nombre_de_la_categoria">
                <h1>Arte</h1>
            </div>
            </div>
        </div>
        <div class="categoria">
        <div class="texto_categoria">
            <div class="nombre_de_la_categoria">
                <h1>Arte</h1>
            </div>
            </div>
        </div>
        <div class="categoria">
        <div class="texto_categoria">
            <div class="nombre_de_la_categoria">
                <h1>Arte</h1>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection