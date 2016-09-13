<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Modules\Images\Http\Controllers'], function()
{
	Route::resource("imagenes","ImageController");

	Route::get('images', ['as' => 'admin.imagenes.lista', 'uses' => 'ImageController@lista']);

	Route::resource("albums","AlbumController"); 
	Route::resource("galerias","GalleryController");

});