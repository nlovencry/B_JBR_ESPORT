<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataEventController extends Controller
{
    public function index(){
        $dataevent = DB::table('event')->get();
        return view('backend.admin.data-event',compact('dataevent'));
    }
}
