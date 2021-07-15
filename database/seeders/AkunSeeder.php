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
                'name' => 'bunga',
                'email' => 'bunga@gmail.com',
                'jenis_kelamin' => '2',
                'usia' => '20',
                'nohp' => '0888888888',
                'alamat' => 'BWI',
                'password' => bcrypt('12345678'),
                'role' => 1,
            ],
            [
                'name' => 'fathur',
                'email' => 'fathur@gmail.com',
                'jenis_kelamin' => '1',
                'usia' => '20',
                'nohp' => '0888888888',
                'alamat' => 'BWI',
                'password' => bcrypt('12345678'),
                'role' => 1,
            ],
            [
                'name' => 'fathurrrr',
                'email' => 'coach@gmail.com',
                'jenis_kelamin' => '1',
                'usia' => '20',
                'nohp' => '0888888888',
                'alamat' => 'BWI',
                'password' => bcrypt('12345678'),
                'role' => 2,
            ]
            
            
        ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
