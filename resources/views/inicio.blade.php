@extends('layouts.app')
@section('content')
<div id="herosection">
    <div class="heropart">
        <img src="{{ asset('img/astronauta.png') }}"></img>
    </div>
    <div class="heropart">
        <h1>Bienvenidos al Nuevo Mundo</h1>
        <button>Ir al Mercado</button>
    </div>
</div>
<div class="inicio_vendedores">
    <div class="inicio_vendedor">
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

@endsection