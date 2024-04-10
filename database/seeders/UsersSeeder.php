<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('');

        $data = [
            ['name' => 'Root', 'fullname' => 'Root', 'slug' => Str::uuid(), 'email' => 'root@example.com', 'password' => $password, 'current_team_id' => 1],
        ];
    }
}
