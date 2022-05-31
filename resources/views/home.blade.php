@extends('layouts.app')
@section('content')
    <div id="herosection">
        <div class="heropart">
            <img src="{{ asset('img/astronauta.png') }}" alt="Imagen del inicio de pantalla home">
        </div>
        <div class="heropart">
            <h1>Bienvenidos al Nuevo Mundo</h1>
            <button>Ir al Mercado</button>
        </div>
        
    </div>
@endsection