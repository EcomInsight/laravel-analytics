<?php

namespace EcomInsight\LaravelAnalytics\Middleware;

use EcomInsight\LaravelAnalytics\Models\AnalyticsCampaign;
use Illuminate\Http\Request;
use Closure;

class CampaignLogger
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->hasAny(['utm_id', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'])) {
            AnalyticsCampaign::create([
                'domain' => request()->getHost(),
                'url' => $request->getPathInfo(),

                'utm_id' => $request->utm_id,
                'utm_source' => $request->utm_source,
                'utm_medium' => $request->utm_medium,
                'utm_campaign' => $request->utm_campaign,
                'utm_term' => $request->utm_term,
                'utm_content' => $request->utm_content,

                'ip' => $request->ip(),
                'session_id' => $request->session()->getId(),
            ]);
        }

        return $response;
    }
}
