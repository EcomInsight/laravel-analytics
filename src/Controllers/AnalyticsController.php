<?php

namespace EcomInsight\LaravelAnalytics\Controllers;

use App\Http\Controllers\Controller;
use EcomInsight\LaravelAnalytics\Services\AnalyticsQueryService;
use EcomInsight\LaravelAnalytics\Services\AnalyticsService;

class AnalyticsController extends Controller
{
    public function index(AnalyticsService $analyticsService)
    {
        $analytics = $analyticsService->getAnalytics();
        return view('analytics::dashboard', ['analytics' => $analytics]);
    }

    public function pages(AnalyticsQueryService $analyticsQueryService)
    {
        return view('analytics::dashboard.page', [
            'pageTable' =>$analyticsQueryService('pageTable'),
            'lastOpenedPage' =>$analyticsQueryService->lastOpenedPages()
        ]);
    }

    public function users(AnalyticsQueryService $analyticsQueryService)
    {
        return view('analytics::dashboard.user', [
            'userTable' =>$analyticsQueryService('userTable'),
            'lastSeenUsers' => $analyticsQueryService->lastSeenUsers()
        ]);
    }

    public function utmLinks(AnalyticsQueryService $analyticsQueryService)
    {
        return view('analytics::dashboard.utm-link', [
            'campaignTable' =>$analyticsQueryService('utmLinkTable'),
            'campaigns' => $analyticsQueryService->lastUtmLinks()
        ]);
    }

    public function events(AnalyticsQueryService $analyticsQueryService)
    {
        return view('analytics::dashboard.event', [
            'eventTable' =>$analyticsQueryService('eventTable'),
            'events' => $analyticsQueryService->lastSeenEvents()
        ]);
    }
}
