<?php

namespace EcomInsight\LaravelAnalytics\Events;

use EcomInsight\LaravelAnalytics\Services\AnalyticsService;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnalyticsUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $analytics;

    public function __construct()
    {
        $this->analytics = (new AnalyticsService())->getAnalytics();
    }

    public function broadcastOn()
    {
        return new Channel('analytics');
    }
}
