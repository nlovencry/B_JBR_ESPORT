<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jadwal;
use Illuminate\Support\Facades\DB;

class Apijadwal extends Controller
{
    public function index()
    {
        # code...
        $jadwal = Jadwal::all();
        return response()->json(['pesan' => 'success', 'data' => $jadwal  ]);
    }

    public function show($id_jadwal)
    {
        # code...
        $jadwal = jadwal::find($id_jadwal)->first();
        return response()->json($jadwal,);
    }

}


