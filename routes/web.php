<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/home', function () {
    return view('inicio');
});

Auth::routes();

Route::get('/nfts/{id}', function(){
    return view("nft");
});

Route::get('/users/{name}', function(){
    return view("vendedor");
});

Route::get('/inventario', function(){
    return view("inventario");
});

Route::get('/login', function(){
    return view("auth.login");
})->name('login');

Route::get('/perfil', function(){
    return view("perfil");
})->middleware('auth');

Route::get('/register', function(){
    return view("auth.register");
})->name('register');

Route::get('/transacciones', function(){
    return view("transactions");
})->middleware('auth');

Route::get('/mercado', function(){
    return view("mercado");
});

Route::get('/create', function(){
    return view("create");
});

Route::get('/foto', function(){
    return view("foto");
});

Route::get('/vender', function(){
    return view("vender");
});

Route::get('/vendedores', function(){
    return view("vendedores");
});

Route::get('/categories', function(){
    return view("categories");
});

Route::get('/baneado', function(){
    return view("baneado");
});

Route::get('/facturacion', function(){
    return view("benefits");
})->middleware('admin');

Route::resource('user', Api\UserController::class);
