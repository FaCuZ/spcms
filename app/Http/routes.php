<?php

Route::get('/', function () {
    return view('main');
});

Route::group(['as' => 'admin::', 'middleware' => 'auth'], function () {
    Route::get('/admin', 		 ['as' => 'inicio', 	 'uses' => 'AdminController@showInicio'  ]);
	Route::get('/admin/textos',  ['as' => 'textos',   'uses' => 'AdminController@showTextos'  ]);
	Route::get('/admin/imagenes',['as' => 'imagenes','uses' => 'AdminController@showImagenes']);
	Route::get('/admin/emails',  ['as' => 'emails',  'uses' => 'AdminController@showEmails'  ]);
	Route::get('/admin/ayuda', 	 ['as' => 'ayuda',   'uses' => 'AdminController@showAyuda'	 ]);

});

/*
Route::get('/admin', 		 ['middleware' => 'auth', 'uses' => 'AdminController@showInicio'  ]);
Route::get('/admin/textos',  ['middleware' => 'auth', 'uses' => 'AdminController@showTextos'  ]);
Route::get('/admin/imagenes',['middleware' => 'auth', 'uses' => 'AdminController@showImagenes']);
Route::get('/admin/emails',  ['middleware' => 'auth', 'uses' => 'AdminController@showEmails'  ]);
Route::get('/admin/ayuda', 	 ['middleware' => 'auth', 'uses' => 'AdminController@showAyuda'	  ]);
*/
Route::auth();

Route::get('/home', 'HomeController@index');
