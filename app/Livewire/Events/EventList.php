<?php

namespace App\Livewire\Events;

use App\Models\Event;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class EventList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $filter = 'all'; // all | upcoming | past
    public string $sort = 'asc';   // asc | desc

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

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $query = Event::query();

        // Search by title
        if ($this->search !== '') {
            $query->where('title', 'like', "%{$this->search}%");
        }

        // Filter by date
        if ($this->filter === 'upcoming') {
            $query->where('date', '>=', Carbon::today());
        } elseif ($this->filter === 'past') {
            $query->where('date', '<', Carbon::today());
        }

        // Sort by date
        $events = $query->orderBy('date', $this->sort)->paginate(6);

        return view('livewire.events.event-list', compact('events'));
    }
}
