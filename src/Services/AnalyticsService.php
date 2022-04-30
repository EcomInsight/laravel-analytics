<?php

namespace EcomInsight\LaravelAnalytics\Services;

use EcomInsight\LaravelAnalytics\Models\AnalyticsRequestLog;
use Illuminate\Database\Eloquent\Collection;

class AnalyticsService
{
    public function getAnalytics()
    {
        $perRoute = AnalyticsRequestLog::raw(function (Collection $collection) {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => ['url' => '$url', 'method' => '$method'],
                        'responseTime' => ['$avg' => '$response_time'],
                        'numberOfRequests' => ['$sum' => 1],
                    ]
                ]
            ]);
        });
        $requestsPerDay = AnalyticsRequestLog::raw(function (Collection $collection) {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => '$day',
                        'numberOfRequests' => ['$sum' => 1]
                    ]
                ],
                ['$sort' => ['numberOfRequests' => 1]]
            ]);
        });
        $requestsPerHour = AnalyticsRequestLog::raw(function (Collection $collection) {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => '$hour',
                        'numberOfRequests' => ['$sum' => 1]
                    ]
                ],
                ['$sort' => ['numberOfRequests' => 1]]
            ]);
        });
        return [
            'averageResponseTime' => AnalyticsRequestLog::avg('response_time'),
            'statsPerRoute' => $perRoute,
            'busiestDays' => $requestsPerDay,
            'busiestHours' => $requestsPerHour,
            'totalRequests' => AnalyticsRequestLog::count(),
        ];
    }
}
