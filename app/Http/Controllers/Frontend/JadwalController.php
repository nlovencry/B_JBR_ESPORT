<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;
use Auth;

class JadwalController extends Controller
{
    public function index(){
        $eventfoot = Event::latest()->paginate(3);
        $playerfoot = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('users.is_active','1')
                            ->latest('player.created_at')
                            ->paginate(3);
        $player_id = DB::table('player')->where('id',Auth::user()->id)->first();
        $team_id = DB::table('team')->where('id_team',$player_id->id_team)->first()->id_team;
        $datajadwal = DB::table('jadwal')
                            ->select('jadwal.*','users.name','coach.foto')
                            ->leftjoin('coach','coach.id_coach','=','jadwal.id_coach')
                            ->leftjoin('users','users.id','=','coach.id')
                            ->leftjoin('team','team.id_team','=','jadwal.id_team')
                            ->leftjoin('game','game.id_game','=','jadwal.id_game')
                            ->where('team.id_team',$team_id)
                            ->orderby('jadwal.created_at','DESC')
                            ->get();
                            // dd($datajadwal);
        return view('frontend.jadwal', compact('eventfoot','playerfoot','player_id','team_id','datajadwal'));
    }
}
