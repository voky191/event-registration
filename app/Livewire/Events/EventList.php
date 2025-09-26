<?php

namespace App\Livewire\Events;

use App\Enums\Event\Filter;
use App\Enums\Event\Sort;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventList extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filter = Filter::All->value;

    public string $sort = Sort::Asc->value;

    public function updating($field)
    {
        if (in_array($field, ['search', 'filter', 'sort'])) {
            $this->resetPage();
        }
    }

    public function clear(): void
    {
        $this->reset('search');
    }

    public function render()
    {
        $query = Event::query()->withCount('registrations');

        if ($this->search !== '') {
            $query->where('title', 'like', "%{$this->search}%");
        }

        $filter = Filter::from($this->filter);

        match ($filter) {
            Filter::Upcoming => $query->where('date', '>=', now()),
            Filter::Past     => $query->where('date', '<', now()),
            default          => null,
        };

        $events = $query->orderBy('date', Sort::from($this->sort)->value)->paginate(6);

        return view('livewire.events.event-list', compact('events'));
    }
}
