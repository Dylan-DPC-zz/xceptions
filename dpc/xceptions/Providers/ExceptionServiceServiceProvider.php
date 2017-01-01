<?php

namespace Dpc\Exceptions\Providers;

use Dpc\Exceptions\Handler;
use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/exceptioins.php' => config_path('xceptions.php')
        ]);

    }

    /**
     * Register the application services.
     *package.
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Illuminate\Contracts\Debug\ExceptionHandler::class,
            \Dpc\Exceptions\Handler::class);

        $this->app->singleton(\Dpc\Exceptions\Manager::class, \Dpc\Exceptions\ExceptionManager::class);
    }
}
