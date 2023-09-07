<?php

namespace Modules\TopPilot\Providers;

use App\Contracts\Modules\ServiceProvider;

/**
 * @package $NAMESPACE$
 */
class AppServiceProvider extends ServiceProvider
{
    private $moduleSvc;

    protected $defer = false;

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->moduleSvc = app('App\Services\ModuleService');

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        $this->registerLinks();

        // Uncomment this if you have migrations
        // $this->loadMigrationsFrom(__DIR__ . '/../$MIGRATIONS_PATH$');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }

    /**
     * Add module links here
     */
    public function registerLinks(): void
    {
        // Show this link if logged in
        // $this->moduleSvc->addFrontendLink('TopPilot', '/toppilot', '', $logged_in=true);

        // Admin links:
        $this->moduleSvc->addAdminLink('TopPilot', '/admin/toppilot');
    }

    /**
     * Register config.
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('toppilot.php'),
        ], 'toppilot');

        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'toppilot');
    }

    /**
     * Register views.
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/toppilot');
        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([$sourcePath => $viewPath],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/toppilot';
        }, \Config::get('view.paths')), [$sourcePath]), 'toppilot');
    }

    /**
     * Register translations.
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/toppilot');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'toppilot');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'toppilot');
        }
    }
}
