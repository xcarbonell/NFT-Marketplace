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

Auth::routes();

Route::get('users', 'Api\UserController@showSellers');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/nft', function(){
    return view("nft");
});
Route::get('/inventario', function(){
    return view("inventario");
});
Route::get('/login', function(){
    return view("login");
});
Route::get('/perfil', function(){
    return view("perfil");
});
Route::get('/register', function(){
    return view("register");
});
Route::get('/transacciones', function(){
    return view("transactions");
});
Route::get('/mercado', function(){
    return view("mercado");
});