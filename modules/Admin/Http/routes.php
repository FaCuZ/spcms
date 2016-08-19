<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function () {
	
	Route::get('/',		  ['as' => 'admin.inicio',  'uses' => 'AdminController@showInicio']);
	Route::get('edicion', ['as' => 'edicion', 		'uses' => 'AdminController@edicion'	  ]);

	Route::get('up',	  ['as' => 'admin.up',	'uses' => 'AdminController@up'	]);
	Route::get('down',	  ['as' => 'admin.down','uses' => 'AdminController@down']);

	Route::get('emails',  ['as' => 'admin.emails',  'uses' => 'AdminController@showEmails']);
	Route::get('ayuda',   ['as' => 'admin.ayuda',   'uses' => 'AdminController@showAyuda' ]);
	
	Route::post('sendSoporte', ['as' => 'admin.sendSoporte', 'uses' => 'AdminController@sendMailSoporte']);
	Route::post('sendEmail',   ['as' => 'admin.sendEmail',   'uses' => 'AdminController@sendMailEmail'	]);
	
	Route::group(['middleware' => 'roladmin'], function () {
		Route::get('usuarios', 	['as' => 'admin.usuarios',	'uses' => 'AdminController@showUsuarios' ]);
		Route::get('modulos', 	['as' => 'admin.modulos',	'uses' => 'AdminController@showModulos'	 ]);
		Route::get('historial', ['as' => 'admin.historial',	'uses' => 'AdminController@showHistorial']);
	});

});