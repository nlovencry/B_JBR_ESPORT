<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;

class TournamentController extends Controller
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
        $tour = DB::table('event')
                            ->select('event.*','game.nama_game')
                            ->leftjoin('game','game.id_game','=','event.id_game')
                            ->orderby('event.created_at','DESC')
                            ->get();
        return view('frontend.tournament', compact('eventfoot','playerfoot','tour'));
    }

    public function show($id_event){
        $eventfoot = Event::latest()->paginate(3);
        $playerfoot = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('users.is_active','1')
                            ->latest('player.created_at')
                            ->paginate(3);
        $tour = DB::table('event')
                            ->select('event.*','game.nama_game')
                            ->leftjoin('game','game.id_game','=','event.id_game')
                            ->where('event.id_event',$id_event)
                            ->get();
        return view('frontend.tournament-show', compact('eventfoot','playerfoot','tour'));
    }
}
