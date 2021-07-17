<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DetailTeamController extends Controller
{
    public function index(){
        $detailteam = DB::table('player')
                        ->select('users.name')
                        ->leftjoin('users','users.id','=','player.id')
                        // ->where('player.id_team','team.id_team')
                        ->first();
                        // dd($detailteam);
                        // dd(DB::getQueryLog());
        return view('backend.coach.data-team-detail',compact('detailteam'));
    }
}
