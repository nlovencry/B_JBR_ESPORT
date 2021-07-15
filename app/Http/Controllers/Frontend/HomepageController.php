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
        $games = DB::table('game')->get();
        $event = Event::latest()->paginate(2);
        $player = DB::table('player')
        ->select('player.*','users.*','game.nama_game')
        ->leftjoin('users','users.id','=','player.id')
        ->leftjoin('game','game.id_game','=','player.id_game')
        ->latest()
        ->paginate(4);
        // dd($player);
        return view('frontend.index',compact('games','event','player'));
    }
}
