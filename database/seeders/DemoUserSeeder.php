<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
