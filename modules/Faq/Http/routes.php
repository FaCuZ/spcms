<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\Faq\Http\Controllers'], function()
{
	Route::resource("faq/categorias","FaqCategoryController");
	Route::resource("faq","FaqController"); 
});