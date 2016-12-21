<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\Pages\Http\Controllers'], function()
{
	Route::resource("paginas", "PagesController",  ['as' => 'admin']);
});