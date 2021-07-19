<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DetailJadwalController extends Controller
{
    public function show($id_jadwal){
        $detailjadwal = DB::table('master_absensi')
                        ->select('master_absensi.*','player.*','users.*','team.*')
                        ->leftjoin('jadwal','jadwal.id_jadwal','=','master_absensi.id_jadwal')
                        ->leftjoin('player','player.id_player','=','master_absensi.id_player')
                        ->leftjoin('users','users.id','=','player.id')
                        ->join('team','team.id_team','=','jadwal.id_team')
                        ->where('master_absensi.id_jadwal','=',$id_jadwal)
                        ->get();
                        // dd($detailteam);
                        // dd(DB::getQueryLog());
        return view('backend.coach.data-jadwal-detail',compact('detailjadwal'));
    }
}
