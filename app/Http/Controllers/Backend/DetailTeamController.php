<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DetailTeamController extends Controller
{
    public function index(){
        $datateam = DB::table('team')
                        ->select('team.*','game.id_game','game.nama_game','coach.id_coach','coach.nama_coach')
                        ->join('game','game.id_game','=','team.id_game')
                        ->join('coach','coach.id_coach','=','team.id_coach')
                        ->get();
        $detailteam = DB::table('player')->where('id_team','=','id_team')->count();
        return view('backend.coach.data-team-detail',compact('datateam'));
    }
}
