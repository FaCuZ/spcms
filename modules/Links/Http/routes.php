<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin'], 'namespace' => 'Modules\Links\Http\Controllers'], function()
{
	Route::resource("links/categorias", "LinkCategoryController", ['as' => '.links']);
	Route::resource("links", "LinkController"); 
});