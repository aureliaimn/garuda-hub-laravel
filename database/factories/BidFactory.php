<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BidFactory extends Factory
{
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'developer_id' => User::factory()->state(['role' => 'developer']),
            'price' => fake()->numberBetween(5, 30) * 100000,
            'duration_days' => fake()->numberBetween(7, 60),
            'proposal' => fake()->paragraph(),
            'status' => 'pending',
        ];
    }
}