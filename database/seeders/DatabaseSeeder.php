<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'demo'],
            [
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'gender' => 'Laki-laki',
                'password' => Hash::make('demo123'),
                'role' => 'user',
                'balance' => 500,
                'score' => 0,
                'dailystrike' => 0,
            ]
        );

        $this->call([
            ItemSeeder::class,
            DummyAcademicSeeder::class,
        ]);
    }
}
