<?php

namespace App\Enums\Event;

enum Filter: string
{
    case All = 'all';
    case Upcoming = 'upcoming';
    case Past = 'past';
}
