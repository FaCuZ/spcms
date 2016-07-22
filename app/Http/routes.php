<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'sinrol'] ], function () {
	Route::get('/', 	  ['as' => 'admin.inicio',  'uses' => 'AdminController@showInicio'  ]);

	Route::get('emails',  ['as' => 'admin.emails',  'uses' => 'AdminController@showEmails'  ]);
	Route::get('ayuda',   ['as' => 'admin.ayuda',   'uses' => 'AdminController@showAyuda'	]);
	
	Route::post('sendSoporte',	['as' => 'admin.sendSoporte', 'uses' => 'AdminController@sendMailSoporte'	]);
	Route::post('sendEmail',	['as' => 'admin.sendEmail',   'uses' => 'AdminController@sendMailEmail'		]);
	
	Route::resource("textos","TextController"); 
	Route::resource("imagenes","ImageController");

	Route::get('images',  ['as' => 'admin.imagenes.lista',  'uses' => 'ImageController@lista'  ]);

	Route::resource("albums","AlbumController"); 
	Route::resource("galerias","GalleryController");
	
	Route::get('edicion', ['as' => 'edicion', 'uses' => 'MainController@edicion']);
});

Route::auth();

Route::get('/', ['as' => 'main', 'uses' => 'MainController@index']);

Route::get('alerta', ['as' => 'alerta', 'uses' => 'AdminController@showAlerta']);

Route::get('up',	['as' => 'up',	'uses' => 'MainController@up'	]);
Route::get('down',	['as' => 'down','uses' => 'MainController@down' ]);
