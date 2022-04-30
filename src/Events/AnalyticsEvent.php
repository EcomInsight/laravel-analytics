<?php

namespace EcomInsight\LaravelAnalytics\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnalyticsEvent
{
    use Dispatchable, SerializesModels;

    public string $group;
    public string $name;
    public array $payload;

    public function __construct(string $group, string $name, array $payload = [])
    {
        $this->group = $group;
        $this->name = $name;
        $this->payload = $payload;
    }
}
