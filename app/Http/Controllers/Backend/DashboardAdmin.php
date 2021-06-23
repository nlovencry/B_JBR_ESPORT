<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function admin(){
        return view('backend.admin.dashboard');
    }

<<<<<<< Updated upstream
    public function coach(){
        return view('backend.coach.dashboard');
=======
    public function datagame(){
        return view('backend.data-game');
>>>>>>> Stashed changes
    }
}
