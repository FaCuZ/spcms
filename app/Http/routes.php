<?php

Route::get('/', function () {
    return view('main');
});

Route::group(['as' => 'admin::', 'middleware' => ['auth', 'sinrol'] ], function () {
    Route::get('/admin', 		 ['as' => 'inicio', 	 'uses' => 'AdminController@showInicio'  ]);
	Route::get('/admin/textos',  ['as' => 'textos',   'uses' => 'AdminController@showTextos'  ]);
	Route::get('/admin/imagenes',['as' => 'imagenes','uses' => 'AdminController@showImagenes']);
	Route::get('/admin/emails',  ['as' => 'emails',  'uses' => 'AdminController@showEmails'  ]);
	Route::get('/admin/ayuda', 	 ['as' => 'ayuda',   'uses' => 'AdminController@showAyuda'	 ]);
});

Route::auth();


Route::get('/alerta', ['as' => 'alerta', 'uses' => 'AdminController@showAlerta']);

Route::get('/home', 'HomeController@index');

Route::resource("texts","TextController"); 