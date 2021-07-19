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
        $games = DB::table('game')->latest()->paginate(3);;
        $event = Event::latest()->paginate(2);
        $eventfoot = Event::latest()->paginate(3);
        $player = DB::table('player')
        ->select('player.*','users.*','game.nama_game')
        ->leftjoin('users','users.id','=','player.id')
        ->leftjoin('game','game.id_game','=','player.id_game')
        ->latest('player.created_at')
        ->paginate(4);
        $playerfoot = DB::table('player')
        ->select('player.*','users.*','game.nama_game')
        ->leftjoin('users','users.id','=','player.id')
        ->leftjoin('game','game.id_game','=','player.id_game')
        ->latest('player.created_at')
        ->paginate(3);
        // dd($player);
        return view('frontend.index',compact('games','event','player','eventfoot','playerfoot'));
    }
}
