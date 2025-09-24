<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center gap-3">

        <flux:input placeholder="Search by title…" wire:model.live="search">
            <x-slot name="iconTrailing">
                <flux:button size="sm" variant="subtle" icon="x-mark" class="-mr-1" wire:click="clear"/>
            </x-slot>
        </flux:input>

        <flux:dropdown>
            <flux:button icon:trailing="chevron-down">
                {{ ucfirst($filter) ?: 'Filter' }}
            </flux:button>

            <flux:menu>
                <flux:menu.item wire:click="$set('filter', 'all')">All</flux:menu.item>
                <flux:menu.item wire:click="$set('filter', 'upcoming')">Upcoming</flux:menu.item>
                <flux:menu.item wire:click="$set('filter', 'past')">Past</flux:menu.item>
            </flux:menu>
        </flux:dropdown>

        <flux:dropdown>
            <flux:button icon:trailing="chevron-down">
                Sort: {{ $sort === 'asc' ? 'Oldest first' : 'Newest first' }}
            </flux:button>
            <flux:menu>
                <flux:menu.item wire:click="$set('sort', 'asc')">Oldest first</flux:menu.item>
                <flux:menu.item wire:click="$set('sort', 'desc')">Newest first</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </div>

    <div class="space-y-3">
        @forelse ($events as $event)
            <div class="p-3 border rounded-lg dark:border-gray-700 shadow-sm">
                <flux:heading size="lg" level="3">{{ $event->title }}</flux:heading>
                <flux:text class="mt-1 flex items-center gap-2">
                    <flux:icon.calendar class="w-4 h-4" />
                    {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}
                </flux:text>
                <flux:text class="mt-1 flex items-center gap-2">
                    <flux:icon.user class="w-4 h-4" />
                    Capacity: {{ $event->capacity }}
                </flux:text>
            </div>
        @empty
            <flux:text class="text-gray-500 dark:text-gray-400">
                No events found.
            </flux:text>
        @endforelse
    </div>

    <div>
        {{ $events->links() }}
    </div>
</div>
