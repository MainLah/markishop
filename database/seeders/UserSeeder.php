<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'Admin',
                'email' => 'admin@testing.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user@testing.com',
                'password' => bcrypt('user123'),
                'role' => 'user'
            ]
        ];

        foreach ($accounts as $account) {
            User::create($account);
        }
    }
}
