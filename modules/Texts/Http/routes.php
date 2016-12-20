<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin'], 'namespace' => 'Modules\Texts\Http\Controllers'], function()
{
	Route::resource("textos/categorias","TextCategoryController",  ['as' => '.textos']);
	Route::resource("textos","TextController"); 
});