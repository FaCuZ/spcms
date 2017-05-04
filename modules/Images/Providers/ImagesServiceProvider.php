<?php

namespace Modules\Images\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ImagesServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerTranslations();
		$this->registerConfig();
		$this->registerViews();

		$this->injectModel();

		$this->addToBlade(['image', '$albumes->imagen(%s)->url;']);
		$this->addToBlade(['thumb', '$albumes->imagen(%s)->thumb;']);

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Inject model to the view.
	 *
	 * @return void
	 */
	protected function injectModel()
	{
		View::composer('*', function ($view) {
		    $view->with('albumes', app('\Modules\Images\Models\Album'));
		});
	}


	/**
	 * Set a blade directive
	 *
	 * @return void
	 */
	protected function addToBlade($array){
		Blade::directive($array[0], function ($data) use ($array) {	
			if(!$data) return '<?php echo '.$array[2].' ?>';

			return sprintf('<?php echo '.$array[1].' ?>',
				null !== $data ? $data : "get_defined_vars()['__data']"
			);
		});  
	}

	/**
	 * Register config.
	 *
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('images.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'images'
		);
	}

	/**
	 * Register views.
	 *
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/images');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/images';
		}, \Config::get('view.paths')), [$sourcePath]), 'images');
	}

	/**
	 * Register translations.
	 *
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/images');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'images');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'images');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}
}
