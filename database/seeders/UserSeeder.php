<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrcreate([

            'role' => '0',
            'name' => 'helal khan',
            'email' => 'helal@gmail.com',
            'mobile' => '01512345678',
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
