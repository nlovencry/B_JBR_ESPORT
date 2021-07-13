<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DataPlayerController extends Controller
{
    public function index(){
        $dataplayer = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.id_team','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->get();
                            // dd(DB::getQueryLog());
        return view('backend.admin.data-player',compact('dataplayer'));
    }

    public function create(){
        $dataplayer = null;
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-player-create',compact('dataplayer','datagame'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_game' => 'required',
            'nama_player' => 'required',
            'jenis_kelamin' => 'required',
            'alamat'=>'required',
            'foto' => 'required|mimes:png,jpg,jpeg',
         ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $namafoto = $request->nama_player.' '.$foto->getClientOriginalName();
            $pathfoto = $foto->move('images',$namafoto);
            DB::table('player')->insert([
                'id_game' => $request->id_game,
                'id_team' => 0,
                'email' => $request->email,
                'nama_player' => $request->nama_player,
                'jenis_kelamin' => $request->jenis_kelamin,
                'usia' => $request->usia,
                'nohp_player' => $request->nohp_player,
                'alamat' => $request->alamat,
                'foto' => $namafoto,
                'winrate' => 'default.jpg',
                'izin_ortu' => $request->izin_ortu,
                'bersedia_offline' => $request->bersedia_offline,
                'nohp_ortu' => $request->nohp_ortu,
                'password' => '123456789',
                'is_active' => 1,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]);
        }
        return redirect()->route('dataplayer.index')->with('success','Data Player Berhasil Disimpan');
    }

    public function edit($id_player){
        $dataplayer = DB::table('player')->where('id_player',$id_player)->first();
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-player-edit',compact('dataplayer','datagame'));
    }

    public function update(Request $request){
        // $this->validate($request, [
        //     'id_game' => 'required',
        //     'nama_player' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat'=>'required',
        //     'foto' => 'required|mimes:png,jpg,jpeg',
        //  ]);
         $tanggal = now();
         $date = Carbon::parse($request->tanggal);
         $namafoto =  $request->foto;
         if($request->hasfile('foto')){
             $foto = $request->file('foto');
             $namafoto = $request->nama_player.'_'.$foto->getClientOriginalName();
             $pathfoto = $foto->move('images',$namafoto);
         }
         $data = [
            'id_game' => $request->id_game,
            'id_team' => 0,
            'email' => strtolower($request->email),
            'nama_lengkap' => ucwords(strtolower($request->nama_lengkap)),
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp_player' => $request->nohp_player,
            'alamat' => $request->alamat,
            'foto' => $namafoto,
            'winrate' => 'default.jpg',
            'izin_ortu' => $request->izin_ortu,
            'bersedia_offline' => $request->bersedia_offline,
            'nohp_ortu' => $request->nohp_ortu,
            'password' => '123456789',
            'is_active' => 1,
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
         ];
        DB::table('player')->where('id_player',$request->id_player)->update($data);
        // dd($request);
        return redirect()->route('dataplayer.index')->with('success','Data Player Berhasil Diperbarui');
    }

    public function nonactive($id_player){
        DB::table('player')->where('id_player',$id_player)->update([
            'is_active' => 2,
        ]);
        return redirect()->route('dataplayer.index');
    }

    public function active($id_player){
        DB::table('player')->where('id_player',$id_player)->update([
            'is_active' => 1,
        ]);
        return redirect()->route('dataplayer.index');
    }
}
