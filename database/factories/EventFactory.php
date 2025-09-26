<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'date' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'capacity' => fake()->numberBetween(5, 10),
        ];
    }

    public function withRegistrations(): self
    {
        return $this->afterCreating(function (Event $event) {
            $max = $event->capacity;

            $count = fake()->numberBetween(0, $max);

            Registration::factory()
                ->count($count)
                ->for($event)
                ->create();
        });
    }
}
