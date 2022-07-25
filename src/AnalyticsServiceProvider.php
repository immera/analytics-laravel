<?php

namespace Immera\Analytics;

use Illuminate\Support\ServiceProvider;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/immera/analytics.php' => config_path('immera/analytics.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/immera/analytics.php', 'immera/analytics');

        // Register the main class to use with the facade
        $this->app->singleton('analytics', function () {
            return new Analytics;
        });
    }
}
