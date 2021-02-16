<?php

use Illuminate\Http\Request;

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


Route::namespace('Api')->group(function() {
	// carros
	Route::get('/carros', 'CarrosController@index')->name('carros.index');  // rota: api/carros
	Route::post('/carros', 'CarrosController@store')->name('carros.store');
	Route::put('/carro/{id}', 'CarrosController@update')->name('carro.update');
	Route::get('/carro/{id}', 'CarrosController@show')->name('carro.show');
	Route::delete('/carro/{id}', 'CarrosController@destroy')->name('carro.destroy');
		
});