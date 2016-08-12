<?php

Route::auth();

Route::get('/', ['as' => 'main', 'uses' => 'MainController@index']);

Route::get('alerta', ['as' => 'alerta', 'uses' => 'MainController@showAlerta']);

