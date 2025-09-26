<?php

namespace App\Livewire\Events;

use Livewire\Component;
use App\Models\Event;
use App\Models\Registration;

class EventRegistration extends Component
{
    public Event $event;

    public string $name = '';
    public string $email = '';
    public string $phone = '';

    protected array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ];

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function save()
    {
        $this->validate();

        Registration::create([
            'event_id' => $this->event->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->reset(['name', 'email', 'phone']);

        session()->flash('success', 'You have been registered successfully!');

        $this->dispatch('registration-created');
    }


    public function render()
    {
        return view('livewire.events.event-registration', [
            'registrations' => $this->event->registrations()->latest()->get(),
        ]);
    }
}
