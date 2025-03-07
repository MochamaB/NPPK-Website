<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\WidgetSeeder;
use Database\Seeders\WidgetTypeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed widget types and widgets
        $this->call([
            WidgetTypeSeeder::class,
            WidgetSeeder::class,
        ]);
    }
}
