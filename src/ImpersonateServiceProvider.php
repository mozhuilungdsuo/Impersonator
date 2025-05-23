<?php

namespace Mozhuilungdsuo\Impersonator;



use Illuminate\Support\ServiceProvider;
use Mozhuilungdsuo\Impersonator\Blade\ImpersonationBladeDirectives;
use Mozhuilungdsuo\Impersonator\ImpersonationService;
use Illuminate\Support\Facades\Blade;

class ImpersonateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'impersonate');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/impersonate'),
        ], 'impersonate-views');

        // Register blade directives
        ImpersonationBladeDirectives::register();

        // Publish migrations
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/database/migrations' => database_path('migrations'),
            ], 'impersonate-migrations');
            // Publish config file
            $this->publishes([
                __DIR__ . '/../config/impersonate.php' => config_path('impersonate.php'),
            ], 'impersonate-config');
        }
    }

    public function register()
    {
        // Register the impersonation service
        $this->app->singleton('impersonation', function () {
            return new ImpersonationService();
        });
    }
}
