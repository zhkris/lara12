<?php

use App\Models\CurrentTime;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

Schedule::call(function () {
    $currentTime = CurrentTime::first();

    if (!$currentTime) {
        $currentTime = CurrentTIme::create();
    }
})->everyMinute();
