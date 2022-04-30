<?php

namespace EcomInsight\LaravelAnalytics\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    public $fillable = [
        'domain',
        'url',

        'group',
        'name',
        'payload',

        'ip',
        'session_id',
        'user_id'
    ];

    public $casts = [
        'payload' => 'array'
    ];
}
