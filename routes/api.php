<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vendedores', 'Api\UserController@showSellers')->name('sellers');
Route::get('/users/{name}', 'Api\UserController@userProfile')->name('userProfile');
Route::get('/operations/{id}/userOperations', 'Api\OperationController@userOperations')->name('userOperations');
Route::get('/operations/{id}/{comprador}/transaction', 'Api\OperationController@operation')->name('transaction');
Route::get('/users/{id}/show', 'Api\UserController@show')->name('user');
Route::get('/users/{id}/ban', 'Api\UserController@banUser')->name('ban');
Route::get('/nfts/{id}/putOnStock', 'Api\ShopController@putOnStock')->name('puOnStock');
Route::get('/categories', 'Api\ViewController@categories')->name('categories');
Route::get('/categories/{category}', 'Api\NftController@indexCategory')->name('category');
Route::get('/landing', 'Api\ViewController@index')->name('landing');
Route::get('/home', 'Api\ViewController@loggedIndex')->name('home');
Route::get('/operation/{id}/{comprador}', 'Api\OperationController@operation')->name('operation');
Route::resource('nfts', 'Api\NftController');
Route::resource('roles', 'Api\RoleController');
Route::resource('users', 'Api\UserController');
Route::resource('shops', 'Api\ShopController');
Route::resource('operations', 'Api\OperationController');
Route::resource('views', 'Api\ViewController');