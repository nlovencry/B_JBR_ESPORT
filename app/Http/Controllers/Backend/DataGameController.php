<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataGameController extends Controller
{
    public function index(){
        $datagame = DB::table('game')->get();
<<<<<<< Updated upstream
        return view('backend.admin.data-game',compact('datagame'));
=======
        return view('backend.data-game',compact('datagame'));
>>>>>>> Stashed changes
    }

    public function create(){
        $datagame = null;
<<<<<<< Updated upstream
        return view('backend.admin.data-game-create',compact('datagame'));
=======
        return view('backend.data-game-create',compact('datagame'));
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        return view('backend.admin.data-game-edit',compact('datagame'));
=======
        return view('backend.data-game-edit',compact('datagame'));
>>>>>>> Stashed changes
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
