<?php

namespace App\Livewire\Events;

use Livewire\Component;
use App\Models\Event as EventModel;

class Event extends Component
{
    public EventModel $event;

    public function mount(EventModel $event)
    {
        $this->event = $event;
    }
    public function render()
    {
        return view('livewire.events.event');
    }
}
