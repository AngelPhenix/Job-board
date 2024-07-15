<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'admin',
            'last_name' => "admin",
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('admin')
        ]);

        Job::factory(50)->create();

        $this->call([
            FishSpotSeeder::class
        ]);
    }
}
