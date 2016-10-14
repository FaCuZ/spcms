<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\Support\Http\Controllers'], function()
{
	Route::get('soporte', ['as' => 'admin.soporte.index', 'uses' => 'SupportController@index']);

	Route::post('soporte/send', ['as' => 'admin.soporte.send', 'uses' => 'SupportController@sendMail']);
});