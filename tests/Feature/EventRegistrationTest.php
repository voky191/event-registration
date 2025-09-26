<?php

namespace Tests\Feature;

use App\Livewire\Events\EventRegistration;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EventRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_register_for_event(): void
    {
        $event = Event::factory()->create(['capacity' => 5]);

        Livewire::test(EventRegistration::class, ['event' => $event])
            ->set('name', 'Volodymyr')
            ->set('email', 'volodymyr@gmail.com')
            ->set('phone', '(123) 456-7890')
            ->call('save')
            ->assertSee('success', 'You have been registered successfully!');

        $this->assertDatabaseHas('registrations', [
            'event_id' => $event->id,
            'email'    => 'volodymyr@gmail.com',
        ]);
    }
}
