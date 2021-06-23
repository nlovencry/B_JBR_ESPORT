<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function admin(){
        return view('backend.admin.dashboard');
    }

    public function coach(){
        return view('backend.coach.dashboard');
    }
}
