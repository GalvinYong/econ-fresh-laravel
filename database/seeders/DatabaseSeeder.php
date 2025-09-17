<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Only create user if it doesn't exist
        if (DB::table('users')->where('email', 'test@example.com')->doesntExist()) {
            \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Call your ProductSeeder
        $this->call(ProductSeeder::class);
    }
}