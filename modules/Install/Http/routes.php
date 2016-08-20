<?php

Route::group(['middleware' => 'web', 'prefix' => 'install', 'namespace' => 'Modules\Install\Http\Controllers'], function()
{
	Route::get('/', 'InstallController@index');
});