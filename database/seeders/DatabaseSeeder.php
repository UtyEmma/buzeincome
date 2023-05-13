<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Library\Roles;
use App\Models\AppSettings;
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
                'email_verified_at' => now()
            ]);
        }

        if(!AppSettings::first()){
            AppSettings::create([
                'refferal_comission' => env('DEFAULT_REFERRAL_COMISSION'),
                'second_level_refferal_comission' => env('DEFAULT_SECOND_LEVEL_REFERRAL_COMISSION'),
                'default_user_bal' => env('DEFAULT_BALANCE')
            ]);
        }
    }
}
