<?php

Route::get('/', function () {
    return view('main');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'sinrol'] ], function () {
    Route::get('/', 	  ['as' => 'admin.inicio',  'uses' => 'AdminController@showInicio'  ]);
	//Route::get('textos',  ['as' => 'admin.textos',  'uses' => 'AdminController@showTextos'  ]);
	Route::get('imagenes',['as' => 'admin.imagenes','uses' => 'AdminController@showImagenes']);
	Route::get('emails',  ['as' => 'admin.emails',  'uses' => 'AdminController@showEmails'  ]);
	Route::get('ayuda',   ['as' => 'admin.ayuda',   'uses' => 'AdminController@showAyuda'	  ]);
	
	Route::resource("textos","TextController"); 
});

Route::auth();


Route::get('/alerta', ['as' => 'alerta', 'uses' => 'AdminController@showAlerta']);

Route::get('/home', 'HomeController@index');
