<?php

use EcomInsight\LaravelAnalytics\Controllers\AnalyticsController;

Route::prefix('admin/analytics')->name('admin.analytics.')->group(function() {

    Route::prefix('dashboard')->name('dashboards.')->group(function() {

        Route::get('/', [AnalyticsController::class, 'index'])->name('index');
        Route::get('events', [AnalyticsController::class, 'events'])->name('events');
        Route::get('pages', [AnalyticsController::class, 'pages'])->name('pages');
        Route::get('users', [AnalyticsController::class, 'users'])->name('users');
        Route::get('utm-links', [AnalyticsController::class, 'utmLinks'])->name('utmLinks');

    });

});
