<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function () {
	
	Route::get('/',		  ['as' => 'admin.inicio',  'uses' => 'AdminController@showInicio']);
	Route::get('edicion', ['as' => 'admin.edicion', 'uses' => 'AdminController@edicion'	  ]);

	Route::get('up',	  ['as' => 'admin.up',	'uses' => 'AdminController@up'	]);
	Route::get('down',	  ['as' => 'admin.down','uses' => 'AdminController@down']);

	Route::get('cache/on', ['as' => 'admin.cache.on',	'uses' => 'AdminController@cacheOn'	]);
	Route::get('cache/off',['as' => 'admin.cache.off',	'uses' => 'AdminController@cacheOff']);

	Route::get('clear',	  ['as' => 'admin.clear','uses' => 'AdminController@borrarCache']);
		
	Route::group(['middleware' => 'roladmin'], function () {
		Route::get('usuarios',		 ['as' => 'admin.usuarios',		  'uses' => 'UserController@index' ]);
		Route::get('usuario/nuevo',	 ['as' => 'admin.usuario.create', 'uses' => 'UserController@create']);
		Route::get('usuario/{id}',	 ['as' => 'admin.usuario',	 	  'uses' => 'UserController@edit'  ]);
		Route::post('usuario/store', ['as' => 'admin.usuario.store',  'uses' => 'UserController@store' ]);
		Route::delete('usuario/{id}',['as' => 'admin.usuario.destroy','uses' => 'UserController@destroy']);
		Route::post('usuario/{id}',	 ['as' => 'admin.usuario.update', 'uses' => 'UserController@update']);

		Route::get('modulos', 		['as' => 'admin.modulos',		'uses' => 'ModuleController@index'		]);
		Route::get('modulos/on', 	['as' => 'admin.modulos.on',	'uses' => 'ModuleController@activate'	]);
		Route::get('modulos/off', 	['as' => 'admin.modulos.off',	'uses' => 'ModuleController@deactivate'	]);

		Route::get('historial', ['as' => 'admin.historial',	'uses' => 'AdminController@showHistorial']);
		Route::get('temas', 	['as' => 'admin.temas',		'uses' => 'AdminController@showTemas'	 ]);
		Route::get('paginas', 	['as' => 'admin.paginas',	'uses' => 'AdminController@showPaginas'	 ]);
	});

});