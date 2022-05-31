@extends('layouts.app')
@section('content')
    <div id="herosection">
        <div class="heropart">
            <img src="{{ asset('img/astronauta.png') }}" alt="Imagen del inicio de pantalla home" aria-label="home image">
        </div>
        <div class="heropart" tabindex="0">
            <h1 tabindex="0" aria-label="bienvenida">Bienvenidos al Nuevo Mundo</h1>
            <button tabindex="0" aria-label="boton de mercado">Ir al Mercado</button>
        </div>
        
    </div>
@endsection