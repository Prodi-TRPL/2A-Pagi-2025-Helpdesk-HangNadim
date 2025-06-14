<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Officer', 
                'email' => 'officer@gmail.com', 
                'whatsapp' => '012345678910',
                'role' => 'Officer',
                'password' => 'password'
            ],
            [
                'name' => 'Team Leader',
                'email' => 'leader@gmail.com',
                'whatsapp' => '0832165498701',
                'role' => 'Team Leader',
                'password' => 'password'
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@gmail.com',
                'whatsapp' => '0878945612310',
                'role' => 'Manager',
                'password' => 'password'
            ],
            [
                'name' => 'Direktur',
                'email' => 'direktur@gmail.com',
                'whatsapp' => '0898765432101',
                'role' => 'Direktur',
                'password' => 'password'
            ],
        ];

        foreach($users as $user) {
            User::firstOrCreate(['email' => $user['email']], $user);
        }
    }
}
