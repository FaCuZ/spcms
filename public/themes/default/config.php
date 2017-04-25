<?php

return [

	'inherit' => null, 

	'events' => [

		'before' => function($theme)
		{
			$theme->setTitle(Modules\Texts\Models\TextCategory::texto("diseño","titulo"));
			
			$theme->setAuthor('Facundo Zaldo');
		},

		'asset' => function($asset)
		{
			$asset->themePath()->add([
										['styles', 'dist/css/styles.css'],
										['scripts', 'dist/js/scripts.js']
									 ]);
		}

	]

];