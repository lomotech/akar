<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Root', 'email' => 'root@demolah.com', 'password' => 'susur-galur-2024', 'email_verified_at' => now()],
        ];

        foreach ($data as $datum) {
            $user = User::updateOrCreate(['email' => $datum['email']], $datum);
        }
    }
}
