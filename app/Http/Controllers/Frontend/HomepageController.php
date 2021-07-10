<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomepageController extends Controller
{
    public function index(){
        $games = DB::table('game')->get();
        $tournament = DB::table('event')->get();
        return view('frontend.index',compact('games','tournament'));
    }
}
