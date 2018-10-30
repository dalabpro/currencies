<?php

namespace Kgregorywd\Currencies;

use Kgregorywd\Currencies\Console\SeedCurrenciesCommand;
use Route;
use Illuminate\Support\ServiceProvider;
use Kgregorywd\Currencies\Drivers\Currency;
use Kgregorywd\Currencies\Console\ParseCurrenciesCommand;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Kgregorywd\Currencies\Http\Controllers';

    /**
     * The available commands
     *
     * @var array
     */
    protected $commands = [
        ParseCurrenciesCommand::class,
        SeedCurrenciesCommand::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapWebRoutes();

        $this->registerTranslations();

        $this->registerMigrations();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('currencies', function () {

            return new Currency();
        });

        $this->registerCommands();

        $this->registerViews();
    }

    /**
     * Register the commands.
     */
    public function registerCommands()
    {
        $this->commands($this->commands);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $sourcePath = __DIR__.'/Routes';

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group("$sourcePath/web.php");
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/vendor/currencies');

        $sourcePath = __DIR__.'/Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/vendor/currencies';
        }, \Config::get('view.paths')), [$sourcePath]), 'currency');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/vendor/currencies');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'currency');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/Resources/lang', 'currency');
        }
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
    }
}
