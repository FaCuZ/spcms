<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\Email\Http\Controllers'], function()
{
	Route::get('email', ['as' => 'admin.email.index','uses' => 'EmailController@index']);

	Route::post('email/send', ['as' => 'admin.email.send', 'uses' => 'EmailController@sendMail']);

});