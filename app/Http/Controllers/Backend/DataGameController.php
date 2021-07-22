<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DataGameController extends Controller
{
    public function index(){
        $datagame = DB::table('game')
                    ->select('game.*', DB::raw('count(team.id_team) as total_team'),)
                    ->leftjoin('team','game.id_game','=','team.id_game')
                    ->groupBy('game.id_game')
                    ->get();
        return view('backend.admin.data-game',compact('datagame'));
    }

    public function create(){
        $datagame = null;
        return view('backend.admin.data-game-create',compact('datagame'));
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'nama_game' => 'required',
            'keterangan' => 'required',
         ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
            DB::table('game')->insert([
                'nama_game' => $request->nama_game,
                'keterangan' => $request->keterangan,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]);
        return redirect()->route('datagame.index')->with('success','Data Player Berhasil Disimpan');
    }

    public function edit($id_game){
        $datagame = DB::table('game')->where('id_game',$id_game)->first();
        return view('backend.admin.data-game-edit',compact('datagame'));
    }

    public function update(Request $request){
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $data = [
            'nama_game' => $request->nama_game,
            'keterangan' => $request->keterangan,
            'updated_at' => $tanggal,
        ];
        DB::table('game')->where('id_game',$request->id_game)->update($data);
        return redirect()->route('datagame.index')->with('success','Data Game Berhasil Diperbarui');
    }

    public function destroy($id_game){
        DB::table('game')->where('id_game',$id_game)->delete();
        return redirect()->route('datagame.index')->with('success','Data Game Berhasil Dihapus');
    }
}
