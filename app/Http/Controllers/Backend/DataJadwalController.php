<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DataJadwalController extends Controller
{
    public function index(){
        $jadwal = DB::table('jadwal')
                                ->select('jadwal.*','team.*')
                                ->join('team','jadwal.id_team','=','team.id_team')
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
        
        $data = [
            'id_game' => $request->id_game,
            'id_coach' => $request->id_coach,
            'id_team' => $request->id_team,
            'nama_jadwal' => $request->nama_jadwal,
            'waktu_mulai' => $waktu_asal,
            'waktu_akhir' => $waktu_akhir,
            'keterangan' => $request->keterangan,
        ];
        DB::table('jadwal')->insert($data);
        
        return redirect()->route('datajadwal.index')->with('success','Data Jadwal Berhasil Disimpan');
    }

    public function edit($id_jadwal){
        $datajadwal = DB::table('jadwal')->where('id_jadwal',$id_jadwal)->first();
        return view('backend.coach.data-jadwal-edit',compact('datajadwal'));
    }

    public function update(Request $request){
        DB::table('jadwal')->where('id_jadwal',$request->id_jadwal)->update([
            'tanggal' => $request->tanggal,
            'nama_jadwal' => $request->nama_jadwal,
            'waktu_mulai' => $request->waktu_mulai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('datajadwal.index')->with('success','Data Jadwal Berhasil Diperbarui');
    }

    public function destroy($id_jadwal){
        DB::table('jadwal')->where('id_jadwal',$id_jadwal)->delete();
        return redirect()->route('datajadwal.index')->with('success','Data Jadwal Berhasil Dihapus');
    }
}
