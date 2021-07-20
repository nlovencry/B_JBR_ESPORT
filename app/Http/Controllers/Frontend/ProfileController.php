<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;
use Auth;

class ProfileController extends Controller
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
        $player = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('users.id',Auth::user()->id)
                            ->first();
        return view('frontend.profile',compact('eventfoot','playerfoot','player'));
    }
}
