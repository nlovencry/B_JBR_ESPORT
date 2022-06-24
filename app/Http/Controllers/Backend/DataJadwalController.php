<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DataJadwalController extends Controller
{
    public function index(){
        $coach_id = DB::table('coach')->where('coach.id',Auth::user()->id)->first()->id_coach;
        $jadwal = DB::table('jadwal')
                                ->select('jadwal.*','team.*')
                                ->leftjoin('team','jadwal.id_team','=','team.id_team')
                                ->where('jadwal.id_coach',$coach_id)
                                ->get();
        // dd($jadwal);
        return view('backend.coach.data-jadwal',compact('jadwal'));
    }

    public function create(){
        $datajadwal = null;
        $id = Auth::user()->id;
        $coach = DB::table('coach')->where('id',$id)->first();
        $datagame = DB::table('game')->where('id_game',$coach->id_game)->first();
        $datateam = DB::table('team')->where('id_coach',$coach->id_coach)->get();
        return view('backend.coach.data-jadwal-create',compact('datajadwal','datateam','datagame','coach','id'));
    }

    public function store(Request $request){
        $waktu_asal = $request->tanggal. ' ' . $request->waktu_mulai;
        $waktu_akhir = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($waktu_asal)));
        $tanggal = now();
        $data = [
            'id_game' => $request->id_game,
            'id_coach' => $request->id_coach,
            'id_team' => $request->id_team,
            'nama_jadwal' => $request->nama_jadwal,
            'waktu_mulai' => $waktu_asal,
            'waktu_akhir' => $waktu_akhir,
            'keterangan' => $request->keterangan,
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
        ];
        DB::table('jadwal')->insert($data);
        
        return redirect()->route('datajadwal.index')->with('success','Data Jadwal Berhasil Disimpan');
    }

    public function edit($id_jadwal){
        $datajadwal = DB::table('jadwal')->where('id_jadwal',$id_jadwal)->first();
        $datateam = DB::table('team')->get();
        return view('backend.coach.data-jadwal-edit',compact('datajadwal','datateam'));
    }

    public function update(Request $request){
        $waktu_asal = $request->tanggal. ' ' . $request->waktu_mulai;
        $waktu_akhir = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($waktu_asal)));
        $tanggal = now();
        $data = [
            'id_game' => $request->id_game,
            'id_coach' => $request->id_coach,
            'id_team' => $request->id_team,
            'nama_jadwal' => $request->nama_jadwal,
            'waktu_mulai' => $waktu_asal,
            'waktu_akhir' => $waktu_akhir,
            'keterangan' => $request->keterangan,
            'updated_at' => $tanggal,
        ];
        DB::table('jadwal')->where('id_jadwal',$request->id_jadwal)->update($data);
        return redirect()->route('datajadwal.index')->with('success','Data Jadwal Berhasil Diperbarui');
    }

    public function destroy($id_jadwal){
        DB::table('jadwal')->where('id_jadwal',$id_jadwal)->delete();
        return redirect()->route('datajadwal.index')->with('success','Data Jadwal Berhasil Dihapus');
    }
}
