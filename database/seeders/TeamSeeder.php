<?php

namespace Database\Seeders;
use App\Models\Team;

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = [
            [
                'id_coach' => '1',
                'id_game' => '1',
                'nama_team' => 'MLBB',

            ],
            [
                'id_coach' => '2',
                'id_game' => '2',
                'nama_team' => 'EPEP',

            ],
            [
                'id_coach' => '2',
                'id_game' => '3',
                'nama_team' => 'PUBG',

            ]
        ];
        foreach ($team as $key => $value) {
            Team::create($value);
        }
    }
}
