<?php

namespace EcomInsight\LaravelAnalytics\Controllers;

use App\Http\Controllers\Controller;
use EcomInsight\LaravelAnalytics\Models\AnalyticsRequestLog;
use Illuminate\Http\Request;

class AnalyticsApiController extends Controller
{
    public function log(Request $request)
    {
        $arl = AnalyticsRequestLog::find($request->id);
        $arl->payload = $request->payload;
        $arl->save();
    }
}
