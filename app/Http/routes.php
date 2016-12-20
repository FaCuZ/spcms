<?php

Route::auth();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', ['as' => 'main', 'uses' => 'MainController@index']);

Route::get('alerta', ['as' => 'alerta', 'uses' => 'MainController@showAlerta']);

