<?php

namespace Kgregorywd\Currencies;

use Route;
use Illuminate\Support\ServiceProvider;
use Kgregorywd\Currencies\Console\ParseCurrenciesCommand;
use Kgregorywd\Currencies\Drivers\Currency;

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
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
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
        $sourcePath = __DIR__.'/../Routes';
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group("$sourcePath/web.php");
    }
}
