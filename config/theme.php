<?php

$serializer = new SuperClosure\Serializer;

return array(

	/*
	|--------------------------------------------------------------------------
	| Asset url path
	|--------------------------------------------------------------------------
	|
	| The path to asset, this config can be cdn host.
	| eg. http://cdn.domain.com
	|
	*/

	'assetUrl' => env('APP_ASSET_URL', '/'),

	/*
	|--------------------------------------------------------------------------
	| Theme Default
	|--------------------------------------------------------------------------
	|
	| If you don't set a theme when using a "Theme" class 
	| the default theme will replace automatically.
	|
	*/

	'themeDefault' => env('APP_THEME', 'default'),

	/*
	|--------------------------------------------------------------------------
	| Layout Default
	|--------------------------------------------------------------------------
	|
	| If you don't set a layout when using a "Theme" class 
	| the default layout will replace automatically.
	|
	*/

	'layoutDefault' => env('APP_THEME_LAYOUT', 'layout'),

	/*
	|--------------------------------------------------------------------------
	| Path to lookup theme
	|--------------------------------------------------------------------------
	|
	| The root path contains themes collections.
	|
	*/

	'themeDir' => 'public/themes',


	/*
	|--------------------------------------------------------------------------
	| Namespaces
	|--------------------------------------------------------------------------
	|
	| Class namespace.
	|
	*/

	'namespaces' => array(
		'widget' => 'App\Widgets'
 	),

	/*
	|--------------------------------------------------------------------------
	| Listener from events
	|--------------------------------------------------------------------------
	|
	| You can hook a theme when event fired on activities this is cool
	| feature to set up a title, meta, default styles and scripts.
	|
	*/

	'events' => array(

		'before' => $serializer->serialize(function($theme)
		{
			//...
		}),

		'asset' => $serializer->serialize(function($asset)
		{
			//...
		})

	),

);
