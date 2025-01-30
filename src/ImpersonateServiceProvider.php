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

        // Register blade directives
        ImpersonationBladeDirectives::register();

        // Publish migrations
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/database/migrations' => database_path('migrations'),
            ], 'impersonate-migrations');
        }

        Blade::component('impersonate::stop-impersonate', 'stop-impersonation-button');
    }

    public function register()
    {
        // Register the impersonation service
        $this->app->singleton('impersonation', function () {
            return new ImpersonationService();
        });
    }
}
