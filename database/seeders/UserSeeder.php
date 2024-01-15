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
        $users = [
            [
                'name' => 'jcbarbaf',
                'email' => 'jcbarbaf@gmail.com',
                'password' => '$2y$12$62XdGXoUxIvrxN4xaX/j9.kjOphh2DFfuZif5A4SbcLOOhx8iLEnG'
            ]
        ];
    
        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
