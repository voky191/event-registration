<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <flux:heading size="xl" level="1">Event #{{ $event->id }}</flux:heading>
        <flux:heading size="lg" level="2" class="mt-5">"{{ $event->title }}"</flux:heading>
        <flux:text class="mt-1 flex items-center gap-2">
            Date:
            {{ $event->formatted_date }}
        </flux:text>
        <flux:text class="mt-1 flex items-center gap-2">
            Capacity: {{ $registrations->count() }}/{{ $event->capacity }}
        </flux:text>

        @if($event->registration_allowed && $registrations->count() < $event->capacity)
            <livewire:events.event-registration :event="$event" />
        @else
            <flux:heading size="lg" level="2" class="mt-5 text-red-400">Registration closed!</flux:heading>
        @endif
    </div>

    <div>
        <flux:heading size="lg" level="3">Registrations</flux:heading>

        <div class="mt-3 space-y-2">
            @forelse($registrations as $registration)
                <div class="p-3 border rounded-md dark:border-gray-700 flex justify-between">
                    <span class="font-medium">{{ $registration->name }}</span>
                    <span class="text-zinc-600 dark:text-zinc-400">{{ $registration->email }}</span>
                </div>
            @empty
                <p class="text-sm text-gray-500 dark:text-gray-400">No registrations yet.</p>
            @endforelse
        </div>
    </div>


</div>
