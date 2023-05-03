<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Library\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!User::where('role', Roles::ADMIN)->exists()){
            User::create([
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'email' => 'admin@localhost.com',
                'password' => Hash::make('1234567890'),
                'role' => Roles::ADMIN,
            ]);
        }
    }
}
