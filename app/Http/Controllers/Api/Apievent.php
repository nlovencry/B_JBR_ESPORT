<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class Apievent extends Controller
{
    public function index()
    {
        # code...
        $event = Event::all();
        return response()->json(['pesan' => 'success', 'data' => $event  ]);
    }

    public function show($id_event)
    {
        # code...
        $event = Event::find($id_event)->first();
        return response()->json($event,);
    }

}
