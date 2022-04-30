<?php

namespace EcomInsight\LaravelAnalytics\Services;

use Carbon\Carbon;
use DB;
use EcomInsight\LaravelAnalytics\Models\AnalyticsCampaign;
use EcomInsight\LaravelAnalytics\Models\AnalyticsEvent;
use EcomInsight\LaravelAnalytics\Models\AnalyticsRequestLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AnalyticsQueryService
{
    public array $filters = [];
    public array $sorts = [];
    public string $query = '';

    public function __construct(Request $request)
    {
        $this->filters = $request->has('filters') ? $request->filters : [];
        $this->sorts = $request->has('sorts') ? $request->sorts : [];
        $this->query =  $request->has('q') ? $request->q : '';
    }

    public function __invoke(string $function)
    {
        $query = $this->$function();
        if($this->filters){
            foreach($this->filters as $column => $value) {
                $query->where($column, $value);
            }
        }
        if($this->sorts){
            foreach($this->sorts as $column => $value) {
                $query->orderBy($column, $value);
            }
        }
        return $query->paginate()->toArray();
    }

    public function eventTable(): Builder
    {
        return AnalyticsEvent::query()
            ->select(DB::raw('CONCAT(domain, url) as page'), 'group', 'name', DB::raw('COUNT(DISTINCT(id)) as amount'), DB::raw('COUNT(DISTINCT(ip)) as amount_of_ips'), DB::raw('COUNT(DISTINCT(session_id)) as amount_of_session'), DB::raw('COUNT(DISTINCT(user_id)) as amount_of_users'))
            ->groupBy(DB::raw('CONCAT(domain, url)'), 'group', 'name');
    }

    public function utmLinkTable(): Builder
    {
        return AnalyticsCampaign::query()
            ->select(DB::raw('CONCAT(domain, url) as page'), 'utm_id', 'utm_source', 'utm_medium', 'utm_campaign', DB::raw('COUNT(id) as amount'), DB::raw('COUNT(DISTINCT(ip)) as amount_of_ips'), DB::raw('COUNT(DISTINCT(session_id)) as amount_of_session'))
            ->groupBy(DB::raw('CONCAT(domain, url)'), 'utm_id', 'utm_source', 'utm_medium', 'utm_campaign');
    }

    public function pageTable(): Builder
    {
        return AnalyticsRequestLog::query()
            ->select(DB::raw('CONCAT(domain, url) as page'), DB::raw('COUNT(DISTINCT(id)) as amount'), DB::raw('COUNT(DISTINCT(ip)) as amount_of_ips'), DB::raw('COUNT(DISTINCT(session_id)) as amount_of_session'), DB::raw('COUNT(DISTINCT(user_id)) as amount_of_users'), DB::raw('AVG(TIMESTAMPDIFF(MINUTE, created_at, updated_at)) as average_time_on_page'))
            ->where('method', 'GET')
            ->groupBy(DB::raw('CONCAT(domain, url)'));
    }

    public function userTable(): Builder
    {
        return AnalyticsRequestLog::query()
            ->join('users', 'analytics_request_logs.user_id', '=', 'users.id')
            ->select(DB::raw('users.name as name'), DB::raw('COUNT(analytics_request_logs.id) as amount_of_visits'))
            ->whereNotNull('analytics_request_logs.user_id')
            ->where('analytics_request_logs.method', 'GET')
            ->groupBy(DB::raw('users.name'));
    }



    public function lastSeenEvents(): string
    {
        return AnalyticsEvent::query()
            ->select('domain', 'url', 'group', 'name', DB::raw('COUNT(id) as count'))
            ->groupBy('domain', 'url', 'group', 'name')
            ->get()
            ->toJson();
    }

    //UTM LINKS



    public function lastUtmLinks(): string
    {
        return AnalyticsCampaign::query()
            ->select('domain', 'url', 'utm_id', DB::raw('COUNT(id) as count'))
            ->groupBy('domain', 'url', 'utm_id')
            ->get()
            ->toJson();
    }

    //UTM PAGES

    public function lastOpenedPages(): string
    {
        return AnalyticsRequestLog::query()
            ->select('domain', 'url', DB::raw('MAX(updated_at) as max_updated_at'))
            ->whereNotNull('user_id')
            ->groupBy('domain', 'url')
            ->orderBy('max_updated_at', 'desc')
            ->get()
            ->toJson();
    }

    //UTM USERS

    public function lastSeenUsers(): string
    {
        $lastSeenUsers = AnalyticsRequestLog::query()
            ->select('user_id', DB::raw('MAX(updated_at) as max_updated_at'), )
            ->whereNotNull('user_id')
            ->groupBy('user_id')
            ->orderBy('max_updated_at', 'desc')
            ->with('user')
            ->get();

        foreach($lastSeenUsers as $lastSeenUser) {
            $lastSeenUser->online = $lastSeenUser->max_updated_at > Carbon::now()->subMinutes(5);
        }
        return $lastSeenUsers->toJson();
    }
}
