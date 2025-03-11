<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name' => 'Admin User',  // If 'firstname' and 'lastname' are combined into 'name'
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',  // Ensure 'role' column exists
        ]);
    }
}
