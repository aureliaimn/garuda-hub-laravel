<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@garudahub.test',
            'role' => 'admin',
        ]);

        $clients = User::factory(3)->create(['role' => 'client']);
        $developers = User::factory(4)->create(['role' => 'developer']);

        $clients->each(function ($client) use ($developers) {
            Project::factory(2)->create(['client_id' => $client->id])
                ->each(function ($project) use ($developers) {
                    $developers->random(rand(1, 3))->each(function ($dev) use ($project) {
                        Bid::factory()->create([
                            'project_id' => $project->id,
                            'developer_id' => $dev->id,
                        ]);
                    });
                });
        });
    }
}