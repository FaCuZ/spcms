<?php namespace Modules\Links\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LinksServiceProvider extends ServiceProvider
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
        //$this->registerConfig();
        $this->registerViews();

        $this->injectModel();

        $this->addToBlade(['links', '$links->url(%s);']);
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
            $view->with('links', app('\Modules\Links\Models\LinkCategory'));
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
            __DIR__.'/../Config/config.php' => config_path('links.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'links'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/links');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/links';
        }, \Config::get('view.paths')), [$sourcePath]), 'links');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/links');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'links');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'links');
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
