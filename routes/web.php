<?php

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
    return view('welcome');
});

Route::get('/imoveis', 'PropertyController@index');//apos o @ é o metodo

Route::get('/imoveis/novo','PropertyController@create');
Route::post('/imoveis/store','PropertyController@store');//cadastrar imóvel

Route::get('/imoveis/{name}', 'PropertyController@show'); //visualizar mais

Route::get('/imoveis/editar/{name}','PropertyController@edit');
Route::post('/imoveis/update/{name}','PropertyController@update');//cadastrar imóvel
