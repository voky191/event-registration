<?php

use App\Livewire\Home;
use App\Livewire\Events\EventList;
use App\Livewire\Events\Event;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/events', EventList::class)->name('events.index');
Route::get('/events/{event}', Event::class)->name('events.show');
