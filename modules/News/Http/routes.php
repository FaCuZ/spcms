<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin'], 'namespace' => 'Modules\News\Http\Controllers'], function()
{
	Route::resource("noticias/categorias","NewsCategoryController",  ['as' => '.noticias']);
	Route::resource("noticias", "NewsController"); 
});

Route::get('noticia/{id}', 'Modules\News\Http\Controllers\NewsController@noticia');
Route::get('noticias/categoria/{id}', 'Modules\News\Http\Controllers\NewsCategoryController@categoria');