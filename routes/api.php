<?php

use EcomInsight\LaravelAnalytics\Controllers\AnalyticsApiController;

Route::domain(config('app.url'))->group( static function() {

    Route::prefix('api/analytics')->name('api.analytics.')->group(function() {

        Route::post('index', [AnalyticsApiController::class, 'index'])->name('index');
        Route::post('log', [AnalyticsApiController::class, 'log'])->name('log');

    });

});
