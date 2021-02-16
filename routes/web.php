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


Route::namespace('Backoffice')->group(function() {
	// carros
	Route::get('/carros', 'CarrosController@index')->name('backoffice.carros.index');  // rota: /carros
	Route::get('/carros/create', 'CarrosController@create')->name('backoffice.carros.create');
	Route::post('/carros/create', 'CarrosController@store')->name('backoffice.carros.store');
	Route::get('/carro/{id}/edit', 'CarrosController@edit')->name('backoffice.carro.edit');
	Route::put('/carro/{id}/edit', 'CarrosController@update')->name('backoffice.carro.update');
	Route::delete('/carro/{id}', 'CarrosController@destroy')->name('backoffice.carro.delete');
		
});


