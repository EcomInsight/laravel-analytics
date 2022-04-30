<?php

namespace EcomInsight\LaravelAnalytics\Providers;

use EcomInsight\LaravelAnalytics\Events\AnalyticsEvent;
use EcomInsight\LaravelAnalytics\Listeners\AnalyticsEventListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AnalyticsEvent::class => [
            AnalyticsEventListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
