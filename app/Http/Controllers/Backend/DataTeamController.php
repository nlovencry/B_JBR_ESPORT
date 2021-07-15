<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DataTeamController extends Controller
{
    public function index(){
        $datateam = DB::table('team')
                        ->select('team.*','game.id_game','game.nama_game','coach.id_coach','users.*',DB::raw('count(player.id_player) as total_player'),)
                        ->join('game','game.id_game','=','team.id_game')
                        ->join('coach','coach.id_coach','=','team.id_coach')
                        ->join('users','users.id','=','coach.id')
                        ->leftjoin('player','player.id_team','=','team.id_team')
                        ->groupBy('team.id_team')
                        ->get();
        // $total_player = DB::table('team')
        //                 ->select('team.*', DB::raw('count(player.id_player) as total_player'),)
        //                 ->leftjoin('player','team.id_team','=','player.id_team')
        //                 ->groupBy('team.id_team')
        //                 ->get();
                        // dd(DB::getQueryLog());
        return view('backend.coach.data-team',compact('datateam'));
    }

    public function create(){
        $datateam = null;
        $id = Auth::user()->id;
        $coach = DB::table('coach')->where('id',$id)->first();
        $datagame = DB::table('game')->where('id_game',$coach->id_game)->first();
        return view('backend.coach.data-team-create', compact('datateam','datagame','coach','id'));
    }

    public function store(Request $request){
        DB::table('team')->insert([
            'id_coach' => $request->id_coach,
            'id_game' => $request->id_game,
            'nama_team' => $request->nama_team,
        ]);
        return redirect()->route('datateam.index')->with('success','Data Jadwal Berhasil Disimpan');
    }
}
