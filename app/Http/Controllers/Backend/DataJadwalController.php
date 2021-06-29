<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataJadwalController extends Controller
{
    public function index(){
        $jadwal = DB::table('jadwal')->get();
        return view('backend.coach.data-jadwal',compact('jadwal'));
    }

    public function create(){
        $datajadwal = null;
        return view('backend.coach.data-jadwal-create',compact('datajadwal'));
    }

    public function store(Request $request){
        DB::table('jadwal')->insert([
            'id_game' => 1,
            'id_coach' => 1,
            'tanggal' => $request->tanggal,
            'nama_jadwal' => $request->nama_jadwal,
            'waktu_mulai' => $request->waktu_mulai,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('datajadwal.index')
                        ->with('success','Data Jadwal Berhasil Disimpan');
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
