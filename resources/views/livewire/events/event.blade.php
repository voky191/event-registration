<div>
    <flux:heading size="xl" level="1">Event #{{ $event->id }}</flux:heading>
    <flux:heading size="lg" level="2" class="mt-5">{{ $event->title }}</flux:heading>
    <flux:text class="mt-1 flex items-center gap-2">
        Date:
        {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}
    </flux:text>
    <flux:text class="mt-1 flex items-center gap-2">
        Capacity: {{ $event->capacity }}
    </flux:text>
</div>
