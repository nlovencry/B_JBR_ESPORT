<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

public function index()
    {
        # code...
        $team = Team::all();
        return response()->json(['kode' => 201,'pesan' => 'success', 'data' => $team  ]);
    }

    public function show($id_coach)
    {
        # code...
        $team = Team::find($id_coach)->first();
        return response()->json($team, 201);
    }
    ?>