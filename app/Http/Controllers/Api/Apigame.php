<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class Apigame extends Controller
{
    public function index()
    {
        # code...
        $game = Game::all();
        return response()->json(['pesan' => 'success', 'data' => $game  ]);
    }

    

}
?>