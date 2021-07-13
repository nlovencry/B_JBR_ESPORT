<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataTeamController extends Controller
{
    public function index(){
        $datateam = DB::table('team')
                        ->select('team.*','game.id_game','game.nama_game','coach.id_coach','users.*')
                        ->join('game','game.id_game','=','team.id_game')
                        ->join('coach','coach.id_coach','=','team.id_coach')
                        ->join('users','users.id','=','coach.id')
                        ->get();
                        // dd(DB::getQueryLog());
        $team_count = DB::table('player')->where('id_team','=','id_team')->count();
        return view('backend.coach.data-team',compact('datateam','team_count'));
    }

    public function create(){
        $datateam = null;
        $datagame = DB::table('game')->get();
        return view('backend.coach.data-team-create', compact('datateam','datagame'));
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
