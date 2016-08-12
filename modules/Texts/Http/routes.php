<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'sinrol'], 'namespace' => 'Modules\Texts\Http\Controllers'], function()
{
	Route::resource("textos/categorias","TextCategoryController");
	Route::resource("textos","TextController"); 
});