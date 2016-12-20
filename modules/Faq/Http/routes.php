<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin'], 'namespace' => 'Modules\Faq\Http\Controllers'], function()
{
	Route::resource("faq/categorias", "FaqCategoryController", ['as' => 'faq']);
	Route::resource("faq", "FaqController"); 
});