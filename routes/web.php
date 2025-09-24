<?php

use App\Livewire\Home;
use App\Livewire\Events\EventList;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/events', EventList::class)->name('events.index');
