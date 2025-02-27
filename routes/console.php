<?php

use App\Models\CurrentTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

Schedule::call(function () {
    $currentTime = CurrentTime::first();

    if (!$currentTime) {
        $currentTime = CurrentTIme::create([
            'name' => 'created'
        ]);
    } else {
        $rnd = Str::random(8);
        Log::info('Updating... ' . $rnd);
        $currentTime->update([
            'name' => 'Updated ' . $rnd
        ]);
    }
})->everyMinute();
