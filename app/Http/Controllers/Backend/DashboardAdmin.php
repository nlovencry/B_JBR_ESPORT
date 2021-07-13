<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardAdmin extends Controller
{
    public function admin(){
        // $user = Auth::user();
        // dd($user);
        return view('backend.admin.dashboard');
    }

    public function coach(){
        // $user = Auth::user();
        // dd($user);
        return view('backend.coach.dashboard');
    }
}
