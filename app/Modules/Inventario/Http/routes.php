<?php
//Route::get('home','HomeController@index');
/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'inventario'], function() {
	Route::group(['middleware' => 'web'], function () {
	   
		Route::get('/', [
	        'uses' => 'IpsController@index',
	        'as' => 'inventario.ip.index'
    	]);
		Route::get('{ubicacion_id}/show', [
	        'uses' => 'IpsController@show',
	        'as' => 'inventario.ip.show'
    	]);
		Route::get('/{ip}', [
	        'uses' => 'IpsController@create',
	        'as' => 'inventario.ip.create'
    	]);
    	Route::get('/{ip}/edit', [
	        'uses' => 'IpsController@edit',
	        'as' => 'inventario.ip.edit'
    	]);
    	Route::patch('/{id}/update', [
	        'uses' => 'IpsController@update',
	        'as' => 'inventario.ip.update'
   		 ]);
    	Route::post('/{id}', [
	        'uses' => 'IpsController@store',
	        'as' => 'inventario.ip.store'
   		 ]);
    	Route::get('/{id}/destroy', [
	        'uses' => 'IpsController@destroy',
	        'as' => 'inventario.ip.destroy'
   		 ]);
    	/*Route::get('/{ip}/edit', [
	        'uses' => 'IpsController@edit',
	        'as' => 'admin.ip.edit'
    	]);
    	Route::post('/', [
	        'uses' => 'IpsController@store',
	        'as' => 'admin.ip.store'
    	]);
    	*/
	});
});