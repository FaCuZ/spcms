<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin'], 'namespace' => 'Modules\News\Http\Controllers'], function()
{
	Route::resource("noticias/categorias","NewsCategoryController",  ['as' => '.noticias']);
	Route::resource("noticias", "NewsController"); 
});