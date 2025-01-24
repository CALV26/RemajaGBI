<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\seminar>
 */
class SeminarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['open', 'closed', 'completed']),
            'max_participants' => $this->faker->numberBetween(50, 200),
            'poster' => $this->faker->imageUrl(), 
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
            'start' => $this->faker->time(),
            'registration_start' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'registration_end' => $this->faker->dateTimeBetween('+1 week', '+2 weeks')->format('Y-m-d'),
        ];
    }
}
