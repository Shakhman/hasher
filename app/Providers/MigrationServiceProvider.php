<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Redefined\Database\Migrations\Migrator;

class MigrationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //Set path for all migrations via directories
        $mainPath = database_path('migrations');

        $this->loadMigrationsFrom(array_merge([$mainPath], glob($mainPath . '/*' , GLOB_ONLYDIR)));
    }

    public function register()
    {
        $this->app->singleton('migrator', function ($app) {
            return new Migrator($app['migration.repository'], $app['db'], $app['files']);
        });
    }
}
