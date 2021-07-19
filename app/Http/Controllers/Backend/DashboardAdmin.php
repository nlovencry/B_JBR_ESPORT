<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardAdmin extends Controller
{
    public function admin(){
        // $user = Auth::user();
        // dd($user);
        $game = DB::table('game')->count();
        $coach = DB::table('coach')->count();
        $player = DB::table('player')->count();
        $tour = DB::table('event')->count();
        return view('backend.admin.dashboard',compact('game','coach','player','tour'));
    }

    public function coach(){
        // $user = Auth::user();
        // dd($user);
        // $id = Auth::user();
        $coach_id = DB::table('coach')->where('id',Auth::user()->id)->first();
        $player = DB::table('player')->where('id_game',$coach_id->id_game)->count();
        $team = DB::table('team')->where('id_coach',$coach_id->id_coach)->count();
        return view('backend.coach.dashboard',compact('coach_id','team','player'));
    }
}
