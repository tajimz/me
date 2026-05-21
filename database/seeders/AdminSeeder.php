<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Tajim',
            'email' => 'check@tajim.xyz',
            'password' => Hash::make('check123'),
            'can_write' => false,
        ]);

        User::create([
            'name' => env('ADMIN_NAME', 'ADMIN'),
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'can_write' => true,
        ]);
    }
}
