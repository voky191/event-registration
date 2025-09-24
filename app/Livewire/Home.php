<?php

namespace App\Livewire;

use App\Services\StringHelper;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Home extends Component
{
    public string $timeOfDay;

    public function mount(): void
    {
        $this->updateGreeting();
    }

    public function updateGreeting(): void
    {
        $this->timeOfDay = StringHelper::getGreetingStringBasedOnTime();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.home');
    }
}
