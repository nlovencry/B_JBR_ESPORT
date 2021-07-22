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
                'name' => 'haya',
                'email' => 'haya@gmail.com',
                'jenis_kelamin' => '2',
                'usia' => '20',
                'nohp' => '0888888888',
                'alamat' => 'BWI',
                'password' => bcrypt('12345678'),
                'role' => 3,
                'is_active' => 1
            ],               
        ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
