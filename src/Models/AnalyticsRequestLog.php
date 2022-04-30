<?php

namespace EcomInsight\LaravelAnalytics\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AnalyticsRequestLog extends Model
{
    public $fillable = [
        'domain',
        'url',

        'method',
        'response_time',
        'locale',
        'payload',

        'ip',
        'session_id',
        'user_id',
    ];

    public $casts = [
        'payload' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
