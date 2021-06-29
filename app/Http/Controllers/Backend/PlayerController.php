<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PlayerController extends Controller
{
    public function index(){
        $player = DB::table('player')
                            ->select('player.*','game.nama_game','team.id_team','team.nama_team')
                            ->join('game','game.id_game','=','player.id_game')
                            ->join('team','team.id_team','=','player.id_team')
                            ->get();
                            // dd($player);
        return view('backend.coach.data-player',compact('player'));
    }

    public function nonactive($id_player){
        DB::table('player')->where('id_player',$id_player)->update([
            'is_active' => 2,
        ]);
        return redirect()->route('player.index');
    }

    public function active($id_player){
        DB::table('player')->where('id_player',$id_player)->update([
            'is_active' => 1,
        ]);
        return redirect()->route('player.index');
    }
}
