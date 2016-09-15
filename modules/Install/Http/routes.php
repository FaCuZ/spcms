<?php

Route::group(['middleware' => 'admin', 'prefix' => 'install', 'namespace' => 'Modules\Install\Http\Controllers'], function()
{
	Route::get('/', 			['as' => 'install.index',		 'uses' => 'InstallController@index']);
	Route::get('/requisitos', 	['as' => 'install.requisitos',	 'uses' => 'InstallController@showRequisitos']);
	Route::get('/configuracion',['as' => 'install.configuracion','uses' => 'InstallController@showConfiguracion']);
	Route::get('/basededatos', 	['as' => 'install.basededatos',  'uses' => 'InstallController@showBaseDeDatos']);
	Route::get('/entorno',		['as' => 'install.entorno',		 'uses' => 'InstallController@showEntorno']);
	Route::get('/usuario',		['as' => 'install.usuario',		 'uses' => 'InstallController@showUsuario']);

	Route::post('/configuracion',['as' => 'install.configuracion.store','uses' => 'InstallController@storeConfiguracion']);
	Route::post('/basededatos',	 ['as' => 'install.basededatos.store',	'uses' => 'InstallController@storeBaseDeDatos']);
	Route::post('/entorno',		 ['as' => 'install.entorno.store',		'uses' => 'InstallController@storeEntorno']);
	Route::post('/usuario',		 ['as' => 'install.usuario.store',		'uses' => 'InstallController@storeUsuario']);
});