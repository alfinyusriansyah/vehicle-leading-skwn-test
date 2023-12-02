<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDummyUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Approver User satu',
            'email' => 'approver@example.com',
            'password' => bcrypt('12345'),
            'role' => 'approver',
        ]);

        User::create([
            'name' => 'Approver User dua',
            'email' => 'approver2@example.com',
            'password' => bcrypt('12345'),
            'role' => 'approver',
        ]);

                User::create([
            'name' => 'admin dua',
            'email' => 'admin2@example.com',
            'password' => bcrypt('321'),
            'role' => 'admin',
        ]);
    }
}
