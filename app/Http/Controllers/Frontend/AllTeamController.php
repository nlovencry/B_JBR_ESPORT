<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;

class AllTeamController extends Controller
{
    public function index(){
        $eventfoot = Event::latest()->paginate(3);
        $playerfoot = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->latest('player.created_at')
                            ->paginate(3);
        $datateam = DB::table('team')
                            ->select('team.*','game.id_game','game.nama_game','coach.id_coach','users.*',DB::raw('count(player.id_player) as total_player'),)
                            ->join('game','game.id_game','=','team.id_game')
                            ->join('coach','coach.id_coach','=','team.id_coach')
                            ->join('users','users.id','=','coach.id')
                            ->leftjoin('player','player.id_team','=','team.id_team')
                            ->groupBy('team.id_team')
                            ->get();
        $tour = DB::table('event')
                            ->select('event.*','game.nama_game')
                            ->leftjoin('game','game.id_game','=','event.id_game')
                            ->latest('event.created_at')->paginate(1);
        return view('frontend.team-all', compact('eventfoot','playerfoot','datateam','tour'));
    }
}
