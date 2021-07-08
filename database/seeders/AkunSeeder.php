<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'level' => 'admin'
            ],
            [
                'name' => 'coach',
                'email' => 'coach@gmail.com',
                'password' => bcrypt('12345678'),
                'level' => 'coach'
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'level' => 'player'
            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
