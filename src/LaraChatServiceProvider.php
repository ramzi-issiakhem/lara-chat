<?php

namespace Ramzi\LaraChat;

use Closure;
use Illuminate\Support\ServiceProvider;
use Ramzi\LaraChat\Facades\LaraChat;
use Ramzi\LaraChat\Facades\LaraChatManager;

class LaraChatServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerBindings();
    }


    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->publishConfig();
            $this->configureMigrations();
        }

        $this->defineRoutes();
        $this->configureGuards();
        $this->configureMiddlewares();
    }




    private function defineRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if (LaraChat::isApiExposed()) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        }
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/larachat.php' => config_path('larachat.php'),
        ],'larachat-config');

    }

    private function configureMiddlewares()
    {

    }

    private function configureGuards()
    {


    }

    private function configureMigrations()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ],'larachat-migrations');

        if (LaraChat::shouldRunMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '../database/migrations');
        }

    }

    private function registerBindings()
    {
        $this->app->singleton('larachat-manager', LaraChatManager::class);
    }

}
