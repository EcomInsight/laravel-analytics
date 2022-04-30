<?php

namespace EcomInsight\LaravelAnalytics\Middleware;

use Carbon\Carbon;
use Closure;
use EcomInsight\LaravelAnalytics\Events\AnalyticsUpdated;
use EcomInsight\LaravelAnalytics\Models\AnalyticsRequestLog;
use Illuminate\Http\Request;

class RequestLogger
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $requestTime = Carbon::createFromTimestamp($_SERVER['REQUEST_TIME']);

        $arl = AnalyticsRequestLog::create([
            'domain' => request()->getHost(),
            'url' => $request->getPathInfo(),

            'method' => $request->method(),
            'response_time' => time() - $requestTime->timestamp,
            'locale' => request()->getLocale(),

            'ip' => $request->ip(),
            'session_id' => $request->session()->getId(),
            'user_id' => $request->user() ? $request->user()->getKey() : null,
        ]);

        $request->session()->put(['analytics_id' => $arl->id]);

//        broadcast(new AnalyticsUpdated());
        return $response;
    }
}
