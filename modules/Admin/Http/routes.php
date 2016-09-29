<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function () {
	
	Route::get('/',		  ['as' => 'admin.inicio',  'uses' => 'AdminController@showInicio']);
	Route::get('edicion', ['as' => 'edicion', 		'uses' => 'AdminController@edicion'	  ]);

	Route::get('up',	  ['as' => 'admin.up',	'uses' => 'AdminController@up'	]);
	Route::get('down',	  ['as' => 'admin.down','uses' => 'AdminController@down']);

	Route::get('cache/on', ['as' => 'admin.cache.on',	'uses' => 'AdminController@cacheOn'	]);
	Route::get('cache/off',['as' => 'admin.cache.off',	'uses' => 'AdminController@cacheOff']);

	Route::get('clear',	  ['as' => 'admin.clear','uses' => 'AdminController@borrarCache']);

	Route::get('emails',  ['as' => 'admin.emails',  'uses' => 'AdminController@showEmails']);
	Route::get('ayuda',   ['as' => 'admin.ayuda',   'uses' => 'AdminController@showAyuda' ]);
	
	Route::post('sendSoporte', ['as' => 'admin.sendSoporte', 'uses' => 'AdminController@sendMailSoporte']);
	Route::post('sendEmail',   ['as' => 'admin.sendEmail',   'uses' => 'AdminController@sendMailEmail'	]);
	
	Route::group(['middleware' => 'roladmin'], function () {
		Route::get('usuarios', 	['as' => 'admin.usuarios',	'uses' => 'AdminController@showUsuarios' ]);

		//Route::get('modulos', 	['as' => 'admin.modulos',	'uses' => 'AdminController@showModulos'	 ]);
		Route::get('modulos', 		['as' => 'admin.modulos',		'uses' => 'ModuleController@index'		]);
		Route::get('modulos/on', 	['as' => 'admin.modulos.on',	'uses' => 'ModuleController@activate'	]);
		Route::get('modulos/off', 	['as' => 'admin.modulos.off',	'uses' => 'ModuleController@deactivate'	]);

		Route::get('historial', ['as' => 'admin.historial',	'uses' => 'AdminController@showHistorial']);
		Route::get('temas', 	['as' => 'admin.temas',		'uses' => 'AdminController@showTemas'	 ]);
		Route::get('paginas', 	['as' => 'admin.paginas',	'uses' => 'AdminController@showPaginas'	 ]);
	});

});