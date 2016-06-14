<?php

Route::get('/', function () {
    return view('main');
});
/*
Route::group(['as' => 'admin::'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        // Route named "admin::dashboard"
    }]);
});
*/

Route::get('/admin', 		 ['middleware' => 'auth', 'uses' => 'AdminController@showInicio'  ]);
Route::get('/admin/textos',  ['middleware' => 'auth', 'uses' => 'AdminController@showTextos'  ]);
Route::get('/admin/imagenes',['middleware' => 'auth', 'uses' => 'AdminController@showImagenes']);
Route::get('/admin/emails',  ['middleware' => 'auth', 'uses' => 'AdminController@showEmails'  ]);
Route::get('/admin/ayuda', 	 ['middleware' => 'auth', 'uses' => 'AdminController@showAyuda'	  ]);

Route::auth();

Route::get('/home', 'HomeController@index');
