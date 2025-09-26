<?php

namespace App\Livewire\Events;

use Livewire\Component;
use App\Models\Event as EventModel;

class Event extends Component
{
    protected $listeners = ['registration-created' => '$refresh'];

    public EventModel $event;

    public function mount(EventModel $event)
    {
        $this->event = $event->load('registrations');
    }
    public function render()
    {
        return view('livewire.events.event', [
            'registrations' => $this->event->registrations,
        ]);
    }
}
