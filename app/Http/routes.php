<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'sinrol'] ], function () {
	Route::get('/', 	  ['as' => 'admin.inicio',  'uses' => 'AdminController@showInicio'  ]);

	Route::get('emails',  ['as' => 'admin.emails',  'uses' => 'AdminController@showEmails'  ]);
	Route::get('ayuda',   ['as' => 'admin.ayuda',   'uses' => 'AdminController@showAyuda'	]);
	
	Route::resource("textos","TextController"); 
	Route::resource("imagenes","ImageController");

	Route::get('images',  ['as' => 'admin.imagenes.lista',  'uses' => 'ImageController@lista'  ]);
	

	Route::resource("albums","AlbumController"); 

	Route::resource("galerias","GalleryController");
});

Route::auth();


Route::get('/', function () {
	return view('main');
});

Route::get('/alerta', ['as' => 'alerta', 'uses' => 'AdminController@showAlerta']);
