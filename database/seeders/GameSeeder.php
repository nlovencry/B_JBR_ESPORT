<?php

namespace Database\Seeders;
use App\Models\Game;

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game = [
            [
                'nama_game' => 'Mobile Legend',
                'keterangan' => 'Mobile Legends: Bang Bang adalah sebuah permainan peranti bergerak berjenis MOBA yang dikembangkan dan diterbitkan oleh Moonton, anak usaha dari ByteDance.',

            ],
            [
                'nama_game' => 'Free Fire',
                'keterangan' => 'Garena Free Fire atau biasa disebut Free Fire adalah permainan battle royale yang dikembangkan oleh 111 Dots Studio dan diterbitkan oleh Garena untuk Android dan iOS. Itu menjadi permainan seluler yang paling banyak diunduh secara global pada tahun 2019.',
            ]
        ];
        foreach ($game as $key => $value) {
            Game::create($value);
        }
    }
}
