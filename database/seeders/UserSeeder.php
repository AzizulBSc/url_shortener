<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records to start with a clean slate

        DB::table('users')->delete();

        // Seed user data
        DB::table('users')->insert([
            [
                'id'=> 1,
                'name' => 'User One',
                'email' => 'user1@email.com',
                'phone' => '092938238',
                'address' => 'address 2',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 2,
                'name' => 'User Two',
                'email' => 'user2@email.com',
                'phone' => '09293823835',
                'address' => 'address 2',
                'password' => Hash::make('12345678'),
            ],
            // Add more users as needed
        ]);
    }
}
