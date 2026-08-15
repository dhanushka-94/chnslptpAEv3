<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('cache:warm', function () {
    \App\Services\PerformanceCacheService::warmUpCaches();
    $this->info('Application caches warmed.');
})->purpose('Warm homepage and navigation caches');
