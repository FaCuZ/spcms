<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Inherit from another theme
	|--------------------------------------------------------------------------
	|
	| Set up inherit from another if the file is not exists,
	| this is work with "layouts", "partials", "views" and "widgets"
	|
	| [Notice] assets cannot inherit.
	|
	*/

	'inherit' => null, //default

	/*
	|--------------------------------------------------------------------------
	| Listener from events
	|--------------------------------------------------------------------------
	|
	| You can hook a theme when event fired on activities
	| this is cool feature to set up a title, meta, default styles and scripts.
	|
	| [Notice] these event can be override by package config.
	|
	*/

	'events' => array(


		'asset' => function($asset)
		{
			// Preparing asset you need to serve after.
			$asset->cook('style', function($asset)
			{
				$asset->add('bootstrap', 'css/bootstrap.min.css');
				$asset->add('underscorejs', 'css/scrolling-nav.css');
			});
		},

		// Before event inherit from package config and the theme that call before,
		// you can use this event to set meta, breadcrumb template or anything
		// you want inheriting.
		'before' => function($theme)
		{
			// You can remove this line anytime.
			$theme->setTitle(Modules\Texts\Models\TextCategory::texto("diseño","titulo")."ble");


			
		   // $theme->asset()->addPath('/public/themes/spcms/');
			

			//$theme->asset()->usePath()->add('style', 'css/bootstrap.min.css');
			//$theme->asset()->usePath()->add('style', 'css/scrolling-nav.css');

			// Breadcrumb template.
			// $theme->breadcrumb()->setTemplate('
			//     <ul class="breadcrumb">
			//     @foreach ($crumbs as $i => $crumb)
			//         @if ($i != (count($crumbs) - 1))
			//         <li><a href="{{ $crumb["url"] }}">{!! $crumb["label"] !!}</a><span class="divider">/</span></li>
			//         @else
			//         <li class="active">{!! $crumb["label"] !!}</li>
			//         @endif
			//     @endforeach
			//     </ul>
			// ');
		},

		// Listen on event before render a theme,
		// this event should call to assign some assets,
		// breadcrumb template.
		'beforeRenderTheme' => function($theme)
		{

			$theme->asset()->usePath()->add('bootstrap', 'css/bootstrap.min.css');
			$theme->asset()->usePath()->add('scrolling-nav', 'css/scrolling-nav.css');


			$theme->asset()->usePath()->add('jquery', 'js/jquery.js');
			$theme->asset()->usePath()->add('bootstrap-js', 'js/bootstrap.min.js');
			$theme->asset()->usePath()->add('jquery-easing', 'js/jquery.easing.min.js');
			$theme->asset()->usePath()->add('scrolling-nav-js', 'js/scrolling-nav.js');

			// You may use this event to set up your assets.
			// $theme->asset()->usePath()->add('core', 'core.js');
			// $theme->asset()->add('jquery', 'vendor/jquery/jquery.min.js');
			// $theme->asset()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', array('jquery'));

			// Partial composer.
			// $theme->partialComposer('header', function($view)
			// {
			//     $view->with('auth', Auth::user());
			// });
		},

		// Listen on event before render a layout,
		// this should call to assign style, script for a layout.
		'beforeRenderLayout' => array(

			'default' => function($theme)
			{
				$theme->asset()->container('footer')->usePath()->add('bootstrap', 'css/bootstrap.min.css');
				//$theme->asset()->add('bootstrap', 'css/bootstrap.min.css');
				// $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
			}

		)

	)

);