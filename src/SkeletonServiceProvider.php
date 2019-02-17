<?php

namespace Rmarshall9n\Skeleton;

use Illuminate\Support\ServiceProvider;

class SkeletonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/skeleton.php' => config_path('skeleton.php'),
            ], 'config');

            // $this->loadViewsFrom(__DIR__.'/../resources/views', 'skeleton');

            // $this->publishes([
            // __DIR__.'/../resources/views' => base_path('resources/views/vendor/skeleton'),
            // ], 'views');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__ . '/../config/skeleton.php', 'skeleton');
    }

    /**
     * Publish the packages migrations with up to date timestamps.
     * - Migration files must be stored in package/migrations.
     * - Migrations must reflect the class name in snake case
     * - Migrations must use the extension .php.stub.
     *
     * @param string|array $migrations
     * @return void
     */
    public function publishMigrations($migrations = [])
    {
        $migrations = array_wrap($migrations);

        foreach ($migrations as $className) {
            if (!class_exists($className)) {
                $timestamp = date('Y_m_d_His', time());
                $snakeName = snake_case($className);

                $this->publishes([
                    __DIR__ . "/../migrations/{$snakeName}.php.stub" => database_path("/migrations/{$timestamp}_{$snakeName}.php"),
                ], 'migrations');
            }
        }

    }
}
