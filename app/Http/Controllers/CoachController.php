<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function coach(){
        return view('backend.coach.dashboard');
    }
}
