<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\Pages\Http\Controllers'], function()
{
	Route::resource("paginas", "PagesController",  ['as' => 'admin']);


});

Route::get("{page}", ['as' => 'page', 'uses' => "Modules\Pages\Http\Controllers\PagesController@getPage"]);

// Route::group(['namespace' => 'Modules\Pages\Http\Controllers'], function()
// {
// 	Route::get("{page}", ['as' => 'page', 'uses' => "PagesController@getPage"]);
// });

