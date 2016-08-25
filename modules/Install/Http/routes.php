<?php

Route::group(['middleware' => 'web', 'prefix' => 'install', 'namespace' => 'Modules\Install\Http\Controllers'], function()
{
	Route::get('/', 			['as' => 'install.index',		 'uses' => 'InstallController@index']);
	Route::get('/requisitos', 	['as' => 'install.requisitos',	 'uses' => 'InstallController@showRequisitos']);
	Route::get('/configuracion',['as' => 'install.configuracion','uses' => 'InstallController@showConfiguracion']);
	Route::get('/entorno',		['as' => 'install.entorno',		 'uses' => 'InstallController@showEntorno']);
	Route::get('/basededatos', 	['as' => 'install.basededatos',  'uses' => 'InstallController@showBaseDeDatos']);
	Route::get('/ususario',		['as' => 'install.usuario',		 'uses' => 'InstallController@showUsuario']);
});