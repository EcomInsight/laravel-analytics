<?php

namespace EcomInsight\LaravelAnalytics;

use Blade;
use Carbon\Laravel\ServiceProvider;
use EcomInsight\LaravelAnalytics\Middleware\CampaignLogger;
use EcomInsight\LaravelAnalytics\Middleware\RequestLogger;
use EcomInsight\LaravelAnalytics\Providers\EventServiceProvider;

class LaravelAnalyticsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishes([
            __DIR__.'/../config/analytics.php' => config_path('analytics.php'),
        ]);

        app('router')->aliasMiddleware('analytics-logger', RequestLogger::class);
        app('router')->aliasMiddleware('analytics-campaign-logger', CampaignLogger::class);

        $this->app->register(EventServiceProvider::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'analytics');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'analytics');

        Blade::componentNamespace('EcomInsight\\Views\\Components', 'analytics');
    }
}
