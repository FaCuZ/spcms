<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\Texts\Http\Controllers'], function()
{
	Route::resource("textos/categorias","TextCategoryController");
	Route::resource("textos","TextController"); 
});