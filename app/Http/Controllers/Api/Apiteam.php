<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class Apiteam extends Controller{

public function index()
    {
        # code...
        $team = Team::all();
        return response()->json(['kode' => 201,'pesan' => 'success', 'data' => $team  ]);
    }

    public function show($id_team)
    {
        # code...
        $team = Team::find($id_team)->first();
        return response()->json($team, 201);
    }

}
    
?>