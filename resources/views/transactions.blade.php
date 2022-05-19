@extends('layouts.app')
@section('content')
<div class="transacciones">
    <div class="titulo">
        <h1>Transacciones</h1>
    </div>
</div>
<div class="transacciones_tabla">
    <div class="transacciones_info">
        <div class="transaccion">
            <h1>id</h1>
        </div>
        <div class="transaccion">
            <h1>Fecha</h1>
        </div>
        <div class="transaccion">
            <h1>Comprador</h1>
        </div>
        <div class="transaccion">
            <h1>Vendedor</h1>
        </div>
        <div class="transaccion">
            <h1>Precio</h1>
        </div>
    </div>
    <div class="informacion_transacciones">
        <div class="id_transaccion">
            <h1>1</h1>
        </div>
        <div class="fecha_transaccion">
            <h1>17/05/2022</h1>
        </div>
        <div class="comprador_transaccion">
            <h1>Alex</h1>
        </div>
        <div class="vendedor_transaccion">
            <h1>Alex</h1>
        </div>
        <div class="precio_transaccion">
            <h1>12.99€</h1>
        </div>
    </div>
</div>
@endsection