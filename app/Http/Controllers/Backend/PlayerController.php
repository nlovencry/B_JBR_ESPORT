<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class PlayerController extends Controller
{
    public function index(){
        $coach_id = DB::table('coach')->where('id',Auth::user()->id)->first();
        $player = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.id_team','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('player.id_game',$coach_id->id_game)
                            ->get();
                            // dd($player);
        return view('backend.coach.data-player',compact('coach_id','player'));
    }

    public function nonactive($id){
        DB::table('users')
                    ->select('users.*','player.*')
                    ->leftjoin('player','player.id','=','users.id')
                    ->where('player.id',$id)->update([
            'is_active' => 2,
        ]);
        return redirect()->route('player.index');
    }

    public function active($id){
        DB::table('users')
                    ->select('users.*','player.*')
                    ->leftjoin('player','player.id','=','users.id')
                    ->where('player.id',$id)->update([
            'is_active' => 1,
        ]);
        return redirect()->route('player.index');
    }
}
