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
                'jenis_kelamin' => 'L',
                'usia' => '20',
                'nohp' => '0888888888',
                'alamat' => 'BWI',
                'password' => bcrypt('12345678'),
                'role' => 1,
                'is_active' => 'on'
            ],
            [
                'name' => 'coach',
                'email' => 'coach@gmail.com',
                'jenis_kelamin' => 'L',
                'usia' => '20',
                'nohp' => '0888888898',
                'alamat' => 'BWI',
                'password' => bcrypt('12345678'),
                'role' => 2,
                'is_active' => 'on'
            ],
            [
                'name' => 'player',
                'email' => 'player@gmail.com',
                'jenis_kelamin' => 'L',
                'usia' => '20',
                'nohp' => '08988888888',
                'alamat' => 'BWI',
                'password' => bcrypt('12345678'),
                'role' => 3,
                'is_active' => 'on'
            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
