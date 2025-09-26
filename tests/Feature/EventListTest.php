<?php

namespace Tests\Feature;

use App\Livewire\Events\EventList;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EventListTest extends TestCase
{
    public function test_can_search_events_by_title()
    {
        Event::factory()->create(['title' => 'Event1']);
        Event::factory()->create(['title' => 'Event2']);

        Livewire::test(EventList::class)
            ->set('search', 'Event1')
            ->assertSee('Event1')
            ->assertDontSee('Event2');
    }
}
