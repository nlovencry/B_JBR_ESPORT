<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }

    public function datamaster(){
        return view('backend.data-master');
    }
}
