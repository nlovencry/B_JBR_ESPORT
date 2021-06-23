<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataGameController extends Controller
{
    public function index(){
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-game',compact('datagame'));
    }

    public function create(){
        $datagame = null;
        return view('backend.admin.data-game-create',compact('datagame'));
    }

    public function store(Request $request){
        DB::table('game')->insert([
            'nama_game' => $request->nama_game,
            'keterangan' => $request->keterangan
        ]);
        
        return redirect()->route('datagame.index')
                        ->with('success','Data Game Berhasil Disimpan');
    }

    public function edit($id_game){
        $datagame = DB::table('game')->where('id_game',$id_game)->first();
        return view('backend.admin.data-game-edit',compact('datagame'));
    }

    public function update(Request $request){
        DB::table('game')->where('id_game',$request->id_game)->update([
            'nama_game' => $request->nama_game,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('datagame.index')->with('success','Data Game Berhasil Diperbarui');
    }

    public function destroy($id_game){
        DB::table('game')->where('id_game',$id_game)->delete();
        return redirect()->route('datagame.index')->with('success','Data Game Berhasil Dihapus');
    }
}
