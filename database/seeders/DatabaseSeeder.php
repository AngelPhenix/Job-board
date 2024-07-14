<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'last_name' => "Tested User",
            'email' => 'test@example.com',
        ]);

        Job::factory(50)->create();

        $this->call([
            FishSpotSeeder::class
        ]);
    }
}
