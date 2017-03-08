<?php

return [

	'inherit' => null, 

	'events' => [

		'before' => function($theme)
		{
			$theme->setTitle(Modules\Texts\Models\TextCategory::texto("diseño","titulo"));
			
			$theme->setAuthor('Facundo Zaldo');
		},


		'beforeRenderTheme' => function($theme)
		{
			$theme->asset()->usePath()->add('styles', 'dist/css/styles.css');

			$theme->asset()->usePath()->add('scripts', 'dist/js/scripts.js');
		}

	]

];