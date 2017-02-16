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
	| If you don't set a theme when using a "Theme" class the default theme
	| will replace automatically.
	|
	*/

	'themeDefault' => 'default',

	/*
	|--------------------------------------------------------------------------
	| Layout Default
	|--------------------------------------------------------------------------
	|
	| If you don't set a layout when using a "Theme" class the default layout
	| will replace automatically.
	|
	*/

	'layoutDefault' => 'default',

	/*
	|--------------------------------------------------------------------------
	| Path to lookup theme
	|--------------------------------------------------------------------------
	|
	| The root path contains themes collections.
	|
	*/

	'themeDir' => 'themes',

	/*
	|--------------------------------------------------------------------------
	| A pieces of theme collections
	|--------------------------------------------------------------------------
	|
	| Inside a theme path we need to set up directories to
	| keep "layouts", "assets" and "partials".
	|
	*/

	'containerDir' => array(
		'layout'  => 'layouts',
		'asset'   => 'assets',
		'partial' => 'partials',
		'widget'  => 'widgets',
		'view'    => 'views'
	),

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
	| You can hook a theme when event fired on activities
	| this is cool feature to set up a title, meta, default styles and scripts.
	|
	*/

	'events' => array(

		// Before all event, this event will effect for global.
		'before' => $serializer->serialize(function($theme)
		{
			//$theme->setTitle('Something in global.');
		}),

		// This event will fire as a global you can add any assets you want here.
		'asset' => $serializer->serialize(function($asset)
		{
			// Preparing asset you need to serve after.
            $asset->cook('backbone', function($asset)
            {
                $asset->add('backbone', '//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js');
                $asset->add('underscorejs', '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js');
            });

            // To use cook 'backbone' you can fire with 'serve' method.
            // Theme::asset()->serve('backbone');
		})

	),

	/*
	|--------------------------------------------------------------------------
	| Compiler engines.
	|--------------------------------------------------------------------------
	|
	| Config for compiler engines.
	|
	*/

	'engines' => array(

		'twig' => array(

		    // This is laravel alias to allow in twig compiler
		    // The list all of methods is at /app/config/app.php
		    'allows' => array(
		        'Auth',
		        'Cache',
		        'Config',
		        'Cookie',
		        'Form',
		        'HTML',
		        'Input',
		        'Lang',
		        'Paginator',
		        'Str',
		        'Theme',
		        'URL',
		        'Validator'
		    ),


		    // This is laravel alias to allow in twig compiler
		    // The list all of methods is at /app/config/app.php
		    'hooks' => $serializer->serialize(function($twig)
		    {
		        // Example add funciton name "demo".
		        /*$function = new Twig_SimpleFunction('example', function()
		        {
		            $args = func_get_args();

		            return "Example" . print_r($args, true);
		        });

		        $twig->addFunction($function);*/

		        return $twig;
		    })
		)

	)

);
