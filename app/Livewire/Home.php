<?php

namespace App\Livewire;

use App\Services\StringHelper;
use Livewire\Component;

class Home extends Component
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.home', ['timeOfDay' => StringHelper::getGreetingStringBasedOnTime()]);
    }
}
