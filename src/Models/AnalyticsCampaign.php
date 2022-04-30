<?php

namespace EcomInsight\LaravelAnalytics\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsCampaign extends Model
{
    public $fillable = [
        'domain',
        'url',

        'utm_id',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',

        'ip',
        'session_id',
    ];
}
