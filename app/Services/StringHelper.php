<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class StringHelper
{
    public static function getGreetingStringBasedOnTime(): string
    {
        $hour = Carbon::now()->hour;

        return match (true) {
            $hour >= 0  && $hour < 8  => 'night',
            $hour >= 8  && $hour < 12 => 'morning',
            $hour >= 12 && $hour < 18 => 'afternoon',
            $hour >= 18 && $hour <= 23 => 'evening',
        };
    }
}
