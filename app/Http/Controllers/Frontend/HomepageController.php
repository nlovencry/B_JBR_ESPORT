<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Suport\Facades\Storage;
use Illuminate\Http\Request;
use DB;

class HomepageController extends Controller
{
    public function index(){
        $games = DB::table('game')->latest()->paginate(3);
        $event = DB::table('event')
                            ->select('event.*','game.nama_game')
                            ->leftjoin('game','game.id_game','=','event.id_game')
                            ->latest()->paginate(2);
        $eventfoot = Event::latest()->paginate(3);
        $player = DB::table('player')
                            ->select('player.*','users.*','game.nama_game')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->where('users.is_active','1')
                            ->latest('player.created_at')
                            ->paginate(4);
        $playerfoot = DB::table('player')
                            ->select('player.*','users.*','game.nama_game')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->where('users.is_active','1')
                            ->latest('player.created_at')
                            ->paginate(3);
                            // dd($player);
        $team = DB::table('team')
                            ->select('team.*','game.*',DB::raw('count(player.id_player) as total_player'),)
                            ->join('game','game.id_game','=','team.id_game')
                            ->leftjoin('player','player.id_team','=','team.id_team')
                            ->groupBy('team.id_team')
                            ->get();
        return view('frontend.index',compact('games','event','player','eventfoot','playerfoot','team'));
    }
}
