<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $min = fake()->numberBetween(5, 20) * 100000;

        return [
            'client_id' => User::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'category' => fake()->randomElement(['Web', 'Mobile', 'UI/UX', 'Data', 'IoT']),
            'budget_min' => $min,
            'budget_max' => $min + fake()->numberBetween(5, 30) * 100000,
            'deadline' => fake()->dateTimeBetween('+7 days', '+60 days'),
            'status' => 'open',
        ];
    }
}
