<?php

namespace EcomInsight\LaravelAnalytics\Listeners;

use EcomInsight\LaravelAnalytics\Events\AnalyticsEvent;
use EcomInsight\LaravelAnalytics\Models\AnalyticsEvent as AnalyticsEventModel;
use Illuminate\Http\Request;

class AnalyticsEventListener
{
    public Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(AnalyticsEvent $event)
    {
        AnalyticsEventModel::create([
            'domain' => $this->request->getHost(),
            'url' => $this->request->getPathInfo(),

            'group' => $event->group,
            'name' => $event->name,
            'payload' => $event->payload,

            'ip' => $this->request->ip(),
            'session_id' => $this->request->session()->getId(),
            'user_id' => $this->request->user() ? $this->request->user()->getKey() : null,
        ]);
    }
}
