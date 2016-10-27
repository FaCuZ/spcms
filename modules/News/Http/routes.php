<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\News\Http\Controllers'], function()
{
	Route::resource("noticias","NewsController"); 
});