<?php

namespace App\Livewire\Events;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Event;
use App\Models\Registration;

class EventRegistration extends Component
{
    public Event $event;

    public string $name = '';
    public string $email = '';
    public string $phone = '';

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('registrations')
                    ->where(fn ($query) => $query->where('event_id', $this->event->id)),
            ],
            'phone' => 'nullable|string|max:20',
        ];
    }

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function save()
    {
        $this->validate();


        try {
            DB::beginTransaction();

            $event = Event::where('id', $this->event->id)->lockForUpdate()->first();

            $count = $event->registrations()->count();

            if ($count >= $event->capacity) {
                throw new Exception('Event is already full.');
            }

            Registration::create([
                'event_id' => $this->event->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $this->reset(['name', 'email', 'phone']);

            session()->flash('success', 'You have been registered successfully!');

            $this->dispatch('registration-created');

            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            session()->flash('error', $exception->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.events.event-registration', [
            'registrations' => $this->event->registrations()->latest()->get(),
        ]);
    }
}
