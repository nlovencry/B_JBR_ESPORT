<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DataCoachController extends Controller
{
    public function index(){
        $datacoach = DB::table('coach')->get();
        return view('backend.admin.data-coach', compact('datacoach'));
    }

    public function create(){
        $datacoach = null;
        return view('backend.admin.data-coach-create',compact('datacoach'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'nama_coach' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'nohp_coach' => 'required|max:13',
            'alamat'=>'required',
            'foto' => 'required|mimes:png,jpg,jpeg',
         ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $namafoto = $request->nama_coach.'_'.$foto->getClientOriginalName();
            $pathfoto = $foto->move('images',$namafoto);
            DB::table('coach')->insert([
                'email' => $request->email,
                'nama_coach' => $request->nama_coach,
                'jenis_kelamin' => $request->jenis_kelamin,
                'usia' => $request->usia,
                'nohp_coach' => $request->nohp_coach,
                'alamat' => $request->alamat,
                'foto' => $namafoto,
                'winrate' => 'default.jpg',
                'is_active' => 1,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]);
        }
        return redirect()->route('datacoach.index');
    }

    public function edit($id_coach){
        $datacoach = DB::table('coach')->where('id_coach',$id_coach)->first();
        return view('backend.admin.data-coach-edit',compact('datacoach'));
    }

    public function update(Request $request){
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'nama_coach' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'usia' => 'required',
        //     'nohp_coach' => 'required|max:13',
        //     'alamat'=>'required',
        //     'foto' => 'required|mimes:png,jpg,jpeg',
        //  ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $namafoto =  $request->foto;
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $namafoto = $request->nama_coach.'_'.$foto->getClientOriginalName();
            $pathfoto = $foto->move('images',$namafoto);
        }
        $data = [
            'email' => $request->email,
            'nama_coach' => $request->nama_coach,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp_coach' => $request->nohp_coach,
            'alamat' => $request->alamat,
            'foto' => $namafoto,
            'winrate' => 'default.jpg',
            'is_active' => 1,
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
        ];
        DB::table('coach')->where('id_coach',$request->id_coach)->update($data);
        // dd($request);
        return redirect()->route('datacoach.index')->with('success','Data Coach Berhasil Diperbarui');
    }

    public function nonactive($id_coach){
        DB::table('coach')->where('id_coach',$id_coach)->update([
            'is_active' => 2,
        ]);
        return redirect()->route('datacoach.index');
    }

    public function active($id_coach){
        DB::table('coach')->where('id_coach',$id_coach)->update([
            'is_active' => 1,
        ]);
        return redirect()->route('datacoach.index');
    }
}
