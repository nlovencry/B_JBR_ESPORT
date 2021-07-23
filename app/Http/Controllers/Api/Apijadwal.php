<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;

class Apijadwal extends Controller
{
    public function index()
    {
        # code...
        $jadwal = Jadwal::all();
        return response()->json(['pesan' => 'success', 'data' => $jadwal  ]);
    }
}
?>