<?php namespace Modules\Texts\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class TextsServiceProvider extends ServiceProvider
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

		$this->addToBlade(['text', '$categorias->texto(%s);']);
		$this->addToBlade(['email', 'protectEmail($categorias->texto(%s));']);

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
		    $view->with('categorias', app('\Modules\Texts\Models\TextCategory'));
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
			__DIR__.'/../Config/config.php' => config_path('texts.php'),
		]);
		$this->mergeConfigFrom(
			__DIR__.'/../Config/config.php', 'texts'
		);
	}

	/**
	 * Register views.
	 *
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/texts');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/texts';
		}, \Config::get('view.paths')), [$sourcePath]), 'texts');
	}

	/**
	 * Register translations.
	 *
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/texts');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'texts');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'texts');
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
